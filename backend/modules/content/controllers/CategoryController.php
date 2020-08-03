<?php

namespace backend\modules\content\controllers;

use Yii;
use common\models\ArticleCategory;
use backend\modules\content\models\search\ArticleCategorySearch;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for ArticleCategory model.
 */
class CategoryController extends Controller
{

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
     * Lists all ArticleCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticleCategory model.
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
     * Creates a new ArticleCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = '@backend/views/layouts/base';

        $model = new ArticleCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $categories = ArticleCategory::find()->noParents()->all();
        $categories = ArrayHelper::map($categories, 'id', 'title');

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
        
    }

    /**
     * Updates an existing ArticleCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = '@backend/views/layouts/base';

        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $categories = ArticleCategory::find()->noParents()->andWhere(['not', ['id' => $id]])->all();
        $categories = ArrayHelper::map($categories, 'id', 'title');

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
        ]);

    }

    /**
     * Deletes an existing ArticleCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticleCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArticleCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleCategory::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
