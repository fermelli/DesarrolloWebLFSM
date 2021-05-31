// Escribir el código de una función a la que se pasa como parámetro un número entero y devuelve como resultado una cadena de texto que indica si el número es par o impar. Mostrar por pantalla el resultado devuelto por la función.
function esParOImpar(numero) {
  if(numero % 2 == 0) {
    document.write(`El número ${numero} es PAR`);
  }
  else {
    document.write(`El número ${numero} es IMPAR`);
  }
}

let num = parseInt(prompt("Introduzca un número entero"));

esParOImpar(num);