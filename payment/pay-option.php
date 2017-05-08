<?php
    
    include '../includes/server.php';
    include '../includes/database.php';

    session_start();

    if (!$_SESSION['key']) {
       
        header("location: " . $server);
        exit();
    }

    // encripting data and passwords using.
    $key    = md5('australia');

    // Decrypt
    function decrypt($string, $key) {

        $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
        return $string;
    }

    $kay = $_SESSION['key'];
    $code = $_SESSION['code'];

    $get_details = mysqli_query($connect, "SELECT * FROM onhold_names WHERE kay = '$kay'") or die("could not load!!");

    $count = mysqli_num_rows($get_details);

    if ($count != 1) {
        
        header("location: " . $server);
        exit();
    }
    while ($row = mysqli_fetch_assoc($get_details)) {
        $id    = $row['id'];
        $fname = decrypt($row['first_name'],$key);
        $lname = decrypt($row['last_name'],$key);
        $cname = decrypt($row['company_name'],$key);
        $email = decrypt($row['user_email'],$key);
    }
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Company Of Registrar</title>

        <!-- jQuery Scrips -->
        <script type="text/javascript" src='<?php echo $server;?>/js/jquery.js'></script>
        <script type="text/javascript" src='<?php echo $server;?>/js/jquery-ui.js'></script>

        <script type="text/javascript" src='<?php echo $server;?>/js/dist/jquery.validate.js'></script>
        <script type="text/javascript" src='<?php echo $server;?>/js/dist/additional-methods.js'></script>

        <script type="text/javascript" src='<?php echo $server;?>/js/myjs.js'></script>

        <!-- CSS STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>/styles/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>/styles/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $server;?>/styles/layout.css" />

        <script type="text/javascript">

            $("form").validate();

            $(function() {

                $( "#accordion" ).accordion();

            });

        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="header group">
                <div class="logo group">
                    <img src="<?php echo $server;?>/images/kenya_logo.png">
                </div>
                <div id="head">
                        
                </div>
                <img src="<?php echo $server;?>/images/kenya_flag.png" id="flt_right">
            </div>
            <div class="main group">
                <h2 class="pay-top">Select Your Payment Option</h2>
                <div class="well-pay pull-left col-md-7 col-sm-7 col-xs-12" style="padding-bottom:20px;">
                    <div id="accordion">
                        <h3 class="accordion-title">Mobile Money</h3>
                        <div class="group">
                            <form class="group">
                                <div class="mmoney">
                                    <label class="label-success">M-Pesa
                                        <input type="radio" name="mobile" checked id="showmpesa">
                                    </label>
                                    <div class="img mm-pic group"><img src="<?php echo $server;?>/images/payment/mpesa.jpg" class="img-thumbnail"> </div>
                                </div>
                                <div class="mmoney">
                                    <label class="label-danger">Airtel-Money
                                        <input type="radio" name="mobile" id="showairtel">
                                    </label>
                                    <div class="img mm-pic group"><img src="<?php echo $server;?>/images/payment/airtel.jpg" class="img-thumbnail"></div>
                                </div>
                                <div class="mmoney">
                                    <label class="label-warning">Equitel-Money
                                        <input type="radio" name="mobile" id="showequitel">
                                    </label>
                                    <div class="img mm-pic"><img src="<?php echo $server;?>/images/payment/equitel.png" class="img-thumbnail"></div>
                                </div>

                                <!--    M-PESA payment process  -->
                                <div class="well well-sm payment" id="mpesa">
                                    <div class="bold payment-title">M-Pesa payment process</div>
                                    <p>1. Go to <b>M-PESA</b> Menu on your phone</p>
                                    <p>2. Select <b>Pay Bill</b> option</p>
                                    <p>3. Enter Business no. <b>000000</b></p>
                                    <p>4. Enter Account no. <b><?php echo $code; ?></b></p>
                                    <p>5. Enter Amount Ksh. <b><?php echo "300"; ?></b></p>
                                    <p>5. Enter <b>M-PESA PIN</b> and <b>Send</b></p>
                                    <p>6. You will receive a confirmation message from <b>M-PESA</b></p>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-pay btn-info" value="Complete">
                                    </div>
                                    <span class="small"><b>NB.</b> Once You receive a Successful Message from <b>M-PESA Click</b> Complete</span>
                                </div>

                                <!--    Airtel payment process  -->
                                <div class="well well-sm payment" id="airtel">
                                    <div class="bold payment-title">Airtel payment process</div>
                                    <p>1. Go to <b>Airtel Money</b> Menu on your phone</p>
                                    <p>2. Select <b>Pay Bill</b> option</p>
                                    <p>3. Enter Business Name. <b>000000</b></p>
                                    <p>5. Enter Amount Ksh. <b><?php echo  $code;?></b></p>
                                    <p>5. Enter your <b>Airtel Money PIN</b> and <b>Send</b></p>
                                    <p>4. Enter Account no. <b><?php echO "300";?></b></p>
                                    <p>6. You will receive a confirmation message from <b>Airtel Money</b></p>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-pay btn-info" value="Complete">
                                    </div>
                                    <span class="small"><b>NB.</b> Once You receive a Successful Message from <b>Airtel Money Click</b> Complete</span>
                                </div>

                                <!--    Equitel Money payment process  -->
                                <div class="well well-sm payment" id="equitel">
                                    <div class="bold payment-title">Equitel Money payment process</div>
                                    <p>1. Go to <b>Equitel Money</b> Menu on your phone</p>
        <!--                            <p>2. Select <b>Pay Bill</b> option</p>-->
        <!--                            <p>2. Select Other</p>-->
        <!--                            <p>3. Enter Business Name. <b>000000</b></p>-->
        <!--                            <p>5. Enter Amount Ksh. <b>--><?php //echo $amount;?><!--</b></p>-->
        <!--                            <p>5. Enter your <b>Airtel Money PIN</b> and <b>Send</b></p>-->
        <!--                            <p>4. Enter Account no. <b>--><?php //echo $code;?><!--</b></p>-->
                                    <p>6. You will receive a confirmation message from <b>Equitel Money</b></p>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-pay btn-info" value="Complete">
                                    </div>
                                    <span class="small"><b>NB.</b> Once You receive a Successful Message from <b>Equitel Money Click</b> Complete</span>
                                </div>
                            </form>
                        </div>
                        <h3 class="accordion-title">Eletronic Transfer</h3>
                        <div>
                            <form>
                                <div class="mmoney">
                                    <label class="label-primary">Visa-Card
                                        <input type="radio" checked name="electronic" id="showvisa">
                                    </label>
                                    <div class="img mm-pic"><img src="<?php echo $server;?>/images/payment/visa.jpg" class="img-thumbnail"></div>
                                </div>
                                <div class="mmoney">
                                    <label class="label-warning">Master-Card
                                        <input type="radio" name="electronic" id="showmaster">
                                    </label>
                                    <div class="img mm-pic"><img src="<?php echo $server;?>/images/payment/master.jpg" class="img-thumbnail"></div>
                                </div>
                                <div class="mmoney">
                                    <label class="label-default">PayPal
                                        <input type="radio" name="electronic" id="showpaypal">
                                    </label>
                                    <div class="img mm-pic"><img src="<?php echo $server;?>/images/payment/paypal.jpg" class="img-thumbnail"></div>
                                </div>

                                <!--    Visa card Check Out -->
                                <div class="well well-sm group payment" id="visa">
                                    <div class="bold payment-title">Visa Card</div>
                                    <div class="form-group master">
                                        <label>Card Number</label>
                                        <input type="text" size="15" class="form-control" name="cardnum"  placeholder="Enter Card Number">
                                    </div>
                                    <div class="form-group master">
                                        <label>CVV Number</label>
                                        <input type="text" size="4" class="form-control" name="cardcvv" placeholder="Enter Card Number">
                                        <span class="small">The last three digits at the back of the card</span>
                                    </div>
                                    <div class="form-group master">
                                        <label>Expiration Date</label>
                                        <br>
                                        <select class="form-control" name="expmonth">
                                            <option>January</option>
                                            <option>February</option>
                                            <option>March</option>
                                        </select>
                                        <select class="form-control" name="expyear">
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                        </select>
                                    </div><div class="clearfix"></div>
                                    <div class="form-group master">
                                        <input type="submit" class="btn btn-pay btn-info" name="visa" value="Complete">
                                    </div>
                                </div>

                                <!--    Master card  -->
                                <div class="well well-sm group payment" id="master">
                                    <div class="bold payment-title">Master Card</div>
                                    <div class="form-group master">
                                        <label>Card Number</label>
                                        <input type="text" size="15" class="form-control" name="cardnum"  placeholder="Enter Card Number">
                                    </div>
                                    <div class="form-group master">
                                        <label>CVV Number</label>
                                        <input type="text" size="4" class="form-control" name="cardcvv" placeholder="Enter Card Number">
                                        <span class="small">The last three digits at the back of the card</span>
                                    </div>
                                    <div class="form-group master">
                                        <label>Expiration Date</label>
                                        <br>
                                        <select class="form-control" name="expmonth">
                                            <option>January</option>
                                            <option>February</option>
                                            <option>March</option>
                                        </select>
                                        <select class="form-control" name="expyear">
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                        </select>
                                    </div><div class="clearfix"></div>
                                    <div class="form-group master">
                                        <input type="submit" class="btn btn-pay btn-info" value="Complete">
                                    </div>
                                </div>
                            </form>

                            <!--    PayPal check out  -->
                            <div class="well well-sm payment" id="paypal">
                                <div class="bold payment-title">PayPal Check Out</div>
                                <table class="table table-bordered pay-table">
                                    <tr>
                                        <td colspan="2"><strong>Company Name</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong><?php echo $cname; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="h4">TOTAL</td>
                                        <td><strong><?php echo "Ksh. 300"; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                                                <!-- Identify your business so that you can collect the payments. -->
                                                <input type="hidden" name="business" value="delinktest@gmail.com">

                                                <!-- Specify a Buy Now button. -->
                                                <input type="hidden" name="cmd" value="_xclick">

                                                <!-- Specify details about the item that buyers will purchase. -->
                                                <input type="hidden" name="item_name" value="<?php echo $cname; ?>">
                                                <input type="hidden" name="amount" value="3.00">
                                                <input type="hidden" name="currency_code" value="USD">

                                                <!-- redirects after the payment is made -->
                                                <input type='hidden' name='rm' value='2'>
                                                <input type="hidden" name="return" value="<?php echo $server;?>payment/ridirect.php?approval=true">
                                                <input type="hidden" name="cancel_return" value="<?php echo $server;?>payment/ridirect.php?approval=false">

                                                <!-- Display the payment button. -->
                                                <input type="image" name="submit" border="0"
                                                src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                                                alt="PayPal - The safer, easier way to pay online">
                                                <img alt="" border="0" width="1" height="1"
                                                src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="side-bar col-md-5 col-sm-5 col-xs-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h2 class="panel-title">Ministry Of Registrar Your Summery</h2>
                        </div>
                        <div class="panel-body">
                            <div class="well well-sm">
                                <span class="bold">Company : </span> <?php echo $cname; ?>
                            </div>
                            <div class="well well-sm">
                                <span class="bold">Name : </span> <?php echo $fname . ' ' . $lname; ?>
                            </div>
                            <div class="well well-sm">
                                <span class="bold">Email : </span> <?php echo $email; ?>
                            </div>
                            
                            <div class="well">
                                <span class="bold">Total Amount : </span> <span class='red'>Ksh. <?php echo "300.00"; ?></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="nb nb-pay">
                <p>
                    <span>NOTE: </span><br>
                    <small>All modes of payment are safe and secure for use, your Details transaction will not be publicised or used against your will. Use any platform that you are comfortable with.</small>
                </p>
            </div>
            <div class="footer">
                All Rights Reserved, Company of Registrar <br> &copy; <?php echo date('Y'); ?>
                <span>Designed By: <a href="http://www.facebook.com/delinkwebArts">Delink</a></span>
            </div>
        </div>
    </body>
</html>