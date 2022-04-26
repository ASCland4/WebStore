<?php

namespace core\models;

use core\classes\Database;
use core\classes\Store;

class Produtos
{
    // ===========================================================
    public function lista_produtos_disponiveis($categoria)
    {
        // buscar todas as informações dos produtos da base de dados
        $bd = new Database();

        // buscar a lista de categorias da loja
        $categorias = $this->lista_categorias();

        $sql = "SELECT * FROM produtos ";
        $sql .= "WHERE visivel = 1 ";

        if (in_array($categoria, $categorias)) {
            $sql .= "AND categoria = '$categoria'";
        }

        $produtos = $bd->select($sql);
        return $produtos;
    }

    // ===========================================================
    public function lista_categorias()
    {

        // devolve a lista de categorias existentes na base de dados
        $bd = new Database();
        $resultados = $bd->select("SELECT DISTINCT categoria FROM produtos");
        $categorias = [];
        foreach ($resultados as $resultado) {
            array_push($categorias, $resultado->categoria);
        }
        return $categorias;
    }

    // ===========================================================
    public function verificar_stock_produto($id_produto)
    {

        $bd = new Database();
        $parametros = [
            ':id_produto' => $id_produto
        ];
        $resultados = $bd->select("
            SELECT * FROM produtos 
            WHERE id_produto = :id_produto
            AND visivel = 1
            AND stock > 0
        ", $parametros);

        return count($resultados) != 0 ? true : false;
    }

    // ===========================================================
    public function buscar_produtos_por_ids($ids)
    {

        $bd = new Database();
        return $bd->select("
            SELECT * FROM produtos
            WHERE id_produto IN ($ids)
        ");
    }
}