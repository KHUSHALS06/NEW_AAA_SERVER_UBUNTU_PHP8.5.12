<style>
.marquee-thumb{
    height:45px;
    max-width:120px;
    object-fit:contain;
}

/* small square color picker */
input[type="color"]{
    width:40px;
    height:35px;
    padding:0;
    border:none;
    cursor:pointer;
}

@media(max-width:768px){
    .btn{margin-bottom:5px}
}
</style>

<h3><i class="fa fa-image"></i> Marquee Manager</h3>
<hr>

<!-- GLOBAL CONTROL -->
<div class="alert alert-info">
<b>Marquee:</b>
<?php echo $global['MarqueeImage']['status']?'Enabled':'Disabled'; ?>

<?php
echo $this->Html->link(
    $global['MarqueeImage']['status']?'Disable':'Enable',
    array('action'=>'toggleGlobal',$global['MarqueeImage']['id']),
    array(
        'class'=>$global['MarqueeImage']['status']
            ? 'btn btn-danger btn-xs pull-right'
            : 'btn btn-success btn-xs pull-right'
    )
);
?>
</div>

<!-- GLOBAL TEXT + COLOR -->
<div class="panel panel-default">
<div class="panel-heading"><b>Marquee Text & Color</b></div>
<div class="panel-body">

<?php
echo $this->Form->create('MarqueeImage',array(
    'url'=>array('action'=>'saveGlobal')
));

echo $this->Form->hidden('id',array(
    'value'=>$global['MarqueeImage']['id']
));

// TEXT FIELD
echo $this->Form->input('marquee_text',array(
    'label'=>false,
    'value'=>$global['MarqueeImage']['marquee_text'],
    'placeholder'=>'Enter scrolling text',
    'class'=>'form-control'
));

echo '<br><label>Text Color</label><br>';

// COLOR FIELD
echo $this->Form->input('text_color',array(
    'type'=>'color',
    'label'=>false,
    'value'=>!empty($global['MarqueeImage']['text_color'])
                ? $global['MarqueeImage']['text_color']
                : '#000000'
));

echo '<br><br>';

// IMPORTANT: keep original structure
echo $this->Form->end('Save');

?>

</div>
</div>

<!-- IMAGE UPLOAD -->
<div class="panel panel-default">
<div class="panel-heading"><b>Add Image</b></div>
<div class="panel-body">

<?php
echo $this->Form->create('MarqueeImage',array(
    'type'=>'file',
    'url'=>array('action'=>'upload')
));

echo $this->Form->input('image',array(
    'type'=>'file',
    'label'=>false,
    'required'
));

echo '<br>';

echo $this->Form->end('Upload');
?>

</div>
</div>

<!-- IMAGE LIST -->
<div class="table-responsive">
<table class="table table-bordered">
<tr>
    <th>Preview</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php foreach($images as $img){
if($img['MarqueeImage']['is_global']) continue; ?>

<tr>
<td>
    <img class="marquee-thumb"
         src="/uploads/marquee/<?php echo h($img['MarqueeImage']['image_name']); ?>">
</td>

<td>
    <?php echo $img['MarqueeImage']['status']?'Active':'Inactive'; ?>
</td>

<td>
<?php
echo $this->Html->link(
    $img['MarqueeImage']['status']?'Deactivate':'Activate',
    array('action'=>'toggleImage',$img['MarqueeImage']['id']),
    array('class'=>'btn btn-warning btn-xs')
);

echo ' ';

echo $this->Html->link(
    'Delete',
    array('action'=>'delete',$img['MarqueeImage']['id']),
    array(
        'class'=>'btn btn-danger btn-xs',
        'confirm'=>'Delete?'
    )
);
?>
</td>
</tr>

<?php } ?>
</table>
</div>

