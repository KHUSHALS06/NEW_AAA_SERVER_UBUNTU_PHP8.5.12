<script type="text/javascript">
    $('#LocationAddLocation4Form').bootstrapValidator();
</script>
<?php
echo $this->Form->create('CmsLoginpage', array('action' => 'uploadBackgroundImage', 'method' => 'post', 'type'=>'file'));
echo $this->Form->input('backgroundImage', array(
                'label' => __('Configuration File'),
                'type' => 'file',
                'data-bv-regexp' => "true",
                'data-bv-regexp-regexp' => "\.(jpg|jpeg|jpe)$",
                'data-bv-regexp-message' => "The configuration file format is incorrect."
            ));
echo $this->Form->end('Submit');

?>