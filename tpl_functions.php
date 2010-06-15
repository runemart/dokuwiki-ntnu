<?php
/**
 * Functions for NTNU template
 *
 * License: GPL 2 (http://www.gnu.org/licenses/gpl.html)
 *
 * @author:				 Michael Klier <chi@chimeric.de>
 * @homepage:		http://www.chimeric.de
 * @modified-by:	Xan <DXpublica@telefonica.net>
 * @author:				Rune M. Andersen <rune.andersen@ime.ntnu.no>
 */


/**
 * fetches the sidebar-pages and displays the sidebar
 *
 * @author Michael Klier <chi@chimeric.de>
 * @modified-by		Rune M. Andersen <rune.andersen@ime.ntnu.no>
 */
function tpl_sidebar($side='menu') {
	global $ID, $REV, $INFO,$lang;

	$svID	= $ID;
	$svREV = $REV;

	if ($side=='menu'){
		$main = tpl_getConf('global_menu_pagename');
		if(tpl_pagelang($ID) == 'en')
			$main = 'english:'.tpl_getConf('global_menu_pagename');

		$end = false;
		$local = $ID.':'.tpl_getConf('namespace_menu_pagename');
		while(!file_exists(wikiFN($local)) && !$end){
			$sp = strrpos($ID, ':');
			if($ID == ""){
				$end = true;
			} else {
				$ID = substr($ID, 0, $sp);
			}
			$local = $ID.':'.tpl_getConf('namespace_menu_pagename');
		}
	} else { // sidebar!
		$local = $ID.':'.tpl_getConf('page_sidebar_pagename');
		// searches upwards for a namespace sidebar
		$end = false;
		$main = $ID.':'.tpl_getConf('namespace_sidebar_pagename');
		while(!file_exists(wikiFN($main)) && !$end){
			$sp = strrpos($ID, ':');
			if($sp === FALSE){
				$main = tpl_getConf('namespace_sidebar_pagename');
				$end = true;
			} else {
				$ID = substr($ID, 0, $sp);
				$main = $ID.':'.tpl_getConf('namespace_sidebar_pagename');
			}
		}
	}

	// repair IDs starting with ':'
	if(substr($main, 0, 1) == ':') $main = substr($main, 1);
	if(substr($local, 0, 1) == ':') $local = substr($local, 1);

	if (file_exists(wikiFN($main))){
		print p_sidebar_xhtml($main, $svID);
	}

	if (file_exists(wikiFN($local))){
		print p_sidebar_xhtml($local, $svID);
	}

	$ID = $svID;
	$REV = $svREV;
}

/**
* Checks if the current page has a side bar
*
* @author Rune M. Andersen <rune.andersen@ime.ntnu.no>
*/
function tpl_hasSidebar(){
	global $ID;

	$svID	= $ID;
	$svREV = $REV;

	// Checks for main sidebar first
	$end = false;
	$main = $ID.':'.tpl_getConf('namespace_sidebar_pagename');
	while(!file_exists(wikiFN($main)) && !$end){
		$sp = strrpos($ID, ':');
		if($sp === FALSE){
			$main = tpl_getConf('namespace_sidebar_pagename');
			$end = true;
		} else {
			$ID = substr($ID, 0, $sp);
			$main = $ID.':'.tpl_getConf('namespace_sidebar_pagename');
		}
	}

	$ID	= $svID;
	$REV = $svREV;

	if(file_exists(wikiFN($ID.':'.tpl_getConf('page_sidebar_pagename'))))
		$sidebar = trim(implode('', file(wikiFN($ID.':'.tpl_getConf('page_sidebar_pagename')))));
	if(file_exists(wikiFN($main)))
		$mainsidebar = trim(implode('', file(wikiFN($main))));
	if(strlen($sidebar) || strlen($mainsidebar))
		return true;
	return false;
}

/**
 * removes the TOC of the sidebar-pages and shows a edit-button if user has enough rights
 *
 * @author Michael Klier <chi@chimeric.de>
 * @modified-by		Rune M. Andersen <rune.andersen@ime.ntnu.no>
 */
