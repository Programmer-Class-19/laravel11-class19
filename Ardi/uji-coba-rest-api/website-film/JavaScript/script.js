function searchMovie() {
    $('#movie-list').html('');
    
    $.ajax({
        url: 'http://www.omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey' : '2a13e1b0',
            's' : $('#search-input').val()
        },
        success: function (result) {
            console.log(result);
            
            if (result.Response == "True") {
                let movies = result.Search;
                
                $.each(movies, function(i,data){
                    $('#movie-list').append(`
                        <div class="col-md-4>
                            <div class="card mb-3">
                                <img src="`+ data.Poster +`" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">`+ data.Title +`</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">`+ data.Year +`</h6>
                                    <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#exampleModal">See Details</a>
                                </div>
                            </div>
                        </div>
                    `);
                });

                $('#search-input').val('');

            } else {
                $('#movie-list').html(`
                    <div class="col">
                        <h1 class="text-center">` + result.Error + `</h1>
                    </div>
                `)
            }
        }
    });
}

$('#search-button').on('click', function () {
    searchMovie();
});

$('search-input').on('keyup', function (event) {
    if (event.keyCode === 13) {
        searchMovie();
    }
})