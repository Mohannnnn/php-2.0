<?php 
	1.PHP 中的 $_GET 和 $_POST 变量用于检索表单中的信息，比如用户输入。

	2.表单验证：
	// 定义变量并默认设为空值
	$nameErr = $emailErr = $genderErr = $websiteErr = "";//错误的
	$name = $email = $gender = $comment = $website = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//empty()函数检验是否为空，preg_match()进行正则表达式匹配。
		if (empty($_POST["name"])) {
		    $nameErr = "Name is required";
		} else {
		    $name = test_input($_POST["name"]);
		    // 检测名字是否只包含字母跟空格
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		    	$nameErr = "只允许字母和空格"; 
			}
		}
		   
		if (empty($_POST["email"])) {
		    $emailErr = "Email is required";
		} else {
		    $email = test_input($_POST["email"]);
		    // 检测邮箱是否合法
		    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
		         $emailErr = "非法邮箱格式"; 
		    }
		}
		     
		if (empty($_POST["website"])) {
		    $website = "";
		} else {
		    $website = test_input($_POST["website"]);
		    // 检测 URL 地址是否合法
		    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
		        $websiteErr = "非法的 URL 的地址"; 
		    }
		}

		if (empty($_POST["comment"])) {
		    $comment = "";
		} else {
		    $comment = test_input($_POST["comment"]);
		}

		if (empty($_POST["gender"])) {
		    $genderErr = "性别是必需的。";
		} else {
		    $gender = test_input($_POST["gender"]);
		}
	}

	function test_input($data)
	{
		$data = trim($data); //trim()函数去除用户输入数据中不必要的字符 (如：空格，tab，换行)
		$data = stripslashes($data); //stripslashes()函数去除用户输入数据中的反斜杠 (\)
		$data = htmlspecialchars($data); //htmlspecialchars() 把一些预定义的字符转换为 HTML 实体。
		return $data;
	}

	注意：我们在执行以上脚本时，会通过$_SERVER["REQUEST_METHOD"]来检测表单是否被提交 。如果 REQUEST_METHOD
	是 POST, 表单将被提交 - 数据将被验证。如果表单未提交将跳过验证并显示空白。在以上实例中使用输入项都是可选的，即使用户不输入任何数据也可以正常显示。empty()函数检验是否为空，preg_match()进行正则表达式匹配。

	3.php中$_GET
		在 PHP 中，预定义的 $_GET 变量用于收集来自 method="get" 的表单中的值。
	  php中$_POST
	  	在 PHP 中，预定义的 $_POST 变量用于收集来自 method="post" 的表单中的值。


 ?>
