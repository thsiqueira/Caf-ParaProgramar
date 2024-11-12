<?php

function listaConsumo($conexao): array {
    $consumos = array();

    $query = " SELECT co.id as consumo_id, date_format(co.data_consumo, '%d/%m/%y')
     as data_consumo, ";
    $query .= "time_format(co.hora, '%H:%i') as hora,";
    $query .= " co.preco, co.quantidade, ca.nome AS cafe_nome ";
    $query .= " from consumo co ";
    $query .= " inner JOIN cafe ca on (ca.id = co.cafe_id) ";
    $query .= " where 1=1";
    $query .= " ORDER BY co.data_consumo ASC";

    $instrucao = $conexao->prepare($query);
    $instrucao->execute();
    $resultado = $instrucao->get_result();
    
    while ($consumo = $resultado->fetch_assoc()) {
        array_push($consumos, $consumo);
    }

    return $consumos;
}

function listaConsumoCafe($conexao): array {
    $consumos = array();

    $query = "
        SELECT ca.nome AS cafe_nome, SUM(co.quantidade) AS quantidade_total
        FROM consumo co
        INNER JOIN cafe ca ON ca.id = co.cafe_id
        GROUP BY co.cafe_id
    ";

    $instrucao = $conexao->prepare($query);
    $instrucao->execute();
    $resultado = $instrucao->get_result();
    
    while ($consumo = $resultado->fetch_assoc()) {
        array_push($consumos, $consumo);
    }

    return $consumos;
}




function removeConsumo($conexao, $id){
    $query = "delete from consumo where id = ?";
    $instrucao = $conexao->prepare($query);
    $instrucao->bind_param('i', $id);
    return $instrucao->execute();
}

function adicionaConsumo($conexao, $data, $hora, $cafe_id, $quantidade, $preco){
    $query = "insert into consumo (data_consumo, hora, cafe_id, quantidade, preco) values (?,?,?,?,?)";
    $instrucao = $conexao->prepare($query); 
    $instrucao->bind_param('ssiid', $data, $hora, $cafe_id, $quantidade, $preco);
    return $instrucao->execute();
}

?>


