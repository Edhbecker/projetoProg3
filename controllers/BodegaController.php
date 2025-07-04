<?php

namespace app\controllers;

use app\models\Bodega;
use app\models\BodegaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BodegaController implements the CRUD actions for Bodega model.
 */
class BodegaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'], // Apenas usuários logados
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    /**
     * Lists all Bodega models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BodegaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bodega model.
     * @param int $id_bodega Id Bodega
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_bodega)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_bodega),
        ]);
    }

    /**
     * Creates a new Bodega model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bodega();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_bodega' => $model->id_bodega]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bodega model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_bodega Id Bodega
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_bodega)
    {
        $model = $this->findModel($id_bodega);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_bodega' => $model->id_bodega]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bodega model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_bodega Id Bodega
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_bodega)
    {
        $this->findModel($id_bodega)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bodega model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_bodega Id Bodega
     * @return Bodega the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_bodega)
    {
        if (($model = Bodega::findOne(['id_bodega' => $id_bodega])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
