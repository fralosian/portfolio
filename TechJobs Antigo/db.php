<?php 
// ignorar erro de Deprecated: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead in /home/u127641577/public_html/funcoes.php on line 23

//conexao etec("127.0.0.1","root","")
//conexao local ("localhost","root","123456")
//conexao banco da etec ("172.16.48.10","techjobs","t3chj035")
//conexao banco da etec ("200.168.206.197","techjobs","t3chj035")
// efetua a conexão no servidor

require_once('link.html');

// Ignorar erro de Deprecated: mysql_connect()
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED ^ E_WARNING);

try {
    // Definir as informações de conexão
    $db_host = 'localhost';
    $db_name = 'techjobs';
    $db_user = 'root';
    $db_password = '123456';

    // Criar uma nova conexão PDO
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
    $connection = new PDO($dsn, $db_user, $db_password);

    // Configurar o PDO para lançar exceções em caso de erro
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Em caso de erro na conexão, exibir uma mensagem personalizada
    echo '
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <img id="logonav" alt="logo" src="img/logo-br.png" style="width:90px;height:21px">
                    </a>
                </div>
            </div>
        </nav>
        <label>Não foi possível ligar ao servidor: ' . $e->getMessage() . '</label>';
    exit; // Encerrar a execução do script
}
?>
