<?php
include_once('../dal/conexao.php');


function buscarArtigosProjeto($idProjeto) {
    $sql = "SELECT idArtigo, titulo, autores, dataPublicacao 
            FROM academicos.artigos 
            WHERE idProjeto = :idProjeto";

    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProjeto', $idProjeto, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 ?>
