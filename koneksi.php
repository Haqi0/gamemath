<?php

class db 
{
    
    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $name = 'game';
    var $con;

    function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
    }

    function insertdata($nama, $email, $skor){
        $sql = "insert into tabel values('$nama', '$email', '$skor')";
        mysqli_query($this->con, $sql);
	}
}