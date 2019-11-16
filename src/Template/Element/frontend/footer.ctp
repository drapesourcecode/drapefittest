<?php

use Cake\ORM\TableRegistry;

if ($this->request->session()->read('PROFILE') == 'KIDS') {
    if ($this->request->session()->read('KID_ID')) {
        $kidsDetails = TableRegistry::get('kidsDetails');
        $Usersdata = $kidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();

        if ($Usersdata->is_redirect == 0 && @$Usersdata->is_progressbar != 100) {
            $url = 'welcome/style/';
        } elseif ($Usersdata->is_redirect == 0 && $Usersdata->is_progressbar == 100) {
            $url = 'welcome/schedule/';
        } elseif ($Usersdata->is_redirect == 0) {
            $url = 'welcome/style/';
        } elseif ($Usersdata->is_redirect == 1) {
            $url = 'welcome/schedule/';
        } elseif ($Usersdata->is_redirect == 2) {
            $url = 'not-yet-shipped';
        } elseif ($Usersdata->is_redirect == 3) {
            $url = 'profile-review/';
        } elseif ($Usersdata->is_redirect == 4) {
            $url = 'order_review/';
        } elseif ($Usersdata->is_redirect == 5) {
            $url = 'calendar-sechedule/';
        } elseif ($Usersdata->is_redirect == 6) {
            $url = 'customer-order-review';
        }
    }
} else {
    $Users = TableRegistry::get('Users');
    $UserDetails = TableRegistry::get('UserDetails');
    $Usersdata = $Users->find('all')->where(['id' => $this->request->getSession()->read('Auth.User.id')])->first();
    $UserDetailsdata = $UserDetails->find('all')->where(['user_id' => $this->request->getSession()->read('Auth.User.id')])->first();
    if ($Usersdata->is_redirect == 0 && $UserDetailsdata->is_progressbar != 100) {
        $url = 'welcome/style/';
    } elseif ($Usersdata->is_redirect == 0 && $UserDetailsdata->is_progressbar == 100) {
        $url = 'welcome/schedule/';
    } elseif ($Usersdata->is_redirect == 0) {
        $url = 'welcome/style/';
    } elseif ($Usersdata->is_redirect == 1) {
        $url = 'welcome/schedule/';
    } elseif ($Usersdata->is_redirect == 2) {
        $url = 'not-yet-shipped';
    } elseif ($Usersdata->is_redirect == 3) {
        $url = 'profile-review/';
    } elseif ($Usersdata->is_redirect == 4) {
        $url = 'order_review/';
    } elseif ($Usersdata->is_redirect == 5) {
        $url = 'calendar-sechedule/';
    } elseif ($Usersdata->is_redirect == 6) {
        $url = 'customer-order-review';
    }
}
?>
<section class="footer">
    <div class="container"> 
        <div class="row">
            <div class="col-md-3">
                <div class="footer-logo">
                    <?php if (@$this->request->session()->read('Auth.User.id')) { ?>

                        <a href="<?= HTTP_ROOT . $url ?>">    

                        <?php } else { ?>
                            <a href="<?= HTTP_ROOT; ?>"> 
                            <?php } ?>
                            <img src="<?= $this->Url->image('logo.png'); ?>" alt="drapfit logo">
                        </a>
                        </br>
                        <p>WE DO BEST FIT</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-links">
                    <h3>About Us</h3>
                    <ul>
                        <!-- <a href="footer.ctp"></a> -->
                        <li><a href="<?php echo HTTP_ROOT . 'who-we-are' ?>">Who we are</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'our-mission' ?>">Our mission</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'our-stylist'?>">Our stylist</a></li>
                        <!-- <li><a href="<?php echo HTTP_ROOT . 'news' ?>">News</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'investors' ?>">Investors</a></li> -->
                        <li><a href="<?php echo HTTP_ROOT . 'executive-team' ?>">Executive Team</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-links">
                    <h3>Service</h3>
                    <ul>
                        <li><a href="<?php echo HTTP_ROOT . 'men' ?>">Men</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'women' ?>">Women</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'kids' ?>">Kids</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-links">
                    <h3>The Company</h3>
                    <ul>
                        <li><a href="<?php echo HTTP_ROOT . 'style-blog' ?>">Style Blog</a></li>                
                        <li><a href="<?php echo HTTP_ROOT . 'news' ?>">News</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'investors' ?>">Investors Relation</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'careers' ?>">Careers</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'feedback-review' ?>">Feedback & Reviews</a></li>
                        <?php /* ?><li><a href="<?php echo HTTP_ROOT . 'terms-conditions' ?>">Terms & Conditions</a></li><?php */ ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-links">
                    <h3>Customer Care</h3>
                    <ul>
                        <li><a href="<?php echo HTTP_ROOT . 'faq' ?>">FAQ</a></li>                
                        <li><a href="<?php echo HTTP_ROOT . 'gifts' ?>">Gift Card</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'return-exchange' ?>">Return & Exchange</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'track-order' ?>">Track Order</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'help-center' ?>">Help Center</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'contact-us' ?>">Contact Us</a></li>
                        <!-- <li><a href="<?php echo HTTP_ROOT . 'privacy-policy' ?>">Track Order</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-social">
                    <h3>Follow Us :</h3>
                    <?php echo $this->cell('Chat::social_media');?>
                </div>           
            </div>         
        </div>
    </div>
</section>