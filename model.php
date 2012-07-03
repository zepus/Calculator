<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model
 *
 * @author Zepus
 */

class model {
    function dropTable($con) {
        $sql = 'DROP DATABASE my_db';
        $this->executeQuery($con, $sql);
    }
    

    /////////////////////////
    ////MUST BE CHANGED////// CREATE OBJECT TO RETURN DATABASE
    /////////////////////////
    function selectDataFromTable($con) {
        
        $result = mysql_query("SELECT * FROM Equations");

        echo "<table border='1'>
        <tr>
        <th>EquationID</th>
        <th>Equation</th>
        <th>Result</th>
        </tr>";

        while($row = mysql_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['EquationID'] . "</td>";
            echo "<td>" . $row['Equation'] . "</td>";
            echo "<td>" . $row['Result'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
    function insertNewEquation($con) {
        
        $sql="INSERT INTO Equations (Equation, Result) VALUES
            ('$_SESSION[fullEquation]','$_SESSION[currentResult]')";

        if (!mysql_query($sql,$con))
        {
            die('Error: ' . mysql_error());
        }
    }

    // Execute query
    function executeQuery($con, $sql) {
        $retval = mysql_query($sql, $con);
        if(!$retval) {
            die('Could not execute query: ' . mysql_error());
        }
        echo "Querry executed successfully...<br/>" . $sql . "<br/>";
    }
    
    // Create table
    function createTable($con) {
        $this->selectDataBase($con);
        $sql = "CREATE TABLE Equations
        (
        EquationID int NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(EquationID),
        Equation varchar(30),
        Result varchar(10)
        )";
        echo "Table created...<br/>";
        $this->executeQuery($con, $sql);
    }
    
    function selectDataBase($con) {
        mysql_select_db("my_db", $con);
    }

    // Create database 
    function createDatabase($con) {
        if (mysql_query("CREATE DATABASE IF NOT EXISTS my_db",$con)) {
            echo "Database created";
            }
        else {
            echo "Error creating database: " . mysql_error();
        }
        
        $this->createTable($con);
    }

    // Close MySql
    function closeMySql($con) {
        mysql_close($con);
    }
    
    // Connect To Database
    ///////////////////////////////////
    ////////////MUST BE CHANGED//////// IF ACTION THEN CONNECT
    ///////////////////////////////////
    public function connectToDatabase($value) {
        $con = mysql_connect("localhost","root","");
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }


        if (!mysql_select_db("my_db", $con) && $value == "create")
            $this->createDatabase($con);
        else {
            if ($value == "insert")
                $this->insertNewEquation($con);
            elseif ($value == "select")
                $this->selectDataFromTable($con);
        }
        $this->closeMySql($con);
        }
    
}

?>
