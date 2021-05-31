// Realizar un programa en javascrpt que solicite una cadena a traves de un prompt que consiste en una lista de nombres separados por comas, ej: juan, ricardo,maria ,pedro, linda el programa de permitir mostrar la misma lista ,ordenada de mayor a menor separado por guiones
let palabrasSeparadasPorComas = prompt("Introduzca una cadena de nombres separada por \",\"");

function ordernarPalabras(palabrasSeparadas) {
  let arreglo = palabrasSeparadas.split(",");

  arreglo = arreglo.map((element) => { return element.trim() })

  arreglo.sort();

  return arreglo.join(", ");

}

document.write("PALABRAS ORIGINALES: " + palabrasSeparadasPorComas + "    ");  
document.write("PALABRAS ORDENADAS: " + ordernarPalabras(palabrasSeparadasPorComas));