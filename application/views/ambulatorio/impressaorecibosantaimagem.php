<meta charset="utf-8">
<?
$dataatualizacao = $exame[0]->data_autorizacao;
$totalpagar = 0;
$formapagamento = '';
$teste = "";
$teste2 = "";
$teste3 = "";
$teste4 = "";


$dataFuturo = date("Y-m-d");
$dataAtual = $paciente['0']->nascimento;
$date_time = new DateTime($dataAtual);
$diff = $date_time->diff(new DateTime($dataFuturo));
$idade = $diff->format('%Y');
?>

<table>
    <tbody>
        <tr style="text-align: center;">
            <td width="70%;" ><font size = -1><?= $exame[0]->razao_social; ?></td>
            <!--<td ><font size = -1>Emissao:<?= str_replace("-", "/", $emissao); ?></td>-->
        </tr>
        <tr style="text-align: center;">
            <td ><font size = -1><?= $exame[0]->logradouro; ?><?= $exame[0]->numero; ?> - <?= $exame[0]->bairro; ?></td>
            <td ></td>
        </tr>
        <tr style="text-align: center;">
            <td ><font size = -1>Fone: <?= $exame[0]->telefone; ?></td>
            <td ></td>
        </tr>
        <tr>
            <td style="text-align: center;" ><font size = +2><u>RECIBO</u></font></td>
        </tr>
        <!--<tr>
            <td ><font size = -1>N&SmallCircle;: <?= $exame[0]->agenda_exames_id; ?></font></td>
        </tr>-->

        <tr>
            <td ><font size = -1>DATA: <?= substr($exame[0]->data, 8, 2) . "/" . substr($exame[0]->data, 5, 2) . "/" . substr($exame[0]->data, 0, 4); ?> HORA: <?= substr($dataatualizacao, 10, 6); ?></font></td>
        </tr>
        <tr>
            <td ><font size = -1>Paciente: <?= utf8_decode($paciente['0']->nome); ?></font></td>
        </tr>
        <tr>
            <td ><font size = -1>D/N: <?= date("d/m/Y", strtotime(str_replace("/", "-", $paciente['0']->nascimento))); ?></font></td>
            <td ><font size = -1>Idade: <?= $idade; ?></font></td>
        </tr>
        <tr>
            <td ><font size = -1>CPF: <?= $paciente['0']->cpf; ?></font></td>
            <td ><font size = -1>RG: <?= $paciente['0']->rg; ?></font></td>
        </tr>
        <tr>
            <td ><font size = -1>Telefone: <?= $paciente['0']->telefone; ?>/<?= $paciente['0']->celular; ?></font></td>
            <!--<td ><font size = -1>RG: <?= $paciente['0']->rg; ?></font></td>-->
        </tr>
        <tr>
            <td ><font size = -1>Atendente: <?= $exames['0']->atendente; ?></font></td>
            <!--<td ><font size = -1>RG: <?= $paciente['0']->rg; ?></font></td>-->
        </tr>
        <tr>
            <td >
                <?
                foreach ($exames as $value) :
                    $convenios[] = utf8_decode($value->convenio);
                endforeach;
                $convenios = array_unique($convenios);
//                var_dump($convenios); die;
                $convenios = implode(' / ', $convenios);
                ?>
                <font size = -1>Convenio: <?= $convenios; ?>
                </font>
            </td>
        </tr>
        <tr>
            <td ><font size = -1>Previsão de Entrega: <?= substr($exame[0]->data_entrega, 8, 2) . "/" . substr($exame[0]->data_entrega, 5, 2) . "/" . substr($exame[0]->data_entrega, 0, 4) ?></font></td>
        </tr>
        <tr>
            <th ><font size = -1>-----------------------------------------------------------------------------</font></th>
        </tr>
        <tr>
            <td ><font size = -1>Procedimento</font></td>
            <td ><font size = -1>Valor</font></td>
        </tr>
        <?
        foreach ($exames as $item) :
            $totalpagar = $totalpagar + $item->valor_total;
            if ($item->formadepagamento != '') {
                $formas[] = $item->formadepagamento;
            }
            if ($item->formadepagamento2 != '') {
                $formas[] = $item->formadepagamento2;
            }
            if ($item->formadepagamento3 != '') {
                $formas[] = $item->formadepagamento3;
            }
            if ($item->formadepagamento4 != '') {
                $formas[] = $item->formadepagamento4;
            }

            if ($item->forma_pagamento != null && $item->formadepagamento != $teste && $item->formadepagamento != $teste2 && $item->formadepagamento != $teste3 && $item->formadepagamento != $teste4) {
                $teste = $item->formadepagamento;
                $formapagamento = $formapagamento . "/" . $item->formadepagamento;
            }
            if ($item->forma_pagamento2 != null && $item->formadepagamento2 != $teste && $item->formadepagamento2 != $teste2 && $item->formadepagamento2 != $teste3 && $item->formadepagamento2 != $teste4) {
                $teste2 = $item->formadepagamento2;
                $formapagamento = $formapagamento . "/" . $item->formadepagamento2;
            }
            if ($item->forma_pagamento3 != null && $item->formadepagamento3 != $teste && $item->formadepagamento3 != $teste2 && $item->formadepagamento3 != $teste3 && $item->formadepagamento3 != $teste4) {
                $teste3 = $item->formadepagamento3;
                $formapagamento = $formapagamento . "/" . $item->formadepagamento3;
            }
            if ($item->forma_pagamento4 != null && $item->formadepagamento4 != $teste && $item->formadepagamento4 != $teste2 && $item->formadepagamento4 != $teste3 && $item->formadepagamento4 != $teste4) {
                $teste4 = $item->formadepagamento4;
                $formapagamento = $formapagamento . "/" . $item->formadepagamento4;
            }
            ?>
            <tr>
                <td ><font size = -1>
                    <? echo utf8_decode($item->procedimento);
                    ?>
                    </font>
                </td>
                <td><font size = -1>
                    <?
                    echo
                    number_format($item->valor_total, 2, ',', '.');
                    ?>
                    </font>
                </td>

            <? endforeach; ?>
            <?
            $formas = array_unique($formas);
            $formas = implode(' / ', $formas);
//            var_dump($formas);
//            die;
            ?>
        </tr>
<!--    <td>
        <?= $item->valor_total ?>
</td>-->
        <tr>
            <td ><font size = -1>-------------------------------------------------------------</font></td>
        </tr>
        <tr>
            <td ><font size = -1><b>TOTAL R$ <?= number_format($totalpagar, 2, ',', '.') ?> <?= $formas; ?></b></font></td>
        </tr>
        <tr>
            <td ><font size = -1>-------------------------------------------------------------</font></td>
        </tr>
        <tr>
            <td ><font size = -1><b>TRAZER ESTA VIA PARA RECEBIMENTO DE EXAMES</b></font></td>
        </tr>

</table>

<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    window.print();


</script>