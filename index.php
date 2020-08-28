<?php
// header("Content-type: text/html; charset=utf-8");
// $program="txt.py"; #执行外部文件
// $re = exec($program);
// echo iconv('gbk','UTF-8',$re);
include("top.php");


?>

<div class="tre">
    <ul>
<?php
    $dqy = $_SERVER["REQUEST_URI"];
    $zhbm = urldecode($dqy);
    $as = parse_url($zhbm);
    print_r($as);

    // //检查链接中是否存在 ? 
    // $check = strpos($as, '?'); 

    if (isset($as['query'])){
        
        $io = $as['query'];
        $kl = explode('=',$io);

        echo $kl['1'];

        
        if($mycon){
            echo "连接成功";
            $result = mysqli_query($mycon,"SELECT `name`,`superiors` FROM img_name WHERE img_name.superiors = '".$kl['1']."'");
            $result_arr=mysqli_num_rows($result);
            if($result_arr > 0) {
                // 输出数据
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<li><a href="wz.php?r='.$row["superiors"].'&n='.$row["name"].'">'.$row['name'].'</a></li>';
                }
            } else {
                echo "0 结果";
            }
        }else{
            echo "连接失败";
        }

    }else{
        echo '没有数据';
    }

?>
</ul>
</div>
</div>
</body>
</html>