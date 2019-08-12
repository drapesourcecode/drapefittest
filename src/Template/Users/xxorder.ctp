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
                <div class="Product-table">
                    <h3>FIRST FIT <span>Date-25-05-19</span></h3>
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
                            $style_pick_total = 0;
                            $i = 1;
//                        pj($customer_data);
                            foreach ($customer_data as $customer_data_review):

                                if ($customer_data_review->keep_status == 3) {
                                    $customer_sellprice = $customer_data_review->sell_price;
                                } else {
                                    $customer_sellprice = 0;
                                }
                                $style_pick_total += (double) $customer_sellprice;
                                ?>
                                <tr>
                                    <td data-th="Product">
                                        <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES ?><?php echo $customer_data_review['product_image']; ?>" alt="">
                                    </td>
                                    <td data-th="Productdes">
                                        <?php echo $customer_data_review->product_name_one; ?>
                                    </td>
                                    <td data-th="Subtotal" style=" width: 100px;" class="text-center">
                                        <?php
                                        if ($customer_data_review->keep_status == 3) {
                                            echo '$' . number_format($customer_data_review->sell_price, 2);
                                        } elseif ($customer_data_review->keep_status == 2) {
                                            echo '$' . number_format(0, 2);
                                        } elseif ($customer_data_review->keep_status == 1) {
                                            echo '$' . number_format(0, 2);
                                        }
                                        ?>
                                    </td>                   
                                    <!-- <td class="actions" data-th="">
                                        <div class="change-btn2">
                                            <label for="radio-1"><?php
                                                if ($customer_data_review->keep_status == 3) {
                                                    echo 'Keeps';
                                                } else if ($customer_data_review->keep_status == 2) {
                                                    echo 'Exchange';
                                                } else {
                                                    echo 'Return';
                                                }
                                                ?></label>
                                        </div>
                                    </td>
                                    <td class="actions" data-th="">
                                        <div class="change-btn2">
                                            <?php echo $customer_data_review->product_purchase_date ; ?>
                                        </div>
                                    </td> -->
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>

                            <!--for kids porduct loop start-->


                            <?php
                            //echo $style_pick_total;
                            $style_pick_totalkids = 0;
                            if ($kidcount > 0) {
                                $i = 1;
                                foreach ($kid_data as $customer_data_review):
                                    ?>
                                    <tr>
                                        <th colspan="5">
                                            Kids sno <?php echo $i; ?> ,  Kids Name:-   <?php echo $customer_data_review->kids_detail->kids_first_name; ?>
                                        </th>


                                    </tr>
                                    <?php
                                    $k = 1;
                                    foreach (@$detailsKid[$customer_data_review->kid_id] as $dataKids) {
                                        if ($dataKids->keep_status == 3) {
                                            $kid_sellprice = $dataKids->sell_price;
                                        } else {
                                            $kid_sellprice = 0;
                                        }
                                        $style_pick_totalkids += (double) $kid_sellprice;
                                        ?>
                                        <tr>
                                            <td data-th="Product">
                                                <img src="<?php echo HTTP_ROOT . PRODUCT_IMAGES ?><?php echo $dataKids['product_image']; ?>" alt="">
                                            </td>
                                            <td data-th="Productdes">
                                                <?php echo $dataKids->product_name_one; ?>
                                            </td>
                                            <td data-th="Subtotal" style=" width: 100px;" class="text-center">
                                                <?php
                                                if ($dataKids->keep_status == 3) {
                                                    echo '$' . number_format($dataKids->sell_price, 2);
                                                } else {
                                                    echo '$' . number_format(0, 2);
                                                }
                                                ?>
                                            </td>                   
                                            <!-- <td class="actions" data-th="">
                                                <div class="change-btn2">
                                                    <label for="radio-1"><?php
                                                        if ($dataKids->keep_status == 3) {
                                                            echo 'Keeps';
                                                        } else if ($dataKids->keep_status == 2) {
                                                            echo 'Exchange';
                                                        } else {
                                                            echo 'Return';
                                                        }
                                                        ?></label>
                                                </div>
                                            </td> -->
                                           <!--  <td class="actions" data-th="">
                                                <div class="change-btn2">
                                                    <?php echo $customer_data_review->product_purchase_date ; ?>
                                                </div>
                                            </td> -->

                                        </tr>

                                        <?php
                                        $k++;
                                    }
                                    ?>
                                    <?php
                                    $i++;
                                endforeach;
                            }
                            ?>
                            <?php 
                            
                            if ($i == 0 && $k == 0) { ?>
                                <tr>
                                    <th calspan="6">
                                        <span style=" width: 100%;text-align: left;display: inline-block;">No order product yet</span>
                                    </th>
                                <?php } ?>
                            </tr>      
                        </tbody>
                    </table>
                </div>
                

            </div>
        </div>
    </div>
</section>


</div>
