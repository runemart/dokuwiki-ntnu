<?php
/**
 * Default configuration for the NTNU template
 *
 * @license:    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author:     Rune M. Andersen <rune.andersen@ime.ntnu.no>
 */

$conf['visitingaddress']							= 'Bygg XXX, Gate XXX, XXXX Trondheim'; // Address
$conf['phone']											= '73 59 XX XX';                    // Phone number
$conf['fax']													= '73 59 XX XX';                    // Fax number
$conf['email']												= 'XXX@XXX.ntnu.no';                    // E-mail

$conf['visitingaddress_en']						= 'Building XXX, Street XXX, XXXX Trondheim'; // Address
$conf['phone_en']										= '+47 73 59 XX XX';                    // Phone number
$conf['fax_en']											= '+47 73 59 XX XX';                    // Fax number
$conf['email_en']										= 'XXX@XXX.ntnu.no';                    // E-mail

// Selected tab
$conf['selectedtab'] 									= 'om';
$conf['selectedtab_en'] 							= 'about';
$conf['customcrumb']								= '[[http://www.ntnu.no|NTNU]]';
$conf['customcrumb_en']							= '[[http://www.ntnu.no/english|NTNU]]';
$conf['crumbskip']										= 0;
$conf['crumbskip_en']								= 0;

// Menu and sidebar configs
$conf['global_menu_pagename']				= 'mainmenu'; // Name of the file that will be the main (global) menu
$conf['namespace_menu_pagename']		= 'menu'; // Name of file that will be the inheritet namespace menu
$conf['namespace_sidebar_pagename']	= 'mainsidebar'; // Name of file that will be the inherited namespace sidebar
$conf['page_sidebar_pagename']				= 'sidebar'; // Name of the file that will be the page specific sidebar
$conf['markcurrentmenuitem']				= 1;
$conf['expandmenus']								= 0;


// Update massages
$conf['usetemplateupdates']					= 1;
$conf['templateupdates'] 						= 0;

?>