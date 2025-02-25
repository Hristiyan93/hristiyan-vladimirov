<div class="row translation">
    <?php echo $this->formHidden('translations['.$this->partialCounter.'][id]', $this->id)?>
	<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-body">
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"></label>
			<div class="col-sm-5">
				<a href="#" class="remove-translation"><span class="entypo-minus-squared"></span><?php echo $this->translate('Remove Translation')?></a>
			</div>
		</div>
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Locale')?></label>
			
			<div class="col-sm-2">
				<?php echo $this->formSelect('translations['.$this->partialCounter.'][locale]', $this->locale ,array(
						'class' => 'form-control'
				),Models_Locale::getSupportedLanguagesList())?>
			</div>
		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Description')?></label>
			
			<div class="col-sm-7">
                <?php echo $this->formTextarea('translations['.$this->partialCounter.'][description]', $this->description, array(
						'placeholder' => $this->translate('Description'),
                        'class' => 'form-control wysihtml5',
				        'data-stylesheet-url' => '/admin/css/wysihtml5-color.css',
					    'rows' => 6,
					    'cols' => 60
				))?>
			</div>
		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Baggage')?></label>
			
			<div class="col-sm-7">
                <?php echo $this->formTextarea('translations['.$this->partialCounter.'][baggage]', $this->baggage, array(
						'placeholder' => $this->translate('Baggage'),
                        'class' => 'form-control wysihtml5',
				        'data-stylesheet-url' => '/admin/css/wysihtml5-color.css',
					    'rows' => 6,
					    'cols' => 60
				))?>
			</div>
		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Fare Rules')?></label>
			
			<div class="col-sm-7">
                <?php echo $this->formTextarea('translations['.$this->partialCounter.'][fareRules]', $this->fareRules, array(
						'placeholder' => $this->translate('Fare Rules'),
                        'class' => 'form-control wysihtml5',
				        'data-stylesheet-url' => '/admin/css/wysihtml5-color.css',
					    'rows' => 6,
					    'cols' => 60
				))?>
			</div>
		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Inflight Features')?></label>
			
			<div class="col-sm-7">
                <?php echo $this->formTextarea('translations['.$this->partialCounter.'][inflightFeatures]', $this->inflightFeatures, array(
						'placeholder' => $this->translate('Inflight Features'),
                        'class' => 'form-control wysihtml5',
				        'data-stylesheet-url' => '/admin/css/wysihtml5-color.css',
					    'rows' => 6,
					    'cols' => 60
				))?>
			</div>
		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Seat Selection')?></label>
			
			<div class="col-sm-7">
                <?php echo $this->formTextarea('translations['.$this->partialCounter.'][seatSelection]', $this->seatSelection, array(
						'placeholder' => $this->translate('Seat Selection'),
                        'class' => 'form-control wysihtml5',
				        'data-stylesheet-url' => '/admin/css/wysihtml5-color.css',
					    'rows' => 6,
					    'cols' => 60
				))?>
			</div>
		</div>
		
	</div>
	</div>
</div>