
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>精彩图片预览</title>
<style>
    .main{
        width: 640px;
        margin: auto;
        overflow: hidden;
    }
    .top{
        width: 100%;
        margin: auto;
        overflow: hidden;
    }
    .lan{
        float: left;
        line-height: 50px;
        width: 25%;
        background-color: #ff8d17;
        color: #fff;
        text-align: center;
        font-size: 20px;
    }
    .lan a{
        color: #fff;
    }
    .cds {
    width: 100%;
    overflow: hidden;
    }
    .cds img {
    width: 100%;
    overflow: hidden;
    }
    .tre {
    width: 100%;
    overflow: hidden;
    }
    .tre ul{
        list-style:none;
        width: 100%;
        padding: 0px;
    }
    .tre ul li{
        padding: 10px;
        border: 1px solid #333;
    }
    .tre ul li a{
        color: #0469ff;
        font-size: 18px;  
    }
</style>
</head>
<body>
<div class="main">
<div class="top">
<?php
    $mycon = mysqli_connect("localhost","root","admin123456","images");

    if($mycon){
        // print("连接成功");
        // mysqli_select_db('test',$conn);
        $result = mysqli_query($mycon,"SELECT superiors FROM img_name");//对test数据库进行SQL语句操作SELECT * FROM class1，并将结果作为一个对象返回
        
        // var_dump($result);

        $result_arr=mysqli_num_rows($result);//将数据读成一个数组
        $arr = array();
        // print_r($arr);
        if($result_arr > 0) {
            // 输出数据
            while($row = mysqli_fetch_assoc($result)) {
                array_push($arr,$row['superiors']);
            }
        } else {
            echo "0 结果";
        }
        
        $bb = array_unique($arr);
        // print_r($bb);

        foreach($bb as $value){
            echo "<div class='lan'><a href='index.php?r={$value}'>{$value}</a></div>";
        }

    }else{
        echo "连接失败";
    }

?>
</div>