<?php

namespace app\controllers;

use app\models\MovimentoProduto;
use app\models\MovimentoProdutoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MovimentoProdutoController implements the CRUD actions for MovimentoProduto model.
 */
class MovimentoProdutoController extends Controller
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
     * Lists all MovimentoProduto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MovimentoProdutoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MovimentoProduto model.
     * @param int $id_movimento_produto Id Movimento Produto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_movimento_produto)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_movimento_produto),
        ]);
    }

    /**
     * Creates a new MovimentoProduto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MovimentoProduto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_movimento_produto' => $model->id_movimento_produto]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MovimentoProduto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_movimento_produto Id Movimento Produto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_movimento_produto)
    {
        $model = $this->findModel($id_movimento_produto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_movimento_produto' => $model->id_movimento_produto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MovimentoProduto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_movimento_produto Id Movimento Produto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_movimento_produto)
    {
        $this->findModel($id_movimento_produto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MovimentoProduto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_movimento_produto Id Movimento Produto
     * @return MovimentoProduto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_movimento_produto)
    {
        if (($model = MovimentoProduto::findOne(['id_movimento_produto' => $id_movimento_produto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
