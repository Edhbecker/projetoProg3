<?php

use app\models\MovimentoProduto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MovimentoProdutoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Movimento Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimento-produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Movimento Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_movimento_produto',
            'id_vinho',
            'data_movimento',
            'qtd_movimento',
            'fl_movimento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MovimentoProduto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_movimento_produto' => $model->id_movimento_produto]);
                 }
            ],
        ],
    ]); ?>


</div>
