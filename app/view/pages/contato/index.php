<div class="container padding-bottom-30px margin-bottom" align="center">
	<div class="col8" align="center">
        
		<div class="col6 inline vertical-align-top" align="left">
            
            <p>
                <?php if (empty($_GET['status'])){ 
                    	echo 'Fale Conosco. <br /><br />'; 
                    } else { 
                   	 	echo 'E-mail enviado com sucesso!'; 
                    } 
                ?>
            </p>
            
            <form action="envia_contato.php?item=contato" method="post">
                <input type="text" name="nome" placeholder="nome" class="col10" />         
                <input type="email" name="email" placeholder="email" class="col10" />
                <input type="text" name="telefone" placeholder="telefone" class="col10" />
                <textarea name="mensagem" placeholder="mensagem" class="col10"></textarea>
                <input type="submit" class="submit azul col4" value="enviar" />
            </form>
            
		</div>
            
		<div class="col6 inline" align="right">

                <?php

                    require (CONFIG_DIR.'database.php');
                    
                    foreach($conn->query("SELECT * FROM dados") as $row) {
                        $telefone       = $row['telefone'];
                        $email      = $row['email'];
                        $endereco       = $row['endereco'];

                        echo ' <p><h4 class="text-right text-marsala margin-0">'.$telefone.'</h4>';
                        echo $email.'<br/>';
                        echo $endereco.'<br/></p><br />';
                    }

                ?>    


                <p>
                <iframe width="85%" height="280" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3624.194503705892!2d-53.749949585362245!3d-24.720201884120254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f3958d7cd9161b%3A0x2bb1ba80e4107419!2sPolys+Idiomas!5e0!3m2!1sen!2sbr!4v1502469873444" style="border:0; border-radius:15px;"></iframe><br />
                </p>
            
            </div>
            
    </div>
</div>