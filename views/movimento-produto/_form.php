<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MovimentoProduto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="movimento-produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_vinho')->textInput() ?>

    <?= $form->field($model, 'data_movimento')->textInput() ?>

    <?= $form->field($model, 'qtd_movimento')->textInput() ?>

    <?= $form->field($model, 'fl_movimento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
