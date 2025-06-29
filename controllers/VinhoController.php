<?php

namespace app\controllers;

use app\models\Vinho;
use app\models\VinhoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
     * Atualiza o estoque de um vinho com base no movimento.
     * @param int $id_vinho
     * @param int $quantidade
     * @param int $fl_movimento (1 = entrada, 0 = saída)
     * @return bool|string true se sucesso, string com mensagem de erro em caso de falha
     */
    public function atualizarEstoque($id_vinho, $quantidade, $fl_movimento)
    {
        $vinho = Vinho::findOne($id_vinho);

        if (!$vinho) {
            return "Vinho não encontrado.";
        }

        $fl_movimento = (int) $fl_movimento;
        $quantidade = (int) $quantidade;

        if (!in_array($fl_movimento, [0, 1], true)) {
            return "Tipo de movimento inválido.";
        }

        if ($quantidade <= 0) {
            return "Quantidade deve ser maior que zero.";
        }

        if ($fl_movimento === 1) {
            // Entrada: soma a quantidade no estoque
            $vinho->qtd_estoque += $quantidade;
        } else {
            // Saída: verifica se estoque é suficiente antes de subtrair
            if ($vinho->qtd_estoque < $quantidade) {
                return "Estoque insuficiente. Disponível: {$vinho->qtd_estoque}";
            }
            $vinho->qtd_estoque -= $quantidade;
        }

        if (!$vinho->save()) {
            return "Erro ao atualizar o estoque.";
        }

        return true;
    }
    public function actionIndex()
    {
        $searchModel = new VinhoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id_vinho)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_vinho),
        ]);
    }

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

    public function actionDelete($id_vinho)
    {
        $this->findModel($id_vinho)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id_vinho)
    {
        if (($model = Vinho::findOne(['id_vinho' => $id_vinho])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
