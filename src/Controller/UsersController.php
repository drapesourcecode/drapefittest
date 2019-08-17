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
//-----------------------------------------------FOR GOOGLE PLUS LOGIN--------------------------------------------------------------//
use Google_Client;
use Google_PlusService;
use Google_Oauth2Service;
use oauth_client_class;

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
        $this->loadModel('ReferFriends');
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
        $this->loadModel('EmailPreferences');
        $this->loadModel('Wallets');
        $this->loadModel('HelpDesks');
        $this->loadModel('Giftcard');
        $this->loadModel('UserMailTemplateGiftcode');
        $this->loadModel('UserUsesGiftcode');
        $this->loadModel('Notifications');

        $this->loadModel('MenAccessories');
        $this->loadModel('CustomDesine');
        $this->loadModel('WomenShoePrefer');
        $this->loadModel('WomenHeelHightPrefer');
        $this->loadModel('WemenStyleSphereSelections');

        $this->loadModel('UserAppliedCodeOrderReview');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['invite', 'ajaxGmail', 'chatCheckAuth', 'helpClose', 'help', 'startOnlineOffline', 'chatHistory', 'websocketMessage', 'adminlogin', 'fbreturn', 'fblogin', 'fbreturncon', 'fbloginCon', 'client', 'webrootRedirect', 'personalInfo', 'login', 'index', 'logout', 'forget', 'changePassword', 'registration', 'sizedata', 'setPassword', 'shipping', 'ajaxCheckEmailAvail', 'deleteAddress', 'addShipAddress', 'websocketDivMinaus', 'websocketDivMinausAdmin', 'chatButtonClose', 'men', 'women', 'kids', 'address', 'ajaxLogin', 'userregistration', 'ajaxforget', 'googleLoginReturn', 'googlelogin', 'editprofileSocialmedia', 'notYetShipped', 'notYetShipped', 'unsubscribe']);
    }

    public function calendarSechedule() {
        if (@$this->request->session()->read('Auth.User.id')) {
            if ($this->request->session()->read('Auth.User.type') != 2) {
                $this->Flash->success(__('No access to you this page '));
                return $this->redirect(HTTP_ROOT . 'appadmins');
            }
        }

        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
            if ($getUsersDetails->is_redirect == 6) {

                return $this->redirect(HTTP_ROOT . 'order_review');
            }
            if ($getUsersDetails->is_redirect == 2) {

                return $this->redirect(HTTP_ROOT . 'not-yet-shipped');
            }

            if ($getUsersDetails->is_progressbar < 100) {

                return $this->redirect(HTTP_ROOT . 'welcome/style');
            }

            $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID')])->first();
        } else {
            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();

            if ($getUsersDetails->is_redirect == 6) {

                return $this->redirect(HTTP_ROOT . 'order_review');
            }
            if ($getUsersDetails->is_redirect == 2) {

                return $this->redirect(HTTP_ROOT . 'not-yet-shipped');
            }

            if ($getUsersDetails->user_detail->is_progressbar < 100) {

                return $this->redirect(HTTP_ROOT . 'welcome/style');
            }
            $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id'), 'kid_id' => 0])->first();
            // pj($LetsPlanYourFirstFixData); exit;
        }



        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data); exit;

            if (@$data['try_new_items_with_scheduled_fixes'] == '') {
                $try_new_items_with_scheduled_fixes = 0;
            } else {
                $try_new_items_with_scheduled_fixes = $data['try_new_items_with_scheduled_fixes'];
            }
            if (@$data['how_often_would_you_lik_fixes'] == '') {
                $how_often_would_you_lik_fixes = 0;
            } else {
                $how_often_would_you_lik_fixes = $data['how_often_would_you_lik_fixes'];
            }



            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();
            if (!empty($this->request->session()->read('KID_ID'))) {

                $getdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                if (@$getdata->kid_id) {
                    $data['id'] = $getdata->id;
                } else {
                    $data['id'] = '';
                }
                $exitdata = 0;
            } else {
                $exitdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->count();
            }

            if ($exitdata >= 1) {
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes], ['kid_id' => $this->request->session()->read('KID_ID')]);
                } else {

                    //echo $this->Auth->user('id'); exit;
                    $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes], ['user_id' => $this->Auth->user('id')]);
                }
            } else {
                $data['user_id'] = $this->Auth->user('id');
                $data['kid_id'] = (@$this->request->session()->read('KID_ID')) ? @$this->request->session()->read('KID_ID') : 0;
                $data['try_new_items_with_scheduled_fixes'] = $try_new_items_with_scheduled_fixes;
                $data['how_often_would_you_lik_fixes'] = $how_often_would_you_lik_fixes;
                $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
                $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
            }





            $enty = $this->DeliverDate->newEntity();



            $exitData = $this->DeliverDate->find('all')->where(['DeliverDate.user_id' => $this->Auth->user('id')])->first();
            if ($exitData->user_id) {
                $data['id'] = $exitData->id;
            } else {
                $data['id'] = '';
            }
            if (@$data['sendMe']) {
                $is_send_me = 1;
            } else {
                $is_send_me = 0;
            }
            $dateTime = date('l, F d, Y', strtotime($data['datepick']));
            $data['date_in_time'] = $dateTime;
            $data['weeks'] = 0;
            $data['is_send_me'] = $is_send_me;
            $user = $this->DeliverDate->patchEntity($enty, $data);

            if ($this->DeliverDate->save($user)) {



                return $this->redirect(HTTP_ROOT . 'welcome/reservation');
            }
        }


        $this->set(compact('LetsPlanYourFirstFixData'));
    }

    public function facebookDisconnect() {
        $this->viewBuilder()->layout('default');
        if ($this->Auth->user('id')) {
            $this->Users->updateAll(['is_fb_connect' => 0], ['id' => $this->Auth->user('id')]);
            return $this->redirect(HTTP_ROOT . 'account/facebook');
        }
    }

    public function help() {
        if (@$this->request->session()->read('help-active') == 2) {
            $this->request->session()->write('help-active', '1');
            return $this->redirect(HTTP_ROOT);
        }

        if (@$this->request->session()->read('help-active') == '') {
            $this->request->session()->write('help-active', '1');
            return $this->redirect(HTTP_ROOT);
        } else {
            return $this->redirect(HTTP_ROOT);
        }
    }

    public function helpClose() {
        $this->viewBuilder()->layout('default');
        if ($this->request->session()->read('help-active') != '') {
            $this->request->session()->write('help-active', '');
            return $this->redirect(HTTP_ROOT);
        }
    }

    public function men() {
        
    }

    public function women() {
        
    }

    public function kids() {
        
    }

    public function address() {
        
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

            if (!empty($fb_data)) {
                if (@$fb_data['email']) {

                    $checkUserFb = $this->Users->find('all')->where(['set_email' => $fb_data['email']])->count();
                    if ($checkUserFb >= 1) {
                        $checkUserFb = $this->Users->find('all')->where(['set_email' => $fb_data['email']])->first();
                        if ($checkUserFb->is_fb_connect == 1) {
                            $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $checkUserFb->id])->first()->toArray();
                            session_destroy();
                            $get_login = $this->Auth->setUser($getLoginConfirmation);
                            if ($getLoginConfirmation['type'] == 2) {
                                $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_login_id])->first();
                                if ($Userdetails->gender == 1) {
                                    $gen = "MEN";
                                    $this->request->session()->write('PROFILE', $gen);
                                    return $this->redirect(HTTP_ROOT . $url);
                                }
                                if ($Userdetails->gender == 2) {
                                    $gen = "WOMEN";
                                    $this->request->session()->write('PROFILE', $gen);
                                    return $this->redirect(HTTP_ROOT . $url);
                                } else {

                                    return $this->redirect(HTTP_ROOT . $url);
                                }
                            }

                            $this->Flash->success(__('Login successfull'));
                            return $this->redirect(HTTP_ROOT . 'welcome/style');
                        } else {
                            $this->Flash->error(__('Facebook is disconnect'));
                            return $this->redirect(HTTP_ROOT);
                        }
                    } else {
                        $result = $this->Users->find('all')->where(['email' => $fb_data['email']])->count();
                        if ($result >= 1) {
                            $result_email = $this->Users->find('all')->where(['email' => $fb_data['email']])->first();
                            if (!empty($result_email->email)) {
                                $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id']])->first()->toArray();
                                $this->Users->updateAll(['is_fb_connect' => 1], ['id' => $getLoginConfirmation->id]);
                                session_destroy();
                                $get_login = $this->Auth->setUser($getLoginConfirmation);
                                $this->Flash->success(__('Login successfull'));
                                $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                                if ($getLoginConfirmation['type'] == 2) {
                                    $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_login_id])->first();
                                    if ($Userdetails->gender == 1) {
                                        $gen = "MEN";
                                        $this->request->session()->write('PROFILE', $gen);
                                        return $this->redirect(HTTP_ROOT . $url);
                                    }
                                    if ($Userdetails->gender == 2) {
                                        $gen = "WOMEN";
                                        $this->request->session()->write('PROFILE', $gen);
                                        return $this->redirect(HTTP_ROOT . $url);
                                    } else {

                                        return $this->redirect(HTTP_ROOT . $url);
                                    }
                                }

                                return $this->redirect(HTTP_ROOT . $url);
                            }

                            if (@$this->Auth->user('id') == '') {
                                $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id']])->first()->toArray();
                                $this->Users->updateAll(['is_fb_connect' => 1], ['id' => $getLoginConfirmation->id]);
                                session_destroy();
                                $get_login = $this->Auth->setUser($getLoginConfirmation);
                                $user_login_id = $this->Auth->user('id');
                                if ($user_login_id) {
                                    $user = $this->Users->newEntity();
                                    $user->last_login_ip = $this->Custom->getRealIpAddress();
                                    $user->last_login_date = date('Y-m-d H:i:s');
                                    $user->id = $user_login_id;
                                    $user->name = $fb_data['first_name'];
                                    $user->facebook_id = $fb_data['id'];
                                    $this->Users->save($user);
                                    if ($this->Users->save($user)) {
                                        $this->UserDetails->updateAll(['first_name' => $fb_data['first_name'], 'last_name' => $fb_data['last_name']], ['user_id' => $user_login_id]);


                                        if ($getLoginConfirmation['type'] == 2) {
                                            $url = $this->Custom->loginRedirectAjax($user_login_id);
                                            if ($getLoginConfirmation['type'] == 2) {
                                                $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_login_id])->first();
                                                if ($Userdetails->gender == 1) {
                                                    $gen = "MEN";
                                                    $this->request->session()->write('PROFILE', $gen);
                                                    return $this->redirect(HTTP_ROOT . $url);
                                                }
                                                if ($Userdetails->gender == 2) {
                                                    $gen = "WOMEN";
                                                    $this->request->session()->write('PROFILE', $gen);
                                                    return $this->redirect(HTTP_ROOT . $url);
                                                } else {

                                                    return $this->redirect(HTTP_ROOT . $url);
                                                }
                                            }
                                        }

                                        $this->Flash->success(__('Login successfull'));
                                        $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                                        return $this->redirect(HTTP_ROOT . $url);
                                    }
                                } else {
                                    $this->Flash->error(__('Login failed and you can register here also'));
                                    return $this->redirect(HTTP_ROOT);
                                }
                            }
                        } else {
                            $user = $this->Users->newEntity();
                            $user->email = $fb_data['email'];
                            $user->first_name = $fb_data['first_name'];
                            $user->last_name = $fb_data['last_name'];
                            $user->type = 2;
                            $user->facebook_id = $fb_data['id'];
                            $user->unique_id = $this->Custom->generateUniqNumber();
                            $user->name = $user->first_name;
                            $user->created_dt = date('Y-m-d H:i:s');
                            $user->last_login_date = date('Y-m-d H:i:s');
                            $user->is_active = 1;
                            $user->reg_ip = $this->Custom->get_ip_address();
                            $user->last_login_ip = $this->Custom->get_ip_address();
                            if ($this->Users->save($user)) {
                                $data['id'] = $user->id;
                                $this->Users->updateAll(['is_fb_connect' => 1], ['id' => $user->id]);
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
                                    $data1['user_id'] = $user->id;
                                    $data1['first_name'] = $user->first_name;
                                    $data1['last_name'] = $user->last_name;
                                    $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $data1);
                                    $this->UserDetails->save($userDetailspatch);
                                    $this->Flash->success(__('Login successfull and please edit your profile'));
                                    $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                                    return $this->redirect(HTTP_ROOT . $url);
                                } else {
                                    $this->Flash->error(__('Login failed and you can register here also'));
                                    return $this->redirect(HTTP_ROOT);
                                }
                            } else {
                                $this->Flash->error(__('Login failed and you can register here also'));
                                return $this->redirect(HTTP_ROOT);
                            }
                        }
                    }
                } else {
                    $this->Flash->error(__('Login failed due to email is not associate with your facebook! '));
                    return $this->redirect(HTTP_ROOT);
                }
            } else {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT);
            }
        }
    }

    public function fbloginCon() {

        $this->autoRender = false;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID_CON, FACEBOOK_APP_SECRET_CON);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI_CON);
        $url = $helper->getLoginUrl(array('email'));
        $this->redirect($url);
    }

    public function fbreturncon() {
        session_start();
        $this->viewBuilder()->layout('ajax');
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID_CON, FACEBOOK_APP_SECRET_CON);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI_CON);
        $session = $helper->getSessionFromRedirect();
        if (isset($_SESSION['token'])) {
            $session = new FacebookSession($_SESSION['token']);
            try {

                $session->validate(FACEBOOK_APP_ID_CON, FACEBOOK_APP_SECRET_CON);
            } catch (FacebookAuthorizationException $e) {
                echo $e->getMessage();
            }
        }

        $data = array();
        $fb_data = array();

        if (isset($session)) {
            $fb_data['email'] = '';
            $_SESSION['token'] = $session->getToken();
            $appsecret_proof = hash_hmac('sha256', $_SESSION['token'], FACEBOOK_APP_SECRET_CON);
            $request = new FacebookRequest($session, 'GET', '/me?locale=en_US&fields=name,email,gender,age_range,first_name,last_name,link,locale,picture,location', array("appsecret_proof" => $appsecret_proof));

            $response = $request->execute();
            $graph = $response->getGraphObject(GraphUser::className());
//echo "<pre>";
//print_r($graph); 
            $fb_data = $graph->asArray();
            $id = $graph->getId();
            $email = $graph->getEmail();
//echo $fb_data['email']; exit;
            if (@$fb_data['email']) {
// if ($fb_data['email'] != $this->request->session()->read('Auth.User.email')) {


                $result = $this->Users->find('all')->where(['id' => $this->request->session()->read('Auth.User.id')])->first();

                $this->Users->updateAll(['set_email' => $fb_data['email'], 'is_fb_connect' => '1'], ['id' => $this->request->session()->read('Auth.User.id')]);

                return $this->redirect(HTTP_ROOT . 'account/facebook');

//} else {
// $this->Flash->error(__("Your can't connect to primary email"));
//return $this->redirect(HTTP_ROOT . 'account');
//}
            } else {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT . 'account');
            }
        }
    }

    public function index($slug = null) {
        $this->viewBuilder()->layout('default');
        if ($this->request->session()->read('Auth.User.id') != '') {
            return $this->redirect(HTTP_ROOT . 'calendar-sechedule');
        }

        $user_details = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['submit'] == 'Send') {
                $help = $this->HelpDesks->newEntity();
                $data['full_name'] = $data['firstname'];
                $data['email'] = $data['email'];
                $data['messages'] = $data['subject'];
                $data['created'] = date('Y-m-d H:i:s');
                $data['code'] = $this->Custom->generateUniqNumber();
                $this->HelpDesks->patchEntity($help, $data);
                $this->HelpDesks->save($help);
//pj($data);exit;

                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'HELP_MESSAGE'])->first();
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $toMail = $this->Settings->find('all')->where(['Settings.name' => 'TO_HELP'])->first();
                $i = 0;
                foreach ($data['itmes'] as $item) {
                    $ftype[] = $data['itmes'][$i]['type'];
                    $fname[] = $data['itmes'][$i]['name'];
                    $tmpFilePath = $data['itmes'][$i]['tmp_name'];
                    $newFilePath = HELP . $data['itmes'][$i]['name'];
//echo $newFilePath;exit;
                    move_uploaded_file($tmpFilePath, $newFilePath);

                    $i++;
                }

                $files = $fname;
                $to = $toMail->value;
//$to = "devadash143@gmail.com";
                $from = $fromMail->value;
                $subject = $emailMessage->display;
                $message = $this->Custom->helpformat($emailMessage->value, $data['full_name'], $data['email'], $data['subject'], date('Y-m-d H:i:s'));
                $headers = "From: $from";
                $semi_rand = md5(time());
                $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

                $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
                $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
                $message .= "--{$mime_boundary}\n";

// preparing attachments
                for ($x = 0; $x < count($files); $x++) {
                    $file = fopen(HELP . $files[$x], "rb");
                    $data = fread($file, filesize(HELP . $files[$x]));
                    fclose($file);
                    $data = chunk_split(base64_encode($data));
                    $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$files[$x]\"\n" .
                            "Content-Disposition: attachment;\n" . " filename=\"$files[$x]\"\n" .
                            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                    $message .= "--{$mime_boundary}\n";
                }

//echo $to, $subject, $message, $headers; exit;
                $ok = @mail($to, $subject, $message, $headers);
                $toUser = $data['email'];
                @mail($toUser, $subject, $message, $headers);

                if ($ok) {



                    $this->request->session()->write('help-active', '2');
//$this->Flash->success(__('Your help send successfully'));
                    return $this->redirect(HTTP_ROOT);
                } else {
// $this->Flash->error(__('Not connect yet'));
                    $this->request->session()->write('help-active', '1');
                    return $this->redirect(HTTP_ROOT);
                }
            }



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

                    $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $sitename);
