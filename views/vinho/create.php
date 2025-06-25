<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vinho $model */

$this->title = 'Create Vinho';
$this->params['breadcrumbs'][] = ['label' => 'Vinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vinho-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
