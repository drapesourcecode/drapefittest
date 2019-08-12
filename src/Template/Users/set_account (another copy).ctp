<style>
    .dialog-ovelay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.50);
        z-index: 999999
    }
    .dialog-ovelay .dialog {
        width: 400px;
        margin: 100px auto 0;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0,0,0,.2);
        border-radius: 3px;
        overflow: hidden
    }
    .dialog-ovelay .dialog header {
        padding: 10px 8px;
        background-color: #f6f7f9;
        border-bottom: 1px solid #e5e5e5
    }
    .dialog-ovelay .dialog header h3 {
        font-size: 14px;
        margin: 0;
        color: #555;
        display: inline-block
    }
    .dialog-ovelay .dialog header .fa-close {
        float: right;
        color: #c4c5c7;
        cursor: pointer;
        transition: all .5s ease;
        padding: 0 2px;
        border-radius: 1px    
    }
    .dialog-ovelay .dialog header .fa-close:hover {
        color: #b9b9b9
    }
    .dialog-ovelay .dialog header .fa-close:active {
        box-shadow: 0 0 5px #673AB7;
        color: #a2a2a2
    }
    .dialog-ovelay .dialog .dialog-msg {
        padding: 12px 10px
    }
    .dialog-ovelay .dialog .dialog-msg p{
        margin: 0;
        font-size: 15px;
        color: #333
    }
    .dialog-ovelay .dialog footer {
        border-top: 1px solid #e5e5e5;
        padding: 8px 10px
    }
    .dialog-ovelay .dialog footer .controls {
        direction: rtl;

    }
    .dialog-ovelay .dialog footer .controls .button {
        padding: 6px 25px;
        border-radius: 3px;
    }
    .button {
        cursor: pointer
    }

    .button-danger,
    .button-default{
        background-color: #232f3e;
        border: 1px solid #232f3e;
        color: #ff6c00;
        font-size: 13px;
        font-family: "Amazon Ember", Arial, sans-serif;
        font-weight: bold;
    }
    .button-danger:hover,
    .button-default:hover{
        background-color: #ff6c00;
        border: 1px solid #ff6c00;
        color: #232f3e;
    }
    .link {
        padding: 5px 10px;
        cursor: pointer
    }

</style>

<style>
    .panel-heading{ position: relative;}
    .panel-heading input[type="radio"]{
        position: absolute;top: 14px;left: 10px;
    }
</style>

<script>
    var modal = document.getElementById('id02');
    window.onclick = function (event)
    {
        if (event.target == modal)
        {
            modal.style.display = "none";
        }
    }
</script>
<script>
    $("#last-para2").bind("click", function () {
        $("#button1").trigger("click");
    });
</script>
<?php if ($this->request->session()->read('PROFILE') == 'KIDS') { ?>
    <?php echo $this->element('frontend/profile_menu_kid') ?>
<?php } else if ($this->request->session()->read('PROFILE') == 'MEN') { ?>
    <?php echo $this->element('frontend/profile_menu_men') ?>
<?php } else if ($this->request->session()->read('PROFILE') == 'WOMEN') { ?>
    <?php echo $this->element('frontend/profile_menu_women') ?>
<?php } ?>
<link rel="stylesheet" href="<?= HTTP_ROOT; ?>payment/css/style.css">

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

        $('#paymentForm input[type=text]').on('keyup', function () {
            cardFormValidate();
        });


    });
