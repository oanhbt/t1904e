<?php
class Database
{
    public $connect;
    protected $database;
    protected $table;
    protected $resultQuery;

    public function __construct($params)
    {
        $link = mysqli_connect($params['server'], $params['username'], $params['password']);
        if (!$link) {
            die('false : ' . mysqli_error());
        } else {
            $this->connect = $link;
            $this->database = $params['database'];
            $this->table = $params['table'];
            $this->setDatabase();

        }
    }

    public function setConnect($connect)
    {
        $this->connect = $connect;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function setDatabase($database = null)
    {
        if ($database != null) {
            $this->database = $database;
        }
        mysqli_select_db($this->connect, $this->database);
    }
    public function affectedRows()
    {
        return mysqli_affected_rows($this->connect);
    }

    public function __destruct()
    {
        mysqli_close($this->connect);
    }
    public function insert($data,$type ='single'){
        if ($type=='single'){
            $newQuery   = $this->createInsertSQL($data);
            $query      =   "INSERT INTO `$this->table`(".$newQuery['col'].") VALUES  (".$newQuery['val'].")";
            $this->query($query);
        }else{
            foreach ($data as $value ){
                $newQuery = $this->createInsertSQL($value);
                $query = "INSERT INTO `$this->table`(".$newQuery['col'].") VALUES  (".$newQuery['val'].")";
                echo $query.'<br>'; ;
                $this->query($query);
            }
        }
        return $this->lastId();
    }
    function createInsertSQL($Data){
        $newQuery = array();
        $cols ="";
        $vals = "";
        if (!empty($Data)){
            foreach ($Data as $key=> $value){
                $cols .= ",`$key`";
                $vals .= ",'$value'";
            }
        }
        $newQuery['col'] = substr($cols,1);
        $newQuery['val'] = substr($vals,1);// 'mem' ,'1', '10'
        return $newQuery;
    }
    public function  lastId(){
        return mysqli_insert_id($this->connect);
    }
    public function query($query){
        return mysqli_query($this->connect,$query);
    }
    public function update($data,$where){
        $newSet =   $this->createUpdateSQL($data);
        $newWhere = $this->createWhereSQL($where);
        $query = "UPDATE `$this->table` set ". $newSet."
                WHERE $newWhere";
        $this->query($query);
        return $this->affectedrow();

    }
    public function delete($where)

    {
        $newWhere = $this->createWhereDeleteSQL($where);
       echo   $query = "DELETE FROM `$this->table` WHERE `id` IN ($newWhere)";

       return $this->query($query);
       // return $this->affectedRows();
    }
    public function createWhereDeleteSQL($data)
    {
        $newWhere = '';
        if (!empty($data)) {
            foreach ($data as $id) {
                $newWhere .= "'" . $id . "', ";
            }
            $newWhere .= "'0'";
        }
        return $newWhere;
    }


    public function createUpdateSQL($Data){
        // $newQuery =  `name` = 'ccc',`sattus` ='1' , `ordering` ='100'
        $newQuery = "";
        if (!empty($Data)){
            foreach ($Data as $key =>$value){
                $newQuery .= ",`$key`='$value'";
            }
        }
        return $newQuery = substr($newQuery,1);
    }
    public  function createWhereSQL($Data){
        if (!empty($Data)){
            $newWhere =  array();
            foreach ($Data as $value){
                $newWhere []= "`$value[0]`='$value[1]'"; // "`id` = `201`
                $newWhere []=  $value[2];
            }
            $newWhere = implode(" ",$newWhere);
        }

        return $newWhere;

    }
    public function affectedrow(){
        return mysqli_affected_rows($this->connect);

    }
// SINGLE RECORD
    public function singleRecord($resultQuery = null){
        $result = array();
        $resultQuery = ($resultQuery == null) ? $this->resultQuery : $resultQuery;
        if(mysqli_num_rows($resultQuery) > 0){
            $result = mysqli_fetch_assoc($resultQuery);
        }
        mysqli_free_result($resultQuery);
return $result;
    }

    //list record
    public function listRecord($resultQuery = null){
        $result = array();
        $resultQuery = ($resultQuery == null) ? $this->resultQuery : $resultQuery;
        if(mysqli_num_rows($resultQuery) > 0){
            while($row = mysqli_fetch_assoc($resultQuery)){
                $result[] = $row;
            }
            mysqli_free_result($resultQuery);
        }

        return $result;
    }


    //check exits
    public function exist($query){
        if ($query !=null){
        $this->resultQuery =   mysqli_query($this->connect,$query);
        }
        if ( mysqli_num_rows($this->resultQuery)> 0){
            return true;
        }else return false;
    }
}