<div id="bluebar">
	<div class="marginwrapper">
		<h1><a href="http://ntnu.no" title="Gå til NTNUs startside" accesskey="1">Norges teknisk-naturvitenskapelige universitet</a></h1>
		<ul id="ntnulenker" title="Felleslenker">
			<?php echo tpl_languageSelector('no'); ?>
			<?php echo tpl_languageSelector('en'); ?>
			<li><a href="http://ntnu.no/ub" title="Bibliotek"><span>Bibliotek</a></li>
			<li><a href="https://innsida.ntnu.no" title="Logg på intranettet">Intranett</a></li>
		</ul>
		<div class="clearer"></div>
	</div>
</div>

<div id="searchform" class="focus">
	<form action="http://ntnu.no/sok/search.fast" method="get" title="Søk i NTNUs nettsider">
		<fieldset>
			<legend class="offscreen">Søk i NTNUs nettsider</legend>
			<label for="query" accesskey="4"><span class="offscreen">Søk etter:</span></label>
			<input id="query" type="text" name="s.sm.query" value="Søk etter..." title="Søk" class="query" /><input type="submit" id="sok" value="Søk" class="submit" />
		</fieldset>
	</form>
</div>

<?php //echo tpl_languageSelector('no'); ?>

<div class="marginwrapper">
	<div id="ntnumenuwrap">
		<div class="offscreen">
			<h2 id="globalnav">NTNU-navigasjon</h2>
		</div>
		<ul id="ntnumenu" title="NTNU-navigasjon" class="selectedtab_<?php echo tpl_getConf('selectedtab'); ?>">
			<li id="tab_start"><a href="http://ntnu.no" title="Startside for NTNU">Startside <span class="offscreen">for NTNU</span></a></li>
			<li id="tab_studier"><a href="http://ntnu.no/studier" title="Studier ved NTNU">Studier <span class="offscreen">ved NTNU</span></a></li>
			<li id="tab_student"><a href="http://ntnu.no/student" title="Student i Trondheim">Student i Trondheim</a></li>
			<li id="tab_forskning"><a href="http://ntnu.no/forskning" title="Forskning ved NTNU">Forskning <span class="offscreen">ved NTNU</span></a></li>
			<li id="tab_evu"><a href="http://videre.ntnu.no/pages" title="Etter- og videreutdanning">Etter- og videreutdanning</a></li>
			<li id="tab_non"><a href="http://ntnu.no/naringsliv" title="Næringsliv og nyskapning">N&aelig;ringsliv og nyskapning</a></li>
			<li id="tab_om" class="selected"><a href="http://ntnu.no/om" title="Om NTNU">Om NTNU</a></li>
			<li id="tab_aktuelt"><a style="border-right: none" href="http://ntnu.no/aktuelt" title="Aktuelt">Aktuelt</a></li>
		</ul>
		<div class="clearer"></div>
	</div>
</div>