</script>
<section class="setting-box">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12 settings-profile">
                <ul class="nav nav-tabs faq-cat-tabs">
                    <li class="active"><a href="#faq-cat-1" data-toggle="tab"><i class="fa fa-user-circle-o"></i> <?php echo $this->request->session()->read('Auth.User.name'); ?></a></li>
                    <?php
                    $count = 2;
                    foreach (@$kidDetails as $kid) {
                        ?>
                        <li><a href="#faq-cat-<?php echo $count; ?>" data-toggle="tab"><i class="fa fa-user-circle-o"></i> <?php echo @$kid->kids_first_name; ?></a></li>
                        <?php
                        $count++;
                    }
                    ?>

                </ul>
            </div>
        </div>
        <div class="tab-content section1" style="border: none;padding: 0;">          
            <div class="tab-pane fade in active" id="faq-cat-1">
                <div class="row">
                    <div class="col-md-12">
                        <h3><?php echo $this->request->session()->read('Auth.User.name'); ?> Setting</h3>
                    </div>
                    <div class="col-md-12">
                        <span id="msg"></span>
                    </div>
                </div>            
                <div class="row">
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="setting-left">      				   
                            <ul class="nav nav-tabs nav-stacked text-center" role="tablist" style="margin-top: 0;margin-bottom: 0; ">
                                <li id="li-one" role="presentation"><a class="cli" href="#one" aria-controls="home" role="tab" data-toggle="tab">Login details »</a></li>
                                <li id="li-two" role="presentation"><a class="cli" href="#two" aria-controls="profile" role="tab" data-toggle="tab">Your Address »</a></li>
                                <li role="presentation"><a class="cli" href="#three" aria-controls="messages" role="tab" data-toggle="tab">Payment details »</a></li>
                                <li role="presentation"><a class="cli" href="#four" aria-controls="home" role="tab" data-toggle="tab">Manage FIT settings»</a></li>
                                <li role="presentation"><a class="cli" href="#five" aria-controls="profile" role="tab" data-toggle="tab">Account Credit »</a></li>
                                <li role="presentation"><a class="cli" href="#six" aria-controls="messages" role="tab" data-toggle="tab">Email preferences »</a></li>
                                <li role="presentation"><a class="cli" href="#seven" aria-controls="messages" role="tab" data-toggle="tab">Manage Facebook Settings »</a></li>
                                <li role="presentation">
                                    <a class="cli" href="#eight" aria-controls="messages" role="tab" data-toggle="tab">Manage Contact Settings »
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-9 col-lg-9 col-md-9">
                        <div class="tab-content">
                            <ul id="customers">
                                <li>
                                    <strong>LOGIN DETAILS</strong>
                                    <span>»</span>
                                    <span><?php echo $this->request->session()->read('Auth.User.email'); ?></span>
                                </li>
                                <li>
                                    <strong>YOUR ADDRESS</strong>
                                    <span>»</span>
                                    <span><?php echo $ship_address->full_name?> <?php echo $ship_address->address ?> <?php echo $ship_address->city ?> <?php echo $ship_address->zipcode ?> <?php echo $ship_address->state ?> <?php echo $ship_address->country ?></span>
                                </li>
                                <li>
                                    <strong>PAYMENT DETAILS</strong>
                                    <span>»</span>
                                    <span>Manage your address book settings.</span>
                                </li>
                                <li>
                                    <strong>MANAGE FIT SETTING</strong>
                                    <span>»</span>
                                    <span>Sign into Stitch Fix with Facebook—no password required.</span>
                                </li>
                                <li>
                                    <strong>ACCOUNT CREDIT</strong>
                                    <span>»</span>
                                    <span>$0.00</span>
                                </li>
                                <li>
                                    <strong>EMAIL PREFERENCE</strong>
                                    <span>»</span>
                                    <span>You are currently receiving Fixes on demand.</span>
                                </li>
                                <li>
                                    <strong>MANAGE FACEBOOK SETTING</strong>
                                    <span>»</span>
                                    <span>Currently receiving exclusive offers, news, styling tips and more.</span>
                                </li>
                                <li>
                                    <strong>MANAGE CONTACT SETTING</strong>
                                    <span>»</span>
                                    <span>
                                        <b></b>
                                        <br>
                                        <b></b>
                                    </span>
                                </li>                  
                            </ul>
                            <div role="tabpanel" class="tab-pane fade" id="one">
                                <h5>Login details </h5>
                                <span id="loginDetails">
                               
                                   </span>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                    <button class="btn-boxes" onclcik="changeLoginDetails()" type="button">Edit</button>
                                    
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="two">
                                <h5>Your Address</h5>
                                <div  class="Address-details2" data-toggle="collapse" href="#add-address">
                                    <i class="fa fa-plus"></i>
                                    <p>Add Address</p>
                                </div>
                                <div id="address-line">  </div>

                                <div class="collapse setting-add-new-address" id="add-address">

                                    <?= $this->Form->create('shipaddress', ['type' => 'post', 'class' => "check-out-address-form", "role" => "form", "data-toggle" => "validator", 'id' => 'shipaddress']); ?>
                                    <h3>Add a new address</h3>
                                    <ul>
                                        <li>
                                            <label>Full name : </label>
                                            <input type="hidden" name="id" id="sid">
                                            <input type="text" name="full_name" id="full_name" maxlength="20">
                                        </li>
                                        <li>
                                            <label>Address line 1 : </label>
                                            <input type="text" name="address" id="address" maxlength="60">
                                        </li>
                                        <li>
                                            <label>Address line 2 : </label>
                                            <input type="text" name="address_line_2" id="address_line_2" maxlength="60">
                                        </li>
                                        <li>
                                            <label>City : </label>
                                            <input type="text" name="city" id="city" maxlength="20">
                                        </li>
                                        <li>
                                            <label>State/Province/Region : </label>
                                            <input type="text" name="state" id="state" maxlength="20">
                                        </li>
                                        <li>
                                            <label>ZIP : </label>
                                            <input type="text" name="zipcode" id="zipcode" maxlength="10" >
                                        </li>
                                        <li>
                                            <label>Country : </label>
                                            <select id="country" name="country" >
                                                <option value="Usa">Usa</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label>Phone number:</label>
                                            <input type="text" name="phone" id="phone" maxlength="15">
                                        </li>
                                    </ul>
                                    <button type="submit" value="addAddress" class="btn deliver-address">Save Address</button>
                                    <?= $this->Form->end(); ?>
                                </div>

                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="three">
                                <div class=" faq-cat-content">
                                    <div class="card-details-heading">
                                        <ul>
                                            <li><h4>Your saved debit and credit cards</h4></li>
                                            <li><p>Name </p></li>
                                            <li><p>Expires date</p></li>
                                        </ul> 
                                    </div>

                                    <div class="tab-pane active in fade" id="faq-cat-1">
                                        <div class="panel-group" id="accordion-cat-1">



                                        </div>
                                    </div>                    
                                </div>
                                <div class="card-payment-option">
                                    <details  onclick="newcard()">
                                        <summary>Add a card</summary>
                                    </details>
                                    <div id="new-card">

                                        <?php echo $this->Form->create("User", array('class' => 'new-card-form', 'data-toggle' => "validator", 'id' => 'paymentForm')) ?>
                                        <p>Enter your card information</p>
                                        <ul>
                                            <li>
                                                <label>Card number</label>
                                                <input type="text" name="card_number" maxlength="16" id="card_number">
                                            </li>
                                            <li>
                                                <label>Name on card</label>
                                                <input type="text" name="card_name" id="card_name">
                                            </li>

                                            <li>
                                                <label>Expiry date</label>
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
                                            <li>
                                                <label>CVV</label>
                                                <input type="text" name="cvv" id="cvv">
                                            </li>

                                            <li>
                                                <input type="hidden"  id="card_type_input" name="card_type">
                                                <input type="button" name="card_payment" id="card_payment" class="btn" value="Add your card">
                                            </li>
                                        </ul>

                                        <?php echo $this->Form->end(); ?>
                                    </div>

                                </div>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                </div>
                            </div> 


                            <div role="tabpanel" class="tab-pane fade" id="four">
                                <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'sechdule_fix')) ?>
                                <h5>Manage FIT settings</h5>
                                <h6>How often would you like to receive Fixes?</h6>
                                <div class="checkbox-sitting">
                                    <input id="try_new_items_with_scheduled_fixes12" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox" <?php if (@$LetsPlanYourFirstFixData->try_new_items_with_scheduled_fixes == 1) { ?> checked <?php } ?>>
                                    <label for="try_new_items_with_scheduled_fixes12">Try new items with scheduled Fixes.</label>
                                </div>
                                <ul>
                                    <li>
                                        <input class="radio-box" value="1" name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixes1" type="radio" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 1) { ?> checked <?php } ?>>
                                        <label for="how_often_would_you_lik_fixes1">
                                            <h5>Running Refresh</h5>
                                            <p>Get a rotating selection of new items with a Fix every 2-3 weeks.</p>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="radio-box" value="2" id="how_often_would_you_lik_fixes2"<?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 2) { ?> checked <?php } elseif (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 0) { ?> checked <?php } ?> name="how_often_would_you_lik_fixes" type="radio" >
                                        <label for="how_often_would_you_lik_fixes2">
                                            <h5>Monthly Pick-Me-Up</h5>
                                            <p>Busy schedule? We’ll do the work &amp; send a Fix every month.</p>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="radio-box" value="3" id="how_often_would_you_lik_fixes3" type="radio" name="how_often_would_you_lik_fixes" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?>>
                                        <label for="how_often_would_you_lik_fixes3">
                                            <h5>Occasional Update</h5>
                                            <p>Build upon a solid base with a Fix every 2 months.</p>
                                        </label>
                                    </li>
                                    <li>
                                        <input class="radio-box" value="4" id="how_often_would_you_lik_fixes4" type="radio" name="how_often_would_you_lik_fixes" <?php if (@$LetsPlanYourFirstFixData->how_often_would_you_lik_fixes == 4) { ?> checked <?php } ?> >
                                        <label for="how_often_would_you_lik_fixes4">
                                            <h5>Quarterly Top-Off</h5>
                                            <p>Get a fresh supply of goods with a Fix every 3 months.</p>
                                        </label>
                                    </li>
                                </ul>
                                <p>We'll send you shipments at the frequency you choose until you change it or cancel, which you may do anytime via your online account. Before each Fix is styled, you'll be charged a $20 styling fee, which will be credited to any items you choose to buy.</p>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                    <button class="btn-boxes" id="sechdule_fix_btn" type="button">Save</button>
                                </div>	
                                <?php echo $this->Form->end(); ?>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="five">
                                <h5>ACCOUNT CREDIT <span>credit balance :$0.00</span></h5>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                <div class="acc">
                                    <label>Redeem your promo code.</label>
                                    <form method="post" name="credit_info" id="credit_info">
                                        <input type="text" name="promocode" id="promocode">
                                        <input type="hidden" name="user_id" id="user_id" value="264">
                                        <button class="save" type="submit" name="credit_info" value="credit_info" id="credit_info">SAVE PAYMENT INFO</button>
                                    </form>
                                    <label class="acclab"><a href="#">or,Redeem a gift code</a></label>
                                </div>
                                <div class="credit-right">
                                    <h2>You'll get $25,<br> they'll get $25.</h2>
                                    <form>
                                        <p>who are you inviting ?</p>
                                        <input type="text">
                                        <p>choose a way to share</p>
                                        <button class="save">SAVE PAYMENT INFO</button>
                                    </form>
                                    <ul>
                                        <li>Or share via :</li>
                                        <li><a href="https://mail.google.com"><i class="fa fa-envelope"></i></a></li>
                                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.messenger.com/"><i class="fab fa-facebook-messenger"></i></a></li>
                                    </ul>
                                </div>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                </div>	
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="six">
                                <h5>EMAIL PREFERENCES</h5>
                                <h6>Your email address on file is : <?php echo $this->request->session()->read('Auth.User.email'); ?></h6>
                                <h6>I'd like to recive</h6>
                                <div class="email-label">
                                    <label for="exclusive_offers" class="input-control radio">
                                        <input type="radio" id="exclusive_offers" name="email_preferences" value="1">
                                        <span class="input-control__indicator"></span>Exclusive offers,news,styling,tips and more !
                                    </label>
                                    <label for="exclusive_offers2" class="input-control radio">
                                        <input type="radio" id="exclusive_offers2" name="email_preferences" value="0" checked="">
                                        <span class="input-control__indicator"></span>No emails, please
                                    </label>
                                </div>
                                <div class="tab-button">
                                    <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                    <button class="btn-boxes" type="button">Save</button>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="seven">
                                <h5>FACEBOOK SETTING</h5>
                                <h6>Sign in with Facebook</h6>
                                <p>Sign in with Facebook Connecting your Facebook account allows you to sign into DrapeFit without needing a new password.</p>
                                <a href="#" class="loginBtn loginBtn--facebook">CONNECT FACEBOOK</a>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="eight">
                                dfhkljshfakjsahf
                            </div>
                        </div>
                    </div>
                </div>
            </div>







            <?php
            $countkid = 2;
            foreach (@$kidDetails as $kid) {
                ?>

                <div class="tab-pane fade" id="faq-cat-<?php echo $countkid; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <h3><?php echo $kid->kids_first_name; ?>'s Setting</h3>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-3 col-lg-3 col-md-3">
                            <div class="setting-left">                 
                                <ul class="nav nav-tabs nav-stacked text-center" role="tablist">
                                    <li role="presentation" class="active"><a class="cli" href="#k<?php echo $kid->kids_first_name; ?><?php echo $countkid; ?>" aria-controls="home" role="tab" data-toggle="tab">Manage FIT settings»</a></li>                      
                                    <li role="presentation"><a class="cli" href="#b<?php echo $kid->kids_first_name; ?><?php echo $countkid; ?>" aria-controls="messages" role="tab" data-toggle="tab">Email preferences »</a></li>                      
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-9 col-lg-9 col-md-9">
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane fade active in satya" id="k<?php echo $kid->kids_first_name; ?><?php echo $countkid; ?>">

                                    <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'sechdule_fix_kid' . @$kid->id)) ?>
                                    <input type="hidden" name="kid_id" value="<?php echo $kid->id; ?>"/>
                                    <input type="hidden" name="id" value="<?php echo $kid->lets_plan_your_first_fix->id; ?>"/>
                                    <h5>Manage FIT settingsxxxxxx</h5>
                                    <h6>How often would you like to receive Fixesssss?</h6>
                                    <div class="checkbox-sitting">
                                        <input id="try_new_items_with_scheduled_fixesk1<?php echo $countkid; ?>" value="1" name="try_new_items_with_scheduled_fixes" type="checkbox"  <?php if (@$kid->lets_plan_your_first_fix->try_new_items_with_scheduled_fixes == 1) { ?> checked <?php } ?>>
                                        <label for="try_new_items_with_scheduled_fixesk1<?php echo $countkid; ?>">Try new items with scheduled Fixes.</label>
                                    </div>
                                    <ul>
                                        <li>
                                            <input class="radio-box" value="1" name="how_often_would_you_lik_fixes" id="how_often_would_you_lik_fixesk1<?php echo $countkid; ?>" type="radio" <?php if (@$kid->lets_plan_your_first_fix->how_often_would_you_lik_fixes == 1) { ?> checked <?php } ?>>
                                            <label for="how_often_would_you_lik_fixesk1<?php echo $countkid; ?>">
                                                <h5>Running Refresh</h5>
                                                <p>Get a rotating selection of new items with a Fix every 2-3 weeks.</p>
                                            </label>
                                        </li>
                                        <li>
                                            <input class="radio-box" value="2" id="how_often_would_you_lik_fixesk2<?php echo $countkid; ?>" checked="" name="how_often_would_you_lik_fixes" type="radio" <?php if (@$kid->lets_plan_your_first_fix->how_often_would_you_lik_fixes == 2) { ?> checked <?php } elseif (@$kid->lets_plan_your_first_fix->try_new_items_with_scheduled_fixes == 0) { ?> checked <?php } ?>>
                                            <label for="how_often_would_you_lik_fixesk2<?php echo $countkid; ?>">
                                                <h5>Monthly Pick-Me-Up</h5>
                                                <p>Busy schedule? We’ll do the work &amp; send a Fix every month.</p>
                                            </label>
                                        </li>
                                        <li>
                                            <input class="radio-box" value="3" id="how_often_would_you_lik_fixesk3<?php echo $countkid; ?>" type="radio" name="how_often_would_you_lik_fixes" <?php if (@$kid->lets_plan_your_first_fix->how_often_would_you_lik_fixes == 3) { ?> checked <?php } ?> >
                                            <label for="how_often_would_you_lik_fixesk3<?php echo $countkid; ?>">
                                                <h5>Occasional Update</h5>
                                                <p>Build upon a solid base with a Fix every 2 months.</p>
                                            </label>
                                        </li>
                                        <li>
                                            <input class="radio-box" value="4" id="how_often_would_you_lik_fixesk4<?php echo $countkid; ?>" type="radio" name="how_often_would_you_lik_fixes" <?php if (@$kid->lets_plan_your_first_fix->how_often_would_you_lik_fixes == 4) { ?> checked <?php } ?>>
                                            <label for="how_often_would_you_lik_fixesk4<?php echo $countkid; ?>">
                                                <h5>Quarterly Top-Off</h5>
                                                <p>Get a fresh supply of goods with a Fix every 3 months.</p>
                                            </label>
                                        </li>
                                    </ul>
                                    <p>We'll send you shipments at the frequency you choose until you change it or cancel, which you may do anytime via your online account. Before each Fix is styled, you'll be charged a $20 styling fee, which will be credited to any items you choose to buy.</p>
                                    <div class="tab-button">
                                        <button class="btn-boxes" type="button" onClick="location.href = location.href">Cancel</button>
                                        <button data-id ='<?php echo @$kid->id; ?>' class="btn-boxes sechdule_fix_btn_kid"  type="button">Save</button>
                                    </div> 
                                    <?php echo $this->Form->end(); ?>
                                </div>


                                <div role="tabpanel" class="tab-pane fade" id="b<?php echo $kid->kids_first_name; ?><?php echo $countkid; ?>">
                                    <?php echo $this->Form->create("User", array('data-toggle' => "validator", 'id' => 'email_fix_kid' . @$kid->id)) ?>
                                    <input type="hidden" name="kid_id" value="<?php echo $kid->id; ?>"/>
                                    <h5>EMAIL PREFERENCES</h5>
                                    <h6>Your email address on file is : <?php echo $this->request->session()->read('Auth.User.email'); ?></h6>
                                    <h6>I'd like to recive</h6>
                                    <div class="email-label">
                                        <label for="exclusive_offers" class="input-control radio">
                                            <input type="radio" id="exclusive_offersx<?php echo @$kid->id; ?><?php echo @$countkid; ?>" name="email_preferences" <?php if(@$kid->email_preferences->preferences==1){ ?> checked='checked' <?php } ?> value="1" >
                                            <span class="input-control__indicator"></span>Exclusive offers,news,styling,tips and more !
                                        </label>
                                        <label for="exclusive_offers2" class="input-control radio">
                                            <input type="radio" id="exclusive_offers<?php echo @$kid->id; ?><?php echo @$countkid; ?>" name="email_preferences"  <?php if(@$kid->email_preferences->preferences==1){ ?> checked="checked" <?php } ?> value="0" checked="">
                                            <span class="input-control__indicator"></span>No emails, please
                                        </label>
                                    </div>
                                    <div class="tab-button">
                                        <button  data-id = '<?php echo @$kid->email_preferences->id; ?>' class="btn-boxes preferences"  type="button">Save</button>
                                    </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $countkid++;
            }
            ?>
        </div>
    </div>
