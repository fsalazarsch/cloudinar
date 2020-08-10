<?php 
Class Database
{
    private $user ;
    private $host;
    private $pass ;
    private $db;

    public function __construct()
    {
        $this->user = "eiam";
        $this->host = "localhost";
        $this->pass = "eiam3246";
        $this->db = "eiam2020";
    }
    public function connect()
    {
        $link = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        mysqli_set_charset($link, "utf8");
        return $link;
    }
}
?>
