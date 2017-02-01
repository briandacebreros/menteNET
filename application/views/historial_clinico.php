<div class="container-general">
    
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">  
                Historial clinico (inbox gmail) <br>
                <form action="<?php echo base_url(); ?>admin/agregar_historial_clinico" method="post">
                    <input name="usuarioID" value="<?php echo @$_SESSION['id']; ?>">


                    <label>Edad</label>
                    <input name="edad" type="number">

                    <br>
                    <label>Qué estudias o a que te dedicas</label><br>
                    <textarea name="pregunta1"></textarea>

                    <br>
                    <label>Que medio quieres que utilicemos para comunicarnos durante la terapia</label><br>
                    <select name="pregunta2">
                        <option value="chat">Chat de texto</option>
                        <option value="llamada">Llamada</option>
                        <option value="videollamada">Videollamada</option>
                    </select>

                    <br>
                    <label>Ahora bien, que fue lo ultimo que ocurrio para que decidieras consultar con un psicologo?</label><br>
                    <textarea name="pregunta3"></textarea>

                    <br>
                    <label>Podrias describir brevemente como sucedio la ultima vez que se presento ese sentimiento o problema</label><br>
                    <textarea name="pregunta4"></textarea>

                    <br>
                    <label>Que ocurria en tu vida antes de que se presentara ese sentimiento o problema?</label><br>
                    <textarea name="pregunta5"></textarea>


                    <br>
                    <label>Que tanto tiempo pasa para que ese sentimiento o problema se repita?</label><br>
                    <textarea name="pregunta6"></textarea>

                    <br>
                    <label>Desde cuando comenzo ese sentimiento o problema?</label><br>
                    <textarea name="pregunta7"></textarea>

                    <br>
                    <label>Cuando se presenta ese sentimiento o problema, cuanto tiempo dura aproximadamente?</label><br>
                    <textarea name="pregunta8"></textarea>

                    <br>
                    <label>Que tan significativo te resulta o que tan grave te hace sentir ese suceso</label><br>
                    <textarea name="pregunta9"></textarea>

                    <br>
                    <label>Que areas de tu vida personal se relacionan o se han visto afectadas por ese sentimiento o problema?</label><br>
                    <textarea name="pregunta10"></textarea>

                    <br>
                    <label>Notas</label><br>
                    <textarea name="notas"></textarea>

                    <br><br>
                    <button class="btn-login">
                        Enviar
                    </button> 
                </form>
            </div>
        </div>
    </div>
    
    
    
</div>
    