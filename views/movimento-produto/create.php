<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MovimentoProduto $model */

$this->title = 'Create Movimento Produto';
$this->params['breadcrumbs'][] = ['label' => 'Movimento Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimento-produto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
