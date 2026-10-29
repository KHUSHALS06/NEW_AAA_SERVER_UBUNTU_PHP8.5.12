<?php
/**
 * This ctp consist of form to edit an exisiting billing plan
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
        $('#BillingPlanEditForm').bootstrapValidator();

        // JQuery datepicker for expiration date
        $('#expiration_date').datepicker({
            dateFormat: 'dd-mm-yy',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
                    //showOn: "button",
                    //buttonImage: "../img/datepicker.png",
                    //buttonImageOnly: true
        });
        
        
        $('#maxTimeBp').on('keyup blur', function(e) {
            if ($.isNumeric($('#maxTimeBp').val())) {
                $("#maxTimeBp").attr('style', '');
                $("#maxTimeBpErrorIcon").attr('style', 'display:none');
                $("#maxTimeBpError").attr('style', 'display:none');
                $("#maxTimeBp").attr('style', '');
                $("#valueValid").attr('style', 'display:none');
                if ($('#maxTimeBp').val() != '' && $('#timeBp').val() != '') {
                    if ($('#maxTimeBp').val() < $('#timeBp').val()) {
                        $("#maxTimeBp").attr('style', 'border-color: #953B39');
                        $("#maxTimeBpErrorIcon").attr('style', 'display:inline');
                        $("#maxTimeBpError").attr('style', 'display:inline;color:#B94A48');
                        $("#maxTimeBpError").html("Must be greater then duration");
                        return false;
                    } else {
                        $("#maxTimeBp").attr('style', 'border-color: #008A00');
                        $("#valueValid").attr('style', 'display:inline');
                        $("#maxTimeBpErrorIcon").attr('style', 'display:none');
                        $("#maxTimeBpError").attr('style', 'display:none');
                        $("input[type=submit]").removeAttr('disabled');
                        return true;
                    }
                }
            } else {
                $("#maxTimeBp").attr('style', 'border-color: #953B39');
                $("#maxTimeBpErrorIcon").attr('style', 'display:inline');
                $("#maxTimeBpError").attr('style', 'display:inline;color:#B94A48');
                $("#maxTimeBpError").html("Must be a number");// = "Must be a number";
                return false;
            }


        });
        $('#BillingPlanAddForm').submit(function(e) {
            if ($.isNumeric($('#maxTimeBp').val())) {
                $("#maxTimeBp").attr('style', '');
                $("#maxTimeBpErrorIcon").attr('style', 'display:none');
                $("#maxTimeBpError").attr('style', 'display:none');
                if ($('#maxTimeBp').val() != '' && $('#timeBp').val() != '') {
                    if ($('#maxTimeBp').val() < $('#timeBp').val()) {
                        $('html, body').animate({
                            scrollTop: $("#timeBp").offset().top
                        }, 10);
                        $("#maxTimeBp").attr('style', 'border-color: #953B39');
                        $("#maxTimeBpErrorIcon").attr('style', 'display:inline');
                        $("#maxTimeBpError").attr('style', 'display:inline;color:#B94A48');
                        $("#maxTimeBpError").html("Must be greater then duration");
                        $("input[type=submit]").attr('disabled', 'disabled');
                        return false;
                    } else {
                        $("#maxTimeBp").attr('style', 'border-color: #008A00');
                        $("#valueValid").attr('style', 'display:inline');
                        $("#maxTimeBpErrorIcon").attr('style', 'display:none');
                        $("#maxTimeBpError").attr('style', 'display:none');
                        return true;
                    }
                }
            } else {
                $('html, body').animate({
                    scrollTop: $("#timeBp").offset().top
                }, 10);
                $("#maxTimeBp").attr('style', 'border-color: #953B39');
                $("#maxTimeBpErrorIcon").attr('style', 'display:inline');
                $("#maxTimeBpError").attr('style', 'display:inline;color:#B94A48');
                $("#maxTimeBpError").html("Must be a number");// = "Must be a number";
                $("input[type=submit]").attr('disabled', 'disabled');
                return false;
            }
        });
    });

</script>

<?php
// To display the breadcrumb. 'label' is the label to be displayed and 'link' redirects to a particular page
$breadcrumb = array(
    array(
        'label' => 'Billing Plans',
        'link' => '/billing_plans'
    ),
    array(
        'label' => $breadcrumbLabel
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<div class="row">
    <div class="col-md-12" style="color: ">

        <?php
        // Create form and define validation icons for the form
        echo $this->Form->create('BillingPlan', array('action' => 'edit', 'method' => 'post',
            'id' => 'BillingPlanAddForm',
            'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>

        <hr>
        <div class="col-md-5">
            <?php
            echo $this->Form->input('id', array(
                'type' => 'hidden',
                'value' => $billingPlan['id'],
            ));
            ?>
            <?php
            echo $this->Form->input('cat_bp', array(
                'label' => __('Category'),
                'type' => 'text',
                'readOnly' => true,
                'value' => ($billingPlan['cat_bp'] != '') ? $billingPlan['cat_bp'] : ''
            ));
            ?>

            <?php
            //pr($billingPlan['name_bp']);
            echo $this->Form->input('name_bp', array(
                'label' => __('Name'),
                'type' => 'text',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9_\s]{1,}[\.]{0,1}[A-Za-z0-9_\s]{0,}$",
                'data-bv-regexp-message' => "The name can only consist of alphabets, numbers and underscore",
                'value' => ($billingPlan['name_bp'] != '') ? $billingPlan['name_bp'] : ''
            ));
            ?>
            <?php
            echo $this->Form->input('time_bp', array(
                'label' => __('Duration (in minute)'),
                'type' => 'text',
                'id' => 'timeBp',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The duration is required and cannot be empty",
                'data-bv-numeric' => 'true',
                'data-bv-numeric-message' => 'The duration can only consist of numbers',
                'value' => ($billingPlan['time_bp'] != '') ? $billingPlan['time_bp'] : ''
            ));
            ?>
            <?php
            echo $this->Form->input('maximum_time_bp', array(
                'label' => __('Validity(in minutes & greater than duration)'),
                'type' => 'text',
                'id' => 'maxTimeBp',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The maximum time is required and cannot be empty",
                'data-bv-numeric' => 'true',
                'data-bv-numeric-message' => 'The maximum time can only consist of numbers',
                'value' => ($billingPlan['maximum_time_bp'] != '') ? $billingPlan['maximum_time_bp'] : ''
            ));
            ?>
            <span id="valueValid" style="display:none"><i class="fa fa-check"></i></span>
            <i id="maxTimeBpErrorIcon"  data-bv-icon-for="data[CommissionChallan][to]" class="form-control-feedback glyphicon glyphicon-remove" style="display:none"></i>
            <br>
            <small id ="maxTimeBpError" data-bv-result="VALID" data-bv-for="data[CommissionChallan][to]" data-bv-validator="notEmpty"  class="help-block" style="display: none">Must be greater than duration</small>
            <br>
            <?php
            echo $this->Form->input('type_bp', array(
                'label' => __('Type'),
                'options' => array('time' => 'Time', 'data' => 'Data'),
                'selected' => ($billingPlan['type_bp'] != '') ? $billingPlan['type_bp'] : '',
            ));
            ?>
            <?php
            echo $this->Form->input('price_bp', array(
                'label' => __('Price (in <i class="fa fa-inr"></i>)'),
                'placeholder' => __('Price'),
                'type' => 'text',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The price is required and cannot be empty",
                'data-bv-numeric' => 'true',
                'data-bv-numeric-message' => 'The price can only consist of numbers',
                'value' => ($billingPlan['price_bp'] != '') ? $billingPlan['price_bp'] : ''
            ));
            ?>

            <?php
            echo $this->Form->input('currency_bp', array(
                'label' => __('Currency'),
                'options' => array('INR' => 'INR'),
                'selected' => ($billingPlan['currency_bp'] != '') ? $billingPlan['currency_bp'] : ''
                    //'data-bv-notempty-message' => "The currency is required and cannot be empty",
            ));
            ?>

            <?php
            echo $this->Form->input('timetofinish_bp', array(
                'label' => __('From Activation'),
                'options' => array('0' => 'No', '1' => 'Yes'),
                'selected' => ($billingPlan['timetofinish_bp'] != '') ? $billingPlan['timetofinish_bp'] : '',
                'data-bv-notempty-message' => "The plan duration is required and cannot be empty",
            ));
            ?>
            <?php
            echo $this->Form->input('simultanous_bp', array(
                'label' => __('Simultanious Use'),
                'options' => array('0' => 'No', '1' => 'Yes'),
                'selected' => ($billingPlan['simultanous_bp'] != '') ? $billingPlan['simultanous_bp'] : '',
                    //'data-bv-notempty-message' => "The plan duration is required and cannot be empty",
            ));
            ?>

            <?php
            echo $this->Form->input('redirection_url_bp', array(
                'label' => __('Redirection URL'),
                'type' => 'url',
                'autocomplete' => 'off',
                'data-bv-notempty' => "false",
                'data-bv-uri-allowlocal' => 'false',
                'data-bv-uri-message' => "The URL is not valid. Start with http://",
                'value' => ($billingPlan['redirection_url_bp'] != '') ? $billingPlan['redirection_url_bp'] : ''
            ));
            ?>



            <?php
            echo $this->Form->input('maximum_octet_bp', array(
                'label' => __('Maximum Data (in MB)'),
                'type' => 'text',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The maximum data is required and cannot be empty",
                'data-bv-numeric' => 'true',
                'data-bv-numeric-message' => 'The maximum data can only consist of numbers',
                'value' => ($billingPlan['maximum_octet_bp'] != '') ? $billingPlan['maximum_octet_bp'] : ''
            ));
            ?>
            <?php
            echo $this->Form->input('bandwidth_upload_bp', array(
                'label' => __('Upload Speed'),
                'type' => 'select',
                'options' => array('0' => 'Unlimited', '128' => '128 Kbps', '256' => '256 Kbps', '512' => '512 Kbps', '1024' => '1 Mbps', '2048' => '2 Mbps', '4096' => '4 Mbps', '5120' => '5 Mbps', '6114' => '6 Mbps', '8192' => '8 Mbps', '10240' => '10 Mbps', '12288' => '12 Mbps', '16384' => '16 Mbps', '20480' => '20 Mbps'),
                'selected' => array(($billingPlan['bandwidth_upload_bp'] != '') ? $billingPlan['bandwidth_upload_bp'] : '0')
            ));
            ?>
            <?php
            //$downLoadSpeed = Configure::read('ProjectVariables.internetSpeed');
            echo $this->Form->input('bandwidth_download_bp', array(
                'label' => __('Download Speed'),
                'type' => 'select',
                'options' => array('0' => 'Unlimited', '128' => '128 Kbps', '256' => '256 Kbps', '512' => '512 Kbps', '1024' => '1 Mbps', '2048' => '2 Mbps', '4096' => '4 Mbps', '5120' => '5 Mbps', '6114' => '6 Mbps', '8192' => '8 Mbps', '10240' => '10 Mbps', '12288' => '12 Mbps', '16384' => '16 Mbps', '20480' => '20 Mbps'),
                'selected' => array(($billingPlan['bandwidth_download_bp'] != '') ? $billingPlan['bandwidth_download_bp'] : '0')
            ));
            ?>

            <?php
            echo $this->Form->input('publish_bp', array(
                'label' => __('Publish'),
                'options' => array('0' => 'No', '1' => 'Yes'),
                'selected' => ($billingPlan['publish_bp'] != '') ? $billingPlan['publish_bp'] : ''
                    //'data-bv-notempty-message' => "The plan duration is required and cannot be empty",
            ));
            ?>
            <?php
            echo $this->Form->input('expiration_date_bp', array(
                'label' => __('Expiration Data'),
                'type' => 'text',
                'id' => 'expiration_date',
                'readOnly' => true,
                'value' => ($billingPlan['expiration_date_bp'] != '') ? date('d-m-Y', strtotime($billingPlan['expiration_date_bp'])) : ''
            ));
            ?>

            <?php
            /*
              echo $this->Form->input('login_display', array(
              'label' => __('Login Display'),
              'options' => array('0' => 'No', '1' => 'Yes'),
              'selected' => ($billingPlan['currency_bp'] != '') ? $billingPlan['currency_bp'] : ''
              //'data-bv-notempty-message' => "The plan duration is required and cannot be empty",
              ));
             * 
             */
            ?>                      
            <div class="col-xs-12 wf-div-right-pad12">
                <br>
                <?php echo $this->Form->end(__("Submit")); ?>
            </div>
        </div>
    </div>
</div>

