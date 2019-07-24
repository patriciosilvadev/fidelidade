 <div>
<h3>Prefeitura Municipal de Fortaleza </h3>
<h3>Instituto Dr. Jos&eacute; Frota </h3>
<h5>Período: 01/01/2009 a 31/12/2009 </h5>
<h5>Casos Registrados de Intoxicação Humana por AGENTE TÓXICO x ZONA DE OCORRÊNCIA </h5>




<table>

        <thead>
<?php $listaCirc = $this->ceatoxrelatorio_m->listarZona();?>
        <tr>
            <th>Agente T&oacute;xico</th>
       <?php foreach ($listaCirc as $item){?>

                <th width="100px;">
                    <?php echo $item->descricao_zona;?>
                </th>

      <?php } ?>
                <th width="100px;">TOTAL</th>
                <th width="100px;">%</th>
        </tr>
        </thead>
        <tbody>
<?php

     $lista = $this->ceatoxrelatorio_m->listarAgenteToxico();
     $lista2 = $this->ceatoxrelatorio_m->listarZona();
     $iant = 0;?>

   <?php foreach ($lista as $item) { ?>
                <tr>
        <td width="300px;"><?php echo $item->descricao_agente_toxico; ?></td>
        <?php foreach ($lista2 as $item2) {

           $i = $item->codigo_agente_toxico;
           $j = $item2->codigo_zona;
           $i = str_pad($i, 2,"0",STR_PAD_LEFT);
           //$j = str_pad($j, 2,"0",STR_PAD_LEFT);

           ?>

               <td width="100px;"><?php echo $this->ceatoxrelatorio_m->listaTotalAgenteToxicoZona($i,$j);?></td>


           <?php
          }?>
          <td><?php $totalparcial = $this->ceatoxrelatorio_m->listaParcialAgenteToxico($i);
          echo $totalparcial;
          ?></td>
              <td width="100px;">
                <?php
                    $porcentagem = ($totalparcial * 100)/$this->ceatoxrelatorio_m->listaTotalAgenteToxico();
                    $porcentagem = number_format($porcentagem,2,".","");
                    echo $porcentagem."%";
                ?>
              </td>
              </tr>
   <?php }
   ?>

        </tbody>
</table>

</div>
