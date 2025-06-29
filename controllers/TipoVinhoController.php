<?php

namespace app\controllers;

use app\models\TipoVinho;
use app\models\TipoVinhoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TipoVinhoController implements the CRUD actions for TipoVinho model.
 */
class TipoVinhoController extends Controller
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
                            'roles' => ['@'], // Permite apenas usuários autenticados
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'], // Só permite POST para delete
                    ],
                ],
            ]
        );
    }


    /**
     * Lists all TipoVinho models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TipoVinhoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoVinho model.
     * @param int $id_tipo_vinho Id Tipo Vinho
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_tipo_vinho)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_tipo_vinho),
        ]);
    }

    /**
     * Creates a new TipoVinho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TipoVinho();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_tipo_vinho' => $model->id_tipo_vinho]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoVinho model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_tipo_vinho Id Tipo Vinho
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_tipo_vinho)
    {
        $model = $this->findModel($id_tipo_vinho);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tipo_vinho' => $model->id_tipo_vinho]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TipoVinho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_tipo_vinho Id Tipo Vinho
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_tipo_vinho)
    {
        $this->findModel($id_tipo_vinho)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TipoVinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_tipo_vinho Id Tipo Vinho
     * @return TipoVinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tipo_vinho)
    {
        if (($model = TipoVinho::findOne(['id_tipo_vinho' => $id_tipo_vinho])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
