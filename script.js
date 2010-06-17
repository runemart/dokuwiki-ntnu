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
	jQuery('#searchform').removeClass('focus');
	var $searchTextDefault = jQuery('#searchform #query').attr('value');
	jQuery('#searchform #query').focusin(function(){
		jQuery('#searchform').addClass('focus');
		if(jQuery(this).attr('value') == $searchTextDefault){
			jQuery(this).attr('value', '');
		}
	});
	jQuery('#searchform #query').focusout(function(){
		if(jQuery(this).attr('value') == ''){
			jQuery('#searchform').removeClass('focus');
			jQuery(this).attr('value', $searchTextDefault);
		}
	});
}



