<?php

include_once('../dal/conexao.php');

function buscarNoticias() {
    $pdo = conectar();
    $sql = "SELECT titulo, texto, dataPublicacao, arquivoFoto 
    FROM noticiasgerais left join fotos_noticias 
    on noticiasgerais.idNoticia = fotos_noticias.idNoticia 
    order by dataPublicacao desc;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

