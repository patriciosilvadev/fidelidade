<body bgcolor="#C0C0C0">
    <div class="content"> <!-- Inicio da DIV content -->
        <h3 class="singular">Faturar</h3>
        <div>
            <form name="form_faturar" id="form_faturar" action="<?= base_url() ?>ambulatorio/guia/gravarfaturamentomanualguiaconvenio" method="post">
                <fieldset>
                    <?
                    $total = 0;
                    foreach ($procedimentos as $item):
                        $total += (float) $item->valor_total;
                    endforeach;
                    ?>

                    <dl class="dl_desconto_lista">
                        <dt>
                            <label>Valor total a faturar</label>
                        </dt>
                        <dd>
                            <input type="text" name="valorafaturar" id="valorafaturar" class="texto01" value="<?= $total; ?>" readonly />
                            <input type="hidden" name="guia_id" id="guia_id" class="texto01" value="<?= $guia_id; ?>"/>
                        </dd>
                        <dt>
                            <label>Valor</label>
                        </dt>
                        <dd>
                            <input type="text" name="valor1" id="valor1" class="texto01" onblur="history.go(0)"  />
                        </dd>
                        <dt>
                            <label>Diferen&ccedil;a</label>
                        </dt>
                        <dd>
                            <input type="text" name="valortotal" id="valortotal"  onkeyup="multiplica()"  class="texto01" readonly/>
                            <input type="hidden" name="valorcadastrado" id="valorcadastrado" value="<?= $exame[0]->total; ?>"/>
                            <input type="hidden" name="novovalortotal" id="novovalortotal">
                        </dd>
                    </dl>    

                    <hr/>
                    <button type="submit" name="btnEnviar" >Enviar</button>
            </form>
            </fieldset>
        </div>
    </div> <!-- Final da DIV content -->
</body>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-meiomask.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">

                                //    (function($){
                                //        $(function(){
                                //            $('input:text').setMask();
                                //        });
                                //    })(jQuery);


                                $(document).ready(function () {

                                    function multiplica()
                                    {
                                        total = 0;
                                        valor = parseFloat(document.form_faturar.valorcadastrado.value.replace(",", "."));
                                        numer1 = parseFloat(document.form_faturar.valor1.value.replace(",", "."));
                                        total += numer1;

                                        resultado = valor - total;
                                        y = resultado.toFixed(2);
                                        $('#valortotal').val(y);
                                        $('#novovalortotal').val(y);
                                    }
                                    multiplica();


                                });
</script>