const endpoint = "http://15redesignui.test/api/v1/user";
fetch(endpoint)
  .then((response) => response.json())
  .then(({data}) => {
    const fetchApi = document.getElementById("fetch-api");

    // Cek apakah `data.data` adalah array
    if (Array.isArray(data)) {
      // Loop melalui setiap item di array
      data.forEach((user) => {
        let div = document.createElement("div");
        div.innerHTML = 
        `<h2>${user.name}</h2>
        <li>${user.email}</li>
        <li>${user.username}</li>`;
        fetchApi.appendChild(div);
      });
    } else {
      fetchApi.innerHTML = `<p>Data tidak tersedia</p>`;
    }
  })
  .catch((error) => {
    console.error("Error", error);
    const fetchApi = document.getElementById("fetch-api");
    fetchApi.innerHTML = `<p>Error fetching data</p>`;
  });

// , {
//   method: "POST",
//   headers: {
//     "Content-type" : "application/json",
//   },
//   body: JSON.stringify({
//     email: "sze@gmail.com",
//     name: "sezeedd",
//     password : "sezedd123",
//     username : "szee"
//   })
// }
