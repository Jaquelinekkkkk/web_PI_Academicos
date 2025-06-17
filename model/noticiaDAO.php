<?php

include_once('dal/conexao.php');

function buscarNoticias() {
    $pdo = conectar();
    $sql = "SELECT * FROM noticiasgerais";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

