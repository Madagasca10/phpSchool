<?php
    $triangle_Area;
    $triangle_base;
    $triangle_altura;


    if (isset($_POST["calcTriangle"])) {
        if (isset($_POST["base"]) && isset($_POST["altura"])) {
            if (!empty($_POST["base"]) && !empty($_POST["altura"])) {
                $triangle_base = intval($_POST["base"]);
                $triangle_altura = intval($_POST["altura"]);

                if ($triangle_base > 0 && $triangle_altura > 0) {
                    $triangle_Area = ($triangle_base * $triangle_altura) / 2; 
                }
            }
        }
    }


    $circle_area;
    $circle_raio;
    
    //(área= pi*raio2, pi=3.14)
    
    if (isset($_POST["calcCircle"])) {
        if (isset($_POST["raio"])) {
            if (!empty($_POST["raio"])) {
                $circle_raio = intval($_POST["raio"]);
                $pi = 3.14;

                if ($circle_raio > 0) {
                    $circle_area = $pi * ($circle_raio * 2); 
                }
            }
        }
    }

    //(C= (F-32) * (5/9))
    $grausF;
    $grausC;

    if (isset($_POST["calcGraus"])) {
        if (isset($_POST["grausF"])) {
            if (!empty($_POST["grausF"])) {
                $grausF = intval($_POST["grausF"]);

                $grausC = round(($grausF-32) * (5/9));
            }
        }
    }

   
   $preco_inicial;
   $preco_final;
   $desconto = 0.1;

    if (isset($_POST["calcPreco"])) {
        if (isset($_POST["preco"])) {
            if (!empty($_POST["preco"])) {
                $preco_inicial = intval($_POST["preco"]);

                $preco_final = $preco_inicial - ($preco_inicial * $desconto);
            }
        }
    }


    $seconds;
    $tempo;

    if (isset($_POST["calcSecs"])) {
        if (isset($_POST["segundos"])) {
            if (!empty($_POST["segundos"])) {
                $seconds = round(intval($_POST["segundos"]));

                $tempo = sprintf('%02d:%02d:%02d', ($seconds/3600),($seconds/60%60), $seconds%60);
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Language Basics</title>
</head>
<body>
    <section class="triangle">
        <h1>Calcular Area de um triangulo</h1>
        <form method="post">
            <label for="Tbase">Base:</label>
            <input id="Tbase" type="text" name="base">
            <label for="Taltura">Altura:</label>
            <input type="text" name="altura">        
            <input type="submit" name="calcTriangle" value="Calcular Area">
        </form>

        <div class="solution">
            <?php 
                if (isset($triangle_Area)) {
                    echo "<p>O triangulo com a base $triangle_base e altura $triangle_altura tem como área <strong>$triangle_Area</strong>.</p>";
                }
            ?>
        </div>
    </section>

    <section class="circle">
        <h1>Calcular Area de um circulo</h1>
        <form method="post">
            <label for="cRaio">Raio:</label>
            <input id="cRaio" type="text" name="raio">
            <input type="submit" name="calcCircle" value="Calcular Area">
        </form>

        <div class="solution">
            <?php 
                if (isset($circle_area)) {
                    echo "<p>O circulo com o raio $circle_raio tem como área <strong>$circle_area</strong>.</p>";
                }
            ?>
        </div>
    </section>

    <section class="temperatura">
        <h1>Converter graus Fahrenheit para graus Celcius</h1>
        <form method="post">
            <label for="grausF">Graus Fahrenheit:</label>
            <input id="grausF" type="text" name="grausF">
            <input type="submit" name="calcGraus" value="Calcular Graus">
        </form>

        <div class="solution">
            <?php 
                if (isset($grausC)) {
                    echo "<p>$grausF graus Fahrenheit convertidos para graus Celcius é <strong>$grausC</strong></p>";
                }
            ?>
        </div>
    </section>

    <section class="preco">
        <h1>Calcular o preço final de um produto com um desconto.</h1>
        <form method="post">
            <label for="preco">Preço do produto:</label>
            <input id="preco" type="text" name="preco">
            <input type="submit" name="calcPreco" value="Calcular Preço">
        </form>

        <div class="solution">
            <?php 
                if (isset($preco_final)) {
                    $desconto = $preco_inicial * $desconto;
                    echo "<p>O preço inicial era {$preco_inicial}€, foi aplicado um desconto de {$desconto}€ e o preço final é <strong>{$preco_final}€</strong></p>";
                }
            ?>
        </div>
    </section>

    <section class="segundos">
        <h1>Converter segundos para horas, minutos e segundos</h1>
        <form method="post">
            <label for="secs">Tempo em segundos:</label>
            <input id="secs" type="text" name="segundos">
            <input type="submit" name="calcSecs" value="Converter Segundos">
        </form>

        <div class="solution">
            <?php 
                if (isset($tempo)) {
                    echo "<p><strong>{$tempo}</strong></p>";
                }
            ?>
        </div>
    </section>
</body>
</html>