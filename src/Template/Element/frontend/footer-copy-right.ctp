<section class="copy-right">
    <div class="container">
        <div class="row">
            <div class="col-md-6">         
                <span>@2019 DRAPEFIT. ALL RIGHTS RESERVED.</span>                        
            </div>
            <div class="col-md-6">
            <ul>
                <li><a href="<?php echo HTTP_ROOT . 'terms-conditions' ?>">Terms & Conditions |</a><a href="<?php echo HTTP_ROOT . 'privacy-policy' ?>"> Privacy Policy |</a><a href="<?php echo HTTP_ROOT . 'map' ?>"> Sitemap</a></li>
            </ul> 
            </div>
        </div>
    </div>
    <?php if ($this->request->session()->read('Auth.User.id')) { ?>
        <b id="chat-button" <?php if ($this->request->session()->read('CHAT_BUTTON') != 'active') { ?> style="display: block;" <?php } else { ?> style="display: none;"<?php } ?>><a href="javascript:void(0)" class="live-chat-side live-button">Live Chat</a> 
        </b>
        <?php
    } else {
       // if ($paramAction = $this->request->params['action'] == 'index') {
            if ($this->request->session()->read('help-active') != 1 || $this->request->session()->read('help-active') != 2) {
                ?>
                <a href="<?php echo HTTP_ROOT . 'help' ?>" class="live-chat-side help">Help</a> 
                <?php
            }
       // }
    }
    ?>

</section>
<script>
    $('.live-button').click(function () {
        var pageurl = '<?php echo HTTP_ROOT ?>';
        $.ajax({
            type: 'POST',
            url: pageurl + 'users/chat_button_box_active',
            success: function (response) {
                if (response.status == 'success') {
                    $('#chat-button').hide();
                    $('#chat-div').show();



                }
            },

            dataType: 'json'
        });
    });

//    $(document).ready(function () {
//        var pageurl = '<?php echo HTTP_ROOT ?>';
//        $.ajax({
//            type: 'POST',
//            url: pageurl + 'users/chat_check_auth',
//            success: function (response) {
//                if (response.status == 'success') {
//                    if (response.value == 1) {
//                        $('#btn1').hide();
//                    } else {
//                        $('#btn1').show();
//                    }
//
//                }
//            },
//
//            dataType: 'json'
//        });
//
//    });


</script>