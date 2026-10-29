<?php
//pr($loginPageDetails);
?>
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
<?php
echo $this->Html->script('colorpeaker/spectrum');
echo $this->Html->css('colorpeaker/spectrum');
?>

<script type="text/javascript">

    $(document).ready(function() {
        $('#CmsLoginpageEditForm').bootstrapValidator();
        tinymce.init({
            selector: "textarea",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
//    setup: function(email_message) {
//        email_message.on('focus', function(e) {
//            $("#email_messageErrorIcon").attr('style', 'display:none');
//            $("#email_messageError").attr('style', 'display:none');
//            $('input[type="submit"]').removeAttr('disabled');
//        });
        });
//        $('#CmsLoginpageEditForm').submit(function(e){
//            alert('x');
//            return false;
//        });
//        $('#logoFile').click(function(e){
//            alert('x');
//            return false;
//        });
        $("#customBackgroundColor").spectrum({
            color: tinycolor,
//            flat: bool,
//            showInput: bool,
//            showInitial: bool,
//            allowEmpty: bool,
//            showAlpha: bool,
//            disabled: bool,
//            localStorageKey: string,
//            showPalette: bool,
//            showPaletteOnly: bool,
//            togglePaletteOnly: bool,
//            showSelectionPalette: bool,
//            clickoutFiresChange: bool,
            cancelText: string,
            chooseText: string,
            togglePaletteMoreText: string,
            togglePaletteLessText: string,
            containerClassName: string,
            replacerClassName: string,
            preferredFormat: string,
            maxSelectionSize: int,
            palette: [[string]],
            selectionPalette: [string]
        });
        $("#customFontColor").spectrum({
            color: tinycolor,
//            flat: bool,
//            showInput: bool,
//            showInitial: bool,
//            allowEmpty: bool,
//            showAlpha: bool,
//            disabled: bool,
//            localStorageKey: string,
//            showPalette: bool,
//            showPaletteOnly: bool,
//            togglePaletteOnly: bool,
//            showSelectionPalette: bool,
//            clickoutFiresChange: bool,
            cancelText: string,
            chooseText: string,
            togglePaletteMoreText: string,
            togglePaletteLessText: string,
            containerClassName: string,
            replacerClassName: string,
            preferredFormat: string,
            maxSelectionSize: int,
            palette: [[string]],
            selectionPalette: [string]
        });
    });

</script>
<?php
// $breadcrumbLabel;
$breadcrumb = array(
    array(
        'label' => 'Login Page',
        'link' => '/cms_loginpages'
    ),
    array(
        'label' => "Edit"
    )
);

echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
<div class="row">
    <div class="col-md-10"><!--h3><?php //echo __('Users')                                                  ?></h3--></div>
    <div class="col-md-2">
        <?php
        echo $this->Html->link(
            __('Reset Theme'), '#UsersModalDeactivate', array(
            'class' => 'btn-reset-theme-modal btn btn-primary',
            'data-toggle' => 'modal',
            'role' => 'button',
            'data-uid' => $loginPageDetails['0']['CmsLoginpage']['id'],
            'data-uname' => $loginPageDetails['0']['Location']['location_name'],
            'escape' => false), false);
        ?>

    </div>
</div>

