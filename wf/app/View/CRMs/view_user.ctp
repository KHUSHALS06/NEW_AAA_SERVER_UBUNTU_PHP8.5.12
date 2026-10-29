<?php
/**
 * This ctp displays the billing plan details
 * 
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 * @author Preeti Joseph<preeti@wifonic.com>
 */
?>
<?php
// To display the breadcrumb. 'label' is the label to be displayed and 'link' redirects to a particular page

$breadcrumb = array(
    array(
        'label' => 'Registered User',
        'link' => '/c_r_ms/registeredUsers'
    ),
    array(
        'label' => 'view'
    )
);

echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>

<hr>
<div class="row">
    <div class="media-body col-lg-6">

        <table class="table table-striped">
            <tr>
                <td><strong>Name: </strong></td>
                <td><?php echo __($registeredUser['RegisteredUser']['name']); ?></td>
            </tr>
            <tr>
                <td><strong>Gender: </strong></td>
                <td><?php echo __($registeredUser['RegisteredUser']['gender']); ?></td>
            </tr>
            <tr>
                <td><strong>Date of Birth: </strong></td>
                <td><?php echo __(date('m-d-Y',  strtotime($registeredUser['RegisteredUser']['date_of_birth']))); ?></td>
            </tr>
            <tr>
                <td><strong>Email: </strong></td>
                <td><?php echo __($registeredUser['RegisteredUser']['email']); ?></td>
            </tr>
            <tr>
                <td><strong>Contact No: </strong></td>
                <td><?php echo __($registeredUser['RegisteredUser']['contact_no']); ?></td>
            </tr>
            <tr>
                <td><strong>Subscription: </strong></td>
                <td><?php echo __($registeredUser['RegisteredUser']['type']); ?></td>
            </tr>
            <tr>
                <td><strong>Address: </strong></td>
                <td><?php echo __($registeredUser['RegisteredUser']['address']); ?></td>
            </tr>
            <tr>
                <td><strong>City: </strong></td>
                <td><?php echo __($registeredUser['RegisteredUser']['city']); ?></td>
            </tr>
            <tr>
                <td><strong>State: </strong></td>
                <td><?php echo __($registeredUser['RegisteredUser']['state']); ?></td>
            </tr>
            <tr>
                <td><strong>Country: </strong></td>
                <td><?php echo __($registeredUser['RegisteredUser']['country']); ?></td>
            </tr>
            <tr>
                <td><strong>Postal Code: </strong></td>
                <td><?php echo __($registeredUser['RegisteredUser']['post_code']); ?></td>
            </tr>
        </table>
    </div>
</div>
