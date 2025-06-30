<?php

include_once('../dal/conexao.php');

function buscarNoticias() {
    $pdo = conectar();
    $sql = "SELECT noticiasgerais.idNoticia, titulo, texto, dataPublicacao, arquivoFoto 
    FROM noticiasgerais left join fotos_noticias 
    on noticiasgerais.idNoticia = fotos_noticias.idNoticia 
    order by dataPublicacao desc;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarDetalhesNoticia($idNoticia) {
    
    $sql = "SELECT noticiasgerais.*, fotos_noticias.*, usuarios.*
    FROM noticiasgerais left join fotos_noticias 
    on noticiasgerais.idNoticia = fotos_noticias.idNoticia 
    left join usuarios on usuarios.idUsuario = noticiasgerais.idAdministrador
    where noticiasgerais.idNoticia = :idNoticia";

    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idNoticia', $idNoticia, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);

}



