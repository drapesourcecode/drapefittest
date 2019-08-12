<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Print  | Product Invoice</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    </head>

    <style>
        body{
            text-align: center;
        }
        @page {
            size: 5.5in 8.5in;  
            margin:10pt 0pt 40pt;
        }
page {
  background: white;
  display: inline-block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
}
    </style>

    <body onload="window.print();">
        <page size="A4">
        <div style="float: left; width: 100%; padding: 20px;">
            <div style="float: left; width: 100%;">
                <div style="text-align:center;">
                    <div class="post" style="margin: 0;padding: 0;border:none;color: none;display: inline-block;">    
                        <p>Name:  <span><?php echo $userdetails->user->name; ?></span></p> 
                        <p>Code:  <span><?php echo $userdetails->user->email; ?></span></p>
                        <p>Date:  <span><?php echo $userdetails->created_dt; ?></span></p>
                        <p>Address:  <span>
                                    <?php echo $shipping_address->address; ?>                                    
                            </span></p>
                        <li style="display:inline-block;margin: 15px 280px;">                               
                            <img src="<?php echo HTTP_ROOT . BARCODE_PROFILE . $userdetails->user->user_detail->barcode_image ?>" style="text-align:center;"> <br> 
                        </li>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your height?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;">5</span>ft.</div>
                        <div style="display: inline-block;font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;">8</span>in.</div>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your height?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block; font-size: 15px;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center;margin-right: 8px;border-radius: 3px;">5</span>ft.</div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">FIT you are looking for? </h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px;">07/22/2056</span></div>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Are you parent ? </h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="float: left; border: 1px solid #ff6c00; padding: 10px;width: 32px;text-align: center;background: #ff6c00;color: #fff; border-top-left-radius: 3px; border-bottom-left-radius: 3px; font-size: 15px;">Yes</span><span style="float: left; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center; border-top-right-radius: 3px; border-bottom-right-radius: 3px;font-size: 15px;">No</span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Tell us Your body Shape?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Rectangle</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative;"><img style="width: 80px;" src="<?php echo HTTP_ROOT ?>images/inverted-triangle.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Triangle</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative;"><img style="width: 80px;" src="<?php echo HTTP_ROOT ?>images/triangle.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Trapezoid</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative;"><img style="width: 80px;" src="<?php echo HTTP_ROOT ?>images/rectangle.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Oval</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative;"><img style="width: 80px;" src="<?php echo HTTP_ROOT ?>images/hourglass.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Inverted Triangle</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ff6c00; text-align: center; position: relative;"><span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;"> <img style="width: 17px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span><img style="width: 80px;" src="<?php echo HTTP_ROOT ?>images/apple.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">What size you prefer? </h3>
                <div style="float: left; width:100%;">
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">PANTS</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">46</span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">BRA SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px;font-size: 15px;">34</span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">C</span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">SKIRT SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">M</span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">JEANS SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">10</span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">JEANS SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">4</span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">XS (0)</span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">JEANS SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">4</span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">XS (0)</span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 13px; color: #232f3e; margin-bottom: 8px;">JEANS SIZE</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">5.5</span><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">Medium</span></div>
                    </div>

                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your shoe size?</h3>
                <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px; width: 100px;">9</span></div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Which style of shoes do you prefer?(Select all that apply)</h3>
                <div style="float: left; width: 100%;">
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Pumps</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Sandals</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 15px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>Sneakers</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Boots & Booties</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Loafers & Flats</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Wedges</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Clogs & Mules</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Platforms</li>
                </ul>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Which style of shoes do you prefer?(Select all that apply)</h3>
                <div style="float: left; width: 100%;">
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Flat(Under 1")</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>High(3"-4")</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 15px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>Low(1"-2")</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Ultra High(4.5"+)</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Mid(2"-3")</li>
                </ul>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What is your profession?</h3>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;"><span style="display: inline-block;
