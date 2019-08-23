<!DOCTYPE html>
<html>
    <head>
        <meta https-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title><?php echo!empty($title_for_layout) ? $title_for_layout : SITE_NAME; ?></title>
        <?php echo $this->Html->meta('keywords', (empty($metaKeyword) ? '' : $metaKeyword)); ?>
        <?php echo $this->Html->meta('description', (empty($metaDescription) ? '' : $metaDescription)); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= $this->Url->css('bootstrap.min.css'); ?>" type="text/css">
        <link rel="stylesheet" href="<?= $this->Url->css('style.css'); ?>" type="text/css">

        <!--        debasish add this link-->
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">-->
        <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>assets/css/bootstrap-datetimepicker.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/design.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/responsive-accordion.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/kidbootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>assets/css/kidstyle.css" type="text/css">
        <script src='<?= $this->Url->script('jquery.min.js'); ?>'></script>
        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/moment-with-locales.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_ROOT ?>assets/js/bootstrap-datetimepicker.js"></script>
        <!--end of debasish add this link-->
    </head>
    <body>
        <?= $this->element('frontend/header'); ?>
        <?= $this->fetch('content'); ?>

        <?php //echo $this->request->session()->read('CHAT_BUTTON'); exit;?>
        
        
        <b id="chat-div" style="
            <?php if ($this->request->session()->read('CHAT_BUTTON') == 'active') { ?> 
           display:block; 
          <?php } else { ?> display:none; <?php } ?>">
            <?php
            //if ($this->request->session()->read('CHAT_BUTTON') == 'active') {

            echo $this->cell('Chat::chat_support');
           // }
            ?>
        </b>
        <?= $this->element('frontend/footer'); ?>
        <?= $this->element('frontend/footer-copy-right'); ?>

        <input type="hidden" id="pageurl" value="<?php echo HTTP_ROOT ?>"/>
    </body>
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
</html>