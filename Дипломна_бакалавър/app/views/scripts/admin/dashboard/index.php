<div class="row">
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $this->flightsCount?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
		
					<h3><?php echo $this->translate('Flights')?></h3>
					<p><?php echo $this->translate('All flights in the system')?></p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $this->packages?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
		
					<h3><?php echo $this->translate('Destinations')?></h3>
					<p><?php echo $this->translate('Existing flight\'s routes')?></p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-mail"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $this->reservations?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
		
					<h3><?php echo $this->translate('Bookings')?></h3>
					<p><?php echo $this->translate('Reservations received')?></p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-rss"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $this->comments?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>
		
					<h3><?php echo $this->translate('Airports')?></h3>
					<p><?php echo $this->translate('Database with international airports')?></p>
				</div>
		
			</div>
		</div>
		
		<br />
		
		<div class="row">
		
			<div class="col-sm-8">
		
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title"><?php echo $this->translate('Last Reservations')?></div>
		
						<div class="panel-options">
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
		
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo $this->translate('Hotel')?></th>
								<th><?php echo $this->translate('Client')?></th>
								<th><?php echo $this->translate('Packages')?></th>
								<th><?php echo $this->translate('Amount')?></th>
							</tr>
						</thead>
			
						<tbody>
							<?php /*$id=0;foreach($this->reservations as $item):if(++$id>3)break;?>
							<tr>
								<td><?php echo $id?></td>
								<td><?php echo $item['hotel']?></td>
								<td><?php echo $item['client']?></td>
								<td><?php echo $item['packages']?></td>
								<td><?php echo $item['amount']?></td>
							</tr>
							<?php endforeach;*/?>
						</tbody>
					</table>
				</div>
		
			</div>
			
			<div class="col-sm-4">
		
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title"><?php echo $this->translate('New Packages')?></div>
		
						<div class="panel-options">
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
		
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo $this->translate('Package')?></th>
								<th><?php echo $this->translate('Price')?></th>
								<th><?php echo $this->translate('Capacity')?></th>
							</tr>
						</thead>
		
						<tbody>
							<?php /*$id=0;foreach($this->packages as $item):if(++$id>3)break;?>
							<tr>
								<td><?php echo $id?></td>
								<td><?php echo $item->name?></td>
								<td><?php echo number_format($item->price, 2)?>&euro;</td>
								<td><?php echo $item->capacity?></td>
							</tr>
							<?php endforeach;*/?>
						</tbody>
					</table>
				</div>
				
			</div>
		
		</div>
		
		<br />
		
		
		<div class="row">
		
			<div class="col-sm-6">
		
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title"><?php echo $this->translate('Latest Sites')?></div>
		
						<div class="panel-options">
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
		
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo $this->translate('Author')?></th>
								<th><?php echo $this->translate('Name')?></th>
								<th><?php echo $this->translate('Location')?></th>
							</tr>
						</thead>
		
						<tbody>
							<?php /*$id=0;foreach($this->sites as $item):if(++$id>3)break;?>
							<tr>
								<td><?php echo $id?></td>
								<td><?php echo $item['author']?></td>
								<td><?php echo $item['name']?></td>
								<td><?php echo $item['location']?></td>
							</tr>
							<?php endforeach;*/?>
						</tbody>
					</table>
				</div>
				
			</div>
			
			<div class="col-sm-6">
		
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title"><?php echo $this->translate('Latest Comments')?></div>
		
						<div class="panel-options">
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
		
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo $this->translate('Sites')?></th>
								<th><?php echo $this->translate('Author')?></th>
								<th><?php echo $this->translate('Comment')?></th>
							</tr>
						</thead>
		
						<tbody>
							<?php /*$id = 0;foreach($this->comments as $item):if(++$id>3)break;?>
							<tr>
								<td><?php echo $id?></td>
								<td><?php echo $item['name']  . ' - ' . $item['location']?></td>
								<td><?php echo $item['author']?></td>
								<td><?php echo $item['comment']?></td>
							</tr>
							<?php endforeach;*/?>
						</tbody>
					</table>
				</div>
		
			</div>
		
		</div>