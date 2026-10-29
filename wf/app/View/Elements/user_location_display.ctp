<div class="col-lg-8">
    <h2><small>
            <?php
            if ($this->Session->read('choosed_location_id') == '') {
                echo AuthComponent::user('username');
            } else {
                echo AuthComponent::user('username') . " / " . $this->Session->read('locations_list.' . $this->Session->read('choosed_location_id'));
            }
            ?>
        </small>
    </h2>
</div>