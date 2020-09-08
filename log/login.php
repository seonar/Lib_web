<!--https://jeonghwan-kim.github.io/dev/2020/03/09/flex.html
Todo 플렉스 관련 글 보고 레이아웃 구성 정리하기
	 정렬 맞추기
	 버튼 디자인
	 폰트 통일
	 이미지
	 2020.08.21 15:52 push
-->

<?php
include "../lib/db.php";
?>

<head>
    <meta charset="utf-8"/>
    <title></title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <script src="../css/js/bootstrap.js"></script>

	<style></style>

</head>
<body>
  <header class="blog-header py-3 sticky-top"></header>
	<div class="container">
	<header class="blog-header py-3 sticky-top"></header>
		<div class="row">
			<div class="col -sm 6 login-section-wrapper">
				<div class="login-wrapper my -auto">
					<h1 class="login-title"> Log in </h1>
					<form id="mform" method="post" action="./login_ok.php">
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" name="email" id="email" class="form-control"
							placeholder="email@example.com" required>

							<label for="pwd">Password</label>
							<input type="password" name="pwd" id="pwd" class="form-control" required>
						</div>
						<div>
							<input type="submit" value="sign in" class="btn btn-outline-primary">
              </div>
            </form>
							<button class="btn btn-outline-primary" onclick="location.href='../log/member.php'">Create account</button>
              <button class="btn btn-outline-primary" onclick="location.href='../branch_hak/password_find.php'">forgot password</button>

				</div>
			</div>
		</div>
	</div>

</body>
</html>
