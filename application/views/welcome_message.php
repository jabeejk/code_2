<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<h2>Registration</h2> <div id="time"></div>
			<hr/>
			<?php if($success = $this->session->flashdata('success')) { ?>
				<div  class="alert alert-success">
					<?php echo $success; ?>
				</div>
			<?php } ?>

			<?php if($error = $this->session->flashdata('error')) { ?>
				<div class="alert alert-dander">
					<?php echo $error; ?>
				</div>
			<?php } ?>   
			<form method="post" action="<?php echo base_url("index.php/Welcome/reg") ?>" enctype="multipart/form-data" >	
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" class="form-control" id="name" value="<?php  echo set_value('name'); ?>" placeholder="Enter name" name="name">
					<div class="text-danger"><?php echo form_error("name"); ?></div>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
					<div class="text-danger"><?php echo form_error("pwd"); ?></div>
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" value="<?php  echo set_value('email'); ?>" placeholder="Enter email" name="email">
					<div class="text-danger"><?php echo form_error("email"); ?></div>
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<input type="text" class="form-control" id="add" value="<?php  echo set_value('add'); ?>" placeholder="Enter address" name="add">
					<div class="text-danger"><?php echo form_error("add"); ?></div>
				</div>
				<div class="form-group">
					<label for="dob">Date of birth:</label>
					<input type="Date" class="form-control" value="<?php  echo set_value('dob'); ?>" id="dob" name="dob">
					<div class="text-danger"><?php echo form_error("dob"); ?></div>
				</div>				
				<div class="form-group gender">
					<label for="gender">Gender :</label>
					<input type="radio"  name="optradio" value="male" <?php echo set_radio('optradio','male'); ?> >Male
					<input type="radio" name="optradio"  value="female" <?php echo set_radio('optradio','female'); ?>>Female  	
					<div class="text-danger"><?php echo form_error("optradio"); ?></div>			
				</div>
				<div class="control-group">
			      <label class="control-label" for="checkboxes">Hobbies :</label>
			      <div class="controls">
			        <input type="checkbox" name="checkboxes[]" value="playing games" <?php echo set_checkbox('checkboxes[]','playing games'); ?>> Playing games<br>
    				<input type="checkbox" name="checkboxes[]" value="reading books" <?php echo set_checkbox('checkboxes[]','reading books'); ?>> Reading books<br>
    				<input type="checkbox" name="checkboxes[]" value="watching tv" <?php echo set_checkbox('checkboxes[]','watching tv'); ?>> Watching tv<br>
    				<input type="checkbox" name="checkboxes[]" value="others" <?php echo set_checkbox('checkboxes[]','others'); ?>> Others<br>
    				<div class="text-danger"><?php echo form_error("checkboxes[]"); ?></div>
			      </div>
			      <label for="checkboxes[]" class="error"></label>
			    </div>
				<div class="form-group">
					<label for="lang">Choose Your Language:</label>
					<select class="form-control"  id="lang" name="lang"  >
						<option value="">--Select--</option>
						<option <?php echo set_select('lang','English'); ?>>English</option>
						<option <?php echo set_select('lang','Tamil'); ?> >Tamil</option>
						<option <?php echo set_select('lang','French'); ?> >French</option>
						<option <?php echo set_select('lang','Hindi'); ?> >Hindi</option>
					</select>
					<div class="text-danger"><?php echo form_error("lang"); ?></div>
				</div>
				<input type="submit" name="click" id="click"  value="Insert" class="btn btn-success">	

				<a href="<?php echo base_url('index.php/Welcome/file_view'); ?>" class="btn btn-info">Uploading by excel</a>			
			</form>
		</div>
		
</body>
</html>