background-color: #ef6a04; height: 11px; border-radius: 100%; width: 11px; position: relative; top: -1px;"></span></span>Architecture / Engineering</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Art / Design</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Building / Maintenance</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Business / Client Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Community / Social Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Computer / IT</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Education</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Entertainer / Performer</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Farming / Fishing / Forestry</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Financial Services</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Health Practitioner / Technician</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Hospitality / Food Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Management</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Media / Communications</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Military / Protective Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Legal</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Office / Administration</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Average</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Personal Care & Service</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Production / Manufacturing</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Retail</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Sales</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Science</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Technology</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Transportation</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Self-Employed</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Stay-At-Home Parent</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Student</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Retired</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Not Employed</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Other</li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Tell us your skin Tone?</h3>
                <ul style="float: left; width: 100%; list-style-type: none; margin: 0; padding:0;">
                    <li style="float: left; width: 100px;height: 100px; border:4px solid #ff6c00; background: #fdc8b9; border-radius: 100%;"></li>
                    <li style="float: left; width: 100px;height: 100px; border:4px solid #fff; background: #f0b4a2; border-radius: 100%;"></li>
                    <li style="float: left; width: 100px;height: 100px; border:4px solid #fff; background: #d0967e; border-radius: 100%;"></li>
                    <li style="float: left; width: 100px;height: 100px; border:4px solid #fff; background: #c57456; border-radius: 100%;"></li>
                    <li style="float: left; width: 100px;height: 100px; border:4px solid #fff; background: #78412a; border-radius: 100%;"></li>
                    <li style="float: left; width: 100px; height: 100px; border: 4px solid #fff; background: #e6e6e6; border-radius: 100%; text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px; padding-top: 35px; box-sizing: border-box;">Other</li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What parts of your body are you comfortable showing off?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;background: #232f3e;color: #fff;">Arms</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Bust</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Stomach</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Back</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Waist</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Hips/Butt</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Legs</li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What parts of your body do you like to keep covered?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;background: #232f3e;color: #fff;">Arms</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Bust</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Stomach</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Back</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Waist</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Hips/Butt</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Legs</li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">Your Proportions?</h3>
                <div style="float: left; width:100%;">
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Shoulders?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">10</span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Legs?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px;font-size: 15px;">42</span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Arms?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">XL</span></div>
                    </div>
                    <div style="float: left; width: 25%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Hips?</h4>
                        <div style="float: left; width: 100%;"><span style="float: left; border: 1px solid #ccc; padding: 10px;text-align: center;border-radius: 3px; margin-right: 5px; font-size: 15px;">10</span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Are you a pregnant?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="float: left; border: 1px solid #ff6c00; padding: 10px;width: 32px;text-align: center;background: #ff6c00;color: #fff; border-top-left-radius: 3px; border-bottom-left-radius: 3px; font-size: 15px;">Yes</span><span style="float: left; border: 1px solid #ccc; padding: 10px;width: 32px;text-align: center; border-top-right-radius: 3px; border-bottom-right-radius: 3px;font-size: 15px;">No</span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">What is your due date?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px;">07/22/2056</span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">your maternity fit ?</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px; width: 90px;">9</span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <div style="float: left;width: 45%;">
                    <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; font-size: 15px;">Loose Fitted mix of both</h3>
                    <div style="float: left; width: 100%;">
                        <div style="display: inline-block;"><span style="display: inline-block; border: 1px solid #ccc; padding: 10px;width: 100px;text-align: center;margin-right: 8px; border-radius: 3px; font-size: 15px; width: 90px;">8</span></div>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Are you a pregnant ?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Slim</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/leady-belly4.png" alt=""></div>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">Fitted through the chest, trim through the waist, tapered sleeves</p>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Regular</h4>
                        <div style=" float: left; width: 100%; border: 2px solid #ff6c00; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;"> <img style="width: 17px;" src="https://drapefittest.com/assets/images/tick2.png" alt=""></span><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/leady-belly3.png" alt=""></div>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">Relaxed through the chest, waist, armholes &amp; sleeves</p>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Slim</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/leady-belly2.png" alt=""></div>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">Fitted through the chest, trim through the waist, tapered sleeves</p>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Slim</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>images/leady-belly1.png" alt=""></div>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">Fitted through the chest, trim through the waist, tapered sleeves</p>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">You social media profiles will help your personal Stylist to know you better. </h3>
                <div style="float: left;width: 45%;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">LINKEDIN PROFILE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px;">dfjkuewrq</p>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">INSTAGRAM HANDLE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px;">dfjkuewrq</p>
                    </div>
                </div>
                <div style="float: left;width: 45%;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">TWITTER HANDLE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px; margin-bottom: 0;">dfjkuewrq</p>
                    </div>
                </div>
                <div style="float: right;width: 45%;">
                    <div style="float: left; width: 100%;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">PINTEREST HANDLE</h4>
                        <p style="margin-top: 0;color: #8c8c8c;font-size: 15px; margin-bottom: 0;">dfjkuewrq</p>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Style Inspiration</h3>
                <p style="margin-top: 0;color: #8c8c8c;font-size: 15px;">Are you looking to incorporate more of the styles below into your wardrobe? Select the styles below that you inspire to look like or would like to explore.</p>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Bohemian</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/bohemian.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Casual</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/casual.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Classic</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/classic.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Edgy</h4>
                        <div style=" float: left; width: 100%; border: 2px solid #ff6c00; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;"> <img style="width: 17px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/edgy.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Trendy</h4>
                        <div style=" float: left; width: 100%; border: 2px solid #ff6c00; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;"> <img style="width: 17px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/trendy.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Please tell us the OutFit you prefer to wear. </h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit1.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                           <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;"><span style="display: inline-block;
