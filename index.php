<?php
include_once 'dbconfig.php';

// delete condition
if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM estoque_produto WHERE id_Estoque=".$_GET['delete_id'];
 mysql_query($sql_query);
 header("Location: $_SERVER[PHP_SELF]");
}
// delete condition
?>

<!DOCTYPE html>
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONTROLE DE ESTOQUE</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">

function edt_id(id)
{
 if(confirm('Deseja mesmo editar  ?'))
 {
  window.location.href='edit_data.php?edit_id=' + id;
 }
}

function delete_id(id)
{
 if(confirm('Esta entrada será deletada permanentemente. Deseja continuar ?'))
 {
  window.location.href='index.php?delete_id=' + id;
 }
}
</script>
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label id="titulo">CONTROLE DE ESTOQUE</label>
    </div>
</div>

<div id="body">
 <div id="content">

    <table align="center">
      <tr>
    <th>ID</th>
    <th>CÓDIGO DE BARRAS</th>
    <th>NOME</th>
    <th>DESCRIÇÃO</th>
    <th>QUANTIDADE</th>
    <th>PRECO</th>

    <th colspan="2"></th>
    </tr>
    <?php
 $sql_query="SELECT id_Estoque,Codigo_Produto,Nome_Produto,Descricao_Produto,Quantidade_Estoque,Preco FROM estoque_produto";
 $result_set = mysql_query($sql_query);
 while($row = mysql_fetch_row($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td><?php echo 'R$' . $row[5]; ?></td>
        <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')">Editar</a></td>
              <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')">Excluir</a></td>
        </tr>

        <?php
 }
 ?>
 <tr>
 <th colspan="4"><a href="add_data.php">ADICIONAR NOVO PRODUTO</a></th><th colspan="4"><a href="pagIni.php">VOLTAR</a></th>

 </tr>
    </table>
    </div>
</div>

</center>
</body>
</html>
