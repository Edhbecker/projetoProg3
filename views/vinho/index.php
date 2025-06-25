<?php

use app\models\Vinho;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\VinhoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vinhos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vinho-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vinho', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_vinho',
            'nome',
            'safra',
            'preco',
            'teor',
            //'qtd_estoque',
            //'id_tipo_vinho',
            //'id_bodega',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Vinho $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_vinho' => $model->id_vinho]);
                 }
            ],
        ],
    ]); ?>


</div>
