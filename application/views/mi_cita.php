<div class="container-general">
    
    <div class="container">
        <div class="row">
            <h4 class="col-md-10 col-md-offset-2 title-big">CITA</h4>
            <!-- TITULOS -->
            <div class="col-md-10 col-md-offset-2">
               <?php foreach($cita->result() as $c ) : ?>
                <?php $correo_usuario = $c->correo; ?>
                <span><label>Nombre: </label><?php echo $c->nombre; ?></span><br>
                <span><label>Fecha:</label> <?php echo $c->fecha; ?></span><br>
                <span><label>Hora:</label> <?php echo $c->hora; ?></span><br>
                <?php if( $c->link == null || $c->link == '' ) : ?>
                    <span><label>Link:</label> Sin link</span><br>
                <?php else : ?>
                    <span><label>Link:</label> <a href="<?php echo $c->link; ?>">Ir a cita</a></span><br>
                <?php endif; ?>
   
                <span id="btn-borrar-cita" class="btn-cancel">Cancelar cita</span>
                <?php endforeach; ?>
            </div>
            <!-- end TITULOS -->
        </div>
    </div>

</div>




<div id="ventana-emergente">
  <div class="fondo-emergente"></div>
  <div class="contenido-emergente-confirm">
    <span id="close-ventana-emergente">X</span>
    <h1>Seguro que desea cancelar cita?</h1>
    <form action="<?php echo base_url(); ?>principal/cancelar_cita" method="post">
        <input type="hidden" name="citaID" value="<?php echo $c->citaID; ?>">
        <input type="hidden" name="usuarioID" value="<?php echo $c->usuarioID; ?>">
        <input type="hidden" name="correo" value="<?php echo $correo_usuario; ?>">
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
    $('#btn-borrar-cita').click(function(){
        $("#ventana-emergente").css("display","block");
        $(".contenido-emergente-confirm").css("display","block");
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