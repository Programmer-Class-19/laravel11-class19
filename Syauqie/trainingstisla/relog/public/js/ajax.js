$(document).ready(function() {
    $('#userForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        var url = $(this).data('url'); // Mengambil URL dari data atribut

        $.ajax({
            url: url, // Menggunakan URL dari data atribut
            method: 'POST',
            data: formData,
            success: function(response) {
                toastr.success(response.message);
                $('#userForm')[0].reset();
            },
            error: function(xhr, status, error) {
                toastr.error('Terjadi kesalahan: ' + error);
            }
        });
    });
});
