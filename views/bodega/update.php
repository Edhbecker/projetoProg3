<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bodega $model */

$this->title = 'Update Bodega: ' . $model->id_bodega;
$this->params['breadcrumbs'][] = ['label' => 'Bodegas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bodega, 'url' => ['view', 'id_bodega' => $model->id_bodega]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bodega-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
