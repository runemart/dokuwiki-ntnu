<?php
	header('Content-Type: text/javascript; charset=utf-8');
?>

function searchFieldInit(field){
	field.style.color='#888';

}

function searchFieldUpdate(field, lang){
	var txt = '';
	if(lang == 'no')
		txt = '<?php echo utf8_encode('Søk her...'); ?>';
	else
		txt = '<?php echo utf8_encode('Search term...'); ?>';
	if(field.value == ''){
		field.value = txt;
		field.style.color = '#888';
	} else if(field.value == txt) {
		field.value = '';
		field.style.color = '#000';
	}
}