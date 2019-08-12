<?php

namespace App\Controller;

ob_start();

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\TableRegistry;
use Cake\Core\App;

require_once(ROOT . '/vendor' . DS . 'PaymentTransactions' . DS . 'authorize-credit-card.php');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

//require_once(ROOT . '/vendor' . DS . 'Paypal' . DS . 'PaypalPro.php');
//  require_once(ROOT . '/vendor/' . DS . '/mpdf/vendor/' . 'autoload.php');
//
//  use PaypalPro;


define('FACEBOOK_SDK_V4_SRC_DIR', ROOT . '/vendor/' . DS . '/fb/src/Facebook/');
require_once(ROOT . '/vendor/' . DS . '/fb/' . 'autoload.php');

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;

class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Custom');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Mpdf');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->loadModel('Users');
        $this->loadModel('Settings');
        $this->loadModel('Pages');
        $this->loadModel('Settings');
        $this->loadModel('PaymentGetways');
        $this->loadModel('PersonalizedFix');
        $this->loadModel('rather downplay');
        $this->loadModel('refer_friends');
        $this->loadModel('ShippingAddress');
        $this->loadModel('SizeChart');
        $this->loadModel('style_quizs');
        $this->loadModel('UserDetails');
        $this->loadModel('YourProportions');
        $this->loadModel('PaymentCardDetails');

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
        //------------------Debendra 21-9-18--------------------------
        $this->loadModel('MensBrands');
        $this->loadModel('MenFit');
        $this->loadModel('MenStats');
        $this->loadModel('MenStyle');
        $this->loadModel('MenStyleSphereSelections');
        $this->loadModel('TypicallyWearMen');
        //------------------Debendra 21-9-18--------------------------

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
        $this->loadModel('Products');
        $this->loadModel('CustomerProductReview');
        $this->loadModel('Payments');
        $this->loadModel('UserUsesPromocode');
        $this->loadModel('Promocode');
        $this->loadModel('ChatMessages');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['startOnlineOffline', 'chatHistory', 'websocketMessage', 'adminlogin', 'fb_login', 'fbreturn', 'fblogin', 'client', 'webrootRedirect', 'personalInfo', 'login', 'index', 'logout', 'forget', 'changePassword', 'registration', 'sizedata', 'setAccount', 'setPassword', 'shipping', 'ajaxCheckEmailAvail', 'deleteAddress', 'addShipAddress']);
    }

    public function fblogin() {

        $this->autoRender = false;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI);
        $url = $helper->getLoginUrl(array('email'));
        $this->redirect($url);
    }

    public function fbreturn() {
        session_start();
        $this->viewBuilder()->layout('ajax');
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI);

        $session = $helper->getSessionFromRedirect();
        if (isset($_SESSION['token'])) {
            $session = new FacebookSession($_SESSION['token']);
            try {
                $session->validate(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
            } catch (FacebookAuthorizationException $e) {
                echo $e->getMessage();
            }
        }

        $data = array();
        $fb_data = array();

        if (isset($session)) {
            $_SESSION['token'] = $session->getToken();
            $appsecret_proof = hash_hmac('sha256', $_SESSION['token'], FACEBOOK_APP_SECRET);
            $request = new FacebookRequest($session, 'GET', '/me?locale=en_US&fields=name,email,gender,age_range,first_name,last_name,link,locale,picture,location', array("appsecret_proof" => $appsecret_proof));

            $response = $request->execute();
            $graph = $response->getGraphObject(GraphUser::className());



            $fb_data = $graph->asArray();
            $id = $graph->getId();
            $email = $graph->getEmail();
            $image = "https://graph.facebook.com/" . $id . "/picture?width=100";
//pj($fb_data);exit;
            if (!empty($fb_data)) {
                //  $result = $this->Users->find('all')->where(['email' => $fb_data['email']])->toArray();
                $result = $this->Users->find('all')->where(['email' => $fb_data['email']]);
                $result_email = $this->Users->find('all')->where(['email' => $fb_data['email']])->first();
                if ($result->count() != 0) {////if email id already exist or second time login through fb////
                    //if ($result_email['email'] == $fb_data['email'] && $result_email['facebook_id'] == $fb_data['id']) {
                    session_destroy();
                    $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id']])->first()->toArray();
                    $get_login = $this->Auth->setUser($getLoginConfirmation);
                    $user_login_id = $this->Auth->user('id');
                    if ($user_login_id) {
                        $user = $this->Users->newEntity();
                        $user->last_login_ip = $this->Custom->getRealIpAddress();
                        $user->last_login_date = date('Y-m-d H:i:s');
                        $user->id = $user_login_id;
                        $user->facebook_id = $fb_data['id'];
                        $this->Users->save($user);
                        if ($result_email['type'] == 2) {
                            $genderOfUser = str_rot13($fb_data['gender']);
                            $ageOfUser = str_rot13($fb_data['age_range']->min);
                            $this->Flash->success(__('Login successfull and please edit your profile'));
                            return $this->redirect(HTTP_ROOT);
                        }
                        $this->Flash->success(__('Login successfull'));
                    } else {
                        $this->Flash->error(__('Login failed and you can register here also'));
                        return $this->redirect(HTTP_ROOT);
                    }
                    // }
                } else {////if email id not exist and first time login through fb///////
                    $user = $this->Users->newEntity();
                    $user->email = $fb_data['email'];
                    $user->first_name = $fb_data['first_name'];
                    $user->last_name = $fb_data['last_name'];
                    $user->facebook_id = $fb_data['id'];
                    $user->unique_id = $this->Custom->generateUniqNumber();
                    $user->name = $user->first_name . " " . $user->last_name;
                    $user->created_dt = date('Y-m-d H:i:s');
                    $user->last_login_date = date('Y-m-d H:i:s');
                    $user->is_active = 1;
                    $user->reg_ip = $this->Custom->get_ip_address();
                    $user->last_login_ip = $this->Custom->get_ip_address();
                    if ($this->Users->save($user)) {
                        $data['id'] = $user->id;
                        session_destroy();
                        $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $user->id])->first()->toArray();
                        $get_login = $this->Auth->setUser($getLoginConfirmation);
                        $user_login_id = $this->Auth->user('id');
                        if ($user_login_id) {

                            $getId = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $user->id])->first();
                            if (isset($getId->id) && !empty($getId->id)) {
                                $data1['id'] = $getId->id;
                            } else {
                                $data1['id'] = '';
                            }

                            $userDetailspatch = $this->UserDetails->newEntity();
                            $data1['user_id'] = $userID;
                            $data1['first_name'] = $user->first_name;
                            $data1['last_name'] = $user->last_name;
//                    $userDetails['phone'] = $data['phone'];
                            $data1['dateofbirth'] = '';
//                    $userDetails['gender'] = '';
                            $data1['country'] = '';
                            //pj($userDetails); exit;
                            $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $data1);
                            $this->UserDetails->save($userDetailspatch);





                            $genderOfUser = str_rot13($fb_data['gender']);
                            $ageOfUser = str_rot13($fb_data['age_range']->min);
                            $this->Flash->success(__('Login successfull and please edit your profile'));
                            return $this->redirect(['controller' => 'Users', 'action' => 'editprofileSocialmedia/' . $genderOfUser . '/' . $ageOfUser . '/' . str_rot13($this->Auth->user('unique_id'))]);
                        } else {
                            $this->Flash->error(__('Login failed and you can register here also'));
                            return $this->redirect(HTTP_ROOT);
                        }
                    } else {
                        $this->Flash->error(__('Login failed and you can register here also'));
                        return $this->redirect(HTTP_ROOT);
                    }
                }
            } else {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT);
            }
        }
    }

//index is used for registration
    public function index() {

        $this->viewBuilder()->layout('default');
        $user_details = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();
            if ($exitEmail >= 1) {
                $this->Flash->error(__('Email already exits'));
                return $this->redirect(HTTP_ROOT . 'login/');
            } else {
                $password = time();
                $data['unique_id'] = $this->Custom->generateUniqNumber();
                $data['type'] = 2;
                $data['name'] = $data['fname'];
                $data['password'] = $password;
                $data['is_active'] = 1;
                $data['created_dt'] = date('Y-m-d h:i:s');
                $data['last_login_date'] = date('Y-m-d h:i:s');
                $data['qstr'] = '';

                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $userID = $user->id;
                    $userDetailspatch = $this->UserDetails->newEntity();
                    // Retrieve user from DB
                    $authUser = $this->Users->get($userID)->toArray();
                    // Log user in using Auth
                    $this->Auth->setUser($authUser);
                    $data1['user_id'] = $userID;
                    $data1['first_name'] = $data['fname'];
                    $data1['last_name'] = $data['lname'];
//                    $userDetails['phone'] = $data['phone'];
                    $data1['dateofbirth'] = '';
                    $data1['refer_name'] = $this->Auth->user('name') . $this->Auth->user('id');
                    $data1['country'] = '';
                    //pj($userDetails); exit;
                    $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $data1);
                    $this->UserDetails->save($userDetailspatch);
//                  //email creation
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $user->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $password = $password;
                    $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $password, $sitename);
//                   echo  $to, $from, $subject, $message;exit;
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    //email creation
                    $this->Flash->success(__('Account created successfully.'));
