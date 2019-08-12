<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

require_once(ROOT . '/vendor/' . DS . '/barcode/vendor/autoload.php');

use \PHPExcel_IOFactory;

class AppadminsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Custom');
//$this->loadComponent('Phpoffice');
        $this->loadComponent('Flash');
        $this->loadModel('Users');
        $this->loadModel('Promocode');
        $this->loadModel('UserDetails');
        $this->loadModel('PaymentGetways');
        $this->loadModel('Products');
        $this->loadModel('MenStats');
        $this->loadModel('MensBrands');
        $this->loadModel('MenFit');
        $this->loadModel('MenStats');
        $this->loadModel('MenStyle');
        $this->loadModel('MenStyleSphereSelections');
        $this->loadModel('KidsDetails');
        $this->loadModel('TypicallyWearMen');
        $this->loadModel('ShippingAddress');
        $this->loadModel('Settings');
//women tables
        $this->loadModel('SizeChart');
        $this->loadModel('style_quizs');
        $this->loadModel('UserDetails');
        $this->loadModel('YourProportions');
        $this->loadModel('CustomerProductReview');

        $this->loadModel('FitCut');
        $this->loadModel('FlauntArms');
        $this->loadModel('WemenJeansLength');
        $this->loadModel('WomenJeansRise');
        $this->loadModel('WomenJeansStyle');
        $this->loadModel('WomenPrintsAvoid');
        $this->loadModel('WomenTypicalPurchaseCloth');
        $this->loadModel('WomenIncorporateWardrobe');
        $this->loadModel('WomenFabricsAvoid');
        $this->loadModel('WomenColorAvoid');
        $this->loadModel('WomenPrice');
        $this->loadModel('WomenStyle');
        $this->loadModel('WomenInformation');
        $this->loadModel('WomenRatherDownplay');
        $this->loadModel('PersonalizedFix');
        $this->loadModel('LetsPlanYourFirstFix');
        $this->loadModel('KidsDetails');
        $this->loadModel('KidsPersonality');
        $this->loadModel('KidsPrimary');
        $this->loadModel('KidsSizeFit');
        $this->loadModel('KidClothingType');
        $this->loadModel('FabricsOrEmbellishments');
        $this->loadModel('KidStyles');
        $this->loadModel('KidsPricingShoping');
        $this->loadModel('KidPurchaseClothing');
        $this->loadModel('DeliverDate');
        $this->loadModel('ChatCategoryImages');
        $this->loadModel('UserMailTemplatePromocode');
        $this->loadModel('Pages');
        $this->loadModel('SocialMedia');
        $this->loadModel('Catelogs');
        $this->loadModel('KidFocusOnSending');
        $this->loadModel('PaymentCardDetails');
        $this->loadModel('StyleQuizs');
        $this->loadModel('WearType');
        $this->loadModel('KidsPpricingShoping');
        $this->loadModel('TShirtsWouldWear');
        $this->loadModel('UserUsesPromocode');
        $this->loadModel('UserUsesPromocode');
        $this->loadModel('ChatMessages');
        $this->loadModel('EmailPreferences');
        $this->loadModel('HelpDesks');
        $this->loadModel('MyItem');
        $this->loadModel('Payments');
        $this->loadModel('RatherDownplay');
        $this->loadModel('your_child_fix');
        $this->loadModel('ClothingCategoriesWeAvoid');
        $this->loadModel('ReferFriends');
        $this->loadModel('Wallets');
        $this->loadModel('Giftcard');
        $this->loadModel('UserMailTemplateGiftcode');
        $this->loadModel('UserUsesGiftcode');
        $this->loadModel('UserUsesPromocode');
        $this->loadModel('Notifications');
        $this->loadModel('MenAccessories');
        $this->loadModel('CustomDesine');
        $this->loadModel('WomenHeelHightPrefer');
        $this->loadModel('WomenShoePrefer');
        $this->loadModel('WemenStyleSphereSelections');
        $this->loadModel('PaymentGetways');


