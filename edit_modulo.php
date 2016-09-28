<?php
include_once 'dbconfig.php';
$i = $_GET['edit_id'];

if(isset($i))
{
 $sql_query = "SELECT id_Modulo, Ip_Modulo, Status_Modulo FROM modulo WHERE id_Modulo=".$i;
 $result_set = mysql_query($sql_query);
 $row = mysql_fetch_array($result_set);
}

if(isset($_POST['btn-update']))
{
 $CodigoModulo = $_POST['CodigoModulo'];

 $sql_query = "UPDATE modulo SET Ip_Modulo='$CodigoModulo' WHERE Ip_Modulo=".$i;

 if(mysql_query($sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('Dados atualizados com sucesso!');
  window.location.href='modulos.php';
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
 header("Location: modulos.php");
}
?>
<!DOCTYPE html>
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONTROLE DE MÓDULOS</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label id="titulo"> EDITAR INFORMAÇÕES </label>
    </div>
</div>

<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">

    <tr>
      <td><input style="background: #EEE; cursor: not-allowed; color: #777" name="IdModulo" readonly="readonly" placeholder="Id do módulo" value="<?php echo $row[0]; ?>" /></td>
    </tr>
    <tr>
      <td><input type="text" name="CodigoModulo" placeholder="Código do módulo" value="<?php echo $row[1]; ?>" required /></td>
    </tr>
    <tr>
      <td><input type="text" name="Status" readonly="readonly" value="<?php echo $row[2]; ?>" /></td>
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
