$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.btn-cart').on('click', function (e) {
    var form = $(this).closest('.addCart');

    $.post(form.attr('action'), form.serialize(), function (data) {
        var rowId = data.rowId;
        var row = $('#' + rowId);

        if(rowId.length == 0) {
            $('.mini-products-list').append(data.item);
            $('#cart-total').html(data.cartTotal);
            $('.subtotal').html(data.subTotal);
        } else {
            var prQuantity = row.find('.product_qty').html(data.qty);

            $('.subtotal').html(data.subTotal);
        }
    })
})
