$(document).ready(function(){
    $('#myTable2').dataTable({
    	"order": [[0 , "desc"]]
    });
    
});

$(document).ready(function(){
    $('#myTable1').dataTable({
    	"order": [[ 5, "asc" ],[1 , "desc"]]
    });
    
});
$(document).ready(function(){
    $('#myTable').dataTable({
    });
    
});

$(document).ready(function(){
  	$("#archiv").removeAttr("required");
  });

$(document).ready(function(){
$('#datetimepicker1').datetimepicker({});
});

$(document).ready(function(){
$('#datetimepicker11').datetimepicker({});
});

$(document).ready(function(){
$('#datetimepicker3').datetimepicker({});
});

$(document).ready(function(){
$('#datetimepicker31').datetimepicker({});
});
$(document).ready(function(){
$('#datetimepicker32').datetimepicker({});
});
  
 tinyMCE.init({
	theme : "modern",
    mode : "textareas",
    convert_urls : false,
    theme_advanced_buttons1 : "bold,italic,underline,blockquote,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink",
    theme_advanced_buttons2: "",
    theme_advanced_buttons3: "",
    theme_advanced_buttons4: "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left"
});