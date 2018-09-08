$('button#finish').click(function(){alert("hello");});
$('#form').submit(function(){
	//$(this).ajaxSubmit();
	var url = "formdata.php";
	$.ajax({
		type:"POST";
		url: url;
		data:$('#form').serialize(),
		success:function(data){
			alert(data);
		},
		error:function(data){
			
		}
	});
	return false;
});



//var queryString = $('#form').formSerialize();
//$.post('formdata.php',queryString);