//women tables

        $this->viewBuilder()->layout('admin');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['logout']);
    }

    public function index($id = null) {

        $this->viewBuilder()->layout('admin');

//        if (!empty(@$userid)) {
//           
//        }

        if ($this->Auth->user('type') == 3) {
            $empId = $this->request->session()->read('Auth.User.id');
            $paid_users = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.emp_id' => $empId]);

            $men_count = $this->PaymentGetways->find('all')->where(['profile_type' => 1, 'emp_id' => $empId])->count();
            $women_count = $this->PaymentGetways->find('all')->where(['profile_type' => 2, 'emp_id' => $empId])->count();
            $kid_count = $this->PaymentGetways->find('all')->where(['profile_type' => 3, 'emp_id' => $empId])->count();
        } else {
            $paid_users = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1]);
            $userid = $paid_users->extract('user_id')->toArray();
            /*
              $men_count = $this->UserDetails->find('all')->where(['UserDetails.user_id IN' => $userid, 'UserDetails.gender' => 1])->count();
              $women_count = $this->UserDetails->find('all')->where(['UserDetails.user_id IN ' => $userid, 'UserDetails.gender' => 2])->count();
              $kid_count = $this->KidsDetails->find('all')->where(['KidsDetails.user_id IN' => $userid])->count();
             */

            $men_count = $this->PaymentGetways->find('all')->where(['profile_type' => 1])->count();
            $women_count = $this->PaymentGetways->find('all')->where(['profile_type' => 2])->count();
            $kid_count = $this->PaymentGetways->find('all')->where(['profile_type' => 3])->count();
        }





        $this->set(compact('paid_users', 'men_count', 'women_count', 'kid_count'));
    }

    public function profile($param = null) {
        $user_id = $this->request->session()->read('Auth.User.id');
        $rowname = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
//        pj($rowname);exit;
        $getCurPassword = $this->Users->find('all', ['fields' => ['password']])->where(['Users.id' => $user_id])->first();
        $settingsEmailTempletes = $this->Settings->find('all')->where(['Settings.type' => 2])->group('Settings.id');

        $row = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
        $type = $this->request->session()->read('Auth.User.type');
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            $user = $this->Users->patchEntity($user, $data);
            $user->id = $this->request->session()->read('Auth.User.id');
            if (!empty($data['changepassword']) == 'Change password') {
                $passCheck = $this->Users->check($data['current_password'], $getCurPassword->password);
                if ($passCheck != 1) {
                    $this->Flash->error(__('Current password is incorrect.'));
                    return $this->redirect(['action' => 'profile/changepassword']);
                } else if ($data['password'] != $data['cpassword']) {
                    $this->Flash->error(__('Password and Confirm password fields do not match'));
                    return $this->redirect(['action' => 'profile/changepassword']);
                } else {
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Password has been chaged successfully.'));
                        return $this->redirect(['action' => 'profile/changepassword']);
                    } else {
                        $this->Flash->error(__('Password could not be change. Please, try again.'));
                        return $this->redirect(['action' => 'profile/changepassword']);
                    }
                }
            } else if ($data['general'] == 'save') {
                $set = $this->request->data;
                foreach ($set as $kehfhy => $value) {
                    $condition = array('name' => $kehfhy);
                    $this->Settings->updateAll(['value' => $value], ['name' => $kehfhy]);
                }
                $this->Flash->success(__('Communication emaill has been updated successfully.'));
                $this->redirect(HTTP_ROOT . 'appadmins/profile/communication');
            } else {
                if (@$data['name'] == '') {
                    $this->Flash->error(__("Please enter your name"));
                } else if ($data['email'] == '') {
                    $this->Flash->error(__("Please enter your email"));
                } else {
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The Profile has been update.'));
                        return $this->redirect(['action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The Profile could not be update. Please, try again.'));
                    }
                }
            }
        }
        $settings = $this->Settings->find('all', ['order' => 'Settings.id DESC'])
                ->where(['Settings.type' => 1, 'Settings.is_active' => 1]);

        $this->set(compact('rowname', 'settings', 'settingsEmailTempletes', 'row', 'user', 'row', 'options', 'param', 'user_id'));
    }

   public function viewUsers($payment_id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
//for stylist
        if ($type == 3) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 1])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            foreach ($userdetails as $details) {

                // code use for users barcode image generater


                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 1) {//for admin
            if ($payment_id) {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.id' => $payment_id])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status IN' => [0, 1]])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            $i = 1;

            foreach ($userdetails as $details) {

                $kidCount[$i] = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => 3, 'PaymentGetways.user_id' => $details->id])->count();
                $mass_product_count[@$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0, 'payment_id' => $details->id])->count();
                $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();

                $i++;
            }



            $staff_assigned_user = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id])->order(['PaymentGetways.created_dt' => 'DESC']);
        }

        foreach ($userdetails as $details) {

            if ($details->kid_id == 0) {
                $getCheckBarcode = $this->UserDetails->find('all')->where(['user_id' => $details->user_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->user_id . '.png';
                        $barcode_value = $getCheckBarcode->user_id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));

                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);

                        $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $details->user_id]);
                    }
                }
            } else {
                $getCheckBarcode = $this->KidsDetails->find('all')->where(['id' => $details->kid_id])->first();
                if ($getCheckBarcode->barcode_image == '') {
                    if (@$getCheckBarcode->id) {
                        $name = $getCheckBarcode->id . '.png';
                        $barcode_value = $getCheckBarcode->id;
                        $this->Custom->create_profile_image($name);
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));

                        list($type, $dataImg) = explode(';', $dataImg);
                        list(, $dataImg) = explode(',', $dataImg);
                        $dataImg = base64_decode($dataImg);
                        file_put_contents(BARCODE_PROFILE . $name, $dataImg);

                        $this->KidsDetails->updateAll(['barcode_image' => $name], ['id' => $details->kid_id]);
                    }
                }
            }
        }


        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count'));
    }

    public function previousworklist($payment_id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        $id = $this->request->session()->read('Auth.User.id');
        $mass_kid_product_count = array();
        $mass_product_count = array();
//for staff
        if ($type == 3) {
            if ($payment_id) {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $payment_id,])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id, 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }


            foreach ($userdetails as $details) {

                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();
            }
        } elseif ($type == 1) {//for admin
            if ($payment_id) {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.id' => $payment_id])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            } else {
                $employee = $this->Users->find('all')->where(['Users.type' => 3, 'Users.is_active' => 1]);
                $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails', 'Users.KidsDetails', 'Users.MenStats', 'Users.SizeChart'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1, 'PaymentGetways.work_status' => 2])->order(['PaymentGetways.created_dt' => 'DESC'])->group(['PaymentGetways.id']);
            }

            $mass_product_count = array();
            $i = 1;

            foreach ($userdetails as $details) {
                $kidCount[$i] = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => 3, 'PaymentGetways.user_id' => $details->user_id])->count();


                $mass_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id =' => 0])->count();
                $mass_kid_product_count[$details->id] = $this->Products->find('all')->where(['Products.payment_id' => $details->id, 'Products.kid_id !=' => 0])->count();

                $i++;
            }


            //$datacount=$this->Products->find('all')->where(['Products.kid_id' => 6, 'Products.payment_id' => 9,'Products.kid_id !=' => 0])->count();
            //echo $datacount; 
            // pj($mass_kid_product_count); exit;


            $staff_assigned_user = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.emp_id' => $id])->order(['PaymentGetways.created_dt' => 'DESC']);
        }


        $this->set(compact('paymentCount', 'kid_assigned', 'kidCount', 'userdetails', 'mass_product_count', 'employee', 'type', 'id', 'staff_assigned_user', 'mass_kid_product_count'));
    }

    public function kidProfile($payment_id = null) {
        $useridDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $payment_id])->first();
        $userid = $useridDetails->user_id;
        $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid,'default_set'=>1])->first();
        $this->KidsDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $kid = $this->KidsDetails->find('all')->contain(['Users', 'KidsPersonality', 'KidsSizeFit', 'KidClothingType', 'KidsPrimary', 'KidsPricingShoping', 'KidPurchaseClothing', 'KidStyles'])->where(['KidsDetails.id' => $useridDetails->kid_id])->group(['KidsDetails.id'])->first();
       // echo "<pre>";
       // print_r($kid); exit;
        
        $KidsSizeFit = $this->KidsSizeFit->find('all')->where(['KidsSizeFit.kid_id' => $useridDetails->kid_id])->first();

         $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $useridDetails->kid_id])->first();
         $designe = $this->CustomDesine->find('all')->where(['kid_id' => $useridDetails->kid_id])->first();
         $KidStyles = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $useridDetails->kid_id])->first();
        //pj(@$kid); exit;
        $kid_barcode = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $userid])->first();
        if ($payment_id) {
            $name = $payment_id . '.png';
            $barcode_value = $payment_id;
            $this->Custom->create_profile_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));

            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE_PROFILE . $name, $dataImg);

            $this->KidsDetails->updateAll(['barcode_image' => $name], ['user_id' => $userid]);
        }


        $this->set(compact('useridDetails','kid_barcode', 'kid','KidsSizeFit','KidClothingType','designe','KidStyles','shipping_address'));
    }

    public function delete($id = null, $table = null) {
        $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();
        $data = $this->$table->get($id);
        $dataDelete = $this->$table->delete($data);
        if ($table == 'Users') {
            $this->Flash->success(__('Users has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
        } else {
            $this->Flash->success(__('Data has been deleted successfully.'));
            $this->redirect($this->referer());
        }
    }

    public function addproduct($paymentId = null, $productId = null) {
        $product = $this->Products->newEntity();
        $userIdp = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
        $userId = $userIdp->user_id;
        if (@$_REQUEST['exchange']) {
            $productCheckOut = 0;
        } else {
            $productCheckOut = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status = ' => 0, 'Products.checkedout IN ' => ['N'],])->count();
        }


        // echo $productCheckOut; exit;
        $user_name = $this->Users->find('all')->where(['Users.id' => $userId])->first();
        $user_type = $this->request->session()->read('Auth.User.type');
//        pj($user_name);exit;
        if (@$paymentId && @$productId) {
            $productEditDetails = $this->Products->find('all')->where(['Products.id' => @$productId])->first();
        }




        if ($this->request->is('post')) {
            $data = $this->request->data;

            if (@$data['id']) {
                $data['id'] = $data['id'];
                $editData = $this->Products->find('all')->where(['Products.id' => $data['id']])->first();
            } else {
                $maxId = $this->Products->find('all')->order(['Products.id' => 'DESC'])->first();
                $ownId = @$maxId->id + 1;
                $name = $ownId . '.png';
                $barcode_value = $data['payment_id'] . $ownId;
                $this->Custom->create_image($name);
                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                //  $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::YPE_EAN_2));
                list($type, $dataImg) = explode(';', $dataImg);
                list(, $dataImg) = explode(',', $dataImg);
                $dataImg = base64_decode($dataImg);
                file_put_contents(BARCODE . $name, $dataImg);

                $data['barcode_image'] = $name;
                $data['barcode_value'] = $barcode_value;
                $data['user_id'] = $data['user_id'];
//$data['is_retrun'] = 1;
//                pj($data['user_id']);exit;
//$data['payment_id'] = $data['payment_id'];
                $data['payment_id'] = $paymentId;
                @$data['id'] = '';
            }




            if (@$data['dataexchange']) {
                $exchangeId = $data['dataexchange'];
                $exchangeData = $this->Products->find('all')->where(['Products.id' => $exchangeId])->first();
                if ($exchangeData) {
                    $this->Products->updateAll(['is_altnative_product' => 1, 'is_complete' => 1], ['id' => $exchangeId]);
                    $cenvertedTime = date('Y-m-d H:i:s', strtotime('+3 seconds', strtotime($exchangeData->created)));
                    $data['created'] = $cenvertedTime;
                    $data['is_altnative_product'] = 0;
                    $data['is_exchange_pending'] = 1;
                }
            } else {
                $data['created'] = date('Y-m-d H:i:s');
            }

            $data['product_purchase_date'] = date('Y-m-d', strtotime(@$data['product_purchase_date']));
            $data['product_valid_return_date'] = date('Y-m-d', strtotime(@$data['product_valid_return_date']));


            if (!empty($data['image']['tmp_name'])) {
                if ($data['image']['size'] <= 8000) {
                    $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], PRODUCT_IMAGES, 400);
                    $data['product_image'] = $imageName;
                } else {
                    $this->Flash->error(__('Image size should be 8  to 10 kb'));
                }
            } else {
                $data['product_image'] = $editData->product_image;
            }

            if (!empty($data['product']['tmp_name'])) {
                if ($data['product']['size'] <= 8000) {
                    $imageName1 = $this->Custom->uploadImageBanner($data['product']['tmp_name'], $data['product']['name'], PRODUCT_RECEIPT, 400);
                } else {
                    $this->Flash->error(__('Image size should be 8  to 10 kb'));
                }
                $data['product_receipt'] = $imageName1;
            } else {
                $data['product_receipt'] = @$editData->product_receipt;
            }

// $data['is_retrun'] = 1;
            $product = $this->Products->patchEntity($product, $data);


            $this->Products->save($product);
            $this->PaymentGetways->updateAll(['mail_status' => 0], ['id' =>$paymentId]);

            if (@$data['id']) {

                $this->Flash->success(__('Data has been updated successfully.'));

                return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId . '/' . $data['id']);
            } else {
                $this->Flash->success(__('Data has been added successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $paymentId);
            }
        }

        $productcount = $this->Products->find('all')->where(['Products.user_id' => $userId, 'Products.kid_id =' => 0])->count();
        if ($userId) {


            $productdetails = $this->Products->find('all')->where(['Products.user_id' => $userId, 'Products.payment_id' => $paymentId, 'Products.kid_id =' => 0])->order(['Products.created' => 'DESC']);
            //pj($productdetails);exit;
        }
        $this->set(compact('productCheckOut', 'user_type', 'userId', 'productId', 'productdetails', 'productEditDetails', 'productcount', 'user_name', 'paymentId'));
    }

    public function viewproductlist($paymentId = null, $productId = null) {
        $product = $this->Products->newEntity();
        $userId = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first()->user_id;
        $user_name = $this->Users->find('all')->where(['Users.id' => $userId])->first();
        $user_type = $this->request->session()->read('Auth.User.type');
        if (@$userId && @$productId) {
            $productEditDetails = $this->Products->find('all')->where(['Products.id' => @$productId])->first();
        }

        $productcount = $this->Products->find('all')->where(['Products.user_id' => $userId, 'Products.kid_id =' => 0])->count();
        if ($userId) {
            $getPaymentDetail = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $userId, 'emp_id' => $this->Auth->user('id')])->first();
            $productdetails = $this->Products->find('all')->where(['Products.user_id' => $userId, 'Products.payment_id' => $paymentId, 'Products.kid_id =' => 0])->order(['Products.created' => 'DESC']);
        }
        $this->set(compact('user_type', 'userId', 'productId', 'productdetails', 'productEditDetails', 'getPaymentDetail', 'productcount', 'user_name', 'paymentId'));
    }

    public function welcomeCms() {
        $this->viewBuilder()->layout('admin');
        $welcomeCms = $this->WelcomeCms->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $welcomeCms->id = 1;
            $welcomeCms = $this->WelcomeCms->patchEntity($welcomeCms, $data);
            $this->WelcomeCms->save($welcomeCms);
            $this->Flash->success(__('Data has been update successfully.'));
        }
        $data = $this->WelcomeCms->find('all')->where(['WelcomeCms.id' => 1])->first();
        $this->set(compact('welcomeCms', 'data'));
    }

    public function featuredOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->FeatureEvents->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function customerTestimonials($id = null) {
        $dataEntity = $this->Testimonials->newEntity();
        if ($id) {
            $dataEdit = $this->Testimonials->find('all')->where(['Testimonials.id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Testimonials->patchEntity($dataEntity, $data);
//     if (!empty($data['image']['tmp_name'])) {
//      $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], CUSTOMER, 96);
//      $dataEntity->image = $imageName;
//     }
            $dataEntity->image = '0';
            $dataEntity->is_active = 1;
            $this->Testimonials->save($dataEntity);
            if ($data['id']) {
                $this->Flash->success(__('Data has been update successfully.'));
            } else {
                $this->Flash->success(__('Data has been add successfully.'));
            }
            return $this->redirect(HTTP_ROOT . 'appadmins/customer_testimonials');
        }
        $dataListings = $this->Testimonials->find('all')->order(['Testimonials.sort_order']);
        $this->set(compact('id', 'dataEdit', 'dataEntity', 'dataListings'));
    }

    public function customerOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->Testimonials->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function socialMedia($id = null) {
        $dataEntity = $this->SocialMedia->newEntity();
        if (@$id) {
            $dataEdit = $this->SocialMedia->find('all')->where(['SocialMedia.id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->SocialMedia->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $this->SocialMedia->save($dataEntity);
            $this->Flash->success(__('Data has been add successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/social_media');
        }
        $dataListings = $this->SocialMedia->find('all')->order(['SocialMedia.sort_order']);
        $this->set(compact('dataEdit', 'id', 'dataEntity', 'dataListings'));
    }

    public function socialmediaOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->SocialMedia->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function footerCms($id = null) {
        if ($id) {
            $row = $this->FooterSettings->find('all')->where(['FooterSettings.id' => $id])->first();
        }
        $dataEntity = $this->FooterSettings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->FooterSettings->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $this->FooterSettings->save($dataEntity);
            $this->Flash->success(__('Data has been add successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/footer_cms');
        }
        $dataListings = $this->FooterSettings->find('all')->order(['FooterSettings.id']);
        $this->set(compact('row', 'id', 'dataEntity', 'dataListings'));
    }

    public function metaTitle($id = null) {
        if ($id) {
            $row = $this->Pages->find('all')->where(['Pages.id' => $id])->first();
        }
        $dataEntity = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Pages->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $this->Pages->save($dataEntity);
            $this->Flash->success(__('Meta data  has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/meta_title');
        }
        $dataListings = $this->Pages->find('all')->order(['Pages.id' => 'ASC']);
        $this->set(compact('dataListings', 'id', 'row', 'dataEntity'));
    }

    public function cmsPage() {
//    $dataListings = $this->Users->find('all')->where(['Pages.id NOT IN' => [1, 4, 5, 8, 9, 10, 11, 12]])->order(['Pages.id' => 'ASC']);
        $dataListings = $this->Pages->find('all')->order(['Pages.id' => 'DESC']);
        $this->set(compact('dataListings'));
    }

    public function editpages($id = null) {
        if ($id) {
            $row = $this->Pages->find('all')->where(['Pages.id' => $id])->first();
        }
        $dataEntity = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Pages->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $dataEntity->modified = date('Y-m-d H:i:s');
            $this->Pages->save($dataEntity);
            $this->Flash->success(__('User data has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/editpages/' . $data['id']);
        }
        $this->set(compact('id', 'row'));
    }

    public function editMailTempletes($id = null) {
        $this->viewBuilder()->layout('admin');
        $row = $this->Settings->find('all')->where(['Settings.id' => $id])->first();
        $dataEntity = $this->Settings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Settings->patchEntity($dataEntity, $data);
            $this->Settings->save($dataEntity);
            $this->Flash->success(__('Email templet has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/profile/emailTemplete');
        }
        $this->set(compact('id', 'row'));
    }

    public function createAdmin($id = null) {
        $admin = $this->Users->newEntity();
        if ($id) {
            $editAdmin = $this->Users->find('all')->where(['Users.id' => $id])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $admin = $this->Users->patchEntity($admin, $data);
            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();
            $password = @$data['password'];
            $conpassword = @$data['cpassword'];
            if ($exitEmail >= 1) {
                $this->Flash->error(__('This  Email is already exists.'));
            }
            if ($password != $conpassword) {
                $this->Flash->error(__("Password and confirm password are not same"));
            } else {
                $admin->unique_id = $this->Custom->generateUniqNumber();
                $admin->created_dt = date("Y-m-d H:i:s");
                $admin->modified = date("Y-m-d H:i:s");
                $admin->is_active = 1;
                $admin->type = 3;
                if ($id) {
                    $admin->id = $id;
                } else {
                    $admin->id = '';
                }
                if ($this->Users->save($admin)) {
                    if ($id) {
                        $this->Flash->success(__('Data updated successfully.'));
                        return $this->redirect(HTTP_ROOT . 'appadmins/create_admin/' . $id);
                    } else {
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();
                        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                        $to = $admin->email;
                        $from = $fromMail->value;
                        $subject = $emailMessage->display;
                        $sitename = SITE_NAME;
                        $password = $password;
                        $message = $this->Custom->createAdminFormat($emailMessage->value, $admin->name, $admin->email, $password, $sitename);
                        $kid_id = 0;
                        $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                        $this->Flash->success(__('Data add successfully.'));
                        return $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
                    }
                }
            }
        }
        $this->set(compact('admin', 'id', 'editAdmin'));
    }

    public function viewAdmin() {
        $adminLists = $this->Users->find('all', ['Users.id' => 'DESC'])->where(['Users.type' => 3]);
        $this->set(compact('adminLists'));
    }

    public function employeeAssigned() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['emp_id']) {
                $this->PaymentGetways->updateAll(['emp_id' => $data['emp_id'], 'work_status' => 1], ['id' => $data['id']]);
                $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                $getUserId = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['id']])->first();
                $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'EmployeeAssigned'])->first();
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $to = $employee->email;
                $from = $fromMail->value;
                $subject = $emailMessage->display;
                $sitename = SITE_NAME;
                $message = $this->Custom->EmployeeAssignedFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename);
                $kid_id = 0;
                $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                echo " Employee Assigned successfully";
            } else {
                $this->PaymentGetways->updateAll(['emp_id' => '', 'work_status' => 0], ['id' => $data['id']]);
                echo " Employee Not Assigned";
            }
        }

        exit;
    }

    public function employeeAssignedKid() {
        if ($this->request->is('post')) {
            $data = $this->request->data;



            if (@$data['emp_id']) {
                $this->PaymentGetways->updateAll(['profile_type' => 3, 'emp_id' => $data['emp_id'], 'work_status' => '1'], ['id' => $data['id']]);
                $employee = $this->Users->find('all')->where(['Users.id' => $data['emp_id']])->first();
                $getUserId = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['id']])->first();
                $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'EmployeeAssigned'])->first();
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $to = $employee->email;
                $from = $fromMail->value;
                $subject = $emailMessage->display;
                $sitename = SITE_NAME;
                $message = $this->Custom->EmployeeAssignedFormat($emailMessage->value, $getUserDetails->name, $employee->name, $sitename);
                $kid_id = $getUserId->kid_id;
                $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);

                echo " Employee Assigned successfully";
            } else {
                $this->PaymentGetways->updateAll(['emp_id' => '', 'work_status' => 0], ['id' => $data['id']]);
                echo " Employee Not Assigned";
            }
        }
        exit;
    }

    public function review($payent_id = null) {

        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.status' => 1, 'PaymentGetways.id' => $payent_id])->first();
        $id = $userdetails->user_id;
//        pj($userdetails);exit;
        $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $id,'default_set'=>1])->first();
        $MenStats = $this->MenStats->find('all')->where(['MenStats.user_id' => $id])->first();
        //print_r($MenStats); exit;
        $TypicallyWearMen = $this->TypicallyWearMen->find('all')->where(['TypicallyWearMen.user_id' => $id])->first();
        $MenStyle = $this->MenStyle->find('all')->where(['MenStyle.user_id' => $id])->first();
        $MenFit = $this->MenFit->find('all')->where(['MenFit.user_id' => $id])->first();
        $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $id]);
        $menbrand = $MensBrands->extract('mens_brands')->toArray();
        $style_sphere_selections = $this->MenStyleSphereSelections->find('all')->where(['MenStyleSphereSelections.user_id' => $id])->first();
        
       $style_sphere_selectionsWemen = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $id])->first();
        $menSccessories = $this->MenAccessories->find('all')->where(['user_id' => $id])->first();
        $PersonalizedFix = $this->PersonalizedFix->find('all')->where(['PersonalizedFix.user_id' => $id])->first();
        $SizeChart = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $id])->first();
        $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $id])->first();
         $menDesigne = $this->CustomDesine->find('all')->where(['user_id' => $id])->first();

        $WomenJeansStyle = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $id])->first();
        
        
