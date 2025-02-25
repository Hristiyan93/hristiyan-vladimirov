<div class="page-title-container">
    <div class="container">
    	<div class="page-title pull-left">
            <h2 class="entry-title"><?php echo $this->translate('Thank You')?></h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="/"><?php echo $this->translate('Home')?></a></li>
            <li><a href="/search"><?php echo $this->translate('Search Results')?></a></li>
            <li class="active"><?php echo $this->translate('Thank You')?></li>
        </ul>
    </div>
</div>

<section id="content" class="gray-area">
    <div class="container">
        <div class="row">
            <div id="main" class="col-sm-8 col-md-9">
                <div class="booking-information travelo-box">
                    <h2><?php echo $this->translate('Booking Confirmation')?></h2>
                    <hr />
                    <div class="booking-confirmation clearfix">
                        <i class="soap-icon-recommend icon circle"></i>
                        <div class="message">
                            <h4 class="main-message"><?php echo $this->translate('Thank You. Your Booking Order is Confirmed Now.')?></h4>
                            <p><?php echo $this->translate('A confirmation email has been sent to your provided email address.')?></p>
                        </div>
                    </div>
                    <hr />
                    <h2><?php echo $this->translate('Traveler Information')?></h2>
                    <?php
                    $firstPassenger = true;
                    foreach($this->booking->getPassangers() as $passanger):?>
                    <dl class="term-description">
                    	<?php if($firstPassenger):?>
                        <dt><?php echo $this->translate('Booking number')?>:</dt><dd><?php echo $this->booking->getBookId()?></dd>
                        <?php endif;?>
                        <dt><?php echo $this->translate('First name')?>:</dt><dd><?php echo $passanger->firstname?></dd>
                        <dt><?php echo $this->translate('Last name')?>:</dt><dd><?php echo $passanger->lastname?></dd>
                        <dt><?php echo $this->translate('Passport')?>:</dt><dd><?php echo $passanger->passport?></dd>
                        <dt><?php echo $this->translate('Expire Date')?>:</dt><dd><?php echo date('d/m/Y', strtotime($passanger->expire))?></dd>
                        <?php if($firstPassenger):?>
                        <dt><?php echo $this->translate('Address')?>:</dt><dd><?php echo $passanger->street?></dd>
                        <dt><?php echo $this->translate('City')?>:</dt><dd><?php echo $passanger->town?></dd>
                        <dt><?php echo $this->translate('Zip Code')?>:</dt><dd><?php echo $passanger->zip?></dd>
                        <dt><?php echo $this->translate('Country')?>:</dt><dd><?php echo $passanger->country?></dd>
                        <?php $firstPassenger = false?>
                        <?php endif;?>
                    </dl>
                    <hr />
                    <?php endforeach;?>
                    <h2><?php echo $this->translate('Payment')?></h2>
                    <p><?php echo $this->translate('Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat.')?></p>
                    <br />
                    <p class="red-color"><?php echo $this->translate('Payment is made by Credit Card Via Paypal.')?></p>
                </div>
            </div>
            <div class="sidebar col-sm-4 col-md-3">
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