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
<?php echo $this->Form->create($this->params->params['controller'], array( 'action' => $this->params->params['action'], 'class' => 'navbar-form', 'role' => 'search')); ?>
<div class="input-group" style="margin: -10px">
    <?php //echo $this->Form->input('search', array('type' => 'hidden')); ?>

    <?php echo $this->Form->input('search', array('type' => 'text', 'label' => false, 'class' => 'input-sm', 'placeholder' => 'Search', 'id' => 'search'));
    ?>
    <div class="input-group-btn">
        <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i></button>
    </div>
</div>
</form>
<?php //pr($this->request->data)?>