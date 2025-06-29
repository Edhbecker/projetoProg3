<?php

namespace app\controllers;

use app\models\FornecedorVinho;
use app\models\FornecedorVinhoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * FornecedorVinhoController implements the CRUD actions for FornecedorVinho model.
 */
class FornecedorVinhoController extends Controller
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
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    /**
     * Lists all FornecedorVinho models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FornecedorVinhoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FornecedorVinho model.
     * @param int $id_fornecedor_vinho Id Fornecedor Vinho
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_fornecedor_vinho)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_fornecedor_vinho),
        ]);
    }

    /**
     * Creates a new FornecedorVinho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new FornecedorVinho();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_fornecedor_vinho' => $model->id_fornecedor_vinho]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FornecedorVinho model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_fornecedor_vinho Id Fornecedor Vinho
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_fornecedor_vinho)
    {
        $model = $this->findModel($id_fornecedor_vinho);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_fornecedor_vinho' => $model->id_fornecedor_vinho]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FornecedorVinho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_fornecedor_vinho Id Fornecedor Vinho
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_fornecedor_vinho)
    {
        $this->findModel($id_fornecedor_vinho)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FornecedorVinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_fornecedor_vinho Id Fornecedor Vinho
     * @return FornecedorVinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_fornecedor_vinho)
    {
        if (($model = FornecedorVinho::findOne(['id_fornecedor_vinho' => $id_fornecedor_vinho])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
