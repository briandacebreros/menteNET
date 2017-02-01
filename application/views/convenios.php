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
                        <form action="<?php echo base_url(); ?>admin/eliminar_convenio" method="post">
                            <input name="convenioID" type="hidden" value="<?php echo $convenio->convenioID; ?>">
                            <button class="btn-cancel">Eliminar</button>
                        </form>
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


<script>
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