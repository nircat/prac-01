<?php
$mysqli = new mysqli('db', 'root', 'root', 'app');
$txtMsg = "";
$nameList = "";
$res = [];

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}else{
    $sql = "SELECT * FROM TEST_TBL";
    if ($result = $mysqli->query($sql)) {
        // 連想配列を取得
        while ($row = $result->fetch_assoc()) {
            $res[] = $row;
        }
        // 結果セットを閉じる
        $result->close();
    }
}

$txtMsg = 'Success... ' . $mysqli->host_info . PHP_EOL;

$mysqli->close();

?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL Connect</title>
    <style>
        td{
            padding: .3em 1em;
        }
    </style>
</head>
<body>
<h1>test page</h1>
<p><?= $txtMsg ?></p>
<table border="1" cellpadding="0" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>NAME</th>
    </tr>
    <tr>
        <?php foreach ($res as $row): ?>
        <td><?= $row["ID"]?></td>
        <td><?= $row["NAME"]?></td>
        <?php endforeach; ?>
    </tr>
</table>
</body>
</html>
