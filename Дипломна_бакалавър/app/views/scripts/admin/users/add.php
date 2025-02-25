<form role="form" class="form-horizontal form-groups-bordered" method="post" enctype="multipart/form-data" action="/admin/users/save" id="add-form">
<?php echo $this->formHidden('user[id]', $this->row->id)?>

<h2><?php echo $this->translate('Add User')?></h2>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-body">
					
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Username')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formText('user[username]', $this->row->username, array(
											'placeholder' => $this->translate('Username'),
											'class' => 'form-control'
									))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Firstname')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formText('user[firstname]', $this->row->firstname, array(
											'placeholder' => $this->translate('Firstname'),
											'class' => 'form-control'
									))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Lastname')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formText('user[lastname]', $this->row->lastname, array(
											'placeholder' => $this->translate('Lastname'),
											'class' => 'form-control'
									))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Password')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formPassword('user[password]', '', array(
											'placeholder' => $this->translate('Password'),
											'class' => 'form-control'
									))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Password again')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formPassword('confirm_password', '', array(
											'placeholder' => $this->translate('Password again'),
											'class' => 'form-control'
									))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Role')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formSelect('user[role]', $this->row->role, array(
											'class' => 'form-control'
									), Models_Users::$_rolesList)?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Status')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formSelect('user[status]', $this->row->status, array(
											'class' => 'form-control'
									), Models_Users::$_statusList)?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Photo')?></label>
								
								<div class="col-sm-5">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 88px; height: 88px;" data-trigger="fileinput">
											<img src="<?php echo ($this->row->hasImage()?$this->row->getImageUrl():'http://placehold.it/270x263')?>">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 88px; max-height: 88px"></div>
										<div>
											<span class="btn btn-white btn-file">
												<span class="fileinput-new"><?php echo $this->translate('Select')?></span>
												<span class="fileinput-exists"><?php echo $this->translate('Change')?></span>
												<input type="file" name="picture" accept="image/*">
											</span>
											<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo $this->translate('Remove')?></a>
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-default"><?php echo $this->translate('Save')?></button>
								</div>
							</div>
						
					</div>
				
				</div>
	</div>
</div>
</form>
<script>
(function( $ ) {
    'use strict';
 
    $(function() {

		// validate signup form on keyup and submit
		$("#add-form").validate({
			rules: {
				'user[firstname]': "required",
				'user[lastname]': "required",
				'user[username]': 'required',
				'user[password]': 'required',
				confirm_password: {
					required: true,
					equalTo: "#user-password"
				}
			},
			messages: {
				'user[firstname]': "<?php echo $this->translate('Please provide firstname')?>",
				'user[lastname]': "<?php echo $this->translate('Please provide lastname')?>",
				'user[username]': "<?php echo $this->translate('Please provide username')?>",
				'user[password]': "<?php echo $this->translate('Please provide password')?>",
				confirm_password: {
					required: "<?php echo $this->translate('Please enter password again')?>",
					equalTo: "<?php echo $this->translate('Both passwords not match')?>"
				}
			}
		});

    });
 
})( jQuery );
</script>

<?php $this->headLink()->appendStylesheet('/admin/js/wysihtml5/bootstrap-wysihtml5.css')?>

<?php $this->headScript()->appendFile("/admin/js/fileinput.js");?>
<?php $this->headScript()->appendFile("/admin/js/wysihtml5/wysihtml5-0.4.0pre.min.js");?>
<?php $this->headScript()->appendFile("/admin/js/wysihtml5/bootstrap-wysihtml5.js");?>
<?php $this->headScript()->appendFile("/admin/js/jquery.validate.min.js");?>
<?php $this->headScript()->appendFile("/admin/js/bootstrap-tagsinput.min.js");?>
