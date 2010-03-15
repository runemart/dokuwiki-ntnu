<h1 id="ntnuh1">
	<a href="http://www.ntnu.no"  title="Norges teknisk-naturvitenskapelige universitet">
		<span>Norges teknisk-naturvitenskapelige universitet</span>
	</a>
</h1>
<div id="ntnulogo">
	<h2 class="offscreen">Felleslenker</h2>
	<ul id="ntnulenker" title="Felleslenker">
		<li class="opp" style="font-size: 0.9em"><a href="http://www.ntnu.no/nettstedskart">Nettstedskart</a></li>
		<li class="opp" style="font-size: 0.9em"><a href="http://www.ntnu.no/tilgjengelighet">Tilgjengelighet</a></li>
		<?php echo tpl_languageSelector('no'); ?>
		<li><a href="http://www.ntnu.no/ub/">Bibliotek</a></li>
		<li><a href="https://innsida.ntnu.no/">Intranett</a></li>
	</ul>
	<div id="searchform">
		<form action="http://www.ntnu.no/sok/search.fast" method="get" title="Søk i NTNUs nettsider">
			<fieldset style="border: 1px solid #EDF0F6 ; width: 100%;">
				<legend><span class="offscreen">Søk i NTNUs nettsider</span></legend>
				<label for="query">
					<span class="offscreen">Søk etter:</span>
					<input id="query" size="12" type="text" name="s.sm.query" value="Søk her..." accesskey="2" title="Søk" />
				</label>
				<label for="sok">
					<input type="submit" id="sok" value="Søk" />
				</label>
			</fieldset>
		</form>
	</div>
	<div class="clearer"></div>
</div>
<div id="ntnumenuwrapper">
	<div class="offscreen">
		<a name="globalnav"></a>
		<h2>Global navigasjon</h2>
	</div>
	<ul id="ntnumenu" title="Global navigasjon" class="selectedtab_<?php echo tpl_getConf('selectedtab'); ?>">
		<li id="tab_start"><a href="http://www.ntnu.no/">Startside <span class="offscreen">for NTNU</span></a></li>
		<li id="tab_studier"><a href="http://www.ntnu.no/studier/">Studier <span class="offscreen">ved NTNU</span></a></li>
		<li id="tab_student"><a href="http://www.ntnu.no/studitrh/">Student i Trondheim</a></li>
		<li id="tab_forskning"><a href="http://www.ntnu.no/forskning/">Forskning <span class="offscreen">ved NTNU</span></a></li>
		<li id="tab_evu"><a href="http://videre.ntnu.no/pages/">Etter- og videreutdanning</a></li>
		<li id="tab_non"><a href="http://www.ntnu.no/naringsliv/">N&aelig;ringsliv og nyskapning</a></li>
		<li id="tab_om" class="selected"><a href="http://www.ntnu.no/omntnu/">Om NTNU</a></li>
		<li id="tab_aktuelt"><a href="http://www.ntnu.no/aktuelt/">Aktuelt</a></li>
	</ul>
	<div class="clearer"></div>
</div>