<div class="row">
    <!--    <div class="col-md-12">
            <div class="col-md-1 action-column pull-right">
    <?php
    echo $this->Form->create('CmsLoginpage', array('action' => 'resetTheme'));
    echo $this->Form->input('id', array('type' => 'hidden', 'value' => $loginPageDetails['0']['CmsLoginpage']['id']));
    echo $this->Form->end('Set to defult');
    ?>
            </div>
        </div>-->
    <div class="col-md-12">
        <?php
        echo $this->Form->create('CmsLoginpage', array('action' => 'edit', 'method' => 'post',
            'enctype' => 'multipart/form-data',
            'id' => 'CmsLoginpageEditForm',
            'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
        ?>

        <hr>
        <div class="col-md-8">
            <?php
            echo $this->Form->input('id', array(
                'type' => 'hidden',
                'value' => $loginPageDetails['0']['CmsLoginpage']['id']
            ));
            ?>

            <?php
            echo $this->Form->input('logo_file', array(
                'label' => __('Logo'),
                'id' => 'logoFile',
                'type' => 'file',
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "\.(bmp|gif|jpg|jpeg|jpe|png|BMP|GIF|JPG|JPEG|JPE|PNG)$",
                'data-bv-regexp-message' => "The image format is incorrect."
            ));
            ?>
        </div>
        <div class="col-md-8">
            <img src="<?php echo $this->request->webroot ?>cms_loginpages/displayLogo/<?php echo $loginPageDetails['0']['CmsLoginpage']['id'] ?>/" width="50" height="50">
        </div>
        <div class="col-md-8"><?php
            echo $this->Form->input('background_file', array(
                'label' => __('Background Image'),
                'type' => 'file',
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "\.(bmp|gif|jpg|jpeg|jpe|png|BMP|GIF|JPG|JPEG|JPE|PNG)$",
                'data-bv-regexp-message' => "The image format is incorrect."
            ));
            //pr($loginPageDetails);
            ?>
        </div>
        <div class="col-md-8">
            <img src="<?php echo $this->request->webroot ?>cms_loginpages/displayBackGround/<?php echo $loginPageDetails['0']['CmsLoginpage']['id'] ?>/" width="50" height="50">
        </div>
        <div class="col-md-8">
            <?php
//            echo $this->Form->input('tariff_display', array(
//                'label' => __('Tariff display on login page'),
//                'id' => 'tariff_display',
//                'type' => 'select',
//                'options' => array('1' => 'Yes', '0' => 'No'),
//                'selected' => $loginPageDetails['0']['CmsLoginpage']['tariff_display']
//            ));
            ?>
            <?php
            echo $this->Form->input('notice', array(
                'label' => __('Notice'),
                'type' => 'text',
                'value' => $loginPageDetails['0']['CmsLoginpage']['notice'],
                'autocomplete' => 'off',
            ));
            ?>
            <?php
            echo $this->Form->input('bg_color', array(
                'label' => __('Theme Color'),
                'type' => 'color',
                'value' => $loginPageDetails['0']['CmsLoginpage']['bg_color'],
                'id' => 'customBackgroundColor'
            ));
            ?>
            <?php
            echo $this->Form->input('font_color', array(
                'label' => __('Theme Font Color'),
                'type' => 'color',
                'value' => $loginPageDetails['0']['CmsLoginpage']['font_color'],
                'id' => 'customFontColor'
            ));
            ?>
            <?php
            echo $this->Form->input('terms_and_conditions', array(
                'label' => __('Terms and Conditions'),
                'type' => 'textarea',
                'value' => $loginPageDetails['0']['CmsLoginpage']['terms_and_conditions'],
                'autocomplete' => 'off',
                'id' => 'terms_and_conditions',
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "Please enter a message",
//                'data-bv-regexp' => "true",
//                'data-bv-regexp-regexp' => "^[A-Za-z0-9\s]{1,}[\.]{0,1}[A-Za-z0-9\s]{0,}$",
//                'data-bv-regexp-message' => "Name can only consist of alphabets and numbers",
            ));
            ?>

            <?php
            echo $this->Form->input('footer', array(
                'label' => __('Footer'),
                'type' => 'textarea',
                'value' => $loginPageDetails['0']['CmsLoginpage']['footer'],
                'autocomplete' => 'off',
                'id' => 'terms_and_conditions',
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "Please enter a message",
//                'data-bv-regexp' => "true",
//                'data-bv-regexp-regexp' => "^[A-Za-z0-9\s]{1,}[\.]{0,1}[A-Za-z0-9\s]{0,}$",
//                'data-bv-regexp-message' => "Name can only consist of alphabets and numbers",
            ));
            ?>


            <?php
//            echo $this->Form->textarea($loginPageDetails['0']['CmsLoginpage']['footer'], array(
//                'id' => 'content',
//                'default' => 'footer'
//            ));
            ?>
            <div class="col-xs-12 wf-div-right-pad12">
                <br>
                <?php
//                if (AuthComponent::user('Group.name') == Configure::read('Application.wf_admin') || AuthComponent::user('Group.name') == Configure::read('Application.admin')) {
//                    echo $this->Form->end(__("Submit"), array('id' => 'submitUserEditForm'));
//                } else {
                echo $this->Form->end(__("Submit"));
                //}
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="UsersModalDeactivate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="myModalLabel"><?php echo __('Reset Theme') ?></h4>
            </div>
            <div class="modal-body">
                <p><?php echo __('Are you sure to reset the theme for location:  ') ?><span class="label-uname strong"></span> ?</p>
            </div>
            <div class="modal-footer">

                <?php
                echo $this->Form->create('CmsLoginpage', array('action' => 'resetTheme'), array('class' => 'btn btn-danger'));
                echo $this->Form->input('id', array('id' => 'themeId', 'type' => 'hidden', 'value' => ''));
                echo $this->Form->input('name', array('id' => 'themeLocation', 'type' => 'hidden', 'value' => ''));
                //echo $this->Form->input('user_token', array('type' => 'hidden', 'value' => $userToken));
                echo $this->Form->end('Reset', array('class' => 'btn btn-primary pull-left'));
                ?>

                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>

                <?php //echo $this->Html->link(__('Activate'), "/users/activate/#{uid}", array('class' => 'btn btn-primary activate-user-link'))  ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
