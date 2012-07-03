<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
<?php
session_start();
$_SESSION['signArray'] = array("/", "*", "+", "-");

class controler {

    function __construct() {

    }
    
    function __destruct() {
    }
    


    // THIS STARTS WHEN A BUTTON FROM VIEW IS PRESSED
    // IF IT'S A SIGN DIFFERENT THAN <=>, THEN IT STARTS THE <signPressed> FUNCTION
    // ELSE, IF IT'S <=> IT ADDS THE FULL EQUATION AND RSULT TO A DATABASE
    // ELSE IT'S A NUMBER AND IT STARS THE <numberPressed> FUNCTION
    public function buttonPressed() {
        
        if (isset($_SESSION['equalPressed']))
        if (!isset($_POST['number']) or $_SESSION['equalPressed'] == true)
            return "";
        elseif (in_array($_POST['number'], $_SESSION['signArray']))
            return $this->signPressed();
        elseif ($_POST['number'] == "=")
            {
            $this->signPressed();
            $_POST['eq'] = $_SESSION['fullEquation'] . $_SESSION['currentResult'];
            $_SESSION['equalPressed'] = true;
            return $_POST['eq'];
            }
        else
            return $this->numberPressed();
       }
    
    // IF A SIGN IS PRESSED, THIS FUNCTION WILL BE CALLED
    public function signPressed(){
       if (isset($_SESSION['fullEquation'])) 
       if ($_SESSION['lastSignPressed'] == true)
            {
            $_SESSION['fullEquation'] = substr($_SESSION['fullEquation'], 0, -1);
            }
       $_SESSION['lastSignPressed'] = true;

        // IF THERE IS NO SIGN THEN IT MEANS THE THIS WAS THE FIRST SIGN ENTERED
        // currentResult IS INITIALIZED WITH THE FIRST NUMBER
        // fullEquation IS INITIALIZED WITH THE FIRST NUMBER AND SIGN
        if (!isset($_SESSION['sign']))
        {
            $_SESSION['sign'] = '';
            $_SESSION['currentResult'] = $_SESSION['hidden'];
            $_SESSION['fullEquation'] = $_SESSION['hidden'] . $_POST['number'];
        }
        
        // HERE IT MEANS THAT WE HAVE A PREVIOUS RESULT
        // WE CHECK TO SEE IF THE <sign> IS EMPTY
        // IF NOT, THEN WE MAKE THE COMPUTATIONS WITH <setCurrentResult>
        // AND WE ADD TO THE <fullEquation> THE NEW VALUES
        else
        {
            if ($_SESSION['sign'] == ''){
                $_SESSION['currentResult'] = $_SESSION['hidden'];
                $_SESSION['sign'] = $_POST['number'];
            }
            else
                $this->setCurrentResult();
            
            $_SESSION['fullEquation'] .= $_SESSION['hidden'] . $_POST['number'];
        }
        $_SESSION['sign'] = $_POST['number'];
        $_SESSION['hidden'] = '';

        return $_SESSION['currentResult'];
    }
    
    // IF A NUMBER IS PRESSED THEN ITS ADDED TO THE <hidden> VALUE
    public function numberPressed() {
        
        if (isset($_SESSION['hidden']) and isset($_POST['number']))
            $_SESSION['hidden'] .= $_POST['number'];
        else 
            $_SESSION['hidden'] = '';

        $_SESSION['lastSignPressed'] = false;

        return $_SESSION['hidden'];
    }
    
    // HERE THE ACTUAL EQUATIONS ARE MADE AND THE NEW <currentResult> IS CREATED
    public function setCurrentResult()
    {

        if ($_SESSION['sign'] == "/")
            $_SESSION['currentResult'] /= $_SESSION['hidden'];
        elseif ($_SESSION['sign'] == "*")
            $_SESSION['currentResult'] *= $_SESSION['hidden'];
        elseif ($_SESSION['sign'] == "-")
            $_SESSION['currentResult'] -= $_SESSION['hidden'];
        elseif ($_SESSION['sign'] == "+")
            $_SESSION['currentResult'] += $_SESSION['hidden'];
        else
            $_SESSION['currentResult'] = "Error at setCurrentResult";

    }
    
    public function startButton() {
        $newModel = new model();
        $newModel->connectToDatabase("create");
        if (isset($_POST['number']))
        if ($_POST['number'] == "start") {
            if (isset($_SESSION['fullEquation']) && isset($_SESSION['currentResult'])){
                $newModel->connectToDatabase("insert");
                echo "Equation: " . $_SESSION['fullEquation'] . $_SESSION['currentResult'] . " inserted...<br/>";
            }
            session_unset();
            $_SESSION['signArray'] = array("/", "*", "+", "-");
            $_SESSION['equalPressed'] = false;
        }
    }
    
    function showDatabaseButton() {
        $newModel = new model();
        if (isset($_POST['number']))
        if ($_POST['number'] == "showDatabase") {
            $newModel->connectToDatabase("select");
        }
    }
    
    
}
$newControler = new controler();
require_once 'model.php';
require_once 'view.php'; 
?>
        
    </body>
</html>
