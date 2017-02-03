<div class="container-general">
    <div class="container">
        <div class="row">
        	<div class="col-md-2 col-md-offset-3">
        		<button onclick="history.go(-1);">Back </button>
        	</div>
            <div class="col-md-4 col-md-offset-3">  
                <div class="citas-disponibles-container">
                    <h6>CITAS DISPONIBLES: <span><?php echo @$_SESSION['creditos']; ?></span></h6>
                </div>
            </div>
        </div>
        <?php foreach($convenio_general->result() as $convenio ) : 
        		$precio_cita1 = $convenio->precio_cita;
        		$precio_cita4 = $convenio->precio_paquete;
        	endforeach;
        ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
    
                <h4 class="citas-title">COMPRAR CREDITOS</h4>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="WFAVG394DB3MA">
					<table>
					<tr><td>
					<input type="hidden" name="on0" value="Numero de citas"><h2>Numero de citas</h2></td></tr><tr><td>
					<input name="os0" id="os0" type="hidden" value="1 Cita">
					<div id="cita1" class="btn-selecc-creditos">
						<span>1 Cita</span>
						<span>$<?php echo $precio_cita1; ?></span>
					</div>
					<div id="cita4" class="btn-selecc-creditos">
						<span>4 Citas</span>
						<span>$<?php echo $precio_cita4; ?></span>
					</div>
					</td></tr>
					</table>
					<input type="hidden" name="currency_code" value="MXN">
					<br><br>
					<button border="0" name="submit" class="btn-general">PAGAR</button>
					
				</form>


               
            </div>
        </div>
    </div>
    
    
    
</div>
<script>
$('.btn-selecc-creditos').click(function() {
	var clave = this.id;
	if( clave == 'cita1' ) {
		$('#os0').prop('value', '1 Cita');
		$('#cita4').css('background-color','#ccc');
	}
	if( clave == 'cita4' ) {
		$('#os0').prop('value', '4 Citas');
		$('#cita1').css('background-color','#ccc');
	}
	$(this).css('background-color','#439aca');
	
});
</script>
<style>
.btn-selecc-creditos {
	position: relative;
	display: inline-block;
	margin-right: 10px;
	width: 100px;
	height: 100px;
	background-color: #ccc;
	cursor: pointer;
}
#cita1 {
	background-color: #439aca;
}

</style>