<?php
$total = 0;
$tipoAtual = '';
$totalPorTipo = [];
?>
<div class="row clearfix">
    <div class="col-xs-12">
        <?php $this->load->view('v2/_parts/datatable', [ 'config' => [
            'titulo' => 'Relatório Entrada Conta',
            'driver' => 'object',
            'data' => $relatorioentrada,
            'columns' => [
                'Conta' => 'conta',
                'Nome' => 'razao_social',
                'Tipo' => [ 'tipo', function($tipo) use (&$tipoAtual) {
                    $tipoAtual = $tipo;
                    return $tipo;
                } ],
                'Classe' => 'classe',
                'Dt saída' => [ 'data', function($data) {
                    return preg_replace("/^(\d{4})\-(\d{2})\-(\d{2})$/", "$3/$2/$1", $data);
                } ],
                'Valor' => [ 'valor', function($valor) use (&$total, &$tipoAtual, &$totalPorTipo) {
                    if ($tipoAtual) {
                        if (!isset($totalPorTipo[$tipoAtual])) {
                            $totalPorTipo[$tipoAtual] = 0;
                        }
                        $totalPorTipo[$tipoAtual] += $valor;
                    }

                    $total += $valor;
                    return number_format($valor, 2, ",", ".");
                } ],
                'Observação' => 'observacao',
            ],
        ] ]); ?>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="icon bg-blue">
                <i class="material-icons">monetization_on</i>
            </div>
            <div class="content">
                <div class="text">Total</div>
                <div class="number">
                    <?= number_format($total, 2, ",", "."); ?>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($totalPorTipo as $tipo => $totalTipo) : ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="icon bg-blue">
                    <i class="material-icons">monetization_on</i>
                </div>
                <div class="content">
                    <div class="text"><?= $tipo; ?></div>
                    <div class="number">
                        <?= number_format($totalTipo, 2, ",", "."); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
