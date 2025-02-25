<div class="page-title-container">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title"><?php echo $this->translate('Account Activation')?></h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="/"><?php echo $this->translate('HOME')?></a></li>
            <li class="active"><?php echo $this->translate('Account Activation')?></li>
        </ul>
    </div>
</div>
<section id="content" class="gray-area">
    <div class="container">
        <div class="row">
            <div id="main" class="col-sm-8 col-md-9">
                <div class="booking-information travelo-box">
                    <h2><?php echo $this->translate('Account Activation')?></h2>
                    <hr />
                    <?php if($this->userActivated):?>
                    <div class="booking-confirmation clearfix">
                        <i class="soap-icon-recommend icon circle"></i>
                        <div class="message">
                            <h4 class="main-message"><?php echo $this->translate('Thank You. Your account has been activated.')?></h4>
                            <p><?php echo $this->translate('You can use your account now.')?></p>
                        </div>
                    </div>
                    <?php else:?>
                    <div class="booking-confirmation clearfix">
                        <i class="soap-icon-restricted icon circle" style="color:red"></i>
                        <div class="message">
                            <h4 class="main-message"><?php echo $this->translate('Activation failed.')?></h4>
                            <p><?php echo $this->translate('Link is invalid or activation code has been expired')?></p>
                        </div>
                    </div>
                    <?php endif?>
                </div>
            </div>
           
           <div class="sidebar col-md-3">
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