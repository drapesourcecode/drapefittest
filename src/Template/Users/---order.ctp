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
<section class="order-review">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <h1> Your Orders </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <?php
                foreach ($OrderDetails as $orders) {
                    if ($orders->count == 1) {
                        $fitCount = 'First';
                    }
                    if ($orders->count == 2) {
                        $fitCount = 'Second';
                    }

                    if ($orders->count == 3) {
                        $fitCount = 'Third';
                    }

                    if ($orders->count == 4) {
                        $fitCount = 'Fourth';
                    }

                    if ($orders->count == 5) {
                        $fitCount = 'Fifth';
                    }

                    if ($orders->count == 6) {
                        $fitCount = 'Sixth';
                    }

                    if ($orders->count == 7) {
                        $fitCount = 'Seventh';
                    }

                    if ($orders->count == 8) {
                        $fitCount = 'Eighth';
                    }

                    if ($orders->count == 9) {
                        $fitCount = 'Nineth';
                    }
                    if ($orders->count == 10) {
                        $fitCount = 'Tenth';
                    }
                    ?>
                    <div class="Product-table">
                        <h3><?php echo $fitCount; ?> FIT <span>Date-<?php echo date('d-m-y', strtotime($orders->created_dt)) ?></span></h3>
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>
                                        <span style=" width: 49%;text-align: left;display: inline-block;">Image</span>
                                    </th>
                                    <th>
                                        <span style="text-align: left;display: inline-block;">Product Details</span>
                                    </th>
                                    <th style="text-align: center;">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                //pj($orders);
                                foreach ($orders->products as $products):
                                    if ($products->keep_status == 3) {
                                        ?>
                                        <tr>
                                            <td data-th="Product">
                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES ?><?php echo $products->product_image; ?>" alt="">
                                            </td>
                                            <td data-th="Productdes">
                                                <?php echo $products->product_name_one . ',' . $products->product_name_two; ?>
                                            </td>
                                            <td data-th="Subtotal" style=" width: 100px;" class="text-center">
                                                <?php echo '$' . number_format($products->sell_price, 2); ?>
                                            </td>                   

                                        </tr>
                                        <?php
                                    }
                                    $i++;
                                endforeach;
                                ?>

                                </tr>      
                            </tbody>
                        </table>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>


</div>
