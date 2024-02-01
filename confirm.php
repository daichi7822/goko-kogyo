<?php 
	// フォームのボタンが押されたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// フォームから送信されたデータを各変数に格納
		$email = $_POST["email"];
		$name = $_POST["name"];
		$address = $_POST["address"];
		$content = $_POST["content"];
	}

	// 送信ボタンが押されたら
	if (isset($_POST["submit"])) {
		// 送信ボタンが押された時に動作する処理をここに記述する
        	
		// 日本語をメールで送る場合のおまじない
        	mb_language("ja");
		mb_internal_encoding("UTF-8");
		
		// mb_send_mail("brocreation1102@gmail.com", "メール送信テスト", "メール本文");

        	// 件名を変数subjectに格納
        	$subject = "［自動送信］お問い合わせ内容の確認";

        	// メール本文を変数bodyに格納
		$body = <<< EOM
{$name}　様

お問い合わせ内容

===================================================
【 メール 】 
{$email}

【 お名前 】 
{$name}

【 ご住所 】 
{$address}

【 内容 】 
{$content}
===================================================

EOM;

        $to = $email; 
        
		// 送信元のメールアドレスを変数fromEmailに格納
		$fromEmail = "info@brocreation.net";

		// 送信元の名前を変数fromNameに格納
		$fromName = "お問い合わせ";

		// ヘッダ情報を変数headerに格納する		
		$header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";

		// メール送信を行う
		mb_send_mail($to, $subject, $body, $header);

 		// index.html
		header("Location: http://gokou-kogyo.jp/index.html");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>足立区の解体業者 伍高興業株式会社</title>
  <meta name="google-site-verification" content="t-NBxGOUIwFcFIQGkIxivKcmZp5B9wb5qjzI7MXAOvs" />
  <!-- jqueryの読み込み -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- css -->
  <link rel="stylesheet" href="./css/contact.css">
  <link rel="stylesheet" href="./css/nav.css">
  <link rel="stylesheet" href="./css/footer.css">
  <!-- js -->
  <script type="text/javascript" src="./js/contact.js"></script>
</head>
<body>
  <section class="header">
    <!--ハンバーガー-->
    <button type="button" class="js-btn btn" id="btn">
      <span class="btn-line"></span>
      <p id="menu-text">MENU</p>
    </button>
    <ul class="navigation">
      <ul class="ham-nav">
        <li><a><img src="./img/logo.png" alt=""></a></li>
        <li><a href="./index.html">HOME</a></li>
        <li><a href="company.html">会社概要</a></li>
        <li><a href="business.html">事業内容</a></li>
        <li><a href="./sekou.html">施工の流れ</a></li>
        <li><a href="./input.php">お問い合わせ</a></li>
      </ul>
      <!-- 横並びナビ -->
      <nav>
        <li><a><img src="./img/logo.png" alt=""></a></li>
        <li><a href="./index.html">HOME</a></li>
        <li><a href="company.html">会社概要</a></li>
        <li><a href="business.html">事業内容</a></li>
        <li><a href="./sekou.html">施工の流れ</a></li>
        <li><a href="./input.php">お問い合わせ</a></li>
      </nav>
    </ul>
  </section>

  <section class="main">
      <div>
        <form action="confirm.php" method="post">
          <input type="hidden" name="email" value="<?php echo $email; ?>">
          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="hidden" name="address" value="<?php echo $address; ?>">
          <input type="hidden" name="content" value="<?php echo $content; ?>">
          <div class="main-head">
              <div class="title">
              <img src="./img/お問い合わせicon.png" alt="">
              <h1>内容確認</h1></div>
              <h2>お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
          </div>
          <div>
            <div class="item">
              <label>メールアドレス</label>
              <p class="text"><?php echo $email; ?></p>
            </div>
            <div class="item">
              <label>お名前</label>
              <p class="text"><?php echo $name; ?></p>
            </div>
            <div class="item">
              <label>ご住所</label>
              <p class="text"><?php echo $address; ?></p>
            </div>
            <div class="item">
              <label>お問い合わせ内容</label>
              <p class="text"><?php echo nl2br($content); ?></p>
            </div>
          </div>
          <div class="buttons">
            <input type="button" value="内容を修正する" onclick="history.back(-1)">
            <button type="submit" name="submit">送信</button>
          </div>
        </form>
      </div>
  </section>

  <section class="footer">
    <div class="sab-nav">
      <nav>
        <li><a href="./index.html">HOME</a></li>
        <li><a href="">会社概要</a></li>
        <li><a>事業内容</a></li>
        <li><a>施工の流れ</a></li>
        <li><a>お問い合わせ</a></li>
      </nav>
    </div>
    <div class="address">
      <h1>[本社]</h1>
      <p>東京都足立区六月 2-15-8<br>
        TEL03-3859-6323<br>
        FAX03-3859-6323<br>
        <h1>[埼玉営業所]</h1>
        <p>埼玉県草加市新里町 65-2-102</p>
        <img src="./img/insta-icon.png" alt="">
    </div>
    <div class="logo">
      <img src="./img/logo.png" alt="">
    </div>
    <div class="map">
      <p>[本社MAP]</p>
      <img src="./img/MAP-img.png" alt="">
    </div>
  </section>
  <div class="copyright">
    <p>Copyright©2021 Goko kogyo inc.All Rights Reserved</p>
  </div>
  <script src="./js/main.js"></script>
</body>