<?php

include_once('../dal/conexao.php');

function buscarCampus() {
    $pdo = conectar();
    $sql = "select * from campus order by nomeCampus ASC;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarCampusFiltrados($termo) {
  $pdo = conectar();
  $sql = "SELECT * FROM campus WHERE nomeCampus LIKE :termo";
  $stmt = $pdo->prepare($sql);
  $termo = '%' . $termo . '%';
  $stmt->bindParam(':termo', $termo, PDO::PARAM_STR);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}