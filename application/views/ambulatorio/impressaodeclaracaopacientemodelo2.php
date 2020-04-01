<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <style>
            td{
                font-family: arial;
            }
            .cor_vermelha{
                color: red;
                font-size: 13px;
            }
            .maior{
                font-size: 15px !important;
            }
            .letramenor{
                font-size: 13px;
            }
            .quebrar_pagina{
                page-break-before: always
            }
            .cabecalho{
                font-size: 22px !important;
            }

        </style>
    </head>
    <body>
        <?php
//        echo "<pre>";
//        print_r($paciente);
//        die;
        ?>
        <table border="0">
        <tr >
         <td>
            <table>
                <tr><td class='cor_vermelha'>“Tudo podemos em Deus, pois Ele nos fortalece"</td></tr>
                <tr><td class='cor_vermelha'>Filipenses 4:13</td><tr>
                <tr><td class='cor_vermelha'></td></tr>
                <tr><td class='cor_vermelha maior'>Nós já aderimos a Código de Ética dos Corretores de Seguros</td></tr>
            </table>
         </td>
         <!-- align="right" -->
         <td>
             <table>
                <tr><td style="width:150px"><img style="width:80%" src="<?= base_url() . "upload/empresalogo/" . @$empresa_id . "/" . @$arquivo_pasta[0] ?>" ></td></tr>
             </table>
         </td>
        </tr>
        </table>

        <table class="letramenor">
        <tr>
        <td>De acordo com o texto, o valor máximo de indenização do é de R$ 10.000,00, a ser pago em casos de morte ou invalidez total permanente.</td>
        </tr>
        </table>


        <table border="1" align="center" style="width:100%;" class="letramenor" CELLSPACING="0" CELLPADDING="2">
           <tr>
            <th>Danos Corporais Totais <br> Repercussão na Íntegra do Patrimônio Físico</th>
            <th >Percentual <br> da Perda</th>
           <tr>

           <tr>
           <td>Perda anatômica e/ou funcional completa de ambos os membros superiores ou inferiores</td>
           <td rowspan="9" align="center">100</td>
           </tr>

           <tr>
           <td>Perda anatômica e/ou funcional completa de ambas as mãos ou de ambos pés</td>
           </tr>
           
           <tr>
           <td>Perda anatômica e/ou funcional completa de um membro superior e de um membro inferior</td>
           </tr>
                      
           <tr>
           <td>Perda completa da visão em ambos os olhos (cegueira bilateral) ou cegueira legal bilateral</td>
           </tr>
                      
           <tr>
           <td>Lesões neurológicas que cursem com: (a) dano cognitivo-comportamental</td>
           </tr>
                      
           <tr>
           <td>alienante; (b) impedimento do senso de orientação espacial e/ou do livre</td>
           </tr>
                      
           <tr>
           <td>deslocamento corporal; (c) perda completa do controle esfincteriano; (d)</td>
           </tr>
                      
           <tr>
           <td>comprometimento de função vital ou autonômica</td>
           </tr>
                      
           <tr>
           <td>Lesões de orgãos e estruturas crânio-faciais, cervicais, torácicos, abdominais <br>
           pélvicos ou retro-peritoneais cursando com prejuizos funcionais não compensáveis <br>
           de ordem autonômica, respiratória, cardiovascular, digestiva, excretora ou de <br>
           qualquer outra espécie, desde que haja comprometimento de função vital</td>
           </tr>

           <tr>
            <th>Danos Corporais Segmentares (Parciais) <br> Repercussão em Partes de Membros Superiores e Inferiores</th>
            <th>Percentuais <br> da Perda</th>
           <tr>

           <tr>
           <td>Perda anatômica e/ou funcional completa de um dos membros superiores e/ou <br>
           de uma das mãos</td>
           <td rowspan="2" align="center">70</td>
           </tr>

           <tr>
           <td>Perda anatômica e/ou funcional completa de um dos membros inferiores</td>
           </tr>

           <tr>
           <td>Perda anatômica e/ou funcional completa de um dos pés</td>
           <td align="center">50</td>
           </tr>

           <tr>
            <td> Perda completa de mobilidade de um dos ombros, cotovelos, punhos ou dedo <br> polegar</td>
            <td rowspan="2" align="center">25</td>
           </tr>

           <tr>
           <td>Perda completa da mobilidade de um quadril, joelho ou tornozelo</td>
           </tr>

           <tr>
            <td> Perda anatômica e/ou funcional completa de qualquer um dentre os outros dedos da <br> mão</td>
            <td rowspan="2" align="center">10</td>
           </tr>

           <tr>
           <td>Perda anatômica e/ou funcional completa de qualquer um dos dedos do pé</td>
           </tr>

           <tr>
           <th>Danos Corporais Segmentares (Parciais) <br> Outras Repercussões em Orgãos e Estruturas Corporais</th>
           <th>Percentuais das Perdas</th>
           </tr>

           <tr>
           <td>Perda auditiva total bilateral (surdez completa) ou da fonação (mudez completa) ou <br>
           da visão de um olho</td>
           <td align="center">50</td>
           </tr>
           <tr>

           <td>Perda completa da mobilidade de um segmento da coluna vertebral exceto o sacral</td>
           <td align="center">25</td>
           </tr>
                      
           <tr>
           <td>Perda integral (retirada cirúrgica) do baço</td>
           <td align="center">10</td>
           </tr>
        </table>

        <table class="letramenor">
        <tr>
        <td>No caso de invalidez parcial, a tabela dá a cada parte do corpo um percentual diferente. Assim, para saber como dar entrada, fique por
            dentro desses valores para ter uma ideia do que poderá receber.<br></td>
        </tr>

        <tr>
        <td>É importante destacar, contudo, que no caso de invalidez parcial, ficará a cargo do médico que atender a vítima determinar a
            porcentagem da indenização. Para entender essa conta, considere o seguinte exemplo:<br></td>
        </tr>

        <tr>
        <td>Suponha que João se envolveu em um acidente, e perdeu o movimento de um dos braços. Ele terá direito a 70% do valor total de R$
            10.000,00 ou seja, R$ 7.000,00.</td>
        </tr>
        </table>

            <div class="quebrar_pagina"><div>

            
            <!-- CABEÇALHO -->
        <table align="center">
        <tr><td><img style="width:150px" src="<?= base_url() . "upload/empresalogo/" . @$empresa_id . "/" . @$arquivo_pasta[0] ?>" ></td></tr>
        <table>

        <!-- CORPO -->
        <table  style="width:100%;">
            <tr>
                <th align="center" class="cabecalho"><u> TERMO DE USO CARTÃO SALUTE </u></th>
            </tr>

            <tr>
            <td>
            Pelo presente instrumento particular, as partes 
            <b><?= $empresa[0]->nome?></b>, 
            situada na <?= $empresa[0]->logradouro.', '.$empresa[0]->numero?>
            <?if($empresa[0]->complemento == '' OR $empresa[0]->complemento == NULL){
                    echo ', ';
                }else{
                    echo ', '.$empresa[0]->complemento .',';
                }?>
            
            bairro <?= $empresa[0]->bairro.', '.$empresa[0]->municipio.'/'.$empresa[0]->estado.', CEP:'.$empresa[0]->cep.', '?>
            inscrita no CGC/CNPJ  
            <?
                        $nbr_cnpj = @$empresa[0]->cnpj;
                        //30.869.446/0001-18
                        @$parte_um = substr($nbr_cnpj, 0, 2);
                        @$parte_dois = substr($nbr_cnpj, 2, 3);
                        @$parte_tres = substr($nbr_cnpj, 5, 3);
                        @$parte_quatro = substr($nbr_cnpj, 8, 4);
                        @$parte_cinco = substr($nbr_cnpj, 12, 2);
            
                        @$monta_cnpj = "$parte_um.$parte_dois.$parte_tres/$parte_quatro-$parte_cinco";
            
            //echo $monta_cpf;
            
            
                        if (@$nbr_cnpj != "") {
                            echo "<u>" . @$monta_cnpj . "</u>";
                        } else {
                            echo "_______________";
                        }
            ?>, 
            doravante denominada  <b>CONTRATADA </b>, neste ato representada, pelo seu Diretor Presidente e, 
            de outro lado doravante denominado  <b>CLIENTE/ASSOCIADO </b>: <br><br>       
            </td>
            </tr>

            <tr>
            <td>
            Eu,<b><u> <?= $paciente[0]->nome?> </b></u>, Brasileiro(a), estado civil 
            <u>
            <?
                                if (@$paciente[0]->estado_civil_id == 0) {
                                    echo "________";
                                } elseif (@$paciente[0]->estado_civil_id == 1) {
                                    echo "Solteiro";
                                } elseif (@$paciente[0]->estado_civil_id == 2) {
                                    echo "Casado";
                                } elseif (@$paciente[0]->estado_civil_id == 3) {
                                    echo "Divorciado";
                                } elseif (@$paciente[0]->estado_civil_id == 4) {
                                    echo "Viuvo";
                                } elseif (@$paciente[0]->estado_civil_id == 5) {
                                    echo "Outros";
                                } else {

                                }
            ?>
            </u>, 
            Profissão <?=($paciente[0]->descricao != "" ? "<u>".$paciente[0]->descricao."</u>" : "_______________________" );?>
            portador do RG nº <?=($paciente[0]->rg != "" ? "<u>".$paciente[0]->rg."</u>" : "______________________" );?>, 
            e do CPF nº <?
            $nbr_cpf = @$paciente[0]->cpf;

            @$parte_um = substr($nbr_cpf, 0, 3);
            @$parte_dois = substr($nbr_cpf, 3, 3);
            @$parte_tres = substr($nbr_cpf, 6, 3);
            @$parte_quatro = substr($nbr_cpf, 9, 2);

            @$monta_cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";

            if (@$nbr_cpf != "") {
                echo "<u>" . @$monta_cpf . "</u>";
            } else {
                echo "_______________";
            }
            ?>,
            Estado do <?=($paciente[0]->estado != "" ? "<u>".$paciente[0]->estado."</u>" : "________________" );?>
            nascido em 
                <? if (@$paciente[0]->nascimento != "") {
                        echo "<u>" . date('d/m/Y', strtotime(@$paciente[0]->nascimento)) . "</u>";
                    } else {
                        echo "__/___/_____";
                    }?>,
            residente nesta cidade, na <?=($paciente[0]->logradouro != "" ? "<u>".$paciente[0]->logro .' '. $paciente[0]->logradouro.' '.$paciente[0]->numero."</u>" : "________________" );?>,
            bairro <?=($paciente[0]->bairro != "" ? "<u>".$paciente[0]->bairro."</u>" : "________________" );?>, 
            cep <?=($paciente[0]->cep != "" ? "<u>".$paciente[0]->cep."</u>" : "________________" );?>, 
            Telefone <?if (@$paciente[0]->celular == "") {
                        @$telefone = $paciente[0]->telefone;
                    } else {
                        @$telefone = $paciente[0]->celular;
                    }
                    echo "<u>" .@$telefone. "</u>";
                    if (@$telefone == "") {
                        echo "_____________";
                    }?>
            </td>
            </tr>

            <tr>
            <td>
            <br>
            <u>Dependentes</u>
            <br>
                    <?
                    $contador = -1;
                    foreach($dependente as $nomes){
                        if($contador == -1){
                            $contador = 0;
                        }else{
                            $contador = $contador + 1;
                            echo $contador.' - <u>'.$nomes->paciente.'</u><br>';
                        }
                        
                    }
                    ?>
                    <br><br>
            </td>
            </tr>

            <tr align='center'>
            <td>
            <i>Têm entre si, justo e acordado o presente contrato, regido pelas seguintes <br>cláusulas: </i>
            <br><br>
            </td>
            </tr>

            <tr>
            <td align='justify'>
            <b>Art. 1º</b> Serão oferecidos aos clientes, através do presente contrato de adesão,
            convênios com empresas de prestação de serviços e produtos nas áreas de 
            saúde, educação, lazer, esportes seguros, alimentação, dentre outros, 
            sob custos reduzidos pelo uso do Cartão SALUTE. <br><br>
            </td>
            </tr>

            <tr>
            <td align='justify'>
             <b>§1º</b> A Salute intermediará a relação entre cliente e empresas conveniadas. 
             <br><br>
            </td>
            </tr>

            <tr>
            <td align='justify'>
             <b>§2º</b> O cliente declara ter recebido, no momento da celebração do presente
             contrato, lista de todas as empresas conveniadas com o Cartão SALUTE.
             Havendo mudanças ou substituição do prestador de serviços conveniados, a 
             CONTRATADA informa que a atualização da lista de empresas poderá ser 
             acessada em seu site eletrônico oficial, bem como através do envio de 
             comunicação eletrônica (e-mail). 
             <br><br>
            </td>
            </tr>

            <tr>
            <td align='justify'>
            <b>§3º</b> Terá acesso aos parceiros conveniados, o ASSOCIADO e sua família
            (compreendida em cônjuge e filhos até os 21 anos) no limite de 4 membros do 
            grupo familiar, desde que devidamente inscritos no ato de contratação. Se o 
            cliente requerer a adição de mais um membro do seu grupo familiar (filhos
            maiores de 21 anos e demais membros da família, excepcionalmente sogro e
            sogra), será cobrado per capita o valor de R$ 2,50 (dois reais e cinquenta
            centavos) adicionados a parcela mensal. 
            </td>
            </tr>
        </table>

       <div class="quebrar_pagina"><div>

        <!-- CABEÇALHO -->
        <table align="center">
        <tr><td><img style="width:150px" src="<?= base_url() . "upload/empresalogo/" . @$empresa_id . "/" . @$arquivo_pasta[0] ?>" ></td></tr>
        <table>

        <!-- CORPO -->
        <table  style="width:100%;">
            <tr>
                <th align="center" class="cabecalho"><u> TERMO DE USO CARTÃO SALUTE </u></th>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>§4º</b> Fica estabelecido como grupo familiar, o cliente, seu cônjuge e filhos. 
            Excepcionalmente, será aceita a adição ao contrato de sogro e sogra do cliente; 
            porém em hipótese nenhuma tios, primos, sobrinhos etc. ou qualquer membro familiar 
            a partir do terceiro grau de parentesco. <br><br>
            </td>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>§5º</b> Somente o CLIENTE, associado e adimplente com suas obrigações financeiras 
            junto a esta empresa, terá direito aos serviços de descontos e vantagens 
            intermediados. <br><br>
            </td>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>Art. 2º</b> O CLIENTE associado obriga-se a pagar, por si e pela sua família inscrita, 
            o valor de R$ 65,00 mensalmente, mediante autorização de débitos, em anexo ao 
            presente contrato, conforme sua exclusiva escolha (cartão de débito, cartão de 
            crédito, ou pagamento direto junto à empresa). <br><br>
            </td>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>Parágrafo único:</b> A inadimplência, no valor da adesão, renovação ou mensalidade, 
            suspende os serviços e vantagens do associado e sua família, após 05 dias do 
            vencimento. <br><br>
            </td>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>Art. 3º</b> – O presente contrato tem validade de 12 (doze) meses, renovando-se 
            automaticamente. <br><br>
            </td>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>§1º</b> Poderá o cliente associado ao plano SALUTE rescindir somente após o 
            decimo segundo pagamento do presente contrato, sem quaisquer ônus, desde 
            que comunique a central SALUTE seu desligamento, conforme dispõe o 
            artigo 49º do Código de Defesa do Consumidor. <br><br>
            </td>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>§2º</b> A renovação do presente contrato se dará tacitamente por prazo 
            adicional de um ano, sendo requerida sua rescisão após o aditivo anual, 
            só poderá rescindir depois de igual período. <br><br>
            </td>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>§3º</b> O valor da mensalidade será reajustado anualmente, na proporção 
            da variação do INPC. <br><br>
            </td>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>§4º </b>É de inteira responsabilidade do cliente associado, manter a empresa, 
            ou contratada SALUTE informado sobre quaisquer alterações no seu cadastro 
            pessoal e familiar. <br><br>
            </td>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>§5º</b> O Cartão SALUTE não se responsabiliza pelas informações pessoais 
            prestadas pelos clientes associados na adesão, reservando-se ao 
            direito de regresso, em caso de fraude. <br><br>
            </td>
            </tr>
            
            <tr>
            <td align='justify'>
            <b>Art. 4º</b> – O cliente associado declara ciente e de acordo com as 
            cláusulas do presente contrato. Tudo que usar ou comprar, será 
            pago ao prestador conveniado diretamente, assegurando apenas os 
            preços e descontos que constem nas informações no site e em seus 
            materiais de divulgação. <br><br>
            </td>
            </tr>
        </table>

        <div class="quebrar_pagina"><div>

    <!-- CABEÇALHO -->
    <table align="center">
    <tr><td><img style="width:150px" src="<?= base_url() . "upload/empresalogo/" . @$empresa_id . "/" . @$arquivo_pasta[0] ?>" ></td></tr>
    <table>

    <!-- CORPO -->
    <table  style="width:100%;">
    <tr>
        <th align="center" class="cabecalho"><u> TERMO DE USO CARTÃO SALUTE </u></th>
    </tr>

    <tr>
    <td align='justify'>
    <b>Art.5º</b> O presente contrato deverá ser devidamente interpretado 
    de acordo com as regras previstas no Código Civil Direito brasileiro. <br><br>
    </td>
    </tr>

    <tr>
    <td align='justify'>
    <b>Parágrafo único:</b> Nesta ocasião, o cliente associado 
    recebe uma via do contrato de adesão firmado entre as partes. <br><br>
    </td>
    </tr>

    <tr>
    <td align='justify'>
    <b>Art.6º</b> As partes elegem exclusivamente o foro da comarca de 
    Marabá, com renúncia expressa de qualquer outro, por mais 
    privilegiado que seja, para dirimir questões oriundas deste. <br><br>
    </td>
    </tr>

    <tr>
    <td align='justify'>
    Estando ambas em comum acordo e cientes dos direitos e 
    obrigações adquiridas por este termo, assinam na presença 
    de duas testemunhas. <br><br>
    </td>
    </tr>

        <tr>
                <td align='right'><?
                    if (@$empresa[0]->municipio != "") {
                        echo @$empresa[0]->municipio;
                    } else {
                        echo "____________________";
                    }
                    ?> ,
                    <?
                    if (@$empresa[0]->estado != "") {
                        echo @$empresa[0]->estado;
                    } else {
                        echo '__________________';
                    }
                    ?> <?= "<u>" . date('d') . "</u>" ?> de <?
                    switch (date("m")) {
                        case "01": $mes = "Janeiro";
                            break;
                        case "02": $mes = "Fevereiro";
                            break;
                        case "03": $mes = "Março";
                            break;
                        case "04": $mes = "Abril";
                            break;
                        case "05": $mes = "Maio";
                            break;
                        case "06": $mes = "Junho";
                            break;
                        case "07": $mes = "Julho";
                            break;
                        case "08": $mes = "Agosto";
                            break;
                        case "09": $mes = "Setembro";
                            break;
                        case "10": $mes = "Outubro";
                            break;
                        case "11": $mes = "Novembro";
                            break;
                        case "12": $mes = "Dezembro";
                            break;
                    }

                    echo "<u>" . @$mes . "</u>";
                    ?> de <?= date('Y'); ?>
                    <br><br><br>
                </td>
        </tr>

        <tr>
        <td align='center'> ______________________________________</td>
        </tr>
        <tr>
        <td align='center'> <b><?= $empresa[0]->nome?> <br><br> CNPJ 
        <?
                        $nbr_cnpj = @$empresa[0]->cnpj;
                        //30.869.446/0001-18
                        @$parte_um = substr($nbr_cnpj, 0, 2);
                        @$parte_dois = substr($nbr_cnpj, 2, 3);
                        @$parte_tres = substr($nbr_cnpj, 5, 3);
                        @$parte_quatro = substr($nbr_cnpj, 8, 4);
                        @$parte_cinco = substr($nbr_cnpj, 12, 2);
            
                        @$monta_cnpj = "$parte_um.$parte_dois.$parte_tres/$parte_quatro-$parte_cinco";
            
            //echo $monta_cpf;
            
            
                        if (@$nbr_cnpj != "") {
                            echo @$monta_cnpj;
                        } else {
                            echo "_______________";
                        }
            ?> <br><br> CONTRATADA</b> <br><br><br><br></td>
        </tr>

        <tr>
        <td align='center'><b>__________________________________________ <br>
                            NOME: <?=$paciente[0]->nome?><br><br>
                            CPF: <?=$monta_cpf?> <br><br>
                            CONTRATANTE: <br><br>
        </b></td>
        </tr>

        <tr>
        <td align='justify'>
        <i>Em testemunho da verdade, assinam as testemunhas: </i>
        </td>
        </tr>

        <tr>
        <td><b>
        I – NOME: <br><br>
        RG/CPF:
        </b><br><br><br></td>
        </tr>

        <tr>
        <td><b>
        II – NOME: <br><br>
        RG/CPF:
        </b></td>
        </tr>
    </table>


    <div class="quebrar_pagina"><div>

    <!-- CABEÇALHO -->
    <table align="center">
    <tr><td><img style="width:150px" src="<?= base_url() . "upload/empresalogo/" . @$empresa_id . "/" . @$arquivo_pasta[0] ?>" ></td></tr>
    <table>

    <!-- CORPO -->
    <table  style="width:100%;">
    <tr>
        <th align="center" class="cabecalho"><u> TERMO DE USO CARTÃO SALUTE </u></th>
    </tr>

    <tr>
    <td align='center'><br><br><b>ANEXO I</b><br><br></td>
    </tr>

    <tr>
    <td align='center'><b>SEGURADORA CONVENIADA – SEGURO DE VIDA PORTO SEGURO</b> <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.1º</b> - Por este termo o cliente associado SALUTE adere ao 
    seguro de acidentes pessoais, ofertado pela empresa SALUTE, a partir de convênio 
    firmado com a seguradora PORTO SEGURO CIA. DE SEGUROS GERAIS (05886) Al. Barão de 
    Piracicaba, 618 - Campos Elíseos - São Paulo - CEP 01216-010 - CNPJ 61.198.164/0001-60, 
    e intermediado pela THOMAZ CORRETORA DE SEGUROS, pessoa jurídica de direito privado 
    inscrita regularmente em CNPJ: 00.500.837/0001-01 e sediada à Travessa Quintino Bocaiuva, 
    1127, 3º andar, Belém – PA, Bairro do Reduto, CEP: 66053-240. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.2º</b> - A adesão refere a cobertura em Seguro de Acidentes 
    Pessoais Coletivos da Porto Seguro, sendo os serviços 
    à disposição do cliente associado: <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>§1º</b> - O referido seguro, terá um custo per capita 
    incluído na mensalidade do cliente SALUTE abrangendo sua pessoa e a 
    composição familiar registrada, conforme disposto no termo de condições gerais. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>§2º</b> - A cobertura refere-se a: morte acidental, 
    invalidez permanente total ou parcial por acidente, conforme a tabela a seguir: <br><br></td>
    </tr>
    </table>


    <div class="quebrar_pagina"><div>

    <!-- CABEÇALHO -->
    <table align="center">
    <tr><td><img style="width:150px" src="<?= base_url() . "upload/empresalogo/" . @$empresa_id . "/" . @$arquivo_pasta[0] ?>" ></td></tr>
    <table>

    <!-- CORPO -->
    <table  style="width:100%;" class='letramenor'>
    <tr>
    <th align="center" class="cabecalho"><u> TERMO DE USO CARTÃO SALUTE <br><br></u></th>
    </tr>

    <tr>
    <td align='justify'><b>§ 3º</b> - No caso de invalidez parcial, a tabela dá a cada 
    parte do corpo um percentual diferente. Assim, para saber como dar entrada, 
    observe a tabela de valores para ter uma ideia do que poderá receber. 
    No caso de invalidez parcial, ficará a cargo do médico que atender a 
    vítima determinar a porcentagem da indenização. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>§ 4º</b> - Auxílio funeral, com capital segurado de até 
    R$ 3.000,00 (três mil reais); <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>§ 5º</b> - Cesta básica alimentar, no valor de 
    R$ 300,00 (trezentos reais) por período de 06 (seis) meses. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.3º</b> - O limite de idade estabelecido neste contrato é de 
    74 (setenta e quatro) anos de vida para o cliente associado ou qualquer 
    membro da composição familiar aceita pela SALUTE. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.4º</b> - A partir do ato de contratação geral 
    (termo de adesão cliente) se adere igualmente a este seguro 
    ofertado pela citada conveniada. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.5º</b> - A inclusão do cliente associado 
    SALUTE no rol de segurados se dará imediatamente ao repasse da 
    intermediadora à empresa seguradora conveniada, sendo esta data 
    base de sua admissão e direito a uso do serviço do grupo de segurados SALUTE. <br><br></td>
    </tr>

    <tr>
    <td align='center'><b>ANEXO II <br><br> ASSISTÊNCIA MÉDICA <br><br></b></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.1º</b> - A SALUTE se compromete em cada contrato, 
    fornecer 02 (duas) consultas com o médico clínico geral ao ano, sob o 
    preço do valor mensal. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Parágrafo único:</b> Em havendo necessidade de atendimentos 
    extras com o clínico geral (extrapolando as duas consultas anuais), será 
    obrigatoriamente cobrado o valor de R$ 20,00 (vinte reais) em cada consulta 
    adicional. Estas consultas deverão ser agendadas diretamente na sede da Salute. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.2º</b> - Os atendimentos de saúde realizado nas 
    cínicas credenciadas deverão ser previamente agendadas diretamente 
    nestes estabelecimentos, cabendo ao paciente receber destes o local, 
    a data e o horário do atendimento. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Parágrafo único:</b> A SALUTE não se responsabiliza 
    pela frequência do cliente ou do profissional e ainda pelo atendimento, q
    ue é feito com toda liberalidade pelo profissional conveniado, haja vista, 
    ambas as relações serem diretas entre as partes – somente fazendo a 
    intermediação do valor mais vantajoso ao cliente em teor de ofertar sua 
    rede conveniada de profissionais de saúde. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.3º</b> - As consultas com o clínico geral ofertadas dentro 
    do plano vigente (conforme o artigo 1) terão um prazo inicial de carência em 90 
    (noventa) dias para a primeira consulta e de 180 (cento e oitenta) dias para a 
    segunda consulta, ambas contando após o início de vigência do plano para com o 
    CLIENTE SALUTE. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.4º</b> - Exames, procedimentos e consultas realizadas pela 
    rede credenciada com profissionais de saúde serão pagas diretamente ao 
    estabelecimento que prestará o serviço, sendo facultado ao mesmo estipular o 
    valor de cada procedimento. <br><br></td>
    </tr>

    </table>

    
    <div class="quebrar_pagina"><div>

    <!-- CABEÇALHO -->
    <table align="center">
    <tr><td><img style="width:150px" src="<?= base_url() . "upload/empresalogo/" . @$empresa_id . "/" . @$arquivo_pasta[0] ?>" ></td></tr>
    <table>

    <!-- CORPO -->
    <table  style="width:100%;">
    <tr>
    <th align="center" class="cabecalho"><u> TERMO DE USO CARTÃO SALUTE <br><br></u></th>
    </tr>

    <tr>
    <td align='justify'><b>Art.5º</b> - A SALUTE se compromete em manter atualizada a lista
     de sua rede de saúde conveniada em seu site e/ou aplicativo e tais informações também 
     estarão disponíveis em sua sede, a disposição de qualquer cliente. <br><br></td>
    </tr>

    <tr>
    <td align='center'><b>ANEXO III <br><br> CRÉDITO <br><br></b></td>
    </tr>

    <tr>
    <td align='justify'><b>Art. 1º</b> - O cliente SALUTE após a adesão e devidamente 
    autorizado pelo mesmo, poderá ser realizado em favor deste, análise de crédito 
    e, caso aprovado, a SALUTE poderá, se assim desejar o cliente, ofertar lhes 
    créditos pecuniários para diversas finalidades, através de empresa em sua 
    rede conveniada, nesta especificidade. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Parágrafo único:</b> O cliente por meio deste, 
    autoriza desde já, que a SALUTE possa a qualquer tempo lhe ofertar 
    pacotes, programas de crédito, empréstimos e consignados. A Salute 
    somente ofertará a disposição do cliente tal vantagem, cabendo a ele 
    posteriormente decidir livremente em aceitar ou recusar o empréstimo 
    que lhe é disposto. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.2º</b> - Havendo o aceite e o interesse real a 
    oferta de empréstimo, o cliente SALUTE será convidado a conhecer as 
    condições com a conveniada APROVA CRÉDITO que com ele procederá 
    formalização de contrato, liberação de valores e demais disposições 
    desta relação. <br><br></td>
    </tr>

    <tr>
    <td align='justify'><b>Art.3º</b> - A SALUTE é mera intermediadora desta relação, 
    advindo da mesma a prospecção e análise creditória, o empréstimo e demais 
    consequências da relação financeira ficará a cargo da sua conveniada. <br><br></td>
    </tr>

    <tr>
    <td>
    <br><br><br><br><br><br>
    <b>Fale Conosco: </b><br>
    Salute Benefícios: (94) 99297-5157<br>
    Agendamento de Consulta Clinica: (94) 99132-1153<br>
    Agendamento de Consulta Jurídica: (94) 99297-5157<br>
    Crédito Financeiro: (94) 99132-1149<br>
    Auxílio Funeral: (94)  99147-8848 / 98106-9824<br>
    </td>
    </tr>





    </body>
</html>
