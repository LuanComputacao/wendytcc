<?php
include_once 'dbconfig.php';
$i = $_GET['edit_id'];

if(isset($i))
{
 $sql_query = "SELECT id_Estoque, Codigo_Produto, Nome_Produto, Descricao_Produto, Quantidade_Estoque, Preco FROM estoque_produto WHERE id_Estoque=".$i;
 $result_set = mysql_query($sql_query);
 $row = mysql_fetch_array($result_set);
}

if(isset($_POST['btn-update']))
{
 // variables for input data
 $CodigoProduto = $_POST['CodigoProduto'];
 $NomeProduto = $_POST['NomeProduto'];
 $DescricaoProduto = $_POST['DescricaoProduto'];
 $Quantidade = $_POST['Quantidade'];
 $Preco = $_POST['Preco'];
 // variables for input data

 // sql query for update data into database
 $sql_query = "UPDATE estoque_produto SET Codigo_Produto='$CodigoProduto',Nome_Produto='$NomeProduto',Descricao_Produto='$DescricaoProduto',Quantidade_Estoque='$Quantidade',Preco = $Preco WHERE id_Estoque=".$i;

//"UPDATE `estoque_produto` SET `idESTOQUE_PRODUTO`= $i,`CODIGO_PRODUTO`= $CodigoProduto,`NOME_PRODUTO`= $NomeProduto,`DESCRICAO_PRODUTO`= $DescricaoProduto,`QUANTIDADE`= $Quantidade,`PRECO`= $Preco WHERE `idESTOQUE_PRODUTO`= $i";

 // sql query for update data into database

 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('Dados atualizados com sucesso!');
  window.location.href='index.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('Erro ao atualizar os dados!');
  </script>
  <?php
 }
 // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
 header("Location: index.php");
}
?>
<!DOCTYPE html>
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONTROLE DE ESTOQUE</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label id="titulo">EDITAR INFORMAÇÕES </label>
    </div>
</div>

<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">

    <tr>
      <td><input type="text" name="CodigoProduto"  value="<?php echo $row[1]; ?>" required /></td>
    </tr>
    <tr>
      <td><input type="text" name="NomeProduto"  value="<?php echo $row[2]; ?>" required /></td>
    </tr>
    <tr>
      <td><input type="text" name="DescricaoProduto"  value="<?php echo $row[3]; ?>" required /></td>
    </tr>
    <tr>
        <td><input type="text" name="Quantidade" value="<?php echo $row[4]; ?>" required /></td>
    </tr>
    <tr>
      <td><input type="text" name="Preco" value="<?php echo $row[5]; ?>" required /></td>
    </tr>
    <tr>
    <td>
    <!-- -->
    <button type="submit" name="btn-update"><strong>Atualizar</strong></button>
    <button type="submit" name="btn-cancel" align="center"><strong>Cancelar</strong></button>
    </td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>