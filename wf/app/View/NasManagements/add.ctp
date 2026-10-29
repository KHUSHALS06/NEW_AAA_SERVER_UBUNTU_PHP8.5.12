
<?php
/**
 * This ctp consist of form to add a new billing plan
 * 
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 * @author Preeti Joseph<preeti@wifonic.com>
 */
?>
<?php 
$dm = $this->Session->read('locations_domain_list');
$y = $this->Session->read('locations_id_list');
//pr($y);
//pr($dm);
?>
<script>
    var list = <?php echo json_encode($dm)?>;
    var lid = <?php echo json_encode($y) ?>;
     $(document).ready(function(){
          $('#Nasaddform').bootstrapValidator();
    $("#select").change(function(){
        var x = list[$(this).val()];
        var z = lid[$(this).val()];
        
        $("#shortname").val(x);
        $("#locationid").val(z);
    }); 
   }); 
    </script>
    <!--script>
        var username = $('#secret').val();
$('#secret').change(function() {
   $.ajax({
      url: '<?php //echo Router::url(array('controller' => 'NasManagements', 'action' => 'add'), true); ?>',
      type: 'POST',
      data: 'secret=' + username,
      success: function(result){
                 if(result > 0){
                     alert("data exist");// do something if username already exist
                 }
                 else{
                     // do something if username doesn't exist
                 }
               }
      });
});
        </script-->
<?php //echo $this->element('locations_list'); ?>
<?php
// To display the breadcrumb. 'label' is the label to be displayed and 'link' redirects to a particular page
$breadcrumb = array(
    array(
        'label' => 'Nasmanagement',
        'link' => '/NasManagements'
    ),
    array(
        'label' => 'NasManagement'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Session->flash() ?>
        <?php
        // Create form and define validation icons for the form
        echo $this->Form->create('Nas', array(
            'id' => 'Nasaddform',
            'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>
        <hr>
        <div class="col-md-5">
             <?php
                echo $this->Form->input('location_id',array(
                    'label'=>__('LocationName'),
                    'id' => 'select',
                    'type'=> 'select',
                    'options'=> array('select'=>'Select',$locationdomain),
                    'selected'=>array('select'),
                     'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty"
                ))
                ?>
               
            <?php
            echo $this->Form->input('nasname', array(
                'label' => __('nasname'),
                'type' => 'text',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
                'data-bv-regexp' => "false",
                'data-bv-regexp-regexp' => "^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$",
                'data-bv-regexp-message' => "The name can only consist of alphabets, numbers and underscore",
            ));
            ?>
                <?php
            echo $this->Form->input('shortname', array(
                'label' => __('shortname'),
                'id' => 'shortname',
                'type' => 'text',
                'readonly'=> 'true',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9_\s]{1,}[\.]{0,1}[A-Za-z0-9_\s]{0,}$",
                'data-bv-regexp-message' => "The name can only consist of alphabets, numbers and underscore",
            ));
            ?>
                <?php
            echo $this->Form->input('type', array(
                'label' => __('Type'),
                'id'=> 'type',
                'options' => array('select' => 'Select', 'other' => 'Other'),
                'selected' => array('select'),
            ));
            ?>
                 <?php
                 echo $this->Form->input('ports', array(
                'label' => __('ports'),
                'type' => 'text',
                'value'=> '1812',
                 'readonly'=> 'true',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
               // 'data-bv-regexp' => "true",
                //'data-bv-regexp-regexp' => "^[A-Za-z0-9_\s]{1,}[\.]{0,1}[A-Za-z0-9_\s]{0,}$",
                //'data-bv-regexp-message' => "The name can only consist of alphabets, numbers and underscore",
            ));
            ?>
                 <?php
            echo $this->Form->input('secret', array(
                'label' => __('secret'),
                'id'=> 'secret',
                'type' => 'password',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9_\s]{1,}[\.]{0,1}[A-Za-z0-9_\s]{0,}$",
                'data-bv-regexp-message' => "The name can only consist of alphabets, numbers and underscore",
            ));
            ?>
            
                 <?php
	/*
            echo $this->Form->input('server', array(
                'label' => __('server'),
                'type' => 'text',
                'autocomplete' => 'off',
                'data-bv-notempty' => true,
                'data-bv-notempty-message' => "The name is required and cannot be empty",
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "^[A-Za-z0-9_\s]{1,}[\.]{0,1}[A-Za-z0-9_\s]{0,}$",
                'data-bv-regexp-message' => "The name can only consist of alphabets, numbers and underscore",
            ));
	*/
            ?>
                 <?php
            echo $this->Form->input('community', array(
                'label' => __('community'),
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
            echo $this->Form->input('description', array(
                'label' => __('description'),
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
</div>


