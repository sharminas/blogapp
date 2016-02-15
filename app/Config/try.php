<?php
  $like_num = $_POST['like_num'];
  $dislike_num = $_POST['dislike_num'];
  $insert = "insert into articles values('$like_num','$dislike_num')";// Do Your Insert Query
  if(mysql_query($insert)) {
   echo "You like this article";
  } else {
   echo "Refresh!";
  }
?>