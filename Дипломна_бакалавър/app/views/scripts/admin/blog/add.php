<form role="form" class="form-horizontal form-groups-bordered" method="post" enctype="multipart/form-data" action="/admin/blog/save" id="add-form">
<?php echo $this->formHidden('item[id]', $this->row->id)?>
<?php echo $this->formHidden('item[authorId]', $this->userId)?>

<h2><?php echo $this->translate('Add Post')?></h2>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-body">
					
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Name')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formText('item[title]', $this->row->title, array(
											'placeholder' => $this->translate('Title'),
											'class' => 'form-control'
									))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Content')?></label>
								
								<div class="col-sm-5">
									<?php echo $this->formTextarea('item[content]', $this->row->content, array(
                                            'class' => 'form-control wysihtml5',
                    				        'data-stylesheet-url' => '/admin/css/wysihtml5-color.css',
                    					    'rows' => 6,
                    					    'cols' => 60
                    				))?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Logo')?></label>
								
								<div class="col-sm-5">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 290px; height: 114px;" data-trigger="fileinput">
											<img src="<?php echo ($this->row->hasImage()?$this->row->getImageUrl():'http://placehold.it/870x342')?>">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 290px; max-height: 114px"></div>
										<div>
											<span class="btn btn-white btn-file">
												<span class="fileinput-new"><?php echo $this->translate('Select')?></span>
												<span class="fileinput-exists"><?php echo $this->translate('Change')?></span>
												<input type="file" name="photo" accept="image/*">
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
				'item[title]': "required",
				'item[content]': 'required'
			},
			messages: {
				'item[title]': "<?php echo $this->translate('Please provide post title')?>",
				'item[content]': "<?php echo $this->translate('Please provide content')?>"
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
