<?php
function getDatabaseConnection()
{
    try {
        //  Database connections
        $servername = "lochnagar.abertay.ac.uk";
        $username = "sql2005734";
        $password = "SGjIrwHhihk5";
        $dbname = "sql2005734";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        return $conn;
    } catch (mysqli_sql_exception $e) {
        echo '<script type="text/javascript">alert("Server issues, ' . $e . '");</script>';
        die();
    }
}
?>