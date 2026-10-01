<?php

function sum($a, $b) {
    return $a + $b;
}

echo "Первый вызов: " . sum(10, 20) . "<br>";
echo "Второй вызов: " . sum(5, 15) . "<br>";
echo "Третий вызов: " . sum(3, 7) . "<br>";
echo "Четвёртый вызов: " . sum(100, -50) . "<br>";
echo "Пятый вызов: " . sum(2.5, 7.5) . "<br>";

?>
