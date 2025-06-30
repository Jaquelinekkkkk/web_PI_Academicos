<?php
include_once('../dal/conexao.php');

$idArtigo = $_GET['idArtigo'];

$pdo = conectar();
$stmt = $pdo->prepare("SELECT titulo, arquivo FROM artigos WHERE idArtigo = :idArtigo");
$stmt->bindParam(':idArtigo', $idArtigo, PDO::PARAM_INT);
$stmt->execute();

if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    header("Content-Type: application/pdf");
    header("Content-Disposition: inline; filename=\"" . $row['titulo'] . ".pdf\"");
    echo $row['arquivo'];
} else {
    echo "Arquivo não encontrado.";
}
?>
