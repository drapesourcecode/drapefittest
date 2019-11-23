<?= $this->Flash->render() ?>
<div class="undrconstr">
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <h1>Site is under schedule maintenance between <span>12.00 AM CST To 4 AM CST</span></h1>
            </div>            
        </div>                
    </div>    
</div>
<?php echo $this->element('frontend/working'); ?>
<?php echo $this->element('frontend/expecting'); ?>
<?php echo $this->element('frontend/cost'); ?>
<?php echo $this->element('frontend/men-womwn-kid'); ?>
<?php echo $this->element('frontend/best-fit'); ?>
<?php echo $this->element('frontend/sign-up'); ?>

