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
        	<div class="col-md-10 col-md-offset-2">
                <button class="btn-login" onclick="history.go(-1);">Back </button>
                <br><br>
            <?php 
                foreach($cliente->result() as $c ) :
            ?>

        	<h2><label>Cliente: </label><?php echo $c->nombre . ' ' . $c->ap_paterno . ' ' . $c->ap_materno; ?></h2>
            <h3><label>Telefono: </label><?php echo $c->telefono; ?></h3>
            <div class="row">
                <h4 class="col-md-10 col-md-offset-0 title-big">CITAS FUTURAS</h4>
                <!-- TITULOS -->
                <div class="col-md-10 col-md-offset-0 header-table">
                    <div class="col-md-3">
                        Fecha
                    </div>
                    <div class="col-md-3">
                        Hora
                    </div>
                    <div class="col-md-6">
                        Link
                    </div>
                </div>
                <!-- end TITULOS -->
            </div>
            <div class="row">
            
            
            <?php foreach( $citas_futuras->result() as $cita ) : ?>
                <a href="http://proaestheticsfitness.com/menteNET/admin/cita/<?php echo $cita->citaID; ?>" class="col-md-10 col-md-offset-0 list-row">
                    <div class="col-md-3">
                        <?php echo $cita->fecha; ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $cita->hora; ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $cita->link; ?>
                    </div>
                </a>
                

            <?php endforeach; ?>

            </div>

                
                

            <div>  
                <br><br>
                <?php if( $historial->result() ) : ?>
                    <span id="btn-ver-historial" class="btn-general">Ver historial</span> <br><br>
                <?php else : ?>
                    <h3>Sin historial</h3>
                <?php endif; ?>
                <div id="historial-usuario" style="display:none;">
                	<?php foreach( $historial->result() as $hist ) : ?>
                        <h1>Historial </h1> 
                        <label>Edad</label><br>
                        <?php echo '' . $hist->edad; ?><br><br>
                        <label>Qué estudias o a que te dedicas</label><br>
                        <?php echo '' . $hist->pregunta1; ?> <br><br>
                        <label>Que medio quieres que utilicemos para comunicarnos durante la terapia</label><br>
                        <?php echo '' . $hist->pregunta2; ?> <br><br>
                        <label>Ahora bien, que fue lo ultimo que ocurrio para que decidieras consultar con un psicologo?</label><br>
                        <?php echo '' . $hist->pregunta3; ?> <br><br>
                        <label>Podrias describir brevemente como sucedio la ultima vez que se presento ese sentimiento o problema</label><br>
                        <?php echo '' . $hist->pregunta4; ?> <br><br>
                        <label>Que ocurria en tu vida antes de que se presentara ese sentimiento o problema?</label><br>
                        <?php echo '' . $hist->pregunta5; ?> <br><br>
                        <label>Que tanto tiempo pasa para que ese sentimiento o problema se repita?</label><br>
                        <?php echo '' . $hist->pregunta6; ?> <br><br>
                        <label>Desde cuando comenzo ese sentimiento o problema?</label><br>
                        <?php echo '' . $hist->pregunta7; ?> <br><br>
                        <label>Cuando se presenta ese sentimiento o problema, cuanto tiempo dura aproximadamente?</label><br>
                        <?php echo '' . $hist->pregunta8; ?> <br><br>
                        <label>Que tan significativo te resulta o que tan grave te hace sentir ese suceso</label><br>
                        <?php echo '' . $hist->pregunta9; ?> <br><br>
                        <label>Que areas de tu vida personal se relacionan o se han visto afectadas por ese sentimiento o problema?</label><br>
                        <?php echo '' . $hist->pregunta10; ?> <br><br>
                        <label>Pregunta</label>


                        <label>Notas</label>
                        <?php echo $hist->notas; ?> <br>


                    <?php endforeach; ?>
                </div>
                    
                	
                <br><br>
            </div>





                
                <span id="btn-editar-usuario" class="btn-general">Editar usuario</span>

                
        		<form id="form-editar-usuario" style="display:none;" action="<?php echo base_url(); ?>admin/actualizar_usuario" method="post">
                    <h4>Nombre de usuario: <?php echo $c->username; ?></h4><br>
                    <input type="hidden" name="usuarioID" value="<?php echo $c->usuarioID; ?>">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $c->nombre; ?>" class="input-login" placeholder="Nombre(s)">
                    <label>Apellido Paterno</label>
                    <input type="text" name="ap_paterno" value="<?php echo $c->ap_paterno; ?>" class="input-login" placeholder="Apellido Paterno">
                    <label>Apellido Materno</label>
                    <input type="text" name="ap_materno" value="<?php echo $c->ap_materno; ?>" class="input-login" placeholder="Apellido Materno">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" value="<?php echo $c->telefono; ?>" class="input-login" placeholder="Teléfono">
                    <label>Créditos</label>
                    <input type="number" name="creditos" value="<?php echo $c->creditos; ?>" class="input-login" placeholder="Creditos">

                        <label>Convenio</label><br>
                        <select name="convenioID">
                            <option value="" selected></option>
                            <?php foreach($convenios->result() as $con ) : ?>
                                <?php if( $con->convenioID != '6' ) : ?>
                                    <?php if( $con->convenioID == $c->convenioID ) : $convenio_selected = "selected"; else : $convenio_selected = ""; endif; ?>
                                    <?php echo "<option value='" . $con->convenioID  . "' " . $convenio_selected . ">". $con->clave ."</option>"; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
       
                    <br>    
                    <button class="btn-general">
                        Actualizar
                    </button>     
                </form>

                <span id="btn-borrar-usuario" class="btn-cancel">ELIMINAR USUARIO</span>
            <?php
                endforeach;
            ?>
            </div>
        </div>

    </div>
</div>

<div id="ventana-emergente">
  <div class="fondo-emergente"></div>
  <div class="contenido-emergente-confirm">
    <span id="close-ventana-emergente">X</span>
    <h1>Seguro que desea eliminar usuario?</h1>
    <form action="<?php echo base_url(); ?>admin/eliminar_usuario" method="post">
        <input type="hidden" name="usuarioID" value="<?php echo $c->usuarioID; ?>">
        <button class="btn-cancel">ELIMINAR</button>
    </form>
    <span class="btn-general">CANCELAR</span>
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


    $('#btn-borrar-usuario').click(function(){
        $("#ventana-emergente").css("display","block");
        $(".contenido-emergente-confirm").css("display","block");
    });
    $('#close-ventana-emergente').click(function() {
      $("#ventana-emergente").css("display","none");
      $(".contenido-emergente-confirm").css("display","none");
    });




    $('#btn-editar-usuario').click(function(){
        var display = $("#form-editar-usuario").css("display");
        if( display == 'none' ) {
            $("#form-editar-usuario").css("display","block");
            $("#btn-editar-usuario").css("display","none");
        } else {
            $("#btn-editar-usuario").css("display","block");
            $("#form-editar-usuario").css("display","none");
        }
    });

    $('#btn-ver-historial').click(function(){
        var display = $("#historial-usuario").css("display");
        if( display == 'none' ) {
            $("#historial-usuario").css("display","block");
            $("#btn-ver-historial").text("Ocultar historial");
        } else {
            $("#btn-ver-historial").text("Ver historial");
            $("#historial-usuario").css("display","none");
        }
    });
</script>