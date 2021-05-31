// Crear un programa en javascript que permita calcular el mayor de 4 números introducidos por promp
const cantidadNumeros = 4;
let mayor;

for (let contador = 1; contador <= cantidadNumeros; contador++) {
  let numero = parseInt(prompt(`Introduzca ${contador}° número`));
  if(contador == 1) {
    mayor = numero; 
  } else {
    if(numero > mayor) {
      mayor = numero;
    }
  }
}

document.write(`El numero mayor es: ${mayor}`);