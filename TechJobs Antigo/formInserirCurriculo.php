<?php require_once("db.php");

$id_aluno = $_POST['idAluno'];
//Escolaridade
$escolaridade = $_POST['escolaridade'];
$instEscolar = $_POST['instEscolar'];
$previsaoEscolar = $_POST['previsaoEscolar'];
$anoEscolar = $_POST['anoEscolar'];
//cursos complementares
//1º campo 
$curso = $_POST['curso'];
$intituicaoCurso = $_POST['intituicaoCurso'];
$previsaoCurso = $_POST['previsaoCurso'];
$anoCurso = $_POST['anoCurso'];
//2º campo = 0
$curso0 = $_POST['curso0'];
$intituicaoCurso0 = $_POST['intituicaoCurso0'];
$previsaoCurso0 = $_POST['previsaoCurso0'];
$anoCurso0 = $_POST['anoCurso0'];
//3º campo = 3
$curso3 = $_POST['curso3'];
$intituicaoCurso3 = $_POST['intituicaoCurso3'];
$previsaoCurso3 = $_POST['previsaoCurso3'];
$anoCurso3 = $_POST['anoCurso3'];
//linguas estrangeiras
$nacionalidade = $_POST['nacionalidade'];
$idioma = $_POST['idioma'];
$idiomaNivel = $_POST['idiomaNivel'];
//2º campo = 0
$idioma0 = $_POST['idioma0'];
$idiomaNivel0 = $_POST['idiomaNivel0'];
//3º campo = 2
$idioma2 = $_POST['idioma2'];
$idiomaNivel2 = $_POST['idiomaNivel2'];
//experiencia profissional
$expFuncao = $_POST['expFuncao'];
$expEmpresa = $_POST['expEmpresa'];
$expEntrada = $_POST['expEntrada'];
$expSaida = $_POST['expSaida'];
//2º campo = 0
$expFuncao0 = $_POST['expFuncao0'];
$expEmpresa0 = $_POST['expEmpresa0'];
$expEntrada0 = $_POST['expEntrada0'];
$expSaida0 = $_POST['expSaida0'];
//3º campo = 4
$expFuncao4 = $_POST['expFuncao4'];
$expEmpresa4 = $_POST['expEmpresa4'];
$expEntrada4 = $_POST['expEntrada4'];
$expSaida4 = $_POST['expSaida4'];

$sql = "INSERT INTO curriculo VALUES ('$id_aluno','$escolaridade','$instEscolar','$previsaoEscolar','$anoEscolar','$curso','$intituicaoCurso','$previsaoCurso','$anoCurso','$curso0','$intituicaoCurso0','$previsaoCurso0','$anoCurso0','$curso3','$intituicaoCurso3','$previsaoCurso3','$anoCurso3','$nacionalidade','$idioma','$idiomaNivel','$idioma0','$idiomaNivel0','$idioma2','$idiomaNivel2','$expFuncao','$expEmpresa','$expEntrada','$expSaida','$expFuncao0','$expEmpresa0','$expEntrada0','$expSaida0','$expFuncao4','$expEmpresa4','$expEntrada4','$expSaida4')";
if (mysql_query($sql)) {
	echo "deu quase certo";
	header("location:aluno-home.php");

}else{
	echo "Nao deu certo porque: ".mysql_error();
}
?>
