<?php

				//模拟九九乘法表形式
				echo "<div style='text-align: center'>";
        for($i=1;$i<=9;$i++){
            for($j=1;$j<=$i;$j++){
//                echo "$j*$i=".$i*$j." ";
                echo ' A ';
            }
            echo "<br />\n";
        }
        for($i=8;$i>=1;$i--){
            for($j=1;$j<=$i;$j++){
                echo ' A ';
            }
            echo "<br />\n";
        }
        echo "</div>";
?>