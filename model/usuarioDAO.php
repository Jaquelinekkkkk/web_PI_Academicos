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

function atualizarSenha($idUsuario, $novaSenha) {
    $pdo = conectar();
    $hashSenha = password_hash($novaSenha, PASSWORD_DEFAULT);

    try {
        $pdo->beginTransaction();

        // Atualiza a senha do usuário
        $sql1 = "UPDATE usuarios SET senha = :senha WHERE idUsuario = :idUsuario";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':senha', $hashSenha);
        $stmt1->bindParam(':idUsuario', $idUsuario);
        $stmt1->execute();

        // Marca o código como utilizado
        $sql2 = "UPDATE recuperacao_senhas 
                 SET codigo_utilizado = 1 
                 WHERE idUsuario = :idUsuario AND codigo_utilizado = 0";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':idUsuario', $idUsuario);
        $stmt2->execute();

        $pdo->commit();
        return true;

    } catch (Exception $e) {
        $pdo->rollBack();
        error_log("Erro ao atualizar senha: " . $e->getMessage());
        return false;
    }
}




