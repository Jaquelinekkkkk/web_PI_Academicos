<?php
include_once("../model/artigoDAO.php"); 
include_once("../model/campusDAO.php");
include_once("../model/projetosDAO.php");  

$termo = isset($_GET['busca']) ? trim($_GET['busca']) : '';
$artigos = [];
$campus = [];
$projetos = [];

if ($termo !== '') {
  $artigos = buscarArtigosFiltrados($termo);
  $campus = buscarCampusFiltrados($termo);
  $projetos = buscarProjetosFiltrados($termo);
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Resultados da busca</title>
</head>
<body>

<?php include_once("header.php"); ?>

<div style="padding: 20px;">
  <h2>Resultado para: "<?= htmlspecialchars($termo) ?>"</h2>

  <?php if (count($artigos) > 0): ?>
    <ul>
        <h3>Artigos</h3>
      <?php foreach ($artigos as $artigo): ?>
        <li>
          <a href="tela-artigo-detalhes.php?idArtigo=<?= $artigo['idArtigo'] ?>">
            <?= htmlspecialchars($artigo['titulo']) ?>
          </a> – <?= htmlspecialchars($artigo['autores']) ?>
        </li>
      <?php endforeach; ?>
    </ul>
    <?php else: ?>
    
  <?php endif; ?>

  <?php if (count($projetos) > 0): ?>
        <ul>
        <h3>Projetos</h3>
      <?php foreach ($projetos as $projeto): ?>
        <li>
          <a href="tela_principal_projeto.php?idProjeto=<?= $projeto['idProjeto'] ?>">
            <?= htmlspecialchars($projeto['tituloProjeto']) ?>
          </a> – <?= htmlspecialchars($projeto['resumo']) ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    
  <?php endif; ?>


    <?php if (count($campus) > 0): ?>
        <ul>
        <h3>Campus</h3>
      <?php foreach ($campus as $c): ?>
        <li>
          <a href="tela-projetos-campus.php?id_campus=<?= $c['idCampus'] ?>">
            <?= htmlspecialchars($c['nomeCampus']) ?>
          </a> – <?= htmlspecialchars($c['localCampus']) ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>

  <?php endif; ?>


</div>

</body>
</html>
