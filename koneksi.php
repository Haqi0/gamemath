<?php

class db 
{
    
    var $host = 'localhost';
    var $user = 'id13972877_haqi';
    var $pass = 'Haqi1.2.3.4.5';
    var $name = 'id13972877_game';
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
