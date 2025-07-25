<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Fornecedor $model */

$this->title = $model->id_fornecedor;
$this->params['breadcrumbs'][] = ['label' => 'Fornecedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fornecedor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_fornecedor' => $model->id_fornecedor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_fornecedor' => $model->id_fornecedor], [
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
            'id_fornecedor',
            'nome',
            'contato',
            'documento',
        ],
    ]) ?>

</div>
