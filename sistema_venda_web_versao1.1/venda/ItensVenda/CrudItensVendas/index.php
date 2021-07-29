

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'ItensVenda.php';
$ItensVenda = new ItensVendas();
require_once '../venda/Venda.php';
$venda = new Vendas();
$venda = $venda->findOne($_GET['idvenda']);
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="script.js"></script>
 
    
  <meta charset="utf-8">

  <title>cadastrar itens da venda</title>
</head>
<body>
  <h2>cadastro de itens da venda</h2>


  <fieldset style="width: 500px;">
    <!--id fitensVendas ajudar para controlar o javascript -->
    <div id="fitensVendas">

       
                
         <form method='post' action="processa_ItensVendas.php">

      

            <br><br>
        <label class="dados"  for='nomedoproduto'> nome do perfume </label> 
             <select name="idproduto">
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

                                    $data = $conn->query('SELECT nomedoproduto, idproduto FROM produto');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idproduto'].'">'.$row['nomedoproduto'].'-'.$row['idproduto'].'</option>';

                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>
                    
                        </option>
                 </select><br><br>

                  
           

     <label class="dados"  for='quantidade_itens'> quantidade: </label>    
        <input class="entrada" type="text" name="quantidade_itens"><br><br>

     <label class="dados" for='valor'> valor: </label>    
        <input class="entrada" type="text" name="valor"><br><br>

     <label class="dados"  for='desconto'>desconto: </label>    
        <input class="entrada" type="text" name="desconto"><br><br>


       <input class="botao" type="button" value="inserir itens de venda" onclick="inserirdados(idvenda.value, idproduto.value, quantidade_itens.value, valor.value, desconto.value)">

       <div id="titensVendas">
            <table class="tabela_itensVendas"  id="dtitensVendas" style="width: 400px;">
                    <thead>
                        <h4>lista de itens vendas inserido</h4>
                        <tr>                    
                            <td>venda</td>
                            <td>produto</td>
                            <td>quantidade</td>
                            <td>valor</td>
                            <td>desconto</td>  
                        </tr>
                    </thead>
              
                </table>
      
        </div>
        <input  type="submit" value="confirma" name="cadastrar">
        
    </form>
        

    </div>

    
   
  </fieldset>

</body>
</html>