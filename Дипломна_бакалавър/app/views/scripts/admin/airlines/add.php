<form role="form" class="form-horizontal form-groups-bordered" method="post" enctype="multipart/form-data" action="/admin/airlines/save" id="add-form">
<?php echo $this->formHidden('item[id]', $this->row->id)?>

<h2><?php echo $this->translate('Add Airline')?></h2>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-body">
					
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Name')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formText('item[name]', $this->row->name, array(
											'placeholder' => $this->translate('Name'),
											'class' => 'form-control'
									))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('IATA')?></label>
								
								<div class="col-sm-1">
									<?php echo $this->formText('item[iata]', $this->row->iata, array(
											'placeholder' => $this->translate('IATA'),
									        'maxlength' => 2,
											'class' => 'form-control'
									))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('ICAO')?></label>
								
								<div class="col-sm-1">
									<?php echo $this->formText('item[icao]', $this->row->icao, array(
											'placeholder' => $this->translate('ICAO'),
									        'maxlength' => 3,
											'class' => 'form-control'
									))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Country')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formText('item[country]', $this->row->country, array(
											'placeholder' => $this->translate('Country'),
											'class' => 'form-control'
									))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Logo')?></label>
								
								<div class="col-sm-5">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 270px; height: 160px;" data-trigger="fileinput">
											<img src="<?php echo ($this->row->hasImage()?$this->row->getImageUrl():'http://placehold.it/270x160')?>">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 270px; max-height: 160px"></div>
										<div>
											<span class="btn btn-white btn-file">
												<span class="fileinput-new"><?php echo $this->translate('Select')?></span>
												<span class="fileinput-exists"><?php echo $this->translate('Change')?></span>
												<input type="file" name="logo" accept="image/*">
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
				'item[name]': "required",
				'item[iata]': 'required',
				'item[icao]': 'required',
				'item[country]': 'required'
			},
			messages: {
				'item[name]': "<?php echo $this->translate('Please provide airline name')?>",
				'item[iata]': "<?php echo $this->translate('Please provide iata code')?>",
				'item[icao]': "<?php echo $this->translate('Please provide icao code')?>",
				'item[country]': "<?php echo $this->translate('Please provide country')?>"
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
