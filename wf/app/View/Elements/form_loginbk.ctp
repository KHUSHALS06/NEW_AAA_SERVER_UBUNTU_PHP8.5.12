<?php
/**
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 * @author Preeti Joseph<preeti@wifonic.com>
 */

$servername = "localhost";
$username = "hotspot";
$password = "hotspot@00WF";
$dbname = "hotspot";
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
}

$q1 = mysqli_query($db,"select valid_till, created, status, location_domain from locations");
$r1 = mysqli_fetch_assoc($q1);
//print_r($r1); exit;
$exp = $r1['valid_till'];
$status = $r1['status'];
$shortname = $r1['location_domain'];

?>

<?php echo $this->Html->css('loginPage') ?>

<div class="col-lg-4 col-lg-offset-4">

    <div class="panel-group col-lg-12" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Sign in using your registered account.
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <!--<div class="center">
                        <h2><?php echo $this->Html->image('hotellogo.png', array('alt' => 'hotel logo', 'height' => '80px', 'width' => '80px')) ?></h2>
                    </div>-->
                    <?php echo $this->Session->flash(); ?>
                    <?php
                    //echo $user_name;
                    echo $this->Form->create('User', array('controller' => 'users','action' => 'login', 'method'=>'post'));
                    ?>
                    <br/>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" id="UserUsername" required="required" name="data[User][username]" value="<?php echo isset($user_name) ? $user_name : '' ?>" class="form-control required" placeholder="Username" aria-describedby="sizing-addon1" data-bv-notempty = "true" data-bv-notempty-message = "Please provide an username">
                    </div>
                    <br/>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-key"></i></span>
                        <input type="password"  id="UserPassword" required="required" name="data[User][password]" class="form-control required" placeholder="Password" aria-describedby="sizing-addon1" data-bv-notempty = "true" data-bv-notempty-message = "Please provide an username">
                    </div>
                    <?php
//                    echo $this->Form->input('username', array(
//                        'label' => __('Username'),
//                        'data-bv-notempty' => "true",
//                        'data-bv-notempty-message' => "Please provide an username",
//                    ));
                    ?>
                    <?php
//                    echo $this->Form->input('password', array(
//                        'label' => __('Password'),
//                        'data-bv-notempty' => "true",
//                        'data-bv-notempty-message' => "Please provide password",
//                    ));
                    ?>
                    <div class="form-group">
                        <?php //echo $this->Html->link(__('Forgot your password?'), array('controller' => 'users', 'action' => 'remember_password'))   ?>
                    </div>
                    <div class="checkbox">
                        <label>
                            <!--input type="checkbox" name="data[User][remember_me]" value="S"--> <?php //echo __('Remember me')   ?>
                        </label>
                    </div>
                      <script>
                    function myFunction() {
                     alert("Your License is Expired or Stopped due to non payment. To start the service, please Contact Wifonic Accounts Team.");
                    }
                   </script>
                    <?php
                    if($status == 0 || $location == $shortname) {
                     // if (in_array(AuthComponent::user('Group.name'), Configure::read('Application.wifonicGroups')) || AuthComponent::user('Group.name') == Configure::read('Application.admin')) {

                     echo '<a class="btn btn-primary btn-lg btn-block" onclick="myFunction()"> Login </a>';
                     // }
                    }else { ?>
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><?php echo __('Login') ?></button>
                   <?php } ?>

                    <!--button type="submit" class="btn btn-primary btn-lg btn-block"><?php echo __('Login') ?></button-->

                </div>
                <br>
            </div>
        </div>
    </div>
    <br>
    <!--<p class="pull-right"><?php echo $this->Html->link(__('WiFonic Technologies Pvt. Ltd.'), 'http://www.wifonic.com', array('target' => '_blank', 'escape' => false)) ?></p>-->
</div>
