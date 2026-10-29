<?php
/**
 * This is the default page which displays the list of billing plans
 * 
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 * @author Preeti Joseph<preeti@wifonic.com>
 */
?>

<script type="text/javascript">

    $(document).ready(function () {
        // Get the number of columns in a table and assign it to colspan attribute
        var numberOfColumns = document.getElementById('billingPlansTable').rows[0].cells.length;
        $("#emptyTableMessage").attr('colspan', numberOfColumns);

        // Tooltip for edit action
        $('.actionEdit').tooltip({
            'show': true,
            'placement': 'bottom',
            'title': "Edit"
        });

        // Tooltip for view action
        $('.actionView').tooltip({
            'show': true,
            'placement': 'bottom',
            'title': "Delete"
        });

    });

</script>
<?php
// Paginator for the table 
echo $this->Paginator->options(array(
    'update' => '#page-wrapper',
    'before' => $this->Js->get('#spinner')->effect(
            'fadeIn', array('buffer' => false)
    ),
    'complete' => $this->Js->get('#spinner')->effect(
            'fadeOut', array('buffer' => false)
    ),
    'evalScripts' => TRUE
));
?>
<?php echo $this->element('locations_list') ?>
<?php
$breadcrumb = array(
    array(
        'label' => 'Network Management',
        //'link' => '/network_managements'
    ),
    array(
        'label' => 'MAC Binding'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<!--
<div id="locationError" class="alert alert-danger">
    <a class="close" data-dismiss="alert">×</a>
    <h4 class="alert-heading">Error!</h4>
    To view billing plans, please select location first.
</div> -->
<?php echo $this->Session->flash(); ?>
<?php $this->Paginator->options(array('url' => array("0"))); ?>
<?php
if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
    ?>
    <div class="row">
        <div class="col-md-10"><!--h3><?php //echo __('Billing Plan')     ?></h3--></div>
        <div class="col-md-2">
            <?php
            //echo $this->Html->link(__('Add User'), '/users/add', array('class' => 'btn btn-default pull-right', 'style' => 'margin-top: 15px')) 
            echo $this->Html->link(__('Add MAC'), array('controller' => 'network_managements', 'action' => 'add'), array('class' => 'btn btn-default pull-right'));
            ?>
        </div>
    </div>

    <div class="row">

        <div class="col-12">
            <?php echo $this->Session->flash() ?>

            <!--hr-->
            <?php //echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>'))));  ?>
            <hr>

            <div class="table-responsive">
                <table id="billingPlansTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <!--th><?php //echo $this->Paginator->sort('id', '#')            ?></th-->
                            <th>
                                <?php
	                          echo __('#');
                                ?>
                            </th>
                            <th style="color: #428BCA">
                                <?php
                                echo __('MAC');
//                                echo $this->Paginator->sort('mac-address', array(
//                                    'asc' => __('MAC') . ' <i class="fa fa-caret-up  pull-right"></i>',
//                                    'desc' => __('Mac') . ' <i class="fa fa-caret-down  pull-right"></i>'
//                                        ), array(
//                                    'escape' => false
//                                ));
                                ?>
                            </th>
                            <th style="color: #428BCA">
                                <?php
                                echo __('Type');
//                                echo $this->Paginator->sort('type', array(
//                                    'asc' => __('Type') . ' <i class="fa fa-caret-up  pull-right"></i>',
//                                    'desc' => __('Type') . ' <i class="fa fa-caret-down  pull-right"></i>'
//                                        ), array(
//                                    'escape' => false
//                                ));
                                ?>
                            </th>
                            <th style="color: #428BCA">
                                <?php
                                echo __('Remark');
//                                echo $this->Paginator->sort('comment', array(
//                                    'asc' => __('Remark') . ' <i class="fa fa-caret-up  pull-right"></i>',
//                                    'desc' => __('Remark') . ' <i class="fa fa-caret-down pull-right"></i>'
//                                        ), array(
//                                    'escape' => false
//                                ))
                                ?>
                            </th>
                            <th style="color: #428BCA"><?php echo __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($ipBinding)){
                            if (count($ipBinding) > 0) {
                            ?>

<!--                            <tr>
                                <td class="col-sm-2"><?php //echo $this->element('search', array('columnName' => 'name_bp')) ?></td>
                                <td><?php //echo $this->element('search', array('columnName' => 'time_bp'))      ?></td>
                                <td><?php //echo $this->element('search', array('columnName' => 'price_bp'))      ?></td>
                                <td><?php //echo $this->element('search', array('columnName' => 'type_bp'))     ?></td>
                                <td><?php //echo $this->element('search', array('columnName' => 'cat_bp'))      ?></td>
                            </tr>-->
                            <?php
			    $slNo = 1;
                            foreach ($ipBinding as $ipb) {
                                if (array_key_exists('mac-address', $ipb)) {
                                    
//                                    pr($ipb);
                                    ?>
                                    <tr>
                                        <td width="50px"><?php echo $slNo; $slNo++ ?></td>
                                        <!-- inline edit javascript code written in the end --> 
                                        <!--<td><div class ="editBPName" data-type="text" data-pk="<?php echo $ipb['mac-address'] ?>" data-name="name_bp"><?php echo $ipb['mac-address'] ?></div></td>-->
                                       <?php if($ipb['type'] == 'bypassed'){ ?>
                                        <td style="background-color:#d6f5d6"><div><?php echo $ipb['mac-address'] ?></div></td>
                                       <?php }else{ ?>
                                        <td style="background-color:#ffb2b2;"><div><?php echo $ipb['mac-address'] ?></div></td>
                                       <?php } ?>
                                        <td><div><?php echo isset($ipb['type'])?$ipb['type']:''; ?></div></td>
                                        <td><div><?php echo isset($ipb['comment'])?$ipb['comment']:''; ?></div></td>
                                        <td width="100px">
                                            <div class="row col-md-12 action-column">
                                                <div class="col-md-1 action-column">
                                                    <?php
                                                    echo $this->Form->create('network_managements', array('action' => 'delete'));
                                                    echo $this->Form->input('id', array('type' => 'hidden','value' => $ipb['.id']));
                                                    echo $this->Form->input('mac', array('type' => 'hidden','value' => $ipb['mac-address']));
                                                    echo $this->Form->end('crossout.png', array('div' => false, 'class' => 'action-button actionView'));
                                                    ?>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    <?php } else { ?>
                        <tr><td id="emptyTableMessage" align="center"><i><?php echo __("No record found") ?></i></td></tr>
                        <?php } ?> <?php } else { ?>
                            <tr><td id="emptyTableMessage" align="center"><i><?php echo __("No record found") ?></i></td></tr>
                      <?php  }?>
                </table>
            </div>
            <!--<div class="paginator">-->
            <?php // echo $this->Paginator->numbers(); ?>
            <!--</div>--> 
            <!--<br/>-->
    <?php // echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>')))); ?>
    <?php // echo $this->Js->writeBuffer(); ?>

        </div>
    </div>
    <?php
}
?>
<div class="modal fade" id="UsersModalDeactivate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="myModalLabel"><?php echo __('Deactivate user') ?></h4>
            </div>
            <div class="modal-body">
                <p><?php echo __('Are you sure you want to deactivate the user ') ?><span class="label-uname strong"></span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
<?php echo $this->Html->link(__('Deactivate'), "/users/deactivate/#{uid}", array('class' => 'btn btn-danger deactivate-user-link')) ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="UsersModalActivate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="myModalLabel"><?php echo __('Activate user') ?></h4>
            </div>
            <div class="modal-body">
                <p><?php echo __('Are you sure you want to activate the user ') ?><span class="label-uname strong"></span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
<?php echo $this->Html->link(__('Activate'), "/users/activate/#{uid}", array('class' => 'btn btn-primary activate-user-link')) ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add User</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->

            </div>
        </div>
    </div>
</div>





