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
            <h3 class="title-big col-md-offset-2">CITAS PROXIMAS</h3>

            <form  action="<?php echo base_url(); ?>correo/registro_exitoso" method="post">
                <input type="text" name="destinatario" value="briandacebreros@gmail.com">
                <button>Enviar correo test</button>
            </form>


            <!-- DAY COLUMN -->
            <div id="day1" class="col-md-2 col-md-offset-2 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">12</font>
                    <font class="day-name">LUNES</font>
                </div>
            </div>
            <!-- end DAY COLUMN -->
            
            <!-- DAY COLUMN -->
            <div id="day2" class="col-md-2 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">13</font>
                    <font class="day-name">MARTES</font>
                </div>
            </div>
            <!-- end DAY COLUMN -->
            
            <!-- DAY COLUMN -->
            <div id="day3" class="col-md-2 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">14</font>
                    <font class="day-name">MIERCOLES</font>
                </div>
            </div>
            <!-- end DAY COLUMN -->
            
            <!-- DAY COLUMN -->
            <div id="day4" class="col-md-2 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">15</font>
                    <font class="day-name">JUEVES</font>
                </div>
            </div>
            <!-- end DAY COLUMN -->
            
            <!-- DAY COLUMN -->
            <div id="day5" class="col-md-2 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">16</font>
                    <font class="day-name">VIERNES</font>
                </div>
            </div>
            <!-- end DAY COLUMN -->
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <!-- CITA DEL DIA TILE -->
                <div class="cita-tile">
                    <div class="cita-tile-fecha"><img src="<?php echo base_url(); ?>assets/images/event-details-icon-01.svg" alt="">07/12</div>
                    <div class="cita-tile-hora"><img src="<?php echo base_url(); ?>assets/images/event-details-icon-02.svg" alt="">10:00</div>
                    <div class="nombre-paciente">Nombre completo de paciente</div>
                    <span class="cita-tile-menu accionador-menu"><img src="<?php echo base_url(); ?>assets/images/cita-menu.svg" alt=""></span>
                    <div class="cita-tile-menu-desplegado menu-desplegado"><a href="">VER</a><a href="">PERFIL CLIENTE</a><a href="">REAGENDAR</a></div>
                </div>
                <!-- end CITA DEL DIA -->
                
                <!-- CITA DEL DIA TILE -->
                <div class="cita-tile">
                    <div class="cita-tile-fecha"><img src="<?php echo base_url(); ?>assets/images/event-details-icon-01.svg" alt="">07/12</div>
                    <div class="cita-tile-hora"><img src="<?php echo base_url(); ?>assets/images/event-details-icon-02.svg" alt="">10:00</div>
                    <div class="nombre-paciente">Nombre completo de paciente</div>
                    <span class="cita-tile-menu accionador-menu"><img src="<?php echo base_url(); ?>assets/images/cita-menu.svg" alt=""></span>
                    <div class="cita-tile-menu-desplegado menu-desplegado"><a href="">VER</a><a href="">PERFIL CLIENTE</a><a href="">REAGENDAR</a></div>
                </div>
                <!-- end CITA DEL DIA -->
                
                <!-- CITA DEL DIA TILE -->
                <div class="cita-tile">
                    <div class="cita-tile-fecha"><img src="<?php echo base_url(); ?>assets/images/event-details-icon-01.svg" alt="">07/12</div>
                    <div class="cita-tile-hora"><img src="<?php echo base_url(); ?>assets/images/event-details-icon-02.svg" alt="">10:00</div>
                    <div class="nombre-paciente">Nombre completo de paciente</div>
                    <span class="cita-tile-menu accionador-menu"><img src="<?php echo base_url(); ?>assets/images/cita-menu.svg" alt=""></span>
                    <div class="cita-tile-menu-desplegado menu-desplegado"><a href="">VER</a><a href="">PERFIL CLIENTE</a><a href="">REAGENDAR</a></div>
                </div>
                <!-- end CITA DEL DIA -->
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <h3 class="title-big" style="margin-top:50px;">VISITAS</h3>
                <div class="google-analytics-frame">
                    
                </div>
            </div>
        </div>
        
    </div>
</div>