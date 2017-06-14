$(".add-wishlist").click(function(event) {
    var product_id = $(this).attr("data-product-id");
    var user_id = $(this).attr("data-user-id");
    if($(this).hasClass( "wishlist" )) {
    	// $('.add-wishlist').removeClass('wishlist');
    	$(this).removeClass("wishlist").siblings().addClass("wishlist");
    	$.ajax({
			type: 'DELETE',
			url: $(this).attr("data-route-destroy"),
			dateType: "jsonp", 
			data: { 
				'product_id' : product_id,
			},
			success: function(result) {
				console.log(result);
				
				
			}
		});
    } else {
    	// $('.add-wishlist').addClass('wishlist');
    	$(this).addClass("wishlist").siblings().removeClass("wishlist");
    	$.ajax({
			type: 'POST',
			url: $(this).attr("data-route-store"),
			dateType: "jsonp", 
			data: { 
				'product_id' : product_id,
				'user_id' : user_id,
			},
			success: function(result) {
				console.log(result);
				
			}
		});
    }
});