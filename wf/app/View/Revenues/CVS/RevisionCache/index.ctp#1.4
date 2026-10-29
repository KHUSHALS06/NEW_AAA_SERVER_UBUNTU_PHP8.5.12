<script type="text/javascript">
    $(document).ready(function() {
        var numberOfColumns = document.getElementById('usersTable').rows[0].cells.length;
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

<?php //echo $this->element('locations_list'); ?>

<?php
$breadcrumb = array(
    array(
        'label' => 'Revenue',
        'link' => '/revenues'
    ),
    array(
        'label' => 'Overall'
    )
);

echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
<div class="row">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#" data-toggle="tab"><i class="fa fa-cubes"></i> Overall</a></li>
        <li>
            <a href= "<?php echo $this->request->webroot ?>revenues/revenue" id="emailLog"><i class="fa fa-money"></i> Revenue</a>
        </li>
        <li>
            <a href= "<?php echo $this->request->webroot ?>revenues/monthly" id="emailLog"><i class="fa fa-rupee"></i> Monthly</a>
        </li>
        <li>
            <a href= "<?php echo $this->request->webroot ?>revenues/oneTime" id="emailLog"><i class="fa fa-cube"></i> AMC</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-12">
        <?php echo $this->Session->flash() ?>
        <?php $this->Paginator->options(array('url' => array("0"))); ?>
        <div class="table-responsive">
            <table id="usersTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th >
                            <?php
                            echo '#';
                            ?>
                        </th>
                        <th >
                            <?php
                            echo $this->Paginator->sort('Location.location_name', array(
                                'asc' => __('Location') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Location') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>
                        <th ><?php
                            echo $this->Paginator->sort('Location.installation_city', array(
                                'asc' => __('City') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('City') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?></th>
                        <th ><?php
                            echo $this->Paginator->sort('Location.live_date', array(
                                'asc' => __('Live Date') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Live Date') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?></th>
                        <th ><?php
                            echo $this->Paginator->sort('Location.revenue_percent', array(
                                'asc' => __('Basis') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Basis') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?></th>

                        <th><?php
                            echo $this->Paginator->sort('ReportCoupon.total_price', array(
                                'asc' => __('Total ') .'<i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Total') .' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?></th>
                        <th><?php
                            echo $this->Paginator->sort('', array(
                                'asc' => __('Client Share') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Clint Share') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?></th>
                        <th><?php
                            echo $this->Paginator->sort('', array(
                                'asc' => __('Wifonic Share') .'<i class="fa fa-caret-up  pull-right"></i>',
                                'desc' =>__('Wifonic Share') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?></th>
                        <th><?php
                            echo $this->Paginator->sort('total_coupon', array(
                                'asc' => __('# Coupons') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('# Coupons') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?></th>
                    </tr>
                </thead>
                <tbody>

<!--                    <tr>
                        <td class="col-sm-3"><?php //echo $this->element('search', array('columnName' => 'username'))      ?></td>
                        <td class="col-sm-3"><?php //echo $this->element('search', array('columnName' => 'alias'))      ?></td>
                        <td class="col-sm-2"><?php //echo $this->element('search', array('columnName' => 'email'))      ?></td>
                        <td class="col-sm-2"><?php //echo $this->element('search_dropdown', array('columnName' => 'group_id'))      ?></td>
                        <td><?php //echo $this->element('search', array('columnName' => 'username'))                         ?></td>
                        <td><?php //echo $this->element('search', array('columnName' => 'username'))                         ?></td>
                        <td><?php //echo $this->element('search', array('columnName' => 'username'))                         ?></td>
                        <td><?php //echo $this->element('search', array('columnName' => 'username'))                         ?></td>
                        <td><?php //echo $this->element('search', array('columnName' => 'username'))                         ?></td>
                    </tr>-->
                    <?php
                    if (count($revenues) > 0) {
                        $sn = $this->Paginator->counter(array('format' => __('%start%')));
                        ?>
                        <?php foreach ($revenues as $revenue) { ?>
                            <tr>
                                <!--td width="50px"><?php //echo $$revenue['User']['id']                                                          ?></td-->
                                <!-- inline edit javascript code written in the end -->
                                <td><?php echo $sn; $sn++; ?></td>
                                <td><?php echo $revenue['Location']['location_name'] ?></td>
                                <td><?php echo $revenue['Location']['installation_city'] ?></td>
                                <td><?php echo $revenue['Location']['live_date']!=NULL ? date('d-m-Y', strtotime($revenue['Location']['live_date'])):'' ?></td>
                                <td>
                                    <?php
                                    if ($revenue['Location']['revenue_share'] == '1') {
                                        echo $revenue['Location']['revenue_percent'].' %';
                                    } else {
                                        echo 'Fixed';
                                    }
                                    ?>
                                </td> 
                                <td>
                                    <?php
                                    //echo $revenue['Location']['revenue_share'] == 1 ? $revenue['ReportCoupon']['total_price'] : $revenue['Location']['monthly_fixed'];
                                    echo $revenue['ReportCoupon']['wifonic_share'];
                                    ?>
                                </td>
                                <td ><?php echo $revenue['ReportCoupon']['client_share'] ?></td>
                                <td><?php echo $revenue['ReportCoupon']['wifonic_share'] ?></td>
                                <td><?php echo $revenue['ReportCoupon']['total_coupon'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <!--td width="50px"><?php //echo $$revenue['User']['id']                                                         ?></td-->
                            <!-- inline edit javascript code written in the end -->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b><?php echo 'TOTAL :' ?></b></td> 
                            <td ><b><i class="fa fa-inr"></i><?php echo ' '.$totalPrice ?></b></td>
                            <td ><b><i class="fa fa-inr"></i><?php echo ' '.$totalClientShare ?></b></td>
                            <td ><b><i class="fa fa-inr"></i><?php echo ' '.$totalWifonicShare ?></b></td>
                            <td ><b><?php echo ' '.$totalCoupon ?></b></td>
                        </tr>
                    </tbody>
                <?php } else { ?>
                    <tr><td id="emptyTableMessage" align="center"><i><?php echo __("No record found") ?></i></td></tr>
                <?php } ?>
            </table>
        </div>
        <div class="paginator">
            <?php echo $this->Paginator->numbers(); ?>
            <?php //echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>'))));  ?>
        </div><br/>
        <?php echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>')))); ?>
        <?php echo $this->Js->writeBuffer(); ?>
    </div>
</div>