<?php
session_start();
require 'dbcon.php';
?>

<script>
    function Create_Database() {
    window.location.href = '../CreateTableNew.php'
    }
</script>

<?php
if(isset($_POST['Create_Database']))
{
        $DATABASEname = mysqli_real_escape_string($con, $_POST['DATABASE_Name']);

        $query_info = "CREATE DATABASE $DATABASEname ";
        $query_info_run = mysqli_query($con, $query_info);
        //POST Create_Table
        if($query_info_run)
        {
        $_SESSION['message'] = "Table created successfully";
            header("Location: index.php");
            exit(0);
        }
}

if(isset($_POST['Create_Table']))
{
    $DATABASEname = mysqli_real_escape_string($con, $_POST['DATABASE_Name']);
    $TABLEname = mysqli_real_escape_string($con, $_POST['TABLE_Name']);
    $query_info2 = "CREATE TABLE $DATABASEname.$TABLEname (Page_name TEXT, Template JSON, bool1 BOOLEAN, bool2 BOOLEAN)";
    $query_info_run2 = mysqli_query($con, $query_info2);
    //выход на страницу
    if($query_info_run2)
    {
    $_SESSION['message'] = "Table created successfully";
        header("Location: index.php");
        exit(0);
    }
}
?>