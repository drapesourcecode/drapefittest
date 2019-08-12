<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

class CustomComponent extends Component {

    function __construct($prompt = null) {
        
    }

    function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    function formatText($value) {
        $value = str_replace("“", "\"", $value);
        $value = str_replace("�?", "\"", $value);
        //$value = preg_replace('/[^(\x20-\x7F)\x0A]*/','', $value);
        $value = stripslashes($value);
        $value = html_entity_decode($value, ENT_QUOTES);
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        $value = strtr($value, $trans);
        $value = stripslashes(trim($value));
        return $value;
    }

    function shortLength($value, $len) {
        $value_format = $this->formatText($value);
        $value_raw = html_entity_decode($value_format, ENT_QUOTES);

        if (strlen($value_raw) > $len) {
            $value_strip = substr($value_raw, 0, $len);
            $value_strip = $this->formatText($value_strip);
            $lengthvalue = "<span title='" . $value_format . "' rel='tooltip'>" . $value_strip . "...</span>";
        } else {
            $lengthvalue = $value_format;
        }
        return $lengthvalue;
    }

    function makeSeoUrl($url) {
        if ($url) {
            $url = trim($url);
            $value = preg_replace("![^a-z0-9]+!i", "-", $url);
            $value = trim($value, "-");
            return strtolower($value);
        }
    }

    function generateUniqNumber($id = NULL) {
        $uniq = uniqid(rand());
        if ($id) {
            return md5($uniq . time() . $id);
        } else {
            return md5($uniq . time());
        }
    }

