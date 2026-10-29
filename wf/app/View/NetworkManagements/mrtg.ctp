<?php echo $this->element('locations_list') ?>
<?php
$breadcrumb = array(
    array(
        'label' => 'Network Management',
        //'link' => '/network_managements'
    ),
    array(
        'label' => 'MRTG'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
<iframe src="http://118.91.178.8:85/graphs" width="100%" height="500px"></iframe>
