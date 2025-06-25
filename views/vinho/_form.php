<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Vinho $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vinho-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'safra')->textInput() ?>

    <?= $form->field($model, 'preco')->textInput() ?>

    <?= $form->field($model, 'teor')->textInput() ?>

    <?= $form->field($model, 'qtd_estoque')->textInput() ?>

    <?= $form->field($model, 'id_tipo_vinho')->textInput() ?>

    <?= $form->field($model, 'id_bodega')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
