<?php

namespace App\Controllers;

use App\Models\TestModel;
use Dompdf\Dompdf;


class Test extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->model = new TestModel();
    }
    public function index()
    {
        helper('base');

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
                                    Thanks For Your Order!
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
                                                
                                            </td>
                                        </tr>';

        $message .= '
                                                        <tr>
                                                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                               )
                                                            </td>
                                                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                                ??? 
                                                            </td>
                                                    </tr>';



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
                                                ??? 
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
                                                
                                                    <p>Address <br>INDIA, pincode</p>


                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                            <tr>
                                                <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                    <p style="font-weight: 800;">ORDER DATE</p>
                                                    <p></p> 
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
                                            <a href="" target="_blank" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #3D464D; padding: 15px 30px; border: 1px solid #000; display: block;">Shop Again</a>
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
        order_mail('maithili.koffeekodes@gmail.com', 'heelo', $message);
        return $message;
    }
    public function mail()
    {
        helper('base');
        order_mail('maithili.koffeekodes@gmail.com', 'heelo', 'hellllllo');
    }
    public function button()
    {
        return view('test');
    }
    public function invoice($id = '2')
    {
        $dompdf = new Dompdf();
        $data['order'] = $this->model->order($id);
        $html =  view('invoice', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A3', 'portrait');
        $dompdf->render();
        $dompdf->stream('Invoice');
    }
    public function  send_otp()
    {
        helper('base');
        send_otp('maithili.koffeekodes@gmail.com', 9786453);
    }
    public function date()
    {
        date_default_timezone_set('Asia/Kolkata');
        $today = date('Y-m-d');
        $date = date('2022-09-23');

        $delivery_date = date('Y-m-d', strtotime($today . ' +8 days'));
        $pick_by_courier = date('Y-m-d', strtotime($today . ' +2 days'));
        $on_the_way = date('Y-m-d', strtotime($pick_by_courier . ' +2 days'));
        $ready_pickup = date('Y-m-d', strtotime($on_the_way . ' +2 days'));

        echo $today . "<br>" . $delivery_date  . "<br>" .  $pick_by_courier  . "<br>" .  $on_the_way  . "<br>" .  $ready_pickup;

        if($pick_by_courier == $date){
            echo "pick by courier";
        }else if($on_the_way == $date){
            echo "on the way";
        }else if($ready_pickup == $today){
            echo "ready pickup";
        }
    }

    public function mailing()
    {
        $message = '<html>
        <body>
        Dear Customer,

<p>We are delighted to inform you that you have been our customer for Kumo!</p?

<p>This message is to thank you for being part of our family.</p>

<p>We are truly grateful for your constant support and loyalty. We are aware that we wouldn???t be here without devoted customers like yourself.</p>

<p>You could have chosen any other e-store, but you picked and still shop with us. We appreciate you sticking with Kumo fashion.</p>

<p>Thanks again, and have a wonderful day!</p>

<p>Best,
[company???s representative, can be a decision-maker] </p>
        </body>
        </html>';
        return $message;
    }
}
