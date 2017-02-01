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
            <h4 class="col-md-10 col-md-offset-2 title-big">CITAS</h4>
            <!-- TITULOS -->
            <div class="col-md-10 col-md-offset-2 header-table">
                <div class="col-md-3">
                    Nombre
                </div>
                <div class="col-md-3">
                    Apellidos
                </div>
                <div class="col-md-2">
                    Fecha
                </div>
                <div class="col-md-2">
                    Hora
                </div>
                <div class="col-md-2">
                    Link
                </div>
            </div>
            <!-- end TITULOS -->
        </div>
        <div class="row">
            <!-- CLIENTE TILE -->
          
            <!-- end CLIENTE TILE -->
            
            <?php foreach( $citas->result() as $cita ) : ?>
                <a href="<?php base_url(); ?>cita/<?php echo $cita->citaID; ?>" class="col-md-10 col-md-offset-2 list-row">
                
                    <div class="col-md-3">
                        <?php echo $cita->nombre; ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $cita->ap_paterno . ' ' . $cita->ap_materno; ?>
                    </div>
                    <div class="col-md-2">
                        <?php echo date('d-m-Y', strtotime($cita->fecha)); ?>
                    </div>
                    <div class="col-md-2">
                        <?php echo $cita->hora; ?>
                    </div>
                    <div class="col-md-2">
                        <?php if($cita->link != null) : echo 'VER'; endif; ?>
                        <?php if($cita->link == null) : ?>
                            <span class="link"><?php echo $cita->citaID; ?>Agregar Link</span>
                        <?php endif; ?>

                    </div>
                </a>
                <div id="modificar-link-cita-<?php echo $cita->citaID; ?>" class="link-cita col-md-10 col-md-offset-2">
                    <form action="<?php echo base_url(); ?>admin/agregar_link_cita" method="post">
                        <input type="hidden" name="citaID" value="<?php echo $cita->citaID; ?>">
                        <input type="text" name="link" value="<?php echo $cita->citaID; ?>">
                        <button class="btn-login">Guardar</button>
                    </form>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>



<style>
.link-cita {
    display:            none;
}

</style>
<script>
$('.link').click(function() {
    alert('clicked');
    $(this).css('display','block');
});

</script>