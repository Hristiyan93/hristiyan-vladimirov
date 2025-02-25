<h3><?php echo $this->translate('Posts')?></h3>
<br />

<table class="table table-bordered datatable" id="table-data">
	<thead>
		<tr>
			<th><?php echo $this->translate('Date')?></th>
			<th><?php echo $this->translate('Author')?></th>
			<th><?php echo $this->translate('Title')?></th>
			<th></th>
		</tr>
	</thead>
	<?php foreach($this->items as $item):?>
		<tr>
			<td><?php echo date('d/m/Y', strtotime($item->date))?></td>
			<td><?php echo $item->getAuthor()->getFullname()?></td>
			<td><?php echo $item->title?></td>
			<td width="220">
				<a href="/admin/blog/add/id/<?php echo $item->id?>" class="btn btn-default btn-sm btn-icon icon-left">
					<i class="entypo-pencil"></i>
					<?php echo $this->translate('Edit')?>
				</a>
				
				<a href="#" class="btn btn-danger btn-sm btn-icon icon-left delete-item" data-id="<?php echo $item->id?>">
					<i class="entypo-cancel"></i>
					<?php echo $this->translate('Remove')?>
				</a>
			</td>
		</tr>
		<?php endforeach;?>
	<tfoot>
		<tr>
			<th><?php echo $this->translate('Date')?></th>
			<th><?php echo $this->translate('Author')?></th>
			<th><?php echo $this->translate('Title')?></th>
			<th></th>
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