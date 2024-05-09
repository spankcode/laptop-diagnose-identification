$(document).on('click', '.btn-add', function(e) {
    e.preventDefault();
    $('#modalForm').attr('action', '/master-data/tables');
    $('.modal-title').text('Tambah Data Meja');

    const tableField = $('[name="table_no"]');
    tableField.val('');
    setTimeout(function() { 
        tableField.focus(); 
    }, 400);
});

$(document).on('click', '.btn-cancel', function(e) {
    e.preventDefault();
    $('input[name="_method"]').remove();
})