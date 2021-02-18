<?php
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class SQLQuery {
    protected $_dbHandle;
    protected $_result;
	protected $_query;
	protected $_table;

    
    function test(){
        echo "entrando en el metodo test de la clase SQLQuery <br>";
    }
 
    /** Connects to database **/
/* 
    function connect($host, $username, $pwd, $name) {
        /*
        <?
        $host = "localhost";    // el host de la base de datos
        $username = "toabpaneladmin"; // usuario de la base de datos
        $pass = "Jq2L^?*zZ4qO"; // contraseña de la base de datos
        $bbdd = "toabackpanel"; // base de datos a usar
        $link = new mysqli($host, $username, $pass, $bbdd);
        $link -> set_charset('utf8');

        if ($link->connect_errno) {
            printf("Connection Fail: %s\n", $link->connect_error);
            exit();
        }

        ?>

        */
 /*       $this->_dbHandle = new mysqli($host, $username, $pwd, $name);
        $this->_dbHandle->set_charset('utf8');

        if ($this->_dbHandle->connect_errno) {
            return "Connection Fail: %s\n", $this->_dbHandle->connect_error;
        } else {
            return 1;
        }

        /*
        $this->_dbHandle = @mysqli_connect($address, $account, $pwd);
        if ($this->_dbHandle != 0) {
            if (mysqli_select_db($name, $this->_dbHandle)) {
                return 1;
            }
            else {
                return 0;
            }
        }
        else {
            return 0;
        }+/
    }
 
    /** Disconnects from database **/
 
 /*   function disconnect() {
        if (@mysqli_close($this->_dbHandle) != 0) {
            return 1;
        }  else {
            return 0;
        }
    }
     
    function selectAll() {
        $query = 'select * from `'.$this->_table.'`';
        return $this->query($query);
    }
     
    function select($id) {
        $query = 'select * from `'.$this->_table.'` where `id` = \''.mysqli_real_escape_string($id).'\'';
        return $this->query($query, 1);    
    }
 
     
    /** Custom SQL Query **/
 
 /*   function query($query, $singleResult = 0) {
 
        $this->_result = mysqli_query($this->_dbHandle, $query);
 
        if (preg_match("/select/i",$query)) {
        $result = array();
        $table = array();
        $field = array();
        $tempResults = array();
        $numOfFields = mysqli_num_fields($this->_result);
        for ($i = 0; $i < $numOfFields; ++$i) {
            array_push($table,mysqli_field_table($this->_result, $i));
            array_push($field,mysqli_field_name($this->_result, $i));
        }
 
         
            while ($row = mysqli_fetch_row($this->_result)) {
                for ($i = 0;$i < $numOfFields; ++$i) {
                    $table[$i] = trim(ucfirst($table[$i]),"s");
                    $tempResults[$table[$i]][$field[$i]] = $row[$i];
                }
                if ($singleResult == 1) {
                    mysqli_free_result($this->_result);
                    return $tempResults;
                }
                array_push($result,$tempResults);
            }
            mysqli_free_result($this->_result);
            return($result);
        }
         
 
    }
 
    /** Get number of rows **/
  /*  function getNumRows() {
        return mysqli_num_rows($this->_result);
    }
 
    /** Free resources allocated by a query **/
 
/*    function freeResult() {
        mysqli_free_result($this->_result);
    }
 
    /** Get error string **/
 
/*    function getError() {
        return mysqli_error($this->_dbHandle);
    }*/
}