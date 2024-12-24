<h1> file index.php</h1>
<?php
function x (){
    global $x;
    $x =  3;
}
x();
echo $x;
echo "<br>";
echo $x;
echo "<br>";

$My_array = array(1, array(2),3,4,5,"Myindex" => (3+3), "Myindex => 7");
print_r($My_array);
echo "<br>";
$My_array2[] = 2;
print_r($My_array2);


echo "<br>";

if(FALSE){
    echo "if false";
} else
if(TRUE and FALSE){
    echo "else if true";
} else{
    echo "true";
}
echo "<br>";


for ($i=0; $i < sizeof($My_array) - 1; $i++){
    echo $My_array[$i];
    echo "<br>";
}

$multiplier = 7; 

echo "<h1>ตารางสูตรคูณแม่ $multiplier</h1>";
echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";
echo "<tr><th>ตัวเลข</th><th>ผลลัพธ์</th></tr>";

for ($i = 1; $i <= 12; $i++) {
    $result = $multiplier * $i;
    echo "<tr><td>$multiplier x $i</td><td>$result</td></tr>";
}

echo "</table>";
?>




?>