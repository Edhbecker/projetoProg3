<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MovimentoProdutoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="movimento-produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_movimento_produto') ?>

    <?= $form->field($model, 'id_vinho') ?>

    <?= $form->field($model, 'data_movimento') ?>

    <?= $form->field($model, 'qtd_movimento') ?>

    <?= $form->field($model, 'fl_movimento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
