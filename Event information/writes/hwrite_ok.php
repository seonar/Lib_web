<?php
include "./lib/db.php";

$review_title = $_POST['review_title'];
$review_desc = $_POST['review_desc'];
$book_id = $_POST['book_id'];
$user_id = $_POST['user_id'];



if(isset($user_id)&&isset($book_id)&&isset($review_title)&&isset($review_desc)){
$sql = mq("insert into book_review (review_title,review_desc,book_id,user_id) values('".$review_title."','".$review_desc."','".$book_id."','".$user_id."')");
 echo "<script>alert('신청완료.')</script>";
 echo "<script>window.location = './review.php?id=$book_id'</script>";
} else {
  echo mysqli_error($db);
	echo "<script>alert(\신청실패\");</script>";
	echo "<script>window.location = './review_write.php?id=$book_id'</script>";
}

 ?>