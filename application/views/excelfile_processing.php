<!DOCTYPE html>
<html>
<head>
	<title>Upload by excel</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<body>
	<div class="container">
		<h1>File uploading using excel</h1>
		<hr/>
		<?php if($dup = $this->session->flashdata('duplicate')) { ?>
				<div  class="alert alert-danger">
					<?php echo $dup; ?>
				</div>
			<?php } ?>
			<?php if($success = $this->session->flashdata('insert')) { ?>
				<div  class="alert alert-success">
					<?php echo $success; ?>
				</div>
			<?php } ?>
		<div class="container">
				<form action="<?php echo base_url('index.php/Welcome/file_process'); ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="file" name="upload" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input class="btn btn-danger" type="submit" name="click" value="Insert">
							</div>
						</div>
					</div>
				</form>			
		</div>
	</div>
</body>
</html>