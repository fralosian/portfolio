<title>Painel de Controle</title>
<script src="scripts/bloqueio.js" type="text/javascript"></script>
<?php require_once('config/infor.php');?><?php require_once('../link.html');?>
<body >
<?php
//############## SystemBoys - Garotos de Sistema ##########

$password="$senha"; //senha

//#########################################################
if(!isset($passwd) or $passwd!=$password){
echo "<p>&nbsp;</p>
<p align=\"center\"><font style=\"font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFFF\" size=\"1\">Para acesso ao conteúdo da página seguinte você deverá<br />digitar a senha do administrador! A senha padrão que foi configurada pelo<br />programador '$nome' é [$senha].</font></p>
<table width=\"303\" border=\"1\" cellspacing=\"4\" cellpadding=\"1\" height=\"169\" bgcolor=\"#FF9900\" align=\"center\"><tr><td bgcolor=\"#FF3300\" height=\"110\"> 
<table width=\"311\" border=\"0\" cellspacing=\"4\" cellpadding=\"0\" background=\"img/background.canto.esquerdo.superior.jpg\" style=\"background-repeat:no-repeat\" bgcolor=\"#FFFFFF\" height=\"136\">
<tr><td height=\"175\"><div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\"><b><font size=\"2\"><img src=\"img/admin.jpg\" alt=\"Administrador\"><br />Administração</font></b></font><br>
</div><form name=\"form1\" method=\"post\" action=\"$_SERVER[PHP_SELF]\"><div align=\"center\">
<input type=\"password\" style=\"background-color:#FFCC00\" name=\"passwd\"><br><input type=\"submit\" style=\"background-color:#FF9900\" name=\"Submit\" value=\"Entrar\">
</div></form></td></tr></table></td></tr></table>
<p align=\"center\"><font style=\"font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFFF\" size=\"1\">$nome | $email | $grupo<br />fone/cel.: $fonecel | $home</font></p>";

}elseif ($passwd==$password){
if (isset($submit)){

echo "<div align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#ff0000\">Suas modificações foram atualizadas!</font></b></div>";
}
?>
<!--inicio do conteúdo -->

<h1><font style="font-family:Geneva, Arial, Helvetica, sans-serif; color:#FF9900">Você está dentro do cPanel...</font></h1>

<!--fim do conteúdo -->
<?php } ?>