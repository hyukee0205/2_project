<?php
//세션 시작
session_start();

//데이터 가져오기
$u_id = $_POST["u_id"];
$pwd = $_POST["pwd"];

//DB 연결
include "../inc/dbcon.php";

//쿼리 작성
$sql = "select idx, u_name, u_id, pwd, mobile, email, addr from members where u_id='$u_id';";


//쿼리 전송
$result = mysqli_query($dbcon, $sql);

//전체 데이터 수
$num = mysqli_num_rows($result);



if(!$num){
  echo "
    <script>
      alert('일치하는 아이디가 없습니다.');
      location.href = 'login.php';
    </script>
  ";
} else{
  $array = mysqli_fetch_array($result);
  $g_pwd = $array["pwd"];

  if($pwd != $g_pwd){
    echo "
      <script>
        alert('비밀번호가 일치하지 않습니다.');
        location.href = 'login.php';
        </script>
      ";
  } else{
      echo "
        <script>
          alert('로그인 되었습니다.');
        </script>
        ";
    //세션 변수 생성
    $_SESSION["s_idx"] = $array["idx"];
    $_SESSION["s_name"] = $array["u_name"];
    $_SESSION["s_id"] = $array["u_id"];
    $_SESSION["s_mobile"] = $array["mobile"];
    $_SESSION["s_email"] = $array["email"];
    $_SESSION["s_addr"] = $array["addr"];
  };
};

mysqli_close($dbcon);

echo "
    <script>
        location.href='../index.php';
    </script>
";



