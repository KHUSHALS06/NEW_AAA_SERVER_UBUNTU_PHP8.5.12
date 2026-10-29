<?php
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
<?php echo $this->element('locations_list'); ?>

<div class="row">
    <div class="col-md-10"><!--h3><?php //echo __('Users')                                            ?></h3--></div>
    <div class="col-md-2">
        <?php
            echo $this->Html->link(__('Create Policy'), array('controller' => 'pms', 'action' => 'createPolicy'), array('class' => 'btn btn-default pull-right'));
        ?>
    </div>
</div>
<div class="row">

    <div class="col-12">
        <?php echo $this->Session->flash() ?>

<?php $this->Paginator->options(array('url' => array("0"))); ?>
<?php
if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
    ?>

    <div class="table-responsive">
        <table id="nasTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--th><?php //echo $this->Paginator->sort('id', '#')   ?></th-->
                    <th>
                        <?php
                        //  echo "nasname";
                        echo $this->Paginator->sort('Policy.room_no', array(
                            'asc' => __('Room No') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('Room No') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                ), array(
                            'escape' => false
                        ));
                        ?>
                    </th>
                    <th>
                        <?php
                        echo "Billing Plan";
			/*
                        echo $this->Paginator->sort('BillingPlan.name_bp', array(
                            'asc' => __('Billing Plan') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('Billing Plan') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                ), array(
                            'escape' => false
                        ));
			*/			
                        ?>
                    </th>
                    <th>
                        <?php
                        echo "Session Time";
			/*
                        echo $this->Paginator->sort('BillingPlan.time_bp', array(
                            'asc' => __('Session Time') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('Session Time') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                ), array(
                            'escape' => false
                        ));
			*/
                        ?>
                    </th>

                    <th>
                        <?php
                        echo "Validity";
			/*
                        echo $this->Paginator->sort('BillingPlan.maximum_time_bp', array(
                            'asc' => __('Validity') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('Validity') . ' <i class="fa fa-caret-down pull-right"></i>'
                                ), array(
                            'escape' => false
                        ));
			*/
                        ?>
                    </th>
                    <th>
                        <?php
                        echo "Data";
			/*
                        echo $this->Paginator->sort('BillingPlan.maximum_octet_bp', array(
                            'asc' => __('Data') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('Data') . ' <i class="fa fa-caret-down pull-right"></i>'
                                ), array(
                            'escape' => false
                        ));
			*/
                        ?>
                    </th>
                    <th>
                        <?php
                        echo "Upload Speed";
			/*
                        echo $this->Paginator->sort('BillingPlan.bandwidth_upload_bp', array(
                            'asc' => __('Upload Speed') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('Upload Speed') . ' <i class="fa fa-caret-down pull-right"></i>'
                                ), array(
                            'escape' => false
                        ))
			*/
                        ?>
                    </th>
		     <th>
                        <?php
			echo "Download Speed";
			/*
                        echo $this->Paginator->sort('BillingPlan.bandwidth_download_bp', array(
                            'asc' => __('Download Speed') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('Download Speed') . ' <i class="fa fa-caret-down pull-right"></i>'
                                ), array(
                            'escape' => false
                        ))
			*/
                        ?>
                    </th>
		    <th>
                        <?php
                        echo "Device";
                        /*
                        echo $this->Paginator->sort('BillingPlan.bandwidth_download_bp', array(
                            'asc' => __('Download Speed') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('Download Speed') . ' <i class="fa fa-caret-down pull-right"></i>'
                                ), array(
                            'escape' => false
                        ))
                        */
                        ?>
                    </th>
                <th>
                    <?php
                    //   echo "Community"
                    echo 'Action';
                    ?>
                </th>


        <!--th><?php echo $this->Paginator->sort('location_id', __('Location')) ?></th-->

            </tr>
        </thead>
        <tbody>

            <?php if (count($checkin) > 0) { ?>  
                <tr>
                    <td class="col-sm-3"><?php echo $this->element('search', array('columnName' => 'room_no')); ?></td>
                    <!--<td class="col-sm-3"><?php //echo $this->element('search', array('columnName' => 'shortname'));     ?></td>--> 
                </tr>
                <?php foreach ($checkin as $checkin) { ?>

                    <tr>
                        <td><?php echo ($checkin['Policy']['room_no']); ?></td>
                        <td><?php echo ($checkin['BillingPlan']['name_bp']); ?></td>
                        <td><?php echo ($checkin['BillingPlan']['time_bp']); ?></td>
<!--                        <td> <?php echo ($checkin['BillingPlan']['time_bp']); ?> </td>-->
                        <td><?php echo ($checkin['BillingPlan']['maximum_time_bp']); ?></td>
                        <td><?php echo ($checkin['BillingPlan']['maximum_octet_bp']); ?></td>
			<td><?php echo ($checkin['BillingPlan']['bandwidth_upload_bp']); ?></td>
			<td><?php echo ($checkin['BillingPlan']['bandwidth_download_bp']); ?></td>
			<td><?php echo ($checkin['Policy']['device']); ?></td>
			<td>
			<?php
                        	echo $this->Form->create('Pms', array('action' => 'editPolicy'));
                                echo $this->Form->input('id', array('type' => 'hidden', 'value' => $checkin['Policy']['id']));
				echo $this->Form->input('room_no', array('type' => 'hidden', 'value' => $checkin['Policy']['room_no']));
				echo $this->Form->input('device', array('type' => 'hidden', 'value' => $checkin['Policy']['device']));
                                echo $this->Form->input('billingplan_id', array('type' => 'hidden', 'value' => $checkin['Policy']['billingplan_id']));
                                //echo $this->Form->end('Edit', array('class' => 'btn-xs text', 'type' => 'image', 'src' => 'img/edit_20by20.png'));
                                echo $this->Form->end('edit_20by20.png', array('div' => false, 'class' => 'action-button actionEdit'));
                        ?>
			</td>	

                    <?php } ?>
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
<?php echo $this->Js->writeBuffer(); ?> <?php } ?>


