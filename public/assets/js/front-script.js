const flashData = $('.flash-data').data('flash');
const flashDataFailed = $('.flash-data-failed').data('flash');

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