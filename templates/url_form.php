
<style type="text/css">

html body {
	margin-top: 45px !important;
}

#top_form {
	position: fixed;
	top:0;
	left:0;
	width: 100%;
	
	margin:0;
	
	z-index: 2100000000;
	-moz-user-select: none; 
	-khtml-user-select: none; 
	-webkit-user-select: none; 
	-o-user-select: none; 
	
	border-bottom:1px solid #151515;
	
    background:#FFC8C8;
	
	height:45px;
	line-height:45px;
}

#top_form input[name=url] {
	width: 550px;
	height: 20px;
	padding: 5px;
	font: 13px "Helvetica Neue",Helvetica,Arial,sans-serif;
	border: 0px none;
	background: none repeat scroll 0% 0% #FFF;
}

</style>

<myheaderscripts id="bXloZWFkZXJzY3JpcHRz">
<script src="//cdn.jsdelivr.net/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
var url_text_selected = false;

function smart_select(ele){

	ele.onblur = function(){
		url_text_selected = false;
	};
	
	ele.onclick = function(){
		if(url_text_selected == false){
			this.focus();
			this.select();
			url_text_selected = true;
		}
	};
}
$(function() {
	// The DOM is now loaded and can be manipulated.
	var $ = jQuery = jQuery.noConflict(true);

	var fixed_els = $('*').not('#top_form').filter(function () { 
		return ($(this).css('position') == 'fixed' || $(this).css('position') == 'sticky');
	});

	fixed_els.each(function () {
		var position = $(this).position();
		var bottom = $(this).css('bottom');
		var minimum = $('#top_form').outerHeight();
		if ($(this).css('top') == 'auto' || position.top == 'auto') {
			return;
		}
		if (position.top < minimum) {
			$(this).attr('original_top',$(this).css('top'));
			$(this).css('top',minimum+'px');
		}
	});
	smart_select(document.getElementsByName("url")[0]);
});
</script>
</myheaderscripts>

<div id="top_form">

	<div style="width:800px; margin:0 auto;">
	
		<form method="post" action="index.php" target="_top" style="margin:0; padding:0;">
			<input type="button" value="Home" onclick="window.location.href='index.php'">
			<input type="text" name="url" value="<?php echo $url; ?>" autocomplete="off">
			<input type="hidden" name="form" value="1">
			<input type="submit" value="Go">
		</form>
		
	</div>
	
</div>
