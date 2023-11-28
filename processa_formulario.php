<?php
include 'functions.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados 
    $servername = "srv1079.hstgr.io";
    $username = "u368907112_admin";
    $password = "Victor270377@";
    $dbname = "u368907112_smurfarena";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Adicionar ou excluir Nickname POST
    if ((isset($_POST["add_button"]) && isset($_POST["add_nickname"])) || (isset($_POST["delete_button"]) && isset($_POST["delete_nickname"]))) {
        $nickname = isset($_POST["add_button"]) ? $_POST["add_nickname"] : $_POST["delete_nickname"];
        
        // Adicionar ou excluir do banco de dados requisição POST
        if (isset($_POST["add_button"])) {
            $sql = "INSERT INTO nicknames (nickname) VALUES ('$nickname')";
            $success_message_db = "Nickname adicionado ao banco de dados com sucesso!";
            $error_message_db = "Erro ao adicionar nickname ao banco de dados: " . $conn->error;
        } elseif (isset($_POST["delete_button"])) {
            $sql = "DELETE FROM nicknames WHERE nickname = '$nickname'";
            $success_message_db = "Nickname excluído do banco de dados com sucesso!";
            $error_message_db = "Erro ao excluir nickname do banco de dados: " . $conn->error;
        }

        if ($conn->query($sql) === TRUE) {
            echo $success_message_db . "<br>";
        } else {
            echo $error_message_db . "<br>";
        }

        
        $txtFilename = "nicknames.txt";
        $search = "Novo Nickname: $nickname";
        $txtContent = file_get_contents($txtFilename);

        if (isset($_POST["add_button"])) {
            $txtContent .= "Novo Nickname: $nickname\n";
            $success_message_txt = "Nickname adicionado com sucesso!";
            $error_message_txt = "Erro ao adicionar nickname";
        } elseif (isset($_POST["delete_button"])) {
            $txtContent = str_replace($search, '', $txtContent);
            $success_message_txt = "Nickname excluído com sucesso!";
            $error_message_txt = "Erro ao excluir nickname";
        }

        if (file_put_contents($txtFilename, $txtContent)) {
            echo $success_message_txt;
        } else {
            echo $error_message_txt;
        }
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
