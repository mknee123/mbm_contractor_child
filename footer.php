<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package HI Bootstrap
 */
?>


<footer id="child-footer-wrapper" class="padding-top-bottom">

	<div class="container">
		<div class="width-75">
			<div class="row">
				<div class="col-sm-12 img-responsive center-block margin-bottom">
					<img alt="" class="image-logo-mbm margin-bottom" src="/wp-content/themes/contractor-child/images/MBM_Logo_white.svg">
				</div>
			</div>
			<div class="row" id="footer">
				<div class="col-sm-4">
						4999 Old Clairton Road<br />
						Pittsburgh, PA 15236<br />
						(p) 412.379.9000<br />
					  (f) 412.379.5030
				</div>

				<div class="col-sm-4">
					<div class="module footer_menu">
						<ul class="nav ">
							<li class="item-108 active"><a href="/" >Home</a></li>
							<li class="item-109"><a href="/our-work" >Our Work</a></li>
							<li class="item-110"><a href="/services-article" >Services</a></li>
							<li class="item-111"><a href="/about-mbm-article" >About MBM</a></li>
							<li class="item-112"><a href="/contact-mbm-contracting-article" >Contact Us</a></li>
						</ul>
					</div>
				</div>

				<div class="col-sm-4 hidden-xs">
							<div class="col-sm-4 hidden-xs text-center">
							<a href="https://www.facebook.com/mbmcontractinginc" title="Facebook Link" target="_blank"><img alt="facebook link" class="image-logo thin-inter-padding" src="/wp-content/themes/contractor-child/images/Icon_Facebook.svg" style="max-width:45px; margin-bottom: 5px;" ></a><br />
							<a href="https://twitter.com/mbm_contracting" title="Twitter Link" target="_blank"><img alt="Twitter link" class="image-logo thin-inter-padding" src="/wp-content/themes/contractor-child/images/Icon_Twitter.svg" style="max-width:45px; margin-bottom: 5px;" ></a><br />
							<a href="http://www.linkedin.com/company/mbm-contracting-inc-" title="LinkedIn Link" target="_blank"><img alt="linkedIn link" class="image-logo thin-inter-padding" src="/wp-content/themes/contractor-child/images/Icon_LinkedIn.svg" style="max-width:45px; margin-bottom: 5px;"></a>
				</div>
				</div>

			</div>

			<div class="row">
				<div class="col-sm-12 text-center medium-margin-top margin-bottom">
					<span class="text-upper font-larger">Affiliations</span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<img alt="" class="image-logo margin-bottom thin-inter-padding" src="/wp-content/themes/contractor-child/images/Affiliate_1.png" style="max-width:130px; width: 100%;">

					<img alt="" class="image-logo margin-bottom thin-inter-padding" src="/wp-content/themes/contractor-child/images/Affiliate_2.png" style="max-width:160px; width: 100%;">

					<img alt="" class="image-logo margin-bottom thin-inter-padding" src="/wp-content/themes/contractor-child/images/Affiliate_3.png" style="max-width:80px; width: 100%;">

					<img alt="" class="image-logo margin-bottom thin-inter-padding" src="/wp-content/themes/contractor-child/images/Affiliate_4.png" style="max-width:55px; width: 100%;">
				</div>
			</div>
		</div>
	</div>
</footer>

</div>
<?php wp_footer(); ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>

	$toolbarHeight = $('#sp-toolbar-wrapper').height();
	$headerHeight = $('#sp-header-wrapper').height();
	$height = $toolbarHeight + $headerHeight;

	var $scrollPosition;

	$(window).scroll(function(){
		$scrollPosition = $(window).scrollTop();

		if($scrollPosition > $height)
		{
			$('#sp-header-wrapper').css('position', 'fixed');
			$('#sp-header-wrapper').css('width', '100%');
			$('#sp-header-wrapper').css('background', '#FFF');
			$('#sp-header-wrapper').css('top', '0px');
			$('#sp-toolbar-wrapper').css('height', $height)

		}else if($scrollPosition <= $height)
		{
			$('#sp-header-wrapper').css('position', 'relative');
			$('#sp-toolbar-wrapper').css('height', $toolbarHeight);
		}
	});

	var url = document.location.toString();
	if(url.match('our-work') && url.match('#'))
	{
		//initialize variables
		var contentTab;
		var navTab;
		//take id from end of url
		contentTab = '#' + url.split('#')[1];
		//assign variable to change nav-tab
	    navTab = contentTab + '-tab';
	    //remove the current tab
	    $('.nav-tabs .active').removeClass('active');
	    $('.tab-content .active').removeClass('active');
	    //change content tab
	    $(contentTab).addClass('active');
	    //change nav tab
	    $(navTab).addClass('active');
		window.scrollTo(0, 0);
		//change functions if we're already on the page
	   	$('#menu-item-67 .sub-menu > .menu-item').click(
		function(){
			url = ($(this).find('a').attr('href'));
			tabChange(url);

		}); //end click function
	}
	else if(url.match('our-work'))
	{
		//change functions if we're already on the page
	   	$('#menu-item-67 .sub-menu > .menu-item').click(
		function(){
			url = ($(this).find('a').attr('href'));
			tabChange(url);

		}); //end click function
	}

	function tabChange(url){
		if (url.match('#'))
		{
		    contentTab = '#' + url.split('#')[1];
		    navTab = contentTab + '-tab';
		    $('.active').removeClass('active');
		    $(contentTab).addClass('active');
		    $(navTab).addClass('active');
		    window.scrollTo(0, 0);
		}//end if
	}

	$(window).resize(determineScreenSize());
	function determineScreenSize(){
		if ($(window).width() < 768)
		{
			$(".team .wrapper").hover(
				function(e, top){bioAnimationStart(e.currentTarget, -100, 150)},
				function(e){bioAnimationStop(e.currentTarget)}
			);
			$('.short_bio > p').css('display', 'none');
			$('.short_bio > a').css('text-align', 'center');
		}
		else if($(window).width() >= 768 && $(window).width < 992)
		{
			$(".team .wrapper").hover(
				function(e){bioAnimationStart(e.currentTarget, -170, 120)},
				function(e){bioAnimationStop(e.currentTarget)}
			);
		}
		else if($(window).width() >= 992)
		{
			$(".team .wrapper").hover(
				function(e){bioAnimationStart(e.currentTarget, -200, 175)},
				function(e){bioAnimationStop(e.currentTarget)}
			);
		}
	}

	function bioAnimationStart(e, top, bio){
		$(e).find('h2').stop().animate({top:top + "px"}, 'slow');
		$(e).find('h4').stop().animate({top:top + "px"}, 'slow');
		$(e).find('hr').stop().animate({top:top + "px"}, 'slow');
		$(e).find('.short_bio').stop().animate({top: bio + 'px'}, 'slow');
	}
	function bioAnimationStop(e){
		$(e).find('h2').stop().animate({top:'0px'}, 'slow');
		$(e).find('h4').stop().animate({top: '0px'}, 'slow');
		$(e).find('hr').stop().animate({top: '0px'}, 'slow');
		$(e).find('.short_bio').stop().animate({top: '0px'}, 'slow');
	}
</script>


</body>
</html>
