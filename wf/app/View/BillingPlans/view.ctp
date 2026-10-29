<?php
/** 
 * This ctp displays the billing plan details
 * 
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 * @author Preeti Joseph<preeti@wifonic.com>
 */
?>
<?php
// To display the breadcrumb. 'label' is the label to be displayed and 'link' redirects to a particular page
$breadcrumb = array(
    array(
        'label' => 'Billing Plan',
        'link' => '/billing_plans'
    ),
    array(
        'label' => $breadcrumbLabel
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
//pr($billingPlan);
?>

<hr>
<div class="row">
    <div class="media-body col-lg-6">
        
        <table class="table table-striped">
            <tr>
                <td><strong>Category: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['cat_bp']); ?></td>
            </tr>
            <tr>
                <td><strong>Name: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['name_bp']); ?></td>
            </tr>
            <tr>
                <td><strong>Duration: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['time_bp'].' min.'); ?></td>
            </tr>
            <tr>
                <td><strong>Validity: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['maximum_time_bp'].' min.'); ?></td>
            </tr>
            <tr>
                <td><strong>Type: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['type_bp']); ?></td>
            </tr>
            <tr>
                <td><strong>Price: </strong></td>
                <td><i class="fa fa-inr"></i> <?php echo __($billingPlan['BillingPlan']['price_bp']); ?></td>
            </tr>
            <tr>
                <td><strong>From Activation: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['timetofinish_bp']=='1'?'yes':'No'); ?></td>
            </tr>
            <tr>
                <td><strong>Simultaneous Use: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['simultanous_bp']); ?></td>
            </tr>
            <tr>
                <td><strong>Redirection URL: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['redirection_url_bp']); ?></td>
            </tr>
            
            <tr>
                <td><strong>Maximum Data: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['maximum_octet_bp']=='0'?'Unlimited':$billingPlan['BillingPlan']['maximum_octet_bp'].' MB'); ?></td>
            </tr>
            
            <tr>
                <td><strong>Upload Speed: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['bandwidth_upload_bp']=='0'?'Unlimited':$billingPlan['BillingPlan']['bandwidth_upload_bp'].' kbps'); ?></td>
            </tr>
            <tr>
                <td><strong>Download Speed: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['bandwidth_download_bp']=='0'?'Unlimited':$billingPlan['BillingPlan']['bandwidth_download_bp'].' kbps'); ?></td>
            </tr>
            <tr>
                <td><strong>Publish: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['publish_bp']=='1'?'Yes':'No'); ?></td>
            </tr>
            <tr>
                <td><strong>Currency: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['currency_bp']); ?></td>
            </tr>
<!--            <tr>
                <td><strong>Login Display: </strong></td>
                <td><?php echo __($billingPlan['BillingPlan']['login_display']); ?></td>
            </tr>-->
            <tr>
                <td><strong>Expiration Date: </strong></td>
                <td><?php echo __(date('d-m-Y',  strtotime($billingPlan['BillingPlan']['expiration_date_bp']))); ?></td>
            </tr>
        </table>
    </div>
</div>
