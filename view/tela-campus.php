<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Principal</title>
    <style>
       
         body {
            background-color: #ECECEC;
            font-family: Courier;
        }

        .superor{
            background-color: #BBC8BE;
            border-radius: 5px;
            padding: 5px;/*espaco interno*/

        }
        .top-barra {        /*o primeiro elemento da claase barra fica a esquerda e o segundo a direita*/

            display: flex;
            justify-content: space-between;/*distribuicao do espaco esntre as coisas que tao dentro*/
            align-items: center;
            background-color: #BBC8BE;
            padding: 10px;/*interno*/
          /*  border-radius: 5px;*/
        }
        .logo {
            width: 50px;
            height: 50px;
        }
        .pesquisa-box {
          width: 300px;
            height: 40px;
            border-radius: 5px;
            background-color: white;
            display: flex; /* Ativa o Flexbox */
            justify-content: space-between; /* Posiciona uma imagem na esquerda e outra na direita */
            align-items: center; /* Alinha as imagens verticalmente */
            padding: 1px; /* Adiciona espaço interno */

            border: 5px;
            border-color: #386641;
        }
        .horizontal-links {
            display: flex;/*horizontal*/
            justify-content: center;
            align-items: center;
            background-color:#98AE9C;
            padding: 1px;/*espaço interno vertical*/
            margin:5px ;
            
            border-radius: 5px;
          /*  border: 1px solid #386641;*/
        }
        .horizontal-links a {
            color: #386641;
            text-decoration: none;/*sublinhado*/
            padding: 10px; /*5tamanho da caixa verde*/
            margin: 5px;/*espaços entre os links*/
           /* background-color: #98AE9C;*/
            width: 100%;
            text-align: center;
            border-radius: 5px;/*redondinho*/
            font-weight: bold;
        }
        .separador-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;/*espaco externo*/
            gap: 10px;/*distancia da barra campus*/
        }
        .div-traco {
            width: 100%;
            height: 2px;
            background-color:black;
        }
        .campus-title {
            font-weight: bold;
            font-size: 18px;
            color: #386641;
            
        }
        .vertical-links {
            display: flex;
            flex-direction: column; /*alinhar verticalmente*/
            width: 100%; /*ocupa a largura toda*/
            margin: 20px 0;/*parte de cima e parte esquerda espaços*/
            align-items: flex-start; /*comeca no lado esquerdo*/
            background-color: #ECECEC;
        }
        .vertical-links a {
            color: black;
            text-decoration: none;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            text-align: center;
        }
        a{
            font-weight: bold;
        }
        img {
            width: 20px;
            height: 20px;
            padding: 10px;

            /*  filter: invert(2);<p>Pesquisar...</p>*/
           /* border-radius: 50%;*/
        }
        .div-traco-vertical {
    width: 5px; /* Define largura mínima para criar o divisor vertical */
    height: 30px; /* Ocupa toda a altura dos links */
    background-color:  #386641; /* Define cor do divisor */
}

       
     
    </style>
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