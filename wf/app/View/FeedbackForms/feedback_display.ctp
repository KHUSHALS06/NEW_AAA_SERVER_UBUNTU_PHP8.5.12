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


<?php //echo $this->element('locations_list') ?>
<?php
$breadcrumb = array(
    array(
        'label' => 'Feedbacks',
        'link' => '/feedback_forms/feedbackInbox',
        'link' => '/feedback_forms/feedbackInbox'
    ),
    array(
        'label' => 'Indivisual Feedback'
    )
);
echo __($this->element('breadcrumb', array('links' => $breadcrumb)));
?>

<!--h3><?php //echo $userData['username']      ?></h3-->
<div class="row">
    <?php
    if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
        ?>
        <div class="row col-lg-12">

            <div class="col-12">
                <?php echo $this->Session->flash() ?>

                <!--hr-->
                <?php //echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>'))));  ?>
                <hr>
                <?php
                if (count($answers) > 0){
                    ?>
                <h2>
                    <?php
                    echo __('User : '.$answers[0]['Feedback']['user']);
                    ?>
                </h2>
                <?php
                    
                }
                //echo $this->Html->link(__('Preview'), array('controller' => 'FeedbackForms', 'action' => 'feedback'));
                ?>
                <div class="table-responsive">
                <table id="billingPlansTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <!--th><?php //echo $this->Paginator->sort('id', '#')                     ?></th-->
                            <th>
                                <?php
                                echo __('Title');
//                            echo $this->Paginator->sort('colum_name', array(
//                                'asc' => __('Title') . ' <i class="fa fa-caret-up  pull-right"></i>',
//                                'desc' => __('Title') . ' <i class="fa fa-caret-down  pull-right"></i>'
//                                    ), array(
//                                'escape' => false
//                            ))
                                ?>
                            </th>
                            <th>
                                <?php
                                echo __('Remarks');
//                            echo $this->Paginator->sort('created', array(
//                                'asc' => __('Remarks') . ' <i class="fa fa-caret-up  pull-right"></i>',
//                                'desc' => __('Remarks') . ' <i class="fa fa-caret-down  pull-right"></i>'
//                                    ), array(
//                                'escape' => false
//                            ));
                                ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($answers) > 0) { ?>
                                        <!--<tr>
                                            <td><?php //echo $this->element('search', array('columnName' => 'name_bp'))    ?></td>
                                            <td><?php //echo $this->element('search', array('columnName' => 'time_bp'))              ?></td>
                                            <td><?php //echo $this->element('search', array('columnName' => 'price_bp'))              ?></td>
                                            <td><?php //echo $this->element('search', array('columnName' => 'type_bp'))              ?></td>
                                        </tr>-->
                            <?php foreach ($questions as $key => $value) { ?>
                                <tr>
                                    <!--td width="50px"><?php //echo $feedback['BillingPlan']['id']                     ?></td-->
                                    <!-- inline edit javascript code written in the end -->

                                    <?php
                                    if (strlen($answers[0]['Feedback'][$key]) > 10) {
                                        ?>
                                        <td><div class ="editBPName" style="width: 200px" data-type="text" data-pk="<?php echo $value ?>" data-name="name_bp"><?php echo $value ?></div></td>
                                        <td>
                                            <div class ="editBPTime"  data-type="text" data-pk="<?php echo $answers[0]['Feedback'][$key] ?>" data-name="time_bp"><?php echo $answers[0]['Feedback'][$key] ?></div>
                                        </td>
                                        <?php
                                    } else {
                                        ?>
                                        <td><div class ="editBPName" data-type="text" data-pk="<?php echo $value ?>" data-name="name_bp"><?php echo $value ?></div></td>
                                        <td>
                                            <div class ="editBPTime" data-type="text" data-pk="<?php echo $answers[0]['Feedback'][$key] ?>" data-name="time_bp"><?php echo $answers[0]['Feedback'][$key] ?></div>
                                        </td>
                                        <?php
                                    }
                                    ?>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } else { ?>
                        <tr><td id="emptyTableMessage" colspan="5" style="background:#E9E8E8" align="center"><i><?php echo __("No record found") ?></i></td></tr>
                                <?php } ?>
                </table>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
</div>
