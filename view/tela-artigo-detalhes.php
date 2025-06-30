<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela artigos</title>
    <style>
        body {
            background-color: #ECECEC;
            font-family: Courier;
        }
        h2{
            margin-left:15px;
        }

          .superor{
            background-color: #BBC8BE;
            border-radius: 5px;
            padding: 5px;

        }
        .top-barra {        /*o primeiro elemento da claase barra fica a esquerda e o segundo a direita*/

            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #BBC8BE;
            padding: 10px;
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
            padding: 10px; /*5tamanho da caixa verde*/
            margin: 5px;/*espaços entre os links*/
           /* background-color: #98AE9C;*/
            width: 100%;
            text-align: center;
            border-radius: 5px;/*redondinho*/
            font-weight: bold;
        }
        a{
            font-weight: bold;
        }
        .separador-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;/*espaco externo*/
            gap: 10px;/*espaco intero*/
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
            flex-direction: column;
            width: 100%; /*ocupa a largura toda*/
            margin: 20px 0;/*parte de cima e parte esquerda espaços*/
            align-items: flex-start; /*comeca no lado esquerdo*/
            background-color: #ECECEC;
        }
        .vertical-links a {
            color: black;
            
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            text-align: center;
        }
        p{
            font-weight: normal;
            margin-left: 15px;
            /*color: #386641;*/
        }
           .div-traco-vertical {
    width: 5px; /* Define largura mínima para criar o divisor vertical */
    height: 30px; /* Ocupa toda a altura dos links */
    background-color:  #386641; /* Define cor do divisor */
}
 img {
            width: 20px;
            height: 20px;
            padding: 10px;

            /*  filter: invert(2);<p>Pesquisar...</p>*/
           /* border-radius: 50%;*/
        }
        #arquivo:hover {
        text-decoration: underline;
        }


    </style>
</head>
<body>

<?php
$idArtigo = $_GET['idArtigo'];
include_once("header.php");
include_once("../model/artigoDAO.php");
$artigo = buscarDetalhesArtigo($idArtigo);
?>



    <div class="separador-container">
        <div class="div-traco"></div>
        <span class="campus-title">ARTIGOS</span>
        <div class="div-traco"></div>
    </div>

    <div class="vertical-links">



        <div><h2> <?= htmlspecialchars($artigo['titulo']) ?> </h2>
       <p> <b> Autores: </b> <?= htmlspecialchars($artigo['autores']) ?> 
       <br>
       <b>Projeto:</b>  <?= htmlspecialchars($artigo['tituloProjeto']) ?>
       <br>
       <b>Data de publicação:</b>  <?= date('d/m/y', strtotime($artigo['dataPublicacao'])) ?></p>
       <a id="arquivo" href="ver-pdf.php?idArtigo=<?= $artigo['idArtigo'] ?>" target="_blank"> Abrir arquivo PDF</a>
       <p> <b> Resumo: </b> <?= htmlspecialchars($artigo['resumo']) ?> </p>
        </div>    


        
    </div>

</body>
<?php

include_once("footer.php");

?>
</html>