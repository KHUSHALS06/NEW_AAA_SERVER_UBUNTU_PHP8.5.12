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

<?php
echo $this->Form->create('Coupon', array('action' => $this->request->param('action'), 'method' => 'post', 'class' => "navbar-form"));
//pr($logged_in);
echo $this->Form->input('type', array(
    'label' => 'Filtered',
    'options' => array('scratch_card' => 'Scratch Card', 'generated' => 'Generated', 'online_purchased' => 'Online Purchased'),
    //'selected' => $this->Session->read('choosed_location_id'),
    'empty' => 'Select card type',
    'onChange' => 'javascript:this.form.submit()'
));
?>
</form>
