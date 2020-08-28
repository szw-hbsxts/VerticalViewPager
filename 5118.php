<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<script language="JavaScript">
function test(){
    var element = document.getElementById("sjkj");
    element.parentNode.removeChild(element);
}
function deleteFile(name){

    var txt = "<button id='sjkj'><a href='"+name+"'>临时下载文件</a></button>";
    document.write(txt);
    document.write("<?php echo '<br /><p>测试</p>'; ?>");

    setTimeout("test()","30000");

}

</script>

<body>

<form action="5118.php" method="post">
长尾关键词挖掘:<br>
<input type="text" name="firstname">
<!-- <br>
Last name:<br>
<input type="text" name="lastname" value="Mouse"> -->
<br><br>
<input type="submit" value="Submit">
</form> 

<p>如果您点击提交，表单数据会被发送到名为  的页面。</p>

<div class="box">
    <h2>下载剩余时间：<span class="clock">30</span>秒</h2>
</div>

</body>
</html>

<script>
	var t = 30;
	var time = document.getElementsByClassName("clock")[0];
 
	function fun() {
		t--;
		time.innerHTML = t;
		if(t <= 0) {
			// location.href = "https://www.baidu.com";
			clearInterval(inter);
		}
	}
	var inter = setInterval("fun()", 1000);
</script>

<?php

/**
* php自动识别字符集编码并转换为目标编码（UTF-8）的方法
* @ data     需要转换的字符集
* @ encoding 目标编码
**/
function autoChangeCode($data,$encoding = 'utf-8'){
    if( !empty($data) ){    
      $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;   
      if( $fileType != $encoding){   
        $data = mb_convert_encoding($data ,$encoding , $fileType);   
      }   
    }   
    return $data;    
  }

  
//字符串转Unicode编码
function unicode_encode($strLong) {
    $strArr = preg_split('/(?<!^)(?!$)/u', $strLong);//拆分字符串为数组(含中文字符)
    $resUnicode = '';
    foreach ($strArr as $str)
    {
        $bin_str = '';
        $arr = is_array($str) ? $str : str_split($str);//获取字符内部数组表示,此时$arr应类似array(228, 189, 160)
        foreach ($arr as $value)
        {
            $bin_str .= decbin(ord($value));//转成数字再转成二进制字符串,$bin_str应类似111001001011110110100000,如果是汉字"你"
        }
        $bin_str = preg_replace('/^.{4}(.{4}).{2}(.{6}).{2}(.{6})$/', '$1$2$3', $bin_str);//正则截取, $bin_str应类似0100111101100000,如果是汉字"你"
        $unicode = dechex(bindec($bin_str));//返回unicode十六进制
        $_sup = '';
        for ($i = 0; $i < 4 - strlen($unicode); $i++)
        {
            $_sup .= '0';//补位高字节 0
        }
        $str =  '\\u' . $_sup . $unicode; //加上 \u  返回
        $resUnicode .= $str;
    }
    return $resUnicode;
  }

  //反转数组里字符串
function str_strrev($value) {

    //获取字符串长度，及转格式后的长度
    $a = strlen($value);
    $b = mb_strlen($value,"utf-8");
    //将字母转换为Unicode编码
    $st = unicode_encode($value);

    $ggg = array();
    //判断字符串长度是否相等，相等是字符，不相等表示有中文字符
    if ($a == $b){
        //分割字符串
        $hg = explode("\u00",$st);
        //遍历数组，给数组添加新的标签
        foreach($hg as $vaa){
            if ($vaa != ''){
                $plp = strrev($vaa).'l';
                array_push($ggg,$plp);
            }
        }

    }elseif($a > $b){
        //分割字符串
        $hg = explode("\u",$st);

        //遍历数组，给数组添加新的标签
        foreach($hg as $vaa){
            if ($vaa != ''){
                $plp = strrev($vaa);
                array_push($ggg,$plp);
            }
        }
    }
    return $ggg;
}


  
    //判断post是否传递参数
    if(isset($_POST["firstname"])){
        $uy = $_POST["firstname"];
        $uyuy = str_replace(' ', '_', $uy);
        if($uy != ''){

            // $tt = mb_strlen($uy,"utf-8");

            //分割字符串中的字母中文
            $arr = preg_split("/([a-zA-Z0-9]+)/", $uy, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);  
     
            // $num = count($arr);
            $fff = array();
            foreach($arr as $value){
                $ggg = str_strrev($value);
                //添加数据到数组
                array_push($fff,$ggg);
            }

            $tyr = '';
            //遍历数组组合新的字符串
            foreach($fff as $va){
                $po = '';
                foreach($va as $kk){
                    $mn = $kk;
                    //生成反序地址
                    $po = $mn.$po;
                }
                //生成反序地址
                $tyr = $po . $tyr ;
            }

            $url = 'https://www.5118.com/seo/newwords/'.$tyr.'/';
            echo $url."<br  />";

            $ree = exec("python 5118.py {$uyuy} {$url}",$out,$res);
            echo iconv('gbk','UTF-8',$ree);

            echo '是否获取数据成功:'.$res."(0代表成功,1代表失败)<br />";
            // echo iconv('gbk','UTF-8',$re);

            $wenj = './txt/'.$uyuy.".xls";

            if(file_exists($wenj)){

                echo "<br />文件存在<br />";
                
                echo "<script>deleteFile('".$wenj."');</script>";

            }else{
                echo "<br />文件不存在";
            }

        }

    }else{
        echo '没有数据';
    }

?>

