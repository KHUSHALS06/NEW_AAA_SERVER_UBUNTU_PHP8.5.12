<div class="col-lg-12">
    <table >
        <tr>
            <td class="col-sm-1">
                <?php
                echo $this->Html->image('unauthorized.png', array(
                    'class' => 'img-responsive'
                ))
                ?>
            </td>
            <td style="text-align: left;">
                <?php
                echo '<h1>Access denied</h1>';
                echo 'You are not authorized to access this page.';
                ?>
            </td>
        </tr>
    </table>
</div>
