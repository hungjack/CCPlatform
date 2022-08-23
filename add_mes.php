<?php include_once "database.php";
    session_start();
    if(!isset($_SESSION["id"])){
    	header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增申請項目</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<h1>新增申請項目</h1>
		<span>
			<a href="index.php">首頁</a>
		</span>
		<form role="form" action="mes.php?method=add" method="post">
            <div class="form-group">
                <label for="title">申請項目</label>
                <select class="form-control" id="title" placeholder="title" name="title">
    			<option value="企業碳幣購買">企業碳幣購買</option>
    			<option value="申請合作商家">申請合作商家</option>
                <option value="碳幣商城之商品上架">碳幣商城之商品上架</option>
				</select>
            </div>
            <div class="form-group">
                <label for="content">錢包地址</label>
                <input type="text" class="form-control" id="content" placeholder="Address" name="content">
            </div>
            <div class="form-group">
                <label for="amount">數量或合作事宜</label>
                <input type="text" class="form-control" id="amount" placeholder="如果購買代幣可直接填入數量" name="amount">
            </div>
            <div class="form-group">
                <label for="cash">付款方式</label>
                <select class="form-control" id="cash" name="cash">
    			<option value="無">無</option>
    			<option value="銀行轉帳">銀行轉帳</option>
                <option value="信用卡刷卡">信用卡刷卡</option>
				</select>
            </div>
            <button type="submit" class="btn btn-primary">新增</button>
        </form>
	</div>
	     
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>