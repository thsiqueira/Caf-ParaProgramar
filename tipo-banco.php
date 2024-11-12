<?php
function listaTipo($conexao){
    
    $tipos = array();

    $query = "select id, nome from tipo ";
    $instrucao = $conexao->prepare($query);
    $instrucao->execute();
    $resultado = $instrucao->get_result();
    while($tipo = $resultado->fetch_assoc()) {
        array_push($tipos,$tipo) ;
    }
    return $tipos;
}

function buscaTipoPorId($conexao, $id){
    $query = "select id, nome from tipo where id = ?";
    $instrucao = $conexao->prepare($query);
    $instrucao->bind_param('i', $id);
    $instrucao->execute();
    $resultado = $instrucao->get_result();
    return $resultado->fetch_assoc();
}

function alteraTipo($conexao, $id, $nome){
    $query = "update tipo set nome = ? where id = ? ";
    $instrucao = $conexao->prepare($query);
    $instrucao->bind_param('si', $nome, $id);
    return $instrucao->execute();
}

function tiposPorNome($conexao, $nome){
    $query = "select count(id) as qtd from tipo where nome = ?";
    $instrucao = $conexao->prepare($query);
    $instrucao->bind_param('s', $nome);
    $instrucao->execute();
    $resultado = $instrucao->get_result();
    $count = $resultado->fetch_assoc();
    return $count['qtd'];
}

function tiposVinculados($conexao, $id){
    $query = "select count(id) as qtd from cafe where tipo_id = ?";
    $instrucao = $conexao->prepare($query);
    $instrucao->bind_param('i', $id);
    $instrucao->execute();
    $resultado = $instrucao->get_result();
    $count = $resultado->fetch_assoc();
    return $count['qtd'];
}

function removeTipo($conexao, $id){
    $query = "delete from tipo where id = ?";
    $instrucao = $conexao->prepare($query);
    $instrucao->bind_param('i', $id);
    return $instrucao->execute();
}

function adicionaTipo($conexao, $nome,){
    $query = "insert into tipo (nome) values (?) ";
    $instrucao = $conexao->prepare($query);
    $instrucao->bind_param('s', $nome);
    return $instrucao->execute();
}