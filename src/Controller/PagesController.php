<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

class PagesController extends AppController {

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

        $this->Auth->allow(['executive', 'investors', 'news', 'whoWeAre', 'WorkWithUs', 'helpCenter', 'aboutus', 'privacy', 'termsCondition', 'faq', 'blog', 'careers', 'cookieInfo', 'gifts', 'sitemap', 'supplyChainInformation', 'contactUs', 'influencerProgram']);
    }

    public function news() {
        $title_for_layout = "news | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        //$pageDetails = $this->Pages->find('all')->where(['Pages.id' => 4])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function investors() {
        $title_for_layout = "investors | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        //$pageDetails = $this->Pages->find('all')->where(['Pages.id' => 4])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function executive() {
        $title_for_layout = "executive team | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        // $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 4])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function influencerProgram() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 4])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function supplyChainInformation() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 7])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function sitemap() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function gifts() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 2])->first();
        $ $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function cookieInfo() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 9])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function careers() {
        $title_for_layout = "Secure your Career with us- DrapeFit Careers";
        $metaKeyword = "";
        $metaDescription = "We are tend to provide the best services to our lovable customers. We need such expert employees to work hard with us and achieve the goal. We recruit the best employees like you!";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function blog() {
        $title_for_layout = "blog | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";


        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 5])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function faq() {

        $title_for_layout = "FAQ | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 10])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function aboutus() {
        $title_for_layout = "aboutus | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 3])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function privacy() {
        $title_for_layout = "privacy | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";


        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 8])->first();
        // $this->set(compact('pageDetails'));
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function helpCenter() {
        $title_for_layout = "FAQ | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 12])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function WorkWithUs() {
        $title_for_layout = "FAQ | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 13])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function whoWeAre() {
        $title_for_layout = "About us – DrapeFit";
        $metaKeyword = "";
        $metaDescription = "DrapeFit is a modern styling platform for Men, Women and Kids. Our professional stylist works hard to make you look great and upgrade your fashion wardrobe. We provide the quality products with great deals!";

        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 14])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));

        $this->viewBuilder()->setlayout('default');
    }

    public function termsCondition() {
        $title_for_layout = "FAQ | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));
        $this->viewBuilder()->setlayout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 11])->first();

        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function contactUs() {
        $title_for_layout = "FAQ | Drape fit";
        $metaKeyword = "";
        $metaDescription = "We have our own size charts to measure the accurate size of our customers. If you want to evaluate your size, please follow the size charts and get the perfect size of yours.";
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
        $this->viewBuilder()->layout('default');

        if ($this->request->is('post')) {
            $data = $this->request->data;
            /* Mail sending below code */
            $recaptcha = $_REQUEST['g-recaptcha-response'];
            if (empty($recaptcha)) {
                $this->Flash->error(__('Please enter correct captcha code'));
                return $this->redirect(HTTP_ROOT . 'contact-us');
            } else {
                $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'CONTACT_US'])->first();
                $emailTemplate1 = $this->Settings->find('all')->where(['Settings.name' => 'CUSTOMER_CONTACT'])->first();
                $emailFrom = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $toAdminEmail = $this->Settings->find('all')->where(['Settings.name' => 'TO_HELP'])->first();
                $from = $emailFrom->value;
                $name = $data['firstName'] . ' &nbsp;' . $data['lastName'];
                $email = $data['emailAddress'];
                $tocustomer = $data['emailAddress'];
                $phone = $data['phoneNo'];
                $body_subject = $data['subject'];
                $msg = $data['message'];
                $subject = $emailTemplate->display;
                $subject1 = $emailTemplate1->display;


                $message = $this->Custom->contactUs($emailTemplate->value, $name, $email, $phone, $subject, $body_subject, $msg, SITE_NAME);
                $message1 = $this->Custom->customerContactUs($emailTemplate1->value, $name, $email, $phone, $subject1, $body_subject, $msg, SITE_NAME);


                $this->Custom->sendEmail($toAdminEmail->value, $from, $subject, $message);
                $this->Custom->sendEmail($tocustomer, $from, $subject1, $message1);

                /* Mail sending below code */
                $this->Flash->success(__('Thank you, We will get back to you soon.'));
                return $this->redirect(HTTP_ROOT . 'contact-us');
            }
        }
        // $map = $this->Map->find('all')->where(['Map.id' => 1])->first();
        //$this->set(compact('pageDetails'));
    }

}
