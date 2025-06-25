<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FornecedorVinho $model */

$this->title = 'Update Fornecedor Vinho: ' . $model->id_fornecedor_vinho;
$this->params['breadcrumbs'][] = ['label' => 'Fornecedor Vinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fornecedor_vinho, 'url' => ['view', 'id_fornecedor_vinho' => $model->id_fornecedor_vinho]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fornecedor-vinho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
