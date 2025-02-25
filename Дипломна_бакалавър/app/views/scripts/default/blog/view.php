<div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title"><?php echo $this->item->title?></h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="/"><?php echo $this->translate('Home')?></a></li>
                    <li class="active"><?php echo $this->item->title?></li>
                </ul>
            </div>
        </div>

        <section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="post">
                            <figure class="image-container">
                                <img src="<?php echo $this->item->hasImage()?$this->item->getImageUrl():'http://placehold.it/870x342'?>" alt="" width="870" height="342" />
                            </figure>
                            <div class="details">
                                <h1 class="entry-title"><?php echo $this->item->title?></h1>
                                <div class="post-content">
                                    <p><?php echo $this->item->content?></p>
                                </div>
                                <div class="post-meta">
                                    <div class="entry-date">
                                        <label class="date"><?php echo date('d', strtotime($this->item->date))?></label>
                                        <label class="month"><?php echo date('M', strtotime($this->item->date))?></label>
                                    </div>
                                    <div class="entry-author fn">
                                        <i class="icon soap-icon-user"></i> Posted By:
                                        <a href="#" class="author"><?php echo $this->item->getAuthor()->getFullname()?></a>
                                    </div>
                                </div>
                            </div>
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