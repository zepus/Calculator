<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signPress
 *
 * @author Zepus
 */
require_once 'controller.php';
class signPress {
        public function checkIfSignIsTrue($sign) {
            if (isset($sign)) {
                if ($sign != '')
                    return true;
            }
            return false; 
        }
        
        public function makeEquation($cResult, $oNumber, $cNumber) {
            if ($oNumber == '/')
                $cResult /= $cNumber;
            elseif ($oNumber == '*')
                $cResult *= $cNumber;
            elseif ($oNumber == '-')   
                $cResult -= $cNumber;
            elseif ($oNumber == '+')   
                $cResult += $cNumber;
            
            return $cResult;
        }
}

?>
