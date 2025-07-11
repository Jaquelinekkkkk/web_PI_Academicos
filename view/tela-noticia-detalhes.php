<?php
$idNoticia = $_GET['idNoticia'];
include_once("header.php");
include_once("../model/noticiaDAO.php");
$noticia = buscarDetalhesNoticia($idNoticia);
?>


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
p{
    margin:40px;
    font-weight:bold;
}
header {
            
            color: white;
            
        }

h3{
    -webkit-text-fill-color:rgba(56, 102, 65);
}
#container{
    display:grid;
    width:100lvw;
    grid-template-columns: 95lvw ;
    grid-template-rows: 20lvh 80lvh;
    margin-right: 5px;
    margin-left: 5px;
}

#superior{
    display:grid;
    grid-template-columns: 100%;
    grid-template-rows: 60% 40%;
    background-color:rgba(56, 102, 65, 0.27);
    border-radius: 10px;
}

#faixa1{
    display:flex;
    flex-direction: row;
    width: 100%;
    height: 100%;
    justify-content: space-between;
    

}

#pesquisa{
    height:50%; 
    width: 300px;
    margin-left: 10px; 
    margin-top: 30px;
    background-color: white; 
    border-radius: 5px;
}

#barra{
    display:grid;
    grid-template-columns: 10% 1% 13% 1% 17% 1% 16% 1% 12% 1% 25% ;
    grid-template-rows: 30px;
    border: 1px solid black;
    border-radius: 8px;
    margin: 8px;
    
}

#barra > div{
    text-align: center;
    -webkit-text-fill-color:rgba(56, 102, 65);
    justify-content: space-around;
    margin: 10px;
    
}

.linha{
    height:80%;
    width:2px;
    background-color:rgba(56, 102, 65);
}
.linhah{
    margin-top: 30px;
    margin-inline: 20px;
    height:1px;
    width:45%;
    background-color:rgba(56, 102, 65);
}



#noticias{
justify-self: center;
display:grid;
align-content: center;
justify-content:center;
grid-template-columns: 750px;
grid-template-rows: repeat(auto-fill, 1fr);

}

#post {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 400px;
    width: 650px;
    margin: 40px;
    border-radius: 10px;
    background-color: rgba(56, 102, 65);
}

#post img {
    width: 100%;
    max-height: auto;
    height: 100%;
    object-fit: cover;
    display: block;
    border-radius: 10px;

}


#legenda {
    font-weight: normal;
    font-size: 18px;
    margin-top: -30px;
}
#titulo{
    display:flex;
    flex-direction: row;
    justify-content: space-around;
    height:50px;
    width:100%;
}

#noticias > div{
    align-content: center;
    justify-content:center;
    margin:10px;
    
}


@media (max-width: 1000px) {

  #barra{
    height: fit-content;
    display:grid;
    grid-template-rows: repeat(12, 20px); ;
    grid-template-columns: 80lvw;    
}
#superior{
    grid-template-rows: 20% 80%;
}
.linha{
    align-self:baseline;
    height:1.5px;
    width:100%;
    background-color:rgba(56, 102, 65);
}

#noticias{
    justify-content: center;
    align-items: center;
    grid-template-columns: 700px ;
}
#post {
    height: 375px;
    width: 600px;
    margin: 40px;
    border-radius: 10px;
    background-color: rgba(56, 102, 65);
}


}

@media (max-width: 500px) {
    body{
        font-size: 12px;
    }
    #barra{
    grid-template-rows: repeat(2, 50px); 
    grid-template-columns: 90px 5px 90px 5px 200px 5px;
    justify-items: center;
    }
    .linha{
    align-self:center;
    height:60%;
    width:1px;
    background-color:rgba(56, 102, 65);
    }
    #superior{
    grid-template-rows: 35% 65%;
    }
    #noticias{
    justify-content: center;
    align-items: center;
    grid-template-columns: 400px ;
    }
    #post {
    height: 190px;
    width: 350px;
    margin: 10px;
    border-radius: 10px;
    background-color: rgba(56, 102, 65);
    
}

#legenda {
    font-weight: normal;
    margin-top: 0px;
}


}

</style>
<body>
<?php



?>

    <div id="container">

        <div id="inferior">
            <div id="titulo">
                <div class="linhah"></div>
                <h3>NOTÍCIAS</h3>
                <div class="linhah"></div>
             </div>
             <div id="noticias">

                
                <div><div id="post">
                    <img src="data:image/jpeg;base64,<?= base64_encode($noticia['arquivoFoto']) ?>" alt="Imagem da notícia">
                
                </div>
                <p id="legenda"><b><?= htmlspecialchars($noticia['titulo']) ?></b> 
                    <br>
                    <br>
                    <?= htmlspecialchars($noticia['texto']) ?>
                    <br> 
                    <br>
                    <?= date('d/m/y', strtotime($noticia['dataPublicacao'])) ?> - Notícia publicada por  <?= htmlspecialchars($noticia['nome']) ?> </p>
                </div>
                

                
                
             </div>
             </div>
        
    </div>
    
</body>
<?php

include_once("footer.php");

?>

</body>
</html>