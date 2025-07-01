<?php

include_once('../dal/conexao.php');

function buscarPostagensProjeto($idProjeto) {
    $pdo = conectar();
    $sql = "SELECT legenda, data, arquivoFoto
            FROM postagens
            LEFT JOIN fotos_postagens ON postagens.idPostagem = fotos_postagens.idPostagem
            WHERE postagens.idProjeto = :idProjeto
            ORDER BY data DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProjeto', $idProjeto, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function buscarPostagensGerais() {
    $pdo = conectar();
    $sql = "SELECT postagens.idPostagem, postagens.legenda, postagens.data, fotos_postagens.arquivoFoto
            FROM postagens
            LEFT JOIN fotos_postagens ON postagens.idPostagem = fotos_postagens.idPostagem
            ORDER BY postagens.idPostagem DESC";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}