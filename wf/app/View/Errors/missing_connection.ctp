<html>
    <script >
            $(document).ready(function () {
                 $(".close").click(function () {
                $('.alert').hide();
                 $('.close').hide();
            });
            });
                    </script>
<style>
    .alert {
    border: 1px solid transparent;
    border-radius: 4px;
    margin-bottom: 20px;
    padding: 15px;
}
.close{
   text-decoration :none;
   float: right;
}
.error_msg {
    background-color: #f2dede;
    border-color: #ebccd1;
    color: #a94442;
    width: 580px;
}
</style>
<body>
<?php echo $this->element('locations_list'); ?>
<div class="row">
    <div class="col-sm-12" style="padding-left: 50px;">
        <table>
            <tr>
                <td > 
                     <a href="#" class="close">x</a>
                   <div class="error_msg alert">
                     
                        <?php echo '<p>Error</p>'; ?>
                         <?php echo "couldn't connect to database"; ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
