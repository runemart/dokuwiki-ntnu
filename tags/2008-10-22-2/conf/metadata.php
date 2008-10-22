<?php
/**
 * Configuration-manager metadata for the NTNU template
 *
 * @license:    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author:     Rune M. Andersen <rune.andersen@ime.ntnu.no>
 */

$meta['visitingaddress']							= array('string');
$meta['phone']											= array('string');
$meta['fax']												= array('string');
$meta['email']											= array('email');

$meta['visitingaddress_en']						= array('string');
$meta['phone_en']										= array('string');
$meta['fax_en']											= array('string');
$meta['email_en']										= array('email');

// Selected tab
$meta['selectedtab']  								= array('multichoice','_choices' => array('start','studier','student','evu','forskning','non','om', 'aktuelt'));
$meta['selectedtab_en']  							= array('multichoice','_choices' => array('home','studies','living','research','bai','about', 'contact'));
$meta['markcurrentmenuitem']				= array('onoff');
$meta['customcrumb']								= array('setting');
$meta['customcrumb_en']						= array('setting');
$meta['crumbskip']									= array('numeric');
$meta['crumbskip_en']								= array('numeric');

// Menu and sidebar configs
$meta['global_menu_pagename']				= array('string');
$meta['namespace_menu_pagename']		= array('string');
$meta['namespace_sidebar_pagename']	= array('string');
$meta['page_sidebar_pagename']			= array('string');

// Update massages
$meta['usetemplateupdates']					= array('onoff');
$meta['templateupdates'] 						= array('numeric');


?>