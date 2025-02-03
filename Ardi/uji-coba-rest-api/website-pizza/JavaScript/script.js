function tampilinSemuaMenu() {
    $.getJSON('data/pizza.json', function (data) {
        let menu = data.menu;
        $.each(menu, function (i, data) {
            $('#daftar-menu').append('<div class="col-md-4"><div class="card mb-3"><img src="img/pizza/'+ data.gambar +'" class="card-img-top"><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p><h5 class="card-title">'+ data.harga +'</h5><a href="#" class="btn btn-primary mt-3">Pesan Sekarang</a></div></div></div>');
        });
    });
};

tampilinSemuaMenu();

$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    let kategori = $(this).html();
    $('h1').html(kategori);

    if (kategori == 'All Menu') {
        tampilinSemuaMenu();
        return
    }

    $.getJSON('data/pizza.json', function (data) {
        let menu = data.menu;
        let content = '';
        console.log(1);

        $.each(menu, function (i,data) {
            console.log(data.kategori,kategori)
            if (data.kategori == kategori.toLowerCase()) {
                content += '<div class="col-md-4"><div class="card mb-3"><img src="img/pizza/'+ data.gambar +'" class="card-img-top"><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p><h5 class="card-title">'+ data.harga +'</h5><a href="#" class="btn btn-primary mt-3">Pesan Sekarang</a></div></div></div>'
            }
        });

        $('#daftar-menu').html(content);
    });
});