
<script>
     $(document).ready(function(){
          $('#Naseditform').bootstrapValidator();
      });
      </script>
 <div class="row">
     <?php //echo $data; ?>
     <?php
$breadcrumb = array(
    array(
        'label' => 'NasManagement',
        'link' => '/NasManagements'
    ),
    array(
        'label' => 'Nas management'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
      <?php
            if (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin')) {
                ?>
    <div class="col-md-12" style="color: ">
<?php
//echo "Edit the details here";

        // Create form and define validation icons for the form
       echo $this->Form->create('NasManagement', array('action' => 'edit', 'method' => 'post',
           'id' => 'Naseditform',
           'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
           'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
           'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
   ?>
          <hr>
        <div class="col-md-5">
            <?php
            echo $this->Form->input('id', array(
                'type' => 'hidden',
                //'value' => $nas['Nas']['id']
            ));
            ?>
            <?php
            echo $this->form->input('pos',array(
                'type'=>'hidden',
                'value'=>'second form2'
            ))
            ?>
            <?php
            echo $this->Form->input('nasname', array(
                'label' => __('nasname'),
                'type' => 'text',
                 'data-bv-notempty' => "true",
               // 'data-bv-regexp-regexp' => "^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$",
               // 'data-bv-regexp-message' => "The nasname can only consist of alphabets, numbers and underscore",
                //'value' => $nasname
               // 'readOnly' => true,
                //'value' => ($nas['nasname'] != '') ? $nas['nasname'] : ''
            ));
            ?>
            <?php
            echo $this->Form->input('community', array(
                'label' => __('community'),
                'type' => 'text',
                 'data-bv-notempty' => "true",
                'readOnly' => false,
                //'value' => ($nas['shortname'] != '') ? $nas['shortname'] : ''
            ));
            ?>
            <?php
            echo $this->Form->input('description', array(
                'label' => __('description'),
                'type' => 'text',
                 'data-bv-notempty' => "true",
               // 'readOnly' => true,
              //  'value' => ($nas['shortname'] != '') ? $nas['shortname'] : ''
            ));
            ?>
            
             <div class="col-xs-12 wf-div-right-pad12">
                <br>
                <?php echo $this->Form->end(__("Submit")); ?>
            </div>
            <?php } ?>
    </div>
    </div>
 </div>
