<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("pagamento/pagamento/pagamento.php");

?>
 


<!DOCTYPE html>
<html>
<head>
    <script src="views/js/script.js"></script>
    <script src="views/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<title class="titulo">escolhar a forma como vai pagar</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
        <body>
        	<h2>escolhar a forma como vai pagar</h2>
	       <fieldset class="formulario">
                <form method='post' action="">
                     <label class="dados" for='idparcelas'>quantidade de parcelas</label><br><br>
                    <select name="idparcelas">
                        <option> selecione </option>
                        <option>
                            <?php
                                /*
                                * Método de conexão sem padrões
                                */

                                $username = 'vhjmuogwqmldtg';
                                $password = '2bbdb436b2188ff48760b1366c2e17d9d8eb93d695f9a83c3d31bd7e7e093eb4';

                                try {
                                    $conn = new PDO('pgsql:host=ec2-54-163-97-228.compute-1.amazonaws.com;dbname=d9ejdo53669jjr', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('SELECT numerodeparcelas, valorparcela, idparcelas FROM parcelas');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['numerodeparcelas'].'">'.$row['numerodeparcelas'].'</option>';

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>
                    
                        </option>
                     </select><br><br>

                    <label class="dados" for='idforma_de_pagamento'>formas de pagamento</label><br><br>
                    <select name="idforma_de_pagamento">
                        <option> selecione </option>
                        <option>
                            <?php
                                /*
                                * Método de conexão sem padrões
                                */

                                $username = 'vhjmuogwqmldtg';
                                $password = '2bbdb436b2188ff48760b1366c2e17d9d8eb93d695f9a83c3d31bd7e7e093eb4';

                                try {
                                    $conn = new PDO('pgsql:host=ec2-54-163-97-228.compute-1.amazonaws.com;dbname=d9ejdo53669jjr', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('SELECT tipo_pagamento, idforma_de_pagamento FROM forma_de_pagamento');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idforma_de_pagamento'].'">'.$row['tipo_pagamento'].'-'.$row['idforma_de_pagamento'].'</option>';

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>
                    
                        </option>
                     </select><br><br>
                     <!-- colocar no automatico o valor total do pagamento-->
                  
                    

                   <label class="dados" for='datapagamento'> escolhar data vai fazer o pagamento </label><br><br>    
    	           <input class="entrada" type="date" name="datapagamento"/><br><br>
                   <input class="botao" type="submit" value="confirmar a forma de pagamento" name="cadastrar"/> 
                </form>
	        </fieldset>

</body>
</html>

    <?php
    
      $CrudPagamentos = new Pagamentos;
      if(isset($_POST['cadastrar'])):
     
            
            $datavenda = $_POST['datavenda'];
            $idvenda = $_POST['idvenda'];
           
    
            $CrudVendas->setIdCliente($idcliente);
            $CrudVendas->setDataVenda($datavenda);
            $CrudVendas->setIdVenda($idvenda);
            

            if($CrudVendas->insert()){
                echo "vendas ". $idcliente. " inserido com sucesso";
            }
      endif;
    ?>



