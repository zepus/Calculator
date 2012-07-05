<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of checkFuncClass
 *
 * @author Zepus
 */
class checkFuncClass {
    
    /**
     *
     * @param string $cResult - old result which will be returned as the new result after the computation with the new number
     * @param string $oNumber - previous sign entered which is used for computation
     * @param string $cNumber - last number entered
     * @return float 
     */
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

    
    /**
     * If number button is pressed, input adds last value to number. 
     *
     * @param string $localNumber        - value of the number button pressed
     * @param string $localCurrentNumber - current number entered
     * @param string $localCurrentSign   - current or last sign entered 
     * @param string $localInput         - shown value of current number entered and sign
     * @param string $localEq            - last sign entered
     * @return string 
     */
    public function checkAndAddNumberIfPressed($localNumber, $localCurrentNumber, $localCurrentSign, $localInput, $localEq) {
        if ($localNumber != '') {
            if ($localCurrentSign != '') {
                $result = $localNumber;
            }
            elseif ($localInput == '0')
                $result = $localNumber;
            else
                $result = $localCurrentNumber . $localNumber;
        }
        elseif ($localInput == '')
            $result = '0';
        elseif ($localInput == '' or $localInput == '0')
            $result = '0';
        if ($localEq != '')
            $result = $localCurrentNumber;
        if ($localEq == '=')
            $result = '';
        
        if (isset($result))
            return $result;
        else return '';
    }
    
    
    /**
     * If new sign is set and a new number button is pressed,
     * then the new result becomes the old result computed with the input using oldSign. 
     *
     * @param string $localNumber        - value of the number button pressed
     * @param string $localCurrentNumber - current number entered
     * @param string $localCurrentResult - last result of equation
     * @param string $localOldSign       - previous sign used for equation
     * @param string $localDatabase      - TRUE if database buttons pressed
     * @param string $localEq            - last sign entered
     * @param string $localCurrentSign   - current or last sign entered
     * @return string 
     */
    public function checkAndAddResult($localNumber, $localCurrentNumber, $localCurrentResult, $localOldSign, $localDatabase, $localEq, $localCurrentSign) {
        if ($localNumber != '')
            $result = $localCurrentResult;
        elseif ($localCurrentNumber != '') {
            $result = $this->makeEquation($localCurrentResult, $localOldSign, $localCurrentNumber);
        if ($localDatabase != '')
            $result = '0';
        }
        
        if ($localCurrentResult != '' and $localCurrentResult != '0' and $localEq != '' and $localEq != '=')
            $result = $result = $localCurrentResult;

        if ($localNumber != '' and $localCurrentNumber == '' and $localCurrentSign == '')
            $result = '0';
        
        
        if (isset($result))
            return $result;
        else return '0';
    }
    
    
    /**
     * If a sign button is pressed,
     * then the value of currentSign becomes the value of the button pressed. 
     *
     * @param string $localEq - last sign entered
     * @return string 
     */
    public function checkAndAddSign($localEq) {
        if ($localEq != '' and $localEq != '=')
                $result = $localEq;
            else
                $result = '';

            
        return $result;
    }
    
    
    /**
     * If a number button is pressed and currentSign has a sign,
     * then oldSign becomes currentSign.
     *
     * @param string $localNumber       - value of the number button pressed
     * @param string $localCurrentSign  - current or last sign entered
     * @param string $localOldSign      - previous sign used for equation
     * @param string $localEq           - last sign entered
     * @return string 
     */
    public function checkAndAddOldSign($localNumber, $localCurrentSign, $localOldSign, $localEq) {
        if ($localNumber != '' and $localCurrentSign != '')
            $result = $localCurrentSign;
        elseif ($localOldSign != '')
            $result = $localOldSign; 
        if ($localNumber == '' and $localEq == '')
            $result = '';
        if ($localEq != '' and $localEq == '=')
            $result = '+';
        
        
        if (isset($result))
            return $result;
        else return '+';
    }
    
    
    /**
     * Every time a sign or number button is pressed(except for '='),
     * that value is entered to the fullEquation string.
     *
     * @param string $localNumber        - value of the number button pressed
     * @param string $localFullEquattion - it stores the full string of equation
     * @param string $localEq            - last sign entered
     * @param string $localCurrentSign   - current or last sign entered
     * @param string $localInput         - shown value of current number entered and sign
     * @return string 
     */
    public function chackAndAddValuesToEquation($localNumber, $localFullEquattion, $localEq, $localCurrentSign, $localInput) {
        if ($localNumber != '')
           $result = $localFullEquattion . $localNumber;
        elseif ($localEq != '') {
            $str = $localFullEquattion;
            if ($localFullEquattion != '') {
                $lastValue = $str[strlen($str)-1];
                if (in_array($lastValue, array("/", "*", "+", "-", "="))) {       
                    $str = substr($str, 0, -1);
                }
            }
            $result = $str . $localEq;
        }
        
        if (isset($result))
            if ($result != '')
                if ($result[strlen($result)-1] == "=")
                    $result = substr($result, 0, -1);
            
        //////////////////////
            ////////////////////   ADD TO DATABASE IN <<IF>>
           if ($localNumber != '' and $localInput == '' and $localCurrentSign == '')
               $result = $localNumber;

        if (isset($result))
            return $result;
        else return '';
    }
}



require_once 'controller.php';

?>
