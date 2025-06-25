<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FornecedorVinho $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fornecedor-vinho-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_fornecedor')->textInput() ?>

    <?= $form->field($model, 'id_vinho')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
