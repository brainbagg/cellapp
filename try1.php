<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable='no', width='device-width'" />
<title>Untitled Document</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
<script src="jquery.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
</head>


<body>
<!--
<div data-role="page" id="cover" data-theme="e" style="background-image:url(images/cover1.jpg); background-size:cover;">
  
<div id="click" style="width:300px; height:300px; position:absolute; right:400px; top:300px; background:;"></div>
</div>
-->

<div data-role="page" id="home">

<div data-role="header">
<h1>Mobile App</h1>
</div>

<div data-role="content">

<a href="tel:050874587" data-role="button">call</a>

<select data-role="slider" id="sel">
<option value="in">On</option>
<option value="out">Off</option>
</select>
<div id="txt"></div>

<ul data-role="listview" id="list" data-inset="true" data-theme="c">
<li data-icon="delete"><a href="#">one</a></li>
<li data-icon="delete"><a href="#">two</a></li>
<li data-icon="delete"><a href="#">three</a></li>
<li data-icon="delete"><a href="#">four</a></li>

</ul>
<button id="add">Add</button>

<button id="create">Create</button>
<button id="insert">Insert</button>
<button id="remove">Remove</button>

<ul data-role="listview" data-inset="true">
<li data-icon="arrow-d" data-theme="b"><a href="#">Menu 1</a></li>
<li>example1</li>
<li>example1</li>
<li>example1</li>
<li>example1</li>
<li data-icon="arrow-d" data-theme="b"><a href="#">Menu 2</a></li>
<li>example1</li>
<li>example1</li>
<li>example1</li>
<li>example1</li>
</ul>
</div>

<div data-role="footer" data-position="fixed" data-theme="b">
<h4>Copyright</h4>
</div>

</div>
</body>
</html>
<script>

$('#click').bind('click', function() {
	$.mobile.changePage('index.php', {transition: 'popup'})
	});

/*
var db = openDatabase('Test', '1.0', 'Test', 65535)
$('#create').bind('click', function(event) {
	db.transaction(function (transaction)
	{
		var sql = "CREATE TABLE customers " +
		"(id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, " +
		"lname VARCHAR(100) NOT NULL, " +
		"fname VARCHAR(100) NOT NULL)"
		transaction.executeSql (sql, undefined, function ()
		{
			alert("Table Created");	
		}, error);
	});
	});
*/
var html = "";
html+= "<ul data-role='listview' data-inset='true'>";
html+= "<li data-role='list-divider'>Tablets<li>";
html+= "<li><a href='#'>Z-touch tab and phone</a></li>";
html+= "<li>Samsung tab</li>";
html+= "<li>Black berry tab</li>";
html+= "<li>Ipad</li>";
html+= "<ul>";

$('#sel').bind('change', function() {
	$('#txt').append($(this).val() + ' ')
	});

$('li:not(:jqmData(icon=arrow-d))').hide();
$('li:jqmData(icon=arrow-d)').bind('vclick', function(event) {
	$(this).nextUntil('li:jqmData(icon=arrow-d)').toggle();
	var $span = $(this).find('span.ui-icon');
	if ($span.hasClass('ui-icon-arrow-d'))
	{
		$span.removeClass('ui-icon-arrow-d');
		$span.addClass('ui-icon-arrow-u');
	}
	
	else
	{
		$span.removeClass('ui-icon-arrow-u');
		$span.addClass('ui-icon-arrow-d');	
	}
	
	});

$("#home div:jqmData(role=content)").append(html);
var count = 0;
var count = count++;
var li = '<li>';
var lii = '</li>';

$('#add').bind("vclick", function() {
	$('#list').append("<li><a href='#'>examples</a></li>");
	$('#list').trigger('create');
});
/*
$("ul").bind("listviewcreate", function(event) {
	$("li .ui-icon").bind("click", function(event) {
		$(this).closest("li").remove();
	}).css("z-index", 10);
});
*/
$("#home").bind('pagecreate', function(event) {
	$('ul').listview();
	$("li .ui-icon").bind("taphold", function(event) {
		$(this).closest("li").remove();
		/*
		$('ul').find('li:first').addClass('ui-corner-top');
		$('ui').find('li:last').addClass('ui-corner-bottom');
		*/
		$('ul').listview("refresh");
	}).css("z-index", 10);
$('#list').listview()

});
/*
$.ajax(
	{
	url: 'action.php',
	complete: function(xhr, result) {
	if (result != "success") return;
	var response = xhr.responseText;
	$('#home div:jqmData(role=content)').prepend(response);
	
	$('#home').trigger('create');	
	}	
});
*/
</script>
