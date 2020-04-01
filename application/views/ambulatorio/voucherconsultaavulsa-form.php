<!--<link rel="stylesheet" href="<?php base_url() ?>css/jquery-ui-1.8.5.custom.css">-->
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<!--<script type="text/javascript" src="<?= base_url() ?>js/scripts.js" ></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.8.5.custom.min.js" ></script>
<script type="text/javascript">

    $(function () {
        $("#data").datepicker({
            autosize: true,
            changeYear: true,
            changeMonth: true,
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            buttonImage: '<?= base_url() ?>img/form/date.png',
            dateFormat: 'dd/mm/yy'
        });
    });

</script>
<style>
    td{
        width: 70px;
    }
</style>
<meta charset="UTF-8">
<body bgcolor="#C0C0C0">
    <div class="content"> <!-- Inicio da DIV content -->
        <h3 class="singular">Informações Voucher</h3>
        <div>
            <form name="form_faturar" id="form_faturar" action="<?= base_url() ?>ambulatorio/guia/gravarvoucherconsultaextra/<?= $consulta_avulsa_id; ?>/<?= $paciente_id; ?>/<?= $contrato_id; ?>" method="post">
                <fieldset>

                    <dl class="dl_desconto_lista">
                        <table>
                            <tr>
                                <td>
                                    Data:
                                </td>
                                <td>
                                    <input required style="width:100px;" type="text" id="data" name="data"  class="texto02" value="<?=(@$voucher[0]->data != '') ? date("d/m/Y",strtotime(@$voucher[0]->data)) : ''?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hora:
                                </td>
                                <td>
                                    <input required style="width:100px;" type="time" id="hora" alt="time" name="hora"  class="texto02" value="<?=(@$voucher[0]->horario != '') ? date("H:i", strtotime(@$voucher[0]->horario)) : ''?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Parceiro:
                                </td>
                                <td>
                                    <? $listarparceiro = $this->paciente->listarparceiros(); ?>
                                    <select name="parceiro_id" id="parceiro_id" class="size2" required>
                                        <option value='' >Selecione</option>
                                        <?php foreach ($listarparceiro as $item) {?>
                                            <option   value =<?php echo $item->financeiro_parceiro_id; ?> <?
                                                if (@$voucher[0]->parceiro_id == $item->financeiro_parceiro_id):echo 'selected';
                                                endif;
                                                ?>>
                                                <?php echo $item->fantasia; ?>
                                            </option>
                                        <? }?> 
                                                
                                            
                                    </select>
                                </td>
                            </tr>
                        </table>
                            
                        
                    </dl>    

                    <hr/>
                    <button type="submit" name="btnEnviar" >Enviar</button>
            </form>
            </fieldset>
        </div>
    </div> <!-- Final da DIV content -->
</body>
