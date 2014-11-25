<?php
function full_editor() {
?>
<script language="javascript" type="text/javascript" src="https://www.benfund.com/includes/js/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,advhr,advimage,advlink,iespell,insertdatetime,preview,zoom,print,contextmenu,paste,directionality,fullscreen",
		theme_advanced_buttons1_add_before : "save,newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,preview,separator,forecolor,backcolor",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator",
		theme_advanced_buttons3_add : "iespell,media,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		content_css : "example_word.css",
	    plugi2n_insertdate_dateFormat : "%Y-%m-%d",
	    plugi2n_insertdate_timeFormat : "%H:%M:%S",
		external_link_list_url : "example_link_list.js",
		external_image_list_url : "example_image_list.js",
		media_external_list_url : "example_media_list.js",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		paste_auto_cleanup_on_paste : true,
		paste_convert_headers_to_strong : false,
		paste_strip_class_attributes : "all",
		paste_remove_spans : false,
		paste_remove_styles : false		
	});
</script>
<?php 
}

function simple_editor(){
?>
<script language="javascript" type="text/javascript" src="https://www.benfund.com/includes/js/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,advhr,advimage,advlink,iespell,contextmenu,paste,directionality",
		theme_advanced_buttons1 : "fontselect,fontsizeselect,forecolor,bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,indent,outdent",
		theme_advanced_buttons2: "undo,redo,link,unlink,cut,copy,paste,pastetext,pasteword,tablecontrols,separator,iespell,advhr,separator,ltr,rtl,help",
		theme_advanced_buttons3: "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
	    plugi2n_insertdate_dateFormat : "%Y-%m-%d",
	    plugi2n_insertdate_timeFormat : "%H:%M:%S",
		external_link_list_url : "example_link_list.js",
		external_image_list_url : "example_image_list.js",
		media_external_list_url : "example_media_list.js",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		paste_auto_cleanup_on_paste : true,
		paste_convert_headers_to_strong : false,
		paste_strip_class_attributes : "all",
		paste_remove_spans : false,
		paste_remove_styles : false		
	});
</script>
<?php }
 
function editor($mode=simple, $height=300, $width=600){
?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/fckeditor/fckeditor.js"></script>
<script type="text/javascript">
window.onload = function(){
var sBasePath = "https://www.benfund.com/includes/js/fckeditor/";
var allTextAreas = document.getElementsByTagName("textarea");
for (var i=0; i < allTextAreas.length; i++) {
var oFCKeditor = new FCKeditor( allTextAreas[i].name ) ;
<?php if($height){?>var ssih = '<?php echo $height; ?>';<?php } ?>
<?php if($width){?>var ssiw = '<?php echo $width; ?>';<?php } ?>
oFCKeditor.BasePath	= sBasePath ;
oFCKeditor.ToolbarSet = '<?php echo $mode; ?>' ;
	if(allTextAreas[i].style.height){
		var h = allTextAreas[i].style.height;
		}else if(ssih){
		var h = ssih;
		}else{
		var h = '300';
		}
		
	if(allTextAreas[i].style.width){
		var w = allTextAreas[i].style.width;
		}else if(ssiw){
		var w = ssiw;
		}else{
		var w = '600';
		}
oFCKeditor.Height = h ; 
oFCKeditor.Width = w ;
oFCKeditor.ReplaceTextarea() ;
 }
}
</script>
<?php
}
?>