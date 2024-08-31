// public/js/search.js

$(document).ready(function(){
    $('form').on('submit', function(e){
        e.preventDefault();
        var query = $('input[type="text"]').val();

        $.ajax({
            url: $(this).attr('action'),
            type: "GET",
            data: {'query': query},
            success: function(response){
                var tbody = $('tbody');
                tbody.empty();
                
                $.each(response, function(index, item){
                    var row = '<tr>' +
                        '<th scope="row">' + (index + 1) + '</th>' +
                        '<td>' + item.nama_alat + '</td>' +
                        '<td>' + item.spesifikasi + '</td>' +
                        '<td>' + item.jumlah + '</td>' +
                        '<td>' + item.kondisi_alat + '</td>' +
                        '<td></td>' +
                        '</tr>';
                    tbody.append(row);
                });
            }
        });
    });
});