background-color: #ef6a04; height: 11px; border-radius: 100%; width: 11px; position: relative; top: -1px;"></span></span>Always dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Sometimes dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Occasionally dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Never this way</li>
                </ul> 
                        </div>
                    </li>
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit2.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                           <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;"><span style="display: inline-block;
background-color: #ef6a04; height: 11px; border-radius: 100%; width: 11px; position: relative; top: -1px;"></span></span>Always dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Sometimes dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Occasionally dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Never this way</li>
                </ul> 
                        </div>
                    </li>
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit3.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                           <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;"><span style="display: inline-block;
background-color: #ef6a04; height: 11px; border-radius: 100%; width: 11px; position: relative; top: -1px;"></span></span>Always dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Sometimes dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Occasionally dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Never this way</li>
                </ul> 
                        </div>
                    </li>
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; border: 1px solid #ff6c00; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;"> <img style="width: 17px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit4.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                           <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;"><span style="display: inline-block;
background-color: #ef6a04; height: 11px; border-radius: 100%; width: 11px; position: relative; top: -1px;"></span></span>Always dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Sometimes dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Occasionally dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Never this way</li>
                </ul> 
                        </div>
                    </li>
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; border: 1px solid #ff6c00; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;"> <img style="width: 17px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit5.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                           <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;"><span style="display: inline-block;
background-color: #ef6a04; height: 11px; border-radius: 100%; width: 11px; position: relative; top: -1px;"></span></span>Always dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Sometimes dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Occasionally dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Never this way</li>
                </ul> 
                        </div>
                    </li>
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit6.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                           <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;"><span style="display: inline-block;
background-color: #ef6a04; height: 11px; border-radius: 100%; width: 11px; position: relative; top: -1px;"></span></span>Always dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Sometimes dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Occasionally dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Never this way</li>
                </ul> 
                        </div>
                    </li>
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit7.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                           <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;"><span style="display: inline-block;
background-color: #ef6a04; height: 11px; border-radius: 100%; width: 11px; position: relative; top: -1px;"></span></span>Always dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Sometimes dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Occasionally dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Never this way</li>
                </ul> 
                        </div>
                    </li>
                    <li style=" float: left; width: 32%;margin-right: 7px;margin-top: 10px;margin-bottom: 10px;">
                        <div style=" float: left; width: 140px; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/women-outfit8.jpg" alt=""></div>
                        <div style=" float: left; width: 100%;">
                           <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;"><span style="display: inline-block;