//                   echo  $to, $from, $subject, $message;exit;
                    $kid_id = 0;
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    $this->Flash->success(__('Account created successfully.'));
                    return $this->redirect(HTTP_ROOT . 'welcome/style/');
                }
            }
        }
        $this->set(compact('user_details'));
    }

    public function ajaxLogin() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->session()->read('Auth.User.id') != '') {
            echo json_encode(['status' => 'login', 'msg' => 'already logged in']);
            exit();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user = $this->Auth->identify();
            if ($user) {
                if ($data['email']) {
                    $isactive_check = $this->Users->find('all')->where(['Users.email' => $data['email'], 'Users.is_active' => true, 'Users.type IN' => [2]]);

                    $isactive_counter = $isactive_check->count();
                    if ($isactive_counter > 0) {


                        $this->Auth->setUser($user);
                        $type = $this->request->session()->read('Auth.User.type');
                        $name = $this->request->session()->read('Auth.User.name');
                        $email = $this->request->session()->read('Auth.User.email');
                        $user_id = $this->request->session()->read('Auth.User.id');

                        if ($type == 2) {

                            $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_id])->first();
                            if ($Userdetails->gender == 1) {

                                $gen = "MEN";
                                $this->request->session()->write('PROFILE', $gen);
                            }
                            if ($Userdetails->gender == 2) {
                                $gen = "WOMEN";
                                $this->request->session()->write('PROFILE', $gen);
                            }
                            $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                            echo json_encode(['status' => 'login_redirect', 'url' => $url]);
                            exit;
                        }
                    } else {
                        echo json_encode(['status' => 'login_faild', 'msg' => 'Your have not permission please contacts your admin']);
                        exit;
                    }
                } else {
                    echo json_encode(['status' => 'login_faild', 'msg' => 'Invalid username or password, try again']);
                    exit();
                }
            } else {
                echo json_encode(['status' => 'login_faild', 'msg' => 'Invalid username or password, try again']);
                exit();
            }
        }
        exit;
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
                                $url = $this->Custom->loginRedirectAjax($this->request->session()->read('Auth.User.id'));
                                return $this->redirect(HTTP_ROOT . $url);
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
                    $kid_id = 0;
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

    public function ajaxforget() {
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
                    $this->Users->query()->update()->set(['qstr' => $user->unique_id])->where(['id' => $user->id])->execute();
                    $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'FORGOT_PASSWORD'])->first();
                    $to = $user->email;
                    $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $from = $fromvalue->value;
                    $subject = $emailTemplate->display;
                    $link = '<a style="text-decoration:none;color:black;" target="_blank" href=' . HTTP_ROOT . 'changePassword/' . $user->unique_id . '>Reset Password</a>';

                    $message = $this->Custom->formatForgetPassword($emailTemplate->value, $user->name, $user->email, $link, SITE_NAME);
                    $kid_id = 0;
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    echo json_encode(['status' => 'successs', 'msg' => 'A link to reset your password has been set to your registered email address.']);
                    exit;
                } else {
                    echo json_encode(['status' => 'error', 'msg' => 'This email is not associated with our site.']);
                    exit;
                }
            }
        }
    }

    public function changePassword($uniq = null) {
        $this->viewBuilder()->layout('default');
        $title_for_layout = "Change password";
        $metaKeyword = "Change password";
        $metaDescription = "Change password";




        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            $user = $this->Users->newEntity();
            $checkSetPassword = $this->Users->find('all')->where(['Users.unique_id' => $data['uniq']])->first();
            if (@$checkSetPassword->qstr != $data['uniq']) {
                $this->Flash->error(__('Error prohibited this user from being saved'));
                return $this->redirect(HTTP_ROOT . 'changePassword/' . $data['uniq']);
            }


            if ($data['New_Password'] == "") {
                $this->Flash->error(__('Please enter password'), 'error_message');
            } else if (strlen($data['New_Password']) < 5) {
                $this->Flash->error(__('Password must contain atleast 5 characters.'));
            } else if ($data['Confirm_Password'] == "") {
                $this->Flash->error(__('Please enter confirm password'), 'error_message');
            } else if (strlen($data['Confirm_Password']) < 5) {
                $this->Flash->error(__('Confirm password must contain atleast 5 characters.'));
            } else if ($data['New_Password'] != $data['Confirm_Password']) {
                $this->Flash->error(__('Please enter confirm password same as password'), 'error_message');
            } else {
                $users = $this->Users->find('all')->where(['Users.unique_id' => $data['uniq']]);
                $uniq = $data['uniq'];
                $userData = $users->first();
                if ($users->count() > 0 && $userData->qstr != '') {
                    $data['id'] = $userData->id;
                    $user->password = $data['New_Password'];
                    $user->qstr = '';

                    $user->id = $userData->id;
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Password changed successfully now you can login.'));
                        return $this->redirect(HTTP_ROOT);
                    }
                } else {
                    $this->Flash->error(__('Error prohibited this user from being saved'));
                    return $this->redirect(HTTP_ROOT . 'changePassword/' . $data['uniq']);
                }
            }
        }
        $this->set(compact('uniq', 'user', 'metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function registration() {
        $this->viewBuilder()->layout('ajax');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $gender = $data['gender'];
            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();

            if ($exitEmail >= 1) {
                $this->Flash->error(__('Email already exits'));
                return $this->redirect(HTTP_ROOT);
            } else {
//$password = time();
                $data['unique_id'] = $this->Custom->generateUniqNumber();
                $data['type'] = 2;
                $data['name'] = $data['fname'];
                $data['password'] = $data['pwd'];
                $data['is_active'] = 1;
                $data['created_dt'] = date('Y-m-d h:i:s');
                $data['last_login_date'] = date('Y-m-d h:i:s');
                $data['qstr'] = '';
                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $userID = $user->id;
                    $userDetailspatch = $this->UserDetails->newEntity();
                    $authUser = $this->Users->get($userID)->toArray();
                    $this->Auth->setUser($authUser);

//echo $this->Auth->user('id'); exit;
                    $userDetails['user_id'] = $userID;
                    $userDetails['first_name'] = $data['fname'];
                    $userDetails['last_name'] = $data['lname'];
                    $userDetails['dateofbirth'] = '';

                    if ($gender == 'men') {
                        $userDetails['gender'] = '1';

                        $url = HTTP_ROOT . 'welcome/style/';
                    } elseif ($gender == 'women') {
                        $userDetails['gender'] = '2';
                        $url = HTTP_ROOT . 'welcome/style/';
                    } else {
                        $userDetails['gender'] = '3';
                        $gender = 'kids';

                        $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->count();
                        $countChild = $kidcount + 1;
                        $newEntity = $this->KidsDetails->newEntity();
                        $data['user_id'] = $userID;
//$data['kids_first_name'] = 'CHILD' . $countChild;
                        $data['kids_first_name'] = '';
                        $data['kid_count'] = $countChild;
                        $data['kids_birthdate'] = '';
                        $data['kids_relationship_to_child'] = '';
                        $data['kids_clothing_gender'] = '';
                        $data['kids_frequency_arts_and_crafts'] = '';
                        $data['kids_frequency_biking'] = '';
                        $data['kids_frequency_theatre'] = '';
                        $data['kids_frequency_dance'] = '';
                        $data['kids_frequency_sports'] = '';
                        $data['kids_frequency_playing_outside'] = '';
                        $data['kids_frequency_musical_instruments'] = '';
                        $data['kids_frequency_reading'] = '';
                        $data['kids_frequency_video_games'] = '';
//pj($data);exit;
                        $newEntity = $this->KidsDetails->patchEntity($newEntity, $data);
                        $this->KidsDetails->save($newEntity);
                        $this->request->session()->write('KID_ID', $newEntity->id);
                        $this->request->session()->write('PROFILE', 'KIDS');




                        $url = HTTP_ROOT . 'welcome/style/';
                    }






                    $gender1 = strtoupper($gender);
                    $userDetails['country'] = '';
                    $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $userDetails);
                    $this->UserDetails->save($userDetailspatch);
//echo $gender1; exit;
                    $this->request->session()->write('PROFILE', $gender1);
//email creation
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $user->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
//$password = $password;
                    $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $data['pwd'], $sitename);


                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    echo json_encode(['status' => 'Account Created', 'msg' => 'success', 'url' => $url]);
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
        exit();
    }

    public function userregistration() {
        $this->viewBuilder()->layout('ajax');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $gender = $data['gender'];
            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();

            if ($exitEmail >= 1) {
                $this->Flash->error(__('Email already exits'));
                return $this->redirect(HTTP_ROOT);
            } else {
                $password = time();
                $data['unique_id'] = $this->Custom->generateUniqNumber();
                $data['type'] = 2;
                $data['name'] = $data['fname'];
                $data['password'] = $data['pwd'];
                $data['is_active'] = 1;
                $data['created_dt'] = date('Y-m-d h:i:s');

                $data['last_login_date'] = date('Y-m-d h:i:s');
                $data['qstr'] = '';

                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $userID = $user->id;
                    $userDetailspatch = $this->UserDetails->newEntity();
                    $authUser = $this->Users->get($userID)->toArray();
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
                        $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->count();
                        $countChild = $kidcount + 1;
                        $newEntity = $this->KidsDetails->newEntity();
                        $data['user_id'] = $userID;
//$data['kids_first_name'] = 'CHILD' . $countChild;
                        $data['kids_first_name'] = '';
                        $data['kid_count'] = $countChild;
                        $data['kids_birthdate'] = '';
                        $data['kids_relationship_to_child'] = '';
                        $data['kids_clothing_gender'] = '';
                        $data['kids_frequency_arts_and_crafts'] = '';
                        $data['kids_frequency_biking'] = '';
                        $data['kids_frequency_theatre'] = '';
                        $data['kids_frequency_dance'] = '';
                        $data['kids_frequency_sports'] = '';
                        $data['kids_frequency_playing_outside'] = '';
                        $data['kids_frequency_musical_instruments'] = '';
                        $data['kids_frequency_reading'] = '';
                        $data['kids_frequency_video_games'] = '';
//pj($data);exit;
                        $newEntity = $this->KidsDetails->patchEntity($newEntity, $data);
                        $this->KidsDetails->save($newEntity);
                        $this->request->session()->write('KID_ID', $newEntity->id);
                        $this->request->session()->write('PROFILE', 'KIDS');
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

                    $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $data['pwd'], $sitename);

                    $this->Custom->sendEmail($to, $from, $subject, $message);
//email creation                      
                    $this->Flash->success(__('Account created successfully.'));

                    if ($gender == 'men') {
                        $userDetails['gender'] = '1';
                        return $this->redirect(HTTP_ROOT . 'welcome/style');
                    } elseif ($gender == 'women') {
                        $userDetails['gender'] = '2';
                        return $this->redirect(HTTP_ROOT . 'welcome/style');
                    } else {
                        $userDetails['gender'] = '3';
                        $gender = 'kids';
                        return $this->redirect(HTTP_ROOT . 'welcome/style');
                    }
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
        $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();

        if ($userDetails->user_detail->gender == '') {
            if ($this->request->session()->read('PROFILE') == '') {
//return $this->redirect(HTTP_ROOT . 'welcome/style');
            }
        } else {

            if ($this->request->session()->read('PROFILE') == '') {
                if ($userDetails->user_detail->gender == 1) {
                    $gen = "MEN";
                    $this->request->session()->write('PROFILE', $gen);
//return $this->redirect(HTTP_ROOT . 'welcome/style');
                }
                if ($Userdetails->gender == 2) {
                    $gen = "WOMEN";
                    $this->request->session()->write('PROFILE', $gen);
// return $this->redirect(HTTP_ROOT . 'welcome/style');
                }
            }
        }

        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.is_save' => 1]);
        $progressbar_count = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();



        if ($slug == 'schedule') {
            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                    $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID')])->first();
                }
            }



            if ($this->request->session()->read('PROFILE') == 'MEN') {

                $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => 0])->first();
            }


            if ($this->request->session()->read('PROFILE') == 'WOMEN') {

                $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => 0])->first();
//                 pj($LetsPlanYourFirstFixData);exit;
            }
        }

        if ($slug == 'reservation') {
            $dataDate = $this->DeliverDate->find('all')->where(['DeliverDate.user_id' => $this->Auth->user('id')])->first();
            $date_in_delivary = @$dataDate->date_in_time;
            $this->set(compact('date_in_delivary'));
            if ($this->request->session()->read('PROFILE') == 'KIDS') {
                if (!empty($this->request->session()->read('KID_ID'))) {
                    $kidmenu = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
//PJ($kidmenu); exit;
                }
            }
        }
        if ($slug == 'addressbook') {
            if ($sections && $editid) {
                $ShippingAddress = $this->ShippingAddress->find('all')->where(['id' => $editid])->first();
            }

            $useraddress_datas = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);
            $addressCount = $useraddress_datas->count();

            $this->set(compact('date_in_delivary', 'useraddress_datas', 'ShippingAddress', 'addressCount'));
        }
        if ($slug == 'shipping') {
            if ($sections == "addresss") {
                $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $this->Auth->user('id')]);
                $this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $editid]);
                return $this->redirect(HTTP_ROOT . 'welcome/payment/');
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
                $kidname = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
                if (!empty($this->request->session()->read('KID_ID'))) {
//                     echo $slug;exit;
                    //echo $this->request->session()->read('KID_ID'); exit;
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
                    $KidStyles = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $this->request->session()->read('KID_ID')])->first();
                    $designe = $this->CustomDesine->find('all')->where(['kid_id' => $this->request->session()->read('KID_ID')])->first();
                    //pj(@$kidDetails->is_progressbar); exit;
                    $this->set(compact('designe', 'KidStyles', 'KID_AVOID_FABRIC', 'kids_pricing_shoping', 'kids_stores', 'kidmenu', 'KidsPrimaryValue', 'KidsPersonalityValue2', 'KidsPersonalityValue', 'KidsPersonalityValue1', 'KidsSizeFit', 'KidClothingType', 'kidDetails'));
                }
            }
//------------------Debendra 21-9-18--------------------------
            if ($this->request->session()->read('PROFILE') == 'MEN') {
                $MenStats = $this->MenStats->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $TypicallyWearMen = $this->TypicallyWearMen->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $MenFit = $this->MenFit->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $MenStyle = $this->MenStyle->find('all')->where(['MenStyle.user_id' => $this->Auth->user('id')])->first();
                $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $this->Auth->user('id')]);
                $menbrand = $MensBrands->extract('mens_brands')->toArray();

                $style_sphere_selections = $this->MenStyleSphereSelections->find('all')->where(['MenStyleSphereSelections.user_id' => $this->Auth->user('id')])->first();
                $menSccessories = $this->MenAccessories->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $menDesigne = $this->CustomDesine->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

                $this->set(compact('menDesigne', 'menSccessories', 'style_sphere_selections', 'menbrand', 'MenStyle', 'MensBrands', 'MenFit', 'TypicallyWearMen', 'MenStats', 'MenStyleSphereSelections'));
            }
//------------------Debendra 21-9-18--------------------------
            if ($this->request->session()->read('PROFILE') == 'WOMEN') {

                $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();

                $PersonalizedFix = $this->PersonalizedFix->find('all')->where(['PersonalizedFix.user_id' => $this->Auth->user('id')])->first();
                $SizeChart = $this->SizeChart->find('all')->where(['SizeChart.user_id' => $this->Auth->user('id')])->first();

                $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $this->Auth->user('id')])->first();

                $WomenJeansStyle = $this->WomenJeansStyle->find('all')->where(['WomenJeansStyle.user_id' => $this->Auth->user('id')])->first();


                $WomenJeansRise1 = $this->WomenJeansRise->find('all')->where(['WomenJeansRise.user_id' => $this->Auth->user('id')]);
                $WomenJeansRise = $WomenJeansRise1->extract('jeans_rise')->toArray();

                $WomenJeansLength1 = $this->WemenJeansLength->find('all')->where(['WemenJeansLength.user_id' => $this->Auth->user('id')]);
                $WomenJeansLength = $WomenJeansLength1->extract('jeans_length')->toArray();
                $Womenstyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $this->Auth->user('id')])->first();

                $Womenprice = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $this->Auth->user('id')])->first();
                $Womeninfo = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $this->Auth->user('id')])->first();
                $primaryinfo = explode(",", @$Womeninfo->primary_objectives);

                $womens_brands_plus_low_tier1 = $this->WomenTypicalPurchaseCloth->find('all')->where(['WomenTypicalPurchaseCloth.user_id' => $this->Auth->user('id')]);
                $womens_brands_plus_low_tier = $womens_brands_plus_low_tier1->extract('womens_brands_plus_low_tier')->toArray();

                $women_shoe_prefer = $this->WomenShoePrefer->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                $womenHeelHightPrefer = $this->WomenHeelHightPrefer->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                //pj($women_shoe_prefer->brands); exit;

                $style_wardrobe1 = $this->WomenIncorporateWardrobe->find('all')->where(['WomenIncorporateWardrobe.user_id' => $this->Auth->user('id')]);
                $style_wardrobe = $style_wardrobe1->extract('style_wardrobe')->toArray();


                $avoid_colors1 = $this->WomenColorAvoid->find('all')->where(['WomenColorAvoid.user_id' => $this->Auth->user('id')]);
                $avoid_colors = $avoid_colors1->extract('avoid_colors')->toArray();

                $avoid_prints1 = $this->WomenPrintsAvoid->find('all')->where(['WomenPrintsAvoid.user_id' => $this->Auth->user('id')]);
                $avoid_prints = $avoid_prints1->extract('avoid_prints')->toArray();


                $avoid_fabrics1 = $this->WomenFabricsAvoid->find('all')->where(['WomenFabricsAvoid.user_id' => $this->Auth->user('id')]);
                $WemenStyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $this->Auth->user('id')])->first();
                $avoid_fabrics = $avoid_fabrics1->extract('avoid_fabrics')->toArray();
                $style_sphere_selections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

                $MensBrands = $this->MensBrands->find('all')->where(['MensBrands.user_id' => $this->Auth->user('id')]);
                $menbrand = $MensBrands->extract('mens_brands')->toArray();
                $wemenDesigne = $this->CustomDesine->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                //pj($wemenDesigne); exit;

                $this->set(compact('menbrand', 'wemenDesigne', 'style_sphere_selections', 'WemenStyle', 'womenHeelHightPrefer', 'women_shoe_prefer', 'primaryinfo', 'Womeninfo', 'style_wardrobe', 'avoid_fabrics', 'avoid_prints', 'avoid_colors', 'womens_brands_plus_low_tier', 'WomenJeansStyle', 'Womenprice', 'Womenstyle', 'WomenRatherDownplay', 'WomenJeansLength', 'WomenJeansRise', 'FitCut', 'SizeChart'));
            }
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;

//------------------Debendra 21-9-18--------------------------
            if (@$data['first_time_fix'] == 'first_time_fix') {
                //pj($data); exit;

                if ($data['try_new_items_with_scheduled_fixes'] == '') {
                    $try_new_items_with_scheduled_fixes = 0;
                } else {
                    $try_new_items_with_scheduled_fixes = $data['try_new_items_with_scheduled_fixes'];
                }
                if ($data['how_often_would_you_lik_fixes'] == '') {
                    $how_often_would_you_lik_fixes = 0;
                } else {
                    $how_often_would_you_lik_fixes = $data['how_often_would_you_lik_fixes'];
                }


                $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();
                if (!empty($this->request->session()->read('KID_ID'))) {

                    $getdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.kid_id' => $this->request->session()->read('KID_ID'), 'LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->first();
                    if (@$getdata->kid_id) {
                        $data['id'] = $getdata->id;
                    } else {
                        $data['id'] = '';
                    }
                    $exitdata = 0;
                } else {
                    $exitdata = $this->LetsPlanYourFirstFix->find('all')->where(['LetsPlanYourFirstFix.user_id' => $this->Auth->user('id')])->count();
                }

                if ($exitdata >= 1) {
                    if (!empty($this->request->session()->read('KID_ID'))) {

                        $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes], ['kid_id' => $this->request->session()->read('KID_ID')]);
                    } else {
                        $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes], ['user_id' => $this->Auth->user('id')]);
                        $this->Flash->success(__('Updated successfully.'));
                    }
                } else {

                    $data['user_id'] = $this->Auth->user('id');
                    $data['kid_id'] = (@$this->request->session()->read('KID_ID')) ? @$this->request->session()->read('KID_ID') : 0;
                    $data['try_new_items_with_scheduled_fixes'] = $try_new_items_with_scheduled_fixes;
                    $data['how_often_would_you_lik_fixes'] = $how_often_would_you_lik_fixes;
                    $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
                    $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
//                    pj($LetsPlanYourFirstFix);exit;
                }
                $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
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
                $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
//return $this->redirect(HTTP_ROOT . 'welcome/shipping');
                return $this->redirect(HTTP_ROOT . 'welcome/addressbook');
            }
            if (@$data['deliverAddress'] == 'deliverAddress') {

                $shippingAddress = $this->ShippingAddress->newEntity();


                if ($data['id']) {
                    $this->ShippingAddress->updateAll([
                        'full_name' => $data['full_name'],
                        'address' => $data['address'],
                        'address_line_2' => $data['address_line_2'],
                        'city' => $data['city'],
                        'zipcode' => $data['zipcode'],
                        'country' => $data['country'],
                        'phone' => $data['phone'],
                        'state' => $data['state']
                            ], ['user_id' => $this->Auth->user('id'), 'id' => $editid]);

                    $this->Flash->success(__('Updated successfully.'));
                } else {

                    $countAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'default_set' => 1])->count();

                    $countAddressBilling = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'is_billing' => 1])->count();

                    if ($countAddress == 0) {
                        $data['default_set'] = 1;
                    } else {
                        $data['default_set'] = 0;
                    }
                    if ($countAddressBilling == 0) {
                        $data['is_billing'] = 1;
                    } else {
                        $data['is_billing'] = 0;
                    }


                    $data['id'] = '';
                    $data['user_id'] = $this->Auth->user('id');
                    $data['full_name'] = $data['full_name'];
                    $data['address'] = $data['address'];
                    $data['address_line_2'] = $data['address_line_2'];
                    $data['city'] = $data['city'];
                    $data['state'] = $data['state'];
                    $data['zipcode'] = $data['zipcode'];
                    $data['country'] = $data['country'];
                    $data['phone'] = $data['phone'];

                    $LetsPlanYourFirstFix = $this->ShippingAddress->patchEntity($shippingAddress, $data);
                    $this->ShippingAddress->save($shippingAddress);
                }
                $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
                return $this->redirect(HTTP_ROOT . 'welcome/payment');
            }


            if (@$data['card_payment'] == 'Add your card') {

                $countPaymentCount = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.use_card' => 1, 'PaymentCardDetails.user_id' => $this->Auth->user('id')])->count();
                if ($countPaymentCount == 0) {
                    $data['use_card'] = 1;
                } else {
                    $data['use_card'] = 0;
                }
                $newEntity = $this->PaymentCardDetails->newEntity();
                $data['user_id'] = $this->Auth->user('id');

                $data['is_save'] = 1;
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
                return $this->redirect(HTTP_ROOT . 'welcome/payment/');
            }

