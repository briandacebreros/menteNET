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
            <h4 class="col-md-10 col-md-offset-2 title-big">PRECIOS</h4>
            <div class="col-md-10 col-md-offset-2">
            <?php foreach($convenio->result() as $convenio_general ) : ?>
                <form action="<?php echo base_url(); ?>admin/editar_convenio" method="post">
                    <input name="convenioID" type="hidden" value="6">
                    <label>1 sesión</label><br>
                    <input name="precio_cita" type="number" value="<?php echo $convenio_general->precio_cita; ?>"><br>
                    <label>Paquete 4 sesiones</label><br>
                    <input name="precio_paquete" type="number" value="<?php echo $convenio_general->precio_paquete; ?>"><br>
                    <button class="btn-general">Actualizar</button>
                </form>
            <?php endforeach; ?>
            </div>
        </div>
       
    </div>
</div>