//                pj($WomenJeansStyle);exit;
        $WomenJeansRise1 = $this->WomenJeansRise->find('all')->where(['WomenJeansRise.user_id' => $id]);
        $WomenJeansRise = $WomenJeansRise1->extract('jeans_rise')->toArray();

        $WomenJeansLength1 = $this->WemenJeansLength->find('all')->where(['WemenJeansLength.user_id' => $id]);
        $WomenJeansLength = $WomenJeansLength1->extract('jeans_length')->toArray();
        $Womenstyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $id])->first();
//                pj($Womenstyle);exit;
// $WomenRatherDownplay = $this->WomenRatherDownplay->find('all')->where(['WomenRatherDownplay.user_id' => $this->Auth->user('id')])->first();

        $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $id])->first();
        $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $id])->first();
        $primaryinfo = explode(",", @$Womeninfo->primary_objectives);
//                pj($primaryinfo);exit;

        $womens_brands_plus_low_tier1 = $this->WomenTypicalPurchaseCloth->find('all')->where(['WomenTypicalPurchaseCloth.user_id' => $id]);
        $womens_brands_plus_low_tier = $womens_brands_plus_low_tier1->extract('womens_brands_plus_low_tier')->toArray();

        $style_wardrobe1 = $this->WomenIncorporateWardrobe->find('all')->where(['WomenIncorporateWardrobe.user_id' => $id]);
        $style_wardrobe = $style_wardrobe1->extract('style_wardrobe')->toArray();


        $avoid_colors1 = $this->WomenColorAvoid->find('all')->where(['WomenColorAvoid.user_id' => $id]);
        $avoid_colors = $avoid_colors1->extract('avoid_colors')->toArray();

        $avoid_prints1 = $this->WomenPrintsAvoid->find('all')->where(['WomenPrintsAvoid.user_id' => $id]);
        $avoid_prints = $avoid_prints1->extract('avoid_prints')->toArray();


        $avoid_fabrics1 = $this->WomenFabricsAvoid->find('all')->where(['WomenFabricsAvoid.user_id' => $id]);
        $avoid_fabrics = $avoid_fabrics1->extract('avoid_fabrics')->toArray();
         $wemenDesigne = $this->CustomDesine->find('all')->where(['user_id' => $id])->first();
        $womenHeelHightPrefer = $this->WomenHeelHightPrefer->find('all')->where(['user_id' =>$id])->first();
        $women_shoe_prefer = $this->WomenShoePrefer->find('all')->where(['user_id' => $id])->first();
//women code
//generate the barcode
        if ($payent_id) {
            $name = $payent_id . '.png';
            $barcode_value = $payent_id;
            $this->Custom->create_profile_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));

            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE_PROFILE . $name, $dataImg);

            $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $id]);
        }
