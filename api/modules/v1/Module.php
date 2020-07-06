<?php

namespace api\modules\v1;

use Yii;
use yii\filters\ContentNegotiator;
use yii\filters\RateLimiter;
use yii\web\Response;

class Module extends \yii\base\Module
{
    /** @var string */
    public $controllerNamespace = 'api\modules\v1\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // 加载模块的配置
        Yii::configure($this, require(__DIR__ . '/config.php'));
        
        // 定义模块内的 user 类
        Yii::$app->user->identityClass = 'api\modules\v1\models\ApiUserIdentity';
        Yii::$app->user->enableSession = false;
        Yii::$app->user->loginUrl = null;

        // 定义模块内 Request 可以解析 json 格式请求数据
        Yii::$app->request->parsers['application/json'] = 'yii\web\JsonParser';

        // 定义模块内 Resopnse 的 Before Send 事件, 统一数据返回格式
        Yii::$app->response->on(Response::EVENT_BEFORE_SEND, function ($event) {
            // 获取 Response
            $response = $event->sender;

            // 数据返回格式
            $data = [
                'code' => $response->getStatusCode(),
                'status' => $response->statusText,
                'data' => $response->data
            ];

            $response->data = $data;
        });
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
                'application/xml' => Response::FORMAT_XML,
            ],
        ];

        $behaviors['rateLimiter'] = [
            'class' => RateLimiter::class,
        ];

        return $behaviors;
    }
}
