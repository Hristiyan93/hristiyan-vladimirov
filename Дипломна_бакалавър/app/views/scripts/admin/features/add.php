<form role="form" class="form-horizontal form-groups-bordered" method="post" enctype="multipart/form-data" action="/admin/features/save" id="add-form">
<?php echo $this->formHidden('item[id]', $this->row->id)?>


<div class="row">
				
    <div class="panel-body">
    
    		
    		
    		
    		
    		<?php // DO translations here?>
    		
    </div>
				
</div>

<div class="panel minimal minimal-gray">
					
	<div class="panel-heading">
		<div class="panel-title"><h2><?php echo $this->translate('Add Inflight Feature')?></h2></div>
		<div class="panel-options">
			
			<ul class="nav nav-tabs">
				<li class="active"><a href="#profile-1" data-toggle="tab"><?php echo $this->translate('Details')?></a></li>
				<li class=""><a href="#profile-2" data-toggle="tab"><?php echo $this->translate('Translations')?></a></li>
			</ul>
		</div>
	</div>
	
	<div class="panel-body">
		
		<div class="tab-content">
			<div class="tab-pane active" id="profile-1">
				<div class="form-group">
        			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Feature Symbol')?></label>
        			
        			<div class="col-sm-5">
        				<?php echo $this->formText('item[symbol]', $this->row->symbol, array(
        						'placeholder' => $this->translate('Feature Symbol'),
        						'class' => 'form-control'
        				))?>
        			</div>
        		</div>
			</div>
			
			<div class="tab-pane" id="profile-2">
				<div class="form-group">
        			<label for="field-1" class="col-sm-3 control-label"></label>
        			<div class="col-sm-5">
        				<a href="#" class="add-translation"><span class="entypo-plus-squared"></span><?php echo $this->translate('Add Translation')?></a>
        			</div>
        		</div>
        		
        		<div class="translations">
                	<?php if(!empty($this->row->id))echo $this->partialLoop('common/admin/feature-translation.php', $this->row->findDependentRowset('Models_FeaturesTranslations'))?>
                </div>
        		
			</div>
		</div>
		
	</div>
	
</div>

<div class="row">
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5">
				<button type="submit" class="btn btn-default"><?php echo $this->translate('Save')?></button>
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
				'item[symbol]': "required"
			},
			messages: {
				'item[symbol]': "<?php echo $this->translate('Please provide feature symbol')?>"
			}
		});

		_.templateSettings = {
			interpolate: /\{\{(.+?)\}\}/g
		};
		var template = _.template($('#translation-template').html());
		var id = $('.translation').length;
		
		doneTranslations();

		$('.add-translation').click(function(e){
			$('.translations').append(template({id: ++id}))
			doneTranslations();
		})

    });

    function doneTranslations(){
    	$('.remove-translation').click(function(e){
    		var div = $(this).closest('div.row')
    		if(window.confirm('<?php echo $this->translate('Are you sure?')?>')){
        		$.post('/admin/features/delete-translation', {translation:div.children('input:hidden').val()}, function(result){
            		if(result.status){
                		div.remove();
            		}
            	})
    		}
    	})
    }
 
})( jQuery );


</script>

<script type="text/template" id="translation-template">
    <?php echo $this->partial('common/admin/feature-translation.php', 
        array(
                'partialCounter' => '{{id}}', 
                'id' =>'', 
                'locale' => '', 
                'name' => ''
    ))?>
</script>

<?php $this->headLink()->appendStylesheet('/admin/js/wysihtml5/bootstrap-wysihtml5.css')?>

<?php $this->headScript()->appendFile("/admin/js/fileinput.js");?>
<?php $this->headScript()->appendFile("/admin/js/wysihtml5/wysihtml5-0.4.0pre.min.js");?>
<?php $this->headScript()->appendFile("/admin/js/wysihtml5/bootstrap-wysihtml5.js");?>
<?php $this->headScript()->appendFile("/admin/js/jquery.validate.min.js");?>
<?php $this->headScript()->appendFile("/admin/js/bootstrap-tagsinput.min.js");?>
