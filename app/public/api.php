<?php
/**  メイン処理 **/
//base URL
$baseUrl = "http://weather.livedoor.com/forecast/webservice/json/v1?";
//API Parameter
$params = [
    "city" => "200010",
];

//リクエストURLの生成
$requestUrl = makeRequestUrl($baseUrl, $params);
//getボタンが押されたときにapiからデータを取得
$apiResData = $_GET["btn"] ? curlApi($requestUrl) : false;


/**  関数群 **/
//リクエストURLの生成
function makeRequestUrl($baseUrl, $params) {
    $unionParam = "";
    foreach ($params as $key => $param) {
        $unionParam .= $key . "=" . $param;
    }
    return $baseUrl . $unionParam;
}

//curlでapiからデータを取得
function curlApi($requestUrl) {
    $ret = [];
    $curl = curl_init();
    $option = [
        CURLOPT_URL => $requestUrl,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true // ヘッダー
    ];
    curl_setopt_array($curl, $option);

    $response = curl_exec($curl);

    //全データ
    $ret["RESULT"] = json_decode($response, true);

    // header & body $ statusCode
    $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE); // ヘッダサイズ
    $ret["HEAD"] = substr($response, 0, $header_size); // header
    $ret["BODY"] = substr($response, $header_size); // body
    $ret["STATE"] = curl_getinfo($curl, CURLINFO_HTTP_CODE); // ステータスコード

    curl_close($curl);

    return $ret;
}
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API</title>
</head>
<body>
<div id="wrap">
    <h1>API getter</h1>
    <form action="./api.php" method="get">
        <p>
            <b>requestURL : </b><?= $requestUrl ?>
        </p>
        <div>
            <button type="submit" name="btn" value="1">get</button>
        </div>
    </form>
    <main>
        <?php if ($apiResData): ?>
            <h2>RESULT</h2>
            <div>
                <b>Status Code :</b> <?= $apiResData["STATE"] ?>
            </div>
            <div>
                <b>Response Data :</b>
            <pre>
                <?php var_dump($apiResData); ?>
            </pre>
            </div>
        <?php endif; ?>
    </main>
</div>
</body>
</html>