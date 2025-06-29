<?php

include_once('../dal/conexao.php');

function buscarProjetosPorCampus($idCampus) {
    $sql = "SELECT p.*, 
               u.nome AS nomeCoordenador, 
               f.arquivoFoto,
               a.nomeArea AS areaConhecimento
        FROM academicos.projetos p
        JOIN academicos.coordenadores_projetos cp ON cp.idProjeto = p.idProjeto
        JOIN academicos.coordenadores c ON c.idUsuario = cp.idUsuario
        JOIN academicos.usuarios u ON u.idUsuario = c.idUsuario
        LEFT JOIN academicos.fotos_perfil_projeto f ON f.idProjeto = p.idProjeto
        LEFT JOIN academicos.areas_projetos ap ON ap.idProjeto = p.idProjeto
        LEFT JOIN academicos.areasdeconhecimento a ON a.idArea = ap.idArea
        WHERE p.idCampus = :idCampus";
    // $sql = "SELECT p.*, 
    //                u.nome AS nomeCoordenador, 
    //                f.arquivoFoto
    //         FROM academicos.projetos p
    //         JOIN academicos.coordenadores_projetos cp ON cp.idProjeto = p.idProjeto
    //         JOIN academicos.coordenadores c ON c.idUsuario = cp.idUsuario
    //         JOIN academicos.usuarios u ON u.idUsuario = c.idUsuario
    //         LEFT JOIN academicos.fotos_perfil_projeto f ON f.idProjeto = p.idProjeto
    //         WHERE p.idCampus = :idCampus";

    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idCampus', $idCampus);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}