<?php
/**
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 */
?>

<script type="text/javascript">
    //$('#yourdropdownid option:selected').text();
    $(document).ready(function() {
        $('#addRoomForm').bootstrapValidator();
        $('#rooms').keyup(validateTextarea);
        if ($('#header_id option:selected').val() == '-1') {
            $('#custom_header_div').show();
        }
        $('#header_id').change(function() {
            //alert($('#header_id').val());
            if ($('#header_id option:selected').val() == '-1') {
                $('#custom_header_div').show();
            } else {
                $('#custom_header_div').hide();
            }
        });
        if ($('#element_type_id option:selected').text() == 'radio' || $('#element_type_id option:selected').text() == 'checkbox' || $('#element_type_id  option:selected').text() == 'select') {
            $('#number_of_option').show();
            document.getElementById('element_options').innerHTML = '';
            for (var i = 0; i < $('#number_options').val(); i++) {
                document.getElementById('element_options').innerHTML = document.getElementById('element_options').innerHTML + '<label for="FeedbackFormOption' + (i + 1) + '">Option' + (i + 1) + '</label><input name="data[FeedbackForm][options][' + i + ']" class="form-control" data-bv-notempty="1" data-bv-notempty-message="Username is required" data-bv-regexp="true" placeholder="Titel" maxlength="255" id="FeedbackFormName" type="text">'
            }
        }

        $('#element_type_id').change(function() {
            //alert($('#element_type_id').val());
            if ($('#element_type_id option:selected').text() == 'radio' || $('#element_type_id option:selected').text() == 'checkbox' || $('#element_type_id  option:selected').text() == 'select') {
                $('#number_of_option').show();
                document.getElementById('element_options').innerHTML = '';
                for (var i = 0; i < $('#number_options').val(); i++) {
                    document.getElementById('element_options').innerHTML = document.getElementById('element_options').innerHTML + '<label for="FeedbackFormOption' + (i + 1) + '">Option' + (i + 1) + '</label><input name="data[FeedbackForm][options][' + i + ']" class="form-control" data-bv-notempty="1" data-bv-notempty-message="Username is required" data-bv-regexp="true" placeholder="Titel" maxlength="255" id="FeedbackFormName" type="text">'
                }
            } else {
                $('#number_of_option').hide();
                document.getElementById('element_options').innerHTML = '';
            }
        });
        $('#number_options').change(function() {
            document.getElementById('element_options').innerHTML = '';
            for (var i = 0; i < $('#number_options').val(); i++) {
                document.getElementById('element_options').innerHTML = document.getElementById('element_options').innerHTML + '<label for="FeedbackFormOption' + (i + 1) + '">Option' + (i + 1) + '</label><input name="data[FeedbackForm][options][' + i + ']" class="form-control" data-bv-notempty="1" data-bv-notempty-message="Username is required" data-bv-regexp="true" placeholder="Titel" maxlength="255" id="FeedbackFormName" type="text">'
            }
        });
    });

    function validateTextarea() {
        var errorMsg = "Please match the format requested.";
        var textarea = this;
        var pattern = new RegExp('^' + $(textarea).attr('pattern') + '$');
        // check each line of text
        $.each($(this).val().split("\n"), function() {
            // check if the line matches the pattern
            var hasError = !this.match(pattern);
            if (typeof textarea.setCustomValidity === 'function') {
                textarea.setCustomValidity(hasError ? errorMsg : '');
            } else {
                // Not supported by the browser, fallback to manual error display...
                $(textarea).toggleClass('error', !!hasError);
                $(textarea).toggleClass('ok', !hasError);
                if (hasError) {
                    $(textarea).attr('title', errorMsg);
                } else {
                    $(textarea).removeAttr('title');
                }
            }
            return !hasError;
        });
    }

</script>
<?php
echo $this->element('locations_list');
$breadcrumb = array(
    array(
        'label' => ' Room Management',
        'link' => 'room_manage_list'
    ),
    array(
        'label' => 'Room Management'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Session->flash() ?>
        <?php
        echo $this->Form->create('CheckIn', array(
            'id' => 'addRoomForm',
            'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>
        <div class="center">
            <h2><?php //echo $label           ?></h2>
        </div>
        <hr>
        <div class="col-md-5">
            <?php
            echo $this->Form->input('room', array(
                'label' => __('Rooms(Enter the rooms separated by coma. Eg: 123,434,434)'),
                'id' => 'rooms',
                'type' => 'textarea',
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "Field can not be empty",
                'pattern' => "^[A-Za-z0-9,' ']{1,}[\.]{0,1}[A-Za-z0-9]{0,}$",
                'data-bv-regexp-message' => "The room no. can only consist of alphabets and numbers, with no blank space",
            ));
            echo 'Existing Rooms:<br/>';
            echo $room_list;
            //pr();
            ?>
            <br><br>
            <?php echo $this->Form->end(__("Submit")); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="AddFeedbackHeader" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="closeSingleCouponFormModal" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Header</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <!-- The form is placed inside the body of modal -->
                    <?php echo $this->element('addFeedbackHeader'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
