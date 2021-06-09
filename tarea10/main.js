let numberOfAttemps;
let countCorrects;
const words = [
  "javascript",
  "variable",
  "coercion",
  "datos",
  "explicito",
  "repositorio",
  "pila",
  "arreglo",
  "ambito",
];

const selectedWord = (words) => {
  let index = Math.floor(Math.random() * words.length);
  return words[index];
};

const createInputs = (word) => {
  const containerInputs = document.getElementById("container-inputs");
  containerInputs.innerHTML = "";
  for (let i = 0; i < word.length; i++) {
    const input = document.createElement("input");
    input.classList.add("input");
    input.maxLength = 1;
    input.readOnly = true;
    containerInputs.append(input);
  }
};

const createButtons = () => {
  const containerButtons = document.getElementById("container-buttons");
  containerButtons.innerHTML = "";
  for (let i = 65; i <= 90; i++) {
    const button = document.createElement("button");
    let letter = String.fromCharCode(i);
    button.value = letter;
    button.classList.add("btn", "btn-letter");
    button.textContent = letter;
    containerButtons.append(button);
  }
};

const verify = (word) => {
  const btnLetters = document.getElementsByClassName("btn-letter");
  const inputs = document.getElementsByClassName("input");
  const image = document.getElementById("img");
  Array.from(btnLetters).forEach((button) => {
    button.addEventListener("click", (event) => {
      let letter = event.target.value;
      let status = false;
      for (let i = 0; i < word.length; i++) {
        if (word[i].toUpperCase() == letter) {
          inputs[i].value = letter;
          countCorrects++;
          status = true;
        }
      }
      if (status) {
        if (countCorrects == word.length) {
          image.alt = `Ganador`;
          image.src = `./images/winner.png`;
        }
      } else {
        numberOfAttemps++;
        image.alt = `Ahorcado - ${numberOfAttemps}`;
        image.src = `./images/${numberOfAttemps}.png`;
      }
      if (numberOfAttemps == 8 || countCorrects == word.length) {
        Array.from(btnLetters).forEach((button) => {
          if (!button.disabled) {
            button.disabled = true;
          }
        });
      }
      event.target.disabled = true;
    });
  });
};

const play = () => {
  numberOfAttemps = 0;
  countCorrects = 0;

  let word = selectedWord(words);

  document.getElementById("img").alt = `Ahorcado - 0`;
  document.getElementById("img").src = `./images/0.png`;

  createInputs(word);
  createButtons();
  verify(word);
};

document.getElementById("reset").onclick = play;

window.onload = play;
