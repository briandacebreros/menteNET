<div class="header-title">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <h4>Agenda tu cita</h4>
                <p>Agenda tu cita seleccionando la fecha y horario que más te convenga.</p>
            </div>
        </div>
    </div>
</div>

<div class="agenda-container">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-md-offset-2 alt-desc"><img src="<?php echo base_url(); ?>assets/images/disponible.svg" alt=""> Horario disponible</div>
            <div class="col-md-2 alt-desc"><img src="<?php echo base_url(); ?>assets/images/ocupado.svg" alt=""> Horario ocupado</div>
        </div>
        <div class="row">
            <!-- DAY COLUMN -->
            <div id="day1" class="col-md-1 col-md-offset-2 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">12</font>
                    <font class="day-name">LUNES</font>
                </div>
                <div class="day-hour">12:00</div>
                <div class="day-hour">14:00</div>
                <div class="day-hour">16:00</div>
                <div class="day-hour">18:00</div>
            </div>
            <!-- end DAY COLUMN -->
            
            <!-- DAY COLUMN -->
            <div id="day2" class="col-md-1 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">13</font>
                    <font class="day-name">MARTES</font>
                </div>
                <div class="day-hour">12:00</div>
                <div class="day-hour">14:00</div>
                <div class="day-hour">16:00</div>
                <div class="day-hour">18:00</div>
            </div>
            <!-- end DAY COLUMN -->
            
            <!-- DAY COLUMN -->
            <div id="day3" class="col-md-1 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">14</font>
                    <font class="day-name">MIERCOLES</font>
                </div>
                <div class="day-hour">12:00</div>
                <div class="day-hour">14:00</div>
                <div class="day-hour">16:00</div>
                <div class="day-hour">18:00</div>
            </div>
            <!-- end DAY COLUMN -->
            
            <!-- DAY COLUMN -->
            <div id="day4" class="col-md-1 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">15</font>
                    <font class="day-name">JUEVES</font>
                </div>
                <div class="day-hour">12:00</div>
                <div class="day-hour">14:00</div>
                <div class="day-hour">16:00</div>
                <div class="day-hour">18:00</div>
            </div>
            <!-- end DAY COLUMN -->
            
            <!-- DAY COLUMN -->
            <div id="day5" class="col-md-1 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">16</font>
                    <font class="day-name">VIERNES</font>
                </div>
                <div class="day-hour">12:00</div>
                <div class="day-hour">14:00</div>
                <div class="day-hour">16:00</div>
                <div class="day-hour">18:00</div>
            </div>
            <!-- end DAY COLUMN -->
            
            <!-- DAY COLUMN -->
            <div id="day6" class="col-md-1 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">17</font>
                    <font class="day-name">SABADO</font>
                </div>
            </div>
            <!-- end DAY COLUMN -->
            
            <!-- DAY COLUMN -->
            <div id="day7" class="col-md-1 day-column">
                <div class="day-tile">
                    <font class="day-month">Dic</font>
                    <font class="day-number">18</font>
                    <font class="day-name">DOMINGO</font>
                </div>
            </div>
            <!-- end DAY COLUMN -->
        </div>


        <div class="row">
            <form  action="<?php echo base_url(); ?>principal/agendar_cita" method="post">
                <input name="id" type="hidden" value="<?php echo @$_SESSION['id']; ?>">
                <input name="estado" type="hidden" value="<?php echo 'futura'; ?>">
                <input name="link" type="hidden" value="<?php echo ''; ?>">
                <input name="fecha" type="date">
                <input name="hora" type="text">
                <button class="btn-login">
                    Agendar Cita
                </button>     
            </form>
        </div>
    </div>
</div>