</section>

<div id="pop-up-box" class="pop-up">
<?php echo $this->Form->create("User", array('class' => 'pop-up-content', 'data-toggle' => "validator", 'id' => 'paymentFormsave')) ?>
    <span  onclick="document.getElementById('pop-up-box').style.display = 'none'" class="close1" id="close1" title="Close Modal">&times;</span>
    <div class="row pop-up-top">
        <div class="col-md-6">
            <p>Edit Payment Method</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <label>
                Payment Method
            </label>
            <div id="divP">

            </div>
        </div>
        <div class="col-md-4 card-holder-name">
            <label>
                Name on card
            </label>
            <input type="hidden" name="id" id="Pid">
            <input type="text" name="name_card" id="cardNamep" maxlength="16">
        </div>
        <div class="col-md-3 date">
            <label>
                Expiration date
            </label>
            <span>
                <select name="expiry_month" id="expiry_monthp">
                    <?php
                    for ($exp_count = 1; $exp_count <= 12; $exp_count++) {
                        echo "<option>" . ( strlen($exp_count) == 1 ? '0' . $exp_count : $exp_count ) . "</option>";
                    }
                    ?>
                </select>

                <select name="expiry_year" id="expiry_yearp">
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
            </span>
        </div>
    </div>

    <div class="row setting-pop-up-address-details">
        <div class="col-md-12">
            <label>Billing Address</label>
            <div id="billingAddress"></div>
            <a  onclick="getChangeAddress()" href="javascript:void(0)">change</a>
            <div class="setting-pop-up-buttons">
                <a  onclick="getCanelPayment()" href="javascript:void(0)">Cancel</a>
                <a  id='paymentEditSave' href="javascript:void(0)">Save</a>
            </div>
        </div>
    </div>
