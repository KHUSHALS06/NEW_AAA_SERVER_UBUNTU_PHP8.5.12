<div class="col-lg-4">
    <?php
    //$agentList = array();
    //$agentList = $this->Session->read('agents_list');

    //pr($locationList);
    echo $this->Form->create($this->request->params['controller'], array('method' => 'post', 'action' => $this->request->params['action']));
    echo $this->Form->input('commission_agent_id', array(
        'label' => false,
        'options' => $agent_list, //$this->Session->read('locations_list'),
        //'selected' => $this->Session->read('choosed_location_id'),
        //'empty' => $allOrNoLocation,
        'onChange' => 'javascript:this.form.submit()'
    ));
    ?>
</form>
<br>
</div>