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
   

    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idCampus', $idCampus);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarDetalhesProjeto($idProjeto) {
    $sql = "SELECT 
                p.idProjeto,
                p.tituloProjeto,
                p.resumo,
                p.edital,
                p.dataInicio,
                p.dataFim,
                p.prorrogacao,
                p.emAndamento,
                c.nomeCampus AS nomeCampus,
                f.arquivoFoto,
                a.nomeArea
            FROM academicos.projetos p
            JOIN academicos.campus c ON c.idCampus = p.idCampus
            LEFT JOIN academicos.fotos_perfil_projeto f ON f.idProjeto = p.idProjeto
            LEFT JOIN academicos.areas_projetos ap ON ap.idProjeto = p.idProjeto
            LEFT JOIN academicos.areasdeconhecimento a ON a.idArea = ap.idArea
            WHERE p.idProjeto = :idProjeto";

    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProjeto', $idProjeto, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function buscarCoordenadoresProjeto($idProjeto) {
    $sql = "SELECT u.nome 
            FROM academicos.coordenadores_projetos cp
            JOIN academicos.usuarios u ON u.idUsuario = cp.idUsuario
            WHERE cp.idProjeto = :idProjeto";

    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProjeto', $idProjeto, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}


function buscarBolsistasProjeto($idProjeto) {
    $sql = "SELECT u.nome 
            FROM academicos.bolsistas_projetos bp
            JOIN academicos.usuarios u ON u.idUsuario = bp.idUsuario
            WHERE bp.idProjeto = :idProjeto";

    $pdo = conectar();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProjeto', $idProjeto, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function buscarProjetosFiltrados($termo) {
  $pdo = conectar();
  $sql = "SELECT * FROM projetos WHERE tituloProjeto LIKE :termo OR resumo LIKE :termo";
  $stmt = $pdo->prepare($sql);
  $termo = '%' . $termo . '%';
  $stmt->bindParam(':termo', $termo, PDO::PARAM_STR);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>