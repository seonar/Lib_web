
<?php
include "../lib/db.php";
?>
<!-- https://nanati.me/css-button-design/ 버튼 디자인 연구-->
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8"/>
  <title></title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap-theme.css">
  <link rel="stylesheet" href="./log.css">
  <script src="../bootstrap/dist/js/bootstrap.js"></script>

  <style>
  body{
    background:url(../file/img/login_main.png);
    background-size: cover;
    background-attachment: fixed;
    width: 100vw;
    height: 100vh;
  }

  input{
    font-family: 'Gugi', cursive !important;

  }

  button, select, optgroup, textarea, span{
    font-family: 'Gugi', cursive !important;
  }

  .ml-9{
    margin-left: 9rem !important;
  }
  </style>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="row col-12 mrow">

        <div class="col-sm-6 col-md-6 content my-auto ml-9 d-none d-sm-block">
          <div class="login-wrapper">
            <div id="L_title" class="mb-3"> LOGIN </div>
            <form id="mform" method="post" action="./login_ok.php" style="z-index:9999;">
              <div class="form-group">
                <div class="row mb-3">
                  <label id="L_login" for="email">Email address</label>
                  <input type="email" name="email" id="email" class="form-control"
                  placeholder="example@email.com" required>
                </div>
                <div class="row mb-4">
                  <label id="L_login" for="pwd">Password</label>
                  <input type="password" name="pwd" id="pwd" class="form-control" placeholder="●●●●●●●●" required>
                </div>
              </div>
              <div class="row mb-5">
                <input id="L_btn" type="submit" value="sign in" class="btn btn-dark mt-4 btn-lg btn-block " active>
                <!-- <input type="submit" value="sign in" class="btn btn-dark mt-4 btn-lg btn-block" active> -->
                <!-- 블록레벨 버튼으로 할지 그냥 라지버튼으로 할지 함께 상의할것! -->
              </div>
            </form>

            <div class="row Modal">
              <!-- Button trigger modal -->
              <button id="myModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Launch demo modal
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button id=" Input" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-1">
              <span><!--계정이 없으신가요?-->
                <a href="../log/member.php">Create account</a>
              </span>
            </div>
            <div class="row">
              <span><!--비밀번호를 잃어버리셨나요?-->
                <a href="../branch_hak/password_find.php">Find your Password</a>
              </span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    $('#Modal').on('shown.bs.modal', function () {

  })
  </script>

</body>
</html>
