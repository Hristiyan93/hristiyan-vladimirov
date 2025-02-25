<div class="col-sms-6 col-sm-6 col-md-4">
    <article class="box">
        <figure>
            <span><img src="<?php echo $this->showImage('airlines', $this->airlineId, 270, 160)?>" alt="" width="270" height="160" /></span>
        </figure>
        <div class="details">
            <a title="View all" href="flight-detailed.html" class="pull-right button btn-mini uppercase"><?php echo $this->translate('select')?></a>
            <h4 class="box-title"><?php echo $this->dst?></h4>
            <label class="price-wrapper">
                <span class="price-per-unit"><?php echo $this->price($this->price)?></span><?php echo $this->translate('oneway')?>
            </label>
        </div>
    </article>
</div>