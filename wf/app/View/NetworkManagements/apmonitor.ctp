<html>
    <head>
        <meta http-equiv="refresh" content="300" >
    </head>
<?php // pr($avg_rtt);//foreach($apmonitoring as $apmonitoring) {}   ?>

<script type="text/javascript">

    $(document).ready(function () {
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
//        $(window).on('focus', function() { 
//    /*your code*/
//    setTimeout(function(){
//        location.reload();//will reload your page
//    },6*8000); //duration
//}); 
    });
</script>
<body>
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
        'label' => 'Network Managements',
        'link' => '/NetworkManagements'
    ),
    array(
        'label' => 'AP Monitoring'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>


<div class="row">
    <?php echo $this->Session->flash(); ?>
    <?php $this->Paginator->options(array('url' => array("0"))); ?>

    <?php
    if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
        ?>
                        <div class="col-md-10"><!--h3><?php //echo __('Billing Plan')       ?></h3--></div>
        <div class="col-md-2">
            <?php
            //echo $this->Html->link(__('Add User'), '/users/add', array('class' => 'btn btn-default pull-right', 'style' => 'margin-top: 15px')) 

            echo $this->Html->link(__('Add New AP'), array('controller' => 'NetworkManagements', 'action' => 'addapmonitor'), array('class' => 'btn btn-default pull-right'));
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
                                <!--th><?php //echo $this->Paginator->sort('id', '#')    ?></th-->
                                <!--th> # </th-->
                                <th>
                                    <?php
                                    //  echo "nasname";
                                    echo $this->Paginator->sort('Ap', array(
                                        'asc' => __('Ap') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                        'desc' => __('Ap') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                            ), array(
                                        'escape' => false
                                    ));
                                    ?>  
                                </th>
                                <th>
                                    <?php
                                    //  echo "nasname";
                                    echo $this->Paginator->sort('location', array(
                                        'asc' => __('Location') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                        'desc' => __('Location') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                            ), array(
                                        'escape' => false
                                    ));
                                    ?>  
                                </th>
                                <th>
                                    <?php
                                    //  echo "nasname";
                                    echo $this->Paginator->sort('mac_address', array(
                                        'asc' => __('Mac address') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                        'desc' => __('Mac address') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                            ), array(
                                        'escape' => false
                                    ));
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    //  echo "shortname";
                                    echo $this->Paginator->sort('Ip', array(
                                        'asc' => __('Ip') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                        'desc' => __('Ip') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                            ), array(
                                        'escape' => false
                                    ));
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    //   echo "Type";
                                    echo $this->Paginator->sort('status', array(
                                        'asc' => __('Status') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                        'desc' => __('Status') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                            ), array(
                                        'escape' => false
                                    ));
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    //  echo "Port";
                                    echo $this->Paginator->sort('modified', array(
                                        'asc' => __('Last checked') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                        'desc' => __('Last checked') . ' <i class="fa fa-caret-down pull-right"></i>'
                                            ), array(
                                        'escape' => false
                                    ))
                                    ?>
                                </th>

                                <th>
                                    <?php
                                    //  echo "Port";
                                    echo $this->Paginator->sort('Duration', array(
                                        'asc' => __('Duration') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                        'desc' => __('Duration') . ' <i class="fa fa-caret-down pull-right"></i>'
                                            ), array(
                                        'escape' => false
                                    ))
                                    ?>
                                </th>     
				
                                <!--th>
                                    <?php
                                    //   echo "Type";
                                    echo $this->Paginator->sort('Details', array(
                                        'asc' => __('Details') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                        'desc' => __('Details') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                            ), array(
                                        'escape' => false
                                    ));
                                    ?>
                                </th-->



                    <!--th><?php if (in_array(AuthComponent::user('Group.name'), Configure::read('Application.wifonicGroups'))) {?></th-->
                                <th style="color: #428BCA"><?php echo __('Actions') ?></th>
                    <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
				if (count($apmonitoring) > 0) {  $srlno = 1; ?>  
                                <tr>
            <!--                                <td class="col-sm-3"><?php // echo $this->element('search', array('columnName' => 'nasname'));   ?></td>
                                    <td class="col-sm-3"><?php //echo $this->element('search', array('columnName' => 'shortname'));   ?></td> -->
				    

                                    <?php
					foreach ($apmonitoring as $apmonitoring) {
					//print_r($apmonitoring['Apmonitor']['Ap']);
					//print_r($apmonitoring['Apmonitor']['status']);
					
                                       ?>
                                    <tr>
                                        <!--td> <?php echo $srlno; $srlno++; ?> </td-->
                                        <?php if(1){ //(isset($pingarray[$apmonitoring['Apmonitor']['Ip']])) { 
                                                $error = $apmonitoring['Apmonitor']['status'];//$pingarray[$apmonitoring['Apmonitor']['Ip']];
                                                ?>
                                                <?php if ($error == 'Success') { ?>
                                        <td style=" background-color:#d6f5d6;" ><?php echo ($apmonitoring['Apmonitor']['Ap']); ?></td>
                                                <?php } else { ?>
                                         <td style=" background-color:#ffb2b2;" ><?php echo ($apmonitoring['Apmonitor']['Ap']); ?></td>
                                                <?php } ?>
                                         <?php if ($error == 'Success') { ?>
                                        <td style=" background-color:#d6f5d6;"><?php echo ($apmonitoring['Apmonitor']['location']); ?></td>
                                         <?php } else { ?>
                                        <td style=" background-color:#ffb2b2;"><?php echo ($apmonitoring['Apmonitor']['location']); ?></td>
                                         <?php } ?>
                                          <?php if ($error == 'Success') { ?>
                                        <td style=" background-color:#d6f5d6;"><?php echo ($apmonitoring['Apmonitor']['mac_address']); ?></td>
                                          <?php } else { ?>
                                        <td style=" background-color:#ffb2b2;"><?php echo ($apmonitoring['Apmonitor']['mac_address']); ?></td>
                                         <?php } ?>
                                          <?php if ($error == 'Success') { ?>
                                        <td style=" background-color: #d6f5d6;"><?php echo ($apmonitoring['Apmonitor']['Ip']); ?></td>
                                         <?php } else { ?>
                                          <td style=" background-color:#ffb2b2;"><?php echo ($apmonitoring['Apmonitor']['Ip']); ?></td>
                                         <?php } ?>
                                         <?php if ($error == 'Success') { ?>
                                        <td style=" background-color:#d6f5d6;">
                                                    <p style="color: #228b22 ;"> <?php echo "Up"; ?></p>

						<?php
						/*
                                            if (isset($pingarray[$apmonitoring['Apmonitor']['Ip']])) {
                                                $error = $pingarray[$apmonitoring['Apmonitor']['Ip']];
                                                if ($error == 'Success') {
                                                    ?>
                                                    <p style="color: #228b22 ;"> <?php echo "Up"; ?></p>
                                                <?php } else { ?>
                                                    <p style="color: #cd2626 ;"> <?php echo "Down"; ?> </p>
                                                <?php } 
                                                } 
                                            else { 
                                                echo "cant connect";
                                            }
						*/
                                            ?>
                                        </td>
                                        <?php }  else{ ?>
                                        <td style=" background-color:#ffb2b2;">
                                                    <p style="color: #cd2626 ;"> <?php echo "Down"; ?> </p>
					<?php
						/*
                                            if (isset($pingarray[$apmonitoring['Apmonitor']['Ip']])) {
                                                $error = $pingarray[$apmonitoring['Apmonitor']['Ip']];
                                                if ($error == 'Success') {
                                                    ?>
                                                    <p style="color: #228b22 ;"> <?php echo "Up"; ?></p>
                                                <?php } else { ?>
                                                    <p style="color: #cd2626 ;"> <?php echo "Down"; ?> </p>
                                                <?php } 
                                                } 
                                            else {
                                                echo "cant connect";
                                            }*/
                                            ?>
                                        </td>
                                        <?php } } else{ ?>
                                        <td> <?php   ?> </td>
                                             <td> <?php   ?> </td>
                                               <td> <?php   ?> </td>
                                                 <td> <?php  echo "cant connect"; ?> </td> 
                                                 <td> <?php  echo "Unavailable"; ?> </td>
                                        <?php } ?>
                                        
                                        <td><?php echo ($apmonitoring['Apmonitor']['modified']); ?></td> 
                                        <td><?php 
$diff = abs(strtotime(date("Y-m-d H:i:s")) - strtotime($apmonitoring['Apmonitor']['modified']));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
printf("%d years, %d months, %d days, %d hours, %d minuts\n, %d seconds\n", $years, $months, $days, $hours, $minuts, $seconds);
//echo "$year - $months - $days";
 ?></td>
                                        <!--td style="width: 200px;"><?php
				//	echo ($apmonitoring['Apmonitor']['details'])
				/*
                                       if(isset($sent[$apmonitoring['Apmonitor']['Ip']])){
                                        echo "Sent=" . $sent[$apmonitoring['Apmonitor']['Ip']] . '&nbsp' ;
                                       }else {
                                                echo "Sent = NA";
                                            }
                                       if(isset($received[$apmonitoring['Apmonitor']['Ip']])){
                                           echo  "Received=" . $received[$apmonitoring['Apmonitor']['Ip']] . '&nbsp';
                                       }else {
                                                echo "Received = NA";
                                            }
                                            echo "&nbsp";
                                            if (isset($avg_rtt[$apmonitoring['Apmonitor']['Ip']])) {
                                                echo " avg-rtt=" . $avg_rtt[$apmonitoring['Apmonitor']['Ip']];
                                            } else {
                                                echo "avg-rtt = NA";
                                            }
                                            echo "&nbsp";
                                            if(isset($packet1[$apmonitoring['Apmonitor']['Ip']])){
                                            echo "Packet-Loss=" . $packet1[$apmonitoring['Apmonitor']['Ip']] . "%" . '&nbsp';
                                            }
				*/
                                            ?> </tdi-->
                                       <?php  if (in_array(AuthComponent::user('Group.name'), Configure::read('Application.wifonicGroups'))) { ?>
                                        <td> 
                                            <div class="col-md-1 action-column">
                                                <?php
                                                echo $this->Form->create('NetworkManagement', array('action' => 'editapmonitor'));
                                                echo $this->Form->input('id', array('type' => 'hidden', 'value' => $apmonitoring['Apmonitor']['id']));
                                                echo $this->Form->input('target', array('type' => 'hidden', 'value' => 'first'));
                                                echo $this->Form->input('mac_address', array('type' => 'hidden', 'value' => $apmonitoring['Apmonitor']['mac_address']));
                                                echo $this->Form->input('Ip', array('type' => 'hidden', 'value' => $apmonitoring['Apmonitor']['Ip']));
                                                echo $this->Form->input('location', array('type' => 'hidden', 'value' => $apmonitoring['Apmonitor']['location']));
                                                 echo $this->Form->input('Ap', array('type' => 'hidden', 'value' => $apmonitoring['Apmonitor']['Ap']));
                                                //echo $this->Form->end('Edit', array('class' => 'btn-xs text', 'type' => 'image', 'src' => 'img/edit_20by20.png'));
                                                    echo $this->Form->end('edit_20by20.png', array('div' => false, 'class' => 'action-button actionEdit'));
                                                //echo $this->Form->end();
                                                ?>
                                            </div><div  class="col-md-1 action-column"></div>
                                             <div  class="col-md-1 action-column">
                                                <?php       
                                                echo $this->Html->link(
                                                        //$this->Html->tag('i', '', array('class' => 'fa fa-times')), '#UsersModalDeactivate', array(
                                                        $this->Html->image('crossout.png'), '#nasdelete', array(
                                                    'class' => 'btn-deactivate-modal actionDeactivate',
                                                    'data-toggle' => 'modal',
                                                    'role' => 'button',
                                                    'data-uid' => $apmonitoring['Apmonitor']['id'],
                                                    'data-uname'=>$apmonitoring['Apmonitor']['Ip'],        
                                                    'escape' => false), false);       
                                                ?>
                                </div>
                                        </td>
                                        
                                        <?php  } ?>
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
                <?php //echo $user['User']['id']   ?>
                <p><?php echo __('Are you sure you want to delete the Access Point with IP ') ?><span class="label-uname strong"></span> ?</p>
            </div>
            <div class="modal-footer">

                <?php
                echo $this->Form->create('NetworkManagement', array('action' => 'deleteAp'));
                echo $this->Form->input('id', array('id' => 'userIdForDeactivate', 'type' => 'hidden', 'value' => ''));
                echo $this->Form->input('name', array('id' => 'userNameForDeactivate', 'type' => 'hidden', 'value' => ''));
                echo $this->Form->end('Delete', array('class' => 'btn btn-danger pull-left'));
                ?>

                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
            </div>
            <?php //echo $this->Html->link(__('Deactivate'), "/users/deactivate/#{uid}", array('class' => 'btn btn-danger deactivate-user-link'))   ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
    <?php } ?>
    <?php // }  ?>

</body>
<script>

</script>
</html>


