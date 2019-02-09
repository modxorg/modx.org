String.prototype.reverse = function() {
  return this.split('').reverse().join('');
}

function assignTabListeners(that,$redactor_tabs) {
	if (!$redactor_tabs.length) return false;
	jQuery.each($redactor_tabs.find('a'), function(i,s) {
		i++;
		jQuery(s).on('click', function(e) {
			e.preventDefault();

			$redactor_tabs.find('a').removeClass('redactor_tabs_act');
			jQuery(this).addClass('redactor_tabs_act');
			jQuery('.redactor_tab').hide().addClass('inactive');
			jQuery('#redactor_tab' + i ).show().removeClass('inactive');
			jQuery('#redactor_tab_selected').val(i);
		});
	});
}

function replaceAll(find, replace, str, flags) {
  return str.replace((find instanceof RegExp) ? find : new RegExp(find, flags), replace);
}