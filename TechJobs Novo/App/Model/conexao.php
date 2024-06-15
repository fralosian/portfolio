<?php
namespace App\Model;

class Conexao
{
    private static $instance;

    public static function getConn()
    {
        if (!isset(self::$instance)) {
            try {
                // Tenta criar uma nova instância de PDO para a conexão com o banco de dados
                self::$instance = new \PDO('mysql:host=localhost;dbname=newtechjobs;charset=utf8', 'root', '');
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                // Aqui você pode criar lógicas baseadas no código de erro para detalhar o problema
                $error_code = $e->getCode();
                $error_message = $e->getMessage();

                switch ($error_code) {
                    case 1045:
                        die('Erro de autenticação: Verifique seu usuário e senha. <br> Código: ' . $error_code);
                    case 1049:
                        die('Erro de banco de dados: Banco de dados não encontrado. <br> Código: ' . $error_code);
                    case 2002:
                        die('Erro de conexão: Não foi possível conectar ao servidor MySQL.. <br> Código: ' . $error_code);
                    default:
                        die('Erro de conexão ao banco de dados:' . $error_message . '<br> Código: ' . $error_code);
                }
            }
        }
        return self::$instance;
    }
}

