<?php 
require_once('./conn.php');
require_once('./utils.php');
session_start();
if (!empty($_SESSION['username'])){
  $username = $_SESSION['username'];
  $row = GetInfoFromUsername($username);
  $nickname = $row['nickname'];
}

?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="有機蘆筍 有機洋蔥" >
    <title>酷媽媽安心農場</title>
    <link rel="shortcut icon" href="./img/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <header class="header">
      <div class="header__top">
        <div class="header__top__inner">
          <div class= description>酷媽媽安心農場 有機蘆筍 | 有機洋蔥 | 農家自產自銷</div>
          <ul class="header__nav" >
              <?php if (!empty($_SESSION['username'])){ ?>
              <li class="welcome">
                <span><?php echo escape("您好，$nickname")?></span>
              </li>
              <li class="header__nav__member">
                <a href="./logout/logout.php">登出</a>
              </li>
            <?php }else { ?>
              <li class="header__nav__member">
                <div>登入 / 註冊</div>
              </li>
            <?php } ?>
            <li class="header__nav__cart">
              <a href="./cart.php">購物車</a>
            </li>
          </ul>
          </div>
        <nav class="nav__bar">
          <div class="logo">
            <a href="./index.php" title="回首頁" alt="酷媽媽安心農場">
              <img src="./img/logo.png" />
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
              <a href="./diary.php">農場日誌</a>
            </li>
            <li>
              <a href="./about.php">關於我們</a>
            </li>
            <li>
              <a href="./contact.php">聯絡我們</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <main class="main">
      <div class="login__container">
        <div class="closebutton">
          <img src="./img/x.ico" />
        </div>
        <div class="errcode__1">錯誤：資料不齊全</div>
        <div class="errcode__2">錯誤：帳號或密碼有誤</div>
        <form class="login__container__form" method="POST" action="./login/handle_login.php">  
          <div>登入</div> 
          <div>帳號</div>
          <input type="text" name="username"/>
          <div>密碼</div>
          <input type="password" name="password"/><br>
          <input type="submit" value="登入" class="sign_in_btn" />
          <a class="register_link" href="./register/register.php">註冊帳號</a>
          <a class="forgotten_link" href="forgotten.php">忘記密碼</a>
        </form>
      </div>
      <div class="form__container">
        <form class="contact_form" method="POST" action="./email/send_email.php">
          <div>聯絡我們</div>
          <div>你的全名</div>
          <input type="text" name="name" class="name" required></input>
          <div>你的電子郵件地址</div>
          <input type="email" name="email" class="email" required></input>
          <div>主旨</div>
          <input type="text" name="subject" class="subject" required></input>
          <div>內容</div>
          <textarea name="message" placeholder="想說些什麼..." rows="5" class="message" required></textarea><br>
          <button type="submit" class="sendbutton">送出</button>
        </form>
      </div>
    </main>
  </body>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    const openbutton = document.querySelector('.header__nav__member > div');
    openbutton.addEventListener('click', show);
    function show() {
      element1 = document.querySelector('.login__container');
       element1.classList.toggle('appear');
    }
    
    const closebutton = document.querySelector('.closebutton');
    closebutton.addEventListener('click', disappear);
    function disappear() {
      element2 = document.querySelector('.login__container');
      element2.classList.toggle('appear');
    }
    
    const errcode = '<?php if (!empty($_GET['err_code'])) {echo $_GET['err_code'];} ?>';
    if (errcode === '1') {
      element3 = document.querySelector('.login__container');
      element3.classList.toggle('appear');
      element4 = document.querySelector('.errcode__1');
      element4.classList.toggle('appear');
    }
    if (errcode === '2') {
      element5 = document.querySelector('.login__container');
      element5.classList.toggle('appear');
      element6 = document.querySelector('.errcode__2');
      element6.classList.toggle('appear');
    }

    const sendbutton = document.querySelector('.sendbutton');
    sendbutton.addEventListener('click', function (){
      const name = document.querySelector('.name');
      const email = document.querySelector('.email');
      const subject = document.querySelector('.subject');
      const message = document.querySelector('.message');
      if (name.value !== '' && email.value !== '' && subject.value !== '' && message.value !== ''){
        swal("感謝您的來信詢問", "我們會盡快回復您", "success");
      }
    });
  </script>
</html>
