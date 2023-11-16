<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Mostra erros, se houver algum.

$filename = 'nicknames.txt';

// Lógica para adicionar nickname utilizando método POST.
if (isset($_POST['add_button']) && isset($_POST['add_nickname'])) {
    $nickname = $_POST['add_nickname'];

    // Carrega o conteúdo atual.
    $nicknames = file_get_contents($filename);

    // Adiciona o novo nickname.
    $nicknames .= $nickname . PHP_EOL;

    // Salva o conteúdo atualizado no arquivo.
    file_put_contents($filename, $nicknames);

    echo "Nickname adicionado com sucesso.";
    
    header('Location: Contas.html');
    exit(); // Recarrega a pagina após o fim da operação.
}

// Lógica para excluir nickname.
if (isset($_POST['delete_button']) && isset($_POST['delete_nickname'])) {
    $nicknameToDelete = $_POST['delete_nickname'];

    // Carrega o conteúdo atual.
    $nicknames = file_get_contents($filename);

    // Remove o nickname especificado.
    $nicknames = str_replace($nicknameToDelete . PHP_EOL, '', $nicknames);

    // Salva o conteúdo atualizado.
    file_put_contents($filename, $nicknames);

    echo "Nickname excluído com sucesso.";
    
    header('Location: Contas.html');
    exit(); // Recarrega a pagina após o fim da operação.
    
}

// Exibir nicknames
$nicknames = file_get_contents($filename);

if (!empty($nicknames)) {
    $nicknamesArray = explode(PHP_EOL, trim($nicknames));

    foreach ($nicknamesArray as $index => $nickname) {
        echo "<tr><td>" . ($index + 1) . "</td><td>" . $nickname . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>Nenhum nickname registrado.</td></tr>";
}
?>
