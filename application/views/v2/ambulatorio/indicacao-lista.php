
<fieldset>
    <div class="body">
        <div class="row clearix">
            <a class="btn btn-primary waves-effect" href="<?php echo base_url() ?>ambulatorio/indicacao/carregarindicacao/0">
                Nova Indica&ccedil;&atilde;o
            </a>
        </div>

        <div class="row clearfix">
            <legend>Manter Indica&ccedil;&atilde;o</legend>

            <form method="get" action="<?= base_url() ?>ambulatorio/indicacao/pesquisar">
                <input type="text" name="nome" class="texto10 bestupper" value="<?php echo @$_GET['nome']; ?>" />
                <button type="submit" id="enviar">Pesquisar</button>
            </form>

            <div>
                <table class="table table-responsive dataTable">
                    <thead>
                    <tr>
                        <th class="tabela_header">Nome</th>
                        <th class="tabela_header">Detalhes</th>
                    </tr>
                    </thead>
                    <?php
                    $url = $this->utilitario->build_query_params(current_url(), $_GET);
                    $consulta = $this->indicacao->listar($_GET);
                    $total = $consulta->count_all_results();
                    $limit = 10;
                    isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                    if ($total > 0) {
                        ?>
                        <tbody>
                        <?php
                        $lista = $this->indicacao->listar($_GET)->limit($limit, $pagina)->orderby('nome')->get()->result();
                        $estilo_linha = "tabela_content01";
                        foreach ($lista as $item) {
                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                            ?>
                            <tr>
                                <td class="<?php echo $estilo_linha; ?>"><?= $item->nome; ?></td>
                                <td class="<?php echo $estilo_linha; ?>" width="100px;">

                                    <a href="<?= base_url() ?>ambulatorio/indicacao/carregarindicacao/<?= $item->paciente_indicacao_id ?>">
                                        editar
                                    </a>&zwnj;&nbsp;
                                    <a href="<?= base_url() ?>ambulatorio/indicacao/excluir/<?= $item->paciente_indicacao_id ?>">
                                        excluir
                                    </a>
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
    </div>
</fieldset>>

