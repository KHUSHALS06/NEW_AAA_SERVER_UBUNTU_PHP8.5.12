<?php
/**
 * This ctp consist of form to add coupons
 * 
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 * @author Preeti Joseph<preeti@wifonic.com>
 */
?>

<script type="text/javascript">

    $(document).ready(function() {

        // Validate the form with Bootstrap validator 
        $('#BatchCouponForm').bootstrapValidator();
        $('#SingleCouponForm').bootstrapValidator();

        // JQuery datepicker for expiration date 
        $('#expiration_date').datepicker({
            dateFormat: 'yy-mm-dd',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true,
            showOn: "button",
            buttonImage: "../img/datepicker.png",
            buttonImageOnly: true
        });

        // Revalidate the date when user change it
        $('#expiration_date')
                .change(function(e) {
                    $('#BillingPlanAddForm').bootstrapValidator('revalidateField', 'data[BillingPlan][expiration_date_bp]');
                });

        // Check if location is selected
        if ($('#couponsLocationsId').val() == "" || $('#couponsLocationsId').val() == 0) {
            $('#locationError').attr('style', 'display: block');
        } else {
            $('#locationError').attr('style', 'display: none');
        }

        // Toggle between single or multiple coupons form
//        if ($('#single_multiple').val() == 'single') {
//            $('#single_coupon').attr('style', 'display:inline');
//            $('#multiple_coupon').attr('style', 'display:none');
//        } else {
//            $('#single_coupon').attr('style', 'display:none');
//            $('#multiple_coupon').attr('style', 'display:inline');
//        }

        // Toggle between single or multiple coupons form
        $('#single_multiple').change(function() {
            //alert('hi');
            if ($('#single_multiple').val() == 'single') {
                //alert('hi');number_of_coupon
                $('#single_coupon').attr('style', 'display:inline');
                $('#multiple_coupon').attr('style', 'display:none');
            } else {
                $('#single_coupon').attr('style', 'display:none');
                $('#multiple_coupon').attr('style', 'display:inline');
            }
        });
        var specialIdString = $('#specialBillingPlanString').text();
        var specialId = specialIdString.split('#')
        var isSpecial = false;
        for (var i = 0; i < specialId.length; i++) {
            if (specialId[i] == $('#billing_plan_id').val()) {
                isSpecial = true;
                break;
            }
        }
        if (isSpecial == true) {
            $('#lumpsum_price_multiple_div').css('display', 'block');
        } else {
            $('#lumpsum_price_multiple_div').css('display', 'none');
        }

        $('#billing_plan_id').change(function() {
            var specialIdString = $('#specialBillingPlanString').text();
            var specialId = specialIdString.split('#')
            var isSpecial = false;
            for (var i = 0; i < specialId.length; i++) {
                if (specialId[i] == $('#billing_plan_id').val()) {
                    isSpecial = true;
                    break;
                }
            }
            if (isSpecial == true) {
                $('#lumpsum_price_multiple_div').css('display', 'block');
            } else {
                $('#lumpsum_price_multiple_div').css('display', 'none');
            }
        });
    });

</script>
<?php
echo $this->element('locations_list');
?>

