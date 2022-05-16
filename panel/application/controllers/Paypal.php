<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
      
    public function success(){ 
        // Get the transaction data 
        $paypalInfo = $this->input->get(); 
         
        $productData = $paymentData = array(); 
        if(!empty($paypalInfo['item_number']) && !empty($paypalInfo['tx']) && !empty($paypalInfo['amt']) && !empty($paypalInfo['cc']) && !empty($paypalInfo['st'])){ 

            $item_name = $paypalInfo['item_name']; 
            $item_number = $paypalInfo['item_number']; 
            $txn_id = $paypalInfo["tx"]; 
            $payment_amt = $paypalInfo["amt"]; 
            $currency_code = $paypalInfo["cc"]; 
            $status = $paypalInfo["st"]; 
             
           
            // Insert the transaction data in the database 
            $add_data['user_id']    = $paypalInfo["custom"]; 
            $add_data['product_id']    = $paypalInfo["item_number"]; 
            $add_data['txn_id']    = $paypalInfo["tx"]; 
            $add_data['payment_gross']    = $paypalInfo["amt"]; 
            $add_data['currency_code']    = $paypalInfo["cc"]; 
            $add_data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
            $add_data['payer_email']    = $paypalInfo["payer_email"]; 
            $add_data['payment_status'] = $paypalInfo["st"]; 
            var_dump($paypalInfo);
die;
            $this->payment_model->insertTransaction($add_data); 
          

            $productData = $this->membership_model->getRows($item_number); 
             
            // Check if transaction data exists with the same TXN ID 
            $paymentData = $this->payment_model->getPayment(array('txn_id' => $txn_id)); 
        } 
         
        // Pass the transaction data to view 
        $data['product'] = $productData; 
        $data['payment'] = $paymentData; 
        $this->load->view('paypal/success', $data); 
    } 
      
     public function cancel(){ 
        // Load payment failed view 
        $this->load->view('paypal/cancel'); 
     } 
      
    public function ipn(){ 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post(); 
         
        if(!empty($paypalInfo)){ 
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo); 
 
            // Check whether the transaction is valid 
            if($ipnCheck){ 
      
                $prevPayment = $this->payment_model->getPayment(array('txn_id' => $paypalInfo["txn_id"])); 

                if(!$prevPayment){ 
                    // Insert the transaction data in the database 
                    $data['user_id']    = $paypalInfo["custom"]; 
                    $data['product_id']    = $paypalInfo["item_number"]; 
                    $data['txn_id']    = $paypalInfo["txn_id"]; 
                    $data['payment_gross']    = $paypalInfo["mc_gross"]; 
                    $data['currency_code']    = $paypalInfo["mc_currency"]; 
                    $data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['payment_status'] = $paypalInfo["payment_status"]; 
     
                    $this->payment_model->insertTransaction($data); 
                } 
            } 
        } 
    } 
    
}