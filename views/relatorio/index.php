<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Relatório de Movimentações de Vinhos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="relatorio-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_movimento_produto',
            'nome_vinho',
            'bodega',
            'tipo_vinho',
            [
                'attribute' => 'data_movimento',
                'value' => function ($model) {
                        return Yii::$app->formatter->asDate($model['data_movimento'], 'php:d/m/Y');
                    },
            ],
            'qtd_movimento',
            [
                'attribute' => 'fl_movimento',
                'label' => 'Tipo de Movimento',
                'value' => function ($model) {
                        return $model['fl_movimento'] == 0 ? 'Entrada' : 'Saída';
                    }
            ],
        ],
    ]); ?>
</div>