//kids code
//            if (@$data['style'] == 'style') {
//                $newEntity = $this->KidsDetails->newEntity();
//                if (!empty($this->request->session()->read('KID_ID'))) {
////$kidDetails=$this->KidsDetails->find('all')->where(['KidsDetails.id'=>$this->request->session()->read('KID_ID')])->first();
//                    $data['id'] = $this->request->session()->read('KID_ID');
//                } else {
//                    $data['id'] = '';
//                }
//                if ($data['kids_first_name'] == '') {
//                    $this->Flash->error(__('Please enter kids name.'));
//                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
//                }
//                if ($data['kids_relationship_to_child'] == '') {
//                    $this->Flash->error(__('Please enter kids relationship.'));
//                    return $this->redirect(HTTP_ROOT . 'welcome/style/section1');
//                }
//
//                $data['user_id'] = $this->Auth->user('id');
//                $data['kids_first_name'] = $data['kids_first_name'];
//                $data['kids_birthdate'] = $data['kids_birthdate'];
//                $data['kids_relationship_to_child'] = $data['kids_relationship_to_child'];
//                $data['kids_clothing_gender'] = $data['kids_clothing_gender'];
//                $data['kids_frequency_arts_and_crafts'] = $data['kids_frequency_arts_and_crafts'];
//                $data['kids_frequency_biking'] = $data['kids_frequency_biking'];
//                $data['kids_frequency_theatre'] = $data['kids_frequency_theatre'];
//                $data['kids_frequency_dance'] = $data['kids_frequency_dance'];
//                $data['kids_frequency_sports'] = $data['kids_frequency_sports'];
//                $data['kids_frequency_playing_outside'] = $data['kids_frequency_playing_outside'];
//                $data['kids_frequency_musical_instruments'] = $data['kids_frequency_musical_instruments'];
//                $data['kids_frequency_reading'] = $data['kids_frequency_reading'];
//                $data['kids_frequency_video_games'] = $data['kids_frequency_video_games'];
//                $newEntity = $this->KidsDetails->patchEntity($newEntity, $data);
//                $this->KidsDetails->save($newEntity);
//                $this->request->session()->write('KID_ID', $newEntity->id);
//                $this->KidsPersonality->deleteAll(['kid_id' => $this->request->session()->read('KID_ID')]);
//                $this->KidsPrimary->deleteAll(['kid_id' => $this->request->session()->read('KID_ID')]);
//                if (@$data['kids_personality_types']) {
//                    foreach (@$data['kids_personality_types'] as $kids_personality_types) {
//                        $newEntity1 = $this->KidsPersonality->newEntity();
//                        $data['id'] = '';
//                        $data['user_id'] = $this->Auth->user('id');
//                        $data['kid_id'] = $this->request->session()->read('KID_ID');
//                        $data['kids_personality_types'] = $kids_personality_types;
//                        $newEntity1 = $this->KidsPersonality->patchEntity($newEntity1, $data);
//                        $this->KidsPersonality->save($newEntity1);
//                    }
//                }
//
//                if (@$data['kids_primary_objectives']) {
//                    foreach (@$data['kids_primary_objectives'] as $kids_primary_objectives) {
//                        $newEntity2 = $this->KidsPrimary->newEntity();
//                        $data['id'] = '';
//                        $data['user_id'] = $this->Auth->user('id');
//                        $data['kid_id'] = $this->request->session()->read('KID_ID');
//                        $data['kids_primary_objectives'] = $kids_primary_objectives;
//                        $newEntity2 = $this->KidsPrimary->patchEntity($newEntity2, $data);
//                        $this->KidsPrimary->save($newEntity2);
//                    }
//                }
//
//                if ($newEntity->kids_relationship_to_child == 'father') {
//                    $gend = 1;
//                }
//                if ($newEntity->kids_relationship_to_child == 'mother') {
//                    $gend = 2;
//                }
//                if ($newEntity->kids_relationship_to_child == 'other') {
//                    $gend = 3;
//                }
//
//
////echo $gend;
//// exit;
//                $this->UserDetails->updateAll(['gender' => $gend], ['user_id' => $this->Auth->user('id')]);
//                $this->KidsDetails->updateAll(['is_redirect' => '1', 'is_progressbar' => 20], ['id' => $this->request->session()->read('KID_ID')]);
//
//                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_PROFILE_START'])->first();
//                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
//                $to = $this->Auth->user('email');
//                $kid_name = $data['kids_first_name'];
//                $from = $fromMail->value;
//                $name = $this->Auth->user('name');
//                $subject = $emailMessage->display;
//                $sitename = SITE_NAME;
//                $email_message = $this->Custom->kidProfileStart($emailMessage->value, $name, $kid_name, $sitename);
//
//                $this->Custom->sendEmail($to, $from, $subject, $email_message);
//                return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
//            }
//            if (@$data['fit'] == 'fit') {
//// pj($data);exit;
//                $newEntity = $this->KidsSizeFit->newEntity();
//                if (!empty($this->request->session()->read('KID_ID'))) {
//                    $kidDetails = $this->KidsSizeFit->find('all')->where(['KidsSizeFit.kid_id' => $this->request->session()->read('KID_ID')])->first();
//                    if ($kidDetails->id) {
//                        $data['id'] = $kidDetails->id;
//                    }
//                } else {
//                    $data['id'] = '';
//                }
//                if ($data['top_size'] == '') {
//                    $this->Flash->error(__('Please enter top size.'));
//                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
//                }
//                if ($data['tell_ft'] == 'NULL') {
//                    $this->Flash->error(__('Please enter height in feet.'));
//                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
//                }
//                if ($data['tell_inch'] == 'NULL') {
//// echo 'hello';exit;
//                    $this->Flash->error(__('Please enter height in inch.'));
//                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
//                }
//                if ($data['kids_weight'] == '') {
//                    $this->Flash->error(__('Please enter weight.'));
//                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
//                }
//                if ($data['bottom_size'] == '') {
//                    $this->Flash->error(__('Please enter bottom size.'));
//                    return $this->redirect(HTTP_ROOT . 'welcome/style/section2');
//                } else {
//                    $data['user_id'] = $this->Auth->user('id');
//                    $data['kid_id'] = $this->request->session()->read('KID_ID');
//                    $data['tell_ft'] = $data['tell_ft'];
//                    $data['tell_inch'] = $data['tell_inch'];
//                    $data['kids_weight'] = $data['kids_weight'];
//                    $data['bottom_size'] = $data['bottom_size'];
//                    $data['top_size'] = $data['top_size'];
//                    $data['shoe_size'] = $data['shoe_size'];
//                    $data['kids_fit_challenge_shirt_sleeve_length'] = $data['kids_fit_challenge_shirt_sleeve_length'];
//                    $data['kids_fit_challenge_shirt_torso_length'] = $data['kids_fit_challenge_shirt_torso_length'];
//                    $data['body_shape'] = $data['body_shape'];
//                    $data['kids_fit_challenge_pant_leg_length'] = $data['kids_fit_challenge_pant_leg_length'];
//                    $data['kids_fit_challenge_pant_waist'] = $data['kids_fit_challenge_pant_waist'];
//                    $data['kids_fit_challenge_shirt_torso_width'] = $data['kids_fit_challenge_shirt_torso_width'];
////pj($data);exit;
//                    $newEntity = $this->KidsSizeFit->patchEntity($newEntity, $data);
//                    $this->KidsSizeFit->save($newEntity);
//// $this->request->session()->write('KID_ID', $newEntity->id);
//                    $this->KidsDetails->updateAll(['is_redirect' => '1', 'is_progressbar' => 40], ['id' => $this->request->session()->read('KID_ID')]);
//                    return $this->redirect(HTTP_ROOT . 'welcome/style/section3');
//                }
//            }
//            if (@$data['kidclothing'] == 'kidclothing') {
////  pj($data);exit;
//                $newEntity = $this->KidClothingType->newEntity();
//                if (!empty($this->request->session()->read('KID_ID'))) {
//                    $kidDetails = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $this->request->session()->read('KID_ID')])->first();
//                    if (isset($kidDetails->id)) {
//                        $data['id'] = $kidDetails->id;
//                    } else {
//                        $data['id'] = '';
//                    }
//
//
//                    $data['user_id'] = $this->Auth->user('id');
//                    $data['kid_id'] = $this->request->session()->read('KID_ID');
//                    $data['kids_tees_frequency'] = $data['kids_tees_frequency'];
//                    $data['kids_sweatshirts_frequency'] = $data['kids_sweatshirts_frequency'];
//                    $data['kids_polos_frequency'] = $data['kids_polos_frequency'];
//                    $data['kids_sweaters_frequency'] = $data['kids_sweaters_frequency'];
//                    $data['kids_shorts_frequency'] = $data['kids_shorts_frequency'];
//                    $data['kids_shoes_frequency'] = $data['kids_shoes_frequency'];
//                    $data['kids_school_uniform'] = $data['kids_school_uniform'];
//                    $data['kids_trousers_and_chinos_frequency'] = $data['kids_trousers_and_chinos_frequency'];
//                    $newEntity = $this->KidClothingType->patchEntity($newEntity, $data);
//                    $this->KidClothingType->save($newEntity);
//// $this->request->session()->write('KID_ID', $newEntity->id);
//// $this->KidClothingType->deleteAll(['kid_id' => $newEntity->id]);
//                    $this->FabricsOrEmbellishments->deleteAll(['kid_id' => $this->request->session()->read('KID_ID')]);
//// pj($data);exit;
//                    if (@$data['kids_avoid_fabric']) {
//                        foreach (@$data['kids_avoid_fabric'] as $fabrics_or_embellishments) {
//                            $newEntity1 = $this->FabricsOrEmbellishments->newEntity();
//                            $data['id'] = '';
//                            $data['user_id'] = $this->Auth->user('id');
//                            $data['kid_id'] = $this->request->session()->read('KID_ID');
//                            $data['kids_avoid_fabric'] = $fabrics_or_embellishments;
//                            $newEntity1 = $this->FabricsOrEmbellishments->patchEntity($newEntity1, $data);
//                            $this->FabricsOrEmbellishments->save($newEntity1);
//                        }
//                    }
//                    $this->KidsDetails->updateAll(['is_redirect' => '1', 'is_progressbar' => 60], ['id' => $this->request->session()->read('KID_ID')]);
//                    return $this->redirect(HTTP_ROOT . 'welcome/style/section4');
//                }
//            }
//            if (@$data['kidstyle'] == 'kidstyle') {
////  pj($data);exit;
//                $newEntity = $this->KidStyles->newEntity();
//                if (!empty($this->request->session()->read('KID_ID'))) {
//                    $kidDetails = $this->KidStyles->find('all')->where(['KidStyles.kid_id' => $this->request->session()->read('KID_ID')])->first();
//                    if (isset($kidDetails->id)) {
//                        $data['id'] = $kidDetails->id;
//                    } else {
//                        $data['id'] = '';
//                    }
//
//
//                    $data['user_id'] = $this->Auth->user('id');
//                    $data['kid_id'] = $this->request->session()->read('KID_ID');
//                    $data['send_graphic_tshirts'] = $data['send_graphic_tshirts'];
//                    $data['kids_older_boy_sporty_v3'] = $data['kids_older_boy_sporty_v3'];
//                    $data['kids_older_boy_cali_cool_v3'] = $data['kids_older_boy_cali_cool_v3'];
//                    $data['kids_older_boy_gender_neutral_v1'] = $data['kids_older_boy_gender_neutral_v1'];
//                    $data['kids_older_boy_versatile_v1'] = $data['kids_older_boy_versatile_v1'];
//                    $data['kids_older_boy_everyday_prep_v4'] = $data['kids_older_boy_everyday_prep_v4'];
//                    $data['kids_older_boy_sporty_v1'] = $data['kids_older_boy_sporty_v1'];
//                    $data['kids_older_boy_everyday_prep_v3'] = $data['kids_older_boy_everyday_prep_v3'];
//                    $data['kids_older_boy_versatile_v3'] = $data['kids_older_boy_versatile_v3'];
//                    $data['kids_older_boy_everyday_prep_v1'] = $data['kids_older_boy_everyday_prep_v1'];
//                    $data['kids_older_boy_everyday_prep_v2'] = $data['kids_older_boy_everyday_prep_v2'];
//                    $data['kids_older_boy_sporty_v4'] = $data['kids_older_boy_sporty_v4'];
//                    $data['kids_older_boy_street_style_v1'] = $data['kids_older_boy_street_style_v1'];
//                    $data['kids_older_boy_sporty_v2'] = $data['kids_older_boy_sporty_v2'];
//                    $data['kids_older_boy_cali_cool_v1'] = $data['kids_older_boy_cali_cool_v1'];
//                    $data['kids_older_boy_versatile_v2'] = $data['kids_older_boy_versatile_v2'];
//                    $data['colors_affinity_avoid_red'] = $data['colors_affinity_avoid_red'];
//                    $data['colors_affinity_avoid_orange'] = $data['colors_affinity_avoid_orange'];
//                    $data['colors_affinity_avoid_yellow'] = $data['colors_affinity_avoid_yellow'];
//                    $data['colors_affinity_avoid_green'] = $data['colors_affinity_avoid_green'];
//                    $data['colors_affinity_avoid_blue'] = $data['colors_affinity_avoid_blue'];
//                    $data['colors_affinity_avoid_purple'] = $data['colors_affinity_avoid_purple'];
//                    $data['colors_affinity_avoid_pink'] = $data['colors_affinity_avoid_pink'];
//                    $data['colors_affinity_avoid_black'] = $data['colors_affinity_avoid_black'];
//                    $data['colors_affinity_avoid_white'] = $data['colors_affinity_avoid_white'];
//                    $data['colors_affinity_avoid_grey'] = $data['colors_affinity_avoid_grey'];
//                    $data['colors_affinity_avoid_brown'] = $data['colors_affinity_avoid_brown'];
//                    $data['kids_boy_prints_affinity_stripes'] = $data['kids_boy_prints_affinity_stripes'];
//                    $data['kids_boy_prints_affinity_plaid'] = $data['kids_boy_prints_affinity_plaid'];
//                    $data['kids_boy_prints_affinity_gingham'] = $data['kids_boy_prints_affinity_gingham'];
//                    $data['kids_boy_prints_affinity_polka_dots'] = $data['kids_boy_prints_affinity_polka_dots'];
//                    $data['kids_boy_prints_affinity_camo'] = $data['kids_boy_prints_affinity_camo'];
//                    $data['kids_boy_prints_affinity_novelty'] = $data['kids_boy_prints_affinity_novelty'];
//                    $data['send_graphic_tshirts'] = $data['send_graphic_tshirts'];
//                    $newEntity = $this->KidStyles->patchEntity($newEntity, $data);
//                    $this->KidStyles->save($newEntity);
//// $this->request->session()->write('KID_ID', $newEntity->id);
//// $this->KidStyles->deleteAll(['kid_id' => $newEntity->id]);
//// $this->KidStyles->deleteAll(['kid_id' => $newEntity->id]);
//                    $this->KidsDetails->updateAll(['is_redirect' => '1', 'is_progressbar' => 80], ['id' => $this->request->session()->read('KID_ID')]);
//                    return $this->redirect(HTTP_ROOT . 'welcome/style/section5');
//                }
//            }
//            if (@$data['section5'] == 'section5') {
////  pj($data);exit;
//                $newEntity = $this->KidsPricingShoping->newEntity();
//                if (!empty($this->request->session()->read('KID_ID'))) {
//                    $kidDetails = $this->KidsPricingShoping->find('all')->where(['KidsPricingShoping.kid_id' => $this->request->session()->read('KID_ID')])->first();
//                    if (isset($kidDetails->id)) {
//                        $data['id'] = $kidDetails->id;
//                    } else {
//                        $data['id'] = '';
//                    }
//
//
//                    $data['user_id'] = $this->Auth->user('id');
//                    $data['kid_id'] = $this->request->session()->read('KID_ID');
//                    $data['kids_boys_spendiness_casual_shirts'] = $data['kids_boys_spendiness_casual_shirts'];
//                    $data['kids_boys_spendiness_button_downs'] = $data['kids_boys_spendiness_button_downs'];
//                    $data['kids_boys_spendiness_sweater_and_sweatshirts'] = $data['kids_boys_spendiness_sweater_and_sweatshirts'];
//                    $data['kids_boys_spendiness_casual_bottoms'] = $data['kids_boys_spendiness_casual_bottoms'];
//                    $data['kids_boys_spendiness_shorts'] = $data['kids_boys_spendiness_shorts'];
//                    $data['kids_boys_spendiness_pants_and_jeans'] = $data['kids_boys_spendiness_pants_and_jeans'];
//                    $data['kids_boys_spendiness_jackets_and_coats'] = $data['kids_boys_spendiness_jackets_and_coats'];
//                    $data['kids_boys_spendiness_shoes'] = $data['kids_boys_spendiness_shoes'];
//                    $data['kids_would_splurge_for_item'] = $data['kids_would_splurge_for_item'];
//                    $data['pinterest'] = $data['pinterest'];
//                    $data['profile_note'] = $data['profile_note'];
//                    $newEntity = $this->KidsPricingShoping->patchEntity($newEntity, $data);
//                    $this->KidsPricingShoping->save($newEntity);
//                    $this->KidPurchaseClothing->deleteAll(['kid_id' => $this->request->session()->read('KID_ID')]);
//                    $kidName = $this->KidsDetails->find('all')->where(['KidsDetails.id' => $this->request->session()->read('KID_ID')])->first();
//                    if (@$data['kids_stores']) {
//                        foreach (@$data['kids_stores'] as $kids_stores) {
//                            $newEntity1 = $this->KidPurchaseClothing->newEntity();
//                            $data['id'] = '';
//                            $data['user_id'] = $this->Auth->user('id');
//                            $data['kid_id'] = $this->request->session()->read('KID_ID');
//                            $data['kids_stores'] = $kids_stores;
//                            $newEntity1 = $this->KidPurchaseClothing->patchEntity($newEntity1, $data);
//                            $this->KidPurchaseClothing->save($newEntity1);
//                        }
//                    }
//
//// pj($data);exit;
//
//                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'KIDS_PROFILE_COMPLETE'])->first();
//                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
//                    $to = $this->Auth->user('email');
//                    $kid_name = $kidName->kids_first_name;
//                    $from = $fromMail->value;
//                    $subject = $emailMessage->display;
//                    $sitename = SITE_NAME;
//                    $email_message = $this->Custom->kidProfileStart($emailMessage->value, $name, $kid_name, $sitename);
//
//                    $this->Custom->sendEmail($to, $from, $subject, $email_message);
//                    $this->KidsDetails->updateAll(['is_redirect' => '1', 'is_progressbar' => 100], ['id' => $this->request->session()->read('KID_ID')]);
//
//                    return $this->redirect(HTTP_ROOT . 'welcome/schedule');
//                }
//            }
//            if (@$data['fitcut'] == 'fitcut') {
//                $FitCut = $this->FitCut->find('all')->where(['FitCut.user_id' => $this->Auth->user('id')])->first();
//                $fitcut = $this->FitCut->newEntity();
//                if (isset($FitCut->user_id) && !empty($FitCut->user_id)) {
//                    $table['id'] = $FitCut->id;
//                } else {
//                    $table['id'] = '';
//                }
//                $table['user_id'] = $this->Auth->user('id');
//                $table['fit_top'] = $data['fit_top'];
//                $table['plus_tops_fit_waist_opening_v2'] = $data['plus_tops_fit_waist_opening_v2'];
//                $table['plus_tops_fit_length'] = $data['plus_tops_fit_length'];
//                $table['fit_bottom'] = $data['plus_bottoms_fit'];
//                $table['too_big_hip_and_thigh'] = $data['too_big_hip_and_thigh'];
//// $table['plus_bottoms_fit'] = $data['plus_bottoms_fit'];
//                $table['flaunt_arms'] = $data['flaunt_arms'];
//                $table['flaunt_shoulders'] = $data['flaunt_shoulders'];
//                $table['flaunt_back'] = $data['flaunt_back'];
//                $table['flaunt_cleavage'] = $data['flaunt_cleavage'];
//                $table['flaunt_midsection'] = $data['flaunt_midsection'];
//                $table['flaunt_rear'] = $data['flaunt_rear'];
//                $table['flaunt_legs'] = $data['flaunt_legs'];
//
//                $fitcut = $this->FitCut->patchEntity($fitcut, $table);
//                $this->FitCut->save($fitcut);
//
//                $this->WemenJeansLength->deleteAll(['user_id' => $this->Auth->user('id')]);
//                $this->WomenJeansStyle->deleteAll(['user_id' => $this->Auth->user('id')]);
//                $this->WomenJeansRise->deleteAll(['user_id' => $this->Auth->user('id')]);
//                if (@$data['jeans_style']) {
//                    foreach (@$data['jeans_style'] as $jeans_style) {
//                        $newEntity1 = $this->WomenJeansStyle->newEntity();
//                        $data['id'] = '';
//                        $data['user_id'] = $this->Auth->user('id');
//                        $data['jeans_style'] = $jeans_style;
//                        $newEntity1 = $this->WomenJeansStyle->patchEntity($newEntity1, $data);
//                        $this->WomenJeansStyle->save($newEntity1);
//                    }
//                }
//
//                if (@$data['jeans_rise']) {
//                    foreach (@$data['jeans_rise'] as $jeans_rise) {
//                        $newEntity2 = $this->WomenJeansRise->newEntity();
//                        $data['id'] = '';
//                        $data['user_id'] = $this->Auth->user('id');
//                        $data['jeans_rise'] = $jeans_rise;
//                        $newEntity2 = $this->WomenJeansRise->patchEntity($newEntity2, $data);
//                        $this->WomenJeansRise->save($newEntity2);
//                    }
//                }
//                if (@$data['jeans_length']) {
//                    foreach (@$data['jeans_length'] as $jeans_length) {
//                        $newEntity3 = $this->WemenJeansLength->newEntity();
//                        $data['id'] = '';
//                        $data['user_id'] = $this->Auth->user('id');
//                        $data['jeans_length'] = $jeans_length;
//                        $newEntity3 = $this->WemenJeansLength->patchEntity($newEntity3, $data);
//                        $this->WemenJeansLength->save($newEntity3);
//                    }
//                }
//                $this->UserDetails->updateAll(['is_progressbar' => 55], ['user_id' => $this->Auth->user('id')]);
//                return $this->redirect(HTTP_ROOT . 'welcome/style/section3');
//            }
//            if (@$data['wemonstyle'] == 'wemonstyle') {
////                pj($data);exit;  
//                $womanStyle = $this->WomenStyle->find('all')->where(['WomenStyle.user_id' => $this->Auth->user('id')])->first();
//                $style = $this->WomenStyle->newEntity();
//                if (isset($womanStyle->user_id) && !empty($womanStyle->user_id)) {
//                    $table['id'] = $womanStyle->id;
//                } else {
//                    $table['id'] = '';
//                }
//
//                $table['user_id'] = $this->Auth->user('id');
//                $table['rating_preppy'] = $data['rating_preppy'];
//                $table['rating_romantic'] = $data['rating_romantic'];
//                $table['rating_casual'] = $data['rating_casual'];
//                $table['rating_edgy'] = $data['rating_edgy'];
//                $table['rating_boho'] = $data['rating_boho'];
//// $table['piercings'] = $data['piercings'];
//                $table['rating_glam'] = $data['rating_glam'];
//                $table['rating_classic'] = $data['rating_classic'];
//                $table['occasion_work_casual'] = $data['occasion_work_casual'];
//                $table['occasion_special_event'] = $data['occasion_special_event'];
//                $table['occasion_casual'] = $data['occasion_casual'];
//                $table['occasion_night_out'] = $data['occasion_night_out'];
//                $table['desired_work_casual'] = $data['desired_work_casual'];
//                $table['desired_special_event'] = $data['desired_special_event'];
//                $table['desired_casual'] = $data['desired_casual'];
//                $table['desired_date_night'] = $data['desired_date_night'];
//                $table['jeans_frequency'] = $data['jeans_frequency'];
//                $table['distressed_denim_non'] = $data['distressed_denim_non'];
//                $table['distressed_denim_minimally'] = $data['distressed_denim_minimally'];
//                $table['distressed_denim_fairly'] = $data['distressed_denim_fairly'];
//                $table['distressed_denim_heavily'] = $data['distressed_denim_heavily'];
//                $table['adventure'] = $data['adventure'];
//                $table['style_accessories'] = $data['style_accessories'];
//                $table['jewelry_tone'] = $data['jewelry_tone'];
//                $table['piercings'] = $data['piercings'];
//                $table['apparel_affinity_avoid_tops'] = $data['apparel_affinity_avoid_tops'];
//                $table['apparel_affinity_avoid_blazers'] = $data['apparel_affinity_avoid_blazers'];
//                $table['apparel_affinity_avoid_jackets_coats'] = $data['apparel_affinity_avoid_jackets_coats'];
//                $table['apparel_affinity_avoid_shorts'] = $data['apparel_affinity_avoid_shorts'];
//// apparel_type_affinity_avoid_skirts
//                $table['apparel_type_affinity_avoid_skirts'] = $data['apparel_type_affinity_avoid_skirts'];
//                $table['apparel_affinity_avoid_pants'] = $data['apparel_affinity_avoid_pants'];
//                $table['apparel_affinity_avoid_dresses'] = $data['accessory_affinity_avoid_bags'];
//                $table['accessory_affinity_avoid_bags'] = $data['accessory_affinity_avoid_bags'];
//                $table['accessory_affinity_avoid_scarves'] = $data['accessory_affinity_avoid_scarves'];
//                $table['accessory_affinity_avoid_earrings'] = $data['accessory_affinity_avoid_earrings'];
//                $table['accessory_affinity_avoid_necklaces'] = $data['accessory_affinity_avoid_necklaces'];
//                $table['accessory_affinity_avoid_bracelets'] = $data['accessory_affinity_avoid_bracelets'];
//                $table['accessory_affinity_avoid_shoes'] = $data['accessory_affinity_avoid_shoes'];
//                $table['shoes_affinity_avoid_heels'] = $data['shoes_affinity_avoid_heels'];
//                $table['shoes_affinity_avoid_wedges'] = $data['shoes_affinity_avoid_wedges'];
//                $table['shoes_affinity_avoid_booties'] = $data['shoes_affinity_avoid_booties'];
//                $table['shoes_affinity_avoid_flats'] = $data['shoes_affinity_avoid_flats'];
//                $table['shoes_affinity_avoid_sandals'] = $data['shoes_affinity_avoid_sandals'];
//                $table['shoes_affinity_avoid_fashion_sneakers'] = $data['shoes_affinity_avoid_fashion_sneakers'];
//                $style = $this->WomenStyle->patchEntity($style, $table);
//                $this->WomenStyle->save($style);
//
//                if (@$data['womens_brands_plus_low_tier']) {
//                    foreach (@$data['womens_brands_plus_low_tier'] as $womens_brands_plus_low_tier) {
//                        $newEntity1 = $this->WomenTypicalPurchaseCloth->newEntity();
//                        $data['id'] = '';
//                        $data['user_id'] = $this->Auth->user('id');
//                        $data['womens_brands_plus_low_tier'] = $womens_brands_plus_low_tier;
//                        $newEntity1 = $this->WomenTypicalPurchaseCloth->patchEntity($newEntity1, $data);
//                        $this->WomenTypicalPurchaseCloth->save($newEntity1);
//                    }
//                }
//
//                if (@$data['style_wardrobe']) {
////                     pj($style_wardrobe);exit;
//                    foreach (@$data['style_wardrobe'] as $style_wardrobe) {
//                        $newEntity2 = $this->WomenIncorporateWardrobe->newEntity();
//                        $data['id'] = '';
//                        $data['user_id'] = $this->Auth->user('id');
//                        $data['style_wardrobe'] = $style_wardrobe;
//                        $newEntity2 = $this->WomenIncorporateWardrobe->patchEntity($newEntity2, $data);
//                        $this->WomenIncorporateWardrobe->save($newEntity2);
//                    }
//                }
//                if (@$data['avoid_colors']) {
//                    foreach (@$data['avoid_colors'] as $avoid_colors) {
//                        $newEntity3 = $this->WomenColorAvoid->newEntity();
//                        $data['id'] = '';
//                        $data['user_id'] = $this->Auth->user('id');
//                        $data['avoid_colors'] = $avoid_colors;
//                        $newEntity3 = $this->WomenColorAvoid->patchEntity($newEntity3, $data);
//                        $this->WomenColorAvoid->save($newEntity3);
//                    }
//                }
//
//                if (@$data['avoid_prints']) {
//                    foreach (@$data['avoid_prints'] as $avoid_prints) {
//                        $newEntity4 = $this->WomenPrintsAvoid->newEntity();
//                        $data['id'] = '';
//                        $data['user_id'] = $this->Auth->user('id');
//                        $data['avoid_prints'] = $avoid_prints;
//                        $newEntity4 = $this->WomenPrintsAvoid->patchEntity($newEntity4, $data);
//                        $this->WomenPrintsAvoid->save($newEntity4);
//                    }
//                }
//
//                if (@$data['avoid_fabrics']) {
//                    foreach (@$data['avoid_fabrics'] as $avoid_fabrics) {
//                        $newEntity5 = $this->WomenFabricsAvoid->newEntity();
//                        $data['id'] = '';
//                        $data['user_id'] = $this->Auth->user('id');
//                        $data['avoid_fabrics'] = $avoid_fabrics;
//                        $newEntity5 = $this->WomenFabricsAvoid->patchEntity($newEntity5, $data);
//                        $this->WomenFabricsAvoid->save($newEntity5);
//                    }
//                }
//                $this->UserDetails->updateAll(['is_progressbar' => 60], ['user_id' => $this->Auth->user('id')]);
//                return $this->redirect(HTTP_ROOT . 'welcome/style/section4');
//            }
//            if (@$data['price'] == 'price') {
//                $exitdata = $this->WomenPrice->find('all')->where(['WomenPrice.user_id' => $this->Auth->user('id')])->first();
//                $price = $this->WomenPrice->newEntity();
//                if (isset($exitdata->user_id) && !empty($exitdata->user_id)) {
//                    $table['id'] = $exitdata->id;
//                } else {
//                    $table['id'] = '';
//                }
//                $table['user_id'] = $this->Auth->user('id');
//                $table['spendiness_accessories'] = $data['spendiness_accessories'];
//                $table['spendiness_bottoms'] = $data['spendiness_bottoms'];
//                $table['spendiness_dresses'] = $data['spendiness_dresses'];
//                $table['spendiness_jewelry'] = $data['spendiness_jewelry'];
//                $table['spendiness_tops'] = $data['spendiness_tops'];
//                $table['spendiness_outerwear'] = $data['spendiness_outerwear'];
//                $table['spendiness_shoes'] = $data['spendiness_shoes'];
//                $price = $this->WomenPrice->patchEntity($price, $table);
//                $this->WomenPrice->save($price);
//                $this->UserDetails->updateAll(['is_progressbar' => 65], ['user_id' => $this->Auth->user('id')]);
//                $this->Flash->success(__('Inserted successfully.'));
//                return $this->redirect(HTTP_ROOT . 'welcome/style/section5');
//            }
//            if (@$data['info'] == 'info') {
//                $info1 = $this->WomenInformation->find('all')->where(['WomenInformation.user_id' => $this->Auth->user('id')])->first();
//                if (isset($info1->user_id) && !empty($info1->user_id)) {
//                    $table['id'] = $info1->id;
//                } else {
//                    $table['id'] = '';
//                }
//                $checkbox1 = $data['primary_objectives'];
//                $chk = "";
//                foreach ($checkbox1 as $chk1) {
//                    $chk .= $chk1 . ",";
//                }
//                $info = $this->WomenInformation->newEntity();
//                $table['user_id'] = $this->Auth->user('id');
//                $table['user_input_birthdate'] = $data['user_input_birthdate'];
//                $table['occupation_v2'] = $data['occupation_v2'];
//                $table['parent'] = $data['parent'];
//                $table['primary_objectives'] = $chk;
//                $table['final_thoughts'] = $data['final_thoughts'];
//                $info = $this->WomenInformation->patchEntity($info, $table);
//                $this->WomenInformation->save($info);
//                $this->Users->updateAll(['is_redirect' => '1'], ['id' => $this->Auth->user('id')]);
//                $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $this->Auth->user('id')]);
//                $this->Flash->success(__('Inserted successfully.'));
//                return $this->redirect(HTTP_ROOT . 'welcome/schedule');
////                }
//            }
        }


        $progressbar_count = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $profileName = $this->Auth->user('name');
        $this->set(compact('profileName', 'savecard', 'kidname', 'progressbar_count', 'total', 'KidStyles2', 'PersonalizedFix', 'sections', 'kidmenu', 'KidsPrimaryValue', 'KidsPersonalityValue', 'LetsPlanYourFirstFixData', 'slug', 'userDetails', 'ShippingAddress', 'kidDetails', 'MenStats', 'TypicallyWearMen', 'MenFit', 'SizeChart', 'FitCut', 'useraddress_datas'));
    }

    public function clients($slug = null) {
        $client_id = G_CLINT_ID; //Put your client Id
        $client_secret = G_SITE_KEY; //Put your gmail secret
        $redirect_uri = G_R_U; //Put your callback URL
        $max_results = 16500; //set the Maximum result you want to fetch



        if (empty($slug)) {
            return $this->redirect(HTTP_ROOT . 'welcome/kids');
        }

        if (@$slug == 'kids') {
            $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->count();
            if ($kidcount >= 4) {
                $this->Flash->error(__('Oops! Currently, we can only support 4 kids per family account.'));
                return $this->redirect(HTTP_ROOT . 'welcome/schedule');
            } else {
                $countChild = $kidcount + 1;
                $newEntity = $this->KidsDetails->newEntity();
                $data['user_id'] = $this->Auth->user('id');
//$data['kids_first_name'] = 'CHILD' . $countChild;
                $data['kids_first_name'] = '';
                $data['kid_count'] = $countChild;
                $data['kids_birthdate'] = '';
                $data['kids_relationship_to_child'] = '';
                $data['kids_clothing_gender'] = '';
                $data['kids_frequency_arts_and_crafts'] = '';
                $data['kids_frequency_biking'] = '';
                $data['kids_frequency_theatre'] = '';
                $data['kids_frequency_dance'] = '';
                $data['kids_frequency_sports'] = '';
                $data['kids_frequency_playing_outside'] = '';
                $data['kids_frequency_musical_instruments'] = '';
                $data['kids_frequency_reading'] = '';
                $data['kids_frequency_video_games'] = '';
//pj($data);exit;
                $newEntity = $this->KidsDetails->patchEntity($newEntity, $data);
                $this->KidsDetails->save($newEntity);
                $this->request->session()->write('KID_ID', $newEntity->id);
                $this->request->session()->write('PROFILE', 'KIDS');
                return $this->redirect(HTTP_ROOT . 'welcome/style');
            }
        }

        if (@$slug == 'gmail') {
            $auth_code = '';

            if (isset($_GET["code"])) {
                $auth_code = $_GET["code"];

                function getContent($url) {
                    $curl = curl_init();

//The URL to fetch.
                    curl_setopt($curl, CURLOPT_URL, $url);

//TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

//The number of seconds to wait while trying to connect.You can use 0 to wait indefinitely.
                    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);

//Set the contents of "User-Agent: " which will used in a HTTP request.
                    $userAgent = $_SERVER["HTTP_USER_AGENT"];
                    curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);

//Set this TRUE To follow any "Location: " header that the server sends as part of the HTTP header.
                    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);

//To automatically set the Referer: field in requests where it follows a Location: redirect.
                    curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);

