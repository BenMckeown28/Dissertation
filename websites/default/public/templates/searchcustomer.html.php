<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<style>
#show_up{
	width: 200px;
	height: 200px;
	border: 1px solid #ddd;
	display: none;
}
#show_up a{
	border-bottom: 1px solid #ddd;
	display: block;
	padding: 5px;
}
</style>

<script>
$(document).ready(function(e){
	$("#search").keyup(function(){
		$("#show_up").show();
		var text = $(this).val();
		$.ajax({
			type: 'GET',
			url: 'search.php',
			data: 'txt=' + text,
			success: function(data){
				$("#show_up").html(data);
			}
		});
	})
});
  </script>




<div class="searchtable">

<table id="tableid" width="100%">
  <tr>
    <th>
      Row number
    </th>
     <th>Firstname</th>
     <th>Surname</th>
     <th>Address line 1</th>
   <th>Address line 2</th>
    <th>Address line 3</th>
     <th>Postcode</th>
      <th>Telephone Number</th>
       <th>Email Address</th>
       <th>
         Username
       </th>
       <th>
         Password
       </th>
        <th>Action</th>
   </tr>
