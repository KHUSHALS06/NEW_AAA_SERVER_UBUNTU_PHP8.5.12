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
        $('#coupon_export').submit(function(e) {
            alert('hi');
            alert($('#from_date').val());
            var fromDateArray = $('#from_date').val().split('-');
            var fromDate = new Date(fromDateArray[2]+'-'+fromDateArray[1]+'-'+fromDateArray[0]);
            alert($('#to_date').val());
            var toDateArray = $($('#to_date').val().split('-'));
            var toDate = new Date(toDateArray[2]+'-'+toDateArray[1]+'-'+toDateArray[0]);
            if (fromDate <= toDate) {
                return trrue;
            } else {
                $( "#exportErrorSpan" ).text('From Date must be less than To Date').show();
                return false;
            }
            return false;
        });
    });

</script>
<?php echo $this->element('locations_list') ?>
<?php
$breadcrumb = array(
    array(
        'label' => 'Coupons',
        'link' => '/coupons'
    ),
    array(
        'label' => 'Export to excel'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
<div class = "row">
    <div class = "col-md-12">
        <div class="col-md-5">
            <?php
            echo $this->Form->create('Coupon', array(
                'action' => 'exportCoupon',
                'name' => 'coupon_export',
                'id' => 'coupon_export',
                'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
                'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
                'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"
            ));
            ?>
            <?php
            echo $this->Form->input('from_date', array(
                'label' => __('From'),
                'type' => 'text',
                'autocomplete' => 'off',
                'id' => 'from_date',
                'readOnly' => true,
                'data-bv-date' => "true",
                'data-bv-date-separator' => '-',
                    //'data-bv-date-format' => "YYYY-MM-DD",
                    //'data-bv-date-message' => "This is not a valid date. Please use YYYY-MM-DD format"
            ));
            ?>

            <?php
            echo $this->Form->input('to_date', array(
                'label' => __('To'),
                'type' => 'text',
                'autocomplete' => 'off',
                'id' => 'to_date',
                'readOnly' => true,
                'data-bv-date' => "true",
                'data-bv-date-separator' => '-',
                    //'data-bv-date-format' => "YYYY-MM-DD",
                    //'data-bv-date-message' => "This is not a valid date. Please use YYYY-MM-DD format"
            ));
            ?>
            <span id="exportErrorSpan" class="error" style="display:none;color: red"><i class="fa fa-times"></i></span>
            <?php
            echo $this->Form->end(__("Export", array('class' => 'submit_button')));
            ?>
        </div>
    </div>
</div>
