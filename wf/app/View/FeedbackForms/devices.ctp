<script type="text/javascript">

    $(document).ready(function () {
        var numberOfColumns = document.getElementById('feedbackDevice').rows[0].cells.length;
        $("#emptyTableMessage").attr('colspan', numberOfColumns);
        
        $('#addDeviceForm').bootstrapValidator();
        
        $('.actionView').tooltip({
            'show': true,
            'placement': 'bottom',
            'title': "View"
        });
        $('.actionEdit').tooltip({
            'show': true,
            'placement': 'bottom',
            'title': "Edit"
        });

        $('.actionDelete').tooltip({
            'show': true,
            'placement': 'bottom',
            'title': "Delete"
        });
    });

</script>
<?php
echo $this->element('locations_list');
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
$breadcrumb = array(
    array(
        'label' => 'Feedback',
        'link' => '/feedback_forms/feedbackInbox'
    ),
    array(
        'label' => 'Devices'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb)); //$breadcrumb
//echo $this->Fck->fckeditor(array('Model', 'field'), $html->base, $yourContentVariable);
echo $this->Session->flash();
if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
    //pr($feedbacks);
    ?>
    <div class="row">
        <div class="col-md-10"><!--h3><?php //echo __('Billing Plan')               ?></h3--></div>
        <div class="col-md-2">
            <?php
            echo $this->Html->link(
                    //$this->Html->tag('i', '', array('class' => 'fa fa-times')), '#UsersModalDeactivate', array(
                    __('Add Device'), '#addDevice', array(
                'class' => 'btn btn-default pull-right',
                'data-toggle' => 'modal',
                'role' => 'button',
                'escape' => false), false);
            ?>
        </div>
    </div>
    <div class="row">

        <div class="col-12">
            <!--hr-->
            <?php //echo $this->Html->para(null, $this->Paginator->counter(array('format' => __('<i>Page</i> <b> %page% </b> of <b> %pages% </b>, showing <b> %current% </b> <i>records</i> out of <b> %count% </b> total, starting on <i> record </i> <b> %start% </b>, ending on <b> %end% </b>'))));  ?>
            <hr>
            <div class="table-responsive">
                <table id="feedbackDevice" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <!--th><?php //echo $this->Paginator->sort('id', '#')                      ?></th-->
                            <th>
                                <?php
                                echo $this->Paginator->sort('udi', array(
                                    'asc' => __('Device ID') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                    'desc' => __('Device ID') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                        ), array(
                                    'escape' => false
                                ));
                                ?>
                            </th>
                            <th>
                                <?php
                                echo $this->Paginator->sort('username', array(
                                    'asc' => __('Username') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                    'desc' => __('Username') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                        ), array(
                                    'escape' => false
                                ));
                                ?>
                            </th>
                            <th>
                                <?php
                                echo $this->Paginator->sort('password', array(
                                    'asc' => __('Password') . ' <i class="fa fa-caret-up  pull-right"></i>',
                                    'desc' => __('Password') . ' <i class="fa fa-caret-down  pull-right"></i>'
                                        ), array(
                                    'escape' => false
                                ));
                                ?>
                            </th>
                            <!--<th style="color: #428BCA; width: 200px"><?php echo __('Actions') ?></th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($devices) > 0) { ?>
                            <?php foreach ($devices as $device) { ?>
                                <tr>
                                    <!--td width="50px"><?php //echo $header['BillingPlan']['id']                      ?></td-->
                                    <!-- inline edit javascript code written in the end -->
                                    <td><div class ="editDeviceId" data-type="text" data-name="udi" data-pk="<?php echo $device['FeedbackDevice']['id'] ?>"><?php echo $device['FeedbackDevice']['udi'] ?></div></td>
                                    <td><div class ="editUsername" data-type="text" data-name="username" data-pk="<?php echo $device['FeedbackDevice']['id'] ?>"><?php echo $device['FeedbackDevice']['username'] ?></div></td>
                                    <td><div class ="editPassword" data-type="text" data-name="password" data-pk="<?php echo $device['FeedbackDevice']['id'] ?>"><?php echo $device['FeedbackDevice']['password'] ?></div></td>
            <!--                                <td>
                                        <div class="row col-md-12 action-column" style="padding-top: -5px; padding-bottom: -5px">
                                            <div class="col-md-1 action-column">
                                    <?php
                                    echo $this->Form->create('FeedbackForm', array('action' => 'changeHeaderPriority'));
                                    echo $this->Form->input('id', array('type' => 'hidden', 'value' => $device['FeedbackDevice']['id']));
                                    echo $this->Form->end('view_20by20.png', array('div' => false, 'class' => 'action-button actionView'));
                                    ?>
                                            </div>
                                            <div class="col-md-1 action-column"></div>
                                            <div class="col-md-1 action-column">
                                    <?php
                                    echo $this->Form->create('FeedbackForm', array('action' => 'changeHeaderPriority'));
                                    echo $this->Form->input('id', array('type' => 'hidden', 'value' => $device['FeedbackDevice']['id']));
                                    echo $this->Form->end('edit_20by20.png', array('div' => false, 'class' => 'action-button actionEdit'));
                                    ?>
                                                 </form>
                                            </div>
                                        </div>
                                    </td>-->
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } else { ?>
                        <tr><td id="emptyTableMessage" colspan="2" style="background:#E9E8E8" align="center"><i><?php echo __("No record found") ?></i></td></tr>
                    <?php } ?>
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
    <div class="modal fade" id="addDevice">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 id="myModalLabel"><?php echo __('Add Device') ?></h4>

                </div>
                <div class="modal-body">
                    <?php
                    echo $this->Form->create('FeedbackForm', array(
                        'id' => 'addDeviceForm',
                        'action' => 'addDevice',
                        'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
                        'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
                        'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"
                    ));
                    echo $this->Form->input('udi', array(
                        'label' => __('Unique Device Id'),
                        'type' => 'text',
                        'data-bv-notempty' => 'true',
                        'data-bv-notempty-message' => "The username is required and cannot be empty",
                    ));
                    echo $this->Form->input('username', array(
                        'label' => __('Username'),
                        'type' => 'text',
                        'data-bv-notempty' => 'true',
                        'data-bv-notempty-message' => "The username is required and cannot be empty",
                        'data-bv-stringlength' => 'true',
                        'data-bv-stringlength-min' => '6',
                        'data-bv-stringlength-max' => '30',
                        'data-bv-stringlength-message' => 'The username must be more than 6 and less than 30 characters long',
                        'data-bv-regexp' => "true",
                        'data-bv-regexp-regexp' => "^[A-Za-z0-9_]{1,}[\.]{0,1}[A-Za-z0-9_]{0,}$",
                        'data-bv-regexp-message' => "Username can only consist of alphabets, numbers and underscore, with no blank space",
                    ));
                    echo $this->Form->input('password', array(
                        'label' => __('Password'),
                        'type' => 'text',
                        'data-bv-notempty' => 'true',
                        'data-bv-notempty-message' => "The password is required and cannot be empty",
                        'data-bv-stringlength' => 'true',
                        'data-bv-stringlength-min' => '6',
                        'data-bv-stringlength-max' => '30',
                        'data-bv-stringlength-message' => 'The password must be more than 6 and less than 30 characters long',
                    ));
                    ?>

                </div>
                <div class="modal-footer">
                    <?php
                    echo $this->Form->end('Save', array('class' => 'btn btn-primary pull-left'));
                    ?>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php
}
?>
<script>
    $(function () {
        var newURL = window.location.protocol + "//" + window.location.host + "" + window.location.pathname;
        $.fn.editable.defaults.mode = 'inline';
        newURL = newURL.replace("/devices", "");
        $('.editDeviceId').editable({
            url: newURL + '/updateDeviceId'
        });
        $('.editUsername').editable({
            url: newURL + '/updateUsername'
        });
        $('.editPassword').editable({
            url: newURL + '/updatePassword'
        });
    });

</script>