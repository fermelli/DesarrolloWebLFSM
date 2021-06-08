function deleteResults() {
  document.getElementById("resultX1").innerHTML = "";
  document.getElementById("resultX2").innerHTML = "";
}

function mcd(a, b) {
  if (b == 0) {
    return a;
  }
  return mcd(b, a % b);
}

function simplifyNumeratorAndDenominator(numerator, denominator) {
  let mcdValue = mcd(numerator, denominator);
  numerator = numerator / mcdValue;
  denominator = denominator / mcdValue;
  if (numerator > 0 && denominator < 0) {
    numerator = -numerator;
    denominator = -denominator;
  }
  return {
    numerator,
    denominator,
  };
}

function simplifyFraction(numerator, denominator) {
  let simplified = simplifyNumeratorAndDenominator(numerator, denominator);
  return `${simplified.numerator} ${
    simplified.denominator != 1 ? `/ ${simplified.denominator}` : ""
  }`;
}

function simplifyFractionImaginary(numerator, denominator, sign) {
  let simplified = simplifyNumeratorAndDenominator(numerator, denominator);
  let numeratorString = "";
  if (simplified.numerator < 0) {
    numeratorString =
      sign == "+" ? `- ${-simplified.numerator}` : `+ ${-simplified.numerator}`;
  } else {
    numeratorString =
      sign == "+" ? `+ ${simplified.numerator}` : `- ${simplified.numerator}`;
  }
  return `${numeratorString} i ${
    simplified.denominator != 1 ? `/ ${simplified.denominator}` : ""
  }`;
}

function solveEquation(coefA, coefB, coefC) {
  let disc = coefB ** 2 - 4 * coefA * coefC;
  let denominator = 2 * coefA;
  let root = Math.sqrt(Math.abs(disc));
  let isExactSqrt = root - parseInt(root) == 0;

  if (disc >= 0) {
    if (isExactSqrt) {
      let numerator1 = -coefB + root;
      let numerator2 = -coefB - root;
      return {
        x1: `${simplifyFraction(numerator1, denominator)}`,
        x2: `${simplifyFraction(numerator2, denominator)}`,
      };
    } else {
      return {
        x1: `${simplifyFraction(-coefB, denominator)} ${
          denominator < 0 ? "-" : "+"
        } &Sqrt;${disc} / ${denominator < 0 ? -denominator : denominator} = ${
          (-coefB + root) / denominator
        }`,
        x2: `${simplifyFraction(-coefB, denominator)} ${
          denominator < 0 ? "+" : "-"
        } &Sqrt;${disc} / ${denominator < 0 ? -denominator : denominator} = ${
          (-coefB - root) / denominator
        }`,
      };
    }
  } else {
    let fractionImaginary = root / denominator;
    let firstTerm = -coefB / denominator;
    if (isExactSqrt) {
      return {
        x1: `${simplifyFraction(
          -coefB,
          denominator
        )} ${simplifyFractionImaginary(root, denominator, "+")} = ${
          firstTerm != 0 ? firstTerm : ""
        } ${fractionImaginary < 0 ? "-" : "+"} ${Math.abs(
          fractionImaginary
        )} i`,
        x2: `${simplifyFraction(
          -coefB,
          denominator
        )} ${simplifyFractionImaginary(root, denominator, "-")} = ${
          firstTerm != 0 ? firstTerm : ""
        } ${fractionImaginary < 0 ? "+" : "-"} ${Math.abs(
          fractionImaginary
        )} i`,
      };
    } else {
      return {
        x1: `${simplifyFraction(-coefB, denominator)} ${
          denominator < 0 ? "-" : "+"
        } &Sqrt;${Math.abs(disc)} i / ${
          denominator < 0 ? -denominator : denominator
        } = ${firstTerm != 0 ? firstTerm : ""} ${
          fractionImaginary < 0 ? "-" : "+"
        } ${Math.abs(fractionImaginary)} i`,
        x2: `${simplifyFraction(-coefB, denominator)} ${
          denominator < 0 ? "+" : "-"
        } &Sqrt;${Math.abs(disc)} i / ${
          denominator < 0 ? -denominator : denominator
        } = ${firstTerm != 0 ? firstTerm : ""} ${
          fractionImaginary < 0 ? "+" : "-"
        } ${Math.abs(fractionImaginary)} i`,
      };
    }
  }
}

function perfomCalculation(event) {
  event.preventDefault();
  deleteResults();

  const inputA = document.getElementById("a");
  const inputB = document.getElementById("b");
  const inputC = document.getElementById("c");
  const resultX1 = document.getElementById("resultX1");
  const resultX2 = document.getElementById("resultX2");

  if (inputA.value == "" || inputB.value == "" || inputC.value == "") {
    alert("¡Los campos no deben estar vacios!");
  } else {
    let coefA = parseFloat(inputA.value);
    let coefB = parseFloat(inputB.value);
    let coefC = parseFloat(inputC.value);

    if (coefA == 0) {
      alert('¡El coeficiente "a" debe ser diferente de 0!');
    } else {
      const equation = solveEquation(coefA, coefB, coefC);
      resultX1.innerHTML = equation.x1;
      resultX2.innerHTML = equation.x2;
    }
  }
}
