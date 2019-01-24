<?php

function  nizMat($x, $y, &$a)
{
    $value = 1;

    $rowS = 0;
    $colS = 0;
    while($rowS < $x && $colS < $y)
    {
        for($i = $colS; $i < $y; ++$i)
            $a[$rowS][$i] = $value++;
        $rowS++;

        for ($i = $rowS; $i < $x; ++$i)
            $a[$i][$y - 1] = $value++;
        $y--;

        if ($rowS < $x)
        {
            for($i = $y - 1;$i >= $colS; --$i)
                $a[$x - 1][$i] = $value++;
            $x--;
        }
        if($colS < $y){
            for($i = $x - 1; $i >= $rowS; --$i)
                $a[$i][$colS] = $value++;
            $colS++;
        }
    }
}
?>



<!
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadaca03</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div class="container-f">
<form action="index.php" method="POST">

    <label for="broj redaka">Broj redaka :</label>
    <input type="number" name="redak"><br>

    <label for="broj stupaca">Broj stupaca : </label>
  <input type="number" name="stupac"><br>

    <input type="submit" name="potvrdi" value="KREIRAJ TABLICU">

</form>

    </div>

    <div class="output">

<table>
    <?php

    $x = isset( $_POST["redak"] ) ? $_POST["redak"] : 0 ;
    $y = isset( $_POST["stupac"] ) ? $_POST["stupac"] : 0 ;
nizMat($x, $y, $a);
for($i = 0; $i < $x; $i++){
    echo "<tr>";
    for($j = 0; $j < $y;$j++){
        echo "<td>";
        echo $a[$i][$j];
echo "</td>";
}
echo "</tr>";

}

?>
</table>
</div>

</div>

</body>
</html>