//The maximum number of seconds to allow cURL functions to execute.
                    curl_setopt($curl, CURLOPT_TIMEOUT, 10);

//Set this false to stop cURL from verifying the peer's certificate.
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                    $contents = curl_exec($curl);
                    curl_close($curl);
                    return $contents;
                }

                $fields = array(
                    'code' => urlencode($auth_code),
                    'client_id' => urlencode($client_id),
                    'client_secret' => urlencode($client_secret),
                    'redirect_uri' => urlencode($redirect_uri),
                    'grant_type' => urlencode('authorization_code')
                );
                $post = '';
                foreach ($fields as $key => $value) {
                    $post .= $key . '=' . $value . '&';
                }
                $post = rtrim($post, '&');

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');
                curl_setopt($curl, CURLOPT_POST, 5);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                $result = curl_exec($curl);
                curl_close($curl);

                $response = json_decode($result);
                $accesstoken = @$response->access_token;

                $url = 'https://www.google.com/m8/feeds/contacts/default/full?&alt=json&max-results=' . $max_results . '&oauth_token=' . $accesstoken;
                $xmlresponse = getContent($url);

                if ((strlen(stristr($xmlresponse, 'Authorization required')) > 0) && (strlen(stristr($xmlresponse, 'Error ')) > 0)) {
                    echo "There is some error.Try reloading the page.";
                    exit();
                }
            }
        }




        $credit_balance = $this->UserUsesPromocode->find('all')->Select(['Total_promo_price' => 'SUM(UserUsesPromocode.price)'])->where(['UserUsesPromocode.user_id' => $this->Auth->user('id')])->first();
        $reference = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $isemail_preferences = $this->Users->find('all')->where(['Users.id' => $this->Auth->user('id')])->first();





        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            if (@$data['add_kids'] == 'add_kids') {
                $kidcount = $this->KidsDetails->find('all')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->count();
// $kidname=$this->KidsDetails->find('kids_first_name')->where(['KidsDetails.user_id' => $this->Auth->user('id')])->first();
                if ($kidcount >= 5) {
                    $this->Flash->error(__('Oops! Currently, we can only support 4 kids per family account.'));
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

                    $exitdataCout = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.default_set' => 1])->count();
                    if ($exitdataCout == 0) {
                        $data['default_set'] = 1;
                    } else {
                        $data['default_set'] = 0;
                    }
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
                    if ($this->request->session()->read('KID_ID')) {
                        $data['kid_id'] = $this->request->session()->read('KID_ID');
                    } else {
                        $data['kid_id'] = 0;
                    }
                } elseif ($this->request->session()->read('PROFILE') == 'MEN') {
                    $profile_type = 1;
                    $data['kid_id'] = 0;
                } elseif ($this->request->session()->read('PROFILE') == 'WOMEN') {
                    $profile_type = 2;
                    $data['kid_id'] = 0;
                }


                $data['user_id'] = $this->Auth->user('id');
                $data['price'] = $data['price'];
                $data['card_name'] = $data['card_name'];
                $data['card_number'] = $data['card_number'];
                $data['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];
                $data['status'] = 0;
                $data['profile_type'] = $profile_type;
//                echo $profile_type;exit;
                $data['created_dt'] = date('Y-m-d H:i:s');

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

        $this->set(compact('xmlresponse', 'isemail_preferences', 'kidname', 'LetsPlanYourFirstFixData', 'slug', 'userDetails', 'ShippingAddress', 'user_id', 'credit_balance', 'reference', 'client_id', 'client_secret', 'redirect_uri', 'max_results'));
    }

    public function userProfile($id = null) {
        $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $Usersdata = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $id])->first();
        $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $id])->first();

        if ($Userdetails->gender == 1) {
            $gen = "MEN";
        }
        if ($Userdetails->gender == 2) {
            $gen = "WOMEN";
        }


        $this->request->session()->write('KID_ID', '');
        $this->request->session()->write('PROFILE', $gen);
        if ($Usersdata->is_redirect == 0 && $Userdetails->is_progressbar != 100) {
            $url = 'welcome/style/';
        } elseif ($Usersdata->is_redirect == 0 && $Userdetails->is_progressbar == 100) {
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





        return $this->redirect(HTTP_ROOT . $url);
    }

    public function kidProfile($id = null) {
        $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $id])->first();
        if ($getUsersDetails->is_redirect == 6) {


            return $this->redirect(HTTP_ROOT . 'customer-order-review');
        }
//$this->Notifications->updateAll(['is_read' => 1], ['kid_id' => $id]);
        $this->request->session()->write('KID_ID', $id);
        $this->request->session()->write('PROFILE', 'KIDS');

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
        }





        return $this->redirect(HTTP_ROOT . $url);
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
            $data['kid_id'] = $this->request->session()->read('KID_ID');
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'PaymentGetways.kid_id' => $this->request->session()->read('KID_ID'), 'user_id' => $this->Auth->user('id')])->count();
        } elseif ($this->request->session()->read('PROFILE') == 'MEN') {
            $data['kid_id'] = 0;
            $profile_type = 1;
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'user_id' => $this->Auth->user('id')])->count();
        } elseif ($this->request->session()->read('PROFILE') == 'WOMEN') {
            $data['kid_id'] = 0;
            $profile_type = 2;
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.payment_type' => 1, 'PaymentGetways.status' => 1, 'PaymentGetways.profile_type' => $profile_type, 'user_id' => $this->Auth->user('id')])->count();
        }

        $data['user_id'] = $this->Auth->user('id');
        $data['price'] = $data['payableAmount'];
        $data['profile_type'] = $profile_type;
        $data['status'] = 0;

        $data['created_dt'] = date('Y-m-d H:i:s');
        $data['count'] = $paymentCount + 1;
        $newEntity = $this->PaymentGetways->patchEntity($newEntity, $data);
//pj($data); exit;
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
        } else if (@$message['status'] == '1') {
//check for any invite request has been created 
            $getId = $this->Auth->user('id');
            $count = $this->ReferFriends->find('all')->where(['ReferFriends.my_link_with_uniq_no' => $this->request->getCookie('refer_time'), 'ReferFriends.reffer_id' => $getId, 'ReferFriends.paid_status' => 0])->count();




            if ($count >= 1) {

                $getFriends = $this->Settings->find('all')->where(['Settings.name' => 'inviteFrinds'])->first();
                $walletsEn = $this->Wallets->newEntity();
                $walletsEn->user_id = $this->Auth->user('id');
                $walletsEn->type = 2;
                $walletsEn->balance = $getFriends->value;
                $walletsEn->created = date('Y-m-d h:i:s');
                $walletsEn->applay_status = 0;

                if ($this->Wallets->save($walletsEn)) {
                    $getDetails = $this->ReferFriends->find('all')->where(['ReferFriends.my_link_with_uniq_no' => $this->request->getCookie('refer_time'), 'ReferFriends.reffer_id' => $getId, 'ReferFriends.paid_status' => 0])->first();
                    $walletsEnRE = $this->Wallets->newEntity();
                    $walletsEnRE->user_id = $getDetails->user_id;
                    $walletsEnRE->type = 2;
                    $walletsEnRE->balance = $getFriends->value;
                    $walletsEnRE->created = date('Y-m-d h:i:s');
                    $walletsEn->applay_status = 0;
                    $this->Wallets->save($walletsEnRE);
                    $this->ReferFriends->updateAll(['paid_status' => 1], ['my_link_with_uniq_no' => $this->request->getCookie('refer_time')]);
                }
            }

            echo json_encode($message);
            $this->paymentMailSending($message);
        } else {
            $message['error'] = 'error';
            echo json_encode($message);
        }

        exit;
    }

    public function paymentMailSending($message = null) {
        $updateId = $this->request->session()->read('PYMID');
        $this->PaymentGetways->updateAll(['status' => 1, 'payment_type' => 1], ['id' => $updateId]);
        $paymentDetails = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId])->first();
        $checkUser = $this->PaymentGetways->find('all')->where(['PaymentGetways.id' => $updateId, 'PaymentGetways.payment_type' => 1])->first();
        if ($checkUser->payment_type == 1) {
            if ($this->request->session()->read('PROFILE') == 'KIDS') {

                @$kidId = $this->request->session()->read('KID_ID');
                $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => @$kidId]);
                $kid_id = $this->request->session()->read('KID_ID');
            } else {
                $kid_id = 0;
                $this->Users->updateAll(['is_redirect' => 2], ['id' => $this->Auth->user('id')]);
            }
        }



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






        $subjectProfile = $emailMessageProfile->display;
        $email_message_profile = $this->Custom->paymentEmailCount($emailMessageProfile->value, $name, $usermessage, $sitename, $paymentCount);


        $this->Custom->sendEmail($to, $from, $subjectProfile, $email_message_profile);



        //message to Admin support
        $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
        $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);
        $this->Custom->sendEmail($toSupport, $from, $subjectProfile, $email_message_profile);






        exit;
    }

    public function paymentSuccess() {
        
    }

    public function setAccount($slg = null) {

        $this->viewBuilder()->layout('default');
        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => @$this->request->session()->read('KID_ID')])->first();
        } else {
            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();
        }

        if ($getUsersDetails->is_redirect == 6) {

            return $this->redirect(HTTP_ROOT . 'customer-order-review');
        }

        $userComplete = $this->UserDetails->find('all')->where(['UserDetails.is_progressbar' => 100, 'UserDetails.user_id' => $this->Auth->user('id')])->first();
        if ($userComplete->is_progressbar == 100) {

            $credit_balance = $this->UserUsesPromocode->find('all')->Select(['Total_promo_price' => 'SUM(UserUsesPromocode.price)'])->where(['UserUsesPromocode.user_id' => $this->Auth->user('id')])->first();

            $ship_address = $this->ShippingAddress->find('all')->where(['user_id' => $this->Auth->user('id'), 'ShippingAddress.default_set' => 1])->first();
            $ShippingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);
            $bill_address = $this->PaymentCardDetails->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $user_details = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();

            $EmailPreference = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $this->Auth->user('id'), 'EmailPreferences.kid_id' => 0])->first();

            $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.is_save' => 1]);


            $LetsPlanYourFirstFixData = $this->LetsPlanYourFirstFix->find('all')->where(['kid_id' => 0, 'user_id' => $this->Auth->user('id')])->first();


            $this->set(compact('LetsPlanYourFirstFixData', 'savecard', 'user_details', 'PersonalizedFix', 'SizeChart', 'ship_address', 'credit_balance', 'bill_address', 'ShippingAddress', 'EmailPreference', 'slg'));
        } else {
            $this->Flash->error(__('Please complete your profile first'));
            return $this->redirect(HTTP_ROOT . 'welcome/style');
        }
    }

    public function ajaxShippingAddress() {
        $this->viewBuilder()->layout('ajax');
// echo $this->request->session()->read('Auth.User.id'); exit;
        if ($this->request->session()->read('Auth.User.id') == '') {
            echo json_encode(['status' => 'login', 'msg' => 'already logged in']);
            exit();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $countAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $this->Auth->user('id')])->count();
            $shippingAddress = $this->ShippingAddress->newEntity();

            if ($data) {

                if ($countAddress == 0) {
                    $data['default_set'] = 1;
                } else {
                    $data['default_set'] = 0;
                }

                if (@$data['id']) {
                    $data['id'] = $data['id'];
                } else {
                    $data['id'] = '';
                }



                $data['user_id'] = $this->Auth->user('id');
                $data['full_name'] = $data['full_name'];
                $data['address'] = $data['address'];
                $data['address_line_2'] = $data['address_line_2'];
                $data['city'] = $data['city'];
                $data['state'] = $data['state'];
                $data['phone'] = $data['phone'];
                $data['country'] = $data['country'];
                $shippingAddress = $this->ShippingAddress->patchEntity($shippingAddress, $data);
                $this->ShippingAddress->save($shippingAddress);
                if (@$data['id']) {
                    echo json_encode(['status' => 'success', 'msg' => '<p style="color:green;">Address Update success fully</p>']);
                } else {
                    echo json_encode(['status' => 'success', 'msg' => '<p style="color:green;">Address add success fully</p>']);
                }

                exit();
            } else {
                echo json_encode(['status' => 'error', 'msg' => '<p style="color:red;">Some things is error, try again<p>']);
                exit();
            }
        }
    }

    public function getAllAddress() {
        $this->viewBuilder()->layout('ajax');
        $ShippingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);
        $this->set(compact('ShippingAddress'));
    }

    public function ajaxChangeAddress() {
        $this->viewBuilder()->layout('ajax');
        $shippingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);
        $this->set(compact('shippingAddress'));
    }

    public function getPaymentDetails() {
        $this->viewBuilder()->layout('ajax');
        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.is_save' => 1]);
        $billingddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.default_set' => 1])->first();


        $this->set(compact('savecard', 'billingddress'));
    }

    public function ajaxCardSave() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if ($data['card_number']) {
                $newEntity = $this->PaymentCardDetails->newEntity();
                $checkData = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.use_card' => 1])->count();

                if ($checkData == 0) {
                    $data['use_card'] = 1;
                } else {
                    $data['use_card'] = 0;
                }

                if (@$data['id']) {
                    $data['id'] = $data['id'];
                } else {
                    $data['id'] = '';
                }
                $data['user_id'] = $this->Auth->user('id');
                $data['is_save'] = 1;
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
                echo "hi";
                exit;
            }
        }
    }

    public function ajaxCardSaveEdit() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $newEntity = $this->PaymentCardDetails->newEntity();
                if (@$data['id']) {
                    $id = $data['id'];
                    $expires = @$data['expiry_year'] . '-' . @$data['expiry_month'];
                    $this->PaymentCardDetails->updateAll(['card_name' => $data['name_card'], 'card_expire' => $expires], ['PaymentCardDetails.id.id' => $id]);
                }

                echo "hi";
                exit;
            }
        }
    }

    public function getAddressDelete($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($id) {
            $this->ShippingAddress->deleteAll(['id' => $id]);

            echo "hi";
        }
        exit;
    }

    public function getPaymentDelete($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($id) {
            $this->PaymentCardDetails->deleteAll(['id' => $id]);

            echo "hi";
        }
        exit;
    }

    public function getEditPayment($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($id) {
            $card = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.id' => $id])->first();

            $masked = str_pad(substr($card->card_number, -4), strlen($card->card_number), ' ', STR_PAD_LEFT);
//echo $card->card_type;
            if ($card->card_type == 'Visa') {
                $img = 'visa.png';
            } elseif ($card->card_type == 'MasterCard') {
                $img = 'master.png';
            } elseif ($card->card_type == 'Maestro') {
                $img = 'maestro.png';
            } elseif ($card->card_type == 'Discover') {
                $img = 'discover.png';
            } elseif ($card->card_type == 'Amex') {
                $img = 'american.png';
            } elseif ($card->card_type == 'jcb') {
                $img = 'jcb.png';
            }

            $divp = '<img src="' . HTTP_ROOT . 'images/' . $img . '" > <span><strong> ' . $card->card_type . ' </strong> endding with ' . $masked . ' </span>';
            $billingddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.default_set' => 1])->first();
            $baddress = '<p>' . @$billingddress->full_name . '</p>
                <p>' . @$billingddress->address . '</p>
                <p>' . @$billingddress->address_line_2 . '</p>
                <p>' . @$billingddress->city . '</p>
                <p>' . @$billingddress->state . '</p>
                <p>' . @$billingddress->zipcode . '</p>
                <p>' . @$billingddress->country . '</p>
                <p>' . @$billingddress->phone . '</p>';
            $cardEx = explode('-', @$card->card_expire);
            $month = $cardEx[1];
            $year = $cardEx[0];
            echo json_encode(['data' => @$card, 'divp' => @$divp, 'bilingAddres' => @$baddress, 'month' => @$month, 'year' => @$year]);
        }
        exit;
    }

    public function genderUpdate($id = null) {
        if ($this->request->is('post')) {
            $data = $this->request->data;
// print_r($data);exit;
// pj($data);exit;
            if (@$data['selectservice']) {
                if (@$data['selectservice'] == 'men') {
                    $gender = 1;
                    $gen = "MEN";
                } else {
                    $gender = 2;
                    $gen = "WOMEN";
                }

                $this->request->session()->write('PROFILE', $gen);

                $getUser = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
                $exitData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->count();
                if ($exitData >= 1) {

                    $this->UserDetails->updateAll(['gender' => $gender], ['user_id' => $this->Auth->user('id')]);
                } else {

                    $userd = $this->UserDetails->newEntity();
                    $data['id'] = '';
                    $data['user_id'] = $this->Auth->user('id');
                    $data['gender'] = $gender;
                    $data['first_name'] = $getUser->name;
                    $userd = $this->UserDetails->patchEntity($userd, $data);
                    $x = $this->UserDetails->save($userd);
                }
            }
            return $this->redirect(HTTP_ROOT . 'welcome/style');
        }
    }

    public function getSetDefault($id = null) {
        if ($id) {
            $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $this->Auth->user('id')]);
            $this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $id]);
            $billingddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.default_set' => 1])->first();
            $baddress = '<p>' . @$billingddress->full_name . '</p>
                <p>' . @$billingddress->address . '</p>
                <p>' . @$billingddress->address_line_2 . '</p>
                <p>' . @$billingddress->city . '</p>
                <p>' . @$billingddress->state . '</p>
                <p>' . @$billingddress->zipcode . '</p>
                <p>' . @$billingddress->country . '</p>
                <p>' . @$billingddress->phone . '</p>';

            echo json_encode(['bilingAddres' => @$baddress]);
            exit;
        }
        exit;
    }

    public function getEditAddress($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($id) {
            $address = $this->ShippingAddress->find('all')->where(['ShippingAddress.id' => $id])->first();
            echo json_encode($address);
        }
        exit;
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
            $shipaddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->first();
            $ship = $this->ShippingAddress->newEntity();
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
            echo json_encode(array('status' => 'errordd', 'msg' => ''));
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
        $getUsersDetails = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
        if ($getUsersDetails->is_redirect == 6) {

            return $this->redirect(HTTP_ROOT . 'customer-order-review');
        }
        $this->request->session()->write('KID_ID', '');
        $this->request->session()->write('PROFILE', 'KIDS');
        return $this->redirect(HTTP_ROOT . 'welcome/style');
        exit;
    }

    public function orderReview() {
        if (@$this->request->session()->read('PROFILE') == 'KIDS') {

            @$paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;

            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => @$this->request->session()->read('KID_ID')])->first();
            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            $productData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => @$this->request->session()->read('KID_ID'), 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $productcount = $this->Products->find('all')->where(['Products.kid_id' => @$this->request->session()->read('KID_ID'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId])->count();
            $cname = $getUsersDetails->kids_first_name;
        } else {

            @$paymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$this->Auth->user('id'), 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;

            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();
            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $productData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
// pj($productData);exti;

            $productcount = $this->Products->find('all')->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId])->count();
            $cname = $getUsersDetails->name;
        }


        if ($getUsersDetails->is_redirect == 2) {
            $this->Flash->success(__('Keep wait product yet not shipped'));
            return $this->redirect(HTTP_ROOT . 'not-yet-shipped');
        }

        $this->Products->updateAll(['customer_purchasedate' => '0000-00-00'], ['payment_id' => $paymentId]);


        if ($this->request->is('post')) {
            $data = $this->request->data;
            $productcount = $data['productCount'];

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
                    @$table['customer_purchasedate'] = date('Y-m-d');
                    @$table['customer_purchase_status'] = 'Y';
                    @$table['return_status'] = 'N';
                    @$table['exchange_status'] = 'N';
                    $table['keep_status'] = 3;
                }

                if (@$data['what_do_you_think_of_the_product' . $x] == 2) {
                    @$table['exchange_status'] = 'Y';
                    @$table['customer_purchase_status'] = 'N';
                    @$table['return_status'] = 'N';
                    @$table['customer_purchasedate'] = '';
                    $table['keep_status'] = 2;
                }
                if (@$data['what_do_you_think_of_the_product' . $x] == 1) {
                    @$table['product_valid_return_date'] = date('Y-m-d h:i:s');
                    @$table['return_status'] = 'Y';
                    @$table['customer_purchase_status'] = 'N';
                    @$table['exchange_status'] = 'N';
                    @$table['customer_purchasedate'] = '';
                    $table['keep_status'] = 1;
                }
