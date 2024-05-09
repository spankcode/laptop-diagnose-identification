$(document).ready(function() {
    $('.js-example-placeholder-single').select2({
        theme: 'bootstrap-5',
        placeholder: "Pilih menu",
        dropdownParent: $('#orderModal'),
        allowClear: true
    })
});

// $(document).on('click', '.btn-add', function(e) {
//     e.preventDefault();
//     $('#modalForm').attr('action', '/order');
//     $('.modal-title').text('Tambah Pesanan');

//     const tableField = $('[name="table_no"]');
//     tableField.val('');
// });

$(document).on('click', '.btn-payment', function(e) {
    e.preventDefault();
    let data = JSON.parse($(this).attr('data'));
    $('#paymentModalForm').attr('action', '/order/' + data.transactionUUID + '/is-completed-update');
    $('#pemesan').val(data.orderedBy);
    $('#no_meja').val(data.tableNo);
    $('#label-pesanan').text(`Pesanan : ${data.totalItems} Item`);
    $('#total_amount').val(numeral(data.totalAmount).format("0,0"));
    let items = data.items;
    let item = ''
    items.forEach(data => {
        // console.log(data.is_canceled);
        if (data.is_canceled == 1) {
            item += `<li><del class="text-danger">${data.item_name} - ${data.qty}</del</li>`;
        } else {
            item += `<li>${data.item_name} - ${data.qty} @ IDR ${data.item_price.toLocaleString('en-US')}</li>`;
        }
    });

    $('#pesanan').html(item);

    const paymentField = $('[name="total_payment"]').val('');
    $('#return').text('');
    setTimeout(function() { 
        paymentField.focus(); 
    }, 400);
});

$(document).on("keyup", '[name="total_payment"]', function (e) {
    e.preventDefault();
    let value = $(this).val();
    $(this).val(numeral(value).format("0,0"));

    let amount = parseInt($('#total_amount').val().split(',').join(''));
    let payment = parseInt($(this).val().split(',').join(''));
    let returnValue = payment - amount;
    if (payment < amount) {
        $('#return').text('Masukkan angka diatas Total Belanja');
        $('.btn-submit-payment').prop('disabled', true);
    } else {
        $('#return').text('Kembalian: IDR ' + numeral(returnValue).format("0,0"));
        $('.btn-submit-payment').prop('disabled', false);
    }
    
    checkNan();
});

const checkNan = () => {
    let payment = $('[name="total_payment"]').val();
    if (payment === 'NaN') {
        $('.btn-submit-payment').prop('disabled', true);
    }
}

// $(document).on('click', '.btn-edit', function(e) {
//     e.preventDefault();
//     $('#modalForm').prepend('@method("put")');
//     $('.modal-title').text('Ubah Data Meja');
//     let data = JSON.parse($(this).attr('data'));

//     $('#modalForm').attr('action', '/master-data/transactions/' + data.uuid);
//     const tableField = $('[name="table_no"]');
//     tableField.val(data.tableNo);

//     $('#orderModal').modal('show');
// });

// $(document).on('click', '.btn-cancel', function(e) {
//     e.preventDefault();
//     $('input[name="_method"]').remove();
// });

let foodCount = 1;
const foodWrapper = document.querySelector('.food-container');

$(document).on('click', '.btn-add-food', function() {
    let totalFoodFields = foodWrapper.querySelectorAll('.detail-food').length;
    foodWrapper.querySelectorAll('.btn-add-food').forEach(button => {
        button.classList.add('d-none');
    });
    foodWrapper.querySelectorAll('.btn-remove-food').forEach(button => {
        button.classList.remove('d-none');
    });
    $(foodWrapper).append(addFoodField(foodCount));
    let lastFoodField = foodWrapper.querySelector('.detail-food:last-child');
    lastFoodField.querySelector('.btn-add-food').classList.remove('d-none');

    // const currentMenu = document.getElementById(`transaction_details[${foodCount}][menu_id]`);
    // console.log(currentMenu);
    // currentMenu.focus();

    foodCount++;

    $('.js-example-placeholder-single').select2({
        theme: 'bootstrap-5',
        placeholder: "Pilih menu",
        dropdownParent: $('#orderModal'),
        allowClear: true
    });
});

$(foodWrapper).on('click', '.btn-remove-food', function(e) {
    // if (totalDrinkFields <= 1) {
    //     Swal({
    //         title: 'Minimum Limit',
    //         text: 'Minimal 1 item untuk melakukan transaksi',
    //         type: 'warning'
    //     })
    //     return false;
    // }
    let parent = $(this).attr('id').replace('btn-remove-food', 'food');
    removeFoodField(parent);
    let totalFoodFields = foodWrapper.querySelectorAll('.detail-food').length;
    let lastFoodField = foodWrapper.querySelector('.detail-food:last-child');
    // console.log(totalFoodFields);
    lastFoodField.querySelector('.btn-add-food').classList.remove('d-none');
    if (totalFoodFields === 1) {
        lastFoodField.querySelector('.btn-remove-food').classList.add('d-none');
        lastFoodField.querySelector('.btn-add-food').classList.remove('mt-2');
    }
    // let lastField = foodWrapper.querySelector('.detail-item:last-child');
    // lastField.querySelector('.btn-add').style.display = 'inline-block';
});

const removeFoodField = (element) => {
    $(`.${element}`).remove();
}

let drinkCount = 1;
const drinkWrapper = document.querySelector('.drink-container');

$(document).on('click', '.btn-add-drink', function() {
    let totalDrinkFields = drinkWrapper.querySelectorAll('.detail-drink').length;
    drinkWrapper.querySelectorAll('.btn-add-drink').forEach(button => {
        button.classList.add('d-none');
    });
    drinkWrapper.querySelectorAll('.btn-remove-drink').forEach(button => {
        button.classList.remove('d-none');
    });
    $(drinkWrapper).append(addDrinkField(drinkCount));
    let lastDrinkField = drinkWrapper.querySelector('.detail-drink:last-child');
    lastDrinkField.querySelector('.btn-add-drink').classList.remove('d-none');

    // const currentMenu = document.getElementById(`transaction_details[${drinkCount}][menu_id]`);
    // console.log(currentMenu);
    // currentMenu.focus();

    drinkCount++;

    $('.js-example-placeholder-single').select2({
        theme: 'bootstrap-5',
        placeholder: "Pilih menu",
        dropdownParent: $('#orderModal'),
        allowClear: true
    });
});

$(drinkWrapper).on('click', '.btn-remove-drink', function(e) {
    let parent = $(this).attr('id').replace('btn-remove-drink', 'drink');
    removeDrinkField(parent);
    let totalDrinkFields = drinkWrapper.querySelectorAll('.detail-drink').length;
    let lastDrinkField = drinkWrapper.querySelector('.detail-drink:last-child');
    lastDrinkField.querySelector('.btn-add-drink').classList.remove('d-none');
    if (totalDrinkFields === 1) {
        lastDrinkField.querySelector('.btn-remove-drink').classList.add('d-none');
        lastDrinkField.querySelector('.btn-add-drink').classList.remove('mt-2');
    }
});

const removeDrinkField = (element) => {
    $(`.${element}`).remove();
};