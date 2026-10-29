<?php
/**
 * This is the default page which displays the list of billing plans
 * 
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhaya@wifonicnetworks.com>
 * @author Supriya Sanas<supriya@wifonicnetworks.com>
 */
?>

<script type="text/javascript">

    $(document).ready(function() {
    // Get the number of columns in a table and assign it to colspan attribute
    var numberOfColumns = document.getElementById('nasTable').rows[0].cells.length;
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
            'title': "View"
    });
    $('.actionDeactivate').tooltip({
    'show': true,
            'placement': 'bottom',
            'title': "Deactivate"
    });
    });</script>

<?php
// Paginator for the table 
echo $this->Paginator->options(array(
    'update' => '#page-wrapper',
    'before' => $this->Js->get('#spinner')->effect(
            'fadeIn', array('buffer' => false)
    ),
    'complete' => $this->Js->get('#spinner')->effect(
            'fadeOut', array('buffer' => true)
    ),
    'evalScripts' => TRUE
));
?>
<?php echo $this->element('locations_list') ?>
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

<!--
<div id="locationError" class="alert alert-danger">
    <a class="close" data-dismiss="alert">×</a>
    <h4 class="alert-heading">Error!</h4>
    To view billing plans, please select location first.
</div> -->
<div class="row">
    <?php echo $this->Session->flash(); ?>
    <?php $this->Paginator->options(array('url' => array("0"))); ?>

    <?php
//if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
    ?>
        <div class="col-md-10"><!--h3><?php //echo __('Billing Plan')     ?></h3--></div>
    <div class="col-md-2">
        <?php
//echo $this->Html->link(__('Add User'), '/users/add', array('class' => 'btn btn-default pull-right', 'style' => 'margin-top: 15px')) 
        echo $this->Html->link(__('add New'), array('controller' => 'NasManagements', 'action' => 'add'), array('class' => 'btn btn-default pull-right'));
        ?>
    </div>
</div>
<div class="row">

    <div class="col-12">
        <?php //echo $this->Session->flash()  ?>

        <!--hr-->
        <?php //echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>'))));   ?>
        <hr>

        <div class="table-responsive">
            <table id="nasTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <!--th><?php //echo $this->Paginator->sort('id', '#')  ?></th-->
                        <th>
                            <?php
