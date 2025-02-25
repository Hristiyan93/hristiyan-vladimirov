<li class="dropdown language-selector">

	<?php $trans = $this->translate()->getTranslator();?>
	<?php echo $this->translate('Language');?>: &nbsp;
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
		<img src="/images/languages/flag-<?php echo Models_Locale::getCurrentLocale()?>.png" />
	</a>

	<ul class="dropdown-menu pull-right">
		<?php $locales = $trans->getList();
			foreach($locales as $locale):
		?>
		<li class="active">
			<a href="/admin/dashboard/index/locale/<?php echo $locale?>">
				<img src="/images/languages/flag-<?php echo $locale?>.png" />
				<span><?php $list = Zend_Locale::getTranslationList('language', $locale); echo $list[$locale]?></span>
			</a>
		</li>
		<?php endforeach;?>
	</ul>
</li>