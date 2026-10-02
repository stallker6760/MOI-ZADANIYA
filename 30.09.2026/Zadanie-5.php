<?php
function checkAge($age) {
    if ($age >= 18) {
        return "Совершеннолетний";
    } else {
        return "Несовершеннолетний";
    }
}

echo checkAge(17) . "\n";
echo checkAge(18) . "\n";
echo checkAge(25) . "\n";
echo checkAge(0) . "\n";

function findMax($a, $b) {
    if ($a > $b) {
        return $a;
    } else {
        return $b;
    }
}

echo findMax(10, 20) . "\n";
echo findMax(30, 5) . "\n";

?>