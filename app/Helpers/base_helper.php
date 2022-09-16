<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!function_exists('url')) {

    function url($slug)
    {
        return base_url() . '/' . $slug;
    }
}

if (!function_exists('html_convert')) {

    function html_convert($text)
    {
        $text = str_replace("'", "", $text);
        $text = str_replace("\"", "", $text);

        return html_entity_decode($text);
    }
}

function searchArrayKeyVal($sKey, $id, $array)
{
    if (is_array($array)) {
        foreach ($array as $key => $val) {
            if ($val[$sKey] == $id) {
                return $key;
            }
        }
    }
    return false;
}

function numberTowords($num)
{
    $ones = array(
        1 => "one",
        2 => "two",
        3 => "three",
        4 => "four",
        5 => "five",
        6 => "six",
        7 => "seven",
        8 => "eight",
        9 => "nine",
        10 => "ten",
        11 => "eleven",
        12 => "twelve",
        13 => "thirteen",
        14 => "fourteen",
        15 => "fifteen",
        16 => "sixteen",
        17 => "seventeen",
        18 => "eighteen",
        19 => "nineteen",
    );
    $tens = array(
        1 => "ten",
        2 => "twenty",
        3 => "thirty",
        4 => "forty",
        5 => "fifty",
        6 => "sixty",
        7 => "seventy",
        8 => "eighty",
        9 => "ninety",
    );
    $hundreds = array(
        "hundred",
        "thousand",
        "million",
        "billion",
        "trillion",
        "quadrillion",
    ); //limit t quadrillion
    $num = number_format($num, 2, ".", ",");
    $num_arr = explode(".", $num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",", $wholenum));
    krsort($whole_arr);
    $rettxt = "";
    foreach ($whole_arr as $key => $i) {
        if ($i < 20) {
            $rettxt .= $ones[$i];
        } elseif ($i < 100) {
            $rettxt .= $tens[substr($i, 0, 1)];
            // print_r($ones);
            // echo '<br />'. substr($i,1,1);exit;
            $rettxt .= " " . @$ones[substr($i, 1, 1)];
        } else {
            $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
            $rettxt .= " " . $tens[substr($i, 1, 1)];
            $rettxt .= " " . $ones[substr($i, 2, 1)];
        }
        if ($key > 0) {
            $rettxt .= " " . $hundreds[$key] . " ";
        }
    }
    if ($decnum > 0) {
        $rettxt .= " and ";
        if ($decnum < 20) {
            $rettxt .= $ones[$decnum];
        } elseif ($decnum < 100) {
            $rettxt .= $tens[substr($decnum, 0, 1)];
            $rettxt .= " " . $ones[substr($decnum, 1, 1)];
        }
    }
    // print_r($rettxt);
    return $rettxt;
}

function encrypt($text)
{

    $config = new \Config\Encryption();
    $config->key = 'RJVAJA';
    $config->driver = 'OpenSSL';

    $encrypter = \Config\Services::encrypter($config);
    $encrypted = $encrypter->encrypt($text);
    $encrypted = base64_encode($encrypted);
    return $encrypted;
}

function decrypt($text)
{
    $data = base64_decode($text);

    $config = new \Config\Encryption();
    $config->key = 'RJVAJA';
    $config->driver = 'OpenSSL';

    $encrypter = \Config\Services::encrypter($config);
    $decrypted = $encrypter->decrypt($data);
    //$decrypted = rtrim($decrypted, "\0");
    return $decrypted;
}

function MakeThumb($source_path, $target_path, $width, $height, $defalusize = '600')
{
    if ($height == $defalusize && $width == $defalusize) {
        $height = $defalusize;
        $width = $defalusize;
    } else if ($height >= $width && $height > $defalusize) {
        $calc = $height / $defalusize;
        $height = $defalusize;
        $width = $width / $calc;
    } else if ($height <= $width && $width > $defalusize) {
        $calc = $width / $defalusize;
        $width = $defalusize;
        $height = $height / $calc;
    } else {
        $width = $width;
        $height = $height;
    }

    $image = \CodeIgniter\Config\Services::image()
        ->withFile($source_path)
        ->resize(600, 600, true, 'height')
        ->save($target_path);
}


function generateTransactionId()
{

    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

    $db = \Config\Database::connect();

    $builder = $db->table('payment_log');

    $query = $builder->select('*')->where(array('TxnId' => $txnid))->get();

    $getdata = $query->getRow();

    if (!empty($getdata)) {

        $txnid = generateTransactionId();
    }
    // print_r($txnid);exit;

    return $txnid;
}


