<div class="container-general">
    
    <div class="container">
        <div class="row">
            <div class="col-xs-12">  
                <h3><?php echo 'HOLA ' . @$_SESSION['nombre'] . ' ' . @$_SESSION['ap_paterno']; ?></h3>
            </div>
            <div class="col-md-4 col-md-offset-8">  
                <div class="citas-disponibles-container">
                    <h6>CITAS DISPONIBLES: <span><?php echo @$_SESSION['creditos']; ?></span></h6><a href="<?php echo base_url(); ?>principal/comprar_creditos">COMPRAR</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
    
                <h4 class="citas-title">CITAS PR&Oacute;XIMAS</h4>
                <div class="citas-proximas-container">
                <?php foreach( $citas->result() as $cita ) : ?>
                    <!-- TILE DE CADA CITA INDIVIDUAL -->
                    <div class="cita-tile">
                        <div class="cita-tile-fecha"><img src="<?php echo base_url(); ?>assets/images/event-details-icon-01.svg" alt=""><?php echo $cita->fecha; ?></div>
                        <div class="cita-tile-hora"><img src="<?php echo base_url(); ?>assets/images/event-details-icon-02.svg" alt=""><?php echo $cita->hora; ?></div>
                        <?php if ( $cita->link != null && $cita->link != "") : ?>
                            <a href="<?php echo 'http://' . $cita->link; ?>" class="ir-a-cita"><img src="<?php echo base_url(); ?>assets/images/ir-a-cita.svg" alt=""></a> <!-- Desplegar cuando haya link para enlazar video -->
                        <?php endif; ?>
                        <span class="cita-tile-menu accionador-menu"><img src="<?php echo base_url(); ?>assets/images/cita-menu.svg" alt=""></span>
                        <div style="display:block;" class="cita-tile-menu-desplegado menu-desplegado">
                            <a href="<?php echo base_url(); ?>principal/mi_cita/<?php echo $cita->citaID; ?>">VER</a>
                            <span class="btn-borrar-cita" id="cita-<?php echo $cita->citaID; ?>">CANCELAR</span>
                        </div>
                    </div>
                    <!-- end TILE CITA -->
                <?php endforeach; ?>
                </div>
                

                <?php if( @$_SESSION['creditos'] != 0) : ?>
                    <div class="agregar-cita">
                        <a href="<?php echo base_url(); ?>principal/agendar"><img src="<?php echo base_url(); ?>assets/images/plus.svg" alt=""></a> AGENDAR CITA
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    
    
</div>

<div id="ventana-emergente">
  <div class="fondo-emergente"></div>
  <div class="contenido-emergente-confirm">
    <span id="close-ventana-emergente">X</span>
    <h1>Seguro que desea cancelar cita?</h1>
    <form action="<?php echo base_url(); ?>principal/cancelar_cita" method="post">
        <input id="input-citaID" type="hidden" name="citaID" value="">
        <input type="hidden" name="usuarioID" value="<?php echo @$_SESSION['id']; ?>">
        <input type="hidden" name="correo" value="<?php echo @$_SESSION['correo']; ?>">
        <button class="btn-cancel">Cancelar cita</button>
    </form>
    <span id="btn-cancelar" class="btn-general">Cerrar</span>
  </div>
</div>

<style>
#ventana-emergente{
    display: none;
}
.fondo-emergente {
    position: fixed;
    top: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    background-color: #439aca;
    color: #FFF;
    opacity: 0.6;
}
.contenido-emergente-confirm {
    position: fixed;
    display: none;
    z-index: 11;
    background-color: #FFF;
    width: 100%;
    height: 50%;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    padding: 20px;
    text-align: center;
}
#close-ventana-emergente {
    position: relative;
    display: block;
    font-size: 24px;
    text-align: right;
    cursor: pointer;
}
</style>
<script>
    $('.btn-borrar-cita').click(function(){
        $("#ventana-emergente").css("display","block");
        $(".contenido-emergente-confirm").css("display","block");

        var cita_id;
        var id;
        cita_id = this.id.split('-');
        id = cita_id[1];
        $('#input-citaID').prop("value",id);
    });
    $('#close-ventana-emergente').click(function() {
      $("#ventana-emergente").css("display","none");
      $(".contenido-emergente-confirm").css("display","none");
    });
    $('#btn-cancelar').click(function() {
      $("#ventana-emergente").css("display","none");
      $(".contenido-emergente-confirm").css("display","none");
    });
</script>