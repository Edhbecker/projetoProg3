<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FornecedorSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fornecedor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_fornecedor') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'contato') ?>

    <?= $form->field($model, 'documento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
