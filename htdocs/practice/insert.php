<?php
$skill1 = $_POST['skill1'];
$skill2 = $_POST['skill2'];
$skill3 = $_POST['skill3'];
$occupation = $_POST['occupation'];

$dsn = 'mysql:dbname=yayakasii;host=localhost:8889';
$user = 'root';
$password = 'root';
​
try{
$link = new PDO($dsn,$user,$password);
​
//print("接続に成功しました。");
 $link->query('SET NAMES utf8');
​

$result = "selct * from main where tools like ('%".$skill1."%'' or '%".$skill2."%' or '%".$skill3."%') and work_experience =" . $occupation;
foreach ($link -> query($result) as $value) {
   print($value['staff_id']);
   print($value['name'].'<br>');
}
​
//$value = $link -> exec("SELECT occupation_id FROM occupation");
//print $value;
​
}catch (PDOException $e){
  print('Error:'.$e-> getMessage());
  die();
}
$link = null;
?>
​
​
<html>
<head>
  <script type='text/javascript' src = 'https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
​
    google.load('visualization', '1', {packages:['table']});
    google.setOnLoadCallback(drawTable);
    function drawTable(){
​
      var data = new google.visualization.DataTable();
      data.addColumn('string','名前');
      data.addColumn('string','役職');
      data.addColumn('string','職種');
      data.addColumn('string','使えるツール');
​
      data.addRows([
​
​
​
      ]);
​
      var table = new google.visualization.Table(document.getElementById('table_div'));
      table.draw(data,{showRowNumber:true});
    }
​
    </script>
  </head>
​
​
  </html>