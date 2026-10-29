<?php
echo $this->Form->create('FeedbackForm', array(
            'action' => 'addFeedbackHeader',
            'method' => 'post',
            'id' => 'FeedbackForm',
            'data-bv-feedbackicons-valid' => "glyphicon glyphicon-ok",
            'data-bv-feedbackicons-invalid' => "glyphicon glyphicon-remove",
            'data-bv-feedbackicons-validating' => "glyphicon glyphicon-refresh"
    ));
echo $this->Form->input('title', array(
                'label' => __('Titel'),
                'type' => 'text',
                'data-bv-notempty' => "true",
                'data-bv-notempty-message' => "Field can not be empty",
                    //'data-bv-regexp' => "true",
                    //'data-bv-regexp-regexp' => "^[A-Za-z0-9]{1,}[\.]{0,1}[A-Za-z0-9]{0,}$",
            ));
echo $this->Form->end(__("Submit"));
?>