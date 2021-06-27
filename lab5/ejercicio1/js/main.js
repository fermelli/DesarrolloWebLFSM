const makeRequest = (options, callback) => {
  let { url, contentType, method = "GET", data = null } = { ...options };
  let httpRequest = new XMLHttpRequest();
  httpRequest.open(method, url, true);
  httpRequest.onreadystatechange = callback;
  httpRequest.setRequestHeader("Content-Type", contentType);
  httpRequest.send(data);
};

const handleConstructor = (idActiveLink) => {
  return function () {
    const content = document.getElementById("content");
    setActiveLink(idActiveLink);
    console.log(this);
    if (this.readyState == 4) {
      if (this.status == 200) {
        content.innerHTML = this.responseText;
      }
    }
  };
};

const setActiveLink = (idActiveLink) => {
  const links = document.getElementsByClassName("nav-link");
  Array.from(links).forEach((link) => {
    if (link.id == idActiveLink) {
      link.classList.add(["active"]);
    } else {
      link.classList.remove(["active"]);
    }
  });
};

makeRequest(
  {
    url: "./01-yo.html",
    contentType: "text/html; charset=utf-8",
  },
  handleConstructor("home")
);
