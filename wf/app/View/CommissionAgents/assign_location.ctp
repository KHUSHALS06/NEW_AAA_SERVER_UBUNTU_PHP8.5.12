<?php
/**
 * This ctp consist of form to edit an exisiting billing plan
 * 
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@gmail.com>
 * @author Preeti Joseph<preeti@wifonic.com>
 */
?>
<script type="text/javascript">

    $(document).ready(function() {
        
        $('#UserGroupId').change(function(){ 
            if(($("#add_user_location_id").has('option').length > 0) && (($('#UserGroupId option:selected').text() == 'wf admin') || ($('#UserGroupId option:selected').text() == 'wf noc') || ($('#UserGroupId option:selected').text() == 'wf engineer'))){
                $("#add_user_location_id option").attr('selected', 'selected');
            } else if(($("#add_user_location_id").has('option').length == 0) && (($('#UserGroupId option:selected').text() == 'wf noc') || ($('#UserGroupId option:selected').text() == 'wf engineer'))){
                $("#locationsList").attr('style', 'display:none');
            } else {
                $("#locationsList").attr('style', 'display:block');
                $("#add_user_location_id option").removeAttr('selected', 'selected');
            }
            
        });

        //$('#CommissionAgentAddForm').bootstrapValidator();
        $('#CommissionAgentsLocationAssignLocationForm').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'data[CommissionAgentsLocation][location_id][]': {
                    validators: {
                        choice: {
                            min: 1,
                            max: 1,
                            message: 'Please choose one or more locations'
                        }
                    }
                }
            }
        });
    });

</script>
<?php //echo $this->element('locations_list') ?>
<?php
// $breadcrumbLabel;
$breadcrumb = array(
    array(
        'label' => 'Commission',
        'link' => '#'
    ),
    array(
        'label' => 'Commission Agents',
        'link' => '/commission_agents'
    ),
    array(
        'label' => $breadcrumbLabel
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<div class="row">
    <div class="col-md-12">


        <?php
        echo $this->Form->create('CommissionAgentsLocation', array('method' => 'post', 'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>
        <h4><?php echo $agent_first_name ." ". $agent_last_name ?></h4>
        <hr>
        <div class="col-md-5">

            <?php
            echo $this->Form->input('commission_agent_id', array(
                'type' => 'hidden',
                'value' => $commission_agent_id
            ));
            ?>
            <?php
            echo $this->Form->input('commission_on', array(
                'label' => __('Commission On'),
                'type' => 'select',
                'options' => $commission_on
                    //'selected' => !empty($user['group_id']) ? $user['group_id'] : '',
                    //'onclick' => 'return hello()'
            ));
            ?>

            <?php
            echo $this->Form->input('commission_percent', array(
                'label' => __('Commission Percent'),
                'autocomplete' => 'off',
                'type' => 'text',
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "The commission percent is required and cannot be empty",
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "(^(?:99|\d{1,2})(?:\.\d{1,2})?$)",
                'data-bv-regexp-message' => "The commission value entered is incorrect. Enter in the format 0-100 or 0.00-99.99"
            ));
            ?>

            <?php
            echo $this->Form->input('location_id', array(
                'id' => 'add_agent_location',
                'label' => __('Location'),
                'type' => 'select',
                //'multiple' => 'multiple',
                'title' => "Choose one or more locations",
                'options' => $locations
            ));
            ?>

            <?php echo $this->Form->end(__("Submit")); ?>
        </div>

    </div>
</div>
</div>

