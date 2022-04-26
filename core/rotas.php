<?php

// coleção de rotas
$rotas = [
    'inicio' => 'main@index',
    'loja' => 'main@loja',

    // cliente
    'novo_cliente' => 'main@novo_cliente',
    'criar_cliente' => 'main@criar_cliente',
    'confirmar_email' => 'main@confirmar_email',

    // Login
    'login' => 'main@login',
    'login_submit' => 'main@login_submit',
    'logout' => 'main@logout',

    // carrinho
    'adicionar_carrinho' => 'carrinho@adicionar_carrinho',
    'remover_produto_carrinho' => 'carrinho@remover_produto_carrinho',
    'limpar_carrinho' => 'carrinho@limpar_carrinho',
    'carrinho' => 'carrinho@carrinho',
    'finalizar_encomenda' => 'carrinho@finalizar_encomenda',
    'finalizar_encomenda_resumo' => 'carrinho@finalizar_encomenda_resumo',
    'morada_alternativa' => 'carrinho@morada_alternativa',
    'confirmar_encomenda' => 'carrinho@confirmar_encomenda',
];

// define ação por defeito
$acao = 'inicio';

// verifica se existe a ação na query string
if (isset($_GET['a'])) {

    // verifica se a ação existe nas rotas
    if (!key_exists($_GET['a'], $rotas)) {
        $acao = 'inicio';
    } else {
        $acao = $_GET['a'];
    }
}

// trata a definição da rota
$partes = explode('@', $rotas[$acao]);
$controlador = 'core\\controllers\\' . ucfirst($partes[0]);
$metodo = $partes[1];

$ctr = new $controlador();
$ctr->$metodo();