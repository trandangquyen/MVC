$(document).ready(function() {
	var win = $(window);
	var loadmore = false;
	var query = null;
	var match = window.location.pathname.match(/theloai\/(\d+)/);
	if(match) {
		loadmore = true;
		query = 'category='+match[1];
	}
	win.scroll(function() {
		// End of the document reached?
		if ($(document).height() - win.height() == win.scrollTop()) {
			
			var num_post = $('div[id^="p-"]').length;
			if(query) query += '&start='+num_post;
			else query = 'start='+num_post;

			console.log(num_post);
			if(loadmore===true) {
				loadmore = false;
				$('#loading').show();
				$.ajax({
					url: 'ajax?'+query,
					dataType: 'html',
					success: function(html) {
						if(html && html.length > 10) {
							loadmore = true;
							console.log('Have data');
							$('.conten_product').append(html);
							$('#loading').hide();
						} else {
							console.log('No more data');
							loadmore = false;
							$('#loading').html('Đã hết sản phẩm');
						}
					}
				});
			} else {
				//$('#loading').hide();
			}
		}
	});
});