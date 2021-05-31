// Definir una función que determine si la cadena de texto que se le pasa como parámetro es un palíndromo, es decir, si se lee de la misma forma desde la izquierda y desde la derecha. Ejemplo de palíndromo complejo: "La ruta nos aporto otro paso natural".
function invertirCadena(cadena) {
  let cadenaInvertida = "";
  for (let index = cadena.length - 1; index >= 0; index--) {
    cadenaInvertida += cadena[index];
  }
  return cadenaInvertida;
}

function quitarEspacios(cadena) {
  let cadenaSinEspacios = "";
  let contador = 0;
  for (let index = 0; index < cadena.length; index++) {
    if(cadena[index] == " ") {
      cadenaSinEspacios[contador] = cadena[index];
      contador++;
    }
  }
  return cadenaSinEspacios;
}

function esPalindromo(palabra) {
  let palabraAux = quitarEspacios(palabra.toLowerCase());
  console.log(palabraAux);
  if (palabraAux == invertirCadena(palabraAux)) {
    document.write(`La palabra u oracion: ${palabra} es PALINDROMA`);
  } else {
    document.write(`La palabra u oracion: ${palabra} NO es PALINDROMA`);
  }
}

let palabra = prompt("Introduzca una oracion o palabra");

esPalindromo(palabra);