<?php
// To display the breadcrumb. 'label' is the label to be displayed and 'link' redirects to a particular page
$breadcrumb = array(
    array(
        'label' => 'Coupon',
        'link' => '/coupons'
    ),
    array(
        'label' => $breadcrumbLabel
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
//pr($req);pr($bp);
?>
<div id="locationError" class="alert alert-danger">
    <a class="close" data-dismiss="alert">×</a>
    <h4 class="alert-heading">Error!</h4>
    Please select location first.
</div>
<?php if ($this->Session->read('choosed_location_id') != '') { ?>
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Session->flash() ?>

            <hr>
            <div class="col-md-3">
                <?php
                echo $this->Form->input('single_multiple', array(
                    'id' => 'single_multiple',
                    'label' => __('Single/Multiple'),
//                    'options' => array('single' => 'Single', 'multiple' => 'Multiple'),
		    'options' => array('multiple'=>'Multiple'),
                    'selected' => array('single')
                ));
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id='multiple_coupon'>
                <div class="col-md-5">
                    <?php
                    // Create form and define validation icons for the form
                    echo $this->Form->create('Coupon', array('id' => 'BatchCouponForm',
                        'method' => 'post',
                        'action' => 'add',
                        'class' => 'form-horizontal',
                        'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
                        'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
                        'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
                    ?>
                    <div class="col-md-12">
                        <?php
                        $lcs = $this->Session->read('locations_list');
                        $lc = $lcs[$this->Session->read('choosed_location_id')];
                        if($lc=='ScratchCards'){
                            echo $this->Form->input('no_of_coupons', array(
                            'label' => __('No. of Coupons'),
                            'data-bv-notempty' => 'true',
                            'data-bv-notempty-message' => "Please enter number of coupons",
                            'data-bv-integer' => 'true',
                            'data-bv-integer-message' => 'Only numbers',
                        ));
                        }else{
                            echo $this->Form->input('no_of_coupons', array(
                            'label' => __('No. of Coupons'),
                            'data-bv-notempty' => 'true',
                            'data-bv-notempty-message' => "Please enter number of coupons",
                            'data-bv-integer' => 'true',
                            'data-bv-integer-message' => 'Only numbers',
                            'data-bv-regexp' => "true",
                            'data-bv-regexp-regexp' => "^([0-9]|[1-9][0-9]|100)$",
                            'data-bv-regexp-message' => "Should be less than or equal to 100"
                        ));
                        }
                        unset($lcs);
                        unset($lc);
                        ?>

                        <?php
                        $billing_plan = array();
                        $specialBillingPlanString = '';

                        foreach ($billing_plans as $value) {
                            if ($value['BillingPlan']['cat_bp'] == 'special') {
                                $specialBillingPlanString = '#' . $value['BillingPlan']['id'];
                            }
                            $billing_plan[$value['BillingPlan']['id']] = $value['BillingPlan']['name_bp'] . '(Rs.' . $value['BillingPlan']['price_bp'] . '/-)';
                        }
                        echo $this->Form->input('billing_plan_id', array(
                            'id' => 'billing_plan_id',
                            'label' => __('Billing Plan'),
                            'type' => 'select',
                            'title' => "Choose a billing plan",
                            'options' => $billing_plan,
                                )
                        );
                        echo '<div style="display:none" id="specialBillingPlanString">' . $specialBillingPlanString . '</div>';
                        ?>
                        <div id="lumpsum_price_multiple_div" style="display: none">
                            <?php
                            echo $this->Form->input('lumpsum_price', array(
                                'id' => 'lumpsum_price_multiple',
                                'label' => __('Lumsum Price'),
                                'type' => 'text',
                                'value' => ''
                                    )
                            );
                            echo $this->Form->input('special_description', array(
                                'id' => 'special_description',
                                'label' => __('Description'),
                                'type' => 'text',
                                'value' => ''
                                    )
                            );
                            ?>
                        </div>
                        <div class="col-xs-12 wf-div-right-pad12">
                            <br>
                            <?php
                            echo $this->Form->end(__("Submit"), array('class' => 'btn btn-primary'));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id='single_coupon' style='display:none'>
                <div class="col-md-5">
                    <?php
                    echo $this->Form->create('Coupon', array('id' => 'SingleCouponForm',
                        'action' => 'add',
                        'class' => 'form-horizontal',
                        'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
                        'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
                        'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
                    ?>
                    <div class="col-md-12">
                        <?php
                        echo $this->Form->input('firstname', array(
                            'label' => __('Name'),
                            'data-bv-notempty' => 'false',
                            'data-bv-notempty-message' => "The first name is required and cannot be empty",
                            'data-bv-regexp-regexp' => "^[A-Za-z]{1,}[\.]{0,1}[A-Za-z]{0,}$",
                            'data-bv-regexp-message' => "The first name can only consist of alphabets and numbers",
                        ));
                        ?>

                        <?php
                        /* echo $this->Form->input('cust_id', array(
                          'type' => 'text',
                          'label' => __('Room No.'),
                          'data-bv-regexp' => "true",
                          'data-bv-integer' => 'true',
                          'data-bv-integer-message' => 'Only numbers'
                          )); */
                        echo $this->Form->input('cust_id', array(
                            'type' => 'text',
                            'label' => __('Room No.'),
                            'data-bv-notempty' => 'false',
                            'data-bv-notempty-message' => "Room no. is required and cannot be empty",
                            'data-bv-regexp' => "true",
                            'data-bv-regexp-regexp' => "^[A-Za-z0-9]{1,}[\.]{0,1}[A-Za-z0-9]{0,}$",
                            'data-bv-regexp-message' => "The room no. can only consist of alphabets and numbers, with no blank space",
                        ));
                        ?>

                        <?php
                        echo $this->Form->input('email', array(
                            'label' => __('Email'),
                        ));
                        ?>

                        <?php
                        echo $this->Form->input('mac', array(
                            'label' => __('MAC Address'),
                            'data-bv-notempty' => 'false',
                            'data-bv-notempty-message' => "MAC is required and cannot be empty",
                            'data-bv-regexp' => "true",
                            'data-bv-regexp-regexp' => "^([0-9A-Fa-f]{2}[:-]?){5}([0-9A-Fa-f]{2})$",
                            'data-bv-regexp-message' => "Enter a valid MAC address",
                        ));
                        ?>

                        <?php
                        $billing_plan = array();
                        $specialBillingPlanString = '';

                        foreach ($billing_plans as $value) {
                            if ($value['BillingPlan']['cat_bp'] == 'special') {
                                $specialBillingPlanString = '#' . $value['BillingPlan']['id'];
                            }
                            $billing_plan[$value['BillingPlan']['id']] = $value['BillingPlan']['name_bp'] . '(Rs.' . $value['BillingPlan']['price_bp'] . '/-)';
                        }
                        echo $this->Form->input('billing_plan_id', array(
                            'id' => 'billing_plan_id',
                            'label' => __('Billing Plan'),
                            'type' => 'select',
                            'title' => "Choose a billing plan",
                            'options' => $billing_plan,
                                )
                        );
                        echo '<div style="display:none" id="specialBillingPlanString">' . $specialBillingPlanString . '</div>';
                        ?>
                        <div id="lumpsum_price_multiple_div" style="display: none">
                            <?php
                            echo $this->Form->input('lumpsum_price', array(
                                'id' => 'lumpsum_price_multiple',
                                'label' => __('Lumsum Price'),
                                'type' => 'text',
                                'value' => ''
                                    )
                            );
                            echo $this->Form->input('special_description', array(
                                'id' => 'special_description',
                                'label' => __('Description'),
                                'type' => 'text',
                                'value' => ''
                                    )
                            );
                            ?>
                        </div>
                        <div class="col-xs-12 wf-div-right-pad12">
                            <br>
                            <?php echo $this->Form->end(__("Submit"), array('class' => 'btn btn-primary')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php //echo $this->Form->end(__("Submit"));     ?>
        </div>
    </div>
    <?php
}
?>

