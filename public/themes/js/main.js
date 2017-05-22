
function format_curency(a) {
  	return a.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+' đ';
}

$(document).ready(function() {
	var win = $(window);
	var loadmore = false;

	win.scroll(function() {
		if ($(document).height() - win.height() == win.scrollTop()) {
			var query = null;
			var uri = 'ajaxProduct?';
			var matchsp = window.location.pathname.match(/theloai\/(\d+)/);
			var matchtt = window.location.pathname.match(/tintuc\/?$/);
			if(matchsp) {
				loadmore = true;
				query = 'category='+match[1];
				console.log('load sp');
			} else if(matchtt) {
				uri = 'ajaxNews?';
				loadmore = true;
				query = 'type=news';
				console.log('load tt');
			}
			if(matchsp) {
				var num_post = $('div[id^="p-"]').length;
			} else var num_post = $('#main_center .post').length;
			console.log('num post: '+num_post);
			if(query && query.length > 0) query += '&start='+num_post;
			else query = 'start='+num_post;

			if(loadmore===true) {
				loadmore = false;
				$('#loading').show();
				$.ajax({
					url: uri+query,
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
							$('#loading').html('Đã hết dữ liệu');
						}
					}
				});
			} else {
				//$('#loading').hide();
			}
		}
	});
});