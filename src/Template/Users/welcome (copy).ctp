<?= $this->Flash->render(); ?>
<style type="text/css">
    /*new code*/
    .btn-success.disabled, .btn-success[disabled]{
        background-color: #e9aed7;
        border-color: #f0cae4;
    }
    .address
    {
        width: 100%;
        float: left;
        text-align: center;
        display: inline-block;
    }
    .address-box 
    {
        width: 50%;
        text-align: left;
        display: inline-block;
    }
    .address-box, .add-address h2
    {
        margin: 15px 0px;
        padding: 0;
        text-align: left;
        font-size: 20px;
        font-weight: 700;
    }
    .address-box h3
    {
        margin: 15px 0px;
        padding: 0;
        font-size: 17px;
        font-weight: 700;
        display: inline-block;
    }
    .address-box p
    {
        width: 95%;
        font-size: 14px;
        font-weight: bold;
    }
    .address-box label
    {
        width: 100%;
        font-size: 14px;
        margin-top: 5px;
        font-weight: 600;
        display: inline-block;
    }
    .address-box select
    {
        width: 100%;
        float: left;
        background: #ececec;
        padding: 5px 10px;
        margin-bottom: 10px;
        border-radius: 3px;
        border: 1px solid #9a9a9a;
    }
    .address-box input
    {
        width: 100%;
        float: left;
        margin-bottom: 5px;
        padding: 5px 10px;
        border-radius: 3px;
        border: 1px solid #9a9a9a;
    }
    .address-box button 
    {
        display: inline-block;
        background: #d64ade;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 2px;
        color: #fff;
        font-size: 17px;
        padding: 11px 43px;
        border-radius: 25px;
        margin-top: 10px;
        transition: 500ms all ease-in-out 0s;
    }
    .address-box button:hover
    {
        border: 1px solid #333;
        background: #333;
        color: #fff;
    }
    .address-box, .add-address span
    {
        font-size: 14px;
        color: #4c4c4c;
        font-weight: normal;
    }
    .address-box span a, 
    .add-address span a
    {
        font-size: 14px;
        color: #4c4c4c;
        text-decoration: none;
    }
    .add-address
    {
        width: 100%;
        float: left;
        text-align: left;
        margin: 15px 0px;
    }
    .add-address ul
    {
        margin: 0;
        padding: 0;
        display: inline-block;
    }
    .add-address ul li 
    {
        width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 15px 20px;
        margin-left: 30px;
        text-align: left;
        border-radius: 3px;
        border: 2px solid #ccc;
    }
    .add-address ul li h4
    {
        padding: 0;
        margin: 0;
        margin-bottom: 5px;
        text-align: left;
        color: #000;
        font-size: 15px;
        font-weight: 700;
        display: inline-block;
    }
    .add-address ul li i
    {
        width: 100%;
        font-size: 50px;
        color: #ccc;
    }
    .add-address ul li h3
    {
        margin: 15px 0px;
        padding: 0;
        color: #ccc;
        font-size: 20px;
        font-weight: 700;
        display: inline-block;
    }
    .add-address ul li p
    {
        margin: 3px 0px;
        padding: 0;
        font-size: 13px;
        line-height: 19px;
        font-weight: 600;
    }
    .add-address ul li span
    {
        font-size: 12px;
        margin-top: 50px;
        display: inline-block;
    }
    .add-address ul li span a
    {
        color: #0089ff;
        font-size: 13px;
    }
    .add-address ul li:first-child
    {
        width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 65px;
        margin-left: 0px;
        text-align: center;
        border-radius: 3px;
        border: 2px dashed #ccc;
    }
    .add-address ul li:nth-child(3n+1) {
        width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 15px 20px !IMPORTANT;
        margin-left: 0px;
        text-align: center;
        border-radius: 3px;
        border: 2px solid #ccc;
        margin-top: 20px;
    }
    /*new code*/
    .hide{
        display: none;
    }
    .active{
        display: block;
    }

    .tooltip{  position:relative;float:right;}
    .tooltip > .tooltip-inner {background-color: #eebf3f; padding:5px 15px; color:rgb(23,44,66); font-weight:bold; font-size:13px;}
    .popOver + .tooltip > .tooltip-arrow {border-left: 5px solid transparent; border-right: 5px solid transparent; border-top: 5px solid #eebf3f;}

    .progress{border-radius:0; overflow:visible; height: 5px;}
    .progress-bar{
        background:rgb(23,44,60); 
        -webkit-transition: width 1.5s ease-in-out;
        transition: width 1.5s ease-in-out;
    }
    .tooltip.top {
        margin-top: 45px;
    }

    .tooltip.top .tooltip-arrow {
        top: 0px;
        left: 50%;
        margin-left: -5px;
        border-width: 5px 5px 0;
        border-bottom-color: #000 !important;
    }
    .popOver + .tooltip > .tooltip-arrow {
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 5px solid #efc556 !important;
        border-top:none !important;
    }
    .payment-btn1:disabled{
        opacity: 0.2;
    }
    .save-card h3 {
        font-size: 17px;
        color: #000;
        text-align: left;
        font-weight: bold;
        margin-bottom: 0px;
    }
    .save-card h3 span{     font-size: 15px;
                            display: inline-block;
                            width: 31%;
                            float: right;}
    .content_accordion{ float: left; width: 100%; text-align: left;}
    .content_accordion .panel-heading h4{ position: relative;border: 1px solid #d6d6d6;

                                          box-shadow: none;

                                          background: none;}
    .content_accordion .panel-heading h4 .expair {
        float: right;
        width: 30%;
        font-size: 13px;
        padding-top: 5px;
    }
    .content_accordion .panel-heading h4 span { display: inline-block; margin-left: 19px; position: relative; top: 1px; font-size: 13px;}
    .content_accordion .panel-heading h4 img{ width: 38px;}
    .content_accordion .panel-heading h4 .fas{ position:absolute;     right: 20px;
                                               top: 15px; float: right;font-size: 25px; transition: 500ms all ease-in-out 0s;}
    .content_accordion .panel-heading h4 a.collapsed .fas{ transition: 500ms all ease-in-out 0s; transform: rotate(180deg);}
    .panel-body h4{ font-weight: bold; font-size: 17px; color: #000;}
    .panel-body-left{ float: left; width:70%;}
    .panel-body-right{ float: left; width:30%;}
    .panel-body-button{ float: left; width: 100%; text-align: right;}

    .panel-body-button a {
        display: inline-block;
        background: #d64ade;
        border: 1px solid #d64ade;
        padding: 5px 26px;
        color: #fff;
        border-radius: 15px;
    }
    .panel-body-button a:hover{
        background: none;
        color: #d64ade;
    }
    .panel-body-button span {
        display: inline-block;
        background: #d64ade;
        border: 1px solid #d64ade;
        padding: 5px 26px;
        color: #fff;
        border-radius: 15px;
    }
    .panel-body-button span:hover{
        background: none;
        color: #d64ade;
        border-color: #c948d0;
    }
    .payment-method{
        float: left;
        width: 100%;
        text-align: left;
    }
    .payment-method-box{
        float: left;
        width: 100%;
    }
    .payment-method-box h4{ color: #000; float: left;}
    .payment-method-box h4 span{
        display: block;
        color: #000;
        font-weight: normal;
        font-size: 15px;
        color: #616161;
        margin-top: 10px;
    }
    .payment-method-box img{ float: right;}
    .panel-default > .panel-heading + .panel-collapse > .panel-body {

        border-top-color: #EEEEEE;
        border: 1px solid #c8c8c8;

    }
    .payment-method h3{
        border-bottom: 1px solid #ccc;
        margin-bottom: 15px;
        padding-bottom: 6px;
        font-size: 21px;
    }
    #demo ul{ display: inline-block; width: 100%;}
    #demo ul li{ display: inline-block; width: 24%;}
    #demo ul li label {

        width: 100%;
        margin-bottom: 7px;
        font-size: 15px;

    }
    #demo ul li:nth-child(3){ width:135px;}
    #demo ul li input[type="submit"]{
        background: #d64ade;
        color: #fff;
        border: 1px solid #a616ae;
        border-radius: 4px;
        padding: 3px 17px 4px;
    }
    #demo{ padding-top: 14px;}
    .add-new{ cursor: pointer;}
</style>
<div class="style-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <?php if ($this->request->session()->read('PROFILE') == 'KIDS') { ?>
                    <?php echo $this->element('frontend/profile_menu_kid') ?>
                <?php } else if ($this->request->session()->read('PROFILE') == 'MEN') { ?>
                    <?php echo $this->element('frontend/profile_menu_men') ?>
                <?php } else if ($this->request->session()->read('PROFILE') == 'WOMEN') { ?>
                    <?php echo $this->element('frontend/profile_menu_women') ?>
                <?php } ?>


            </div>
        </div>
    </div>
</div>
<div class="pogress-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progressbar_count->is_progressbar; ?>" aria-valuemin="0" aria-valuemax="50" >   

                        <span  class="popOver" data-toggle="tooltip" data-placement="top" title="<?php echo $progressbar_count->is_progressbar; ?>%"> </span>     

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if ($slug == 'schedule') {
    if ($this->request->session()->read('PROFILE') == 'KIDS') {
        ?>

        <div class="schedule">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <h1>How often would you like to receive Fixes for <?php
                            if (@$kidmenu->kids_first_name) {
                                echo $kidmenu->kids_first_name;
                            } else {
                                echo 'YOUR CHILDdd';
                            }
                            ?></h1>
                        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'sechdule')) ?>
                        <div class="receive-box">

                            <div class="checkbox checkbox-primary">
                                <input type='hidden' name='kid_id' value='<?php echo $this->request->session()->read('KID_ID'); ?>'/>
                                <input id="checkbox2" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox" <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?>checked="checked" <?php } ?>>
                                <label for="checkbox2">
                                    Save me time by sending Fixes on a schedule.

                                </label>
                            </div>

                            <ul>
                                <li>
                                    <input class="radio-box" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 1) { ?> checked <?php } else { ?> checked <?php } ?> value="1" name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixes_kid1" type="radio" >
                                    <label for="how_often_would_you_lik_fixes_kid1">
                                        <h5>Monthly Pick-Me-Up</h5>
                                        <p>Is your kid tough on clothes? Get a consistent rotation of new items with a Fix every month</p>
                                    </label>
                                </li>
                                <li>
                                    <input class="radio-box" value="2" id="how_often_would_you_lik_fixes2" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 2) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes" type="radio">
                                    <label for="how_often_would_you_lik_fixes2">
                                        <h5>Timely Refresh</h5>
                                        <h6>Most Popular</h6>
                                        <p> Kids grow fast! Keep up with their growth spurts with a Fix every 2 months.</p>
                                    </label>
                                </li>
                                <li>
                                    <input class="radio-box" value="3" id="how_often_would_you_lik_fixes_kid3" type="radio" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes">
                                    <label for="how_often_would_you_lik_fixes_kid3">
                                        <h5>Seasonal Stock-Up</h5>
                                        <p>Get exactly what you need for special occasions or changing weather with a Fix every 3 months.</p>
                                    </label>
                                </li>

                            </ul>
                            <p>
                                We'll send you shipments at the frequency you choose until you change it or cancel, which you may do anytime via your online account. Before each Fix is styled, you'll be charged a $20 styling fee, which will be credited to any items you choose to buy. .</p>
                            <button name="first_time_fix" value ='first_time_fix' type="Submit">CONTINUE <i class="fas fa-arrow-right"></i></button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } else {
        ?>
        <div class="schedule">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <h1>Let’s plan your first Fix!</h1>
                        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'sechdule')) ?>
                        <div class="receive-box">
                            <h2>How often would you like to receive Fixes?</h2>
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox2" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox" <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?> checked <?php } ?>>
                                <label for="checkbox2">
                                    Try new items with scheduled Fixes.

                                </label>
                            </div>

                            <ul>
                                <li>
                                    <input class="radio-box" value="1" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 1) { ?> checked <?php } ?>  name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixes1" type="radio" >
                                    <label for="how_often_would_you_lik_fixes1">
                                        <h5>Running Refresh</h5>
                                        <p>Get a rotating selection of new items with a Fix every 2-3 weeks.</p>
                                    </label>
                                </li>
                                <li>
                                    <input class="radio-box" value="2" id="how_often_would_you_lik_fixes2" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 2) { ?> checked <?php } elseif (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 0) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes" type="radio">
                                    <label for="how_often_would_you_lik_fixes2">
                                        <h5>Monthly Pick-Me-Up</h5>
                                        <p>Busy schedule? We’ll do the work & send a Fix every month.</p>
                                    </label>
                                </li>
                                <li>
                                    <input class="radio-box" value="3" id="how_often_would_you_lik_fixes3" type="radio" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes">
                                    <label for="how_often_would_you_lik_fixes3">
                                        <h5>Occasional Update</h5>
                                        <p>Build upon a solid base with a Fix every 2 months.</p>
                                    </label>
                                </li>
                                <li>
                                    <input class="radio-box"  value='4' <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 4) { ?> checked <?php } ?> id="how_often_would_you_lik_fixes4" type="radio" name="how_often_would_you_lik_fixes">
                                    <label for="how_often_would_you_lik_fixes4">
                                        <h5>Quarterly Top-Off</h5>
                                        <p>Get a fresh supply of goods with a Fix every 3 months.</p>
                                    </label>
                                </li>
                            </ul>
                            <p>
                                We'll send you shipments at the frequency you choose until you change it or cancel, which you may do anytime via your online account. Before each Fix is styled, you'll be charged a $20 styling fee, which will be credited to any items you choose to buy.</p>
                            <button name="first_time_fix" value ='first_time_fix' type="Submit">CONTINUE <i class="fas fa-arrow-right"></i></button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}
?>

<?php
if ($slug == 'reservation') {
    if ($this->request->session()->read('PROFILE') == 'KIDS') {
        ?>
        <div class="schedule reservation">
            <div class="container">
                <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'reservation')) ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="reserv-box">
                            <h1>We’ve booked a spot for your first Fix delivery!</h1>
                            <div class="date-fix-box">
                                <input type='hidden' name='date_in_time' value='<?php echo $date_in_delivary; ?>'/>
                                <input type='hidden' name='kid_id' value='<?php echo $this->request->session()->read('KID_ID'); ?>'/>
                                <a href="javascript:void[0]"> <?php echo $date_in_delivary; ?></a>
                                <p>Complete your payment and shipping information to secure your reservation within 30 minutes.</p>
                            </div>
                            <button type="submit" value='shipping_address' name='shipping_address'>Next: Shipping Address <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>        

    <?php } else if ($this->request->session()->read('PROFILE') == 'MEN') { ?> 
        <div class="schedule reservation">
            <div class="container">
                <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'reservation')) ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="reserv-box">
                            <h1>We’ve booked a spot for your first Fix delivery!</h1>
                            <div class="date-fix-box">
                                <input type='hidden' name='date_in_time' value='<?php echo $date_in_delivary; ?>'/>
                                <input type='hidden' name='user_id' value='<?php echo $this->request->getSession()->read('Auth.User.id'); ?>'/>
                                <a href="javascript:void[0]"> <?php echo $date_in_delivary; ?></a>
                                <p>Complete your payment and shipping information to secure your reservation within 30 minutes.</p>
                            </div>
                            <button type="submit" value='shipping_address' name='shipping_address'>Next: Shipping Address <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>   
    <?php } else if ($this->request->session()->read('PROFILE') == 'WOMEN') { ?>
        <div class="schedule reservation">
            <div class="container">
                <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'reservation')) ?>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="reserv-box">
                            <h1>We’ve booked a spot for your first Fix delivery!</h1>
                            <div class="date-fix-box">
                                <input type='hidden' name='date_in_time' value='<?php echo $date_in_delivary; ?>'/>
                                <input type='hidden' name='user_id' value='<?php echo $this->request->getSession()->read('Auth.User.id'); ?>'/>
                                <a href="javascript:void[0]"> <?php echo $date_in_delivary; ?></a>
                                <p>Complete your payment and shipping information to secure your reservation within 30 minutes.</p>
                            </div>
                            <button type="submit" value='shipping_address' name='shipping_address'>Next: Shipping Address <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>   
    <?php } ?>
<?php } ?>
<!-- DEBENDRA 15-01-2019 START ---->
<?php if ($slug == 'addressbook') { ?>
    <style type="text/css">
        section {
            margin: 0;
            height: auto;
        }
    </style>                    

    <section class="address">
        <div class="container">	
            <div class="row">
                <div class="col-md-12">
                    <div class="add-address">
                        <span><a href="">Your Account</a></span>
                        <h2>Add a new address</h2>
                        <ul>
                            <li>
                                <a href="<?php echo HTTP_ROOT . 'welcome/shipping/add' ?>"><i class="fas fa-plus"></i></a>
                                <h3>Add Address</h3>
                            </li>
                            <?php foreach ($useraddress_datas as $useraddress_data) { ?>
                                <li>
                                    <h4><?php echo @$useraddress_data->full_name; ?></h4>
                                    <p><?php echo @$useraddress_data->address; ?></p>
                                    <p><?php echo @$useraddress_data->address_line_2; ?></p>
                                    <p><?php echo @$useraddress_data->city; ?></p>
                                    <p><?php echo @$useraddress_data->state; ?></p>
                                    <p><?php echo @$useraddress_data->zipcode; ?></p>
                                    <span><a href="<?php echo HTTP_ROOT . 'welcome/shipping/edit/' . @$useraddress_data->id ?>">Edit</a> &nbsp|&nbsp <a href="<?php echo HTTP_ROOT . 'users/delete_address/' . @$useraddress_data->id ?>/addressbook">Delete</a> &nbsp|&nbsp <a href="<?php echo HTTP_ROOT . 'welcome/shipping/addresss/' . @$useraddress_data->id ?>"><b>Deliver to this Address</b></a> &nbsp|&nbsp</span>
                                </li>
                            <?php } ?>

                        </ul>

                    </div>
                </div>
            </div>
    </section>
<?php } ?>

<style>
    .address
    {
        width: 100%;
        float: left;
        text-align: center;
        display: inline-block;
    }
    .address-box 
    {
        width: 50%;
        text-align: left;
        display: inline-block;
    }
    .address-box, .add-address h2
    {
        margin: 15px 0px;
        padding: 0;
        text-align: left;
        font-size: 20px;
        font-weight: 700;
    }
    .address-box h3
    {
        margin: 15px 0px;
        padding: 0;
        font-size: 17px;
        font-weight: 700;
        display: inline-block;
    }
    .address-box p
    {
        width: 95%;
        font-size: 14px;
        font-weight: bold;
    }
    .address-box label
    {
        width: 100%;
        font-size: 14px;
        margin-top: 5px;
        font-weight: 600;
        display: inline-block;
    }
    .address-box select
    {
        width: 100%;
        float: left;
        background: #ececec;
        padding: 5px 10px;
        margin-bottom: 10px;
        border-radius: 3px;
        border: 1px solid #9a9a9a;
    }
    .address-box input
    {
        width: 100%;
        float: left;
        margin-bottom: 5px;
        padding: 5px 10px;
        border-radius: 3px;
        border: 1px solid #9a9a9a;
    }
    .address-box button 
    {
        background: #d64ade;
        cursor: pointer;
        padding: 7px 35px;
        font-size: 14px;
        border: 1px solid #d64ade;
        font-weight: 600;
        border-radius: 3px;
        color: #333;
        margin-top: 30px;
        margin-bottom: 30px;
        letter-spacing: 1px;
    }
    .address-box button:hover
    {
        border: 1px solid #333;
        background: #333;
        color: #fff;
    }
    .address-box, .add-address span
    {
        font-size: 14px;
        color: #4c4c4c;
        font-weight: normal;
    }
    .address-box span a, 
    .add-address span a
    {
        font-size: 14px;
        color: #4c4c4c;
        text-decoration: none;
    }
    .add-address
    {
        width: 100%;
        float: left;
        text-align: left;
        margin: 15px 0px;
    }
    .add-address ul
    {
        margin: 0;
        padding: 0;
        display: inline-block;
    }
    .add-address ul li 
    {
        width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 15px 20px;
        margin-left: 30px;
        text-align: left;
        border-radius: 3px;
        border: 2px solid #ccc;
        margin-top: 20px;
    }
    .add-address ul li h4
    {
        padding: 0;
        margin: 0;
        margin-bottom: 5px;
        text-align: left;
        color: #000;
        font-size: 15px;
        font-weight: 700;
        display: inline-block;
    }
    .add-address ul li i
    {
        width: 100%;
        font-size: 50px;
        color: #ccc;
    }
    .add-address ul li h3
    {
        margin: 15px 0px;
        padding: 0;
        color: #ccc;
        font-size: 20px;
        font-weight: 700;
        display: inline-block;
    }
    .add-address ul li p
    {
        margin: 3px 0px;
        padding: 0;
        font-size: 13px;
        line-height: 19px;
        font-weight: 600;
    }
    .add-address ul li span
    {
        font-size: 12px;
        margin-top: 50px;
        display: inline-block;
    }
    .add-address ul li span a
    {
        color: #0089ff;
        font-size: 13px;
    }
    .add-address ul li:first-child
    {
        width: 300px !important;
        height: 240px !important;
        display: inline-block !important;
        float: left !important;
        padding: 65px !important;
        margin-left: 0px !important;
        text-align: center!important;
        border-radius: 3px!important;
        border: 2px dashed #ccc !important;
        margin-top: 20px !important;
    }
    .add-address ul li:nth-child(3n+1) {
        width: 300px;
        height: 240px;
        display: inline-block;
        float: left;
        padding: 15px 20px;
        margin-left: 0px;
        text-align: center;
        border-radius: 3px;
        border: 2px solid #ccc;
        margin-top: 20px;
    }

</style>
<!--- DEBENDRA 15-01-2019 END --->
<?php if ($slug == 'shipping') { ?>
    <div class="schedule reservation">
        <div class="container">
            <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'shipping')) ?>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <!--NEW CODE-->
                    <div class="address-box">
                        <span><a href="">Your Account</a></span>
                        <h2><?= $sections; ?></h2>

                        <p>Or pick up your packages at your convenience from our self-service locations. To add an Drapefit Pickup Point or Locker, click <a href="">here</a>.</p>
                        <?= $this->Form->create('', ['type' => 'post', 'class' => "form", "role" => "form", "data-toggle" => "validator", "novalidate", 'id' => 'shipaddress']); ?>
                        <label>Full name</label>
                        <input type="text" name="full_name"  id="full_name" <?php if ($sections == "Edit your Address" || $sections == "Shipping Address") { ?> value='<?php echo @$ShippingAddress->full_name; ?>' <?php } ?> onkeyup="validation()">
                        <label>Zipcode</label>
                        <input type="text" name="zipcode" placeholder="6-digit [0-9] pincode" id="zipcode" <?php if ($sections == "Edit your Address" || $sections == "Shipping Address") { ?> value='<?php echo @$ShippingAddress->zipcode; ?>' <?php } ?> onkeyup="validation()">

                        <label>Street address</label>
                        <input type="text" name="address" placeholder="colony / street / locality" id="address" <?php if ($sections == "Edit your Address" || $sections == "Shipping Address") { ?> value='<?php echo @$ShippingAddress->address ?>' <?php } ?> onkeyup="validation()">
                        <label></label>
                        <input type="textarea" name="address_line_2" placeholder="colony / street / locality" id="address_line_2" onkeyup="validation()" <?php if ($sections == "Edit your Address" || $sections == "Shipping Address") { ?> value='<?php echo @$ShippingAddress->address_line_2; ?>' <?php } ?>>
                        <label>City</label>
                        <input type="text" name="city" id="city" <?php if ($sections == "Edit your Address" || $sections == "Shipping Address") { ?> value='<?php echo @$ShippingAddress->city; ?>' <?php } ?> onkeyup="validation()">

                        <label>State</label>
                        <select name='state' id='state'>
                            <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas'>Armed Forces Americas</option>
                            <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas1') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas1'>Armed Forces Americas1</option>
                            <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas2') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas2' >Armed Forces Americas2</option>
                            <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas3') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas3'>Armed Forces Americas3</option>
                        </select>				


                        <button type="submit" name='payment' value='payment'  class="payment-btn1" id="payment">Next: Payment <i class="fas fa-arrow-right"></i></button>
                        <?= $this->Form->end(); ?>

                    </div>
                    <!--NEW CODE-->


                    <!--                    <div class="address-box">
                                            <span><a href="">Your Account</a></span>
                                            <h1>What’s your shipping address?</h1>
                                            <p>We currently support one shipping address and one credit card per family. Any styling fees or items kept will be charged to the credit card on file, which can be changed in your account settings. Please confirm the address where you’ll receive all Fixes.</p>
                    
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <label>Name</label>
                                                    <input type="text" placeholder="" name='full_name' id='full_name' value='<?php echo @$ShippingAddress->full_name; ?>' onkeyup="validation()">
                                                    <span class="errorn"></span>
                                                </div>
                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <label>ADDRESS</label>
                                                    <input type="text" placeholder="" name='address' id="address" value='<?php echo @$ShippingAddress->address ?>' onkeyup="validation()">
                                                    <span class="errorad"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <label>ADDRESS LINE 2</label>
                                                    <input type="text" placeholder="" name='address_line_2' id="address_line_2" value='<?php echo @$ShippingAddress->address_line_2; ?>'>
                    
                                                </div>
                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <label>CITY</label>
                                                    <input type="text" placeholder="" name='city' id="city" value='<?php echo @$ShippingAddress->city; ?>' onkeyup="validation()">
                                                    <span class="errorc"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <label>State</label>
                                                    <select name='state' id='state'>
                                                        <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas'>Armed Forces Americas</option>
                                                        <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas1') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas1'>Armed Forces Americas1</option>
                                                        <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas2') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas2' >Armed Forces Americas2</option>
                                                        <option <?php if (@$ShippingAddress->state == 'Armed Forces Americas3') { ?> selected="selected"  <?php } ?>value='Armed Forces Americas3'>Armed Forces Americas3</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <label>ZIPCODE</label>
                                                    <input type="text" placeholder="" name='zipcode' id="zipcode" value='<?php echo @$ShippingAddress->zipcode; ?>' onkeyup="validation()">
                                                    <span class="errorm"></span>
                    
                                                </div>
                                            </div>
                                            <button type="submit" name='payment' value='payment'  class="payment-btn1" id="payment">Next: Payment <i class="fas fa-arrow-right"></i></button>
                                        </div>-->
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>       

<?php } ?>   

<?php if ($slug == 'payment') { ?>
    <link rel="stylesheet" href="<?= HTTP_ROOT; ?>payment/css/style.css">
    <script type="text/javascript" src="<?= HTTP_ROOT; ?>payment/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= HTTP_ROOT; ?>payment/js/jquery.creditCardValidator.js"></script>
    <script type="text/javascript">
                            function cardFormValidate() {
                                var cardValid = 0;
                                //Card validation

                                $('#card_number').validateCreditCard(function (result) {
                                    var cardType = (result.card_type == null) ? '' : result.card_type.name;
                                    //alert(cardType);
                                    //alert(result.valid);
                                    $("#card_type_input").val(cardType);
                                    if (cardType == 'Visa') {
                                        var backPosition = result.valid ? '1px -61px, 470px -82px' : '2px -22px, 470px -12px';

                                    } else if (cardType == 'MasterCard') {
                                        var backPosition = result.valid ? '2px -183px, 319px -84px' : '2px -22px, 471px 14px';
                                    } else if (cardType == 'Maestro') {
                                        var backPosition = result.valid ? '2px -225px, 260px -87px' : '2px -22px, 260px -61px';
                                    } else if (cardType == 'Discover') {
                                        var backPosition = result.valid ? '2px -267px, 480px -84px' : '2px -22px, 471px 14px';
                                    } else if (cardType == 'Amex') {
                                        var backPosition = result.valid ? '2px -144px, 470px -83px' : '3px -22px, 471px 14px';
                                    } else if (cardType == 'jcb') {
                                        var backPosition = result.valid ? '2px -310px, 470px -83px' : '3px -22px, 471px 14px';
                                    } else {
                                        var backPosition = result.valid ? '2px -121px, 470px -87px' : '2px -22px, 471px 14px';
                                    }



                                    //alert(backPosition);
                                    $('#card_number').css("background-position", backPosition);
                                    if (result.valid) {
                                        $("#card_type").val(cardType);
                                        $(".card_type").val(cardType);
                                        $("#card_number").removeClass('required');
                                        cardValid = 1;
                                    } else {
                                        $("#card_type").val('');
                                        $("#card_number").addClass('required');
                                        cardValid = 0;
                                    }
                                });

                                //Form validation
                                var cardName = $("#name_on_card").val();
                                var expMonth = $("#expiry_month").val();
                                var expYear = $("#expiry_year").val();
                                var cvv = $("#cvv").val();
                                var regName = /^[a-z ,.'-]+$/i;
                                var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
                                var regYear = /^2016|2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
                                var regCVV = /^[0-9]{3,3}$/;
                                if (cardValid == 0) {
                                    $("#card_number").addClass('required');
                                    $("#card_number").focus();
                                    return false;
                                } else if (!regMonth.test(expMonth)) {
                                    $("#card_number").removeClass('required');
                                    $("#expiry_month").addClass('required');
                                    $("#expiry_month").focus();
                                    return false;
                                } else if (!regYear.test(expYear)) {
                                    $("#card_number").removeClass('required');
                                    $("#expiry_month").removeClass('required');
                                    $("#expiry_year").addClass('required');
                                    $("#expiry_year").focus();
                                    return false;
                                } else if (!regCVV.test(cvv)) {
                                    $("#card_number").removeClass('required');
                                    $("#expiry_month").removeClass('required');
                                    $("#expiry_year").removeClass('required');
                                    $("#cvv").addClass('required');
                                    $("#cvv").focus();
                                    return false;
                                } else if (!regName.test(cardName)) {
                                    $("#card_number").removeClass('required');
                                    $("#expiry_month").removeClass('required');
                                    $("#expiry_year").removeClass('required');
                                    $("#cvv").removeClass('required');
                                    $("#name_on_card").addClass('required');
                                    $("#name_on_card").focus();
                                    return false;
                                } else {
                                    $("#card_number").removeClass('required');
                                    $("#expiry_month").removeClass('required');
                                    $("#expiry_year").removeClass('required');
                                    $("#cvv").removeClass('required');
                                    $("#name_on_card").removeClass('required');
                                    $('#cardSubmitBtn').prop('disabled', false);
                                    return true;
                                }
                            }

                            $(document).ready(function () {
                                //Demo card numbers
                                $('.card-payment .numbers li').wrapInner('<a href="javascript:void(0);"></a>').click(function (e) {
                                    e.preventDefault();

                                    $('.card-payment .numbers').slideUp(100);
                                    cardFormValidate()
                                    return $('#card_number').val($(this).text()).trigger('input');
                                });
                                $('body').click(function () {
                                    return $('.card-payment .numbers').slideUp(100);
                                });
                                $('#sample-numbers-trigger').click(function (e) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    return $('.card-payment .numbers').slideDown(100);
                                });

                                //Card form validation on input fields
                                $('#paymentForm input[type=text]').on('keyup', function () {
                                    cardFormValidate();
                                });

                                //Submit card form
                                $('#cardSubmitBtn').on('click', function () {

                                    if (cardFormValidate()) {
                                        $('#loaderPyament').show();
                                        var formData = $('#paymentForm1').serialize();
                                        //alert(formData);
                                        var URL = '<?= HTTP_ROOT; ?>';
                                        $("#loader").show();
                                        $("#cardSubmitBtn").attr("disabled", true);
                                        $.ajax({
                                            type: 'POST',
                                            url: URL + 'users/payment_process',
                                            dataType: "json",
                                            data: formData,
                                            beforeSend: function () {
                                                $("#cardSubmitBtn").val('Processing....');
                                            },
                                            success: function (data) {

                                                //console.log(data['ErrorCode']);
                                                if (data.status == 1) {

                                                    $('#loaderPyament').hide();
                                                    $("#cardSubmitBtn").attr("disabled", true);
                                                    $('#paymentSection').slideUp('slow');
                                                    // $('#orderInfo').slideDown('slow');
                                                    $('#msg').html('<p class="alert alert-success">You have payment successfully.You will redirecting  page automatically after 5 seconds.Your transaction id is <span>#' + data.TransId + '</span></p>');
                                                    window.setTimeout(function () {

                                                        window.location.href = '<?= HTTP_ROOT; ?>payment-success';
                                                    }, 10000);

                                                } else if (data.status == 'error') {

                                                    $('#loaderPyament').hide();
                                                    $('#msg').html('<p class="alert alert-danger">Your payment is failer.You will try to again</p>');
                                                    $('.apply_card').removeAttr("disabled");
                                                } else {
                                                    $('#loaderPyament').hide();
                                                    $('#msg').html('<p class="alert alert-danger">' + data['ErrorCode'] + '</p>');
                                                    $('.apply_card').removeAttr("disabled");
                                                }
                                            }
                                        });
                                    }
                                });
                            });
    </script>

    <div class="schedule reservation">
        <div class="container">
            <div id="msg"></div>
            <div class="col-sm-12 col-lg-12 col-md-12 save-card">
                <div style="width: 75%; display: inline-block; text-align: left;">
                    <h3>Your saved credit and debit cards<span>Expires</span></h3>
                    <div class="content_accordion">
                        <div class="panel-group" id="accordion">
                            <?php
                            $i = 0;
                            foreach ($savecard as $card) {
                                $i++;
                                $masked = str_pad(substr($card->card_number, -4), strlen($card->card_number), 'X', STR_PAD_LEFT);
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#essay<?php echo $i; ?>"><img src="<?php echo HTTP_ROOT ?>assets/images/<?php
                                                if ($card->card_type == 'Visa') {
                                                    echo 'visa.png';
                                                } elseif ($card->card_type == 'MasterCard') {
                                                    echo 'master.png';
                                                } elseif ($card->card_type == 'Maestro') {
                                                    echo 'maestro.png';
                                                } elseif ($card->card_type == 'Discover') {
                                                    echo 'discover.png';
                                                } elseif ($card->card_type == 'Amex') {
                                                    echo 'american.png';
                                                } elseif ($card->card_type == 'jcb') {
                                                    echo 'jcb.png';
                                                }
                                                ?>" alt=""><span> Card Number <?php echo $masked; ?></span><span class="expair"><?php echo $card->card_expire; ?></span><i class="fas fa-angle-up"></i></a>
                                        </h4>
                                    </div>
                                    <div id="essay<?php echo $i; ?>" class="panel-collapse collapse <?php if ($i == 1) { ?> in <?php } ?>">
                                        <div class="panel-body">
                                            <div class="panel-body-left">
                                                <h4>Name On Card</h4>
                                                <p><strong><?php echo $card->card_name; ?></strong></p>
                                                <p>
                                                    <strong>Enter CVV : </strong><input type="text" id="cvv1<?php echo $card->id; ?>" size="5"> 
                                                    <span class="text-danger" id="cvv-error<?php echo $card->id; ?>" style="padding-left:10px;"></span>
                                                </p>

                                            </div>

                                            <div class="panel-body-button">

                                                <span data-id="<?php echo $card->id; ?>" class="btn btn-success apply_card">Apply</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <script>
                        $('.apply_card').click(function () {
                            var getId = $(this).attr("data-id");
                            var cvv = $('#cvv1' + getId).val();
                            if (cvv == "") {
                                $('#cvv1' + getId).focus();
                                $("#cvv-error" + getId).html('Please Enter CVV.');
                                return false;
                            }
                            $("#cvv-error" + getId).html("");
                            if (getId) {

                                $('#loaderPyament').show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo HTTP_ROOT . 'users/' ?>getCardDetails",
                                    data: {id: getId},
                                    dataType: "json",
                                    success: function (result) {
                                        // console.log(result);
                                        $('#loaderPyament').hide();
                                        $('.apply_card').attr("disabled", 'disabled');
                                        var expire = result.card_expire;
                                        var chars = expire.split('-');
                                        $("#card_number").val(result.card_number);
                                        $("#card_number123").val(result.card_number);
                                        $("#expiry_month123").val(chars[1]);
                                        $("#expiry_year123").val(chars[0]);
                                        $("#cvv").val(result.cvv);
                                        $("#name_on_card123").val(result.card_name);
                                        //($"#card_number123").keyup();
                                        $('#cardSubmitBtn').click();
                                    }
                                });
                            }
                        });
                    </script>



                    <div class="payment-method">
                        <h3>Add a new payment method</h3>
                        <div class="payment-method-box">
                            <h4>credit or debit cards<span>Our site Accepts all major credit and debit cards</span></h4>
                            <img src="<?php echo HTTP_ROOT ?>assets/images/card.png" alt="">
                        </div>
                    </div>
                    <a class="add-new" data-toggle="collapse" data-target="#demo"><i class="fas fa-angle-down"></i> &nbsp;Add a new card</a>
                    <div id="demo" class="collapse">
                        <p>Enter your card information</p>
                        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'paymentForm')) ?>
                        <ul>


                            <li>
                                <label><strong>Card Number</strong></label>
                                <input type="text" name="card_number" id="card_number">
                            </li>
                            <li>
                                <label><strong>Name on card</strong></label>
                                <input type="text" name="card_name" id="card_name">
                            </li>
                            <li>
                                <label><strong>Year</strong></label>
                                <select name="expiry_month" id="expiry_month">
                                    <?php
                                    for ($exp_count = 1; $exp_count <= 12; $exp_count++) {
                                        echo "<option>" . ( strlen($exp_count) == 1 ? '0' . $exp_count : $exp_count ) . "</option>";
                                    }
                                    ?>
                                </select>
                                <select name="expiry_year" id="expiry_year">
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                    <option>2028</option>
                                    <option>2029</option>
                                    <option>2030</option>
                                    <option>2031</option>
                                </select>
                            </li>
                            <li style="width:10%;">
                                <label><strong>CVV</strong></label>
                                <input type="text" name="cvv" size="4">

                            </li>
                            <input type="hidden"  id="card_type_input" name="card_type">
                            <li><input type="submit" name="card_payment" id="card_payment" value="Add your card"></li>

                        </ul>
                        <?php echo $this->Form->end(); ?>
                    </div>

                </div>
            </div>

            <div class="row hide" >
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="shipping-box">
                        <h1 id="apply_card">What you pay now?</h1>
                        <p>We can only save one credit card per family. Any styling fees or items kept will be charged to the credit card on file.</p>
                        <div class="price-box">
                            <h5>Free shipping both ways<span>$0</span></h5>
                            <h5>Styling Fee<span>$20</span></h5>
                            <ul>
                                <li>Includes your own Personal Stylist</li>
                                <li>5 items to try on at home</li>
                                <li>Will be applied to any items you keep!</li>
                            </ul>
                            <h5><strong>Total<span>$20</span></strong></h5>
                        </div>
                        <div class="card-payment">
                            <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'paymentForm1')) ?>
                            <div id="paymentSection">
                                <ul>
                                    <input type="hidden" name="payableAmount" id="payableAmount" value="20"/>
                                    <input type="hidden" name="card_type" class="card_type" value=""/>



                                    <li>


                                        <input type="text" placeholder="1234 5678 9012 3456" id="card_number123" name="card_number" class="">
                                        <small class="help">This demo supports Visa, American Express, Maestro, MasterCard and Discover.</small>
                                    </li>
                                    <div id="loader" style=" margin-left: 45px;position: absolute;display: none;top: 120px;"><img src="<?= HTTP_ROOT; ?>images/payment-loader.gif" /></div>
                                    <li class="vertical">
                                        <ul>
                                            <li>
                                                <label for="expiry_month">Expiry month</label>
                                                <input type="text" placeholder="MM" maxlength="5" id="expiry_month123" name="expiry_month">
                                            </li>
                                            <li>
                                                <label for="expiry_year">Expiry year</label>
                                                <input type="text" placeholder="YYYY" maxlength="5" id="expiry_year123" name="expiry_year">
                                            </li>
                                            <li>
                                                <label for="cvv">CVV</label>
                                                <input type="text" placeholder="123" maxlength="3" id="cvv" name="cvv">
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <label for="name_on_card">Name on card</label>
                                        <input type="text" placeholder="Name on card" id="name_on_card123" name="name_on_card">
                                    </li>

                                    <li><input  type="submit" name="card_submit" id="cardSubmitBtn" value="Continue..." class="payment-btn" disabled="true" ></li>

                                    <li><input type="button" name="card_submit" id="cardSubmitBtn123" value="Back" class="payment-btn" disabled="true" onclick="javascript:history.back();
                                            return false;"></li>

                                </ul>

                            </div>
                            <?php echo $this->Form->end(); ?>
                            <div id="orderInfo" style="display: none;"></div>
                        </div>
                        <h6><span><i class="fas fa-lock"></i> Secure payment processed by Braintree.</span></h6>

                    </div>
                </div>
            </div>

        </div>
    </div>   

<?php } ?> 

<?php if ($slug == 'style') {
    ?>
    <?php
    if ($this->request->session()->read('PROFILE') == 'MEN') {
//               echo $sections;
//               echo $slug;
//               exit;
        ?>
        <div class="style-contain style-men">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="tab" role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" <?php
        if ($sections == 'stats') {
            echo 'class="active"';
        } elseif ($sections == '') {
            echo 'class="active"';
        }
        ?> ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" onclick='getPushUrl("stats");'>Stats</a></li>
                                <li role="presentation" <?php
                                    if ($sections == 'fit') {
                                        echo 'class="active"';
                                    }
                                    ?>><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab" onclick='getPushUrl("fit");'>Fit</a></li>
                                <li role="presentation" <?php
                                    if ($sections == 'styles') {
                                        echo 'class="active"';
                                    }
                                    ?>><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab" onclick='getPushUrl("styles");'>Style</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabs data-filup ">

                                <div role="tabpanel" class="tab-pane fade <?php
                        if ($sections == 'stats') {
                            echo 'active in';
                        } elseif ($sections == '') {
                            echo 'active in';
                        }
                                    ?>" id="Section1">
                                <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'style')) ?>

                                    <h1>Hi, <?php echo $this->request->getSession()->read('Auth.User.name') ?></h1>
                                    <p>Want to keep your Stylist in the loop? Update your Style Profile to reflect your current tastes and needs.</p>
                                    <p><span>We currently carry sizes XS-3XL and pant sizes 28–48.</span></p>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How would you characterize your proportions?</h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 describ">
                                                <ul>
                                                    <li><label for="radioa" class="input-control radio">
                                                            <input type="radio" id="radioa" <?= @$MenStats->best_describes_you == 1 ? "checked" : ""; ?> name="best_describes_you" value="1">
                                                            <span class="input-control__indicator"></span>I’m filling out this profile for myself
                                                        </label></li>
                                                    <li><label for="radiob" class="input-control radio">
                                                            <input type="radio" id="radiob" name="best_describes_you" value="2" <?= @$MenStats->best_describes_you == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>I’m filling out this profile for someone else
                                                        </label></li>
                                                </ul>
                                            </div>

                                        </div>	
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h3>How tall are you?</h3>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select  name="tall_feet" id="tall_feet">
                                                            <option value="" >--</option>
                                                            <option value="4" <?= @$MenStats->tall_feet == 4 ? "selected" : ""; ?>>4</option>
                                                            <option value="5" <?= @$MenStats->tall_feet == 5 ? "selected" : ""; ?>>5</option>
                                                            <option value="6" <?= @$MenStats->tall_feet == 6 ? "selected" : ""; ?>>6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class=" select-box">
                                                        <select name="tell_inch" id="tell_inch">
                                                            <option value="" >--</option>
                                                            <option value="0" <?= @$MenStats->tell_inch == 0 ? "selected" : ""; ?>>0</option>
                                                            <option value="1" <?= @$MenStats->tell_inch == 1 ? "selected" : ""; ?>>1</option>
                                                            <option value="2" <?= @$MenStats->tell_inch == 2 ? "selected" : ""; ?>>2</option>
                                                            <option value="3" <?= @$MenStats->tell_inch == 3 ? "selected" : ""; ?>>3</option>
                                                            <option value="4" <?= @$MenStats->tell_inch == 4 ? "selected" : ""; ?>>4</option>
                                                            <option value="5" <?= @$MenStats->tell_inch == 5 ? "selected" : ""; ?>>5</option>
                                                            <option value="6" <?= @$MenStats->tell_inch == 6 ? "selected" : ""; ?>>6</option>
                                                            <option value="7" <?= @$MenStats->tell_inch == 7 ? "selected" : ""; ?>>7</option>
                                                            <option value="8" <?= @$MenStats->tell_inch == 8 ? "selected" : ""; ?>>8</option>
                                                            <option value="9" <?= @$MenStats->tell_inch == 9 ? "selected" : ""; ?>>9</option>
                                                            <option value="10" <?= @$MenStats->tell_inch == 10 ? "selected" : ""; ?>>10</option>
                                                            <option value="11" <?= @$MenStats->tell_inch == 11 ? "selected" : ""; ?>>11</option>
                                                        </select>
                                                        <label>in.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h3>What is your weight?</h3>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <input type="text" placeholder="" name="weight_lb" value="<?= @$MenStats->weight_lb; ?>" >
                                                        <label>lbs.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">

                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h3>When is your birthday?</h3>
                                                <!--                                                <div class="select-boxes">
                                                                                                    <p>mm/dd/yyyy</p>
                                                                                                    <input type="text" placeholder="" name="birthday" value="<?= @$MenStats->birthday; ?>">
                                                                                                </div>-->
                                                <div class='input-group date' id="datetimepicker4">
                                                    <input type="text" placeholder="" name="birthday" value="<?= @$MenStats->birthday; ?>" class="form-control">
                                                    <!--<input type='text' class="form-control" value="<?php echo @$Womeninfo->user_input_birthdate; ?>" name="user_input_birthdate" id="user_input_birthdate"/>-->
                                                    <span class="input-group-addon">
                                                        <span ><img src="<?php echo HTTP_ROOT ?>assets/images/calendar-filled.png" height="20px" width="20px"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What’s your occupation?</h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label for="radioa6" class="input-control radio">
                                                            <input type="radio" id="radioa6" name="your_occupation" <?= @$MenStats->your_occupation == 1 ? "checked" : ""; ?> value="1">
                                                            <span class="input-control__indicator"></span>Architecture / Engineering     
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob1" class="input-control radio">
                                                            <input type="radio" id="radiob1" name="your_occupation" value="2" <?= @$MenStats->your_occupation == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Art / Design
                                                        </label></li>
                                                    <li><label for="radioc2" class="input-control radio">
                                                            <input type="radio" id="radioc2" name="your_occupation" value="3" <?= @$MenStats->your_occupation == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Building / Maintenance
                                                        </label></li>
                                                    <li><label for="radioa3" class="input-control radio">
                                                            <input type="radio" id="radioa3" name="your_occupation" value="4" <?= @$MenStats->your_occupation == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Business / Client Service
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob4" class="input-control radio">
                                                            <input type="radio" id="radiob4" name="your_occupation" value="5" <?= @$MenStats->your_occupation == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Community / Social Service
                                                        </label></li>
                                                    <li><label for="radioc5" class="input-control radio">
                                                            <input type="radio" id="radioc5" name="your_occupation" value="6" <?= @$MenStats->your_occupation == 6 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Computer / IT
                                                        </label></li>
                                                    <li><label for="radioa7" class="input-control radio">
                                                            <input type="radio" id="radioa7" name="your_occupation" value="7" <?= @$MenStats->your_occupation == 7 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Education
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob8" class="input-control radio">
                                                            <input type="radio" id="radiob8" name="your_occupation" value="8" <?= @$MenStats->your_occupation == 8 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Entertainer / Performer
                                                        </label></li>
                                                    <li><label for="radioc9" class="input-control radio">
                                                            <input type="radio" id="radioc9" name="your_occupation" value="9" <?= @$MenStats->your_occupation == 9 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Farming / Fishing / Forestry
                                                        </label></li>
                                                    <li><label for="radioc10" class="input-control radio">
                                                            <input type="radio" id="radioc10" name="your_occupation" value="10" <?= @$MenStats->your_occupation == 10 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Financial Services
                                                        </label></li>
                                                    <li><label for="radioa11" class="input-control radio">
                                                            <input type="radio" id="radioa11" name="your_occupation" value="11" <?= @$MenStats->your_occupation == 11 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Health Practitioner / Technician
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob12" class="input-control radio">
                                                            <input type="radio" id="radiob12" name="your_occupation" value="12" <?= @$MenStats->your_occupation == 12 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Hospitality / Food Service
                                                        </label></li>
                                                    <li><label for="radio13c" class="input-control radio">
                                                            <input type="radio" id="radioc13" name="your_occupation" value="13" <?= @$MenStats->your_occupation == 13 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Management
                                                        </label></li>
                                                    <li><label for="radioa14" class="input-control radio">
                                                            <input type="radio" id="radioa14" name="your_occupation" value="14" <?= @$MenStats->your_occupation == 14 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Media / Communications
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob15" class="input-control radio">
                                                            <input type="radio" id="radiob15" name="your_occupation" value="15" <?= @$MenStats->your_occupation == 15 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Military / Protective Service
                                                        </label></li>
                                                    <li><label for="radioc16" class="input-control radio">
                                                            <input type="radio" id="radioc16" name="your_occupation" value="16" <?= @$MenStats->your_occupation == 16 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Legal
                                                        </label></li>
                                                    <li><label for="radioa17" class="input-control radio">
                                                            <input type="radio" id="radioa17" name="your_occupation" value="17" <?= @$MenStats->your_occupation == 17 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Office / Administration
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob18" class="input-control radio">
                                                            <input type="radio" id="radiob18" name="your_occupation" value="18" <?= @$MenStats->your_occupation == 18 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Average
                                                        </label></li>
                                                    <li><label for="radioc19" class="input-control radio">
                                                            <input type="radio" id="radioc19" name="your_occupation" value="19" <?= @$MenStats->your_occupation == 19 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Personal Care & Service
                                                        </label></li>
                                                    <li><label for="radioc20" class="input-control radio">
                                                            <input type="radio" id="radioc20" name="your_occupation" value="20" <?= @$MenStats->your_occupation == 20 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Production / Manufacturing
                                                        </label></li>
                                                    <li><label for="radioa21" class="input-control radio">
                                                            <input type="radio" id="radioa21" name="your_occupation" value="21" <?= @$MenStats->your_occupation == 21 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Retail
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob22" class="input-control radio">
                                                            <input type="radio" id="radiob22" name="your_occupation" value="22" <?= @$MenStats->your_occupation == 22 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Sales
                                                        </label></li>
                                                    <li><label for="radioc23" class="input-control radio">
                                                            <input type="radio" id="radioc23" name="your_occupation" value="23" <?= @$MenStats->your_occupation == 23 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Science
                                                        </label></li>
                                                    <li><label for="radioa24" class="input-control radio">
                                                            <input type="radio" id="radioa24" name="your_occupation" value="24" <?= @$MenStats->your_occupation == 24 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Technology
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob25" class="input-control radio">
                                                            <input type="radio" id="radiob25" name="your_occupation" value="25" <?= @$MenStats->your_occupation == 25 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Transportation
                                                        </label></li>
                                                    <li><label for="radioc26" class="input-control radio">
                                                            <input type="radio" id="radioc26" name="your_occupation" value="26" <?= @$MenStats->your_occupation == 26 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Self-Employed
                                                        </label></li>
                                                    <li><label for="radioa27" class="input-control radio">
                                                            <input type="radio" id="radioa27" name="your_occupation" value="27" <?= @$MenStats->your_occupation == 27 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Stay-At-Home Parent
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob28" class="input-control radio">
                                                            <input type="radio" id="radiob28" name="your_occupation" value="28" <?= @$MenStats->your_occupation == 28 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Student
                                                        </label></li>
                                                    <li><label for="radioc29" class="input-control radio">
                                                            <input type="radio" id="radioc29" name="your_occupation" value="29" <?= @$MenStats->your_occupation == 29 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Retired
                                                        </label></li>
                                                    <li><label for="radioc30" class="input-control radio">
                                                            <input type="radio" id="radioc30" name="your_occupation" value="30" <?= @$MenStats->your_occupation == 30 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Not Employed
                                                        </label></li>
                                                    <li><label for="radioc31" class="input-control radio">
                                                            <input type="radio" id="radioc31" name="your_occupation" value="31" <?= @$MenStats->your_occupation == 31 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Other
                                                        </label></li>
                                                </ul>
                                            </div>

                                        </div>	
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How do you usually commute to work? </h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label for="radioa40" class="input-control radio">
                                                            <input type="radio" id="radioa40" name="commute_to_work" value="1" <?= @$MenStats->commute_to_work == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Bike
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob41" class="input-control radio">
                                                            <input type="radio" id="radiob41" name="commute_to_work" value="2" <?= @$MenStats->commute_to_work == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Walk
                                                        </label></li>
                                                    <li><label for="radioc42" class="input-control radio">
                                                            <input type="radio" id="radioc42" name="commute_to_work" value="3" <?= @$MenStats->commute_to_work == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Drive
                                                        </label></li>
                                                    <li><label for="radioa43" class="input-control radio">
                                                            <input type="radio" id="radioa43" name="commute_to_work" value="4" <?= @$MenStats->commute_to_work == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Public Transit
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob44" class="input-control radio">
                                                            <input type="radio" id="radiob44" name="commute_to_work" value="5" <?= @$MenStats->commute_to_work == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>None of the Above
                                                        </label></li>
                                                </ul>
                                            </div>

                                        </div>	
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Are you a parent?</h3>

                                                <div class="switch-field">
                                                    <input type="radio" id="switch_left" name="are_you_a_parent" value="1" <?= @$MenStats->are_you_a_parent == 1 ? "checked" : ""; ?> <?php
                             if (empty(@$MenStats->are_you_a_parent)) {
                                 echo "checked";
                             }
                                ?>/>
                                                    <label for="switch_left">Yes</label>
                                                    <input type="radio" id="switch_right" name="are_you_a_parent" value="2" <?= @$MenStats->are_you_a_parent == 2 ? "checked" : ""; ?>/>
                                                    <label for="switch_right">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What sizes do you typically wear?</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4 style="margin-top: 0;">SHIRT</h4>
                                                <h6>How does this size run?</h6>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="size">
                                                            <option value="" disabled="disabled">--</option>
                                                            <option value="XS" <?= @$TypicallyWearMen->size == "XS" ? "selected" : ""; ?>>XS</option>
                                                            <option value="S" <?= @$TypicallyWearMen->size == "S" ? "selected" : ""; ?>>S</option>
                                                            <option value="M" <?= @$TypicallyWearMen->size == "M" ? "selected" : ""; ?>>M</option>
                                                            <option value="L" <?= @$TypicallyWearMen->size == "L" ? "selected" : ""; ?>>L</option>
                                                            <option value="XL" <?= @$TypicallyWearMen->size == "XL" ? "selected" : ""; ?>>XL</option>
                                                            <option value="XXL" <?= @$TypicallyWearMen->size == "XXL" ? "selected" : ""; ?>>XXL</option>
                                                            <option value="3XL" <?= @$TypicallyWearMen->size == "3XL" ? "selected" : ""; ?>>3XL</option>
                                                        </select>
                                                    </div>
                                                    <div class="select-box select-box2">
                                                        <select name="shirt">
                                                            <option value="" disabled="disabled">--</option>
                                                            <option value="Sometimes too small" <?= @$TypicallyWearMen->shirt == "Sometimes too small" ? "selected" : ""; ?>>Sometimes too small</option>
                                                            <option value="Just right" <?= @$TypicallyWearMen->shirt == "Just right" ? "selected" : ""; ?>>Just right</option>
                                                            <option value="Sometimes too big" <?= @$TypicallyWearMen->shirt == "Sometimes too big" ? "selected" : ""; ?>>Sometimes too big</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4 style="margin-top: 0;">WAIST</h4>
                                                <h6>How does this size run?</h6>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="waist">
                                                            <option value="" disabled="disabled">--</option>
                                                            <option value="28" <?= @$TypicallyWearMen->waist == 28 ? "selected" : ""; ?>>28</option>
                                                            <option value="29" <?= @$TypicallyWearMen->waist == 29 ? "selected" : ""; ?>>29</option>
                                                            <option value="30" <?= @$TypicallyWearMen->waist == 30 ? "selected" : ""; ?>>30</option>
                                                            <option value="31" <?= @$TypicallyWearMen->waist == 31 ? "selected" : ""; ?>>31</option>
                                                            <option value="32" <?= @$TypicallyWearMen->waist == 32 ? "selected" : ""; ?>>32</option>
                                                            <option value="33" <?= @$TypicallyWearMen->waist == 33 ? "selected" : ""; ?>>33</option>
                                                            <option value="34" <?= @$TypicallyWearMen->waist == 34 ? "selected" : ""; ?>>34</option>
                                                            <option value="35" <?= @$TypicallyWearMen->waist == 35 ? "selected" : ""; ?>>35</option>
                                                            <option value="36" <?= @$TypicallyWearMen->waist == 36 ? "selected" : ""; ?>>36</option>
                                                            <option value="38" <?= @$TypicallyWearMen->waist == 38 ? "selected" : ""; ?>>38</option>
                                                            <option value="40" <?= @$TypicallyWearMen->waist == 40 ? "selected" : ""; ?>>40</option>
                                                            <option value="42" <?= @$TypicallyWearMen->waist == 42 ? "selected" : ""; ?>>42</option>
                                                            <option value="44" <?= @$TypicallyWearMen->waist == 44 ? "selected" : ""; ?>>44</option>
                                                            <option value="46" <?= @$TypicallyWearMen->waist == 46 ? "selected" : ""; ?>>46</option>
                                                            <option value="48" <?= @$TypicallyWearMen->waist == 48 ? "selected" : ""; ?>>48</option>
                                                        </select>
                                                    </div>
                                                    <div class="select-box select-box2">
                                                        <select name="waist_size_run">
                                                            <option value="" disabled="disabled">--</option>
                                                            <option value="Sometimes too small" <?= @$TypicallyWearMen->waist_size_run == "Sometimes too small" ? "selected" : ""; ?>>Sometimes too small</option>
                                                            <option value="Just right" <?= @$TypicallyWearMen->waist_size_run == "Just right" ? "selected" : ""; ?>>Just right</option>
                                                            <option value="Sometimes too big" <?= @$TypicallyWearMen->waist_size_run == "Sometimes too big" ? "selected" : ""; ?>>Sometimes too big</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>INSEAM</h4>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="inseam">
                                                            <option value="" disabled="disabled">--</option>
                                                            <option value="28" <?= @$TypicallyWearMen->inseam == "28" ? "selected" : ""; ?>>28</option>
                                                            <option value="30" <?= @$TypicallyWearMen->inseam == "30" ? "selected" : ""; ?>>30</option>
                                                            <option value="32" <?= @$TypicallyWearMen->inseam == "32" ? "selected" : ""; ?>>32</option>
                                                            <option value="34" <?= @$TypicallyWearMen->inseam == "34" ? "selected" : ""; ?> <?php
                                                   if (empty(@$TypicallyWearMen->inseam)) {
                                                       echo "selected";
                                                   }
                                ?>>34</option>
                                                            <option value="36" <?= @$TypicallyWearMen->inseam == "36" ? "selected" : ""; ?>>36</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>BLAZER</h4>
                                                <div class="select-boxes">
                                                    <div class=" select-box select-box2">
                                                        <select name="bleazer">
                                                            <option value="" disabled="disabled">--</option>
                                                            <option value="34" <?= @$TypicallyWearMen->bleazer == "34" ? "selected" : ""; ?>>34</option>
                                                            <option value="36" <?= @$TypicallyWearMen->bleazer == "36" ? "selected" : ""; ?>>36</option>
                                                            <option value="38" <?= @$TypicallyWearMen->bleazer == "38" ? "selected" : ""; ?>>38</option>
                                                            <option value="40" <?= @$TypicallyWearMen->bleazer == "40" ? "selected" : ""; ?>>40</option>
                                                            <option value="42" <?= @$TypicallyWearMen->bleazer == "42" ? "selected" : ""; ?>>42</option>
                                                            <option value="44" <?= @$TypicallyWearMen->bleazer == "44" ? "selected" : ""; ?>>44</option>
                                                            <option value="46" <?= @$TypicallyWearMen->bleazer == "46" ? "selected" : ""; ?>>46</option>
                                                            <option value="48" <?= @$TypicallyWearMen->bleazer == "48" ? "selected" : ""; ?>>48</option>
                                                            <option value="50" <?= @$TypicallyWearMen->bleazer == "50" ? "selected" : ""; ?>>50</option>
                                                            <option value="52" <?= @$TypicallyWearMen->bleazer == "52" ? "selected" : ""; ?>>52</option>
                                                            <option value="I don’t know" <?= @$TypicallyWearMen->bleazer == "I don’t know" ? "selected" : ""; ?><?php
                                                    if (empty($TypicallyWearMen->bleazer)) {
                                                        echo "selected";
                                                    }
                                ?>>I don’t know</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>SHOE</h4>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="shoe">
                                                            <option value="" disabled="disabled">--</option>
                                                            <option value="7" <?= @$TypicallyWearMen->shoe == "7" ? "selected" : ""; ?>>7</option>
                                                            <option value="7.5" <?= @$TypicallyWearMen->shoe == "7.5" ? "selected" : ""; ?>>7.5</option>
                                                            <option value="8" <?= @$TypicallyWearMen->shoe == "8" ? "selected" : ""; ?>>8</option>
                                                            <option value="8.5" <?= @$TypicallyWearMen->shoe == "8.5" ? "selected" : ""; ?>>8.5</option>
                                                            <option value="9" <?= @$TypicallyWearMen->shoe == "9" ? "selected" : ""; ?>>9</option>
                                                            <option value="9.5" <?= @$TypicallyWearMen->shoe == "9.5" ? "selected" : ""; ?>>9.5</option>
                                                            <option value="10" <?= @$TypicallyWearMen->shoe == "10" ? "selected" : ""; ?>>10</option>
                                                            <option value="10.5" <?= @$TypicallyWearMen->shoe == "10.5" ? "selected" : ""; ?>>10.5</option>
                                                            <option value="11" <?= @$TypicallyWearMen->shoe == "11" ? "selected" : ""; ?>>11</option>
                                                            <option value="11.5" <?= @$TypicallyWearMen->shoe == "11.5" ? "selected" : ""; ?>>11.5</option>
                                                            <option value="12" <?= @$TypicallyWearMen->shoe == "12" ? "selected" : ""; ?>>12</option>
                                                            <option value="12.5" <?= @$TypicallyWearMen->shoe == "12.5" ? "selected" : ""; ?>>12.5</option>
                                                            <option value="13" <?= @$TypicallyWearMen->shoe == "13" ? "selected" : ""; ?>>13</option>
                                                            <option value="14" <?= @$TypicallyWearMen->shoe == "14" ? "selected" : ""; ?>>14</option>
                                                            <option value="15" <?= @$TypicallyWearMen->shoe == "15" ? "selected" : ""; ?>>15</option>
                                                            <option value="16" <?= @$TypicallyWearMen->shoe == "16" ? "selected" : ""; ?>>16</option></select>
                                                    </div>
                                                    <div class="select-box select-box2">
                                                        <select name="shoe_medium">
                                                            <option value="" disabled="disabled">--</option>
                                                            <option value="Narrow" <?= @$TypicallyWearMen->shoe_medium == "Narrow" ? "selected" : ""; ?>>Narrow</option>
                                                            <option value="Medium" <?= @$TypicallyWearMen->shoe_medium == "Medium" ? "selected" : ""; ?>>Medium</option>
                                                            <option value="Wide" <?= @$TypicallyWearMen->shoe_medium == "Wide" ? "selected" : ""; ?>>Wide</option>
                                                            <option value="Extra Wide" <?= @$TypicallyWearMen->shoe_medium == "Extra Wide" ? "selected" : ""; ?>>Extra Wide</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="type-box">
                                                    <h3>How often would you like to receive Fixes?</h3>


                                                    <ul>
                                                        <li>
                                                            <h4 style="margin-top: 0;">Slim</h4>
                                                            <input class="radio-box" <?= @$TypicallyWearMen->body_type == 1 ? "checked" : ""; ?> name="body_type" value="1" id="radio1" type="radio">
                                                            <label for="radio1">
                                                                <img src="<?= HTTP_ROOT . MAN ?>size-1.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <h4 style="margin-top: 0;">Average</h4>
                                                            <input class="radio-box" <?= @$TypicallyWearMen->body_type == 2 ? "checked" : ""; ?> id="radio2" name="body_type" value="2" type="radio">
                                                            <label for="radio2">
                                                                <img src="<?= HTTP_ROOT . MAN ?>size-2.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <h4 style="margin-top: 0;">Athletic</h4>
                                                            <input class="radio-box" <?= @$TypicallyWearMen->body_type == 3 ? "checked" : ""; ?> id="radio3" type="radio" name="body_type" value="3">
                                                            <label for="radio3">
                                                                <img src="<?= HTTP_ROOT . MAN ?>size-3.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <h4 style="margin-top: 0;">Husky</h4>
                                                            <input class="radio-box" <?= @$TypicallyWearMen->body_type == 4 ? "checked" : ""; ?> id="radio4" type="radio" name="body_type" value="4">
                                                            <label for="radio4">
                                                                <img src="<?= HTTP_ROOT . MAN ?>size-4.png" alt="">
                                                            </label>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                            <button type="submit" name='men_stas' value="men_stas">Next: Fit/Cut <i class="fas fa-arrow-right"></i></button>
                                            <a href="#">Save and return Home. »</a>
                                        </div>
                                    </div>
        <?= $this->Form->end(); ?>
                                </div>

                                <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'fit') { ?> active in <?php } ?>" id="Section2">

        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'style')) ?>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="type-box">
                                                    <h3>How do you like your casual shirts to fit? </h3>
                                                    <small>Select all that apply. </small>

                                                    <ul>
                                                        <li>
                                                            <span>Slim</span>
                                                            <input class="radio-box"  name="casual_shirts_to_fit[]" value="1" id="radio11" type="checkbox" <?= in_array(1, explode(",", @$MenFit->casual_shirts_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio11">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>slim.jpg" alt="">
                                                            </label>
                                                            <span>Fitted through the chest, trim through the waist, tapered sleeves </span>
                                                        </li>
                                                        <li>
                                                            <span>Regular</span>
                                                            <input class="radio-box"  id="radio21" name="casual_shirts_to_fit[]" value="2" type="checkbox" <?= in_array(2, explode(",", @$MenFit->casual_shirts_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio21">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>regular.jpg" alt="">
                                                            </label>
                                                            <span>Relaxed through the chest, waist, armholes & sleeves </span>
                                                        </li>                                                        
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="type-box">
                                                    <h3>How do you like your button-up shirts to fit?  </h3>
                                                    <small>Select all that apply. </small>

                                                    <ul>
                                                        <li>
                                                            <span>Slim</span>
                                                            <input class="radio-box"  name="button_up_shirts_to_fit[]" value="1" id="radio110" type="checkbox" <?= in_array(1, explode(",", @$MenFit->button_up_shirts_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio110">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>slim1.jpg" alt="">
                                                            </label>
                                                            <span>Fitted through the chest, trim through the waist, tapered sleeves </span>
                                                        </li>
                                                        <li>
                                                            <span>Regular</span>
                                                            <input class="radio-box"  id="radio210" name="button_up_shirts_to_fit[]" value="2" type="checkbox" <?= in_array(2, explode(",", @$MenFit->button_up_shirts_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio210">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>regular2.jpg" alt="">
                                                            </label>
                                                            <span>Relaxed through the chest, waist, armholes & sleeves </span>
                                                        </li>                                                        
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Do you normally tuck in a button-up shirt?</h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label for="radioa111" class="input-control radio">
                                                            <input type="radio" id="radioa111" name="tuck_in_a_button_up_shirt" value="1" <?= @$MenFit->tuck_in_a_button_up_shirt == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Yes
                                                        </label>
                                                    </li>
                                                    <li><label for="radiob211" class="input-control radio">
                                                            <input type="radio" id="radiob211" name="tuck_in_a_button_up_shirt" value="2" <?= @$MenFit->tuck_in_a_button_up_shirt == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>No
                                                        </label></li>
                                                    <li><label for="radioc311" class="input-control radio">
                                                            <input type="radio" id="radioc311" name="tuck_in_a_button_up_shirt" value="3" <?= @$MenFit->tuck_in_a_button_up_shirt == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>I don’t wear button-up shirts
                                                        </label></li>                                                    
                                                </ul>
                                            </div>
                                        </div>	
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="type-box">
                                                    <h3>How do you like your jeans to fit?</h3>
                                                    <small>Select all that apply. </small>                                                   
                                                    <ul>
                                                        <li>
                                                            <span>Skinny</span>
                                                            <input class="radio-box"  name="jeans_to_fit[]" value="1" id="radio112" type="checkbox" <?= in_array(1, explode(",", @$MenFit->jeans_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio112">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>skinny.jpg" alt="">
                                                            </label>
                                                            <span>Cut narrow through the thigh, tight at the ankle </span>
                                                        </li>
                                                        <li>
                                                            <span>Slim</span>
                                                            <input class="radio-box"  id="radio212" name="jeans_to_fit[]" value="2" type="checkbox" <?= in_array(2, explode(",", @$MenFit->jeans_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio212">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>slim2.jpg" alt="">
                                                            </label>
                                                            <span>Cut close through the thigh, slightly narrow at the ankle </span>
                                                        </li>
                                                        <li>
                                                            <span>Straight </span>
                                                            <input class="radio-box"  id="radio213" name="jeans_to_fit[]" value="3" type="checkbox" <?= in_array(3, explode(",", @$MenFit->jeans_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio213">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>straight.jpg" alt="">
                                                            </label>
                                                            <span>Comfortable through the thigh, straight below the knee </span>
                                                        </li>  
                                                        <li>
                                                            <span>Relaxed</span>
                                                            <input class="radio-box"  id="radio214" name="jeans_to_fit[]" value="4" type="checkbox" <?= in_array(4, explode(",", @$MenFit->jeans_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio214">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>relaxed.jpg" alt="">
                                                            </label>
                                                            <span>Relaxed through the thigh, straight below the knee </span>
                                                        </li>  
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="type-box">
                                                    <h3>How do you like your pants to fit?</h3>
                                                    <small>Select all that apply. </small>                                                    
                                                    <ul>
                                                        <li>
                                                            <span>Slim</span>
                                                            <input class="radio-box"  name="your_pants_to_fit[]" value="1" id="radio114" type="checkbox" <?= in_array(1, explode(",", @$MenFit->your_pants_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio114">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>pant_slim.jpg" alt="">
                                                            </label>
                                                            <span>Cut close through the thigh, slightly narrow at the ankle</span>
                                                        </li>
                                                        <li>
                                                            <span>Straight</span>
                                                            <input class="radio-box"  id="radio217" name="your_pants_to_fit[]" value="2" type="checkbox" <?= in_array(2, explode(",", @$MenFit->your_pants_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio217">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>pant_straight.jpg" alt="">
                                                            </label>
                                                            <span>Comfortable through the thigh, straight below the knee </span>
                                                        </li>
                                                        <li>
                                                            <span>Relaxed </span>
                                                            <input class="radio-box"  id="radio215" name="your_pants_to_fit[]" value="3" type="checkbox" <?= in_array(3, explode(",", @$MenFit->your_pants_to_fit)) ? "checked" : ""; ?>>
                                                            <label for="radio215">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>pant_ralaxed.jpg" alt="">
                                                            </label>
                                                            <span>Relaxed through the thigh, straight below the knee </span>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="type-box">
                                                    <h3>How long do you prefer your shorts? </h3>
                                                    <small>Select all that apply. </small>

                                                    <ul>
                                                        <li>
                                                            <span>At The Knee </span>
                                                            <input class="radio-box"  name="prefer_your_shorts[]" value="1" id="radio118" type="checkbox" <?= in_array(1, explode(",", @$MenFit->prefer_your_shorts)) ? "checked" : ""; ?>>
                                                            <label for="radio118">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>attheknee.jpg" alt="">
                                                            </label>
                                                            <span>At or below the knee </span>
                                                        </li>
                                                        <li>
                                                            <span>Above Knee </span>
                                                            <input class="radio-box"  id="radio218" name="prefer_your_shorts[]" value="2" type="checkbox" <?= in_array(2, explode(",", @$MenFit->prefer_your_shorts)) ? "checked" : ""; ?>>
                                                            <label for="radio218">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>aboveknee.jpg" alt="">
                                                            </label>
                                                            <span>Right above the knee</span>
                                                        </li>
                                                        <li>
                                                            <span>Lower Thigh </span>
                                                            <input class="radio-box"  id="radio219" name="prefer_your_shorts[]" value="3" type="checkbox" <?= in_array(3, explode(",", @$MenFit->prefer_your_shorts)) ? "checked" : ""; ?>>
                                                            <label for="radio219">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>lowerthigh.jpg" alt="">
                                                            </label>
                                                            <span>2 inches above the knee</span>
                                                        </li>  
                                                        <li>
                                                            <span>Upper Thigh</span>
                                                            <input class="radio-box"  id="radio315" name="prefer_your_shorts[]" value="4" type="checkbox" <?= in_array(4, explode(",", @$MenFit->prefer_your_shorts)) ? "checked" : ""; ?>>
                                                            <label for="radio315">
                                                                <img src="<?= HTTP_ROOT . MAN; ?>upperthigh.jpg" alt="">
                                                            </label>
                                                            <span>At least 3 inches above the knee </span>
                                                        </li>  
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Are you willing to hem your pants? </h3>

                                                <div class="switch-field">
                                                    <input type="radio" id="switch_left1" name="hem_your_pants" value="1"  <?= @$MenFit->hem_your_pants == 1 ? "checked" : ""; ?> <?php
        if (empty(@$MenFit->hem_your_pants)) {
            echo "checked";
        }
        ?>/>
                                                    <label for="switch_left1">Yes</label>
                                                    <input type="radio" id="switch_right1" name="hem_your_pants" value="2" <?= @$MenFit->hem_your_pants == 2 ? "checked" : ""; ?>/>
                                                    <label for="switch_right1">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Do you have any fit challenges? </h3>
                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <span><h4>Shirt collar</h4> </span>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="switch_left6" name="fit_challenges_shirt_collar" value="1" <?= @$MenFit->fit_challenges_shirt_collar == 1 ? "checked" : ""; ?> <?php
                                                   if (empty(@$MenFit->fit_challenges_shirt_collar)) {
                                                       echo "checked";
                                                   }
        ?>/>
                                                        <label for="switch_left6">Too Tight</label>
                                                        <input type="radio" id="switch_right5" name="fit_challenges_shirt_collar" value="2" <?= @$MenFit->fit_challenges_shirt_collar == 2 ? "checked" : ""; ?> />
                                                        <label for="switch_right5">No Issue</label>
                                                        <input type="radio" id="switch_right4" name="fit_challenges_shirt_collar" value="3" <?= @$MenFit->fit_challenges_shirt_collar == 3 ? "checked" : ""; ?> />
                                                        <label for="switch_right4">Too Loose</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <span><h4>Shirt shoulder</h4> </span>
                                                    <div class="switch-field">
                                                        <input type="radio" id="switch_left61" name="shirt_shoulder" value="1" <?= @$MenFit->shirt_shoulder == 1 ? "checked" : ""; ?> <?php
                                                       if (empty(@$MenFit->shirt_shoulder)) {
                                                           echo "checked";
                                                       }
        ?>/>
                                                        <label for="switch_left61">Too Tight</label>
                                                        <input type="radio" id="switch_right51" name="shirt_shoulder" value="2" <?= @$MenFit->shirt_shoulder == 2 ? "checked" : ""; ?> />
                                                        <label for="switch_right51">No Issue</label>
                                                        <input type="radio" id="switch_right41" name="shirt_shoulder" value="3" <?= @$MenFit->shirt_shoulder == 3 ? "checked" : ""; ?> />
                                                        <label for="switch_right41">Too Loose</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <span><h4>Sleeve length</h4></span>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="switch_left621" name="sleeve_length" value="1" <?= @$MenFit->sleeve_length == 1 ? "checked" : ""; ?> <?php
                                                       if (empty(@$MenFit->sleeve_length)) {
                                                           echo "checked";
                                                       }
        ?>/>
                                                        <label for="switch_left621">Too Tight</label>
                                                        <input type="radio" id="switch_right521" name="sleeve_length" value="2" <?= @$MenFit->sleeve_length == 2 ? "checked" : ""; ?> />
                                                        <label for="switch_right521">No Issue</label>
                                                        <input type="radio" id="switch_right421" name="sleeve_length" value="3" <?= @$MenFit->sleeve_length == 3 ? "checked" : ""; ?> />
                                                        <label for="switch_right421">Too Loose</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <span><h4>Pant lower leg</h4></span>
                                                    <div class="switch-field">
                                                        <input type="radio" id="switch_left6112" name="pant_lower_leg" value="1" <?= @$MenFit->pant_lower_leg == 1 ? "checked" : ""; ?> <?php
                                                       if (empty(@$MenFit->pant_lower_leg)) {
                                                           echo "checked";
                                                       }
        ?>/>
                                                        <label for="switch_left6112">Too Tight</label>
                                                        <input type="radio" id="switch_right5112" name="pant_lower_leg" value="2" <?= @$MenFit->pant_lower_leg == 2 ? "checked" : ""; ?> />
                                                        <label for="switch_right5112">No Issue</label>
                                                        <input type="radio" id="switch_right4112" name="pant_lower_leg" value="3" <?= @$MenFit->pant_lower_leg == 3 ? "checked" : ""; ?> />
                                                        <label for="switch_right4112">Too Loose</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <span><h4>Pant thigh </h4></span>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="switch_left62132" name="pant_thigh" value="1" <?= @$MenFit->pant_thigh == 1 ? "checked" : ""; ?> <?php
                                                       if (empty(@$MenFit->pant_thigh)) {
                                                           echo "checked";
                                                       }
        ?> />
                                                        <label for="switch_left62132">Too Tight</label>
                                                        <input type="radio" id="switch_right52132" name="pant_thigh" value="2" <?= @$MenFit->pant_thigh == 2 ? "checked" : ""; ?> />
                                                        <label for="switch_right52132">No Issue</label>
                                                        <input type="radio" id="switch_right42132" name="pant_thigh" value="3" <?= @$MenFit->pant_thigh == 3 ? "checked" : ""; ?> />
                                                        <label for="switch_right42132">Too Loose</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-lg-6 col-md-6">
                                                    <span><h4>pant length </h4></span>
                                                    <div class="switch-field">
                                                        <input type="radio" id="switch_left6132" name="pant_length" value="1" <?= @$MenFit->pant_length == 1 ? "checked" : ""; ?> <?php
                                                       if (empty(@$MenFit->pant_length)) {
                                                           echo "checked";
                                                       }
        ?>/>
                                                        <label for="switch_left6132">Too Tight</label>
                                                        <input type="radio" id="switch_right5132" name="pant_length" value="2" <?= @$MenFit->pant_length == 2 ? "checked" : ""; ?>/>
                                                        <label for="switch_right5132">No Issue</label>
                                                        <input type="radio" id="switch_right4132" name="pant_length" value="3" <?= @$MenFit->pant_length == 3 ? "checked" : ""; ?>/>
                                                        <label for="switch_right4132">Too Loose</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                            <button type="submit" name='men_fit' value="men_fit">Next: Style <i class="fas fa-arrow-right"></i></button>
                                            <a href="#">Save and return Home. »</a>
                                        </div>
                                    </div>

        <?= $this->Form->end(); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'styles') { ?> active in <?php } ?>" id="Section3">
        <?php echo $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'end')) ?>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How often do you wear the following: </h3>	
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">Leisure Wear</font></b></nav>
                                                <small>Ex: sweats or your favorite hoodie</small>
                                                <ul>
                                                    <li><label for="radioax1" class="input-control radio">
                                                            <input type="radio" id="radioax1" name="leisure_wear" value="1" <?= @$MenStyle->leisure_wear == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Every day
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobx2" class="input-control radio">
                                                            <input type="radio" id="radiobx2" name="leisure_wear" value="2" <?= @$MenStyle->leisure_wear == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>3-4 times per week
                                                        </label></li>
                                                    <li><label for="radiocx3" class="input-control radio">
                                                            <input type="radio" id="radiocx3" name="leisure_wear" value="3" <?= @$MenStyle->leisure_wear == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per week
                                                        </label></li>
                                                    <li><label for="radioax4" class="input-control radio">
                                                            <input type="radio" id="radioax4" name="leisure_wear" value="4" <?= @$MenStyle->leisure_wear == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per month
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobx5" class="input-control radio">
                                                            <input type="radio" id="radiobx5" name="leisure_wear" value="5" <?= @$MenStyle->leisure_wear == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Rarely or never
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">Everyday Casual</font></b></nav>
                                                <small>Ex: jeans & a shirt</small>
                                                <ul>
                                                    <li><label for="radioaxx1" class="input-control radio">
                                                            <input type="radio" id="radioaxx1" name="everyday_casual" value="1" <?= @$MenStyle->everyday_casual == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Every day
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobxx2" class="input-control radio">
                                                            <input type="radio" id="radiobxx2" name="everyday_casual" value="2" <?= @$MenStyle->everyday_casual == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>3-4 times per week
                                                        </label></li>
                                                    <li><label for="radiocxx3" class="input-control radio">
                                                            <input type="radio" id="radiocxx3" name="everyday_casual" value="3" <?= @$MenStyle->everyday_casual == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per week
                                                        </label></li>
                                                    <li><label for="radioaxx4" class="input-control radio">
                                                            <input type="radio" id="radioaxx4" name="everyday_casual" value="4" <?= @$MenStyle->everyday_casual == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per month
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobxx5" class="input-control radio">
                                                            <input type="radio" id="radiobxx5" name="everyday_casual" value="5" <?= @$MenStyle->everyday_casual == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Rarely or never
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">Business Casual</font></b></nav>
                                                <ul>
                                                    <li><label for="radioaxxx1" class="input-control radio">
                                                            <input type="radio" id="radioaxxx1" name="business_casual" value="1" <?= @$MenStyle->business_casual == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Every day
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobxxx2" class="input-control radio">
                                                            <input type="radio" id="radiobxxx2" name="business_casual" value="2" <?= @$MenStyle->business_casual == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>3-4 times per week
                                                        </label></li>
                                                    <li><label for="radiocxxx3" class="input-control radio">
                                                            <input type="radio" id="radiocxxx3" name="business_casual" value="3" <?= @$MenStyle->business_casual == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per week
                                                        </label></li>
                                                    <li><label for="radioaxxx4" class="input-control radio">
                                                            <input type="radio" id="radioaxxx4" name="business_casual" value="4" <?= @$MenStyle->business_casual == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per month
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobxxx5" class="input-control radio">
                                                            <input type="radio" id="radiobxxx5" name="business_casual" value="5" <?= @$MenStyle->business_casual == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Rarely or never
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">Business Formal</font></b></nav>
                                                <ul>
                                                    <li><label for="radioayx1" class="input-control radio">
                                                            <input type="radio" id="radioayx1" name="business_formal" value="1" <?= @$MenStyle->business_formal == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Every day
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobyx2" class="input-control radio">
                                                            <input type="radio" id="radiobyx2" name="business_formal" value="2" <?= @$MenStyle->business_formal == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>3-4 times per week
                                                        </label></li>
                                                    <li><label for="radiocyx3" class="input-control radio">
                                                            <input type="radio" id="radiocyx3" name="business_formal" value="3" <?= @$MenStyle->business_formal == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per week
                                                        </label></li>
                                                    <li><label for="radioayx4" class="input-control radio">
                                                            <input type="radio" id="radioayx4" name="business_formal" value="4" <?= @$MenStyle->business_formal == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per month
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobyx5" class="input-control radio">
                                                            <input type="radio" id="radiobyx5" name="business_formal" value="5" <?= @$MenStyle->business_formal == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Rarely or never
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">Night-out Attire</font></b></nav>
                                                <ul>
                                                    <li><label for="radioayx12" class="input-control radio">
                                                            <input type="radio" id="radioayx12" name="night_out_attire" value="1" <?= @$MenStyle->night_out_attire == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Every day
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobyx22" class="input-control radio">
                                                            <input type="radio" id="radiobyx22" name="night_out_attire" value="2" <?= @$MenStyle->night_out_attire == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>3-4 times per week
                                                        </label></li>
                                                    <li><label for="radiocyx32" class="input-control radio">
                                                            <input type="radio" id="radiocyx32" name="night_out_attire" value="3" <?= @$MenStyle->night_out_attire == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per week
                                                        </label></li>
                                                    <li><label for="radioayx42" class="input-control radio">
                                                            <input type="radio" id="radioayx42" name="night_out_attire" value="4" <?= @$MenStyle->night_out_attire == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per month
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobyx52" class="input-control radio">
                                                            <input type="radio" id="radiobyx52" name="night_out_attire" value="5" <?= @$MenStyle->night_out_attire == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Rarely or never
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">Workout Gear</font></b></nav>
                                                <ul>
                                                    <li><label for="radioayx121" class="input-control radio">
                                                            <input type="radio" id="radioayx121" name="workout_gear" value="1" <?= @$MenStyle->workout_gear == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Every day
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobyx221" class="input-control radio">
                                                            <input type="radio" id="radiobyx221" name="workout_gear" value="2" <?= @$MenStyle->workout_gear == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>3-4 times per week
                                                        </label></li>
                                                    <li><label for="radiocyx321" class="input-control radio">
                                                            <input type="radio" id="radiocyx321" name="workout_gear" value="3" <?= @$MenStyle->workout_gear == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per week
                                                        </label></li>
                                                    <li><label for="radioayx421" class="input-control radio">
                                                            <input type="radio" id="radioayx421" name="workout_gear" value="4" <?= @$MenStyle->workout_gear == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per month
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobyx521" class="input-control radio">
                                                            <input type="radio" id="radiobyx521" name="workout_gear" value="5" <?= @$MenStyle->workout_gear == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Rarely or never
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">Special Occasion / Formal Wear </font></b></nav>
                                                <ul>
                                                    <li><label for="radioayx1201" class="input-control radio">
                                                            <input type="radio" id="radioayx1201" name="special_occasion_formal_wear" value="1" <?= @$MenStyle->special_occasion_formal_wear == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Every day
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobyx2201" class="input-control radio">
                                                            <input type="radio" id="radiobyx2201" name="special_occasion_formal_wear" value="2" <?= @$MenStyle->special_occasion_formal_wear == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>3-4 times per week
                                                        </label></li>
                                                    <li><label for="radiocyx3201" class="input-control radio">
                                                            <input type="radio" id="radiocyx3201" name="special_occasion_formal_wear" value="3" <?= @$MenStyle->special_occasion_formal_wear == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per week
                                                        </label></li>
                                                    <li><label for="radioayx4201" class="input-control radio">
                                                            <input type="radio" id="radioayx4201" name="special_occasion_formal_wear" value="4" <?= @$MenStyle->special_occasion_formal_wear == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>1-2 times per month
                                                        </label>
                                                    </li>
                                                    <li><label for="radiobyx5201" class="input-control radio">
                                                            <input type="radio" id="radiobyx5201" name="special_occasion_formal_wear" value="5" <?= @$MenStyle->special_occasion_formal_wear == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Rarely or never
                                                        </label></li>
                                                </ul>
                                            </div>

                                        </div>	
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Do you dress more for style or comfort? </h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label for="tuck_in_a_button_up_shirt1" class="input-control radio">
                                                            <input type="radio" id="tuck_in_a_button_up_shirt1" name="style_or_comfort" value="1" <?= @$MenStyle->style_or_comfort == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Style
                                                        </label>
                                                    </li>
                                                    <li><label for="tuck_in_a_button_up_shirt2" class="input-control radio">
                                                            <input type="radio" id="tuck_in_a_button_up_shirt2" name="style_or_comfort" value="2" <?= @$MenStyle->style_or_comfort == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Comfort
                                                        </label></li>                                                                                                     
                                                </ul>
                                            </div>
                                        </div>	
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What’s your office dress code?  </h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label for="tuck_in_a_button_up_shirt3" class="input-control radio">
                                                            <input type="radio" id="tuck_in_a_button_up_shirt3" name="office_dress_code" value="1" <?= @$MenStyle->office_dress_code == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Casual / No Dress Code
                                                        </label>
                                                    </li>
                                                    <li><label for="tuck_in_a_button_up_shirt4" class="input-control radio">
                                                            <input type="radio" id="tuck_in_a_button_up_shirt4" name="office_dress_code" value="2" <?= @$MenStyle->office_dress_code == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Business Casual
                                                        </label>
                                                    </li>                                                                                                     
                                                    <li><label for="tuck_in_a_button_up_shirt5" class="input-control radio">
                                                            <input type="radio" id="tuck_in_a_button_up_shirt5" name="office_dress_code" value="3" <?= @$MenStyle->office_dress_code == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Business Formal
                                                        </label>
                                                    </li>                                                                                                     
                                                    <li><label for="tuck_in_a_button_up_shirt6" class="input-control radio">
                                                            <input type="radio" id="tuck_in_a_button_up_shirt6" name="office_dress_code" value="4" <?= @$MenStyle->office_dress_code == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Uniform (ex: military, medical scrubs)
                                                        </label>
                                                    </li>                                                                                                     
                                                </ul>
                                            </div>
                                        </div>	
                                    </div>
                                    <!--Question-->
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Do you dry clean your clothes at least once per month?</h3>

                                                <div class="switch-field">
                                                    <input type="radio" id="dry_clean" name="dry_clean_your_clothes_at_least_once_per_month" value="1" <?= @$MenStyle->dry_clean_your_clothes_at_least_once_per_month == 1 ? "checked" : ""; ?>>
                                                    <label for="dry_clean">Yes</label>
                                                    <input type="radio" id="dry_clean2" name="dry_clean_your_clothes_at_least_once_per_month" value="0" <?= @$MenStyle->dry_clean_your_clothes_at_least_once_per_month == 0 ? "checked" : ""; ?>>
                                                    <label for="dry_clean2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Question-->
                                    <!--                                    brands section-->

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="type-box">
                                                    <h3>Which brands do you wear? </h3>
                                                    <small>Select all that apply. </small>

                                                    <ul>
                                                        <li>

                                                            <input class="radio-box" name="mens_brands[]" value="penguin" id="mens_brands1" type="checkbox" <?php if (isset($menbrand) && in_array('penguin', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands1">
                                                                <img src="<?= HTTP_ROOT . MAN ?>penguin.png" alt="">
                                                            </label>

                                                        </li>
                                                        <li>

                                                            <input class="radio-box" id="mens_brands2" name="mens_brands[]" value="nike" type="checkbox" <?php if (isset($menbrand) && in_array('nike', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands2">
                                                                <img src="<?= HTTP_ROOT . MAN ?>nike.png" alt="">
                                                            </label>

                                                        </li>
                                                        <li>

                                                            <input class="radio-box" id="mens_brands3" name="mens_brands[]" value="scotch" type="checkbox" <?php if (isset($menbrand) && in_array('scotch', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands3">
                                                                <img src="<?= HTTP_ROOT . MAN ?>scotch.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens_brands4" name="mens_brands[]" value="gap" type="checkbox" <?php if (isset($menbrand) && in_array('gap', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands4">
                                                                <img src="<?= HTTP_ROOT . MAN ?>gap.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens_brands5" name="mens_brands[]" value="pata" type="checkbox" <?php if (isset($menbrand) && in_array('pata', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands5">
                                                                <img src="<?= HTTP_ROOT . MAN ?>pata.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens_brands6" name="mens_brands[]" value="tommy" type="checkbox" <?php if (isset($menbrand) && in_array('tommy', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands6">
                                                                <img src="<?= HTTP_ROOT . MAN ?>tommy.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens_brands7" name="mens_brands[]" value="boss" type="checkbox" <?php if (isset($menbrand) && in_array('boss', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands7">
                                                                <img src="<?= HTTP_ROOT . MAN ?>boss.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens_brands8" name="mens_brands[]" value="vineyard" type="checkbox" <?php if (isset($menbrand) && in_array('vineyard', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands8">
                                                                <img src="<?= HTTP_ROOT . MAN ?>vineyard.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens_brands9" name="mens_brands[]" value="vans" type="checkbox" <?php if (isset($menbrand) && in_array('vans', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands9">
                                                                <img src="<?= HTTP_ROOT . MAN ?>vans.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens_brands10" name="mens_brands[]" value="hurley" type="checkbox" <?php if (isset($menbrand) && in_array('hurley', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands10">
                                                                <img src="<?= HTTP_ROOT . MAN ?>hurley.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens_brands11" name="mens_brands[]" value="brooks" type="checkbox" <?php if (isset($menbrand) && in_array('brooks', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands11">
                                                                <img src="<?= HTTP_ROOT . MAN ?>brooks.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands12" name="mens_brands[]" value="zara" type="checkbox" <?php if (isset($menbrand) && in_array('zara', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands12">
                                                                <img src="<?= HTTP_ROOT . MAN ?>zara.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands13" name="mens_brands[]" value="levis" type="checkbox" <?php if (isset($menbrand) && in_array('levis', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands13">
                                                                <img src="<?= HTTP_ROOT . MAN ?>levis.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands14" name="mens_brands[]" value="armour" type="checkbox" <?php if (isset($menbrand) && in_array('armour', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands14">
                                                                <img src="<?= HTTP_ROOT . MAN ?>armour.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands15" name="mens_brands[]" value="bonobos" type="checkbox" <?php if (isset($menbrand) && in_array('bonobos', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands15">
                                                                <img src="<?= HTTP_ROOT . MAN ?>bonobos.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands16" name="mens_brands[]" value="landsend" type="checkbox" <?php if (isset($menbrand) && in_array('landsend', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands16">
                                                                <img src="<?= HTTP_ROOT . MAN ?>landsend.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands17" name="mens_brands[]" value="jcrew" type="checkbox" <?php if (isset($menbrand) && in_array('jcrew', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands17">
                                                                <img src="<?= HTTP_ROOT . MAN ?>jcrew.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands18" name="mens_brands[]" value="oldnavy" type="checkbox" <?php if (isset($menbrand) && in_array('oldnavy', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands18">
                                                                <img src="<?= HTTP_ROOT . MAN ?>oldnavy.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands19" name="mens_brands[]" value="uniqlo" type="checkbox" <?php if (isset($menbrand) && in_array('uniqlo', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands19">
                                                                <img src="<?= HTTP_ROOT . MAN ?>uniqlo.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands20" name="mens_brands[]" value="northface" type="checkbox" <?php if (isset($menbrand) && in_array('northface', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands20">
                                                                <img src="<?= HTTP_ROOT . MAN ?>northface.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands21" name="mens_brands[]" value="h&m" type="checkbox" <?php if (isset($menbrand) && in_array('h&m', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands21">
                                                                <img src="<?= HTTP_ROOT . MAN ?>h&m.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands22" name="mens_brands[]" value="eagle" type="checkbox" <?php if (isset($menbrand) && in_array('eagle', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands22">
                                                                <img src="<?= HTTP_ROOT . MAN ?>eagle.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands23" name="mens_brands[]" value="ragnbone" type="checkbox" <?php if (isset($menbrand) && in_array('ragnbone', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands23">
                                                                <img src="<?= HTTP_ROOT . MAN ?>ragnbone.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands24" name="mens_brands[]" value="bensharma" type="checkbox" <?php if (isset($menbrand) && in_array('bensharma', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands24">
                                                                <img src="<?= HTTP_ROOT . MAN ?>bensharma.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands25" name="mens_brands[]" value="express" type="checkbox" <?php if (isset($menbrand) && in_array('express', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands25">
                                                                <img src="<?= HTTP_ROOT . MAN ?>express.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands26" name="mens_brands[]" value="polo" type="checkbox" <?php if (isset($menbrand) && in_array('polo', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands26">
                                                                <img src="<?= HTTP_ROOT . MAN ?>polo.png" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens_brands27" name="mens_brands[]" value="bananarepublic" type="checkbox" <?php if (isset($menbrand) && in_array('bananarepublic', @$menbrand)) { ?> checked <?php } ?>>
                                                            <label for="mens_brands27">
                                                                <img src="<?= HTTP_ROOT . MAN ?>bananarepublic.png" alt="">
                                                            </label>

                                                        </li>  
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--brands section-->
                                    <!--How much are you willing to spend on the following items? (We’ll work within your budget.)-->
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How much are you willing to spend on the following items? (We’ll work within your budget.)</h3>	
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">BUTTON-UP SHIRTS</font></b></nav>                                                
                                                <ul>
                                                    <li><label for="spendiness_button_up_shirts_mens" class="input-control radio">
                                                            <input type="radio" id="spendiness_button_up_shirts_mens" name="button_shirts" value="1" <?= @$MenStyle->button_shirts == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Under $50

                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_button_up_shirts_mens2" class="input-control radio">
                                                            <input type="radio" id="spendiness_button_up_shirts_mens2" name="button_shirts" value="2" <?= @$MenStyle->button_shirts == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$50 - $75
                                                        </label></li>
                                                    <li><label for="spendiness_button_up_shirts_mens3" class="input-control radio">
                                                            <input type="radio" id="spendiness_button_up_shirts_mens3" name="button_shirts" value="3" <?= @$MenStyle->button_shirts == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$75 - $100
                                                        </label></li>
                                                    <li><label for="spendiness_button_up_shirts_mens4" class="input-control radio">
                                                            <input type="radio" id="spendiness_button_up_shirts_mens4" name="button_shirts" value="4" <?= @$MenStyle->button_shirts == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$100 - $125
                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_button_up_shirts_mens5" class="input-control radio">
                                                            <input type="radio" id="spendiness_button_up_shirts_mens5" name="button_shirts" value="5" <?= @$MenStyle->button_shirts == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$125+
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">TEES & POLOS</font></b></nav>                                                
                                                <ul>
                                                    <li><label for="spendiness_tees_polos" class="input-control radio">
                                                            <input type="radio" id="spendiness_tees_polos" name="tees_polos" value="1" <?= @$MenStyle->tees_polos == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Under $30
                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_tees_polos2" class="input-control radio">
                                                            <input type="radio" id="spendiness_tees_polos2" name="tees_polos" value="2" <?= @$MenStyle->tees_polos == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$30 - $50
                                                        </label></li>
                                                    <li><label for="spendiness_tees_polos3" class="input-control radio">
                                                            <input type="radio" id="spendiness_tees_polos3" name="tees_polos" value="3" <?= @$MenStyle->tees_polos == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$50 - $70
                                                        </label></li>
                                                    <li><label for="spendiness_tees_polos4" class="input-control radio">
                                                            <input type="radio" id="spendiness_tees_polos4" name="tees_polos" value="4" <?= @$MenStyle->tees_polos == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$70 - $90
                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_tees_polos5" class="input-control radio">
                                                            <input type="radio" id="spendiness_tees_polos5" name="tees_polos" value="5" <?= @$MenStyle->tees_polos == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span> $90+
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">SWEATERS & SWEATSHIRTS</font></b></nav>
                                                <ul>
                                                    <li><label for="spendiness_sweaters_sweatshirts1" class="input-control radio">
                                                            <input type="radio" id="spendiness_sweaters_sweatshirts1" name="weaters_sweatshirts" value="1" <?= @$MenStyle->weaters_sweatshirts == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Under $50
                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_sweaters_sweatshirts2" class="input-control radio">
                                                            <input type="radio" id="spendiness_sweaters_sweatshirts2" name="weaters_sweatshirts" value="2" <?= @$MenStyle->weaters_sweatshirts == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$50 - $75
                                                        </label></li>
                                                    <li><label for="spendiness_sweaters_sweatshirts3" class="input-control radio">
                                                            <input type="radio" id="spendiness_sweaters_sweatshirts3" name="weaters_sweatshirts" value="3" <?= @$MenStyle->weaters_sweatshirts == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$75 - $100
                                                        </label></li>
                                                    <li><label for="spendiness_sweaters_sweatshirts4" class="input-control radio">
                                                            <input type="radio" id="spendiness_sweaters_sweatshirts4" name="weaters_sweatshirts" value="4" <?= @$MenStyle->weaters_sweatshirts == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$100 - $125
                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_sweaters_sweatshirts5" class="input-control radio">
                                                            <input type="radio" id="spendiness_sweaters_sweatshirts5" name="weaters_sweatshirts" value="5" <?= @$MenStyle->weaters_sweatshirts == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$125+
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">PANTS & DENIM</font></b></nav>
                                                <ul>
                                                    <li><label for="spendiness_pants_denim" class="input-control radio">
                                                            <input type="radio" id="spendiness_pants_denim" name="pants_denim" value="1" <?= @$MenStyle->pants_denim == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Under $75
                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_pants_denim2" class="input-control radio">
                                                            <input type="radio" id="spendiness_pants_denim2" name="pants_denim" value="2" <?= @$MenStyle->pants_denim == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$75 - $100
                                                        </label></li>
                                                    <li><label for="spendiness_pants_denim3" class="input-control radio">
                                                            <input type="radio" id="spendiness_pants_denim3" name="pants_denim" value="3" <?= @$MenStyle->pants_denim == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$100 - $125
                                                        </label></li>
                                                    <li><label for="spendiness_pants_denim4" class="input-control radio">
                                                            <input type="radio" id="spendiness_pants_denim4" name="pants_denim" value="4" <?= @$MenStyle->pants_denim == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$125 - $175
                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_pants_denim5" class="input-control radio">
                                                            <input type="radio" id="spendiness_pants_denim5" name="pants_denim" value="5" <?= @$MenStyle->pants_denim == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$175+
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">Shorts</font></b></nav>
                                                <ul>
                                                    <li><label for="spendiness_shorts" class="input-control radio">
                                                            <input type="radio" id="spendiness_shorts" name="shorts" value="1" <?= @$MenStyle->shorts == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Under $40
                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_shorts2" class="input-control radio">
                                                            <input type="radio" id="spendiness_shorts2" name="shorts" value="2" <?= @$MenStyle->shorts == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$40 - $60
                                                        </label></li>
                                                    <li><label for="spendiness_shorts32" class="input-control radio">
                                                            <input type="radio" id="spendiness_shorts32" name="shorts" value="3" <?= @$MenStyle->shorts == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$60 - $80
                                                        </label></li>
                                                    <li><label for="spendiness_shorts42" class="input-control radio">
                                                            <input type="radio" id="spendiness_shorts42" name="shorts" value="4" <?= @$MenStyle->shorts == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$80 - $100
                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_shorts52" class="input-control radio">
                                                            <input type="radio" id="spendiness_shorts52" name="shorts" value="5" <?= @$MenStyle->shorts == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$100+
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">BLAZERS & OUTERWEAR</font></b></nav>
                                                <ul>
                                                    <li><label for="spendiness_blazers_outerwear1" class="input-control radio">
                                                            <input type="radio" id="spendiness_blazers_outerwear1" name="blazers_outerwear" value="1" <?= @$MenStyle->blazers_outerwear == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Under $75

                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_blazers_outerwear2" class="input-control radio">
                                                            <input type="radio" id="spendiness_blazers_outerwear2" name="blazers_outerwear" value="2" <?= @$MenStyle->blazers_outerwear == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$75 - $125
                                                        </label></li>
                                                    <li><label for="spendiness_blazers_outerwear3" class="input-control radio">
                                                            <input type="radio" id="spendiness_blazers_outerwear3" name="blazers_outerwear" value="3" <?= @$MenStyle->blazers_outerwear == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$125 - $175
                                                        </label></li>
                                                    <li><label for="spendiness_blazers_outerwear4" class="input-control radio">
                                                            <input type="radio" id="spendiness_blazers_outerwear4" name="blazers_outerwear" value="4" <?= @$MenStyle->blazers_outerwear == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$175 - $250
                                                        </label>
                                                    </li>
                                                    <li><label for="spendiness_blazers_outerwear5" class="input-control radio">
                                                            <input type="radio" id="spendiness_blazers_outerwear5" name="blazers_outerwear" value="5" <?= @$MenStyle->blazers_outerwear == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$175 - $250
                                                        </label></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <nav><b><font size="4">SHOES </font></b></nav>
                                                <ul>
                                                    <li><label for="SHOES1" class="input-control radio">
                                                            <input type="radio" id="SHOES1" name="shoes" value="1" <?= @$MenStyle->shoes == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Under $75
                                                        </label>
                                                    </li>
                                                    <li><label for="SHOES2" class="input-control radio">
                                                            <input type="radio" id="SHOES2" name="shoes" value="2" <?= @$MenStyle->shoes == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$75 - $125
                                                        </label></li>
                                                    <li><label for="SHOES3" class="input-control radio">
                                                            <input type="radio" id="SHOES3" name="shoes" value="3" <?= @$MenStyle->shoes == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$125 - $175
                                                        </label></li>
                                                    <li><label for="SHOES4" class="input-control radio">
                                                            <input type="radio" id="SHOES4" name="shoes" value="4" <?= @$MenStyle->shoes == 4 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$175 - $250
                                                        </label>
                                                    </li>
                                                    <li><label for="SHOES5" class="input-control radio">
                                                            <input type="radio" id="SHOES5" name="shoes" value="5" <?= @$MenStyle->shoes == 5 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>$250+
                                                        </label></li>
                                                </ul>
                                            </div>

                                        </div>	
                                    </div>
                                    <!--How much are you willing to spend on the following items? (We’ll work within your budget.)-->
                                    <!--colors-->
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Would you wear these colors? </h3>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>BLACK</h4> </span>
                                                    <div style="background-color:#000000;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;
                                                         "></div>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="black" name="black" value="1" <?= @$MenStyle->black == 1 ? "checked" : ""; ?>>
                                                        <label for="black">Yes</label>
                                                        <input type="radio" id="black2" name="black" value="2" <?= @$MenStyle->black == 2 ? "checked" : ""; ?>>
                                                        <label for="black2">Maybe</label>
                                                        <input type="radio" id="black3" name="black" value="3" <?= @$MenStyle->black == 3 ? "checked" : ""; ?>>
                                                        <label for="black3">Never</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>BLUE</h4> </span>
                                                    <div style="background-color:#2369B4;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;
                                                         "></div>
                                                    <div class="switch-field">
                                                        <input type="radio" id="BLUE" name="blue" value="1" <?= @$MenStyle->blue == 1 ? "checked" : ""; ?>>
                                                        <label for="BLUE">Yes</label>
                                                        <input type="radio" id="BLUE1" name="blue" value="2" <?= @$MenStyle->blue == 2 ? "checked" : ""; ?>>
                                                        <label for="BLUE1">Maybe</label>
                                                        <input type="radio" id="BLUE2" name="blue" value="3" <?= @$MenStyle->blue == 3 ? "checked" : ""; ?>>
                                                        <label for="BLUE2">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>BROWN</h4></span>
                                                    <div style="background-color:#7A491E;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="BROWN621" name="brown" value="1" <?= @$MenStyle->brown == 1 ? "checked" : ""; ?>>
                                                        <label for="BROWN621">Yes</label>
                                                        <input type="radio" id="BROWN521" name="brown" value="2" <?= @$MenStyle->brown == 2 ? "checked" : ""; ?>>
                                                        <label for="BROWN521">Maybe</label>
                                                        <input type="radio" id="BROWN421" name="brown" value="3" <?= @$MenStyle->brown == 3 ? "checked" : ""; ?>>
                                                        <label for="BROWN421">Never</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">                                        

                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>GREEN</h4></span>
                                                    <div style="background-color:#294E2D;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">
                                                        <input type="radio" id="GREEN112" name="green" value="1" <?= @$MenStyle->green == 1 ? "checked" : ""; ?>>
                                                        <label for="GREEN112">Yes</label>
                                                        <input type="radio" id="GREEN5112" name="green" value="2" <?= @$MenStyle->green == 2 ? "checked" : ""; ?>>
                                                        <label for="GREEN5112">Maybe</label>
                                                        <input type="radio" id="GREEN4112" name="green" value="3" <?= @$MenStyle->green == 3 ? "checked" : ""; ?>>
                                                        <label for="GREEN4112">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>GREY</h4></span>
                                                    <div style="background-color:#7E7E7E;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="GREY" name="grey" value="1" <?= @$MenStyle->grey == 1 ? "checked" : ""; ?>>
                                                        <label for="GREY">Yes</label>
                                                        <input type="radio" id="GREY2" name="grey" value="2" <?= @$MenStyle->grey == 2 ? "checked" : ""; ?>>
                                                        <label for="GREY2">Maybe</label>
                                                        <input type="radio" id="GREY3" name="grey" value="3" <?= @$MenStyle->grey == 3 ? "checked" : ""; ?>>
                                                        <label for="GREY3">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>KHAKI</h4></span>
                                                    <div style="background-color:#D9C78B;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">
                                                        <input type="radio" id="KHAKI6132" name="khaki" value="1" <?= @$MenStyle->khaki == 1 ? "checked" : ""; ?>>
                                                        <label for="KHAKI6132">Yes</label>
                                                        <input type="radio" id="KHAKI5132" name="khaki" value="2" <?= @$MenStyle->khaki == 2 ? "checked" : ""; ?>>
                                                        <label for="KHAKI5132">Maybe</label>
                                                        <input type="radio" id="KHAKI4132" name="khaki" value="3" <?= @$MenStyle->khaki == 3 ? "checked" : ""; ?>>
                                                        <label for="KHAKI4132">Never</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">                                            
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>LIGHT BLUE</h4></span>
                                                    <div style="background-color:#99CCE7;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">
                                                        <input type="radio" id="light_Blue6112" name="light_Blue" value="1" <?= @$MenStyle->light_Blue == 1 ? "checked" : ""; ?>>
                                                        <label for="light_Blue6112">Yes</label>
                                                        <input type="radio" id="light_Blue6113" name="light_Blue" value="2" <?= @$MenStyle->light_Blue == 2 ? "checked" : ""; ?>>
                                                        <label for="light_Blue6113">Maybe</label>
                                                        <input type="radio" id="light_Blue4112" name="light_Blue" value="3" <?= @$MenStyle->light_Blue == 3 ? "checked" : ""; ?>>
                                                        <label for="light_Blue4112">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>NAVY</h4></span>
                                                    <div style="background-color:#132954;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="navy1" name="navy" value="1" <?= @$MenStyle->navy == 1 ? "checked" : ""; ?>>
                                                        <label for="navy1">Yes</label>
                                                        <input type="radio" id="navy2" name="navy" value="2" <?= @$MenStyle->navy == 2 ? "checked" : ""; ?>>
                                                        <label for="navy2">Maybe</label>
                                                        <input type="radio" id="navy3" name="navy" value="3" <?= @$MenStyle->navy == 3 ? "checked" : ""; ?>>
                                                        <label for="navy3">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>OLIVE</h4></span>
                                                    <div style="background-color:#777430;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">
                                                        <input type="radio" id="olive6112" name="olive" value="1" <?= @$MenStyle->olive == 1 ? "checked" : ""; ?>>
                                                        <label for="olive6112">Yes</label>
                                                        <input type="radio" id="olive5112" name="olive" value="2" <?= @$MenStyle->olive == 2 ? "checked" : ""; ?>>
                                                        <label for="olive5112">Maybe</label>
                                                        <input type="radio" id="olive4112" name="olive" value="3" <?= @$MenStyle->olive == 3 ? "checked" : ""; ?>>
                                                        <label for="olive4112">Never</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">                                            
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>PINK</h4></span>
                                                    <div style="background-color:#FFC0C6;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">
                                                        <input type="radio" id="pink6112" name="pink" value="1" <?= @$MenStyle->pink == 1 ? "checked" : ""; ?>>
                                                        <label for="pink6112">Yes</label>
                                                        <input type="radio" id="pink5112" name="pink" value="2" <?= @$MenStyle->pink == 2 ? "checked" : ""; ?>>
                                                        <label for="pink5112">Maybe</label> 
                                                        <input type="radio" id="pink4112" name="pink" value="3" <?= @$MenStyle->pink == 3 ? "checked" : ""; ?>>
                                                        <label for="pink4112">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>PURPLE</h4></span>
                                                    <div style="background-color:#9575B8;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="PURPLE" name="purple" value="1" <?= @$MenStyle->purple == 1 ? "checked" : ""; ?>>
                                                        <label for="PURPLE">Yes</label>
                                                        <input type="radio" id="PURPLE2" name="purple" value="2" <?= @$MenStyle->purple == 2 ? "checked" : ""; ?>>
                                                        <label for="PURPLE2">Maybe</label>
                                                        <input type="radio" id="PURPLE3" name="purple" value="3" <?= @$MenStyle->purple == 3 ? "checked" : ""; ?>>
                                                        <label for="PURPLE3">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>RED</h4></span>
                                                    <div style="background-color:#B73620;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">
                                                        <input type="radio" id="RED6112" name="red" value="1" <?= @$MenStyle->red == 1 ? "checked" : ""; ?>>
                                                        <label for="RED6112">Yes</label>
                                                        <input type="radio" id="RED5112" name="red" value="2" <?= @$MenStyle->red == 2 ? "checked" : ""; ?>>
                                                        <label for="RED5112">Maybe</label>
                                                        <input type="radio" id="RED4112" name="red" value="3" <?= @$MenStyle->red == 3 ? "checked" : ""; ?>>
                                                        <label for="RED4112">Never</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">                                            
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>SALMON</h4></span>
                                                    <div style="background-color:#E46C6D;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">
                                                        <input type="radio" id="salmon6112" name="salmon" value="1" <?= @$MenStyle->salmon == 1 ? "checked" : ""; ?>>
                                                        <label for="salmon6112">Yes</label>
                                                        <input type="radio" id="salmon5112" name="salmon" value="2" <?= @$MenStyle->salmon == 2 ? "checked" : ""; ?>>
                                                        <label for="salmon5112">Maybe</label>
                                                        <input type="radio" id="salmon4112" name="salmon" value="3" <?= @$MenStyle->salmon == 3 ? "checked" : ""; ?>>
                                                        <label for="salmon4112">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>WHITE</h4></span>
                                                    <div style="background-color:#FFFFFF;height: 52px;width: 73%;border: 1px solid #B5AAA5;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="WHITE" name="white" value="1" <?= @$MenStyle->white == 1 ? "checked" : ""; ?>>
                                                        <label for="WHITE">Yes</label>
                                                        <input type="radio" id="WHITE2" name="white" value="2" <?= @$MenStyle->white == 2 ? "checked" : ""; ?>>
                                                        <label for="WHITE2">Maybe</label>
                                                        <input type="radio" id="WHITE3" name="white" value="3" <?= @$MenStyle->white == 3 ? "checked" : ""; ?>>
                                                        <label for="WHITE3">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <span><h4>YELLOW</h4></span>
                                                    <div style="background-color:#F3F384;height: 52px;width: 73%;border: 1px solid #B5AAA;margin-bottom: 6px;"></div>
                                                    <div class="switch-field">
                                                        <input type="radio" id="yellow6112" name="yellow" value="1" <?= @$MenStyle->yellow == 1 ? "checked" : ""; ?>>
                                                        <label for="yellow6112">Yes</label>
                                                        <input type="radio" id="yellow5112" name="yellow" value="2" <?= @$MenStyle->yellow == 2 ? "checked" : ""; ?>>
                                                        <label for="yellow5112">Maybe</label>
                                                        <input type="radio" id="yellow4112" name="yellow" value="3" <?= @$MenStyle->yellow == 3 ? "checked" : ""; ?>>
                                                        <label for="yellow4112">Never</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--colors)-->
                                    <!--patterns-->
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Would you wear these patterns? </h3>
                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt1.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="shirt145" name="pattern_conversational_print_mens" value="1" <?= @$MenStyle->pattern_conversational_print_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt145">Yes</label>
                                                        <input type="radio" id="shirt245" name="pattern_conversational_print_mens" value="2" <?= @$MenStyle->pattern_conversational_print_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt245">Maybe</label>
                                                        <input type="radio" id="shirt345" name="pattern_conversational_print_mens" value="3" <?= @$MenStyle->pattern_conversational_print_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt345">Never</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt2.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">
                                                        <input type="radio" id="shirt21" name="pattern_large_floral_mens" value="1" <?= @$MenStyle->pattern_large_floral_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt21">Yes</label>
                                                        <input type="radio" id="shirt22" name="pattern_large_floral_mens" value="2" <?= @$MenStyle->pattern_large_floral_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt22">Maybe</label>
                                                        <input type="radio" id="shirt23" name="pattern_large_floral_mens" value="3" <?= @$MenStyle->pattern_large_floral_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt23">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt3.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="shirt31" name="pattern_dot_geo_mens" value="1" <?= @$MenStyle->pattern_dot_geo_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt31">Yes</label>
                                                        <input type="radio" id="shirt32" name="pattern_dot_geo_mens" value="2" <?= @$MenStyle->pattern_dot_geo_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt32">Maybe</label>
                                                        <input type="radio" id="shirt33" name="pattern_dot_geo_mens" value="3" <?= @$MenStyle->pattern_dot_geo_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt33">Never</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">                                        

                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt4.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">
                                                        <input type="radio" id="shirt41" name="pattern_gingham_mens" value="1" <?= @$MenStyle->pattern_gingham_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt41">Yes</label>
                                                        <input type="radio" id="shirt42" name="pattern_gingham_mens" value="2" <?= @$MenStyle->pattern_gingham_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt42">Maybe</label>
                                                        <input type="radio" id="shirt43" name="pattern_gingham_mens" value="3" <?= @$MenStyle->pattern_gingham_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt43">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt5.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="shirt51" name="pattern_micro_check_mens" value="1" <?= @$MenStyle->pattern_micro_check_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt51">Yes</label>
                                                        <input type="radio" id="shirt52" name="pattern_micro_check_mens" value="2"<?= @$MenStyle->pattern_micro_check_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt52">Maybe</label>
                                                        <input type="radio" id="shirt53" name="pattern_micro_check_mens" value="3" <?= @$MenStyle->pattern_micro_check_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt53">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt6.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">
                                                        <input type="radio" id="shirt61" name="pattern_buffalo_check_mens" value="1" <?= @$MenStyle->pattern_buffalo_check_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt61">Yes</label>
                                                        <input type="radio" id="shirt62" name="pattern_buffalo_check_mens" value="2" <?= @$MenStyle->pattern_buffalo_check_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt62">Maybe</label>
                                                        <input type="radio" id="shirt63" name="pattern_buffalo_check_mens" value="3" <?= @$MenStyle->pattern_buffalo_check_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt63">Never</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">                                            
                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt7.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">
                                                        <input type="radio" id="shirt71" name="pattern_small_floral_mens" value="1" <?= @$MenStyle->pattern_small_floral_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt71">Yes</label>
                                                        <input type="radio" id="shirt72" name="pattern_small_floral_mens" value="2" <?= @$MenStyle->pattern_small_floral_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt72">Maybe</label>
                                                        <input type="radio" id="shirt74" name="pattern_small_floral_mens" value="3" <?= @$MenStyle->pattern_small_floral_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt74">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt9.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="shirt91" name="pattern_windowpane_mens" value="1" <?= @$MenStyle->pattern_windowpane_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt91">Yes</label>
                                                        <input type="radio" id="shirt92" name="pattern_windowpane_mens" value="2" <?= @$MenStyle->pattern_windowpane_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt92">Maybe</label>
                                                        <input type="radio" id="shirt93" name="pattern_windowpane_mens" value="3" <?= @$MenStyle->pattern_windowpane_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt93">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt8.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">
                                                        <input type="radio" id="shirt81" name="pattern_plaid_mens" value="1" <?= @$MenStyle->pattern_plaid_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt81">Yes</label>
                                                        <input type="radio" id="shirt82" name="pattern_plaid_mens" value="2" <?= @$MenStyle->pattern_plaid_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt82">Maybe</label>
                                                        <input type="radio" id="shirt83" name="pattern_plaid_mens" value="3" <?= @$MenStyle->pattern_plaid_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt83">Never</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">                                            
                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt10.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">
                                                        <input type="radio" id="shirt10" name="pattern_vertical_stripes_mens" value="1" <?= @$MenStyle->pattern_vertical_stripes_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt10">Yes</label>
                                                        <input type="radio" id="shirt101" name="pattern_vertical_stripes_mens" value="2" <?= @$MenStyle->pattern_vertical_stripes_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt101">Maybe</label>
                                                        <input type="radio" id="shirt102" name="pattern_vertical_stripes_mens" value="3" <?= @$MenStyle->pattern_vertical_stripes_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt102">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt11.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="shirt111" name="pattern_tartan_mens" value="1" <?= @$MenStyle->pattern_tartan_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt111">Yes</label>
                                                        <input type="radio" id="shirt112" name="pattern_tartan_mens" value="2" <?= @$MenStyle->pattern_tartan_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt112">Maybe</label>
                                                        <input type="radio" id="shirt113" name="pattern_tartan_mens" value="3" <?= @$MenStyle->pattern_tartan_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt113">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">

                                                    <img src="<?= HTTP_ROOT . MAN ?>shirt12.jpg" alt="" width="200px" height="200px">

                                                    <div class="switch-field">
                                                        <input type="radio" id="shirt121" name="pattern_horizontal_stripes_mens" value="1" <?= @$MenStyle->pattern_horizontal_stripes_mens == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt121">Yes</label>
                                                        <input type="radio" id="shirt122" name="pattern_horizontal_stripes_mens" value="2" <?= @$MenStyle->pattern_horizontal_stripes_mens == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt122">Maybe</label>
                                                        <input type="radio" id="shirt123" name="pattern_horizontal_stripes_mens" value="3" <?= @$MenStyle->pattern_horizontal_stripes_mens == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt123">Never</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--patterns-->
                                    <!--shoes-->
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Would you wear these shoes? </h3>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <nav><b><font size="4">LOAFER / SLIP-ON </font></b></nav>
                                                    <label for="radio1">
                                                        <img src="<?= HTTP_ROOT . MAN ?>shoe1.jpg" alt="" height="200px" width="200px">
                                                    </label>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="shirt1" name="loafer_slip" value="1" <?= @$MenStyle->loafer_slip == 1 ? "checked" : ""; ?>>
                                                        <label for="shirt1">Yes</label>
                                                        <input type="radio" id="black2" name="loafer_slip" value="2" <?= @$MenStyle->loafer_slip == 2 ? "checked" : ""; ?>>
                                                        <label for="shirt2">Maybe</label>
                                                        <input type="radio" id="black3" name="loafer_slip" value="3" <?= @$MenStyle->loafer_slip == 3 ? "checked" : ""; ?>>
                                                        <label for="shirt3">Never</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <nav><b><font size="4">DRIVER </font></b></nav>
                                                    <label for="radio1">
                                                        <img src="<?= HTTP_ROOT . MAN ?>shoe2.jpg" alt="" height="200px" width="200px">
                                                    </label>
                                                    <div class="switch-field">
                                                        <input type="radio" id="druver" name="druver" value="1" <?= @$MenStyle->druver == 1 ? "checked" : ""; ?>>
                                                        <label for="druver">Yes</label>
                                                        <input type="radio" id="druver22" name="druver" value="2" <?= @$MenStyle->druver == 2 ? "checked" : ""; ?>>
                                                        <label for="druver22">Maybe</label>
                                                        <input type="radio" id="druver23" name="druver" value="3" <?= @$MenStyle->druver == 3 ? "checked" : ""; ?>>
                                                        <label for="druver23">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <nav><b><font size="4">CASUAL SNEAKER</font></b></nav>
                                                    <label for="radio1">
                                                        <img src="<?= HTTP_ROOT . MAN ?>shoe3.jpg" alt="" height="200px" width="200px">
                                                    </label>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="casual_sneaker31" name="casual_sneaker" value="1" <?= @$MenStyle->casual_sneaker == 1 ? "checked" : ""; ?>>
                                                        <label for="casual_sneaker31">Yes</label>
                                                        <input type="radio" id="casual_sneaker32" name="casual_sneaker" value="2" <?= @$MenStyle->casual_sneaker == 2 ? "checked" : ""; ?>>
                                                        <label for="casual_sneaker32">Maybe</label>
                                                        <input type="radio" id="casual_sneaker33" name="casual_sneaker" value="3" <?= @$MenStyle->casual_sneaker == 3 ? "checked" : ""; ?>>
                                                        <label for="casual_sneaker33">Never</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12"> 
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <nav><b><font size="4">PERFORMANCE SNEAKER </font></b></nav>
                                                    <label for="radio1">
                                                        <img src="<?= HTTP_ROOT . MAN ?>shoe4.jpg" alt="" height="200px" width="200px">
                                                    </label>
                                                    <div class="switch-field">
                                                        <input type="radio" id="performance_senkar41" name="performance_senkar" value="1" <?= @$MenStyle->performance_senkar == 1 ? "checked" : ""; ?>>
                                                        <label for="performance_senkar41">Yes</label>
                                                        <input type="radio" id="performance_senkar42" name="performance_senkar" value="2" <?= @$MenStyle->performance_senkar == 2 ? "checked" : ""; ?>>
                                                        <label for="performance_senkar42">Maybe</label>
                                                        <input type="radio" id="performance_senkar43" name="performance_senkar" value="3" <?= @$MenStyle->performance_senkar == 3 ? "checked" : ""; ?>>
                                                        <label for="performance_senkar43">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <nav><b><font size="4">SANDAL </font></b></nav>
                                                    <label for="radio1">
                                                        <img src="<?= HTTP_ROOT . MAN ?>shoe5.jpg" alt="" height="200px" width="200px">
                                                    </label>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="sandal51" name="sandal" value="1" <?= @$MenStyle->sandal == 1 ? "checked" : ""; ?>>
                                                        <label for="sandal51">Yes</label>
                                                        <input type="radio" id="sandal52" name="sandal" value="2" <?= @$MenStyle->sandal == 2 ? "checked" : ""; ?>>
                                                        <label for="sandal52">Maybe</label>
                                                        <input type="radio" id="sandal53" name="sandal" value="3" <?= @$MenStyle->sandal == 3 ? "checked" : ""; ?>>
                                                        <label for="sandal53">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <nav><b><font size="4">BOOT </font></b></nav>
                                                    <label for="radio1">
                                                        <img src="<?= HTTP_ROOT . MAN ?>shoe6.jpg" alt="" height="200px" width="200px">
                                                    </label>
                                                    <div class="switch-field">
                                                        <input type="radio" id="boot61" name="boot" value="1" <?= @$MenStyle->boot == 1 ? "checked" : ""; ?>>
                                                        <label for="boot61">Yes</label>
                                                        <input type="radio" id="boot62" name="boot" value="2" <?= @$MenStyle->boot == 2 ? "checked" : ""; ?>>
                                                        <label for="boot62">Maybe</label>
                                                        <input type="radio" id="boot63" name="boot" value="3" <?= @$MenStyle->boot == 3 ? "checked" : ""; ?>>
                                                        <label for="boot63">Never</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">                                            
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <nav><b><font size="4">LACE-UP / DRESS SHOE </font></b></nav>
                                                    <label for="radio1">
                                                        <img src="<?= HTTP_ROOT . MAN ?>shoe8.jpg" alt="" height="200px" width="200px">
                                                    </label>
                                                    <div class="switch-field">
                                                        <input type="radio" id="l71" name="Laceup_dress" value="1" <?= @$MenStyle->Laceup_dress == 1 ? "checked" : ""; ?>>
                                                        <label for="l71">Yes</label>
                                                        <input type="radio" id="l72" name="Laceup_dress" value="2" <?= @$MenStyle->Laceup_dress == 2 ? "checked" : ""; ?>>
                                                        <label for="l72">Maybe</label>
                                                        <input type="radio" id="l74" name="Laceup_dress" value="3" <?= @$MenStyle->Laceup_dress == 3 ? "checked" : ""; ?>>
                                                        <label for="l74">Never</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-lg-4 col-md-4">
                                                    <nav><b><font size="4">BOAT SHOE </font></b></nav>
                                                    <label for="shoe">
                                                        <img src="<?= HTTP_ROOT . MAN ?>shoe7.jpg" alt="" height="200px" width="200px">
                                                    </label>
                                                    <div class="switch-field">                                                   
                                                        <input type="radio" id="boat91" name="boatshoe" value="1" <?= @$MenStyle->boatshoe == 1 ? "checked" : ""; ?>>
                                                        <label for="boat91">Yes</label>
                                                        <input type="radio" id="boat92" name="boatshoe" value="2" <?= @$MenStyle->boatshoe == 2 ? "checked" : ""; ?>>
                                                        <label for="boat92">Maybe</label>
                                                        <input type="radio" id="boat93" name="boatshoe" value="3" <?= @$MenStyle->boatshoe == 3 ? "checked" : ""; ?>>
                                                        <label for="boat93">Never</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                    <!--shoes-->
                                    <!--men-style-sphere-collection-->
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="type-box">
                                                    <h3>Which outfits would you wear? </h3>
                                                    <small>Select all that apply. </small>                                                    
                                                    <ul>
                                                        <li>

                                                            <input class="radio-box" name="style_sphere_selections_v2[]" value="1" id="mens1" type="checkbox" <?php if (isset($style_sphere) && in_array('1', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens1">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit1.jpg" alt="">
                                                            </label>

                                                        </li>
                                                        <li>

                                                            <input class="radio-box" name="style_sphere_selections_v2[]" value="2" type="checkbox" checked="" id="mens2" <?php if (isset($style_sphere) && in_array('2', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens2">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit2.jpg" alt="">
                                                            </label>

                                                        </li>
                                                        <li>

                                                            <input class="radio-box" id="mens3" name="style_sphere_selections_v2[]" value="3" type="checkbox" <?php if (isset($style_sphere) && in_array('3', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens3">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit3.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens4" name="style_sphere_selections_v2[]" value="4" type="checkbox" <?php if (isset($style_sphere) && in_array('4', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens4">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit4.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens5" name="style_sphere_selections_v2[]" value="5" type="checkbox" <?php if (isset($style_sphere) && in_array('5', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens5">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit5.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens6" name="style_sphere_selections_v2[]" value="6" type="checkbox" <?php if (isset($style_sphere) && in_array('6', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens6">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit6.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens7" name="style_sphere_selections_v2[]" value="7" type="checkbox" <?php if (isset($style_sphere) && in_array('7', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens7">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit7.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens8" name="style_sphere_selections_v2[]" value="8" type="checkbox" <?php if (isset($style_sphere) && in_array('8', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens8">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit8.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens9" name="style_sphere_selections_v2[]" value="9" type="checkbox" <?php if (isset($style_sphere) && in_array('9', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens9">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit9.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens10" name="style_sphere_selections_v2[]" value="10" type="checkbox" <?php if (isset($style_sphere) && in_array('10', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens10">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit10.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>

                                                            <input class="radio-box" id="mens11" name="style_sphere_selections_v2[]" value="11" type="checkbox" <?php if (isset($style_sphere) && in_array('11', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens11">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit11.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens12" name="style_sphere_selections_v2[]" value="12" type="checkbox" <?php if (isset($style_sphere) && in_array('12', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens12">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit12.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens13" name="style_sphere_selections_v2[]" value="13" type="checkbox" <?php if (isset($style_sphere) && in_array('13', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens13">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit13.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens14" name="style_sphere_selections_v2[]" value="14" type="checkbox" <?php if (isset($style_sphere) && in_array('14', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens14">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit14.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens15" name="style_sphere_selections_v2[]" value="15" type="checkbox" <?php if (isset($style_sphere) && in_array('15', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens15">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit15.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens16" name="style_sphere_selections_v2[]" value="16" type="checkbox" <?php if (isset($style_sphere) && in_array('16', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens16">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit16.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens17" name="style_sphere_selections_v2[]" value="17" type="checkbox" <?php if (isset($style_sphere) && in_array('17', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens17">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit17.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens18" name="style_sphere_selections_v2[]" value="18" type="checkbox" <?php if (isset($style_sphere) && in_array('18', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens18">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit18.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens19" name="style_sphere_selections_v2[]" value="19" type="checkbox" <?php if (isset($style_sphere) && in_array('19', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens19">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit19.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens20" name="style_sphere_selections_v2[]" value="20" type="checkbox" <?php if (isset($style_sphere) && in_array('20', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens20">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit20.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens21" name="style_sphere_selections_v2[]" value="21" type="checkbox" <?php if (isset($style_sphere) && in_array('21', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens21">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit21.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens22" name="style_sphere_selections_v2[]" value="22" type="checkbox" <?php if (isset($style_sphere) && in_array('22', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens22">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit22.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens23" name="style_sphere_selections_v2[]" value="23" type="checkbox" <?php if (isset($style_sphere) && in_array('23', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens23">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit23.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens24" name="style_sphere_selections_v2[]" value="24" type="checkbox" <?php if (isset($style_sphere) && in_array('24', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens24">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit24.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens25" name="style_sphere_selections_v2[]" value="25" type="checkbox" <?php if (isset($style_sphere) && in_array('25', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens25">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit25.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens26" name="style_sphere_selections_v2[]" value="26" type="checkbox" <?php if (isset($style_sphere) && in_array('26', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens26">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit26.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                        <li>                                                            
                                                            <input class="radio-box" id="mens27" name="style_sphere_selections_v2[]" value="27" type="checkbox" <?php if (isset($style_sphere) && in_array('27', @$style_sphere)) { ?> checked <?php } ?>>
                                                            <label for="mens27">
                                                                <img src="<?= HTTP_ROOT . MAN ?>outfit27.jpg" alt="">
                                                            </label>

                                                        </li>  
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--men-style-sphere-collection-->
                                    <!--adventurous-->
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How adventurous should your Fixes be?  </h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label for="adv1" class="input-control radio">
                                                            <input type="radio" id="adv1" name="adventurous_fixes" value="1" <?= @$MenStyle->adventurous_fixes == 1 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Extremely: Bring it on—I’m into trying out new brands & trends
                                                        </label>
                                                    </li>
                                                    <li><label for="adv2" class="input-control radio">
                                                            <input type="radio" id="adv2" name="adventurous_fixes" value="2" <?= @$MenStyle->adventurous_fixes == 2 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span> Moderately: I would like some items to expand my style boundaries
                                                        </label>
                                                    </li>                                                                                                     
                                                    <li><label for="adv3" class="input-control radio">
                                                            <input type="radio" id="adv3" name="adventurous_fixes" value="3" <?= @$MenStyle->adventurous_fixes == 3 ? "checked" : ""; ?>>
                                                            <span class="input-control__indicator"></span>Never: Keep my clothing based on my current style
                                                        </label>
                                                    </li>                                                                                                     

                                                </ul>
                                            </div>
                                        </div>	
                                    </div>
                                    <!--adventurous-->
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Share your social media profiles, so your Stylist can get to know you better.  </h3>
                                                <small>This step is optional and confidential. It will be used only for styling purposes. </small>
                                            </div>
                                        </div>
                                        <div class=" select-box">
                                            <nav><b><font size="4">LINKEDIN PROFILE</font></b></nav>
                                            <small>Ex: linkedin.com/in/username. </small>
                                            <input placeholder="" name="linkdin_profile" id="linkdin_profile" value="<?= @$MenStyle->linkdin_profile; ?>" type="text" class="form-control">

                                        </div>
                                        <div class=" select-box">
                                            <nav><b><font size="4">INSTAGRAM HANDLE</font></b></nav>
                                            <small>Ex: drapefit </small>
                                            <input placeholder="" name="instagram" id="instagram" value="<?= @$MenStyle->instagram; ?>" type="text" class="form-control">

                                        </div>
                                        <div class=" select-box">
                                            <nav><b><font size="4">TWITTER HANDLE</font></b></nav>
                                            <small>Ex: drapefit </small>
                                            <input placeholder="" name="twitter" id="twitter" value="<?= @$MenStyle->twitter; ?>" type="text" class="form-control">


                                        </div>
                                        <div class=" select-box">
                                            <nav><b><font size="4">PINTEREST HANDLE</font></b></nav>
                                            <small>Ex: drapefit </small>
                                            <input placeholder="" name="pinterest" id="pinterest" value="<?= @$MenStyle->pinterest; ?>" type="text" class="form-control">


                                        </div>
                                    </div>
                                    <div class="form-box-data">

                                        <h3>Anything else your stylist should know?</h3>                               

                                        <h6>Share more about your lifestyle, physical features or favorite stores.</h6>

                                        <textarea name="profile_note" id="profile_note" class="form-control" rows="3" style="padding: 5px 12px 6px;
                                                  width: 100%;
                                                  border-color: #C0BDBA;
                                                  font-size: 18px;
                                                  line-height: 1.4;
                                                  min-height: 150px;
                                                  border-radius: 0px;
                                                  -webkit-appearance: none;"><?= @$MenStyle->profile_note; ?></textarea>






                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                            <button type="submit" name="save" value="save">Save all changes <i class="fas fa-arrow-right"></i></button>
                                            <a href="#">Save and return Home. »</a>
                                        </div>
                                    </div>
        <?= $this->Form->end(); ?>

                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else if ($this->request->session()->read('PROFILE') == 'KIDS') {
        ?>
        <div class="style-kids">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="tab" role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" <?php if ($sections == 'Section1') { ?> class="active" <?php } else if ($sections == '') { ?> class="active" <?php } ?>><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" onclick='getPushUrl("section1");' > About <?php
        if (@$kidmenu->kids_first_name) {
            echo $kidmenu->kids_first_name;
        } else {
            echo 'your child';
        }
        ?></a></li>
                                <li role="presentation" <?php if ($sections == 'section2') { ?> class="active" <?php } ?>><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab" onclick='getPushUrl("section2");' >Size & Fit</a></li>
                                <li role="presentation" <?php if ($sections == 'section3') { ?> class="active" <?php } ?>><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab" onclick='getPushUrl("section3");'>Clothing Types</a></li>
                                <li role="presentation" <?php if ($sections == 'section4') { ?> class="active" <?php } ?>><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab" onclick='getPushUrl("section4");'>Style</a></li>
                                <li role="presentation" <?php if ($sections == 'section5') { ?> class="active" <?php } ?>><a href="#Section5" aria-controls="messages" role="tab" data-toggle="tab"onclick='getPushUrl("section5");'>Price & Shopping</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabs data-filup ">
                                <div role="tabpanel" class="tab-pane fade in <?php if ($sections == 'section1') { ?> active <?php } else if ($sections == '') { ?> active <?php } ?> " id="Section1">

                                    <h1>Welcome back!</h1>
                                    <p>Want to keep  Stylist in the loop? Update their Style Profile to reflect current tastes and needs—we know things change fast.</p>
                                    <p><span>We currently carry kids sizes 2T-14. Fixes can only be shipped to one address per family at this time.</span></p>
        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'style')) ?>
                                    <div class="form-box-data">
                                        <div class="row">                                            
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h3>What is your child’s first name?</h3>
                                                <div class="select-boxes">
                                                    <input name="kids_first_name" id="kids_first_name" type="text" placeholder=""  value="<?php echo @$kidmenu->kids_first_name; ?>">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="form-box-data <?php
        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            
        }
        ?>">
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h3>What is your child's birthday?</h3>
                                                <div class="input-group date" id="datetimepicker5">
                                                    <input type="text" class="form-control" name="kids_birthdate" id="user-input-kids_birthdate" value="<?php echo @$kidmenu->kids_birthdate; ?>" >
                                                    <!--<input type='text' class="form-control" value="" name="user_input_birthdate" id="user_input_birthdate"/>-->
                                                    <span class="input-group-addon">
                                                        <span><img src="<?php echo HTTP_ROOT ?>assets/images/calendar-filled.png" width="20px" height="20px"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h3>What's your relationship to your child?</h3>	
                                                <label for="kids_relationship_to_child_mother1" class="input-control radio">
                                                    <input type="radio" id="kids_relationship_to_child_mother1" name="kids_relationship_to_child" <?php if (@$kidmenu->kids_relationship_to_child == 'mother') { ?> checked="checked" <?php } ?> value="mother">
                                                    <span class="input-control__indicator"></span>Mother
                                                </label>

                                                <label for="kids_relationship_to_child_father2" class="input-control radio">
                                                    <input type="radio" id="kids_relationship_to_child_father2" name="kids_relationship_to_child" <?php if (@$kidmenu->kids_relationship_to_child == 'father') { ?> checked="checked" <?php } ?> value="father">
                                                    <span class="input-control__indicator"></span>Father
                                                </label>
                                                <label for="kids_relationship_to_child_other3" class="input-control radio">
                                                    <input type="radio" id="kids_relationship_to_child_other3" name="kids_relationship_to_child" <?php if (@$kidmenu->kids_relationship_to_child == 'other') { ?> checked="checked" <?php } ?> value="other">
                                                    <span class="input-control__indicator"></span>Other
                                                </label>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h3><?php echo @$kidDetails->kids_relationship_to_child; ?>Your child is looking for...</h3>
                                                <div class="switch-field">
                                                    <input type="radio" id="kids_clothing_gender_boys" name="kids_clothing_gender" <?php if (@$kidmenu->kids_clothing_gender == 'boys') { ?> checked="checked" <?php } else if (@$kidDetails->kids_clothing_gender == '') { ?> checked="checked" <?php } ?> value="boys"/>
                                                    <label for="kids_clothing_gender_boys">Boys clothing</label>
                                                    <input type="radio" id="kids_clothing_gender_girls" name="kids_clothing_gender" <?php if (@$kidmenu->kids_clothing_gender == 'girls') { ?> checked <?php } ?> value="girls" />
                                                    <label for="kids_clothing_gender_girls">Girls clothing</label>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How often does your child do the following activities?</h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <h4>Arts & Crafts</h4>
                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/img_1a.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input type="radio" id="Arts" name="kids_frequency_arts_and_crafts" value="often" <?php if (@$kidmenu->kids_frequency_arts_and_crafts == 'often') { ?> checked="checked" <?php } else if (@$kidDetails->kids_clothing_gender == '') { ?> checked="checked" <?php } ?> />
                                                                <label for="Arts">Often</label>
                                                                <input type="radio" id="Arts2" name="kids_frequency_arts_and_crafts" value="sometimes"<?php if (@$kidmenu->kids_frequency_arts_and_crafts == 'sometimes') { ?> checked="checked" <?php } ?> />
                                                                <label for="Arts2">Sometimes</label>
                                                                <input type="radio" id="Arts3" name="kids_frequency_arts_and_crafts" value="rarely" <?php if (@$kidmenu->kids_frequency_arts_and_crafts == 'rarely') { ?> checked="checked" <?php } ?> />
                                                                <label for="Arts3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Biking</h4>
                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/img_1a.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input type="radio" id="Biking" name="kids_frequency_biking" value="often" <?php if (@$kidmenu->kids_frequency_biking == 'often') { ?> checked="checked" <?php } else if (@$kidDetails->kids_frequency_biking == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="Biking">Often</label>
                                                                <input type="radio" id="Biking2" name="kids_frequency_biking" value="sometimes" <?php if (@$kidmenu->kids_frequency_biking == 'sometimes') { ?> checked="checked" <?php } ?> />
                                                                <label for="Biking2">Sometimes</label>
                                                                <input type="radio" id="Biking2" name="kids_frequency_biking" value="Rarely" <?php if (@$kidmenu->kids_frequency_biking == 'Rarely') { ?> checked="checked" <?php } ?> />
                                                                <label for="Biking2">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Theatre</h4>
                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/img_1a.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input type="radio" id="Theatre1" name="kids_frequency_theatre" value="often" <?php if (@$kidmenu->kids_frequency_theatre == 'often') { ?> checked="checked" <?php } else if (@$kidDetails->kids_frequency_theatre == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="Theatre1">Often</label>
                                                                <input type="radio" id="Theatre2" name="kids_frequency_theatre" value="sometimes" <?php if (@$kidmenu->kids_frequency_theatre == 'sometimes') { ?> checked="checked" <?php } ?> />
                                                                <label for="Theatre2">Sometimes</label>
                                                                <input type="radio" id="Theatre3" name="kids_frequency_theatre" value="rarely"<?php if (@$kidmenu->kids_frequency_theatre == 'rarely') { ?> checked="checked" <?php } ?> />
                                                                <label for="Theatre3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>DANCE</h4>
                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/img_1a.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input type="radio" id="DANCE" name="kids_frequency_dance" value="often" <?php if (@$kidmenu->kids_frequency_dance == 'often') { ?> checked="checked" <?php } else if (@$kidDetails->kids_frequency_dance == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="DANCE">Often</label>
                                                                <input type="radio" id="DANCE2" name="kids_frequency_dance" value="sometimes" <?php if (@$kidmenu->kids_frequency_dance == 'sometimes') { ?> checked="checked" <?php } ?> />
                                                                <label for="DANCE2">Sometimes</label>
                                                                <input type="radio" id="DANCE3" name="kids_frequency_dance" value="rarely" <?php if (@$kidmenu->kids_frequency_dance == 'rarely') { ?> checked="checked" <?php } ?>/>
                                                                <label for="DANCE3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Organized Sports</h4>
                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/img_1a.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input type="radio" id="Organized" name="kids_frequency_sports" value="often" <?php if (@$kidmenu->kids_frequency_sports == 'often') { ?> checked="checked" <?php } else if (@$kidDetails->kids_frequency_sports == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="Organized">Often</label>
                                                                <input type="radio" id="Organized2" name="kids_frequency_sports" value="sometimes" <?php if (@$kidmenu->kids_frequency_sports == 'sometimes') { ?> checked="checked" <?php } ?>/>
                                                                <label for="Organized2">Sometimes</label>
                                                                <input type="radio" id="Organized3" name="kids_frequency_sports" value="rarely" <?php if (@$kidmenu->kids_frequency_sports == 'rarely') { ?> checked="checked" <?php } ?> />
                                                                <label for="Organized3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Playing Outside</h4>
                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/img_1a.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input type="radio" id="Playing" name="kids_frequency_playing_outside" value="often" <?php if (@$kidmenu->kids_frequency_playing_outside == 'often') { ?> checked="checked" <?php } else if (@$kidDetails->kids_frequency_playing_outside == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="Playing">Often</label>
                                                                <input type="radio" id="Playing2" name="kids_frequency_playing_outside" value="sometimes" <?php if (@$kidmenu->kids_frequency_playing_outside == 'sometimes') { ?> checked="checked" <?php } ?>/>
                                                                <label for="Playing2">Sometimes</label>
                                                                <input type="radio" id="Playing3" name="kids_frequency_playing_outside" value="rarely" <?php if (@$kidmenu->kids_frequency_playing_outside == 'rarely') { ?> checked="checked" <?php } ?> />
                                                                <label for="Playing3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Musical Instruments</h4>
                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/img_1a.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input type="radio" id="Musical" name="kids_frequency_musical_instruments" value="often" <?php if (@$kidmenu->kids_frequency_musical_instruments == 'often') { ?> checked="checked" <?php } else if (@$kidDetails->kids_frequency_musical_instruments == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="Musical">Often</label>
                                                                <input type="radio" id="Musical2" name="kids_frequency_musical_instruments" value="sometimes" <?php if (@$kidmenu->kids_frequency_musical_instruments == 'sometimes') { ?> checked="checked" <?php } ?>  />
                                                                <label for="Musical2">Sometimes</label>
                                                                <input type="radio" id="Musical3" name="kids_frequency_musical_instruments" value="rarely" <?php if (@$kidmenu->kids_frequency_musical_instruments == 'rarely') { ?> checked="checked" <?php } ?>/>
                                                                <label for="Musical3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Reading</h4>
                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/img_1a.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input type="radio" id="Reading" name="kids_frequency_reading" value="often" <?php if (@$kidmenu->kids_frequency_reading == 'often') { ?> checked="checked" <?php } else if (@$kidDetails->kids_frequency_reading == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="Reading">Often</label>
                                                                <input type="radio" id="Reading2" name="kids_frequency_reading" value="sometimes" <?php if (@$kidmenu->kids_frequency_reading == 'sometimes') { ?> checked="checked" <?php } ?> />
                                                                <label for="Reading2">Sometimes</label>
                                                                <input type="radio" id="Reading3" name="kids_frequency_reading" value="rarely" <?php if (@$kidmenu->kids_frequency_reading == 'sometimes') { ?> checked="rarely" <?php } ?>  />
                                                                <label for="Reading3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Video Games</h4>
                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/img_1a.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input type="radio" id="Video" name="kids_frequency_video_games" value="often" <?php if (@$kidmenu->kids_frequency_video_games == 'often') { ?> checked="checked" <?php } else if (@$kidDetails->kids_frequency_video_games == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="Video">Often</label>
                                                                <input type="radio" id="Video2" name="kids_frequency_video_games" value="sometimes" <?php if (@$kidmenu->kids_frequency_video_games == 'often') { ?> checked="checked" <?php } ?> />
                                                                <label for="Video2">Sometimes</label>
                                                                <input type="radio" id="Video3" name="kids_frequency_video_games" value="rarely" <?php if (@$kidmenu->kids_frequency_video_games == 'rarely') { ?> checked="checked" <?php } ?> />
                                                                <label for="Video3">Rarely</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data checkboxes">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How would you describe your child's personality?</h3>
                                                <h6>Select all that apply.</h6>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <input id="kids_personality_types1" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('thoughtful', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="thoughtful">
                                                            <label for="kids_personality_types1">Thoughtful</label>
                                                        </li>
                                                        <li> 
                                                            <input id="kids_personality_types2" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('sporty', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="sporty">
                                                            <label for="kids_personality_types2">Sporty</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types3" type="checkbox" name="kids_personality_types[]"  <?php if (isset($KidsPersonalityValue) && in_array('shy', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="sporty" value="shy">
                                                            <label for="kids_personality_types3">Shy</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types4" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('outgoing', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="outgoing">
                                                            <label for="kids_personality_types4">Outgoing</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types5" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('artistic', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="artistic">
                                                            <label for="kids_personality_types5">Artistic</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types1a" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('chatty', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="chatty">
                                                            <label for="kids_personality_types1a">Chatty</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types6" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('bookworm', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="bookworm">
                                                            <label for="kids_personality_types6">Bookworm</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types7" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('curious', @$KidsPersonalityValue)) { ?> checked <?php } ?>  value="curious">
                                                            <label for="kids_personality_types7">  Curious</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types8" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('sassy', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="sassy">
                                                            <label for="kids_personality_types8"> Sassy</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types9" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('funny', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="funny">
                                                            <label for="kids_personality_types9"> Funny</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types10" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('independent', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="independent">
                                                            <label for="kids_personality_types10">   Independent</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types11" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('kind', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="kind">
                                                            <label for="kids_personality_types11">Kind</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types12" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('daredevil', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="daredevil">
                                                            <label for="kids_personality_types12">Daredevil</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types13" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('serious', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="serious">
                                                            <label for="kids_personality_types13">Serious</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types14" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('adventurous', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="adventurous">
                                                            <label for="kids_personality_types14">Adventurous</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_personality_types15" type="checkbox" name="kids_personality_types[]" <?php if (isset($KidsPersonalityValue) && in_array('confident', @$KidsPersonalityValue)) { ?> checked <?php } ?> value="confident">
                                                            <label for="kids_personality_types15">Confident</label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data checkboxes">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What are your main reasons for signing your child up for Stitch Fix?</h3>
                                                <h6>Select all that apply.</h6>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <input id="kids_primary_objectives16" type="checkbox" name="kids_primary_objectives[]" value="a_treat" <?php if (isset($KidsPrimaryValue) && in_array('a_treat', @$KidsPrimaryValue)) { ?> checked <?php } ?>  >
                                                            <label for="kids_primary_objectives16">  A treat for your child</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_primary_objectives26" type="checkbox" name="kids_primary_objectives[]" value="save_time" <?php if (isset($KidsPrimaryValue) && in_array('save_time', @$KidsPrimaryValue)) { ?> checked <?php } ?> >
                                                            <label for="kids_primary_objectives26">Save time or avoid shopping</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_primary_objectives36" type="checkbox" name="kids_primary_objectives[]" value="refresh_wardrobe"  <?php if (isset($KidsPrimaryValue) && in_array('refresh_wardrobe', @$KidsPrimaryValue)) { ?> checked <?php } ?>>
                                                            <label for="kids_primary_objectives36"> Refresh wardrobe</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_primary_objectives4" type="checkbox" name="kids_primary_objectives[]" value="fill_in_gaps" <?php if (isset($KidsPrimaryValue) && in_array('fill_in_gaps', @$KidsPrimaryValue)) { ?> checked <?php } ?>>
                                                            <label for="kids_primary_objectives4"> Fill in gaps</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_primary_objectives56" type="checkbox" name="kids_primary_objectives[]" value="try_new_styles" <?php if (isset($KidsPrimaryValue) && in_array('try_new_styles', @$KidsPrimaryValue)) { ?> checked <?php } ?>>
                                                            <label for="kids_primary_objectives56">Try new styles</label>
                                                        </li>
                                                        <li>
                                                            <input id="kids_primary_objectives1a6" type="checkbox" name="kids_primary_objectives[]" value="special_occasions"  <?php if (isset($KidsPrimaryValue) && in_array('special_occasions', @$KidsPrimaryValue)) { ?> checked <?php } ?> >
                                                            <label for="kids_primary_objectives1a6"> Find clothes for special occasions</label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                            <button type="submit" name="style" value="style" >Next: Size/fit <i class="fas fa-arrow-right"></i></button>
                                            <!--<a href="#">Save and return Home. »</a>-->
                                        </div>
                                    </div>
        <?php echo $this->Form->end(); ?>
                                </div>                                            
                                <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'section2') { ?> active in <?php } ?> "  id="Section2">

        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'kidsizefit')) ?>
                                    <div class="form-box-data">
                                        <div class="row">

                                            <div class="col-sm-6 col-lg-6 col-md-6">

                                                <h3>About how tall is your child?</h3>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="tell_ft" id="tell_ft" class="required">
                                                            <option value="NULL">--</option>
                                                            <option value="4" <?php if (@$KidsSizeFit->tell_ft == '4') { ?> selected <?php } ?>>4</option>
                                                            <option value="5" <?php if (@$KidsSizeFit->tell_ft == '5') { ?> selected <?php } ?>>5</option>
                                                            <option value="6" <?php if (@$KidsSizeFit->tell_ft == '6') { ?> selected <?php } ?>>6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class=" select-box">
                                                        <select id="tell_inch" name="tell_inch">
                                                            <option value="NULL">--</option>
                                                            <option value="1" <?php if (@$KidsSizeFit->tell_inch == '1') { ?> selected <?php } ?>>1</option>
                                                            <option value="2" <?php if (@$KidsSizeFit->tell_inch == '2') { ?> selected <?php } ?>>2</option>
                                                            <option value="3" <?php if (@$KidsSizeFit->tell_inch == '3') { ?> selected <?php } ?>>3</option>
                                                            <option value="4" <?php if (@$KidsSizeFit->tell_inch == '4') { ?> selected <?php } ?>>4</option>
                                                            <option value="5" <?php if (@$KidsSizeFit->tell_inch == '5') { ?> selected <?php } ?>>5</option>
                                                            <option value="6" <?php if (@$KidsSizeFit->tell_inch == '6') { ?> selected <?php } ?>>6</option>
                                                            <option value="7" <?php if (@$KidsSizeFit->tell_inch == '7') { ?> selected <?php } ?>>7</option>
                                                            <option value="8" <?php if (@$KidsSizeFit->tell_inch == '8') { ?> selected <?php } ?>>8</option>
                                                            <option value="9" <?php if (@$KidsSizeFit->tell_inch == '9') { ?> selected <?php } ?>>9</option>
                                                            <option value="10" <?php if (@$KidsSizeFit->tell_inch == '10') { ?> selected <?php } ?>>10</option>
                                                            <option value="11" <?php if (@$KidsSizeFit->tell_inch == '11') { ?> selected <?php } ?>>11</option>
                                                        </select>
                                                        <label>in.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">                                                
                                                <h3>About how much does your child weight? </h3>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <input type="text" placeholder="" name="kids_weight" id="kids_weight" value="<?php echo @$KidsSizeFit->kids_weight; ?>">
                                                        <label>lbs.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <h3>What sizes does your child typically wear?</h3>
                                        <h4 style="margin-top: 0;margin-bottom: 19px;">Size Chart</h4>
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4 style="margin-top: 0;">TOPS SIZE</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="top_size" id="top_size">
                                                            <option value="">--</option>
                                                            <option value="2t" <?php if (@$KidsSizeFit->top_size == '2t') { ?> selected <?php } ?>>2T</option>
                                                            <option value="3t" <?php if (@$KidsSizeFit->top_size == '3t') { ?> selected <?php } ?>>3T</option>
                                                            <option value="4t" <?php if (@$KidsSizeFit->top_size == '4t') { ?> selected <?php } ?>>4T</option>
                                                            <option value="5" <?php if (@$KidsSizeFit->top_size == '5') { ?> selected <?php } ?>>5</option>
                                                            <option value="6" <?php if (@$KidsSizeFit->top_size == '6') { ?> selected <?php } ?>>6</option>
                                                            <option value="7" <?php if (@$KidsSizeFit->top_size == '7') { ?> selected <?php } ?>>7</option>
                                                            <option value="8" <?php if (@$KidsSizeFit->top_size == '8') { ?> selected <?php } ?>>8</option>
                                                            <option value="10" <?php if (@$KidsSizeFit->top_size == '10') { ?> selected <?php } ?>>10</option>
                                                            <option value="12" <?php if (@$KidsSizeFit->top_size == '12') { ?> selected <?php } ?>>12</option>
                                                            <option value="14" <?php if (@$KidsSizeFit->top_size == '14') { ?> selected <?php } ?>>14</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4 style="margin-top: 0;">BOTTOMS SIZE</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="bottom_size" id="bottom_size">
                                                            <option value="">--</option>
                                                            <option value="2t" <?php if (@$KidsSizeFit->bottom_size == '2t') { ?> selected <?php } ?>>2T</option>
                                                            <option value="3t" <?php if (@$KidsSizeFit->bottom_size == '3t') { ?> selected <?php } ?>>3T</option>
                                                            <option value="4t" <?php if (@$KidsSizeFit->bottom_size == '4t') { ?> selected <?php } ?>>4T</option>
                                                            <option value="5" <?php if (@$KidsSizeFit->bottom_size == '5') { ?> selected <?php } ?>>5</option>
                                                            <option value="6" <?php if (@$KidsSizeFit->bottom_size == '6') { ?> selected <?php } ?>>6</option>
                                                            <option value="7" <?php if (@$KidsSizeFit->bottom_size == '7') { ?> selected <?php } ?>>7</option>
                                                            <option value="8" <?php if (@$KidsSizeFit->bottom_size == '8') { ?> selected <?php } ?>>8</option>
                                                            <option value="10" <?php if (@$KidsSizeFit->bottom_size == '10') { ?> selected <?php } ?>>10</option>
                                                            <option value="12" <?php if (@$KidsSizeFit->bottom_size == '12') { ?> selected <?php } ?>>12</option>
                                                            <option value="14" <?php if (@$KidsSizeFit->bottom_size == '14') { ?> selected <?php } ?>>14</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4 style="margin-top: 0;">SHOE SIZE</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="shoe_size" id="shoe_size">
                                                            <option value="">--</option>
                                                            <option value="2 Child" <?php if (@$KidsSizeFit->shoe_size == '2 Child') { ?> selected <?php } ?>>2 Child</option>
                                                            <option value="3 Child" <?php if (@$KidsSizeFit->shoe_size == '3 Child') { ?> selected <?php } ?>>3 Child</option>
                                                            <option value="4 Child" <?php if (@$KidsSizeFit->shoe_size == '4 Child') { ?> selected <?php } ?>>4 Child</option>
                                                            <option value="5 Child" <?php if (@$KidsSizeFit->shoe_size == '5 Child') { ?> selected <?php } ?>>5 Child</option>
                                                            <option value="6 Child" <?php if (@$KidsSizeFit->shoe_size == '6 Child') { ?> selected <?php } ?>>6 Child</option>
                                                            <option value="7 Child" <?php if (@$KidsSizeFit->shoe_size == '7 Child') { ?> selected <?php } ?>>7 Child</option>
                                                            <option value="8 Child" <?php if (@$KidsSizeFit->shoe_size == '8 Child') { ?> selected <?php } ?>>8 Child</option>
                                                            <option value="9 Child" <?php if (@$KidsSizeFit->shoe_size == '9 Child') { ?> selected <?php } ?>>9 Child</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Does your child have any of the following fit issues?</h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <h4>SHIRT SLEEVE LENGTH</h4>
                                                            <div class="switch-field">
                                                                <input type="radio" id="kids_fit_challenge_shirt_sleeve_length" name="kids_fit_challenge_shirt_sleeve_length" value="Too short" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_sleeve_length == 'Too short') { ?> checked="checked" <?php } else if (@$KidsSizeFit->kids_fit_challenge_shirt_sleeve_length == '') { ?> checked="checked" <?php } ?> />
                                                                <label for="kids_fit_challenge_shirt_sleeve_length">Too short</label>
                                                                <input type="radio" id="kids_fit_challenge_shirt_sleeve_length2" name="kids_fit_challenge_shirt_sleeve_length" value="None"<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_sleeve_length == 'None') { ?> checked="checked" <?php } ?> />
                                                                <label for="kids_fit_challenge_shirt_sleeve_length2">None</label>
                                                                <input type="radio" id="kids_fit_challenge_shirt_sleeve_length3" name="kids_fit_challenge_shirt_sleeve_length" value="Too long" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_sleeve_length == 'Too long') { ?> checked="checked" <?php } ?> />
                                                                <label for="kids_fit_challenge_shirt_sleeve_length3">Too long</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>SHIRT TORSO LENGTH</h4>
                                                            <div class="switch-field">
                                                                <input type="radio" id="kids_fit_challenge_shirt_torso_length" name="kids_fit_challenge_shirt_torso_length" value="Too short" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too short') { ?> checked="checked" <?php } else if (@$kidDetails->kids_frequency_biking == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="kids_fit_challenge_shirt_torso_length">Too short</label>
                                                                <input type="radio" id="kids_fit_challenge_shirt_torso_length2" name="kids_fit_challenge_shirt_torso_length" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'None') { ?> checked="checked" <?php } ?> />
                                                                <label for="kids_fit_challenge_shirt_torso_length2">None</label>
                                                                <input type="radio" id="kids_fit_challenge_shirt_torso_length3" name="kids_fit_challenge_shirt_torso_length" value="Too long" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_length == 'Too long') { ?> checked="checked" <?php } ?> />
                                                                <label for="kids_fit_challenge_shirt_torso_length3">Too long</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>SHIRT TORSO WIDTH</h4>
                                                            <div class="switch-field">
                                                                <input type="radio" id="kids_fit_challenge_shirt_torso_width4" name="kids_fit_challenge_shirt_torso_width" value="Too short" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too short') { ?> checked="checked" <?php } else if (@$kidDetails->kids_fit_challenge_shirt_torso_width == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="kids_fit_challenge_shirt_torso_widtht4">Often</label>
                                                                <input type="radio" id="switch_middle4" name="kids_fit_challenge_shirt_torso_width" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'None') { ?> checked="checked" <?php } ?> />
                                                                <label for="switch_middle4">Sometimes</label>
                                                                <input type="radio" id="switch_right4" name="kids_fit_challenge_shirt_torso_width" value="Too long"<?php if (@$KidsSizeFit->kids_fit_challenge_shirt_torso_width == 'Too long') { ?> checked="checked" <?php } ?> />
                                                                <label for="switch_right4">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>PANT WAIST</h4>
                                                            <div class="switch-field">
                                                                <input type="radio" id="kids_fit_challenge_pant_waist" name="kids_fit_challenge_pant_waist" value="Too short" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too short') { ?> checked="checked" <?php } else if (@$kidDetails->kids_frequency_dance == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="kids_fit_challenge_pant_waist">Too short</label>
                                                                <input type="radio" id="kids_fit_challenge_pant_waist2" name="kids_fit_challenge_pant_waist" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'None') { ?> checked="checked" <?php } ?> />
                                                                <label for="kids_fit_challenge_pant_waist2">None</label>
                                                                <input type="radio" id="kids_fit_challenge_pant_waist3" name="kids_fit_challenge_pant_waist" value="Too long" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_waist == 'Too long') { ?> checked="checked" <?php } ?>/>
                                                                <label for="kids_fit_challenge_pant_waist3">Too long</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>PANT LEG LENGTH (INSEAM)</h4>
                                                            <div class="switch-field">
                                                                <input type="radio" id="kids_fit_challenge_pant_leg_length" name="kids_fit_challenge_pant_leg_length" value="Too short" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too short') { ?> checked="checked" <?php } else if (@$kidDetails->kids_fit_challenge_pant_leg_length == '') { ?> checked="checked" <?php } ?>/>
                                                                <label for="kids_fit_challenge_pant_leg_length">Often</label>
                                                                <input type="radio" id="kids_fit_challenge_pant_leg_length2" name="kids_fit_challenge_pant_leg_length" value="None" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'None') { ?> checked="checked" <?php } ?>/>
                                                                <label for="kids_fit_challenge_pant_leg_length2">Sometimes</label>
                                                                <input type="radio" id="kids_fit_challenge_pant_leg_length3" name="kids_fit_challenge_pant_leg_length" value="Too long" <?php if (@$KidsSizeFit->kids_fit_challenge_pant_leg_length == 'Too long') { ?> checked="checked" <?php } ?> />
                                                                <label for="kids_fit_challenge_pant_leg_length3">Rarely</label>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How would you describe your child’s body shape?</h3>	
                                                <label for="body_shape1" class="input-control radio">
                                                    <input id="body _shape1" name="body_shape" value="Slim" type="radio" <?php if (@$KidsSizeFit->body_shape == 'Slim') { ?> checked="checked" <?php } ?>>
                                                    <span class="input-control__indicator"></span>Slim
                                                </label>

                                                <label for="body_shape2" class="input-control radio">
                                                    <input id="body_shape2" name="body_shape" value="Average" type="radio" <?php if (@$KidsSizeFit->body_shape == 'Average') { ?> checked="checked" <?php } ?>>
                                                    <span class="input-control__indicator"></span>Average
                                                </label>
                                                <label for="body_shape3" class="input-control radio">
                                                    <input id="body_shape3" name="body_shape" value="Husky" type="radio" <?php if (@$KidsSizeFit->body_shape == 'Husky') { ?> checked="checked" <?php } ?>>
                                                    <span class="input-control__indicator"></span>Husky
                                                </label>
                                            </div>

                                        </div>



                                    </div>

                                    <!--<div class="form-box-data checkboxes">-->
                                    <!--    <div class="row">-->
                                    <!--        <div class="col-sm-12 col-lg-12 col-md-12">-->
                                    <!--            <h3>In general, what type of fit should we focus on sending dertutish?</h3>-->
                                    <!--            <h6>Select all that apply.</h6>-->
                                    <!--            <div class="select-boxes">-->
                                    <!--                <ul>-->
                                    <!--                    <li>-->
                                    <!--                        <input id="check-box16" type="checkbox" name="kids_primary_objectives[]" value="a_treat" <?php if (isset($KidsPrimaryValue) && in_array('a_treat', @$KidsPrimaryValue)) { ?> checked <?php } ?>  >-->
                                    <!--                        <label for="check-box16">  slim_or_fitted</label>-->
                                    <!--                    </li>-->
                                    <!--                    <li>-->
                                    <!--                        <input id="check-box26" type="checkbox" name="kids_primary_objectives[]" value="save_time" <?php if (isset($KidsPrimaryValue) && in_array('save_time', @$KidsPrimaryValue)) { ?> checked <?php } ?> >-->
                                    <!--                        <label for="check-box26">Straight - not particularly tight or loose</label>-->
                                    <!--                    </li>-->
                                    <!--                    <li>-->
                                    <!--                        <input id="check-box36" type="checkbox" name="kids_primary_objectives[]" value="refresh_wardrobe"  <?php if (isset($KidsPrimaryValue) && in_array('refresh_wardrobe', @$KidsPrimaryValue)) { ?> checked <?php } ?>>-->
                                    <!--                        <label for="check-box36"> Loose</label>-->
                                    <!--                    </li>-->



                                    <!--                </ul>-->
                                    <!--            </div>-->
                                    <!--        </div>-->

                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                            <button type="submit" name="fit" value="fit" >Next: Clothing Types <i class="fas fa-arrow-right"></i></button>
                                            <!--<a href="#">Save and return Home. »</a>-->
                                        </div>
                                    </div>
        <?php echo $this->Form->end(); ?>
                                </div>



                                <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'section3') { ?> in active <?php } ?> " id="Section3">
        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'kidstyle')) ?>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How often would you like to receive the following types of items?</h3>
                                                <p>Don't worry. We'll be sure to customize your box based on seasons and the weather in your area.</p>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <h4>T-SHIRTS</h4>
                                                            <div class="switch-field">
                                                                <input id="kids_tees_frequency" name="kids_tees_frequency" value="1" <?php
        if (@$KidClothingType->kids_tees_frequency == 1) {
            echo 'checked';
        }
        ?> type="radio">
                                                                <label for="kids_tees_frequency">Often</label>
                                                                <input id="kids_tees_frequency2" name="kids_tees_frequency" value="2" type="radio" <?php
                                                        if (@$KidClothingType->kids_tees_frequency == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_tees_frequency2">Sometimes</label>
                                                                <input id="kids_tees_frequency3" name="kids_tees_frequency" value="3" type="radio" <?php
                                                        if (@$KidClothingType->kids_tees_frequency == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_tees_frequency3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>SWEATSHIRTS</h4>
                                                            <div class="switch-field">
                                                                <input id="kids_sweatshirts_frequency" name="kids_sweatshirts_frequency" value="1"  type="radio" <?php
                                                        if (@$KidClothingType->kids_sweatshirts_frequency == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_sweatshirts_frequency">Often</label>
                                                                <input id="kids_sweatshirts_frequency2" name="kids_sweatshirts_frequency" value="2" type="radio" <?php
                                                        if (@$KidClothingType->kids_sweatshirts_frequency == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_sweatshirts_frequency2">Sometimes</label>
                                                                <input id="kids_sweatshirts_frequency3" name="kids_sweatshirts_frequency" value="3" type="radio" <?php
                                                        if (@$KidClothingType->kids_sweatshirts_frequency == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_sweatshirts_frequency3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>POLO SHIRTS</h4>
                                                            <div class="switch-field">
                                                                <input id="POLO" name="kids_polos_frequency" value="1"  type="radio" <?php
                                                        if (@$KidClothingType->kids_polos_frequency == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="POLO">Often</label>
                                                                <input id="POLO2" name="kids_polos_frequency" value="2" type="radio" <?php
                                                        if (@$KidClothingType->kids_polos_frequency == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="POLO2">Sometimes</label>
                                                                <input id="POLO3" name="kids_polos_frequency" value="3" type="radio" <?php
                                                        if (@$KidClothingType->kids_polos_frequency == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="POLO3">Rarely</label>
                                                            </div>
                                                        </li>                                                       
                                                        <li>
                                                            <h4>SWEATERS</h4>
                                                            <div class="switch-field">
                                                                <input id="SWEATERS" name="kids_sweaters_frequency" value="1"  type="radio" <?php
                                                        if (@$KidClothingType->kids_sweaters_frequency == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="SWEATERS">Often</label>
                                                                <input id="SWEATERS2" name="kids_sweaters_frequency" value="2" type="radio" <?php
                                                        if (@$KidClothingType->kids_sweaters_frequency == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="SWEATERS2">Sometimes</label>
                                                                <input id="SWEATERS3" name="kids_sweaters_frequency" value="3" type="radio" <?php
                                                        if (@$KidClothingType->kids_sweaters_frequency == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="SWEATERS3">Rarely</label>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <h4>SHORTS</h4>
                                                            <div class="switch-field">
                                                                <input id="SHORTS" name="kids_shorts_frequency" value="1"  type="radio" <?php
                                                        if (@$KidClothingType->kids_shorts_frequency == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="SHORTS">Often</label>
                                                                <input id="SHORTS2" name="kids_shorts_frequency" value="2" type="radio" <?php
                                                        if (@$KidClothingType->kids_shorts_frequency == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="SHORTS2">Sometimes</label>
                                                                <input id="SHORTS3" name="kids_shorts_frequency" value="3" type="radio" <?php
                                                        if (@$KidClothingType->kids_shorts_frequency == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="SHORTS3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Shoes</h4>
                                                            <div class="switch-field">
                                                                <input id="JEANS" name="kids_shoes_frequency" value="1"  type="radio" <?php
                                                        if (@$KidClothingType->kids_shoes_frequency == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="JEANS">Often</label>
                                                                <input id="JEANS2" name="kids_shoes_frequency" value="2" type="radio" <?php
                                                        if (@$KidClothingType->kids_shoes_frequency == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="JEANS2">Sometimes</label>
                                                                <input id="JEANS3" name="kids_shoes_frequency" value="3" type="radio" <?php
                                                        if (@$KidClothingType->kids_shoes_frequency == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="JEANS3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>TROUSERS & CHINOS</h4>
                                                            <div class="switch-field">
                                                                <input id="CHINOS" name="kids_trousers_and_chinos_frequency" value="1"  type="radio" <?php
                                                        if (@$KidClothingType->kids_trousers_and_chinos_frequency == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="CHINOS">Often</label>
                                                                <input id="CHINOS2" name="kids_trousers_and_chinos_frequency" value="2" type="radio" <?php
                                                        if (@$KidClothingType->kids_trousers_and_chinos_frequency == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="CHINOS2">Sometimes</label>
                                                                <input id="CHINOS3" name="kids_trousers_and_chinos_frequency" value="3" type="radio" <?php
                                                        if (@$KidClothingType->kids_trousers_and_chinos_frequency == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="CHINOS3">Rarely</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data checkboxes">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Should we avoid any of these fabrics or embellishments?</h3>
                                                <p>We'll do our best to accommodate.</p>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <input id="check-box1" name="kids_avoid_fabric[]" value="Wool" type="checkbox" <?php if (isset($KID_AVOID_FABRIC) && in_array('Wool', @$KID_AVOID_FABRIC)) { ?> checked <?php } ?>>
                                                            <label for="check-box1">Wool</label>
                                                        </li>
                                                        <li> 
                                                            <input id="check-box2" name="kids_avoid_fabric[]" value="Corduroy" type="checkbox" <?php if (isset($KID_AVOID_FABRIC) && in_array('Corduroy', @$KID_AVOID_FABRIC)) { ?> checked <?php } ?>>
                                                            <label for="check-box2">Corduroy</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box3" name="kids_avoid_fabric[]" value="Denim" type="checkbox" <?php if (isset($KID_AVOID_FABRIC) && in_array('Denim', @$KID_AVOID_FABRIC)) { ?> checked <?php } ?>>
                                                            <label for="check-box3">Denim</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box4" name="kids_avoid_fabric[]" value="Sequins" type="checkbox" <?php if (isset($KID_AVOID_FABRIC) && in_array('Sequins', @$KID_AVOID_FABRIC)) { ?> checked <?php } ?>>
                                                            <label for="check-box4">Sequins</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box5" name="kids_avoid_fabric[]" value="FauxFur" type="checkbox" <?php if (isset($KID_AVOID_FABRIC) && in_array('FauxFur', @$KID_AVOID_FABRIC)) { ?> checked <?php } ?>>
                                                            <label for="check-box5">Faux Fur</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box1a" name="kids_avoid_fabric[]" value="Glitter" type="checkbox" <?php if (isset($KID_AVOID_FABRIC) && in_array('Glitter', @$KID_AVOID_FABRIC)) { ?> checked <?php } ?>>
                                                            <label for="check-box1a">Glitter</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box6" name="kids_avoid_fabric[]" value="Distressed Fabric" type="checkbox" <?php if (isset($KID_AVOID_FABRIC) && in_array('Distressed Fabric', @$KID_AVOID_FABRIC)) { ?> checked <?php } ?>>
                                                            <label for="check-box6">Distressed Fabric</label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row"> 
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Does your child wear a school uniform?</h3>
                                                <div class="switch-field">
                                                    <input id="kids_clothing_gender_boys2" name="kids_school_uniform"  value="1" type="radio" <?php
                                                        if (@$KidClothingType->kids_school_uniform == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                    <label for="kids_clothing_gender_boys2">Yes</label>
                                                    <input id="kids_clothing_gender_girls2" name="kids_school_uniform" value="2" type="radio" <?php
                                            if (@$KidClothingType->kids_school_uniform == 2) {
                                                echo 'checked';
                                            }
        ?>>
                                                    <label for="kids_clothing_gender_girls2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How would you describe how dertutish most commonly dresses?</h3>
                                                <p>This will help our style lists know how to best style.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 describ">
                                                <ul>
                                                    <li><label for="kids_commonly_dresses" class="input-control radio">
                                                            <input id="kids_commonly_dresses" name="kids_commonly_dresses" value="1" type="radio" <?php
                                            if (@$KidClothingType->kids_commonly_dresses == 1) {
                                                echo 'checked';
                                            }
        ?>>
                                                            <span class="input-control__indicator"></span>Your child loves head-to-toe fully matched looks
                                                        </label></li>
                                                    <li><label for="kids_commonly_dresses2" class="input-control radio">
                                                            <input id="kids_commonly_dresses2" name="kids_commonly_dresses" value="2" type="radio" <?php
                                                    if (@$KidClothingType->kids_commonly_dresses == 2) {
                                                        echo 'checked';
                                                    }
        ?>>
                                                            <span class="input-control__indicator"></span>Your child wears anything that looks good together.
                                                        </label></li>
                                                </ul>
                                            </div>

                                        </div>	
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                            <button type="submit" name="kidclothing" value="kidclothing">Next: Style <i class="fas fa-arrow-right"></i></button>
                                            <!--<a href="#">Save and return Home. »</a>-->
                                        </div>
                                    </div>
        <?php echo $this->Form->end(); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'section4') { ?> in active <?php } ?>" id="Section4">
        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'section4')) ?>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Would dertutish wear these styles? </h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/cali_cool_v1.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_sporty_v3" name="kids_older_boy_sporty_v3" value="1" <?php if (@$KidStyles2->kids_older_boy_sporty_v3 == 1) { ?> checked <?php } ?> type="radio">
                                                                <label for="kids_older_boy_sporty_v3">Often</label>
                                                                <input id="kids_older_boy_sporty_v32" name="kids_older_boy_sporty_v3" value="2" type="radio" <?php
        if (@$KidStyles2->kids_older_boy_sporty_v3 == 2) {
            echo 'checked';
        }
        ?>>
                                                                <label for="kids_older_boy_sporty_v32">Sometimes</label>
                                                                <input id="kids_older_boy_sporty_v33" name="kids_older_boy_sporty_v3" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_sporty_v3 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_sporty_v33">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/cali_cool_v2.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_cali_cool_v3" name="kids_older_boy_cali_cool_v3" value="1"  type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_cali_cool_v3 == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_cali_cool_v3">Often</label>
                                                                <input id="kids_older_boy_cali_cool_v32" name="kids_older_boy_cali_cool_v3" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_cali_cool_v3 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_cali_cool_v32">Sometimes</label>
                                                                <input id="kids_older_boy_cali_cool_v33" name="kids_older_boy_cali_cool_v3" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_cali_cool_v3 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_cali_cool_v33">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/everyday_prep.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_gender_neutral_v1" name="kids_older_boy_gender_neutral_v1" value="1" <?php
                                                        if (@$KidStyles2->kids_older_boy_gender_neutral_v1 == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_older_boy_gender_neutral_v1">Often</label>
                                                                <input id="kids_older_boy_gender_neutral_v12" name="kids_older_boy_gender_neutral_v1" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_gender_neutral_v1 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_gender_neutral_v12">Sometimes</label>
                                                                <input id="kids_older_boy_gender_neutral_v13" name="kids_older_boy_gender_neutral_v1" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_gender_neutral_v1 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_gender_neutral_v13">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/everyday_prep_v4.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_versatile_v11" name="kids_older_boy_versatile_v1" value="1" <?php
                                                        if (@$KidStyles2->kids_older_boy_versatile_v1 == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_older_boy_versatile_v11">Often</label>
                                                                <input id="kids_older_boy_versatile_v12" name="kids_older_boy_versatile_v1" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_versatile_v1 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_versatile_v12">Sometimes</label>
                                                                <input id="kids_older_boy_versatile_v13" name="kids_older_boy_versatile_v1" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_versatile_v1 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_versatile_v13">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/everyday_prep_v5.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_everyday_prep_v46" name="kids_older_boy_everyday_prep_v4" value="1" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v4 == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_older_boy_everyday_prep_v46">Often</label>
                                                                <input id="kids_older_boy_everyday_prep_v42" name="kids_older_boy_everyday_prep_v4" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v4 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_everyday_prep_v42">Sometimes</label>
                                                                <input id="kids_older_boy_everyday_prep_v43" name="kids_older_boy_everyday_prep_v4" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v4 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_everyday_prep_v43">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/gender_neutral_v1.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_sporty_v1" name="kids_older_boy_sporty_v1" value="1" <?php
                                                        if (@$KidStyles2->kids_older_boy_sporty_v1 == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_older_boy_sporty_v1">Often</label>
                                                                <input id="kids_older_boy_sporty_v12" name="kids_older_boy_sporty_v1" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_sporty_v1 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_sporty_v12">Sometimes</label>
                                                                <input id="kids_older_boy_sporty_v13" name="kids_older_boy_sporty_v1" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_sporty_v1 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_sporty_v13">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/kid3.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_everyday_prep_v31" name="kids_older_boy_everyday_prep_v3" value="1" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v3 == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_older_boy_everyday_prep_v31">Often</label>
                                                                <input id="kids_older_boy_everyday_prep_v32" name="kids_older_boy_everyday_prep_v3" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v3 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_everyday_prep_v32">Sometimes</label>
                                                                <input id="kids_older_boy_everyday_prep_v33" name="kids_older_boy_everyday_prep_v3" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v3 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_everyday_prep_v33">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/kid4.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_versatile_v31" name="kids_older_boy_versatile_v3" value="1" <?php
                                                        if (@$KidStyles2->kids_older_boy_versatile_v3 == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_older_boy_versatile_v31">Often</label>
                                                                <input id="kids_older_boy_versatile_v32" name="kids_older_boy_versatile_v3" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_versatile_v3 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_versatile_v32">Sometimes</label>
                                                                <input id="kids_older_boy_versatile_v33" name="kids_older_boy_versatile_v3" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_versatile_v3 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_versatile_v33">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/kid33.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_everyday_prep_v11" name="kids_older_boy_everyday_prep_v1" value="1" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v1 == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_older_boy_everyday_prep_v11">Often</label>
                                                                <input id="kids_older_boy_everyday_prep_v12" name="kids_older_boy_everyday_prep_v1" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v1 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_everyday_prep_v12">Sometimes</label>
                                                                <input id="kids_older_boy_everyday_prep_v13" name="kids_older_boy_everyday_prep_v1" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v1 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_everyday_prep_v13">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/sporty_v1.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_everyday_prep_v21" name="kids_older_boy_everyday_prep_v2" value="1"  type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v2 == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_everyday_prep_v21">Often</label>
                                                                <input id="kids_older_boy_everyday_prep_v22" name="kids_older_boy_everyday_prep_v2" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v2 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_everyday_prep_v22">Sometimes</label>
                                                                <input id="kids_older_boy_everyday_prep_v23" name="kids_older_boy_everyday_prep_v2" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_everyday_prep_v2 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_everyday_prep_v23">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/sporty_v2.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="street_style_v21" name="kids_older_boy_street_style_v2" value="1"  type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_street_style_v2 == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="street_style_v21">Often</label>
                                                                <input id="street_style_v22" name="kids_older_boy_street_style_v2" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_street_style_v2 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="street_style_v22">Sometimes</label>
                                                                <input id="street_style_v23" name="kids_older_boy_street_style_v2" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_street_style_v2 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="street_style_v23">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/sporty_v3.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_sporty_v4" name="kids_older_boy_sporty_v4" value="1"  type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_sporty_v4 == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_sporty_v4">Often</label>
                                                                <input id="kids_older_boy_sporty_v41" name="kids_older_boy_sporty_v4" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_sporty_v4 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_sporty_v41">Sometimes</label>
                                                                <input id="kids_older_boy_sporty_v42" name="kids_older_boy_sporty_v4" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_sporty_v4 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_sporty_v42">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/sporty_v4.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_street_style_v1" name="kids_older_boy_street_style_v1" value="1"  type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_street_style_v1 == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_street_style_v1">Often</label>
                                                                <input id="kids_older_boy_street_style_v12" name="kids_older_boy_street_style_v1" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_street_style_v1 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_street_style_v12">Sometimes</label>
                                                                <input id="kids_older_boy_street_style_v13" name="kids_older_boy_street_style_v1" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_street_style_v1 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_street_style_v13">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/street_style_v1.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_sporty_v21" name="kids_older_boy_sporty_v2" value="1" <?php
                                                        if (@$KidStyles2->kids_older_boy_sporty_v2 == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_older_boy_sporty_v21">Often</label>
                                                                <input id="kids_older_boy_sporty_v22" name="kids_older_boy_sporty_v2" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_sporty_v2 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_sporty_v22">Sometimes</label>
                                                                <input id="kids_older_boy_sporty_v23" name="kids_older_boy_sporty_v2" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_sporty_v2 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_sporty_v23">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/street_style_v2.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_versatile_v2" name="kids_older_boy_versatile_v2" value="1" <?php
                                                        if (@$KidStyles2->kids_older_boy_versatile_v2 == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_older_boy_versatile_v2">Often</label>
                                                                <input id="kids_older_boy_versatile_v22" name="kids_older_boy_versatile_v2" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_versatile_v2 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_versatile_v22">Sometimes</label>
                                                                <input id="kids_older_boy_versatile_v23" name="kids_older_boy_versatile_v2" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_versatile_v2 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_versatile_v23">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/versatile_v2.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_older_boy_cali_cool_v11" name="kids_older_boy_cali_cool_v1" value="1" <?php
                                                        if (@$KidStyles2->kids_older_boy_cali_cool_v1 == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_older_boy_cali_cool_v11">Often</label>
                                                                <input id="kids_older_boy_cali_cool_v12" name="kids_older_boy_cali_cool_v1" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_cali_cool_v1 == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_cali_cool_v12">Sometimes</label>
                                                                <input id="kids_older_boy_cali_cool_v13" name="kids_older_boy_cali_cool_v1" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_older_boy_cali_cool_v1 == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_older_boy_cali_cool_v13">Rarely</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Will <?php echo @$kidmenu->kids_first_name; ?> wear these colors?</h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <h4>Red</h4>
                                                            <div class="color-bx red"></div>
                                                            <div class="switch-field">
                                                                <input id="colors_affinity_avoid_red" name="colors_affinity_avoid_red" value="1" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_red == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="colors_affinity_avoid_red">Often</label>
                                                                <input id="colors_affinity_avoid_red2" name="colors_affinity_avoid_red" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_red == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_red2">Sometimes</label>
                                                                <input id="colors_affinity_avoid_red3" name="colors_affinity_avoid_red" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_red == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_red3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Orange</h4>
                                                            <div class="color-bx orange"></div>
                                                            <div class="switch-field">
                                                                <input id="colors_affinity_avoid_orange" name="colors_affinity_avoid_orange" value="1" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_orange == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="colors_affinity_avoid_orange">Often</label>
                                                                <input id="colors_affinity_avoid_orange2" name="colors_affinity_avoid_orange" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_orange == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_orange2">Sometimes</label>
                                                                <input id="colors_affinity_avoid_orange3" name="colors_affinity_avoid_orange" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_orange == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_orange3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Yellow</h4>
                                                            <div class="color-bx yellow"></div>
                                                            <div class="switch-field">
                                                                <input id="Yellow" name="colors_affinity_avoid_yellow" value="1" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_yellow == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="Yellow">Often</label>
                                                                <input id="Yellow2" name="colors_affinity_avoid_yellow" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_yellow == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="Yellow2">Sometimes</label>
                                                                <input id="Yellow3" name="colors_affinity_avoid_yellow" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_yellow == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="Yellow3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Green</h4>
                                                            <div class="color-bx green"></div>
                                                            <div class="switch-field">
                                                                <input id="colors_affinity_avoid_green" name="colors_affinity_avoid_green" value="1" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_green == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="colors_affinity_avoid_green">Often</label>
                                                                <input id="colors_affinity_avoid_green2" name="colors_affinity_avoid_green" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_green == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_green2">Sometimes</label>
                                                                <input id="colors_affinity_avoid_green3" name="colors_affinity_avoid_green" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_green == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_green3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Blue</h4>
                                                            <div class="color-bx blue"></div>
                                                            <div class="switch-field">
                                                                <input id="colors_affinity_avoid_blue" name="colors_affinity_avoid_blue" value="1" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_blue == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="colors_affinity_avoid_blue">Often</label>
                                                                <input id="colors_affinity_avoid_blue2" name="colors_affinity_avoid_blue" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_blue == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_blue2">Sometimes</label>
                                                                <input id="colors_affinity_avoid_blue3" name="colors_affinity_avoid_blue" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_blue == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_blue3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Purple</h4>
                                                            <div class="color-bx purple"></div>
                                                            <div class="switch-field">
                                                                <input id="colors_affinity_avoid_purple" name="colors_affinity_avoid_purple" value="1"  type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_purple == 1) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_purple">Often</label>
                                                                <input id="colors_affinity_avoid_purple2" name="colors_affinity_avoid_purple" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_purple == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_purple2">Sometimes</label>
                                                                <input id="colors_affinity_avoid_purple3" name="colors_affinity_avoid_purple" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_purple == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_purple3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Pink</h4>
                                                            <div class="color-bx pink"></div>
                                                            <div class="switch-field">
                                                                <input id="colors_affinity_avoid_pink" name="colors_affinity_avoid_pink" value="1" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_pink == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="colors_affinity_avoid_pink">Often</label>
                                                                <input id="colors_affinity_avoid_pink2" name="colors_affinity_avoid_pink" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_pink == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_pink2">Sometimes</label>
                                                                <input id="colors_affinity_avoid_pink3" name="colors_affinity_avoid_pink" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_pink == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_pink3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Black</h4>
                                                            <div class="color-bx black"></div>
                                                            <div class="switch-field">
                                                                <input id="colors_affinity_avoid_black" name="colors_affinity_avoid_black" value="1" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_black == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="colors_affinity_avoid_black">Often</label>
                                                                <input id="colors_affinity_avoid_black2" name="colors_affinity_avoid_black" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_black == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_black2">Sometimes</label>
                                                                <input id="colors_affinity_avoid_black3" name="colors_affinity_avoid_black" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_black == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_black3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>White</h4>
                                                            <div class="color-bx white"></div>
                                                            <div class="switch-field">
                                                                <input id="colors_affinity_avoid_white" name="colors_affinity_avoid_white" value="1" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_white == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="colors_affinity_avoid_white">Often</label>
                                                                <input id="colors_affinity_avoid_white2" name="colors_affinity_avoid_white" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_white == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_white2">Sometimes</label>
                                                                <input id="colors_affinity_avoid_white3" name="colors_affinity_avoid_white" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_white == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_white3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Grey</h4>
                                                            <div class="color-bx grey"></div>
                                                            <div class="switch-field">
                                                                <input id="colors_affinity_avoid_grey" name="colors_affinity_avoid_grey" value="1" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_grey == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="colors_affinity_avoid_grey">Often</label>
                                                                <input id="colors_affinity_avoid_grey2" name="colors_affinity_avoid_grey" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_grey == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_grey2">Sometimes</label>
                                                                <input id="colors_affinity_avoid_grey3" name="colors_affinity_avoid_grey" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_grey == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_grey3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Brown</h4>
                                                            <div class="color-bx brown"></div>
                                                            <div class="switch-field">
                                                                <input id="colors_affinity_avoid_brown" name="colors_affinity_avoid_brown" value="1" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_brown == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="colors_affinity_avoid_brown">Often</label>
                                                                <input id="colors_affinity_avoid_brown2" name="colors_affinity_avoid_brown" value="2" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_brown == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_brown2">Sometimes</label>
                                                                <input id="colors_affinity_avoid_brown3" name="colors_affinity_avoid_brown" value="3" type="radio" <?php
                                                        if (@$KidStyles2->colors_affinity_avoid_brown == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="colors_affinity_avoid_brown3">Rarely</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How about any of these prints? </h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/print_stripes.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_boy_prints_affinity_stripes" name="kids_boy_prints_affinity_stripes" value="1" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_stripes == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_boy_prints_affinity_stripes">Often</label>
                                                                <input id="kids_boy_prints_affinity_stripes2" name="kids_boy_prints_affinity_stripes" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_stripes == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_stripes2">Sometimes</label>
                                                                <input id="kids_boy_prints_affinity_stripes3" name="kids_boy_prints_affinity_stripes" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_stripes == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_stripes3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/print_polka_dots.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_boy_prints_affinity_polka_dots3" name="kids_boy_prints_affinity_polka_dots" value="1" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_polka_dots == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_boy_prints_affinity_polka_dots3">Often</label>
                                                                <input id="kids_boy_prints_affinity_polka_dots2" name="kids_boy_prints_affinity_polka_dots" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_polka_dots == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_polka_dots2">Sometimes</label>
                                                                <input id="kids_boy_prints_affinity_polka_dots4" name="kids_boy_prints_affinity_polka_dots" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_polka_dots == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_polka_dots4">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/print_plaid.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_boy_prints_affinity_plaid" name="kids_boy_prints_affinity_plaid" value="1" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_plaid == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_boy_prints_affinity_plaid">Often</label>
                                                                <input id="kids_boy_prints_affinity_plaid2" name="kids_boy_prints_affinity_plaid" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_plaid == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_plaid2">Sometimes</label>
                                                                <input id="kids_boy_prints_affinity_plaid3" name="kids_boy_prints_affinity_plaid" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_plaid == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_plaid3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/print_novelty_boys.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_boy_prints_affinity_novelty4" name="kids_boy_prints_affinity_novelty" value="1" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_novelty == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_boy_prints_affinity_novelty4">Often</label>
                                                                <input id="kids_boy_prints_affinity_novelty2" name="kids_boy_prints_affinity_novelty" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_novelty == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_novelty2">Sometimes</label>
                                                                <input id="kids_boy_prints_affinity_novelty3" name="kids_boy_prints_affinity_novelty" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_novelty == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_novelty3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/print_gingham.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_boy_prints_affinity_gingham" name="kids_boy_prints_affinity_gingham" value="1" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_gingham == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_boy_prints_affinity_gingham">Often</label>
                                                                <input id="kids_boy_prints_affinity_gingham2" name="kids_boy_prints_affinity_gingham" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_gingham == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_gingham2">Sometimes</label>
                                                                <input id="kids_boy_prints_affinity_gingham3" name="kids_boy_prints_affinity_gingham" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_gingham == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_gingham3">Rarely</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <img src="<?php echo HTTP_ROOT; ?>assets/images/kid/print_camo.jpg" alt="">
                                                            <div class="switch-field">
                                                                <input id="kids_boy_prints_affinity_camo" name="kids_boy_prints_affinity_camo" value="1" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_camo == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="kids_boy_prints_affinity_camo">Often</label>
                                                                <input id="kids_boy_prints_affinity_camo2" name="kids_boy_prints_affinity_camo" value="2" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_camo == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_camo2">Sometimes</label>
                                                                <input id="kids_boy_prints_affinity_camo3" name="kids_boy_prints_affinity_camo" value="3" type="radio" <?php
                                                        if (@$KidStyles2->kids_boy_prints_affinity_camo == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="kids_boy_prints_affinity_camo3">Rarely</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Can we send graphic T-shirts?</h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <div class="switch-field">
                                                                <input id="send_graphic_tshirts1" name="send_graphic_tshirts" value="1" <?php
                                                        if (@$KidStyles2->send_graphic_tshirts == 1) {
                                                            echo 'checked';
                                                        }
        ?> type="radio">
                                                                <label for="send_graphic_tshirts1">Often</label>
                                                                <input id="send_graphic_tshirts2" name="send_graphic_tshirts" value="2" type="radio" <?php
                                                        if (@$KidStyles2->send_graphic_tshirts == 2) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="send_graphic_tshirts2">Sometimes</label>
                                                                <input id="send_graphic_tshirts3" name="send_graphic_tshirts" value="3" type="radio" <?php
                                                        if (@$KidStyles2->send_graphic_tshirts == 3) {
                                                            echo 'checked';
                                                        }
        ?>>
                                                                <label for="send_graphic_tshirts3">Rarely</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                            <button type="submit" name="kidstyle" value="kidstyle">Next: Price & Shopping <i class="fas fa-arrow-right"></i></button>
                                            <!--<a href="#">Save and return Home. »</a>-->
                                        </div>
                                    </div>
        <?php echo $this->Form->end(); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'section5') { ?> in active <?php } ?>" id="Section5">
        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'section5')) ?>
                                    <div class="form-box-data">
                                        <h3>How much would you ideally spend on items in each of the following categories? </h3>
                                        <h4 style="margin-top: 0;margin-bottom: 19px;">We’ll do our best! Remember, there's no upfront payment for items in your shipment. Try before you buy and then check out online to pay for what you decide to keep.</h4>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h4 style="margin-top: 0;">Casual Shirts (ex: t-shirts, polos)</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="kids_boys_spendiness_casual_shirts" id="kids_boys_spendiness_casual_shirts">
                                                            <option>--</option>
                                                            <option value="10,15" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_casual_shirts == '10,15') { ?> selected <?php } ?>>10,15</option>
                                                            <option value="15,20" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_casual_shirts == '15,20') { ?> selected <?php } ?>>15,20</option>
                                                            <option value="20,25" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_casual_shirts == '20,25') { ?> selected <?php } ?>>20,25</option>
                                                            <option value="25," <?php if (@$kids_pricing_shoping->kids_boys_spendiness_casual_shirts == '25,') { ?> selected <?php } ?>>25+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h4 style="margin-top: 0;">Button Downs</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="kids_boys_spendiness_button_downs" id="kids_boys_spendiness_button_downs">
                                                            <option>--</option>
                                                            <option value="15,20" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_button_downs == '15,20') { ?> selected <?php } ?>>15,20</option>
                                                            <option value="20,30" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_button_downs == '20,30') { ?> selected <?php } ?>>20,30</option>
                                                            <option value="30,40" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_button_downs == '30,40') { ?> selected <?php } ?>>30,40</option>
                                                            <option value="40," <?php if (@$kids_pricing_shoping->kids_boys_spendiness_button_downs == '40,') { ?> selected <?php } ?>>40+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h4 style="margin-top: 0;">Sweaters & Sweatshirts</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="kids_boys_spendiness_sweater_and_sweatshirts" id="kids_boys_spendiness_sweater_and_sweatshirts">
                                                            <option>--</option>
                                                            <option value="15,20" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_sweater_and_sweatshirts == '15,20') { ?> selected <?php } ?>>15,20</option>
                                                            <option value="20,30" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_sweater_and_sweatshirts == '20,30') { ?> selected <?php } ?>>20,30</option>
                                                            <option value="30,40" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_sweater_and_sweatshirts == '30,40') { ?> selected <?php } ?>>30,40</option>
                                                            <option value="40," <?php if (@$kids_pricing_shoping->kids_boys_spendiness_sweater_and_sweatshirts == '40,') { ?> selected <?php } ?>>40+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h4 style="margin-top: 0;">Casual Bottoms (ex: sweatpants, athletic pants)</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="kids_boys_spendiness_casual_bottoms" id="kids_boys_spendiness_casual_bottoms">
                                                            <option>--</option>
                                                            <option value="15,20" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_casual_bottoms == '15,20') { ?> selected <?php } ?>>15,20</option>
                                                            <option value="20,30" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_casual_bottoms == '20,30') { ?> selected <?php } ?>>20,30</option>
                                                            <option value="30,40" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_casual_bottoms == '30,40') { ?> selected <?php } ?>>30,40</option>
                                                            <option value="40," <?php if (@$kids_pricing_shoping->kids_boys_spendiness_casual_bottoms == '40,') { ?> selected <?php } ?>>40+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h4 style="margin-top: 0;">Shorts</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="kids_boys_spendiness_shorts" id="kids_boys_spendiness_shorts">
                                                            <option>--</option>
                                                            <option value="15,20" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_shorts == '15,20') { ?> selected <?php } ?>>15,20</option>
                                                            <option value="20,30" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_shorts == '20,30') { ?> selected <?php } ?>>20,30</option>
                                                            <option value="30,40" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_shorts == '30,40') { ?> selected <?php } ?>>30,40</option>
                                                            <option value="40," <?php if (@$kids_pricing_shoping->kids_boys_spendiness_shorts == '40,') { ?> selected <?php } ?>>40+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h4 style="margin-top: 0;">Pants & Jeans</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="kids_boys_spendiness_pants_and_jeans" id="kids_boys_spendiness_pants_and_jeans">
                                                            <option>--</option>
                                                            <option value="15,20" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_pants_and_jeans == '15,20') { ?> selected <?php } ?>>15,20</option>
                                                            <option value="20,30" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_pants_and_jeans == '20,30') { ?> selected <?php } ?>>20,30</option>
                                                            <option value="30,40" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_pants_and_jeans == '30,40') { ?> selected <?php } ?>>30,40</option>
                                                            <option value="40," <?php if (@$kids_pricing_shoping->kids_boys_spendiness_pants_and_jeans == '40,') { ?> selected <?php } ?>>40+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h4 style="margin-top: 0;">Jackets & Coats</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="kids_boys_spendiness_jackets_and_coats" id="kids_boys_spendiness_jackets_and_coats">
                                                            <option>--</option>
                                                            <option value="15,20" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_jackets_and_coats == '15,20') { ?> selected <?php } ?>>15,20</option>
                                                            <option value="20,30" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_jackets_and_coats == '20,30') { ?> selected <?php } ?>>20,30</option>
                                                            <option value="30,40" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_jackets_and_coats == '30,40') { ?> selected <?php } ?>>30,40</option>
                                                            <option value="40," <?php if (@$kids_pricing_shoping->kids_boys_spendiness_jackets_and_coats == '40,') { ?> selected <?php } ?>>40+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h4 style="margin-top: 0;">Shoes</h4>
                                                <div class="select-boxes">
                                                    <div class="select-box select-box2">
                                                        <select name="kids_boys_spendiness_shoes" id="kids_boys_spendiness_shoes">
                                                            <option>--</option>
                                                            <option value="15,20" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_shoes == '15,20') { ?> selected <?php } ?>>15,20</option>
                                                            <option value="20,30" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_shoes == '20,30') { ?> selected <?php } ?>>20,30</option>
                                                            <option value="30,40" <?php if (@$kids_pricing_shoping->kids_boys_spendiness_shoes == '30,40') { ?> selected <?php } ?>>30,40</option>
                                                            <option value="40," <?php if (@$kids_pricing_shoping->kids_boys_spendiness_shoes == '40,') { ?> selected <?php } ?>>40+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>For the right item would you be willing to spend above your set budget?</h3>	
                                                <label for="kids_would_splurge_for_item" class="input-control radio">
                                                    <input id="kids_would_splurge_for_item" name="kids_would_splurge_for_item" value="1" type="radio" <?php if (@$kids_pricing_shoping->kids_would_splurge_for_item == 1) { ?> checked="checked" <?php } ?>>
                                                    <span class="input-control__indicator"></span>Yes, I’d be willing to make an exception from time to time.
                                                </label>

                                                <label for="kids_would_splurge_for_item2" class="input-control radio">
                                                    <input id="kids_would_splurge_for_item2" name="kids_would_splurge_for_item" value="2" type="radio" <?php if (@$kids_pricing_shoping->kids_would_splurge_for_item == 2) { ?> checked="checked" <?php } ?>>
                                                    <span class="input-control__indicator"></span>No, I’d like to stick as close to my budget as possible.
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="type-box">
                                                    <h3>Where do you typically purchase clothing for dertutish?</h3>
                                                    <ul>
                                                        <li>
                                                            <input class="radio-box" name="kids_stores[]" id="logo_tea_collection" type="checkbox" value="logo_tea_collection" <?php if (isset($kids_stores) && in_array('logo_tea_collection', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="logo_tea_collection">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/logo_tea_collection.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input class="radio-box" id="logo_target" name="kids_stores[]" type="checkbox" value="logo_target" <?php if (isset($kids_stores) && in_array('logo_target', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="logo_target">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/logo_target.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input class="radio-box" id="logo_zara" type="checkbox" name="kids_stores[]" value="logo_zara" <?php if (isset($kids_stores) && in_array('logo_zara', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="logo_zara">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/logo_zara.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input class="radio-box" id="logo_walmart" type="checkbox" name="kids_stores[]" value="logo_walmart" <?php if (isset($kids_stores) && in_array('logo_walmart', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="logo_walmart">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/logo_walmart.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input class="radio-box" name="kids_stores[]" id="Navy" type="checkbox" value="Navy" <?php if (isset($kids_stores) && in_array('Navy', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="Navy">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/Old Navy.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input class="radio-box" id="norstordm" name="kids_stores[]" type="checkbox" value="norstordm" <?php if (isset($kids_stores) && in_array('norstordm', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="norstordm">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/norstordm.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input class="radio-box" id="logo_childrens_place" type="checkbox" name="kids_stores[]" value="logo_childrens_place" <?php if (isset($kids_stores) && in_array('logo_childrens_place', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="logo_childrens_place">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/logo_childrens_place.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input class="radio-box" id="logo_amazon" type="checkbox" name="kids_stores[]" value="logo_amazon" <?php if (isset($kids_stores) && in_array('logo_amazon', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="logo_amazon">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/logo_amazon.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input class="radio-box" name="kids_stores[]" id="logo_nike" type="checkbox" value="logo_nike" <?php if (isset($kids_stores) && in_array('logo_nike', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="logo_nike">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/logo_nike.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input class="radio-box" id="logo_jcpenny" <?php if (isset($kids_stores) && in_array('logo_jcpenny', @$kids_stores)) { ?> checked <?php } ?> name="kids_stores[]" type="checkbox" value="logo_jcpenny">
                                                            <label for="logo_jcpenny">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/logo_jcpenny.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input class="radio-box" id="logo_macys" type="checkbox" name="kids_stores[]" value="logo_macys" <?php if (isset($kids_stores) && in_array('logo_macys', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="logo_macys">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/logo_macys.png" alt="">
                                                            </label>
                                                        </li>
                                                        <li> 
                                                            <input class="radio-box" id="logo_under_armour" type="checkbox" name="kids_stores[]" value="logo_under_armour" <?php if (isset($kids_stores) && in_array('logo_under_armour', @$kids_stores)) { ?> checked <?php } ?>>
                                                            <label for="logo_under_armour">
                                                                <img src="<?php echo HTTP_ROOT ?>assets/images/kid/logo_under_armour.png" alt="">
                                                            </label>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Have Pinterest? Create a board for dertutish and link it here to help their Stylist select items you'll love. </h3>	
                                                <p>This is optional and will be used for styling purposes only.</p>
                                                <input type="text" class="form-control" name="pinterest" value="<?php echo @$kids_pricing_shoping->pinterest; ?>">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Is there anything we missed that we should know about dertutish's style? </h3>	
                                                <textarea class="form-control" name="profile_note" value=""><?php echo @$kids_pricing_shoping->profile_note; ?></textarea>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                            <button type="submit" name="section5" value="section5">Save all changes<i class="fas fa-arrow-right"></i></button>
                                            <!--<a href="#">Save and return Home. »</a>-->
                                        </div>
                                    </div>
        <?php echo $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <?php
    } elseif ($this->request->session()->read('PROFILE') == 'WOMEN') {
//        echo $sections;
        ?>
        <div class="style-contain">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="tab" role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" <?php if ($sections == 'section1') { ?> class="active" <?php } else if ($sections == '') { ?> class="active" <?php } ?>><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" onclick='getPushUrl("section1");'>Size</a></li>
                                <li role="presentation" <?php if ($sections == 'section2') { ?> class="active" <?php } ?>><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab" onclick='getPushUrl("section2");'>Fit/Cut</a></li>
                                <li role="presentation" <?php if ($sections == 'section3') { ?> class="active" <?php } ?>><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab" onclick='getPushUrl("section3");'>Style</a></li>
                                <li role="presentation" <?php if ($sections == 'section4') { ?> class="active" <?php } ?>><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab" onclick='getPushUrl("section4");'>Price</a></li>
                                <li role="presentation" <?php if ($sections == 'section5') { ?> class="active" <?php } ?>><a href="#Section5" aria-controls="messages" role="tab" data-toggle="tab" onclick='getPushUrl("section5");'>More About You</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabs data-filup ">
                                <div role="tabpanel" class="tab-pane fade <?php if ($sections == 'section1') { ?>  active in <?php } else if ($sections == '') { ?> active in <?php } ?>"   id="Section1">
                                    <h1>Hi, <?php echo $userDetails->user_detail->first_name; ?></h1>
        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'size_fit')) ?>
                                    <p>Want to keep your Stylist in the loop? Update your Style Profile to reflect your current tastes and needs.</p>
                                    <p><span>We currently carry sizes 0–24W (XS–3X), as well as maternity and petite clothing.</span></p>
                                    <div class="form-box-data">

                                        <div class="row">

                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h3>How tall are you?</h3>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="tell_in_feet" id="feet" >
                                                            <option value="">--</option>
                                                            <option <?php if (@$PersonalizedFix->tell_in_feet == 4) { ?>selected="selected" <?php } ?> value="4"> 4</option>
                                                            <option  <?php if (@$PersonalizedFix->tell_in_feet == 5) { ?>selected="selected" <?php } ?>value="5">5</option>
                                                            <option <?php if (@$PersonalizedFix->tell_in_feet == 6) { ?>selected="selected" <?php } ?>value="6">6</option>
                                                        </select>
                                                        <label>ft.</label>
                                                    </div>
                                                    <div class=" select-box">
                                                        <select name="tell_in_inch" id="tell_in_inch">
                                                            <option value="">--</option>
        <?php for ($inc = 1; $inc <= 12; $inc++) { ?>
                                                                <option <?php if (@$PersonalizedFix->tell_in_inch == $inc) { ?>selected="selected"<?php } ?> value="<?php echo $inc; ?>"><?php echo $inc; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label>in.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h3>What is your weight?</h3>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <input type="text" placeholder="" name="wt" id="wt" value="<?php echo @$PersonalizedFix->weight_lbs; ?>">
                                                        <label>lbs.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What sizes do you typically wear?</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4 style="margin-top: 0;">DRESS</h4>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="dress" id="dress">
                                                            <option value="">--</option>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="">--</option>
        <?php for ($inc = 2; $inc <= 12; $inc += 2) { ?>
                                                                    <option <?php if (@$SizeChart->dress == $inc) { ?>selected="selected" <?php } ?> value="<?php echo $inc; ?>"><?php echo $inc; ?></option>
                                                                <?php } ?>
                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="14W" <?php if ($SizeChart->dress == "14W") { ?>selected="selected" <?php } ?>>14W</option>
                                                                <option value="16W" <?php if ($SizeChart->dress == "16W") { ?> selected="selected" <?php } ?>>16W</option>
                                                                <option value="18W" <?php if ($SizeChart->dress == "18W") { ?> selected="selected" <?php } ?>>18W</option>
                                                                <option value="20W" <?php if ($SizeChart->dress == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                                <option value="22W" <?php if ($SizeChart->dress == "22W") { ?>selected="selected"<?php } ?>>22W</option>
                                                                <option value="24W" <?php if ($SizeChart->dress == "24W") { ?> selected="selected" <?php } ?>>24W</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="select-box select-box2">
                                                        <select name="dress_recomended" id="dress_recomended">
                                                            <option value="">--</option>
                                                            <option value="">L (10-12)</option>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="XXS (00)" <?php if ($SizeChart->dress_recomended == "XXS (00)") { ?>selected="selected" <?php } ?>>XXS (00)</option>
                                                                <option value="XS (0)" <?php if ($SizeChart->dress_recomended == "XS (0)") { ?>selected="selected" <?php } ?>>XS (0)</option>
                                                                <option value="S (2-4)" <?php if ($SizeChart->dress_recomended == "S (2-4)") { ?>selected="selected" <?php } ?>>S (2-4)</option>
                                                                <option value="M (6-8)" <?php if ($SizeChart->dress_recomended == "M (6-8)") { ?>selected="selected" <?php } ?>>M (6-8)</option>
                                                                <option value="L (10-12)" <?php if ($SizeChart->dress_recomended == "L (10-12)") { ?>selected="selected" <?php } ?>>L (10-12)</option>
                                                                <option value="XL (14)" <?php if ($SizeChart->dress_recomended == "XL (14)") { ?>selected="selected" <?php } ?>>XL (14)</option>
                                                                <option value="XXL (16)" <?php if ($SizeChart->dress_recomended == "XXL (16)") { ?>selected="selected" <?php } ?>>XXL (16)</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="1X (14W-16W)" <?php if ($SizeChart->dress_recomended == "1X (14W-16W)") { ?>selected="selected" <?php } ?>>1X (14W-16W)</option>
                                                                <option value="2X (18W-20W)" <?php if ($SizeChart->dress_recomended == "2X (18W-20W)") { ?>selected="selected" <?php } ?>>2X (18W-20W)</option>
                                                                <option value="3X (22W-24W)" <?php if ($SizeChart->dress_recomended == "3X (22W-24W)") { ?>selected="selected" <?php } ?>>3X (22W-24W)</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4 style="margin-top: 0;">SHIRT & BLOUSE</h4>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="shirt_blouse" id="shirt_blouse">
                                                            <option value="">--</option>
                                                            <optgroup label="Women's Sizes">
        <?php for ($inc = 2; $inc <= 12; $inc += 2) { ?>
                                                                    <option <?php if ($SizeChart->shirt_blouse == $inc) { ?> selected="selected"<?php } ?> value="<?php echo $inc; ?>"><?php echo $inc; ?></option>
                                                                <?php } ?>

                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="14W" <?php if ($SizeChart->shirt_blouse == "14W") { ?> selected="selected"<?php } ?> >14W</option>
                                                                <option value="16W" <?php if ($SizeChart->shirt_blouse == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                                <option value='18W' <?php if ($SizeChart->shirt_blouse == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                                <option value="20W" <?php if ($SizeChart->shirt_blouse == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                                <option value="22W" <?php if ($SizeChart->shirt_blouse == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                                <option value="24W" <?php if ($SizeChart->shirt_blouse == "24W") { ?> selected="selected"<?php } ?>>24W</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="select-box select-box2">
                                                        <select name=" shirt_blouse_recomend" id=" shirt_blouse_recomend ">
                                                            <option value="">--</option>
                                                            <optgroup label="Recommended for 2" style="display: block;">
                                                                <option value="S (2-4)" <?php if ($SizeChart->shirt_blouse_recomend == "S (2-4)") { ?> selected="selected"<?php } ?>>S (2-4)</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="XXS (00)" <?php if ($SizeChart->shirt_blouse_recomend == "XXS (00)") { ?> selected="selected"<?php } ?>>XXS (00)</option>
                                                                <option value="XS (0)" <?php if ($SizeChart->shirt_blouse_recomend == "XS (0)") { ?> selected="selected"<?php } ?>>XS (0)</option>
                                                                <option value="S (2-4)" <?php if ($SizeChart->shirt_blouse_recomend == "S (2-4)") { ?> selected="selected"<?php } ?>>S (2-4)</option>
                                                                <option value="M (6-8)" <?php if ($SizeChart->shirt_blouse_recomend == "M (6-8)") { ?> selected="selected"<?php } ?>>M (6-8)</option>
                                                                <option value="L (10-12)" <?php if ($SizeChart->shirt_blouse_recomend == "L (10-12)") { ?> selected="selected"<?php } ?>>L (10-12)</option>
                                                                <option value="XL (14)" <?php if ($SizeChart->shirt_blouse_recomend == "XL (14)") { ?> selected="selected"<?php } ?>>XL (14)</option>
                                                                <option value="XXL (16)" <?php if ($SizeChart->shirt_blouse_recomend == "XXL (16)") { ?> selected="selected"<?php } ?>>XXL (16)</option></optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="1X (14W-16W)" <?php if ($SizeChart->shirt_blouse_recomend == "1X (14W-16W)") { ?> selected="selected"<?php } ?>>1X (14W-16W)</option>
                                                                <option value="2X (18W-20W)" <?php if ($SizeChart->shirt_blouse_recomend == "2X (18W-20W)") { ?> selected="selected"<?php } ?>>2X (18W-20W)</option>
                                                                <option value="3X (22W-24W)" <?php if ($SizeChart->shirt_blouse_recomend == "3X (22W-24W)") { ?> selected="selected"<?php } ?>>3X (22W-24W)</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>BRA</h4>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="bra" id="bra">
                                                            <option value="">--</option>
                                                            <option value="30" <?php if ($SizeChart->bra == "30") { ?> selected="selected"<?php } ?>>30</option>
                                                            <option value="32" <?php if ($SizeChart->bra == "32") { ?> selected="selected"<?php } ?>>32</option>
                                                            <option value="34" <?php if ($SizeChart->bra == "34") { ?> selected="selected"<?php } ?>>34</option>
                                                            <option value="36" <?php if ($SizeChart->bra == "36") { ?> selected="selected"<?php } ?>>36</option>
                                                            <option value="38" <?php if ($SizeChart->bra == "38") { ?> selected="selected"<?php } ?>>38</option>
                                                            <option value="40" <?php if ($SizeChart->bra == "40") { ?> selected="selected"<?php } ?>>40</option>
                                                            <option value="42" <?php if ($SizeChart->bra == "42") { ?> selected="selected"<?php } ?>>42</option>
                                                            <option value="44" <?php if ($SizeChart->bra == "44") { ?> selected="selected"<?php } ?>>44</option>
                                                            <option value="46" <?php if ($SizeChart->bra == "46") { ?> selected="selected"<?php } ?>>46</option></select>
                                                    </div>
                                                    <div class="select-box">
                                                        <select name="bra_recomend" id="bra_recomend">
                                                            <option value="">--</option>
                                                            <option <?php if ($SizeChart->bra_recomend == "AA") { ?> selected="selected"<?php } ?> value="AA">AA</option>
                                                            <option <?php if ($SizeChart->bra_recomend == "A") { ?> selected="selected"<?php } ?> value="A">A</option>
                                                            <option <?php if ($SizeChart->bra_recomend == "B") { ?> selected="selected"<?php } ?> value="B">B</option>
                                                            <option <?php if ($SizeChart->bra_recomend == "C") { ?> selected="selected"<?php } ?> value="C">C</option>
                                                            <option <?php if ($SizeChart->bra_recomend == "D") { ?> selected="selected"<?php } ?> value="D">D</option>
                                                            <option <?php if ($SizeChart->bra_recomend == "DD") { ?> selected="selected"<?php } ?> value="DD">DD</option>
                                                            <option <?php if ($SizeChart->bra_recomend == "DDD") { ?> selected="selected"<?php } ?> value="DDD">DDD</option>
                                                            <option <?php if ($SizeChart->bra_recomend == "F") { ?> selected="selected"<?php } ?> value="F">F</option>
                                                            <option <?php if ($SizeChart->bra_recomend == "G") { ?> selected="selected"<?php } ?> value="G">G</option>
                                                            <option <?php if ($SizeChart->bra_recomend == "H") { ?> selected="selected"<?php } ?> value="H">H</option></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>SKIRT</h4>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="skirt" id="skirt">
                                                            <option value="">--</option>
                                                            <option value="XXS" <?php if ($SizeChart->skirt == "XXS") { ?> selected="selected"<?php } ?>>XXS</option>
                                                            <option value="XS" <?php if ($SizeChart->skirt == "XS") { ?> selected="selected"<?php } ?>>XS</option>
                                                            <option value="S" <?php if ($SizeChart->skirt == "S") { ?> selected="selected"<?php } ?>>S</option>
                                                            <option value="M" <?php if ($SizeChart->skirt == "M") { ?> selected="selected"<?php } ?>>M</option>
                                                            <option value="L" <?php if ($SizeChart->skirt == "L") { ?> selected="selected"<?php } ?>>L</option>
                                                            <option value="XL" <?php if ($SizeChart->skirt == "XL") { ?> selected="selected"<?php } ?>>XL</option>
                                                            <option value="XXL" <?php if ($SizeChart->skirt == "XXL") { ?> selected="selected"<?php } ?>>XXL</option>
                                                            <option value="1X" <?php if ($SizeChart->skirt == "1X") { ?> selected="selected"<?php } ?>>1X</option>
                                                            <option value="2X" <?php if ($SizeChart->skirt == "2X") { ?> selected="selected"<?php } ?>>2X</option>
                                                            <option value="3X" <?php if ($SizeChart->skirt == "3X") { ?> selected="selected"<?php } ?>>3X</option></select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>PANTS</h4>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="pants" id="pants">
                                                            <option value="">--</option>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="00" <?php if ($SizeChart->pants == "00") { ?> selected="selected"<?php } ?>>00</option>
                                                                <option value="0" <?php if ($SizeChart->pants == "0") { ?> selected="selected"<?php } ?>>0</option>
                                                                <option value="2" <?php if ($SizeChart->pants == "2") { ?> selected="selected"<?php } ?>>2</option>
                                                                <option value="4" <?php if ($SizeChart->pants == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                                <option value="6" <?php if ($SizeChart->pants == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                                <option value="8" <?php if ($SizeChart->pants == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                                <option value="10" <?php if ($SizeChart->pants == "10") { ?> selected="selected"<?php } ?>>10</option>
                                                                <option value="12" <?php if ($SizeChart->pants == "12") { ?> selected="selected"<?php } ?>>12</option>
                                                                <option value="14" <?php if ($SizeChart->pants == "14") { ?> selected="selected"<?php } ?>>14</option>
                                                                <option value="16" <?php if ($SizeChart->pants == "16") { ?> selected="selected"<?php } ?>>16</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="14W" <?php if ($SizeChart->pants == "14W") { ?> selected="selected"<?php } ?>>14W</option>
                                                                <option value="16W" <?php if ($SizeChart->pants == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                                <option value="18W" <?php if ($SizeChart->pants == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                                <option value="20W" <?php if ($SizeChart->pants == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                                <option value="22W" <?php if ($SizeChart->pants == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                                <option value="24W" <?php if ($SizeChart->pants == "24W") { ?> selected="selected"<?php } ?>>24W</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>JEANS</h4>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="jeans" id="jeans">
                                                            <option value="">--</option>
                                                            <optgroup label="Women's Sizes">
                                                                <option value="00" <?php if ($SizeChart->jeans == "00") { ?> selected="selected"<?php } ?>>00</option>
                                                                <option value="0" <?php if ($SizeChart->jeans == "0") { ?> selected="selected"<?php } ?>>0</option>
                                                                <option value="2" <?php if ($SizeChart->jeans == "2") { ?> selected="selected"<?php } ?>>2</option>
                                                                <option value="4" <?php if ($SizeChart->jeans == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                                <option value="6" <?php if ($SizeChart->jeans == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                                <option value="8" <?php if ($SizeChart->jeans == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                                <option value="10" <?php if ($SizeChart->jeans == "10") { ?> selected="selected"<?php } ?>>10</option>
                                                                <option value="12" <?php if ($SizeChart->jeans == "12") { ?> selected="selected"<?php } ?>>12</option>
                                                                <option value="14" <?php if ($SizeChart->jeans == "14") { ?> selected="selected"<?php } ?>>14</option>
                                                                <option value="16" <?php if ($SizeChart->jeans == "16") { ?> selected="selected"<?php } ?>>16</option>
                                                            </optgroup>
                                                            <optgroup label="Women's Plus Sizes">
                                                                <option value="14W" <?php if ($SizeChart->jeans == "14W") { ?> selected="selected"<?php } ?>>14W</option>
                                                                <option value="16W" <?php if ($SizeChart->jeans == "16W") { ?> selected="selected"<?php } ?>>16W</option>
                                                                <option value="18W" <?php if ($SizeChart->jeans == "18W") { ?> selected="selected"<?php } ?>>18W</option>
                                                                <option value="20W" <?php if ($SizeChart->jeans == "20W") { ?> selected="selected"<?php } ?>>20W</option>
                                                                <option value="22W" <?php if ($SizeChart->jeans == "22W") { ?> selected="selected"<?php } ?>>22W</option>
                                                                <option value="24W" <?php if ($SizeChart->jeans == "24W") { ?> selected="selected"<?php } ?>>24W</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>PANTS</h4>
                                                <div class="select-boxes">
                                                    <div class=" select-box">
                                                        <select name="pantsr1" id="pantsr1">
                                                            <option value="">--</option>
                                                            <option value="4" <?php if ($SizeChart->pantsr1 == "4") { ?> selected="selected"<?php } ?>>4</option>
                                                            <option value="4.5" <?php if ($SizeChart->pantsr1 == "4.5") { ?> selected="selected"<?php } ?>>4.5</option>
                                                            <option value="5" <?php if ($SizeChart->pantsr1 == "5") { ?> selected="selected"<?php } ?>>5</option>
                                                            <option value="5.5" <?php if ($SizeChart->pantsr1 == "5.5") { ?> selected="selected"<?php } ?>>5.5</option>
                                                            <option value="6" <?php if ($SizeChart->pantsr1 == "6") { ?> selected="selected"<?php } ?>>6</option>
                                                            <option value="6.5" <?php if ($SizeChart->pantsr1 == "6.5") { ?> selected="selected"<?php } ?>>6.5</option>
                                                            <option value="7" <?php if ($SizeChart->pantsr1 == "7") { ?> selected="selected"<?php } ?>>7</option>
                                                            <option value="7.5" <?php if ($SizeChart->pantsr1 == "7.5") { ?> selected="selected"<?php } ?>>7.5</option>
                                                            <option value="8" <?php if ($SizeChart->pantsr1 == "8") { ?> selected="selected"<?php } ?>>8</option>
                                                            <option value="8.5" <?php if ($SizeChart->pantsr1 == "8.5") { ?> selected="selected"<?php } ?>>8.5</option>
                                                        </select>
                                                    </div>
                                                    <div class="select-box select-box2">
                                                        <select name="pantsr2" id="pantsr2">
                                                            <option value="">--</option>
                                                            <option value="Narrow" <?php if ($SizeChart->pantsr2 == "Narrow") { ?> selected="selected"<?php } ?>>Narrow</option>
                                                            <option value="Medium" <?php if ($SizeChart->pantsr2 == "Medium") { ?> selected="selected"<?php } ?>>Medium</option>
                                                            <option value="Wide" <?php if ($SizeChart->pantsr2 == "Wide") { ?> selected="selected"<?php } ?>>Wide</option>
                                                            <option value="Extra Wide" <?php if ($SizeChart->pantsr2 == "Extra Wide") { ?> selected="selected"<?php } ?>>Extra Wide</option></select
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Are you pregnant and interested in maternity clothing?</h3>

                                                <div class="switch-field">
                                                    <input onclick="show2();" type="radio" id="switch_left" name="is_pregnant" <?php if (@$SizeChart->is_pregnant == 1) { ?> checked  <?php } else if (@$SizeChart->is_pregnant == '') { ?> checked <?php } ?> value="1"  />
                                                    <label for="switch_left">Yes</label>
                                                    <input onclick="show1();" type="radio" id="switch_right" name="is_pregnant"  <?php if (@$SizeChart->is_pregnant == 0) { ?> checked  <?php } ?> value="0" />
                                                    <label for="switch_right">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="div1" class="hide2" style="display:<?php if (@$SizeChart->is_pregnant == 1) { ?> block; <?php } else { ?> none;<?php } ?>">
                                        <div class="form-box-data">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12 col-md-12">
                                                    <h3> Please share your expected due date.</h3>
                                                    <p>Knowing this helps us style you throughout your pregnancy.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12 col-md-12">
                                                    <p>mm-dd-yyyy</p>
                                                    <!--<input type="date" placeholder=""/>-->
                                                    <div class='col-sm-3'>

                                                                                                                                                                                                                        <!--<input type='text' class="form-control" value="<?php echo @$Womeninfo->user_input_birthdate; ?>" name="user_input_birthdate" id="user_input_birthdate"/>-->

                                                        <div class='input-group date' id='datetimepicker2'>
                                                            <input type='text' class="form-control" value="<?php echo @$SizeChart->expected_due_date; ?>" name="expected_due_date" id="expected_due_date"/>
                                                            <span class="input-group-addon">
                                                                <span ><img src="<?php echo HTTP_ROOT ?>assets/images/calendar-filled.png" height="20px" width="20px"></span>
                                                            </span>
                                                        </div>



                                                        </span>

                                                    </div>
                                                    <p><span style="color: red;">Please enter a date within 40 weeks.</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-box-data">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12 col-md-12">
                                                    <h3>How do you prefer maternity clothes to fit?</h3>	
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12 col-md-12">
                                                    <label for="is_prefer_maternity3" class="input-control radio">
                                                        <input type="radio" id="is_prefer_maternity3" name="is_prefer_maternity" value="1" <?php if (@$SizeChart->is_prefer_maternity == 1) { ?> checked  <?php } else if (@$SizeChart->is_prefer_maternity != 1) { ?> checked <?php } ?>>
                                                        <span class="input-control__indicator"></span>Fitted (fits snugly around bump)
                                                    </label>

                                                    <label for="is_prefer_maternity2" class="input-control radio">
                                                        <input type="radio" id="is_prefer_maternity2" name="is_prefer_maternity" value="2" <?php if (@$SizeChart->is_prefer_maternity == 2) { ?> checked  <?php } ?>>
                                                        <span class="input-control__indicator"></span>Loose (flows loosely over bump)
                                                    </label>
                                                    <label for="is_prefer_maternity" class="input-control radio">
                                                        <input type="radio" id="is_prefer_maternity" name="is_prefer_maternity" value="3" <?php if (@$SizeChart->is_prefer_maternity == 3) { ?> checked  <?php } ?>>
                                                        <span class="input-control__indicator"></span>A mix of both
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-box-data">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12 col-md-12">
                                                    <div class="type-box">
                                                        <h3>How often would you like to receive Fixes?</h3>


                                                        <ul>
                                                            <li>
                                                                <input class="radio-box"  id="radio1" type="radio" name="what_kind_pants" value='1' <?php if (@$SizeChart->what_kind_pants == 1) { ?> checked  <?php } elseif (@$SizeChart->is_styles_designed_nursing == '') { ?> checked <?php } ?>>
                                                                <label for="radio1">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/leady-size-1.png" alt="">
                                                                </label>
                                                                <p>Elastic side panels give the appearance of regular pants</p>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="radio2"  type="radio" name="what_kind_pants" value='2' <?php if (@$SizeChart->what_kind_pants == 2) { ?> checked  <?php } ?>>
                                                                <label for="radio2">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/leady-size-2.png" alt="">
                                                                </label>
                                                                <p>All-around stretch provides light support at every stage</p>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="radio3" type="radio" name="what_kind_pants" value='3' <?php if (@$SizeChart->what_kind_pants == 3) { ?> checked  <?php } ?>>
                                                                <label for="radio3">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/leady-size-3.png" alt="">
                                                                </label>
                                                                <p>Comfortably fits over bump for maximum support</p>
                                                            </li>
                                                            <li>
                                                                <input class="radio-box" id="radio4" type="radio" name="what_kind_pants" value='4' <?php if (@$SizeChart->what_kind_pants == 4) { ?> checked  <?php } ?>>
                                                                <label for="radio4">
                                                                    <img src="<?php echo HTTP_ROOT ?>assets/images/leady-size-4.png" alt="">
                                                                </label>
                                                                <p>Regular pants with an under-the-belly fit</p>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-box-data">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12 col-md-12">
                                                    <h3>Are you interested in styles designed for nursing? </h3>	
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12 col-md-12">
                                                    <label for="is_styles_designed_nursing" class="input-control radio">
                                                        <input type="radio" id="is_styles_designed_nursing" name="is_styles_designed_nursing" value="1" <?php if (@$SizeChart->is_styles_designed_nursing == 1) { ?> checked  <?php } elseif (@$SizeChart->is_styles_designed_nursing == '') { ?> checked <?php } ?>>
                                                        <span class="input-control__indicator"></span>Yes
                                                    </label>

                                                    <label for="is_styles_designed_nursing2" class="input-control radio">
                                                        <input type="radio" id="is_styles_designed_nursing2" name="is_styles_designed_nursing" value="2" <?php if (@$SizeChart->is_styles_designed_nursing == 2) { ?> checked  <?php } ?>>
                                                        <span class="input-control__indicator"></span>No
                                                    </label>
                                                    <label for="is_styles_designed_nursing3" class="input-control radio">
                                                        <input type="radio" id="is_styles_designed_nursing3" name="is_styles_designed_nursing" value="3" <?php if (@$SizeChart->is_styles_designed_nursing == 3) { ?> checked  <?php } ?>>
                                                        <span class="input-control__indicator"></span>Not sure
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How would you characterize your proportions?</h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>ARMS</h4>	
                                                <label for="radioa" class="input-control radio">
                                                    <input type="radio" id="radioa" name="proportion_arms" value="short" <?php if (@$SizeChart->proportion_arms == 'short') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Short
                                                </label>

                                                <label for="radiob" class="input-control radio">
                                                    <input type="radio" id="radiob" name="proportion_arms" value="average"  <?php if (@$SizeChart->proportion_arms == 'average') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Average
                                                </label>
                                                <label for="radioc" class="input-control radio">
                                                    <input type="radio" id="radioc" name="proportion_arms" value="long" <?php if (@$SizeChart->proportion_arms == 'long') { ?> checked <?php } ?> >
                                                    <span class="input-control__indicator"></span>Long
                                                </label>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">                                               
                                                <h4>SHOULDERS</h4>
                                                <label for="radiod" class="input-control radio">
                                                    <input type="radio" id="radiod" name="proportion_shoulders" value="narrow" <?php if (@$SizeChart->proportion_shoulders == 'narrow') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Narrow
                                                </label>

                                                <label for="radioe" class="input-control radio">
                                                    <input type="radio" id="radioe" name="proportion_shoulders" value="average" <?php if (@$SizeChart->proportion_shoulders == 'average') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Average
                                                </label>
                                                <label for="radiof" class="input-control radio">
                                                    <input type="radio" id="radiof" name="proportion_shoulders" value="broad" <?php if (@$SizeChart->proportion_shoulders == 'broad') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Broad
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>TORSO</h4>	
                                                <label for="radiog" class="input-control radio">
                                                    <input type="radio" id="radiog" name="proportion_torso" value="short" <?php if (@$SizeChart->proportion_torso == 'short') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Short
                                                </label>

                                                <label for="radioh" class="input-control radio">
                                                    <input type="radio" id="radioh" name="proportion_torso" value="average" <?php if (@$SizeChart->proportion_torso == 'average') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span> Average
                                                </label>
                                                <label for="radioi" class="input-control radio">
                                                    <input type="radio" id="radioi" name="proportion_torso" value="long" <?php if (@$SizeChart->proportion_torso == 'long') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Long
                                                </label>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>HIPS</h4>
                                                <label for="radioj" class="input-control radio">
                                                    <input type="radio" id="radioj" name="proportion_hips" value="narrow" <?php if (@$SizeChart->proportion_hips == 'narrow') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Narrow
                                                </label>

                                                <label for="radiok" class="input-control radio">
                                                    <input type="radio" id="radiok" name="proportion_hips" value="average" <?php if (@$SizeChart->proportion_hips == 'average') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Average
                                                </label>
                                                <label for="radiol" class="input-control radio">
                                                    <input type="radio" id="radiol" name="proportion_hips" value="broad" <?php if (@$SizeChart->proportion_hips == 'broad') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Broad
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h4>LEGS</h4>	
                                                <label for="radiom" class="input-control radio">
                                                    <input type="radio" id="radiom" name="proportion_legs" value="short" <?php if (@$SizeChart->proportion_legs == 'short') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Short
                                                </label>

                                                <label for="radion" class="input-control radio">
                                                    <input type="radio" id="radion" name="proportion_legs" value="Average" <?php if (@$SizeChart->proportion_legs == 'Average') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Average
                                                </label>
                                                <label for="proportion_legs1" class="input-control radio">
                                                    <input type="radio" id="proportion_legs1" name="proportion_legs" value="long" <?php if (@$SizeChart->proportion_legs == 'long') { ?> checked <?php } ?>>
                                                    <span class="input-control__indicator"></span>Long
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                            <button type="submit" name="size" value="size" >Next: Fit/Cut <i class="fas fa-arrow-right"></i></button>
                                            <a href="#">Save and return Home. »</a>
                                        </div>
                                    </div>
        <?php echo $this->Form->end(); ?>
                                </div>

                                <div role="tabpanel" class="tab-pane fade  <?php if ($sections == 'section2') { ?>  active in <?php } ?>" id="Section2">
        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'size_fit')) ?>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How do you prefer clothes to fit your top half?</h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label for="fit_your_top_half1" class="input-control radio">
                                                            <input id="fit_your_top_half1" name="fit_top" value="tight" type="radio" <?php if (@$FitCut->fit_top == 'tight') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Tight     
                                                        </label>
                                                    </li>
                                                    <li><label for="fit_your_top_half2" class="input-control radio">
                                                            <input id="fit_your_top_half2" name="fit_top" value="fitted" type="radio" <?php if (@$FitCut->fit_top == 'fitted') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Fitted
                                                        </label></li>
                                                    <li><label for="fit_your_top_half3" class="input-control radio">
                                                            <input id="fit_your_top_half3" name="fit_top" value="straight" type="radio" <?php if (@$FitCut->fit_top == 'straight') { ?> checked  <?php } ?>>
                                                            <span class="input-control__indicator"></span>Straight
                                                        </label></li>
                                                    <li><label for="fit_your_top_half4" class="input-control radio">
                                                            <input id="fit_your_top_half4" name="fit_top" value="loose" type="radio" <?php if (@$FitCut->fit_top == 'loose') { ?> checked  <?php } ?>>
                                                            <span class="input-control__indicator"></span>Loose
                                                        </label>
                                                    </li>
                                                    <li><label for="fit_your_top_half5" class="input-control radio">
                                                            <input id="fit_your_top_half5" name="fit_top" value="oversized" type="radio" <?php if (@$FitCut->fit_top == 'oversized') { ?> checked  <?php } ?>>
                                                            <span class="input-control__indicator"></span>Oversized
                                                        </label></li>
                                                </ul>
                                            </div>

                                        </div>	
                                    </div>                             
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>When tops fit comfortably in your bust and shoulders, how do the waist and length generally fit?</h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <h4 style="margin-top: 0;">WAIST OPENING</h4>
                                                    <li><label for="waist_opening1" class="input-control radio">
                                                            <input id="waist_opening1" name="plus_tops_fit_waist_opening_v2" value="Too tight" type="radio" <?php if (@$FitCut->plus_tops_fit_waist_opening_v2 == 'Too tight') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Too tight   
                                                        </label>
                                                    </li>
                                                    <li><label for="waist_opening2" class="input-control radio">
                                                            <input id="waist_opening2" name="plus_tops_fit_waist_opening_v2" value="Just right" type="radio" <?php if (@$FitCut->plus_tops_fit_waist_opening_v2 == 'Just right') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Just right
                                                        </label></li>
                                                    <li><label for="waist_opening3" class="input-control radio">
                                                            <input id="waist_opening3" name="plus_tops_fit_waist_opening_v2" value="Too loose" type="radio" <?php if (@$FitCut->plus_tops_fit_waist_opening_v2 == 'Too loose') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Too loose
                                                        </label></li>
                                                    <h4 style="margin-top: 0;">LENGTH</h4>
                                                    <li><label for="plus_tops_fit_length1" class="input-control radio">
                                                            <input id="plus_tops_fit_length1" name="plus_tops_fit_length" value="Too short" type="radio" <?php if (@$FitCut->plus_tops_fit_length == 'Too short') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Too short    
                                                        </label>
                                                    </li>
                                                    <li><label for="plus_tops_fit_length2" class="input-control radio">
                                                            <input id="plus_tops_fit_length2" name="plus_tops_fit_length" value="Just right" type="radio" <?php if (@$FitCut->plus_tops_fit_length == 'Just right') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Just right
                                                        </label></li>
                                                    <li><label for="plus_tops_fit_length3" class="input-control radio">
                                                            <input id="plus_tops_fit_length3" name="plus_tops_fit_length" value="Too long" type="radio" <?php if (@$FitCut->plus_tops_fit_length == 'Too long') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Too long
                                                        </label></li>
                                                </ul>
                                            </div>

                                        </div>	
                                    </div>  
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How do you prefer clothes to fit your bottom half?</h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label for="fit_bottom_half1" class="input-control radio">
                                                            <input id="fit_bottom_half1" name="plus_bottoms_fit" value="Tight" type="radio" <?php if (@$FitCut->fit_bottom == 'Tight') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Tight   
                                                        </label>
                                                    </li>
                                                    <li><label for="fbf" class="input-control radio">
                                                            <input id="fbf" name="plus_bottoms_fit" value="Fitted" type="radio" <?php if (@$FitCut->fit_bottom == 'Fitted') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Fitted
                                                        </label></li>
                                                    <li><label for="fbf2" class="input-control radio">
                                                            <input id="fbf2" name="plus_bottoms_fit" value="Straight" type="radio" <?php if (@$FitCut->fit_bottom == 'Straight') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Straight
                                                        </label></li>
                                                    <li><label for="fbf3" class="input-control radio">
                                                            <input id="fbf3" name="plus_bottoms_fit" value="Loose" type="radio" <?php if (@$FitCut->fit_bottom == 'Loose') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Loose
                                                        </label>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>	
                                    </div>  
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Which best describes how pants typically fit you?</h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label for="ps1" class="input-control radio">
                                                            <input id="ps1" name="too_big_hip_and_thigh" value="1" type="radio" <?php if (@$FitCut->too_big_hip_and_thigh == '1') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Fits correctly in the waist, hip and thigh   
                                                        </label>
                                                    </li>
                                                    <li><label for="ps2" class="input-control radio">
                                                            <input id="ps2" name="too_big_hip_and_thigh" value="2" type="radio" <?php if (@$FitCut->too_big_hip_and_thigh == '2') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Fits in the waist; too big in the hip and thigh
                                                        </label></li>
                                                    <li><label for="ps3" class="input-control radio">
                                                            <input id="ps3" name="too_big_hip_and_thigh" value="3" type="radio" <?php if (@$FitCut->too_big_hip_and_thigh == '3') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Fits in the hip and thigh; too big in the waist
                                                        </label></li>                                          

                                                </ul>
                                            </div>

                                        </div>	
                                    </div>  
                                    <div class="form-box-data checkboxes">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What types of jeans do you prefer?</h3>	
                                                <h6>Select all that apply.</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <div class="select-boxes">
                                                    <h4>STYLE</h4>	
                                                    <ul>
                                                        <li>
                                                            <input id="js1" name="jeans_style[]" type="checkbox" value="Straight" <?php if (isset($WomenJeansStyle) && in_array('Straight', @$WomenJeansStyle)) { ?> checked <?php } ?>>
                                                            <label for="js1">Straight</label>
                                                        </li>
                                                        <li>
                                                            <input id="js2" name="jeans_style[]" type="checkbox" value="Skinny" <?php if (isset($WomenJeansStyle) && in_array('Skinny', @$WomenJeansStyle)) { ?> checked <?php } ?>>
                                                            <label for="js2">Skinny</label>
                                                        </li>
                                                        <li>
                                                            <input id="js3" name="jeans_style[]" type="checkbox" value="Boot cut" <?php if (isset($WomenJeansStyle) && in_array('Boot cut', @$WomenJeansStyle)) { ?> checked <?php } ?> >
                                                            <label for="js3">Boot cut</label>
                                                        </li>
                                                        <li>
                                                            <input id="js4" name="jeans_style[]" type="checkbox" value="Wide" <?php if (isset($WomenJeansStyle) && in_array('Wide', @$WomenJeansStyle)) { ?> checked <?php } ?>>
                                                            <label for="js4">Wide</label>
                                                        </li>

                                                    </ul>
                                                    <h4 style="margin-top: 0;">RISE</h4>
                                                    <ul>

                                                        <li>
                                                            <input id="jr1" name="jeans_rise[]" type="checkbox" value="Low"  <?php if (isset($WomenJeansRise) && in_array('Low', @$WomenJeansRise)) { ?> checked <?php } ?> >
                                                            <label for="jr1">Low</label>
                                                        </li>
                                                        <li>
                                                            <input id="jr2" name="jeans_rise[]" type="checkbox" value="Mid" <?php if (isset($WomenJeansRise) && in_array('Mid', @$WomenJeansRise)) { ?> checked <?php } ?> >
                                                            <label for="jr2">Mid</label>
                                                        </li>
                                                        <li>
                                                            <input id="jr3" name="jeans_rise[]" type="checkbox" value="High" <?php if (isset($WomenJeansRise) && in_array('High', @$WomenJeansRise)) { ?> checked <?php } ?> >
                                                            <label for="jr3">High</label>
                                                        </li>




                                                    </ul>
                                                    <h4 style="margin-top: 0;">LENGTH</h4>
                                                    <ul>

                                                        <li>
                                                            <input id="jl1" name="jeans_length[]" type="checkbox" value="1" <?php if (isset($WomenJeansLength) && in_array('1', $WomenJeansLength)) { ?> checked <?php } ?>>
                                                            <label for="jl1">Ankle (28" - 29")</label>
                                                        </li>
                                                        <li>
                                                            <input id="jl2" name="jeans_length[]" type="checkbox" value="2" <?php if (isset($WomenJeansLength) && in_array('2', $WomenJeansLength)) { ?> checked <?php } ?>>
                                                            <label for="jl2">Regular (30" - 32")</label>
                                                        </li>
                                                        <li>
                                                            <input id="jl3" name="jeans_length[]" type="checkbox" value="3" <?php if (isset($WomenJeansLength) && in_array('3', $WomenJeansLength)) { ?> checked <?php } ?>>
                                                            <label for="jl3">Long (33" - 35")</label>
                                                        </li>


                                                    </ul>
                                                </div>
                                            </div>

                                        </div>	
                                    </div>  
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What do you like to flaunt? What would you rather downplay?</h3>	

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <h4>ARMS</h4>	
                                                <ul>
                                                    <li><label for="am1" class="input-control radio">
                                                            <input id="am1" name="flaunt_arms" value="1" type="radio" <?php if (@$FitCut->flaunt_arms == '1') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>I love showing them off!  
                                                        </label>
                                                    </li>
                                                    <li><label for="am2" class="input-control radio">
                                                            <input id="am2" name="flaunt_arms" value="2" type="radio" <?php if (@$FitCut->flaunt_arms == '2') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Sometimes I’ll flaunt them
                                                        </label></li>
                                                    <li><label for="am3" class="input-control radio">
                                                            <input id="am3" name="flaunt_arms" value="3" type="radio" <?php if (@$FitCut->flaunt_arms == '3') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                        </label></li>                                          
                                                    <li><label for="am4" class="input-control radio">
                                                            <input id="am4" name="flaunt_arms" value="4" type="radio" <?php if (@$FitCut->flaunt_arms == '4') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Less is more, keep them covered
                                                        </label></li>                                          

                                                </ul>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <h4>SHOULDERS</h4>	
                                                <ul>

                                                    <li><label for="sl1" class="input-control radio">
                                                            <input id="sl1" name="flaunt_shoulders" value="1" type="radio" <?php if (@$FitCut->flaunt_shoulders == '1') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>I love showing them off!  
                                                        </label>
                                                    </li>
                                                    <li><label for="sl2" class="input-control radio">
                                                            <input id="sl2" name="flaunt_shoulders" value="2" type="radio" <?php if (@$FitCut->flaunt_shoulders == '2') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Sometimes I’ll flaunt them
                                                        </label></li>
                                                    <li><label for="sl3" class="input-control radio">
                                                            <input id="sl3" name="flaunt_shoulders" value="3" type="radio" <?php if (@$FitCut->flaunt_shoulders == '3') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                        </label></li>                                          
                                                    <li><label for="sl4" class="input-control radio">
                                                            <input id="sl4" name="flaunt_shoulders" value="4" type="radio" <?php if (@$FitCut->flaunt_shoulders == '4') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Less is more, keep them covered
                                                        </label></li>                                          

                                                </ul>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <h4>BACK</h4>	
                                                <ul>

                                                    <li><label for="ba1" class="input-control radio">
                                                            <input id="ba1" name="flaunt_back" value="1" type="radio" <?php if (@$FitCut->flaunt_back == '1') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>I love showing them off!  
                                                        </label>
                                                    </li>
                                                    <li><label for="ba2" class="input-control radio">
                                                            <input id="ba2" name="flaunt_back" value="2" type="radio" <?php if (@$FitCut->flaunt_back == '2') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Sometimes I’ll flaunt it
                                                        </label></li>
                                                    <li><label for="ba3" class="input-control radio">
                                                            <input id="ba3" name="flaunt_back" value="3" type="radio" <?php if (@$FitCut->flaunt_back == '3') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                        </label></li>                                          
                                                    <li><label for="ba4" class="input-control radio">
                                                            <input id="ba4" name="flaunt_back" value="4" type="radio" <?php if (@$FitCut->flaunt_back == '4') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Less is more, keep them covered
                                                        </label></li>                                          

                                                </ul>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <h4>CLEAVAGE</h4>
                                                <ul>

                                                    <li><label for="flaunt_cleavage1" class="input-control radio">
                                                            <input id="flaunt_cleavage1" name="flaunt_cleavage" value="1" type="radio" <?php if (@$FitCut->flaunt_cleavage == '1') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>I love showing them off!  
                                                        </label>
                                                    </li>
                                                    <li><label for="flaunt_cleavage2" class="input-control radio">
                                                            <input id="flaunt_cleavage2" name="flaunt_cleavage" value="2" type="radio" <?php if (@$FitCut->flaunt_cleavage == '2') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Sometimes I’ll flaunt it
                                                        </label></li>
                                                    <li><label for="flaunt_cleavage3" class="input-control radio">
                                                            <input id="flaunt_cleavage3" name="flaunt_cleavage" value="3" type="radio" <?php if (@$FitCut->flaunt_cleavage == '3') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                        </label></li>                                          
                                                    <li><label for="flaunt_cleavage4" class="input-control radio">
                                                            <input id="flaunt_cleavage4" name="flaunt_cleavage" value="4" type="radio" <?php if (@$FitCut->flaunt_cleavage == '4') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Less is more, keep them covered
                                                        </label></li>                                          

                                                </ul>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <h4>MIDSECTION</h4>	
                                                <ul>

                                                    <li><label for="flaunt_midsection1" class="input-control radio">
                                                            <input id="flaunt_midsection1" name="flaunt_midsection" value="1" type="radio" <?php if (@$FitCut->flaunt_midsection == '1') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>I love showing them off!  
                                                        </label>
                                                    </li>
                                                    <li><label for="flaunt_midsection2" class="input-control radio">
                                                            <input id="flaunt_midsection2" name="flaunt_midsection" value="2" type="radio" <?php if (@$FitCut->flaunt_midsection == '2') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Sometimes I’ll flaunt it
                                                        </label></li>
                                                    <li><label for="flaunt_midsection3" class="input-control radio">
                                                            <input id="flaunt_midsection3" name="flaunt_midsection" value="3" type="radio"<?php if (@$FitCut->flaunt_midsection == '3') { ?> checked  <?php } ?>  >
                                                            <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                        </label></li>                                          
                                                    <li><label for="flaunt_midsection4" class="input-control radio">
                                                            <input id="flaunt_midsection4" name="flaunt_midsection" value="4" type="radio" <?php if (@$FitCut->flaunt_midsection == '4') { ?> checked  <?php } ?>>
                                                            <span class="input-control__indicator"></span>Less is more, keep them covered
                                                        </label></li>                                          
                                                    <li><label for="flaunt_midsection5" class="input-control radio">
                                                            <input id="flaunt_midsection5" name="flaunt_midsection" value="5" type="radio" <?php if (@$FitCut->flaunt_midsection == '5') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>I’d prefer a more relaxed fit
                                                        </label></li>                                          

                                                </ul>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <h4>REAR</h4>	
                                                <ul>

                                                    <li><label for="flaunt_rear1" class="input-control radio">
                                                            <input id="flaunt_rear1" name="flaunt_rear" value="1" type="radio" <?php if (@$FitCut->flaunt_rear == '1') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>I love form-fitting styles! 
                                                        </label>
                                                    </li>
                                                    <li><label for="flaunt_rear2" class="input-control radio">
                                                            <input id="flaunt_rear2" name="flaunt_rear" value="2" type="radio" <?php if (@$FitCut->flaunt_rear == '2') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Sometimes I’ll wear form-fitting
                                                        </label></li>
                                                    <li><label for="flaunt_rear3" class="input-control radio">
                                                            <input id="flaunt_rear3" name="flaunt_rear" value="3" type="radio"  <?php if (@$FitCut->flaunt_rear == '3') { ?> checked  <?php } ?>>
                                                            <span class="input-control__indicator"></span>Form-fitting only for special occasions
                                                        </label></li>                                          
                                                    <li><label for="flaunt_rear4" class="input-control radio">
                                                            <input id="flaunt_rear4" name="flaunt_rear" value="4" type="radio" <?php if (@$FitCut->flaunt_rear == '4') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>I’d prefer a more relaxed fit
                                                        </label></li>                                          


                                                </ul>
                                            </div>
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <h4>LEGS</h4>	
                                                <ul>
                                                    <li><label for="l1" class="input-control radio">
                                                            <input id="l1" name="flaunt_legs" value="1" type="radio" <?php if (@$FitCut->flaunt_legs == '1') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>I love showing them off! 
                                                        </label>
                                                    </li>
                                                    <li><label for="l2" class="input-control radio">
                                                            <input id="l2" name="flaunt_legs" value="2" type="radio" <?php if (@$FitCut->flaunt_legs == '2') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Sometimes I’ll flaunt it
                                                        </label></li>
                                                    <li><label for="l3" class="input-control radio">
                                                            <input id="l3" name="flaunt_legs" value="3" type="radio" <?php if (@$FitCut->flaunt_legs == '3') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Flaunt only for special occasions
                                                        </label></li>                                          
                                                    <li><label for="l4" class="input-control radio">
                                                            <input id="l4" name="flaunt_legs" value="4" type="radio" <?php if (@$FitCut->flaunt_legs == '4') { ?> checked  <?php } ?> >
                                                            <span class="input-control__indicator"></span>Less is more, keep them covered
                                                        </label></li>                                          


                                                </ul>
                                            </div>
                                        </div>	
                                    </div> 
                                    <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                        <button type="submit" name="fitcut" value = 'fitcut'>Next: Style <i class="fas fa-arrow-right"></i></button>
                                        <!--<a href="#">Save and return Home. »</a>-->
                                    </div>
        <?php echo $this->Form->end(); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade  <?php if ($sections == 'section3') { ?>  active in <?php } ?>" id="Section3">
        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'size_fit')) ?>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What do you think of the styles below? </h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/style1.jpg" alt="" height="294" width="790">
                                                            <div class="switch-field">
                                                                <input id="rating_preppy1" name="rating_preppy" value="Hate it" <?php if (@$Womenstyle->rating_preppy == 'Hate it') { ?> checked <?php } else if (@$Womenstyle->rating_preppy == '') { ?> checked <?php } ?> type="radio" >
                                                                <label for="rating_preppy1">Hate it</label>
                                                                <input id="rating_preppy2" name="rating_preppy" value="Just Ok" type="radio" <?php if (@$Womenstyle->rating_preppy == 'Just Ok') { ?> checked <?php } ?>>
                                                                <label for="rating_preppy2">Just Ok</label>
                                                                <input id="rating_preppy3" name="rating_preppy" value="Like it" type="radio" <?php if (@$Womenstyle->rating_preppy == 'Like it') { ?> checked <?php } ?>>
                                                                <label for="rating_preppy3">Like it</label>
                                                                <input id="rating_preppy4" name="rating_preppy" value="Love it" type="radio" <?php if (@$Womenstyle->rating_preppy == 'Love it') { ?> checked <?php } ?>>
                                                                <label for="rating_preppy4">Love it</label>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/style2.jpg" alt="" height="294" width="790">
                                                            <div class="switch-field">
                                                                <input id="rating_romantic1" name="rating_romantic" value="Hate it" type="radio" <?php if (@$Womenstyle->rating_romantic == 'Hate it') { ?> checked <?php } else if (@$Womenstyle->rating_romantic == '') { ?>checked <?php } ?> >
                                                                <label for="rating_romantic1">Hate it</label>
                                                                <input id="rating_romantic2" name="rating_romantic" value="Just Ok" type="radio" <?php if (@$Womenstyle->rating_romantic == 'Just Ok') { ?> checked <?php } ?> >
                                                                <label for="rating_romantic2">Just Ok</label>
                                                                <input id="rating_romantic3" name="rating_romantic" value="Like it" type="radio" <?php if (@$Womenstyle->rating_romantic == 'Like it') { ?> checked <?php } ?> >
                                                                <label for="rating_romantic3">Like it</label>
                                                                <input id="rating_romantic4" name="rating_romantic" value="Love it" type="radio" <?php if (@$Womenstyle->rating_romantic == 'Love it') { ?> checked <?php } ?>>
                                                                <label for="rating_romantic4">Love it</label>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/style3.jpg" alt="" height="294" width="790">
                                                            <div class="switch-field">
                                                                <input id="rating_casual1" name="rating_casual" value="Hate it" <?php if (@$Womenstyle->rating_casual == 'Hate it') { ?> checked <?php } else if (@$Womenstyle->rating_casual == '') { ?>checked <?php } ?> type="radio">
                                                                <label for="rating_casual1">Hate it</label>
                                                                <input id="rating_casual2" name="rating_casual" value="Just Ok" type="radio" <?php if (@$Womenstyle->rating_casual == 'Just Ok') { ?> checked <?php } ?> >
                                                                <label for="rating_casual2">Just Ok</label>
                                                                <input id="rating_casual3" name="rating_casual" value="Like it" type="radio" <?php if (@$Womenstyle->rating_casual == 'Like it') { ?> checked <?php } ?>>
                                                                <label for="rating_casual3">Like it</label>
                                                                <input id="rating_casual4" name="rating_casual" value="Love it" type="radio" <?php if (@$Womenstyle->rating_casual == 'Love it') { ?> checked <?php } ?>>
                                                                <label for="rating_casual4">Love it</label>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/style4.jpg" alt="" height="294" width="790">
                                                            <div class="switch-field">
                                                                <input id="rating_edgy1" name="rating_edgy" value="Hate it" <?php if (@$Womenstyle->rating_edgy == 'Hate it') { ?> checked <?php } else if (@$Womenstyle->rating_edgy == '') { ?>checked <?php } ?>  type="radio">
                                                                <label for="rating_edgy1">Hate it</label>
                                                                <input id="rating_edgy2" name="rating_edgy" value="Just Ok" type="radio"  <?php if (@$Womenstyle->rating_edgy == 'Just Ok') { ?> checked <?php } ?> >
                                                                <label for="rating_edgy2">Just Ok</label>
                                                                <input id="rating_edgy3" name="rating_edgy" value="Like it" type="radio" <?php if (@$Womenstyle->rating_edgy == 'Like it') { ?> checked <?php } ?>>
                                                                <label for="rating_edgy3">Like it</label>
                                                                <input id="rating_edgy4" name="rating_edgy" value="Love it" type="radio" <?php if (@$Womenstyle->rating_edgy == 'Love it') { ?> checked <?php } ?>>
                                                                <label for="rating_edgy4">Love it</label>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/style5.jpg" alt="" height="294" width="790">
                                                            <div class="switch-field">
                                                                <input id="rating_boho1" name="rating_boho" value="Hate it"  type="radio"  <?php if (@$Womenstyle->rating_boho == 'Hate it') { ?> checked <?php } else if (@$Womenstyle->rating_boho == '') { ?> checked <?php } ?>>
                                                                <label for="rating_boho1">Hate it</label>
                                                                <input id="rating_boho2" name="rating_boho" value="Just Ok" type="radio" <?php if (@$Womenstyle->rating_boho == 'Just Ok') { ?> checked <?php } ?>>
                                                                <label for="rating_boho2">Just Ok</label>
                                                                <input id="rb3" name="rating_boho" value="Like it" type="radio" <?php if (@$Womenstyle->rating_boho == 'Like it') { ?> checked <?php } ?>>
                                                                <label for="rb3">Like it</label>
                                                                <input id="rb4" name="rating_boho" value="Love it" type="radio" <?php if (@$Womenstyle->rating_boho == 'Love it') { ?> checked <?php } ?> >
                                                                <label for="rb4">Love it</label>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/style6.jpg" alt="" height="294" width="790">
                                                            <div class="switch-field">
                                                                <input id="rating_glam1" name="rating_glam" value="Hate it"  <?php if (@$Womenstyle->rating_glam == 'Hate it') { ?> checked <?php } else if (@$Womenstyle->rating_glam == '') { ?>checked <?php } ?> type="radio">
                                                                <label for="rating_glam1">Hate it</label>
                                                                <input id="rating_glam2" name="rating_glam" value="Just Ok" type="radio" <?php if (@$Womenstyle->rating_glam == 'Just Ok') { ?> checked <?php } ?> >
                                                                <label for="rating_glam2">Just Ok</label>
                                                                <input id="rating_glam3" name="rating_glam" value="Like it" type="radio" <?php if (@$Womenstyle->rating_glam == 'Like it') { ?> checked <?php } ?>>
                                                                <label for="rating_glam3">Like it</label>
                                                                <input id="rating_glam4" name="rating_glam" value="Love it" type="radio" <?php if (@$Womenstyle->rating_glam == 'Love it') { ?> checked <?php } ?>>
                                                                <label for="rating_glam4">Love it</label>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/style7.jpg" alt="" height="294" width="790">
                                                            <div class="switch-field">
                                                                <input id="rc1" name="rating_classic" value="Hate it"  <?php if (@$Womenstyle->rating_classic == 'Hate it') { ?> checked <?php } else if (@$Womenstyle->rating_classic == '') { ?> checked <?php } ?> type="radio">
                                                                <label for="rc1">Hate it</label>
                                                                <input id="rc2" name="rating_classic" value="Just Ok" type="radio" <?php if (@$Womenstyle->rating_classic == 'Just Ok') { ?> checked <?php } ?> >
                                                                <label for="rc2">Just Ok</label>
                                                                <input id="rc3" name="rating_classic" value="Like it" type="radio"  <?php if (@$Womenstyle->rating_classic == 'Like it') { ?> checked <?php } ?>>
                                                                <label for="rc3">Like it</label>
                                                                <input id="rc4" name="rating_classic" value="Love it" type="radio"  <?php if (@$Womenstyle->rating_classic == 'Love it') { ?> checked <?php } ?>>
                                                                <label for="rc4">Love it</label>
                                                            </div>
                                                        </li>


                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How often do you dress for the following occasions? </h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <h4>WORK / BUSINESS CASUAL </h4>
                                                    <li><label for="owc" class="input-control radio">
                                                            <input id="owc" name="occasion_work_casual" value="1" type="radio" <?php if (@$Womenstyle->occasion_work_casual == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Most of the time    
                                                        </label>
                                                    </li>
                                                    <li><label for="owc2" class="input-control radio">
                                                            <input id="owc2" name="occasion_work_casual" value="2" type="radio" <?php if (@$Womenstyle->occasion_work_casual == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>About once or twice a week
                                                        </label></li>
                                                    <li><label for="owc3" class="input-control radio">
                                                            <input id="owc3" name="occasion_work_casual" value="3" type="radio" <?php if (@$Womenstyle->occasion_work_casual == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>About once or twice a month
                                                        </label></li>
                                                    <li><label for="owc4" class="input-control radio">
                                                            <input id="owc4" name="occasion_work_casual" value="4" type="radio" <?php if (@$Womenstyle->occasion_work_casual == 4) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Rarely
                                                        </label>
                                                    </li>

                                                </ul>
                                                <ul>
                                                    <h4>COCKTAIL / WEDDING / EVENT  </h4>
                                                    <li><label for="ose1" class="input-control radio">
                                                            <input id="ose1" name="occasion_special_event" value="1" type="radio" <?php if (@$Womenstyle->occasion_special_event == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Most of the time    
                                                        </label>
                                                    </li>
                                                    <li><label for="ose2" class="input-control radio">
                                                            <input id="ose2" name="occasion_special_event" value="2" type="radio" <?php if (@$Womenstyle->occasion_special_event == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>About once or twice a week
                                                        </label></li>
                                                    <li><label for="ose3" class="input-control radio">
                                                            <input id="ose3" name="occasion_special_event" value="3" type="radio" <?php if (@$Womenstyle->occasion_special_event == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>About once or twice a month
                                                        </label></li>
                                                    <li><label for="ose4" class="input-control radio">
                                                            <input id="ose4" name="occasion_special_event" value="4" type="radio" <?php if (@$Womenstyle->occasion_special_event == 4) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Rarely
                                                        </label>
                                                    </li>

                                                </ul>
                                                <ul>
                                                    <h4>LAID-BACK CASUAL   </h4>
                                                    <li><label for="oc" class="input-control radio">
                                                            <input id="oc" name="occasion_casual" value="1" type="radio" <?php if (@$Womenstyle->occasion_casual == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Most of the time    
                                                        </label>
                                                    </li>
                                                    <li><label for="oc1" class="input-control radio">
                                                            <input id="oc1" name="occasion_casual" value="2" type="radio" <?php if (@$Womenstyle->occasion_casual == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>About once or twice a week
                                                        </label></li>
                                                    <li><label for="oc2" class="input-control radio">
                                                            <input id="oc2" name="occasion_casual" value="3" type="radio" <?php if (@$Womenstyle->occasion_casual == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>About once or twice a month
                                                        </label></li>
                                                    <li><label for="oc3" class="input-control radio">
                                                            <input id="oc3" name="occasion_casual" value="4" type="radio" <?php if (@$Womenstyle->occasion_casual == 4) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Rarely
                                                        </label>
                                                    </li>

                                                </ul>
                                                <ul>
                                                    <h4>DATE NIGHT / NIGHT OUT</h4>
                                                    <li><label for="ono1" class="input-control radio">
                                                            <input id="ono1" name="occasion_night_out" value="1" type="radio" <?php if (@$Womenstyle->occasion_night_out == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Most of the time    
                                                        </label>
                                                    </li>
                                                    <li><label for="ono2" class="input-control radio">
                                                            <input id="ono2" name="occasion_night_out" value="2" type="radio" <?php if (@$Womenstyle->occasion_night_out == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>About once or twice a week
                                                        </label></li>
                                                    <li><label for="ono3" class="input-control radio">
                                                            <input id="ono3" name="occasion_night_out" value="3" type="radio" <?php if (@$Womenstyle->occasion_night_out == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>About once or twice a month
                                                        </label></li>
                                                    <li><label for="ono4" class="input-control radio">
                                                            <input id="ono4" name="occasion_night_out" value="4" type="radio" <?php if (@$Womenstyle->occasion_night_out == 4) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Rarely
                                                        </label>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>	
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How much do you want your Fix selections to focus on the following occasions? </h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <h4>WORK / BUSINESS CASUAL </h4>
                                                    <li><label for="dwc1" class="input-control radio">
                                                            <input id="dwc1" name="desired_work_casual" value="1" type="radio" <?php if (@$Womenstyle->desired_work_casual == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Frequently: As much as I can get!   
                                                        </label>
                                                    </li>
                                                    <li><label for="dwc2" class="input-control radio">
                                                            <input id="dwc2" name="desired_work_casual" value="2" type="radio" <?php if (@$Womenstyle->desired_work_casual == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Consistently: At least one piece per shipment
                                                        </label></li>
                                                    <li><label for="dwc3" class="input-control radio">
                                                            <input id="dwc3" name="desired_work_casual" value="3" type="radio" <?php if (@$Womenstyle->desired_work_casual == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Sometimes: If my Stylist really loves it for me
                                                        </label></li>
                                                    <li><label for="dwc4" class="input-control radio">
                                                            <input id="dwc4" name="desired_work_casual" value="4" type="radio" <?php if (@$Womenstyle->desired_work_casual == 4) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Rarely: Very little, or only when I specifically ask for it
                                                        </label>
                                                    </li>

                                                </ul>
                                                <ul>
                                                    <h4>COCKTAIL / WEDDING / EVENT  </h4>
                                                    <li><label for="dse1" class="input-control radio">
                                                            <input id="dse1" name="desired_special_event" value="1" type="radio" <?php if (@$Womenstyle->desired_special_event == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Frequently: As much as I can get!   
                                                        </label>
                                                    </li>
                                                    <li><label for="dse2" class="input-control radio">
                                                            <input id="dse2" name="desired_special_event" value="2" type="radio" <?php if (@$Womenstyle->desired_special_event == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Consistently: At least one piece per shipment
                                                        </label></li>
                                                    <li><label for="dse3" class="input-control radio">
                                                            <input id="dse3" name="desired_special_event" value="3" type="radio" <?php if (@$Womenstyle->desired_special_event == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Sometimes: If my Stylist really loves it for me
                                                        </label></li>
                                                    <li><label for="dse4" class="input-control radio">
                                                            <input id="dse4" name="desired_special_event" value="4" type="radio" <?php if (@$Womenstyle->desired_special_event == 4) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Rarely: Very little, or only when I specifically ask for it
                                                        </label>
                                                    </li>

                                                </ul>
                                                <ul>
                                                    <h4>LAID-BACK CASUAL   </h4>
                                                    <li><label for="dc1" class="input-control radio">
                                                            <input id="dc1" name="desired_casual" value="1" type="radio" <?php if (@$Womenstyle->desired_casual == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Frequently: As much as I can get!   
                                                        </label>
                                                    </li>
                                                    <li><label for="dc2" class="input-control radio">
                                                            <input id="dc2" name="desired_casual" value="2" type="radio" <?php if (@$Womenstyle->desired_casual == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Consistently: At least one piece per shipment
                                                        </label></li>
                                                    <li><label for="dc3" class="input-control radio">
                                                            <input id="dc3" name="desired_casual" value="3" type="radio" <?php if (@$Womenstyle->desired_casual == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Sometimes: If my Stylist really loves it for me
                                                        </label></li>
                                                    <li><label for="dc4" class="input-control radio">
                                                            <input id="dc4" name="desired_casual" value="4" type="radio" <?php if (@$Womenstyle->desired_casual == 4) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Rarely: Very little, or only when I specifically ask for it
                                                        </label>
                                                    </li>

                                                </ul>
                                                <ul>
                                                    <h4>DATE NIGHT / NIGHT OUT</h4>
                                                    <li><label for="ddn1" class="input-control radio">
                                                            <input id="ddn1" name="desired_date_night" value="1" type="radio" <?php if (@$Womenstyle->desired_date_night == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Frequently: As much as I can get!   
                                                        </label>
                                                    </li>
                                                    <li><label for="ddn2" class="input-control radio">
                                                            <input id="ddn2" name="desired_date_night" value="2" type="radio" <?php if (@$Womenstyle->desired_date_night == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Consistently: At least one piece per shipment
                                                        </label></li>
                                                    <li><label for="ddn3" class="input-control radio">
                                                            <input id="ddn3" name="desired_date_night" value="3" type="radio" <?php if (@$Womenstyle->desired_date_night == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Sometimes: If my Stylist really loves it for me
                                                        </label></li>
                                                    <li><label for="ddn4" class="input-control radio">
                                                            <input id="ddn4" name="desired_date_night" value="4" type="radio" <?php if (@$Womenstyle->desired_date_night == 4) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Rarely: Very little, or only when I specifically ask for it
                                                        </label>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>	
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>Are you more of a jeans / pants & top gal or a dresses gal? </h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label for="jf" class="input-control radio">
                                                            <input id="jf" name="jeans_frequency" value="1" type="radio" <?php if (@$Womenstyle->jeans_frequency == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Mostly jeans / pants
                                                        </label>
                                                    </li>
                                                    <li><label for="jf1" class="input-control radio">
                                                            <input id="jf1" name="jeans_frequency" value="2" type="radio" <?php if (@$Womenstyle->jeans_frequency == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Mostly dresses
                                                        </label></li>
                                                    <li><label for="jf2" class="input-control radio">
                                                            <input id="jf2" name="jeans_frequency" value="3" type="radio" <?php if (@$Womenstyle->jeans_frequency == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Healthy mix of both
                                                        </label></li>

                                                </ul>
                                            </div>

                                        </div>	
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 denim-styles">
                                                <h3> Would you wear any of these denim styles? </h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/denim1.jpg" alt="" width="223" height="216">
                                                            <div class="switch-field">
                                                                <input id="denim1" name="distressed_denim_non" value="yes"  type="radio" <?php if (@$Womenstyle->distressed_denim_non == 'yes') { ?> checked <?php } ?>>
                                                                <label for="denim1">Yes</label>
                                                                <input id="denim2" name="distressed_denim_non" value="maybe" type="radio" <?php if (@$Womenstyle->distressed_denim_non == 'maybe') { ?> checked <?php } ?>>
                                                                <label for="denim2">Maybe</label>
                                                                <input id="denim3" name="distressed_denim_non" value="never" type="radio" <?php if (@$Womenstyle->distressed_denim_non == 'never') { ?> checked <?php } ?>>
                                                                <label for="denim3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/denim2.jpg" alt="" width="223" height="216" >
                                                            <div class="switch-field">
                                                                <input id="denim4" name="distressed_denim_minimally" value="yes" checked="" type="radio" <?php if (@$Womenstyle->distressed_denim_minimally == 'yes') { ?> checked <?php } ?>>
                                                                <label for="denim4">Yes</label>
                                                                <input id="denim5" name="distressed_denim_minimally" value="maybe" type="radio" <?php if (@$Womenstyle->distressed_denim_minimally == 'maybe') { ?> checked <?php } ?>>
                                                                <label for="denim5">Maybe</label>
                                                                <input id="denim6" name="distressed_denim_minimally" value="never" type="radio" <?php if (@$Womenstyle->distressed_denim_minimally == 'never') { ?> checked <?php } ?>>
                                                                <label for="denim6">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/denim3.jpg" alt="" width="223" height="216">
                                                            <div class="switch-field">
                                                                <input id="denim7" name="distressed_denim_fairly" value="yes" checked="" type="radio" <?php if (@$Womenstyle->distressed_denim_fairly == 'yes') { ?> checked <?php } ?>>
                                                                <label for="denim7">Yes</label>
                                                                <input id="denim71" name="distressed_denim_fairly" value="maybe" type="radio" <?php if (@$Womenstyle->distressed_denim_fairly == 'maybe') { ?> checked <?php } ?>>
                                                                <label for="denim71">Maybe</label>
                                                                <input id="denim72" name="distressed_denim_fairly" value="never" type="radio" <?php if (@$Womenstyle->distressed_denim_fairly == 'never') { ?> checked <?php } ?>>
                                                                <label for="denim72">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>

                                                            <img src="<?php echo HTTP_ROOT ?>assets/images/denim4.jpg" alt="" width="223" height="216">
                                                            <div class="switch-field">
                                                                <input id="denim8" name="distressed_denim_heavily" value="yes" checked="" type="radio" <?php if (@$Womenstyle->distressed_denim_heavily == 'yes') { ?> checked <?php } ?>>
                                                                <label for="denim8">Yes</label>
                                                                <input id="denim9" name="distressed_denim_heavily" value="maybe" type="radio" <?php if (@$Womenstyle->distressed_denim_heavily == 'maybe') { ?> checked <?php } ?>>
                                                                <label for="denim9">Maybe</label>
                                                                <input id="denim10" name="distressed_denim_heavily" value="never" type="radio" <?php if (@$Womenstyle->distressed_denim_heavily == 'never') { ?> checked <?php } ?>>
                                                                <label for="denim10">Never</label>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data checkboxes">
                                        <div class="row">
                                            <div class="col-sm-8 col-lg-12 col-md-12">
                                                <h3>Where do you typically purchase your clothes? </h3>
                                                <h6>Select all that apply.</h6>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <input id="check-box1" name="womens_brands_plus_low_tier[]" type="checkbox" value="Target" <?php if (isset($womens_brands_plus_low_tier) && in_array('Target', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?> >
                                                            <label for="check-box1">Target</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box2" name="womens_brands_plus_low_tier[]" type="checkbox" value="Macys" <?php if (isset($womens_brands_plus_low_tier) && in_array('Macys', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box2">Macy’s</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box3" name="womens_brands_plus_low_tier[]" type="checkbox" value="SaksFifthAvenue" <?php if (isset($womens_brands_plus_low_tier) && in_array('SaksFifthAvenue', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box3">Saks Fifth Avenue</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box4" name="womens_brands_plus_low_tier[]" type="checkbox" value="Forever21" <?php if (isset($womens_brands_plus_low_tier) && in_array('Forever21', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box4">Forever 21</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box5" name="womens_brands_plus_low_tier[]" type="checkbox" value="Nordstrom" <?php if (isset($womens_brands_plus_low_tier) && in_array('Nordstrom', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box5">Nordstrom</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box1a" name="womens_brands_plus_low_tier[]" type="checkbox" value="Navabi" <?php if (isset($womens_brands_plus_low_tier) && in_array('Navabi', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box1a">Navabi</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box6" name="womens_brands_plus_low_tier[]" type="checkbox" value="H&M" <?php if (isset($womens_brands_plus_low_tier) && in_array('H&M', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box6">H&M</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box7" name="womens_brands_plus_low_tier[]" type="checkbox" value="LaneBryant" <?php if (isset($womens_brands_plus_low_tier) && in_array('LaneBryant', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box7">Lane Bryant</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box8" name="womens_brands_plus_low_tier[]" type="checkbox" value="EileenFisher" <?php if (isset($womens_brands_plus_low_tier) && in_array('EileenFisher', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box8">Eileen Fisher</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box9" name="womens_brands_plus_low_tier[]" type="checkbox" value="ASOSCurve" <?php if (isset($womens_brands_plus_low_tier) && in_array('ASOSCurve', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box9">ASOS Curve</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box10" name="womens_brands_plus_low_tier[]" type="checkbox" value="Avenue" <?php if (isset($womens_brands_plus_low_tier) && in_array('Avenue', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box10">Avenue</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box11" name="womens_brands_plus_low_tier[]" type="checkbox" value="Local Boutiques" <?php if (isset($womens_brands_plus_low_tier) && in_array('Local Boutiques', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box11">Local Boutiques</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box12" name="womens_brands_plus_low_tier[]" type="checkbox" value="TJ Maxx" <?php if (isset($womens_brands_plus_low_tier) && in_array('TJ Maxx', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box12">TJ Maxx</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box13" name="womens_brands_plus_low_tier[]" type="checkbox" value="Eloquii" <?php if (isset($womens_brands_plus_low_tier) && in_array('Eloquii', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box13">Eloquii</label>
                                                        </li>
                                                        <li>
                                                            <input id="check-box14" name="womens_brands_plus_low_tier[]" type="checkbox" value="Other" <?php if (isset($womens_brands_plus_low_tier) && in_array('Other', @$womens_brands_plus_low_tier)) { ?> checked <?php } ?>>
                                                            <label for="check-box14">Other</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How adventurous do you want your Fix selections to be? </h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>                                          
                                                    <li><label for="adv" class="input-control radio">
                                                            <input id="adv" name="adventure" value="1" type="radio" <?php if (@$Womenstyle->adventure == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Frequently: Adventure is my middle name, bring it on!   
                                                        </label>
                                                    </li>
                                                    <li><label for="adv1" class="input-control radio">
                                                            <input id="adv1" name="adventure" value="2" type="radio" <?php if (@$Womenstyle->adventure == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Sometimes: I like trying new trends
                                                        </label></li>
                                                    <li><label for="adv2" class="input-control radio">
                                                            <input id="adv2" name="adventure" value="3" type="radio" <?php if (@$Womenstyle->adventure == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Occasionally: I'd like to incorporate a few unique pieces
                                                        </label></li>
                                                    <li><label for="adv3" class="input-control radio">
                                                            <input id="adv3" name="adventure" value="4" type="radio" <?php if (@$Womenstyle->adventure == 4) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Never: Please keep my clothes timeless
                                                        </label>
                                                    </li>

                                                </ul>

                                            </div>

                                        </div>	
                                    </div>
                                    <div class="form-box-data checkboxes">
                                        <div class="row">
                                            <div class="col-sm-8 col-lg-12 col-md-12">
                                                <h3>Would you like to incorporate more of the following styles into your wardrobe? </h3>

                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <input id="style_wardrobe1" name="style_wardrobe[]" type="checkbox" value="Boho" <?php if (isset($style_wardrobe) && in_array('Boho', @$style_wardrobe)) { ?> checked <?php } ?>>
                                                            <label for="style_wardrobe1">Boho</label>
                                                        </li>
                                                        <li>
                                                            <input id="style_wardrobe2" name="style_wardrobe[]" type="checkbox" value="Casual" <?php if (isset($style_wardrobe) && in_array('Casual', @$style_wardrobe)) { ?> checked <?php } ?>>
                                                            <label for="style_wardrobe2">Casual</label>
                                                        </li>
                                                        <li>
                                                            <input id="style_wardrobe3" name="style_wardrobe[]" type="checkbox" value="Classic" <?php if (isset($style_wardrobe) && in_array('Classic', @$style_wardrobe)) { ?> checked <?php } ?>>
                                                            <label for="style_wardrobe3">Classic</label>
                                                        </li>
                                                        <li>
                                                            <input id="style_wardrobe4" name="style_wardrobe[]" type="checkbox" value="Edgy" <?php if (isset($style_wardrobe) && in_array('Edgy', @$style_wardrobe)) { ?> checked <?php } ?>>
                                                            <label for="style_wardrobe4">Edgy</label>
                                                        </li>
                                                        <li>
                                                            <input id="style_wardrobe5" name="style_wardrobe[]" type="checkbox" value="Glamorous" <?php if (isset($style_wardrobe) && in_array('Glamorous', @$style_wardrobe)) { ?> checked <?php } ?>>
                                                            <label for="style_wardrobe5">Glamorous</label>
                                                        </li>
                                                        <li>
                                                            <input id="style_wardrobe6" name="style_wardrobe[]" type="checkbox" value="Preppy" <?php if (isset($style_wardrobe) && in_array('Preppy', @$style_wardrobe)) { ?> checked <?php } ?>>
                                                            <label for="style_wardrobe6">Preppy</label>
                                                        </li>
                                                        <li>
                                                            <input id="style_wardrobe7" name="style_wardrobe[]" type="checkbox" value="Romantic" <?php if (isset($style_wardrobe) && in_array('Romantic', @$style_wardrobe)) { ?> checked <?php } ?>>
                                                            <label for="style_wardrobe7">Romantic</label>
                                                        </li>


                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>How would you characterize your accessory and jewelry style?  </h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>                                          
                                                    <li><label for="st1" class="input-control radio">
                                                            <input id="st1" name="style_accessories" value="classic" type="radio" <?php if (@$Womenstyle->style_accessories == 'classic') { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Mostly classic   
                                                        </label>
                                                    </li>
                                                    <li><label for="st2" class="input-control radio">
                                                            <input id="st2" name="style_accessories" value="statement" type="radio" <?php if (@$Womenstyle->style_accessories == 'statement') { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Mostly statement
                                                        </label></li>
                                                    <li><label for="st3" class="input-control radio">
                                                            <input id="st3" name="style_accessories" value="Either" type="radio" <?php if (@$Womenstyle->style_accessories == 'Either') { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Healthy mix of both
                                                        </label></li>                                           

                                                </ul>

                                            </div>

                                        </div>	
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What is your preferred tone of jewelry?</h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>                                          
                                                    <li><label for="jewelry_tone1" class="input-control radio">
                                                            <input id="jewelry_tone1" name="jewelry_tone" value="Gold" type="radio" <?php if (@$Womenstyle->jewelry_tone == 'Gold') { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Mostly gold tones  
                                                        </label>
                                                    </li>
                                                    <li><label for="jewelry_tone2" class="input-control radio">
                                                            <input id="jewelry_tone2" name="jewelry_tone" value="Silver" type="radio"  <?php if (@$Womenstyle->jewelry_tone == 'Silver') { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Mostly silver tones
                                                        </label></li>
                                                    <li><label for="jewelry_tone3" class="input-control radio">
                                                            <input id="jewelry_tone3" name="jewelry_tone" value="Either" type="radio"  <?php if (@$Womenstyle->jewelry_tone == 'Either') { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Healthy mix of both
                                                        </label></li>                                           

                                                </ul>

                                            </div>

                                        </div>	
                                    </div>
                                    <div class="form-box-data">
                                        <h3>Are your ears pierced? </h3>
                                        <div class="switch-field">
                                            <input id="piercings1" name="piercings" value="yes" checked="" type="radio"  <?php if (@$Womenstyle->piercings == 'yes') { ?> checked <?php } ?>>
                                            <label for="piercings1">Yes</label>
                                            <input id="piercings2" name="piercings" value="no" type="radio" <?php if (@$Womenstyle->piercings == 'no') { ?> checked <?php } ?>>
                                            <label for="piercings2">No</label>
                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 cloth-category">
                                                <h3>How often would you like to receive the following clothing categories in your Fix? (Optional) </h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <h4>Tops </h4>                                                    
                                                            <div class="switch-field">
                                                                <input id="afat1" name="apparel_affinity_avoid_tops" value="Often" checked="" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_tops == 'Often') { ?> checked <?php } ?>>
                                                                <label for="afat1">Often</label>
                                                                <input id="afat2" name="apparel_affinity_avoid_tops" value="Sometimes" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_tops == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="afat2">Sometimes</label>
                                                                <input id="afat3" name="apparel_affinity_avoid_tops" value="Never" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_tops == 'Never') { ?> checked <?php } ?>>
                                                                <label for="afat3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Blazers </h4>                                                  
                                                            <div class="switch-field">
                                                                <input id="aaab1" name="apparel_affinity_avoid_blazers" value="Often" checked="" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_blazers == 'Often') { ?> checked <?php } ?>>
                                                                <label for="aaab1">Often</label>
                                                                <input id="aaab2" name="apparel_affinity_avoid_blazers" value="Sometimes" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_blazers == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="aaab2">Sometimes</label>
                                                                <input id="aaab3" name="apparel_affinity_avoid_blazers" value="Never" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_blazers == 'Never') { ?> checked <?php } ?>>
                                                                <label for="aaab3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Jackets & Coats </h4>                                                    
                                                            <div class="switch-field">
                                                                <input id="aaajc1" name="apparel_affinity_avoid_jackets_coats" value="Often" checked="" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_jackets_coats == 'Often') { ?> checked <?php } ?>>
                                                                <label for="aaajc1">Often</label>
                                                                <input id="aaajc2" name="apparel_affinity_avoid_jackets_coats" value="Sometimes" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_jackets_coats == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="aaajc2">Sometimes</label>
                                                                <input id="aaajc3" name="apparel_affinity_avoid_jackets_coats" value="Never" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_jackets_coats == 'Never') { ?> checked <?php } ?>>
                                                                <label for="aaajc3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Shorts </h4>

                                                            <div class="switch-field">
                                                                <input id="aaas1" name="apparel_affinity_avoid_shorts" value="Often" checked="" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_shorts == 'Often') { ?> checked <?php } ?>>
                                                                <label for="aaas1">Often</label>
                                                                <input id="aaas2" name="apparel_affinity_avoid_shorts" value="Sometimes" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_shorts == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="aaas2">Sometimes</label>
                                                                <input id="aaas3" name="apparel_affinity_avoid_shorts" value="Never" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_shorts == 'Never') { ?> checked <?php } ?>>
                                                                <label for="aaas3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Dresses </h4>

                                                            <div class="switch-field">
                                                                <input id="switch_left6" name="apparel_affinity_avoid_dresses" value="Often"  type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_dresses == 'Often') { ?> checked <?php } ?>>
                                                                <label for="switch_left6">Often</label>
                                                                <input id="switch_middle6" name="apparel_affinity_avoid_dresses" value="Sometimes" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_dresses == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="switch_middle6">Sometimes</label>
                                                                <input id="switch_right6" name="apparel_affinity_avoid_dresses" value="Never" type="radio" <?php if (@$Womenstyle->apparel_affinity_avoid_dresses == 'Never') { ?> checked <?php } ?>>
                                                                <label for="switch_right6">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Skirts </h4>

                                                            <div class="switch-field">
                                                                <input id="switch_left7" name="apparel_type_affinity_avoid_skirts" value="Often"  type="radio" <?php if (@$Womenstyle->apparel_type_affinity_avoid_skirts == 'Often') { ?> checked <?php } ?>>
                                                                <label for="switch_left7">Often</label>
                                                                <input id="switch_middle7" name="apparel_type_affinity_avoid_skirts" value="Sometimes" type="radio" <?php if (@$Womenstyle->apparel_type_affinity_avoid_skirts == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="switch_middle7">Sometimes</label>
                                                                <input id="switch_right7" name="apparel_type_affinity_avoid_skirts" value="Never" type="radio" <?php if (@$Womenstyle->apparel_type_affinity_avoid_skirts == 'Never') { ?> checked <?php } ?>>
                                                                <label for="switch_right7">Never</label>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 accessories">
                                                <h3>How often would you like to receive the following accessories in your Fix? (Optional)  </h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <h4>Bags  </h4>                                                    
                                                            <div class="switch-field">
                                                                <input id="bag1" name="accessory_affinity_avoid_bags" value="Often"  type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_bags == 'Often') { ?> checked <?php } ?>>
                                                                <label for="bag1">Often</label>
                                                                <input id="bag2" name="accessory_affinity_avoid_bags" value="Sometimes" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_bags == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="bag2">Sometimes</label>
                                                                <input id="bag3" name="accessory_affinity_avoid_bags" value="Never" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_bags == 'Never') { ?> checked <?php } ?>>
                                                                <label for="bag3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Scarves  </h4>                                                  
                                                            <div class="switch-field">
                                                                <input id="scar1" name="accessory_affinity_avoid_scarves" value="Often"  type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_scarves == 'Often') { ?> checked <?php } ?>>
                                                                <label for="scar1">Often</label>
                                                                <input id="scar2" name="accessory_affinity_avoid_scarves" value="Sometimes" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_scarves == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="scar2">Sometimes</label>
                                                                <input id="scar3" name="accessory_affinity_avoid_scarves" value="Never" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_scarves == 'Never') { ?> checked <?php } ?>>
                                                                <label for="scar3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4> Earrings  </h4>                                                    
                                                            <div class="switch-field">
                                                                <input id="ring1" name="accessory_affinity_avoid_earrings" value="Often"  type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_earrings == 'Often') { ?> checked <?php } ?>>
                                                                <label for="ring1">Often</label>
                                                                <input id="ring2" name="accessory_affinity_avoid_earrings" value="Sometimes" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_earrings == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="ring2">Sometimes</label>
                                                                <input id="ring3" name="accessory_affinity_avoid_earrings" value="Never" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_earrings == 'Never') { ?> checked <?php } ?>>
                                                                <label for="ring3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Necklaces  </h4>

                                                            <div class="switch-field">
                                                                <input id="necklace1" name="accessory_affinity_avoid_necklaces" value="Often"  type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_necklaces == 'Often') { ?> checked <?php } ?>>
                                                                <label for="necklace1">Often</label>
                                                                <input id="necklace2" name="accessory_affinity_avoid_necklaces" value="Sometimes" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_necklaces == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="necklace2">Sometimes</label>
                                                                <input id="necklace3" name="accessory_affinity_avoid_necklaces" value="Never" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_necklaces == 'Never') { ?> checked <?php } ?>>
                                                                <label for="necklace3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Bracelets  </h4>

                                                            <div class="switch-field">
                                                                <input id="bracelets1" name="accessory_affinity_avoid_bracelets" value="Often"  type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_bracelets == 'Often') { ?> checked <?php } ?>>
                                                                <label for="bracelets1">Often</label>
                                                                <input id="bracelets2" name="accessory_affinity_avoid_bracelets" value="Sometimes" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_bracelets == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="bracelets2">Sometimes</label>
                                                                <input id="bracelets3" name="accessory_affinity_avoid_bracelets" value="Never" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_bracelets == 'Never') { ?> checked <?php } ?>>
                                                                <label for="bracelets3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Shoes  </h4>

                                                            <div class="switch-field">
                                                                <input id="shoes" name="accessory_affinity_avoid_shoes" value="Often"  type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_shoes == 'Often') { ?> checked <?php } ?>>
                                                                <label for="shoes">Often</label>
                                                                <input id="shoes1" name="accessory_affinity_avoid_shoes" value="Sometimes" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_shoes == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="shoes1">Sometimes</label>
                                                                <input id="shoes2" name="accessory_affinity_avoid_shoes" value="Never" type="radio" <?php if (@$Womenstyle->accessory_affinity_avoid_shoes == 'Never') { ?> checked <?php } ?>>
                                                                <label for="shoes2">Never</label>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 shoes">
                                                <h3>Would you wear the following types of shoes? (Optional)   </h3>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <h4>Heels</h4>                                                    
                                                            <div class="switch-field">
                                                                <input id="heels1" name="shoes_affinity_avoid_heels" value="Often"  type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_heels == 'Often') { ?> checked <?php } ?>>
                                                                <label for="heels1">Often</label>
                                                                <input id="heels2" name="shoes_affinity_avoid_heels" value="Sometimes" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_heels == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="heels2">Sometimes</label>
                                                                <input id="heels3" name="shoes_affinity_avoid_heels" value="Never" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_heels == 'Never') { ?> checked <?php } ?>>
                                                                <label for="heels3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Wedges</h4>                                                  
                                                            <div class="switch-field">
                                                                <input id="wedges" name="shoes_affinity_avoid_wedges" value="Often"  type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_wedges == 'Often') { ?> checked <?php } ?>>
                                                                <label for="wedges">Often</label>
                                                                <input id="wedges1" name="shoes_affinity_avoid_wedges" value="Sometimes" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_wedges == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="wedges1">Sometimes</label>
                                                                <input id="wedges2" name="shoes_affinity_avoid_wedges" value="Never" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_wedges == 'Never') { ?> checked <?php } ?>>
                                                                <label for="wedges2">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4> Booties   </h4>                                                    
                                                            <div class="switch-field">
                                                                <input id="booties" name="shoes_affinity_avoid_booties" value="Often" checked="" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_booties == 'Often') { ?> checked <?php } ?>>
                                                                <label for="booties">Often</label>
                                                                <input id="booties1" name="shoes_affinity_avoid_booties" value="Sometimes" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_booties == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="booties1">Sometimes</label>
                                                                <input id="booties2" name="shoes_affinity_avoid_booties" value="Never" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_booties == 'Never') { ?> checked <?php } ?>>
                                                                <label for="booties2">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Flats</h4>

                                                            <div class="switch-field">
                                                                <input id="flats" name="shoes_affinity_avoid_flats" value="Often"  type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_flats == 'Often') { ?> checked <?php } ?>>
                                                                <label for="flats">Often</label>
                                                                <input id="flats1" name="shoes_affinity_avoid_flats" value="Sometimes" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_flats == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="flats1">Sometimes</label>
                                                                <input id="flats2" name="shoes_affinity_avoid_flats" value="Never" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_flats == 'Never') { ?> checked <?php } ?>>
                                                                <label for="flats2">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Sandals</h4>

                                                            <div class="switch-field">
                                                                <input id="sandals" name="shoes_affinity_avoid_sandals" value="Often"  type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_sandals == 'Often') { ?> checked <?php } ?>>
                                                                <label for="sandals">Often</label>
                                                                <input id="sandals2" name="shoes_affinity_avoid_sandals" value="Sometimes" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_sandals == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="sandals2">Sometimes</label>
                                                                <input id="sandals3" name="shoes_affinity_avoid_sandals" value="Never" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_sandals == 'Never') { ?> checked <?php } ?>>
                                                                <label for="sandals3">Never</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h4>Fashion Sneakers</h4>

                                                            <div class="switch-field">
                                                                <input id="sneakers" name="shoes_affinity_avoid_fashion_sneakers" value="Often"  type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_fashion_sneakers == 'Often') { ?> checked <?php } ?>>
                                                                <label for="sneakers">Often</label>
                                                                <input id="sneakers1" name="shoes_affinity_avoid_fashion_sneakers" value="Sometimes" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_fashion_sneakers == 'Sometimes') { ?> checked <?php } ?>>
                                                                <label for="sneakers1">Sometimes</label>
                                                                <input id="sneakers2" name="shoes_affinity_avoid_fashion_sneakers" value="Never" type="radio" <?php if (@$Womenstyle->shoes_affinity_avoid_fashion_sneakers == 'Never') { ?> checked <?php } ?>>
                                                                <label for="sneakers2">Never</label>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data checkboxes">
                                        <div class="row">
                                            <div class="col-sm-8 col-lg-12 col-md-12">
                                                <h3>Is there anything you’d like to avoid in your shipment? </h3>                        		
                                                <div class="select-boxes">
                                                    <ul>
                                                        <h4>COLORS TO AVOID</h4>
                                                        <li>
                                                            <input style_wardrobe1 name="avoid_colors[]" id="avoid_colors" type="checkbox" value='Beige' <?php if (isset($avoid_colors) && in_array('Beige', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors">Beige</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors1" name="avoid_colors[]" type="checkbox" value='Black' <?php if (isset($avoid_colors) && in_array('Black', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors1">Black</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors2" name="avoid_colors[]" type="checkbox" value='Blue' <?php if (isset($avoid_colors) && in_array('Blue', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors2">Blue</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors3" name="avoid_colors[]" type="checkbox" value='Brown' <?php if (isset($avoid_colors) && in_array('Brown', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors3">Brown</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors4" name="avoid_colors[]" type="checkbox" value='Burgundy' <?php if (isset($avoid_colors) && in_array('Burgundy', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors4">Burgundy</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors5" name="avoid_colors[]" type="checkbox" value='Gold' <?php if (isset($avoid_colors) && in_array('Gold', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors5">Gold</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors6" name="avoid_colors[]" type="checkbox" value='Green' <?php if (isset($avoid_colors) && in_array('Green', @$avoid_colors)) { ?> checked <?php } ?>> 
                                                            <label for="avoid_colors6">Green</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors7" name="avoid_colors[]" type="checkbox" value='Grey' <?php if (isset($avoid_colors) && in_array('Grey', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors7">Grey</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors8" name="avoid_colors[]" type="checkbox" value='Orange' <?php if (isset($avoid_colors) && in_array('Orange', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors8">Navy</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors9" name="avoid_colors[]" type="checkbox" value='Orange' <?php if (isset($avoid_colors) && in_array('Orange', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors9">Orange</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors10" name="avoid_colors[]" type="checkbox" value='Pink' <?php if (isset($avoid_colors) && in_array('Pink', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors10">Pink</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors11" name="avoid_colors[]" type="checkbox" value='Purple' <?php if (isset($avoid_colors) && in_array('Purple', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors11">Purple</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors12" name="avoid_colors[]" type="checkbox" value='Red' <?php if (isset($avoid_colors) && in_array('Red', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors12">Red</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors13" name="avoid_colors[]" type="checkbox" value='Silver' <?php if (isset($avoid_colors) && in_array('Silver', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors13">Silver</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors14" name="avoid_colors[]" type="checkbox" value='Teal' <?php if (isset($avoid_colors) && in_array('Teal', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors14">Teal</label>
                                                        </li>
                                                        <li> 
                                                            <input id="avoid_colors15" name="avoid_colors[]" type="checkbox" value='White' <?php if (isset($avoid_colors) && in_array('White', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors15">White</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_colors16" name="avoid_colors[]" type="checkbox" value='Yellow' <?php if (isset($avoid_colors) && in_array('Yellow', @$avoid_colors)) { ?> checked <?php } ?>>
                                                            <label for="avoid_colors16">Yellow</label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8 col-lg-12 col-md-12">
                                                <h4>PRINTS TO AVOID </h4>                        		
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <input id="avoid_prints1" name="avoid_prints[]" type="checkbox" value='Animal print' <?php if (isset($avoid_prints) && in_array('Animal print', @$avoid_prints)) { ?> checked <?php } ?>>
                                                            <label for="avoid_prints1">Animal print</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_prints2" name="avoid_prints[]" type="checkbox" value='Floral' <?php if (isset($avoid_prints) && in_array('Floral', @$avoid_prints)) { ?> checked <?php } ?>>
                                                            <label for="avoid_prints2">Floral</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_prints3" name="avoid_prints[]" type="checkbox" value='Paisley' <?php if (isset($avoid_prints) && in_array('Paisley', @$avoid_prints)) { ?> checked <?php } ?>>
                                                            <label for="avoid_prints3">Paisley</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_prints4" name="avoid_prints[]" type="checkbox" value='Plaid' <?php if (isset($avoid_prints) && in_array('Plaid', @$avoid_prints)) { ?> checked <?php } ?>>
                                                            <label for="avoid_prints4">Plaid</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_prints5" name="avoid_prints[]" type="checkbox" value='Polka dots' <?php if (isset($avoid_prints) && in_array('Polka dots', @$avoid_prints)) { ?> checked <?php } ?>>
                                                            <label for="avoid_prints5">Polka dots</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_prints1a" name="avoid_prints[]" type="checkbox" value='Stripes' <?php if (isset($avoid_prints) && in_array('Stripes', @$avoid_prints)) { ?> checked <?php } ?>>
                                                            <label for="avoid_prints1a">Stripes</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_prints6" name="avoid_prints[]" type="checkbox" value='Novelty print' <?php if (isset($avoid_prints) && in_array('Novelty print', @$avoid_prints)) { ?> checked <?php } ?>>
                                                            <label for="avoid_prints6">Novelty print (ex: birds)</label>
                                                        </li> 
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8 col-lg-12 col-md-12">
                                                <h4>FABRICS TO AVOID </h4>                        		
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <input id="avoid_fabrics1" name="avoid_fabrics[]" type="checkbox" value='Faux Fur'  <?php if (isset($avoid_fabrics) && in_array('Faux Fur', @$avoid_fabrics)) { ?> checked <?php } ?>>
                                                            <label for="avoid_fabrics1">Faux Fur</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_fabrics2" name="avoid_fabrics[]" type="checkbox" value='Leather'  <?php if (isset($avoid_fabrics) && in_array('Leather', @$avoid_fabrics)) { ?> checked <?php } ?>>
                                                            <label for="avoid_fabrics2">Leather</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_fabrics3" name="avoid_fabrics[]" type="checkbox" value='Faux Leather'  <?php if (isset($avoid_fabrics) && in_array('Faux Leather', @$avoid_fabrics)) { ?> checked <?php } ?>>
                                                            <label for="avoid_fabrics3">Faux Leather</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_fabrics4" name="avoid_fabrics[]" type="checkbox" value='Polyester'  <?php if (isset($avoid_fabrics) && in_array('Polyester', @$avoid_fabrics)) { ?> checked <?php } ?>>
                                                            <label for="avoid_fabrics4">Polyester</label>
                                                        </li>
                                                        <li>
                                                            <input id="avoid_fabrics5" name="avoid_fabrics[]" type="checkbox" value='Wool' <?php if (isset($avoid_fabrics) && in_array('Wool', @$avoid_fabrics)) { ?> checked <?php } ?>>
                                                            <label for="avoid_fabrics5">Wool</label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                            <button type="submit" name="wemonstyle" value="wemonstyle">Next: Price <i class="fas fa-arrow-right"></i></button>
                                            <!--<a href="#">Save and return Home. »</a>-->
                                        </div>
                                    </div>

        <?php echo $this->Form->end(); ?>

                                </div>
                                <div role="tabpanel" class="tab-pane fade  <?php if ($sections == 'section4') { ?>  active in <?php } ?>" id="Section4">
        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'size_fit')) ?>
                                    <h3>How much would you ideally spend on items in each of the following categories? We’ll do our very best!
                                    </h3>
                                    <p>
                                    <div class="-group__questions -group__questions-spendiness_accessories_label -group__questions-spendiness_bottoms_label -group__questions-spendiness_dresses_label -group__questions-spendiness_jewelry_label -group__questions-spendiness_outerwear_label -group__questions-spendiness_tops_label -group__questions-spendiness_shoes_label">

                                        <div class="" data-question-id="spendiness_accessories_label" data-question-type="multi_picker">
                                            <div class="-multi-picker">
                                                <div class="-title -picker__label">ACCESSORIES</div>
                                                <div class="-multi-picker__pickers">

                                                    <div class="-picker" data-question-id="spendiness_accessories">
                                                        <select name="spendiness_accessories" id="spendiness_accessories" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                            <option  value="50,100" <?php if (@$Womenprice->spendiness_accessories == '50,100') { ?> selected <?php } ?>>$50 - $100</option>
                                                            <option value="100,150" <?php if (@$Womenprice->spendiness_accessories == '100,150') { ?> selected <?php } ?>>$100 - $150</option>
                                                            <option value="150,200" <?php if (@$Womenprice->spendiness_accessories == '150,200') { ?> selected <?php } ?>>$150 - $200</option>
                                                            <option value="200," <?php if (@$Womenprice->spendiness_accessories == '200,') { ?> selected <?php } ?>>$200+</option></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="__error-message"></div>

                                        </div>

                                        <div class="" data-question-id="spendiness_bottoms_label" data-question-type="multi_picker">
                                            <div class="-multi-picker">
                                                <div class="-title -picker__label">BOTTOMS</div>
                                                <div class="-multi-picker__pickers">

                                                    <div class="-picker" data-question-id="spendiness_bottoms">
                                                        <select name="spendiness_bottoms" id="spendiness_bottoms" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                            <option <?php if (@$Womenprice->spendiness_bottoms == '50,100') { ?> selected <?php } ?> value="50,100">$50 - $100</option>
                                                            <option value="100,150" <?php if (@$Womenprice->spendiness_bottoms == '100,150') { ?> selected <?php } ?>>$100 - $150</option>
                                                            <option value="150,200" <?php if (@$Womenprice->spendiness_bottoms == '150,200') { ?> selected <?php } ?>>$150 - $200</option>
                                                            <option value="200," <?php if (@$Womenprice->spendiness_bottoms == '200,') { ?> selected <?php } ?>>$200+</option></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="__error-message"></div>

                                        </div> 

                                        <div class="" data-question-id="spendiness_dresses_label" data-question-type="multi_picker">
                                            <div class="-multi-picker">
                                                <div class="-title -picker__label">DRESSES</div>
                                                <div class="-multi-picker__pickers">

                                                    <div class="-picker" data-question-id="spendiness_dresses">
                                                        <select name="spendiness_dresses" id="spendiness_dresses" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                            <option  value="50,100" <?php if (@$Womenprice->spendiness_dresses == '50,100') { ?> selected <?php } ?>>$50 - $100</option>
                                                            <option value="100,150" <?php if (@$Womenprice->spendiness_dresses == '100,150') { ?> selected <?php } ?>>$100 - $150</option>
                                                            <option value="150,200" <?php if (@$Womenprice->spendiness_dresses == '150,200') { ?> selected <?php } ?>>$150 - $200</option>
                                                            <option value="200," <?php if (@$Womenprice->spendiness_dresses == '200,') { ?> selected <?php } ?>>$200+</option></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="__error-message"></div>

                                        </div><!-- the following code is part of the updated style profile experiment https://stitchfix.atlassian.net/browse/NC-533 -->

                                        <div class="" data-question-id="spendiness_jewelry_label" data-question-type="multi_picker">
                                            <div class="-multi-picker">
                                                <div class="-title -picker__label">JEWELRY</div>
                                                <div class="-multi-picker__pickers">

                                                    <div class="-picker" data-question-id="spendiness_jewelry">
                                                        <select name="spendiness_jewelry" id="spendiness_jewelry" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                            <option value="50,100" <?php if (@$Womenprice->spendiness_jewelry == '50,100') { ?> selected <?php } ?>>$50 - $100</option>
                                                            <option  value="100,150" <?php if (@$Womenprice->spendiness_jewelry == '100,150') { ?> selected <?php } ?>>$100 - $150</option>
                                                            <option value="150,200" <?php if (@$Womenprice->spendiness_jewelry == '150,200') { ?> selected <?php } ?>>$150 - $200</option>
                                                            <option value="200," <?php if (@$Womenprice->spendiness_jewelry == '200,') { ?> selected <?php } ?>>$200+</option></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="__error-message"></div>

                                        </div><!-- the following code is part of the updated style profile experiment https://stitchfix.atlassian.net/browse/NC-533 -->

                                        <div class="" data-question-id="spendiness_outerwear_label" data-question-type="multi_picker">
                                            <div class="-multi-picker">
                                                <div class="-title -picker__label">OUTER LAYERS</div>
                                                <div class="-multi-picker__pickers">

                                                    <div class="-picker" data-question-id="spendiness_outerwear">
                                                        <select name="spendiness_outerwear" id="spendiness_outerwear" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                            <option value="50,100" <?php if (@$Womenprice->spendiness_outerwear == '50,100') { ?> selected <?php } ?>>$50 - $100</option>
                                                            <option value="100,150" <?php if (@$Womenprice->spendiness_outerwear == '100,150') { ?> selected <?php } ?>>$100 - $150</option>
                                                            <option  value="150,200" <?php if (@$Womenprice->spendiness_outerwear == '150,200') { ?> selected <?php } ?>>$150 - $200</option>
                                                            <option value="200," <?php if (@$Womenprice->spendiness_outerwear == '200,') { ?> selected <?php } ?>>$200+</option></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="__error-message"></div>

                                        </div>

                                        <div class="" data-question-id="spendiness_tops_label" data-question-type="multi_picker">
                                            <div class="-multi-picker">
                                                <div class="-title -picker__label">TOPS</div>
                                                <div class="-multi-picker__pickers">

                                                    <div class="-picker" data-question-id="spendiness_tops">
                                                        <select name="spendiness_tops" id="spendiness_tops" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                            <option  value="50,100" <?php if (@$Womenprice->spendiness_tops == '50,100') { ?> selected <?php } ?>>$50 - $100</option>
                                                            <option value="100,150" <?php if (@$Womenprice->spendiness_tops == '100,150') { ?> selected <?php } ?>>$100 - $150</option>
                                                            <option value="150,200" <?php if (@$Womenprice->spendiness_tops == '150,200') { ?> selected <?php } ?>>$150 - $200</option>
                                                            <option value="200," <?php if (@$Womenprice->spendiness_tops == '200,') { ?> selected <?php } ?>>$200+</option></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="__error-message"></div>

                                        </div>

                                        <div class="" data-question-id="spendiness_shoes_label" data-question-type="multi_picker">
                                            <div class="-multi-picker">
                                                <div class="-title -picker__label">SHOES</div>
                                                <div class="-multi-picker__pickers">

                                                    <div class="" data-question-id="spendiness_shoes">
                                                        <select name="spendiness_shoes" id="spendiness_shoes" class="-picker__select"><option value="">--</option><option value="0,50">The cheaper, the better</option>
                                                            <option value="50,100" <?php if (@$Womenprice->spendiness_shoes == '50,100') { ?> selected <?php } ?>>$50 - $100</option>
                                                            <option value="100,150" <?php if (@$Womenprice->spendiness_shoes == '100,150') { ?> selected <?php } ?>>$100 - $150</option>
                                                            <option  value="150,200" <?php if (@$Womenprice->spendiness_shoes == '150,200') { ?> selected <?php } ?>>$150 - $200</option>
                                                            <option value="200," <?php if (@$Womenprice->spendiness_shoes == '200,') { ?> selected <?php } ?>>$200+</option></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="__error-message"></div>

                                        </div>

                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                        <button type="submit" name="price" value="price">Next: More About you <i class="fas fa-arrow-right"></i></button>
                                        <a href="#">Save and return Home. »</a>
                                    </div>
        <?php echo $this->Form->end(); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade  <?php if ($sections == 'section5') { ?>  active in <?php } ?>" id="Section5">
        <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'size_fit')) ?>
                                    <div class='form-box-data'>
                                        <h3>When is your birthday?</h3>
                                        <div class="select-boxes">
                                            <p>mm-dd-yyyy</p>
                                            <div class='col-sm-3'>

                                                                                                                                                                                                                <!--<input type='text' class="form-control" value="<?php echo @$Womeninfo->user_input_birthdate; ?>" name="user_input_birthdate" id="user_input_birthdate"/>-->

                                                <div class='input-group date' id='datetimepicker1'>
                                                    <input type='text' class="form-control" value="<?php echo @$Womeninfo->user_input_birthdate; ?>" name="user_input_birthdate" id="user_input_birthdate"/>
                                                    <span class="input-group-addon">
                                                        <span ><img src="<?php echo HTTP_ROOT ?>assets/images/calendar-filled.png" height="20px" width="20px"></span>
                                                    </span>
                                                </div>



                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-box-data">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What’s your primary occupation?</h3>	
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12 occupation">
                                                <ul>
                                                    <li><label class="input-control radio" for="desired_casual1">
                                                            <input name="occupation_v2" value="1" id="desired_casual1" type="radio" <?php if (@$Womeninfo->occupation_v2 == 1) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Architecture / Engineering     
                                                        </label>
                                                    </li>
                                                    <li><label for="desired_casual2" class="input-control radio">
                                                            <input id="desired_casual2" name="occupation_v2" value="2" type="radio" <?php if (@$Womeninfo->occupation_v2 == 2) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Art / Design
                                                        </label></li>
                                                    <li><label for="desired_casual3" class="input-control radio">
                                                            <input id="desired_casual3" name="occupation_v2" value="3" type="radio" <?php if (@$Womeninfo->occupation_v2 == 3) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Building / Maintenance
                                                        </label></li>
                                                    <li><label for="desired_casual4" class="input-control radio">
                                                            <input id="desired_casual4" name="occupation_v2" value="4" type="radio" <?php if (@$Womeninfo->occupation_v2 == 4) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Business / Client Service
                                                        </label>
                                                    </li>
                                                    <li><label for="desired_casual5" class="input-control radio">
                                                            <input id="desired_casual5" name="occupation_v2" value="5" type="radio" <?php if (@$Womeninfo->occupation_v2 == 5) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Community / Social Service
                                                        </label></li>
                                                    <li><label for="desired_casual7" class="input-control radio">
                                                            <input id="desired_casual7" name="occupation_v2" value="6" type="radio" <?php if (@$Womeninfo->occupation_v2 == 6) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Computer / IT
                                                        </label></li>
                                                    <li><label for="desired_casual8" class="input-control radio">
                                                            <input id="desired_casual8" name="occupation_v2" value="7" type="radio" <?php if (@$Womeninfo->occupation_v2 == 7) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Education
                                                        </label>
                                                    </li>
                                                    <li><label for="desired_casual6" class="input-control radio">
                                                            <input id="desired_casual6" name="occupation_v2" value="8" type="radio" <?php if (@$Womeninfo->occupation_v2 == 8) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Entertainer / Performer
                                                        </label></li>
                                                    <li><label for="desired_casual9" class="input-control radio">
                                                            <input id="desired_casual9" name="occupation_v2" value="9" type="radio" <?php if (@$Womeninfo->occupation_v2 == 9) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Farming / Fishing / Forestry
                                                        </label></li>
                                                    <li><label for="desired_casual10" class="input-control radio">
                                                            <input id="desired_casual10" name="occupation_v2" value="10" type="radio" <?php if (@$Womeninfo->occupation_v2 == 10) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Financial Services
                                                        </label></li>
                                                    <li><label for="desired_casual11" class="input-control radio">
                                                            <input id="desired_casual11" name="occupation_v2" value="11" type="radio" <?php if (@$Womeninfo->occupation_v2 == 11) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Health Practitioner / Technician
                                                        </label>
                                                    </li>
                                                    <li><label for="desired_casual12" class="input-control radio">
                                                            <input id="desired_casual12" name="occupation_v2" value="12" type="radio" <?php if (@$Womeninfo->occupation_v2 == 12) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Hospitality / Food Service
                                                        </label></li>
                                                    <li><label for="desired_casual13" class="input-control radio">
                                                            <input id="desired_casual13" name="occupation_v2" value="13" type="radio" <?php if (@$Womeninfo->occupation_v2 == 13) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Management
                                                        </label></li>
                                                    <li><label for="desired_casual14" class="input-control radio">
                                                            <input id="desired_casual14" name="occupation_v2" value="14" type="radio" <?php if (@$Womeninfo->occupation_v2 == 14) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Media / Communications
                                                        </label>
                                                    </li>
                                                    <li><label for="desired_casual15" class="input-control radio">
                                                            <input id="desired_casual15" name="occupation_v2" value="15" type="radio" <?php if (@$Womeninfo->occupation_v2 == 15) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Military / Protective Service
                                                        </label></li>
                                                    <li><label for="desired_casual16" class="input-control radio">
                                                            <input id="desired_casual16" name="occupation_v2" value="16" type="radio" <?php if (@$Womeninfo->occupation_v2 == 16) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Legal
                                                        </label></li>
                                                    <li><label for="desired_casual17" class="input-control radio">
                                                            <input id="desired_casual17" name="occupation_v2" value="17" type="radio" <?php if (@$Womeninfo->occupation_v2 == 17) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Office / Administration
                                                        </label>
                                                    </li>
                                                    <li><label for="desired_casual18" class="input-control radio">
                                                            <input id="desired_casual18" name="occupation_v2" value="18" type="radio" <?php if (@$Womeninfo->occupation_v2 == 18) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Average
                                                        </label></li>
                                                    <li><label for="desired_casual19" class="input-control radio">
                                                            <input id="desired_casual19" name="occupation_v2" value="19" type="radio" <?php if (@$Womeninfo->occupation_v2 == 19) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Personal Care &amp; Service
                                                        </label></li>
                                                    <li><label for="desired_casual20" class="input-control radio">
                                                            <input id="desired_casual20" name="occupation_v2" value="20" type="radio" <?php if (@$Womeninfo->occupation_v2 == 20) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Production / Manufacturing
                                                        </label></li>
                                                    <li><label for="desired_casual21" class="input-control radio">
                                                            <input id="desired_casual21" name="occupation_v2" value="21" type="radio" <?php if (@$Womeninfo->occupation_v2 == 21) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Retail
                                                        </label>
                                                    </li>
                                                    <li><label for="desired_casual23" class="input-control radio">
                                                            <input id="desired_casual23" name="occupation_v2" value="22" type="radio" <?php if (@$Womeninfo->occupation_v2 == 22) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Sales
                                                        </label></li>
                                                    <li><label for="desired_casual24" class="input-control radio">
                                                            <input id="desired_casual24" name="occupation_v2" value="23" type="radio" <?php if (@$Womeninfo->occupation_v2 == 23) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Science
                                                        </label></li>
                                                    <li><label for="desired_casual25" class="input-control radio">
                                                            <input id="desired_casual25" name="occupation_v2" value="24" type="radio" <?php if (@$Womeninfo->occupation_v2 == 24) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Technology
                                                        </label>
                                                    </li>
                                                    <li><label for="desired_casual26" class="input-control radio">
                                                            <input id="desired_casual26" name="occupation_v2" value="25" type="radio" <?php if (@$Womeninfo->occupation_v2 == 25) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Transportation
                                                        </label></li>
                                                    <li><label for="desired_casual27" class="input-control radio">
                                                            <input id="desired_casual27" name="occupation_v2" value="26" type="radio" <?php if (@$Womeninfo->occupation_v2 == 26) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Self-Employed
                                                        </label></li>
                                                    <li><label for="desired_casual28" class="input-control radio">
                                                            <input id="desired_casual28" name="occupation_v2" value="27" type="radio" <?php if (@$Womeninfo->occupation_v2 == 27) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Stay-At-Home Parent
                                                        </label>
                                                    </li>
                                                    <li><label for="desired_casual29" class="input-control radio">
                                                            <input id="desired_casual29" name="occupation_v2" value="28" type="radio" <?php if (@$Womeninfo->occupation_v2 == 28) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Student
                                                        </label></li>
                                                    <li><label for="desired_casual30" class="input-control radio">
                                                            <input id="desired_casual30" name="occupation_v2" value="29" type="radio" <?php if (@$Womeninfo->occupation_v2 == 29) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Retired
                                                        </label></li>
                                                    <li><label for="desired_casual38" class="input-control radio">
                                                            <input id="desired_casual38" name="occupation_v2" value="30" type="radio" <?php if (@$Womeninfo->occupation_v2 == 30) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Not Employed
                                                        </label></li>
                                                    <li><label for="desired_casual49" class="input-control radio">
                                                            <input id="desired_casual49" name="occupation_v2" value="31" type="radio" <?php if (@$Womeninfo->occupation_v2 == 31) { ?> checked <?php } ?>>
                                                            <span class="input-control__indicator"></span>Other
                                                        </label></li>
                                                </ul>
                                            </div>

                                        </div>	
                                    </div>
                                    <div class="form-box-data">

                                        <div class="row">                                
                                            <div class="col-sm-6 col-lg-6 col-md-6">
                                                <h3>Are you a parent?(Optional) </h3>

                                                <div class="switch-field">
                                                    <input id="Yes" name="parent" value="1"  type="radio" <?php if (@$Womeninfo->parent == 1) { ?> checked <?php } ?>>
                                                    <label for="Yes">Yes</label>
                                                    <input id="No" name="parent" value="0" type="radio" <?php if (@$Womeninfo->parent == 0) { ?> checked <?php } ?>>
                                                    <label for="No">No</label>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-box-data checkboxes">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-12 col-md-12">
                                                <h3>What are your primary objectives of signing up for Stitch Fix? </h3>
                                                <h6>Select all that apply.</h6>
                                                <div class="select-boxes">
                                                    <ul>
                                                        <li>
                                                            <input id="try_new_items1" name="primary_objectives[]" type="checkbox" value="1" <?php if (isset($primaryinfo) && in_array('1', @$primaryinfo)) { ?> checked <?php } ?>>
                                                            <label for="try_new_items1">To try items I wouldn't select for myself</label>
                                                        </li>
                                                        <li>
                                                            <input id="try_new_items2" name="primary_objectives[]" type="checkbox" value="2" <?php if (isset($primaryinfo) && in_array('2', @$primaryinfo)) { ?> checked <?php } ?>>
                                                            <label for="try_new_items2">To give myself a gift / surprise</label>
                                                        </li>
                                                        <li>
                                                            <input id="try_new_items3" name="primary_objectives[]" type="checkbox" value="3" <?php if (isset($primaryinfo) && in_array('3', @$primaryinfo)) { ?> checked <?php } ?>>
                                                            <label for="try_new_items3">To discover new trends / styles</label>
                                                        </li>
                                                        <li>
                                                            <input id="try_new_items4" name="primary_objectives[]" type="checkbox" value="4" <?php if (isset($primaryinfo) && in_array('4', @$primaryinfo)) { ?> checked <?php } ?>>
                                                            <label for="try_new_items4">To save time and reduce my need to shop</label>
                                                        </li>
                                                        <li>
                                                            <input id="try_new_items5" name="primary_objectives[]" type="checkbox" value="5" <?php if (isset($primaryinfo) && in_array('5', @$primaryinfo)) { ?> checked <?php } ?>>
                                                            <label for="try_new_items5">To get expert advice</label>
                                                        </li>
                                                        <li>
                                                            <input id="try_new_items1a" name="primary_objectives[]" type="checkbox" value="6" <?php if (isset($primaryinfo) && in_array('6', @$primaryinfo)) { ?> checked <?php } ?>>
                                                            <label for="try_new_items1a">To access exclusive brands</label>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-box-data">

                                        <h3>Final thoughts? Anything else we should know before we style for you? We're all ears!</h3>                               

                                        <h6>Example: My workplace is pretty casual. I can wear jeans but I would like to dress it up with cute tops! Also, please stick to warm tones - I look best in burgundy, plum and mustard. I prefer v-neck blouses and subtle prints.</h6>

                                        <textarea name="final_thoughts" id="final_thoughts" class="form-control" id="exampleTextarea" rows="3" style="padding: 5px 12px 6px;
                                                  width: 100%;
                                                  border-color: #C0BDBA;
                                                  font-size: 18px;
                                                  line-height: 1.4;
                                                  min-height: 150px;
                                                  border-radius: 0px;
                                                  -webkit-appearance: none;"><?php echo @$Womeninfo->final_thoughts; ?></textarea>






                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6 button-box">
                                        <button type="submit" name="info" value="info">SAVE ALL CHANGES <i class="fas fa-arrow-right"></i></button>
                                        <a href="#">Save and return Home. »</a>
                                    </div>
        <?php echo $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php } ?>








<?php } ?> 
<div id="loaderPyament" style="display: none; position: fixed; height: 100%; width: 100%; z-index: 11111111; padding-top: 20%; background: rgba(255, 255, 255, 0.7); top: 0; text-align: center;">
    <img src="<?php echo HTTP_ROOT . 'img/' ?>widget_loader.gif"/>
</div>
<script >
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
    });
    $(".progress-bar").each(function () {
        each_bar_width = $(this).attr('aria-valuenow');
        $(this).width(each_bar_width + '%');
    });
    function getPushUrl(name) {
        var url = '<?php echo HTTP_ROOT ?>welcome/style/';
        var stateObj = {foo: "bar"};
        history.pushState(stateObj, 'xx', url + name);
    }
</script>
<script>
    $(document).ready(function () {
        $('.payment-btn1').prop('disabled', true);
        validation();
    });
    function validation()
    {
        var name = $("#full_name").val();
        var address = $("#address").val();
        var address_line_2 = $("#address_line_2").val();
        var city = $("#city").val();
        var zipcode = $("#zipcode").val();

        if (name == "") {
            $("#full_name").css("border", "#FF0000 1px solid");
            //   $(".errorn").html("Please Enter fullname");
        } else {
            $("#full_name").css("border", "#008000 1px solid");
            $(".errorn").html("");
        }
        if (address == "") {
            $("#address").css("border", "#FF0000 1px solid");
            // $(".errorad").html("Please Enter address");
        } else {
            $("#address").css("border", "#008000 1px solid");
            $(".errorad").html("");
        }
        if (address_line_2 == "") {
            $("#address_line_2").css("border", "#FF0000 1px solid");
            // $(".errorad").html("Please Enter address");
        } else {
            $("#address_line_2").css("border", "#008000 1px solid");
            $(".errorad").html("");
        }

        if (city == "") {
            $("#city").css("border", "#FF0000 1px solid");
            //  $(".errorc").html("Please Enter city name");
        } else {
            $("#city").css("border", "#008000 1px solid");
            $(".errorc").html("");

        }
        if (zipcode == "") {
            $("#zipcode").css("border", "#FF0000 1px solid");
            //   $(".errorm").html("Please Enter zipcode");
        } else {
            $("#zipcode").css("border", "#008000 1px solid");
            $(".errorm").html("");


        }

        if (name && address && city && zipcode) {

            //  $("#payment").attr("disabled", false);
            $('.payment-btn1').prop('disabled', false);

        } else {

            $('.payment-btn1').prop('disabled', true);
        }
    }
    //    $(document).ready(function () {
    //        $('.payment-btn1').prop('disabled', true);
    //        $('#full_name').keyup(function () {
    //            $('.payment-btn1').prop('disabled', this.value == "" ? true : false);
    //        })
    //        $('#address_line_2').keyup(function () {
    //            $('.payment-btn1').prop('disabled', this.value == "" ? true : false);
    //        })
    //        $('#address').keyup(function () {
    //            $('.payment-btn1').prop('disabled', this.value == "" ? true : false);
    //        })
    //        $('#zipcode').keyup(function () {
    //            $('.payment-btn1').prop('disabled', this.value == "" ? true : false);
    //        })
    //        $('#city').keyup(function () {
    //            $('.payment-btn1').prop('disabled', this.value == "" ? true : false);
    //        })
    //    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'MM-DD-YYYY'
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datetimepicker({
            format: 'MM-DD-YYYY'
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker4').datetimepicker({
            format: 'MM-DD-YYYY'
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker5').datetimepicker({
            format: 'MM-DD-YYYY'
        });
    });
</script>

