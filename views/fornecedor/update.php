<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fornecedor $model */

$this->title = 'Update Fornecedor: ' . $model->id_fornecedor;
$this->params['breadcrumbs'][] = ['label' => 'Fornecedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fornecedor, 'url' => ['view', 'id_fornecedor' => $model->id_fornecedor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fornecedor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
