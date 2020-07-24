<?php

namespace backend\modules\widget\controllers;

use Yii;
use common\models\WidgetCarousel;
use common\models\WidgetCarouselItem;
use backend\modules\widget\models\search\CarouselItemSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarouselItemController implements the CRUD actions for WidgetCarouselItem model.
 */
class CarouselItemController extends Controller
{
    /** @inheritdoc */
    public function getViewPath()
    {
        return $this->module->getViewPath() . DIRECTORY_SEPARATOR . 'carousel/item';
    }


    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all WidgetCarouselItem models.
     * @return mixed
     */
    public function actionIndex($carousel_id)
    {
        $this->layout = '@backend/views/layouts/base';

        $searchModel = new CarouselItemSearch();
        $dataProvider = $searchModel->search($carousel_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WidgetCarouselItem model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = '@backend/views/layouts/base';

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WidgetCarouselItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($carousel_id)
    {
        $this->layout = '@backend/views/layouts/base';

        $model = new WidgetCarouselItem();
        $carousel = WidgetCarousel::findOne($carousel_id);

        if (!$carousel) {
            throw new HttpException(400);
        }

        $model->carousel_id = $carousel->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'carousel_id' => $model->carousel_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'carousel' => $carousel,
        ]);
    }

    /**
     * Updates an existing WidgetCarouselItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = '@backend/views/layouts/base';
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'carousel_id' => $model->carousel_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WidgetCarouselItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $carousel_id = $model->carousel_id;

        $model->delete();

        return $this->redirect(['index', 'carousel_id' => $carousel_id]);
    }

    /**
     * Finds the WidgetCarouselItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WidgetCarouselItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WidgetCarouselItem::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
