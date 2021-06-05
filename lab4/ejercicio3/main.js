function changeBackgroundColor(color) {
  const box = document.getElementById("box");
  box.style.backgroundColor = color;
  if (color != "yellow") {
    box.style.color = "#ffffff";
  } else {
    box.style.color = "#181818";
  }
}
