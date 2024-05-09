const flashData = $('.flash-data').data('flash');
const flashDataFailed = $('.flash-data-failed').data('flash');

$('#data-table').DataTable({
    autoWidth: false,
    initComplete: function() {
        $(this.api().table().container()).find('input').attr('autocomplete', 'off');
    },
});

if (flashData) {
    Swal({
        title: 'Success',
        text: flashData,
        type: 'success'
    })
} else if (flashDataFailed) {
    Swal({
        title: 'Failed',
        text: flashDataFailed,
        type: 'error'
    })
}

$(document).on('click', '.btn-delete', function (event) {
    event.preventDefault();
    let form = $(this).closest("form");
    Swal({
        title: "Delete Data",
        text: "Apakah yakin ingin menghapus data ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#ff3e1d',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            form.submit();
        }
    });
});

$(document).on("click", ".btn-logout", function (e) {
    e.preventDefault();
    let form = $("#logoutForm");
    Swal({
        title: "Logout",
        text: "Keluar dari aplikasi?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#ff3e1d',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Keluar',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            form.submit();
        }
    });
});