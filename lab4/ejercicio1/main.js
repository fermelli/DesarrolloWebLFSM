function literal(number) {
  let literal = "";
  if (number != "") {
    number = parseInt(number);
    if (number >= 1 && number <= 100) {
      if (number >= 11 && number <= 15) {
        switch (number) {
          case 11:
            literal = "Once";
            break;
          case 12:
            literal = "Doce";
            break;
          case 13:
            literal = "Trece";
            break;
          case 14:
            literal = "Catorce";
            break;
          case 15:
            literal = "Quince";
            break;
        }
        return literal;
      } else {
        let unity = number % 10;
        let ten = (number - unity) / 10;

        switch (ten) {
          case 1:
            literal = "Diez";
            break;
          case 2:
            literal = "Veinte";
            break;
          case 3:
            literal = "Treinta";
            break;
          case 4:
            literal = "Cuarenta";
            break;
          case 5:
            literal = "Cincuenta";
            break;
          case 6:
            literal = "Sesenta";
            break;
          case 7:
            literal = "Setenta";
            break;
          case 8:
            literal = "Ochenta";
            break;
          case 9:
            literal = "Noventa";
            break;
          case 10:
            literal = "Cien";
            break;
        }

        if (unity != 0) {
          if (ten == 1) {
            literal = "Dieci";
          }

          if (ten == 2) {
            literal = "Veinti";
          }

          if (ten > 2 && ten < 10) {
            literal += " y ";
          }

          switch (unity) {
            case 1:
              literal += "Uno";
              break;
            case 2:
              literal += "Dos";
              break;
            case 3:
              literal += "Tres";
              break;
            case 4:
              literal += "Cuatro";
              break;
            case 5:
              literal += "Cinco";
              break;
            case 6:
              literal += "Seis";
              break;
            case 7:
              literal += "Siete";
              break;
            case 8:
              literal += "Ocho";
              break;
            case 9:
              literal += "Nueve";
              break;
          }
        }
      }
    } else {
      literal = "El número debe estar entre 0 y 100";
    }
  } else {
    alert("¡El campo no debe estar vacio!");
  }
  return literal;
}

function convertToLiteral(event) {
  event.preventDefault();
  let number = document.getElementById("number").value;
  const result = document.getElementById("result");
  result.textContent = literal(number);
}

function limpiar(event) {
  const result = document.getElementById("result");
  result.textContent = "";
}
