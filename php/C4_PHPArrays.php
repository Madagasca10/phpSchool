<?php

// Mostrar o maior dos números, o menor e a média.
// Esta função aceita N números
function OrderAndAverage(...$nums)
{
    asort($nums);
    $lenght = count($nums);

    $menor = $nums[array_key_first($nums)];
    $maior = $nums[array_key_last($nums)];
    $media = array_sum($nums) / $lenght;

    echo "O Menor número é $menor <br>
        O Maior número é $maior<br>
        A média é $media<br>
        Foram inseridos um total de $lenght números<br><br><br>";
}

OrderAndAverage(46, 2, 5, 1, 43, 3, 13, 75, 32, 14);


// Cores

function orderColors()
{
    $color = array('white', 'green', 'red');
    $saida =
        implode(", ", $color) . ",
        <ul>
            <li>{$color[1]}</li>
            <li>{$color[2]}</li>
            <li>{$color[0]}</li>
        </ul>";

    echo $saida;
}

orderColors();
echo "<br><br>";

//Escreva um script PHP que mostre: "Second" e “Red” da seguinte matriz
$color = array( 
            "color" => array( "a" => "Red", "b" => "Green", "c" => "White"),
            "numbers" => array( 1, 2, 3, 4, 5, 6 ),
            "holes" => array( "First", 5 => "Second", "Third")
);

echo "\"" . $color["holes"][5] . "\" e \"" . $color["color"]["a"] . "\"";

echo "<br><br>";

function generateRandomNumbers($min, $max, $amount = 10) {
    $result = array();
    for ($i=0; $i < $amount; $i++) { 
        array_push($result, rand($min, $max));
    }
    echo implode(", ", $result);
}

generateRandomNumbers(11, 20);