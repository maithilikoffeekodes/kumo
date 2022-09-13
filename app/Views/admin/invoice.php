<table class="test" border="1" align="center" ; width="70%" style="text-align:center;padding:20px;">
    <tr>
        <td class="test" colspan="7" style="text-align:center;padding:50px;border:none;">
            <!-- <a href="" style="font-size:1.4em;color: #86C442;text-decoration:none;font-weight:600 ;">
                <img src="https://molimor.co/assets/images/favicon.png" height="150px" style="text-align:center;height:150px; padding-left:85px;">
            </a> -->
            <h3 style="margin: 0;padding-left:85px;">Kumo Pvt.Ltd. <br> Surat - 395006</h3>
            <br>
            <!-- <img src="https://molimor.co/assets/images/qrcode.png" height="120px" width="120px" style="margin-left:650px;" alt="">
            <h3 style="margin: 0;padding-left:20px;">GST No : 24AAPCM7187G1ZZ</h3> -->
        </td>
    </tr>
    <tr>
        <td class="text" colspan="5" width="" style="text-align:left;border:none;"><b>Sold By :-</b>
            <br> Kumo Pvt.Ltd.
            <br> 404, Raghuvir Business Street,
            <br> Vesu  road,
            <br> Surat - 395006
            <br>Country : India
            <br><b>Mobile No:</b>(+91)9999888880
            <br><b>Mail:</b> info@kumo.co
            <!-- <br><b>Cin No:</b>U15120GJ2022PTC131539 -->
            <!-- <br><b>Shipment Id: </b> 000000 -->
            <br><b>Order No: </b> <?= @$order[0]['id'] ?>
        </td>
        <td class="test" colspan="6" width="" style="text-align:left;border:none;position:absolute;right:0;"><b>Shipping Address :-</b>
            <br>Home no : <?= @$order[0]['address1'] ?>
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
        <td class="test" colspan="6" width="70%" height="3%" style="text-align:left;border:none;font-size:18px;"><b>Dispatch From: </b>Property No.790,Shed No. 32, Udyog Nagar, Kamrej,Navagam,surat,Surat,Gujarat,394210</td>
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
            Quantity
        </th>
        <th>
            MRP
        </th>
        <th>
            Discount
        </th>
        <th>
            Total Discount Amount
        </th>
        <th>
            Tax %
        </th>
        <th>
            Sub Total
        </th>
    </tr>

    <?php
    for ($i = 0; $i < count($order); $i++) { 
    ?>
        <tr>
        <td>
                <?= $i+1?>
            </td>
            <td>
                <b><?= @$order[$i]['name'] ?> </b>
            </td>
            <td>
                <?= @$order[$i]['hsn'] ?>

            </td>
            <td>
                <?= @$order[$i]['quantity'] ?>
            </td>
            <td>

                <?= @$order[$i]['listedprice'] ?>
            </td>
            <td>
                <?= @$order[$i]['discount'] ?>(%)
            </td>
            <td>
                <?= @$order[$i]['total'] ?>
            </td>
            <td>
                <?= @$order[$i]['tax'] ?>(%)
            </td>
           

           
            <td>
                <?= @$order[0]['total1'][$i] ?>
                

            </td>
           
        </tr>
    <?php } ?>
    <tr>
        <th colspan="8" style="text-align:right;">Amount</th>
        <td><?= @$order[0]['grand_total'] ?></td>
    </tr>
    <tr>
        <th colspan="8" style="text-align:right;">Tax Amount</th>
        <td><?= @$order[0]['amount'] ?></td>
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
        <th colspan="8" style="text-align:right;">Total Amount Including Tax</th>
        <td>0</td>
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
        <th class="test" colspan="9" style="text-align:left;border:none;">Thank You for being Molimor Pvt.Ltd Member. Keep Shopping & Enjoying Benefits.
            This is Computer Generated Invoice And Requires No signature & Stamp. 
            Registered Office : 404, Gate Way Business Street, Kamrej - Varachha road, Surat - 395006 </th>
    </tr>
  
</table>
