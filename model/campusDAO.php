<?php

include_once('../dal/conexao.php');

function buscarCampus() {
    $pdo = conectar();
    $sql = "select * from campus order by nomeCampus ASC;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}