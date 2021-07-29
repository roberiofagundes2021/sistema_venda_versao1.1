 <?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'ItensVenda.php';
require_once '../venda/Venda.php';



?>

 <?php
      $venda = new Vendas();
    
    if(isset($_POST['cadastrar'])):
          

            $ItensVenda = new ItensVendas();
            $ItensVenda->setIdProduto($_POST['idproduto']);
            $ItensVenda->setIdVenda($_GET['idvenda']);
            $ItensVenda->setQuantidade($_POST['quantidade_itens']);
            $ItensVenda->setValorVenda($_POST['valor']);
            $ItensVenda->setDesconto($_POST['desconto']);
         
          
             try {
                $ItensVenda->insert_itensVenda($ItensVenda->getIdProduto(), $ItensVenda->getIdVenda(), $ItensVenda->getQuantidade(), $ItensVenda->getValorVenda(), $ItensVenda->getDesconto());
                echo
                '<div class="success callout">
                    <h5>Item cadastrado</h5>
                </div>';
            } catch (PDOException $err) {
                echo $err->getMessage();
            }

            if($ItensVenda-> insert_itensVenda()){
            
                echo "itens de vendas inserida com sucesso ". $idvenda. " inserido com sucesso";
                 header('Location:forma_pagamento/index.php');

            }


      endif;  

     



   
    ?>
  