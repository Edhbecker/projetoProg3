<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Vinho $model */

$this->title = $model->id_vinho;
$this->params['breadcrumbs'][] = ['label' => 'Vinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vinho-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_vinho' => $model->id_vinho], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_vinho' => $model->id_vinho], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_vinho',
            'nome',
            'safra',
            'preco',
            'teor',
            'qtd_estoque',
            'id_tipo_vinho',
            'id_bodega',
        ],
    ]) ?>

</div>
