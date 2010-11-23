<div id="bluebar">
	<div class="marginwrapper">
		<div id="mainpagelink"><a href="http://www.ntnu.edu" title="Jump to NTNU's start page" accesskey="1">Norwegian University of Science and Technology</a></div>
		<ul id="ntnulenker" title="Common links">
			<?php echo tpl_languageSelector('no'); ?>
			<?php echo tpl_languageSelector('en'); ?>
			<li><a href="http://ntnu.edu/ub" title="NTNU Library">Library</a></li>
			<li><a href="http://alumni.ntnu.no" title="Alumni NTNU">Alumni</a></li>
			<li class="last"><a href="https://innsida.ntnu.no" title="Log on to the intranet">Intranet</a></li>
		</ul>
		<div class="clearer"></div>
	</div>
</div>

<div id="searchform" class="focus">
	<form action="http://ntnu.no/sok/search.fast" method="get" title="Search NTNU web pages">
		<fieldset>
			<legend class="offscreen">Search web pages at NTNU</legend>
			<label for="query" accesskey="4"><span class="offscreen">Search for:</span></label>
			<input id="query" type="text" name="s.sm.query" value="Search for content/employees" title="Search" class="query" />
			<input type="submit" id="sok" value="Search" />
			<input type="hidden" name="lang" value="en" />
		</fieldset>
	</form>
</div>

<?php //echo tpl_languageSelector('no'); ?>

<div class="marginwrapper">
	<div id="ntnumenuwrap">
		<div class="offscreen">
			<h2 id="globalnav">NTNU navigation</h2>
		</div>
		<ul id="ntnumenu" title="NTNU navigation" class="selectedtab_<?php echo tpl_getConf('selectedtab'); ?>">
			<li id="tab_start" class="first"><a href="http://www.ntnu.edu" title="Home page for NTNU">Home</a></li>
			<li id="tab_studier"><a href="http://www.ntnu.edu/studies" title="Studies at NTNU">Studies</a></li>
			<li id="tab_student"><a href="http://www.ntnu.edu/livingintrh" title="Living in Trondheim">Living in Trondheim</a></li>
			<li id="tab_forskning"><a href="http://www.ntnu.edu/research" title="Research at NTNU">Research</a></li>
			<li id="tab_non"><a href="http://www.ntnu.edu/business" title="Business and innovation">Business and innovation</a></li>
			<li id="tab_om" class="selected"><a href="http://www.ntnu.edu/aboutntnu" title="About NTNU">About NTNU</a></li>
			<li id="tab_aktuelt" class="last"><a href="http://www.ntnu.edu/contact" title="Contact us">Contact us</a></li>
		</ul>
		<div class="clearer"></div>
	</div>
</div>