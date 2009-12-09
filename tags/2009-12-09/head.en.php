<h1 id="ntnuh1">
	<a href="http://www.ntnu.no/english"  title="Norwegian university of science and technology">
		<span>Norwegian University of Science and Technology</span>
	</a>
</h1>
<div id="ntnulogo">
	<h2 class="offscreen">Common links</h2>
	<ul id="ntnulenker" title="Common links">
		<li class="opp" style="font-size: 0.9em"><a href="http://www.ntnu.no/sitemap">Sitemap</a></li>
		<li class="opp" style="font-size: 0.9em"><a href="http://www.ntnu.no/portal/page/portal/eksternwebEN">Accessibility</a></li>
		<?php echo tpl_languageSelector('en'); ?>
		<li><a href="http://www.ntnu.no/ub/english/">Library</a></li>
		<li><a href="https://innsida.ntnu.no/">Intranet</a></li>
	</ul>
	<div id="searchform">
		<form action="http://www.ntnu.no/sok/search.fast" method="get" title="Search in NTNU website">
			<fieldset style="border: 1px solid #EDF0F6 ; width: 100%;">
				<legend><span class="offscreen">Search in NTNU website</span></legend>
				<label for="query">
					<span class="offscreen">Search for:</span>
					<input id="query" size="12" type="text" name="s.sm.query" value="Search term..." onfocus="searchFieldUpdate(this, '<?php echo $pagelang; ?>')" onblur="searchFieldUpdate(this, '<?php echo $pagelang; ?>')" accesskey="2" title="Search" />
				</label>
				<label for="sok">
					<input type="submit" id="sok" value="Search" />
				</label>
			</fieldset>
		</form>
	</div>
	<div class="clearer"></div>
</div>
<div id="ntnumenuwrapper">
	<div class="offscreen">
		<a name="globalnav"></a>
		<h2>Global navigation</h2>
	</div>
	<ul id="ntnumenu" title="Global navigation" class="selectedtab_<?php echo tpl_getConf('selectedtab_en'); ?>">
		<li id="tab_home"><a href="http://www.ntnu.no/english/">Home</a></li>
		<li id="tab_studies"><a href="http://www.ntnu.no/studies">Studies <span class="offscreen">at NTNU</span></a></li>
		<li id="tab_living"><a href="http://www.ntnu.no/livingintrh">Living in Trondheim</a></li>
		<li id="tab_research"><a href="http://www.ntnu.no/research">Research <span class="offscreen">at NTNU</span></a></li>
		<li id="tab_bai"><a href="http://www.ntnu.no/business">Business and Industry</a></li>
		<li id="tab_about"><a href="http://www.ntnu.no/aboutntnu">About NTNU</a></li>
		<li id="tab_contact"><a href="http://www.ntnu.no/contact">Contact us</a></li>
	</ul>
	<div class="clearer"></div>
</div>
