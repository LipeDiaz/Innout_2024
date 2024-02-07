<?php
// Controller Temporário


function recursion($a)
{
    if ($a < 20) {
        echo $a;
        echo "<br>";
        recursion($a + 1);
    }
}

recursion(10);

?>