    function getRealIpAddress() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function get_ip_address() {
        if (isSet($_SERVER)) {
            if (isSet($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } elseif (isSet($_SERVER["HTTP_CLIENT_IP"])) {
                $realip = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $realip = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }

        return $realip;
    }

    function uploadImage($tmp_name, $name, $large, $medium, $thumb) {
        if ($name) {
            $image = strtolower($name);
            //          $extname = substr(strrchr($image, "."), 1);
            $extname = $this->getExtension($image);
            if (($extname != 'gif') && ($extname != 'jpg') && ($extname != 'jpeg') && ($extname != 'png') && ($extname != 'bmp')) {
                return false;
            } else {
                if ($extname == "jpg" || $extname == "jpeg") {
                    $src = imagecreatefromjpeg($tmp_name);
                } else if ($extname == "png") {
                    $src = imagecreatefrompng($tmp_name);
                } else {
                    $src = imagecreatefromgif($tmp_name);
                }

                list($width, $height) = getimagesize($tmp_name);


                $newwidth = 500;
                $newheight = ($height / $width) * $newwidth;
                $tmp = imagecreatetruecolor($newwidth, $newheight);

                $newwidth1 = 291;
                $newheight1 = ($height / $width) * $newwidth1;
                $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);

                $newwidth2 = 100;
                $newheight2 = ($height / $width) * $newwidth2;
                $tmp2 = imagecreatetruecolor($newwidth2, $newheight2);
                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
                imagecopyresampled($tmp2, $src, 0, 0, 0, 0, $newwidth2, $newheight2, $width, $height);
                $time = time();
                $filepath = md5($time) . "." . $extname;
                $filename = $large . $filepath;
                $filename1 = $medium . "medium_" . $filepath;
                $filename2 = $thumb . "thumb_" . $filepath;
                imagejpeg($tmp, $filename, 100);

                imagejpeg($tmp1, $filename1, 100);

                imagejpeg($tmp2, $filename2, 100);

                imagedestroy($src);
                imagedestroy($tmp);
                imagedestroy($tmp1);
                imagedestroy($tmp2);

                return $filepath;
            }
        }
    }

    function uploadImageBanner($tmp_name, $name, $path, $imgWidth) {
        if ($name) {
            $image = strtolower($name);
            $extname = $this->getExtension($image); //$extname = substr(strrchr($image, "."), 1);
            if (($extname != 'gif') && ($extname != 'jpg') && ($extname != 'jpeg') && ($extname != 'png') && ($extname != 'bmp')) {
                return false;
            } else {
                if ($extname == "jpg" || $extname == "jpeg") {
                    $src = imagecreatefromjpeg($tmp_name);
                } else if ($extname == "png") {
                    $src = imagecreatefrompng($tmp_name);
                } else {
                    $src = imagecreatefromgif($tmp_name);
                }
                list($width, $height) = getimagesize($tmp_name);

                if ($extname == 'gif' || $width <= $imgWidth) {
                    $time = time() . rand(100, 999);
                    $filepath = md5($time) . "." . $extname;
                    $targetpath = $path . $filepath;
                    if (!is_dir($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($tmp_name, $targetpath);
                    return $filepath;
                } else {
                    $newwidth = $imgWidth;
                    $newheight = ($height / $width) * $newwidth;
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    $time = time();
                    $filepath = md5($time) . "." . $extname;
                    $filename = $path . $filepath;
                    imagejpeg($tmp, $filename, 100);

                    imagedestroy($src);
                    imagedestroy($tmp);
                    return $filepath;
                }
            }
        }
    }

    function lastValue($string) {
        $explode = explode('-', $string);
        $lastArrayValue = end($explode);
        return $lastArrayValue;
    }

    function number_pad($number, $n = 4) {
        $number = intval($number, 10);
        $number = (string) $number;
        return str_pad((int) $number, $n, "0", STR_PAD_LEFT);
    }

    function emailText($value) {
        $value = stripslashes(trim($value));
        $value = str_replace('"', "\"", $value);
        $value = str_replace('"', "\"", $value);
        $value = preg_replace('/[^(\x20-\x7F)\x0A]*/', '', $value);
        return stripslashes($value);
    }

    function paymentCanceLTemplete($msg, $name, $ticket, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[TICKET_NO]")) {
            $msg = str_replace("[TICKET_NO]", $ticket, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", $sitename, $msg);
        }
        return $msg;
    }

    function paymentSuccessTemplete($msg, $name, $ticket, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[TICKET_NO]")) {
            $msg = str_replace("[TICKET_NO]", $ticket, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", $sitename, $msg);
        }
        return $msg;
    }

    function contactUs($msg, $name, $email, $phone, $subject, $body_subject, $uMessage, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[PHONE]")) {
            $msg = str_replace("[PHONE]", $phone, $msg);
        }
        if (strstr($msg, "[SUBJECT]")) {
            $msg = str_replace("[SUBJECT]", $subject, $msg);
        }
        if (strstr($msg, "[BODY_SUBJECT]")) {
            $msg = str_replace("[BODY_SUBJECT]", $body_subject, $msg);
        }
        if (strstr($msg, "[UMSG]")) {
            $msg = str_replace("[UMSG]", $uMessage, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", $sitename, $msg);
        }
        return $msg;
    }

    function sendEmail($to, $from, $subject, $message, $header = 1, $footer = 1) {
        if ($header) {
            $hdr = '';
        }
        if ($footer) {

            $ftr = '';
        }

        //echo $from;exit;
        $subscripbe = '';
        if ($to) {
            $table = TableRegistry::get('Users');
            $unique = $table->find('all')->select(['unique_id'])->where(['email' => $to])->first()->unique_id;
            $userId = $table->find('all')->select(['unique_id'])->where(['email' => $to])->first()->id;
            $subscripbe = '<a href="' . SITE_NAME . 'unsubscrib?id=' . $unique . '" target="_blank" style="text-algin:center;color:#777777;text-decoration:underline;" >Unsubscribe </a>&nbsp;&nbsp;';
        }
        if (strstr($message, "[SUBCRIBE]")) {
            $message = str_replace("[SUBCRIBE]", $subscripbe, $message);
        }



        $message = $hdr . $message . $ftr;
        $to = $this->emailText($to);
        $subject = $this->emailText($subject);
        $message = $this->emailText($message);
        $message = str_replace("<script>", "&lt;script&gt;", $message);
        $message = str_replace("</script>", "&lt;/script&gt;", $message);
        $message = str_replace("<SCRIPT>", "&lt;script&gt;", $message);
        $message = str_replace("</SCRIPT>", "&lt;/script&gt;", $message);

        //   // $email = new Email('default');
        //     $email = new Email();
        //     //$email->transport('default');
        //     $res = $email->from($from)
        //             ->to($to)
        //             ->emailFormat('html')
        //             ->subject($subject)
        //             ->viewVars(array('msg' => $message))
        //             ->send($message);
        // $headers = "From: support@drapefittest.com" . "\r\n"."CC: debmicrofinet@gmail.com";
        // // $headers = 'MIME-Version: 1.0' . "\r\n";
        // // $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // // $headers.= 'From:' . $from . "\r\n";
        // if (mail($to, 'subject', 'hello', $headers)) {
        //     return true;
        // } else {
        //     return false;
        // }
        //$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        ////$headers.= 'From: Drepefittest<' . $from . "> \r\n";
        //  $headers .= 'Content-type: text/html; UTF-8' . "";
        // $headers = 'From: Drepefittest<' . $from . "> \r\n";
        // $headers .= "Reply-To: " . $from . "\r\n";
        // $headers .= "Return-Path: " . $from . "\r\n";
        // $headers .= "CC: suprakash8906@gmail.com\r\n";
        // $headers .= "BCC: suprakash8906@gmail.com\r\n";
        // $headers .= 'Content-type: text/html; UTF-8' . "";
        // $headers .= "X-Priority: 3\r\n";
        // $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
        // if (mail($to, $subject, $message, $headers, ' -f' . $from)) {
        //     return true;
        // } else {
        //     return false;
        // }




        $email = new Email();
        $email->transport('mailjet');
        //$email->transport('default');
        $res = $email->from($from)
                ->to($to)
                ->bcc('devadash143@gmail.com')
                ->emailFormat('html')
                ->subject($subject)
                ->viewVars(array('msg' => $message))
                ->send($message);
    }

    function filterData($data) {
        /* this function is meant for filtering whole data received from the screen */
        $filteredData = array_map(function($v) {
            if (is_array($v)) {
                return $this->filterData($v);
            } else {
                return trim(strip_tags($v));
            }
        }, $data);

        return $filteredData;
    }

    function formatForgetPassword($msg, $name, $email, $link, $site_name) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[LINK]")) {
            $msg = str_replace("[LINK]", $link, $msg);
        }
        if (strstr($msg, "[SITELINK]")) {
            $msg = str_replace("[SITELINK]", HTTP_ROOT, $msg);
        }
        if (strstr($msg, "[SITENAME]")) {
            $msg = str_replace("[SITENAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function helpformat($msg, $name, $email, $message, $date) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[MSG]")) {
            $msg = str_replace("[MSG]", $message, $msg);
        }

        if (strstr($msg, "[DATE]")) {
            $msg = str_replace("[DATE]", $date, $msg);
        }
        return $msg;
    }

    function createAdminFormat($msg, $name, $email, $pwd, $site_name) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[PASSWORD]")) {
            $msg = str_replace("[PASSWORD]", $pwd, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function kidProfileStart($msg, $name, $kidname, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[KIDNAME]")) {
            $msg = str_replace("[KIDNAME]", $kidname, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", $sitename, $msg);
        }
        return $msg;
    }

    function kidProfileComplete($msg, $name, $kidname, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[KIDNAME]")) {
            $msg = str_replace("[KIDNAME]", $kidname, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", $sitename, $msg);
        }
        return $msg;
    }

    function paymentEmail($msg, $name, $message, $site_name) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[MESSAGE]")) {
            $msg = str_replace("[MESSAGE]", $message, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function paymentEmailCount($msg, $name, $message, $site_name, $paymentCount) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[MESSAGE]")) {
            $msg = str_replace("[MESSAGE]", $message, $msg);
        }
        if (strstr($msg, "[COUNT]")) {
            $msg = str_replace("[COUNT]", $paymentCount, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function referenceEmail($msg, $name, $message, $site_name, $refer) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[MESSAGE]")) {
            $msg = str_replace("[MESSAGE]", $message, $msg);
        }

        if (strstr($msg, "[REFER_NAME]")) {
            $msg = str_replace("[REFER_NAME]", "<a href='" . HTTP_ROOT . 'refer/' . $refer . "'>Click here </a>", $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function create_image($name) {
        $im = @imagecreate(200, 200) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 255, 0);  // yellow
        imagepng($im, BARCODE . $name);
        imagedestroy($im);
    }

    function create_profile_image($name) {
        $im = @imagecreate(200, 200) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 255, 0);  // yellow
        imagepng($im, BARCODE_PROFILE . $name);
        imagedestroy($im);
    }

    function getKidsId($userId = null) {
        $table = TableRegistry::get('Products');
        $query = $table->find('all')->where(['Products.user_id' => $userId, 'Products.kid_id !=' => 0])->select(['Products.kid_id']);
//        pj($query);exit;
        return $query;
    }

    function order($msg, $name, $site_name, $productData, $total, $subtotal, $sales_tax) {
        if (strstr($msg, "[CUSTOMER_NAME]")) {
            $msg = str_replace("[CUSTOMER_NAME]", $name, $msg);
        }

        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        if (strstr($msg, "[PRODUCTDATA]")) {
            $msg = str_replace("[PRODUCTDATA]", $productData, $msg);
        }
        if (strstr($msg, "[TOTAL]")) {
            $msg = str_replace("[TOTAL]", number_format($total, 2), $msg);
        }
        if (strstr($msg, "[SUBTOTAL]")) {
            $msg = str_replace("[SUBTOTAL]", number_format($subtotal, 2), $msg);
        }
        if (strstr($msg, "[TAX]")) {
            $msg = str_replace("[TAX]", number_format($sales_tax, 2), $msg);
        }
        return $msg;
    }

    function promocodesend($msg, $promocode, $price, $comment, $sitename) {
        if (strstr($msg, "[PROMOCODE]")) {
            $msg = str_replace("[PROMOCODE]", $promocode, $msg);
        }
        if (strstr($msg, "[PRICE]")) {
            $msg = str_replace("[PRICE]", $price, $msg);
        }
        if (strstr($msg, "[COMMENT]")) {
            $msg = str_replace("[COMMENT]", $comment, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function giftcodesend($msg, $giftcode, $price, $comment, $sitename) {
        if (strstr($msg, "[GIFTCODE]")) {
            $msg = str_replace("[GIFTCODE]", $giftcode, $msg);
        }
        if (strstr($msg, "[PRICE]")) {
            $msg = str_replace("[PRICE]", $price, $msg);
        }
        if (strstr($msg, "[COMMENT]")) {
            $msg = str_replace("[COMMENT]", $comment, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function orderK($msg, $name, $site_name, $customer_data, $kid_data, $detailsKid, $total, $subtotal, $sales_tax) {

        $usersData = '';
        $style_pick_total = 0;
        $i = 1;
        //pj($detailsKid); exit;
        foreach ($customer_data as $customer_data_review) {

            if ($customer_data_review->keep_status == 3) {
                $price = $customer_data_review->sell_price;
            } else {
                $price = 0;
            }

            if ($customer_data_review->keep_status == 3) {
                $keep = 'Keeps';
            } elseif ($customer_data_review->keep_status == 2) {
                $keep = 'Exchange';
            } else {
                $keep = 'Return';
            }
            $style_pick_total += (double) $customer_data_review->sell_price;
            $usersData .= "<tr style='border-bottom: 1px solid black;text-align: left;'>
                        <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               #or " . $i++ . "
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               <img src='" . HTTP_ROOT . PRODUCT_IMAGES . $customer_data_review->product_image . "' style='width: 100px;'/>
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $customer_data_review->product_name_one . "
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $customer_data_review->product_name_two . "
                            </td>
                           <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                                " . $keep . "
                            </td> 
                            
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $customer_data_review->size . "
                            </td>                  
                                                      
                            <td style='text-align: center;padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               $" . number_format($price, 2) . "
                            </td>
                    </tr>";
        }

        $style_pick_totalkids = 0;
        $i = 1;
        $namek = '';
        foreach ($kid_data as $customer_data_review) {
            $namek .= "<tr><th colspan='5' style = 'text-align: center;'>
                       Kids Name:- " . $customer_data_review->kids_detail->kids_first_name .
                    " </th></tr>";
            $s = 1;
            foreach ($detailsKid[$customer_data_review->kid_id] as $kidsp) {

                if ($kidsp->keep_status == 3) {
                    $keep = 'Keeps';
                } elseif ($kidsp->keep_status == 2) {
                    $keep = 'Exchange';
                } else {
                    $keep = 'Return';
                }

                if ($kidsp->keep_status == 3) {
                    $price = $kidsp->sell_price;
                } else {
                    $price = 0;
                }


                $namek .= "<tr style='border-bottom: 1px solid black;text-align: left;'>
                        <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               # " . $s . "
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                              <img src='" . HTTP_ROOT . PRODUCT_IMAGES . $kidsp->product_image . "' style='width: 100px;'/>
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $kidsp->product_name_one . "
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $kidsp->product_name_two . "
                            </td>
                           <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                                " . $keepkid . "
                            </td> 
                            
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $kidsp->size . "
                            </td>                  
                                                       
                            <td style='text-align: center;padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               $" . number_format($kidsp->sell_price, 2) . "
                            </td>
                        </tr>";

                $s++;
            }
            $i++;
        }









        $msg = "<div style='width: 100%;text-align: center;'>
    <h5 style='color:#5a5656;'>Your check out receipt</h5>
    <table align='center' style='width:90%;'>
        <thead>
            <tr>
                <th style='padding: 10px 0px;font-size:30px;border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;background: #000;'>
                    <span style='font-weight: 100;color: #fff;'>DrapeFit</span>
                </th>
            </tr>
            <tr>
                <th>
                    <h2 style='padding-top: 30px;margin:0;font-size: 30px;color:#d64ade'>Checkout Receipt</h2>
                    <h4 style='font-size: 13px;color:#5a5656;'>Here's the receipt</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table style='width: 100%;text-align: right;'>
                        <tr >
                            <th  colspan='6' style='text-align: center;'>
                                Your Stylist Picks
                            </th>
                        </tr>
                        <tr style='border: 1px solid black;text-align: left;'>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Sno
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Image
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Product name 1
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Product name 2
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                KEEPING
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Size
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Cost
                            </th>
                        </tr>
                         <tr>
                            <th colspan='5'  style = 'text-align: center;'>
                                Customer Name:- " . $name . "
                            </th>


                        </tr>" . $usersData . "  
                         
                        
                        " . $namek . "


                        <tr>
                            <td colspan='5' style='text-align: right;padding-bottom: 20px;'>
                                Stylist Picks Subtotal
                            </td>
                            <td style='text-align: center;padding-bottom: 30px;padding-top: 10px;'>
                                $" . $subtotal . "
                            </td>
                        </tr>



                        <tr>
                            <td colspan='5' style='text-align: right;padding-bottom: 10px;'>
                                order Subtotal
                            </td>
                            <td style='text-align: center;padding-bottom: 10px;'>
                                $" . $subtotal . "
                            </td>
                        </tr>	
                        <tr>
                            <td colspan='5' style='text-align: right;padding-bottom: 10px;'>
                                Sales tax
                            </td>
                            <td style='text-align: center;padding-bottom: 10px;'>
                                $" . $sales_tax . "
                            </td>
                        </tr>	
                        <tr>
                            <td colspan='5 style='text-align: right;padding-bottom: 10px;border-bottom: 1px solid #ddd;'>
                                <strong>order total</strong>
                            </td>
                            <td style='text-align: center;padding-bottom: 10px;border-bottom: 1px solid #ddd;'>
                                $" . $total . "
                            </td>
                        </tr>
                        <tr>
                            <td colspan='5' style='text-align: center;padding-bottom: 120px;border-bottom: 1px solid #ddd;'>
                                <em><strong style='font-size: 13px;'>Thanks for letting us style you.</strong></em>
                            </td>
                        </tr>	
                    </table>	
                </td>
            </tr>
        </tbody>
    </table>	
</div>";

        return $msg;
    }

    function timeElapsedString($datetime) {
        $now = date_create(date("Y-m-d H:i:s"));  //current date
        $your_date = date_create($datetime);   //Your Date
        $datediff = date_diff($now, $datetime);

        if ($datediff->format('%d') == 0) {
            $date = date_format($datetime, "H:i:s A");
        } else {
            $date = date_format($your_date, "M j, y");
        }
        return $date;
    }

    function EmployeeAssignedFormat($msg, $profile_name, $name, $site_name) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }

        if (strstr($msg, "[PNAME]")) {
            $msg = str_replace("[PNAME]", $profile_name, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function productFinalize($msg, $profile_name, $name, $site_name) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }

        if (strstr($msg, "[PNAME]")) {
            $msg = str_replace("[PNAME]", $profile_name, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function loginRedirectAjax($userId) {
        $table = TableRegistry::get('Users');
        $table2 = TableRegistry::get('UserDetails');
        $afterLoginCheck = $table->find('all')->where(['id' => $userId])->first();
        $afterLoginCheck2 = $table2->find('all')->where(['user_id' => $userId])->first();

        if ($afterLoginCheck->is_redirect == 0 && $afterLoginCheck2->is_progressbar != 100) {
            $url = 'welcome/style/';
        } elseif ($afterLoginCheck->is_redirect == 0 && $afterLoginCheck2->is_progressbar == 100) {

            $url = 'welcome/schedule/';
        } elseif ($afterLoginCheck->is_redirect == 1) {
            $url = 'welcome/schedule/';
        } elseif ($afterLoginCheck->is_redirect == 2) {
            $url = 'not-yet-shipped';
        } elseif ($afterLoginCheck->is_redirect == 3) {
            $url = 'profile-review/';
        } elseif ($afterLoginCheck->is_redirect == 4) {
            $url = 'order_review/';
        } elseif ($afterLoginCheck->is_redirect == 5) {
            $url = 'calendar-sechedule/';
        } elseif ($afterLoginCheck->is_redirect == 6) {
            $url = 'customer-order-review';
        }
        return $url;
    }

    function notifications($userId, $kid_id, $msg) {
        $notifications = TableRegistry::get('Notifications');
        $notificationsTable = $notifications->newEntity();
        $notificationsTable->user_id = $userId;
        $notificationsTable->msg = $msg;
        $notificationsTable->is_read = 0;
        $notificationsTable->created = data('Y-m-d H:i:s');
        $notificationsTable->kid_id = $kid_id;
        $this->$notifications->save($notificationsTable);
        return 1;
    }

}
