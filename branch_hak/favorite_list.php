<?php
/* 이 곳은 책을 찜  리스트 보여주기 위한 사이트. */
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

//favorite 테이블에서 유저아이디를 하나의 행으로 조회한다.
$sql = mq("select * from favorite where user_id ='".$user_id."' ");
$sql->fetch_array();

$list = mq("select title,author,publisher, favorite_date as 찜한날짜, genre, file, book.book_id from book, favorite where book.book_id = favorite.book_id and favorite.user_id ='".$user_id."'");



// codecheck 쿼리를 실행해서 값이 존재하면 else 문으로 ..
// 쿼리를 실행해서 값이 존재하지 않으면  if문 실행
// 쿼리를 실행했는데 값이 존재하지 않는다는 것은 DB에 데이터가 없다는 라는 말.
// 고로 대출 한 데이터가 없다라는 것임.

?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css">
  <script src="../css/js/bootstrap.js"></script>
  <title></title>
  <style>
  #myList{
    -webkit-box-flex: 0;
    -ms-flex: 0 0 23%;
    flex: 0 0 23%;
    max-width: 23%;
  }
  </style>
</head>
<body>
  <header class="blog-header py-3 sticky-top"></header>

  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="./loan_list.php">대여한 책</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./purchase_list.php">구매한 책</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./favorite_list.php">찜 목록</a>
        </li>
      </ul>
      <!-- 돌아가기 복잡해서 붙인버튼 삭제예정 -->
      <button onclick="goBack()">Go Back</button>
      <script>function goBack() {window.history.back();}</script>
      <a href="../book/book_list.php">메인</a>

      <form class="form-inline my-2 my-lg-0 text-right" style="margin-left: 57%;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>
  </div>

<div class="container">
  <div class="row">
    <?php if ($sql->num_rows > 0) {
      while($result = $list->fetch_array())
      {?>
<<<<<<< HEAD
        <div class="col-3 mb-5">
          <div class="card mb-1" style="width: 18rem;">
            <img class="card-img-top" src="../file/resize/<?= $result['file']; ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?=$result['title'] ?></h5>
              <p class="card-text"><?=$result['author'] ?></p>
              <p class="card-text"><?=$result['publisher'] ?></p>
              <p class="card-text"><?=$result['찜한날짜'] ?></p>
              <p class="card-text"><?=$result['genre'] ?></p>
              <a href="#" class="btn btn-primary">구매하기</a>
              <!-- 구매 페이지 링크 -->
              <a href="#" class="btn btn-primary">대여하기</a>
              <!-- 대여 페이지 링크 -->
            </div>
=======

        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="../file/<?= $result['file']; ?>" alt="Card image cap" width="250" height="250">
          <div class="card-body">
            <h5 class="card-title"><?=$result['title'] ?></h5>
            <p class="card-text"><?=$result['author'] ?></p>
            <p class="card-text"><?=$result['publisher'] ?></p>
            <p class="card-text"><?=$result['찜한날짜'] ?></p>
            <p class="card-text"><?=$result['genre'] ?></p>
            <a href="#" class="btn btn-primary">구매하기</a>
            <a href="#" class="btn btn-primary">대여하기</a>
            <a href="./favorite_delete.php?book_id=<?=$result['book_id']?>" class="btn btn-primary">취소하기</a>
>>>>>>> 95a7d56c6fe5236e7ddb44384efdb4bc8f63e63b
          </div>
        </div>

      <?php   }  } else {?>
        <div class="row">
          찜한 책이 없습니다.&nbsp&nbsp&nbsp&nbsp
          <a href="../book/book_list.php"> 책 구경하러가기 </a>
        </div>
        <<?php  } ?>
      </div>
    </div>
  </body>
  </html>
