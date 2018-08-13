<?php
function insert($a,$b,$c,$d){
    $insert ="INSERT INTO `$a` ($b) VALUES ($c)";
    $query = mysqli_query($d, $insert);
    return $query;

}
function select($a,$b,$c,$d){
    $query = "SELECT $a FROM $b WHERE $c";
    $result  = mysqli_query($d, $query);
    return $result;
}
function update($a,$b,$c,$d){
    $update = "UPDATE `$a` SET $b WHERE $c";
    $query = mysqli_query($d,$update);
    return $query;

}
function delete($a,$b,$d){
    $delete = "DELETE FROM `$a` WHERE  $b";
    $query = mysqli_query($d,$delete);
    return $query;
}