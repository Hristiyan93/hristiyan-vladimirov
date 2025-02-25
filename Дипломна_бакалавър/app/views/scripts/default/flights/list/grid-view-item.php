<div class="col-sm-6 col-lg-4">
    <article class="box">
        <figure>
            <span><img alt="" src="<?php echo $this->showImage('airlines', $this->airlineId, 270, 160)?>"></span>
        </figure>
        <div class="details">
            <span class="price"><small><?php echo $this->translate('avg/person')?></small><?php echo $this->price($this->price)?></span>
            <h4 class="box-title"><?php echo $this->dst?><small><?php echo $this->translate('Oneway flight')?></small></h4>
            <div class="time">
                <div class="take-off">
                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                    <div>
                        <span class="skin-color"><?php echo $this->translate('Take off')?></span><br /><?php echo date('D M d', strtotime($this->departure))?>
                        	<br /><?php echo date('H:i A', strtotime($this->departure))?>
                    </div>
                </div>
                <div class="landing">
                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                    <div>
                        <span class="skin-color"><?php echo $this->translate('Landing')?></span><br /><?php echo date('D M d', strtotime($this->arrival))?>
                        	<br /><?php echo date('H:i A', strtotime($this->arrival))?>
                    </div>
                </div>
            </div>
            <p class="duration"><span class="skin-color"><?php echo $this->translate('Total Time')?> </span><?php echo $this->duration($this->duration, true)?></p>
            <div class="action">
                <a class="button btn-small full-width" href="flight-detailed.html"><?php echo $this->translate('SELECT NOW')?></a>
            </div>
        </div>
    </article>
</div>