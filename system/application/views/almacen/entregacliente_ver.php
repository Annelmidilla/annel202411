<script type="text/javascript" src="<?php echo base_url();?>js/jquery.metadata.js?=<?=JS;?>"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.js?=<?=JS;?>"></script>		
<script type="text/javascript" src="<?php echo base_url();?>js/almacen/recepcionproveedor.js?=<?=JS;?>"></script>		
<div id="pagina">
    <div id="zonaContenido">
        <div align="center">
        <div id="tituloForm" class="header"><?php echo $titulo;?></div>
        <div id="frmBusqueda">
            <table width="250" cellspacing="0" cellpadding="6" border="0">
                <?php 
                    foreach($lista as $indice=>$valor){
                ?>
                <tr>
                    <td>Observacion : </td>
                    <td><?php echo $valor[2];?></td>
                </tr>
                <tr>
                  <td>Tipo Solucion:</td>
                  <td><?php echo $valor[4];?></td>
                </tr>
                <tr>
                    <td>Fecha de Registro : </td>
                    <td><?php echo substr($valor[3],0,10);?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
            <br/>
            <?php echo $oculto;?>
        </div>
        <div id="botonBusqueda">
            <a href="#" onclick="atras_recepcionproveedor();"><img src="<?php echo base_url();?>images/botonaceptar.jpg?=<?=IMG;?>" width="85" height="22" border="1"></a>
        </div>
    </div>
  </div>
</div>