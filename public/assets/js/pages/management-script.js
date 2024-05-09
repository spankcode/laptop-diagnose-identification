$('input[name="custom_date"]').daterangepicker();

$(document).ready(function() {
    let tf = $('[name="date"]').val();
    checkCustomDate(tf);
});

const checkCustomDate = (value) => {
    if (value == 'custom') {
        $('.custom-date').show();
    } else {
        $('.custom-date').hide();
    }
}

$(document).on('change', '[name="date"]', function(e) {
    e.preventDefault();
    let currentTf = $(this).val();
    checkCustomDate(currentTf);
});

$(document).on('click', '.btn-copy', function(e) {
    e.preventDefault();

    let tableContent = $('.table-bordered').clone();
    tableContent.find('td[colspan]').removeAttr('colspan');
    tableContent.find('.fw-bold').removeClass('fw-bold');
    tableContent.find('.text-center').removeClass('text-center');

    let rows = tableContent.find('tr').map(function() {
        let rowData = [];
        $(this).find('th').each(function() {
            rowData.push($(this).text());
        });
        $(this).find('td').each(function() {
            rowData.push($(this).text());
        });
        return rowData.join('\t');
    }).get().join('\n');

    let tempTextarea = document.createElement('textarea');
    tempTextarea.value = rows;
    document.body.appendChild(tempTextarea);
    tempTextarea.select();
    document.execCommand('copy');
    document.body.removeChild(tempTextarea);

    setTimeout(() => {
        $('.btn-copy').popover('hide');
    }, 500);
});

$(document).on('click', '.btn-print', function(e) {
    e.preventDefault();
    let table = document.querySelector('.table-responsive').innerHTML;
    let label = `<h4>Laporan Transaksi - Digital Waiter</h4>`;
    let originalContent = document.body.innerHTML;
    document.body.innerHTML = label + table;
    window.print();
    document.body.innerHTML = originalContent;
});

const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));