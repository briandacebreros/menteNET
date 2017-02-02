<!-- ESTE MENU ESTA EN estructura/header 


<div class="container-general">
    <div class="menu-admin">
        <a href="">CLIENTES</a>
        <a href="">CITAS</a>
        <a href="">CALENDARIO</a>
        <a href="">CONVENIOS</a>
        <a href="">PRECIOS</a>
    </div>
-->
    
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
                    <span id="btn-editar-cita" class="btn-general">Agregar link</span>
                <?php else : ?>
                    <span><label>Link: </label><?php echo $c->link; ?></span><br>
                    <span id="btn-editar-cita" class="btn-general">Editar link</span>
                <?php endif; ?>
                
                
                <div id="form-editar-cita" style="display: none">
                    <form action="<?php echo base_url(); ?>admin/agregar_link_cita" method="post">
                        <input type="hidden" name="citaID" value="<?php echo $c->citaID; ?>">
                        <input name="link" type="text" value="<?php echo $c->link; ?>">
                        <input name="correo" type="hidden" value="<?php echo $c->correo; ?>">
                        <br>
                        <button class="btn-general">
                            <?php if( $c->link == null || $c->link == '' ) : ?>Agregar <?php else : ?> Editar <?php endif; ?>
                        </button>
                    </form>
                </div>

                
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
    <form action="<?php echo base_url(); ?>admin/cancelar_cita" method="post">
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

    $('#btn-editar-cita').click(function(){
        var display = $("#form-editar-cita").css("display");
        if( display == 'none' ) {
            $("#form-editar-cita").css("display","block");
            $("#btn-editar-cita").css("display","none");
        } else {
            $("#btn-editar-cita").css("display","block");
            $("#form-editar-cita").css("display","none");
        }
    });
</script>