//generate the barcode

        $this->set(compact('style_sphere_selectionsWemen','wemenDesigne','menDesigne','menSccessories','shipping_address', 'userdetails', 'MenStats', 'TypicallyWearMen', 'MenFit', 'MenStyle', 'menbrand', 'style_sphere_selections', 'id', 'primaryinfo', 'Womeninfo', 'style_wardrobe', 'avoid_fabrics', 'avoid_prints', 'avoid_colors', 'womens_brands_plus_low_tier', 'WomenJeansStyle', 'Womenprice', 'Womenstyle', 'WomenRatherDownplay', 'WomenJeansLength', 'WomenJeansRise', 'FitCut', 'SizeChart', 'PersonalizedFix','womenHeelHightPrefer','women_shoe_prefer'));
    }

    
    
    
    
    
    public function setPassword($id = null) {
        $passwordData = $this->Users->newEntity();
        $setPassword = $this->Users->find('all')->where(['Users.id' => $id])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $password = $data['password'];
            $conpassword = $data['cpassword'];
            if ($password != $conpassword) {
                $this->Flash->error(__("Password and confirm password are not same"));
            } else {

                $passwordData = $this->Users->patchEntity($passwordData, $data);
                $passwordData->id = $data['id'];

                if ($this->Users->save($passwordData)) {
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $setPassword->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;

                    $message = $this->Custom->createAdminFormat($emailMessage->value, $setPassword->name, $to, $password, $sitename);
                    $kid_id = 0;
                    $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
                    $this->Flash->success(__('Password set successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
                }
            }
        }
        $this->set(compact('passwordData', 'setPassword'));
    }

    public function iconDelete($id = null) {
        $this->viewBuilder()->layout('admins');
        if ($id) {
            $list = $this->SocialMedia->find('all', ['Fields' => ['image']])->where(['SocialMedia.id' => $id])->first();
            unlink(SOCIAL_ICON . $list->image);
            $this->SocialMedia->updateAll(array('image' => ''), array('id' => $id));
            $this->redirect(HTTP_ROOT . 'appadmins/social_media/' . $id . '/SocialMedia');
        }
    }

    public function paymentGateways() {
//    $entity = $this->JccGetways->newEntity();
//    $row = $this->JccGetways->find()->where(['JccGetways.id' => 1])->first();
//    if ($this->request->is('post')) {
//     $data = $this->request->data;
//     if (@$data['checkbox3'] == 1) {
//      $data['mode'] = 1;
//     } else {
//      $data['mode'] = 0;
//     }
//     $entity = $this->JccGetways->patchEntity($entity, $data);
//     if ($this->JccGetways->save($entity)) {
//      $this->Flash->success(__('Jcc payment information has been update successfully'));
//      $this->redirect(HTTP_ROOT . 'appadmins/payment_gateways/');
//     }
//    }
//
//    $this->set(compact('row'));
    }

    public function deactive($id = null, $table = null) {
        if ($table == 'Events') {
            $active_column = 'status';
        } else {
            $active_column = 'is_active';
        }

        if ($this->$table->query()->update()->set([$active_column => 0])->where(['id' => $id])->execute()) {
            if ($table == 'Events') {
                $this->$table->query()->update()->set(['is_featured' => 0])->where(['id' => $id])->execute();
                $this->Flash->success(__('Events is deactivated.'));
                $this->redirect($this->referer());
            } else if ($table == 'Banners') {
                $this->Flash->success(__('Banner has been deactivated.'));
                $this->redirect($this->referer());
            } else if ($table == 'FeatureEvents') {
                $this->Flash->success(__('Featured events Banner has been deactivated.'));
                $this->redirect($this->referer());
            } else if ($table == 'Testimonials') {
                $this->Flash->success(__('Testimonials has been deactivated.'));
                $this->redirect($this->referer());
            } else if ($table == 'SocialMedia') {
                $this->Flash->success(__('Social data has been deactivated.'));
                $this->redirect($this->referer());
            } else if ($table == 'Albums') {
                $this->Flash->success(__('Album has been deactivated.'));
                $this->redirect($this->referer());
            } else if ($table == 'Users') {
                $this->Flash->success(__('User has been deactivated.'));
                $this->redirect($this->referer());
            }
        }
    }

    public function active($id = null, $table = null) {
        if ($table == 'Events') {
            $active_column = 'status';
        } else {
            $active_column = 'is_active';
        }
        if ($this->$table->query()->update()->set([$active_column => 1])->where(['id' => $id])->execute()) {
            if ($table == 'Events') {
                $this->Flash->success(__('Events is has been activated.'));
                $this->redirect($this->referer());
            } else if ($table == 'FeatureEvents') {
                $this->Flash->success(__('Featured Event Banner has been activated.'));
                $this->redirect($this->referer());
            } else if ($table == 'Banners') {
                $this->Flash->success(__('Banner has been activated.'));
                $this->redirect($this->referer());
            } else if ($table == 'Testimonials') {
                $this->Flash->success(__('Testimonials has been activated.'));
                $this->redirect($this->referer());
            } else if ($table == 'SocialMedia') {
                $this->Flash->success(__('Social data has been activated.'));
                $this->redirect($this->referer());
            } else if ($table == 'Albums') {
                $this->Flash->success(__('Album has been activated.'));
                $this->redirect($this->referer());
            } else if ($table == 'Users') {
                $this->Flash->success(__('User has been activated.'));
                $this->redirect($this->referer());
            }
        }
    }

    public function stylePrints($id = null) {
        $this->viewBuilder()->layout('');

        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.user_id' => $id])->first();

        $MenStats = $this->MenStats->find('all')->where(['MenStats.user_id' => $id])->first();
        $TypicallyWearMen = $this->TypicallyWearMen->find('all')->where(['TypicallyWearMen.user_id' => $id])->first();

        $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $id,'default_set'=>1])->first();

        $this->viewBuilder()->layout('');
        $MenFit = $this->MenFit->find('all')->where(['MenFit.user_id' => $id])->first();
        $menDesigne = $this->CustomDesine->find('all')->where(['user_id' => $id])->first();
        
        $menSccessories = $this->MenAccessories->find('all')->where(['user_id' => $id])->first();
        
        $style_sphere_selections = $this->MenStyleSphereSelections->find('all')->where(['MenStyleSphereSelections.user_id' => $id])->first();
        
        $MenStyle = $this->MenStyle->find('all')->where(['MenStyle.user_id' => $id])->first();
        $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $id]);
        $menbrand = $MensBrands->extract('mens_brands')->toArray();
        $style_sphere_selections_v2 = $this->MenStyleSphereSelections->find('all')->where(['MenStyleSphereSelections.user_id' => $id]);
        $style_sphere = $style_sphere_selections_v2->extract('style_sphere_selections_v2')->toArray();
        $this->set(compact('MenFit','shipping_address','style_sphere_selections','menSccessories','menDesigne', 'MenStats', 'TypicallyWearMen', 'MenStyle', 'style_sphere', 'menbrand', 'userdetails'));
    }

    public function womenPrint($id = null) {
        $this->viewBuilder()->layout('');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $userdetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.user_id' => $id])->first();

        $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $id,'default_set'=>1])->first();

//women code
        
        $PersonalizedFix = $this->PersonalizedFix->find('all')->where(['PersonalizedFix.user_id' => $id])->first();
        $SizeChart = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $id])->first();
        $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $id])->first();

        $WomenJeansStyle1 = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $id]);
        $WomenJeansStyle = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $id])->first();
//                pj($WomenJeansStyle);exit;
        $WomenJeansRise1 = $this->WomenJeansRise->find('all')->where(['WomenJeansRise.user_id' => $id]);
        $WomenJeansRise = $WomenJeansRise1->extract('jeans_rise')->toArray();

        $WomenJeansLength1 = $this->WemenJeansLength->find('all')->where(['WemenJeansLength.user_id' => $id]);
        $WomenJeansLength = $WomenJeansLength1->extract('jeans_length')->toArray();
        $Womenstyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $id])->first();
//                pj($Womenstyle);exit;
// $WomenRatherDownplay = $this->WomenRatherDownplay->find('all')->where(['WomenRatherDownplay.user_id' => $this->Auth->user('id')])->first();

        $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $id])->first();
        $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $id])->first();
        $primaryinfo = explode(",", $Womeninfo->primary_objectives);
//                pj($primaryinfo);exit;

        $womens_brands_plus_low_tier1 = $this->WomenTypicalPurchaseCloth->find('all')->where(['WomenTypicalPurchaseCloth.user_id' => $id]);
        $womens_brands_plus_low_tier = $womens_brands_plus_low_tier1->extract('womens_brands_plus_low_tier')->toArray();

        $style_wardrobe1 = $this->WomenIncorporateWardrobe->find('all')->where(['WomenIncorporateWardrobe.user_id' => $id]);
        $style_wardrobe = $style_wardrobe1->extract('style_wardrobe')->toArray();


        $avoid_colors1 = $this->WomenColorAvoid->find('all')->where(['WomenColorAvoid.user_id' => $id]);
        $avoid_colors = $avoid_colors1->extract('avoid_colors')->toArray();

        $avoid_prints1 = $this->WomenPrintsAvoid->find('all')->where(['WomenPrintsAvoid.user_id' => $id]);
        $avoid_prints = $avoid_prints1->extract('avoid_prints')->toArray();


        $avoid_fabrics1 = $this->WomenFabricsAvoid->find('all')->where(['WomenFabricsAvoid.user_id' => $id]);
        $avoid_fabrics = $avoid_fabrics1->extract('avoid_fabrics')->toArray();
        
        $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $id])->first();
        $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $id])->first();
         $wemenDesigne = $this->CustomDesine->find('all')->where(['user_id' => $id])->first();
        $womenHeelHightPrefer = $this->WomenHeelHightPrefer->find('all')->where(['user_id' =>$id])->first();
        $women_shoe_prefer = $this->WomenShoePrefer->find('all')->where(['user_id' => $id])->first();
         $style_sphere_selectionsWemen = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $id])->first();
         $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $id]);
        $menbrand = $MensBrands->extract('mens_brands')->toArray();
//women code
      $this->set(compact('shipping_address', 'userdetails', 'MenStats', 'TypicallyWearMen', 'MenFit', 'MenStyle', 'menbrand', 'style_sphere', 'id', 'primaryinfo', 'Womeninfo', 'style_wardrobe', 'avoid_fabrics', 'avoid_prints', 'avoid_colors', 'womens_brands_plus_low_tier', 'WomenJeansStyle', 'Womenprice', 'Womenstyle', 'WomenRatherDownplay', 'WomenJeansLength', 'WomenJeansRise', 'FitCut', 'SizeChart', 'PersonalizedFix','Womeninfo','Womenprice','wemenDesigne','womenHeelHightPrefer','women_shoe_prefer','style_sphere_selectionsWemen','menbrand'));
    }

    public function kidPrint($payment_id = null) {
        $this->viewBuilder()->layout('');
        
        $useridDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $payment_id])->first();
        $userid = $useridDetails->user_id;
        
        $shipping_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $userid,'default_set'=>1])->first();
       // echo $useridDetails->kid_id;
        
        $this->KidsDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $kid = $this->KidsDetails->find('all')->contain(['Users', 'KidsPersonality', 'KidsSizeFit', 'KidClothingType', 'KidsPrimary', 'KidsPricingShoping', 'KidPurchaseClothing', 'KidStyles'])->where(['KidsDetails.id' => $useridDetails->kid_id])->group(['KidsDetails.id'])->first();
        //echo "<pre>";
       // print_r($kid);exit;
        $KidsSizeFit = $this->KidsSizeFit->find('all')->where(['KidsSizeFit.kid_id' => $useridDetails->kid_id])->first();
        $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $useridDetails->kid_id])->first();
        $designe = $this->CustomDesine->find('all')->where(['kid_id' => $useridDetails->kid_id])->first();
        $KidStyles = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $useridDetails->kid_id])->first();
        $kid_barcode = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $userid])->first();
        if ($payment_id) {
            $name = $payment_id . '.png';
            $barcode_value = $payment_id;
            $this->Custom->create_profile_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));

            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE_PROFILE . $name, $dataImg);

            $this->KidsDetails->updateAll(['barcode_image' => $name], ['user_id' => $userid]);
        }
        
        $this->set(compact('useridDetails','kid_barcode','kid','KidsSizeFit','KidClothingType', 'designe','shipping_address','KidStyles'));
    }

    public function addKidproduct($kid = null) {
        $product = $this->Products->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            $maxId = $this->Products->find('all')->order(['Products.id' => 'DESC'])->first();
            $ownId = $maxId->id + 1;
            $name = $ownId . '.png';
            $barcode_value = $data['payment_id'] . $ownId;
            $this->Custom->create_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE . $name, $dataImg);

            $product->barcode_image = $name;
            $product->barcode_value = $barcode_value;
            $product->user_id = $data['user_id'];
            $product->kid_id = $data['kid_id'];
            $product->payment_id = $data['payment_id'];
            $product->is_retrun = 1;
            if (!empty($data['image']['tmp_name'])) {
                if ($data['image']['size'] <= 8000) {
                    $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], PRODUCT_IMAGES, 400);
                    $product->product_image = $imageName;
                } else {
                    $this->Flash->erorr(__('Image should be 8 to 10kb'));
                }
            }
//product receipt
            if (!empty($data['product']['tmp_name'])) {
                if ($data['product']['size'] <= 8000) {
                    $imageName = $this->Custom->uploadImageBanner($data['product']['tmp_name'], $data['product']['name'], PRODUCT_RECEIPT, 400);
                    $product->product_receipt = $imageName;
                } else {
                    $this->Flash->erorr(__('Image should be 8 to 10kb'));
                }
            }

            $product = $this->Products->patchEntity($product, $data);
            $this->Products->save($product);
            $this->Flash->success(__('Data has been added successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/addkid_profile/' . $data['user_id']);
        }

        if ($kid) {
            $getKidDetail = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $kid])->first();
            $getPaymentDetail = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $getKidDetail->payment_id])->first();
        } else {


            return $this->redirect(HTTP_ROOT . 'appadmins/view_users/');
        }

        $productdetails = $this->Products->find('all')->where(['Products.payment_id' => $kid]);
