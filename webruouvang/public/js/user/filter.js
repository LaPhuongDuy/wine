
function filter(id) {
	var price_low = $('#' + id).attr("data-price-low");
    var price_high = $('#' + id).attr("data-price-high");
    var data_category = $('#' + id).attr("data-category");
    // console.log(data_category);
    	// $('.add-wishlist').removeClass('wishlist');
    $('.price').removeClass('filter_price');
    $('#' + id).addClass("filter_price");
    var host = window.location.origin;
	$.ajax({
		type: 'POST',
		url: host + '/filter',
		dateType: "jsonp", 
		data: { 
			'price_low' : price_low,
			'price_high' : price_high,
			'data_category' : data_category,
			'id' : id,
		},
		success: function(result) {
			// console.log(result);
			$('.category-products').html(result);		
			
		}
	});
}