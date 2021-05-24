<?php
function addSort($sql, $sort){
    if($sort=='true'){
        $sql = $sql." order by Salary desc";
    }
    return $sql;
}
?>