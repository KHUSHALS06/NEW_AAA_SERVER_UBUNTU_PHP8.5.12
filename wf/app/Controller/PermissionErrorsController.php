<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of localErrorsController
 *
 * @author dev3
 */
class PermissionErrorsController extends AppController {
    //put your code here
    public function index(){
        $this->redirect(array('action'=>'unauthorized'));
    }
    public function unauthorized(){
        
    }
}
