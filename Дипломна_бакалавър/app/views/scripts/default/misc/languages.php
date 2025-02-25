<li class="ribbon">
    <a href="#"><?php echo $this->currentLanguage?></a>
    <ul class="menu mini">
    	<?php foreach($this->languages as $locale => $language):
    	   $li = $this->locale==$locale?'<li class="active">':'<li>';
    	   echo $li . '<a href="' . $this->url(array('locale' => $locale), 'languages', true) . '" title="' . $language . '">' . $language . '</a></li>';
        endforeach;?>
    </ul>
</li>