//                    $user = $this->Auth->identify();
//                    $this->Auth->setUser($user);
                    //return $this->redirect(HTTP_ROOT . 'welcome/schedule');
                    return $this->redirect(HTTP_ROOT . 'welcome/style/');
                }
            }
        }





        $this->set(compact('user_details'));
    }

    public function login() {
        $this->viewBuilder()->layout('default');
        if ($this->request->session()->read('Auth.User.id') != '') {
            return $this->redirect(['controller' => 'users', 'action' => 'index']);
        }

        $title_for_layout = "LOGIN";
        $metaKeyword = "login";
        $metaDescription = "login";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user = $this->Auth->identify();
            if ($data['email'] == "") {
                $this->Flash->error(__('Please enter email'));
            } else if ($data['password'] == "") {
                $this->Flash->error(__('Please enter password'));
            } else if ($data['email'] == "" && $data['pass'] == "") {
                $this->Flash->error(__('Please enter email and password'));
            } else {
                if ($user) {
                    if ($data['email']) {
                        $isactive_check = $this->Users->find('all')->where(['Users.email' => $data['email'], 'Users.is_active' => true, 'Users.type IN' => [2]]);

                        $isactive_counter = $isactive_check->count();
                        if ($isactive_counter > 0) {
                            $this->Auth->setUser($user);
                            $type = $this->Auth->user('type');
                            $name = $this->Auth->user('name');
                            $email = $this->Auth->user('email');
                            $user_id = $this->Auth->user('id');
                            if ($type == 2) {

                                $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_id])->first();
                                if ($Userdetails->gender == 1) {
                                    $gen = "MEN";
                                }
                                if ($Userdetails->gender == 2) {
                                    $gen = "WOMEN";
                                }

                                $this->request->session()->write('PROFILE', $gen);
                                $productData = $this->Products->find('all')->where(['Products.user_id' => $this->Auth->user('id'), 'Products.checkedout' => 'N'])->count();
                                $productReview = $this->Products->find('all')->where(['Products.user_id' => $this->Auth->user('id'), 'Products.checkedout NOT IN' => ['N', 'Y']])->count();

                                $check_redirect = $isactive_check->first();

                                if ($productData >= 1) {
                                    return $this->redirect(HTTP_ROOT . 'order_review/');
                                } elseif ($productReview >= 0) {
                                    return $this->redirect(HTTP_ROOT . 'profile-review/');
                                } else {
                                    return $this->redirect(HTTP_ROOT . 'welcome/schedule/');
                                }
                            }
                        } else {
                            $this->Flash->error(__('Your have not permission please contacts your admin'));
                        }
                    } else {
                        $this->Flash->error(__('Invalid username or password, try again'));
                    }
                } else {
                    $this->Flash->error(__('Invalid username or password, try again'));
                }
            }
        }
    }

    public function logout() {
        $this->Flash->success('You are now logged out.');
        $this->viewBuilder()->layout('default');
        $type = $this->Auth->user('type');
        if ($this->Auth->logout()) {
            if ($type == 2) {
                return $this->redirect(HTTP_ROOT . 'login/');
            } else if ($type == 1) {
                return $this->redirect(HTTP_ROOT . 'admin/');
            } else if ($type == 3) {
                return $this->redirect(HTTP_ROOT . 'admin/');
            }
        }
        exit;
    }

    public function webrootRedirect() {

        $this->viewBuilder()->layout('login/');
        return $this->redirect(HTTP_ROOT . 'login/');
    }

    public function adminlogin() {
        $this->viewBuilder()->layout('default');
        if ($this->request->session()->read('Auth.User.id') != '') {
            if ($this->request->session()->read('Auth.User.type') == 1) {
                return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
            } else {
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
            }
        }
        $title_for_layout = "LOGIN";
        $metaKeyword = "login";
        $metaDescription = "login";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user = $this->Auth->identify();
            if ($data['email'] == "") {
                $this->Flash->error(__('Please enter email'));
            } else if ($data['password'] == "") {
                $this->Flash->error(__('Please enter password'));
            } else if ($data['email'] == "" && $data['pass'] == "") {
                $this->Flash->error(__('Please enter email and password'));
            } else {
                if ($user) {
                    if ($data['email']) {
                        $isactive_check = $this->Users->find('all')->where(['Users.email' => $data['email'], 'Users.is_active' => true, 'Users.type IN' => [1, 3]]);
                        $isactive_counter = $isactive_check->count();
                        if ($isactive_counter > 0) {
                            $this->Auth->setUser($user);
                            $type = $this->Auth->user('type');
                            $name = $this->Auth->user('name');
                            $email = $this->Auth->user('email');
                            $user_id = $this->Auth->user('id');
                            if ($type == 1 || $type == 3) {
                                $this->Flash->success(__('Login successful'));
                                return $this->redirect(HTTP_ROOT . 'appadmins/index/');
                            } else {

                                return $this->redirect(HTTP_ROOT);
                            }
                        } else {
                            $this->Flash->error(__('Your have not permission  to access please contact your admin'));
                        }
                    } else {
                        $this->Flash->error(__('Invalid username or password, try again'));
                    }
                } else {
                    $this->Flash->error(__('Invalid username or password, try again'));
                }
            }
        }
    }

    public function forget() {

        $this->viewBuilder()->setLayout('default');
        $user = $this->Users->newEntity();
        if ($this->request->is(['post'])) {
            $data = $this->request->data;

            if ($data['email'] == "") {
                $this->Flash->error(__('Email field is empty'));
//                echo json_encode(['status' => 'erorr', 'msg' => 'Email field is empty']);
//                exit;
            } else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) {
                $this->Flash->error(__('Please enter a valid email id'));
//                echo json_encode(['status' => 'erorr', 'msg' => 'Please enter a valid email id']);
//                exit;
            } else {
                $users = $this->Users->find('all')->where(['Users.email' => $data['email']]);
                $user = $users->first();
                if ($users->count() > 0) {
                    $this->Users->query()->update()->set(['qstr' => $this->Custom->generateUniqNumber()])->where(['id' => $user->id])->execute();
                    $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'FORGOT_PASSWORD'])->first();
                    $to = $user->email;
                    $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $from = $fromvalue->value;
                    $subject = $emailTemplate->display;
                    $link = '<a style="text-decoration:none;color:black;" target="_blank" href=' . HTTP_ROOT . 'changePassword/' . $user->unique_id . '>Reset Password</a>';
                    $message = $this->Custom->formatForgetPassword($emailTemplate->value, $user->name, $user->email, $link, SITE_NAME);
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    //echo $to."<br>".$subject."<br>".$message."<br>".$from;                    
//                    $email1 = new Email('default');
//                    $email1->from([$from => 'Drap'])
//                            ->to($to)
//                            ->subject($subject)
//                            ->emailFormat('html')
//                            ->send($message);

                    $this->Flash->success(__('A link to reset your password has been set to your registered email address.'));
//                    echo json_encode(['status' => 'successs', 'msg' => 'A link to reset your password has been set to your registered email address.']);
//                    exit;
                } else {
                    $this->Flash->error(__('This email is not associated with our site. Register here.'));
                    return $this->redirect(HTTP_ROOT);
//                    
                }
            }
        }
    }

    public function changePassword($uniq = null) {
        $this->viewBuilder()->layout('default');
        $title_for_layout = "Change password";
        $metaKeyword = "Change password";
        $metaDescription = "Change password";

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            if ($data['New_Password'] == "") {
                $this->Flash->error(__('Please enter password'), 'error_message');
            } else if (strlen($data['New_Password']) < 5) {
                $this->Flash->error(__('Password must contain atleast 10 characters.'));
            } else if ($data['Confirm_Password'] == "") {
                $this->Flash->error(__('Please enter confirm password'), 'error_message');
            } else if (strlen($data['Confirm_Password']) < 5) {
                $this->Flash->error(__('Confirm password must contain atleast 10 characters.'));
            } else if ($data['New_Password'] != $data['Confirm_Password']) {
                $this->Flash->error(__('Please enter confirm password same as password'), 'error_message');
            } else {
                $users = $this->Users->find('all')->where(['Users.unique_id' => $data['uniq']]);
                $uniq = $data['uniq'];
                $userData = $users->first();
                $data_can_be_passed_here = 12;
                $status = 34;

                if ($users->count() > 0 && $userData->qstr != '') {
                    $data['id'] = $userData->id;
                    $user->password = $data['New_Password'];
                    $user->id = $userData->id;
                    if ($this->Users->save($user)) {

                        $this->Flash->success(__('Password changed successfully now you can login.'));
//                        return $this->redirect(['controller' => 'users', 'action' => 'index',"?" => array("key" => "d56b699830e77ba53855679cb1d252da")]);
                        return $this->redirect(HTTP_ROOT . 'login/');
                    }
                } else {
                    $this->Flash->error(__('You have already used this link.'));
                    return $this->redirect(HTTP_ROOT . 'forget/');
                }
            }
        }
        $this->set(compact('uniq', 'user', 'metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function registration() {
        $params = $this->request->getAttribute('params');
        $g = $params['_matchedRoute'];
        $gender = str_replace("/", "", $g);
        $this->viewBuilder()->layout('default');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();
            if ($exitEmail >= 1) {
                $this->Flash->error(__('Email already exits'));
                return $this->redirect(HTTP_ROOT);
            } else {
                $password = time();
                $data['unique_id'] = $this->Custom->generateUniqNumber();
                $data['type'] = 2;
                $data['name'] = $data['fname'];
                $data['password'] = $password;
                $data['is_active'] = 1;
                $data['created_dt'] = date('Y-m-d h:i:s');

                $data['last_login_date'] = date('Y-m-d h:i:s');
                $data['qstr'] = '';

                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $userID = $user->id;
                    $userDetailspatch = $this->UserDetails->newEntity();
                    // Retrieve user from DB
                    $authUser = $this->Users->get($userID)->toArray();
                    // Log user in using Auth
                    $this->Auth->setUser($authUser);
                    $userDetails['user_id'] = $userID;
                    $userDetails['first_name'] = $data['fname'];
                    $userDetails['last_name'] = $data['lname'];
                    $userDetails['dateofbirth'] = '';

                    if ($gender == 'men') {
                        $userDetails['gender'] = '1';
                    } elseif ($gender == 'women') {
                        $userDetails['gender'] = '2';
                    } else {
                        $userDetails['gender'] = '3';
                        $gender = 'kids';
                    }


                    $gender1 = strtoupper($gender);
                    $userDetails['country'] = '';
                    $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $userDetails);
                    $this->UserDetails->save($userDetailspatch);
                    $this->request->session()->write('PROFILE', $gender1);
                    //email creation
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $user->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $password = $password;
                    $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $password, $sitename);

                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    //email creation
                    $this->Flash->success(__('Account created successfully.'));
//                    $user = $this->Auth->identify();
//                    $this->Auth->setUser($user);
                    return $this->redirect(HTTP_ROOT . 'welcome/style/');
                }
            }
        }

        if ($this->Auth->user('id')) {
            $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first(); //added by me
            if ($userDetails->user_detail->gender == '') {
                $male = 'empty';
            } else {
                $male = $userDetails->user_detail->gender;
            }
        }


        $this->set(compact('userDetails', 'male'));
    }

    public function catgeogryAdd($slog = null) {
        $this->viewBuilder()->layout('default');

        $id = $this->Auth->user('id');
        $slogvalue = 0;
        if ($slog == 'men') {
            $slogvalue = 1;
        } else if ($slog == 'women') {
            $slogvalue = 2;
        } else if ($slog == 'kids') {
            $slogvalue = 3;
        }

        $gender = strtoupper($slog);
        $this->UserDetails->updateAll(['gender' => $slogvalue], ['user_id' => $id]);
        $this->request->session()->write('PROFILE', $gender);
        return $this->redirect(HTTP_ROOT . 'welcome/style/');
    }

    public function welcome($slug = null, $sections = null, $editid = null) {
        if (empty($slug)) {
            return $this->redirect(HTTP_ROOT . 'welcome/schedule/');
        }
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.is_save' => 1]);
//        pj($savecard);exit;
        $progressbar_count = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
//        pj($progressbar_count);exit;
        if ($userDetails->user_detail->gender == '') {

            return $this->redirect(HTTP_ROOT . 'registration');
        }

        if ($slug == 'schedule') {
            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                    $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                }
            }
            if ($this->request->session()->read('PROFILE') == 'MEN') {

                $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
            }
            if ($this->request->session()->read('PROFILE') == 'WOMEN') {

                $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
//                 pj($LetsPlanYourFirstFixData);exit;
            }
        }

        if ($slug == 'reservation') {
            $Date = date('Y-m-d');
            $date_in_delivary = date('l, F  d', strtotime($Date . ' + 15 day'));
            $this->set(compact('date_in_delivary'));
            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                    //PJ($kidmenu); exit;
                }
            }
        }
        if ($slug == 'addressbook') {
            $useraddress_datas = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);
        }
        if ($slug == 'shipping') {

            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                    $shipping_name = $kidmenu->kids_first_name;
                    $ShippingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.user_id' => $this->request->session()->read('KID_ID')])->first();
                }
            } else {
                $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
                $ShippingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first();
                //pj($ShippingAddress);exit;
                $shipping_name = $userDetails->first_name . ' ' . $userDetails->last_name;
            }

            if ($sections == "edit") {
                $sections = "Edit your Address";
                $ShippingAddress = $this->ShippingAddress->find('all')->where(['id' => $editid, 'ShippingAddress.user_id' => $this->Auth->user('id')])->first();
            } else if ($sections == "addresss") {

                $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $this->Auth->user('id')]);
                $this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $editid]);
                return $this->redirect(HTTP_ROOT . '/welcome/payment/');
            } else if ($sections == "add") {
                $sections = "Add a new address";
            }

            $this->set(compact('date_in_delivary', 'shipping_name', 'ShippingAddress'));
        }

        if ($slug == 'payment') {

            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                    $payerName = $kidmenu->kids_first_name;
                    $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
                } else {
                    $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
                    $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
                    $payerName = $userDetails->first_name . ' ' . $userDetails->last_name;
                }
            }
            $this->set(compact('date_in_delivary', 'shipping_name', 'ShippingAddress', 'payerName'));
        }

        if ($slug == 'style') {


            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                $kidname = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->request->session()->read('KID_ID')])->first();
                if (!empty($this->request->session()->read('KID_ID'))) {
//                     echo $slug;exit;
                    // echo $this->request->session()->read('KID_ID');
                    $kidDetails = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();


                    $KidsPersonalityValue1 = $this->KidsPersonality->find('all')->where(['KidsPersonality.kid_id' => $this->request->session()->read('KID_ID')]);
                    $KidsPersonalityValue = $KidsPersonalityValue1->extract('kids_personality_types')->toArray();

                    $KidsPersonalityValue2 = $this->KidsPrimary->find('all')->where(['KidsPrimary.kid_id' => $this->request->session()->read('KID_ID')]);
                    $KidsPrimaryValue = $KidsPersonalityValue2->extract('kids_primary_objectives')->toArray();

                    $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                    $KidsSizeFit = $this->KidsSizeFit->find('all')->where(['KidsSizeFit.kid_id' => $this->request->session()->read('KID_ID')])->first();

                    $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    $kids_pricing_shoping = $this->KidsPricingShoping->find('all')->where(['KidsPricingShoping.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    $kid_purchase_clothing = $this->KidPurchaseClothing->find('all')->where(['KidPurchaseClothing.kid_id' => $this->request->session()->read('KID_ID')]);
                    $kids_stores = $kid_purchase_clothing->extract('kids_stores')->toArray();
                    // pj($kids_stores);exit;
                    $kids_avoid_fabric1 = $this->FabricsOrEmbellishments->find('all')->where(['FabricsOrEmbellishments.kid_id' => $this->request->session()->read('KID_ID')]);
                    $KID_AVOID_FABRIC = $kids_avoid_fabric1->extract('kids_avoid_fabric')->toArray();
                    $KidStyles2 = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    $this->set(compact('KidStyles2', 'KID_AVOID_FABRIC', 'kids_pricing_shoping', 'kids_stores', 'kidmenu', 'KidsPrimaryValue', 'KidsPersonalityValue2', 'KidsPersonalityValue', 'KidsPersonalityValue1', 'KidsSizeFit', 'KidClothingType'));
                }
            }
            //------------------Debendra 21-9-18--------------------------
            if ($this->request->session()->read('PROFILE') == 'MEN') {

                $MenStats = $this->MenStats->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                //  pj($MenStats);
                $TypicallyWearMen = $this->TypicallyWearMen->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

                $MenFit = $this->MenFit->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $MenStyle = $this->MenStyle->find('all')->where(['MenStyle.user_id' => $this->Auth->user('id')])->first();
//                pj($MenStyle);
                $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $this->Auth->user('id')]);
                $menbrand = $MensBrands->extract('mens_brands')->toArray();
                $style_sphere_selections_v2 = $this->MenStyleSphereSelections->find('all')->where(['MenStyleSphereSelections.user_id' => $this->Auth->user('id')]);
                $style_sphere = $style_sphere_selections_v2->extract('style_sphere_selections_v2')->toArray();
//                  pr($menbrand);exit;
                $MenStyleSphereSelections = $this->MenStyleSphereSelections->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $this->set(compact('style_sphere', 'menbrand', 'MenStyle', 'MensBrands', 'MenFit', 'TypicallyWearMen', 'MenStats', 'MenStyleSphereSelections'));
            }
            //------------------Debendra 21-9-18--------------------------
            if ($this->request->session()->read('PROFILE') == 'WOMEN') {

                $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
                //pj($userDetails); exit;
                $PersonalizedFix = $this->PersonalizedFix->find('all')->where(['PersonalizedFix.user_id' => $this->Auth->user('id')])->first();
                $SizeChart = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $this->Auth->user('id')])->first();
                $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $this->Auth->user('id')])->first();

                $WomenJeansStyle1 = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $this->Auth->user('id')]);
                $WomenJeansStyle = $WomenJeansStyle1->extract('jeans_style')->toArray();

                $WomenJeansRise1 = $this->WomenJeansRise->find('all')->where(['WomenJeansRise.user_id' => $this->Auth->user('id')]);
                $WomenJeansRise = $WomenJeansRise1->extract('jeans_rise')->toArray();

                $WomenJeansLength1 = $this->WemenJeansLength->find('all')->where(['WemenJeansLength.user_id' => $this->Auth->user('id')]);
                $WomenJeansLength = $WomenJeansLength1->extract('jeans_length')->toArray();
                $Womenstyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $this->Auth->user('id')])->first();
