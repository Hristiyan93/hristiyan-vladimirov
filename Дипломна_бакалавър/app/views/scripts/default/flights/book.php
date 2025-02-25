<div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Flight Booking</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="/"><?php echo $this->translate('Home')?></a></li>
                    <li><a href="/search"><?php echo $this->translate('Search Results')?></a></li>
                    <li><a href="<?php echo $this->url(array('flightId'=>$this->route->id), 'flight', true)?>"><?php echo $this->translate('Flight Detailed')?></a></li>
                    <li class="active"><?php echo $this->translate('Flight Booking')?></li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                        <div class="booking-section travelo-box">
                        	<?php if($this->error):?>
                        	<div class="alert alert-error">
                                <?php echo $this->error?>
                                <span class="close"></span>
                            </div>
                            <?php endif?>
                            <form id="book-form" class="booking-form" method="post">
                            <?php echo $this->formHidden('flightId', $this->route->id)?>
                            	
                                
                                <div class="persons-container">
                                <?php
                                $isFirst = true;
                                $id = 0;
                                foreach($this->users as $user):?>
                                <div class="person">
                                <div class="person-information">
                                	<?php if($isFirst):?>
									<h2><?php echo $this->translate('Your Personal Information')?></h2>
									<?php else:?>
									<h2 style="float: left"><?php echo $this->translate('Passenger')?></h2>
                            		<label style="float: right"><i class="soap-icon-man-3"></i><a href="#"
                            			class="remove-person"> - <?php echo $this->translate('Remove Passenger')?></a></label>
                            		<div style="clear: both"></div>
									<?php endif?>
									<div class="form-group row">
									    <div class="col-sm-6 col-md-5">
									        <label><?php echo $this->translate('first name')?></label>
									       	<?php echo $this->formText('passanger['.$id.'][firstname]', $user['firstname'], array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required'
									       	))?>
									    </div>
									    <div class="col-sm-6 col-md-5">
									        <label><?php echo $this->translate('last name')?></label>
									        <?php echo $this->formText('passanger['.$id.'][lastname]', $user['lastname'], array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required'
									       	))?>
									    </div>
									</div>
									<div class="form-group row">
									    <div class="col-sm-6 col-md-5">
									        <label><?php echo $this->translate('Passport /ID Number')?></label>
									        <?php echo $this->formText('passanger['.$id.'][passport]', $user['passport'], array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required'
									       	))?>
									    </div>
									    <div class="col-sm-6 col-md-5">
									        <label><?php echo $this->translate('Passport / ID expiration date')?></label>
									        <div class="datepicker-wrap">
									        	<?php echo $this->formText('passanger['.$id.'][expire]', $user['expire'], array(
    									       	    'class' => 'input-text full-width',
									        	    'placeholder' => 'mm/dd/yy',
									       	    'required' => 'required'
    									       	))?>
											</div>
									    </div>
									</div>
									<?php if($isFirst):$isFirst = false;?>
									<div class="form-group row">
									    <div class="col-sm-6 col-md-5">
									        <label><?php echo $this->translate('Address')?></label>
									        <?php echo $this->formText('passanger['.$id.'][street]', $user['street'], array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required'
									       	))?>
									    </div>
									    <div class="col-sm-6 col-md-5">
    								        <label><?php echo $this->translate('Zip Code')?></label>
								        	<?php echo $this->formText('passanger['.$id.'][zip]', $user['zip'], array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required'
									       	))?>
									    </div>
									</div>
									
									<div class="form-group row">
									    <div class="col-sm-6 col-md-5">
									        <label><?php echo $this->translate('City')?></label>
									        <?php echo $this->formText('passanger['.$id.'][town]', $user['town'], array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required'
									       	))?>
									    </div>
									    <div class="col-sm-6 col-md-5">
									        <label><?php echo $this->translate('Country')?></label>
								        	<?php echo $this->countryList('passanger['.$id.'][country]', $user['country'], array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required'
									       	))?>
								    	</div>
									</div>
									<div class="form-group">
										<label>
											<i class="soap-icon-man-3"></i>
									        <a href="javascript:void(0)" class="add-person"> + <?php echo $this->translate('Add another person')?></a>
										</label>
									</div>
									<?php endif?>
								</div>
                                <hr />
                                </div>
                                <?php endforeach;?>
                                </div>
                                
                                <div class="card-information">
                                    <h2><?php echo $this->translate('Your Card Information')?></h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label><?php echo $this->translate('Card holder firstname')?></label>
                                            <?php echo $this->formText('payment[firstname]', null, array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required'
									       	))?>
                                        </div>
                                         <div class="col-sm-6 col-md-5">
                                            <label><?php echo $this->translate('Card holder lastname')?></label>
                                            <?php echo $this->formText('payment[lastname]', null, array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required'
									       	))?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    	<div class="col-sm-6 col-md-5">
                                            <label><?php echo $this->translate('Credit Card Type')?></label>
                                            <div class="selector">
                                                <?php echo $this->formSelect('payment[cardType]', null, array(
                                                	    'class' => 'full-width'
                                                	),array('visa' => 'Visa', 'mastercard' => 'MasterCard', 'discover' => 'Discover', 'amex' => 'American Express'))?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label><?php echo $this->translate('Expiration Date')?></label>
                                            <div class="constant-column-2">
                                                <div class="selector">
                                                	<?php echo $this->formSelect('payment[expireMonth]', date('m') - 1, array(
                                                	    'class' => 'full-width'
                                                	), range(1,12))?>
                                                </div>
                                                <div class="selector">
                                                	<?php echo $this->yearSelect('payment[expireYear]', null, array(
                                                	    'class' => 'full-width'))?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label><?php echo $this->translate('Card number')?></label>
                                            <?php echo $this->formText('payment[cardNumber]', null, array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required'
									       	))?>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label><?php echo $this->translate('Card identification number')?></label>
                                            <?php echo $this->formText('payment[cardCcv]', null, array(
									       	    'class' => 'input-text full-width',
									       	    'required' => 'required',
                                                'maxlength' => 4
									       	))?>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <button type="submit" class="full-width btn-large"><?php echo $this->translate('MAKE BOOKING')?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                        <div class="booking-details travelo-box">
                            <h4><?php echo $this->translate('Booking Details')?></h4>
                            <article class="flight-booking-details">
                                <figure class="clearfix">
                                    <a title="" href="flight-detailed.html" class="middle-block"><img style="width:75px" class="middle-item" alt="" src="<?php echo $this->showImage('airlines', $this->flight->airlineId, 75, 75)?>"></a>
                                    <div class="travel-title">
                                        <h5 class="box-title"><?php echo $this->route->getSrcCity() . ' ' . $this->translate('to') . ' ' . $this->route->getDstCity()?><small><?php echo $this->translate('Oneway flight')?></small></h5>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="constant-column-3 timing clearfix">
                                        <div class="check-in">
                                            <label><?php echo $this->translate('Take off')?></label>
                                            <span><?php echo date('D M d', strtotime($this->route->departure))?><br /><?php echo date('H:i A', strtotime($this->route->departure))?></span>
                                        </div>
                                        <div class="duration text-center">
                                            <i class="soap-icon-clock"></i>
                                            <span><?php echo $this->duration($this->route->duration)?></span>
                                        </div>
                                        <div class="check-out">
                                            <label><?php echo $this->translate('landing')?></label>
                                            <span><?php echo date('D M d', strtotime($this->route->arrival))?><br /><?php echo date('H:i A', strtotime($this->route->arrival))?></span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                            <h4><?php echo $this->translate('Other Details')?></h4>
                            <dl class="other-details">
                                <dt class="feature"><?php echo $this->translate('Airline')?>:</dt><dd class="value"><?php echo $this->flight->getAirline()?></dd>
                                <dt class="feature"><?php echo $this->translate('Flight type')?>:</dt><dd class="value"><?php echo $this->flight->flightType?></dd>
                                <dt class="total-price"><?php echo $this->translate('Price')?></dt><dd class="total-price-value"><?php echo $this->price($this->route->price * count($this->users))?></dd>
                            </dl>
                        </div>
                        
                        <div class="travelo-box contact-box">
                            <h4><?php echo $this->translate('Need Flights Help?')?></h4>
                            <p><?php echo $this->translate('We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.')?></p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                                <br>
                                <a class="contact-email" href="#">help@flights.com</a>
                            </address>
                        </div>
                        
                    </div>
                </div>
            
            </div>
        </section>
        
        
