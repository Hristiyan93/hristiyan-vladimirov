<div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title"><?php echo $this->translate('My Account')?></h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="/"><?php echo $this->translate('Home')?></a></li>
                    <li class="active"><?php echo $this->translate('My Account')?></li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div id="main">
                    <div class="tab-container full-width-style arrow-left dashboard">
                        <ul class="tabs">
                        	<li class="active"><a data-toggle="tab" href="#booking"><i class="soap-icon-businessbag circle"></i><?php echo $this->translate('Bookings')?></a></li>
                            <li class=""><a data-toggle="tab" href="#profile"><i class="soap-icon-user circle"></i><?php echo $this->translate('Profile')?></a></li>
                            <li class=""><a data-toggle="tab" href="#settings"><i class="soap-icon-settings circle"></i><?php echo $this->translate('Settings')?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="profile" class="tab-pane fade">
                                <div class="view-profile">
                                    <article class="image-box style2 box innerstyle personal-details">
                                        <figure>
                                            <a title="" href="#"><img width="270" height="263" alt="" src="<?php echo $this->showImage('users', $this->user->id, 270, 263)?>"></a>
                                        </figure>
                                        <div class="details">
                                            <a href="#" class="button btn-mini pull-right edit-profile-btn"><?php echo $this->translate('EDIT PROFILE')?></a>
                                            <h2 class="box-title fullname"><?php echo $this->user->getFullname()?></h2>
                                            <dl class="term-description">
                                                <dt><?php echo $this->translate('user name')?>:</dt><dd><?php echo $this->user->username?></dd>
                                                <dt><?php echo $this->translate('first name')?>:</dt><dd><?php echo $this->user->firstname?></dd>
                                                <dt><?php echo $this->translate('last name')?>:</dt><dd><?php echo $this->user->lastname?></dd>
                                                <dt><?php echo $this->translate('Address')?>:</dt><dd><?php echo $this->user->street?></dd>
                                                <dt><?php echo $this->translate('Town / City')?>:</dt><dd><?php echo $this->user->town?></dd>
                                                <dt><?php echo $this->translate('ZIP code')?>:</dt><dd><?php echo $this->user->zip?></dd>
                                                <dt><?php echo $this->translate('Country')?>:</dt><dd><?php echo $this->user->country?></dd>
                                            </dl>
                                        </div>
                                    </article>
                                    <hr>
                                    <h2><?php echo $this->translate('About You')?></h2>
                                        <div class="intro">
                                        <p><?php echo $this->user->about?></p>
                                    </div>
                                </div>
                                <div class="edit-profile">
                                    <form class="edit-profile-form" id="profile-form" enctype="multipart/form-data" method="post">
                                        <h2><?php echo $this->translate('Personal Details')?></h2>
                                        <div class="col-sm-9 no-padding no-float">
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label><?php echo $this->translate('First Name')?></label>
                                                    <?php echo $this->formText('user[firstname]', $this->user->firstname, array('class' => 'input-text full-width'))?>
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label><?php echo $this->translate('Last Name')?></label>
                                                    <?php echo $this->formText('user[lastname]', $this->user->lastname, array('class' => 'input-text full-width'))?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label><?php echo $this->translate('Email Address')?></label>
                                                    <?php echo $this->formText('user[email]', $this->user->email, array('class' => 'input-text full-width'))?>
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label><?php echo $this->translate('Verify Email Address')?></label>
                                                    <?php echo $this->formText('confirm_email', null, array('class' => 'input-text full-width'))?>
                                                </div>
                                            </div>
                                            
                                            <hr>
                                            <h2><?php echo $this->translate('Contact Details')?></h2>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label><?php echo $this->translate('Address')?></label>
                                                    <?php echo $this->formText('user[street]', $this->user->street, array('class' => 'input-text full-width'))?>
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label><?php echo $this->translate('City')?></label>
                                                    <?php echo $this->formText('user[town]', $this->user->town, array('class' => 'input-text full-width'))?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label><?php echo $this->translate('Zip Code')?></label>
                                                    <?php echo $this->formText('user[zip]', $this->user->zip, array('class' => 'input-text full-width'))?>
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label><?php echo $this->translate('Country')?></label>
                                                    <div class="selector">
                                                    	<?php echo $this->countryList('user[country]', $this->user->country, array('class' => 'full-width'))?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h2><?php echo $this->translate('Upload Profile Photo')?></h2>
                                            <div class="row form-group">
                                                <div class="col-sms-12 col-sm-6 no-float">
                                                    <div class="fileinput full-width">
                                                        <input name="photo" type="file" class="input-text" data-placeholder="select image/s">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h2><?php echo $this->translate('Describe Yourself')?></h2>
                                            <div class="form-group">
                                            	<?php echo $this->formTextarea('user[about]', $this->user->about, array(
                                            	    'class' => 'input-text full-width',
                                            	    'placeholder' => $this->translate('please tell us about you'),
                                            	    'rows' => 5
                                            	))?>
                                            </div>
                                            <div class="from-group">
                                                <button name="update-user" value="update" type="submit" class="btn-medium col-sms-6 col-sm-4"><?php echo $this->translate('UPDATE SETTINGS')?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="booking" class="tab-pane fade in active">
                                <h2><?php echo $this->translate('Trips You have Booked!')?></h2>
                                <div class="filter-section gray-area clearfix">
                                        <div class="pull-right col-md-6 action">
                                            <h5 class="pull-left no-margin col-md-4"><?php echo $this->translate('Sort results by')?>:</h5>
                                            <button class="btn-small white gray-color"><?php echo $this->translate('UPCOMING')?></button>
                                            <button class="btn-small white gray-color"><?php echo $this->translate('CANCELLED')?></button>
                                        </div>
                                </div>
                                <div class="booking-history">
                                	<?php foreach($this->bookings as $booking):?>
                                	<?php if($booking->status==Models_Bookings::STATUS_BOOKED):?>
                                    <div class="booking-info clearfix">
                                    <?php else:?>
                                    <div class="booking-info clearfix cancelled">
                                    <?php endif?>
                                        <div class="date">
                                            <label class="month"><?php echo date('M', strtotime($booking->departure))?></label>
                                            <label class="date"><?php echo date('d', strtotime($booking->departure))?></label>
                                            <label class="day"><?php echo date('D', strtotime($booking->departure))?></label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-plane-right takeoff-effect yellow-color circle"></i>
                                        	<?php echo $booking->getSrcCity() . ' ' . $this->translate('to') . ' ' . $booking->getDstCity()?>
                                        	<small><?php echo $this->translate('you are flying')?></small></h4>
                                        <dl class="info">
                                            <dt><?php echo $this->translate('TRIP ID')?></dt>
                                            <dd><?php echo $booking->getBookId()?></dd>
                                            <dt><?php echo $this->translate('booked on')?></dt>
                                            <dd><?php echo date('l, M d, Y', strtotime($booking->date))?></dd>
                                        </dl>
                                        <?php if($booking->status==Models_Bookings::STATUS_BOOKED && strtotime($booking->departure)>time()):?>
                                        <button data-id="<?php echo $booking->id?>" class="btn-mini status red cancel-booking"><?php echo $this->translate('CANCEL')?></button>
                                        <?php endif?>
                                    </div>
                                    <?php endforeach;?>
                                </div>

                            </div>
                            <div id="settings" class="tab-pane fade">
                                <h2><?php echo $this->translate('Account Settings')?></h2>
                                <h5 class="skin-color"><?php echo $this->translate('Change Your Password')?></h5>
                                <form id="password-form" method="post">
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label><?php echo $this->translate('Old Password')?></label>
                                            <?php echo $this->formPassword('oldPassword', null, array('class' => 'input-text full-width'))?>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label><?php echo $this->translate('Enter New Password')?></label>
                                            <?php echo $this->formPassword('password', null, array('class' => 'input-text full-width'))?>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label><?php echo $this->translate('Confirm New password')?></label>
                                            <?php echo $this->formPassword('confirm_password', null, array('class' => 'input-text full-width'))?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button name="update-pass" value="update" type="submit" class="btn-medium"><?php echo $this->translate('UPDATE PASSWORD')?></button>
                                    </div>
                                </form>
                                <h2><?php echo $this->translate('Delete Account')?></h2>
                                <h5 class="skin-color"><?php echo $this->translate('Unregister with the system')?></h5>
                                <form id="delete-form" method="post">
                                    <div class="form-group">
                                        <button name="delete-account" value="delete" type="submit" class="red btn-medium"><?php echo $this->translate('DELETE ACCOUNT')?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
