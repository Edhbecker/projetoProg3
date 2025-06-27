<?php

/** @var yii\web\View $this */
/** @var array $relatorio */

use yii\helpers\Html;

$this->title = 'Relatório Geral';
?>

<div class="site-index">
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Vinhos</h1>
        <p class="lead">Informações de estoque, fornecedores e tipos de vinho.</p>
    </div>

    <div class="body-content">
        <?php if (!empty($relatorio)): ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do Vinho</th>
                        <th>Safra</th>
                        <th>Tipo</th>
                        <th>Bodega</th>
                        <th>Fornecedor</th>
                        <th>Teor (%)</th>
                        <th>Preço (R$)</th>
                        <th>Estoque</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($relatorio as $index => $vinho): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= Html::encode($vinho['nome_vinho']) ?></td>
                            <td><?= Html::encode($vinho['safra']) ?></td>
                            <td><?= Html::encode($vinho['tipo']) ?></td>
                            <td><?= Html::encode($vinho['bodega']) ?></td>
                            <td><?= Html::encode($vinho['fornecedor']) ?></td>
                            <td><?= Html::encode($vinho['teor']) ?></td>
                            <td>R$ <?= number_format($vinho['preco'], 2, ',', '.') ?></td>
                            <td><?= Html::encode($vinho['qtd_estoque']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Nenhum dado encontrado.</div>
        <?php endif; ?>
    </div>
</div>