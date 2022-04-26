<?php

namespace core\classes;

use Exception;

class Store
{

    // ===========================================================
    public static function Layout($estruturas, $dados = null)
    {

        // verifica se estruturas é um array
        if (!is_array($estruturas)) {
            throw new Exception("Coleção de estruturas inválida");
        }

        // variáveis
        if (!empty($dados) && is_array($dados)) {
            extract($dados);
        }

        // apresentar as views da aplicação
        foreach ($estruturas as $estrutura) {
            include("../core/views/$estrutura.php");
        }
    }

    // ===========================================================
    public static function clienteLogado()
    {

        //verifica se existe um cliente com sessao
        return isset($_SESSION['cliente']);
    }

    // ===========================================================
    public static function criarHash($num_caracteres = 12)
    {

        // criar haashes
        $chars = '01234567890123456789abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($chars), 0, $num_caracteres);
    }

    // ===========================================================
    public static function redirect($rota = '')
    {

        // faz o redirecionamento para a URL desejada (rota)
        header("Location: " . BASE_URL . "?a=$rota");
    }

    // ===========================================================
    public static function gerarCodigoEncomenda()
    {
        // gerar um código de encomenda
        $codigo = "";
        // AZ123456
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codigo .= substr(str_shuffle($chars), 0, 2);
        $codigo .= rand(100000, 999999);
        return $codigo;
    }

    // ===========================================================
    public static function printData($data)
    {
        if (is_array($data) || is_object($data)) {
            echo '<pre>';
            print_r($data);
        } else {
            echo '<pre>';
            echo $data;
        }

        die('<br>TERMINADO');
    }
}