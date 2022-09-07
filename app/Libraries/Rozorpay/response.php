<?php

$is_post = 0;

$MERCHANT_KEY = "rzp_test_psVV3uwg4HuxW0"; //Please change this value with live key for production
$SECRET_KEY = "eEiPeWWVpqfAU0Q2FZPVZA0u"; //Please change this value with live salt for production

//require_once APPPATH . 'Libraries/Rozorpay/Razorpay.php';
$api = new Razorpay\Api\Api($MERCHANT_KEY, $SECRET_KEY);

if (!empty($_POST)) {
    $is_post = 1;
    $data_post = $_POST;

    $payment_id = $_POST["razorpay_payment_id"];
    $order_id = $_POST["razorpay_order_id"];
    $signature = $_POST["razorpay_signature"];

    $db = \Config\Database::connect();
    $builder = $db->table('payment_log');
    $builder->select('*');
    $builder->where(array('TxnId'=>$txn));
    $query = $builder->get();
    $txn_data = $query->getRow();

    $is_hash_error = 1;
    if ($txn_data->OrderID == $order_id) {
        $generated_signature = hash_hmac('sha256', $order_id . "|" . $payment_id, $SECRET_KEY);
        if ($generated_signature == $signature) {
            $is_hash_error = 0;
        } else {
            $is_hash_error = 1;
        }
    }

    $data_error = 0;
    try {
        $payment = $api->payment->fetch($payment_id);
    } catch (Exception $e) {
        $data_error = 1;
    }
    if (!$data_error) {
        $data_post = $payment;
    }
} else {

    $db = \Config\Database::connect();
    $builder = $db->table('payment_log');
    $builder->select('*');
    $builder->where(array('TxnId'=>$txn));
    $query = $builder->get();
    $txn_data = $query->getRow();

    $orderId = $txn_data->OrderID;

    $data_error = 0;
    try {
        $order_data = $api->order->fetch($orderId);
    } catch (Exception $e) {
        $data_error = 1;
    }

    $is_hash_error = 1;
  
    if ($order_data['status'] == 'attempted' && $order_data['amount_paid'] == '0') {
        $is_post = 1;
        $is_hash_error = 0;
    }

    if ($order_data['status'] == 'paid' && $order_data['amount_due'] == '0') {
        $is_post = 1;
        $is_hash_error = 0;
    }
    if($order_data['status'] == 'created' && $order_data['amount_paid'] == '0'){
        $is_post = 1;
        $is_hash_error = 0;
    }
    if (!$data_error) {
        $data_post = $order_data;
    }
}

?>