background-color: #ef6a04; height: 11px; border-radius: 100%; width: 11px; position: relative; top: -1px;"></span></span>Always dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Sometimes dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Occasionally dress this way</li>
                    <li style="float: left; width: 100%;font-size: 15px; padding: 8px 0 4px;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Never this way</li>
                </ul> 
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What patterns should we avoid?</h3>
                <ul style="float: left; width:100%; margin:0; padding: 0; list-style-type: none;">
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Lace</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/lace.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Animal Print</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/animal-print.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Tribal</h4>
                        <div style=" float: left; width: 100%; border: 1px solid #ccc; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/tribal.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Polak Dot</h4>
                        <div style=" float: left; width: 100%; border: 2px solid #ff6c00; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;"><span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;"> <img style="width: 17px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/polkadot.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 0;">Stripes</h4>
                        <div style=" float: left; width: 100%; border: 2px solid #ff6c00; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;"><span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;"> <img style="width: 17px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/stripes.jpg" alt=""></div>
                    </li>
                    <li style=" float: left; width: 19%;margin-right: 7px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px;">Floral</h4>
                        <div style=" float: left; width: 100%; border: 2px solid #ff6c00; text-align: center; position: relative; padding: 3px 3px 0; box-sizing: border-box;height: 212px;"><span style="height: 25px; width: 25px; background: #ef6a04; display: inline-block; position: absolute; border-radius: 100%; right: -8px; top: -11px; padding-top: 6px; box-sizing: border-box;"> <img style="width: 17px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/women-img/floral.jpg" alt=""></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;margin-bottom: 0;">How long do you prefer your shorts? </h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Black</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #000000;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Grey</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #c2c2c2;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">White</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #fff;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Cream</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #eed7c1;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Brown</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #7f3a3e;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Purple</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #88007c;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Green</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #008020;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Blue</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #001bf8;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Orange</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #ffa031;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Yellow</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #fffe45;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Red</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 1px solid #ccc;background: #ff001c;"></div>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">Pink</h4>
                        <div style="float: left;height: 80px;width: 100px;border: 3px solid #ef6a04;background: #ffbdca;"></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Which colors do you tend to mostly wear?</h3>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">NEUTRALS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Black</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Grey</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 15px;" src="https://drapefittest.com/assets/images/tick2.png" alt=""></span>Navy</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Beige</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>White</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">COLOR</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Red</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Blue</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 15px;" src="https://drapefittest.com/assets/images/tick2.png" alt=""></span>Yellow</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Purple</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">LIGHTS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>White</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Sand</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 15px;" src="https://drapefittest.com/assets/images/tick2.png" alt=""></span>Pastels</li>
                </ul>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What do you feel is missing from your FIT?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding: 0; list-style-type: none;">
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;background: #232f3e;color: #fff;">Sweaters</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Blouses</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Jeans</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Pants</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Skirts</li>
                    <li style="float: left; border: 1px solid #ccc;padding: 7px 15px;font-size: 15px;text-align: center; margin: 7px 5px;">Dresses</li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Would you wear any of these denim styles?</h3>
                <ul style="float: left; width: 100%; margin: 0; padding:0;">
                    <li style="display: inline-block; width:32%;">
                        <div style="float: left; width: 100%"><img src="<?php echo HTTP_ROOT ?>assets/images/denim1.jpg" alt="" width="223" height="216"></div>
                        <div style=" float: left; width: 100%; text-align: center;"><span style=" display: inline-block; border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;">Yes</span><span style="display: inline-block;border: 1px solid #ff6c00;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;background: #ff6c00; color: #fff;">Maybe</span><span style="display: inline-block;border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;">Never</span></div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <div style="float: left; width: 100%"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/denim2.jpg" alt="" width="223" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;"><span style=" display: inline-block; border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;">Yes</span><span style="display: inline-block;border: 1px solid #ff6c00;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;background: #ff6c00; color: #fff;">Maybe</span><span style="display: inline-block;border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;">Never</span></div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <div style="float: left; width: 100%"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/denim3.jpg" alt="" width="223" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;"><span style=" display: inline-block; border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;">Yes</span><span style="display: inline-block;border: 1px solid #ff6c00;padding: 10px; margin: 0 -1px; text-align: center;font-size: 15px;background: #ff6c00; color: #fff;">Maybe</span><span style="display: inline-block;border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;">Never</span></div>
                    </li>
                    <li style="display: inline-block; width:32%;">
                        <div style="float: left; width: 100%"><img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/denim4.jpg" alt="" width="223" height="216"></div>
                        <div style=" float: left; width: 100%;text-align: center;"><span style=" display: inline-block; border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-left-radius: 3px;font-size: 15px;">Yes</span><span style="display: inline-block;border: 1px solid #ff6c00;padding: 10px;margin: 0 -1px; text-align: center;font-size: 15px;background: #ff6c00; color: #fff;">Maybe</span><span style="display: inline-block;border: 1px solid #ccc;padding: 10px;text-align: center;border-top-left-radius: 3px;border-bottom-right-radius: 3px;font-size: 15px;">Never</span></div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">How often do you dress for the following occasions? </h3>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;"><span style="background: #232e3e; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px; text-align: center;"><span style="display: inline-block;