<form id="cancel-form" method="post" action="/settings/cancel-booking">
<?php echo $this->formHidden('bookId')?>
</form>
<?php $this->inlineScript()->appendScript('
tjq(document).ready(function() {
        tjq(".cancel-booking").click(function(e){
            e.preventDefault();
            if(window.confirm("' . $this->translate('Are you sure?') . '")){
                tjq("#bookId").val(tjq(this).data("id"));
                tjq("#cancel-form").submit()
            }
        })
        tjq("#delete-form").submit(function(e){
            if(window.confirm("' . $this->translate('Are you sure?') . '")){
            }else{
                e.preventDefault();
            }
        })
            tjq("#profile .edit-profile-btn").click(function(e) {
                e.preventDefault();
                tjq(".view-profile").fadeOut();
                tjq(".edit-profile").fadeIn();
            });
        });
        tjq(\'a[href="#profile"]\').on(\'shown.bs.tab\', function (e) {
            tjq(".view-profile").show();
            tjq(".edit-profile").hide();
        });
        tjq("#profile-form").validate({
			rules: {
				confirm_email: {
					required: true,
					equalTo: "#user-email"
				}
			},
			messages: {
				confirm_email: {
					required: "'. $this->translate('Please enter email again') .'",
					equalTo: "'. $this->translate('Both emails not match') . '"
				}
			}
		});
        tjq("#password-form").validate({
    			rules: {
    				"oldPassword": "required",
    				"password": "required",
    				confirm_password: {
    					required: true,
    					equalTo: "#password"
    				}
    			},
    			messages: {
    				"password": "' . $this->translate('Please provide password') .'",
    				confirm_password: {
    					required: "'. $this->translate('Please enter password again') .'",
    					equalTo: "'. $this->translate('Both passwords not match') . '"
    				}
    			}
    		});
');?>