<?php
include_once('../dal/conexao.php');

function buscarTodasAsAreasSimples() {
    $sql = "SELECT idArea, nomeArea FROM academicos.areasdeconhecimento ORDER BY nomeArea";
    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function buscarProjetosPorIdArea($idArea) {
    $sql = "SELECT p.idProjeto, p.tituloProjeto
            FROM academicos.projetos p
            JOIN academicos.areas_projetos ap ON p.idProjeto = ap.idProjeto
            WHERE ap.idArea = :idArea
            ORDER BY p.tituloProjeto";

    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idArea', $idArea, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarNomeDaArea($idArea) {
    $sql = "SELECT nomeArea FROM academicos.areasdeconhecimento WHERE idArea = :idArea";
    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idArea', $idArea, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn();
}

?>