<script type="text/javascript" src="/HotSpotAdmin/app/webroot/js/tinymce/plugins/compat3x/tiny_mce_popup.js">
</script>
<script type="text/javascript" src="/HotSpotAdmin/app/webroot/js/lib/jquery.js">
</script>
<script language="javascript" type="text/javascript">
    var configname
    var FileBrowserDialogue = {
        
        init : function () {
            // Here goes your code for setting your custom things onLoad.
        },
        mySubmit : function (e) {
            //var URL = 'hi';//document.my_form.my_field.value;
            alert(e.id);
            var URL = '/HotSpotAdmin/app/webroot/LogoImages/'+e.id;
        
            var win = tinyMCEPopup.getWindowArg("window");

            // insert information now
            win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;

            // are we an image browser
            if (typeof(win.ImageDialog) != "undefined")
            {
                // we are, so update image dimensions and preview if necessary
                if (win.ImageDialog.getImageData) win.ImageDialog.getImageData();
                if (win.ImageDialog.showPreviewImage) win.ImageDialog.showPreviewImage(URL);
            }

            // close popup window
            tinyMCEPopup.close();
        }
    }

    tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);

</script>
<!--
<form name="my_form">
<input type="text" name="my_field" />
<input type="button" value="Submit" onClick="FileBrowserDialogue.mySubmit();">
</form>-->
<?php
$dir = './';
$file_display = array('jpg', 'jpeg', 'png', 'gif');

if (file_exists($dir) == false) {
    echo 'Directory "', $dir, '" not found!';
} else {
    //var_dump($dir);
    $dir_contents = scandir($dir);
    //var_dump($dir_contents);
    $i = 0;
    echo '<form name="my_form">';
    foreach ($dir_contents as $file) {
        $x = explode('.', $file);
        $x = end($x);
        $file_type = strtolower($x);
        if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
            $name = basename($file);
            //echo <img class='img'.$i.'"' height='100px' width='100px' src='img.php?name={$name}' onClick='FileBrowserDialogue.mySubmit(this);' />;
            echo '<img id="' . $name . '" class="imgimg" height="100px" width="100px" src="' . $name . '" onClick="FileBrowserDialogue.mySubmit(this);"/>';
            $i++;
        }
    }
    echo '</form>';
}
?>


