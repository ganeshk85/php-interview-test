<?php
//aaabccccddd
//xxxxyyzzzz
//abcd
//111223355

/*
* Encode/Compress using String as Array to parse the string
*/
function compressString($input_string)
{	
    //$time_start = get_microtime();
    $count = 0;
    $temp_str = '';
    
    for($i=0;$i<strlen($input_string);$i++)
    {
        if($input_string[$i] == $input_string[$i + 1])
        {
            $count++;
        }
        else {
            $cnt = $count + 1;
            if($cnt != 1)
            {
                $temp_str .= $input_string[$i].$cnt;    
            }
            else{
                $temp_str .= $input_string[$i];
            }
            
            
            $count = 0;
        }
    }
    
    //$time_elpased_c = get_microtime() - $time_start;
    //echo sprintf("&nbsp;&nbsp;&nbsp;%fms&nbsp;", $time_elpased_c);
    
    return $temp_str;
}

/*
* Encode/Compress using String function substr() to parse the string
*/

function encodeString($input_string)
{
    //$time_start = get_microtime();
    $count = 0;
    $temp_str = '';
    $str_length = strlen($input_string);
    
    for($i=0;$i<$str_length;$i++)
    {
        $limit = 1;
        
        $prev = substr($input_string, $i, $limit);   
        $next = substr($input_string, $i+1, $limit);   
        
        if($prev == $next)
        {
            $count++;
        }
        else{
            $cnt = $count + 1;
            if($cnt != 1)
            {
                $temp_str .= $input_string[$i].$cnt;    
            }
            else{
                $temp_str .= $input_string[$i];
            }
            $count = 0;
        }
    }
    
    //$time_elpased_e = get_microtime() - $time_start;
    //echo sprintf("&nbsp;&nbsp;&nbsp;%fms&nbsp;", $time_elpased_e);
     
     return $temp_str;
}

function get_microtime()
{
    $time = microtime(true);
    if (is_string($time)) {
        list($f, $i) = explode(" ", $time);
        $time = intval($i) + floatval($f);
    }
    return $time;
}


function test($test){
    
    
    for($i=0;$i<10;$i++)
    {   $then_e = microtime(true);
        //encodeString($test);    
        compressString($test);
        $now_e = microtime(true);
    $time_elpased_e = $now_e - $then_e;
    echo sprintf("&nbsp;&nbsp;&nbsp;%fms<br>", $time_elpased_e*1000);    
    }
    
    
}



$test = "aaabccccddd";

test($test);

//echo compressString($test);

//$then_e = microtime(true);
//echo encodeString($test);
//$now_e = microtime(true);
//$time_elpased_e = $now_e - $then_e;
//echo sprintf("&nbsp;&nbsp;&nbsp;%fms<br>", $time_elpased_e*1000);


//$then_c = microtime(true);

//$now_c = microtime(true);
//$time_elpased_c = $now_c - $then_c;
//echo sprintf("&nbsp;&nbsp;&nbsp;%fms<br>", $time_elpased_c*1000);
//echo "<br/>";



?>