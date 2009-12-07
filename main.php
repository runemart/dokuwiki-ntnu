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

require_once(dirname(__FILE__).'/tpl_functions.php');

// includes local functions if a file called tpl_functions.local.php exists in the template folder
@include_once('tpl_functions.local.php');

// english or norwegian branch of site?
$pagelang = tpl_pagelang($ID);

// redirect from Innsida SSO
if($conf['authtype'] == 'innsida'){
	global $auth;
	$auth->loginRedirect();
}

// overwrites bad translation
if($pagelang == 'en'){
	$lang['youarehere'] = 'Path';
	$lang['hits'] = 'hits';
} else {
	$lang['youarehere'] = 'Sti';
	$lang['hits'] = 'treff';
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
		<link rel="stylesheet" media="handheld" type="text/css" href="<?php echo DOKU_TPL?>handheld.css" />
		<link rel="icon" href="<?php echo DOKU_TPL?>images/favicon.ico" type="image/ico" />
		<link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.ico" />
		<script type="text/javascript" charset="utf-8" src="<?php echo DOKU_TPL?>searchscript.php" ></script>
		<?php if(!$_SERVER['REDIRECT_HTTPS'] == "on") { ?>
		<!-- webtrends logging for NTNU -->
		<script type="text/javascript" src="http://www.ntnu.no/js/webtrends_sdc.js"></script>
		<!-- end webtrends -->
		<?php } ?>
		<?php if($conf['mailguard'] == "visible") { ?>
		<script type="text/javascript" src="<?php echo DOKU_TPL?>js/email.js"></script>
		<?php } ?>
		<script type="text/javascript" src="<?php echo DOKU_TPL?>js/jsUtilities.js"></script>
		<script type="text/javascript" src="<?php echo DOKU_TPL?>js/footnoteLinks.js"></script>
		<script type="text/javascript">
		<!--
			function onLoad(){
				<?php if($conf['mailguard'] == "visible") echo "fixup();\n"; ?>
				footnoteLinks('content', 'pagewrapper');
			}
		-->
		</script>
		<!-- google analytics start -->
		<?php
			if (file_exists(DOKU_PLUGIN.'googleanalytics/code.php')) include_once(DOKU_PLUGIN.'googleanalytics/code.php');
			if (function_exists('ga_google_analytics_code')) ga_google_analytics_code();
		?>
		<!-- google analytics end -->
	</head>
	<body class="dwbody <?php echo $pagelang; ?>" id="pageid_<?php echo $ID; ?>" onload="onLoad();">
		<!-- dokuwiki start -->
		<div class="dokuwiki">
			<div class="offscreen robots-noindex">
				<?php include_once('quicknav.'.$pagelang.'.php')?>
			</div>
			<?php flush()?>

			<!-- pagewrapper start -->
			<div id="pagewrapper" class="pagewrapper<?php echo (tpl_hasSidebar() && $ACT == 'show') ? " " : " pagewrapperwide";?>">

				<!-- header start -->
				<div class="header robots-noindex">
					<div id="ntnuheader">
						<?php include_once('head.'.$pagelang.'.php')?>
						<div class="clearer"></div>
					</div>
				</div>
				<!-- header end -->

			<?php require_once('ie6.php'); ?>

			<?php html_msgarea()?>

				<!-- breadcrumbs start -->
				<div class="breadcrumbs robots-noindex">
					<div class="padder">
						<?php if($conf['youarehere']) {ob_start("tpl_myyouarehere");tpl_youarehere();ob_end_flush();}	?>
					</div>
				</div>
				<!-- breadcrumbs end -->

				<hr class="offscreen" />

				<!-- dynamic 2/3 columns start -->
				<div class="columns-float">
					<!-- wikipage start -->
					<div class="page column-one">
						<div class="padder" id="content">
							<a name="content"></a>
							<?php tpl_content()?>
							<div class="clearer"></div>
						</div>
					</div>
					<!-- wikipage stop -->
					<hr class="offscreen" />
					<!-- menu start -->
					<div class="menu column-two">
						<div class="padder">
							<a name="localnav"></a>
							<?php tpl_sidebar('menu') ?>
							<div class="clearer"></div>
						</div>
					</div>
					<!-- menu end -->
				</div>
				<!-- dynamic 2/3 columns end -->

				<?php flush()?>

				<hr class="offscreen" />

			<?php if(tpl_hasSidebar() && $ACT == 'show'){ ?>
				<!-- sidebar start -->
				<div class="sidebar column-three">
					<div class="padder">
						<?php tpl_sidebar('sidebar') ?>
					</div>
				</div>
				<!-- sidebar end -->
			<?php } ?>

				<?php flush()?>

				<hr class="offscreen" />

				<!-- meta start -->
				<div class="meta robots-noindex">
					<div class="user">
						<?php tpl_userinfo()?>
					</div>
					<div class="doc">
						<?php tpl_mypageinfo()?>
					</div>
				</div>
				<!-- meta end -->

				<!-- footer start -->
				<div class="footer robots-noindex">
					<div class="address">
						<?php include_once('address.'.$pagelang.'.php');?>
					</div>
					<div class="clearer"></div>
				</div>
				<!-- footer end -->
			</div>
			<!-- pagewrapper end -->

			<!-- below footer start -->
			<div id="ntnufooter" class="robots-noindex">
				<?php include_once('foot.'.$pagelang.'.php')?>
			</div>
			<!-- below footer end -->

			<!-- button row start -->
			<div class="bar robots-noindex" id="bar__bottom">
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
					<?php tpl_button('login')?>
				</div>
				<div class="clearer"></div>
			</div>
			<!-- button row end -->

		</div>
		<!-- dokuwiki end -->

		<!-- indexer start -->
		<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
		<!-- indexer end -->

		<?php if(!$_SERVER['REDIRECT_HTTPS'] == "on") { ?>
		<!-- webtrends logging for NTNU -->
		<noscript><img alt="WebTrends logging" name="dcsimg" style="width: 1px; height: 1px" src="http://sdc.itea.ntnu.no/dcsonfmouolv6i2g5zjlqvcls_2n9k/njs.gif?dcsuri=/nojavascript&amp;WT.js=No&amp;WT.tv=8.0.1" /></noscript>
		<!-- end webtrends -->
		<?php } ?>

		<script type="text/javascript">
			<!--
				// Set dynamic gray color if JS enabled. Others will have standard black.
				// When entering search phrase the text turns black again.
				searchFieldInit(document.getElementById('query'));
			-->
		</script>
	</body>
</html>