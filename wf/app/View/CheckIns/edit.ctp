<?php
/**
 * This ctp consist of form to edit the check-in details of guest
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
        $('#CheckInEditForm').bootstrapValidator();
        
        // JQuery datepicker for check-out date
        $('#checkout_date').datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 1,
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
            //showOn: "button",
            //buttonImage: "../img/datepicker.png",
            //buttonImageOnly: true
        });
        
        $('#checkout_date').datepicker('setDate', 'today');
        
        // Revalidate the date when user change it
        $('#checkout_date')
        .change(function(e) { 
            $('#CheckInAddForm').bootstrapValidator('revalidateField', 'data[CheckIn][checkout_date]');
        });

    });

</script>

<?php
// To display the breadcrumb. 'label' is the label to be displayed and 'link' redirects to a particular page
$breadcrumb = array(
    array(
        'label' => 'Occupancy',
        'link' => '/check_ins'
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
        // Create form and define validation icons for the form
        echo $this->Form->create('CheckIn', array('action'=>'edit','method'=>'post', 'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>
        <div class="center">
            <h2><?php //echo $label     ?></h2>
        </div>

        <hr>
        <div class="col-md-5">
            <?php
            echo $this->Form->input('calling_page', array(
                'type' => 'hidden',
                'value' => $calling_page,
            ));
            echo $this->Form->input('id', array(
                'type' => 'hidden',
                'value' => $checkInData['CheckIn']['id'],
            ));
            if(isset($prv_room_no)){
            echo $this->Form->input('prv_room_no', array(
                'type' => 'hidden',
                'value' => $prv_room_no,
            ));
            }
            if(isset($prv_room_iid)){
                echo $this->Form->input('prv_room_iid', array(
                'type' => 'hidden',
                'value' => $prv_room_iid,
            ));
            }
            ?>
            <?php
            /*
            echo $this->Form->input('room_no', array(
                'label' => __('Room No *'),
                'type' => 'text',
                'autocomplete' => 'off',
                'value' => $checkInData['CheckIn']['room_no'],
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "The room no. is required and cannot be empty",
                'data-bv-notempty-message' => "The room no. is required and cannot be empty",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9]{1,}[\.]{0,1}[A-Za-z0-9]{0,}$",
                'data-bv-regexp-message' => "The room no. can only consist of alphabets and numbers, with no blank space",
            ));
             * 
             */
            echo $this->Form->input('room_no', array(
                'label' => __('Room No *'),
                'type' => 'select',
                'options'=> $available_rooooms,
                'selected' => $choosen_room_id,
                'autocomplete' => 'off',
                'data-bv-notempty' => "true",
                'data-bv-regexp' => "true",
                'data-bv-notempty-message' => "The room no. is required and cannot be empty",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9]{1,}[\.]{0,1}[A-Za-z0-9]{0,}$",
                'data-bv-regexp-message' => "The room no. can only consist of alphabets and numbers, with no blank space",
                    //'data-bv-numeric' => 'true',
                    //'data-bv-numeric-message' => 'The room no. can only consist of numbers'
            ));
            ?>

            <?php
            echo $this->Form->input('title', array(
                'label' => __('Title'),
                'options' => array('Mr' => 'Mr', 'Mrs' => 'Mrs', 'Ms' => 'Ms'),
                'selected' => array($checkInData['CheckIn']['title']),
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The duration is required and cannot be empty",
            ));
            ?>
            <?php
            echo $this->Form->input('name', array(
                'label' => __('Name'),
                'type' => 'text',
                'autocomplete' => 'off',
                'value' => $checkInData['CheckIn']['name'],
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9\s]{1,}[\.]{0,1}[A-Za-z0-9\s]{0,}$",
                'data-bv-regexp-message' => "The name can only consist of alphanumeric characters"
            ));
            ?>

            <?php
            echo $this->Form->input('middle_name', array(
                'label' => __('Middle Name'),
                'type' => 'text',
                'autocomplete' => 'off',
                'value' => $checkInData['CheckIn']['middle_name'],
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9\s]{1,}[\.]{0,1}[A-Za-z0-9\s]{0,}$",
                'data-bv-regexp-message' => "The middle name can only consist of alphanumeric characters"
            ));
            ?>

            <?php
            echo $this->Form->input('last_name', array(
                'label' => __('Last Name *'),
                'type' => 'text',
                'autocomplete' => 'off',
                'value' => $checkInData['CheckIn']['last_name'],
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9\s]{1,}[\.]{0,1}[A-Za-z0-9\s]{0,}$",
                'data-bv-regexp-message' => "The last name can only consist of alphanumeric characters"
            ));
            ?>
            <?php
            echo $this->Form->input('checkout_date', array(
                'label' => __('Check Out Time *'),
                'type' => 'text',
                'id' => 'checkout_date',
                'value' => date('d-m-Y', strtotime($checkInData['CheckIn']['checkout_date'])),
                'readOnly' => true,
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "The check-out date is required and cannot be empty",
                'data-bv-date' => "true",
                'data-bv-date-separator' => '-',
                'data-bv-date-format' => "DD-MM-YYYY",
                'data-bv-date-message' => "This is not a valid date. Please use YYYY-MM-DD format"
            ));
            ?>           
            <?php echo $this->Form->end(__("Submit")); ?>
        </div>
    </div>
</div>


