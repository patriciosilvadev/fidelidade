<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="pt-BR" >
    <head>
        <title>STG - CLINICAS v1.0</title>
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link href="<?= base_url() ?>css/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>css/forms.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>css/form-style.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>css/form-structure.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>css/login.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>

    </head>

    <style>
        #div_mensagem{
            height:auto;
            width: 500px; 


        }
        #mensagem_lado{ 
            position: absolute;
            /*border:1px solid red;*/
            width: 100%;
            margin-top:70px;


        }
    </style>
    <body> 


        <div class="header">
            <div id="imglogo">
                <img src="<?= base_url(); ?>img/stg - logo.jpg" alt="Logo"
                     title="Logo" height="70" id="Insert_logo"/>
                <div id="sis_info">SISTEMA DE GESTAO DE CLINICAS - v1.0</div>
            </div>
        </div>


        <div id="login">
            <div id="login-box">
                <h2>Verificar</h2>
                <form name="form_login" id="form_login" action="<?= base_url() ?>verificar/validarcpf"
                      method="post"> 

                    <div>
                        <label id="labelUsuario">CPF</label>
                        &nbsp;<input type="text" id="cpf" name="cpf" maxlength="11" class="texto05" value="<?= @$obj->_login; ?>" />  
                    </div>

                    <div>
                        <label id="labelUsuario">Matrícula  </label>
                        &nbsp;<input type="number" id="paciente_id" name="paciente_id" class="texto05" min="1" pattern="^[0-9]+" />  
                    </div>

                    <div>
                        <label id="labelUsuario">Nome  </label>
                        &nbsp;<input type="text" id="nome" name="nome" class="texto05"   />  
                    </div>

                    <div style="padding-left: 110px;">
                        <button type="submit" name="btnEnviar">Verificar</button>  
                    </div>


                </form>

            </div>
        </div>



        <?
