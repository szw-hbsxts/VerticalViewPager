
<?php

    include("top.php");

   $mycon = mysqli_connect("localhost","root","admin123456","images");
   $dqy = $_SERVER["REQUEST_URI"];
   $zhbm = urldecode($dqy);
   $as = parse_url($zhbm);

    echo "<div class='cds'>";
   // //检查链接中是否存在 ? 
   // $check = strpos($as, '?'); 

   if (isset($as['query'])){
       
       $io = $as['query'];
       $kl = explode('=',$io);
     

       $fl = strpos($kl['1'],"&n");

       $str = substr_replace($kl['1'],"",$fl,2);

       $nn = $kl['2'];


       echo "<h2>".$nn."</h2>";

       if($mycon){

           $result = mysqli_query($mycon,"SELECT `name`,`superiors`,`img_url`,`higher` FROM img_name WHERE img_name.name = '".$nn."' and img_name.superiors = '".$str."'");
           $result_arr=mysqli_num_rows($result);
           if($result_arr > 0) {
               // 输出数据
               while($row = mysqli_fetch_assoc($result)) {
                   
                   $img = explode(",",$row["img_url"]);


                   $i = 0;
                   while ($i <= count($img)){
                            $url_img = 'images/'. $row["higher"].'/'. $row["superiors"].'/'.$row["name"].'/'.$i.'.jpg';

                            echo "<img src='".$url_img."' />";

                            $i +=1;
                        }

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
   echo "</div";
?>
</div>
</body>
</html>