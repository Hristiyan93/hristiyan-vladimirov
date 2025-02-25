<form role="form" class="form-horizontal form-groups-bordered" method="post" enctype="multipart/form-data" action="/admin/flights/save" id="add-form">
<?php echo $this->formHidden('item[id]', $this->row->id)?>

<div class="panel minimal minimal-gray">
					
	<div class="panel-heading">
		<div class="panel-title"><h2><?php echo $this->translate('Add Flight')?></h2></div>
		<div class="panel-options">
			
			<ul class="nav nav-tabs">
				<li class="active"><a href="#profile-1" data-toggle="tab"><?php echo $this->translate('Details')?></a></li>
				<li class=""><a href="#profile-2" data-toggle="tab"><?php echo $this->translate('Translations')?></a></li>
				<li class=""><a href="#profile-3" data-toggle="tab"><?php echo $this->translate('Inflight Features')?></a></li>
			</ul>
		</div>
	</div>
	
	<div class="panel-body">
		
		<div class="tab-content">
			<div class="tab-pane active" id="profile-1">
				<div class="form-group">
        			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Airline')?></label>
        			<div class="col-sm-3">
        				<?php echo $this->formSelect('item[airlineId]', $this->row->airlineId ,array(
        						'class' => 'form-control'
        				),Models_Airlines::listItemsByCountry())?>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-2" class="col-sm-3 control-label"><?php echo $this->translate('Flight #')?><span class="text-danger" style="font-size: 1.2em">*</span></label>
        			<div class="col-sm-1">
        				<?php echo $this->formText('item[name]', $this->row->name ,array(
        						'class' => 'form-control'))?>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-2" class="col-sm-3 control-label"><?php echo $this->translate('Seats')?><span class="text-danger" style="font-size: 1.2em">*</span></label>
        			<div class="col-sm-1">
        				<?php echo $this->formText('item[seats]', $this->row->seats ,array(
        						'class' => 'form-control'))?>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Flight Type')?></label>
        			<div class="col-sm-3">
        				<?php echo $this->formSelect('item[flightType]', $this->row->flightType ,array(
        						'class' => 'form-control'
        				),Models_Flights::$flightTypes)?>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-2" class="col-sm-3 control-label"><?php echo $this->translate('Adult Price')?><span class="text-danger" style="font-size: 1.2em">*</span></label>
        			<div class="col-sm-1">
        				<div class="input-group">
							<span class="input-group-addon">$</span>
							<?php echo $this->formText('item[adultPrice]', $this->row->adultPrice ,array('class' => 'form-control'))?>
						</div>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-2" class="col-sm-3 control-label"><?php echo $this->translate('Infant Price')?><span class="text-danger" style="font-size: 1.2em">*</span></label>
        			<div class="col-sm-1">
        				<div class="input-group">
							<span class="input-group-addon">$</span>
							<?php echo $this->formText('item[infantPrice]', $this->row->infantPrice ,array('class' => 'form-control'))?>
						</div>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-2" class="col-sm-3 control-label"><?php echo $this->translate('Cancel Price')?><span class="text-danger" style="font-size: 1.2em">*</span></label>
        			<div class="col-sm-1">
        				<div class="input-group">
							<span class="input-group-addon">$</span>
							<?php echo $this->formText('item[cancelPrice]', $this->row->cancelPrice ,array('class' => 'form-control'))?>
						</div>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-2" class="col-sm-3 control-label"><?php echo $this->translate('Taxes')?><span class="text-danger" style="font-size: 1.2em">*</span></label>
        			<div class="col-sm-1">
        				<div class="input-group">
							<span class="input-group-addon">$</span>
							<?php echo $this->formText('item[taxes]', $this->row->taxes ,array('class' => 'form-control'))?>
						</div>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Depart From')?></label>
        			<div class="col-sm-3">
        				<?php echo $this->formSelect('item[srcPort]', $this->row->srcPort ,array(
        						'class' => 'form-control'
        				),Models_Airports::listItemsByCountry())?>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-2" class="col-sm-3 control-label"><?php echo $this->translate('Departure')?></label>
        			<div class="col-sm-3">
        				<div class="date-and-time">
        					<?php echo $this->formText('item[departure][date]', date('m/d/Y', strtotime($this->row->departure)), array(
        					    'class' => 'form-control datepicker',
        					    'format' => 'dd/MM/yyyy',
        					))?>
        					<?php echo $this->formText('item[departure][time]', date('h:i A', strtotime($this->row->departure)), array(
        					    'class' => 'form-control timepicker',
        					    'data-template' => 'dropdown',
        					    'data-show-seconds' => 'false',
        					    'data-default-time' => date('h:i A', strtotime($this->row->departure)),
        					    'data-show-meridian' => 'true',
        					    'data-minute-step' => 5
        					))?>
						</div>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Arrive At')?></label>
        			<div class="col-sm-3">
        				<?php echo $this->formSelect('item[dstPort]', $this->row->dstPort ,array(
        						'class' => 'form-control'
        				),Models_Airports::listItemsByCountry())?>
        			</div>
        		</div>
        		
        		<div class="form-group">
        			<label for="field-2" class="col-sm-3 control-label"><?php echo $this->translate('Arrival')?></label>
        			<div class="col-sm-3">
        				<div class="date-and-time">
        					<?php echo $this->formText('item[arrival][date]', date('m/d/Y', strtotime($this->row->arrival)), array(
        					    'class' => 'form-control datepicker',
        					    'format' => 'dd/MM/yyyy',
        					))?>
        					<?php echo $this->formText('item[arrival][time]', date('h:i A', strtotime($this->row->arrival)), array(
        					    'class' => 'form-control timepicker',
        					    'data-template' => 'dropdown',
        					    'data-show-seconds' => 'false',
        					    'data-default-time' => date('h:i A', strtotime($this->row->arrival)),
        					    'data-show-meridian' => 'true',
        					    'data-minute-step' => 5
        					))?>
						</div>
        			</div>
        		</div>
        		
        		<div class="form-group">
					<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Image')?></label>
					
					<div class="col-sm-5">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 290px; height: 176px;" data-trigger="fileinput">
								<img src="<?php echo ($this->row->hasImage()?$this->row->getImageUrl():'http://placehold.it/870x530')?>">
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 290px; max-height: 176px"></div>
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
        		
        		
        		
			</div>
			
			<div class="tab-pane" id="profile-2">
				<div class="form-group">
        			<label for="field-1" class="col-sm-3 control-label"></label>
        			<div class="col-sm-5">
        				<a href="#" class="add-translation"><span class="entypo-plus-squared"></span><?php echo $this->translate('Add Translation')?></a>
        			</div>
        		</div>
        		
        		<div class="translations">
                	<?php if(!empty($this->row->id))echo $this->partialLoop('common/admin/flight-translation.php', $this->row->findDependentRowset('Models_FlightsTranslations'))?>
                </div>
        		
			</div>
			
			<div class="tab-pane" id="profile-3">
				<div class="form-group">
        			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Available Features')?></label>
        			<div class="col-sm-5">
        				<?php 
        				$flightFeatures = array();
        				if(!empty($this->row->id)){
        				    $_flightFeatures = $this->row->findDependentRowset('Models_FlightsFeatures');
        				    foreach($_flightFeatures as $feature){
        				        $flightFeatures[] = $feature->featureId;
        				    }
        				}
        				foreach($this->features as $feature):
        				    $id = $feature['id'];
        				?>
        				<div class="checkbox">
							<label>
								<?php echo $this->formCheckbox('features[' . $id . ']', in_array($id, $flightFeatures)?$id:false, null, array('checkedValue' => $id))?>
								<?php echo $feature['name']?>
							</label>
						</div>
						<?php endforeach;?>
						
        			</div>
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
				'item[name]': "required",
				'item[seats]': "required",
				'item[adultPrice]': "required",
				'item[infantPrice]': "required",
				'item[cancelPrice]': "required",
				'item[taxes]': "required"
			},
			messages: {
				'item[name]': "<?php echo $this->translate('Please provide flight No')?>"
			}
		});

		_.templateSettings = {
			interpolate: /\{\{(.+?)\}\}/g
		};
		var template = _.template($('#translation-template').html());
		var id = $('.translation').length;
		
		doneTranslations();

		$('.add-translation').click(function(e){
			var el = $(template({id: ++id}))
			$('.translations').append(el)
			el.find('.wysihtml5').wysihtml5();
			doneTranslations();
		})

    });

    function doneTranslations(){
    	$('.remove-translation').click(function(e){
    		var div = $(this).closest('div.row')
    		if(window.confirm('<?php echo $this->translate('Are you sure?')?>')){
        		$.post('/admin/flights/delete-translation', {translation:div.children('input:hidden').val()}, function(result){
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
    <?php echo $this->partial('common/admin/flight-translation.php', 
        array(
                'partialCounter' => '{{id}}'
    ))?>
</script>

<?php $this->headLink()->appendStylesheet('/admin/js/wysihtml5/bootstrap-wysihtml5.css')?>

<?php $this->headScript()->appendFile("/admin/js/fileinput.js");?>
<?php $this->headScript()->appendFile("/admin/js/wysihtml5/wysihtml5-0.4.0pre.min.js");?>
<?php $this->headScript()->appendFile("/admin/js/wysihtml5/bootstrap-wysihtml5.js");?>
<?php $this->headScript()->appendFile("/admin/js/jquery.validate.min.js");?>
<?php $this->headScript()->appendFile("/admin/js/bootstrap-tagsinput.min.js");?>
<?php $this->headScript()->appendFile("/admin/js/bootstrap-datepicker.js");?>
<?php $this->headScript()->appendFile("/admin/js/bootstrap-timepicker.min.js");?>
