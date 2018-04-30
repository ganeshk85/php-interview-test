<?php
//aaabccccddd --> a3bc4d3
//xxxxyyzzzz --> x4y2z4
//abcd --> abcd
//111223355 --> 13223252

/*
* Encode/Compress using String as Array to parse the string
*/
function compressString($input_string)
{	
    $count = 0;
    $temp_str = '';
    
    for($i=0;$i<strlen($input_string);$i++)
    {
        //comparing current character with the next character
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
    
    return $temp_str;
}

/*
* Encode/Compress using String function substr() to parse the string
*/
function encodeString($input_string)
{
    $count = 0;
    $temp_str = '';
    $str_length = strlen($input_string);
    
    for($i=0;$i<$str_length;$i++)
    {
        $limit = 1;
        
        $curr = substr($input_string, $i, $limit);   
        $next = substr($input_string, $i+1, $limit);   
        
        //comparing current character with the next character
        if($curr == $next)
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
     
     return $temp_str;
}

$test = "aaabccccddd";

echo "Using String as Array<br/>";
echo compressString($test);
echo "<br/>";
echo "Using String function substr<br/>";
echo encodeString($test);
?>