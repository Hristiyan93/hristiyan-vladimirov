<div class="modal fade" id="modal-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="<?php echo '/admin/' . Zend_Controller_Front::getInstance()->getRequest()->getControllerName() . '/delete'?>">
			<input type="hidden" name="itemId" id="item-id">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $this->translate('Delete Item')?></h4>
			</div>
			
			<div class="modal-body">
				<?php echo $this->translate('Are you sure you want to deletе this item?')?>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->translate('Cancel')?></button>
				<button type="submit" class="btn btn-info" id="button-delete"><?php echo $this->translate('Confirm')?></button>
			</div>
			</form>
		</div>
	</div>
</div>