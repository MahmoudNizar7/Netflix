$(document).ready(function () {

    let favCount = $('#nav__fav-count').data('fav-count');

    // for icon
    $(document).on('click', '.movie__fav-icon', function () {

        let url = $(this).data('url');
        let movie_id = $(this).data('movie-id');
        let isFavored = $(this).hasClass('fw-900');

        toggleFavorite(url, movie_id, isFavored);

    });

    // for btn
    $(document).on('click', '.movie__fav-btn', function (e) {

        e.preventDefault();

        let url = $(this).find('.movie__fav-icon').data('url');
        let movie_id = $(this).find('.movie__fav-icon').data('movie-id');
        let isFavored = $(this).find('.movie__fav-icon').hasClass('fw-900');

        toggleFavorite(url, movie_id, isFavored);

    });


    function toggleFavorite(url, movie_id, isFavored) {

        !isFavored ? favCount++ : favCount--;

        favCount > 9 ? $('#nav__fav-count').html('9+') : $('#nav__fav-count').html(favCount);

        $('.movie-' + movie_id).toggleClass('fw-900');

        if ($('.movie-' + movie_id).closest('.favorite').length) {

            $('.movie-' + movie_id).closest('.movie').remove();

        }

        $.ajax({
            url: url,
            method: 'POST',
        });

    }

});
