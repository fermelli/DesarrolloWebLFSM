const makeRequest = (options, callback) => {
  let { url, contentType, method = "GET", data = null } = { ...options };
  let httpRequest = new XMLHttpRequest();
  httpRequest.open(method, url, true);
  httpRequest.onreadystatechange = callback;
  httpRequest.setRequestHeader("Content-Type", contentType);
  httpRequest.send(data);
};

const handleLoadForm = function () {
  const content = document.getElementById("content");
  setActiveLink("create");
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
  const content = document.getElementById("content");
  content.innerHTML = "";
  setActiveLink("read");
  if (this.readyState == 4) {
    if (this.status == 200) {
      const products = JSON.parse(this.responseText);
      const title = document.createElement("h1");
      title.classList.add("title");
      title.textContent = "Tabla Productos";
      content.append(title);
      if (products.length) {
        fillProductTable(products);
      } else {
        const emptyTableMessage = document.createElement("p");
        emptyTableMessage.classList.add("empty-table-message");
        emptyTableMessage.textContent = "No hay productos que mostrar";
        content.append(emptyTableMessage);
      }
    }
  }
};

const handleSaveProduct = function () {
  if (this.readyState == 4) {
    if (this.status == 200) {
      const response = JSON.parse(this.responseText);
      let { mensaje, success } = { ...response };
      const message = document.getElementById("message");
      if (success) {
        message.classList.remove("message--danger");
        message.classList.add("message--success");
        cleanFields();
      } else {
        message.classList.remove("message--success");
        message.classList.add("message--danger");
      }
      message.style.display = "block";
      document.getElementById("message-title").textContent = "Producto";
      document.getElementById("message-content").textContent = mensaje;
      setTimeout(() => {
        message.style.display = "none";
      }, 1500);
    }
  }
};

const setActiveLink = (idActiveLink) => {
  const links = document.getElementsByClassName("nav__link");
  Array.from(links).forEach((link) => {
    if (link.id == idActiveLink) {
      link.classList.add(["nav__link--active"]);
    } else {
      link.classList.remove(["nav__link--active"]);
    }
  });
};

const fillProductTable = (products) => {
  const containerTable = document.createElement("div");
  containerTable.classList.add("container-table");
  const table = document.createElement("table");
  table.classList.add("table");
  const thead = document.createElement("thead");
  const trHead = document.createElement("tr");
  const titles = [
    "ID.",
    "Producto",
    "Categoria",
    "Descripción",
    "Precio",
    "Marca",
  ];
  titles.forEach((title) => {
    const th = document.createElement("th");
    th.textContent = title;
    trHead.append(th);
  });
  thead.append(trHead);
  const tbody = document.createElement("tbody");
  products.forEach((product) => {
    const tr = document.createElement("tr");
    const keys = [
      "id",
      "producto",
      "categoria",
      "descripcion",
      "precio",
      "marca",
    ];
    keys.forEach((key) => {
      const td = document.createElement("td");
      td.textContent = product[key];
      tr.append(td);
    });
    tbody.append(tr);
  });
  table.append(thead);
  table.append(tbody);
  containerTable.append(table);
  content.append(containerTable);
};

const saveProduct = (event) => {
  event.preventDefault();
  const formElments = document.forms[0].elements;
  let data = "";
  Array.from(formElments).forEach((formElement) => {
    if (formElement.tagName != "BUTTON") {
      data += `${formElement.id}=${formElement.value}&`;
    }
  });
  makeRequest(
    {
      url: "./php/save-product.php",
      contentType: "application/x-www-form-urlencoded",
      method: "POST",
      data: data,
    },
    handleSaveProduct
  );
};

const cleanFields = () => {
  const formElments = document.forms[0].elements;
  Array.from(formElments).forEach((formElement) => {
    if (formElement.tagName != "BUTTON") {
      formElement.value = "";
    }
  });
};

const setListeners = () => {
  const links = document.getElementsByClassName("nav__link");
  Array.from(links).forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      if (event.target.id == "create") {
        makeRequest(
          {
            url: "./pages/form-product.html",
            contentType: "text/html; charset=utf-8",
          },
          handleLoadForm
        );
        makeRequest(
          {
            url: "./php/categories.php",
            contentType: "application/json",
          },
          handleLoadDataInSelect("idcategoria", {
            value: "id",
            text: "categoria",
          })
        );

        makeRequest(
          {
            url: "./php/brands.php",
            contentType: "application/json",
          },
          handleLoadDataInSelect("idmarca", { value: "id", text: "marca" })
        );
      }
      if (event.target.id == "read") {
        makeRequest(
          {
            url: "./php/products.php",
            contentType: "application/json",
          },
          handleLoadDataTableProducts
        );
      }
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
    handleLoadForm
  );
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
};

window.onload = main();
