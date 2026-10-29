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
     
     
<?php echo $this->element('locations_list') ?>
<?php
$breadcrumb = array(
    array(
        'label' => 'Users',
        'link' => '/users'
    ),
    array(
        'label' => $breadcrumbLabel
    )
);
echo __($this->element('breadcrumb', array('links' => $breadcrumb)));
?>

<!--h3><?php //echo $userData['username']  ?></h3-->
<hr>
<p style="font-style: italic; color: red">(Click on the name to edit.)</p>

<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="https://secure.gravatar.com/avatar/<?php echo md5($user['email']) ?>?s=80&d=mm">
    </a>
    <div class="media-body col-lg-6 col-md-5">
        <h4 class="media-heading"><?php //echo $user['username']  ?></h4>
        <table class="table table-striped">
            <tr>
                <td><strong>Name: </strong></td>
                <td><div class ="editAliasName" data-type="text" data-pk="<?php echo $userData['id'] ?>" data-name="alias"><?php echo $userData['alias'] ?></div></td>
            </tr>
            <tr>
                <td><strong>Username: </strong></td>
                <td><?php echo $userData['username'] ?></td>
            </tr>
            <tr>
                <td><strong>Email: </strong></td>
                <td><?php echo $userData['email'] ?></td>
            </tr>
            <tr>
                <td><strong>Role: </strong></td>
                <td><?php echo ucwords($groupData['name']) ?></td>
            </tr>
        </table>

    </div>
</div>
<script>
    $(function(){
        $.fn.editable.defaults.mode = 'inline'; 
        var newURL = window.location.protocol + "//" + window.location.host + "" + window.location.pathname;
        var truncatedURL = newURL.replace("view", "");
               
        $('.editAliasName').editable({
            url: truncatedURL+'update_alias',
            validate: function(value) {
                if($.trim(value) == '') {
                    return 'This field is required';
                }
                if(!(/^[a-zA-Z\s]*$/.test(value))){
                    return 'Only alphabets allowed';
                }
            }
        });
    });
</script>