//                pj($table);exit;
                $Products = $this->Products->patchEntity($Products, $table);
                $this->Products->save($Products);
// echo "<pre>";
// print_r(@$table);
// echo "<pre>";
// echo "<br>";
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
            if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                $this->KidsDetails->updateAll(['is_redirect' => 6], ['id' => @$this->request->session()->read('KID_ID')]);
            } else {
                $this->Users->updateAll(['is_redirect' => 6], ['id' => $this->Auth->user('id')]);
            }

            return $this->redirect(HTTP_ROOT . 'customer-order-review');
        }

        $cname = $this->set(compact('productData', 'cname', 'productcount'));
    }

    public function customerOrderReview() {
        if (@$this->request->session()->read('PROFILE') == 'KIDS') {

            $this->request->session()->read('KID_ID');
            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => @$this->request->session()->read('KID_ID')])->first();
            @$paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;



            $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
            $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => @$this->request->session()->read('KID_ID'), 'Products.kid_id !=' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $kidcount = $prData->count();
            $cname = $getUsersDetails->kids_first_name;
        } else {
            $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
            $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();
            $paymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$this->Auth->user('id'), 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;

            $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
            $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            $cname = $getUsersDetails->name;
        }


        if ($getUsersDetails->is_redirect == 2) {
            $this->Flash->success(__('Keep wait product yet not shipped'));
            return $this->redirect(HTTP_ROOT . 'not-yet-shipped');
        }


        $userData = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
        $getWalltesCredit = $this->Wallets->find('all')->where(['Wallets.user_id' => $this->request->session()->read('Auth.User.id'), 'Wallets.type' => 2, 'Wallets.applay_status' => 0])->sumOf('balance');
        $getWalltesDebit = $this->Wallets->find('all')->where(['Wallets.user_id' => $this->request->session()->read('Auth.User.id'), 'Wallets.type' => 1, 'Wallets.applay_status' => 0])->sumOf('balance');
        $walletBalace = $getWalltesCredit - $getWalltesDebit;

//pj($kid_data); exit;
#######################
        if ($paymentId) {
            $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();
            $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 3])->Count();

            if (@$exCountKeeps != 0) {
                if (@$productCount == @$exCountKeeps) {
                    $allKeepsProducts = 1;
                    $percentage = 25;
                } else {
                    $allKeepsProducts = 2;
                    $percentage = 0;
                }
            }
        }

#########################


        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$this->request->session()->read('PROFILE') == 'KIDS') {

                $this->Notifications->updateAll(['is_read' => 1], ['kid_id' => @$this->request->session()->read('KID_ID')]);
                $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => @$this->request->session()->read('KID_ID')])->first();
                $paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;

                $this->Products->belongsTo('KidsDetails', ['className' => 'KidsDetails', 'foreignKey' => 'kid_id']);
                $prData = $this->Products->find('all')->contain(['KidsDetails'])->where(['Products.kid_id' => @$this->request->session()->read('KID_ID'), 'Products.kid_id !=' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
                $kidcount = $prData->count();
            } else {
                $this->Notifications->updateAll(['is_read' => 1], ['user_id' => $this->Auth->user('id'), 'kid_id' => 0]);
                $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
                $getUsersDetails = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();
                $paymentId = $this->PaymentGetways->find('all')->where(['user_id' => @$this->Auth->user('id'), 'kid_id' => 0, 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;

                $this->Products->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
                $prData = $this->Products->find('all')->contain(['Users'])->where(['Products.user_id' => $this->Auth->user('id'), 'Products.kid_id =' => 0, 'Products.checkedout' => 'N', 'Products.payment_id' => $paymentId]);
            }




            $payment_data = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.use_card' => 1])->first();

            $payment_address = $this->ShippingAddress->find('all')->where(['ShippingAddress.default_set' => 1, 'ShippingAddress.user_id' => $this->Auth->user('id')])->first();

            // pj($data);
            //exit;
            // all debit value is 0
            if (@$data['total'] == 0) {
                $message['status'] = 1;
            } else {

                if (@$data['walletCheck'] == 1) {
                    $paymentGetwayAmount = $data['stotal'] + $data['promoprice'] + $data['wallet'];
                } else {
                    $paymentGetwayAmount = $data['stotal'] + $data['promoprice'];
                }



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
                    'amount' => $paymentGetwayAmount,
                    'invice' => @$lastPyment->id,
                    'refId' => 32,
                    'companyName' => 'Drapefit',
                ];


                $message = $this->authorizeCreditCard($arr_user_info);
            }


            if ($message['status'] == '1') {


                if (@$data['promoprice'] != '') {
                    $walletsEnRE = $this->Wallets->newEntity();
                    $walletsEnRE->user_id = $this->request->session()->read('Auth.User.id');
                    $walletsEnRE->type = 2; //credit
                    $walletsEnRE->balance = $data['promoprice'];
                    $walletsEnRE->created = date('Y-m-d h:i:s');
                    $walletsEnRE->applay_status = 0;
                    $this->Wallets->save($walletsEnRE);
                }
                if (@$data['promoprice'] != '') {
                    if (@$data['walletCheck'] == 1) {
                        $price = $data['promoprice'] + $data['wallet'];
                    } else {
                        $price = $data['promoprice'];
                    }

                    if (@$data['stotal'] <= $price) {
                        //echo "hji";
                        // echo $data['stotal'];
                        $remening = $data['stotal'];
                    } else {
                        //echo "dfd";
                        $remening = $price;
                    }


                    $walletsd = $this->Wallets->newEntity();
                    $walletsd->user_id = $this->request->session()->read('Auth.User.id');
                    $walletsd->type = 1; //debit
                    $walletsd->balance = $remening;
                    $walletsd->created = date('Y-m-d h:i:s');
                    $walletsd->applay_status = 0;
                    $this->Wallets->save($walletsd);
                }




                $aprice = $data['wallet'] - $data['promoprice'];
                if ($data['stotal'] > $aprice) {
                    $price = $data['stotal'] - $aprice;
                } else {
                    $price = 0;
                }

                $getUsesPromocode = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID']]);
                $getUsesPromocodeExit = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID']])->first();


                if ($getUsesPromocodeExit->id != '') {
                    foreach ($getUsesPromocode as $promo) {
                        $UserUsesPromocode = $this->UserUsesPromocode->newEntity();
                        $UserUsesPromocode->user_id = $this->request->session()->read('Auth.User.id');
                        $UserUsesPromocode->promocode = $promo->code;
                        $UserUsesPromocode->apply_dt = date('Y-m-d h:i:s');
                        $UserUsesPromocode->price = $promo->price;
                        $this->UserUsesPromocode->save($UserUsesPromocode);
                    }
                    $this->UserAppliedCodeOrderReview->deleteAll(['payment_id' => $data['paymentID']]);
                }






                $payment = $this->Payments->newEntity();
                $table['user_id'] = $this->Auth->user('id');
                $table['payment_id'] = $data['paymentID'];
                $table['sub_toal'] = $data['stotal'];
                ;
                $table['tax'] = 0.00;
                $table['tax_price'] = 0;
                $table['total_price'] = $price;
                $table['paid_status'] = 1;
                $table['created_dt'] = date('Y-m-d H:i:s');
                $table['product_ids'] = @implode(',', @$product_ids);
                $table['wallet_balance'] = $data['wallet'];
                $table['promo_balance'] = $data['promoprice'];
                $payment = $this->Payments->patchEntity($payment, $table);
                $lastPyment = $this->Payments->save($payment);
                $i = 1;
                $productData = '';

                foreach ($prData as $dataMail) {
                    if ($dataMail->keep_status == 3) {
                        $priceMail = $dataMail->sell_price;
                        $this->Products->updateAll(['is_complete' => '1'], ['id' => $dataMail->id]);
                    } else {
                        $priceMail = 0;
                    }

                    if ($dataMail->keep_status == 3) {
                        $this->Products->updateAll(['is_complete' => '1', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
                        $keep = 'Keeps';
                    } elseif ($dataMail->keep_status == 2) {
                        $keep = 'Exchange';
                        $this->Products->updateAll(['is_complete' => '0', 'is_exchange_pending' => 1], ['id' => $dataMail->id]);
                    } else if ($dataMail->keep_status == 1) {
                        $keep = 'Return';
                        $this->Products->updateAll(['is_complete' => '0', 'is_exchange_pending' => 0], ['id' => $dataMail->id]);
                    }

                    $productData .= "<tr>
                        <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               # " . $i . "
                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                              <img src='" . HTTP_ROOT . PRODUCT_IMAGES . $dataMail->product_image . "' width='85'/>
                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               " . $dataMail->product_name_one . "
                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               " . $dataMail->product_name_two . "
                            </td>
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                                " . $keep . "
                            </td> 
                            
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               " . $dataMail->size . "
                            </td>                  
                                                       
                            <td style='padding: 10px 10px;font-size: 13px;border-bottom: 1px solid #ccc;'>
                               $" . number_format($priceMail, 2) . "
                            </td>
                        </tr>";
                    $this->Products->updateAll(['checkedout' => 'Y'], ['id' => $dataMail->id]);

                    $i++;
                }


                if ($paymentId) {
                    $productCount = $this->Products->find('all')->where(['payment_id' => $paymentId, 'is_altnative_product' => 0])->Count();


                    $exCountKeeps = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'keep_status' => 3])->Count();
                    $exCountretun = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status' => 1])->Count();
                    $exCountexchange = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status ' => 2, 'is_complete' => 0])->Count();
                    $exCountreturn = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status IN' => [1, 2, 3], 'is_complete' => 1])->Count();

                    $lastCount = $this->Products->find('all')->where(['Products.payment_id' => $paymentId, 'Products.keep_status IN' => [1, 2, 3], 'is_complete' => 1, 'is_altnative_product' => 0])->Count();

                    if (@$productCount == $lastCount) {

                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                        }

                        $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
                        // echo $paymentId; exit;
                    }

                    if (@$productCount == @$exCountKeeps) {

                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                        }

                        $this->PaymentGetways->updateAll(['work_status' => 2], ['id' => $paymentId]);
                    } else if (@$productCount == @$exCountretun) {

                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                        }
                        $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                    } else if (@$exCountexchange == @$productCount) {
                        echo "2";
                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 2], ['id' => $this->Auth->user('id')]);
                        }


                        $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => '0'], ['id' => $paymentId]);
                    } else if (@$exCountexchange >= 1) {

                        if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                            $this->KidsDetails->updateAll(['is_redirect' => 2], ['id' => $this->request->session()->read('KID_ID')]);
                        } else {
                            $this->Users->updateAll(['is_redirect' => 2], ['id' => $this->Auth->user('id')]);
                        }

                        $this->PaymentGetways->updateAll(['work_status' => 1, 'mail_status' => '0'], ['id' => $paymentId]);
                    } else if (@$exCountreturn >= 1) {

                        if (@$exCountreturn == @$productCount) {
                            if (@$this->request->session()->read('PROFILE') == 'KIDS') {
                                $this->KidsDetails->updateAll(['is_redirect' => 5], ['id' => $this->request->session()->read('KID_ID')]);
                            } else {
                                $this->Users->updateAll(['is_redirect' => 5], ['id' => $this->Auth->user('id')]);
                            }

                            $this->PaymentGetways->updateAll(['work_status' => 1], ['id' => $paymentId]);
                        }
                    }
                }




                $paymentG = $this->PaymentGetways->newEntity();
                $table1['user_id'] = $this->Auth->user('id');
                $table1['emp_id'] = 0;
                $table1['status'] = 1;
                $table1['price'] = $price;
                $table1['profile_type'] = 0;
                $table1['payment_type'] = 2;
                $table1['created_dt'] = date('Y-m-d H:i:s');
                $paymentG = $this->PaymentGetways->patchEntity($paymentG, $table1);
                $lastPymentg = $this->PaymentGetways->save($paymentG);

                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $to = $this->Auth->user('email');
                $name = $this->Auth->user('name');
                $from = $fromMail->value;
                $sitename = SITE_NAME;
                $emailMessage1 = $this->Settings->find('all')->where(['Settings.name' => 'ORDER_PAYMENT'])->first();
                $subject = $emailMessage1->display;
                $email_message = $this->Custom->order($emailMessage1->value, $name, $sitename, $productData, $total, $grand_price, $sales_tax);

                $this->Custom->sendEmail($to, $from, $subject, $email_message);

                //message to Admin support
                $toSupport = $this->Settings->find('all')->where(['name' => 'TO_HELP'])->first()->value;
                $this->Custom->sendEmail($toSupport, $from, $subject, $email_message);

                return $this->redirect(HTTP_ROOT . 'payment-success');
            } else {
                $this->Flash->error(__($message['ErrorCode']));
                return $this->redirect(HTTP_ROOT . 'customer-order-review');
            }
        }

        $this->set(compact('walletBalace', 'prData', 'userData', 'cname', 'allKeepsProducts', 'percentage'));
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

    public function notYetShipped() {

        if ($this->request->session()->read('PROFILE') == 'KIDS') {
            $paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;


            $paymentIdown = $this->PaymentGetways->find('all')->where(['kid_id' => @$this->request->session()->read('KID_ID'), 'payment_type' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;

            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
            if ($getUsersDetails->is_redirect == 4) {
                return $this->redirect(HTTP_ROOT . 'order_review');
            }

            $status = '';
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.kid_id' => $this->request->session()->read('KID_ID'), 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1])->count();
            if ($paymentCount == 1) {
                $status = "st";
            } elseif ($paymentCount == 2) {
                $status = "nd";
            } elseif ($paymentCount == 3) {
                $status = "rd";
            } else {
                $status = "th";
            }
        } else {
            $getUsersDetails = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
            @$paymentId = $this->PaymentGetways->find('all')->where(['kid_id' => 0, 'user_id' => $this->request->session()->read('Auth.User.id'), 'payment_type' => 1, 'mail_status' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;

            @$paymentIdown = $this->PaymentGetways->find('all')->where(['kid_id' => 0, 'user_id' => $this->Auth->user('id'), 'payment_type' => 1, 'work_status' => '1'])->order(['id' => 'DESC'])->first()->id;
            if ($getUsersDetails->is_redirect == 4) {

                return $this->redirect(HTTP_ROOT . 'order_review');
            }

            $status = '';
            $paymentCount = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $this->Auth->user('id'), 'PaymentGetways.status' => 1, 'kid_id' => 0, 'PaymentGetways.payment_type' => 1])->count();

            if ($paymentCount == 1) {
                $status = "st";
            } elseif ($paymentCount == 2) {
                $status = "nd";
            } elseif ($paymentCount == 3) {
                $status = "rd";
            } else {
                $status = "th";
            }
        }




        //echo $paymentIdown; 

        $getProductDetails = $this->Products->find('all')->where(['payment_id' => $paymentIdown, 'is_altnative_product' => 0, 'is_exchange_pending' => 1])->count();
        //echo $getProductDetails;

        if ($getProductDetails >= 1) {
            $procutsExchange = "Exchange";
        } else {
            $procutsExchange = "";
        }



        // echo $procutsExchange; exit;
        $this->set(compact('status', 'paymentCount', 'procutsExchange'));
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
            $getEmpoyeeId = $this->PaymentGetways->find('all')->where(['PaymentGetways.user_id' => $data['userId'], 'PaymentGetways.status' => 1, 'PaymentGetways.payment_type' => 1])->order(['PaymentGetways.id' => 'DESC'])->first();
            $reciverId = $getEmpoyeeId->emp_id;
        } else {
            $reciverId = $data['reciveId'];
        }
        $newEntity = $this->ChatMessages->newEntity();
        $data['id'] = '';
        $data['user_id'] = $data['userId'];
        $data['recive_id'] = $reciverId;
        $data['user_name'] = $data['userName'];
        $data['chat_message'] = $data['chat_message'];
        $data['chat_type'] = $data['chat_type'];
        $data['chat_date_time'] = date('Y-m-d h:i:s');
        $data['files'] = @$data['files'];

        $newEntity = $this->ChatMessages->patchEntity($newEntity, $data);
        if ($newEntity) {
            if ($this->ChatMessages->save($newEntity)) {
                
            }
        }
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
//$data = $this->request->input('json_decode', TRUE);
        $data = $this->request->data;
        $time = time();
//echo json_encode($data);
        if (!empty($data['photos']['name'])) {
// move_uploaded_file($data['file']['tmp_name'], CHAT_IMAGE.data['file']['name']);
            $imageName = move_uploaded_file($data['photos']['tmp_name'], 'files/chat_image/' . $time . $data['photos']['name']);
//$imageName = $this->Custom->uploadChatImage($data['file']['name'], CHAT_IMAGE);
        }
        echo json_encode(["imgurl" => HTTP_ROOT . 'files/chat_image/' . $time . $data['photos']['name'], "imgname" => $data['photos']['name']]);
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

    public function chatButtonBoxActive() {
        if ($this->request->session()->read('CHAT_BUTTON') == '') {
            $this->request->session()->write('CHAT_BUTTON', 'active');
        }
        echo json_encode(['status' => 'success']);
        exit;
//$this->redirect($this->referer());
    }

    public function chatButtonClose() {
        if ($this->request->session()->read('CHAT_BUTTON')) {
            $this->request->session()->write('CHAT_BUTTON', '');
        }
        echo json_encode(['status' => 'success']);
        exit;
    }

    public function websocketDivMinaus() {
        $data = $this->request->data;
        if ($data['value']) {
            $this->request->session()->write('MINUS', $data['value']);
        }
        echo json_encode('1');
        exit;
    }

    public function websocketDivMinausAdmin() {
        $data = $this->request->data;

        $this->request->session()->write('div' . $data['id'], $data['div']);

        echo json_encode('1');
        exit;
    }

    public function googlelogin() {
        $this->autoRender = false;

// require_once(ROOT . '/config/google_login.php');
        require_once(ROOT . '/vendor' . DS . 'Google/src/' . 'Google_Client.php');
        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $client->setApprovalPrompt('auto');
        $url = $client->createAuthUrl();

        $this->redirect($url);
    }

    public function googleLoginReturn() {
        $url = $_SERVER['REQUEST_URI'];
        $newUrl = str_replace('.profile', '.profilx', $url);
// echo (@$url!=@$newUrl);
        if (@$url != @$newUrl) {
            echo (@$url != @$newUrl);
            return $this->redirect(HTTP_ROOT . $newUrl);
        }

//echo $_GET['code']; exit;
        $this->autoRender = false;
        require_once(ROOT . '/config/google_login.php');

        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $client->setApprovalPrompt('auto');

        $plus = new Google_PlusService($client);
        $oauth2 = new Google_Oauth2Service($client);
        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']); // Authenticate
            $_SESSION['access_token'] = $client->getAccessToken(); // get the access token here
        }

        if (isset($_SESSION['access_token'])) {
            $client->setAccessToken($_SESSION['access_token']);
        }

        if ($client->getAccessToken()) {
            $_SESSION['access_token'] = $client->getAccessToken();
            $google_data = $oauth2->userinfo->get();
            $token = json_decode($client->getAccessToken())->access_token;
//pj($google_data);exit;
//echo $user['email'];
            try {
                if (!empty($google_data)) {
                    $result = $this->Users->find('all')->where(['email' => $google_data['email']])->count();

                    if ($result >= 1) {
                        $result_email = $this->Users->find('all')->where(['email' => $google_data['email']])->first();
                        session_destroy();
                        $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id']])->first()->toArray();

                        $get_login = $this->Auth->setUser($getLoginConfirmation);
                        $user_login_id = $this->Auth->user('id');
                        if ($user_login_id) {
                            $user = $this->Users->newEntity();
                            $user->last_login_ip = $this->Custom->get_ip_address();
                            $user->type = 2;
                            $user->last_login_date = date('Y-m-d H:i:s');
                            $user->id = $user_login_id;
                            $user->google_id = $google_data['id'];
                            $this->Users->save($user);
                            $this->Flash->success(__('Login successfull'));
                            if ($result_email['type'] == 2) {
                                $url = $this->Custom->loginRedirectAjax($user_login_id);
                                if ($result_email['type'] == 2) {
                                    $Userdetails = $this->UserDetails->find('all')->where(['user_id' => $user_login_id])->first();
                                    if ($Userdetails->gender == 1) {
                                        $gen = "MEN";
                                        $this->request->session()->write('PROFILE', $gen);
                                        return $this->redirect(HTTP_ROOT . $url);
                                    }
                                    if ($Userdetails->gender == 2) {
                                        $gen = "WOMEN";
                                        $this->request->session()->write('PROFILE', $gen);
                                        return $this->redirect(HTTP_ROOT . $url);
                                    } else {

                                        return $this->redirect(HTTP_ROOT . $url);
                                    }
                                }
                            }
                        } else {
                            $this->Flash->error(__('Login failed and you can register here also'));
                            return $this->redirect(HTTP_ROOT);
                        }
// }
                    } else {
                        $user = $this->Users->newEntity();
                        $user->email = $google_data['email'];
                        $user->first_name = $google_data['given_name'];
                        $user->last_name = $google_data['family_name'];
                        $user->google_id = $google_data['id'];
                        $user->profile_photo = $google_data['picture'];
                        $user->token = $token;
                        $user->unique_id = $this->Custom->generateUniqNumber();
                        $user->name = $user->first_name . " " . $user->last_name;
                        $user->created = date('Y-m-d H:i:s');
                        $user->last_login_date = date('Y-m-d H:i:s');
                        $user->is_active = 1;
                        $user->type = 2;
                        $user->reg_ip = $this->Custom->get_ip_address();
                        $user->last_login_ip = $this->Custom->get_ip_address();
                        if ($this->Users->save($user)) {
                            session_destroy();
                            $viewer_details = $this->UserDetails->newEntity();
                            $dataUser['user_id'] = $user->id;
                            $dataUser['first_name'] = $user->id;
                            $dataUser['last_name'] = $user->id;
                            $viewer_details = $this->UserDetails->patchEntity($viewer_details, $dataUser);
                            $this->UserDetails->save($viewer_details);
                            $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $user->id])->first()->toArray();
                            $get_login = $this->Auth->setUser($getLoginConfirmation);
                            $user_login_id = $this->Auth->user('id');
                            if ($user_login_id) {
                                $this->Flash->success(__('Login successfull and please edit your profile'));
                                return $this->redirect(HTTP_ROOT . 'welcome/style');
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
            } catch (Exception $e) {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT);
            }
        }

        exit;
    }

    public function ajaxSechduleFix() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        $count = $this->LetsPlanYourFirstFix->find('all')->where(['user_id' => $this->Auth->user('id'), 'kid_id' => 0])->count();
        if (@$data['try_new_items_with_scheduled_fixes'] == '') {
            $try_new_items_with_scheduled_fixes = 0;
        } else {
            $try_new_items_with_scheduled_fixes = $data['try_new_items_with_scheduled_fixes'];
        }
        if (@$data['how_often_would_you_lik_fixes'] == '') {
            $how_often_would_you_lik_fixes = 0;
        } else {
            $how_often_would_you_lik_fixes = $data['how_often_would_you_lik_fixes'];
        }




        if ($count >= 1) {
            $this->LetsPlanYourFirstFix->updateAll(['try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes], ['kid_id' => 0, 'user_id' => $this->Auth->user('id')]);
        } else {
            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();
            $data['user_id'] = $this->Auth->user('id');
            $data['kid_id'] = 0;
            $data['try_new_items_with_scheduled_fixes'] = $try_new_items_with_scheduled_fixes;
            $data['how_often_would_you_lik_fixes'] = $how_often_would_you_lik_fixes;
            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
            $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
        }
        echo json_encode(['msg' => 'Data save successfully']);
        exit;
    }

    public function ajaxSechduleFixKid() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        if ($data['try_new_items_with_scheduled_fixes'] == '') {
            $try_new_items_with_scheduled_fixes = 0;
        } else {
            $try_new_items_with_scheduled_fixes = $data['try_new_items_with_scheduled_fixes'];
        }

        if ($data['how_often_would_you_lik_fixes'] == '') {
            $how_often_would_you_lik_fixes = 0;
        } else {
            $how_often_would_you_lik_fixes = $data['how_often_would_you_lik_fixes'];
        }

        $chekData = $this->LetsPlanYourFirstFix->find('all')->where(['kid_id' => $data['kid_id']])->count();
        if ($chekData >= 1) {
            $chekeData = $this->LetsPlanYourFirstFix->find('all')->where(['kid_id' => $data['kid_id']])->first();
            $this->LetsPlanYourFirstFix->updateAll(['user_id' => $this->Auth->user('id'), 'kid_id' => $data['kid_id'], 'try_new_items_with_scheduled_fixes' => $try_new_items_with_scheduled_fixes, 'how_often_would_you_lik_fixes' => $how_often_would_you_lik_fixes], ['id' => $chekeData->id]);
        } else {
            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->newEntity();
            $data['user_id'] = $this->Auth->user('id');
            $data['kid_id'] = $data['kid_id'];
            $data['try_new_items_with_scheduled_fixes'] = $try_new_items_with_scheduled_fixes;
            $data['how_often_would_you_lik_fixes'] = $how_often_would_you_lik_fixes;
            $LetsPlanYourFirstFix = $this->LetsPlanYourFirstFix->patchEntity($LetsPlanYourFirstFix, $data);
            $this->LetsPlanYourFirstFix->save($LetsPlanYourFirstFix);
            pj($LetsPlanYourFirstFix);
            exit;
        }
        echo json_encode(['msg' => 'Data save successfully']);
        exit;
    }

    public function getPaymentCardDetails() {
        $this->viewBuilder()->setLayout('ajax');
        $savecard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id')]);
        $this->set(compact('savecard'));
    }

    public function ajaxUseThisCard() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        $this->PaymentCardDetails->updateAll(['use_card' => 0], ['user_id' => $this->Auth->user('id')]);
        $this->PaymentCardDetails->updateAll(['use_card' => 1], ['id' => $data['card_details']]);
        echo json_encode(['msg' => 'Data save successfully']);
        exit;
    }

    public function getCardSelect() {
        $this->viewBuilder()->setLayout('ajax');
        $useCard = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id'), 'PaymentCardDetails.use_card' => 1])->first();
        $this->set(compact('useCard'));
    }

    public function ajaxAddNwCard() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {

                $newEntity = $this->PaymentCardDetails->newEntity();
                if ($data['card_number']) {
                    $checkData = $this->PaymentCardDetails->find('all')->where(['PaymentCardDetails.user_id' => $this->Auth->user('id')])->count();
                    if ($checkData == 0) {
                        $data['use_card'] = 1;
                    } else {
                        $data['use_card'] = 0;
                    }
                    $data['user_id'] = $this->Auth->user('id');
                    $data['is_save'] = 1;
                    $data['card_name'] = $data['card_name'];
                    $data['card_type'] = $data['card_type'];
                    $data['card_number'] = $data['card_number'];
                    $data['card_expire'] = $data['expiry_year'] . '-' . $data['expiry_month'];
                    $data['cvv'] = $data['cvv'];
                    $newEntity = $this->PaymentCardDetails->patchEntity($newEntity, $data);
                    $this->PaymentCardDetails->save($newEntity);
                }
                echo json_encode('1');
                exit;
            }
        }
    }

    public function getBillingAddressDetails() {
        $this->viewBuilder()->setLayout('ajax');
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.is_billing' => 1])->first();
        $this->set(compact('billingAddress'));
    }

    public function getShippingAddressDetails() {
        $this->viewBuilder()->setLayout('ajax');
        $address = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id'), 'ShippingAddress.default_set' => 1])->first();
        $this->set(compact('address'));
    }

    public function getBillingAddressList() {
        $this->viewBuilder()->setLayout('ajax');
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);
        $this->set(compact('billingAddress'));
    }

    public function getShipAddressList() {
        $this->viewBuilder()->setLayout('ajax');
        $billingAddress = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')]);
        $this->set(compact('billingAddress'));
    }

    public function ajaxChangethisAddress() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
