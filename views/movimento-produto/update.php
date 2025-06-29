<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MovimentoProduto $model */
/** @var array $vinhos */
/** @var array $tiposMovimento */

$this->title = 'Atualizar Movimento Produto: ' . $model->id_movimento_produto;
$this->params['breadcrumbs'][] = ['label' => 'Movimento Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_movimento_produto, 'url' => ['view', 'id_movimento_produto' => $model->id_movimento_produto]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="movimento-produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'vinhos' => $vinhos,
        'tiposMovimento' => $tiposMovimento,
    ]) ?>

</div>
