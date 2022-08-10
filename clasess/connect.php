<?php

class connect
{

    public $conn;

    public function db()
    {
        global $conn;

        $conn = mysqli_connect('localhost', 'root', '', 'digital');

        $this->conn = $conn;
    }
}
