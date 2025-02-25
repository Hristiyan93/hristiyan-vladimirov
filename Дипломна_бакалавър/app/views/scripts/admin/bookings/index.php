<h3><?php echo $this->translate('Users')?></h3>
<br />

<table class="table table-bordered datatable" id="table-data">
	<thead>
		<tr>
			<th><?php echo $this->translate('Booking #')?></th>
			<th><?php echo $this->translate('Client')?></th>
			<th><?php echo $this->translate('From')?></th>
			<th><?php echo $this->translate('To')?></th>
			<th><?php echo $this->translate('Departure')?></th>
			<th><?php echo $this->translate('Arrival')?></th>
			<th><?php echo $this->translate('Price')?></th>
			<th><?php echo $this->translate('Status')?></th>
		</tr>
	</thead>
	<?php foreach($this->items as $item):?>
		<tr>
			<td><?php echo $item->getBookId()?></td>
			<td><?php echo $item->getClientName()?></td>
			<td><?php echo $item->getSrcCity()?></td>
			<td><?php echo $item->getDstCity()?></td>
			<td><?php echo date('H:i d/m/Y', strtotime($item->departure))?></td>
			<td><?php echo date('H:i d/m/Y', strtotime($item->arrival))?></td>
			<td>$<?php echo $item->price?></td>
			<td><?php echo $item->status?></td>
		</tr>
		<?php endforeach;?>
	<tfoot>
		<tr>
			<th><?php echo $this->translate('Booking #')?></th>
			<th><?php echo $this->translate('Client')?></th>
			<th><?php echo $this->translate('From')?></th>
			<th><?php echo $this->translate('To')?></th>
			<th><?php echo $this->translate('Departure')?></th>
			<th><?php echo $this->translate('Arrival')?></th>
			<th><?php echo $this->translate('Price')?></th>
			<th><?php echo $this->translate('Status')?></th>
		</tr>
	</tfoot>
</table>

<?php echo $this->partial('common/admin/delete-dialog.php')?>

<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		var table = $("#table-data").dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true
		});

		$('a.delete-item').click(function(evnt){
			evnt.preventDefault();
			$('#item-id').val($(this).data('id'))
			jQuery('#modal-1').modal('show');
		})
		
	});
</script>

<?php $this->headScript()->appendFile("/admin/js/jquery.dataTables.min.js");?>
<?php $this->headScript()->appendFile("/admin/js/dataTables.bootstrap.js");?>
<?php $this->headScript()->appendFile("/admin/js/datatables/jquery.dataTables.columnFilter.js");?>
<?php $this->headScript()->appendFile("/admin/js/datatables/lodash.min.js");?>
<?php $this->headScript()->appendFile("/admin/js/datatables/responsive/js/datatables.responsive.js");?>
<?php $this->headScript()->appendFile("/admin/js/select2/select2.min.js");?>