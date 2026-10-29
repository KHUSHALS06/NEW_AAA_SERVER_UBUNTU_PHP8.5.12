<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyAclComponent
 *
 * @author dev3
 */
App::uses('AclComponent', 'Controller/Component');
class MyAclComponent extends AclComponent{
    public function check($x,$y,$z='*') {
        return true;
    }
}
