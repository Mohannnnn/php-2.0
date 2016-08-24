<?php 
	1.PHP 中的 $_GET 和 $_POST 变量用于检索表单中的信息，比如用户输入。

	2.表单验证：
	$name = $email = $gender = $comment = $website = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	  $name = test_input($_POST["name"]);
	  $email = test_input($_POST["email"]);
	  $website = test_input($_POST["website"]);
	  $comment = test_input($_POST["comment"]);
	  $gender = test_input($_POST["gender"]);
	}

	function test_input($data)
	{
	  $data = trim($data); //trim()函数去除用户输入数据中不必要的字符 (如：空格，tab，换行)
	  $data = stripslashes($data); //stripslashes()函数去除用户输入数据中的反斜杠 (\)
	  $data = htmlspecialchars($data); //htmlspecialchars() 把一些预定义的字符转换为 HTML 实体。
	  return $data;
	}

	注意：我们在执行以上脚本时，会通过$_SERVER["REQUEST_METHOD"]来检测表单是否被提交 。如果 REQUEST_METHOD
	是 POST, 表单将被提交 - 数据将被验证。如果表单未提交将跳过验证并显示空白。在以上实例中使用输入项都是可选的，即使用户不输入任何数据也可以正常显示。


 ?>