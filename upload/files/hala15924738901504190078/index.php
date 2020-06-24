<html>
<head>
    <title>Create Zip File of Multiple Uploaded Files using PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<style type="text/css">
    body {
        background:#f2f2f2;
    }
    .page-container {
        width: 50%;
        margin: 5% auto 0 auto;
    }
    .form-container {
        padding: 30px;
        border: 1px solid #cccc;
        background: #FEFEFE;
    }
    .error,.success  {
        font-size: 18px;
    }
    .error {
        color: #b30000;
    }
    .success {
        color: #155724;
    }
    .download-zip {
        color: #000000;
    }
</style>
</head>
<body>
    <?php include 'submit.php'; ?>
    <div class="row">
    	<div class="page-container row-12">
    		<h4 class="col-12 text-center mb-5">Create Zip File of Multiple Uploaded Files </h4>
    		<div class="row-8 form-container">
            <?php 
            if(!empty($error)) { 
            ?>
    			<p class="error text-center"><?php echo $error; ?></p>
            <?php 
            }
            ?>
            <?php 
            if(!empty($success)) { 
            ?>
    			<p class="success text-center">
            Files uploaded successfully and compressed into a zip format
            </p>
            <p class="success text-center">
            <a href="uploads/<?php echo $success; ?>" target="__blank">Click here to download the zip file</a>
            </p>
	    	    <?php 
            }
            ?>
		    	<form action="upload.php" method="post" enctype="multipart/form-data">
				    <div class="input-group">
						
						<div class="custom-file">
						    <input type="file" class="custom-file-input" name="img1" >
						    <label class="custom-file-label" >Choose File</label>
						</div>
					</div>
					<div class="input-group">
						
						<div class="custom-file">
						    <input type="file" class="custom-file-input" name="img2" >
						    <label class="custom-file-label" >Choose File</label>
						</div>
					</div>
					<div class="input-group">
						
						<div class="custom-file">
						    <input type="file" class="custom-file-input" name="img3" >
						    <label class="custom-file-label" >Choose File</label>
						</div>
					</div>
					<div class="input-group">
						    <input type="submit" name="submitbtn" class="btn btn-primary" value="Upload">
					</div>
					
				</form>
				
    		</div>
		</div>
	</div>
</body>
</html>