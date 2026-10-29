<?php
//pr($cmsId);
//pr($createFeedbackFormData);
$chkHeader = '';
foreach ($createFeedbackFormData as $value) {
    if ($chkHeader != $value['FeedbackHeader']['title']) {
        $chkHeader = $value['FeedbackHeader']['title'];
        //echo $chkHeader;
        //echo '<br>';
    }
    //echo $value['FeedbackForm']['name'];
    //echo '<br>';
}
?>
<?php $bgurl = $this->request->webroot . 'cms_loginpages/displayBackGround/' . $cmsId['0']['CmsLoginpage']['id'] . '/'; ?>
<body style="background-image: url('<?php echo $bgurl ?>;'); background-position: center top; position:absolute; width:100%; margin-left: 1px; margin-right: 1px; padding-left: 0px; padding-right: 0px;">
    <div id="wrapper">
        <div id="page-wrapper">
            <div style="background-color: whitesmoke">
                <?php
                echo $chkHeader;
                echo '<br>';
                ?>
            </div>
        </div>
    </div>


</body>