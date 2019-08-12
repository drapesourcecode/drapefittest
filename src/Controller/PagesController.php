<?php

  namespace App\Controller;

  use Cake\Core\Configure;
  use Cake\Event\Event;
  use Cake\ORM\Query;
  use Cake\ORM\TableRegistry;

  class PagesController extends AppController
   {

   public function initialize() {
    parent::initialize();
     $this->loadComponent('Custom');
        $this->loadComponent('RequestHandler');
        $this->loadModel('Pages');
        $this->loadComponent('Flash');
        $this->loadModel('Users');
        $this->loadModel('Settings');

   }

   public function beforeFilter(Event $event) {
     $this->Auth->allow(['whoWeAre','WorkWithUs','helpCenter','aboutus', 'privacy', 'termsCondition','faq','blog','careers','cookieInfo','gifts','sitemap','supplyChainInformation','contactUs','influencerProgram']);

   }
   
    public function influencerProgram() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 4])->first();
    $this->set(compact('pageDetails'));

   }
   
    public function supplyChainInformation() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 7])->first();
    $this->set(compact('pageDetails'));

   }
   
   public function sitemap() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
    $this->set(compact('pageDetails'));

   }
   
   public function gifts() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 2])->first();
    $this->set(compact('pageDetails'));

   }
   
    public function cookieInfo() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 9])->first();
    $this->set(compact('pageDetails'));

   }
   
   public function careers() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
    $this->set(compact('pageDetails'));

   }
   
   public function blog() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 5])->first();
    $this->set(compact('pageDetails'));

   }
   
   public function faq() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 10])->first();
    $this->set(compact('pageDetails'));

   }

    public function aboutus() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 3])->first();
    $this->set(compact('pageDetails'));

   }

   public function privacy() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 8])->first();
    $this->set(compact('pageDetails'));

   }
   public function helpCenter() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 12])->first();
    $this->set(compact('pageDetails'));

   }
   
   public function WorkWithUs() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 13])->first();
    $this->set(compact('pageDetails'));

   }
   public function whoWeAre() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 14])->first();
    $this->set(compact('pageDetails'));

   }

   public function termsCondition() {
    $this->viewBuilder()->setlayout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 11])->first();
    $this->set(compact('pageDetails'));

   }

  public function contactUs() {
    $this->viewBuilder()->layout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
    if ($this->request->is('post')) {
     $data = $this->request->data;
     /* Mail sending below code */
     $recaptcha = $_REQUEST['g-recaptcha-response'];
     if (empty($recaptcha)) {
      $this->Flash->error(__('Please enter correct captcha code'));
      return $this->redirect(HTTP_ROOT . 'contact-us');
     } else {
      $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'CONTACT_US'])->first();
      $emailFrom = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
      $toAdminEmail = $this->Settings->find('all')->where(['Settings.name' => 'TO_EMAIL'])->first();
      $from = $emailFrom->value;
      $name = $data['firstName'] . ' &nbsp;' . $data['lastName'];
      $email = $data['emailAddress'];
      $phone = $data['phoneNo'];
      $body_subject = $data['subject'];
      $msg = $data['message'];
      $subject = 'Request message from users';
      
      
      $message = $this->Custom->contactUs($emailTemplate->value, $name, $email, $phone, $subject, $body_subject,$msg, SITE_NAME); 

      $this->Custom->sendEmail($toAdminEmail->value, $from, $subject, $message);
      
      /* Mail sending below code */
      $this->Flash->success(__('Thank you, We will get back to you soon.'));
      return $this->redirect(HTTP_ROOT . 'contact-us');
     }
    }
   // $map = $this->Map->find('all')->where(['Map.id' => 1])->first();
    $this->set(compact('pageDetails'));

   }

   }
