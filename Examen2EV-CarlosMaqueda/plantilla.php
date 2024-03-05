<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($variable[0] as $key => $value) {
        echo"<tr> $Key";
       foreach ($value as $key => $value) {
        echo "<th> $value </th>";
       }
       echo "</tr>";
    }?>
     <?php foreach ($variable as $key => $value) {
        echo"<tr>";
       foreach ($value as $key => $value) {
        echo "<td> $value </td>";
       }
       echo "</tr>";
    }?>
</body>
</html>