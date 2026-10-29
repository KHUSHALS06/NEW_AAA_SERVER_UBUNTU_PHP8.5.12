<?php
/* s is the default page which displays the list of billing plans
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
        $("#view").click(function () {
            $("#viewForm").submit();
        });
        $("#sessionDetails").click(function () {
            $("#sessionDetailsForm").submit();
        });
        $("#webLogDetails").click(function () {
            $("#webLogDetailsForm").submit();
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


<?php
$breadcrumb = array(
    array(
        'label' => 'Coupon',
        'link' => '/coupons/index'
    ),
    array(
        'label' => 'Session Details'
    )
);
//echo "USERNAME: " . $this->Session->read('username');
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<?php echo $this->Session->flash(); ?>
<?php $this->Paginator->options(array('url' => array("0"))); ?>
<br>
<div class="row">
    <div class="col-md-10"><!--h3><?php //echo __('Billing Plan')         ?></h3--></div>

</div>

<div class="row">

    <div class="col-12">
        <?php echo $this->Session->flash() ?>

        <!--hr-->
        <?php //echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>'))));  ?>


        <div class="table-responsive">
            <ul class="nav nav-tabs">
                <?php if ((CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin')) || (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.admin'))) { ?>
                    <li>
                        <a href="#view" id="view"><i class="fa fa-user"></i> User Details</a>
                        <form method="post" action="view" id="viewForm" onclick="$(this).closest('form').submit()">
                            <input name="data[Coupon][coupon_id]" type="hidden" value="<?php echo $couponId; ?>">
                        </form>

                    </li>
                <?php } ?>

                <?php if ((CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin')) || (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.admin'))) { ?>
                    <li class="active"><a href="#tabBillingDetails" data-toggle="tab"><i class="fa fa-wifi"></i> Session Logs</a></li>
                <?php } ?>

                <?php if ((CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin')) || (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.admin'))) { ?>
                                   <li>
                                        <a href="#webLogDetails" id="webLogDetails"><i class="fa fa-globe"></i> Web Logs</a>
                                        <form method="post" action="webLogDetails" id="webLogDetailsForm">
                                            <input name="data[Coupon][coupon_id]" type="hidden" value="<?php echo $couponId;?>">
                                            <input name="data[Coupon][username]" type="hidden" value="<?php echo $session[0]['Radacct']['username'] ?>">
                                        </form>
                    
                                    </li>
                <?php } ?>


            </ul>
            <br/>
            <table class="table table-striped table-bordered">
                <tr>
                    <td><strong><?php echo __("Username") ?>:</strong></td>
                    <td><?php
                        if (isset($session[0]['Radacct']['username'])) {
                            echo $session[0]['Radacct']['username'];
                        }
                        ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __("Total  Sessions") ?>:</strong></td>
                    <td><?php echo $totalsession[0][0]['nof'] ?></td>
                </tr>

                <tr>
                    <td><strong><?php echo __("Total Session Time") ?>:</strong></td>
                    <td><?php echo $duration; ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __("Total Data Transfer") ?>:</strong></td>
                    <td><?php echo round($totalDatatransfer, 2) . "&nbsp" . "MB"; ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __("Server IP") ?>:</strong></td>
                    <td><?php echo $this->session->read('session_setails_server_ip') ?></td>
                </tr>
                <tr>
            </table>
            <table id="billingPlansTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <!--th><?php //echo $this->Paginator->sort('id', '#')               ?></th-->
<!--                        <th>
                        <?php
//                            echo $this->Paginator->sort('nasipaddress', array(
//                                'asc' => __('Server IP') . ' <i class="fa fa-caret-up  pull-right"></i>',
//                                'desc' => __('Server IP') . ' <i class="fa fa-caret-down  pull-right"></i>'
//                                    ), array(
//                                'escape' => false
//                            ))
                        ?>
                        </th>-->
                        <th>
                            <?php
                            echo $this->Paginator->sort('callingstationid', array(
                                'asc' => __('Mac') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Mac') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>
                        <th>
                            <?php
                            echo $this->Paginator->sort('framedipaddress', array(
                                'asc' => __('Device IP') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Device IP') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>
                        <th>
                            <?php
                            echo $this->Paginator->sort('acctstarttime', array(
                                'asc' => __('Start time') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Start time') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>
                        <th>
                            <?php
                            echo $this->Paginator->sort('acctstoptime', array(
                                'asc' => __('Stop time') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Stop time') . ' <i class="fa fa-caret-down pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>

                        <th>
                            <?php
                            echo $this->Paginator->sort('acctsessiontime', array(
                                'asc' => __(' Session Time') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __(' Session Time') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>
                        <th>
                            <?php
                            echo $this->Paginator->sort('acctoutputoctets', array(
                                'asc' => __('Download') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Download') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>
                        <th>
                            <?php
                            echo $this->Paginator->sort('acctinputoctets', array(
                                'asc' => __('Upload') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Upload') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>                      
                        <th>
                            <?php
                            echo $this->Paginator->sort('acctterminatecause', array(
                                'asc' => __('Termination Cause') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Termination Cause') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>   
                        <?php
                        if (in_array(AuthComponent::user('Group.name'), Configure::read('Application.wifonicGroups'))) {
                            ?>
                            <th>
                                <?php
                                echo "Action";
                                ?>
                            </th>  
                            <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody id="session_table">
                    <?php if (count($session) > 0) { ?>

                        <?php foreach ($session as $session) { ?>
                            <tr>

                        <!--                                <td><?php echo ($session['Radacct']['nasipaddress']); ?></td>-->
                                <td><?php echo $session['Radacct']['callingstationid'] ?></td>
                                <td> <?php echo $session['Radacct']['framedipaddress'] ?></td>
                                <td><?php echo $session['Radacct']['acctstarttime'] ?></td>

                                <td><?php
                                    if (isset($session['Radacct']['acctstoptime'])) {
                                        echo $session['Radacct']['acctstoptime'];
                                    } else {
                                        echo "-N/A-";
                                    }
                                    ?></td>
                                <td><?php echo CouponsController::totalsessiontime($session['Radacct']['acctsessiontime']);
                                    ?> </td>
                                <td><?php echo CouponsController::convertByteToKbMbGb(($session['Radacct']['acctoutputoctets'])) ?> </td>
                                <td><?php echo CouponsController::convertByteToKbMbGb(($session['Radacct']['acctinputoctets'])) ?> </td>
                                <td> <?php echo $session['Radacct']['acctterminatecause'] ?></td>
                                <?php
                                if (in_array(AuthComponent::user('Group.name'), Configure::read('Application.wifonicGroups'))) {
                                    ?>
                                    <td>
                                        <div  class="col-md-1 action-column">

                                            <?php
                                            echo $this->Html->link(
                                                    //$this->Html->tag('i', '', array('class' => 'fa fa-times')), '#UsersModalDeactivate', array(
                                                    $this->Html->image('crossout.png'), '#nasdelete', array(
                                                'class' => 'btn-deactivate-modal actionDeactivate',
                                                'data-toggle' => 'modal',
                                                'role' => 'button',
                                                'data-uid' => $session['Radacct']['radacctid'],
                                                // 'data-uname' => $session['Radacct']['username'],        
                                                'escape' => false), false);
                                            ?>
                                        </div>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } else { ?>
                    <tr><td id="emptyTableMessage" align="center"><i><?php echo __("No record found") ?></i></td></tr>
                <?php } ?>
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
                <?php //echo $user['User']['id']        ?>
                <p><?php echo __('Are you sure you want to delete the record ') ?><span class="label-uname strong"></span> ?</p>
            </div>
            <div class="modal-footer">

                <?php
                echo $this->Form->create('Coupon', array('action' => 'sessionDelete'));
                echo $this->Form->input('radacctid', array('id' => 'userIdForDeactivate', 'type' => 'hidden', 'value' => $session['Radacct']['radacctid']));
                // echo $this->Form->input('username', array('id' => 'userNameForDeactivate', 'type' => 'hidden', 'value' => ''));
                echo $this->Form->end('Delete', array('class' => 'btn btn-danger pull-left'));
                ?>

                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
            </div>
            <?php //echo $this->Html->link(__('Deactivate'), "/users/deactivate/#{uid}", array('class' => 'btn btn-danger deactivate-user-link'))        ?>

        </div> 
    </div>  
</div>