//        pj($productdetails);echo $kid;exit;

        $this->set(compact('getKidDetail', 'kid', 'getPaymentDetail', 'productdetails'));
    }

    public function editKidproduct($kid = null) {

        $product = $this->Products->find('all')->where(['Products.id' => $kid])->first();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $editData = $this->Products->find('all')->where(['Products.id' => $data['pid']])->first();


            $product->id = $data['pid'];
            if (!empty($data['image']['tmp_name'])) {
                if ($data['image']['size']<= 8000) {
                    $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], PRODUCT_IMAGES, 400);
                    $product->product_image = $imageName;
                } else {
                    $this->Flash->error(__('Image should be 8 to 10 kb'));
                }
            } else {
                $product->product_image = $editData->product_image;
            }
//product receipt
            if (!empty($data['product']['tmp_name'])) {
                if ($data['product']['size']<= 8000) {
                    $imageName = $this->Custom->uploadImageBanner($data['product']['tmp_name'], $data['product']['name'], PRODUCT_RECEIPT, 400);
                    $product->product_receipt = $imageName;
                } else {
                    $this->Flash->error(__('Image should be 8 to 10 kb'));
                }
            } else {
                $product->product_receipt = $editData->product_receipt;
            }
            $product = $this->Products->patchEntity($product, $data);
            $this->Products->save($product);
            $this->Flash->success(__('Data has been Updated successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/addkid_profile/' . $editData->user_id);
        }
        $this->set(compact('product'));
    }

    public function kidProductimagedelete($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_image']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_image);
            $this->Products->updateAll(array('product_image' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/edit-kidproduct/' . $productid);
        }
    }

    public function kidProductreceiptdelete($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_receipt']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_receipt);
            $this->Products->updateAll(array('product_receipt' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/edit-kidproduct/' . $productid);
        }
    }

    public function productimagedelete($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_image']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_image);
            $this->Products->updateAll(array('product_image' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $list->payment_id . '/' . $list->id);
        }
    }

    public function productimagedeletescan($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_image']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_image);
            $this->Products->updateAll(array('product_image' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/scan_product/' . $list->id);
        }
    }

    public function productreceiptdelete($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_receipt']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_receipt);
            $this->Products->updateAll(array('product_receipt' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $list->payment_id . '/' . $list->id);
        }
    }

    public function productreceiptdeletescan($productid = null) {
        if ($productid) {
            $list = $this->Products->find('all', ['Fields' => ['product_receipt']])->where(['Products.id' => $productid])->first();
            unlink(PRODUCT_IMAGES . $list->product_receipt);
            $this->Products->updateAll(array('product_receipt' => ''), array('id' => $productid));
            return $this->redirect(HTTP_ROOT . 'appadmins/scan_product/' . $list->id);
        }
    }

    public function barcodePrints($id = null) {
        $this->viewBuilder()->layout('');
        $product = $this->Products->find('all')->where(['Products.id' => $id])->first();
        $user = $this->Users->find('all')->where(['Users.id' => $product->user_id])->first();
//        pj($user);
        $this->set(compact('product', 'user'));
    }

    public function viewproduct($id = null) {
        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $productData = $this->Products->find('all')->contain(['KidsDetails', 'Users'])->where(['Products.id' => $id])->first();

        //pj($productData);exit;
        $customer_review_Data = $this->CustomerProductReview->find('all')->where(['CustomerProductReview.user_id' => $productData->user_id])->first();
        $customer_review_Data_count = $this->CustomerProductReview->find('all')->where(['CustomerProductReview.user_id' => $productData->user_id])->count();

//        pj($customer_review_Data);exit;
        $this->set(compact('productData', 'customer_review_Data', 'customer_review_Data_count'));
    }

    public function kidProductImgDelete($id = null) {

        if ($id) {
            $product = $this->Products->find('all')->where(['Products.id' => $id])->first();
            unlink(PRODUCT_IMAGES . $product->product_image);
            $this->Products->updateAll(array('product_image' => ''), array('id' => $id));
            $this->redirect(HTTP_ROOT . 'appadmins/addkid-profile/' . $product->payment_id . '/' . $product->kid_id . '/' . $id);
        }
    }

    public function kidProductReciveDelete($id = null) {

        if ($id) {
            $product = $this->Products->find('all')->where(['Products.id' => $id])->first();
            unlink(PRODUCT_RECEIPT . $product->product_receipt);
            $this->Products->updateAll(array('product_receipt' => ''), array('id' => $id));
            $this->redirect(HTTP_ROOT . 'appadmins/addkid-profile/' . $product->payment_id . '/' . $product->kid_id . '/' . $id);
        }
    }

    public function addkidProfile($paymentId = null, $kidId = null, $productId = null) {
        $userDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $paymentId])->first();
        $userId = $userDetails->user_id;
        $user_type = $this->request->session()->read('Auth.User.type');
        if (@$paymentId && @$productId && @$kidId) {
            $productData = $this->Products->find('all')->where(['Products.id' => $productId])->first();
        }

        $this->KidsDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $kidDetail = $this->KidsDetails->find('all')->contain(['Users'])->where(['KidsDetails.id' => $userDetails->kid_id])->group(['KidsDetails.id'])->first();

        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $kid_product = $this->Products->find('all')->where(['Products.payment_id' => $paymentId])->order(['Products.created' => 'ASC']);


        $employee = $this->Users->find('all')->where(['Users.type' => 3]);
        if ($this->request->is('post')) {
            $product = $this->Products->newEntity();
            $data = $this->request->data;
            $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $data['payment_id']])->first();
            if (@$data['id']) {
                $data['id'] = $data['id'];
            } else {


                $maxId = $this->Products->find('all')->order(['Products.id' => 'DESC'])->first();
                $ownId = @$maxId->id + 1;
                $name = $ownId . '.png';
                $barcode_value = $data['payment_id'] . $ownId;
                $this->Custom->create_image($name);
                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
                list($type, $dataImg) = explode(';', $dataImg);
                list(, $dataImg) = explode(',', $dataImg);
                $dataImg = base64_decode($dataImg);
                file_put_contents(BARCODE . $name, $dataImg);

                $data['barcode_image'] = $name;
                $data['barcode_value'] = $barcode_value;
                $data['user_id'] = $paymentDetails->user_id;
                $data['kid_id'] = $paymentDetails->kid_id;
                $data['payment_id'] = $data['payment_id'];
                $data['is_retrun'] = 1;
                $data['id'] = '';

                if (@$data['dataexchange']) {
                    $exchangeId = $data['dataexchange'];
                    $exchangeData = $this->Products->find('all')->where(['Products.id' => $exchangeId])->first();
                    if ($exchangeData) {

                        $this->Products->updateAll(['is_altnative_product' => 1, 'is_complete' => '1'], ['id' => $exchangeId]);
                        $cenvertedTime = date('Y-m-d H:i:s', strtotime('+10 seconds', strtotime($exchangeData->created)));
                        $data['created'] = $cenvertedTime;
                        $data['is_altnative_product'] = 0;
                    }
                } else {
                    $data['created'] = date('Y-m-d H:i:s');
                }
            }


            $data['product_purchase_date'] = date('Y-m-d', strtotime($data['product_purchase_date']));
            $data['product_valid_return_date'] = date('Y-m-d', strtotime($data['product_valid_return_date']));
//            $data['customer_purchasedate'] = date('Y-m-d', strtotime($data['customer_purchasedate']));


            if (!empty($data['image']['tmp_name'])) {


                if ($data['image']['size'] <= 8000) {
                    $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], PRODUCT_IMAGES, 400);
                    $data['product_image'] = $imageName;
                } else {
                    $this->Flash->error(__('Image should be 8 to 10 kb'));
                }
            }
