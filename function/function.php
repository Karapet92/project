<?php
include 'config/db.php';



function insert($table, $data)
{
    global $db;
    $arrfield =[];
    $arrvalue = [];

    foreach($data as $key=> $value){
        $arrfield[] = "`".$key."`";
        $arrvalue[] ="'".$value."'";
    }
    $fields = implode(",",$arrfield);
    $values = implode(",", $arrvalue);
    $sql ="INSERT INTO $table ($fields) VALUES ($values)";
    return mysqli_query($db, $sql);
}

function update($table, $data, $condition ){
    global $db;
    $arrfield =[];
    $arrvalue = [];
    foreach ($data as $key=> $value){
        $arrfield[] = "`".$key."`='".$value."'";
    }
    foreach ($condition as $key=>$value) {
        $arrvalue[] = "`".$key."`='".$value."'";
    }
        $fields = implode(",",$arrfield);
        $condition1 = implode("AND",$arrvalue);
        $sql ="UPDATE $table SET $fields WHERE $condition1";

        return mysqli_query($db, $sql);

}
function delete($table,$where){
    global $db;
    $cond = [];
    foreach ($where as $key => $value){
        $cond[] = "`".$key."`='".$value."'";
    }
    $condition = implode(" AND ",$cond);

    $sql = "DELETE FROM $table WHERE $condition";

    return mysqli_query($db, $sql);

}

function select($table,$where,$cols="*",$limit=0,$offset=0){
    global $db;
    $wherearray = [];
    $colsArray = [];

    foreach ($where as $key => $value){

        $wherearray[]=  "`".$key."`='".$value."'";
    }
    $wherestring = implode('AND',$wherearray);

    if(is_array($cols)){

        foreach ($cols as $key => $value ){

            $colsArray[]= '`'. $value.'`';
        }
        $whereCols = implode(',',$colsArray);

    } else{

        $whereCols=$cols;
    }

    $sql = "SELECT $whereCols FROM `$table` WHERE $wherestring";
    if($limit){
        $sql.= "LIMIT $limit";
        if($offset){
            $sql = "OFFSET $offset";
        }

    }

    $query = mysqli_query($db,$sql);
    $row = [];
    while($data = mysqli_fetch_assoc($query)){
        $row= $data;

    }

        return $row;
}

