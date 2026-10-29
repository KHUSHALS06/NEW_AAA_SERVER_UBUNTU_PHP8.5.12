
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <style>
        .card{
            margin:50px;
            width:400px;
            /*box-shadow: 0 2px 8px #ccc;*/
            border: 1px solid black;
            height: auto;
        }
        .left{
            float: left;
        }
        .right{
            float: right; 
        }
       
        .card-title{
            padding-top: -5px;
            padding-left: 130px;
        }
        .img{
            padding-top: 35px;
            width: auto;
            height: 100px;

        }
        .maincontent{
            width: auto;

        }
        .card-block{

            background-color: #bce8f1;
        }
        .card-footertitle{
            padding-top: 8px;
            padding-left: 100px;
        }
        @media print {
            footer {page-break-after: always;}
        }
        @page {
            size: 7in 9.25in;
            margin: 27mm 16mm 27mm 16mm;
        }
        div.titlepage {
            page: blank;
        }
        @page {
            size: A4;
        }



    </style>
    <script>
       
    </script>
    <body onload="window.print();">        
        <div id="print" >
            <?php
            $cdetails = count($couponDetails);
            for ($i = 0, $j = 1; $i < $cdetails; $i = $i + 2, $j++) {

                $tCoupon = $couponDetails[$i]['Coupon']['username'];
                if ($coupenLength == 4) {
                    $tCoupon = substr($tCoupon, 0, $coupenLength);
                }
                ?>
                <table border="0" width="760px" style=" align-content:  center;  padding-right: 10px;" >
                    <tr>
                        <td bgcolor="#bce8f1" width="360px" align="left" style="border: 1px solid #999999; vertical-align: top;">
                            <table  width=" 360px">
                                <tr bgcolor="#bce8f1" >
                                    <td  align="center"  >
                                        Welcome To WindFlower
                                    </td>
                                </tr>
                            </table> 
                            <table  bgcolor="white" width="360px" style =" font-size: 14px; border-top: 1px solid #999999; border-bottom: 1px solid #999999;">                                
                                <tr>
                                    <td width="100px" >
                                        <img class="card-img-top" src="../img/wind_flower.jpeg" width="90px;"  height="50px;" alt="logo ">
                                    </td>
                                    <td  width="250px" >
                                        <table>                                          
                                            <tr >
                                                <td width="60px" align="right" style=" vertical-align: top; ">Username:</td>
                                                <td><?php echo $tCoupon; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="60px" align="right" style=" vertical-align: top;  ">Password:</td>
                                                <td><?php echo $couponDetails[$i]['Coupon']['password']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="60px" align="right" style=" vertical-align: top;  ">Price:</td>
                                                <td><?php echo $couponDetails[$i]['Coupon']['price']; ?></td>
                                            </tr>
                                          <!--  <tr>
                                                <td width="60px" align="right" style=" vertical-align: top;  ">Duration:</td>
                                                <td><?php echo $couponDetails[$i]['Coupon']['duration']; ?></td>
                                            </tr>-->
                                            <tr>
                                                <td width="60px" align="right" style=" vertical-align: top; ">Validity:</td>
                                                <td><?php echo $couponDetails[$i]['Coupon']['duration'] . ' from the time of activation(One device only)'; ?> </td>
                                            </tr>                                           
                                        </table>
                                    </td>

                                </tr>
                            </table>
                            <table width=" 360px">
                                    <tr>
                                        <td align="center" >
                                             We encourage responsible use of internet
                                        </td>
                                    </tr>
                                </table> 
                        </td>
                        <td width="20px" ></td>
                        <?php
                        $iPlusOne = $i + 1;
                        if ($iPlusOne < $cdetails) {
                            ?>
                            <td bgcolor="#bce8f1" width="360px" style="border: 1px solid #999999; vertical-align: top;">

                                <?php
                                $tCoupon = $couponDetails[$iPlusOne]['Coupon']['username'];
                                if ($coupenLength == 4) {
                                    $tCoupon = substr($tCoupon, 0, $coupenLength);
                                }
                                ?>
                                <table width=" 360px">
                                    <tr>
                                        <td align="center"  style=" background-color: #bce8f1;  ">
                                           Welcome To WindFlower
                                        </td>
                                    </tr>
                                </table>              
                                <table bgcolor="white" width=" 360px" style =" font-size: 14px; border-top: 1px solid #999999; border-bottom: 1px solid #999999;">
                                    <tr>
                                        <td width="100px" >
                                             <img class="card-img-top" src="../img/wind_flower.jpeg" width="90px;"  height="50px;" alt="logo ">
                                        </td>
                                        <td width="250px" >
                                            <table>                                           
                                                <tr>
                                                    <td width="60px" align="right" style=" vertical-align: top; ">Username:</td>
                                                    <td><?php echo $tCoupon; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="60px" align="right" style=" vertical-align: top;  ">Password:</td>
                                                    <td><?php echo $couponDetails[$iPlusOne]['Coupon']['password']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="60px" align="right" style=" vertical-align: top;  ">Price:</td>
                                                    <td><?php echo $couponDetails[$iPlusOne]['Coupon']['price']; ?></td>
                                                </tr>
                                               <!-- <tr>
                                                    <td width="60px" align="right" style=" vertical-align: top;  ">Duration:</td>
                                                    <td><?php echo $couponDetails[$iPlusOne]['Coupon']['duration']; ?></td>
                                                </tr>-->
                                                <tr>
                                                    <td width="60px" align="right" style=" vertical-align: top; ">Validity:</td>
                                                    <td><?php echo $couponDetails[$iPlusOne]['Coupon']['duration'] . ' from the time of activation(One device only)'; ?> </td>
                                                </tr>                                               
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table width=" 360px">
                                    <tr>
                                        <td align="center" >
                                           We encourage responsible use of internet
                                        </td>
                                    </tr>
                                </table> 
                            </td>
                        <?php } else { ?>
                            <td width="360px"></td>
                        <?php } ?>
                    </tr>
                </table>
                <br/>
                <?php if ($i > 0 && ($j % 4 == 0)) { ?>
                    <footer> </footer>
                <?php }
                ?>
            <?php } ?>
        </div>
    </body>
</html>

