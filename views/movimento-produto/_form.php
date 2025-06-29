<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MovimentoProduto $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $vinhos */
/** @var array $tiposMovimento */
?>

<div class="movimento-produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_vinho')->dropDownList(
        $vinhos,
        ['prompt' => 'Selecione um vinho']
    ) ?>

    <?= $form->field($model, 'data_movimento')->input('date') ?>

    <?= $form->field($model, 'qtd_movimento')->textInput(['type' => 'number', 'min' => 1]) ?>

    <?= $form->field($model, 'fl_movimento')->dropDownList(
        $tiposMovimento,
        ['prompt' => 'Selecione o tipo de movimento']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>