$(document).on('click', '.quick-view', function () {

    $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "block");
});

$(document).on('click', '.close', function () {
    $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "none");

    $('.not-loggedin-modal').css("display", "none");
    $('.alert-modal').css("display", "none");
    $('.alert-modal2').css("display", "none");
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let sku = document.getElementById('sku');
let available = document.getElementById('available');
let select = $("select#option_id");
let quantity = document.getElementById('quantity_wanted');
let max = "";
let optionId = "";

sku.textContent = select.find('option:first').data('color');
available.textContent = select.find('option:first').data('action');
max = select.find('option:first').data('qty');
optionId = select.find('option:first').data('option-id');

select.change(function () {
    sku.textContent = $(this).find(':selected').data('color');
    available.textContent = $(this).find(':selected').data('action');
    max = select.find(':selected').data('qty');
    optionId = select.find(':selected').data('option-id');
    quantity.value = "1";
});
$("input#quantity_wanted").change(function () {
    if (quantity.value > max) {
        alert('We have only ' + max + ' , ' + optionId + ' , you have exceeded the max quantity we have in stock');
        $(this).val(max);
    }
});


