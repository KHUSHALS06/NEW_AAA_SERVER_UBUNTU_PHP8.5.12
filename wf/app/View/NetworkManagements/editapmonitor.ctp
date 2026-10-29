
<script>
     $(document).ready(function(){
          $('#editapmonitor').bootstrapValidator();
      });
      </script>
 <div class="row">
     <?php //echo $data; ?>
     <?php
$breadcrumb = array(
    array(
        'label' => 'AP Monitoring',
        'link' => '/network_managements/apmonitor'
    ),
    array(
        'label' => 'Edit'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
      <?php
           // if (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin')) {
                ?>
    <div class="col-md-12" style="color: ">
<?php
//echo "Edit the details here";

        // Create form and define validation icons for the form
       echo $this->Form->create('NetworkManagement', array('action' => 'editapmonitor', 'method' => 'post',
           'id' => 'editapmonitor',
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
            echo $this->Form->input('mac_address', array(
                'label' => __('Mac Address'),
                'type' => 'text',
                 'data-bv-notempty' => "true",
               // 'data-bv-regexp-regexp' => "^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$",
               // 'data-bv-regexp-message' => "The nasname can only consist of alphabets, numbers and underscore",
                //'value' => $nasname
               // 'readOnly' => true,
                //'value' => ($apmonitoring['mac_address'] != '') ? $apmonitoring['mac_address'] : ''
            ));
            ?>
            <?php
            echo $this->Form->input('Ip', array(
                'label' => __('Ip Address'),
                'type' => 'text',
                 'data-bv-notempty' => "true",
                'readOnly' => false,
                //'value' => ($nas['shortname'] != '') ? $nas['shortname'] : ''
            ));
            ?>
            <?php
            echo $this->Form->input('modified', array(
                'type' => 'hidden',
                 'data-bv-notempty' => "true",
                //'value' => date('Y-m-d H:i:s'),
               // 'readOnly' => false,
                //'value' => ($nas['shortname'] != '') ? $nas['shortname'] : ''
            ));
            ?>
             <?php
            echo $this->Form->input('location', array(
                 'label' => __('Location'),
                'type' => 'text',
                 'data-bv-notempty' => "true",
                //'value' => date('Y-m-d H:i:s'),
               // 'readOnly' => false,
                //'value' => ($nas['shortname'] != '') ? $nas['shortname'] : ''
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
             <div class="col-xs-12 wf-div-right-pad12">
                <br>
                <?php echo $this->Form->end(__("Submit")); ?>
            </div>
            <?php //} ?>
    </div>
    </div>
 </div>

