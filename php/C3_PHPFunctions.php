<?php

    // Sem retorno, e sem parametros
    function calculoVoltagem()
    {
        $v;
        $r = 3;
        $i = 1;

        $v = $i * $r;

        echo $v;
    }

    function calculoResistencia()
    {
        $v = 10;
        $r;
        $i = 0.8;

        $r = $v / $i;

        echo $r;
    }

    function calculoIntencidade()
    {
        $v = 10;
        $r = 50;
        $i;

        $i = $v / $r;

        echo $i;
    }
// Sem retorno, e sem parametros


// Sem retorno e com parametros
function calculoVoltagemParam($v, $r, $i)
{
    $v = $i * $r;

    echo $v;
}

function calculoResistenciaParam($v, $r, $i)
{
    $r = $v / $i;

    echo $r;
}

function calculoIntencidadeParam($v, $r, $i)
{
    $i = $v / $r;
    
    echo $i;
}

// Sem retorno e com parametros

// Com retorno e com parametros 

function calculoVoltagemReturnParam($v, $r, $i)
{
    $v = $i * $r;

    return $v;
}

function calculoResistenciaReturnParam($v, $r, $i)
{
    $r = $v / $i;

    return $r;
}

function calculoIntencidadeReturnParam($v, $r, $i)
{
    $i = $v / $r;
    
    return $i;
}

// Com retorno e com parametros 


// Multiplos

function multiplos($a, $b) {
    $info = ($a % $b == 0) ? "$a é multiplo de $b." : (($b % $a == 0) ? "$b é multiplo de $a." : "$a e $b não são multiplos.");
    return $info;
}

print(multiplos(2, 4) . "<br>");
print(multiplos(4, 2) . "<br>");
print(multiplos(3, 4) . "<br>");

