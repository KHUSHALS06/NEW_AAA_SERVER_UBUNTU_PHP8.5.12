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


<?php $this->Paginator->options(array('url' => array("0"))); ?>
<?php
if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
    ?>

    <div class="table-responsive">
        <table id="nasTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--th><?php //echo $this->Paginator->sort('id', '#')      ?></th-->
                    <th>
                        <?php
                        //  echo "nasname";
                        echo $this->Paginator->sort('room_no', array(
                          'asc' => __('Room No') . ' <i class="fa fa-caret-up  pull-right"></i>',
                          'desc' => __('Room No') . ' <i class="fa fa-caret-down  pull-right"></i>'
                            ), array(
                          'escape' => false
                        ));
                        ?>
                    </th>
                   
                    <th>
                        <?php
                        //   echo "Community";
                        echo $this->Paginator->sort('last_name', array(
                          'asc' => __('Last Name') . ' <i class="fa fa-caret-up  pull-right"></i>',
                          'desc' => __('Last Name') . ' <i class="fa fa-caret-down pull-right"></i>'
                            ), array(
                          'escape' => false
                        ))
                        ?>
                    </th>
                    <th>
                        <?php
                        //   echo "Community";
                        echo $this->Paginator->sort('registration_id', array(
                          'asc' => __('Registration Id') . ' <i class="fa fa-caret-up  pull-right"></i>',
                          'desc' => __('Registration Id') . ' <i class="fa fa-caret-down pull-right"></i>'
                            ), array(
                          'escape' => false
                        ))
                        ?>
                    </th>

		    <?php
                    $roomPins = $this->Session->read('room_pin');
                    if ($roomPins[$this->Session->read('choosed_location_id')] == 1){
                    ?>
                    <th>
                        <?php
                        echo $this->Paginator->sort('pin', array(
                            'asc' => __('Pin') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('Pin') . ' <i class="fa fa-caret-down pull-right"></i>'
                                ), array(
                            'escape' => false
                        ))
                        ?>
                    </th>
                    <?php
                    } ?>

                    <th>
                        <?php
                        //   echo "Community";
                        echo $this->Paginator->sort('created', array(
                          'asc' => __('created date') . ' <i class="fa fa-caret-up  pull-right"></i>',
                          'desc' => __('created date') . ' <i class="fa fa-caret-down pull-right"></i>'
                            ), array(
                          'escape' => false
                        ))
                        ?>
                    </th>

                    <!--th>
                        <?php
                        //   echo "Community";
                       /* echo $this->Paginator->sort('total_coupon', array(
                          'asc' => __('No of Coupon') . ' <i class="fa fa-caret-up  pull-right"></i>',
                          'desc' => __('No of Coupon') . ' <i class="fa fa-caret-down pull-right"></i>'
                            ), array(
                          'escape' => false
                        ))*/
                        ?>
                    </th-->

                    <th>
                        <?php
                        //   echo "Community";
                        echo $this->Paginator->sort('ip', array(
                          'asc' => __('IP') . ' <i class="fa fa-caret-up  pull-right"></i>',
                          'desc' => __('IP') . ' <i class="fa fa-caret-down pull-right"></i>'
                            ), array(
                          'escape' => false
                        ))
                        ?>
                    </th>

                    <th>
                        <?php
                        //   echo "Community";
                        echo $this->Paginator->sort('mac', array(
                          'asc' => __('MAC') . ' <i class="fa fa-caret-up  pull-right"></i>',
                          'desc' => __('MAC') . ' <i class="fa fa-caret-down pull-right"></i>'
                            ), array(
                          'escape' => false
                        ))
                        ?>
                    </th>

                    <th>
                        <?php
                        //   echo "Community";
                        echo $this->Paginator->sort('status', array(
                          'asc' => __('status') . ' <i class="fa fa-caret-up  pull-right"></i>',
                          'desc' => __('status') . ' <i class="fa fa-caret-down pull-right"></i>'
                            ), array(
                          'escape' => false
                        ))
                        ?>
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php if (count($checkin) > 0) { ?>  
                    <tr>
                        <td class="col-sm-3"><?php echo $this->element('search', array('columnName' => 'room_no')); ?></td>
                        <!--<td class="col-sm-3"><?php //echo $this->element('search', array('columnName' => 'shortname'));        ?></td>--> 
                    </tr>
                    <?php foreach ($checkin as $checkin) { ?>

                        <tr>
                            <td><?php echo ($checkin['Loginattempt']['room_no']); ?></td>
                            <td><?php echo (($checkin['Loginattempt']['last_name']) ? ($checkin['Loginattempt']['last_name']) : 'N/A'); ?></td>
                            <td><?php echo (($checkin['Loginattempt']['registration_id']) ? ($checkin['Loginattempt']['registration_id']) : 'N/A' ); ?></td>
			    <?php
                            if($roomPins[$this->Session->read('choosed_location_id')] ==1){
                                echo "<td>";
                                echo ($checkin['Loginattempt']['pin'] ? $checkin['Loginattempt']['pin'] : 'N/A');
                                echo "</td>";
                            }
                        ?>

                            <td><?php echo ($checkin['Loginattempt']['created']); ?></td>
                            <td><?php echo ($checkin['Loginattempt']['ip']); ?></td>
                            <td><?php echo ($checkin['Loginattempt']['mac']); ?></td>
                            <td><?php echo (($checkin['Loginattempt']['status'] == "SUCCESS") ? "<p style = 'color:green'><b>SUCCESS</b> </p>" : "<p style = 'color:red'><b>FAIL</b> </p>" ); ?></td>
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

