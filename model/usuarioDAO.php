<?php


include_once('dal/conexao.php');

function recuperarUsuario($email, $codigo) {
    $pdo = conectar();
    $sql = "SELECT * FROM academicos.recuperacao_senhas join usuarios on usuarios.idUsuario = recuperacao_senhas.idUsuario  where email = :email and codigo_recuperacao= :codigo and codigo_utilizado = 0;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('email', $email, PDO::PARAM_STR);
    $stmt->bindParam('codigo', $codigo, PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


