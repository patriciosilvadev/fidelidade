
<div class="content"> <!-- Inicio da DIV content -->

    <div id="accordion">
        <h3 class="singular"><a href="#">Manter Erros</a></h3>
        <div>
            <table>
                <thead>
                    <tr>
                        <th colspan="5" class="tabela_title">
                            <form method="get" action="<?= base_url() ?>cadastros/pacientes/errosgerencianet">
                                <input type="text" name="nome" class="texto10 bestupper" value="<?php echo @$_GET['nome']; ?>" />
                                <button type="submit" id="enviar">Pesquisar</button>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th class="tabela_header">Nome</th>
                        <th class="tabela_header">Mensagem</th>
                        <th class="tabela_header">Código</th>
                        <th class="tabela_header">Data</th>
                        <th class="tabela_header">Detalhes</th>
                    </tr>
                </thead>
                <?php
                $perfil_id = $this->session->userdata('perfil_id');
                $url = $this->utilitario->build_query_params(current_url(), $_GET);
                $consulta = $this->paciente->listarerros($_GET);
                $total = $consulta->count_all_results();
                $limit = 10;
                isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                if ($total > 0) {
                    ?>
                    <tbody>
                        <?php
                        $lista = $this->paciente->listarerros($_GET)->limit($limit, $pagina)->orderby('nome')->get()->result();
                        $estilo_linha = "tabela_content01";
                        foreach ($lista as $item) {
                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                            ?>
                            <tr>
                                <td class="<?php echo $estilo_linha; ?>"><?= $item->paciente; ?></td>

                                <td class="<?php echo $estilo_linha; ?>"><?= $item->mensagem; ?></td>
                               
                                   <td class="<?php echo $estilo_linha; ?>"><?= $item->code_erro; ?></td>
                                    <td class="<?php echo $estilo_linha; ?>"><?= date('d/m/Y', strtotime($item->data_cadastro)); ?></td>
                                

                                <td class="<?php echo $estilo_linha; ?>" width="100px;">
                                     <?php if($perfil_id != 10){?>
                                        <a href="<?= base_url() ?>cadastros/pacientes/excluirerro/<?= $item->erros_gerencianet_id?> ">
                                            Excluir
                                        </a>
                                    <?php }?>
                                </td>
                            </tr>

                        </tbody>
                        <?php
                    }
                }
                ?>
                <tfoot>
                    <tr>
                        <th class="tabela_footer" colspan="6">
                            <?php $this->utilitario->paginacao($url, $total, $pagina, $limit); ?>
                            Total de registros: <?php echo $total; ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div> <!-- Final da DIV content -->
<script type="text/javascript">

    $(function () {
        $("#accordion").accordion();
    });

</script>
