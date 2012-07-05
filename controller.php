<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author Zepus
 */
require_once 'signPress.php';
class controller {
    //put your code here

    public function addNr() {
        $result = '';
        $newSignPressed = new signPress();
        if (isset($_POST['number'])) {
            if ($newSignPressed->checkIfSignIsTrue($_POST['currentSign'])) {
                $result = $_POST['number'];
            }
            elseif ($_POST['output'] == '0')
                $result = $_POST['number'];
            else
                $result = $_POST['currentNumber'] . $_POST['number'];
        }
        elseif (!isset($_POST['output']))
            $result = '0';
        elseif ($_POST['output'] == '' or $_POST['output'] == '0')
            $result = '0';
        if (isset($_POST['eq']))
            $result = $_POST['currentNumber'];
        if (isset($_POST['eq']) and $_POST['eq'] == '=')
            $result = '';
        
        echo $result;

    }
    
    
    
    public function addRes() {
        $result = '0';
        $newSignPressed = new signPress();
        if (isset($_POST['number']))
            $result = $_POST['currentResult'];
        elseif (isset($_POST['currentNumber'])) {
            $result = $newSignPressed->makeEquation($_POST['currentResult'], $_POST['oldSign'], $_POST['currentNumber']);
        if (isset($_POST['database']))
            $result = '0';
        
        }

//        if (isset($_POST['oldSign']) and $_POST['oldSign'] == '' and isset($_POST['eq']) and $_POST['eq'] == '=')
//            $result = '';

        echo $result;
    }
    
    
    
    public function addSn() {
        if (isset($_POST['eq']))
            if ($_POST['eq'] != '=')
                echo $_POST['eq'];
            else
                echo '';
    }
    
    
    
    public function addOldSign() {
        $result = '+';
        if (isset($_POST['number']) and isset($_POST['currentSign']) and $_POST['currentSign'] != '')
            $result = $_POST['currentSign'];
        elseif (isset($_POST['oldSign']) and $_POST['oldSign'] != '')
            $result = $_POST['oldSign']; 
        if (!isset($_POST['number']) and !isset($_POST['eq']))
            $result = '';
        if (isset($_POST['eq']) and $_POST['eq'] == '=')
            $result = '';

        echo $result;
    }
    
    
    
    public function addEq() {
        $result = '';
        if (isset($_POST['number']))
           $result = $_POST['fullEquation'] . $_POST['number'];
        elseif (isset($_POST['eq'])) {
            $str = $_POST['fullEquation'];
            if ($_POST['fullEquation'] != '') {
                $lastValue = $str[strlen($str)-1];
                if (in_array($lastValue, array("/", "*", "+", "-", "="))) {       
                    $str = substr($str, 0, -1);
                }
            }
            $result = $str . $_POST['eq'];
        }
        
        if ($result != '')
            if ($result[strlen($result)-1] == "=")
                $result = substr($result, 0, -1);
            
        //////////////////////
            ////////////////////   ADD TO DATABASE IN <<IF>>
//        if (isset($_POST['oldSign']) and $_POST['oldSign'] == '' and isset($_POST['eq']) and $_POST['eq'] == '=')
//            $result = ''; 
        echo $result;
    }
}
$newController = new controller();
require_once 'view.php';


?>
