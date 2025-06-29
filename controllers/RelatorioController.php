<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\filters\AccessControl;

class RelatorioController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // Apenas usuários autenticados
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $query = (new Query())
            ->select([
                'mp.id_movimento_produto',
                'v.nome AS nome_vinho',
                'b.nome AS bodega',
                'tv.descricao AS tipo_vinho',
                'mp.data_movimento',
                'mp.qtd_movimento',
                'mp.fl_movimento'
            ])
            ->from('movimento_produto mp')
            ->innerJoin('vinho v', 'mp.id_vinho = v.id_vinho')
            ->leftJoin('bodega b', 'v.id_bodega = b.id_bodega')
            ->leftJoin('tipo_vinho tv', 'v.id_tipo_vinho = tv.id_tipo_vinho')
            ->orderBy(['mp.data_movimento' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
