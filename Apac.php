<?php
$size = 7;

for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        if (($i == 0 && ($j == 0 || $j == $size - 1)) ||
            ($i == $size - 1 && ($j == 0 || $j == $size - 1)) ||
            ($i == 1 && ($j == 1 || $j == $size - 2)) ||
            ($i == $size - 2 && ($j == 1 || $j == $size - 2)) ||
            ($i == 2 && ($j == 2 || $j == $size - 3)) ||
            ($i == $size - 3 && ($j == 2 || $j == $size - 3)) ||
            ($i == 3 && $j == 3)) {
            echo "X ";
        } else {
            echo "O ";
        }
    }
    echo PHP_EOL;
}
?>