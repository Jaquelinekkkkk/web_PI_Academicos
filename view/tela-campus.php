<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Principal</title>
 
</head>
<body>

<?php 
include_once("header.php");
include_once("../model/campusDAO.php"); 
$campus = buscarCampus();
?>

    <div class="separador-container">
        <div class="div-traco"></div>
        <span class="campus-title">CÂMPUS</span>
        <div class="div-traco"></div>
    </div>

    <div class="vertical-links">

    <?php foreach ($campus as $c): ?>
        <a href="/WEB_PI_Academicos/view/tela-projetos-campus.php?id_campus=<?= $c['idCampus'] ?>"><?= htmlspecialchars($c['nomeCampus']) ?></a>
        <div class="div-traco"></div>
        <?php endforeach; ?>

    </div>

</body>
</html>