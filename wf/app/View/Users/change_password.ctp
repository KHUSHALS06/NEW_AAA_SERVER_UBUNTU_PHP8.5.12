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
        $('#UserChangePasswordForm').bootstrapValidator();
    });
</script>


<?php
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
?>
    <!--h3><?php //echo $label  ?></h3-->
<hr>
<div class="row">
    <div class="col-lg-3">
        <?php
        echo $this->Form->create('User', array('data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh",
            'url' => array(
                'controller' => 'users',
                'action' => 'change_password')));
        ?>
        <?php if ($hash!='') : ?>
            <?php echo $this->Form->input('hash', array('value' => $hash, 'type' => 'hidden')); ?>
        <?php endif; ?>
        <?php
        echo $this->Form->input('current_password', array(
            'label' => __('Current Password'),
            'type' => 'password',
            'data-bv-notempty' => 'true',
            'data-bv-notempty-message' => "The current password is required and cannot be empty",
        ));
        ?>
        <?php
        echo $this->Form->input('password', array(
            'label' => __('New password'),
            'data-bv-notempty' => 'true',
            'data-bv-notempty-message' => "The new password is required and cannot be empty",
            //'data-bv-identical' => 'true',
            //'data-bv-identical-field' => 'data[User][re-password]',
            //'data-bv-identical-message' => 'The password and its confirm are not the same'
        ));
        ?>
        <?php
        echo $this->Form->input('re_password', array(
            'label' => __('Confirm new password'),
            'type' => 'password',
            'data-bv-notempty' => 'true',
            'data-bv-notempty-message' => "The password confirmation is required and cannot be empty",
            'data-bv-identical' => 'true',
            'data-bv-identical-field' => 'data[User][password]',
            'data-bv-identical-message' => 'The confirm password and password are not the same'
        ));
        ?>
        <?php echo $this->Form->end(__('Submit'), array('class' => 'btn btn-default')); ?>
    </div>
</div>

