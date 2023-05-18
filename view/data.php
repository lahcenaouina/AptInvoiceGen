<?php 
$list = ["ahmed","somaya" , "mohamed" ,"sokanyna" ,"amin"];
$result  = [];
foreach ($list as $name ){
        if (str_starts_with($name,$_GET["name"])) {
              $result[]=$name;  
        }
}
print_r($result);