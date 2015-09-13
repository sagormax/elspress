
$(document).ready(function(){



	// === Sidebar navigation === //

	$('.submenu > a').click(function(e)
	{
		e.preventDefault();
		var submenu = $(this).siblings('ul');
		var li = $(this).parents('li');
		var submenus = $('#sidebar li.submenu ul');
		var submenus_parents = $('#sidebar li.submenu');
		if(li.hasClass('open'))
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				submenu.slideUp();
			} else {
				submenu.fadeOut(250);
			}
			li.removeClass('open');
		} else
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				submenus.slideUp();
				submenu.slideDown();
			} else {
				submenus.fadeOut(250);
				submenu.fadeIn(250);
			}
			submenus_parents.removeClass('open');
			li.addClass('open');
		}
	});

	var ul = $('#sidebar > ul');

	$('#sidebar > a').click(function(e)
	{
		e.preventDefault();
		var sidebar = $('#sidebar');
		if(sidebar.hasClass('open'))
		{
			sidebar.removeClass('open');
			ul.slideUp(250);
		} else
		{
			sidebar.addClass('open');
			ul.slideDown(250);
		}
	});

	// === Resize window related === //
	$(window).resize(function()
	{
		if($(window).width() > 479)
		{
			ul.css({'display':'block'});
			$('#content-header .btn-group').css({width:'auto'});
		}
		if($(window).width() < 479)
		{
			ul.css({'display':'none'});
			fix_position();
		}
		if($(window).width() > 768)
		{
			$('#user-nav > ul').css({width:'auto',margin:'0'});
            $('#content-header .btn-group').css({width:'auto'});
		}
	});

	if($(window).width() < 468)
	{
		ul.css({'display':'none'});
		fix_position();
	}

	if($(window).width() > 479)
	{
	   $('#content-header .btn-group').css({width:'auto'});
		ul.css({'display':'block'});
	}

	// === Tooltips === //
	$('.tip').tooltip();
	$('.tip-left').tooltip({ placement: 'left' });
	$('.tip-right').tooltip({ placement: 'right' });
	$('.tip-top').tooltip({ placement: 'top' });
	$('.tip-bottom').tooltip({ placement: 'bottom' });

	// === Search input typeahead === //
	$('#search input[type=text]').typeahead({
		source: ['Dashboard','Form elements','Common Elements','Validation','Wizard','Buttons','Icons','Interface elements','Support','Calendar','Gallery','Reports','Charts','Graphs','Widgets'],
		items: 4
	});

	// === Fixes the position of buttons group in content header and top user navigation === //
	function fix_position()
	{
		var uwidth = $('#user-nav > ul').width();
		$('#user-nav > ul').css({width:uwidth,'margin-left':'-' + uwidth / 2 + 'px'});

        var cwidth = $('#content-header .btn-group').width();
        $('#content-header .btn-group').css({width:cwidth,'margin-left':'-' + uwidth / 2 + 'px'});
	}

	// === Style switcher === //
	$('#style-switcher i').click(function()
	{
		if($(this).hasClass('open'))
		{
			$(this).parent().animate({marginRight:'-=190'});
			$(this).removeClass('open');
		} else
		{
			$(this).parent().animate({marginRight:'+=190'});
			$(this).addClass('open');
		}
		$(this).toggleClass('icon-arrow-left');
		$(this).toggleClass('icon-arrow-right');
	});

	$('#style-switcher a').click(function()
	{
		var style = $(this).attr('href').replace('#','');
		$('.skin-color').attr('href','css/maruti.'+style+'.css');
		$(this).siblings('a').css({'border-color':'transparent'});
		$(this).css({'border-color':'#aaaaaa'});
	});

	$('.lightbox_trigger').click(function(e) {

		e.preventDefault();

		var image_href = $(this).attr("href");

		if ($('#lightbox').length > 0) {

			$('#imgbox').html('<img src="' + image_href + '" /><p><i class="icon-remove icon-white"></i></p>');

			$('#lightbox').slideDown(500);
		}

		else {
			var lightbox =
			'<div id="lightbox" style="display:none;">' +
				'<div id="imgbox"><img src="' + image_href +'" />' +
					'<p><i class="icon-remove icon-white"></i></p>' +
				'</div>' +
			'</div>';

			$('body').append(lightbox);
			$('#lightbox').slideDown(500);
		}

	});


	$('#lightbox').live('click', function() {
		$('#lightbox').hide(200);
		permalinkChecking();
	});

	// post title to permalink check
	$('#title').focusout(function(){
		var title = $(this).val().trim().replace(/\s+/g, '-');
		$('#permalink').val(title);
		var selector = '#permalink';
		permalinkChecking(selector);
	});

	$('#permalink').focusout(function(){
		var permalink = $(this).val().trim().replace(/\s+/g, '-');
		$('#permalink').val(permalink);
		var selector = '#permalink';
		permalinkChecking(selector);
	});

	// Tag
	$('#tagName').focusout(function(){
		var title = $(this).val().trim().replace(/\s+/g, '-');
		$('#TagPermalink').val(title);
		var selector = '#TagPermalink';
		permalinkChecking(selector);
	});

	function permalinkChecking(selector){
		var permalinkCkh = $(selector).val().trim().replace(/\s+/g, '-');
		var url = $(selector).attr('url');
		var ID  = $(selector).attr('postID');

        $.ajax({
          mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
          url: url,
          data: {'permalink' : permalinkCkh, 'id' : ID},
          type: 'POST',
          success: function(data) {
            if( data == -1 )
            {
            	$(selector).val(permalinkCkh+"1");
            }

          },
          error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
          },
          dataType: "html",
          async: false
        });


	};
	// End

});

$(window).load(function(){

	// List inside list
	var pgurl = window.location.href.substr(window.location.href);
	$('#sidebar ul li.submenu ul li a').each(function(){
		if( $(this).attr("href") == pgurl ){
			$(this).parent().parent().show();
			$(this).addClass('activeItem');
			$(this).parent().parent().parent().addClass('active');
		}

	});

	// Single List
	$('#sidebar > ul > li > a').each(function(){
		if( $(this).attr("href") == pgurl ){
			$(this).parent().addClass('active');
		}

	});

});
