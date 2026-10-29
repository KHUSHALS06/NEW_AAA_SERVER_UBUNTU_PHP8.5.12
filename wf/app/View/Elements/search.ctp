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
<!--div class = "row"-->
<!--div class="col-sm-3 col-md-3 pull-right"-->
<?php //echo $this->Form->create($this->params->params['controller'], array( 'action' => $this->params->params['action'], 'class' => 'navbar-form', 'role' => 'search')); ?>
<!--div class="input-group" style="margin: -10px">
<?php //echo $this->Form->input('search', array('type' => 'hidden', 'value' => $columnName)); ?>

<?php //echo $this->Form->input($columnName, array('type' => 'text', 'label' => false, 'class' => 'input-sm', 'placeholder' => 'Search', 'id' => 'search'));
?>
<!--div class="input-group-btn"-->
    <!--button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i></button>
</div>
</div>
</form-->
<?php //pr($this->request->data)?>
<!--<div class="table-responsive">-->
<form class="navbar-form" role="search" action="<?php echo $this->params->webroot ?><?php echo $this->request->params['controller'] ?>/<?php echo $this->request->params['action'] ?>" method="post">
    <input type="hidden" name="search" value="<?php echo $columnName ?>">
    <div class="input-group" style="margin: -15px">
        <input type="text" class="form-control input-sm" size="1" placeholder="Search" name="<?php echo $columnName ?>" value="<?php
        if (isset($this->request->data[$columnName])) {
            echo $this->request->data[$columnName];
        }
        ?>">
        <div class="input-group-btn">
            <button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        <?php //echo $this->Js->submit(__('Submit', true), array('update' => '#page-wrapper', 'class' => 'btn btn-default btn-sm','url' => array('action' => $this->request->params['action'])));?>
        </div>
<?php //echo $columnName."-".$this->request->params['action'].'</br>';  ?>
    </div>
</form>
<!--</div>-->

<?php
//echo $this->Form->create($this->params->params['controller'], array('action' => 'index', 'class' => 'navbar-form', 'role' => 'search'));
//echo $this->Form->input('search');
//echo $this->Form->end();
?> 
<!--/div-->
<!--/div-->


