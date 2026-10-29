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
        $('.actionPrint').tooltip({
            'show': true,
            'placement': 'bottom',
            'title': "Print"
        });
        $('.actionView').tooltip({
            'show': true,
            'placement': 'bottom',
            'title': "View"
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#to_date').datepicker({
            dateFormat: 'dd-mm-yy',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
                    //showOn: "button",
                    //buttonImage: "../img/datepicker.png",
                    //buttonImageOnly: true
        });
        $('#from_date').datepicker({
            dateFormat: 'dd-mm-yy',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
                    //showOn: "button",
                    //buttonImage: "../img/datepicker.png",
                    //buttonImageOnly: true
        });

        $('#from_date').blur(function() {
            $('#exportErrorSpan').hide()
        });

        $('#to_date').blur(function() {
            $('#exportErrorSpan').hide()
        });

        $('#coupon_export').submit(function(e) {
            var fromDateArray = $('#from_date').val().split('-');
            var fromDate = new Date(fromDateArray[2] + '-' + fromDateArray[1] + '-' + fromDateArray[0]);
            var toDateArray = $($('#to_date').val().split('-'));
            var toDate = new Date(toDateArray[2] + '-' + toDateArray[1] + '-' + toDateArray[0]);
            if (fromDate <= toDate) {
                return trrue;
            } else {
                $("#exportErrorSpan").text('To Date must be greater than From Date').show();
                return false;
            }
            return false;
        });
    });
</script>
<?php
//pr($this->request->params['action']);
//echo $this->Html->script('bootstrap-editable.min');
//echo $this->Html->css('bootstrap-editable');
//echo $this->Html->css('menubar');
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


<?php echo $this->element('locations_list') ?>

