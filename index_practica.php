<?php

// Ejercicios Básicos
// Condicionales Básicos
// Ejercicio 1: Escribe un programa que tome un número y determine si es positivo, negativo o cero.
// function EjercicioUno($num1) {
//     if ($num1 > 0) {
//         return '<h1>El número ' . $num1 . ' es positivo</h1>';
//     } elseif ($num1 < 0) {
//         return '<h1>El número ' . $num1 . ' es negativo</h1>';
//     } elseif ($num1 === 0) {
//         return '<h1>El número es ' . $num1 . '</h1>';
//     }
// }

// $positivoNegativo = EjercicioUno(0);
// echo $positivoNegativo;

// Ejercicio 2: Escribe un programa que tome una nota (0-100) y muestre si la nota es "Aprobado" (>= 60) o "Reprobado" (< 60).


// function NotaExamen($nota){
//     if($nota > 0 && $nota <=100){
//         if($nota>=60 ) return '<p>Aprobado tu nota es un: </p>'.$nota;
//         if($nota<60) return '<p>Desaprobado tu nora es un: </p>'.$nota;
//     }else{
//         return '<p>Por favor ingresa una nota de 1 a 100</p>';
//     }
    
// };

// $resultado=NotaExamen(101);
// echo $resultado;


// Funciones Básicas
// Ejercicio 1: Crea una función que reciba dos números y retorne su suma.
// function Numeros($num1,$num2){
//     return $num1+$num2;
// }

// $res=Numeros(10,15);
// echo $res;





// Ejercicio 2: Crea una función que reciba un número y retorne su factorial.
//  function Factorial($num){
//     $count=1;
//     for($i=1 ; $i<=$num ; $i++){
//         $count*=$i;
//     }
//     return $count;
//  }


// $res=Factorial(5);
// echo $res;

// Bucles Básicos
// Ejercicio 1: Escribe un programa que imprima los números del 1 al 10 usando un bucle for.

// function unoAlDiez(){
//     for($i=1; $i<=10 ; $i++){
//         echo $i;
//     }
// }

// unoAlDiez();



// Ejercicio 2: Escribe un programa que imprima los números pares del 1 al 20 usando un bucle while

// $i=1;

// while($i<=20){
//     if($i%2===0){
//         echo $i;
//     }
//     $i++;
// }


// Ejercicios Intermedios
// Condicionales Intermedios

// // Ejercicio 1: Escribe un programa que tome tres números y determine cuál es el mayor.
// function numeroMayor($num1,$num2,$num3){
//     if($num1>$num2 && $num1>$num3) return '<p>El numero </p>'.$num1.'<p> es el número mayor</p>';
//     if($num2>$num1 && $num2>$num3) return '<p>El numero </p>'.$num2.'<p> es el número mayor</p>';
//     if($num3>$num1 && $num3>$num2) return '<p>El numero </p>'.$num3.'<p> es el número mayor</p>';

    // $mayor = max($num1, $num2, $num3);
    // return '<p>El número </p>' . $mayor . '<p> es el número mayor</p>';
// }

// $res=numeroMayor(11,6,99);
// echo $res;

// Ejercicio Intermedio: Validación de un Número de Teléfono
// Descripción: Escribe una función que reciba un número de teléfono en formato de cadena y valide si es un número de teléfono válido según un formato específico.

// Formato del número de teléfono:

// Debe tener 10 dígitos.
// Solo puede contener números.
// Opcionalmente puede incluir espacios o guiones entre los dígitos.
// Instrucciones:

// Función: Crea una función llamada validarTelefono que tome un número de teléfono como argumento.
// Validación: La función debe:
// Eliminar espacios y guiones del número.
// Verificar que el número resultante tenga exactamente 10 dígitos.
// Retornar un mensaje que indique si el número es válido o no.
// function validarTelefono($numero_telefono){
//     $numero_telefono_sin_guiones=str_replace('-','',$numero_telefono);
//     $len_numero=strlen(trim($numero_telefono_sin_guiones));
 
//     if($len_numero === 10){
//         echo 'El numero '. $numero_telefono_sin_guiones. 'es correcto' ;
//     }else{
//         echo 'ingrese un numero valido';
//     }

// }

// $res=validarTelefono('156882448-8');
// echo $res;
// Ejercicio 1: Crea una función que reciba un string y retorne el número de vocales que contiene.

// function recibirUnString($str){
//     $mi_array=['a','e','i','o','u'];
//     $count=0;
//     for($i=0 ; $i<=strlen($str)-1 ; $i++){

//         if(in_array($str[$i],$mi_array)){
//             $count+=1;
//         }
//     }
//     return '<p>La palabra <hp>'.$str.'<p> contiene </p>'.$count. '<p> vocales </p>';

// }

// $res=recibirUnString('casa');
// echo $res;





// Ejercicio 2: Crea una función que reciba un array de números y retorne el número mayor.
// Bucles Intermedios

// Ejercicio 1: Escribe un programa que imprima los primeros 10 números de la serie de Fibonacci.
// Ejercicio 2: Escribe un programa que imprima todos los números primos entre 1 y 100.
// Ejercicios Avanzados
// Condicionales Avanzados

// Ejercicio 1: Escribe un programa que tome una fecha (día, mes, año) y determine si es una fecha válida.
// Ejercicio 2: Escribe un programa que tome una cadena y determine si es un palíndromo.
// Funciones Avanzadas

// Ejercicio 1: Crea una función que reciba un array de números y retorne un array con los números ordenados en orden ascendente.
// Ejercicio 2: Crea una función que reciba un array multidimensional y retorne la suma de todos sus elementos.
// Bucles Avanzados

// Ejercicio 1: Escribe un programa que imprima un triángulo de números como sigue:
// Copiar código
// 1
// 1 2
// 1 2 3
// 1 2 3 4
// 1 2 3 4 5
// Ejercicio 2: Escribe un programa que imprima los primeros n números de la serie de Fibonacci, donde n es un número ingresado por el usuario.



// $var='1';

// if($var){
//     echo 'verdadero';
// }else{
//     echo 'false';
// };


$a='10';
$b=$a+2;
echo $b;
?>