<script type="text/template" id="booking-template">
<div class="person">
	<div class="person-information">
		<h2 style="float: left"><?php echo $this->translate('Passenger')?></h2>
		<label style="float: right"><i class="soap-icon-man-3"></i><a href="#"
			class="remove-person"> - <?php echo $this->translate('Remove Passenger')?></a></label>
		<div style="clear: both"></div>
		<div class="form-group row">
			<div class="col-sm-6 col-md-5">
				<label><?php echo $this->translate('first name')?></label>
		       	<?php echo $this->formText('passanger[{{id}}][firstname]', null, array(
                    'class' => 'input-text full-width',
                    'required' => 'required'
                ))?>
			</div>
			<div class="col-sm-6 col-md-5">
				<label><?php echo $this->translate('last name')?></label>
				<?php echo $this->formText('passanger[{{id}}][lastname]', null, array(
                    'class' => 'input-text full-width',
                    'required' => 'required'
                ))?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 col-md-5">
				<label><?php echo $this->translate('Passport /ID Number')?></label>
				<?php echo $this->formText('passanger[{{id}}][passport]', null, array(
                    'class' => 'input-text full-width',
                    'required' => 'required'
                ))?>
			</div>
			<div class="col-sm-6 col-md-5">
				<label><?php echo $this->translate('Passport / ID expiration date')?></label>
				<div class="datepicker-wrap">
				<?php echo $this->formText('passanger[{{id}}][expire]', null, array(
                    'class' => 'input-text full-width',
                    'placeholder' => 'mm/dd/yy',
                    'required' => 'required'
                ))?>
			</div>
			</div>
		</div>
	</div>
	<hr />
