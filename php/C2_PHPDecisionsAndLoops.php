<?php
    $age;
    $classificao;

    if (isset($_POST["calcEscalao"])) {
        if (isset($_POST["age"])) {
            if (!empty($_POST["age"])) {
                $age = round(intval($_POST["age"]));

                if ($age <= 6) {
                    $classificao = "Golfinho: até aos 6 anos";
                } elseif ($age <= 10) {
                    $classificao = "Infantil: 7-10 anos";
                } elseif ($age <= 13) {
                    $classificao = "Juvenil: 11-13 anos";
                } elseif ($age <= 17) {
                    $classificao = "Tubarão: 14-17 anos";
                } elseif ($age >= 18) {
                    $classificao = "Cota: maiores de 18 anos";
                }
            }
        }
    }


     // Notas
     $notaFinal;
     if (isset($_POST["calcNotas"])) {
         if (isset($_POST["nota1"]) && isset($_POST["nota2"]) && isset($_POST["nota3"])) {
             if (!empty($_POST["nota1"]) && !empty($_POST["nota2"]) && !empty($_POST["nota3"])) {
                 
 
                 $nota1 = intval($_POST["nota1"]);
                 $nota2 = intval($_POST["nota2"]);;
                 $nota3 = intval($_POST["nota3"]);;
             

                 $notaFinal = ($nota1 * 3 + $nota2 * 4 + $nota3 * 5) / 12;
             }
         }
     }


    // Maior de 3 Números
    $maior;
    if (isset($_POST["calcMaior"])) {
        if (isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["num3"])) {
            if (!empty($_POST["num1"]) && !empty($_POST["num2"]) && !empty($_POST["num3"])) {
                

                $Num1 = intval($_POST["num1"]);
                $Num2 = intval($_POST["num2"]);;
                $Num3 = intval($_POST["num3"]);;
            
                $AllNums = [$Num1, $Num2, $Num3];
                
                rsort($AllNums);
            
                $maior = $AllNums[0];

            }
        }
    }


    
    
    $num;
    if (isset($_POST["parImpar"])) {
        if (isset($_POST["num"])) {
            if (!empty($_POST["num"])) {
                $num = round(intval($_POST["num"]));

                $par = ($num % 2 == 0) ? true : false;
            }
        }
    }

    $ano;
    $bissexto = false;
    if (isset($_POST["calcAno"])) {
        if (isset($_POST["ano"])) {
            if (!empty($_POST["ano"])) {
                $ano = round(intval($_POST["ano"]));
                if (($ano % 4 == 0 && $ano % 100 !== 0) || $ano % 400 == 0) {
                    $bissexto = true;
                }
            }
        }
    }

    
    $dia;
    $nomeDoDia;
    if (isset($_POST["calcdiaSemana"])) {
        if (isset($_POST["dia"])) {
            if (!empty($_POST["dia"])) {
                $diasDaSemana = ["Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sabado", "Domingo"];
                $dia = round(intval($_POST["dia"]));
                if ($dia > 0 && $dia <= count($diasDaSemana)) {
                    $nomeDoDia = $diasDaSemana[$dia - 1];
                }
            }
        }
    }
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Decisions And Loops</title>
</head>
<body>
    <section class="natacao">
        <h1>Classes de natação</h1>
        <form method="post">
            <label for="age">Idade:</label>
            <input id="age" type="text" name="age">
            <input type="submit" name="calcEscalao" value="Calcular Escalão">
        </form>

        <div class="solution">
            <?php
                if (isset($classificao)) {
                    echo "<p>$classificao</p>";
                }
            ?>
        </div>
    </section>

    <section class="notas">
        <h1>Média das Notas</h1>
        <form method="post">
            <label for="nota1">Nota 1:</label>
            <input id="nota1" type="text" name="nota1"><br><br>

            <label for="nota2">Nota 2:</label>
            <input id="nota2" type="text" name="nota2"><br><br>

            <label for="nota3">Nota 3:</label>
            <input id="nota3" type="text" name="nota3">

            <input type="submit" name="calcNotas" value="Calcular Nota">
        </form>

        <div class="solution">
            <?php
                if (isset($notaFinal)) {
                    echo "A nota final é de $notaFinal";
                }
            ?>
        </div>
    </section>

    <section class="maior">
        <h1>Maior de três números</h1>
        <form method="post">
            <label for="num1">Número 1:</label>
            <input id="num1" type="text" name="num1"><br><br>

            <label for="num2">Número 2:</label>
            <input id="num2" type="text" name="num2"><br><br>

            <label for="num3">Número 3:</label>
            <input id="num3" type="text" name="num3"><br><br>
            <input type="submit" name="calcMaior" value="Calcular Maior">
        </form>

        <div class="solution">
            <?php
                if (isset($maior)) {
                    print("O maior número é o {$maior}");
                }
            ?>
        </div>
    </section>

    <section class="par-ou-impar">
        <h1>Par ou Impar</h1>
        <form method="post">
            <label for="num">Número:</label>
            <input id="num" type="text" name="num">
            <input type="submit" name="parImpar" value="Par ou Impar">
        </form>

        <div class="solution">
            <?php
                if (isset($par)) {
                    if ($par) {
                        echo "<p>O numero $num é par</p>";
                    } else {
                        echo "<p>O numero $num é impar</p>";
                    }
                }
            ?>
        </div>
    </section>

    <section class="anoBissexto">
        <h1>É ano Bissexto?</h1>
        <form method="post">
            <label for="ano">Ano:</label>
            <input id="ano" type="text" name="ano">
            <input type="submit" name="calcAno" value="Calcular">
        </form>

        <div class="solution">
            <?php
            if (isset($ano)) {
                if ($bissexto) {
                    echo "O ano $ano é bissexto.";
                } else {
                    echo "O ano $ano não é bissexto.";
                }
            }
            ?>
        </div>
    </section>

    <section class="diaSemana">
        <h1>Dias da Semana</h1>
        <form method="post">
            <label for="dia">Dia:</label>
            <input id="dia" type="text" name="dia">
            <input type="submit" name="calcdiaSemana" value="Saber Dia">
        </form>

        <div class="solution">
            <?php
            if (isset($nomeDoDia)) {
                echo "O {$dia}º dia da semana é $nomeDoDia";
            }
            ?>
        </div>
    </section>
</body>
</html>