<?php
$breadcrumb = array(
    array(
        'label' => 'Coupons',
        'link' => '/coupons/unUsedCouponList'
    ),
    array(
        'label' => $breadcrumbLabel
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<div class="row">
    <div class="col-md-12">
        <?php
        if ((AuthComponent::user('Group.name') == Configure::read('Application.wf_admin')) || (AuthComponent::user('Group.name') == Configure::read('Application.gold')) || (AuthComponent::user('Group.name') == Configure::read('Application.silver')) || (AuthComponent::user('Group.name') == Configure::read('Application.platinum'))) {
            echo $this->Html->link(__('Generate Coupon'), array('controller' => 'coupons', 'action' => 'add'), array('class' => 'btn btn-default pull-right'));
        } else {
            
        }
        ?>
    </div>
</div>
<div class="row">
    <div class = "col-md-12" style="padding-left: 0px">
        <div class = "col-md-5">


            <?php
            echo $this->Form->create('Coupon', array(
                'action' => 'exportCoupon',
                'name' => 'coupon_export',
                'id' => 'coupon_export',
                'target' => '_blank',
                'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
                'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
                'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"
            ));
            ?>
            <div class = "col-md-4">
                <?php
                echo $this->Form->input('from_date', array(
                    'label' => __('From'),
                    'placeholder' => 'From Date',
                    'type' => 'text',
                    'autocomplete' => 'off',
                    'id' => 'from_date',
                    'readOnly' => true,
                    'data-bv-date' => "true",
                    'data-bv-date-separator' => '-',
                    'data-bv-notempty' => 'true',
                    'data-bv-notempty-message' => "The first name is required and cannot be empty",
                ));
                ?>
            </div><div class = "col-md-4">
                <?php
                echo $this->Form->input('to_date', array(
                    'label' => __('To'),
                    'placeholder' => 'To Date',
                    'type' => 'text',
                    'autocomplete' => 'off',
                    'id' => 'to_date',
                    'readOnly' => true,
                    'data-bv-date' => "true",
                    'data-bv-date-separator' => '-',
                    'data-bv-notempty' => 'true',
                    'data-bv-notempty-message' => "The first name is required and cannot be empty",
                ));
                ?>
            </div>
            <?php
            echo $this->Form->input('action', array(
                'type' => 'hidden',
                'value' => $this->request->params['action']
            ));
            ?>
            <div class = "col-md-2" style="padding-top:24px">
                <?php
                echo $this->Form->end(__("Export", array('class' => 'submit_button')));
                ?>
            </div>
        </div>
        <div class = "col-md-3">
            <?php
//            echo $this->Form->create('Coupon', array(
//                'action' => 'couponReporting',
//                'name' => 'couponReporting',
//                'id' => 'coupon_reporting',
//                //'target'=>'_blank',
//                'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
//                'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
//                'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"
//            ));
            ?>
            <div class = "col-md-8">
                <?php
//                echo $this->Form->input('period', array(
//                    'label' => __('Period'),
//                    'type' => 'select',
//                    'id' => 'period',
//                    'options' => array('today' => 'Today', 'weekly' => 'Weekly', 'monthly' => 'Monthly'),
//                    'selected' => isset($period) ? $period : '',
//                    'data-bv-notempty' => 'true',
//                    'data-bv-notempty-message' => "The first name is required and cannot be empty",
//                        //'data-bv-date-format' => "YYYY-MM-DD",
//                        //'data-bv-date-message' => "This is not a valid date. Please use YYYY-MM-DD format"
//                ));
                ?>
            </div><div class = "col-md-4" style="padding-top:24px">
                <?php
//                echo $this->Form->input('action', array(
//                    'type' => 'hidden',
//                    'value' => (isset($action) && $action != '') ? $action : $this->request->params['action']
//                ));
                ?>
                <?php
                //echo $this->Form->end(__("View", array('class' => 'submit_button')));
                ?>
            </div>
        </div>
        <div class = "col-md-3">
            <?php
            echo $this->Form->create('Coupon', array(
                'action' => 'unUsedCouponList',
                'name' => 'couponReporting',
                'id' => 'coupon_reporting',
                //'target'=>'_blank',
                'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
                'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
                'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"
            ));
            ?>
            <div class = "col-md-9">
                <?php
                echo $this->Form->input('type', array(
                    'label' => 'Filtered',
                    'options' => array('scratch_card' => 'Scratch Card', 'generated' => 'Generated'),
                    'empty' => 'All',
                ));
                ?>
            </div><div class = "col-md-2" style="padding-top:24px">
                <?php
                echo $this->Form->end(__("View", array('class' => 'submit_button')));
                ?>
            </div>
        </div>
    </div>
</div>
<div class='col-md-10'>
    <span id="exportErrorSpan" class="error" style="display:none;color: red"><i class="fa fa-times"></i></span>
</div>
</div>
<div class="row">
    <div class="col-12">
        <?php echo $this->Session->flash(); ?>
        <?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
        <hr>
        <?php
        if (!isset($isGeneratedCouponList) || (isset($isGeneratedCouponList) && $isGeneratedCouponList != 'yes')) {
            //For future filtaration
        }
        ?>
        <div class="table-responsive">
            <table id="couponsTable" class="table table-bordered table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th >
                            <?php
                            echo $this->Paginator->sort('username', array(
                                'asc' => __('Username') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Username') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ));
                            ?>
                        </th>
                        <th >
                            <?php
                            echo $this->Paginator->sort('id', array(
                                'asc' => __('Serial#') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Serial#') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ));
                            ?>
                        </th>
                        <?php
                        if ($this->request->params['action'] == 'usedCouponList') {
                            ?>
                            <th >
                                <?php
                                echo $this->Paginator->sort('calling_station_id', array(
                                    'asc' => __('MAC') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                    'desc' => __('MAC') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                        ), array(
                                    'escape' => false
                                ));
                                ?>
                            </th>
                            </th>
                            <?php
                        }
                        ?>
                        <th>
                            <?php
                            echo $this->Paginator->sort('duration', array(
                                'asc' => __('Billing Plan') . ' <i class="fa fa-caret-up pull-right"></i>',
                                'desc' => __('Billing Plan') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ));
                            ?>

                        <th >
                            <?php
                            echo $this->Paginator->sort('Coupon.price', array(
                                'asc' => __('Price') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Price') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ));
                            ?>
                        </th>
                        <th >
                            <?php
                            echo $this->Paginator->sort('cr_date', array(
                                'asc' => __('Creation Date') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Creation Date') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ));
                            ?>
                        </th>
                        <th >
                            <?php
                            echo $this->Paginator->sort('creator', array(
                                'asc' => __('Creator') . ' <i class="fa fa-caret-up pull-right"></i>',
                                'desc' => __('Creator') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ));
                            ?>
                        </th>

                        <th style="color: #428BCA"><?php echo __('Action') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $userNameArray = '';
                    if (!isset($isGeneratedCouponList) || (isset($isGeneratedCouponList) && $isGeneratedCouponList != 'yes')) {
                        ?>
                        <tr>
                            <td class="col-sm-2"><?php echo $this->element('search', array('columnName' => 'username')) ?></td>
                            <td class="col-sm-2"><?php echo $this->element('search', array('columnName' => 'sn')) ?></td>
                            <td><?php //echo $this->element('search', array('columnName' => 'username'))                             ?></td>
                            <td><?php //echo $this->element('search', array('columnName' => 'username'))                             ?></td>
                            <td><?php //echo $this->element('search', array('columnName' => 'username'))                             ?></td>
                            <td><?php //echo $this->element('search', array('columnName' => 'username'))                             ?></td>
                            <td><?php //echo $this->element('search', array('columnName' => 'username'))                             ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <?php
                    if (count($coupons) > 0) {
                        $tmpUserNameArray = $this->Session->read('location_username_length');
                        $usernameLength = $tmpUserNameArray[$this->Session->read('choosed_location_id')];
                        ?>
                        <?php
                        foreach ($coupons as $coupon) {
                            $userNameArray = $userNameArray . $coupon['Coupon']['username'] . ',';
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    if ($usernameLength == '4') {
                                        $tmpUserName = explode('-', $coupon['Coupon']['username']);
                                        echo $tmpUserName[0];
                                    } else {
                                        echo $coupon['Coupon']['username'];
                                    }
                                    ?>
                                </td>
                                <td><?php echo $coupon['Coupon']['sn'] ?></td>
                                <td><?php echo $coupon['Coupon']['duration'] ?></td>
                                <td><i class="fa fa-inr"></i><?php echo ' ' . $coupon['Coupon']['price'] ?></td>
                                <td><?php
                                    if ($coupon['Coupon']['cr_date'] != 0) {
                                        $x = explode(' ', $coupon['Coupon']['cr_date']);
                                        $createDate = $x[0];
                                        echo date('d-m-Y', strtotime($createDate));
                                    }
                                    ?></td>

                                <td><?php echo $coupon['Coupon']['creator'] ?></td>

                                <td width="100px" id="actions">
                                    <div class="row col-md-12 action-column">
                                        <div class="col-md-1 action-column">
                                            <?php
                                            echo $this->Form->create('Coupon', array('action' => 'view', 'method' => 'post'));
                                            echo $this->Form->input('coupon_id', array('type' => 'hidden', 'value' => $coupon['Coupon']['id']));
                                            echo $this->Form->end('view_20by20.png', array('div' => false, 'class' => 'action-button actionView'));
                                            ?>
                                        </div>
                                        <?php if ($coupon['Coupon']['activated'] == 0) { ?>
                                            <div class="col-md-1 action-column"></div>
                                            <div class="col-md-1 action-column">
                                                <?php
                                                echo $this->Form->create('Coupon', array('action' => 'printACoupon', 'target' => '_blank'));
                                                echo $this->Form->input('id', array('type' => 'hidden', 'value' => $coupon['Coupon']['id']));
                                                echo $this->Form->input('id', array('type' => 'hidden', 'value' => $coupon['Coupon']['id']));
                                                echo $this->Form->end('print.png', array('div' => false, 'class' => 'action-button actionPrint'));
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                <?php } else { ?>
                    <tr><td id="emptyTableMessage" align="center"><i><?php echo __("No record found") ?></i></td></tr>
                <?php } ?>
            </table>
        </div>  
        <?php
        if ($this->request->param('action') == 'generatedCoupon') {
            ?>
            <div class="table-responsive">
                <table id="couponsTable" class="table" style="width: 100%"><tr><td>
                            <?php
                            echo $this->Form->create('Coupon', array('action' => 'printGeneratedCoupon', 'method' => 'post', 'target' => '_blank'));
                            echo $this->Form->input('first_cid', array('type' => 'hidden', 'value' => $this->request->params['pass']['0']));
                            echo $this->Form->input('last_cid', array('type' => 'hidden', 'value' => $this->request->params['pass']['1']));
                            //echo $this->Form->input('last_cid', array('type' => 'hidden', 'value' => $this->request->params['pass']['1']));
                            echo $this->Form->end('Print All', array('class' => 'col-md-12'));
                            ?>
                        </td></tr></table>

            </div>
            <?php
        }
        ?>

        <div class="paginator">
            <?php echo $this->Paginator->numbers(); ?>
        </div> 
        <?php echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>')))); ?>
        <?php echo $this->Js->writeBuffer(); ?>
    </div>
</div>
<script>
    $(function() {
        var newURL = window.location.protocol + "//" + window.location.host + "" + window.location.pathname;
        $.fn.editable.defaults.mode = 'inline';
        $('.editUserName').editable({
            url: newURL + '/update_username'
        });
        $('.editAlias').editable({
            url: newURL + '/update_alias',
            validate: function(value) {
                if ($.trim(value) == '') {
                    return 'This field is required';
                }
                if (!(/^[a-zA-Z\s]*$/.test(value))) {
                    return 'Only alphabets allowed';
                }
            }
        });
        $('.editEmail').editable({
            url: newURL + '/update_email'
        });
        $('.group').editable({
            url: newURL + '/update_group',
            title: 'Select group'
        });
    });

</script>
