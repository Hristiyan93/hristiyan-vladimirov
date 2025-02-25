<?php $root = $this->container->getChildren();?>

<ul id="main-menu" class="main-menu">
	<?php foreach ($root->getPages() as $page):?>
	<li class="root-level">
		<a href="#">
			<i class="<?php echo $page->getClass()?>"></i>
			<span class="title"><?php echo $this->translate($page->getLabel())?></span>
		</a>
		<ul>
			<?php foreach($page->getPages() as $child):?>
			<li>
				<a href="<?php echo $child->getHref()?>">
					<i class="<?php echo $child->getClass()?>"></i>
					<span class="title"><?php echo $this->translate($child->getLabel())?></span>
				</a>
			</li>
			<?php endforeach;?>
		</ul>
	</li>
	<?php endforeach;?>
</ul>