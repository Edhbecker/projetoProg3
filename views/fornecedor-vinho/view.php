<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\FornecedorVinho $model */

$this->title = $model->id_fornecedor_vinho;
$this->params['breadcrumbs'][] = ['label' => 'Fornecedor Vinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fornecedor-vinho-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_fornecedor_vinho' => $model->id_fornecedor_vinho], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_fornecedor_vinho' => $model->id_fornecedor_vinho], [
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
            'id_fornecedor_vinho',
            'id_fornecedor',
            'id_vinho',
        ],
    ]) ?>

</div>
