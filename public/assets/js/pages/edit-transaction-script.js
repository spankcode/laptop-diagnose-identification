$(document).ready(function() {
    $('.js-example-placeholder-single').select2({
        theme: 'bootstrap-5',
        placeholder: "Pilih menu",
        allowClear: true
    })

    let notes = document.querySelector('#notes');
    notes.value = notes.value.replace(/<br\s*\/?>/g, '\n');
});

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

    foodCount++;

    $('.js-example-placeholder-single').select2({
        theme: 'bootstrap-5',
        placeholder: "Pilih menu",
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
}

// $(document).on('click', '.btn-submit', function(e) {
//     e.preventDefault();
//     const totalFoodFields = foodWrapper.querySelectorAll('.detail-food').length;
//     const totalDrinkFields = drinkWrapper.querySelectorAll('.detail-drink').length;
//     if (totalFoodFields <= 1 && totalDrinkFields <= 1) {
//         const foodItem = foodWrapper.querySelector('.js-example-placeholder-single').value;
//         const drinkItem = drinkWrapper.querySelector('.js-example-placeholder-single').value;
//         // console.log(foodItem);
//         // console.log(drinkItem);
//         if (foodItem === '' && drinkItem === '') {
//             Swal({
//                 title: 'Failed',
//                 text: 'Minimal 1 item untuk melakukan transaksi',
//                 type: 'error'
//             });
//             return false;
//         }
//     }
//     const orderer = document.querySelector('input[name="ordered_by"]');
//     if (orderer.value == '') {
//         orderer.classList.add('is-invalid');
//         return false;
//     }
//     // console.log(e);
//     // e.submit()
//     $('#orderForm').submit();
// })

$(document).on('click', '.btn-cancel-food', function(e) {
    let parentId = $(this).attr('id').replace('btn-cancel', 'ordered');
    // console.log(parentId);
    let index = parentId.replace('ordered-food-', '');
    // console.log(index);
    let wrapper = document.querySelector(`.${parentId}`);
    wrapper.classList.toggle('order-canceled');
    let item = wrapper.querySelector(`input[name="ordered_food[${index - 1}][is_canceled]"]`);
    if (item.value == 1) {
        item.value = 0;
    } else {
        item.value = 1;
    }
});

$(document).on('click', '.btn-cancel-drink', function(e) {
    let parentId = $(this).attr('id').replace('btn-cancel', 'ordered');
    let index = parentId.replace('ordered-drink-', '');
    let wrapper = document.querySelector(`.${parentId}`);
    wrapper.classList.toggle('order-canceled');
    let item = wrapper.querySelector(`input[name="ordered_drink[${index - 1}][is_canceled]"]`);
    if (item.value == 1) {
        item.value = 0;
    } else {
        item.value = 1;
    }
});