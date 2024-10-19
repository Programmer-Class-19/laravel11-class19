const userTableBody = document.querySelector("#userTableBody");
const notification = document.getElementById("notification");

// Fungsi untuk menampilkan notifikasi
function showNotification(message, type) {
  notification.textContent = message;
  notification.classList.add(type); // Tambahkan class "success" atau "error"
  notification.style.display = "block"; // Tampilkan notifikasi
  setTimeout(() => {
    notification.style.display = "none"; // Sembunyikan notifikasi setelah 3 detik
    notification.classList.remove(type); // Hapus class setelah notifikasi disembunyikan
  }, 3000);
}

// Fungsi untuk menambahkan data pengguna ke tabel
function renderUser(user) {
  const rew = document.createElement("tr");
  rew.innerHTML = `
    <td>${user.id}</td>
    <td>${user.name}</td>
    <td>${user.username}</td>
    <td>${user.email}</td>
    <td>
      <button onclick="editUser(${user.id}, '${user.name}', '${user.username}', '${user.email}')">Edit</button>
      <button onclick="deleteUser(${user.id})">Delete</button>
    </td>
  `;
  userTableBody.appendChild(rew);
}

// Fungsi untuk mengambil data dari API (Read)
function getUsers() {
  fetch("http://15redesignui.test/api/v1/user")
    .then((response) => response.json())
    .then((responseData) => {
      const data = responseData.data; // Sesuaikan jika struktur respons API membungkus data dalam 'data'
      console.log(data);
      userTableBody.innerHTML = ""; // Kosongkan tabel sebelum diisi

      data.forEach((user) => renderUser(user)); // Render setiap user
    })

    .catch((error) => console.log("Error fetching data:", error));
}

// Fungsi untuk menambah atau meng-update pengguna (Create/Update)
document.querySelector(".form").addEventListener("submit", (event) => {
  event.preventDefault();

  const formData = new FormData(event.target);
  const data = new URLSearchParams(formData);
  const userId = formData.get("id"); // ID pengguna (untuk edit)

  let method = "POST";
  let url = "http://15redesignui.test/api/v1/user";

  if (userId) {
    // Jika ada userId, maka ini adalah update
    method = "PATCH";
    url = `http://15redesignui.test/api/v1/user/${userId}`;
  }

  fetch(url, {
    method: method,
    body: data,
  })
    .then((res) => res.json())
    .then((data) => {
      console.log("Success:", data);
      event.target.reset(); // Reset form setelah submit
      getUsers(); // Refresh data
    })
    .catch((error) => console.log("Error:", error));
});

// Fungsi untuk mengisi form ketika mengedit data pengguna
function editUser(id, name, username, email) {
  const newName = prompt("Enter new name", name);
  const newUsername = prompt("Enter new username", username);
  const newEmail = prompt("Enter new email", email);

  if (newName && newUsername && newEmail) {
    fetch(`http://15redesignui.test/api/v1/user/${id}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: new URLSearchParams({
        name: newName,
        username: newUsername,
        email: newEmail,
      }),
    })
      .then((res) => res.json())
      .then((data) => {
        console.log(data);
        showNotification("User updated successfully", "success");
        getUsers(); // Refresh data tabel
      })
      .catch((error) => {
        console.error(error);
        showNotification("Failed to update user", "error");
      });
  }
}

// Fungsi untuk menghapus pengguna (Delete)
// Fungsi untuk menghapus pengguna dengan konfirmasi
function deleteUser(userId) {
  const confirmDelete = confirm("Are you sure you want to delete this user?");
  if (confirmDelete) {
    fetch(`http://15redesignui.test/api/v1/user/${userId}`, {
      method: "DELETE",
    })
      .then((res) => res.json())
      .then((data) => {
        console.log(data);
        showNotification("User deleted successfully", "success");
        getUsers(); // Refresh data tabel
      })
      .catch((error) => {
        console.error(error);
        showNotification("Failed to delete user", "error");
      });
  } else {
    showNotification("User deletion canceled", "error");
  }
}

// Saat halaman dimuat, ambil semua data pengguna
document.addEventListener("DOMContentLoaded", function () {
  getUsers(); // Ambil data yang sudah ada dari API
});
