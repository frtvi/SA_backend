<?php
$filename = 'nicknames.txt';

// Exibir nicknames
$nicknames = file_get_contents($filename);

if (!empty($nicknames)) {
    $nicknamesArray = explode(PHP_EOL, trim($nicknames));

    echo '<table>'; // Inicie a tabela aqui
    foreach ($nicknamesArray as $index => $nickname) {
        echo "<tr><td>" . ($index + 1) . "</td><td>" . $nickname . "</td></tr>";
    }
    echo '</table>'; // Encerre a tabela aqui
} else {
    echo "<p>Nenhum nickname registrado.</p>";
}
?>
