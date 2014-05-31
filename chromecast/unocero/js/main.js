if (typeof String.prototype.startsWith != 'function') {
	String.prototype.startsWith = function (str) {
		return this.indexOf(str) == 0;
	}
}
if (typeof String.prototype.endsWith != 'function') {
	String.prototype.endsWith = function (str) {
		return this.indexOf(str, this.length - str.length) !== -1;
	}
}
if (typeof String.prototype.contains != 'function') {
	String.prototype.contains = function (str) {
		return this.indexOf(str) != -1;
	}
}
if (typeof String.prototype.equals != 'function') {
	String.prototype.equals = function (str) {
		return this == str;
	}
}

jQuery.timeago.settings.strings = {
	prefixAgo: "Hace",
	prefixFromNow: "Dentro de",
	suffixAgo: "",
	suffixFromNow: "",
	seconds: "menos de un minuto",
	minute: "un minuto",
	minutes: "%d minutos",
	hour: "una hora",
	hours: "%d horas",
	day: "un día",
	days: "%d días",
	month: "un mes",
	months: "%d meses",
	year: "un año",
	years: "%d años"
};

var unocero_posts = [];
(function($, unocero_posts) {
	var unocero_page = 1;

	function getDate(date_string) {
		var t = date_string.split(/[- :]/);
		var remote_date = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
		var milis = remote_date.getTime() - (remote_date.getTimezoneOffset()*60*1000);
		return $.timeago(new Date(milis));
	}

	$(document).on('ready', function() {

		$('section#list').height($(window).outerHeight() - 80);
		$('section#details').height($(window).outerHeight() - 110);
		$('section#details').width($(window).outerWidth() - 340);

		$.getJSON(
			'http://www.unocero.com/api/get_recent_posts/?count=10&page=' + unocero_page + '&include=id,title,title_plain,url,thumbnail,date,categories,author&callback=?',
			function(data) {
				for(i in data.posts) {
					var post = data.posts[i];
					unocero_posts[post.id] = post;
					delete unocero_posts[post.id].content;
					$('section#list').append('<a href="javascript:;" class="post" data-post-id="' + post.id + '"><div class="title">' + post.title_plain + '</div><div class="image" style="background-image: url(' + post.thumbnail + ');"></div><div class="date">' + getDate(post.date) + '</div></a>');
				}
				setSelectablePosts();
				$('section#list .post').first().focus();
			}
		);
	});
	function setSelectablePosts() {
		$('.post[data-post-id]').on('click', function() {
			//$(this).focus();
		});
		$('.post[data-post-id]').on('focus', function() {
			if(!$(this).hasClass('selected') && !showPost($(this).attr('data-post-id'))) {
				loadPost($(this).attr('data-post-id'));
			}
			if(!$(this).hasClass('selected')) {
				$('section#details').scrollTop(0);
				$('.post.selected').removeClass('selected');
				$(this).addClass('selected');
			}
			if($(this).is(':last-child')) {
				loadMorePosts();
			}
		});
	}
	function showPost(id) {
		if(unocero_posts[id].title_plain && unocero_posts[id].author && unocero_posts[id].author.name && unocero_posts[id].date && unocero_posts[id].content) {
			$('section#details').html('<div class="meta"><h1 class="title"></h1><div>Publicado por <span class="author"></span> <span class="date"></span></div></div><div class="content"></div>');
			$('section#details .title').text(unocero_posts[id].title_plain);
			$('section#details .author').text(unocero_posts[id].author.name);
			$('section#details .date').text(getDate(unocero_posts[id].date));
			$('section#details .content').html(unocero_posts[id].content);
			parseHTML();
			return true;
		} else {
			return false;
		}
	}
	function loadPost(id) {
		setLoadingPost();
		$.getJSON(
			'http://www.unocero.com/api/get_post/?id=' + id + '&include=id,title,title_plain,author,date,content&callback=?',
			function(data) {
				unocero_posts[id] = data.post;
				showPost($('.post.selected[data-post-id]').first().attr('data-post-id'));
			}
		);
	}
	function loadMorePosts() {
		$('section#list_loading_more').fadeIn(500);
		$.getJSON(
			'http://www.unocero.com/api/get_recent_posts/?count=10&page=' + (unocero_page + 1) + '&include=id,title,title_plain,url,thumbnail,date,categories,author&callback=?',
			function(data) {
				$('section#list_loading_more').fadeOut(500);
				if(data.posts) {
					unocero_page++;
				}
				for(i in data.posts) {
					var post = data.posts[i];
					unocero_posts[post.id] = post;
					delete unocero_posts[post.id].content;
					$('section#list').append('<a href="javascript:;" class="post" data-post-id="' + post.id + '"><div class="title">' + post.title_plain + '</div><div class="image" style="background-image: url(' + post.thumbnail + ');"></div><div class="date">' + getDate(post.date) + '</div></a>');
				}
				setSelectablePosts();
			}
		);
	}
	function parseHTML() {

		var doc = $('section#details');

		$('ul#sharebar,ul#sharebarx,p.audioplayer_container', doc).remove();
		$('img[width]', doc).each(function(index) {
			var image = $(this);
			if(image.width() >= 300) {
				image.removeAttr('width').removeAttr('height').addClass('grandes');
			}
			if(image.is('[usemap]') && image.attr('usemap') == '#Descarga') {
				$('map[name=Descarga] area[href]', doc).each(function(index) {
					if($(this).is('[href]') && $(this).attr('href').endsWith('.mp3')) {
						image.after("<div class=\"podcast\"><a href=\"" + $(this).attr('href') + "\">Reproducir Audio</a></div>");
						image.remove();
					}
				});
			}
		});
		$('div#token,div#tag,div.podcast', doc).each(function(index) {
			$(this).addClass('grandes');
			$(this).removeAttr('id');
			if($(this).html().endsWith('.mp3')) {
				$(this).html("<a href=\"http://media.unocero.com/audio/" + $(this).html() + "\">Reproducir Audio</a>");
			}
		});
		$('embed,iframe', doc).each(function(index) {
			if($(this).is('[src][flashvars]')) {
				$(this).attr("src", $(this).attr("src") + "?" + $(this).attr("flashvars"));
			}
			var html = getVideoHTML($(this).attr("src"));
			if($(this).prop("tagName").toLowerCase().equals("embed") && $(this).parent().prop("tagName").toLowerCase().equals("object") && html) {
				$(this).parent().after(html);
			} else if(html) {
				$(this).after(html);
			}
		});
		$('.video', doc).each(function(index) {
			var width = Math.round($('section#details').outerWidth() * 0.8);
			var height = Math.round(width / 1.6);
			$(this).width(width).height(height);
			if($(this).hasClass('youtube')) {
				// YouTube videos...
			}
		});
		$('object,param,embed:not(.video),iframe:not(.video)').remove();
		setupYouTubeVideos();
	}
	function setLoadingPost() {
		$('section#details').html('<div class="loading_indicator"></div>');
		var indicator = $('section#details .loading_indicator');
		var margin_vertical = $('section#details').outerHeight() - indicator.outerHeight();
		var margin_horizontal = $('section#details').outerWidth() - indicator.outerWidth();
		margin_vertical = margin_vertical / 2;
		margin_horizontal = margin_horizontal / 2;
		indicator.css('margin', margin_vertical + 'px ' + margin_horizontal + 'px');
	}
	function getVideoHTML(url) {
		if(!url) {
			return false;
		}
		var uri = new URI(url);
		var id = '', link = '', captura = '', html = '';
		if(uri.protocol() == 'http' || uri.protocol() == 'https') {
			if (uri.host() == 'youtu.be' && uri.segment(0)) {
				id = uri.segment(0);
				link = 'http://www.youtube.com/watch?v=' + uri.segment(0);
				captura = 'http://img.youtube.com/vi/' + uri.segment(0) + '/hqdefault.jpg';
				//html = '<a class="video youtube" href="' + link + '" style=\"background-image: url(\'app/img/video_play.png\'), url(\'' + captura + '\');\"></a>';
				//html = '<iframe class="video youtube" id="' + id + '" src="http://www.youtube.com/embed/' + id + '?enablejsapi=1&html5=0" frameborder="0" allowfullscreen></iframe>';
				//html = '<div class="video youtube" id="' + id + '"></div>';
				html = '<embed class="video youtube" id="' + id + '" src="https://www.youtube.com/v/' + id + '?version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always"></embed>';
			} else if (uri.host().endsWith('youtube.com') && uri.segment().length >= 1 && uri.segment(0).equals('watch') && uri.search(true).v){
				id = uri.search(true).v;
				if(uri.search(true).list) {
					link = 'http://www.youtube.com/watch?v=' + id + '&list=' + uri.search(true).list;
				} else {
					link = 'http://www.youtube.com/watch?v=' + id;
				}
				captura = 'http://img.youtube.com/vi/' + id + '/hqdefault.jpg';
				//html = '<a class="video youtube" href="' + link + '" style="background-image: url(\'app/img/video_play.png\'), url(\'' + captura + '\');\"></a>';
				//html = '<iframe class="video youtube" id="' + id + '" src="http://www.youtube.com/embed/' + id + '?enablejsapi=1&html5=0" frameborder="0" allowfullscreen></iframe>';
				//html = '<div class="video youtube" id="' + id + '"></div>';
				html = '<embed class="video youtube" id="' + id + '" src="https://www.youtube.com/v/' + id + '?version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always"></embed>';
			} else if ((uri.host().endsWith('youtube.com') || uri.host().endsWith('youtube-nocookie.com') || uri.host().endsWith('youtube.googleapis.com')) && uri.segment().length >= 2 && (uri.segment(0).equals('embed') || uri.segment(0).equals('v'))){
				id = uri.segment(1);
				if(uri.segment(0).equals("embed") && uri.search(true).list) {
					link = 'http://www.youtube.com/playlist?list=' + uri.search(true).list;
					captura = '';
					//html = '<a class="video youtube" href="' + link + '"></a>';
					//html = '<iframe class="video youtube" id="' + id + '" src="http://www.youtube.com/embed/' + id + '?enablejsapi=1&html5=0" frameborder="0" allowfullscreen></iframe>';
					//html = '<div class="video youtube" id="' + id + '"></div>';
					html = '<embed class="video youtube" id="' + id + '" src="https://www.youtube.com/v/' + id + '?version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always"></embed>';
				} else {
					link = 'http://www.youtube.com/watch?v=' + id;
					captura = 'http://img.youtube.com/vi/' + id + '/hqdefault.jpg';
					//html = '<a class="video youtube" href="' + link + '" style="background-image: url(\'app/img/video_play.png\'), url(\'' + captura + '\');"></a>';
					//html = '<iframe class="video youtube" id="' + id + '" src="http://www.youtube.com/embed/' + id + '?enablejsapi=1&html5=0" frameborder="0" allowfullscreen></iframe>';
					//html = '<div class="video youtube" id="' + id + '"></div>';
					html = '<embed class="video youtube" id="' + id + '" src="https://www.youtube.com/v/' + id + '?version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always"></embed>';
				}
			} else {
				id = '';
				link = url;
				captura = '';
				//html = '<a class="video" href="' + link + '"></a>';
				html = '<iframe class="video" src="' + link + '" frameborder="0" allowfullscreen></iframe>';
				//html = '<div class="video youtube" id="' + id + '"></div>';
			}
		}
		return html;
	}
	function setupYouTubeVideos() {
/*
		$('section#details .video.youtube[data-youtube-id]').each(function(index) {
			var video_id = $(this).attr('data-youtube-id');
			var width = $(this).width();
			var height = $(this).height();
			swfobject.embedSWF(
				'http://www.youtube.com/v/' + video_id + '?enablejsapi=1&playerapiid=' + video_id + '&version=3',
				video_id,
				width,
				height,
				'8',
				null,
				null,
				{
					allowScriptAccess: "always"
				},
				{
					id: video_id
				});
		});
*/
	}
	function playYouTubeVideo(id) {
		alert('playYouTubeVideo(' + id + ')');

		var video = $('#' + id + '.video.youtube[src]');
		if(video.attr('src').contains('?')) {
			video.attr('src', video.attr('src') + '&autoplay=1');
		}
		$('section#details').html($('section#details').html());

		//window.open('http://www.w3schools.com', 'mywindow', 'width=900,height=540');
		//window.location('http://www.unocero.com');
		//alert(document.getElementById(id).outerHTML);
		//document.getElementById(id).playVideo();//playYouTubeVideo('rEY_gIJYMvE');
	}
}(jQuery, unocero_posts));
function setupYouTubeVideos() {
/*
	$('section#details .video.youtube[data-youtube-id]').each(function(index) {
		var video_id = $(this).attr('data-youtube-id');
		var width = $(this).width();
		var height = $(this).height();
		swfobject.embedSWF(
			'http://www.youtube.com/v/' + video_id + '?enablejsapi=1&playerapiid=' + video_id + '&version=3',
			video_id,
			width,
			height,
			'8',
			null,
			null,
			{
				allowScriptAccess: "always"
			},
			{
				id: video_id
			});
	});
*/
}