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
    $(document).ready(function() {
        $('#element_type_id').change(function() {
            if ($('#element_type_id option:selected').text() == 'radio' || $('#element_type_id option:selected').text() == 'checkbox' || $('#element_type_id  option:selected').text() == 'select') {
                $('#number_of_option').show();
                document.getElementById('element_options').innerHTML = '';
                for (var i = 0; i < $('#number_options').val(); i++) {
                    document.getElementById('element_options').innerHTML = document.getElementById('element_options').innerHTML + '<label for="FeedbackFormOption' + (i + 1) + '">Option' + (i + 1) + '</label><input name="data[FeedbackForm][options][' + i + ']" class="form-control" data-bv-notempty="1" data-bv-notempty-message="Username is required" data-bv-regexp="true" placeholder="Titel" maxlength="255" id="FeedbackFormName" type="text"><br/>'
                }
                $('#element_options').show();
            } else {
                $('#number_of_option').hide();
                document.getElementById('element_options').innerHTML = '';
                $('#element_options').hide();
            }
        });
        $('#number_options').change(function() {
            document.getElementById('element_options').innerHTML = '';
            for (var i = 0; i < $('#number_options').val(); i++) {
                document.getElementById('element_options').innerHTML = document.getElementById('element_options').innerHTML + '<label for="FeedbackFormOption' + (i + 1) + '">Option' + (i + 1) + '</label><input name="data[FeedbackForm][options][' + i + ']" class="form-control" data-bv-notempty="1" data-bv-notempty-message="Username is required" data-bv-regexp="true" placeholder="Titel" maxlength="255" id="FeedbackFormName" type="text"><br/>'
            }
        });
    });

</script>
<?php
//echo $this->element('locations_list');
$breadcrumb = array(
    array(
        'label' => 'Feedback',
        'link' => '/feedback_forms'
    ),
    array(
        'label' => 'add'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<div class="row">
    <div class="col-md-12">
        <?php
        // $breadcrumbLabel;
        /*
          $breadcrumb = array(
          array(
          'label' => 'Users',
          'link' => '/users'
          ),
          array(
          'label' => $breadcrumbLabel
          )
          );
          echo $this->element('breadcrumb', array('links' => $breadcrumb));
         * 
         */
        ?>

        <?php
        echo $this->Form->create('FeedbackForm', array(
            'action' => 'editFeedbackQuestion',
            'method' => 'post',
            'id' => 'Feedback',
            'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>
        <div class="center">
            <h2><?php //echo $label      ?></h2>
        </div>
        <hr>
        <div class="col-md-5">
            <?php
            //pr($question_number);
            echo $this->Form->input('header_id', array(
                'label' => __('Feedback Header'),
                'id' => 'header_id',
                'options' => $feedback_header,
                'selected' => $header_id,
                'empty' => 'Select Type',
                'empty' =>'Select a Header',
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "Please select a header",
                    //'selected' => ($user['location_id']!='') ? $user['location_id'] : '',
                    //'onclick' => 'return hello()'
            ));
            echo $this->Form->input('colum_name', array(
                'type' => 'hidden',
                'value' => $question_number
            ));
            echo $this->Form->input('id', array(
                'type' => 'hidden',
                'value' => $q_id
            ));
            echo $this->Form->input('location_id', array(
                'type' => 'hidden',
                'value' => $this->Session->read('choosed_location_id')
            ));
            echo $this->Form->input('name', array(
                'label' => __('Titel'),
                'type' => 'textarea',
                'value' => $title,
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "Field can not be empty",
                    
                    //'data-bv-regexp-regexp' => "^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$",
                    //'data-bv-regexp-message' => "Username can only consist of alphabets",
                    //'value' => ($user['username']!='') ? $user['username'] : ''
            ));
            ?>

            <?php
            echo $this->Form->input('element_type_id', array(
                'label' => __('Type'),
                'id' => 'element_type_id',
                'options' => $element_types,
                'selected' => $type_id,
                'empty' => 'Select Type',
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "Please select a tpye"
                    //'selected' => ($user['location_id']!='') ? $user['location_id'] : '',
                    //'onclick' => 'return hello()'
            ));
            
            ?>
            <div id="number_of_option" style="<?php if ($number_of_options == 0){echo 'display:none';}?>">
                <?php
                echo $this->Form->input('number_options', array(
                    'label' => __('Number Of Options'),
                    'id' => 'number_options',
                    'options' => array('2' => '2', '3' => '3', '4' => '4', '5' => '5'),
                    'selected' => $number_of_options
                ));
                ?>
            </div>
            <div id="element_options" style="<?php if ($number_of_options == 0){echo 'display:none';}?>">
                <?php
                if ($number_of_options > 0) {
                    for ($i = 0; $i < $number_of_options; $i++) {
                        echo '<label for="FeedbackFormOption' . ($i + 1) . '">Option' . ($i + 1) . '</label><input name="data[FeedbackForm][options][' . $i . ']" class="form-control" data-bv-notempty="1" data-bv-notempty-message="Username is required" data-bv-regexp="true" placeholder="Titel" maxlength="255" id="FeedbackFormName" type="text" value="' . $options[$i] . '"><br/>';
                    }
                }
                ?> 
            </div>
            <?php echo '<br/><br/>'?>
            <?php echo $this->Form->end(__("Submit")); ?>
        </div>
        </div>
    </div>