//  echo "nasname";
                            echo $this->Paginator->sort('nasname', array(
                                'asc' => __('Nasname') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Nasname') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ));
                            ?>
                        </th>
                        <th>
                            <?php
//  echo "shortname";
                            echo $this->Paginator->sort('shortname', array(
                                'asc' => __('shortname') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('shortname') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ));
                            ?>
                        </th>
                        <th>
                            <?php
//   echo "Type";
                            echo $this->Paginator->sort('type', array(
                                'asc' => __('type') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('type') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ));
                            ?>
                        </th>
                        <th>
                            <?php
//  echo "Port";
                            echo $this->Paginator->sort('description', array(
                                'asc' => __('Description') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Description') . ' <i class="fa fa-caret-down pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>
                        <th>
                            <?php
//   echo "secret";
                            echo $this->Paginator->sort('secret', array(
                                'asc' => __('secret') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('secret') . ' <i class="fa fa-caret-down pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>
                        <th>
                            <?php
//   echo "Community";
                            echo $this->Paginator->sort('community', array(
                                'asc' => __('community') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('community') . ' <i class="fa fa-caret-down pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>

<!--th><?php //echo $this->Paginator->sort('location_id', __('Location'))              ?></th-->
                        <th style="color: #428BCA"><?php echo __('Actions') ?></th>

                    </tr>
                </thead>
                <tbody>
                    <?php if (count($nas) > 0) { ?>  
                        <tr>
                            <td class="col-sm-3"><?php echo $this->element('search', array('columnName' => 'nasname')); ?></td>
                            <td class="col-sm-3"><?php echo $this->element('search', array('columnName' => 'shortname')); ?></td> 

                            <?php
                           // pr($pings);
                            foreach ($nas as $nas) {
                                ?>
                               <tr>
                                   <?php if(isset($pings)){ ?>
                                <?php if($pings[$nas['Nas']['nasname']] == ""){ ?>
                                    <td style="color: red"><?php echo ($nas['Nas']['nasname']); ?></td>
                                <?php }else{ ?>
                                     <td style="color:green"><?php echo ($nas['Nas']['nasname']); ?></td>
                                <?php } ?>
                                   <?php }else{ ?>
                                      <td ><?php echo ($nas['Nas']['nasname']); ?></td>
                                   <?php } ?>
                                <td><?php echo ($nas['Nas']['shortname']); ?></td>
                                <td><?php echo ($nas['Nas']['type']); ?></td>
                                <td><?php echo ($nas['Nas']['description']); ?></td>
                                <td>******</td>
                                <td><?php echo ($nas['Nas']['community']); ?></td>
                                <td width="100px">

                                    <div class="row col-md-12 action-column">
                                        <div class="col-md-1 action-column">
                                            <?php
                                            echo $this->Form->create('NasManagements', array('action' => 'view'));
                                            echo $this->Form->input('id', array('type' => 'hidden', 'value' => $nas['Nas']['id']));
                                            //echo $this->Form->end('View', array('class' => 'bttextn-xs text', 'type' => 'image', 'src' => 'img/view_20by20.png'));
                                            echo $this->Form->end('view_20by20.png', array('div' => false, 'class' => 'action-button actionView'));
                                            ?>

                                        </div>
                                        <div class="col-md-1 action-column"></div>
                                        <div class="col-md-1 action-column">
                                            <?php
                                            echo $this->Form->create('NasManagement', array('action' => 'edit'));
                                            echo $this->Form->input('id', array('type' => 'hidden', 'value' => $nas['Nas']['id']));
                                            echo $this->Form->input('target', array('type' => 'hidden', 'value' => 'first'));
                                            echo $this->Form->input('nasname', array('type' => 'hidden', 'value' => $nas['Nas']['nasname']));
                                            echo $this->Form->input('community', array('type' => 'hidden', 'value' => $nas['Nas']['community']));
                                            echo $this->Form->input('description', array('type' => 'hidden', 'value' => $nas['Nas']['description']));
                                            //echo $this->Form->end('Edit', array('class' => 'btn-xs text', 'type' => 'image', 'src' => 'img/edit_20by20.png'));
                                            echo $this->Form->end('edit_20by20.png', array('div' => false, 'class' => 'action-button actionEdit'));
                                            //echo $this->Form->end();
                                            ?>
                                        </div>
                                        <div class="col-md-1 action-column"></div> 
                                        <div  class="col-md-1 action-column">
                                            <?php
                                            echo $this->Html->link(
                                                    //$this->Html->tag('i', '', array('class' => 'fa fa-times')), '#UsersModalDeactivate', array(
                                                    $this->Html->image('crossout.png'), '#nasdelete', array(
                                                'class' => 'btn-deactivate-modal actionDeactivate',
                                                'data-toggle' => 'modal',
                                                'role' => 'button',
                                                'data-uid' => $nas['Nas']['id'],
                                                'escape' => false), false);
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>

                            </td>     
                        </tr>

                    <?php } else { ?>
                        <tr><td id="emptyTableMessage" align="center"><i><?php echo __("No record found") ?></i></td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <?php echo $this->Paginator->numbers(); ?>
        </div> 
        <br/>
        <?php echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>')))); ?>
        <?php echo $this->Js->writeBuffer(); ?>

    </div>
</div>
<div class="modal fade" id="nasdelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="myModalLabel"><?php echo __('Delete data') ?></h4>
            </div>
            <div class="modal-body">
                <?php //echo $user['User']['id']    ?>
                <p><?php echo __('Are you sure you want to delete the record ') ?><span class="label-uname strong"></span> ?</p>
            </div>
            <div class="modal-footer">

                <?php
                echo $this->Form->create('NasManagements', array('action' => 'delete'));
                echo $this->Form->input('id', array('id' => 'userIdForDeactivate', 'type' => 'hidden', 'value' => ''));
                //echo $this->Form->input('name', array('id' => 'userNameForDeactivate', 'type' => 'hidden', 'value' => ''));
                echo $this->Form->end('Delete', array('class' => 'btn btn-danger pull-left'));
                ?>

                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
            </div>
            <?php //echo $this->Html->link(__('Deactivate'), "/users/deactivate/#{uid}", array('class' => 'btn btn-danger deactivate-user-link'))    ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php // }  ?>
<?php //} ?>
<script>
    // Inline editing
//    $(function() {
//        var newURL = window.location.protocol + "//" + window.location.host + "" + window.location.pathname;
//        $.fn.editable.defaults.mode = 'inline';
//        /*$('.editBPName').editable({
//         url: newURL+'/update_billingplan_name'
//         });*/
//        $('.editAlias').editable({
//            url: newURL + '/update_alias',
//            validate: function(value) {
//                if ($.trim(value) == '') {
//                    return 'This field is required';
//                }
//                if (!(/^[a-zA-Z\s]*$/.test(value))) {
//                    return 'Only alphabets allowed';
//                }
//            }
//        });
//        $('.editEmail').editable({
//            url: newURL + '/update_email'
//        });
//        $('.group').editable({
//            url: newURL + '/update_group',
//            title: 'Select group'
//        });
    });

</script>




