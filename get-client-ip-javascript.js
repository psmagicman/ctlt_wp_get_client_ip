jQuery(document).ready(function() {
  console.log('Document Ready');
	jQuery('.ip-class').each(function() {
		console.log('Editing Quote: ' + jQuery(this));
		
		jQuery(this).replaceWith(ipaddr);
	});
});
