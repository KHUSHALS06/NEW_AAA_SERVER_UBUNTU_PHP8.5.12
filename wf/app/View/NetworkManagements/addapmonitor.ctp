
<script>
    $(document).ready(function () {
        $('#Addapmonitor').bootstrapValidator();
         window.onload = function () {
                    document.getElementById("select").focus();
                };
    });
</script>
<?php //echo $this->element('locations_list'); ?>
<?php echo $this->Session->flash(); ?>
<?php
$breadcrumb = array(
    array(
        'label' => 'AP Monitoring',
        'link' => '/NetworkManagements/apmonitor'
    ),
    array(
        'label' => 'ADD'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
<div class="row">

    <?php //if ($this->Session->read('choosed_location_id') != '') { ?>

    <!--    <div id="locationError" class="alert alert-danger">
        <a class="close" data-dismiss="alert">×</a>
        <h4 class="alert-heading">Error!</h4>
        Please select location first.
    </div>-->
    <div class="col-md-12">

        <?php
        // Create form and define validation icons for the form
        echo $this->Form->create('Apmonitor', array(
            'id' => 'Addapmonitor',
            'method' => 'post',
            'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>
        <hr>
        <div class="col-md-5">
             <?php
      
//        echo $this->Form->input('location_id', array(
//            'label' => __('LocationName'),
//            'id' => 'select',
//            'type' => 'select',
//            'options' => array($choosed_location => $locationdomain[$choosed_location]),
//           
//        ))
        ?>

            <?php
            echo $this->Form->input('mac_address', array(
                'label' => __('Mac Address'),
                'type' => 'text',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])$",
                'data-bv-regexp-message' => "Please enter valid Mac address",
            ));
            ?>
            <?php
            echo $this->Form->input('Ap', array(
                'label' => __('Access point'),
                'type' => 'select',
                'options' => array('select' => 'select', 'indoor'=> 'indoor', 'outdoor'=> 'outdoor'),
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9_\s]{1,}[\.]{0,1}[A-Za-z0-9_\s]{0,}$",
                'data-bv-regexp-message' => "The name can only consist of alphabets, numbers and underscore",
            ));
            ?>
            <?php
            echo $this->Form->input('location', array(
                'label' => __('Location'),
                'type' => 'text',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9_\s]{1,}[\.]{0,1}[A-Za-z0-9_\s]{0,}$",
                'data-bv-regexp-message' => "The name can only consist of alphabets, numbers and underscore",
            ));
            ?>
            <?php
            echo $this->Form->input('status', array(
                'label' => __('status'),
                'type' => 'hidden',
                'value' => 'fail',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
            ));
            ?>
            <?php
            echo $this->Form->input('Ip', array(
                'label' => __('Ip Address'),
                'id' => 'Ip',
                'type' => 'text',
                // 'readonly'=> 'true',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$",
                'data-bv-regexp-message' => "Please enter valid Ip",
            ));
            ?>

            <?php
            echo $this->Form->input('user', array(
                'label' => __('user'),
                'type' => 'hidden',
                'readonly' => 'true',
                'value' => $user,
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
            ));
            ?>
            <?php
            echo $this->Form->input('created', array(
                'type' => 'hidden',
                'data-bv-notempty' => "true",
                'value' => date('Y-m-d H:i:s'),
                    // 'readOnly' => false,
                    //'value' => ($nas['shortname'] != '') ? $nas['shortname'] : ''
            ));
            ?>

            <?php
            /*
              echo $this->Form->input('login_display', array(
              'label' => __('Login Display'),
              'options' => array('0' => 'No', '1' => 'Yes'),
              //'data-bv-notempty-message' => "The plan duration is required and cannot be empty",
              ));
             * 
             */
            ?> 
            <div class="col-xs-12 wf-div-right-pad12">
                <br>
            <?php echo $this->Form->end('save'); ?>
            </div>
        </div>  
    </div>
<?php // }  ?>
</div>



