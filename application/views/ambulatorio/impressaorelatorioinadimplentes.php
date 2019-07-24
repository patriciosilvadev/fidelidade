<meta charset="utf-8">

<style>
    td{
        font-family: arial;
    }
</style>
<title>Relatório</title>
<div class="content"> <!-- Inicio da DIV content -->
    <h4>RELATORIO DE INADIMPLENTES</h4>
    <h4>PERIODO: <?= $txtdata_inicio; ?> ate <?= $txtdata_fim; ?></h4>
    <h4>BAIRRO: <?= ($_POST['bairro'] != '') ? $_POST['bairro'] : 'TODOS' ?></h4>
    <h4>FORMA DE PAGAMENTO: <?
        if (@$_POST['forma_pagamento'] == 'manual') {
            echo "MANUAL";
        } else if (@$_POST['forma_pagamento'] == 'cartao') {
            echo "CARTÃO";
        } else if (@$_POST['forma_pagamento'] == 'debito') {
            echo "DEBÍTO";
        } else if (@$_POST['forma_pagamento'] == 'boleto_emp') {
            echo "BOLETO EMPRESA";
        } else if (@$_POST['forma_pagamento'] == 'boleto') {
            echo "BOLETO";
        } else {
            echo "TODOS";
        }
        ?>
    </h4>
    <h4>ORDENAR POR: <?
        if (@$_POST['ordenar'] == 'order_nome') {
            echo "NOME";
        } elseif (@$_POST['ordenar'] == 'order_bairro') {
            echo "BAIRRO";
        }else{
            
        }
        ?>
    </h4>

    <hr>
    <table border="1">
<?
if (count($relatorio) > 0) {
    ?> 
            <?php
            foreach ($relatorio as $item) :
                @$cont_parcelas{$item->paciente_id}{$item->valor} ++;
                @$datas{$item->paciente_id}{$item->valor}[] = $item->data;
            endforeach;
            ?>


            <thead>
                <tr>
                    <th class="tabela_header">Numero do Cliente</th>
                    <th class="tabela_header">Nome</th>
                    <th class="tabela_header">Endereço</th>
                    <th class="tabela_header">Bairro</th>
                    <th class="tabela_header">Complemento</th>
                    <th class="tabela_header">Fone</th>
                    <th class="tabela_header">Data</th>
                    <th class="tabela_header">Parcelas</th>
                    <th class="tabela_header">Valor</th>

                </tr>
            </thead>
            <tbody>
    <?php
    $total = 0;

    foreach ($relatorio as $item) :
        $total = $total + $item->valor;
///////////////////////////////////////////////////////////////////////////////////////////                
//////-> verifica se o paciente já foi colocado na tabela com o valor dele, eu botei o valor e o id do paciente pq: se o cara tiver adesão vai mostrar separado.
        if (@$verificar{$item->paciente_id}{$item->valor} >= 1) {
            
        } else {
            @$qtd_pacientes++;
            @$qtd_parcelas += $cont_parcelas{$item->paciente_id}{$item->valor};
            ?>
                        <tr>
                            <td >  <?= @$item->paciente_id; ?></td>
                            <td ><?= @$item->nome; ?></td>
                            <td ><?= @$item->logradouro . " " . $item->numero . " " . $item->complemento . " "; ?></td>
                            <td ><?= @$item->bairro ?></td>
                            <td ><?= @$item->complemento ?> </td>
                            <td ><?= @$item->celular . "/" . $item->telefone; ?></td>
                            <td ><?
            foreach (@$datas{$item->paciente_id}{$item->valor} as $data) {
                echo substr(@$data, 8, 2) . "/" . substr(@$data, 5, 2) . "/" . substr(@$data, 0, 4) . "<br>";
            }
            ?></td>
                            <td ><?= @$cont_parcelas{$item->paciente_id}{$item->valor}; ?></td>
                            <td ><?= number_format($item->valor, 2, ",", "."); ?></td>


                        </tr>
            <?
            @$verificar{$item->paciente_id}{$item->valor} ++;
        } endforeach;
    ?>
                <tr>
                    <td colspan="2"><b>TOTAL</b></td>
                    <td colspan="2"><b><?= number_format($total, 2, ",", "."); ?></b></td>
                </tr>
            </tbody> 
    <?
} else {
    ?>
            <h4>N&atilde;o h&aacute; resultados para esta consulta.</h4>
            <?
        }
        ?>
    </table>

</div> <!-- Final da DIV content -->
<br><br>
<? if (count($relatorio) > 0) {
    ?>
    <table border='2'>
        <tr>
            <td><b>Total de clientes</b></td>
            <td><?= @$qtd_pacientes; ?></td>

        </tr>
        <tr>
            <td><b>Total de parcelas</b></td>
            <td><?= @$qtd_parcelas; ?></td>
        </tr> 


    </table>
    <br><br><br><br><br><br>

    <?
}
?>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="<?php base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript">



    $(function () {
        $("#accordion").accordion();
    });

</script>