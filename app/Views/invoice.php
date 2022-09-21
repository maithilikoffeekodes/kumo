
<table class="test" border="1" align="center" ; width="70%" style="text-align:center;padding:20px;">
    <tr>
        <td class="test" colspan="7" style="text-align:center;padding:50px;border:none;">
            <a href="" style="font-size:1.4em;color: #86C442;text-decoration:none;font-weight:600 ;">
                <!-- <img src="http://localhost:8080/assets/img/logo.png" height="100px" style="text-align:center;height:100px; padding-left:85px;"> -->
                <h1 style="text-align:center;padding:20px;color:black;">Kumo</h1>
            </a>
            <h3 style="margin: 0;padding-left:85px;">Kumo Pvt.Ltd. 3298 Grant Street Longview, TX <br>Surat - 395006</h3>
            <br>
           
        </td>
    </tr>
    <?php //echo"<pre>";print_r($order);exit;?>
    <tr>
        <td class="text" colspan="4" width="" style="text-align:left;border:none;"><b>Sold By :-</b>
            <br> Kumo Pvt.Ltd.
            <br> 3298 Grant Street Longview, TX
            <br> Surat - 395006
            <br>Country : India
            <br><b>Mobile No:</b>(+91)9081111299
            <br><b>Mail:</b> info@kumo.co
            <br><b>Shipment Id: </b> 000000
            <br><b>Order No: </b> <?= @$order[0]['id'] ?>
        </td>
        <td class="test" colspan="6" width="" style="text-align:left;border:none;right:0;"><b>Shipping Address :-</b>
            <br>Home no : <?= @$order[0]['address'] ?>
            <br>Area : <?= @$order[0]['address2'] ?>
            <br>City : <?= @$order[0]['cname'] ?>
            <br>State : <?= @$order[0]['sname'] ?>
            <br>Country : India
            <br><b>Mobile No:</b> 8320323163
            <br><b>Place Of Supply:</b> Gujarat
            <br><b>Invoice No:</b>MPL/ONL/22-23/0<?= @$order[0]['id'] ?>
            <br><b>Invoice Date: </b> <?php echo date('d/m/Y') ?>
            <br><b>Order Date: </b> <?php echo date('d/m/Y') ?>
        </td>
       
    </tr>
    <tr>
        <td class="test" colspan="6" width="70%" height="3%" style="text-align:left;border:none;font-size:18px;"><b>Dispatch From: </b>Kumo Pvt.Ltd. 3298 Grant Street Longview, TX,Surat,Gujarat,395006</td>
    </tr>
    <br>
    <tr>
        <th>
             SR No:
        </th>
        <th>
            Product Name
        </th>
        <th>
            HSN Code:
        </th>
        
        <th>
            MRP
        </th>
        <th>
            Discount
        </th>
        
        <th>
             Listed Price
        </th>
        <th>
            Quantity
        </th>
        <th>
            Tax %
        </th>
        <th>
            Sub Total
        </th>
    </tr>

    <?php
    for ($i = 0; $i < count(@$order); $i++) { 
    ?>
        <tr>
        <td>
                <?= $i+1?>
            </td>
            <td>
                <b><?= @$order[$i]['name'] ?> </b>
            </td>
            <td>
                <?= @$order[$i]['hsn'] ? @$order[$i]['hsn'] : '0000000'?>

            </td>
            
            <td>
                <?= @$order[$i]['price'] ?>
            </td>
            <td>
                <?= @$order[$i]['discount'] ?>(%)
            </td>
           
            <td>

                <?= @$order[$i]['listedprice'] ?>
            </td>
            <td>
                <?= @$order[$i]['quantity'] ?>
            </td>
            <td>
                <?= @$order[$i]['tax'] ?>(%)
            </td>

            <td>
                <?= @$order[$i]['total'] ?>
            </td>
           
        </tr>
    <?php } ?>
    <tr>
        <th colspan="8" style="text-align:right;">Amount</th>
        <td><?= @$order[0]['sub_total'] ?></td>
    </tr>
    <tr>
        <th colspan="8" style="text-align:right;">Tax Amount</th>
        <td><?= @$order[0]['tax_amt'] ?></td>
    </tr>
    <tr>
        <th colspan="8" style="text-align:right;">Shipping + Convenience Charges</th>
        <td>0</td>
    </tr>
    <tr>
        <th colspan="8" style="text-align:right;">COD Charges</th>
        <td>0</td>
    </tr>
    <tr>
        <th colspan="8" style="text-align:right;">Coupon Discount</th>
        <td><?= @$order[0]['coupon-discount'] ?></td>
    </tr>
    <tr>
        <th colspan="8" style="text-align:right;">Total Amount Including Tax</th>
        <td><?= (float) @$order[0]['sub_total'] + @$order[0]['tax_amt'] ?></td>
    </tr>
    <tr>
        <th colspan="8" style="text-align:right;">Refund Amount</th>
        <td>0</td>
    </tr>
    <tr>
        <th colspan="8" style="text-align:right;">Grand Total</th>
        <td><?= @$order[0]['total_payment'] ?></td>
    </tr>

    <tr style="text-align:center">
        <th colspan="6" class="center" style="text-align:center;border:none;font-size:25px;padding-left:170px;"><b>Not For Resale</b></th>
    </tr>
    <tr>
        <th class="test" colspan="9" style="text-align:left;border:none;">Thank You for being Kumo Pvt.Ltd Member. Keep Shopping & Enjoying Benefits. <br>
            This is Computer Generated Invoice And Requires No signature & Stamp. <br>
            Registered Office : Kumo Pvt.Ltd. 3298 Grant Street Longview, TX,Surat,Gujarat,395006 </th>
    </tr>
  
</table>