// $this->ShippingAddress->updateAll(['is_billing' => 0], ['user_id' => $this->Auth->user('id')]);
        $this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $data['is_billing']]);
        echo json_encode('1');
        exit;
    }

    public function ajaxChangeshipthisAddress() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        $this->ShippingAddress->updateAll(['default_set' => 0], ['user_id' => $this->Auth->user('id')]);
        $this->ShippingAddress->updateAll(['default_set' => 1], ['id' => $data['default_set']]);
        echo json_encode('1');
        exit;
    }

    public function ajaxChangeBillingAddress() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        $this->ShippingAddress->updateAll(['is_billing' => 0], ['user_id' => $this->Auth->user('id')]);
        $this->ShippingAddress->updateAll(['is_billing' => 1], ['id' => $data['is_billing']]);
        echo json_encode('1');
        exit;
    }

    public function ajaxLoginDetails() {
        $this->Users->hasOne('UserDetails', ['className' => 'UserDetails', 'foreignKey' => 'user_id']);
        $user_details = $this->Users->find('all')->contain(['UserDetails'])->where(['Users.id' => $this->Auth->user('id')])->first();

        $this->set(compact('user_details'));
    }

    public function ajaxEmailPreforme() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $newEntity = $this->EmailPreferences->newEntity();
                if ($data['kid_id']) {
                    $emailPreferencesCount = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $this->Auth->user('id'), 'EmailPreferences.kid_id' => $data['kid_id']])->count();
                    if ($emailPreferencesCount >= 1) {
                        $this->EmailPreferences->updateAll(['preferences' => $data['email_preferences']], ['kid_id' => $data['kid_id']]);
                    } else {

                        $data['user_id'] = $this->Auth->user('id');
                        $data['kid_id'] = $data['kid_id'];
                        $data['preferences'] = $data['email_preferences'];
                        $newEntity = $this->EmailPreferences->patchEntity($newEntity, $data);
                        $this->EmailPreferences->save($newEntity);
                    }
                }
                echo json_encode(['msg' => 'Data add successfully']);
                exit;
            }
        }



        echo json_encode('1');
        exit;
    }

    public function ajaxEmailPreformeProfile() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $newEntity = $this->EmailPreferences->newEntity();
                if ($this->Auth->user('id')) {
                    $emailPreferences = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => $this->Auth->user('id'), 'EmailPreferences.kid_id' => 0])->first();
                    if (@$emailPreferences->id != '') {
                        $data['id'] = $emailPreferences->id;
                    } else {
                        $data['id'] = '';
                    }
                    $data['user_id'] = $this->Auth->user('id');
                    $data['kid_id'] = 0;
                    $data['preferences'] = $data['email_preferences'];
                    $newEntity = $this->EmailPreferences->patchEntity($newEntity, $data);
                    $this->EmailPreferences->save($newEntity);
                }
                echo json_encode(['msg' => 'Data save successfully']);
                exit;
            }
        }




        exit;
    }

    public function ajaxLoginSaveDetails() {
        $this->viewBuilder()->setLayout('ajax');

        if ($this->request->is('post')) {
            $data = $this->request->data;
//            pj($data);exit;
            $user = $this->Users->newEntity();
            if ($data['password'] && $data['first_name']) {
                if (strlen($data['password']) < 5) {
                    echo json_encode(['msg' => 'Password must contain atleast 10 characters.', 'status' => 'error']);
                } else if (@$data['conpassword'] == "") {
                    echo json_encode(['msg' => 'Confirm_Password cant empty.', 'status' => 'error1']);
                } else if (@$data['password'] != $data['conpassword']) {
                    echo json_encode(['msg' => 'Password  mismatch', 'status' => 'error1']);
                } else {
                    if ($data['password']) {
                        $user->password = $data['password'];
                    }

                    $user->name = $data['first_name'];
                    $user->id = $this->Auth->user('id');
                    if ($this->Users->save($user)) {
                        $this->UserDetails->updateAll(['first_name' => $data['first_name'], 'last_name' => $data['last_name']], ['user_id' => $this->Auth->user('id')]);

                        echo json_encode(['msg' => 'Password change successfully ', 'status' => 'success']);
                    }
                }
            } else if ($data['first_name']) {
                $user->name = $data['first_name'];
                $user->id = $this->Auth->user('id');
                $this->Users->updateAll(['name' => $data['first_name']], ['id' => $this->Auth->user('id')]);
                $this->UserDetails->updateAll(['first_name' => $data['first_name'], 'last_name' => $data['last_name']], ['user_id' => $this->Auth->user('id')]);
                echo json_encode(['msg' => 'Password change successfully ', 'status' => 'success']);
            }
        }


        exit;
    }

    public function ajaxReadmeCode() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['promocode'] == '') {
                echo json_encode(['msg' => 'Please input the promo code', 'status' => 'error']);
            }

            if ($data['promocode']) {
                $currentDate = date('Y-m-d');
                $checkData = $this->Promocode->find('all')->where(['Promocode.promocode' => $data['promocode'], 'DATE(Promocode.expiry_date) >=' => $currentDate])->first();
                if (@$checkData->id == '') {
                    echo json_encode(['msg' => 'Invalid promo code', 'status' => 'error']);
                } else {

                    $checkUserApplyData = $this->UserUsesPromocode->find('all')->where(['UserUsesPromocode.promocode' => $checkData->promocode, 'UserUsesPromocode.user_id' => $this->Auth->user('id')])->first();
                    if (@$checkUserApplyData->id == '') {
                        $UserUsesPromocode = $this->UserUsesPromocode->newEntity();
                        $UserUsesPromocode->user_id = $this->Auth->user('id');
                        $UserUsesPromocode->promocode = $checkData->promocode;
                        $UserUsesPromocode->apply_dt = date('Y-m-d H:i:s');
                        $UserUsesPromocode->price = $checkData->price;
                        $this->UserUsesPromocode->save($UserUsesPromocode);
                        $wallets = $this->Wallets->newEntity();
                        $wallets->user_id = $this->Auth->user('id');
                        $wallets->type = 2;
                        $wallets->balance = $checkData->price;
                        $wallets->created = date('Y-m-d h:i:s');
                        $wallets->applay_status = 0;
                        $this->Wallets->save($wallets);
                        $price = number_format((float) $checkData->price, 2, '.', '');

                        echo json_encode(['msg' => 'Your account has been credited $' . $price, 'status' => 'success']);
                    } else {
                        echo json_encode(['msg' => 'All ready apply this code', 'status' => 'error']);
                    }
                }
            }
            exit;
        }



        echo json_encode('1');
        exit;
    }

    public function ajaxReadmeGiftCode() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['giftcode'] == '') {
                echo json_encode(['msg' => 'Please input the gift code', 'status' => 'error']);
            }

            if ($data['giftcode']) {
                $currentDate = date('Y-m-d');
                $checkData = $this->Giftcard->find('all')->where(['Giftcard.giftcode' => $data['giftcode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate])->first();
                if (@$checkData->id == '') {
                    echo json_encode(['msg' => 'Invalid Gift code', 'status' => 'error']);
                } else {

                    $checkUserApplyData = $this->UserUsesGiftcode->find('all')->where(['UserUsesGiftcode.giftcode' => $checkData->giftcode, 'UserUsesGiftcode.user_id' => $this->Auth->user('id')])->first();
                    if (@$checkUserApplyData->id == '') {
                        $UserUsesPromocode = $this->UserUsesGiftcode->newEntity();
                        $UserUsesPromocode->user_id = $this->Auth->user('id');
                        $UserUsesPromocode->giftcode = $checkData->giftcode;
                        $UserUsesPromocode->apply_dt = date('Y-m-d H:i:s');
                        $UserUsesPromocode->price = $checkData->price;
                        $this->UserUsesGiftcode->save($UserUsesPromocode);
                        $wallets = $this->Wallets->newEntity();
                        $wallets->user_id = $this->Auth->user('id');
                        $wallets->type = 2;
                        $wallets->balance = $checkData->price;
                        $wallets->created = date('Y-m-d h:i:s');
                        $wallets->applay_status = 0;
                        $this->Wallets->save($wallets);
                        $price = number_format((float) $checkData->price, 2, '.', '');

                        echo json_encode(['msg' => 'Your account has been credited $' . $price, 'status' => 'success']);
                    } else {
                        echo json_encode(['msg' => 'All ready apply this code', 'status' => 'error']);
                    }
                }
            }
            exit;
        }



        echo json_encode('1');
        exit;
    }

    public function ajaxReadmeCodeCheck() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['promocode'] == '') {
                echo json_encode(['msg' => 'Please input the  code', 'status' => 'error']);
            }

            if ($data['promocode']) {
                $currentDate = date('Y-m-d');
                $checkData = $this->Promocode->find('all')->where(['Promocode.promocode' => $data['promocode'], 'DATE(Promocode.expiry_date) >=' => $currentDate])->first();

                $checkDataGift = $this->Giftcard->find('all')->where(['Giftcard.giftcode' => $data['promocode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate])->first();
//pj($checkDataGift);exit;


                if ((@$checkData->id == '') && ($checkDataGift == '')) {
                    echo json_encode(['msg' => 'Invalid  code', 'status' => 'error']);
                } else {

                    $checkUserApplyData = $this->UserUsesPromocode->find('all')->where(['UserUsesPromocode.promocode' => $data['promocode'], 'UserUsesPromocode.user_id' => $this->Auth->user('id')])->first();


                    $checkUserApplyDataGift = $this->UserUsesGiftcode->find('all')->where(['UserUsesGiftcode.giftcode' => $data['promocode'], 'UserUsesGiftcode.user_id' => $this->Auth->user('id')])->first();

                    $checkUserApplay = $this->UserAppliedCodeOrderReview->find('all')->where(['code' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->first();


                    if ((@$checkUserApplyData->id == '') && (@$checkUserApplyDataGift == '') && ($checkUserApplay->id == '')) {
                        if (@$checkData->price != '') {
                            $price1 = $checkData->price;
                        }
                        if (@$checkDataGift->price != '') {
                            $price1 = @$checkDataGift->price;
                        }

                        $price = number_format((float) $price1, 2, '.', '');
                        echo json_encode(['msg' => 'You can apply this  code you can credited $' . $price, 'status' => 'success']);
                    } else {
                        echo json_encode(['msg' => 'All ready apply this code', 'status' => 'error']);
                    }
                }
            }
            exit;
        }



        echo json_encode('1');
        exit;
    }

    public function ajaxReadmeCodeOrder() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['promocode'] == '') {
                echo json_encode(['msg' => 'Please input the  code', 'status' => 'error']);
            }

            if ($data['promocode']) {
                $currentDate = date('Y-m-d');
                $checkData = $this->Promocode->find('all')->where(['Promocode.promocode' => $data['promocode'], 'DATE(Promocode.expiry_date) >=' => $currentDate])->first();

                $checkDataGift = $this->Giftcard->find('all')->where(['Giftcard.giftcode' => $data['promocode'], 'DATE(Giftcard.expiry_date) >=' => $currentDate])->first();

                $checkDataUserUsesGift = $this->UserUsesGiftcode->find('all')->where(['giftcode' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->first();
                $checkDataUserUsesPromo = $this->UserUsesPromocode->find('all')->where(['promocode' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->first();


                $checkUserAppliedCodeOrderReview = $this->UserAppliedCodeOrderReview->find('all')->where(['code' => $data['promocode'], 'user_id' => $this->Auth->user('id')])->first();


//                echo $checkDataUserUsesGift->id; 
//                echo "<br>";
//                echo $checkDataUserUsesPromo->id; 
//                 echo "<br>";
//                echo $checkUserAppliedCodeOrderReview->id; 
//                exit;
                if ((@$checkData->id == '') && (@$checkDataGift == '')) {
                    echo json_encode(['msg' => 'Invalid  code', 'status' => 'error']);
                } else if ((@$checkDataUserUsesGift->id != '') || ($checkDataUserUsesPromo->id != '') || ($checkUserAppliedCodeOrderReview->id != '')) {
                    echo json_encode(['msg' => 'All ready uses this code', 'status' => 'error']);
                } else {
                    if (@$checkUserAppliedCodeOrderReview->id == '') {
                        $UserPromocd = $this->UserAppliedCodeOrderReview->newEntity();
                        $UserPromocd->payment_id = $data['paymentID'];
                        $UserPromocd->code = $data['promocode'];
                        $UserPromocd->apply_dt = date('Y-m-d H:i:s');
                        $UserPromocd->user_id = $this->Auth->user('id');
                        $UserPromocd->price = !empty($checkDataGift->price) ? $checkDataGift->price : $checkData->price;
                        $this->UserAppliedCodeOrderReview->save($UserPromocd);
                        $price = $this->UserAppliedCodeOrderReview->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id'), 'payment_id' => $data['paymentID']])->sumOf('price');

                        echo json_encode(['status' => 'successgift', 'msg' => '<li>' . strtoupper($data['promocode']) . ' applied  <span> -$' . number_format(!empty($checkDataGift->price) ? $checkDataGift->price : $checkData->price, 2) . ' </span></li>', 'price' => $price]);
                    }
                }
            }
            exit;
        }
        echo json_encode('1');
        exit;
    }

    public function ajaxWalletsDetails() {
        $walletsCreditBalance = $this->Wallets->find('all')->where(['Wallets.user_id' => $this->Auth->user('id'), 'Wallets.type' => 2, 'Wallets.applay_status' => 0])->sumOf('balance');

        $walletsDebitBalance = $this->Wallets->find('all')->where(['Wallets.user_id' => $this->Auth->user('id'), 'Wallets.applay_status' => 0, 'Wallets.type' => 1])->sumOf('balance');
        ;


        $promoBalace = $walletsCreditBalance - $walletsDebitBalance;
        echo json_encode(['msg' => number_format((float) $promoBalace, 2, '.', '')]);
        exit;
    }

    public function chatCheckAuth($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->session()->read('Auth.User.id') == '') {
            echo json_encode(['status' => 'success', 'value' => 1]);
            exit();
        } else {
            echo json_encode(['status' => 'success', 'value' => 0]);
        }
        exit;
    }

    public function ajaxGmail($id = null) {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'GMAILINVITE'])->first();
                $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $to = $data['email_id'];
                $subject = $emailMessage->display;

                $reference = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $this->Auth->user('id')])->first();
                $link = HTTP_ROOT . 'invite/' . @$reference->first_name . '-' . @$reference->user_id . '?sod=w&som=e&utm_source=mailto';
                $txt = $emailMessage->value . $link;
                $sub = $subject;
                $url = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&su=" . $sub . "&to=&bcc=" . $data['email_id'] . "&body=" . $txt;
                echo json_encode(['status' => 'success', 'url' => $url]);
            } else {
                echo json_encode(['status' => 'success', 'emaillist' => 0]);
            }
        }
        exit;
    }

    public function invite($name = null) {
        $this->viewBuilder()->layout('ajax');
        if (@$name) {
            $getId = $this->Custom->lastValue($name);

            $cookie_name = "refer_time";
            if (@$this->request->getCookie('refer_time') == '') {
                $this->response = $this->response->withCookie('refer_time', ['value' => time(), 'path' => '/', 'httpsOnly' => true, 'secure' => false, 'expire' => strtotime('+5 year')]);
            } else {
                $cookie_name = 'refer_time';
                $cookie_value = $this->request->getCookie('refer_time');
                $this->response = $this->response->withCookie('refer_time', ['value' => $cookie_value, 'path' => '/', 'httpsOnly' => true, 'secure' => false, 'expire' => strtotime('+5 year')]);
            }

            $count = $this->ReferFriends->find('all')->where(['ReferFriends.my_link_with_uniq_no' => $this->request->getCookie('refer_time'), 'ReferFriends.user_id' => $getId])->count();

            if ($count == 0) {
                $friends = $this->ReferFriends->newEntity();
                $data['my_link_with_uniq_no'] = $this->request->getCookie('refer_time');
                $data['your_unique_link'] = $this->here;
                $data['user_id'] = $getId;
                $data['email_address'] = '';
                $data['created'] = date('Y-m-d h:i:s');
                $data['paid_status'] = 0;
                $data['reffer_id'] = 0;
                $newEntity = $this->ReferFriends->patchEntity($friends, $data);
                $this->ReferFriends->save($friends);
            }
        }
        return $this->redirect(HTTP_ROOT);
    }

    public function order() {
        if ($this->request->session()->read('PROFILE') == 'KIDS') {

            $getUsersDetails = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
            if ($getUsersDetails->is_redirect == 6) {

                return $this->redirect(HTTP_ROOT . 'order_review');
            }

            $this->PaymentGetways->hasMany('Products', ['className' => 'Products', 'foreignKey' => 'payment_id']);
            $OrderDetails = $this->PaymentGetways->find('all')->contain(['Products'])->where(['status' => 1, 'payment_type' => 1, 'work_status' => 2, 'kid_id' => $this->request->session()->read('KID_ID')])->order(['created_dt' => 'DESC']);
            $productDetails = [];

            foreach ($OrderDetails as $product) {
                $productDetails[$product->id] = $this->Products->find('all')->where(['payment_id' => $product->id, 'keep_status' => 3])->count();
            }
            $OrderDetailsCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'work_status' => 2, 'kid_id' => $this->request->session()->read('KID_ID')])->count();

