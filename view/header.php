<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>
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
            

            /*  filter: invert(2);<p>Pesquisar...</p>*/
           /* border-radius: 50%;*/
        }
        .div-traco-vertical {
    width: 5px; /* Define largura mínima para criar o divisor vertical */
    height: 30px; /* Ocupa toda a altura dos links */
    background-color:  #386641; /* Define cor do divisor */
}

       
     
    </style>

<body>

<div class="superor">
    <div class="top-barra">

    <form method="GET" action="/WEB_PI_Academicos/view/resultados.php">

        <div class="pesquisa-box">

        <input type="text" name="busca" placeholder="Pesquisar..." style="height: 30px; border: none;" />
        <button type="submit" style="background: none; border: none;">
        <img src="../imagens/lupa.png" alt="Buscar" />
</button>
      </div>
    </form>


        <img class="logo" src="../imagens/logo.png" alt="Logo">
        
    </div>

    <div class="horizontal-links">
        <a href="../view/tela-noticias.php">Início</a>
        <div class="div-traco-vertical"></div>

        <a href="../view/tela-artigos.php">Artigos</a>
        <div class="div-traco-vertical"></div>

        <a href="../view/publicacoes-Gerais.php">Publicações</a>
        <div class="div-traco-vertical"></div>

        <a href="../view/tela-noticias.php">Notícias</a>
        <div class="div-traco-vertical"></div>

        <a href="../view/tela-campus.php">Câmpus</a>
        <div class="div-traco-vertical"></div>

        <a href="../view/area-conhecimento.php">Áreas de conhecimento</a>
    </div>
</div>
    
</body>
</html>