function p_sidebar_xhtml($Sb, $ID = NULL) {
	$data = p_wiki_xhtml($Sb,'',false);
	$data = explode("\n", $data);
	if(tpl_getConf('markcurrentmenuitem'))
		$data = tpl_markCurrent($data, $ID);
	$control = array();
	$control[] = tpl_parseMenu($data, 0, "", $control);
	array_pop($control); // Pops the last item (will always contain the whole menu)

	foreach($control as $k => $c){
		if(strpos($ID, $k) !== 0){
			// removes sub items from menu, unless configured not to
			if(!tpl_getConf('expandmenus')){
				list($start, $stop) = explode("-", $c);
				for($i=$start ; $i<=$stop ; $i++){
					$data[$i] = "";
				}
			}
		}
	}

	// Finishing the file
	$data = implode("\n", $data);
	if(auth_quickaclcheck($Sb) >= AUTH_EDIT) {
			$data .= '<div class="secedit">'.html_btn('secedit',$Sb,'',array('do'=>'edit','rev'=>'','post')).'</div><div class="clearer"></div>';
	}
	$data = preg_replace('/<div class="toc">.*?(<\/div>\n<\/div>)/s', '', $data);
	if(auth_quickaclcheck($Sb) >= AUTH_READ) {
		return $data;
	}
	return null;
}


/**
  *  Finds and marks the current item in the menu list.
  *
  * @author Rune M. Andersen <rune.andersen@ime.ntnu.no>
  * @return Menu list containing extra CSS showing current selected item.
  */
function tpl_markCurrent($data, $id){
	$ret = array();
	foreach($data as $line){
		$m = array();
		preg_match('/title="(.*?)"/', $line, $m);
		// if correct link, and not link to anchor on page
		if($m[1] == $id && !preg_match('/<a href="(.*?)#(.*?)"(.*?)>/', $line)){
			$line = preg_replace('/(<a href(.*?)>)(.*?)(<\/a>)/', '\1<em class="current">\3</em>\4', $line);
		}
		$ret[] = $line;
	}
	return $ret;
}


/**
  * Creates an control array containing meta information about how
  * the menu list is nested.
  *
  * @author Rune M. Andersen <rune.andersen@ime.ntnu.no>
  * @return Control array with start and end index describing where data array is nested.
  */
function tpl_parseMenu($data, $i, $prevtitle, &$ret){
	for($j = $i+1; $j<sizeof($data); $j++){
		if($data[$j] == "</ul>"){
			return $j;
		} else if($data[$j] == "<ul>"){
			$title = preg_replace('/(.*?title="(.*?)".*)|(.*?)/', "\\2", $data[$j-1]);
			$a = tpl_parseMenu($data, $j, $title, $ret);
			if($title != '')
				$ret[$title] = $j."-".$a;
			$j = $a;
		}
	}
	return NULL;
}


/**
  * Checks if the user is browsing the english branch of the web site.
  *
  * @author Rune M. Andersen <rune.andersen@ime.ntnu.no>
  * @return The language code (en or no)
  */
function tpl_pagelang($ID){
	global $conf;
	if((strpos($ID, ':') > 0 && substr($ID, 0, strpos($ID, ':')) == 'english') || $ID == 'english')
		return 'en';
	else
		return $conf['lang'];
}


/**
 * Print some info about the current page
 * Replaces tpl_pageinfo().
 * Adds _real_ name (instead of username) to "Last changed by: xxx".
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @modified-by Rune M. Andersen <rune.andersen@ime.ntnu.no>
 */
function tpl_mypageinfo(){
	global $conf;
	global $lang;
	global $INFO;
	global $auth;

	// prepare date
	$date = dformat($INFO['lastmod']);

	// prepare user info
	$user = $auth->getUserData($INFO['editor']);
	$lockeduser = $auth->getUserData($INFO['locked']);

	// print it
	if($INFO['exists']){
		print $date;
		if($user){
			print ', ';
			print $user['name'];
		} else if($INFO['editor']){
			print ', ';
			print $INFO['editor'];
		}
		if($lockeduser){
			print ' &middot; ';
			print $lang['lockedby'];
			print ': ';
			print $lockeduser['name'];
		} else if ($INFO['locked']){
			print ' &middot; ';
			print $lang['locked'];
			print ': ';
			print $INFO['locked'];
		}
	}
}


/**
 * Adds custom breadcrumb/you-are-here to existing.
 * Invoked from main.php, taking output buffer as input.
 *
 * @author Haagen Waade <haagen.waade@ntnu.no>
 * @modified-by Rune M. Andersen <rune.andersen@ime.ntnu.no>
 */

