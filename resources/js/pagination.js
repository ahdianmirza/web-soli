$(document).ready(function() {
    $(document).on('click', '#pagination a', function(event) {
        event.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            success: function(response) {
                $('#tableLab1 tbody').html(response.table);
                $('#pagination').html(response.pagination);
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Untuk debugging
            }
        });
    });
});
