<?php
function fizzBuzz($i){
    if($i%3==0) return "Fizz";
    if($i%5==0) return "Buzz";
    elseif($i%3!==0) return $i;
}

?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FizzBuzz</title>
    <style>
        section{
            margin-bottom: 2em;
        }
        section>div{
            line-height: .9;
            font-size: .9em;
        }
    </style>
</head>
<body>
    <h1>FizzBuzz</h1>
    <section>
    <h2>Pattern1</h2>
        <p>ベーシックな型</p>
        <div>
            <?php
            for($i=1;$i<=100;$i++){
                if($i%3==0) echo "Fizz";
                if($i%5==0) echo "Buzz";
                elseif($i%3!==0) echo $i;
                echo nl2br(PHP_EOL);
            }
            ?>
        </div>
    </section>
    <section>
    <h2>Pattern2</h2>
        <p>ベーシック型を関数化してol>liを利用したもの</p>
        <div>
            <ol>
                <?php for($i=1;$i<=100;$i++): ?>
                    <li><?= fizzBuzz($i) ?></li>
                <?php endfor; ?>
            </ol>
        </div>
    </section>
    <section>
    <h2>Pattern3</h2>
        <p>三項演算子を利用したもの</p>
        <div>
            <?php
            for($i=1;$i<=100;$i++) echo $i%3?'':'fizz',$i%5?$i%3!=0?$i:'':'buzz',nl2br(PHP_EOL);
            ?>
        </div>
    </section>
    <section>
    <h2>Pattern4</h2>
        <p>三項演算子型でol>liを利用したもの</p>
        <div>
            <ol>
                <?php for($i=1;$i<=100;$i++): ?>
                    <li><?= $i%3?'':'fizz',$i%5?$i%3!=0?$i:'':'buzz',nl2br(PHP_EOL) ?></li>
                <?php endfor; ?>
            </ol>
        </div>
    </section>
    <s>
        <script>alert()</script>
    </s>
</body>
</html>