<div class="content ficha_ceatox"> <!-- Inicio da DIV content -->

<?php 
            
                
            if (@$empresa[0]->campos_cadastro_dependente != '') {
                $campos_obrigatorios_dependente = json_decode(@$empresa[0]->campos_cadastro_dependente);
            } else {
                $campos_obrigatorios_dependente = array();
            }
            
    ?>
    <form name="form_paciente" id="form_paciente" action="<?= base_url() ?>cadastros/pacientes/gravardependente" method="post">
        <fieldset>
            <legend>Dados do Paciente</legend>
            <div>
                <label>Nome *</label>                      
                <input type ="hidden" name ="paciente_id"  value ="<?= @$obj->_paciente_id; ?>" id ="txtPacienteId">
                <input type="text" id="txtNome" name="nome" class="texto10"  value="<?= @$obj->_nome; ?>" <?= (in_array('nome', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
            </div>
            <div>
                <label>Nascimento *</label>
                <input type="text" name="nascimento" id="txtNascimento" class="texto02" alt="date" value="<?php echo substr(@$obj->_nascimento, 8, 2) . '/' . substr(@$obj->_nascimento, 5, 2) . '/' . substr(@$obj->_nascimento, 0, 4); ?>" <?= (in_array('nascimento', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
            </div>
            <div>
                <label>RG</label>
                <input type="text" name="rg"  id="txtDocumento" class="texto04" maxlength="20" value="<?= @$obj->_documento; ?>" <?= (in_array('rg', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
            </div>
            <div>
                <label>&nbsp;</label>
                  <input type="checkbox" name="cpf_responsavel" id ="cpf_responsavel" <? if (@$obj->_cpf_responsavel_flag == 't') echo "checked"; ?>> CPF do resposável
            </div>
            <div>
                <label>CPF</label>
                <input type="text" name="cpf" id ="txtcpf" maxlength="11" alt="cpf" class="texto02" value="<?= @$obj->_cpf; ?>" onblur="verificarCPF()" <?= (in_array('cpf', $campos_obrigatorios_dependente)) ? 'required' : ''; ?> />
              
            </div>
            <div>
                <label>Grau de Parentesco</label>
                <input type="text"  name="grau_parentesco" id="grau_parentesco" class="texto06" value="<?= @$obj->_nomepai; ?>" <?= (in_array('grau_parentesco', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
            </div>
            <div>
                <label>Sexo</label>
                <select name="sexo" id="txtSexo" class="size1" <?= (in_array('sexo', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>>
                    <option value="" <?
                    if (@$obj->_sexo == ""):echo 'selected';
                    endif;
                    ?>>Selecione</option>
                    <option value="M" <?
                    if (@$obj->_sexo == "M"):echo 'selected';
                    endif;
                    ?>>Masculino</option>
                    <option value="F" <?
                    if (@$obj->_sexo == "F"):echo 'selected';
                    endif;
                    ?>>Feminino</option>
                </select>
            </div>
            <div>
                <label>Parceiro</label>

                <? $listarparceiro = $this->paciente->listarparceiros(); ?>
                <select name="financeiro_parceiro_id" id="parceiro_id" class="size2" <?= (in_array('parceiro', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>>
                    <option value='' >selecione</option>
                    <?php
                    if (count($listarparceiro) == 1) {
                        $true = "selected";
                    } else {
                        $true = "";
                    }

                    foreach ($listarparceiro as $item) {
                        ?>

                        <option   value =<?php echo $item->financeiro_parceiro_id; ?> <?
                        if (@$obj->_financeiro_parceiro_id == $item->financeiro_parceiro_id):echo 'selected';
                        endif;
                        if ($true != "") {
                            echo $true;
                        }
                        ?>><?php echo $item->fantasia; ?></option>
                                  <?php
                              }
                              ?> 
                </select>
            </div>
            <div>
                <label>Cód. Paciente</label>
                <input type="text" id="cod_pac" class="texto02" name="cod_pac" <?= (in_array('cod_paciente', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
            </div>

            <div>
                <label>Reativar</label> 
                <input type="checkbox"  name="reativar" id="reativar" <?= (in_array('reativar', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>>
            </div>
            <div>
                <label>Endere&ccedil;o *</label>
                <input type="text" id="txtendereco" class="texto10" name="endereco" value="<?= @$obj->_endereco; ?>" <?= (in_array('endereco', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
            </div>
            <div>
                <label>N&uacute;mero</label>


                <input type="text" id="txtNumero" class="texto02" name="numero" value="<?= @$obj->_numero; ?>" <?= (in_array('numero', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
            </div>
            <div>
                <label>Complemento</label>


                <input type="text" id="txtComplemento" class="texto04" name="complemento" value="<?= @$obj->_complemento; ?>" <?= (in_array('complemento', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
            </div>
            <div>
                <label>Bairro *</label>


                <input type="text" id="txtBairro" class="texto03" name="bairro" value="<?= @$obj->_bairro; ?>" <?= (in_array('bairro', $campos_obrigatorios_dependente)) ? 'required' : ''; ?> />
            </div>


            <div>
                <label>Município *</label>


                <input type="hidden" id="txtCidadeID" class="texto_id" name="municipio_id" value="<?= @$obj->_cidade; ?>" readonly="true" />
                <input type="text" id="txtCidade" class="texto04" name="txtCidade" value="<?= @$obj->_cidade_nome; ?>" <?= (in_array('municipio', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
            </div>
            <div>
                <label>CEP</label>


                <input type="text" id="cep" class="texto02" name="cep" alt="cep" value="<?= @$obj->_cep; ?>" <?= (in_array('cep', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
            </div>

            <div>
                    <label>Telefone</label>
                <input type="text" id="txtTelefone" class="texto02" name="telefone" alt="(99) 99999-9999" value="<?= @$obj->_telefone; ?>" <?= (in_array('telefone1', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
                </div>

                <div>
                    <label>Celular *</label>
                    <input type="text" id="txtCelular" class="texto02" name="celular" alt="(99) 99999-9999" value="<?= @$obj->_celular; ?>" <?= (in_array('telefone2', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>/>
                </div>
            <?php if($empresapermissao[0]->forma_dependente == "t"){?>
             <div>
                <label>Forma Pagamento </label>
                <select name="forma_rendimento_id" id="forma_rendimento_id" class="size2" <?= (in_array('forma_pagamento', $campos_obrigatorios_dependente)) ? 'required' : ''; ?>>
                    <option value="" >Selecione</option>
                    <?php
                    $forma = $this->formapagamento->listarformaRendimentoPaciente();
                    foreach ($forma as $item) {
                        ?>
                        <option   value =<?php echo $item->forma_rendimento_id; ?>><?php echo $item->nome; ?></option>
                        <?php
                    }
                    ?> 
                </select>  
            </div>
            <?php }?>

            

            <fieldset>
                <legend>Titular</legend>
                <div>
                    <label>Nome</label>
                    <input type="text" id="txtNomeid" class="texto_id" name="txtNomeid" readonly="true" />
                    <input type="text" id="txtNomepaciente" name="txtNomepaciente" class="texto10"/>
                </div>

            </fieldset>


        </fieldset>
        <button type="submit">Enviar</button>
        <button type="reset">Limpar</button>

        <a href="<?= base_url() ?>cadastros/pacientes">
            <button type="button" id="btnVoltar">Voltar</button>
        </a>

    </form>

</div> <!-- Final da DIV content -->
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskedinput.js"></script>
<script type="text/javascript">


                    $("#txtNascimento").mask("99/99/9999");
                    $("#txtcpf").mask("999.999.999-99");
                    $("#txtCelular").mask("(99) 9?9999-9999");
                    $("#txtTelefone").mask("(99) 9?9999-9999");
                    $("#cep").mask("99999-999");
                    $(function () {
                        $("#txtcbo").autocomplete({
                            source: "<?= base_url() ?>index.php?c=autocomplete&m=cboprofissionais",
                            minLength: 3,
                            focus: function (event, ui) {
                                $("#txtcbo").val(ui.item.label);
                                return false;
                            },
                            select: function (event, ui) {
                                $("#txtcbo").val(ui.item.value);
                                $("#txtcboID").val(ui.item.id);
                                return false;
                            }
                        });
                    });

                    $(function () {
                        $("#txtCidade").autocomplete({
                            source: "<?= base_url() ?>index.php?c=autocomplete&m=cidade",
                            minLength: 3,
                            focus: function (event, ui) {
                                $("#txtCidade").val(ui.item.label);
                                return false;
                            },
                            select: function (event, ui) {
                                $("#txtCidade").val(ui.item.value);
                                $("#txtCidadeID").val(ui.item.id);
                                return false;
                            }
                        });
                    });
                    $(function () {
                        $("#txtEstado").autocomplete({
                            source: "<?= base_url() ?>index.php?c=autocomplete&m=estado",
                            minLength: 2,
                            focus: function (event, ui) {
                                $("#txtEstado").val(ui.item.label);
                                return false;
                            },
                            select: function (event, ui) {
                                $("#txtEstado").val(ui.item.value);
                                $("#txtEstadoID").val(ui.item.id);
                                return false;
                            }
                        });
                    });



                    $(function () {
                        $("#txtNomepaciente").autocomplete({
                            source: "<?= base_url() ?>index.php?c=autocomplete&m=pacientetitular",
                            minLength: 3,
                            focus: function (event, ui) {
                                $("#txtNomepaciente").val(ui.item.label);
                                return false;
                            },
                            select: function (event, ui) {
                                $("#txtNomepaciente").val(ui.item.value);
                                $("#txtNomeid").val(ui.item.id);
                                $("#txtTelefone").val(ui.item.itens);
                                $("#nascimento").val(ui.item.valor);
                                $("#txtEnd").val(ui.item.endereco);
                                return false;
                            }
                        });
                    });
                    
                    function verificarCPF() {
                        // txtcpf
                        var cpf = $("#txtcpf").val();
                        var paciente_id = $("#txtPacienteId").val();
                        if ($('#cpf_responsavel').prop('checked')) {
                            var cpf_responsavel = 'on';
                        } else {
                            var cpf_responsavel = '';
                        }
                        $.getJSON('<?= base_url() ?>autocomplete/verificarcpfpaciente', {cpf: cpf, cpf_responsavel: cpf_responsavel, paciente_id: paciente_id, ajax: true}, function (j) {
                            if (j != '') {
                                alert(j);
                                $("#txtcpf").val('');
                            }
                        });
                 }

</script>
