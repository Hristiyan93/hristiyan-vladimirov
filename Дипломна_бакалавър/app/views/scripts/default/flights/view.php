        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title"><?php echo $this->translate('Flight Detailed')?></h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="/"><?php echo $this->translate('Home')?></a></li>
                    <li><a href="/search"><?php echo $this->translate('Search Results')?></a></li>
                    <li class="active"><?php echo $this->translate('Flight Detailed')?></li>
                </ul>
            </div>
        </div>
        <section id="content">
            <div class="container flight-detail-page">
                <div class="row">
                    <div id="main" class="col-md-9">
                        <div class="tab-container style1 box" id="flight-main-content">
                            <div class="tab-content">
                                <div id="photo-tab" class="tab-pane fade in active">
                                    <div class="featured-image image-container">
                                        <img src="<?php echo $this->flight->hasImage()?$this->flight->getImageUrl():'http://placehold.it/870x530'?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="flight-features" class="tab-container">
                            <ul class="tabs">
                                <li class="active"><a href="#flight-details" data-toggle="tab"><?php echo $this->translate('Flight Details')?></a></li>
                                <li><a href="#inflight-features" data-toggle="tab"><?php echo $this->translate('Inflight Features')?></a></li>
                                <li><a href="#flgiht-seat-selection" data-toggle="tab"><?php echo $this->translate('Seat Selection')?></a></li>
                                <li><a href="#flight-baggage" data-toggle="tab"><?php echo $this->translate('Baggage')?></a></li>
                                <li><a href="#flight-fare-rules" data-toggle="tab"><?php echo $this->translate('Fare Rules')?></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="flight-details">
                                    <div class="intro table-wrapper full-width hidden-table-sm box">
                                        <div class="col-md-4 table-cell travelo-box">
                                            <dl class="term-description">
                                                <dt><?php echo $this->translate('Airline')?>:</dt><dd><?php echo $this->flight->getAirline()?></dd>
                                                <dt><?php echo $this->translate('Flight Type')?>:</dt><dd><?php echo $this->flight->flightType?></dd>
                                                <dt><?php echo $this->translate('Fare type')?>:</dt><dd><?php echo $this->translate('Refundable')?></dd>
                                                <dt><?php echo $this->translate('Cancellation')?>:</dt><dd><?php echo $this->price($this->flight->cancelPrice) . ' / ' . $this->translate('person')?></dd>
                                                <dt><?php echo $this->translate('Seats &amp; Baggage')?>:</dt><dd><?php echo $this->price($this->flight->taxes)?></dd>
                                                <dt><?php echo $this->translate('Inflight Features')?>:</dt><dd><?php echo $this->translate('Available')?></dd>
                                                <dt><?php echo $this->translate('Base fare')?>:</dt><dd><?php echo $this->price($this->flight->adultPrice)?></dd>
                                                <dt><?php echo $this->translate('Taxes &amp; Fees')?>:</dt><dd><?php echo $this->price($this->flight->taxes)?></dd>
                                                <dt><?php echo $this->translate('total price')?>:</dt><dd><?php echo $this->price($this->route->price)?></dd>
                                            </dl>
                                        </div>
                                        <div class="col-md-8 table-cell">
                                            <div class="detailed-features booking-details">
                                                <div class="travelo-box">
                                                    <a href="#" class="button btn-mini yellow pull-right"><?php echo $this->route->stops . ' ' . $this->translate('STOP')?></a>
                                                    <h4 class="box-title"><?php echo $this->route->getSrcCity() . ' ' . $this->translate('to') . ' ' . $this->route->getDstCity()?>
                                                    	<small><?php echo $this->translate('Oneway flight')?></small></h4>
                                                </div>
                                                <div class="table-wrapper flights">
                                                	<?php for($i=0;$i<$this->route->stops;$i++):
                                                	   $flight = $this->flights[$i];
                                                	   $isLastFlight = $i==$this->route->stops-1;
                                                	   $class = $isLastFlight?'second-flight':'first-flight';
                                                	?>
                                                    <div class="table-row <?php echo $class?>">
                                                        <div class="table-cell logo">
                                                            <img src="<?php echo $this->showImage('airlines', $flight->airlineId, 140, 30)?>" alt="">
                                                            <label><?php echo $flight->name . ' ' . $flight->flightType?></label>
                                                        </div>
                                                        <div class="table-cell timing-detail">
                                                            <div class="timing">
                                                                <div class="check-in">
                                                                    <label><?php echo $this->translate('Take off')?></label>
                                                                    <span><?php echo date('d M Y, H:i A', strtotime($flight->departure))?></span>
                                                                </div>
                                                                <div class="duration text-center">
                                                                    <i class="soap-icon-clock"></i>
                                                                    <span><?php echo $this->duration($flight->duration)?></span>
                                                                </div>
                                                                <div class="check-out">
                                                                    <label><?php echo $this->translate('landing')?></label>
                                                                    <span><?php echo date('d M Y, H:i A', strtotime($flight->arrival))?></span>
                                                                </div>
                                                            </div>
                                                           	<?php if(!$isLastFlight):?>
                                                            <label class="layover"><?php echo $this->translate('Layover')?> <?php echo $this->duration((strtotime($this->flights[$i+1]->departure)-strtotime($flight->arrival))/60)?></label>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                    <?php endfor;?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="long-description">
                                        <h2><?php echo $this->translate('About') . ' ' . $this->flight->getAirline()?></h2>
                                        <p><?php echo $this->flightInfo->description?></p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="inflight-features">
                                    <h2><?php echo $this->translate('Inflight Features')?></h2>
                                    <ul class="amenities clearfix style1 box">
                                    	<?php foreach($this->featuresList as $feature):?>
                                        <li class="col-md-4 col-sm-6">
                                            <div class="icon-box style1"><i class="<?php echo $feature->symbol?> 
                                                <?php echo !in_array($feature->symbol, $this->flightFeatures)?'disabled':''?>">
                                                </i><?php echo $feature->name?></div>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                    <p><?php echo $this->flightInfo->inflightFeatures?></p>
                                </div>
                                <div class="tab-pane fade" id="flgiht-seat-selection">
                                    <h2><?php echo $this->translate('Select your Seats')?></h2>
                                    <p><?php echo $this->flightInfo->seatSelection?></p>
                                </div>
                                <div class="tab-pane fade" id="flight-baggage">
                                    <h2><?php echo $this->translate('Basic Information')?></h2>
                                    <p><?php echo $this->flightInfo->baggage?></p>
                                </div>
                                <div class="tab-pane fade" id="flight-fare-rules">
                                    <h2><?php echo $this->translate('Fare Rules for your Flight')?></h2>
                                    <p><?php echo $this->flightInfo->fareRules?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar col-md-3">
                        <article class="detailed-logo">
                            <figure>
                                <img src="<?php echo $this->showImage('airlines', $flight->airlineId, 270, 160)?>" alt="">
                            </figure>
                            <div class="details">
                                <h2 class="box-title"><?php echo $this->route->getSrcCity() . ' ' . $this->translate('to') . ' ' . $this->route->getDstCity()?><small><?php echo $this->translate('Oneway flight')?></small></h2>
                                <span class="price clearfix">
                                    <small class="pull-left"><?php echo $this->translate('avg/person')?></small>
                                    <span class="pull-right"><?php echo $this->price($this->route->price)?></span>
                                </span>
                                
                                <div class="duration">
                                    <i class="soap-icon-clock"></i>
                                    <dl>
                                        <dt class="skin-color"><?php echo $this->translate('Total Time')?>:</dt>
                                        <dd><?php echo $this->duration($this->route->duration, true)?></dd>
                                    </dl>
                                </div>
                                
                                <p class="description"><?php echo $this->limitText($this->flightInfo->description, 100)?></p>
                                <?php if(Zend_Auth::getInstance()->hasIdentity()):?>
                                <a href="<?php echo $this->url(array('flightId' => $this->route->id), 'booking')?>" class="button green full-width uppercase btn-medium"><?php echo $this->translate('book flight now')?></a>
                                <?php else:?>
                                <a href="#travelo-login" class="soap-popupbox button green full-width uppercase btn-medium"><?php echo $this->translate('book flight now')?></a>
                                <?php endif?>
                            </div>
                        </article>
                        <div class="travelo-box contact-box">
                            <h4><?php echo $this->translate('Need Flights Help?')?></h4>
                            <p><?php echo $this->translate('We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.')?></p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                                <br>
                                <a class="contact-email" href="#">help@flights.com</a>
                            </address>
                        </div>
                        <div class="travelo-box book-with-us-box">
                            <h4><?php echo $this->translate('Why Book with us?')?></h4>
                            <ul>
                                <li>
                                    <i class="soap-icon-hotel-1 circle"></i>
                                    <h5 class="title"><?php echo $this->translate('135,00+ Flights')?></h5>
                                    <p><?php echo $this->translate('Nunc cursus libero pur congue arut nimspnty.')?></p>
                                </li>
                                <li>
                                    <i class="soap-icon-savings circle"></i>
                                    <h5 class="title"><?php echo $this->translate('Low Rates &amp; Savings')?></h5>
                                    <p><?php echo $this->translate('Nunc cursus libero pur congue arut nimspnty.')?></p>
                                </li>
                                <li>
                                    <i class="soap-icon-support circle"></i>
                                    <h5 class="title"><?php echo $this->translate('Excellent Support')?></h5>
                                    <p><?php echo $this->translate('Nunc cursus libero pur congue arut nimspnty.')?></p>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        