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
    'label' => 'Weblog Details'
  )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<?php echo $this->Session->flash(); ?>
<?php $this->Paginator->options(array('url' => array("0"))); ?>
<br>
<div class="row">
    <div class="col-md-10"><!--h3><?php //echo __('Billing Plan')            ?></h3--></div>

</div>

<div class="row">

    <div class="col-12">
        <?php echo $this->Session->flash() ?>

        <!--hr-->
        <?php //echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>'))));  ?>


        <div class="table-responsive">
            <ul class="nav nav-tabs">
                <?php if (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin') || CakeSession::read('Auth.User.Group.name') == Configure::read('Application.admin')) { ?>
                    <li>
                        <a href="#view" id="view"><i class="fa fa-user"></i> User Details</a>
                        <form method="post" action="view" id="viewForm" onclick="$(this).closest('form').submit()">
                            <input name="data[Coupon][coupon_id]" type="hidden" value="<?php echo $couponId; ?>">
                        </form>

                    </li>
                <?php } ?>

                <?php if (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin') || CakeSession::read('Auth.User.Group.name') == Configure::read('Application.admin')) { ?>
                    <li >
                        <a href="#" id="sessionDetails" onclick="$(this).closest('form').submit()"><i class="fa fa-wifi"></i> Session Logs</a>
                        <form method="post" action="sessionDetails" id="sessionDetailsForm">
                            <input name="data[Coupon][coupon_id]" type="hidden" value="<?php echo $couponId ?>">
                            <input name="data[Coupon][username]" type="hidden" value="<?php echo $username ?>">                    
                        </form>
                    <?php } ?>

                <?php if (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin') || CakeSession::read('Auth.User.Group.name') == Configure::read('Application.admin')) { ?>
                    <li>
                        <li class="active"><a href="#webLogDetails" data-toggle="tab"><i class="fa fa-wifi"></i> Web Logs</a></li>
                    </li>
                <?php } ?>
            </ul>
            <br/>
            <table id="billingPlansTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            <?php
                            echo $this->Paginator->sort('receivedat', array(
                              'asc' => __('Time') . ' <i class="fa fa-caret-up  pull-right"></i>',
                              'desc' => __('Time') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                ), array(
                              'escape' => false
                            ))
                            ?>
                        </th>
                        <th>
                            <?php
                            echo $this->Paginator->sort('ip', array(
                              'asc' => __('IP') . ' <i class="fa fa-caret-up  pull-right"></i>',
                              'desc' => __('IP') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                ), array(
                              'escape' => false
                            ))
                            ?>
                        </th>
                        <th>
                            <?php
                            echo $this->Paginator->sort('mac', array(
                              'asc' => __('MAC') . ' <i class="fa fa-caret-up  pull-right"></i>',
                              'desc' => __('MAC') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                ), array(
                              'escape' => false
                            ))
                            ?>
                        </th>
                        <th>
                            <?php
                            echo $this->Paginator->sort('url', array(
                              'asc' => __('URL') . ' <i class="fa fa-caret-up  pull-right"></i>',
                              'desc' => __('URL') . ' <i class="fa fa-caret-down pull-right"></i>'
                                ), array(
                              'escape' => false
                            ))
                            ?>
                        </th>
                    </tr>
                </thead>
                <tbody id="session_table">
                    <?php if (count($weblogs) > 0) { ?>
                        <?php foreach ($weblogs as $weblog) { ?>
                            <tr>
                                <td><?php echo $weblog['Weblog']['receivedat'] ?></td>
                                <td> <?php echo $weblog['Weblog']['ip'] ?></td>
                                <td><?php echo $weblog['Weblog']['mac'] ?></td>
                                <td> <?php echo $weblog['Weblog']['url'] ?></td>
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