//                pj($Womenstyle);exit;
                // $WomenRatherDownplay = $this->WomenRatherDownplay->find('all')->where(['WomenRatherDownplay.user_id' => $this->Auth->user('id')])->first();

                $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $this->Auth->user('id')])->first();
                $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $this->Auth->user('id')])->first();
                $primaryinfo = explode(",", @$Womeninfo->primary_objectives);

                $womens_brands_plus_low_tier1 = $this->WomenTypicalPurchaseCloth->find('all')->where(['WomenTypicalPurchaseCloth.user_id' => $this->Auth->user('id')]);
                $womens_brands_plus_low_tier = $womens_brands_plus_low_tier1->extract('womens_brands_plus_low_tier')->toArray();

                $style_wardrobe1 = $this->WomenIncorporateWardrobe->find('all')->where(['WomenIncorporateWardrobe.user_id' => $this->Auth->user('id')]);
                $style_wardrobe = $style_wardrobe1->extract('style_wardrobe')->toArray();


                $avoid_colors1 = $this->WomenColorAvoid->find('all')->where(['WomenColorAvoid.user_id' => $this->Auth->user('id')]);
                $avoid_colors = $avoid_colors1->extract('avoid_colors')->toArray();

                $avoid_prints1 = $this->WomenPrintsAvoid->find('all')->where(['WomenPrintsAvoid.user_id' => $this->Auth->user('id')]);
                $avoid_prints = $avoid_prints1->extract('avoid_prints')->toArray();


                $avoid_fabrics1 = $this->WomenFabricsAvoid->find('all')->where(['WomenFabricsAvoid.user_id' => $this->Auth->user('id')]);
                $avoid_fabrics = $avoid_fabrics1->extract('avoid_fabrics')->toArray();



                $this->set(compact('primaryinfo', 'Womeninfo', 'style_wardrobe', 'avoid_fabrics', 'avoid_prints', 'avoid_colors', 'womens_brands_plus_low_tier', 'WomenJeansStyle', 'Womenprice', 'Womenstyle', 'WomenRatherDownplay', 'WomenJeansLength', 'WomenJeansRise', 'FitCut', 'SizeChart'));
            }
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            //            pj($data);exit;
            //------------------Debendra 21-9-18--------------------------
            if (@$data['men_stas'] == 'men_stas') {
                if (@$data['tall_feet'] == '') {
                    $this->Flash->error(__('Please enter your feet.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/stats');
                }
                if (@$data['tell_inch'] == '') {
                    $this->Flash->error(__('Please enter inch'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/stats');
                }
                if (@$data['weight_lb'] == '') {
                    $this->Flash->error(__('Please enter weight'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/stats');
                }
                if (@$data['birthday'] == '') {
                    $this->Flash->error(__('Please enter Date of birth'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/stats');
                }
                if (@$data['size'] == '') {
                    $this->Flash->error(__('Please enter size'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/stats');
                }
                if (@$data['shirt'] == '') {
                    $this->Flash->error(__('Please enter shirt size'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/stats');
                }
                if (@$data['waist'] == '') {
                    $this->Flash->error(__('Please enter waist size'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/stats');
                }
                if (@$data['inseam'] == '') {
                    $this->Flash->error(__('Please enter inseam size'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/stats');
                }
                $MenStats = $this->MenStats->newEntity();
                $TypicallyWearMen = $this->TypicallyWearMen->newEntity();
                $data['user_id'] = $this->Auth->user('id');

                $this->MenStats->deleteAll(['user_id' => $this->Auth->user('id')]);
                $this->TypicallyWearMen->deleteAll(['user_id' => $this->Auth->user('id')]);

                $MenStats = $this->MenStats->patchEntity($MenStats, $data);
                $TypicallyWearMen = $this->TypicallyWearMen->patchEntity($TypicallyWearMen, $data);
                $this->MenStats->save($MenStats);
                $this->TypicallyWearMen->save($TypicallyWearMen);
                $this->UserDetails->updateAll(['is_progressbar' => 25], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/style/fit');
            }
            if (@$data['men_fit'] == 'men_fit') {
//                pj($data);exit;
                $MenFit = $this->MenFit->newEntity();
                $data['user_id'] = $this->Auth->user('id');
                if (@$data['casual_shirts_to_fit'] == '') {
                    $this->Flash->error(__('Please select at least one casual shirt.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/fit');
                }
                if (@$data['button_up_shirts_to_fit'] == '') {
                    $this->Flash->error(__('Please select at least one button up shirts.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/fit');
                }
                if (@$data['jeans_to_fit'] == '') {
                    $this->Flash->error(__('Please select at least one jeans.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/fit');
                }
                if (@$data['your_pants_to_fit'] == '') {
                    $this->Flash->error(__('Please select at least one pants.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/fit');
                }

                $data['casual_shirts_to_fit'] = implode(",", $data['casual_shirts_to_fit']);
                $data['button_up_shirts_to_fit'] = implode(",", $data['button_up_shirts_to_fit']);
                $data['your_pants_to_fit'] = implode(",", $data['your_pants_to_fit']);
                $data['prefer_your_shorts'] = implode(",", $data['prefer_your_shorts']);
                $data['jeans_to_fit'] = implode(",", $data['jeans_to_fit']);
                $this->MenFit->deleteAll(['user_id' => $this->Auth->user('id')]);
                $MenFit = $this->MenFit->patchEntity($MenFit, $data);
                $this->MenFit->save($MenFit);
                $this->UserDetails->updateAll(['is_progressbar' => 40], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/style/styles');
            }
            if (@$data['save'] == 'save') {
//                 pj($data);exit;
//                 mens_brands style_sphere_selections_v2
                if (@$data['style_sphere_selections_v2'] == '') {
                    $this->Flash->error(__('Please select at least one under outfits'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/styles');
                }
                if (@$data['mens_brands']) {
                    foreach (@$data['mens_brands'] as $mens_brands) {
                        $newEntity1 = $this->MensBrands->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['mens_brands'] = $mens_brands;
                        $newEntity1 = $this->MensBrands->patchEntity($newEntity1, $data);
                        $this->MensBrands->save($newEntity1);
                    }
                }
                if (@$data['style_sphere_selections_v2']) {
                    foreach (@$data['style_sphere_selections_v2'] as $style_sphere_selections_v2) {
                        $newEntity1 = $this->MenStyleSphereSelections->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['style_sphere_selections_v2'] = $style_sphere_selections_v2;
                        $newEntity1 = $this->MenStyleSphereSelections->patchEntity($newEntity1, $data);
                        $this->MenStyleSphereSelections->save($newEntity1);
                    }
                }
                $men_style = $this->MenStyle->newEntity();
                $data['user_id'] = $this->Auth->user('id');
                $this->MenStyle->deleteAll(['user_id' => $this->Auth->user('id')]);
                $men_style = $this->MenStyle->patchEntity($men_style, $data);
                $this->MenStyle->save($men_style);
                $this->UserDetails->updateAll(['is_progressbar' => 60], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/schedule');
            }

            //------------------Debendra 21-9-18--------------------------
            if (@$data['first_time_fix'] == 'first_time_fix') {
                $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();

                if (isset($data['kid_id']) && $data['kid_id']) {
                    $exitdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->count();
                } else {
                    $exitdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->count();
                }


                if ($exitdata >= 1) {

                    $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $data['try_new_items_with_scheduled_fixes'], 'how_often_would_you_lik_fixes' => $data['how_often_would_you_lik_fixes']], ['user_id' => $this->Auth->user('id')]);
                    $this->Flash->success(__('Updated successfully.'));
                } else {
                    $data['user_id'] = $this->Auth->user('id');
                    $data['kid_id'] = (@$data['kid_id']) ? @$data['kid_id'] : 0;
                    $data['try_new_items_with_scheduled_fixes'] = $data['try_new_items_with_scheduled_fixes'];
                    $data['how_often_would_you_lik_fixes'] = $data['how_often_would_you_lik_fixes'];
                    $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
                    $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
//                    pj($LetsPlanYourFirstFix);exit;
                }
                $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/reservation');
            }
            if (@$data['shipping_address'] == 'shipping_address') {
                $entity = $this->DeliverDate->newEntity();
                if (isset($data['kid_id']) && !empty($data['kid_id'])) {
                    $data['kid_id'] = $data['kid_id'];
                    $delivaryDate = $this->DeliverDate->find('all')->where(['DeliverDate.kid_id' => $data['kid_id']])->first();
                    if (isset($delivaryDate->id) && !empty($delivaryDate->id)) {
                        $data['id'] = $delivaryDate->id;
                    } else {
                        $data['id'] = '';
                    }
                } else if (isset($data['user_id']) && !empty($data['user_id'])) {
                    $data['user_id'] = $data['user_id'];
                    $delivaryDate = $this->DeliverDate->find('all')->where(['DeliverDate.user_id' => $data['user_id']])->first();
                    if (isset($delivaryDate->id) && !empty($delivaryDate->id)) {
                        $data['id'] = $delivaryDate->id;
                    } else {
                        $data['id'] = '';
                    }

                    $data['kid_id'] = 0;
                }
                $data['user_id'] = $this->Auth->user('id');
                $data['date_in_time'] = $data['date_in_time'];
                $entity = $this->DeliverDate->patchEntity($entity, $data);
                $this->DeliverDate->save($entity);
                $this->UserDetails->updateAll(['is_progressbar' => 85], ['user_id' => $this->Auth->user('id')]);
                //return $this->redirect(HTTP_ROOT . 'welcome/shipping');
                return $this->redirect(HTTP_ROOT . 'welcome/addressbook');
            }
            if (@$data['payment'] == 'payment') {
                $shippingAddress = $this->ShippingAddress->newEntity();
                //$exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->count();
                if ($sections == "Edit your Address" || $sections == "Shipping Address") {

                    $this->ShippingAddress->updateAll([
                        'full_name' => $data['full_name'],
                        'address' => $data['address'],
                        'address_line_2' => $data['address_line_2'],
                        'city' => $data['city'],
                        'zipcode' => $data['zipcode'],
                        'state' => $data['state']], ['user_id' => $this->Auth->user('id'), 'id' => $editid]);

                    $this->Flash->success(__('Updated successfully.'));
                } else {
                    $data['user_id'] = $this->Auth->user('id');
                    $data['full_name'] = $data['full_name'];
                    $data['address'] = $data['address'];
                    $data['address_line_2'] = $data['address_line_2'];
                    $data['city'] = $data['city'];
                    $data['state'] = $data['state'];
                    $data['zipcode'] = $data['zipcode'];
                    $LetsPlanYourFirstFix = $this->ShippingAddress->patchEntity($shippingAddress, $data);
                    $this->ShippingAddress->save($shippingAddress);
                }
                $this->UserDetails->updateAll(['is_progressbar' => 90], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/payment');
            }
            if (@$data['card_payment'] == 'Add your card') {


                $newEntity = $this->PaymentCardDetails->newEntity();

//                if ($data['isSaveCard'] == 1) {
//                    $isSaveCard = 1;
//                } else {
//                    $isSaveCard = 0;
//                }
//                if ($this->request->session()->read('PROFILE') == 'KIDS') {
//                    $profile_type = 3;
//                } elseif ($this->request->session()->read('PROFILE') == 'MEN') {
//                    $profile_type = 1;
//                } elseif ($this->request->session()->read('PROFILE') == 'WOMEN')  {
//                    $profile_type = 2;
//                }
                $data['user_id'] = $this->Auth->user('id');
                //$data['price'] = $data['price'];
                $data['is_save'] = 1;
//                $data['profile_type'] = $profile_type;

                $data['count'] = @$count++;

                $data['profile'] = $this->Auth->user('type');
                $data['card_name'] = $data['card_name'];
                $data['card_number'] = $data['card_number'];
                $data['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];
                $data['cvv'] = $data['cvv'];
                $data['status'] = 0;
                $data['created_dt'] = date('Y-m-d h:i:s');
                $newEntity = $this->PaymentCardDetails->patchEntity($newEntity, $data);
                $this->PaymentCardDetails->save($newEntity);

                //for use on payment get ways setiing 
//                $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
//                $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first();
//                // $arr_user_info = [
//                //     'card_number' => $data['card_number'], //'4111111111111111',
//                //     'exp_date' => $data['card_expire'],//'2020-12',
//                //     'card_code' => $data['cvv'],//'123',
//                //     'product' => 'Test stiching',
//                //     'first_name' => $userData->first_name,
//                //     'last_name' => $userData->last_name,
//                //     'address' => $exitdata->address,
//                //     'city' => $exitdata->city,
//                //     'state' => $exitdata->city,
//                //     'zip' => $exitdata->zipcode,
//                //     'country' => $userData->country,
//                //     'email' => $this->Auth->user('email'),
//                //     'amount' => 20,
//                //     'uniquieId' => $this->Auth->user('unique_id'),
//                //     'invice' => $newEntity->id,
//                //     'companyName' => 'microfinet',
//                // ];
//                $arr_user_info = [
//                    'card_number' => $data['card_number'],
//                    'exp_date' => $data['card_expire'],
//                    'card_code' => $data['cvv'],
//                    'product' => 'Test Plugin',
//                    'first_name' => $userData->first_name,
//                    'last_name' => $userData->last_name,
//                    'address' => '101 main street',
//                    'city' => 'Pecan Springs',
//                    'state' => 'TX',
//                    'zip' => '44628',
//                    'country' => 'USA',
//                    'email' => $this->Auth->user('email'),
//                    'amount' => $data['price'],
//                    'companyName' => 'microfinet',
//                ];
//                $message = $this->authorizeCreditCard($arr_user_info);
//                if ($message['error'] == 'error') {
//                    $this->Flash->success(__($message['ErrorMessage']));
//                } else {
//                    $this->Flash->success(__($message['Success']));
//                    //for use on mail setiing
//
//                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUCCESS_PAYMENT'])->first();
//                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
//                    $to = $this->Auth->user('email');
//                    $name = $this->Auth->user('name');
//                    $from = $fromMail->value;
//                    $subject = $emailMessage->display;
//                    $sitename = SITE_NAME;
//
//                    $message = $this->Custom->paymentEmail($emailMessage->value, $name, $message, $sitename);
//                    //  echo  $to, $from, $subject, $message;exit;
//                    $this->Custom->sendEmail($to, $from, $subject, $message);
//                    $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
//                    return $this->redirect(HTTP_ROOT . 'welcome/payment');
//                }
            }

            //kids code
            if (@$data['style'] == 'style') {
                $newEntity = $this->KidsDetails->newEntity();
                if (!empty($this->request->session()->read('KID_ID'))) {
                    //$kidDetails=$this->KidsDetails->find('all')->where(['KidsDetails.id'=>$this->request->session()->read('KID_ID')])->first();
                    $data['id'] = $this->request->session()->read('KID_ID');
                } else {
                    $data['id'] = '';
                }
                if ($data['kids_first_name'] == '') {
                    $this->Flash->error(__('Please enter kids name.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }

                $data['user_id'] = $this->Auth->user('id');
                $data['kids_first_name'] = $data['kids_first_name'];
                $data['kids_birthdate'] = $data['kids_birthdate'];
                $data['kids_relationship_to_child'] = $data['kids_relationship_to_child'];
                $data['kids_clothing_gender'] = $data['kids_clothing_gender'];
                $data['kids_frequency_arts_and_crafts'] = $data['kids_frequency_arts_and_crafts'];
                $data['kids_frequency_biking'] = $data['kids_frequency_biking'];
                $data['kids_frequency_theatre'] = $data['kids_frequency_theatre'];
                $data['kids_frequency_dance'] = $data['kids_frequency_dance'];
                $data['kids_frequency_sports'] = $data['kids_frequency_sports'];
                $data['kids_frequency_playing_outside'] = $data['kids_frequency_playing_outside'];
                $data['kids_frequency_musical_instruments'] = $data['kids_frequency_musical_instruments'];
                $data['kids_frequency_reading'] = $data['kids_frequency_reading'];
                $data['kids_frequency_video_games'] = $data['kids_frequency_video_games'];
                $newEntity = $this->KidsDetails->patchEntity($newEntity, $data);
                $this->KidsDetails->save($newEntity);
                $this->request->session()->write('KID_ID', $newEntity->id);
                $this->KidsPersonality->deleteAll(['kid_id' => $this->request->session()->read('KID_ID')]);
                $this->KidsPrimary->deleteAll(['kid_id' => $this->request->session()->read('KID_ID')]);
                if (@$data['kids_personality_types']) {
                    foreach (@$data['kids_personality_types'] as $kids_personality_types) {
                        $newEntity1 = $this->KidsPersonality->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['kid_id'] = $this->request->session()->read('KID_ID');
                        $data['kids_personality_types'] = $kids_personality_types;
                        $newEntity1 = $this->KidsPersonality->patchEntity($newEntity1, $data);
                        $this->KidsPersonality->save($newEntity1);
                    }
                }

                if (@$data['kids_primary_objectives']) {
                    foreach (@$data['kids_primary_objectives'] as $kids_primary_objectives) {
                        $newEntity2 = $this->KidsPrimary->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['kid_id'] = $this->request->session()->read('KID_ID');
                        $data['kids_primary_objectives'] = $kids_primary_objectives;
                        $newEntity2 = $this->KidsPrimary->patchEntity($newEntity2, $data);
                        $this->KidsPrimary->save($newEntity2);
                    }
                }
                $this->UserDetails->updateAll(['is_progressbar' => 20], ['user_id' => $this->Auth->user('id')]);
//                return $this->redirect(HTTP_ROOT . 'welcome/size_fit');
                return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
            }
            if (@$data['fit'] == 'fit') {
                // pj($data);exit;
                $newEntity = $this->KidsSizeFit->newEntity();
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidDetails = $this->KidsSizeFit->find('all')->where(['KidsSizeFit.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    if ($kidDetails->id) {
                        $data['id'] = $kidDetails->id;
                    }
                } else {
                    $data['id'] = '';
                }
                if ($data['top_size'] == '') {
                    $this->Flash->error(__('Please enter top size.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
                }
                if ($data['tell_ft'] == 'NULL') {
                    $this->Flash->error(__('Please enter height in feet.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
                }
                if ($data['tell_inch'] == 'NULL') {
                    // echo 'hello';exit;
                    $this->Flash->error(__('Please enter height in inch.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
                }
                if ($data['kids_weight'] == '') {
                    $this->Flash->error(__('Please enter weight.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
                }
                if ($data['bottom_size'] == '') {
                    $this->Flash->error(__('Please enter bottom size.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
                } else {
                    $data['user_id'] = $this->Auth->user('id');
                    $data['kid_id'] = $this->request->session()->read('KID_ID');
                    $data['tell_ft'] = $data['tell_ft'];
                    $data['tell_inch'] = $data['tell_inch'];
                    $data['kids_weight'] = $data['kids_weight'];
                    $data['bottom_size'] = $data['bottom_size'];
                    $data['top_size'] = $data['top_size'];
                    $data['shoe_size'] = $data['shoe_size'];
                    $data['kids_fit_challenge_shirt_sleeve_length'] = $data['kids_fit_challenge_shirt_sleeve_length'];
                    $data['kids_fit_challenge_shirt_torso_length'] = $data['kids_fit_challenge_shirt_torso_length'];
                    $data['body_shape'] = $data['body_shape'];
                    $data['kids_fit_challenge_pant_leg_length'] = $data['kids_fit_challenge_pant_leg_length'];
                    $data['kids_fit_challenge_pant_waist'] = $data['kids_fit_challenge_pant_waist'];
                    $data['kids_fit_challenge_shirt_torso_width'] = $data['kids_fit_challenge_shirt_torso_width'];
                    //pj($data);exit;
                    $newEntity = $this->KidsSizeFit->patchEntity($newEntity, $data);
                    $this->KidsSizeFit->save($newEntity);
                    // $this->request->session()->write('KID_ID', $newEntity->id);
                    $this->UserDetails->updateAll(['is_progressbar' => 40], ['user_id' => $this->Auth->user('id')]);
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section3');
                }
            }
            if (@$data['kidclothing'] == 'kidclothing') {
                //  pj($data);exit;
                $newEntity = $this->KidClothingType->newEntity();
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidDetails = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    if (isset($kidDetails->id)) {
                        $data['id'] = $kidDetails->id;
                    } else {
                        $data['id'] = '';
                    }


                    $data['user_id'] = $this->Auth->user('id');
                    $data['kid_id'] = $this->request->session()->read('KID_ID');
                    $data['kids_tees_frequency'] = $data['kids_tees_frequency'];
                    $data['kids_sweatshirts_frequency'] = $data['kids_sweatshirts_frequency'];
                    $data['kids_polos_frequency'] = $data['kids_polos_frequency'];
                    $data['kids_sweaters_frequency'] = $data['kids_sweaters_frequency'];
                    $data['kids_shorts_frequency'] = $data['kids_shorts_frequency'];
                    $data['kids_shoes_frequency'] = $data['kids_shoes_frequency'];
                    $data['kids_school_uniform'] = $data['kids_school_uniform'];
                    $data['kids_trousers_and_chinos_frequency'] = $data['kids_trousers_and_chinos_frequency'];
                    $newEntity = $this->KidClothingType->patchEntity($newEntity, $data);
                    $this->KidClothingType->save($newEntity);
                    // $this->request->session()->write('KID_ID', $newEntity->id);
                    // $this->KidClothingType->deleteAll(['kid_id' => $newEntity->id]);
                    $this->FabricsOrEmbellishments->deleteAll(['kid_id' => $this->request->session()->read('KID_ID')]);
                    // pj($data);exit;
                    if (@$data['kids_avoid_fabric']) {
                        foreach (@$data['kids_avoid_fabric'] as $fabrics_or_embellishments) {
                            $newEntity1 = $this->FabricsOrEmbellishments->newEntity();
                            $data['id'] = '';
                            $data['user_id'] = $this->Auth->user('id');
                            $data['kid_id'] = $this->request->session()->read('KID_ID');
                            $data['kids_avoid_fabric'] = $fabrics_or_embellishments;
                            $newEntity1 = $this->FabricsOrEmbellishments->patchEntity($newEntity1, $data);
                            $this->FabricsOrEmbellishments->save($newEntity1);
                        }
                    }
                    $this->UserDetails->updateAll(['is_progressbar' => 60], ['user_id' => $this->Auth->user('id')]);
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section4');
                }
            }
            if (@$data['kidstyle'] == 'kidstyle') {
                //  pj($data);exit;
                $newEntity = $this->KidStyles->newEntity();
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidDetails = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    if (isset($kidDetails->id)) {
                        $data['id'] = $kidDetails->id;
                    } else {
                        $data['id'] = '';
                    }


                    $data['user_id'] = $this->Auth->user('id');
                    $data['kid_id'] = $this->request->session()->read('KID_ID');
                    $data['send_graphic_tshirts'] = $data['send_graphic_tshirts'];
                    $data['kids_older_boy_sporty_v3'] = $data['kids_older_boy_sporty_v3'];
                    $data['kids_older_boy_cali_cool_v3'] = $data['kids_older_boy_cali_cool_v3'];
                    $data['kids_older_boy_gender_neutral_v1'] = $data['kids_older_boy_gender_neutral_v1'];
                    $data['kids_older_boy_versatile_v1'] = $data['kids_older_boy_versatile_v1'];
                    $data['kids_older_boy_everyday_prep_v4'] = $data['kids_older_boy_everyday_prep_v4'];
                    $data['kids_older_boy_sporty_v1'] = $data['kids_older_boy_sporty_v1'];
                    $data['kids_older_boy_everyday_prep_v3'] = $data['kids_older_boy_everyday_prep_v3'];
                    $data['kids_older_boy_versatile_v3'] = $data['kids_older_boy_versatile_v3'];
                    $data['kids_older_boy_everyday_prep_v1'] = $data['kids_older_boy_everyday_prep_v1'];
                    $data['kids_older_boy_everyday_prep_v2'] = $data['kids_older_boy_everyday_prep_v2'];
                    $data['kids_older_boy_sporty_v4'] = $data['kids_older_boy_sporty_v4'];
                    $data['kids_older_boy_street_style_v1'] = $data['kids_older_boy_street_style_v1'];
                    $data['kids_older_boy_sporty_v2'] = $data['kids_older_boy_sporty_v2'];
                    $data['kids_older_boy_cali_cool_v1'] = $data['kids_older_boy_cali_cool_v1'];
                    $data['kids_older_boy_versatile_v2'] = $data['kids_older_boy_versatile_v2'];
                    $data['colors_affinity_avoid_red'] = $data['colors_affinity_avoid_red'];
                    $data['colors_affinity_avoid_orange'] = $data['colors_affinity_avoid_orange'];
                    $data['colors_affinity_avoid_yellow'] = $data['colors_affinity_avoid_yellow'];
                    $data['colors_affinity_avoid_green'] = $data['colors_affinity_avoid_green'];
                    $data['colors_affinity_avoid_blue'] = $data['colors_affinity_avoid_blue'];
                    $data['colors_affinity_avoid_purple'] = $data['colors_affinity_avoid_purple'];
                    $data['colors_affinity_avoid_pink'] = $data['colors_affinity_avoid_pink'];
                    $data['colors_affinity_avoid_black'] = $data['colors_affinity_avoid_black'];
                    $data['colors_affinity_avoid_white'] = $data['colors_affinity_avoid_white'];
                    $data['colors_affinity_avoid_grey'] = $data['colors_affinity_avoid_grey'];
                    $data['colors_affinity_avoid_brown'] = $data['colors_affinity_avoid_brown'];
                    $data['kids_boy_prints_affinity_stripes'] = $data['kids_boy_prints_affinity_stripes'];
                    $data['kids_boy_prints_affinity_plaid'] = $data['kids_boy_prints_affinity_plaid'];
                    $data['kids_boy_prints_affinity_gingham'] = $data['kids_boy_prints_affinity_gingham'];
                    $data['kids_boy_prints_affinity_polka_dots'] = $data['kids_boy_prints_affinity_polka_dots'];
                    $data['kids_boy_prints_affinity_camo'] = $data['kids_boy_prints_affinity_camo'];
                    $data['kids_boy_prints_affinity_novelty'] = $data['kids_boy_prints_affinity_novelty'];
                    $data['send_graphic_tshirts'] = $data['send_graphic_tshirts'];
                    $newEntity = $this->KidStyles->patchEntity($newEntity, $data);
                    $this->KidStyles->save($newEntity);
                    // $this->request->session()->write('KID_ID', $newEntity->id);
                    // $this->KidStyles->deleteAll(['kid_id' => $newEntity->id]);
                    // $this->KidStyles->deleteAll(['kid_id' => $newEntity->id]);
                    $this->UserDetails->updateAll(['is_progressbar' => 80], ['user_id' => $this->Auth->user('id')]);
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section5');
                }
            }
            if (@$data['section5'] == 'section5') {
                //  pj($data);exit;
                $newEntity = $this->KidsPricingShoping->newEntity();
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidDetails = $this->KidsPricingShoping->find('all')->where(['KidsPricingShoping.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    if (isset($kidDetails->id)) {
                        $data['id'] = $kidDetails->id;
                    } else {
                        $data['id'] = '';
                    }


                    $data['user_id'] = $this->Auth->user('id');
                    $data['kid_id'] = $this->request->session()->read('KID_ID');
                    $data['kids_boys_spendiness_casual_shirts'] = $data['kids_boys_spendiness_casual_shirts'];
                    $data['kids_boys_spendiness_button_downs'] = $data['kids_boys_spendiness_button_downs'];
                    $data['kids_boys_spendiness_sweater_and_sweatshirts'] = $data['kids_boys_spendiness_sweater_and_sweatshirts'];
                    $data['kids_boys_spendiness_casual_bottoms'] = $data['kids_boys_spendiness_casual_bottoms'];
                    $data['kids_boys_spendiness_shorts'] = $data['kids_boys_spendiness_shorts'];
                    $data['kids_boys_spendiness_pants_and_jeans'] = $data['kids_boys_spendiness_pants_and_jeans'];
                    $data['kids_boys_spendiness_jackets_and_coats'] = $data['kids_boys_spendiness_jackets_and_coats'];
                    $data['kids_boys_spendiness_shoes'] = $data['kids_boys_spendiness_shoes'];
                    $data['kids_would_splurge_for_item'] = $data['kids_would_splurge_for_item'];
                    $data['pinterest'] = $data['pinterest'];
                    $data['profile_note'] = $data['profile_note'];
                    $newEntity = $this->KidsPricingShoping->patchEntity($newEntity, $data);
                    $this->KidsPricingShoping->save($newEntity);
                    $this->KidPurchaseClothing->deleteAll(['kid_id' => $this->request->session()->read('KID_ID')]);

                    if (@$data['kids_stores']) {
                        foreach (@$data['kids_stores'] as $kids_stores) {
                            $newEntity1 = $this->KidPurchaseClothing->newEntity();
                            $data['id'] = '';
                            $data['user_id'] = $this->Auth->user('id');
                            $data['kid_id'] = $this->request->session()->read('KID_ID');
                            $data['kids_stores'] = $kids_stores;
                            $newEntity1 = $this->KidPurchaseClothing->patchEntity($newEntity1, $data);
                            $this->KidPurchaseClothing->save($newEntity1);
                        }
                    }
                    $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
                    // pj($data);exit;
                    return $this->redirect(HTTP_ROOT . 'welcome/schedule');
                }
            }
            //kids code
            //
            //women code
            if (@$data['size'] == 'size') {
//                $Size = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $this->Auth->user('id')])->first(); //display first record
                $SizeChart = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $this->Auth->user('id')])->first();
                $PersonalizedFix = $this->PersonalizedFix->find('all')->where(['PersonalizedFix.user_id' => $this->Auth->user('id')])->first(); //display first record
                $sizechart = $this->SizeChart->newEntity();
                $personalizedfix = $this->PersonalizedFix->newEntity();
                if (isset($Size->user_id) && !empty($Size->user_id)) {
                    $table['id'] = $Size->id;
                } else {
                    $table['id'] = '';
                }
                if (isset($PersonalizedFix->user_id) && !empty($PersonalizedFix->user_id)) {
                    $table['id'] = $PersonalizedFix->id;
                } else {
                    $table['id'] = '';
                }

                if ($data['tell_in_feet'] == '') {
                    $this->Flash->error(__('Please enter your feet.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['tell_in_inch'] == '') {
                    $this->Flash->error(__('Please enter your Inch.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['wt'] == '') {
                    $this->Flash->error(__('Please enter your Weight.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['dress'] == '') {
                    $this->Flash->error(__('Please enter your dress size.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['dress_recomended'] == '') {
                    $this->Flash->error(__('Please enter your dress size.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['shirt_blouse'] == '') {
                    $this->Flash->error(__('Please enter your shirt blouse size.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['shirt_blouse_recomend'] == '') {
                    $this->Flash->error(__('Please enter your shirt blouse size.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['bra'] == '') {
                    $this->Flash->error(__('Please enter your bra size.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['bra_recomend'] == '') {
                    $this->Flash->error(__('Please enter your bra size.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['skirt'] == '') {
                    $this->Flash->error(__('Please enter your Skirt size.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['pants'] == '') {
                    $this->Flash->error(__('Please enter your pantsize.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['pantsr1'] == '') {
                    $this->Flash->error(__('Please enter your Pant size.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['pantsr2'] == '') {
                    $this->Flash->error(__('Please enter your Pants recommended.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['jeans'] == '') {
                    $this->Flash->error(__('Please enter your jeans.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                }
                if ($data['expected_due_date'] == '' && $data['is_pregnant'] == 1) {
                    $this->Flash->error(__('Please enter your due date.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
                } else {
                    $table['user_id'] = $this->Auth->user('id');
                    $table['tell_in_feet'] = $data['tell_in_feet'];
                    $table['tell_in_inch'] = $data['tell_in_inch'];
                    $table['weight_lbs'] = $data['wt'];
                    $personalizedfix = $this->PersonalizedFix->patchEntity($personalizedfix, $table);
                    $this->PersonalizedFix->save($personalizedfix);
                    $table['user_id'] = $this->Auth->user('id');
                    $table['dress'] = $data['dress'];
                    $table['dress_recomended'] = $data['dress_recomended'];
                    $table['shirt_blouse'] = $data['shirt_blouse'];
                    $table['shirt_blouse_recomend'] = $data['shirt_blouse_recomend'];
                    $table['bra'] = $data['bra'];
                    $table['bra_recomend'] = $data['bra_recomend'];
                    $table['skirt'] = $data['skirt'];
                    $table['pants'] = $data['pants'];
                    $table['pantsr1'] = $data['pantsr1'];
                    $table['pantsr2'] = $data['pantsr2'];
                    $table['jeans'] = $data['jeans'];
                    $table['is_pregnant'] = $data['is_pregnant'];
                    $table['proportion_arms'] = $data['proportion_arms'];
                    $table['proportion_shoulders'] = $data['proportion_shoulders'];
                    $table['proportion_torso'] = $data['proportion_torso'];
                    $table['proportion_legs'] = $data['proportion_legs'];
                    $table['proportion_hips'] = $data['proportion_hips'];
                    $table['expected_due_date'] = $data['expected_due_date'];
                    $table['is_prefer_maternity'] = $data['is_prefer_maternity'];
                    $table['is_styles_designed_nursing'] = $data['is_styles_designed_nursing'];
                    $table['is_pregnant'] = $data['is_pregnant'];
                    $table['what_kind_pants'] = $data['what_kind_pants'];
                    $sizechart = $this->SizeChart->patchEntity($sizechart, $table);
                    $this->SizeChart->save($sizechart);


                    $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $this->Auth->user('id')]);

                    $this->Flash->success(__('Inserted successfully.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
                }
            }
            if (@$data['fitcut'] == 'fitcut') {
//                pj($data);exit;
                $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $this->Auth->user('id')])->first();
                $fitcut = $this->FitCut->newEntity();
                if (isset($FitCut->user_id) && !empty($FitCut->user_id)) {
                    $table['id'] = $FitCut->id;
                } else {
                    $table['id'] = '';
                }
                $table['user_id'] = $this->Auth->user('id');
                $table['fit_top'] = $data['fit_top'];
                $table['plus_tops_fit_waist_opening_v2'] = $data['plus_tops_fit_waist_opening_v2'];
                $table['plus_tops_fit_length'] = $data['plus_tops_fit_length'];
                $table['fit_bottom'] = $data['plus_bottoms_fit'];
                $table['too_big_hip_and_thigh'] = $data['too_big_hip_and_thigh'];
                // $table['plus_bottoms_fit'] = $data['plus_bottoms_fit'];
                $table['flaunt_arms'] = $data['flaunt_arms'];
                $table['flaunt_shoulders'] = $data['flaunt_shoulders'];
                $table['flaunt_back'] = $data['flaunt_back'];
                $table['flaunt_cleavage'] = $data['flaunt_cleavage'];
                $table['flaunt_midsection'] = $data['flaunt_midsection'];
                $table['flaunt_rear'] = $data['flaunt_rear'];
                $table['flaunt_legs'] = $data['flaunt_legs'];

                $fitcut = $this->FitCut->patchEntity($fitcut, $table);
                $this->FitCut->save($fitcut);

                $this->WemenJeansLength->deleteAll(['user_id' => $this->Auth->user('id')]);
                $this->WomenJeansStyle->deleteAll(['user_id' => $this->Auth->user('id')]);
                $this->WomenJeansRise->deleteAll(['user_id' => $this->Auth->user('id')]);
                if (@$data['jeans_style']) {
                    foreach (@$data['jeans_style'] as $jeans_style) {
                        $newEntity1 = $this->WomenJeansStyle->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['jeans_style'] = $jeans_style;
                        $newEntity1 = $this->WomenJeansStyle->patchEntity($newEntity1, $data);
                        $this->WomenJeansStyle->save($newEntity1);
                    }
                }

                if (@$data['jeans_rise']) {
                    foreach (@$data['jeans_rise'] as $jeans_rise) {
                        $newEntity2 = $this->WomenJeansRise->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['jeans_rise'] = $jeans_rise;
                        $newEntity2 = $this->WomenJeansRise->patchEntity($newEntity2, $data);
                        $this->WomenJeansRise->save($newEntity2);
                    }
                }
                if (@$data['jeans_length']) {
                    foreach (@$data['jeans_length'] as $jeans_length) {
                        $newEntity3 = $this->WemenJeansLength->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['jeans_length'] = $jeans_length;
                        $newEntity3 = $this->WemenJeansLength->patchEntity($newEntity3, $data);
                        $this->WemenJeansLength->save($newEntity3);
                    }
                }
                $this->UserDetails->updateAll(['is_progressbar' => 55], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/style/section3');
            }

            if (@$data['wemonstyle'] == 'wemonstyle') {
//                pj($data);exit;  
                $womanStyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $this->Auth->user('id')])->first();
                $style = $this->WomenStyle->newEntity();
                if (isset($womanStyle->user_id) && !empty($womanStyle->user_id)) {
                    $table['id'] = $womanStyle->id;
                } else {
                    $table['id'] = '';
                }

                $table['user_id'] = $this->Auth->user('id');
                $table['rating_preppy'] = $data['rating_preppy'];
                $table['rating_romantic'] = $data['rating_romantic'];
                $table['rating_casual'] = $data['rating_casual'];
                $table['rating_edgy'] = $data['rating_edgy'];
                $table['rating_boho'] = $data['rating_boho'];
                // $table['piercings'] = $data['piercings'];
                $table['rating_glam'] = $data['rating_glam'];
                $table['rating_classic'] = $data['rating_classic'];
                $table['occasion_work_casual'] = $data['occasion_work_casual'];
                $table['occasion_special_event'] = $data['occasion_special_event'];
                $table['occasion_casual'] = $data['occasion_casual'];
                $table['occasion_night_out'] = $data['occasion_night_out'];
                $table['desired_work_casual'] = $data['desired_work_casual'];
                $table['desired_special_event'] = $data['desired_special_event'];
                $table['desired_casual'] = $data['desired_casual'];
                $table['desired_date_night'] = $data['desired_date_night'];
                $table['jeans_frequency'] = $data['jeans_frequency'];
                $table['distressed_denim_non'] = $data['distressed_denim_non'];
                $table['distressed_denim_minimally'] = $data['distressed_denim_minimally'];
                $table['distressed_denim_fairly'] = $data['distressed_denim_fairly'];
                $table['distressed_denim_heavily'] = $data['distressed_denim_heavily'];
                $table['adventure'] = $data['adventure'];
                $table['style_accessories'] = $data['style_accessories'];
                $table['jewelry_tone'] = $data['jewelry_tone'];
                $table['piercings'] = $data['piercings'];
                $table['apparel_affinity_avoid_tops'] = $data['apparel_affinity_avoid_tops'];
                $table['apparel_affinity_avoid_blazers'] = $data['apparel_affinity_avoid_blazers'];
                $table['apparel_affinity_avoid_jackets_coats'] = $data['apparel_affinity_avoid_jackets_coats'];
                $table['apparel_affinity_avoid_shorts'] = $data['apparel_affinity_avoid_shorts'];
                // apparel_type_affinity_avoid_skirts
                $table['apparel_type_affinity_avoid_skirts'] = $data['apparel_type_affinity_avoid_skirts'];
                $table['apparel_affinity_avoid_pants'] = $data['apparel_affinity_avoid_pants'];
                $table['apparel_affinity_avoid_dresses'] = $data['accessory_affinity_avoid_bags'];
                $table['accessory_affinity_avoid_bags'] = $data['accessory_affinity_avoid_bags'];
                $table['accessory_affinity_avoid_scarves'] = $data['accessory_affinity_avoid_scarves'];
                $table['accessory_affinity_avoid_earrings'] = $data['accessory_affinity_avoid_earrings'];
                $table['accessory_affinity_avoid_necklaces'] = $data['accessory_affinity_avoid_necklaces'];
                $table['accessory_affinity_avoid_bracelets'] = $data['accessory_affinity_avoid_bracelets'];
                $table['accessory_affinity_avoid_shoes'] = $data['accessory_affinity_avoid_shoes'];
                $table['shoes_affinity_avoid_heels'] = $data['shoes_affinity_avoid_heels'];
                $table['shoes_affinity_avoid_wedges'] = $data['shoes_affinity_avoid_wedges'];
                $table['shoes_affinity_avoid_booties'] = $data['shoes_affinity_avoid_booties'];
                $table['shoes_affinity_avoid_flats'] = $data['shoes_affinity_avoid_flats'];
                $table['shoes_affinity_avoid_sandals'] = $data['shoes_affinity_avoid_sandals'];
                $table['shoes_affinity_avoid_fashion_sneakers'] = $data['shoes_affinity_avoid_fashion_sneakers'];
                $style = $this->WomenStyle->patchEntity($style, $table);
                $this->WomenStyle->save($style);

                if (@$data['womens_brands_plus_low_tier']) {
                    foreach (@$data['womens_brands_plus_low_tier'] as $womens_brands_plus_low_tier) {
                        $newEntity1 = $this->WomenTypicalPurchaseCloth->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['womens_brands_plus_low_tier'] = $womens_brands_plus_low_tier;
                        $newEntity1 = $this->WomenTypicalPurchaseCloth->patchEntity($newEntity1, $data);
                        $this->WomenTypicalPurchaseCloth->save($newEntity1);
                    }
                }

                if (@$data['style_wardrobe']) {
//                     pj($style_wardrobe);exit;
                    foreach (@$data['style_wardrobe'] as $style_wardrobe) {
                        $newEntity2 = $this->WomenIncorporateWardrobe->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['style_wardrobe'] = $style_wardrobe;
                        $newEntity2 = $this->WomenIncorporateWardrobe->patchEntity($newEntity2, $data);
                        $this->WomenIncorporateWardrobe->save($newEntity2);
                    }
                }
                if (@$data['avoid_colors']) {
                    foreach (@$data['avoid_colors'] as $avoid_colors) {
                        $newEntity3 = $this->WomenColorAvoid->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['avoid_colors'] = $avoid_colors;
                        $newEntity3 = $this->WomenColorAvoid->patchEntity($newEntity3, $data);
                        $this->WomenColorAvoid->save($newEntity3);
                    }
                }

                if (@$data['avoid_prints']) {
                    foreach (@$data['avoid_prints'] as $avoid_prints) {
                        $newEntity4 = $this->WomenPrintsAvoid->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['avoid_prints'] = $avoid_prints;
                        $newEntity4 = $this->WomenPrintsAvoid->patchEntity($newEntity4, $data);
                        $this->WomenPrintsAvoid->save($newEntity4);
                    }
                }

                if (@$data['avoid_fabrics']) {
                    foreach (@$data['avoid_fabrics'] as $avoid_fabrics) {
                        $newEntity5 = $this->WomenFabricsAvoid->newEntity();
                        $data['id'] = '';
                        $data['user_id'] = $this->Auth->user('id');
                        $data['avoid_fabrics'] = $avoid_fabrics;
                        $newEntity5 = $this->WomenFabricsAvoid->patchEntity($newEntity5, $data);
                        $this->WomenFabricsAvoid->save($newEntity5);
                    }
                }
                $this->UserDetails->updateAll(['is_progressbar' => 60], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/style/section4');
            }


            if (@$data['price'] == 'price') {
//                pj($data);
//                exit;
                $exitdata = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $this->Auth->user('id')])->first(); //display first record
                $price = $this->WomenPrice->newEntity();
                if (isset($exitdata->user_id) && !empty($exitdata->user_id)) {
                    $table['id'] = $exitdata->id;
                } else {
                    $table['id'] = '';
                }
                $table['user_id'] = $this->Auth->user('id');
                $table['spendiness_accessories'] = $data['spendiness_accessories'];
                $table['spendiness_bottoms'] = $data['spendiness_bottoms'];
                $table['spendiness_dresses'] = $data['spendiness_dresses'];
                $table['spendiness_jewelry'] = $data['spendiness_jewelry'];
                $table['spendiness_tops'] = $data['spendiness_tops'];
                $table['spendiness_outerwear'] = $data['spendiness_outerwear'];
                $table['spendiness_shoes'] = $data['spendiness_shoes'];
                $price = $this->WomenPrice->patchEntity($price, $table);
                $this->WomenPrice->save($price);
                $this->UserDetails->updateAll(['is_progressbar' => 65], ['user_id' => $this->Auth->user('id')]);
                $this->Flash->success(__('Inserted successfully.'));
                return $this->redirect(HTTP_ROOT . 'welcome/style/section5');
            }
            if (@$data['info'] == 'info') {
//                pj($data);
                $info1 = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $this->Auth->user('id')])->first();

//                  pj($primaryinfo);exit;
                if (isset($info1->user_id) && !empty($info1->user_id)) {
                    $table['id'] = $info1->id;
                } else {
                    $table['id'] = '';
                }
//                exit;
                $checkbox1 = $data['primary_objectives'];
                $chk = "";
                foreach ($checkbox1 as $chk1) {
                    $chk .= $chk1 . ",";
                }
                $info = $this->WomenInformation->newEntity();
//                $dob=date('Y-m-d', strtotime($data['user_input_birthdate']));               
//                $exitdata = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $this->Auth->user('id')])->count();
//                if ($exitdata >= 1) {
//                    $this->WomenInformation->updateAll(['user_input_birthdate' => @$dob,
//                        'occupation_v2' => $data['occupation_v2'],
//                        'parent' => $data['parent'],
//                        'primary_objectives' => $chk,
//                        'final_thoughts' => $data['final_thoughts']], ['user_id' => $this->Auth->user('id')]);
//
//                    $this->Flash->success(__('Updated successfully.'));
//                    return $this->redirect(HTTP_ROOT . 'welcome/schedule');
//                } else {
                $table['user_id'] = $this->Auth->user('id');
                $table['user_input_birthdate'] = $data['user_input_birthdate'];
                $table['occupation_v2'] = $data['occupation_v2'];
                $table['parent'] = $data['parent'];
                $table['primary_objectives'] = $chk;
                $table['final_thoughts'] = $data['final_thoughts'];
                $info = $this->WomenInformation->patchEntity($info, $table);
                $this->WomenInformation->save($info);
                $this->UserDetails->updateAll(['is_progressbar' => 70], ['user_id' => $this->Auth->user('id')]);
                $this->Flash->success(__('Inserted successfully.'));
                return $this->redirect(HTTP_ROOT . 'welcome/schedule');
//                }
            }
        }


        $progressbar_count = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $this->set(compact('savecard', 'kidname', 'progressbar_count', 'total', 'KidStyles2', 'PersonalizedFix', 'sections', 'kidmenu', 'KidsPrimaryValue', 'KidsPersonalityValue', 'LetsPlanYourFirstFixData', 'slug', 'userDetails', 'ShippingAddress', 'kidDetails', 'MenStats', 'TypicallyWearMen', 'MenFit', 'SizeChart', 'FitCut', 'useraddress_datas'));
    }

    public function clients($slug = null) {
        if (empty($slug)) {
            return $this->redirect(HTTP_ROOT . 'welcome/kids');
        }
        $credit_balance = $this->UserUsesPromocode->find('all')->Select(['Total_promo_price' => 'SUM(UserUsesPromocode.price)'])->where(['UserUsesPromocode.user_id' => $this->Auth->user('id')])->first();
        $reference = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $isemail_preferences = $this->Users->find('all')->where(['Users.id' => $this->Auth->user('id')])->first();
//        pj($reference);exit;
        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            if (@$data['add_kids'] == 'add_kids') {
                $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->count();
                // $kidname=$this->KidsDetails->find('kids_first_name')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->first();
                if ($kidcount >= 5) {
                    $this->Flash->error(__('Oops! Currently, we can only support 5 kids per family account.'));
                    return $this->redirect(HTTP_ROOT . 'clients/kids');
                } else {
                    $this->request->session()->write('KID_ID', '');
                }

                $this->request->session()->write('PROFILE', 'KIDS');
                return $this->redirect(HTTP_ROOT . 'welcome/style');
            } else if (@$data['style'] == 'style') {
                return $this->redirect(HTTP_ROOT . 'welcome/shipping');
            } else if (@$data['payment'] == 'payment') {
                $shippingAddress = $this->ShippingAddress->newEntity();
                $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->count();
                if ($exitdata >= 1) {
                    $this->ShippingAddress->updateAll([
                        'full_name' => $data['full_name'],
                        'address' => $data['address'],
                        'address_line_2' => $data['address_line_2'],
                        'city' => $data['city'],
                        'zipcode' => $data['zipcode'],
                        'state' => $data['state']], ['user_id' => $this->Auth->user('id')]);

                    $this->Flash->success(__('Updated successfully.'));
                } else {
                    $data['user_id'] = $this->Auth->user('id');
                    $data['full_name'] = $data['full_name'];
                    $data['address'] = $data['address'];
                    $data['address_line_2'] = $data['address_line_2'];
                    $data['city'] = $data['city'];
                    $data['state'] = $data['state'];
                    $data['zipcode'] = $data['zipcode'];
                    $LetsPlanYourFirstFix = $this->ShippingAddress->patchEntity($shippingAddress, $data);
                    $this->ShippingAddress->save($shippingAddress);
                }
                return $this->redirect(HTTP_ROOT . 'welcome/payment');
            } else if (@$data['card_payment'] == 'card_payment') {
//                pj($data);exit;
                $newEntity = $this->PaymentGetways->newEntity();
                if ($this->request->session()->read('PROFILE') == 'KIDS') {
                    $profile_type = 3;
                } elseif ($this->request->session()->read('PROFILE') == 'MEN') {
                    $profile_type = 1;
                } elseif ($this->request->session()->read('PROFILE') == 'WOMEN') {
                    $profile_type = 2;
                }
                $data['user_id'] = $this->Auth->user('id');
                $data['price'] = $data['price'];
                $data['card_name'] = $data['card_name'];
                $data['card_number'] = $data['card_number'];
                $data['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];
                $data['status'] = 0;
                $data['profile_type'] = $profile_type;
//                echo $profile_type;exit;
                $data['created_dt'] = date('Y-m-d h:i:s');

                $newEntity = $this->PaymentGetways->patchEntity($newEntity, $data);
                $this->PaymentGetways->save($newEntity);

                return $this->redirect(HTTP_ROOT . 'welcome/payment');
            } elseif (@$data['email_send'] == 'email_send') {
                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'PROMOTION'])->first();
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $to = $data['email_id'];
                $name = $this->Auth->user('name');
                $from = $fromMail->value;
                $subject = $emailMessage->display;
                $sitename = SITE_NAME;
                $refer = @$reference->refer_name;

                $message = $this->Custom->referenceEmail($emailMessage->value, $name, $message, $sitename, $refer);
//                      echo   $message;exit;
                $this->Custom->sendEmail($to, $from, $subject, $message);
                $this->Flash->success(__("Mail sent successflly"));
                return $this->redirect(HTTP_ROOT . 'clients/referrals');
            } else if (@$data['save_exclusive_offers'] == 'save_exclusive_offers') {
                $this->Users->updateAll(['email_preferences' => $data['email_preferences']], ['id' => $this->Auth->user('id')]);
                $this->Flash->success(__('Inserted successfully.'));
                return $this->redirect(HTTP_ROOT . 'clients/emailpreference');
            } else if (@$data['credit_info'] == 'credit_info') {
                $user_id = $this->Auth->user('id');
                $Promo_data = $this->Promocode->find('all')->where(['Promocode.promocode' => $data['promocode'], 'Promocode.expiry_date >=' => date("Y-m-d")])->count();
                $Promo_data_price = $this->Promocode->find('all')->where(['Promocode.promocode' => $data['promocode'], 'Promocode.expiry_date >=' => date("Y-m-d")])->first();

                if ($Promo_data == 1) {
                    $user_uses_promocode = $this->UserUsesPromocode->find('all')->where(['UserUsesPromocode.promocode' => $Promo_data_price->promocode, 'UserUsesPromocode.user_id' => $user_id])->count();
                    if ($user_uses_promocode >= 1) {
                        $this->Flash->error(__('You have already applied for this code.'));
                        return $this->redirect(HTTP_ROOT . 'clients/credit');
                    } else {
                        $newEntity6 = $this->UserUsesPromocode->newEntity();
                        $data['apply_dt'] = date("Y-m-d H:i:s");
                        $data['price'] = $Promo_data_price->price;
                        $newEntity6 = $this->UserUsesPromocode->patchEntity($newEntity6, $data);
                        $this->UserUsesPromocode->save($newEntity6);
                        $this->Flash->success(__('Inserted successfully.'));
                        return $this->redirect(HTTP_ROOT . 'clients/credit');
                    }
                } else {
                    $this->Flash->error(__('For this code the validation is expired.'));
                    return $this->redirect(HTTP_ROOT . 'clients/credit');
                }
            }
        }

        $this->set(compact('isemail_preferences', 'kidname', 'LetsPlanYourFirstFixData', 'slug', 'userDetails', 'ShippingAddress', 'user_id', 'credit_balance', 'reference'));
    }

    public function userProfile($id = null) {
        $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $id])->first();
        if ($Userdetails->gender == 1) {
            $gen = "MEN";
        }
        if ($Userdetails->gender == 2) {
            $gen = "WOMEN";
        }
        $this->request->session()->write('PROFILE', $gen);
        return $this->redirect(HTTP_ROOT . 'welcome/style');
    }

    public function kidProfile($id = null) {
        $this->request->session()->write('KID_ID', $id);
        $this->request->session()->write('PROFILE', 'KIDS');
        // return $this->redirect(HTTP_ROOT . 'welcome/schedule');
        return $this->redirect(HTTP_ROOT . 'welcome/style');
    }

    public function authorizeCreditCard($arr_data = []) {
        extract($arr_data);

        /* Create a merchantAuthenticationType object with authentication details
          retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(\SampleCodeConstants::MERCHANT_LOGIN_ID);
        $merchantAuthentication->setTransactionKey(\SampleCodeConstants::MERCHANT_TRANSACTION_KEY);

        // Set the transaction's refId
        $refId = 'ref' . time();

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($card_number);
        $creditCard->setExpirationDate($exp_date);
        $creditCard->setCardCode($card_code);

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create order information
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($invice);
        $order->setDescription($product);

        // Set the customer's Bill To address
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName($first_name);
        $customerAddress->setLastName($last_name);
        $customerAddress->setCompany($companyName);
        $customerAddress->setAddress($address);
        $customerAddress->setCity($city);
        $customerAddress->setState($state);
        $customerAddress->setZip($zip);
        $customerAddress->setCountry($country);

        // Set the customer's identifying information
        $customerData = new AnetAPI\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setId('5434343');
        $customerData->setEmail($email);

        // Add values for transaction settings
        $duplicateWindowSetting = new AnetAPI\SettingType();
        $duplicateWindowSetting->setSettingName("duplicateWindow");
        $duplicateWindowSetting->setSettingValue("60");

        // Add some merchant defined fields. These fields won't be stored with the transaction,
        // but will be echoed back in the response.
        $merchantDefinedField1 = new AnetAPI\UserFieldType();
        $merchantDefinedField1->setName("customerLoyaltyNum");
        $merchantDefinedField1->setValue("1128836273");

        $merchantDefinedField2 = new AnetAPI\UserFieldType();
        $merchantDefinedField2->setName("favoriteColor");
        $merchantDefinedField2->setValue("blue");

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authOnlyTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setBillTo($customerAddress);
        $transactionRequestType->setCustomer($customerData);
        $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
        $transactionRequestType->addToUserFields($merchantDefinedField1);
        $transactionRequestType->addToUserFields($merchantDefinedField2);

        // Assemble the complete transaction request
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        //pr($response->getMessages()->getResultCode());

        $msg = array();

        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == 'Ok') {
//                pr($response->getTransactionResponse());
//
//       
//       exit;
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getMessages() != null) {
                    $msg['status'] = 1;
                    $msg['TransId'] = $tresponse->getTransId();
                    $msg['Success'] = " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                    $msg['ResponseCode'] = " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                    $msg['MessageCode'] = " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                    $msg['AuthCode'] = " Auth Code: " . $tresponse->getAuthCode() . "\n";
                    $msg['Description'] = " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";

                    $msg['msg'] = " Description: " . $tresponse . "\n";
                } else {
                    //echo "Transaction Failed \n";
                    if ($tresponse->getErrors() != null) {
                        $msg['ErrorCode'] = " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                        $msg['ErrorMessage'] = "Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    }
                }
                // Or, print errors if the API request wasn't successful
            } else {
                $msg['error'] = 'error';
                //echo "Transaction Failed \n";
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $msg['ErrorCode'] = " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    $msg['ErrorCode'] = " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                } else {
                    $msg['ErrorCode'] = " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                    $msg['ErrorMessage'] = " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                }
            }
        } else {
            echo "No response returned \n";
        }

        return $msg;
    }

    public function paymentProcess() {
        $this->viewBuilder()->layout('ajax');
        $this->request->session()->write('PYMID', '');
        $data = $this->request->data;
        $newEntity = $this->PaymentGetways->newEntity();
        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $profile_type = 3;
        } elseif ($this->request->session()->read('PROFILE') == 'MEN') {
            $profile_type = 1;
        } elseif ($this->request->session()->read('PROFILE') == 'WOMEN') {
            $profile_type = 2;
        }
        $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'user_id' => $this->Auth->user('id')])->count();
        $data['user_id'] = $this->Auth->user('id');
        $data['price'] = $data['payableAmount'];
        $data['profile_type'] = $profile_type;
        $data['status'] = 0;

        $data['created_dt'] = date('Y-m-d h:i:s');
        $data['count'] = $paymentCount + 1;
        $newEntity = $this->PaymentGetways->patchEntity($newEntity, $data);
        $PaymentIdlast = $this->PaymentGetways->save($newEntity);


        $newEntityCard = $this->PaymentCardDetails->newEntity();
//        if ($data['isSaveCard'] == 1) {
//            $isSaveCard = 1;
//        } else {
//            $isSaveCard = 0;
//        }
        //pj($data);exit();
        $isSaveCard = 1;
        $data1['is_save'] = $isSaveCard;
        $data1['user_id'] = $this->Auth->user('id');
        $data1['card_name'] = $data['name_on_card'];
        $data1['card_number'] = $data['card_number'];
        $data1['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];
        $data1['card_type'] = $data['card_type'];
        $data1['cvv'] = $data['cvv'];


//        $newEntityCard = $this->PaymentCardDetails->patchEntity($newEntityCard, $data1);
//        $cardDetails = $this->PaymentCardDetails->save($newEntityCard);





        $paymentId = $PaymentIdlast->id;
        $this->request->session()->write('PYMID', $paymentId);
        $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first();

        $arr_user_info = [
            'card_number' => $data['card_number'],
            'exp_date' => $data['expiry_year'] . '-' . $data['expiry_month'],
            'card_code' => $data['cvv'],
            'product' => 'Test Plugin',
            'first_name' => $userData->first_name,
            'last_name' => $userData->last_name,
            'address' => '101 main street',
            'city' => 'Pecan Springs',
            'state' => 'TX',
            'zip' => '44628',
            'country' => 'USA',
            'email' => $this->Auth->user('email'),
            'amount' => $data['payableAmount'],
            'invice' => '22222',
            'refId' => $paymentId,
            'companyName' => 'microfinet',
        ];

        $message = $this->authorizeCreditCard($arr_user_info);

        if (@$message['error'] == 'error') {
            echo json_encode($message);
        } else if ($message['status'] == 1) {
            echo json_encode($message);
            //for use on mail setiing
            $updateId = $this->request->session()->read('PYMID');
            $this->PaymentGetways->updateAll(['status' => 1, 'payment_type' => 1], ['id' => $updateId]);


            $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId])->first();
            if ($paymentDetails->profile_type == 1) {
                $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE'])->first();
            } elseif ($paymentDetails->profile_type == 2) {
                $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE'])->first();
            } elseif ($paymentDetails->profile_type == 3) {
                $emailMessageProfile = $this->Settings->find('all')->where(['Settings.name' => 'PAYMENT_COUNT_PROFILE_KID'])->first();
            }
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $this->Auth->user('id'), 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $paymentDetails->profile_type, 'PaymentGetways.payment_type' => 1])->count();

            $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'SUCCESS_PAYMENT'])->first();
            $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $to = $this->Auth->user('email');
            $name = $this->Auth->user('name');
            $from = $fromMail->value;
            $subject = $emailMessage->display;
            $sitename = SITE_NAME;
            $usermessage = $message['Success'];
            $email_message = $this->Custom->paymentEmail($emailMessage->value, $name, $usermessage, $sitename);
            $this->Custom->sendEmail($to, $from, $subject, $email_message);
            //for profile count mail




            $subjectProfile = $emailMessageProfile->display;
            $email_message_profile = $this->Custom->paymentEmailCount($emailMessageProfile->value, $name, $usermessage, $sitename, $paymentCount);
            $this->Custom->sendEmail($to, $from, $subjectProfile, $email_message_profile);
        } else {
            $message['error'] = 'error';
            echo json_encode($message);
        }

        exit;
    }

    public function paymentSuccess() {
        
    }

    public function setAccount() {
        $this->viewBuilder()->layout('default');
        $credit_balance = $this->UserUsesPromocode->find('all')->Select(['Total_promo_price' => 'SUM(UserUsesPromocode.price)'])->where(['UserUsesPromocode.user_id' => $this->Auth->user('id')])->first();
        $ship_address = $this->ShippingAddress->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
        $bill_address = $this->PaymentCardDetails->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
        $user_details = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();


        $this->set(compact('user_details', 'PersonalizedFix', 'SizeChart', 'ship_address', 'credit_balance', 'bill_address'));
    }

    public function profileSetting() {
        $this->viewBuilder()->layout('default');
        $user = $this->Users->newEntity();
        $user_details = $this->UserDetails->newEntity();
        $this->UserDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);


        $userdata = $this->UserDetails->find('all')->contain(['Users'])->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();


        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['first_name'] == '') {
                $this->Flash->error(__('Please enter the first name'));
            }
            if ($data['last_name'] == '') {
                $this->Flash->error(__('Please enter the last name'));
            } else {
                $data['name'] = $data['first_name'];
                $user = $this->Users->patchEntity($user, $data);
                $user->id = $this->request->session()->read('Auth.User.id');
                $x = $this->Users->save($user);
                $user_details = $this->UserDetails->updateAll(['first_name' => $data['first_name'], 'last_name' => $data['last_name']], ['user_id' => $this->Auth->user('id')]);
                $user = $this->Users->updateAll(['name' => $data['first_name']], ['id' => $this->Auth->user('id')]);


                if ($x) {
                    $this->Flash->success(__('Change Password Updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'account');
                } else {
                    $this->Flash->error(__('Cannot Updated .'));
                }
            }
        }

        //PJ($userdata);exit;

        $this->set(compact('userdata'));
    }

    public function changeAccountPassword() {
        $this->viewBuilder()->layout('default');
        $user = $this->Users->newEntity();
        $user_details = $this->UserDetails->newEntity();
        $this->UserDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $userdata = $this->UserDetails->find('all')->contain(['Users'])->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['password'] != $data['cPassword']) {
                $this->Flash->error(__('Password and retype password donot match.'));
            } else {
                $user = $this->Users->patchEntity($user, $data);
                $user->id = $this->request->session()->read('Auth.User.id');
                $x = $this->Users->save($user);

                if ($x) {
                    $this->Flash->success(__('Change Password Updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'account');
                } else {
                    $this->Flash->error(__('Cannot Updated .'));
                }
            }
        }
        $this->set(compact('userdata'));
    }

    public function shippingInfo() {
        $this->viewBuilder()->layout('default');
        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);
            $shipaddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first(); //display first record
            $ship = $this->ShippingAddress->newEntity();
//            if (isset($shipaddress->user_id) && !empty($shipaddress->user_id)) {
//                $data['id'] = $shipaddress->id;
//            } else {
//                $data['id'] = '';
//            }
            $data['user_id'] = $this->Auth->user('id');
            $ship = $this->ShippingAddress->patchEntity($ship, $data);
            $this->ShippingAddress->save($ship);
//             pj($ship);exit;
            $this->Flash->success(__('Updated successfully.'));
            return $this->redirect(HTTP_ROOT . 'shippingaddress');
        }
        $shipaddress_data = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);

        $this->set(compact('shipaddress', 'shipaddress_data'));
    }

    public function ajaxCheckEmailAvail() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->input('json_decode', TRUE);
//         pj($data);exit;
        $email = $data['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//          echo 'hi';
            echo json_encode(array('status' => 'error', 'msg' => ''));
        } else {

            $query = $this->Users->find('all')
                    ->select(['Users.id', 'Users.email'])
                    ->where(['Users.email' => $email]);
            $count = $query->count();
            if ($count) {
                echo json_encode(array('status' => 'error', 'msg' => 'Email id already exists!'));
            } else {
                echo json_encode(array('status' => 'success', 'msg' => 'Email id is available.'));
            }
        }
        exit;
    }

    public function kidNewProfile() {
        $this->request->session()->write('KID_ID', '');
        $this->request->session()->write('PROFILE', 'KIDS');
        return $this->redirect(HTTP_ROOT . 'welcome/style');
        exit;
    }

    public function orderReview() {
        $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $productData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0]);
        $productcount = $this->Products->find('all')->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0])->count(); //for counting in loop
//        pj($productData);exit;
        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $kidData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id !=' => 0]);
//        pj($kidData);exit;
        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);


        $kidcount = $this->Products->find('all')->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id !=' => 0,])->count();




        if ($this->request->is('post')) {
            $data = $this->request->data;
            $total = 0;
            for ($x = 1; $x <= $productcount; $x++) {
                $Products = $this->Products->newEntity();

                @$table['id'] = $data['productID' . $x];
                //@$table['keep_status'] = $data['what_do_you_think_of_the_product' . $x];
                @$table['size_status'] = $data['size' . $x];
                @$table['style_status'] = $data['style' . $x];
                @$table['fit_cut_status'] = $data['fit_cut' . $x];
                @$table['quality_status'] = $data['quality' . $x];
                @$table['price_status'] = $data['price' . $x];


                if (@$data['what_do_you_think_of_the_product' . $x] == 3) {
                    //@$table['customer_purchasedate'] = date('Y-m-d h:i:s');
                    @$table['customer_purchase_status'] = 'Y';
                    @$table['return_status'] = 'N';
                    @$table['exchange_status'] = 'N';

                    $table['keep_status'] = 3;
                }

                if (@$data['what_do_you_think_of_the_product' . $x] == 2) {
                    @$table['exchange_status'] = 'Y';
                    @$table['customer_purchase_status'] = 'N';
                    @$table['return_status'] = 'N';
//                    @$table['customer_purchasedate'] = date('Y-m-d h:i:s');
                    $table['keep_status'] = 2;
                }
                if (@$data['what_do_you_think_of_the_product' . $x] == 1) {
                    @$table['product_valid_return_date'] = date('Y-m-d h:i:s');
                    @$table['return_status'] = 'Y';
                    @$table['customer_purchase_status'] = 'N';
                    @$table['exchange_status'] = 'N';
//                    @$table['customer_purchasedate'] = date('Y-m-d h:i:s');
                    $table['keep_status'] = 1;
                }
//                pj($table);exit;
                $Products = $this->Products->patchEntity($Products, $table);
                //pj(@$table);exit;
                $this->Products->save($Products);
            }
            //for kid data insertion
            for ($x = 1; $x <= $kidcount; $x++) {
                $ProductsKids = $this->Products->newEntity();
                @$table['id'] = $data['productIDk' . $x];
//                @$table['kid_id'] = $data['kidID' . $x];               
                @$table['size_status'] = $data['sizekid' . $x];
                @$table['style_status'] = $data['stylekid' . $x];
                @$table['fit_cut_status'] = $data['fit_cutkid' . $x];
                @$table['quality_status'] = $data['qualitykid' . $x];
                @$table['price_status'] = $data['pricekid' . $x];
                if (@$data['what_do_you_think_of_the_productkid' . $x] == 3) {
                    @$table['keep_status'] = 3;
                    //  @$table['customer_purchasedate'] = date('Y-m-d h:i:s');
                    @$table['customer_purchase_status'] = 'Y';
                    @$table['return_status'] = 'N';
                    @$table['exchange_status'] = 'N';
                }
                if (@$data['what_do_you_think_of_the_productkid' . $x] == 2) {
                    @$table['keep_status'] = 2;
                    @$table['exchange_status'] = 'Y';
                    @$table['customer_purchase_status'] = 'N';
                    // @$table['customer_purchasedate'] = date('Y-m-d h:i:s');
                    @$table['return_status'] = 'N';
                }
                if (@$data['what_do_you_think_of_the_productkid' . $x] == 1) {
                    @$table['keep_status'] = 1;
                    @$table['product_valid_return_date'] = date('Y-m-d h:i:s');
                    @$table['return_status'] = 'Y';
                    @$table['customer_purchase_status'] = 'N';
                    // @$table['customer_purchasedate'] = date('Y-m-d h:i:s');
                    @$table['exchange_status'] = 'N';
                }


                $ProductsKids = $this->Products->patchEntity($ProductsKids, $table);

                $this->Products->save($ProductsKids);
            }

            $getCount = $this->CustomerProductReview->find('all')->where(['CustomerProductReview.user_id' => $this->Auth->user('id')]);
            $CustomerProductReviewxCount = $getCount->count();
            $CustomerProductReviewData = $getCount->first();
            if ($CustomerProductReviewxCount >= 1) {
                $data['id'] = $CustomerProductReviewData->id;
            } else {
                $data['id'] = '';
            }

            $customerProductReview = $this->CustomerProductReview->newEntity();
            $data['user_id'] = $this->Auth->user('id');
            $data['did_this_fix_personalized_to_you'] = $data['did_this_fix_personalized_to_you'];
            $data['did_this_fix_match_your_style'] = $data['did_this_fix_match_your_style'];
            $data['are_you_satisfied_with_this_fix'] = $data['are_you_satisfied_with_this_fix'];
            $data['look_forward_to_another_fix'] = $data['look_forward_to_another_fix'];
            $data['comments'] = $data['comments'];
            $customerProductReview = $this->CustomerProductReview->patchEntity($customerProductReview, $data);
            $this->CustomerProductReview->save($customerProductReview);

            return $this->redirect(HTTP_ROOT . 'customer-order-review');
        }



        $this->set(compact('productData', 'kidData', 'kidcount'));
    }

    public function customerOrderReview() {
        $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $customer_data = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N']);
        $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();

        $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
        $kidcount = $this->Products->find('all')->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id !=' => 0,])->count();
        $kid_data = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id !=' => 0, 'Products.checkedout' => 'N'])->group(['Products.kid_id'])->order(['Products.id' => 'DESC']);

        $detailsKid = [];
        foreach ($kid_data as $kid) {
            $detailsKid[$kid->kid_id] = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid->kid_id,]);
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $customer_data = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N']);
            $kidcount = $this->Products->find('all')->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id !=' => 0,])->count();

            $kid_data = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id !=' => 0,])->group(['Products.kid_id'])->order(['Products.id' => 'DESC']);

            $detailsKid = [];
            foreach ($kid_data as $kid) {
                $detailsKid[$kid->kid_id] = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => $kid->kid_id]);
            }

            $style_pick_total = 0;
            foreach ($customer_data as $customer_data_review) {

                if ($customer_data_review->keep_status == 3) {
                    $sprice = $customer_data_review->sell_price;
                } else {
                    $sprice = 0;
                }
                $style_pick_total += (double) $sprice;
            }


            $kstyle_pick_total = 0;
            foreach ($kid_data as $kcustomer_data_review) {
                if ($kcustomer_data_review->keep_status == 3) {
                    $skidprice = $kcustomer_data_review->sell_price;
                } else {
                    $skidprice = 0;
                }
                $kstyle_pick_total += (double) $skidprice;
            }


            $subtotal = $style_pick_total + $kstyle_pick_total;
            $sales_tax = ($subtotal * 8.25) / 100;
            $total = $sales_tax + $style_pick_total + $kstyle_pick_total;

            $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id')])->first();

            $payment_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first();
            $arr_user_info = [
                'card_number' => $payment_data->card_number,
                'exp_date' => $payment_data->card_expire,
                'card_code' => "" . $payment_data->cvv,
                'product' => 'Payment data',
                'first_name' => $userData->first_name,
                'last_name' => $userData->last_name,
                'address' => $payment_address->address,
                'city' => $payment_address->city,
                'state' => $payment_address->state,
                'zip' => $payment_address->zipcode,
                'country' => 'USA',
                'email' => $this->Auth->user('email'),
                'amount' => $total,
                'invice' => '22222',
                'refId' => 32,
                'companyName' => 'microfinet',
            ];

            // pj($arr_user_info);exit;
            $message = $this->authorizeCreditCard($arr_user_info);


            if ($message['status'] == 1) {

                $this->Flash->success(__('Your checkout receipt  has successfully sent your mail id'));
                // $subtotal = 0;
                $productData = '';
                $kproductData = '';
                $product_ids = array();

                $product_ids[] = $customer_data_review->id;
                $i = 1;
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

                    $productData .= "<tr style='border-bottom: 1px solid black;text-align: left;'>
                        <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               # " . $i . "
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;width: 100px;'>
                              <img src='" . HTTP_ROOT . PRODUCT_IMAGES . $customer_data_review->product_image . "' width='120'/>
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
                    $this->Products->updateAll(['checkedout' => 'Y'], ['id' => $customer_data_review->id]);

                    $i++;
                }

                // 22-jan exit;
                $exCount = $this->Products->find('all')->where(['Products.payment_id' => $customer_data_review->payment_id, 'Products.keep_status' => 2])->Count();
                if ($exCount == 0) {
                    $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $customer_data_review->payment_id]);
                } else {
                    $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $customer_data_review->payment_id]);
                }

                $paymentG = $this->PaymentGetways->newEntity();
                $table1['user_id'] = $this->Auth->user('id');
                $table1['emp_id'] = 0;
                $table1['status'] = 1;
                $table1['price'] = $total;
                $table1['profile_type'] = 0;
                $table1['payment_type'] = 2;
                $table1['created_dt'] = date('Y-m-d H:i:s');
                $paymentG = $this->PaymentGetways->patchEntity($paymentG, $table1);
                $lastPymentg = $this->PaymentGetways->save($paymentG);


                $payment = $this->Payments->newEntity();
                $table['user_id'] = $this->Auth->user('id');
                $table['payment_id'] = $payment_data->id;
                $table['sub_toal'] = $subtotal;
                $table['tax'] = 8.25;
                $table['tax_price'] = $sales_tax;
                $table['total_price'] = $total;
                $table['paid_status'] = 1;
                $table['created_dt'] = date('Y-m-d H:i:s');
                $table['product_ids'] = implode(',', $product_ids);
                $payment = $this->Payments->patchEntity($payment, $table);
                $lastPyment = $this->Payments->save($payment);


                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $to = $this->Auth->user('email');
                $name = $this->Auth->user('name');
                $from = $fromMail->value;

                $sitename = SITE_NAME;
                //echo $kidcount; exit;

                if ($kidcount > 1) {
                    $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENTK'])->first();
                    $email_message = $this->Custom->orderk($emailMessage1->value, $name, $sitename, $customer_data, $kid_data, $detailsKid, $total, $subtotal, $sales_tax);
                    $subject = $emailMessage1->display;
                } else {
                    $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
                    $subject = $emailMessage1->display;
                    $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $total, $subtotal, $sales_tax);
                }


                $this->Custom->sendEmail($to, $from, $subject, $email_message);

                //$this->Custom->sendEmail('klnpriyadarsini@gmail.com', $from, $subject, $email_message);

                return $this->redirect(HTTP_ROOT . 'welcome/schedule');
            } else {

                $this->Flash->error(__('Your payment has failed '));
                return $this->redirect(HTTP_ROOT . 'customer-order-review');
            }
        }

        $this->set(compact('productData', 'customer_data', 'userData', 'kid_product_Data', 'kidcount', '', 'kid_data', 'detailsKid'));
    }

    public function noreview() {
        $status = '';
        $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $this->Auth->user('id'), 'PaymentGetways.status' => 1])->count();
        if ($paymentCount == 1) {
            $status = "st";
        } elseif ($paymentCount == 2) {
            $status = "nd";
        } elseif ($paymentCount == 3) {
            $status = "rd";
        } else {
            $status = "th";
        }
        $this->set(compact('status', 'paymentCount', '', '', '', '', '', ''));
    }

    public function savepayment() {
        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id')]);
        $savecardcount = $savecard->count();
//        pj($savecardcount);exit;
        if ($this->request->is('post')) {
            $data = $this->request->data;
//         pj($data);exit;
            if (@$data['id']) {
                $data['id'] = $data['id'];
            } else {
                $data['id'] = '';
            }
            if ($data['isSaveCard'] == 1) {
                $isSaveCard = 1;
            } else {
                $isSaveCard = 0;
            }
            $newEntity = $this->PaymentCardDetails->newEntity();
            $info1 = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id')])->first();
            $data['user_id'] = $this->Auth->user('id');
            $data['is_save'] = $isSaveCard;
            $data['card_name'] = $data['card_name'];
            $data['card_type'] = $data['card_type'];
            $data['card_number'] = $data['card_number'];
            $data['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];
            $data['cvv'] = $data['cvv'];
            $newEntity = $this->PaymentCardDetails->patchEntity($newEntity, $data);
            //pj($newEntity);
            $this->PaymentCardDetails->save($newEntity);
            //pj($newEntity);exit;
            //for use on payment get ways setiing 
            $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
            $exitdata = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first();
            return $this->redirect(HTTP_ROOT . 'account');
        }
        $this->set(compact('status', 'paymentCount', 'savecard', 'savecardcount', '', '', '', ''));
    }

    public function frequency() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
//            if (@$data['first_time_fix'] == 'first_time_fix') {
            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();
            $frequency_details = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
            if ($frequency_details->id) {
                $data['id'] = $frequency_details->id;
            } else {
                $data['id'] = '';
            }
            $data['user_id'] = $this->Auth->user('id');
            $data['try_new_items_with_scheduled_fixes'] = $data['try_new_items_with_scheduled_fixes'];
            $data['how_often_would_you_lik_fixes'] = $data['how_often_would_you_lik_fixes'];
            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
            $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
//}
//                 pj($LetsPlanYourFirstFixData);exit;


            return $this->redirect(HTTP_ROOT . 'account');
        }
        $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();

        $this->set(compact('LetsPlanYourFirstFixData'));
    }

    public function getCardDetails() {
        $this->viewBuilder()->setLayout('ajax');

        $data = $this->request->data;

        if ($data) {
            $getDetails = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.id' => $data['id'], 'PaymentCardDetails.is_save' => 1])->first();

            echo json_encode($getDetails);
        }
        exit;
    }

    public function getSavedCardDetails() {
        $this->viewBuilder()->setLayout('ajax');

        $data = $this->request->data;

        if ($data) {
            $getDetails = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.id' => $data['id'], 'PaymentCardDetails.is_save' => 1])->first();

            echo json_encode($getDetails);
        }
        exit;
    }

    public function removeCardDetails() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($data) {
            $this->PaymentCardDetails->deleteAll(['id' => $data['id']]);
            echo json_encode(['msg' => 1]);
        }
        exit;
    }

    public function websocketMessage() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->input('json_decode', TRUE);
        $data = $this->request->data;
        if (@$data['chat_type'] == 1) {
            $getEmpoyeeId = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $data['userId']])->first();
            $reciverId = $getEmpoyeeId->emp_id;
        } else {
            $reciverId = $data['reciveId'];
        }
        $newEntity = $this->ChatMessages->newEntity();
        $data['user_id'] = $data['userId'];
        $data['recive_id'] = $reciverId;
        $data['user_name'] = $data['userName'];
        $data['chat_message'] = $data['chat_message'];
        $data['chat_type'] = $data['chat_type'];
        $data['chat_date_time'] = date('Y-m-d h:i:s');
        $data['files'] = $data['files'];

        $newEntity = $this->ChatMessages->patchEntity($newEntity, $data);
        $save = $this->ChatMessages->save($newEntity);
        echo json_encode(1);
        exit;
    }

    public function chatHistory() {
        $userId = $this->Auth->user('id');
        $this->ChatMessages->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $getChatMessage = $this->ChatMessages->find('all')->contain(['Users'])->where(['OR' => ['ChatMessages.user_id' => $userId, 'ChatMessages.recive_id' => $userId]])->order(['ChatMessages.id' => 'DESC']);
        // pj($getChatMessage);exit;
        $this->set(compact('userId', 'getChatMessage'));
    }

    public function chatSupport() {
        $userId = $this->Auth->user('id');
        $userName = $this->Auth->user('name');
        $this->set(compact('userId', 'userName'));
    }

    public function websocketPastMessage() {
        $userId = $this->Auth->user('id');
        $this->ChatMessages->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $getChatMessage = $this->ChatMessages->find('all')->contain(['Users'])->where(['OR' => ['ChatMessages.user_id' => $userId, 'ChatMessages.recive_id' => $userId]])->order(['ChatMessages.id' => 'asc']);
        $time = array();
        foreach ($getChatMessage as $msg) {
            $time[] = $this->Custom->timeElapsedString($msg->chat_date_time);
        }
        echo json_encode(['msg' => $getChatMessage, 'time' => $time]);
        exit;
    }

    public function checkCstTime() {

        date_default_timezone_set("America/Chicago");
        $startTime = '0';
        $endTime = '24';
        $currentHour = date('H');
        if ($currentHour >= $startTime && $currentHour <= $endTime) {
            echo 2;
        } else {
            echo 1;
        }


        exit;
    }

    public function startOnline() {
        $data = $this->request->input('json_decode', TRUE);
        $data = $this->request->data;
        date_default_timezone_set("America/Chicago");
        if ($data['userId']) {
            $this->Users->updateAll(['online' => 1], ['id' => $data['userId']]);
        }

        exit;
    }

    public function startOnlineOffline() {
        $data = $this->request->input('json_decode', TRUE);
        $data = $this->request->data;
        date_default_timezone_set("America/Chicago");
        if ($data['userId']) {
            $this->Users->updateAll(['online' => 0], ['id' => $data['userId']]);
        }

        exit;
    }

    public function chatFilsUpload() {
        $data = $this->request->input('json_decode', TRUE);
        $data = $this->request->data;
//       pj($data);exit;
        if (!empty($data['photos']['name'])) {
            // move_uploaded_file($data['file']['tmp_name'], CHAT_IMAGE.data['file']['name']);
            $imageName = move_uploaded_file($data['photos']['tmp_name'], 'files/chat_image/' . $data['photos']['name']);
            //$imageName = $this->Custom->uploadChatImage($data['file']['name'], CHAT_IMAGE);
        }
        echo json_encode($data['photos']['name']);
        exit;
    }

    public function deleteAddress($id = null, $page = null) {
        if ($id) {
            $this->ShippingAddress->deleteAll(['id' => $id]);
            $this->Flash->success(__('Data deleted successfully.'));
            if (!empty($page)) {
                return $this->redirect(HTTP_ROOT . 'welcome/addressbook');
            } else {
                return $this->redirect(HTTP_ROOT . 'shippingaddress');
            }
        }
        exit;
    }

    public function addShipAddress($user_id = null) {
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $ship_addrs = $this->ShippingAddress->newEntity();
            $data['user_id'] = $this->Auth->user('id');
            $ship_addrs = $this->ShippingAddress->patchEntity($ship_addrs, $data);
            $this->ShippingAddress->save($ship_addrs);



            return $this->redirect(HTTP_ROOT . 'shippingaddress');
        }
    }

}
