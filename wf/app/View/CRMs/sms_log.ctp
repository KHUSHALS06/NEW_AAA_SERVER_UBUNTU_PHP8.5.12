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
        var numberOfColumns = document.getElementById('usersTable').rows[0].cells.length;
        $("#emptyTableMessage").attr('colspan', numberOfColumns);
    });
</script>
<?php
echo $this->element('locations_list');
?>

<?php
// $breadcrumbLabel;
$breadcrumb = array(
    array(
        'label' => 'SMS',
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
<?php
// echo $this->Html->css('menubar');
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
<div class="row">
    <ul class="nav nav-tabs">
        <li><a href="<?php echo $this->request->webroot ?>c_r_ms/smss"><i class="fa fa-mobile-phone"></i> Compose</a></li>
        <li class="active"><a href= "#" id="emailLog"><i class="fa fa-inbox"></i> Sent</a></li>
    </ul>
    <br>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="usersTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th >
                            <?php
                            echo $this->Paginator->sort('created', array(
                                'asc' => __('Date') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Date') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?>
                        </th>
                        <th ><?php
                            echo $this->Paginator->sort('subject', array(
                                'asc' => __('Subject') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                'desc' => __('Subject') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                    ), array(
                                'escape' => false
                            ))
                            ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-3"><?php //echo $this->element('search', array('columnName' => 'username'))     ?></td>
                        <td ><?php //echo $this->element('search', array('columnName' => 'message')) ?></td>
                    </tr>
                    <?php if (count($messages) > 0) { ?>
                        <?php foreach ($messages as $message) { ?>
                            <tr>
                                <!--td width="50px"><?php //echo $email['User']['id']                                                      ?></td-->
                                <!-- inline edit javascript code written in the end -->
                                <td><?php echo $message['SentMessage']['created'] ?></td>
                                <td><?php echo $message['SentMessage']['message'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <?php
                    } else {
                        ?>
                        <tr><td id="emptyTableMessage" align="center"><i><?php echo __("No record found") ?></i></td></tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <?php echo $this->Paginator->numbers(); ?>
            <?php //echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>'))));   ?>
        </div><br/>
        <?php echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>')))); ?>
        <?php echo $this->Js->writeBuffer(); ?>
    </div>
</div>

