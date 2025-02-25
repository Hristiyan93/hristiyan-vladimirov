<div class="row translation">
    <?php echo $this->formHidden('translation['.$this->partialCounter.'][id]', $this->id)?>
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
				<?php echo $this->formSelect('translation['.$this->partialCounter.'][locale]', $this->locale ,array(
						'class' => 'form-control'
				),Models_Locale::getSupportedLanguagesList())?>
			</div>
		</div>
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"><?php echo $this->translate('Name')?></label>
			
			<div class="col-sm-5">
                <?php echo $this->formText('translation['.$this->partialCounter.'][name]', $this->name, array(
						'placeholder' => $this->translate('Name'),
						'class' => 'form-control'
				))?>
			</div>
		</div>
	</div>
	</div>
</div>