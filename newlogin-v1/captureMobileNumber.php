<?php
require_once 'db.php';
require_once 'inc.php';

$linkloginonly = $_POST['linkloginonly'] ?? '';
$linkorig = $_POST['dst'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
?>
<form name="login" action="<?php echo h($linkloginonly); ?>" method="post">
                <input type="hidden" name="dst" value="<?php echo h($linkorig); ?>"></input>
                <input type="hidden" name="popup" value="false"></input>
                <input type="hidden" name="username" value="<?php echo h($username); ?>"></input>
                <input type="hidden" name="password" value="<?php echo h($password); ?>"></input>
</form>
<script language="JavaScript">
	document.login.submit();
</script>
