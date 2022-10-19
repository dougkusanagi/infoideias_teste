<?php

require_once './src/funcoes.php';

$funcoes = new SRC\Funcoes;

$array_mult = [
    [25, 22, 18],
    [10, 15, 13],
    [24, 5, 2],
    [80, 17, 15]
];

$array_crescent = [
    [1, 3, 2, 1],
    [1, 3, 2],
    [1, 2, 1, 2],
    [3, 6, 5, 8, 10, 20, 15],
    [1, 1, 2, 3, 4, 4],
    [1, 4, 10, 4, 2],
    [10, 1, 2, 3, 4, 5],
    [1, 1, 1, 2, 3],
    [0, -2, 5, 6],
    [1, 2, 3, 4, 5, 3, 5, 6],
    [40, 50, 60, 10, 20, 30],
    [1, 1],
    [1, 2, 5, 3, 5],
    [1, 2, 5, 5, 5],
    [10, 1, 2, 3, 4, 5, 6, 1],
    [1, 2, 3, 4, 3, 6],
    [1, 2, 3, 4, 99, 5, 6],
    [123, -17, -5, 1, 2, 3, 12, 43, 45],
    [3, 5, 67, 98, 3]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>

    <h1>Funcoes</h1>

    <hr>
    <h2>SeculoAno</h1>
    <p>$funcoes->SeculoAno(1905) = <?= $funcoes->SeculoAno(1905) ?></p>
    <p>$funcoes->SeculoAno(1700) = <?= $funcoes->SeculoAno(1700) ?></p>

    <hr>
    <h2>PrimoAnterior</h1>
    <p>$funcoes->PrimoAnterior(4) = <?= $funcoes->PrimoAnterior(4) ?></p>
    <p>$funcoes->PrimoAnterior(29) = <?= $funcoes->PrimoAnterior(29) ?></p>
    <p>$funcoes->PrimoAnterior(40) = <?= $funcoes->PrimoAnterior(40) ?></p>

    <hr>
    <h2>SegundoMaior</h1>
    <p>$funcoes->SegundoMaior(4) = <?= $funcoes->SegundoMaior($array_mult) ?></p>

    <hr>
    <h2>SequenciaCrescente</h1>
    <?php foreach ($array_crescent as $arr): ?>
    <p>$funcoes->SequenciaCrescente([<?= implode(',', $arr); ?>]) = <?= $funcoes->SequenciaCrescente($arr) ? "true" : "false" ?></p>
    <?php endforeach; ?>

</body>

</html>