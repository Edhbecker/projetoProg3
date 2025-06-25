<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
?>

<h1>Login</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'nome') ?>
<?= $form->field($model, 'senha')->passwordInput() ?>

<div class="form-group">
    <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
