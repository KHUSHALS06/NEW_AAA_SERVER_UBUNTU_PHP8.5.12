<?php
/**
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 * @author Preeti Joseph<preeti@wifonic.com>
 */
?>
<script type="text/javascript">

    $(document).ready(function () {
        $("#sessionDetails").click(function () {
            $("#sessionDetailsForm").submit();
        });
        $("#webLogDetails").click(function () {
            $("#webLogDetailsForm").submit();
        });
    });
</script>
<?php //echo $this->element('locations_list');s ?>
<?php
$locId = $this->Session->read('locations_list'); //$coupon['Coupon']['location_id'];
$breadcrumb = array(
  array(
    'label' => 'Coupons',
    'link' => '/coupons'
  ),
  array(
    'label' => $breadcrumbLabel . '/ ' . $locId[$coupon['Coupon']['location_id']]
  )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
<br>
<div class="row">
    <div class="container">
        <ul class="nav nav-tabs">

            <li class="active"><a href="#tabUserDetails" data-toggle="tab"><i class="fa fa-user"></i> User Details</a></li>


            <?php if ($coupon['Coupon']['activated'] == '1') { ?>
                <li>
                    <a href="#" id="sessionDetails" onclick="$(this).closest('form').submit()"><i class="fa fa-wifi"></i> Session Logs</a>
                    <form method="post" action="sessionDetails" id="sessionDetailsForm">
                        <input name="data[Coupon][coupon_id]" type="hidden" value="<?php echo $coupon['Coupon']['id'] ?>">
                        <input name="data[Coupon][username]" type="hidden" value="<?php echo $coupon['Coupon']['username'] ?>">                    
                    </form>

                </li>
            <?php } ?>
            <?php if (($coupon['Coupon']['activated'] == '1' && (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin')) || (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.admin')))) { ?>
                <li>
                    <a href="#webLogDetails" id="webLogDetails"><i class="fa fa-globe"></i> Web Logs</a>
                    <form method="post" action="webLogDetails" id="webLogDetailsForm">
                        <input name="data[Coupon][coupon_id]" type="hidden" value="<?php echo $coupon['Coupon']['id'] ?>">
                        <input name="data[Coupon][username]" type="hidden" value="<?php echo $coupon['Coupon']['username'] ?>">
                    </form>

                </li>
            <?php } ?>
        </ul>
        <div class="tab-content">

            <!-- tab 1: tabUserDetails -->
            <?php
            //if (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin')) { 
            //pr($coupon);
            ?>
            <div class="tab-pane active in fade" id="tabUserDetails">
                <br>
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td><strong><?php echo __("Username") ?>:</strong></td>
                                <td><?php echo $coupon['Coupon']['username'] ?></td>
                            </tr>
                            <tr>
                                <td><strong><?php echo __("Password") ?>:</strong></td>
                                <td><?php echo ucfirst($coupon['Coupon']['password']) ?></td>
                            </tr>
                            <tr>
                                <td><strong><?php echo __("Price") ?>:</strong></td>
                                <td><?php echo 'Rs. ' . $coupon['BillingPlan']['price_bp'] . '/-' ?></td>
                            </tr>
                            <tr>
                                <td><strong><?php echo __("Creation Date") ?>:</strong></td>
                                <td><?php echo $coupon['Coupon']['cr_date'] ?></td>
                            </tr>
                            <tr>
                                <td><strong><?php echo __("Creater") ?>:</strong></td>
                                <td><?php echo $coupon['Coupon']['creator'] ?></td>
                            </tr>
                            <tr>
                                <td><strong><?php echo __("Activation Date") ?>:</strong></td>
                                <td><?php echo $coupon['Coupon']['active_date'] ?></td>
                            </tr>
                            <tr>
                                <td><strong><?php echo __("Activator") ?>:</strong></td>
                                <td><?php echo $coupon['Coupon']['calling_station_id'] ?></td>
                            </tr>
                            <tr>
                                <td><strong><?php echo __("Billing Plan") ?>:</strong></td>
                                <td><?php echo $coupon['BillingPlan']['name_bp'] ?></td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div> <!-- tabUserDetails -->
            <?php //} ?>
        </div><!-- tab content -->
    </div><!-- end of container -->

</div><!-- /.row -->
