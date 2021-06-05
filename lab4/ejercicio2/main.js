window.onload = function () {
  fillSelect(10);
};

function fillSelect(n) {
  const select = document.getElementById("select");
  for (let i = 1; i <= n; i++) {
    const option = document.createElement("option");
    option.value = i;
    option.textContent = i;
    select.append(option);
  }
}

function calculateFactorial(event) {
  let number = event.target.value;
  let fact = 1;
  for (let i = 1; i <= number; i++) {
    fact *= i;
  }
  document.getElementById("result").textContent = fact;
}
