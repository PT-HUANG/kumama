<?php require_once('../conn.php');?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="有機蘆筍 有機洋蔥" >
    <title>酷媽媽安心農場</title>
    <link rel="shortcut icon" href="../img/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <header class="header">
      <div class="header__top">
        <div class="header__top__inner">
          <div class= description>酷媽媽安心農場 有機蘆筍 | 有機洋蔥 | 農家自產自銷</div>
          <ul class="header__nav" >
            <li class="header__nav__member">
              <a href="../index.php">
                <div>回首頁</div>
              </a>
            </li>
            <li class="header__nav__cart">
              <a href="./cart.php">購物車</a>
            </li>
          </ul>
          </div>
        <nav class="nav__bar">
          <div class="logo">
            <a href="../index.php" title="回首頁" alt="酷媽媽安心農場">
              <img src="../img/logo.png" />
            </a>
          </div>
          <ul class="nav__bar__list">
            <li>
              <a href="./shop.php">買菜去</a>
            </li>
            <li>
              <a href="https://www.facebook.com/pages/%E9%85%B7%E5%AA%BD%E5%AA%BD%E5%AE%89%E5%BF%83%E8%BE%B2%E5%A0%B4/545956475565142">FB粉絲專頁</a>
            </li>
            <li>
              <a href="./board.php">留言板</a>
            </li>
            <li>
              <a href="./about.php">關於我們</a>
            </li>
            <li>
              <a href="../contact.php">聯絡我們</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <main class="main">
      <div class="register__container">
        <span class="register__container__title">會員註冊</span>
        <?php 
          if (!empty($_GET['err_code'])){
            $code = $_GET['err_code'];
            if ($code === '1'){
              echo '<span class="errcode">錯誤:資料不齊全</span>';
            }elseif ($code === '2') {
              echo '<span class="errcode">錯誤:註冊資料重複</span>';
            }
          }
        ?>
        <form class="register__container__form" method="POST" action="./handle_register.php">
          <div>
            暱稱: <input type="text" name="nickname" placeholder="請輸入您的暱稱..." required />
          </div>
          <div>
            帳號: <input type="text" name="username" placeholder="請輸入您的帳號..." required />
          </div>
          <div>
            密碼: <input type="password" name="password" placeholder="請輸入您的密碼..." required />
          </div>
          <div>
            Email: <input type="email" name="adress" placeholder="請輸入您的電子郵件..." required />
          </div>
          <button type="submit" class="register_btn">送出</button>
        </form>
      </div>
    </main>
  </body>
  <script>
  </script>
</html>