function check_wishlist($product_id = '', $user_id = '')
{
    $db = \Config\Database::connect();
    $builder = $db->table('wishlist');
    $builder->select('product_id, count(id) as res');
    $builder->where(array('product_id' => $product_id, 'user_id' => $user_id, 'is_delete' => 0));
    $query = $builder->get();
    $getdata = $query->getRow();

    if (($getdata->res) >= 1) {
        echo ($product_id == $getdata->product_id) ? '<i class="lni lni-heart-filled text-primary"></i>' : '<i class="lni lni-heart"></i>';
    } else {
        echo '<i class="lni lni-heart"></i>';
    }
}
function get_review_count($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('review');
    $builder->select('round(AVG(`rating`)) as rateavg');
    $builder->where('product_id', $id);
    $builder->where('is_delete', 0);
    $query = $builder->get();
    $result = $query->getRow();
    $avg = $result->rateavg;
    // print_r($avg);

    return $avg;
}
function get_review_total($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('review');
    $builder->select('SUM(`rating`) as ratesum');

    $builder->where('product_id', $id);
    $builder->where('is_delete', 0);
    $query = $builder->get();
    $result = $query->getRow();
    $sum = $result->ratesum;
    // print_r($sum);exit;
    if ($sum == '') {
        $sum = 0;
    }
    return $sum;
}
function get_product_count($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('item');
    $builder->select('COUNT(`category`) as total');
    $builder->where('category', $id);
    $builder->where('is_delete', 0);
    $query = $builder->get();
    $result = $query->getRow();
    $sum = $result->total;

    return $sum;
}
function get_item_count()
{
    $db = \Config\Database::connect();
    $builder = $db->table('item');
    $builder->select('COUNT(`id`) as total');
    $builder->where('is_delete', 0);
    $query = $builder->get();
    $result = $query->getRow();
    $sum = $result->total;

    return $sum;
}


    function order_mail($email, $subject, $message)
    {
        //  print_r($email);exit;
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host         = 'smtp.gmail.com'; //smtp.google.com
            $mail->SMTPAuth     = true;
            $mail->Username     = 'maithilijejani12@gmail.com';  
            $mail->Password     = 'bldvdjvbfqbytzvn';
            $mail->SMTPSecure   = 'tls';
            $mail->Port         =  587;
            $mail->Subject      =  $subject;
            $mail->Body         =  $message;
            // $mail->AddAttachment(getcwd().$attachment);
            $mail->setfrom('maithilijejani12@gmail.com', 'Kumo');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->send();

            if(!$mail->send()) {
                echo "Something went wrong. Please try again.";
            }
            else {
                echo "Email sent successfully.";
            }

        } catch (Exception $e) {
            echo "Something went wrong. Please try again.";
        }
    }


    function mail_template($ord_id)
    {
        /**
         * goto order table get all order info
         * goto cl_order_items to get all order item info
         * @return string
         */
        //  print_r($ord_id);exit;

        $db      = \Config\Database::connect();
        $builder = $db->table('orders o');
        $builder->select('o.*,sum(o.total_payment) as grandtotal');
        $builder->where('o.id', $ord_id);
        $query  = $builder->get();
        $order = $query->getRow();
        // echo"";print_r($order);exit;
        if ($order->default_add != 0)  //check session isset login user if not then call guest user 
        {
            $builder = $db->table('user');
            $builder->select('*');
            $builder->where('id', $order->default_add);
            $query    = $builder->get();
            $order_details = $query->getRow();
        } else {
            $builder = $db->table('shipping_address');
            $builder->select('*');
            $builder->where('id', $order->ship_id);
            $query  = $builder->get();
            $order_details = $query->getRow();
            $name = @$order_details->fname . @$order_details->lname;
        }


        $builder = $db->table('order_item o');
        $builder->select('o.*,i.name');
        $builder->join('item  i', 'i.id = o.product_id');
        $builder->where('o.order_id', $ord_id);
        $query  = $builder->get();
        $order_items = $query->getResult();
        // echo"";print_r($order_items);exit;

        $message = '<!DOCTYPE html>
					<html>
					<head>
					<title></title>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<meta http-equiv="X-UA-Compatible" content="IE=edge" />
					<style type="text/css">

					body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
					table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
					img { -ms-interpolation-mode: bicubic; }

					img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
					table { border-collapse: collapse !important; }
					body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }


					a[x-apple-data-detectors] {
						color: inherit !important;
						text-decoration: none !important;
						font-size: inherit !important;
						font-family: inherit !important;
						font-weight: inherit !important;
						line-height: inherit !important;
					}

					@media screen and (max-width: 480px) {
						.mobile-hide {
							display: none !important;
						}
						.mobile-center {
							text-align: center !important;
						}
					}
					div[style*="margin: 16px 0;"] { margin: 0 !important; }
					</style>
					<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">


					<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
					</div>

					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
							
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
								<tr>
									<td  valign="top" style="font-size:0;padding: 35px;background: linear-gradient(#4d4d4d, #000000);" bgcolor="#F44336">
								
									<div  style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
										<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
											<tr>
												<td  valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif;  " class="mobile-center">
													<h1 style="  margin: 0; color: #ffffff;">
                                                        <img src="' . base_url() . '/assets/img/logo.png" class="logo" alt=""  height="20px"style="height: 66px;">
                                                    </h1>
												</td>
											</tr>
										</table>
									</div>
									
									</td>
								
								<tr>
									<td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
									<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
										<tr>
											<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;" >
												<img  src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
												<h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                                Thanks '.@$name.' For Your Order!
                                                </h2>
											</td>
										</tr>
										<tr>
											<td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
												<p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
													<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium iste ipsa numquam odio dolores, nam.-->
												</p>
											</td>
										</tr>
										<tr>
											<td align="left" style="padding-top: 20px;">
												<table cellspacing="0" cellpadding="0" border="0" width="100%">
													<tr>
														<td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
															Order ID #
														</td>
														<td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
															' . @$order->id . '
														</td>
													</tr>';
        foreach (@$order_items as $item) {
            $message .= '
                                                                    <tr>
                                                                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                                            ' . @$item->name . ' &nbsp;(' . @$item->quantity . ')
                                                                        </td>
                                                                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                                            ₹ ' . @$item->price . '
                                                                        </td>
                                                                </tr>';
        }


        $message .= '</table>
											</td>
										</tr>
										<tr>
											<td align="left" style="padding-top: 20px;">
												<table cellspacing="0" cellpadding="0" border="0" width="100%">
													<tr>
														<td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
															TOTAL
														</td>
														<td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
															₹ ' . @$order->grandtotal . '
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									
									</td>
								</tr>
								<tr>
									<td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
									<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
										<tr>
											<td align="center" valign="top" style="font-size:0;">
												<div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">

													<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
														<tr>
															<td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
																<p style="font-weight: 800;">Delivery Address</p>
															
                                                                <p>'.@$order_details->address.' <br>INDIA, '.@$order_details->pincoe.'</p>


															</td>
														</tr>
													</table>
												</div>
												<div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
													<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
														<tr>
															<td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
																<p style="font-weight: 800;">ORDER DATE</p>
																<p>' . @$order->created_at . '</p> 
															</td>
														</tr>
													</table>
												</div>
											</td>
										</tr>
									</table>
									</td>
								</tr>
                                
								<tr style="border-top:1px solid #4d4d4d;">
									<td align="center" style=" padding: 35px; background-color: #fff;" bgcolor="#1b9ba3">
									<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
										<tr>
											<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
											</td>
										</tr>
										<tr>
											<td align="center" style="padding: 25px 0 15px 0;">
												<table border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td align="center" style="border-radius: 5px;" bgcolor="#3D464D">
														<a href="' . base_url() . '" target="_blank" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #3D464D; padding: 15px 30px; border: 1px solid #000; display: block;">Shop Again</a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									</td>
								</tr>
								<tr>
									<td align="center" style="padding: 35px; background: linear-gradient(#4d4d4d, #000000);" bgcolor="#ffffff">
									<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                    <tr>
                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif;  " class="mobile-center">
                                        <h1 style="  margin: 0; color: #ffffff;" align="center">
                                        <img src="http://localhost:8080/assets/img/logo.png" class="logo" alt=""  height="20px"style="height: 66px;">
                                        </h1>
                                    </td>
                                </tr>
										<tr>
											<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
												<p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
												
												</p>
											</td>
										</tr>
										<tr>
											<td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">

											</td>
										</tr>
									</table>
									</td>
								</tr>
							</table>
							</td>
						</tr>
					</table>
						
					</body>
					</html>';


        return $message;
    }

