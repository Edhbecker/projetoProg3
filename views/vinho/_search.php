<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VinhoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vinho-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_vinho') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'safra') ?>

    <?= $form->field($model, 'preco') ?>

    <?= $form->field($model, 'teor') ?>

    <?php // echo $form->field($model, 'qtd_estoque') ?>

    <?php // echo $form->field($model, 'id_tipo_vinho') ?>

    <?php // echo $form->field($model, 'id_bodega') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
