<?php

namespace app\controllers;

use app\models\Vinho;
use app\models\VinhoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VinhoController implements the CRUD actions for Vinho model.
 */
class VinhoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Vinho models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VinhoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vinho model.
     * @param int $id_vinho Id Vinho
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_vinho)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_vinho),
        ]);
    }

    /**
     * Creates a new Vinho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Vinho();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_vinho' => $model->id_vinho]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vinho model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_vinho Id Vinho
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_vinho)
    {
        $model = $this->findModel($id_vinho);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_vinho' => $model->id_vinho]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vinho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_vinho Id Vinho
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_vinho)
    {
        $this->findModel($id_vinho)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_vinho Id Vinho
     * @return Vinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_vinho)
    {
        if (($model = Vinho::findOne(['id_vinho' => $id_vinho])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
