<?php
/**
 * This ctp displays the commission challan details
 * 
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@gmail.com>
 * @author Preeti Joseph<preeti@wifonic.com>
 */
?>
<?php //echo $this->element('locations_list')     ?>
<?php
// To display the breadcrumb. 'label' is the label to be displayed and 'link' redirects to a particular page
$breadcrumb = array(
    array(
        'label' => 'Commission',
        'link' => '#'
    ),
    array(
        'label' => 'Commission Challans',
        'link' => '/commission_challans'
    ),
    array(
        'label' => $breadcrumbLabel
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<hr>
<p style="font-style: italic; color: red">(Click on the fields to edit.)</p>

<div class="media">

    <div class="media-body col-lg-6 col-md-5">
        <h4 class="media-heading"><?php //echo $user['username']      ?></h4>
        <table class="table table-striped">
            <tr>
                <td><strong>From Date: </strong></td>
                <td><div class ="editFirstName" data-type="text" data-pk="<?php echo $commissionChallansData['CommissionChallan']['id'] ?>" data-name="from"><?php echo __($commissionChallansData['CommissionChallan']['from']) ?></div></td>
            </tr>
            <tr>
                <td><strong>To Date: </strong></td>
                <td><div class ="editMiddleName" data-type="text" data-pk="<?php echo $commissionChallansData['CommissionChallan']['id'] ?>" data-name="middle_name"><?php echo __($commissionChallansData['CommissionChallan']['to']) ?></div></td>
            </tr>
            <tr>
                <td><strong>Location: </strong></td>
                <td><div class ="editAddress1" data-type="text" data-pk="<?php echo $commissionChallansData['CommissionChallan']['id'] ?>" data-name="address1">
                        <?php
                        $tempLocationsListArray = $this->Session->read('locations_list');
                        echo $tempLocationsListArray[$commissionChallansData['CommissionChallan']['location_id']];
                        unset($tempLocationsListArray);
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Challan Name: </strong></td>
                <td><div class ="editLastName" data-type="text" data-pk="<?php echo $commissionChallansData['CommissionChallan']['id'] ?>" data-name="last_name"><?php echo __($commissionChallansData['CommissionChallan']['challan_name']) ?></div></td>
            </tr>

            <tr>
                <td><strong>Type: </strong></td>
                <td><div class ="editAddress2" data-type="text" data-pk="<?php echo $commissionChallansData['CommissionChallan']['id'] ?>" data-name="address2"><?php echo __($commissionChallansData['CommissionChallan']['type']) ?></div></td>
            </tr>
            <tr>
                <td><strong>Size: </strong></td>
                <td><div class ="editCity" data-type="text" data-pk="<?php echo $commissionChallansData['CommissionChallan']['id'] ?>" data-name="city"><?php echo __($commissionChallansData['CommissionChallan']['size']) ?></div></td>
            </tr>
            <tr>
                <td><strong>Challan: </strong></td>
                <td>
                    <?php
                    echo $this->Html->link($commissionChallansData['CommissionChallan']['challan_name'], array('controller' => 'commission_challans', 'action' => 'printChallan', $commissionChallansData['CommissionChallan']['id']), array('class' => ''));
                    ?>
                </td>
            </tr>
            <tr>
                <td><strong>Amount: </strong></td>
                <td><div class ="editState" data-type="text" data-pk="<?php echo $commissionChallansData['CommissionChallan']['id'] ?>" data-name="state"><?php echo __($commissionChallansData['CommissionChallan']['amount']) ?></div></td>
            </tr>

        </table>

    </div>
</div>
<script>
    // Inline edit
    $(function(){
        var newURL = window.location.protocol + "//" + window.location.host + "" + window.location.pathname;
        var truncatedURL = newURL.replace("view", "");
        $.fn.editable.defaults.mode = 'inline'; 
        
        /*$('.editFirstName').editable({
            url: truncatedURL+'update_first_name',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }
        });
        $('.editMiddleName').editable({
            url: truncatedURL+'update_middle_name',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }
        });
        $('.editLastName').editable({
            url: truncatedURL+'update_last_name',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }
        });
        $('.editAddress1').editable({
            url: truncatedURL+'update_address1'
            /*validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }*/
        // });
        /* $('.editAddress2').editable({
            url: truncatedURL+'update_address2'
            /*validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }*/
        /* });
        $('.editCity').editable({
            url: truncatedURL+'update_city',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }
        });
        $('.editPostcode').editable({
            url: truncatedURL+'update_postcode',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[0-9]*$/.test(value))){
                    return 'Only numbers allowed';
                }
            }
        });
        $('.editState').editable({
            url: truncatedURL+'update_state',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }
        });
        $('.editCountry').editable({
            url: truncatedURL+'update_country',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }
        });
        $('.editBank').editable({
            url: truncatedURL+'update_bank',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }
        });
        $('.editBranch').editable({
            url: truncatedURL+'update_branch',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }
        });
        $('.editAccountNumber').editable({
            url: truncatedURL+'update_account_number',
            /*validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }*/
        /*  });
        $('.editMobile').editable({
            url: truncatedURL+'update_mobile',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^([1-9]{1})([0-9]{9})$/.test(value))){
                    return 'Only 10 digits allowed';
                }
            }
        });
        $('.editPhone').editable({
            url: truncatedURL+'update_phone',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[0-9]*$/.test(value))){
                    return 'Only 10 digits allowed';
                }
            }
        });
        $('.editEmail').editable({
            url: truncatedURL+'update_email',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^([\w\-\.]+)@((\[([0-9]{1,3}\.){3}[0-9]{1,3}\])|(([\w\-]+\.)+)([a-zA-Z]{2,4}))$/.test(value))){
                    return 'Invalid Email';
                }
            }
        });
        /*$('.editEmail').editable({
            url: newURL+'update_email'
        });
        $('.group').editable({
            url: newURL+'/update_group',
            title: 'Select group'
        });*/
     
        
    });
</script>