//product receipt
            if (!empty($data['product']['tmp_name'])) {
                if ($data['product']['size'] <= 8000) {
                    $imageName = $this->Custom->uploadImageBanner($data['product']['tmp_name'], $data['product']['name'], PRODUCT_RECEIPT, 400);
                    $data['product_receipt'] = $imageName;
                } else {
                    $this->Flash->error(__('Image should be 8 to 10 kb'));
                }
            }

            $product = $this->Products->patchEntity($product, $data);
            $this->Products->save($product);
            if (@$data['id']) {
                $this->Flash->success(__('Data has been updated successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/addkid_profile/' . $data['payment_id'] . '/' . $paymentDetails->kid_id . '/' . $data['id']);
            } else {
                $this->Flash->success(__('Data has been added successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/addkid_profile/' . $data['payment_id'] . '/' . $data['kid_id']);
            }
        }



        $this->set(compact('user_type', 'kids', 'employee', 'kidDetail', 'kidparent', 'kid_product', 'userId', 'kidId', 'productId', 'productData', 'paymentId'));
    }

    public function viewkidproductlist($paymentId = null, $kidId = null, $productId = null) {
        $userDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $paymentId])->first();
        $userId = $userDetails->user_id;
        $user_type = $this->request->session()->read('Auth.User.type');
        if (@$paymentId && @$productId && @$kidId) {
            $productData = $this->Products->find('all')->where(['Products.id' => $productId])->first();
        }

        $this->KidsDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $kidDetail = $this->KidsDetails->find('all')->contain(['Users'])->where(['KidsDetails.id' => $userDetails->kid_id])->group(['KidsDetails.id'])->first();

        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $kid_product = $this->Products->find('all')->where(['Products.payment_id' => $paymentId])->order(['Products.created' => 'ASC']);


        $employee = $this->Users->find('all')->where(['Users.type' => 3]);
        $this->set(compact('user_type', 'kids', 'employee', 'kidDetail', 'kidparent', 'kid_product', 'userId', 'kidId', 'productId', 'productData', 'paymentId'));
    }

    public function kidProductDelete($id = null) {
        if ($id) {
            $getDetail = $this->Products->find('all')->where(['Products.id' => $id])->first();
            $data = $this->Products->get($id);
            $dataDelete = $this->Products->delete($data);
            unlink(PRODUCT_IMAGES . $getDetail->product_image);
            unlink(PRODUCT_RECEIPT . $getDetail->product_receipt);
            unlink(BARCODE . $getDetail->barcode_image);
            $this->Flash->success(__('Data has been delete successfully.'));
            $this->redirect(HTTP_ROOT . 'appadmins/addkid_profile/' . $getDetail->user_id . '/' . $getDetail->kid_id);
        }
    }

    public function kidpdelete($id = null) {
        if ($id) {
            $getDetail = $this->Products->find('all')->where(['Products.id' => $id])->first();
            $data = $this->Products->get($id);
            $dataDelete = $this->Products->delete($data);
            unlink(PRODUCT_IMAGES . $getDetail->product_image);
            unlink(PRODUCT_RECEIPT . $getDetail->product_receipt);
            unlink(BARCODE . $getDetail->barcode_image);
            $this->Flash->success(__('Data has been delete successfully.'));
            $this->redirect(HTTP_ROOT . 'appadmins/viewkidproductlist/' . $getDetail->payment_id);
        }
    }

    public function deleteproductprevious($id = null) {

        if ($id) {
            $getDetail = $this->Products->find('all')->where(['Products.id' => $id])->first();
//            pj($getDetail);exit;
            $data = $this->Products->get($id);
// pj($data); exit;
            $dataDelete = $this->Products->delete($data);
            unlink(PRODUCT_IMAGES . @$getDetail->product_image);
            unlink(PRODUCT_RECEIPT . @$getDetail->product_receipt);
            unlink(BARCODE . @$getDetail->barcode_image);
            $this->Flash->success(__('Data has been delete successfully.'));
            $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $getDetail->payment_id);
        }
    }

    public function deleteproduct($id = null) {

        if ($id) {
            $getDetail = $this->Products->find('all')->where(['Products.id' => $id])->first();
//            pj($getDetail);exit;
            $data = $this->Products->get($id);
// pj($data); exit;
            $dataDelete = $this->Products->delete($data);
            unlink(PRODUCT_IMAGES . @$getDetail->product_image);
            unlink(PRODUCT_RECEIPT . @$getDetail->product_receipt);
            unlink(BARCODE . @$getDetail->barcode_image);
            $this->Flash->success(__('Data has been delete successfully.'));
            $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $getDetail->payment_id);
        }
    }

    public function scanProduct($productId = null) {
        $product = $this->Products->newEntity();
        $value = @$data['productValue'];
        if (@$productId) {
            $productEditDetails = $this->Products->find('all')->where(['Products.id' => @$productId])->first();
            $productCode = $productEditDetails->barcode_value;
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            if (@$data['id']) {
                $data['id'] = $data['id'];
                $editData = $this->Products->find('all')->where(['Products.id' => $data['id']])->first();
                if ($editData->exchange_status == 'Y') {
                    if ($data['store_exchange_date']) {
                        $data['store_exchange_date'] = date('Y-m-d', strtotime($data['store_exchange_date']));
                    }
                    if ($data['customer_purchasedate']) {
                        $data['customer_purchasedate'] = date('Y-m-d');
                    }

                    $data['is_complete'] = 0;
                    $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => 0], ['id' => $editData->payment_id]);
                }
                if ($editData->return_status == 'Y') {
                    if ($data['store_return_date']) {
                        $data['store_return_date'] = date('Y-m-d', strtotime($data['store_return_date']));
                    }
                    if ($data['customer_purchasedate']) {
                        $data['customer_purchasedate'] = date('Y-m-d', strtotime($data['customer_purchasedate']));
                    }

                    $data['is_complete'] = 1;
                }

                $product = $this->Products->patchEntity($product, $data);
                $this->Products->save($product);
                $paymentId = $this->Products->find('all')->where(['Products.id' => $data['id']])->first()->payment_id;

                $checkGroupProductAll = $this->Products->find('all')->where(['payment_id' => $paymentId])->count();

                $checkGroupProduct = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_complete' => 1])->count();

                @$checkKid = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $paymentId])->first()->kid_id;
                if ($checkGroupProduct == $checkGroupProductAll) {
                    $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
                    if (@$checkKid == '') {
                        $this->Users->updateAll(['is_redirect' => 5], ['id' => $editData->user_id]);
                    } else {
                        $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $checkKid]);
                    }
                } else {

                    $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                    if (@$checkKid == '') {
                        $this->Users->updateAll(['is_redirect' => 2], ['id' => $editData->user_id]);
                    } else {
                        $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $checkKid]);
                    }
                }
                $this->redirect(HTTP_ROOT . 'appadmins/scan_product/' . $data['id']);
            }
        }



        $this->set(compact('userId', 'productId', 'productdetails', 'productEditDetails', 'getPaymentDetail', 'productCode'));
    }

    public function deleteprofile($userid = null) {
        if ($userid) {
//$this->UserDetails->deleteAll(['user_id' => $userid]);
//$this->FitCut->deleteAll(['user_id' => $userid]);
            $this->PaymentGetways->deleteAll(['PaymentGetways.id' => $userid]);
            $this->Products->deleteAll(['Products.payment_id' => $userid]);
//$this->MenStats->deleteAll(['user_id' => $userid]);
//$this->MensBrands->deleteAll(['user_id' => $userid]);
//$this->MenFit->deleteAll(['user_id' => $userid]);
//$this->MenStats->deleteAll(['user_id' => $userid]);
//$this->MenStyle->deleteAll(['user_id' => $userid]);
//$this->MenStyleSphereSelections->deleteAll(['user_id' => $userid]);
//$this->KidsDetails->deleteAll(['user_id' => $userid]);
//$this->TypicallyWearMen->deleteAll(['user_id' => $userid]);
//            $this->ShippingAddress->deleteAll(['user_id' => $userid]);
//            $this->YourProportions->deleteAll(['user_id' => $userid]);
//            $this->CustomerProductReview->deleteAll(['user_id' => $userid]);
//            $this->WomenJeansRise->deleteAll(['user_id' => $userid]);
//            $this->WomenJeansStyle->deleteAll(['user_id' => $userid]);
//            $this->WemenJeansLength->deleteAll(['user_id' => $userid]);
//            $this->WomenPrintsAvoid->deleteAll(['user_id' => $userid]);
//            $this->WomenTypicalPurchaseCloth->deleteAll(['user_id' => $userid]);
//            $this->WomenIncorporateWardrobe->deleteAll(['user_id' => $userid]);
//            $this->WomenFabricsAvoid->deleteAll(['user_id' => $userid]);
//            $this->WomenColorAvoid->deleteAll(['user_id' => $userid]);
//            $this->WomenPrice->deleteAll(['user_id' => $userid]);
//            $this->WomenStyle->deleteAll(['user_id' => $userid]);
//            $this->WomenInformation->deleteAll(['user_id' => $userid]);
//            $this->WomenRatherDownplay->deleteAll(['user_id' => $userid]);
//            $this->PersonalizedFix->deleteAll(['user_id' => $userid]);
//            $this->LetsPlanYourFirstFix->deleteAll(['user_id' => $userid]);
//            $this->KidsDetails->deleteAll(['user_id' => $userid]);
//            $this->KidsPersonality->deleteAll(['user_id' => $userid]);
//            $this->KidsPrimary->deleteAll(['user_id' => $userid]);
//            $this->KidsSizeFit->deleteAll(['user_id' => $userid]);
//            $this->KidClothingType->deleteAll(['user_id' => $userid]);
//            $this->KidStyles->deleteAll(['user_id' => $userid]);
//            $this->KidsPricingShoping->deleteAll(['user_id' => $userid]);
//            $this->KidPurchaseClothing->deleteAll(['user_id' => $userid]);
//            $this->Users->deleteAll(['id' => $userid]);
        }
        $this->Flash->success(__('Data has been deleted successfully.'));
        $this->redirect(HTTP_ROOT . 'appadmins/view_users');
    }

    public function promocode($promoId = null) {
        $promocode = $this->Promocode->newEntity();
        $userlist = $this->Users->find('all')->where(['Users.type' => 2]);
        if (@$promoId) {
            $promotEditDetails = $this->Promocode->find('all')->where(['Promocode.id' => @$promoId])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['promoEmail'] == 'usersPromocode') {
                $newEntity6 = $this->UserMailTemplatePromocode->newEntity();
                $data['promocode_id'] = @$data['promo_id'];
                $data['apply_dt'] = date("Y-m-d H:i:s");
                $newEntity6 = $this->UserMailTemplatePromocode->patchEntity($newEntity6, $data);
                $this->UserMailTemplatePromocode->save($newEntity6);
                if (@$data['user_id']) {
                    $this->UserMailTemplatePromocode->deleteAll(['promocode_id' => @$data['promo_id']]);
                    foreach (@$data['user_id'] as $userid) {
                        $useremail = $this->Users->find('all')->where(['Users.type' => 2, 'Users.id' => $userid])->first();

                        $promocode = $this->Promocode->find('all')->where(['Promocode.id' => $data['promo_id']])->first();

                        $newEntity5 = $this->UserMailTemplatePromocode->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $userid;

                        $newEntity5 = $this->UserMailTemplatePromocode->patchEntity($newEntity5, $data);
                        $this->UserMailTemplatePromocode->save($newEntity5);

                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PROMOCODE'])->first();

                        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                        // echo $fromMail;  exit;
                        $to = $useremail->email;
                        $from = $fromMail->value;
                        $subject = $emailMessage->display;
                        $sitename = SITE_NAME;
                        $message = $this->Custom->promocodesend($emailMessage->value, $promocode->promocode, $promocode->price, $promocode->comments, $sitename);
                        $kid_id = 0;
                        $this->Custom->sendEmail($to, $from, $subject, $message);

//email creation
                        $this->Flash->success(__('Mail sentsuccessfully.'));
                    }
                }

                $promoemail = $this->UserMailTemplatePromocode->find('all')->where(['UserMailTemplatePromocode.promocode_id' => @$promodetails->id]);
                $promoemail2 = $promoemail->extract('user_id')->toArray();
                $checkedemail = $this->UserMailTemplatePromocode->find('all');
            } else {


                if (@$data['id']) {
                    $data['id'] = $data['id'];
                } else {
                    $data['is_active'] = 1;
                }
                $data['expiry_date'] = date('Y-m-d h:i:s', strtotime($data['expiry_date']));
                $data['created_dt'] = date('Y-m-d h:i:s', strtotime($data['created_dt']));
                $promocode = $this->Promocode->patchEntity($promocode, $data);
                $this->Promocode->save($promocode);
                if (@$data['id']) {
                    $this->Flash->success(__('Data has been updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/promocode/' . @$data['id']);
                } else {

                    $this->Flash->success(__('Data has been added successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/promocode');
                }
            }
        }

        $this->Promocode->hasMany('UserMailTemplatePromocode', ['className' => 'UserMailTemplatePromocode', 'foreignKey' => 'promocode_id',]);
        $promodetails = $this->Promocode->find('all')->contain(['UserMailTemplatePromocode']);
        $this->set(compact('promodetails', 'promotEditDetails', 'promoId', 'userlist', 'promoemail2'));
    }

    public function deletepromo($promoid = null) {

        if ($promoid) {
            $this->Promocode->deleteAll(['id' => $promoid]);
            $this->Flash->success(__('Data deleted successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/promocode');
        }
        exit;
    }

    public function sendpromo($promoid = null) {
        $promoDetails = $this->Promocode->find('all')->where(['Promocode.id' => @$promoid])->first();
//      echo $promoDetails;
        $this->set(compact('promoDetails'));
//        exit;
    }

    public function getProductsDetils() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
//             pj($data);exit;
            $value = @$data['productValue'];

            if ($value) {
                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $productEditDetails = $this->Products->find('all')->contain(['Users'])->where(['Products.barcode_value' => $value])->first();
                $productCount = $this->Products->find('all')->where(['Products.barcode_value' => $value])->count();
            }
        }
//pj($productEditDetails);exit;
        $this->set(compact('productEditDetails', 'productCount'));
    }

    public function finalize($product_id = null, $user_id = null) {
        $this->viewBuilder()->layout('admin');

        if ($product_id) {
            $getpaymentid = $this->Products->find('all')->where(['Products.id' => $product_id])->first()->payment_id;
            $mailstatus = $this->PaymentGetways->find('all')->where(['id' => $getpaymentid])->first()->mail_status;

            $name = $this->Auth->user('name');
            $getUserId = $this->Products->find('all')->where(['Products.id' => $product_id])->first();
            $this->Products->updateAll(['checkedout' => 'N'], ['id' => $product_id]);
           // $this->Users->updateAll(['is_redirect' => '4'], ['id' => $getUserId->user_id]);

            $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
            $totalProductscount = $this->Products->find('all')->where(['Products.payment_id' => $getpaymentid, 'is_complete' => 0])->count();
            $totalCheckoutproductCount = $this->Products->find('all')->where(['Products.payment_id' => $getpaymentid, 'checkedout' => 'N', 'is_complete' => 0])->count();
            
            //echo $totalProductscount;
            //echo "<br>";
            //echo $totalCheckoutproductCount;
            //exit;
            if ($totalProductscount == $totalCheckoutproductCount) {

                if ($mailstatus == 0) {
                    $this->Users->updateAll(['is_redirect' => '4'], ['id' => $getUserId->user_id]);

                    $mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1'], ['id' => $getpaymentid]);
                    $notificationsTable = $this->Notifications->newEntity();
                    $data1['user_id'] = $getUserId->user_id;
                    $data1['msg'] = 'styleist has products finalize';
                    $data1['is_read'] = '0';
                    $data1['created'] = date('Y-m-d H:i:s');
                    $data1['kid_id'] = '0';
                    $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
                    $this->Notifications->save($notificationsTable);

                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PRODUCT_FINALIZE'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $getUserDetails->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $message = $this->Custom->productFinalize($emailMessage->value, $getUserDetails->name, $name, $sitename);
                    $kid_id = 0;
                    $this->Custom->sendEmail($to, $from, $subject, $message);

                    $this->Flash->success(__('Product has been finalize successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $getpaymentid);
                } else {
                    return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $getpaymentid);
                }
            }
        }
        return $this->redirect(HTTP_ROOT . 'appadmins/addproduct/' . $getpaymentid);
    }

    public function finalizekid($paymentId = null, $kid_id = null, $product_id = null) {
        $this->viewBuilder()->layout('admin');
        $paymentDetails = $this->PaymentGetways->find('all')->where(['id' => $paymentId])->first();
        $mailstatus = $paymentDetails->mail_status;
        if ($product_id) {

            $this->Products->updateAll(['checkedout' => 'N'], ['id' => $product_id]);
            $name = $this->Auth->user('name');
            $getUserId = $this->Products->find('all')->where(['Products.id' => $product_id])->first();
            $getUserDetails = $this->Users->find('all')->where(['Users.id' => $getUserId->user_id])->first();
            
            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PRODUCT_FINALIZE'])->first();
            $totalProductscount = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'is_complete' => 0])->count();
          //  3
            
            $totalCheckoutproductCount = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'checkedout' => 'N', 'is_complete' => 0])->count();
            //echo $totalProductscount;
            //echo "<br>";
            //echo $totalCheckoutproductCount;
            //exit;
            
            if ($totalProductscount == $totalCheckoutproductCount) {

                if ($mailstatus == 0) {

                   
                    //$this->Users->updateAll(['is_redirect' => '4'], ['id' => $getUserId->user_id]);
                    $this->KidsDetails->updateAll(['is_redirect' => '4'], ['id' => $paymentDetails->kid_id]);
                    $mailstatus = $this->PaymentGetways->updateAll(['mail_status' => '1'], ['id' => $paymentId]);

                    $notificationsTable = $this->Notifications->newEntity();
                    $data1['user_id'] = $getUserId->user_id;
                    $data1['msg'] = 'styleist has products finalize';
                    $data1['is_read'] = '0';
                    $data1['created'] = date('Y-m-d H:i:s');
                    $data1['kid_id'] = $paymentDetails->kid_id;
                    $notificationsTable = $this->Notifications->patchEntity($notificationsTable, $data1);
                    $this->Notifications->save($notificationsTable);



                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $getUserDetails->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $message = $this->Custom->productFinalize($emailMessage->value, $getUserDetails->name, $name, $sitename);
                    $kid_id = $paymentDetails->kid_id;
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                }
            }
        }
        return $this->redirect(HTTP_ROOT . 'appadmins/addkid-profile/' . $paymentId . '/' . $getUserId->kid_id);
    }

    public function profileReview() {

        $this->set(compact(''));
    }

    public function profileReviewKid() {

        $this->set(compact(''));
    }

    public function directChat() {
        $this->viewBuilder()->layout('admin');
        $id = $this->Auth->user('id');
        $type = $this->Auth->user('type');
        if (@$id) {
            $getUsersDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.status' => 1, 'PaymentGetways.emp_id' => $id]);
        }
        $userId = $getUsersDetails->extract('user_id')->toArray();
        if (!empty($userId)) {
            $userName = $this->Auth->user('name');
            $usersDetails = $this->Users->find('all')->where(['Users.type' => 2, 'Users.id IN' => $userId]);
            $usersDetailsCount = $this->Users->find('all')->where(['Users.type' => 2, 'Users.id IN' => $userId])->count();
        } else {
            $userName = $this->Auth->user('name');
            $usersDetails = null;
            $usersDetailsCount = 0;
        }

        $getEmoticons = $this->ChatCategoryImages->find('all');


        $this->set(compact('id', 'userId', 'userName', 'usersDetails', 'usersDetailsCount', 'getEmoticons'));
    }

    public function singleDirectChat($id = null) {
        $this->viewBuilder()->layout('admin');
        $userId = $this->Auth->user('id');
        $userName = $this->Auth->user('name');

        $detail = $this->Users->find('all')->where(['Users.type' => 2, 'Users.id' => $id])->first();
        $this->set(compact('detail', 'userId', 'userName'));
    }

     public function printReceipt($id = null) {
        $this->viewBuilder()->layout('');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();
        $productDetails = $this->Products->find('all')->where(['Products.payment_id' => $id, 'Products.keep_status' => 0, 'is_altnative_product' => '0']);

        $getEmployeeName = $this->Users->find('all')->where(['Users.id' => $paymentDetails->emp_id])->first()->name;

        //pj($productDetails);exit;

        if ($id) {

            $name = @$paymentDetails->user_id . '.png';
            $barcode_value = @$paymentDetails->user_id;
            $this->Custom->create_profile_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE_PROFILE . $name, $dataImg);


            $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $paymentDetails->user_id]);
            sleep(5);
        }
        $styleFee= $this->Settings->find('all')->where(['name' => 'style_fee'])->first()->value;

        $this->set(compact('paymentDetails', 'productDetails', 'getEmployeeName','styleFee'));
    }

    public function receiptKidPrint($id = null) {
        $this->viewBuilder()->layout('');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();
        $productDetails = $this->Products->find('all')->where(['Products.payment_id' => $id, 'Products.keep_status' => 0, 'is_altnative_product' => '0']);
        $getEmployeeName = $this->Users->find('all')->where(['Users.id' => $paymentDetails->emp_id])->first()->name;
        if ($id) {
            $name = @$paymentDetails->user_id . '.png';
            $barcode_value = @$paymentDetails->user_id;
            $this->Custom->create_profile_image($name);
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $dataImg = "data:image/png;base64," . base64_encode($generator->getBarcode($barcode_value, $generator::TYPE_CODE_128));
            list($type, $dataImg) = explode(';', $dataImg);
            list(, $dataImg) = explode(',', $dataImg);
            $dataImg = base64_decode($dataImg);
            file_put_contents(BARCODE_PROFILE . $name, $dataImg);


            $this->UserDetails->updateAll(['barcode_image' => $name], ['user_id' => $paymentDetails->user_id]);
            sleep(5);
        }
         $styleFee= $this->Settings->find('all')->where(['name' => 'style_fee'])->first()->value;
         
        $this->set(compact('paymentDetails', 'productDetails', 'getEmployeeName','styleFee'));
    }

    public function addCatelog($id = null) {
        //pj($id);exit;
        $this->viewBuilder()->layout('admin');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();

        $catelogDetails = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $id])->first();


        // pj($paymentDetails);exit;
        // if ($this->request->is('post')) {
        //     $catelogs = $this->Catelogs->newEntity();
        //     $data = $this->request->data;
        //     if ($paymentDetails) {
        //         $data['payment_id'] = $data['payment_id'];
        //         $data['type'] = 1;
        //         $data['contain'] = $data['contain'];
        //         $data['created'] = date('Y-m-d h:i:s');
        //     }
        //     $Catelogs = $this->Catelogs->patchEntity($catelogs, $data);
        //     $this->Catelogs->save($Catelogs);
        // }

        $this->set(compact('paymentDetails', 'id', 'catelogDetails'));
    }

    public function catelogPrint($id = null) {
        $this->viewBuilder()->layout('');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();


        $catelogDetails = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $id])->first();
        $this->set(compact('catelogDetails', 'paymentDetails'));
    }

    public function addKidCatelog($id = null) {
        $this->viewBuilder()->layout('admin');
        $this->viewBuilder()->layout('admin');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();

        $catelogDetails = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $id])->first();

        $this->set(compact('paymentDetails', 'catelogDetails', 'id'));
    }

    public function catelogKidPrint($id = null) {
        $this->viewBuilder()->layout('');
        $this->viewBuilder()->layout('admin');
        $this->viewBuilder()->layout('admin');
        $this->PaymentGetways->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $paymentDetails = $this->PaymentGetways->find('all')->contain(['Users', 'Users.UserDetails'])->where(['PaymentGetways.id' => $id])->first();

        $catelogDetails = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $id])->first();

        $this->set(compact('paymentDetails', 'catelogDetails', 'id'));
    }

    public function ajaxDltTbl() {
        $this->viewBuilder()->layout('');
        if ($this->request->session()->read('Auth.User.type') == 1) {
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $this->Users->deleteAll(['id !=' => 1]);
                $this->Catelogs->deleteAll([1]);
                $this->CustomerProductReview->deleteAll([1]);
                $this->FitCut->deleteAll([1]);
                $this->KidFocusOnSending->deleteAll([1]);
                $this->KidsPersonality->deleteAll([1]);
                $this->LetsPlanYourFirstFix->deleteAll([1]);
                $this->MenStyleSphereSelections->deleteAll([1]);
                $this->PaymentCardDetails->deleteAll([1]);
                $this->Products->deleteAll([1]);
                $this->StyleQuizs->deleteAll([1]);
                $this->UserMailTemplatePromocode->deleteAll([1]);
                $this->WearType->deleteAll([1]);
                $this->WomenIncorporateWardrobe->deleteAll([1]);
                $this->WomenPrice->deleteAll([1]);
                $this->WomenTypicalPurchaseCloth->deleteAll([1]);
                $this->DeliverDate->deleteAll([1]);
                $this->FlauntArms->deleteAll([1]);
                $this->KidPurchaseClothing->deleteAll([1]);
                $this->KidsPricingShoping->deleteAll([1]);
                $this->MenFit->deleteAll([1]);
                $this->MensBrands->deleteAll([1]);
                $this->PaymentGetways->deleteAll([1]);
                $this->Promocode->deleteAll([1]);
                $this->ShippingAddress->deleteAll([1]);
                $this->TShirtsWouldWear->deleteAll([1]);
                $this->UserUsesPromocode->deleteAll([1]);
                $this->WemenJeansLength->deleteAll([1]);
                $this->WomenInformation->deleteAll([1]);
                $this->WomenPrintsAvoid->deleteAll([1]);
                // $this->your_child_personality->deleteAll();
                $this->ChatMessages->deleteAll([1]);
                $this->EmailPreferences->deleteAll([1]);
                $this->HelpDesks->deleteAll([1]);
                $this->KidStyles->deleteAll([1]);
                $this->KidsPrimary->deleteAll([1]);
                $this->MenStats->deleteAll([1]);
                $this->MyItem->deleteAll([1]);
                $this->Payments->deleteAll([1]);
                $this->RatherDownplay->deleteAll([1]);
                $this->SizeChart->deleteAll([1]);
                $this->TypicallyWearMen->deleteAll([1]);
                $this->WomenColorAvoid->deleteAll([1]);
                $this->WomenJeansRise->deleteAll([1]);
                $this->WomenRatherDownplay->deleteAll([1]);
                $this->your_child_fix->deleteAll([1]);
                $this->ClothingCategoriesWeAvoid->deleteAll([1]);
                $this->FabricsOrEmbellishments->deleteAll([1]);
                $this->KidClothingType->deleteAll([1]);
                $this->KidsDetails->deleteAll([1]);
                $this->KidsSizeFit->deleteAll([1]);
                $this->MenStyle->deleteAll([1]);
                $this->PersonalizedFix->deleteAll([1]);
                $this->ReferFriends->deleteAll([1]);
                $this->UserDetails->deleteAll([1]);
                $this->Wallets->deleteAll([1]);
                $this->WomenFabricsAvoid->deleteAll([1]);
                $this->WomenJeansStyle->deleteAll([1]);
                $this->WomenStyle->deleteAll([1]);
                $this->YourProportions->deleteAll([1]);
                $this->Giftcard->deleteAll([1]);
                $this->UserMailTemplateGiftcode->deleteAll([1]);
                $this->UserUsesGiftcode->deleteAll([1]);
                $this->UserUsesPromocode->deleteAll([1]);
                $this->Notifications->deleteAll([1]);

                echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'appadmins/empty_all_tables']);
            }
        }
        EXIT;
    }

    public function emptyAllTables($userid = null) {
        $tables = ConnectionManager::get('default')->schemaCollection()->listTables();
        $this->set(compact('tables'));
    }

    public function giftcard($giftId = null) {
        $giftcode = $this->Giftcard->newEntity();
        $userlist = $this->Users->find('all')->where(['Users.type' => 2]);
        if (@$giftId) {
            $giftEditDetails = $this->Giftcard->find('all')->where(['Giftcard.id' => @$giftId])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['usersGiftcode'] == 'usersGiftcode') {
                //pj($data);exit;
                $newEntity6 = $this->UserMailTemplateGiftcode->newEntity();
                $data['giftcode_id'] = @$data['gift_id'];
                $data['apply_dt'] = date("Y-m-d H:i:s");
                $newEntity6 = $this->UserMailTemplateGiftcode->patchEntity($newEntity6, $data);
                $this->UserMailTemplateGiftcode->save($newEntity6);
                if (@$data['user_id']) {
                    $this->UserMailTemplateGiftcode->deleteAll(['giftcode_id' => @$data['gift_id']]);
                    foreach (@$data['user_id'] as $userid) {
                        $useremail = $this->Users->find('all')->where(['Users.type' => 2, 'Users.id' => $userid])->first();

                        $giftcode = $this->Giftcard->find('all')->where(['Giftcard.id' => $data['gift_id']])->first();

                        $newEntity5 = $this->UserMailTemplateGiftcode->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $userid;

                        $newEntity5 = $this->UserMailTemplateGiftcode->patchEntity($newEntity5, $data);
                        $this->UserMailTemplateGiftcode->save($newEntity5);

                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'GIFTCODE'])->first();

                        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                        $to = $useremail->email;
                        $from = $fromMail->value;
                        $subject = @$emailMessage->display;

                        $sitename = SITE_NAME;

                        $message = $this->Custom->giftcodesend(@$emailMessage->value, $giftcode->giftcode, $giftcode->price, $giftcode->comments, $sitename);

                        $kid_id = 0;
                        $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);


                        $this->Flash->success(__('Mail sentsuccessfully.'));
                    }
                }

                $promoemail = $this->UserMailTemplateGiftcode->find('all')->where(['UserMailTemplateGiftcode.giftcode_id' => @$giftdetails->id]);
                $promoemail2 = $promoemail->extract('user_id')->toArray();
                $checkedemail = $this->UserMailTemplateGiftcode->find('all');
            } else {
                if (@$data['id']) {
                    $data['id'] = $data['id'];
                } else {
                    $data['is_active'] = 1;
                }
                $data['expiry_date'] = date('Y-m-d h:i:s', strtotime($data['expiry_date']));
                $data['created_dt'] = date('Y-m-d h:i:s', strtotime($data['created_dt']));
                $giftcode = $this->Giftcard->patchEntity($giftcode, $data);
                $this->Giftcard->save($giftcode);
                if (@$data['id']) {
                    $this->Flash->success(__('Data has been updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/giftcard/' . @$data['id']);
                } else {

                    $this->Flash->success(__('Data has been added successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/giftcard');
                }
            }
        }

        $this->Giftcard->hasMany('userMailTemplateGiftcode', ['className' => 'userMailTemplateGiftcode', 'foreignKey' => 'giftcode_id']);
        $giftdetails = $this->Giftcard->find('all')->contain(['userMailTemplateGiftcode']);
        $this->set(compact('giftdetails', 'giftEditDetails', 'giftId', 'userlist', 'promoemail2'));
    }

    public function deletegiftcard($giftid = null) {

        if ($giftid) {
            $this->Giftcard->deleteAll(['id' => $giftid]);
            $this->Flash->success(__('Data deleted successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/giftcard');
        }
        exit;
    }

    public function addEmail($id = null) {
        $this->viewBuilder()->layout('admin');

        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $id])->first();
        $user_id = $paymentDetails['user_id'];
        $usersDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();


        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'USPS_EMAIL'])->first();
            $to = $data['userEmail'];
            $from = $fromMail->value;
            $subject = $data['subject'];
            ;
            $message = $data['contain'];
            $kid_id = 0;
            $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
            $this->Flash->success(__('USPS Mail sending successfully'));
            $this->redirect(HTTP_ROOT . 'appadmins/view_users');
        }

        $this->set(compact('usersDetails'));
    }

    public function addKidEmail($id = null) {
        $this->viewBuilder()->layout('admin');

        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $id])->first();
        $user_id = $paymentDetails['user_id'];
        $usersDetails = $this->Users->find('all')->where(['Users.id' => $user_id])->first();


        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();

            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'USPS_EMAIL'])->first();
            $to = $data['userEmail'];
            $from = $fromMail->value;
            $subject = $emailMessage->display;
            $message = $data['contain'];
            $subject = $data['subject'];
            $kid_id = $data['kid_id'];
            $this->Custom->sendEmail($to, $from, $subject, $message, $kid_id);
            $this->Flash->success(__('USPS Mail sending successfully'));
            $this->redirect(HTTP_ROOT . 'appadmins/view_users');
        }

        $this->set(compact('usersDetails', 'paymentDetails'));
    }

    public function ajaxCatelogSave() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data);exit;
            if ($data) {
                $newEntity = $this->Catelogs->newEntity();
                $checkIdCount = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $data['cateId']])->count();
                if ($checkIdCount == 0) {
                    $catelogs = $this->Catelogs->newEntity();
                    $data['payment_id'] = $data['cateId'];
                    $data['type'] = 1; // 1 one for users 2 for kids
                    $data['contain'] = $data['contain'];
                    $data['created'] = date('Y-m-d h:i:s');
                    $Catelogs = $this->Catelogs->patchEntity($catelogs, $data);
                    $this->Catelogs->save($Catelogs);
                } else {
                    $this->Catelogs->updateAll(['contain' => $data['contain']], ['payment_id' => $data['cateId']]);
                }
                echo json_encode(['status' => 1]);
                exit;
            }
        }
        exit;
    }

    public function ajaxCatelogTextSave() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['text'] != '') {
                $newEntity = $this->Catelogs->newEntity();
                $checkIdCount = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $data['cateId']])->count();
                $column = 'text' . $data['getId'];
                if ($checkIdCount == 0) {
                    $catelogs = $this->Catelogs->newEntity();
                    $data['payment_id'] = $data['cateId'];
                    $data['type'] = 1; // 1 one for users 2 for kids
                    $data[$column] = $data['text'];
                    $data['created'] = date('Y-m-d h:i:s');
                    $Catelogs = $this->Catelogs->patchEntity($catelogs, $data);
                    $this->Catelogs->save($Catelogs);
                } else {
                    $this->Catelogs->updateAll([$column => $data['text']], ['payment_id' => $data['cateId']]);
                }
                echo json_encode(['status' => 1]);
                exit;
            } else {
                echo json_encode(['status' => 2]);
            }
            exit;
        }
        exit;
    }

    public function ajaxCatelogImg() {
        $this->viewBuilder()->layout('ajax');




        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {

                $imgCol = 'img' . $data['imgId'];

                if ($data['file']['tmp_name']) {
                    $tmp_name = $data['file']['tmp_name'];
                    $name = $data['file']['name'];
                    $path = CATELOG;
                    $imgWidth = 200;
                    $img = $this->Custom->uploadImageBanner($tmp_name, $name, $path, $imgWidth);
                }
                $checkIdCount = $this->Catelogs->find('all')->where(['Catelogs.payment_id' => $data['getCateId']])->count();
                if ($checkIdCount == 0) {
                    $catelogs = $this->Catelogs->newEntity();
                    $data['payment_id'] = $data['cateId'];
                    $data['type'] = 1; // 1 one for users 2 for kids
                    $data[$imgCol] = $img;
                    $data['created'] = date('Y-m-d h:i:s');
                    $Catelogs = $this->Catelogs->patchEntity($catelogs, $data);
                    $this->Catelogs->save($Catelogs);
                } else {
                    $this->Catelogs->updateAll([$imgCol => $img], ['payment_id' => $data['getCateId']]);
                }
                $imgurl = "<img width='200' src='" . HTTP_ROOT . CATELOG . $img . " '>";
                echo json_encode(['status' => 1, 'img' => $imgurl]);
                exit;
            }
        }
        exit;
    }

    public function logout() {
        session_destroy();
        session_unset();
        foreach (@$_COOKIE as $key => $value) {
            unset($value);
        }
        $this->Flash->success('You are now logged out.');
        $this->viewBuilder()->layout('default');
        $type = $this->Auth->user('type');
        $this->request->session()->write('PROFILE', '');
        $this->request->session()->write('KID_ID', '');
        $this->request->session()->write('PROFILE', '');
        if ($this->Auth->logout()) {
            if ($type == 2) {
                return $this->redirect(HTTP_ROOT);
            } else if ($type == 1) {
                return $this->redirect(HTTP_ROOT . 'admin/');
            } else if ($type == 3) {
                return $this->redirect(HTTP_ROOT . 'admin/');
            }
        } else {
            return $this->redirect(HTTP_ROOT);
        }
        return $this->redirect(HTTP_ROOT);
    }

}
