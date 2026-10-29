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
$breadcrumb = array(
    array(
        'label' => 'Email',
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
        <li><a href="<?php echo $this->request->webroot ?>c_r_ms/emails"><i class="fa fa-envelope-o"></i> Compose</a></li>
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
                        <th style="color: #428BCA; width:200px"><?php echo __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-3"><?php //echo $this->element('search', array('columnName' => 'username'))     ?></td>
                        <td ><?php //echo $this->element('search', array('columnName' => 'subject')) ?></td>
                        <td class="col-sm-1"><?php //echo $this->element('search', array('columnName' => 'username'))                     ?></td>
                    </tr>
                    <?php if (count($emails) > 0) { ?>
                        <?php foreach ($emails as $email) { ?>
                            <tr>
                                <!--td width="50px"><?php //echo $email['User']['id']                                                      ?></td-->
                                <!-- inline edit javascript code written in the end -->
                                <td><?php echo date('m-d-Y h:n:s A',  strtotime($email['SentMail']['created'])) ?></td>
                                <td><?php echo $email['SentMail']['subject'] ?></td>
                                <td width="200px">
        <!--                                    <table  class="table" style="width:100px">
                                        <tr>
                                            <td>-->
                                    <div class="row col-md-12 action-column action-link" style="width: 120px">
                                        <div class="col-md-1 action-column">
                                            <?php
                                            echo $this->Form->create('CRM', array('action' => 'viewEmail'));
                                            echo $this->Form->input('id', array('type' => 'hidden', 'value' => $email['SentMail']['id']));
                                            echo $this->Form->input('location_id', array('type' => 'hidden', 'value' => $email['SentMail']['location_id']));
                                            echo $this->Form->end('view_20by20.png', array('div' => false, 'class' => 'action-button actionView'));
                                            ?>
                                            <!-- </form>-->
                                        </div>
                                    </div>
                                    <!--                                            </td>
                                                                            </tr></table>-->
                                </td>
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

