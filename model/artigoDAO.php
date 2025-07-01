<?php

include_once('../dal/conexao.php');

function buscarArtigos() {
    $pdo = conectar();
    $sql = "SELECT artigos.*, projetos.tituloProjeto
    FROM artigos left join projetos
    on artigos.idProjeto = projetos.idProjeto 
    order by dataPublicacao DESC;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarArtigosProjeto($idProjeto) {
    $sql = "SELECT idArtigo, titulo, autores, dataPublicacao 
            FROM academicos.artigos 
            WHERE idProjeto = :idProjeto 
            order by dataPublicacao DESC;";

    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProjeto', $idProjeto, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarDetalhesArtigo($idArtigo) {
    
    $sql = "SELECT artigos.*, projetos.tituloProjeto
    FROM artigos left join projetos
    on artigos.idProjeto = projetos.idProjeto 
    where artigos.idArtigo = :idArtigo;";

    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idArtigo', $idArtigo, PDO::PARAM_INT);
    $stmt->execute();



    return $stmt->fetch(PDO::FETCH_ASSOC);

}

function buscarArtigosFiltrados($termo) {
  $pdo = conectar();
  $sql = "SELECT * FROM artigos WHERE titulo LIKE :termo OR autores LIKE :termo";
  $stmt = $pdo->prepare($sql);
  $termo = '%' . $termo . '%';
  $stmt->bindParam(':termo', $termo, PDO::PARAM_STR);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


