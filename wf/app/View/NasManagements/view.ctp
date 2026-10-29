

<hr>
   <?php
// To display the breadcrumb. 'label' is the label to be displayed and 'link' redirects to a particular page
$breadcrumb = array(
    array(
        'label' => 'Nasmanagement',
        'link' => '/NasManagements'
    ),
    array(
        'label' => 'NasManagement'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
<div class="row">
     
    <div class="media-body col-lg-6">
     
        
         <?php if (CakeSession::read('Auth.User.Group.name') == Configure::read('Application.wf_admin')) { ?>
        <table class="table table-striped">
            <?php
        // foreach($data as $nas){
         // $this->session->read($data);
        ?>
            <tr>
                <td><strong>Nasname: </strong></td>
                <td><?php echo ($nas['Nas']['nasname']);  ?></td>
            </tr>
            <tr>
                <tr>
                <td><strong>Shortname: </strong></td>
                <td><?php echo ($nas['Nas']['shortname']); ?></td>
            </tr>
            <tr>
                <td><strong>Type: </strong></td>
                <td><?php echo ($nas['Nas']['type']); ?></td>
            </tr>
            <tr>
                <td><strong>Ports: </strong></td>
                <td><?php echo ($nas['Nas']['ports']); ?></td>
            </tr>
            <tr>
                <td><strong>secret: </strong></td>
                <td><?php echo __('********'); ?></td>
            </tr>
            <tr>
                <td><strong>Server: </strong></td>
                <td><?php echo ($nas['Nas']['server']); ?></td>
            </tr>
            <tr>
                <td><strong>Community: </strong></td>
                <td><?php echo ($nas['Nas']['community']); ?></td>
            </tr>
            <tr>
                <td><strong>Description: </strong></td>
                <td><?php echo($nas['Nas']['description']); ?></td>
            </tr>
        <?php  } ?>
        </table>
        
    </div>
     
</div>


