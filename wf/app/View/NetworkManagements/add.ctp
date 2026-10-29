
<?php
/**
 * This ctp consist of form to add the check-in details of guest
 * 
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 */
?>

<script type="text/javascript">

    $(document).ready(function() {

        // Validate the form with Bootstrap validator
        $('#MACBindAddForm').bootstrapValidator();

    });

</script>
<?php echo $this->element('locations_list') ?>
<?php
// To display the breadcrumb. 'label' is the label to be displayed and 'link' redirects to a particular page

$breadcrumb = array(
        array(
            'label' => 'Network Managenent',
        ),
        array(
            'label' => 'MAC Binding',
            'link' => '/network_managements/index'
        ),
        array(
            'label' => 'Add'
        )
    
    );
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Session->flash() ?>

        <?php
        //pr($available_rooooms);
        // Create form and define validation icons for the form
        echo $this->Form->create('MACBind', array('data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>


        <hr>
        <div class="col-md-5">
            <?php
//            echo $this->Form->input('room_no', array(
//                'label' => __('Room No *'),
//                'type' => 'text',
//                'autocomplete' => 'off',
//                'data-bv-notempty' => "true",
//                'data-bv-regexp' => "true",
//                'data-bv-notempty-message' => "The room no. is required and cannot be empty",
//                'data-bv-regexp-regexp' => "^[A-Za-z0-9]{1,}[\.]{0,1}[A-Za-z0-9]{0,}$",
//                'data-bv-regexp-message' => "The room no. can only consist of alphabets and numbers, with no blank space",
//                    //'data-bv-numeric' => 'true',
//                    //'data-bv-numeric-message' => 'The room no. can only consist of numbers'
//            ));
            

//            <?php
//            echo $this->Form->input('title', array(
//                'label' => __('Title'),
//                'options' => array('Mr' => 'Mr', 'Mrs' => 'Mrs', 'Ms' => 'Ms', 'Dr' => 'Dr'),
//                'selected' => array('Mr')
//            ));
//            ?>
            <?php
            
            echo $this->Form->input('mac-address', array(
                'label' => __('MAC Address'),
                'autocomplete' => 'off',
                'data-bv-notempty' => 'true',
                'data-bv-notempty-message' => "MAC address is required and cannot be empty",
                'data-bv-regexp' => "true",
		'data-bv-regexp-regexp' => "^([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])$",
                'data-bv-regexp-message' => "MAC address is invalid",
            ));
            ?>
            
            <?php
            echo $this->Form->input('type', array(
                'label' => __('Action *'),
                'options' => array('blocked' => 'Block','bypassed'=>'Bypass' ),
                'selected' => array('bypassed')
            ));
//            ?>
            <?php
            echo $this->Form->input('comment', array(
                'label' => __('Remark *'),
                'type' => 'text',
                'autocomplete' => 'off',
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "The last name is required and cannot be empty",
            ));
            ?>
            <div class="col-xs-12 wf-div-right-pad12">
                <br>
                <?php echo $this->Form->end(__("Submit")); ?>
            </div>
        </div>
    </div>
</div>


