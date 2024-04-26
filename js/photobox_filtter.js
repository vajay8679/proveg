function get_id(id)
{
	
	var valid = id
	jQuery('#'+valid).photobox('.photobox_a');
	jQuery('#'+valid).photobox('.photobox_a:first', { thumbs:false, time:0 }, imageLoaded);
	
}
$(document).ready(function(){
		
    var id ="<?php echo $all;  ?>";
	jQuery('#'+id).photobox('.photobox_a');
	jQuery('#'+id).photobox('.photobox_a:first', { thumbs:false, time:0 }, imageLoaded);
});