
<div class="content ficha_ceatox">

    <div>
        <?
        $operador_id = $this->session->userdata('operador_id');
        $empresa_id = $this->session->userdata('empresa');
        $perfil_id = $this->session->userdata('perfil_id');
        ?>
        <?
        $empresa = $this->guia->listarempresa();
        ?>
        <h3 class="singular"><a href="#">Pagamento Cartão de Crédito</a></h3>
        <div>
            <fieldset>

            </fieldset>
            <!--<form name="form_guia" id="form_guia" action="<?= base_url() ?>ambulatorio/guia/gravardependentes" method="post">-->
            <fieldset>
                <legend>Dados do Paciente</legend>
                <div>
                    <label>Nome</label>                      
                    <input type="text" id="txtNome" name="nome"  class="texto09" value="<?= $paciente['0']->nome; ?>" readonly/>
                    <input type="hidden" id="txtpaciente_id" name="txtpaciente_id"  value="<?= $paciente_id; ?>"/>
                    <input type="hidden" id="txtcontrato_id" name="txtcontrato_id"  value="<?= $contrato_id; ?>"/>
                    
                </div>
                <div>
                    <label>Sexo</label>
                    <select name="sexo" id="txtSexo" class="size2">
                        <option value="M" <?
                        if ($paciente['0']->sexo == "M"):echo 'selected';
                        endif;
                        ?>>Masculino</option>
                        <option value="F" <?
                        if ($paciente['0']->sexo == "F"):echo 'selected';
                        endif;
                        ?>>Feminino</option>
                    </select>
                </div>

                <div>
                    <label>Nascimento</label>


                    <input type="text" name="nascimento" id="txtNascimento" class="texto02" alt="date" value="<?php echo substr($paciente['0']->nascimento, 8, 2) . '/' . substr($paciente['0']->nascimento, 5, 2) . '/' . substr($paciente['0']->nascimento, 0, 4); ?>" onblur="retornaIdade()" readonly/>
                </div>

                <div>

                    <label>Idade</label>
                    <input type="text" name="idade" id="txtIdade" class="texto01" alt="numeromask" value="<?= $paciente['0']->idade; ?>" readonly />

                </div>

                <div>
                    <label>Nome da M&atilde;e</label>


                    <input type="text" name="nome_mae" id="txtNomeMae" class="texto08" value="<?= $paciente['0']->nome_mae; ?>" readonly/>
                </div>
            </fieldset>

            <!--</form>-->
            <fieldset>
                <form name="form_guia" id="form_guia" action="<?= base_url() ?>ambulatorio/guia/gravarcartaoclienteiugu/<?= $paciente_id ?>/<?= $contrato_id ?>" method="post">
                    <fieldset>
                        <input type="hidden" id="cartao_id" name="cartao_id"  value="<?= @$cartao[0]->paciente_cartao_credito_id; ?>"/>
                        <legend>Cartão</legend>
                        <div>
                            
                            <label>Numero do Cartão (Apenas números)</label>                      
                            <input type="number" id="card_number" name="card_number" alt="" class="texto04" value="<?=@$cartao[0]->card_number?>" required/>
                        </div>
                        <div>
                            <label>Código de Segurança</label>                      
                            <input type="text" id="card_csv" maxlength="4" name="card_csv"  class="texto02" value="<?=@$cartao[0]->card_csv?>" required/>
                        </div>
                        <!--<br>-->
                        <!--                        <div>
                                                    <label>Código de Segurança</label>                      
                                                    <input type="text" id="card_csv" name="card_csv"  class="texto02" value="" required/>
                                                </div>-->

                    </fieldset>
                    <fieldset>
                        <legend>Vencimento</legend>
                        <div>
                            <label>Mês de Vencimento (Ex: 04)</label>                      
                            <input type="text" id="mes" name="mes" minlength="2"  maxlength="2" alt="" class="texto02" value="<?=@$cartao[0]->mes?>" required/>
                        </div>
                        <div>
                            <label>Ano de Vencimento (Ex: 2018)</label>                      
                            <input type="text" id="ano" name="ano" minlength="4"  maxlength="4" class="texto02" value="<?=@$cartao[0]->ano?>" required/>
                        </div>
                        <!--<br>-->
                        <!--                        <div>
                                                    <label>Código de Segurança</label>                      
                                                    <input type="text" id="card_csv" name="card_csv"  class="texto02" value="" required/>
                                                </div>-->

                    </fieldset>
                    <fieldset>
                        <legend>Nome do Titular</legend>
                        <div>
                            <label>Primeiro Nome</label>                      
                            <input type="text" id="first_name" name="first_name" alt="" class="texto02" value="<?=@$cartao[0]->first_name?>" required/>
                        </div>
                        <div>
                            <label>Sobrenome</label>                      
                            <input type="text" id="last_name" name="last_name"  class="texto02" value="<?=@$cartao[0]->last_name?>" required/>
                        </div>
                        <!--<br>-->
                        <!--                        <div>
                                                    <label>Código de Segurança</label>                      
                                                    <input type="text" id="card_csv" name="card_csv"  class="texto02" value="" required/>
                                                </div>-->

                    </fieldset>
                    <fieldset>
                        <legend>Cancelar Boletos Futuros? (Marcar irá cancelar os boletos futuros e associar o cartão aos pagamentos)</legend>
                        <div>
                            <!--<label>Primeiro Nome</label>-->                      
                            <input type="checkbox" id="deletarBoleto" name="deletarBoleto" alt="" class="texto02"/>
                        </div>
                        
                        <!--<br>-->
                        <!--                        <div>
                                                    <label>Código de Segurança</label>                      
                                                    <input type="text" id="card_csv" name="card_csv"  class="texto02" value="" required/>
                                                </div>-->

                    </fieldset>
                    <button type="submit">Enviar</button>
                </form>


            </fieldset>

        </div> 
    </div> 
</div> <!-- Final da DIV content -->
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/card_validator/jquery.creditCardValidator.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskedinput.js"></script>
<script type="text/javascript">
<?php if ($this->session->flashdata('message') != ''): ?>
                        alert("<? echo $this->session->flashdata('message') ?>");
<? endif; ?>
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
//                            $("#card_number").mask("99/99/9999");

//                            $(function () {
//                                $('#card_number').validateCreditCard(function (result) {
//                                    console.log(result);
////                                    if(result.valid && $('#card_number').val().length > 10 && $('#card_csv').val() != ''){
////                                        alert('Cartão Válido');
////                                    }else if(!result.valid && $('#card_number').val().length > 10){
////                                        alert('Cartão Inválido');
////                                    }
////                                    $('.log').html('Card type: ' + (result.card_type == null ? '-' : result.card_type.name)
////                                            + '<br>Valid: ' + result.valid
////                                            + '<br>Length valid: ' + result.length_valid
////                                            + '<br>Luhn valid: ' + result.luhn_valid);
//                                });
//                            });

                        $(function () {
                            $("#accordion").accordion();
                        });

</script>