</div>
</script>

<?php $this->inlineScript()->appendFile("/admin/js/underscore-min.js");?>
<?php
$currency = Models_Rates::getCurrentCurrency();

$this->inlineScript()->appendScript('
tjq(document).ready(function() {
        var currencySymbol = "' . $currency["symbol"] . '";
        var price = ' . $this->route->price . ';
        var currentPrice = ' . $this->route->price*count($this->users) . ';
		_.templateSettings = {
			interpolate: /\{\{(.+?)\}\}/g
		};
		var template = _.template(tjq("#booking-template").html());
		var id = ' . count($this->users) . ';
		tjq(".add-person").click(function(e){
			var el = tjq(template({id: ++id}))
			tjq(".persons-container").append(el)
            el.find(".remove-person").click(function(e){
                e.preventDefault();
                tjq(this).closest(".person").remove();
                currentPrice-=price;
                tjq(".total-price-value").html(currencySymbol+currentPrice.toFixed(2));
            })
            currentPrice+=price;
            tjq(".total-price-value").html(currencySymbol+currentPrice.toFixed(2));
            tjq(".datepicker-wrap input").datepicker({
                showOn: "button",
                buttonImage: "/images/icon/blank.png",
                buttonText: "",
                buttonImageOnly: true,
                minDate: 0,
                dayNamesMin: ["S", "M", "T", "W", "T", "F", "S"],
                beforeShow: function(input, inst) {
                    var themeClass = tjq(input).parent().attr("class").replace("datepicker-wrap", "");
                    tjq("#ui-datepicker-div").attr("class", "");
                    tjq("#ui-datepicker-div").addClass("ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all");
                    tjq("#ui-datepicker-div").addClass(themeClass);
                }
            });
		})
        tjq("#book-form").validate();
        jQuery.extend(jQuery.validator.messages, {required: "' . $this->translate('This field is required.') . '"});
        tjq(".remove-person").click(function(e){
            e.preventDefault();
            tjq(this).closest(".person").remove();
            currentPrice-=price;
            tjq(".total-price-value").html(currencySymbol+currentPrice.toFixed(2));
        })
});');?>

