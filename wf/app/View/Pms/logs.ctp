 
<?php echo $this->element('locations_list'); //pr($conditions);      ?>
<div class="row">
    <div class="col-sm-6" style = "padding-left: 550px; ">
        <?php
        //echo $this->Html->link(__('Restart server'), array('controller' => 'Pms', 'action' => 'logs'), array('class' => 'btn btn-default pull-right'));
        ?>
        <?php
        echo $this->Form->create('Pms', array('action' => 'logs'));
        echo $this->Form->input('target', array('type' => 'hidden', 'value' => 'first'));
        echo $this->Form->end(__("Restart"));
        ?>
    </div> 
</div>


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

<?php $this->Paginator->options(array('url' => array("0"))); ?>
<?php
if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
    ?>

    <div class="table-responsive">
        <table id="nasTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--th><?php //echo $this->Paginator->sort('id', '#')     ?></th-->

                    <th>
                        <?php
                        //   echo "Community";
                        echo $this->Paginator->sort('created', array(
                            'asc' => __('created') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('created') . ' <i class="fa fa-caret-down pull-right"></i>'
                                ), array(
                            'escape' => false
                        ))
                        ?>
                    </th>

                    <th>
                        <?php
                        //   echo "secret";
                        echo $this->Paginator->sort('message', array(
                            'asc' => __('message') . ' <i class="fa fa-caret-up  pull-right"></i>',
                            'desc' => __('message') . ' <i class="fa fa-caret-down pull-right"></i>'
                                ), array(
                            'escape' => false
                        ))
                        ?>
                    </th>

    <!--th><?php echo $this->Paginator->sort('location_id', __('Location')) ?></th-->

                </tr>
            </thead>
            <tbody>
                    <?php if (count($pms) > 0) { ?>  
                        <tr>
                            <td class="col-sm-3"><?php //echo $this->element('search', array('columnName' => 'id'));      ?></td>
            <!--                        <td class="col-sm-3"><?php //echo $this->element('search', array('columnName' => 'shortname'));       ?></td> -->
                            <?php foreach ($pms as $pms) { ?>

                            <tr>
                                    
                                    <td><?php echo ($pms['Pms']['created']); ?></td>
                                    <td><?php
                                        if (($pms['Pms']['ip_address'] == "")) {
                                            echo ($pms['Pms']['message']);
                                        } else {
                                            echo ($pms['Pms']['message']);
                                            echo "&nbsp";
                                            echo "[";
                                            echo "&nbsp";
                                            echo ($pms['Pms']['user']);
                                            echo "&nbsp" . "/";
                                            echo ($pms['Pms']['ip_address']);
                                            echo "]";
                                        }
                                        ?> </td>
                <?php } ?>
                                   
                <?php } ?>
                       
                        </tr>

                    <?php } else { ?>
                        <tr><td id="emptyTableMessage" align="center"><i><?php echo __("No record found") ?></i></td></tr>
                <?php } 
     ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        
    <?php echo $this->Paginator->first(__('First', true), array('class' => 'disabled')) . "&nbsp"; ?>
                <?php echo $this->Paginator->numbers();  ?>
                <?php echo "&nbsp" . $this->Paginator->last(__('Last', true), array('class' => 'disabled')); ?>
    </div> 
    <br/>
               
                <?php echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>'))));  ?>
                <?php echo $this->Js->writeBuffer(); ?>
