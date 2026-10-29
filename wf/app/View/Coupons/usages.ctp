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

        $('#UserAddForm').bootstrapValidator()

        $('#AddUserModal').on('shown.bs.modal', function() {
            $('#UserAddForm').bootstrapValidator('resetForm', true);
        });

        $('#view').click(function() {
            $(this).submit();
        });

        /*$("#CouponType").change(function(){
         var couponType = $("#CouponType").val();
         if(couponType == 'generated'){
         $("#actions").attr('style','display:block');
         } else {
         $("#actions").attr('style','display:none');
         }
         });*/

        var numberOfColumns = document.getElementById('couponsTable').rows[0].cells.length;
        $("#emptyTableMessage").attr('colspan', numberOfColumns);

    });

</script>


<?php
//echo $this->Html->script('bootstrap-editable.min');
//echo $this->Html->css('bootstrap-editable');
echo $this->Html->css('menubar');
//echo $this->Html->script('lib/jquery', array('inline'=>false));
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


<?php echo $this->element('locations_list', array('allLocations'=>'All Locations')) ?>

<?php
$breadcrumb = array(
    array(
        'label' => 'Coupons',
        'link' => '/coupons'
    ),
    array(
        'label' => $breadcrumbLabel
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
//pr($testPrint);
?>
<div class="row">

    <div class="col-12">
        <?php echo $this->Session->flash() ?>

        <!--hr-->
        <?php //echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>')))); ?>
        <hr>
        <table id="couponsTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--th ><?php //echo $this->Paginator->sort('id', '#')                      ?></th-->
                    <th >
                        <?php
                        echo $this->Paginator->sort('location_name', array(
                            'asc' => __('Name') . ' <i class="fa fa-chevron-up text-info pull-right"></i>',
                            'desc' => __('Name') . ' <i class="fa fa-chevron-down text-info pull-right"></i>'
                                ), array(
                            'escape' => false
                        ));
                        ?>
                    </th>
                    <th >
                        <?php
                        echo $this->Paginator->sort('location_city', array(
                            'asc' => __('City') . ' <i class="fa fa-chevron-up text-info pull-right"></i>',
                            'desc' => __('City') . ' <i class="fa fa-chevron-down text-info pull-right"></i>'
                                ), array(
                            'escape' => false
                        ));
                        ?>
                    </th>
                    <th ><?php
                        echo $this->Paginator->sort('live_date', array(
                            'asc' => __('Live Date') . ' <i class="fa fa-chevron-up text-info pull-right"></i>',
                            'desc' => __('Live Date') . ' <i class="fa fa-chevron-down text-info pull-right"></i>'
                                ), array(
                            'escape' => false
                        ));
                        ?>
                    </th>
                    <th >
                        <?php
                        echo $this->Paginator->sort('coupons', array(
                            'asc' => __('No Of Coupons') . ' <i class="fa fa-chevron-up text-info pull-right"></i>',
                            'desc' => __('No Of Coupons') . ' <i class="fa fa-chevron-down text-info pull-right"></i>'
                                ), array(
                            'escape' => false
                        ));
                        ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($locationUsages)>0) { ?>
                    <?php foreach ($locationUsages as $locationUsage) { ?>
                        <tr>
                            <!--td width="50px"><?php //echo $user['User']['id']                      ?></td-->
                            <!-- inline edit javascript code written in the end -->
                            <td><?php echo $locationUsage['Usage']['location_name'] ?></td>
                            <td><?php echo $locationUsage['Usage']['location_city'] ?></td>
                            <td><?php echo date('d-m-Y',  strtotime($locationUsage['Usage']['live_date']))?></td>
                            <td><?php echo $locationUsage['Usage']['coupons'] ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            <?php } else { ?>
                <tr><td id="emptyTableMessage" align="center"><i><?php echo __("No record found") ?></i></td></tr>
            <?php } ?>
        </table>
        <div class="paginator">
            <?php echo $this->Paginator->numbers(); ?>
        </div> 
        <br/>
        <?php echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>')))); ?>
        <?php echo $this->Js->writeBuffer(); ?>
    </div>
</div>

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
