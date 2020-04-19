$(document).ready(function() {
    $('.search').keyup(function() {

        var search = $(this).val();

        var url = "http://localhost/TWITTER/CORE/AJAX/search.php";

        $.ajax({
            type: "post",
            url: url,
            data: { search },
            success: function(response) {
                $('.search-result').html(response);
            }
        });


    });
});