//       echo "<pre>";
//       print_r($titulares);
        if (@$titulares) {  
            foreach (@$titulares as $item) { 
                $numero_consultas_aut = 1;
//        var_dump($grupo); die; 
                $data = date("Y-m-d");

                $listadependentes = $this->paciente->listardependentescontrato(@$item->paciente_contrato_id);
//         echo "<pre>";
//         var_dump($datateste );  
                if (count($titulares) > 0) {
                    $paciente_id = @$item->paciente_id;
                    @$paciente_nome_titular = @$item->nome; 

//        var_dump($paciente_informacoes); die;
//        $paciente_informacoes = $this->paciente_m->listardados($_POST['txtNomeid']);
                    if (@$item->situacao == 'Dependente') {
                        $dependente = true;
                    } else {
                        $dependente = false;
                    }

                    if ($dependente) {
                        $retorno = $this->guia->listarparcelaspacientedependente($paciente_id);
//                $paciente_id = $retorno[0]->paciente_id;
                        @$paciente_titular_id = $retorno[0]->paciente_id;
//            $paciente_dependente_id = $paciente_informacoes[0]->paciente_id;
                    } else {
//            $paciente_id = $_POST['txtNomeid'];
                        $paciente_titular_id = $paciente_id;
                        $paciente_dependente_id = null;
                    }

                    $parcelas = $this->guia->listarparcelaspaciente($paciente_titular_id); // Traz as paarcelas que ja estão pagas
                    $parcelasPrevistas = $this->guia->listarparcelaspacienteprevistas($paciente_titular_id); // Traz as parcelas anteriores a data atual

                    $parcelas_nao_paga = $this->guia->listarparcelaspacientetotal($paciente_titular_id);
                    $quantidade_parcelas = $this->guia->listarnumpacelas($paciente_titular_id);
                    $quantidade_parcelas_pagas = $this->guia->listarparcelaspagas($paciente_titular_id);
                    //verificando se tem parcelas não pagas  com o $parcelas_nao_paga, depois verifica a quantidade de parcelas que esse paciente tem, depois verifica se a quantidade de parcelas pagas é igual a quantidade de parcelas que o paciente posssui.
                    if (count($parcelas_nao_paga) == 0 && count($quantidade_parcelas) > 0 && count($quantidade_parcelas_pagas) == count($quantidade_parcelas)) {
                        //caso entre aqui ele está liberado;
//                $this->verificarcpf('true', $paciente_nome_titular, $listadependentes);

                        $carencia = 't';

                        echo "<br><br><br><div id='div_mensagem'>Carencia liberada<br>";
                        echo "Titular:<b>" . @$item->nome . "</b><br>";


                        echo "<pre>";
                        foreach ($listadependentes as $value) {
                            if ($value->nome != $item->nome) {

                                echo "Dependente:<b title='$value->nome'>" . $value->nome;
                                echo "</b><br>";
                            }
                        }
                        echo " </div>";
                    } else {

                        if (count($parcelas) >= count($parcelasPrevistas)) { // Verifica se as parcelas estão em dia
                            $carencia = $this->guia->listarparcelaspacientecarencia($paciente_titular_id);
                            $grupo = 'CONSULTA';

                            $listaratendimento = $this->guia->listaratendimentoparceiro($paciente_titular_id, $grupo);
//                $listaragendamentocriado = array();
                            // So quem pode usar da carencia são procedimentos do grupo consulta.
                            $carencia_exame = 0; /* $carencia[0]->carencia_exame; */
                            $carencia_exame_mensal = 0; /* $carencia[0]->carencia_exame_mensal; */
                            $carencia_especialidade = 0; /* $carencia[0]->carencia_especialidade; */
                            $carencia_especialidade_mensal = 0; /* $carencia[0]->carencia_especialidade_mensal; */
                            @$carencia_consulta = $carencia[0]->carencia_consulta;
                            @$carencia_consulta_mensal = $carencia[0]->carencia_consulta_mensal;

                            // COMPARANDO O GRUPO E ESCOLHENDO O VALOR DE CARÊNCIA PARA O GRUPO DESEJADO
                            if ($grupo == 'EXAME') {
                                $carencia = (int) $carencia_exame;
                                $carencia_mensal = $carencia_exame_mensal;
                            } elseif ($grupo == 'CONSULTA') {
                                $carencia = (int) $carencia_consulta;
                                $carencia_mensal = $carencia_consulta_mensal;
                            } elseif ($grupo == 'FISIOTERAPIA' || $grupo == 'ESPECIALIDADE') {
                                $carencia = (int) $carencia_especialidade;
                                $carencia_mensal = $carencia_especialidade_mensal;
                            }

                            //            var_dump($carencia_mensal); die;
                            $parcelas_mensal = $this->guia->listarparcelaspacientemensal($paciente_titular_id);
                            if ($carencia_mensal == 't') {
                                $listaratendimentomensal = $this->guia->listaratendimentoparceiromensal($paciente_titular_id, $grupo);
                                //            var_dump($listaratendimentomensal);
                                //            die;

                                if (count($listaratendimentomensal) == 0 && count($parcelas_mensal) > 0) {
                                    $carencia_mensal_liberada = 't';
                                } else {
                                    $carencia_mensal_liberada = 'f';
                                }
                            }
                            $dias_parcela = 30 * count($parcelas);
                            $dias_atendimento = $carencia * count($listaratendimento);
                            $carencia_necessaria = $carencia * $numero_consultas_aut;
                            // Divide o número de dias da parcela pelo de atendimentos. Caso não exista atendimento, iguala a zero para poder entrar na condição abaixo
                            // Abaixo tem vários var_dumps para saber algumas coisas. Eles são de deus. Eles me fizeram conseguir concluir essa parada
                            // 
//                        echo '<pre>';
//                        var_dump($paciente_titular_id);
//                        var_dump($grupo);
//                        var_dump($carencia);
//                        var_dump($dias_parcela);
//                        var_dump($dias_atendimento);
//                        var_dump($parcelas);
//                        var_dump($parcelas_mensal);
//                        var_dump($listaratendimento);
//                        die;
                            // Nesse caso, se o número de dias de parcela que ele tem menos o número de dias de atendimento (carência x numero de atendimentos) que ele tem for maior que a carência
                            // o sistema vai gravar. 
                            //
            //
                if ($carencia_mensal == 't') {
                                if ($carencia_mensal_liberada == 't') {
                                    $carencia_liberada = 't';
                                } else {
                                    $carencia_liberada = 'f';
                                }
                            } else {
                                if ((($dias_parcela - $dias_atendimento) >= $carencia_necessaria) && $dias_parcela > 0) {
                                    // Caso o paciente tenha carência, ele faz o exame de graça, caso não, ele cai na condição abaixo que grava na tabela exames como false
                                    // Assim ele vai ter que pagar, porem, com um desconto cadastrado já como o valor do procedimento na clinica
                                    $carencia_liberada = 't';
                                } else {
                                    $carencia_liberada = 'f';
                                }
                            }
//                var_dump($carencia_mensal); die;
                            //        $carencia_liberada = 'f';
                            // Caso o cliente não tenha carência, o sistema vai buscar consultas avulsas
                            if ($carencia_liberada == 'f') {

                                $listarconsultaavulsa = $this->guia->listarconsultaavulsaliberada($paciente_titular_id);
                                //                var_dump($listarconsultaavulsa); die;
                                if (count($listarconsultaavulsa) > 0) {
                                    $consulta_avulsa_id = $listarconsultaavulsa[0]->consultas_avulsas_id;
                                    $tipo_consulta = $listarconsultaavulsa[0]->tipo;
                                    $carencia_liberada = 't';
                                } else {
                                    $tipo_consulta = '';
                                }
                            } else {
                                @$listarconsultaavulsa = array();
                                @$tipo_consulta = '';
                            }

                            /* Se no fim das contas se tudo der errado, a variável carencia_liberada vai conter a informacao 'f'que irá ser salva na linha da consulta
                              no banco, para dessa forma o sistema cobrar o valor do exame ao invés de utilizar da carência */

                            if ($carencia_liberada == 't') {
//                    echo json_encode('true');
//                        $this->verificarcpf('true', $paciente_nome_titular, $listapendentes);
                                $carencia = 'true';
                                echo "<br><br><br><div id='div_mensagem'>Carencia liberada<br>";
                                echo "Titular:<b>" . @$item->nome . "</b><br>";



                                foreach ($listadependentes as $value) {
                                    if ($value->nome != $item->nome) {

                                        echo "Dependente:<b title='$value->nome'>" . $value->nome;
                                        echo "</b><br>";
                                    }
                                }
                                echo " </div>";
                            } else {
//                    echo json_encode('false');
//                        $this->verificarcpf('false');
                                $carencia = 'false';

                                echo "<br><br><br><div id='div_mensagem'>Carência não-liberada <br>";
                                echo "Titular:<b>" . @$item->nome . "</b><br>";
                                foreach ($listadependentes as $value) {
                                    if ($value->nome != $item->nome) {
                                        echo "Dependente:<b title='$value->nome'>" . $value->nome;
                                        echo "</b><br>";
                                    }
                                }
                                echo " </div>";
                            }
                        } else {
//                echo json_encode('pending');
//                    $this->verificarcpf('pending');
                            $carencia = 'pending';


                            echo "<br><br><br><div id='div_mensagem'>Pendência<br>";
                            echo "Titular:<b>" . @$item->nome . "</b><br>";
                            foreach ($listadependentes as $value) {
                                if ($value->nome != $item->nome) {
                                    echo "Dependente:<b title='$value->nome'>" . $value->nome;
                                    echo "</b><br>";
                                }
                            }
                            echo " </div>";
                        }
                    }
                } else {
//            echo json_encode('no_exists');
//            $this->verificarcpf('no_exists');
                    $carencia = 'no';
                }
            }
        }
        ?>

        <?php
        $listarempresalogada = $this->empresa->listarempresalogada();
        if (count(@$titulares) <= 0 && @$mensagem == "") {
            echo "<br><br><br><div id='div_mensagem'>  ";
            echo "Cliente não Cadastrado<br>Favor verificar junto a empresa<br>" . $listarempresalogada[0]->nome . "<br>";
            echo " </div>";
        }
        ?>


        <div id="mensagem_lado">
        <?php
        if (strlen(@$mensagem)) {
            $divMensagem = "<div id='div_mensagem'>" . @$mensagem . "</div>";
            echo $divMensagem;
            unset($mensagem);
        }
        ?>

        </div>



    </body>
</html>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">




//    document.addEventListener('click', function (e) {
//
//        var self = e.target;
//
//        if (['cpf', 'paciente_id'].indexOf(self.id) !== -1) {
//            var el = document.getElementById(self.id === 'cpf' ? 'paciente_id' : 'cpf');
//
//            self.removeAttribute('disabled');
//
//            el.setAttribute('disabled', '');
//            el.value = "";
//        }
//    })






    $(document).ready(function () {
        jQuery('#form_login').validate({
            rules: {
                txtLogin: {
                    required: true,
                    minlength: 3
                },
                txtSenha: {
                    required: true,
                    minlength: 3
                },
                txtempresa: {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                txtLogin: {
                    required: "",
                    minlength: "!"
                },
                txtSenha: {
                    required: "",
                    minlength: "!"
                },
                txtempresa: {
                    required: "",
                    minlength: "!"
                }
            }
        });
    });

</script>