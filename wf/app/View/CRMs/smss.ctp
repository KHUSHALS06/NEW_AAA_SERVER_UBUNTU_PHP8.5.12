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
    $(document).ready(function() {
        $('#crm_sms').bootstrapValidator();
//        $('#crm_sms').submit(function(e) {
//            var txtarea = tinyMCE.get('sms_message').getContent();//$('#').val();
//            //alert(txtarea);
//            if ((txtarea == "") || (txtarea == null)) {
//                //$("#email_message").attr('style', 'border-color: #953B39');
//                $("#sms_messageErrorIcon").attr('style', 'display:inline');
//                $("#sms_messageError").attr('style', 'display:inline;color:#B94A48');
//                $('input[type="submit"]').attr('disabled', 'disabled');
//                return false;
//            } else {
//                $("#sms_messageErrorIcon").attr('style', 'display:none');
//                $("#sms_messageError").attr('style', 'display:none');
//                $('input[type="submit"]').removeAttr('disabled');
//                return true;
//            }
//        });
    });
</script>

<?php echo $this->element('locations_list') ?>
<?php
// $breadcrumbLabel;
$breadcrumb = array(
    array(
        'label' => 'SMS',
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
<div class="row">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-mobile-phone"></i> Compose</a></li>
        <li>
            <a href= "<?php echo $this->request->webroot ?>c_r_ms/smsLog" id="emailLog"><i class="fa fa-inbox"></i> Sent</a>
        </li>
    </ul>
    <div class="col-md-12">
        <?php
        /*
        echo '<br>';
        echo $this->Html->link(
                //$this->Html->tag('i', '', array('class' => 'fa fa-times')), '#UsersModalDeactivate', array(
                __('SMS Gateway Configuration'), '#smsGateWayConfig', array(
            'class' => 'btn btn-default pull-right',
            'data-toggle' => 'modal',
            'role' => 'button',
            'escape' => false), false);
         * 
         */
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <?php
        echo $this->Form->create('CRM', array(
            'action' => 'smss',
            'method' => 'post',
            'id' => 'crm_sms',
            'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>
        <div class="col-md-5">

            <?php
            $to['all'] = 'all';
            $to[] = $phoneDetails;
            echo $this->Form->input('to', array(
                'label' => __('To'),
                'multiple' => 'multiple',
                'type' => 'select',
                'options' => $to,
                'selected' => ($to != '') ? $to : 'all'
            ));
            echo $this->Form->input('toAll', array(
                'type' => 'hidden',
                'value' => $hiddenPhoneList!=''?implode(", ", $hiddenPhoneList):''
            ));

            echo $this->Form->input('message', array(
                'label' => __('Message'),
                'type' => 'textArea',
                'id' => 'sms_message',
                'autocomplete' => 'off',
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "Please enter a message",
                
            ));
            ?>
            <i id="sms_messageErrorIcon" data-bv-icon-for="data[CommissionChallan][to]" class="form-control-feedback glyphicon glyphicon-remove" style="display: none"> </i>
            <br><small id ="sms_messageError" data-bv-result="VALID" data-bv-for="data[CommissionChallan][to]" data-bv-validator="notEmpty" class="help-block" style="display: none"> Please write a message</small>
            <div class="col-xs-12 wf-div-right-pad12">
                <br>
            <?php
            echo '<br/>';
            echo $this->Form->end(__("Send", array('id' => 'sendEmail')));
            ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smsGateWayConfig" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="closeSmsGateWayConfig" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">SMS Gateway Configuration</h4>
            </div>
            <?php
            if ($this->Session->read('choosed_location_id')) {
                ?>
                <div class="modal-body">
                    <?php
                    echo $this->Form->create('CRM', array(
                        'action' => 'setSmsGetway',
                        'method' => 'POST',
                        'id' => 'sms_getway_config_form'
                    ));
                    echo $this->Form->input('id', array(
                        'type' => 'hidden',
                        'value' => (key_exists('Location', $smsGateWay) && $smsGateWay['Location']['id'] != '') ? $smsGateWay['Location']['id'] : '',
                    ));
                    echo $this->Form->input('sms_gateway', array(
                        'label' => __('Gateway'),
                        'type' => 'text',
                        'value' => (key_exists('Location', $smsGateWay) && $smsGateWay['Location']['sms_gateway'] != '') ? $smsGateWay['Location']['sms_gateway'] : '',
                    ));
                    echo $this->Form->input('sms_gateway_auth_key', array(
                        'label' => __('Authentication Key'),
                        'type' => 'text',
                        'value' => (key_exists('Location', $smsGateWay) && $smsGateWay['Location']['sms_gateway_auth_key'] != '') ? $smsGateWay['Location']['sms_gateway_auth_key'] : '',
                    ));
                    echo $this->Form->input('sms_gateway_user', array(
                        'label' => __('Username'),
                        'type' => 'text',
                        'value' => (key_exists('Location', $smsGateWay) && $smsGateWay['Location']['sms_gateway_user'] != '') ? $smsGateWay['Location']['sms_gateway_user'] : '',
                    ));
                    echo $this->Form->input('sms_gateway_pass', array(
                        'label' => __('Password'),
                        'type' => 'password',
                        'value' => (key_exists('Location', $smsGateWay) && $smsGateWay['Location']['sms_gateway_pass'] != '') ? $smsGateWay['Location']['sms_gateway_pass'] : '',
                    ));
                    echo $this->Form->input('confirm_sms_gateway_pass', array(
                        'label' => __('Confirm Password'),
                        'type' => 'password',
                        'value' => (key_exists('Location', $smsGateWay) && $smsGateWay['Location']['sms_gateway_pass'] != '') ? $smsGateWay['Location']['sms_gateway_pass'] : '',
                    ));
                    echo $this->Form->input('sms_gateway_senderid', array(
                        'label' => __('Sender Id'),
                        'type' => 'text',
                        'value' => (key_exists('Location', $smsGateWay) && $smsGateWay['Location']['sms_gateway_senderid'] != '') ? $smsGateWay['Location']['sms_gateway_senderid'] : '',
                    ));
//                    echo $this->Form->input('sms_gateway_template', array(
//                        'label' => __('Template'),
//                        'type' => 'textArea',
//                        'value' => (key_exists('Location', $smsGateWay) && $smsGateWay['Location']['sms_gateway_template'] != '') ? $smsGateWay['Location']['sms_gateway_template'] : '',
//                    ));
                    echo $this->Form->end('Save');
                    ?>
                    <!-- The form is placed inside the body of modal -->

                </div>
                <?php
            } else {
                ?>
                <div class="modal-body">
                    <div class="modal-body alert-danger">
                        <h5>Please select a location first.</h5>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

