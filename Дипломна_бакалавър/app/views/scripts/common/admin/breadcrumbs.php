<ol class="breadcrumb">
<?php 
$maxPages = count($this->pages);
for($i=0;$i<$maxPages;$i++):
$page = $this->pages[$i];
?>
	<li<?php if($i==$maxPages-1)echo ' class="active"'?>>
		<?php if($i<$maxPages-1):?>
		<a href="<?php echo $page->getHref();?>">
		<?php endif;?>
			<?php if(!$i):?>
			<i class="entypo-folder"></i>
			<?php endif;?>
			<?php echo $this->translate($page->getLabel())?>
		<?php if($i<$maxPages-1):?>
		</a>
		<?php endif;?>
	</li>
<?php endfor;?>
</ol>