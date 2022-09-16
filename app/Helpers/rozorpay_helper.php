<?php

if (!function_exists('SendRazor')) {
    function SendRazor($amount_r, $txnid_r, $shipping_detail)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('payment_log');
        if (!empty($shipping_detail)) {
            $email    = $shipping_detail['email'];
            $phone    = $shipping_detail['contact'];
            $username = $shipping_detail['username'];
        } else {
            $email    = '';
            $phone    = '';
            $username = '';
        }
        $txnid       = $txnid_r;
        // print_r($txnid);exit;
        $amount      = floatval($amount_r);
        //  print_r($amount);exit;

        $productinfo = 'Goods Charge';
        $ordreid     = generate_order_id_razor($amount_r, $txnid_r);
        if ($ordreid != '0') {
            $data['OrderID'] = $ordreid;
            $builder->where(array(
                'TxnId' => $txnid
            ));
            $result_update = $builder->update($data);
        }
        // print_r($ordreid);exit;
        $keyId = 'rzp_test_3bIvCw7cx15BMe';

        $SUCCESS_URL = url('Home/Payment/Success') . '?txn=' . $txnid;
        $FAIL_URL = url('Home/Payment/Fail') . '?txn=' . $txnid;
        $CANCEL_URL = url('Home/Payment/Fail') . '?txn=' . $txnid;

        $data = [
            "key"               => $keyId,
            "amount"            => $amount,
            "name"              => $username,
            "description"       => $productinfo,
            "callback_url"      => $SUCCESS_URL,
            "redirect"          => true,
            "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
            "prefill"           => [
                "name"              => $username,
                "email"             => $email,
                "contact"           => $phone,
            ],
            "theme"             => [
                "color"             => "#F37254"
            ],
            "order_id"          => $ordreid,
        ];

        // if ($displayCurrency !== 'INR') {
        //     $data['display_currency']  = $displayCurrency;
        //     $data['display_amount']    = $displayAmount;
        // }

        // $json = json_encode($data);

        // echo '<pre>';print_r($json);die();
        // require_once APPPATH . 'Libraries/Rozorpay/index.php';
        // print_r($data);exit;
        return $data;
    }
}
if (!function_exists('generate_order_id_razor')) {
    function generate_order_id_razor($amount_r, $txnid_r)
    {
        require_once APPPATH . 'Libraries/Rozorpay/Razorpay.php';
        $MERCHANT_KEY = "rzp_test_3bIvCw7cx15BMe"; //Please change this value with live key for production
        $SECRET_KEY   = "803IhqE0h11s8eZBSWwpUKZS";
        $api          = new Razorpay\Api\Api($MERCHANT_KEY, $SECRET_KEY);

        $order        = $api->order->create(array(
            'receipt' => $txnid_r,
            'amount' => ceil($amount_r * 100),
            'currency' => 'INR',
            'payment_capture' => 1
        )); // Creates order
        try {
            // print_r($order);exit;
            return $order->id;
        } catch (\Exception $e) {
            return '0';
        }
    }
}
if (!function_exists('SendReceiveRazor')) {
    function SendReceiveRazor($txn)
    {
        require_once APPPATH . 'Libraries/Rozorpay/response.php';
      
        if ($is_post) {
            if ($is_hash_error) {
                $data = array(
                    "PaymentInProccesing" => 0,
                    "PaymentFailed" => 1,
                    "PaymentSuccess" => 0,
                    "PaymentDetail" => "Transaction has been tampered. Please try again!!",
                    "UpdateTime" => date("Y-m-d H:i:s"),
                    "UpdateBy" => @session('id')
                );
            } else {
                if (strtolower($data_post['status']) == 'captured' || strtolower($data_post['status']) == 'paid') {
                    $data = array(
                        "PaymentInProccesing" => 0,
                        "PaymentFailed" => 0,
                        "PaymentSuccess" => 1,
                        "PaymentDetail" => "Success",
                        "PaymentRefrenceId" => $data_post['id'],
                        "PaymentDescription" => json_encode((array) $data_post, true),
                        "UpdateTime" => date("Y-m-d H:i:s"),
                        "UpdateBy" => @session('id')
                    );
                } else {
                    $data = array(
                        "PaymentInProccesing" => 0,
                        "PaymentFailed" => 1,
                        "PaymentSuccess" => 0,
                        "PaymentDetail" => @$data_post['error_description'],
                        "PaymentRefrenceId" => $data_post['id'],
                        "PaymentDescription" => json_encode((array) $data_post, true),
                        "UpdateTime" => date("Y-m-d H:i:s"),
                        "UpdateBy" => @session('id')
                    );
                }
            }
            $db      = \Config\Database::connect();
            $builder = $db->table('payment_log');
            $builder->where('TxnId', $txn);
            $builder->update($data);
        }
    }
}
if (!function_exists('PaymentExecute')) {
    function PaymentExecute($txn)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('payment_log');
        $builder->select('*');
        $builder->where(array(
            'TxnId' => $txn
        ));
        $query  = $builder->get();
        $result = $query->getRow();
        //    echo '<pre>'; print_r($result);exit;
        if (!empty($result)) {
            if ($result->PaymentSuccess == 0) {
        //    echo '<pre>'; print_r($result);exit;
                $data = array(
                    "PatmentExecute" => 1,
                    "UpdateTime" => date("Y-m-d H:i:s"),
                    "UpdateBy" => @$result->user_id
                );
                $builder->where(array(
                    'TxnId' => $txn
                ));
                $builder->update($data);
                $Userbuilder = $db->table('orders');
                $pdata       = array(
                    'is_payment' => 1,
                    'transaction_id' => $txn,
                    'transaction_status' => 'success'
                );
                $Userbuilder->where(array(
                    'id' => $result->ord_id
                ));
                $Userbuilder->update($pdata);
                $Userbuilder->where(array(
                    'id' => $result->ord_id
                ));
                $query       = $Userbuilder->get();
                $ret         = $query->getResult();
                $Userbuilder = $db->table('cart');
                $Userbuilder->where('user_id', $ret[0]->user_id);
                $Userbuilder->update(array(
                    'is_delete' => '1'
                ));

                $subject = "Your Order Details #OrderID - " . $result->ord_id . "- Kumo";

                helper('base');
                $message = mail_template($result->ord_id);
              
                $db      = \Config\Database::connect();
                $builder = $db->table('orders');
                $builder->select('*');
                $builder->where('id', $result->ord_id);
                $query   = $builder->get();
                $order   = $query->getRow();
                // echo "<pre>";print_r($order);exit;
                if ($order->default_add != 0)  //check session isset login user if not then call guest user 
                {
                    $builder = $db->table('user');
                    $builder->select('email');
                    $builder->where('id', $order->default_add);
                    $query    = $builder->get();
                    $data1    = $query->getRow();
                    $email    = $data1->email;
                    // print_r($email);exit;
                } else {
                    $builder = $db->table('shipping_address');
                    $builder->select('email');
                    $builder->where('id', $order->ship_id);
                    $query  = $builder->get();
                    $data = $query->getRow();
                    $email = $data->email;
                }
                
                // echo "<pre>";print_r($email);exit;

                order_mail($email,$subject,$message);
                $builder = $db->table('order_item');
            }
        }
    }
}
