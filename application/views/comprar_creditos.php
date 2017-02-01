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
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
    
                <h4 class="citas-title">COMPRAR CREDITOS</h4>
                
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">

                  <!-- Saved buttons use the "secure click" command -->
                  <input type="hidden" name="cmd" value="_s-xclick">

                  <!-- Saved buttons are identified by their button IDs -->
                  <input type="hidden" name="hosted_button_id" value="221">

                  <!-- Saved buttons display an appropriate button image. -->
                  <input type="image" name="submit"
                    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                    alt="PayPal - The safer, easier way to pay online">
                  <img alt="" width="1" height="1"
                    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                </form>



               
            </div>
        </div>
    </div>
    
    
    
</div>