<?php echo $this->Form->end(); ?>
</div>

<div id="pop-up-box-address" class="pop-up">
<?php echo $this->Form->create("User", array('class' => 'pop-up-content', 'data-toggle' => "validator", 'id' => 'usethisform')) ?>
    <span  onclick="document.getElementById('pop-up-box-address').style.display = 'none'" class="close1" id="close1" title="Close Modal">&times;</span>
    <div class="row pop-up-top">
        <div class="col-md-6">
            <p>Edit Payment Method</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label>
                Selecting billing address
            </label>
            <div id="addressDiv"></div>
        </div>
    </div>
    <div class="row setting-pop-up-address-details">
        <div class="col-md-12">
            <div class="setting-pop-up-buttons">
                <a  onclick="addChangeAddress()" href="javascript:void(0)">Add new address</a>
                <a  id='usethisaddress' href="javascript:void(0)">Use this address</a>
            </div>
        </div>
    </div>
<?php echo $this->Form->end(); ?>
</div>

<div id="pop-up-box-add-address" class="pop-up">
<?php echo $this->Form->create("User", array('class' => 'pop-up-content', 'data-toggle' => "validator", 'id' => 'changeAddAddress')) ?>
    <span  onclick="document.getElementById('pop-up-box-add-address').style.display = 'none'" class="close1" id="close1" title="Close Modal">&times;</span>
    <div class="row pop-up-top">
        <div class="col-md-9">
            <p>Add address </p>
        </div>
    </div>
        <ul>
            <li>
                <label>Full name : </label>
                <input type="hidden" name="id" id="sid">
                <input type="text" name="full_name" id="full_namea">
            </li>
            <li>
                <label>Address line 1 : </label>
                <input type="text" name="address" id="addressa">
            </li>
            <li>
                <label>Address line 2 : </label>
                <input type="text" name="address_line_2" id="address_line_2a">
            </li>
            <li>
                <label>City : </label>
                <input type="text" name="city" id="citya">
            </li>
            <li>
                <label>State/Province/Region : </label>
                <input type="text" name="state" id="statea">
            </li>
            <li>
                <label>ZIP : </label>
                <input type="text" name="zipcode" id="zipcodea">
            </li>
            <li>
                <label>Country : </label>
                <select id="countrya" name="country" >
                    <option value="Usa">Usa</option>
                </select>
            </li>
            <li>
                <label>Phone number:</label>
                <input type="text" name="phone" id="phonea">
            </li>
        </ul>
        <button type="submit" value="addAddress" class="btn deliver-address">Save Address</button>
        </div>
    </div>



<?php echo $this->Form->end(); ?>
</div>




<script type="text/javascript" src="<?= HTTP_ROOT; ?>js/setting.js"></script>
<script>
        var modal = document.getElementById('pop-up-box');
        window.onclick = function (event)
        {
            if (event.target == modal)
            {
                modal.style.display = "none";
            }
        }

        var modal = document.getElementById('pop-up-box-address');

        window.onclick = function (event) {
            if (event.target == modal)
            {
                modal.style.display = "none";
            }
        }

</script>
<script type="text/javascript" >
    $(document).ready(function () {
        $(".cli").click(function () {
            $("#customers").hide();
        });
    });
</script>
<script>
    function newcard() {
        var x = document.getElementById("new-card");
        if (x.style.display === "block")
        {
            x.style.display = "none";
        } else
        {
            x.style.display = "block";
        }
    }
</script>



