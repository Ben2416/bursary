<?php
session_start();
$_SESSION = array();
session_destroy();
	header("Location:login.php");
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>jQuery File Upload Example</title>
  
  <!-- Bootstrap CSS Toolkit styles -->
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min2.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="container">  
  <!-- Button to select & upload files -->
  <span class="btn btn-success fileinput-button">
    <span>Select files...</span>
    <!-- The file input field used as target for the file upload widget -->
    <input id="fileupload" type="file" name="files[]" multiple>
  </span>
  
  
  <!-- The global progress bar -->
  <p>Upload progress</p>
  <div id="progress" class="progress progress-success progress-striped">
    <div class="bar"></div>
  </div>
  
  
  
  <!-- The list of files uploaded -->
  <p>Files uploaded:</p>
  <ul id="files"></ul>
  
  
  
  <!-- Load jQuery and the necessary widget JS files to enable file upload -->
  <script src="jquery.min.js"></script>
  <script src="assets/plugins/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
  <script src="assets/plugins/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
  <script src="assets/plugins/jQuery-File-Upload/js/jquery.fileupload.js"></script>
  
  
  
  
  <!-- JavaScript used to call the fileupload widget to upload files -->
  <script>
    // When the server is ready...
    $(function () {
        'use strict';
        
        // Define the url to send the image data to
        var url = 'handleimage.php';
        
        // Call the fileupload widget and set some parameters
        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                // Add each uploaded file name to the #files list
                $.each(data.result.files, function (index, file) {
                    $('<li/>').text(file.name).appendTo('#files');
                });
            },
            progressall: function (e, data) {
                // Update the progress bar while files are being uploaded
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                    progress + '%'
                );
            }
        });
    });
    
  </script>
</div>
</body> 
</html>