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
            <h4 class="col-md-10 col-md-offset-2 title-big">CONVENIOS</h4>

            <div class="col-md-10 col-md-offset-2 ">

        
                <?php foreach( $convenios->result() as $convenio ) : ?>
                    <?php if( $convenio->convenioID != 6 ) : ?>
                        <label>Clave: </label><?php echo $convenio->clave; ?><br>
                        <label>Nombre: </label><?php echo $convenio->nombre; ?><br>
                        <label>Precio por cita: </label><?php echo $convenio->precio_cita; ?><br>
                        <label>Precio por cita: </label><?php echo $convenio->precio_paquete; ?><br><br>
                        <form action="<?php echo base_url(); ?>admin/editar_convenio" method="post">
                            <input name="convenioID" type="hidden" value="<?php echo $convenio->convenioID; ?>">
                            <label>Precio por cita</label>
                            <input name="precio_cita" value="<?php echo $convenio->precio_cita; ?>"><br>
                            <label>Precio por paquete</label>
                            <input name="precio_paquete" value="<?php echo $convenio->precio_paquete; ?>"><br>
                            <button class="btn-general">Editar</button>
                        </form>
                        
                        <span id="convenioID-<?php echo $convenio->convenioID; ?>" class="btn-cancel btn-borrar-convenio">ELIMINAR</span>


                        <br><br><br>
                    <?php endif; ?>
                <?php endforeach; ?>
   

                <br><br>


                <span id="btn-agregar-convenio" class="btn-login">Agregar Convenio</span>
                <div id="form-agregar-convenio" style="display:none">
                    <h4>Agregar convenio</h4>
                    <form action="<?php echo base_url(); ?>admin/agregar_convenio" method="post">
                        <input name="clave" type="text" placeholder="Clave"><br>
                        <input name="nombre" type="text" placeholder="Nombre"><br>
                        <label>Precio cita</label><br>
                        <input name="precio_cita" type="number"><br>
                        <label>Precio paquete</label><br>
                        <input name="precio_paquete" type="number"><br>
                        <button class="btn-general">Agregar</button><br><br>
                    </form>
                </div>
            </div>
            
        </div>
       
    </div>
</div>




<div id="ventana-emergente">
  <div class="fondo-emergente"></div>
  <div class="contenido-emergente-confirm">
    <span id="close-ventana-emergente">X</span>
    <h1>Seguro que desea eliminar usuario?</h1>
    <form action="<?php echo base_url(); ?>admin/eliminar_convenio" method="post">
        <input class="convenioID" name="convenioID" type="hidden" value="<?php echo $convenio->convenioID; ?>">
        <button class="btn-cancel">Eliminar</button>
    </form>
    <span id="btn-cancelar" class="btn-general">CANCELAR</span>
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


    $('.btn-borrar-convenio').click(function(){
        $("#ventana-emergente").css("display","block");
        $(".contenido-emergente-confirm").css("display","block");

        var convenioID = (this.id).split('-');
        var id = convenioID[1];
        alert(id);
        $('input[type="hidden"][class="convenioID"]').prop("value", id );  
    });
    $('#close-ventana-emergente').click(function() {
      $("#ventana-emergente").css("display","none");
      $(".contenido-emergente-confirm").css("display","none");
    });
    $('#btn-cancelar').click(function() {
      $("#ventana-emergente").css("display","none");
      $(".contenido-emergente-confirm").css("display","none");
    });
    $('#btn-agregar-convenio').click(function(){
        var display = $("#form-agregar-convenio").css("display");
        if( display == 'none' ) {
            $("#form-agregar-convenio").css("display","block");
            $("#btn-agregar-convenio").text("Ocultar formulario");
        } else {
            $("#btn-agregar-convenio").text("Agregar Convenio");
            $("#form-agregar-convenio").css("display","none");
        }
    });

</script>