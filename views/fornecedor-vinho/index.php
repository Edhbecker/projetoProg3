<?php

use app\models\FornecedorVinho;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FornecedorVinhoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fornecedor Vinhos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedor-vinho-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fornecedor Vinho', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_fornecedor_vinho',
            'id_fornecedor',
            'id_vinho',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FornecedorVinho $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_fornecedor_vinho' => $model->id_fornecedor_vinho]);
                 }
            ],
        ],
    ]); ?>


</div>
