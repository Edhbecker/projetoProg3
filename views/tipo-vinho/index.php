<?php

use app\models\TipoVinho;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TipoVinhoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipo Vinhos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-vinho-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Vinho', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tipo_vinho',
            'descricao',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TipoVinho $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_tipo_vinho' => $model->id_tipo_vinho]);
                 }
            ],
        ],
    ]); ?>


</div>
