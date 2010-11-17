<?php
/**
 * DokuWiki NTNU Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @link	 http://wiki.splitbrain.org/wiki:tpl:templates
 * @author Andreas Gohr <andi@splitbrain.org>
 * @edited-by Rune M. Andersen <rune.andersen@ime.ntnu.no>
 */

// killing aggressive caching
header('Surrogate-Control: no-store');

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

// include template functions
require_once(dirname(__FILE__).'/tpl_functions.php');
// includes local functions if a file "tpl_functions.local.php" exists in the template folder
@include_once('tpl_functions.local.php');

// english or norwegian branch of site?
$pagelang = tpl_pagelang($ID);

// redirect from Innsida SSO
if($conf['authtype'] == 'innsida'){
	global $auth;
	$auth->loginRedirect();
}

// checks for template updates
checkTemplateUpdates();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $pagelang?>"
 lang="<?php echo $pagelang?>" dir="<?php echo $lang['direction']?>">
	<head profile="http://example.org/xmdp/robots-profile#">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php tpl_pagetitle()?> - <?php echo strip_tags($conf['title'])?></title>
		<!-- custom meta start -->
		<?php @include_once('meta.'.$pagelang.'.php'); ?>
		<!-- custom meta end -->
		<?php tpl_metaheaders()?>
		<!-- style and icons-->
		<link rel="stylesheet" type="text/css" href="<?php echo DOKU_TPL?>printmobile.css" />
		<link rel="icon" href="<?php echo DOKU_TPL?>images/favicon.ico" type="image/ico" />
		<link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.ico" />
		<link rel="apple-touch-icon" href="<?php echo DOKU_TPL?>images/apple-touch-icon.png" />
	</head>
	<body class="dwbody <?php echo $pagelang; ?>" id="pageid_<?php echo $ID; ?>">
		<!-- dokuwiki start -->
		<div class="dokuwiki">
			<div class="offscreen">
				<?php include_once('quicknav.'.$pagelang.'.php')?>
			</div>

			<!-- header start -->
			<div id="header">
				<?php include_once('head.'.$pagelang.'.php')?>
				<div class="clearer"></div>
			</div>
			<!-- header end -->

		<hr class="offscreen" />

		<div class="marginwrapper">
			<!-- pagewrapper start -->
			<div id="<?php echo (tpl_hasSidebar() && $ACT == 'show') ? "pagewrapper" : "pagewrapperwide";?>">
				<?php html_msgarea()?>
				<!-- breadcrumbs start -->
				<div id="breadcrumbs">
					<div>
						<?php ob_start("tpl_myyouarehere");tpl_youarehere();ob_end_flush();	?>
					</div>
				</div>
				<!-- breadcrumbs end -->

				<!-- dynamic 2/3 columns start -->
				<div class="columns-float">
					<!-- wikipage start -->
					<div class="page column-one">
						<div id="content">
							<a name="content"></a>
							<?php tpl_content()?>
							<div class="clearer"></div>
						</div>
					</div>
					<!-- wikipage stop -->
					<hr class="offscreen" />
					<!-- menu start -->
					<div id="menu" class="column-two">
						<a name="localnav"></a>
						<?php tpl_sidebar('menu') ?>
						<div class="clearer"></div>
					</div>
					<!-- menu end -->
				</div>
				<!-- dynamic 2/3 columns end -->

				<hr class="offscreen" />

				<?php if(tpl_hasSidebar() && $ACT == 'show'){ ?>
					<!-- sidebar start -->
					<div id="sidebar" class="column-three">
						<?php tpl_sidebar('sidebar') ?>
						<div class="clearer"></div>
					</div>
					<!-- sidebar end -->
				<?php } ?>

				<hr class="offscreen" />

				<!-- meta start -->
				<div id="meta">
					<div class="user">
						<?php tpl_userinfo()?>
					</div>
					<div class="doc">
						<?php tpl_mypageinfo()?>
					</div>
					<div class="clearer"></div>
				</div>
				<!-- meta end -->

				<!-- footer start -->
				<div id="footer">
					<div id="address">
						<?php include_once('address.'.$pagelang.'.php');?>
					</div>
					<div class="clearer"></div>
				</div>
				<!-- footer end -->
			</div>
			<!-- pagewrapper end -->

			<hr class="offscreen" />

			<!-- below footer start -->
			<div id="ntnufooter">
				<?php include_once('foot.'.$pagelang.'.php')?>
				<div class="clearer"></div>
			</div>
			<div id="credits">
				<ul>
					<li>Powered by <a href="http://www.dokuwiki.org">DokuWiki</a> + <a href="http://code.google.com/p/dokuwiki-ntnu">NTNU template</a> and <a href="http://jquery.com/">jQuery</a></li>
					<?php if (file_exists(DOKU_PLUGIN.'googleanalytics/action.php')){ ?>
						<li>Web statistics by <a href="http://www.google.com/analytics/">Google Analytics</a></li>
					<?php } ?>
					<li>"Fugue" icon set by <a href="http://yusukekamiyamane.com/">Yusuke Kamiyamane</a>, <a href="http://creativecommons.org/licenses/by/3.0/">CC-BY 3.0</a></li>
					<li class="last"><?php tpl_actionlink('login')?></li>
				</ul>
				<div class="clearer"></div>
			</div>

			<!-- below footer end -->

			<!-- button row start -->
			<div class="bar" id="bar__bottom">
				<div class="bar-left" id="bar__bottomleft">
					<?php
						if($_SERVER['REMOTE_USER'] || auth_quickaclcheck($ID) > AUTH_READ) {
							tpl_button('edit');
							tpl_button('history');
							tpl_button('recent');
						}
					?>
				</div>
				<div class="bar-right" id="bar__bottomright">
					<?php
						if($_SERVER['REMOTE_USER'] || auth_quickaclcheck($ID) > AUTH_READ) {
							tpl_button('index');
							tpl_button('subscription');
							tpl_button('admin');
							tpl_button('profile');
						}
					?>

				</div>
				<div class="clearer"></div>
			</div>
			<!-- button row end -->
		</div>
		<!-- marginwrapper end -->
		</div>
		<!-- dokuwiki end -->

		<!-- scripts placed at bottom of page to speed things up -->
		<script type="text/javascript">
			// Ready-function loads when document is fully loaded
			jQuery(document).ready(function(){
				// Prepare search field to auto update text and color
				prepareSearchField();
				// Include e-mail deobfuscation script if necessary
				deObfuscateEmails();
				// Trigger indexer
				jQuery.get('<?= $conf['basedir'].'lib/exe/indexer.php?id='.$ID.'&amp;'.time() ?>');
			});
		</script>
	</body>
</html>