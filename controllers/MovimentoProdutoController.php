<?php

namespace app\controllers;

use app\models\MovimentoProduto;
use app\models\MovimentoProdutoSearch;
use app\controllers\VinhoController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MovimentoProdutoController implements the CRUD actions for MovimentoProduto model.
 */
class MovimentoProdutoController extends Controller
{
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

    public function actionIndex()
    {
        $searchModel = new MovimentoProdutoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id_movimento_produto)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_movimento_produto),
        ]);
    }

    public function actionCreate()
    {
        $model = new MovimentoProduto();

        $vinhos = \app\models\Vinho::find()
            ->select(['nome', 'id_vinho'])
            ->orderBy('nome')
            ->indexBy('id_vinho')
            ->column();

        $tiposMovimento = [
            1 => 'Entrada',
            0 => 'Saída',
        ];

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $vinhoController = new VinhoController('vinho', \Yii::$app);
                $result = $vinhoController->atualizarEstoque($model->id_vinho, $model->qtd_movimento, $model->fl_movimento);

                if ($result === true) {
                    if ($model->save()) {
                        return $this->redirect(['view', 'id_movimento_produto' => $model->id_movimento_produto]);
                    }
                } else {
                    $model->addError('qtd_movimento', $result);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'vinhos' => $vinhos,
            'tiposMovimento' => $tiposMovimento,
        ]);
    }

    public function actionDelete($id_movimento_produto)
    {
        $model = $this->findModel($id_movimento_produto);

        $vinhoController = new VinhoController('vinho', \Yii::$app);

        $result = $vinhoController->atualizarEstoque(
            $model->id_vinho,
            $model->qtd_movimento,
            $model->fl_movimento == 1 ? 0 : 1
        );

        if ($result !== true) {
            \Yii::$app->session->setFlash('error', "Erro ao atualizar estoque: $result");
            return $this->redirect(['index']);
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id_movimento_produto)
    {
        if (($model = MovimentoProduto::findOne(['id_movimento_produto' => $id_movimento_produto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Movimento não encontrado.');
    }
}
