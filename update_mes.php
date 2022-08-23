<?php
	include_once "database.php";
	session_start();
	$id = $_GET["id"];
    $sql="SELECT * FROM `mes` WHERE id = '$id'";
	$result = mysqli_query($con , $sql) or die('MySQL query error');
   	$row = mysqli_fetch_array($result);
	if($_SESSION["id"] !=$row["uid"] && $_SESSION["name"] !='owner' ){
    	header("Location: login.php");
    }
	$obj = json_encode($row);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改資訊</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css">
	<script src="https://unpkg.com/web3@latest/dist/web3.min.js"></script>
	<script src="http://192.168.31.55/member/API/metamask.js"></script>
</head>
<body>
	<div class="container">
		<h1>修改資訊</h1>
		<span>
			<a href="index.php">首頁</a>
		</span>
		<form role="form" action="mes.php?method=update&id=<?php echo $row["id"]?>" method="post">
            <div class="form-group">
                <label for="title">申請項目</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="<?php echo $row["title"]?>">
            </div>
            <div class="form-group">
                <label for="content">錢包地址Address</label>
                <input type="text" class="form-control" id="content" placeholder="Address" name="content" value="<?php echo $row["content"]?>">
            </div>
			<div class="form-group">
                <label for="amount">數量或合作事宜</label>
                <input type="text" class="form-control" id="amount" placeholder="如果購買代幣可直接填入數量" name="amount" value="<?php echo $row["amount"]?>">
            </div>
			<?php if(@$_SESSION["name"]==='owner'){?>
			<div class="form-group">
                <label for="amount">申請是否成功</label>
				<select class="form-control" id="test" placeholder="test" name="test">
    			<option value="失敗">失敗</option>
				<option value="成功">成功</option>
				</select>
            </div>
			<?php }else{?>
				<input type="hidden" id="test" name="test" value="重新申請">
			<?php }?>
			<br>
            <button type="submit" class="btn btn-primary">修改</button>
        </form>
		<?php if($row["title"]==='企業碳幣購買' && $_SESSION["name"] ==='owner'){?>
		<div class="card">
		<h5 class="card-title">交易訊息</h5>
		<span id="eventLog"></span>
		</div>
		<button id="checkEvent3" class="btn btn-danger mybtn">查詢交易紀錄</button>	
		<button id="transfer" class="btn btn-danger mybtn">發送碳幣</button>	
		<?php }?>
	</div>
<script>
var jsvar =  <?php echo json_encode($obj); ?>;
var json = JSON.parse(jsvar);
async function checkEvent3(data){
//var data=document.getElementById('data').value;

Contract.events.Transfer({
    	filter: {log: [web3.utils.utf8ToHex(data)]}, // Using an array means OR: e.g. 20 or 23
   		fromBlock: 0
},function(error, event){ 
	//window.alert("已轉帳");
	console.log("已轉帳");
	//console.log(event); 
})
	.on('data', function(event){
	if(event.returnValues._to ==json.content && event.returnValues._from !="0x0000000000000000000000000000000000000000" && event.returnValues._value == json.amount){
	document.getElementById('eventLog').textContent='';
	var string="blockHash:" + event.blockHash +"<br/>";
	string+="blockNumber:" + event.blockNumber +"<br/>";
	string+="transactionHash:" + event.transactionHash +"<br/>";
	string+="Smart Contract:" + event.address +"<br/>";
	string+="event:" + event.event +"<br/>";
	string+="發起交易:" + event.returnValues._from +"<br/>";
	string+="傳送地址:" + event.returnValues._to +"<br/>";
	string+="Token 數量:" + event.returnValues._value +"<br/>";
	string+="繳費完成";
	document.getElementById('eventLog').innerHTML+=string+"<br>"+"<br>";
	}else{
		document.getElementById('eventLog').textContent='查無交易紀錄';
	}
	})
	.on('error', console.error);     
}

async function transfer(){
			//checkonce();
			const nameElement = document.getElementById("content");
            const _to = nameElement.value;
            const emailElement = document.getElementById("amount");
            const _value = emailElement.value;

			//document.getElementById('eventLog').textContent='交易處理中,請稍後';
             Contract.methods.transfer(_to , _value).send({from:accounts[0]})
            .then(function(data){
                console.log(data);
				//document.getElementById('message').textContent='交易處理結束';
            })									
}		
document.getElementById('transfer').addEventListener('click',transfer);
document.getElementById('checkEvent3').addEventListener('click',checkEvent3);
</script>
	    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>