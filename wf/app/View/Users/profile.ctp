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


<div class="row">
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
    echo $this->element('breadcrumb', array('links' => $breadcrumb));
    ?>
    <!--h3><?php //echo $label ?></h3-->
    <p style="font-style: italic; color: red">(Click on the values to edit.)</p>
    <br/>
    <div class="col-lg-6">
        <table class="table table-striped">
            <tr>
                <td><strong>Username: </strong></td>   
                <td><div class ="editUserName" data-type="text" data-pk="<?php echo $user['id'] ?>" data-name="username"><?php echo $user['username'] ?></div></td>
            </tr>
            <tr>
                <td><strong>Name: </strong></td>   
                <td><div class ="editAlias" data-type="text" data-pk="<?php echo $user['id'] ?>" data-name="alias"><?php echo $user['alias'] ?></div></td>
            </tr>
            <tr>
                <td><strong>Email: </strong></td>   
                <td><div class ="editEmail" data-type="text" data-pk="<?php echo $user['id'] ?>" data-name="email"><?php echo $user['email'] ?></div></td>
            </tr>

        </table>
    </div>
</div>
<script>
    $(function(){
        var newURL = window.location.protocol + "//" + window.location.host + "" + window.location.pathname;
        $.fn.editable.defaults.mode = 'inline'; 
        /*$('.editUserName').editable({
            url: newURL+'/update_username'
        });*/
        newURL = newURL.replace("me", "users"); 
        $('.editAlias').editable({
            
            url: newURL+'/update_alias'
        });
        /*$('.editEmail').editable({
            url: newURL+'/update_email'
        });*/
        
    });
</script>
