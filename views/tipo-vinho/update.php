<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TipoVinho $model */

$this->title = 'Update Tipo Vinho: ' . $model->id_tipo_vinho;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Vinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_vinho, 'url' => ['view', 'id_tipo_vinho' => $model->id_tipo_vinho]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-vinho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
