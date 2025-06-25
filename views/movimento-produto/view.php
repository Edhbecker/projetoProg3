<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MovimentoProduto $model */

$this->title = $model->id_movimento_produto;
$this->params['breadcrumbs'][] = ['label' => 'Movimento Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="movimento-produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_movimento_produto' => $model->id_movimento_produto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_movimento_produto' => $model->id_movimento_produto], [
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
            'id_movimento_produto',
            'id_vinho',
            'data_movimento',
            'qtd_movimento',
            'fl_movimento',
        ],
    ]) ?>

</div>