// pj($OrderDetailsCount);exit;
        } else {
            $getUsersDetails = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
            if ($getUsersDetails->is_redirect == 6) {

                return $this->redirect(HTTP_ROOT . 'order_review');
            }
            $this->PaymentGetways->hasMany('Products', ['className' => 'Products', 'foreignKey' => 'payment_id']);
            $OrderDetails = $this->PaymentGetways->find('all')->contain(['Products'])->where(['status' => 1, 'work_status' => 2, 'payment_type' => 1, 'kid_id' => 0, 'user_id' => $this->Auth->user('id')])->order(['created_dt' => 'DESC']);
            $productDetails = [];
            foreach ($OrderDetails as $product) {
                $productDetails[$product->id] = $this->Products->find('all')->where(['payment_id' => $product->id, 'keep_status' => 3])->count();
            }
            $OrderDetailsCount = $this->PaymentGetways->find('all')->where(['status' => 1, 'payment_type' => 1, 'kid_id' => 0, 'work_status' => 2, 'user_id' => $this->Auth->user('id')])->count();
        }


        $this->set(compact('OrderDetails', 'KidsOrderDetails', 'OrderDetailsCount', 'productDetails'));
    }

    public function unsubscribe() {
        if (@$_REQUEST['id']) {
            $getUserId = $this->Users->find('all')->where(['Users.unique_id' => $_REQUEST['id']])->first()->id;
            if (@$getUserId) {
                $emailPreferencesCount = $this->EmailPreferences->find('all')->where(['EmailPreferences.user_id' => @$getUserId])->count();

                if ($emailPreferencesCount >= 1) {
                    $this->EmailPreferences->updateAll(['preferences' => 1], ['user_id' => @$getUserId]);
                    $this->Flash->success(__('Your email is unsubscribe successfully'));
                } else {
                    $newEntity = $this->EmailPreferences->newEntity();
                    $data['user_id'] = @$getUserId;
                    $data['kid_id'] = 0;
                    $data['preferences'] = 1;
                    $newEntity = $this->EmailPreferences->patchEntity($newEntity, $data);
                    $this->EmailPreferences->save($newEntity);
                    $this->Flash->success(__('Your email is unsubscribe successfully'));
                }
            }
        }
    }

    public function ajaxAddressCount() {
        $this->viewBuilder()->layout('ajax');
        $ShippingAddressCount = $this->ShippingAddress->find('all')->where(['ShippingAddress.user_id' => $this->Auth->user('id')])->count();
        echo json_encode(['count' => $ShippingAddressCount]);
        exit;
    }

    public function ajaxMenFit() {
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if ($data) {
                if (@$data['men_stas'] == 'men_stas') {
                    $userId = $this->Auth->user('id');
                    // return $this->redirect(HTTP_ROOT . 'welcome/style/stats');

                    $checKMenStarts = $this->MenStats->find('all')->where(['user_id' => $userId])->first();
                    if (@$checKMenStarts->id == '') {
                        $MenStats = $this->MenStats->newEntity();
                        $data['user_id'] = $userId;
                        $data['birthday'] = $data['birthday'];
                        $MenStats = $this->MenStats->patchEntity($MenStats, $data);
                        $this->MenStats->save($MenStats);
                        $this->UserDetails->updateAll(['is_progressbar' => 25], ['user_id' => $userId]);
                    } else {
                        $this->MenStats->updateAll(
                                [
                            'tall_feet' => $data['tall_feet'],
                            'tell_inch' => $data['tell_inch'],
                            'weight_lb' => $data['weight_lb'],
                            'birthday' => $data['birthday'],
                            'are_you_a_parent' => $data['are_you_a_parent'],
                            'your_occupation' => $data['your_occupation']
                                ]
                                , ['user_id' => $userId]);
                    }
                    $checKMentypical = $this->TypicallyWearMen->find('all')->where(['user_id' => $userId])->first();
                    if ($checKMentypical->id == '') {
                        $data['user_id'] = $userId;
                        $TypicallyWearMen = $this->TypicallyWearMen->newEntity();

                        $TypicallyWearMen = $this->TypicallyWearMen->patchEntity($TypicallyWearMen, $data);
                        $this->TypicallyWearMen->save($TypicallyWearMen);
                    } else {
                        $this->TypicallyWearMen->updateAll(
                                [
                            'waist' => $data['waist'],
                            'waist_size_run' => $data['waist_size_run'],
                            'size' => $data['size'],
                            'shirt' => $data['shirt'],
                            'inseam' => $data['inseam'],
                            'shoe' => $data['shoe'],
                            'shoe_medium' => $data['shoe_medium'],
                            'body_type' => $data['body_type'],
                            'skin_tone' => $data['skin_tone']
                                ]
                                , ['user_id' => $userId]);
                    }

                    $checkExitData = $this->MenStyle->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                    if ($checkExitData->id == '') {
                        $men_style = $this->MenStyle->newEntity();
                        $data['user_id'] = $this->Auth->user('id');
                        $men_style = $this->MenStyle->patchEntity($men_style, $data);
                        $this->MenStyle->save($men_style);
                    } else {
                        $this->MenStyle->updateAll(['linkdin_profile' => $data['linkdin_profile'],
                            'instagram' => $data['instagram'],
                            'twitter' => $data['twitter'],
                            'pinterest' => $data['pinterest']], ['user_id' => $userId]);
                    }


                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
                }
            }
        }

        exit;
    }

    public function ajaxMenStyle() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                if (@$data['men_stas'] == 'men_stas') {
                    $checkExitData = $this->MenFit->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                    if (@$checkExitData->id == '') {
                        $MenFit = $this->MenFit->newEntity();
                        $data['user_id'] = $this->Auth->user('id');
                        // $data['casual_shirts_to_fit'] = implode(",", $data['casual_shirts_to_fit']);
                        $data['button_up_shirts_to_fit'] = implode(",", $data['button_up_shirts_to_fit']);
                        $data['your_pants_to_fit'] = implode(",", $data['your_pants_to_fit']);
                        $data['prefer_your_shorts'] = implode(",", $data['prefer_your_shorts']);
                        $data['jeans_to_fit'] = implode(",", $data['jeans_to_fit']);
                        $data['take_note_of'] = implode(",", $data['take_note_of']);
                        $data['prefer_color'] = $data['prefer_color'];
                        $MenFit = $this->MenFit->patchEntity($MenFit, $data);
                        $this->MenFit->save($MenFit);

                        $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $this->Auth->user('id')]);
                    } else {
                        $this->MenFit->updateAll([
                            'jeans_to_fit' => implode(",", $data['jeans_to_fit']),
                            'your_pants_to_fit' => implode(",", $data['your_pants_to_fit']),
                            'prefer_your_shorts' => implode(",", $data['prefer_your_shorts']),
                            'prefer_color' => $data['prefer_color'],
                            'take_note_of' => implode(",", $data['take_note_of'])
                                ], ['user_id' => $userId]);
                    }

                    $checkExitDataS = $this->MenStyleSphereSelections->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

                    if (@$checkExitDataS->id == '') {
                        $sphereSelections = $this->MenStyleSphereSelections->newEntity();
                        $data['user_id'] = $userId;
                        $data['style_sphere_selections_v2'] = implode(",", $data['style_sphere_selections_v2']);
                        $data['style_sphere_selections_v3'] = implode(",", $data['style_sphere_selections_v3']);
                        $data['style_sphere_selections_v4'] = implode(",", $data['style_sphere_selections_v4']);
                        $data['style_sphere_selections_v5'] = implode(",", $data['style_sphere_selections_v5']);
                        $sphereSelections = $this->MenStyleSphereSelections->patchEntity($sphereSelections, $data);
                        $this->MenStyleSphereSelections->save($sphereSelections);
                    } else {
                        $this->MenStyleSphereSelections->updateAll([
                            'style_sphere_selections_v2' => implode(",", $data['style_sphere_selections_v2']),
                            'style_sphere_selections_v3' => implode(",", $data['style_sphere_selections_v3']),
                            'style_sphere_selections_v4' => implode(",", $data['style_sphere_selections_v4']),
                            'style_sphere_selections_v5' => implode(",", $data['style_sphere_selections_v5'])
                                ], ['user_id' => $userId]);
                    }

                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/styles']);
                }
            }
        }

        exit;
    }

    public function ajaxMenPrice() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                if (@$data['men_price'] == 'men_price') {
                    $checkExitData = $this->MenStyle->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                    if (@$checkExitData->id == '') {
                        $men_style = $this->MenStyle->newEntity();
                        $data['user_id'] = $this->Auth->user('id');
                        $men_style = $this->MenStyle->patchEntity($men_style, $data);
                        $this->MenStyle->save($men_style);
                        $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $this->Auth->user('id')]);
                    } else {
                        $this->MenStyle->updateAll([
                            'button_shirts' => $data['button_shirts'],
                            'tees_polos' => $data['tees_polos'],
                            'weaters_sweatshirts' => $data['weaters_sweatshirts'],
                            'pants_denim' => $data['pants_denim'],
                            'shorts' => $data['shorts'],
                            'shoes' => $data['shoes'],
                            'blazers_outerwear' => $data['blazers_outerwear'],
                            'tees_polos' => $data['tees_polos'],
                            'tees_polos' => $data['tees_polos'],
                                ], ['user_id' => $userId]);
                    }

                    $checkExitDataS = $this->MenAccessories->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

                    if (@$checkExitDataS->id == '') {
                        $menSccessories = $this->MenAccessories->newEntity();
                        $data['user_id'] = $userId;
                        $data['men_tites'] = $data['men_tites'];
                        $data['men_belts'] = $data['men_belts'];
                        $data['men_wallets_begs'] = $data['men_wallets_begs'];
                        $data['men_sunglass'] = $data['men_sunglass'];
                        $data['men_hets'] = $data['men_hets'];
                        $data['men_socks'] = $data['men_socks'];
                        $data['men_underwear'] = $data['men_underwear'];
                        $data['men_grooming'] = $data['men_grooming'];
                        $menSccessories = $this->MenAccessories->patchEntity($menSccessories, $data);
                        $this->MenAccessories->save($menSccessories);
                        $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $this->Auth->user('id')]);
                    } else {
                        $this->MenAccessories->updateAll([
                            'men_tites' => $data['men_tites'],
                            'men_belts' => $data['men_belts'],
                            'men_wallets_begs' => $data['men_wallets_begs'],
                            'men_sunglass' => $data['men_sunglass'],
                            'men_hets' => $data['men_hets'],
                            'men_socks' => $data['men_socks'],
                            'men_underwear' => $data['men_underwear'],
                            'men_grooming' => $data['men_grooming'],
                                ], ['user_id' => $userId]);
                    }

                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/custom']);
                }
            }
        }

        exit;
    }

    public function ajaxMenCustom() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                if (@$data['men_custom'] == 'men_custom') {
                    if (@$data['mens_brands']) {
                        $this->MensBrands->deleteAll(['user_id' => $userId]);
                        foreach (@$data['mens_brands'] as $mens_brands) {
                            $newEntity1 = $this->MensBrands->newEntity();
                            $data['id'] = '';
                            $data['user_id'] = $this->Auth->user('id');
                            $data['mens_brands'] = $mens_brands;
                            $newEntity1 = $this->MensBrands->patchEntity($newEntity1, $data);
                            $this->MensBrands->save($newEntity1);
                        }
                    }
                    if (@$data['profile_note']) {
                        $this->MenStyle->updateAll(['profile_note' => $data['profile_note']], ['user_id' => $userId]);
                    }


                    $checkPagePosition = $this->UserDetails->find('all')->where(['user_id' => $this->Auth->user('id')])->first()->is_progressbar;
                    if (@$checkPagePosition != 100) {
                        $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $userId]);
                        $this->Users->updateAll(['is_redirect' => '1'], ['id' => $this->Auth->user('id')]);
                        echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/schedule']);
                    } else {
                        $Usersdata = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
                        if ($Usersdata->is_redirect == 0) {
                            $url = 'welcome/style/';
                        } elseif ($Usersdata->is_redirect == 0) {
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

                        echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . $url]);
                    }
                }
            }
        }

        exit;
    }

    public function ajaxMenImg() {
        $this->viewBuilder()->layout('ajax');
        $userId = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {

                $imgCol = 'img_' . $data['imgId'];

                if ($data['file']['tmp_name']) {
                    $tmp_name = $data['file']['tmp_name'];
                    $name = $data['file']['name'];
                    $path = USER_CUSTOM;
                    $imgWidth = 300;
                    $img = $this->Custom->uploadImageBanner($tmp_name, $name, $path, $imgWidth);
                }
                $checkIdCount = $this->CustomDesine->find('all')->where(['user_id' => $userId])->count();
                if ($checkIdCount == 0) {
                    $catelogs = $this->CustomDesine->newEntity();
                    $data['user_id'] = $userId;
                    $data['type'] = 1; // 1 one for users 2 for kids
                    $data[$imgCol] = $img;
                    $data['created'] = date('Y-m-d h:i:s');
                    $Catelogs = $this->CustomDesine->patchEntity($catelogs, $data);
                    $this->CustomDesine->save($Catelogs);
                } else {
                    $this->CustomDesine->updateAll([$imgCol => $img], ['user_id' => $userId]);
                }
                $imgurl = HTTP_ROOT . USER_CUSTOM . $img;
                echo json_encode(['status' => 1, 'img' => $imgurl]);
                exit;
            }
        }
        exit;
    }

    public function ajaxWemenFit() {
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if ($data) {
                if (@$data['wemen_stas'] == 'wemen_stas') {
                    $userId = $this->Auth->user('id');
                    $checkExitDataFix = $this->PersonalizedFix->find('all')->where(['user_id' => $userId])->first();

                    if (@$checkExitDataFix->id == '') {
                        $personalizedfix = $this->PersonalizedFix->newEntity();
                        $table['user_id'] = $userId;
                        $table['tell_in_feet'] = $data['tell_in_feet'];
                        $table['tell_in_inch'] = $data['tell_in_inch'];
                        $table['weight_lbs'] = $data['weight_lbs'];
                        $personalizedfix = $this->PersonalizedFix->patchEntity($personalizedfix, $table);
                        $this->PersonalizedFix->save($personalizedfix);
                        $this->UserDetails->updateAll(['is_progressbar' => 25], ['user_id' => $userId]);
                    } else {
                        $this->PersonalizedFix->updateAll(['tell_in_feet' => $data['tell_in_feet'], 'tell_in_inch' => $data['tell_in_inch'], 'weight_lbs' => $data['weight_lbs']], ['user_id' => $userId]);
                    }

                    $checkExitDataInfo = $this->WomenInformation->find('all')->where(['user_id' => $userId])->first();
                    if (@$checkExitDataInfo->id == '') {
                        $womenInformation = $this->WomenInformation->newEntity();
                        $data1['user_id'] = $userId;
                        $data1['birthday'] = $data['birthday'];
                        $data1['parent'] = $data['parent'];
                        $data1['body_type'] = $data['body_type'];
                        $data1['parent'] = $data['parent'];
                        $data1['pregnant'] = $data['pregnant'];
                        $data1['occupation_v2'] = $data['your_occupation'];
                        $data1['skin_tone'] = $data['skin_tone'];
                        $data1['is_pregnant'] = $data['is_pregnant'];
                        $data1['comfortable_showing_off'] = implode(",", $data['comfortable_showing_off']);
                        $data1['keep_covered'] = implode(",", $data['keep_covered']);
                        $womenInformation = $this->WomenInformation->patchEntity($womenInformation, $data1);
                        $this->WomenInformation->save($womenInformation);
                    } else {
//echo date('Y-m-d', strtotime($data['birthday']));exit;
                        $this->WomenInformation->updateAll(['birthday' => $data['birthday'], 'parent' => $data['parent'], 'pregnant' => $data['pregnant'], 'is_pregnant' => $data['is_pregnant'], 'body_type' => $data['body_type'], 'occupation_v2' => $data['your_occupation'], 'skin_tone' => $data['skin_tone'], 'comfortable_showing_off' => implode(",", $data['comfortable_showing_off']), 'keep_covered' => implode(",", $data['keep_covered'])], ['user_id' => $userId]);
                    }

                    $checkExitDataSize = $this->SizeChart->find('all')->where(['user_id' => $userId])->first();
                    if (@$checkExitDataSize->id == '') {
                        $sizechart = $this->SizeChart->newEntity();
                        $table['user_id'] = $userId;
                        $table['pants'] = $data['pants'];
                        $table['bra'] = $data['bra'];
                        $table['bra_recomend'] = $data['bra_recomend'];
                        $table['skirt'] = $data['skirt'];
                        $table['jeans'] = $data['jeans'];
                        $table['dress'] = $data['dress'];
                        $table['dress_recomended'] = $data['dress_recomended'];
                        $table['shirt_blouse'] = $data['shirt_blouse'];
                        $table['shirt_blouse_recomend'] = $data['shirt_blouse_recomend'];
                        $table['pantsr1'] = $data['pantsr1'];
                        $table['pantsr2'] = $data['pantsr2'];
                        $table['shoe'] = $data['shoe'];
                        $table['is_pregnant'] = $data['is_pregnant'];
                        $table['proportion_shoulders'] = $data['proportion_shoulders'];
                        $table['proportion_legs'] = $data['proportion_legs'];
                        $table['proportion_arms'] = $data['proportion_arms'];
                        $table['proportion_hips'] = $data['proportion_hips'];
                        $table['expected_due_date'] = date('Y-m-d', strtotime($data['duedate']));
                        $table['is_prefer_maternity'] = $data['is_prefer_maternity'];
                        $table['loose_fitted'] = $data['loose_fitted'];
                        $sizechart = $this->SizeChart->patchEntity($sizechart, $table);
                        $this->SizeChart->save($sizechart);
                    } else {

                        $this->SizeChart->updateAll(
                                [
                            'pants' => $data['pants'],
                            'bra' => $data['bra'],
                            'bra_recomend' => $data['bra_recomend'],
                            'skirt' => $data['skirt'],
                            'jeans' => $data['jeans'],
                            'dress' => $data['dress'],
                            'dress_recomended' => $data['dress_recomended'],
                            'shirt_blouse' => $data['shirt_blouse'],
                            'shirt_blouse_recomend' => $data['shirt_blouse_recomend'],
                            'pantsr1' => $data['pantsr1'],
                            'pantsr2' => $data['pantsr2'],
                            'shoe' => $data['shoe'],
                            'is_pregnant' => $data['is_pregnant'],
                            'proportion_shoulders' => $data['proportion_shoulders'],
                            'proportion_legs' => $data['proportion_legs'],
                            'proportion_arms' => $data['proportion_arms'],
                            'proportion_hips' => $data['proportion_hips'],
                            'expected_due_date' => date('Y-m-d', strtotime($data['duedate'])),
                            'loose_fitted' => $data['loose_fitted'],
                            'is_prefer_maternity' => $data['is_prefer_maternity']
                                ], ['user_id' => $userId]
                        );
                    }

                    $checkExitDataWeMenStyle = $this->WomenStyle->find('all')->where(['user_id' => $userId])->first();
                    if (@$checkExitDataWeMenStyle->id == '') {
                        $WomenStyle = $this->WomenStyle->newEntity();
                        $data2['user_id'] = $userId;
                        $data2['linkdin_profile'] = $data['linkdin_profile'];
                        $data2['instagram'] = $data['instagram'];
                        $data2['twitter'] = $data['twitter'];
                        $data2['pinterest'] = $data['pinterest'];
                        $WomenStyle = $this->WomenStyle->patchEntity($WomenStyle, $data2);
                        $this->WomenStyle->save($WomenStyle);
                    } else {
                        $this->WomenStyle->updateAll(['linkdin_profile' => $data['linkdin_profile'], 'instagram' => $data['instagram'], 'twitter' => $data['twitter'], 'pinterest' => $data['pinterest']], ['user_id' => $userId]);
                    }


                    $WomenShoePrefer = $this->WomenShoePrefer->find('all')->where(['user_id' => $userId])->first();
                    if (@$WomenShoePrefer->id == '') {
                        $WomenShoePrefer = $this->WomenShoePrefer->newEntity();
                        $data3['brands'] = implode(",", $data['women_shoe_prefer']);
                        $data3['user_id'] = $userId;
                        $WomenShoePrefer = $this->WomenShoePrefer->patchEntity($WomenShoePrefer, $data3);
                        $this->WomenShoePrefer->save($WomenShoePrefer);
                    } else {
                        $this->WomenShoePrefer->updateAll(['brands' => implode(",", $data['women_shoe_prefer'])], ['user_id' => $userId]);
                    }

                    $WomenHeelHightPreferExit = $this->WomenHeelHightPrefer->find('all')->where(['user_id' => $userId])->first();
                    if ($WomenHeelHightPreferExit->id == '') {
                        $WomenHeelHightPrefer = $this->WomenHeelHightPrefer->newEntity();
                        $data4['height'] = implode(",", $data['womenHeelHightPrefer']);
                        $data4['user_id'] = $userId;
                        $WomenShoePrefer = $this->WomenHeelHightPrefer->patchEntity($WomenHeelHightPrefer, $data4);
                        $this->WomenHeelHightPrefer->save($WomenHeelHightPrefer);
                    } else {
                        $this->WomenHeelHightPrefer->updateAll(['height' => implode(",", $data['womenHeelHightPrefer'])], ['user_id' => $userId]);
                    }

                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
                }
            }
        }

        exit;
    }

    public function ajaxWeMenStyle() {
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if ($data) {
                if (@$data['wemen_fit'] == 'wemen_fit') {
                    $userId = $this->Auth->user('id');
                    $checkExitWemenStyleSphereSelections = $this->WemenStyleSphereSelections->find('all')->where(['user_id' => $userId])->first();

                    if (@$checkExitWemenStyleSphereSelections->id == '') {
                        $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->newEntity();
                        $table['user_id'] = $userId;
                        $table['style_sphere_selections_v2'] = implode(",", $data['style_sphere_selections_v2']);
                        $table['style_sphere_selections_v3'] = $data['style_sphere_selections_v3'];
                        $table['style_sphere_selections_v4'] = $data['style_sphere_selections_v4'];
                        $table['style_sphere_selections_v5'] = $data['style_sphere_selections_v5'];
                        $table['style_sphere_selections_v6'] = $data['style_sphere_selections_v6'];
                        $table['style_sphere_selections_v7'] = $data['style_sphere_selections_v7'];
                        $table['style_sphere_selections_v8'] = $data['style_sphere_selections_v8'];
                        $table['style_sphere_selections_v9'] = $data['style_sphere_selections_v9'];
                        $table['style_sphere_selections_v10'] = implode(",", $data['style_sphere_selections_v10']);
                        $table['style_sphere_selections_v3_3'] = implode(",", $data['style_sphere_selections_v3_3']);
                        $table['style_sphere_selections_v11'] = $data['style_sphere_selections_v11'];
                        $table['color_prefer'] = $data['color_prefer'];
                        $table['color_mostly_wear'] = implode(",", $data['color_mostly_wear']);
                        $table['missing_from_your_fIT'] = implode(",", $data['missing_from_your_fIT']);
                        $table['following_occasions'] = $data['following_occasions'];

                        $wemenStyleSphereSelections = $this->WemenStyleSphereSelections->patchEntity($wemenStyleSphereSelections, $table);
                        $this->WemenStyleSphereSelections->save($wemenStyleSphereSelections);
                        $this->UserDetails->updateAll(['is_progressbar' => 50], ['user_id' => $userId]);
                    } else {
                        $this->WemenStyleSphereSelections->updateAll(['style_sphere_selections_v2' => implode(",", $data['style_sphere_selections_v2']), 'style_sphere_selections_v3' => $data['style_sphere_selections_v3'], 'style_sphere_selections_v4' => $data['style_sphere_selections_v4'], 'style_sphere_selections_v5' => $data['style_sphere_selections_v5'], 'style_sphere_selections_v6' => $data['style_sphere_selections_v6'], 'style_sphere_selections_v7' => $data['style_sphere_selections_v7'], 'style_sphere_selections_v8' => $data['style_sphere_selections_v8'], 'style_sphere_selections_v9' => $data['style_sphere_selections_v9'], 'style_sphere_selections_v10' => implode(",", $data['style_sphere_selections_v10']), 'style_sphere_selections_v3_3' => implode(",", $data['style_sphere_selections_v3_3']), 'color_prefer' => $data['color_prefer'], 'color_mostly_wear' => implode(",", $data['color_mostly_wear']), 'missing_from_your_fIT' => implode(",", $data['missing_from_your_fIT']), 'following_occasions' => $data['following_occasions'], 'style_sphere_selections_v11' => $data['style_sphere_selections_v11']], ['user_id' => $userId]);
                    }

                    $checkExitDataWeMenStyle = $this->WomenStyle->find('all')->where(['user_id' => $userId])->first();
                    if (@$checkExitDataWeMenStyle->id == '') {
                        $WomenStyle = $this->WomenStyle->newEntity();
                        $data2['user_id'] = $userId;
                        $data2['distressed_denim_non'] = $data['distressed_denim_non'];
                        $data2['distressed_denim_minimally'] = $data['distressed_denim_minimally'];
                        $data2['distressed_denim_fairly'] = $data['distressed_denim_fairly'];
                        $data2['distressed_denim_heavily'] = $data['distressed_denim_heavily'];
                        $WomenStyle = $this->WomenStyle->patchEntity($WomenStyle, $data2);
                        $this->WomenStyle->save($WomenStyle);
                    } else {
                        $this->WomenStyle->updateAll(['distressed_denim_non' => $data['distressed_denim_non'], 'distressed_denim_minimally' => $data['distressed_denim_minimally'], 'distressed_denim_fairly' => $data['distressed_denim_fairly'], 'distressed_denim_heavily' => $data['distressed_denim_heavily']], ['user_id' => $userId]);
                    }


                    $checkExitDataStyle = $this->WomenJeansStyle->find('all')->where(['user_id' => $userId])->first();
                    if (@$checkExitDataStyle->id == '') {
                        $womeneansStyle = $this->WomenJeansStyle->newEntity();
                        $data1['user_id'] = $userId;
                        $data1['jeans_style'] = implode(",", $data['jeans_style']);
                        $womeneansStyle = $this->WomenJeansStyle->patchEntity($womeneansStyle, $data1);
                        $this->WomenJeansStyle->save($womeneansStyle);
                    } else {
                        $this->WomenJeansStyle->updateAll(['jeans_style' => implode(",", $data['jeans_style'])], ['user_id' => $userId]);
                    }

                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/styles']);
                }
            }
        }

        exit;
    }

    public function ajaxWeMenPrice() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                if (@$data['wemen_price'] == 'wemen_price') {
                    $checkExitData = $this->WomenStyle->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                    if (@$checkExitData->id == '') {
                        $men_style = $this->WomenStyle->newEntity();
                        $data['user_id'] = $userId;
                        $men_style = $this->WomenStyle->patchEntity($men_style, $data);
                        $this->WomenStyle->save($men_style);
                        $this->UserDetails->updateAll(['is_progressbar' => 75], ['user_id' => $this->Auth->user('id')]);
                    } else {
                        $this->WomenStyle->updateAll([
                            'tops' => $data['tops'],
                            'bottoms' => $data['bottoms'],
                            'outwear' => $data['outwear'],
                            'jeans' => $data['jeans'],
                            'jewelry' => $data['jewelry'],
                            'accessproes' => $data['accessproes'],
                            'dress' => $data['dress'],
                                ], ['user_id' => $userId]);
                    }
                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/custom']);
                }
            }
        }

        exit;
    }

    public function ajaxWeMenCustom() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                if (@$data['wemen_custom'] == 'wemen_custom') {
                    if (@$data['mens_brands']) {
                        $this->MensBrands->deleteAll(['user_id' => $userId]);
                        foreach (@$data['mens_brands'] as $mens_brands) {
                            $newEntity1 = $this->MensBrands->newEntity();
                            $data['id'] = '';
                            $data['user_id'] = $userId;
                            $data['mens_brands'] = $mens_brands;
                            $newEntity1 = $this->MensBrands->patchEntity($newEntity1, $data);
                            $this->MensBrands->save($newEntity1);
                        }
                    }
                    if (@$data['profile_note']) {
                        $this->WomenStyle->updateAll(['profile_note' => $data['profile_note']], ['user_id' => $userId]);
                    }


                    $checkPagePosition = $this->UserDetails->find('all')->where(['user_id' => $this->Auth->user('id')])->first()->is_progressbar;
                    if (@$checkPagePosition != 100) {
                        $this->UserDetails->updateAll(['is_progressbar' => 100], ['user_id' => $userId]);
                        $this->Users->updateAll(['is_redirect' => '1'], ['id' => $this->Auth->user('id')]);
                        echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/schedule']);
                    } else {

                        $Usersdata = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();
                        if ($Usersdata->is_redirect == 0) {
                            $url = 'welcome/style/';
                        } elseif ($Usersdata->is_redirect == 0) {
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

                        echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . $url]);
                    }
                }
            }
        }

        exit;
    }

    public function ajaxKidFit() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                if (@$data['kids_stas'] == 'kids_stas') {
                    $userId = $this->Auth->user('id');
                    $kidId = $this->request->session()->read('KID_ID');
                    $checkExitKids = $this->KidsDetails->find('all')->where(['id' => $kidId])->first();
                    $this->KidsDetails->updateAll([
                        'kids_first_name' => $data['kids_first_name'],
                        'kids_birthdate' => $data['kids_birthdate'],
                        'kids_relationship_to_child' => $data['kids_relationship_to_child'],
                        'kids_clothing_gender' => $data['kids_clothing_gender'],
                        'tall_feet' => $data['tall_feet'],
                        'tell_inch' => $data['tell_inch'],
                        'weight_lb' => $data['weight_lb'],
                        'child_personality' => implode(",", $data['child_personality']),
                        'size_prefer_wear' => $data['size_prefer_wear'],
                        'prefer_color' => $data['prefer_color'],
                            ], ['id' => $kidId]);

                    if ($checkExitKids->is_progressbar == 0) {
                        $this->KidsDetails->updateAll(['is_progressbar' => 25], ['id' => $kidId]);
                    }

                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/fit']);
                }
            }
        }

        exit;
    }

    public function ajaxKidFitBoy() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                if (@$data['kid_fit_boy'] == 'kid_fit_boy') {
                    $userId = $this->Auth->user('id');
                    $kidId = $this->request->session()->read('KID_ID');
                    $checkExitKidsize = $this->KidsSizeFit->find('all')->where(['kid_id' => $kidId])->first();

                    $this->KidsDetails->updateAll(['kids_frequency_arts_and_crafts' => $data['kids_frequency_arts_and_crafts'], 'kids_frequency_biking' => $data['kids_frequency_biking'], 'kids_frequency_dance' => $data['kids_frequency_dance'], 'kids_frequency_playing_outside' => $data['kids_frequency_playing_outside'], 'kids_frequency_musical_instruments' => $data['kids_frequency_musical_instruments'], 'kids_frequency_reading' => $data['kids_frequency_reading']], ['id' => $kidId]);

                    if (@$checkExitKidsize->id == '') {
                        $newEntity1 = $this->KidsSizeFit->newEntity();
                        $data1['user_id'] = $userId;
                        $data1['kid_id'] = $kidId;
                        $data1['top_size'] = $data['top_size'];
                        $data1['bottom_size'] = $data['bottom_size'];
                        $data1['shoe_size'] = $data['shoe_size'];
                        $data1['body_shape'] = $data['body_shape'];
                        $data1['shirt_sleeve_length'] = $data['shirt_sleeve_length'];
                        $data1['kids_fit_challenge_shirt_torso_length'] = $data['kids_fit_challenge_shirt_torso_length'];
                        $data1['kids_fit_challenge_shirt_torso_width'] = $data['kids_fit_challenge_shirt_torso_width'];
                        $data1['kids_fit_challenge_pant_waist'] = $data['kids_fit_challenge_pant_waist'];
                        $data1['kids_fit_challenge_pant_leg_length'] = $data['kids_fit_challenge_pant_leg_length'];
                        $data1['kids_fit_challenge_pant_leg_width'] = $data['kids_fit_challenge_pant_leg_width'];
                        $data1['t_sharts'] = $data['t_sharts'];
                        $data1['sweats_shirts'] = $data['sweats_shirts'];
                        $data1['polo_shirts'] = $data['polo_shirts'];
                        //$data1['pant_wast']=$data['pant_wast'];
                        $data1['button_downs'] = $data['button_downs'];
                        $data1['sweaters'] = $data['sweaters'];
                        $data1['jacket_coats'] = $data['jacket_coats'];
                        $data1['shorts'] = $data['shorts'];
                        $data1['jeans'] = $data['jeans'];
                        $data1['trousers_chino'] = $data['trousers_chino'];
                        $data1['sweatspaint'] = $data['sweatspaint'];
                        $data1['shoes'] = $data['shoes'];
                        $data1['t_shirts'] = $data['t_shirts'];

                        $data1['pajamas'] = $data['pajamas'];
                        $newEntity1 = $this->KidsSizeFit->patchEntity($newEntity1, $data1);
                        $this->KidsSizeFit->save($newEntity1);
                        $this->KidsDetails->updateAll(['is_progressbar' => 50], ['id' => $kidId]);
                    } else {
                        $this->KidsSizeFit->updateAll([
                            'top_size' => $data['top_size'],
                            'bottom_size' => $data['bottom_size'],
                            'shoe_size' => $data['shoe_size'],
                            'body_shape' => $data['body_shape'],
                            'shirt_sleeve_length' => $data['shirt_sleeve_length'],
                            'kids_fit_challenge_shirt_torso_length' => $data['kids_fit_challenge_shirt_torso_length'],
                            'kids_fit_challenge_shirt_torso_width' => $data['kids_fit_challenge_shirt_torso_width'],
                            'kids_fit_challenge_pant_waist' => $data['kids_fit_challenge_pant_waist'],
                            'kids_fit_challenge_pant_leg_length' => $data['kids_fit_challenge_pant_leg_length'],
                            'kids_fit_challenge_pant_leg_width' => $data['kids_fit_challenge_pant_leg_width'],
                            't_shirts' => $data['t_shirts'],
                            'sweats_shirts' => $data['sweats_shirts'],
                            'polo_shirts' => $data['polo_shirts'],
                            'button_downs' => $data['button_downs'],
                            // 'pant_wast' => $data['pant_wast'],
                            'sweaters' => $data['sweaters'],
                            'jacket_coats' => $data['jacket_coats'],
                            'shorts' => $data['shorts'],
                            'jeans' => $data['jeans'],
                            'trousers_chino' => $data['trousers_chino'],
                            'sweatspaint' => $data['sweatspaint'],
                            'shoes' => $data['shoes'],
                            'pajamas' => $data['pajamas']
                                ], ['kid_id' => $kidId]);
                    }

                    $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $kidId])->first();
                    if (@$KidClothingType->id == '') {
                        $newEntity = $this->KidClothingType->newEntity();
                        $data2['user_id'] = $userId;
                        $data2['kid_id'] = $kidId;
                        $data2['stripes'] = $data['stripes'];
                        $data2['plaid'] = $data['plaid'];
                        $data2['gingham'] = $data['gingham'];
                        $data2['novelty'] = $data['novelty'];
                        $data2['polkadots'] = $data['polkadots'];
                        $data2['camo'] = $data['camo'];


                        $newEntity = $this->KidClothingType->patchEntity($newEntity, $data2);
                        $this->KidClothingType->save($newEntity);
                    } else {
                        $this->KidClothingType->updateAll([
                            'stripes' => $data['stripes'],
                            'plaid' => $data['plaid'],
                            'gingham' => $data['gingham'],
                            'novelty' => $data['novelty'],
                            'polkadots' => $data['polkadots'],
                            'camo' => $data['camo']
                                ], ['kid_id' => $kidId]);
                    }



                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/styles']);
                }
            }
        }

        exit;
    }

    public function ajaxKidFitGirl() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                if (@$data['kid_fit_girl'] == 'kid_fit_girl') {
                    $userId = $this->Auth->user('id');

                    $kidId = $this->request->session()->read('KID_ID');
                    $checkExitKidsize = $this->KidsSizeFit->find('all')->where(['kid_id' => $kidId])->first();
                    $this->KidsDetails->updateAll(['kids_frequency_arts_and_crafts' => $data['kids_frequency_arts_and_crafts'], 'kids_frequency_biking' => $data['kids_frequency_biking'], 'kids_frequency_dance' => $data['kids_frequency_dance'], 'kids_frequency_playing_outside' => $data['kids_frequency_playing_outside'], 'kids_frequency_musical_instruments' => $data['kids_frequency_musical_instruments'], 'kids_frequency_reading' => $data['kids_frequency_reading']], ['id' => $kidId]);

                    if (@$checkExitKidsize->id == '') {
                        $newEntity1 = $this->KidsSizeFit->newEntity();
                        $data1['user_id'] = $userId;
                        $data1['kid_id'] = $kidId;
                        $data1['top_size'] = $data['top_size'];
                        $data1['bottom_size'] = $data['bottom_size'];
                        $data1['shoe_size'] = $data['shoe_size'];
                        $data1['body_shape'] = $data['body_shape'];
                        $data1['shirt_sleeve_length'] = $data['shirt_sleeve_length'];
                        $data1['kids_fit_challenge_shirt_torso_length'] = $data['kids_fit_challenge_shirt_torso_length'];
                        $data1['kids_fit_challenge_shirt_torso_width'] = $data['kids_fit_challenge_shirt_torso_width'];
                        $data1['kids_fit_challenge_pant_waist'] = $data['kids_fit_challenge_pant_waist'];
                        $data1['kids_fit_challenge_pant_leg_length'] = $data['kids_fit_challenge_pant_leg_length'];
                        $data1['kids_fit_challenge_pant_leg_width'] = $data['kids_fit_challenge_pant_leg_width'];
                        $data1['t_shirts'] = $data['t_shirts'];
                        $data1['sweats_shirts'] = $data['sweats_shirts'];

                        //$data1['pant_wast']=$data['pant_wast'];

                        $data1['sweaters'] = $data['sweaters'];
                        $data1['jacket_coats'] = $data['jacket_coats'];
                        $data1['shorts'] = $data['shorts'];
                        $data1['jeans'] = $data['jeans'];
                        $data1['shoes'] = $data['shoes'];
                        $data1['pajamas'] = $data['pajamas'];
                        $data1['top_blouses'] = $data['top_blouses'];
                        $data1['dreses_rompers'] = $data['dreses_rompers'];
                        $data1['leggings'] = $data['leggings'];
                        $data1['accessories'] = $data['accessories'];
                        $data1['skirts'] = $data['skirts'];
                        $data1['paint'] = $data['paint'];

                        $newEntity1 = $this->KidsSizeFit->patchEntity($newEntity1, $data1);
                        $this->KidsSizeFit->save($newEntity1);
                        $this->KidsDetails->updateAll(['is_progressbar' => 75], ['id' => $kidId]);
                    } else {
                        $this->KidsSizeFit->updateAll([
                            'top_size' => $data['top_size'],
                            'bottom_size' => $data['bottom_size'],
                            'shoe_size' => $data['shoe_size'],
                            'body_shape' => $data['body_shape'],
                            'shirt_sleeve_length' => $data['shirt_sleeve_length'],
                            'kids_fit_challenge_shirt_torso_length' => $data['kids_fit_challenge_shirt_torso_length'],
                            'kids_fit_challenge_shirt_torso_width' => $data['kids_fit_challenge_shirt_torso_width'],
                            'kids_fit_challenge_pant_waist' => $data['kids_fit_challenge_pant_waist'],
                            'kids_fit_challenge_pant_leg_length' => $data['kids_fit_challenge_pant_leg_length'],
                            'kids_fit_challenge_pant_leg_width' => $data['kids_fit_challenge_pant_leg_width'],
                            't_shirts' => $data['t_shirts'],
                            // 'pant_wast' => $data['pant_wast'],
                            'sweaters' => $data['sweaters'],
                            'jacket_coats' => $data['jacket_coats'],
                            'shorts' => $data['shorts'],
                            'jeans' => $data['jeans'],
                            'shoes' => $data['shoes'],
                            'pajamas' => $data['pajamas'],
                            'top_blouses' => $data['top_blouses'],
                            'dreses_rompers' => $data['dreses_rompers'],
                            'leggings' => $data['leggings'],
                            'accessories' => $data['accessories'],
                            'skirts' => $data['skirts'],
                            'paint' => $data['paint'],
                            'sweats_shirts' => $data['sweats_shirts']
                                ], ['kid_id' => $kidId]);
                    }

                    $KidClothingType = $this->KidClothingType->find('all')->where(['KidClothingType.kid_id' => $kidId])->first();
                    if (@$KidClothingType->id == '') {
                        $newEntity = $this->KidClothingType->newEntity();
                        $data2['user_id'] = $userId;
                        $data2['kid_id'] = $kidId;
                        $data2['stripes'] = $data['stripes'];
                        $data2['plaid'] = $data['plaid'];
                        $data2['polkadots'] = $data['polkadots'];
                        $data2['camo'] = $data['camo'];
                        $data2['animal_print'] = $data['animal_print'];
                        $data2['gingham'] = $data['gingham'];

                        $newEntity = $this->KidClothingType->patchEntity($newEntity, $data2);
                        $this->KidClothingType->save($newEntity);
                        $this->KidsDetails->updateAll(['is_progressbar' => 100], ['id' => $kidId]);
                    } else {
                        $this->KidClothingType->updateAll([
                            'stripes' => $data['stripes'],
                            'plaid' => $data['plaid'],
                            'polkadots' => $data['polkadots'],
                            'camo' => $data['camo'],
                            'animal_print' => $data['animal_print'],
                            'floral' => $data['floral'],
                            'gingham' => $data['gingham']
                                ], ['kid_id' => $kidId]);
                    }



                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/styles']);
                }
            }
        }

        exit;
    }

    public function ajaxKidBoyPrice() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                $kidId = $this->request->session()->read('KID_ID');
                if (@$data['kid_boy_price'] == 'kid_boy_price') {
                    $checkExitData = $this->KidStyles->find('all')->where(['kid_id' => $kidId])->first();
                    if (@$checkExitData->id == '') {
                        $style = $this->KidStyles->newEntity();
                        $data['user_id'] = $userId;
                        $data['kid_id'] = $kidId;
                        $data['casual_shirts'] = $data['casual_shirts'];
                        $data['shorts'] = $data['shorts'];
                        $data['jeans_paint'] = $data['jeans_paint'];
                        $data['jaket'] = $data['jaket'];
                        $data['sweaters'] = $data['sweaters'];
                        $data['button_downs'] = $data['button_downs'];
                        $data['casual_bootms'] = $data['casual_bootms'];
                        $data['shoes'] = $data['shoes'];

                        $style = $this->KidStyles->patchEntity($style, $data);
                        $this->KidStyles->save($style);
                        $this->KidsDetails->updateAll(['is_progressbar' => 75], ['id' => $kidId]);
                    } else {
                        $this->KidStyles->updateAll([
                            'casual_shirts' => $data['casual_shirts'],
                            'shorts' => $data['shorts'],
                            'jeans_paint' => $data['jeans_paint'],
                            'jaket' => $data['jaket'],
                            'sweaters' => $data['sweaters'],
                            'button_downs' => $data['button_downs'],
                            'casual_bootms' => $data['casual_bootms'],
                            'shoes' => $data['shoes'],
                                ], ['kid_id' => $kidId]);
                    }
                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/custom']);
                }
            }
        }

        exit;
    }

    public function ajaxKidGirlPrice() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {
                $userId = $this->Auth->user('id');
                $kidId = $this->request->session()->read('KID_ID');
                if (@$data['kid_girl_price'] == 'kid_girl_price') {
                    $checkExitData = $this->KidStyles->find('all')->where(['kid_id' => $kidId])->first();
                    if (@$checkExitData->id == '') {
                        $style = $this->KidStyles->newEntity();
                        $data['user_id'] = $userId;
                        $data['kid_id'] = $kidId;
                        $data['casual_shirts'] = $data['casual_shirts'];
                        $data['skirts_shorts'] = $data['skirts_shorts'];
                        $data['leggings'] = $data['leggings'];
                        $data['jeans'] = $data['jeans'];
                        $data['dresses'] = $data['dresses'];
                        $data['blouses'] = $data['blouses'];
                        $data['jaket'] = $data['jaket'];
                        $data['sweaters'] = $data['sweaters'];
                        $data['shoes'] = $data['shoes'];

                        $style = $this->KidStyles->patchEntity($style, $data);
                        $this->KidStyles->save($style);
                        $this->KidsDetails->updateAll(['is_progressbar' => 100], ['id' => $kidId]);
                    } else {
                        $this->KidStyles->updateAll([
                            'casual_shirts' => $data['casual_shirts'],
                            'skirts_shorts' => $data['skirts_shorts'],
                            'jeans' => $data['jeans'],
                            'jaket' => $data['jaket'],
                            'sweaters' => $data['sweaters'],
                            'dresses' => $data['dresses'],
                            'leggings' => $data['leggings'],
                            'blouses' => $data['blouses'],
                            'shoes' => $data['shoes'],
                                ], ['kid_id' => $kidId]);
                    }
                    echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/style/custom']);
                }
            }
        }

        exit;
    }

    public function ajaxKidImg() {
        $this->viewBuilder()->layout('ajax');
        $kidId = $this->request->session()->read('KID_ID');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data) {

                $imgCol = 'img_' . $data['imgId'];

                if ($data['file']['tmp_name']) {
                    $tmp_name = $data['file']['tmp_name'];
                    $name = $data['file']['name'];
                    $path = USER_CUSTOM;
                    $imgWidth = 300;
                    $img = $this->Custom->uploadImageBanner($tmp_name, $name, $path, $imgWidth);
                }
                $checkIdCount = $this->CustomDesine->find('all')->where(['kid_id' => $kidId])->count();
                if ($checkIdCount == 0) {
                    $catelogs = $this->CustomDesine->newEntity();
                    $data['kid_id'] = $kidId;
                    $data['type'] = 1; // 1 one for users 2 for kids
                    $data[$imgCol] = $img;
                    $data['created'] = date('Y-m-d h:i:s');
                    $Catelogs = $this->CustomDesine->patchEntity($catelogs, $data);
                    $this->CustomDesine->save($Catelogs);
                } else {
                    $this->CustomDesine->updateAll([$imgCol => $img], ['kid_id' => $kidId]);
                }
                $imgurl = HTTP_ROOT . USER_CUSTOM . $img;
                echo json_encode(['status' => 1, 'img' => $imgurl]);
                exit;
            }
        }
        exit;
    }

    public function ajaxBoyCustom() {
        $this->viewBuilder()->layout('ajax');
        $kidId = $this->request->session()->read('KID_ID');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($kidId);
            //pj($data); 
            if ($data) {
                if (@$data['boy_kid_custom'] == 'boy_kid_custom') {
                    $this->KidStyles->updateAll([
                        'brands' => implode(",", $data['brands']),
                        'profile_note' => $data['profile_note']
                            ], ['kid_id' => $kidId]);

                    $checkPagePosition = $this->KidsDetails->find('all')->where(['id' => $kidId])->first()->is_progressbar;
                    if (@$checkPagePosition != 100) {
                        $this->KidsDetails->updateAll(['is_progressbar' => 100, 'is_redirect' => '1'], ['id' => $kidId]);
                        echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . 'welcome/schedule']);
                    } else {

                        $Usersdata = $this->KidsDetails->find('all')->where(['id' => $this->request->session()->read('KID_ID')])->first();
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

                        echo json_encode(['status' => 'success', 'url' => HTTP_ROOT . $url]);
                    }
                }
            }
        }

        exit;
    }

}
