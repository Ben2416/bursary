<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>jQuery File Upload Example</title>
  
  <!-- Bootstrap CSS Toolkit styles -->
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min2.css">
  <link rel="stylesheet" href="styles.css">
  
  <!-- Load jQuery and the necessary widget JS files to enable file upload -->
  <script src="jquery.min.js"></script>
  <script src="assets/plugins/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
  <script src="assets/plugins/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
  <script src="assets/plugins/jQuery-File-Upload/js/jquery.fileupload.js"></script>
  <script>
	$(document).ready(function(){
		$("#sig").change(function(){
			uploadContent(1,$('#sig').attr('name'));
		});
		$("#sig2").change(function(){
			uploadContent(2,$('#sig').attr('name'));
		});
		
		var uploadContent = function(fe,atName){
			var fd = new FormData(document.getElementById("frm"));
			
			$.ajax({
				url:"fileupload.php?fe="+fe+"&atname="+atName,
				type:"POST",
				data: fd,
				enctype:'multipart/form-data',
				processData:false,
				contentType:false,
				success:function(result){//$("#div1").html(result);}
					//alert("Output: "+result);
					$("#content").html(result);
				}
			});
			return false;
		}
	});
  </script>
</head>

<body>
<form method="post" id="frm" name="frm">
<input type="file" name="sig" id="sig" />
<input type="file" name="sig2" id="sig2" />
<p>Server Reply:</p><div id='content'></div>
</form>

</body> 
</html>