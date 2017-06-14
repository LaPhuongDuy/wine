$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.link-compare').on('click', function (e) {
    $.get('/compare/' + $(e.currentTarget).data('productid'), function (data) {
        if(data.status == 1) {
            swal({
                title: data.mess,
                timer: 2000,
                showConfirmButton: true,
            });
            $('.compare_product').append(data.view);
        } else if(data.status == 2) {
            swal({
                title: data.mess,
                timer: 2000,
                showConfirmButton: true,
            });
            $('.button-compare').prop( "disabled", false );
            $('.compare_product').append(data.view);
        } else {
            swal({
                title: data.mess,
                timer: 2000,
                showConfirmButton: true,
            });
        }
    });
});
$('.clear_compare').on('click', function (e) {
    var form = $(this).closest('.destroy_compare');
    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                $.post(form.attr('action'), function(data){
                    $('.compare-item1').remove();
                    $('.compare-item2').remove();
                    $('.button-compare').prop( "disabled", true );
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
});

