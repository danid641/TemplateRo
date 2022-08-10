<?php

class createSQLq extends connect
{

    public function RunSql($action, $RowName, $QueryMethod, $exec)
    {

        global $result;

        $this->db();

        $conn = $this->conn;
        $sql = $action;


        if (!function_exists('str_contains')) {
            function str_contains(string $haystack, string $needle): bool
            {
                return '' === $needle || false !== strpos($haystack, $needle);
            }
        }

        if ($exec == true) {
            if (str_contains($sql, 'SELECT') !== false) {
                global $row;
                $result = mysqli_query($conn, $sql);
                if ($QueryMethod == 'num') {
                    $row = mysqli_num_rows($result);
                } else {
                    $row = mysqli_fetch_array($result);
                }
                $this->$RowName = array('row' => $row);
            } else if (str_contains($sql, 'INSERT') !== false) {
                $result = mysqli_query($conn, $sql);
            } else if (str_contains($sql, 'UPDATE') !== false) {
                $result = mysqli_query($conn, $sql);
            } else if (str_contains($sql, 'DELETE') !== false) {
                $result = mysqli_query($conn, $sql);
            } else {
                echo 'cant call sql check code again';
                return error_reporting(E_PARSE);
            }
        }
    }
}
