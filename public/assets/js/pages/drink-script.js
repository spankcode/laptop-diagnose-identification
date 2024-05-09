$(document).on('click', '.btn-add', function(e) {
    e.preventDefault();
    $('#modalForm').attr('action', '/master-data/drinks');
    $('.modal-title').text('Tambah Data Minuman');

    const nameField = $('[name="name"]');
    nameField.val('');
    $('[name="price"]').val('');
    $('[name="margin"]').val('');
    setTimeout(function() { 
        nameField.focus(); 
    }, 400);
});

$(document).on('click', '.btn-cancel', function(e) {
    e.preventDefault();
    $('input[name="_method"]').remove();
})