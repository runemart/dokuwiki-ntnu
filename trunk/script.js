/* DOKUWIKI:include_once js/jquery142.min.js */
jQuery.noConflict();

function deObfuscateEmail(a){
	var addr = a.href;
	var addrOld = addr;
	if(addr.indexOf('mailto:') != -1){
		while(addr.indexOf('%5Bat%5D') != -1 || addr.indexOf('[at]') != -1)
			addr = addr.replace(/( |\%20)(\%5B|\[)at(\%5D|\])( |\%20)/,"@");
		while(addr.indexOf('(at)') != -1)
			addr = addr.replace(/\ *\(at\)\ */,"@");
		while(addr.indexOf('%5Bdot%5D') != -1 || addr.indexOf('[dot]') != -1)
			addr = addr.replace(/( |\%20)(\%5B|\[)dot(\%5D|\])( |\%20)/,".");
		while(addr.indexOf('%5Bdash%5D') != -1 || addr.indexOf('[dash]') != -1)
			addr = addr.replace(/( |\%20)(\%5B|\[)dash(\%5D|\])( |\%20)/,"-");
		a.href = addr;
		a.title = addr.substr(7);
		if(a.innerHTML.indexOf('[at]') != -1 || a.innerHTML.indexOf('%5Bat%5D') != -1)
			a.innerHTML = addr.substr(7);
	}
}

function deObfuscateEmails(){
	var links = jQuery("a");
	for(var i=0; i<links.length; i++)
		deObfuscateEmail(links[i]); 
}

function prepareSearchField(){
	jQuery('#query').css('color', '#888');
	var $searchTextDefault = jQuery('#query').attr('value');
	jQuery('#query').focusin(function(){
		jQuery(this).css('color', '#000');
		if(jQuery(this).attr('value') == $searchTextDefault){
			jQuery(this).attr('value', '');
		}
	});
	jQuery('#query').focusout(function(){
		if(jQuery(this).attr('value') == ''){
			jQuery(this).css('color', '#888');
			jQuery(this).attr('value', $searchTextDefault);
		}
	});
}