background-color: #ef6a04; height: 11px; border-radius: 100%; width: 11px; position: relative; top: -1px;"></span></span>Business Casual / Work</li>
                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Cocktail / Wedding / Special</li>
                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Most of the time</li>
                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Around once or twice a week</li>
                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Around once or twice a month</li>
                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Date Night / Night Out</li>
                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Laid Back Casual</li>
                    <li style="float: left; width: 33%;font-size: 14px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Rarely</li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">What do you feel is missing from your closet? </h3>
                <div style="float: left; width: 100%;">
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Sweaters</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Blouses</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #ef6a04;height: 15px;width: 15px;float: left;margin-right: 5px;background: #ef6a04;"><img style="width: 15px;" src="<?php echo HTTP_ROOT ?>assets/images/tick2.png" alt=""></span>Jeans</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Pants</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Skirts</li>
                    <li style="float: left; width: 25%;font-size: 15px; padding: 8px 0;"><span style="border: 1px solid #c1c0c0;height: 15px;width: 15px;float: left;margin-right: 5px;"></span>Dresses</li>
                </ul>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0; margin-bottom: 0;">Help Us to Know your Budget </h3>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">TOPS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Under $50</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$50 - $75</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$75 - $100</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$100 - $125</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$125+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">BOTTOMS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Under $30</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$30 - $50</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$50 - $70</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$70 - $90</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$90+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">OUTERWEAR</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Under $50</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$50 - $75</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$75 - $100</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$100 - $125</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$125+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JEANS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Under $75</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$75 - $100</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$100 - $125</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$125 - $175</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$175+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">JEWELRY</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Under $40</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$40 - $60</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$60 - $80</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$80 - $100</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$100+</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">ACCESSORIES</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Under $75</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$75 - $125</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$125 - $175</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$175 - $250</li>
                </ul>
                </div>
                <div style="float: left; width: 100%;">
                    <h4 style="margin-top: 15px; font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 15px;">DRESS</h4>
                <ul style="float: left; width: 100%; padding:0; list-style-type: none; margin: 0;">
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>Under $75</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$75 - $125</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$125 - $175</li>
                    <li style="float: left; width: 33%;font-size: 15px; padding: 8px 0;"><span style="background: #c1c0c0; height: 15px; width: 15px;border-radius: 100%; float: left; margin-right: 5px;"></span>$175 - $250</li>
                </ul>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;"> Underwear &amp; Grooming </h3>
                <div style="float: left; width: 100%;">
                    <div style="display: inline-block;width: 27%;margin-right: 20px; text-align: center;">
                        <div style="width: 100%; overflow: hidden;"><img src="<?php echo HTTP_ROOT ?>files/custom_designe/407cd2644bb4f67f381e1beea28baf9f.jpg" alt=""></div>
                        <h4 style="font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">First Design</h4>
                    </div>
                    <div style="display: inline-block;width: 27%;margin-right: 20px; text-align: center;">
                        <div style="width: 100%; overflow: hidden;"><img src="<?php echo HTTP_ROOT ?>files/custom_designe/60f989923c188509a897663ae2f4d512.jpg" alt=""></div>
                        <h4 style=" font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">Second Design</h4>
                    </div>
                    <div style="display: inline-block;width: 27%;margin-right: 20px;text-align: center;">
                        <div style="width: 100%; overflow: hidden;"><img src="<?php echo HTTP_ROOT ?>files/custom_designe/60f989923c188509a897663ae2f4d512.jpg" alt=""></div>
                        <h4 style="font-size: 14px; color: #232f3e; margin-bottom: 8px; margin-top: 5px; text-align: center;">Third Design</h4>
                    </div>
                </div>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Brand or store you prefer to shop ? </h3>
                <ul style=" float: left; width:100%; margin: 0; padding: 0; list-style-type:  none;">
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/penguin.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/nike.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/scotch.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/gap.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/pata.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/tommy.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/boss.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vineyard.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/vans.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/hurley.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/brooks.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/zara.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/levis.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/armour.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/bonobos.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/landsend.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/jcrew.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/oldnavy.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/uniqlo.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/northface.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/h&m.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/eagle.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/ragnbone.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/images/men/bensharma.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/express.png" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/polo.png" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-a.jpg" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-b.jpg" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-c.jpg" alt="">
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-d.jpg" alt=""> 
                        </div>
                    </li>
                    <li style="display: inline-block;width: 20%;margin: 10px 11px;vertical-align: top;position: relative;">
                        <div style="position: relative;border: 1px solid #e0e0e0;padding: 2px;display: inline-block;width: 100%;">
                           <img style="width: 100%;" src="<?php echo HTTP_ROOT ?>assets/mens-brand-logo/img-e.jpg" alt="">
                        </div>
                    </li>
                </ul>
            </div>
            <div style="float: left; width: 95%; margin-bottom: 0; padding: 25px 0 30px; border-bottom: 1px solid #d2d6de; text-align: left;">
                <h3 style="color: #232f3e;font-size: 17px; margin-top: 0;">Add additional comments</h3>
                <p style="margin-top: 0;color: #8c8c8c;font-size: 13px; margin-bottom: 0;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
            <div class="pagebreak"> </div>
        </div>
    </page>
    </body>
</html>
