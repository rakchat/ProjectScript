<?php
  
  class db {
     
    // Method Connect Mysql
    public function connectDB(){
        $con = mysqli_connect("localhost","root","","dbscript");
        return $con;
    }

    // 

    public function query($con,$sql){
        $query = mysqli_query($con, $sql);
        return $query;
    }

    // Method for SQL SELECT
   
    public function selectAll($con,$table){
        $sql = "SELECT * FROM $table";
        $query = mysqli_query($con,$sql);
        return $query;
    } 

    public function selectWhereByOneColumn($con,$table,$column,$value){
        $sql = "SELECT * FROM $table WHERE $column = '$value'";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    public function selectWhereLikeByOneColumn($con,$table,$column,$value){
        $sql = "SELECT * FROM $table WHERE $column LIKE '%$value%'";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    // Method for JOIN TABLE 
    
    public function selectALLJoinTwoTable($con,$table1,$table2,$column1,$column2){
        $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON `$table1`.`$column1` = `$table2`.$column2";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    public function selectALLJoinTwoTableOrderBy($con,$table1,$table2,$column1,$column2,$orderby,$option){
        $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON `$table1`.`$column1` = `$table2`.$column2 ORDER BY $orderby $option";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    public function selectALLJoinTwoTableWhereOneColumn($con,$table1,$table2,$column1,$column2,$ColumnWhere,$value){
        $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON `$table1`.`$column1` = `$table2`.$column2 WHERE $ColumnWhere = '$value' ";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    public function selectALLJoinTwoTableWhereOneColumnOrderByOne($con,$table1,$table2,$column1,$column2,$ColumnWhere,$value, $orderby, $option ){
        $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON `$table1`.`$column1` = `$table2`.$column2 WHERE $ColumnWhere = '$value' ORDER BY $orderby $option";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    public function selectALLJoinTwoTableWhereTwoColumn($con,$table1,$table2,$column1,$column2,$ColumnWhere1,$value1,$ColumnWhere2,$value2){
        $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON `$table1`.`$column1` = `$table2`.$column2 WHERE $ColumnWhere1 = '$value1' AND $ColumnWhere2 = '$value2'";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    public function selectALLJoinTwoTableWhereLikeOneColumn($con,$table1,$table2,$column1,$column2,$ColumnWhere,$value){
        $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON `$table1`.`$column1` = `$table2`.$column2 WHERE $ColumnWhere LIKE '%$value%'";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    // Method for SQL INSERT

    public function insertThreeColumn($con,$table,$column1,$column2,$column3,$value1,$value2,$value3){
        $sql = "INSERT INTO `$table`(`$column1`,`$column2`,`$column3`) VALUES ('$value1','$value2','$value3')";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    public function insertTwoColumn($con,$table,$column1,$column2,$value1,$value2){
        $sql = "INSERT INTO `$table`(`$column1`,`$column2`) VALUES ('$value1','$value2')";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    public function insertEleventColumn($con, $table, $column1, $column2, $column3, $column4, $column5, $column6, $column7, $column8, $column9, $column10, $column11,$value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11){
        $sql = "INSERT INTO `$table` (`$column1`, `$column2`, `$column3`, `$column4`, `$column5`, `$column6`, `$column7`, `$column8`, `$column9`, `$column10`, `$column11`) VALUES ( '$value1', '$value2', '$value3', '$value4', '$value5', '$value6', '$value7', '$value8', '$value9', '$value10', '$value11')";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    // Method for SQL UPDATE

    public function updateOneColumn($con, $table, $column, $value, $columnWhere,$valueWhere){
        $sql = "UPDATE `$table` SET `$column` = '$value' WHERE `$columnWhere` = '$valueWhere'";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    public function updateTwoColumn($con, $table, $column1, $value1, $column2, $value2, $columnWhere,$valueWhere){
        $sql = "UPDATE `$table` SET `$column1` = '$value1',`$column2` = '$value2' WHERE `$columnWhere` = '$valueWhere'";
        $query = mysqli_query($con,$sql);
        return $query;
    }

    public function updateEleventColumn($con, $table, $column1, $column2, $column3, $column4, $column5, $column6, $column7, $column8, $column9, $column10, $column11, $value1,$value2,$value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $columnWhere, $id){
        $sql = "UPDATE `$table` SET `$column1` = '$value1', `$column2` = '$value2', `$column3` = '$value3', `$column4` = '$value4', `$column5` = '$value5', `$column6` = '$value6', `$column7` = '$value7', `$column8` = '$value8', `$column9` = '$value9', `$column10` = '$value10', `$column11` = '$value11' WHERE `$columnWhere` = '$id';";
        $query = mysqli_query($con,$sql);
        return $query;
    }


    // Metjod for SQL DETELE

    public function delete($con,$table,$column,$value){
        $sql = "DELETE FROM $table WHERE `$column` = '$value'";
        $query = mysqli_query($con,$sql);
        return $query;
    }

  }

?>
