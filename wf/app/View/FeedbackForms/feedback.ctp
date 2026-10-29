<?php
echo $this->Html->css(array('rateit/rateit'));
echo $this->Html->script(array('rateit/jquery.rateit','feedbackRating')); //'bootstrap-tooltip', 'bootstrap-rating'
?>

<?php
$breadcrumb = array(
    array(
        'label' => 'Feedback',
        'link' => '/feedback_forms'
    ),
    array(
        'label' => 'Preview'
    )
);
echo $this->element('breadcrumb', array('links' => $breadcrumb));
?>
<div class="row col-md-12">
    <div class="col-md-5">
        <?php
        if (count($form_details) > 0) {
            echo $this->Form->create('Feedback', array(
                'id' => 'Feedback',
                'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
                'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
                'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"));
            $headerLine ='';
            foreach ($form_details as $form_detail) {
                if($form_detail['FeedbackHeader']['title'] != $headerLine){
                    $headerLine = $form_detail['FeedbackHeader']['title'];
                    echo '<br>';
                    echo '<h4>'.$headerLine.'</h4>';
                    echo '<hr>';
                }
                //pr($form_detail);
                switch ($form_detail['ElementType']['name']) {
                    case 'radio':
                        $x = unserialize($form_detail['FeedbackForm']['value']);
                        $options = array();
                        if (count($x) > 0) {
                            foreach ($x as $value) {
                                $options[$value] = $value;
                            }
                        }
                        echo '<br/><label>' . $form_detail['FeedbackForm']['name'] . '</label><br/>';
                        $attributes = array('legend' => false, 'label' => false, 'separator' => '<br/>');
                        echo $this->Form->radio($form_detail['FeedbackForm']['colum_name'], $options, $attributes);
                        echo '<br/>';
                        break;
                    /*
                      case 'checkbox':
                      $x = unserialize($form_detail['FeedbackForm']['value']);
                      $options = array();
                      if (count($x) > 0) {
                      foreach ($x as $value) {
                      $options[$value] = $value;
                      }
                      }
                      echo '<label>' . $form_detail['FeedbackForm']['name'] . '</label><br/>';
                      $attributes = array('legend' => false, 'label' => false, 'before' => '<div>', 'after' => '</div>');
                      echo $this->Form->checkbox($form_detail['FeedbackForm']['colum_name'], $options, $attributes);
                      ?>
                      <br/>
                      <?php
                      break;
                     * 
                     */
                    case 'text':
                        echo '<br/>';
                        echo $this->Form->input($form_detail['FeedbackForm']['colum_name'], array(
                            'label' => $form_detail['FeedbackForm']['name'],
                            'title' => $form_detail['FeedbackForm']['name'],
                            'type' => 'text'
                        ));
                        //echo '<br/>';
                        break;
                    case 'textarea':
                        echo '<br/>';
                        echo $this->Form->input($form_detail['FeedbackForm']['colum_name'], array(
                            'label' => $form_detail['FeedbackForm']['name'],
                            'title' => $form_detail['FeedbackForm']['name'],
                            'type' => 'textarea'
                        ));
                        //echo '<br/>';
                        break;
                    case 'rating':
                        echo '<br/>';
                        echo '<label>' . $form_detail['FeedbackForm']['name'] . '</label><br/>';
                        echo $this->Form->input($form_detail['FeedbackForm']['colum_name'], array(
                            'type' => 'hidden',
                            'id' => $form_detail['FeedbackForm']['colum_name'],
                            'label' => $form_detail['FeedbackForm']['name'],
                            'title' => $form_detail['FeedbackForm']['name'],
                            'value' => '0'
                        ));
                        echo '<div id=' . $form_detail['FeedbackForm']['colum_name'] . '_star' . ' class="rateit"></div>';
                        echo '<br/>';
                        break;
                    default :
                        break;
                }
            }
            ?>
            <?php
            echo '<br/><br/>';
            echo $this->Form->end(__("Submit"), array('disabled' => 'disabled' ));
        }
        ?>
    </div>
</div>