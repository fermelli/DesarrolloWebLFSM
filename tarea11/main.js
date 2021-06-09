document.getElementById("calculate").onclick = calculate;

function calculate() {
  const inputA = document.getElementById("a");
  const inputB = document.getElementById("b");

  if (inputA.value == "" && inputB.value == "") {
    alert("¡Los campos no deben estar vacios!");
  } else {
    let a = parseFloat(inputA.value);
    let b = parseFloat(inputB.value);
    let operation = document.getElementById("operation").value;
    const result = document.getElementById("result");
    switch (operation) {
      case "+":
        result.textContent = a + b;
        break;
      case "-":
        result.textContent = a - b;
        break;
      case "*":
        result.textContent = a * b;
        break;
      case "/":
        if (b == 0) {
          result.textContent = "¡No se puede dividir entre 0!";
        } else {
          result.textContent = a / b;
        }
        break;
      default:
        result.textContent = "¡La operación no es válida!";
        break;
    }
  }
}
