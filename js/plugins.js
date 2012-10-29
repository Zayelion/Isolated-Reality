jQuery('body').animate({
	opacity: "1"
}, 1000);
var iniframe = (top.location != self.location);
if(typeof (jQuery) != 'undefined') {
	jQuery(document).ready(function () {
		if(ready = true) {
			isolatedreality();
			prettyPrint();
			
		}
	});
} else {
	if(ready = false) {
		isolatedreality();
		prettyPrint();
	}
}
jQuery(".gallery-icon img")
		.each(function(){
			var xxx = jQuery(this).attr('src')
			jQuery(this).parent('a').attr({href: xxx}).attr({rel: 'lightbox-gallery'});
	});
function isolatedreality() {
	var $mainContent = jQuery("#container"),
		url = '';
	if(iniframe == false) {
		var siteUrl = "http://" + top.location.host;
	} 
	if(iniframe == true) {
		var siteUrl = "http://";
	}
	var $internal = jQuery("a[href^='" + siteUrl + "'], a[href^='/'], a[href^='./'], a[href^='../'], a[href^='#']");
	$internal.addClass('internal');
	jQuery('a').not('.internal').attr({
		target: '_blank'
	});
	jQuery(window).on("click", ".internal:not([href*='wp-admin']):not([href*=404]):not([href*='wp-login.php']):not([href$=feed]):not([href*=#home])", function () {
		if(iniframe = true) {
			location.hash = this.pathname;
		}
		return false;
	});
	// jQuery("#searchform").submit(function (e) {
	//	location = top.location.host.hash + '?s=' + jQuery("#s").val();
	//	e.preventDefault();
	//});
	jQuery(window).bind('hashchange', function () {
		url = window.location.hash.substring(1);
		if(!url) {
			return;
		}
		if(url == "home") {
			return true;
		}
		url = url + " #content";
		console.log(url);
		$mainContent.animate({
			opacity: "0"
		}, 350).load(url, function (response, status, xhr) {
			$mainContent.animate({
				opacity: "1"
			}, 200);
			jQuery('html,body').animate({
				scrollTop: jQuery("#navigationpadding").offset().top
			}, 0);
		});
		jQuery('#content').livequery(function () {
			prettyPrint();
			var $internal = jQuery("a[href^='" + siteUrl + "'], a[href^='/'], a[href^='./'], a[href^='../'], a[href^='#']");
			$internal.addClass('internal');
			jQuery('a').not('.internal').attr({
				target: '_blank'
			});

					
			jQuery(".gallery-icon img")
				.attr({rel: 'lightbox'})
				.each(function(){
					var xxx = jQuery(this).attr('src')
					jQuery(this).parent('a').attr({href: xxx}).attr({rel: 'lightbox-gallery'});
				});
			
			jQuery("a[rel^='lightbox']").slimbox({
				loop: 1,
				closeKeys: [27, 70],
				nextKeys: [39, 83]
			}, null, function (el) {
				return(this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
			}), function () {
				//remove slimbox? this is called when elements no longer match
			}
		});
	});
	jQuery(window).trigger('hashchange');
	var ready = true;
}