const formEl = document.querySelector(".form");

formEl.addEventListener("submit", (event) => {
  event.preventDefault();

  const formData = new FormData(formEl);
  const data = new URLSearchParams(formData);

  fetch("http://15redesignui.test/api/v1/user", {
    method: "POST",
    body: data,
  })
    .then((res) => res.json())
    .then((data) => console.log(data))
    .catch((error) => console.log(error));
});
