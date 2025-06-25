<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FornecedorVinho $model */

$this->title = 'Create Fornecedor Vinho';
$this->params['breadcrumbs'][] = ['label' => 'Fornecedor Vinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedor-vinho-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
