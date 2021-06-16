const makeRequest = (options, callback) => {
  let { url, contentType, method = "GET" } = { ...options };
  let httpRequest = new XMLHttpRequest();
  httpRequest.open(method, url, true);
  httpRequest.onreadystatechange = callback;
  httpRequest.setRequestHeader("Content-Type", contentType);
  httpRequest.send();
};

const handleLoadContent = function () {
  const content = document.getElementById("content");
  if (this.readyState == 4) {
    if (this.status == 200) {
      content.innerHTML = this.responseText;
    }
  }
};

const handleLoadDataInSelect = function (idSelect, keys) {
  let { value, text } = { ...keys };
  return function () {
    const select = document.getElementById(idSelect);
    if (this.readyState == 4) {
      if (this.status == 200) {
        const options = JSON.parse(this.responseText);
        options.forEach((option) => {
          const optionElement = document.createElement("option");
          optionElement.value = option[value];
          optionElement.textContent = option[text];
          select.append(optionElement);
        });
      }
    }
  };
};

const handleLoadDataTableProducts = function () {
  if (this.readyState == 4) {
    if (this.status == 200) {
      const products = JSON.parse(this.responseText);
      if (products.length) {
        const table = document.createElement("table");
        products.forEach((product) => {
          
        });
      }
    }
  }
};

const setListeners = () => {
  const links = document.getElementsByClassName("nav__link");
  Array.from(links).forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      let options;
      if (event.target.id == "create") {
        options = {
          url: "./pages/form-product.html",
          contentType: "text/html; charset=utf-8",
        };
      }
      if (event.target.id == "read") {
        options = {
          url: "./pages/products.html",
          contentType: "text/html; charset=utf-8",
        };
      }
      makeRequest(options, handleLoadContent);
    });
  });
};

const main = () => {
  setListeners();
  makeRequest(
    {
      url: "./pages/form-product.html",
      contentType: "text/html; charset=utf-8",
    },
    handleLoadContent
  );
};

window.onload = main();

makeRequest(
  {
    url: "./php/categories.php",
    contentType: "application/json",
  },
  handleLoadDataInSelect("idcategoria", { value: "id", text: "categoria" })
);

makeRequest(
  {
    url: "./php/brands.php",
    contentType: "application/json",
  },
  handleLoadDataInSelect("idmarca", { value: "id", text: "marca" })
);

makeRequest(
  {
    url: "./php/products.php",
    contentType: "application/json",
  },
  handleLoadDataTableProducts
);