function tpl_myyouarehere($buffer){
	global $lang;
	global $ID;
	$pagelang = tpl_pagelang($ID);

	// Strips label
	$breadcrumb = substr($buffer, strlen('<span class="bchead">'.$lang['youarehere'].': </span>'));

	// Skips over a give number of wiki breadcrumbs
	$skip = ($pagelang == 'en' ) ? tpl_getConf('crumbskip_en') : tpl_getConf('crumbskip');
	if($skip){
		$pos = 0;
		for($i=0 ; $i<$skip; $i++){
			$pos = strpos($breadcrumb, "</a>", $pos+1);
		}
		$breadcrumb = substr($breadcrumb, $pos+4);
	}

	// Adds custom breadcrumbs in front of wiki breadcrumbs
	$cc = explode("\n", ($pagelang == 'en') ? tpl_getConf('customcrumb_en') : tpl_getConf('customcrumb'));
	foreach($cc as $c){
		$customcrumb .= ' &raquo; ';
		$customcrumb .= p_render('xhtml', p_get_instructions($c), $info);
	}

	$customcrumb = ereg_replace("(</?p>|\n*)", '', $customcrumb);
	if(!$skip)
		$customcrumb .= ' &raquo; ';

	return $lang['youarehere'].': '.substr($customcrumb.$breadcrumb, 9).' '; // adds space to force non-empty string
}

/**
 * Adds a drop-down language selector.
 * Uses metadata from language-plugin to detect alternative versions.
 *
 * @author Rune M. Andersen <rune.andersen@ime.ntnu.no>
 */

function tpl_languageSelector($lang = 'no'){
	global $ID;
	$translate = p_get_metadata($ID, 'translate');
	$ret = '';

	switch($lang){
		case 'no':
			$title = 'Alternative språkvarianter';
			$mainAltLang = 'English';
			$mainAltURL = ($translate['en']) ? $translate['en'] : 'english';
			break;
		case 'en':
			$title = 'Alternative languages';
			$mainAltLang = 'Norwegian';
			$mainAltURL = ($translate['no']) ? $translate['no'] : '';
			break;
	}

	if($translate){
		$ret .= '<li id="mainaltlang"><a href="'.wl($mainAltURL).'">'.$mainAltLang.'</a></li>';
		$ret .= '<li title="'.$title.'" id="languageselector"><span>Select language</span><ul>';
		foreach($translate as $k => $url){
			$ret .= '<li><a href="'.wl($url).'">('.$k.') '.p_get_first_heading($url).'</a></li>';
		}
		$ret .= '<li class="current"><a href="'.wl($ID).'">('.$lang.') '.p_get_first_heading($ID).'</a></li>';
		$ret .= '</ul></li>';
	} else {
		$ret .= '<li><a href="'.wl($mainAltURL).'">'.$mainAltLang.'</a></li>';
	}
	return $ret;
}



/**
 * Check for new messages from the template mothership
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @modified-by Rune M. Andersen <rune.andersen@ime.ntnu.no>
 */
function checkTemplateUpdates(){
	global $INFO;
	global $conf;
	$num = tpl_getConf('templateupdates');

	if(!tpl_getConf('usetemplateupdates')) return;
	if($conf['useacl'] && !$INFO['ismanager']) return;

	$cf = $conf['cachedir'].'/templateupdates.txt';
	$lm = @filemtime($cf);

	// check if new messages needs to be fetched
	if($lm < time()-(60*60*24)){
		$http = new DokuHTTPClient();
		$http->timeout = 8;
		$data = $http->get('http://www.ime.ntnu.no/_export/xhtmlbody/dokuwiki/updates');
		io_saveFile($cf,$data);
	}else{
		$data = io_readFile($cf);
	}

	$data = str_replace("\n", "", $data);

	// Filters relevant data from file
	$matches = array();
	$pattern = "/<li.*?>.*?\[(.+?)\].*?(.+?)<\/li>/";
	preg_match_all($pattern, $data, $matches);

	// Home made array_combine() for those running on older PHP versions
	$data = array();
	if(sizeof($matches[1]) == sizeof($matches[2]))
		for($i=0 ; $i<sizeof($matches[1]) ; $i++)
			$data[$matches[1][$i]] = $matches[2][$i];


	// prepares a list of messages
	$msgs = array();
	while(list($nr, $msg) = each($data))
		if($nr > $num)
			$msgs[$nr] = trim(strip_tags($msg, "<a><strong><em>"));
	krsort($msgs);

	// show messages through the usual message mechanism
	while(list($nr, $msg) = each($msgs))
		if($msg)
			msg($msg." <a href=\"?do=admin&amp;page=config#template_settings\">[IME #".$nr."]</a>",2);

}
