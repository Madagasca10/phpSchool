<?php

include("./rainbowIterator.php");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        span {
            height: 25px;
            width: 25px;
            margin: 0 2px;
            border: 1px solid black;
            display: inline-block;
        }
    
    </style>
</head>
<body>
    <?php
        echo "<h1>Using Iterator: $iterator</h1>";

        for ($red = 0; $red < 255; $red += $iterator) { 
            for ($green = 0; $green < 255; $green += $iterator) { 
                for ($blue = 0; $blue < 255; $blue += $iterator) {
                    echo "<span style='background-color: rgb($red,$green,$blue)' title='" . sprintf("#%02x%02x%02x", $red, $green, $blue) . "'></span>";
                }
            }
        }
    
    ?>
</body>
</html>

