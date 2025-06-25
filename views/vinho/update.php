<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vinho $model */

$this->title = 'Update Vinho: ' . $model->id_vinho;
$this->params['breadcrumbs'][] = ['label' => 'Vinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_vinho, 'url' => ['view', 'id_vinho' => $model->id_vinho]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vinho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
