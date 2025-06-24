<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

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

    try {
        $pdo->beginTransaction();

        // Salva a senha visível (sem hash)
        $sql1 = "UPDATE usuarios SET senha = :senha WHERE idUsuario = :idUsuario";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':senha', $novaSenha);
        $stmt1->bindParam(':idUsuario', $idUsuario);

        if (!$stmt1->execute()) {
            $erro = $stmt1->errorInfo();
            echo "Erro ao atualizar senha: " . $erro[2];
            $pdo->rollBack();
            return false;
        }

        // Marca o código como utilizado
        $sql2 = "UPDATE recuperacao_senhas 
                 SET codigo_utilizado = 1 
                 WHERE idUsuario = :idUsuario AND codigo_utilizado = 0";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':idUsuario', $idUsuario);

        if (!$stmt2->execute()) {
            $erro = $stmt2->errorInfo();
            echo "Erro ao atualizar código: " . $erro[2];
            $pdo->rollBack();
            return false;
        }

        $pdo->commit();
        return true;

    } catch (Exception $e) {
        echo "Exceção: " . $e->getMessage();
        $pdo->rollBack();
        return false;
    }
}