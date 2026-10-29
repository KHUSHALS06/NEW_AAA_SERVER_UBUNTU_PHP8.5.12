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
        
        $('#UserGroupId').change(function(){
            if(($("#add_user_location_id").has('option').length > 0) && (($('#UserGroupId').val() == '3') || ($('#UserGroupId').val() == '4') || ($('#UserGroupId').val() == '5'))){
                $("#add_user_location_id option").attr('selected', 'selected');
            } else if(($("#add_user_location_id").has('option').length == 0) && (($('#UserGroupId').val() == '3') || ($('#UserGroupId').val() == '4') || ($('#UserGroupId').val() == '5'))){
                $("#locationsList").attr('style', 'display:none');
            } else {
                $("#locationsList").attr('style', 'display:block');
                $("#add_user_location_id option").removeAttr('selected', 'selected');
            }
            
        });

        $('#CouponCreateFreeCouponsForm').bootstrapValidator();
        /*$('#CouponCreateFreeCouponsForm').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'data[Location][Location][]': {
                    validators: {
                        choice: {
                            min: 1,
                            //max: 4,
                            message: 'Please choose one or more locations'
                        }
                    }
                }
            }
        });*/
    });

</script>
<?php 
echo $this->element('locations_list'); 
//pr($req);
?>
<?php
// $breadcrumbLabel;
$breadcrumb = array(
    array(
        'label' => 'Room Policyes',
        'link' => '/pms/roomPolicies'
    ),
    array(
        'label' => 'Create Policy',
    ),
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
echo $this->Session->flash();
?>

<div class="row">
    <div class="col-md-12">

        <?php
        echo $this->Form->create('Policy', array('data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>

        <hr>
        <div class="col-md-5">

            <?php
            echo $this->Form->input('room_no', array(
                'label' => __('Room No'),
		'readonly' => 'readonly',
		'value'	=> $room_no	
            ));
            ?>
	    <?php
            echo $this->Form->input('device', array(
                'label' => __('Device'),
                'type' => 'Number',
		'value' => $device,
                'autocomplete' => 'off',
                'data-bv-notempty' => 'true',
                'data-bv-notempty-message' => "No of device is required and cannot be empty",
            ));
            ?>
            <?php
            echo $this->Form->input('location_id', array(
		'type' => 'hidden',
		'value' => $this->Session->read('choosed_location_id')
            ));
		
	    echo $this->Form->input('id', array(
                'type' => 'hidden',
                'value' => $policy_id
            ));
	
            ?>
	    <?php
            echo $this->Form->input('billingplan_id', array(
                'options' => $billing_plans,
		'value' => $selected_bp
            ));
            ?>

            <?php echo $this->Form->end(__("Submit")); ?>
        </div>
    </div>
</div>

