function findHigher(event) {
  event.preventDefault();

  const inputNumber1 = document.getElementById("number1");
  const inputNumber2 = document.getElementById("number2");
  const inputNumber3 = document.getElementById("number3");

  inputNumber1.style.backgroundColor = "";
  inputNumber2.style.backgroundColor = "";
  inputNumber3.style.backgroundColor = "";

  inputNumber1.style.color = "#181818";
  inputNumber2.style.color = "#181818";
  inputNumber3.style.color = "#181818";

  if (
    inputNumber1.value != "" &&
    inputNumber2.value != "" &&
    inputNumber3.value != ""
  ) {
    let number1 = parseInt(inputNumber1.value);
    let number2 = parseInt(inputNumber2.value);
    let number3 = parseInt(inputNumber3.value);

    let inputMayor;
    let inputMenor;

    if (number1 > number2) {
      if (number1 > number3) {
        inputMayor = inputNumber1;
        if (number2 > number3) {
          inputMenor = inputNumber3;
        } else {
          inputMenor = inputNumber2;
        }
      } else {
        inputMayor = inputNumber3;
        inputMenor = inputNumber2;
      }
    } else {
      if (number2 > number3) {
        inputMayor = inputNumber2;
        if (number1 > number3) {
          inputMenor = inputNumber3;
        } else {
          inputMenor = inputNumber1;
        }
      } else {
        inputMayor = inputNumber3;
        inputMenor = inputNumber1;
      }
    }
    inputMayor.style.backgroundColor = "blue";
    inputMenor.style.backgroundColor = "red";
    inputMayor.style.color = "#ffffff";
    inputMenor.style.color = "#ffffff";
  } else {
    alert("¡Los campos no deben estar vacios!");
  }
}

function limpiar() {
  const inputNumber1 = document.getElementById("number1");
  const inputNumber2 = document.getElementById("number2");
  const inputNumber3 = document.getElementById("number3");

  inputNumber1.style.backgroundColor = "";
  inputNumber2.style.backgroundColor = "";
  inputNumber3.style.backgroundColor = "";
}
