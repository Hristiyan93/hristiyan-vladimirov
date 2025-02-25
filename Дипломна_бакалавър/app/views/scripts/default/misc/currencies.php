<li class="ribbon currency">
    <a href="#" title=""><?php echo $this->currentCurrency['currency']?></a>
    <ul class="menu mini">
    	<?php foreach($this->currencies as $currency):
    	   $li = $this->currentCurrency['currency']==$currency?'<li class="active">':'<li>';
    	   echo $li . '<a href="' . $this->url(array('currency' => $currency), 'currency', true) . '" title="' . $currency . '">' . $currency . '</a></li>';
    	endforeach;?>
    </ul>
</li>