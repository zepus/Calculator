<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author Zepus
 *  */

class controller {
    /**
     * Initializing all post values with empty sting if they are not set. 
     */
    function checkIfPostsAreSet() {
        if (!isset($_POST['eq'])) $_POST['eq'] = '';
        if (!isset($_POST['database'])) $_POST['database'] = '';
        if (!isset($_POST['number'])) $_POST['number'] = '';
        if (!isset($_POST['currentResult'])) $_POST['currentResult'] = '';
        if (!isset($_POST['input'])) $_POST['input'] = '';
        if (!isset($_POST['database'])) $_POST['database'] = '';
        if (!isset($_POST['currentNumber'])) $_POST['currentNumber'] = '';
        if (!isset($_POST['oldSign'])) $_POST['oldSign'] = '';
        if (!isset($_POST['currentSign'])) $_POST['currentSign'] = '';
        if (!isset($_POST['fullEquation'])) $_POST['fullEquation'] = '';
    }

    
    /**
     * If number button is pressed, input adds last value to number. 
     */
    public function addNr() {
        $this->checkIfPostsAreSet();
        
        $result = '';
        $newCheckFuncClass = new checkFuncClass();
        $result = $newCheckFuncClass->checkAndAddNumberIfPressed($_POST['number'], $_POST['currentNumber'], $_POST['currentSign'], $_POST['input'], $_POST['eq']);
        echo $result;
    }
    
    
    /**
     * If new sign is set and a new number button is pressed,
     * then the new result becomes the old result computed with the input using oldSign. 
     */
    public function addRes() {
        $this->checkIfPostsAreSet();
      
        $result = '0';
        $newCheckFuncClass = new checkFuncClass();
        $result = $newCheckFuncClass->checkAndAddResult($_POST['number'], $_POST['currentNumber'], $_POST['currentResult'],  $_POST['oldSign'], $_POST['database'], $_POST['eq'], $_POST['currentSign']);
        echo $result;
    }
    
    
    /**
     * If a sign button is pressed,
     * then the value of currentSign becomes the value of the button pressed. 
     */
    public function addSn() {
        $this->checkIfPostsAreSet();
        $result = '';
        $newCheckFuncClass = new checkFuncClass();
        $result = $newCheckFuncClass->checkAndAddSign($_POST['eq']);
        echo $result;
    }
    
    
    /**
     * If a number button is pressed and currentSign has a sign,
     * then oldSign becomes currentSign.
     */
    public function addOldSign() {
        $this->checkIfPostsAreSet();
        
        $result = '';
        $newCheckFuncClass = new checkFuncClass();
        $result = $newCheckFuncClass->checkAndAddOldSign( $_POST['number'], $_POST['currentSign'], $_POST['oldSign'], $_POST['eq']);
        echo $result;
    }
    
    
    /**
     * Every time a sign or number button is pressed(except for '='),
     * that value is entered to the fullEquation string.
     */
    public function addEq() {
        $this->checkIfPostsAreSet();
        
        $result = '';
        $newCheckFuncClass = new checkFuncClass();
        $result = $newCheckFuncClass->chackAndAddValuesToEquation($_POST['number'], $_POST['fullEquation'], $_POST['eq'], $_POST['currentSign'], $_POST['input']);
        echo $result;
    }
}


$newController = new controller();
require_once 'checkFuncClass.php';
require_once 'view.php';


?>
