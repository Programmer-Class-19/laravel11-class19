// Fungsi untuk menampilkan modal dan mengisi data user
function editUser(user) {
    $('#userId').val(user.id);
    $('#name').val(user.name);
    $('#email').val(user.email);
    $('#editUserModal').modal('show');  // Menampilkan modal secara eksplisit
}


// Fungsi untuk submit form update dengan AJAX
$('#editUserForm').on('submit', function(e) {
    e.preventDefault();
    let userId = $('#userId').val();

    $.ajax({
        url: `/users/${userId}`,
        method: 'PUT',
        data: {
            _token: $('input[name="_token"]').val(),
            name: $('#name').val(),
            email: $('#email').val()
        },
        success: function(response) {
            $('#editUserModal').modal('hide');
            alert('User berhasil diperbarui!');
            location.reload(); // Refresh halaman untuk update data
        },
        error: function(xhr, status, error) {
            alert('Gagal memperbarui user: ' + xhr.responseText);
        }
    });
});

// Fungsi konfirmasi delete dengan AJAX
// function confirmDelete(userId) {
//     if (confirm("Apakah Anda yakin ingin menghapus User ini?")) {
//         $.ajax({
//             url: `/users/${userId}`,
//             method: 'DELETE',
//             data: {
//                 _token: $('input[name="_token"]').val()
//             },
//             success: function(response) {
//                 alert('User berhasil dihapus!');
//                 location.reload(); // Refresh halaman untuk memperbarui daftar user
//             },
//             error: function(xhr, status, error) {
//                 alert('Gagal menghapus user: ' + xhr.responseText);
//             }
//         });
//     }
// }
