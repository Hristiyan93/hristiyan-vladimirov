<article class="box">
    <figure class="col-xs-3 col-sm-2">
        <span><img alt="" src="<?php echo $this->showImage('airlines', $this->airlineId, 270, 160)?>"></span>
    </figure>
    <div class="details col-xs-9 col-sm-10">
        <div class="details-wrapper">
            <div class="first-row">
                <div>
                    <h4 class="box-title"><?php echo $this->src . ' ' . $this->translate('to') . ' ' . $this->dst?><small><?php echo $this->translate('Oneway flight')?></small></h4>
                    <a class="button btn-mini stop"><?php echo $this->stops . ' ' . $this->translate('STOP') ?></a>
                    <div class="amenities">
                    	<?php $features = Models_FlightsFeatures::getFlightFeatures($this->flightId, 5);
                    	 if(!is_array($features))$features = array();
                    	 foreach($features as $feature):
                    	   echo '<i class="' . $feature . ' circle"></i>';
                    	 endforeach;
                    	?>
                    </div>
                </div>
                <div>
                    <span class="price"><small><?php echo $this->translate('AVG/PERSON')?></small><?php echo $this->price($this->price)?></span>
                </div>
            </div>
            <div class="second-row">
                <div class="time">
                    <div class="take-off col-sm-4">
                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                        <div>
                            <span class="skin-color"><?php echo $this->translate('Take off')?></span><br /><?php echo date('H:i d/m/Y', strtotime($this->departure))?>
                        </div>
                    </div>
                    <div class="landing col-sm-4">
                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                        <div>
                        	<span class="skin-color"><?php echo $this->translate('Landing')?></span><br /><?php echo date('H:i d/m/Y', strtotime($this->arrival))?>
                        </div>
                    </div>
                    <div class="total-time col-sm-4">
                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                        <div>
                            <span class="skin-color"><?php echo $this->translate('Total Time')?></span><br /><?php echo $this->duration($this->duration, true)?>
                        </div>
                    </div>
                </div>
                <div class="action">
                    <a href="<?php echo $this->url(array('flightId'=>$this->id), 'flight', true)?>" class="button btn-small full-width"><?php echo $this->translate('SELECT NOW')?></a>
                </div>
            </div>
        </div>
    </div>
</article>