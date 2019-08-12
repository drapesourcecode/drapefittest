<?php

namespace Cake\View\Helper;

use Cake\View\Helper;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;


class UserHelper extends Helper {

    
     function styleFitFee() {
        $table = TableRegistry::get('Settings');
        $query = $table->find('all')->where(['name' => 'style_fee'])->first();
        $name = 0;
        if (!empty($query->value)) {
            $name = $query->value;
        }
        
        return $name;
    }
    
    function getPromoCode($paymentId=null){
        $table = TableRegistry::get('UserAppliedCodeOrderReview');
        $query = $table->find('all')->where(['payment_id' => $paymentId])->order(['id'=>'ASC']);                
        return $query;
    }
     
   

}
