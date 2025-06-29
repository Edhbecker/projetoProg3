<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MovimentoProduto $model */
/** @var array $vinhos */
/** @var array $tiposMovimento */

$this->title = 'Cadastrar Movimento de Produto';
$this->params['breadcrumbs'][] = ['label' => 'Movimento Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimento-produto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'vinhos' => $vinhos,
        'tiposMovimento' => $tiposMovimento,
    ]) ?>

</div>