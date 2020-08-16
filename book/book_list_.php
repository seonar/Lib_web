<?php
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$name = $codecheck['name'];
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="./javascr/onClickFunc.js"></script>
    <title></title>

  </head>
  <body>
    <h1>BOOK LIST</h1>

    <?php if($codecheck['code'] == 'A'):?>
    <?php echo $name."(관리자님) 환영합니다."; ?>

    <?php else : ?>
    <?php echo $name."(님) 환영합니다."; ?>
    <?php endif; ?>

    <form method="post">
      <select name="selected">
        <option value="title">제목</option>
        <option value="author">작가</option>
        <option value="publisher">출판사</option>
      </select>
      <input type="text" name="search" placeholder="검색내용">
      <input type="submit" value="검색">

      <button class="mine wb"><a href="../log/logout.php">로그아웃</a></button>
      <button class="mine wb"><a href="../branch_hak/member_page_ok.php">마이 페이지</a></button>

      <?php if($codecheck['code'] == 'A') {?>
      <button class="mine wb"><a href="../book/book_wirte.php">책 등록하기</a></button>
      <button class="mine wb"><a href="../management_as_admin/user_management.php">유저관리</a></button>
      <?php } ?>
    </form>
    <div>
      <table>
        <tr>
          <td><a href="./book_list.php">메인</a></td>
          <td><a href="?genre=문학">문학</a></td>
          <td><a href="?genre=인문/사회">인문/사회</a></td>
          <td><a href="?genre=자기계발">자기계발</a></td>
          <td><a href="?genre=비즈니스/경제">비즈니스/경제</a></td>
          <td><a href="?genre=라이프스타일">라이프스타일</a></td>
          <td><a href="?genre=만화">만화</a></td>
          <td><a href="?genre=과학">과학</a></td>
          <td><a href="?genre=컴퓨터">컴퓨터</a></td>
          <td><a href="?genre=수험서/자격증">수험서/자격증</a></td>
          <td><a href="?genre=예술/대중문화">예술/대중문화</a></td>
          <td><a href="?genre=외국">외국</a></td>
          <td><a href="?genre=오디오북">오디오북</a></td>
          <td><a href="?genre=기타">기타</a></td>
       </tr>
      </table>
    </div>
    <?php
    if(isset($_GET['genre'])) {
      $sql = mq("select * from book where genre='".$_GET['genre']."'");
       if(isset($_POST['selected'])) {
        $sql = mq("select * from book where genre='".$_GET['genre']."' AND ".$_POST['selected']." LIKE'%".$_POST['search']."%'");
        }
    } else {
      $sql = mq("select * from book");
      if(isset($_POST['selected'])) {
       $sql = mq("select * from book where ".$_POST['selected']." LIKE'%".$_POST['search']."%'");
        }
    }
    while($booklist = $sql->fetch_array()){
      $filtered = array(
        'book_id' => htmlspecialchars($booklist['book_id']),
        'title' => htmlspecialchars($booklist['title']),
        'author' => htmlspecialchars($booklist['author']),
        'publisher' => htmlspecialchars($booklist['publisher']),
        'the_date' => htmlspecialchars($booklist['the_date']),
        'genre' => htmlspecialchars($booklist['genre']),
        'file' => htmlspecialchars($booklist['file'])
      );?>
      <table class="list" cellpadding="5" border="1" align="center">
      <tr class="tltle">
        <th>Title</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>The_Day</th>
        <th>Genre</th>
        <th>Image</th>
        <th>이 책의 관한 서평</th>
      </tr>
      <tr class="value">
        <td><p><?= $filtered['title'] ?></p></td>
        <td><p><?= $filtered['author'] ?></p></td>
        <td><p><?= $filtered['publisher'] ?></p></td>
        <td><p><?= $filtered['the_date'] ?></p></td>
        <td><p><?= $filtered['genre'] ?></p></td>
        <td><p><img src="../file/<?= $filtered['file'] ?>" alt="이미지 없음" width="200" height="200"></p></td>
        <td><a href="../review/review.php?id=<?= $filtered['book_id'] ?>">보기</a> </td>
        <?php if($codecheck['code'] == 'A') {?>
        <td><a href="./book_update.php?id=<?= $filtered['book_id'] ?>">업데이트</a></td>
        <?php } ?>
        <?php if($codecheck['code'] == 'A') {?>
        <td><a href="./book_delete_process.php?id=<?= $filtered['book_id'] ?>">삭제</a></td>
        <?php } ?>
      </tr>
      </table>
    <?php   } ?>
  </body>
</html>