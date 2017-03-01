<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exam PDF Upload</title>
	<style>
	
	.upload {
		width: 500px;
		background: #f0f0f0;
		border: 1px solid #ddd;
		padding: 20px;
	}
	
	
	</style>
</head>
<body>
	<form action="php/php_upload_exam_pdf.php" method="POST" enctype="multipart/form-data" id="exam-pdf-upload" class="upload">
		<fieldset>
			<legend><h3>Upload exam pdf</h3></legend>
			<input type="file" name="file[]" id="file" required multiple>
			<input type="submit" value="Upload" id="submit" name="submit">
		</fieldset>
		<div id="uploads" class="uploads">
			Uploaded files will appear here
			
			<p>These files didn't upload</p>
			</div>
	</form>
	
</body>
</html>