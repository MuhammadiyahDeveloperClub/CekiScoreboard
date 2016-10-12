<?php
	SESSION_START();
?>
<html>
	<head>
		<title>CEKI</title>
	</head>

	<body>
		<form action="?" method="POST">
			<?php
				if(empty($_SESSION['satu'])){
			?>
			<table>
				<tr>
					<td>Player 1</td>
					<td>:</td>
					<td><input type="text" name="satu"></td>
				</tr>
				<tr>
					<td>Player 2</td>
					<td>:</td>
					<td><input type="text" name="dua"></td>
				</tr>
				<tr>
					<td>Player 3</td>
					<td>:</td>
					<td><input type="text" name="tiga"></td>
				</tr>
				<tr>
					<td>Player 4</td>
					<td>:</td>
					<td><input type="text" name="empat"></td>
				</tr>
				<tr>
					<td colspan=3><input type="submit" name="main" value="Main!"></td>
				</tr>
			</table>
			<?php 
				}else{
					@$min=$_SESSION['skor1'];
					if(@$_SESSION['skor2']<$min){
						$min=$_SESSION['skor2'];
					}
					if(@$_SESSION['skor3']<$min){
						$min=$_SESSION['skor3'];
					}
					if(@$_SESSION['skor4']<$min){
						$min=$_SESSION['skor4'];
					}
			?>
			<table>
				<tr>
					<td><?php echo $_SESSION['satu']; ?></td>
					<td>[ <?php echo @$_SESSION['skor1']; ?> ]</td>
					<td><input type="text" name="satu"></td>
					<td><?php if($min==$_SESSION['skor1']){ echo "NGOCOK!!"; } ?></td>
				</tr>
				<tr>
					<td><?php echo $_SESSION['dua']; ?></td>
					<td>[ <?php echo @$_SESSION['skor2']; ?> ]</td>
					<td><input type="text" name="dua"></td>
					<td><?php if($min==$_SESSION['skor2']){ echo "NGOCOK!!"; } ?></td>
				</tr>
				<tr>
					<td><?php echo $_SESSION['tiga']; ?></td>
					<td>[ <?php echo @$_SESSION['skor3']; ?> ]</td>
					<td><input type="text" name="tiga"></td>
					<td><?php if($min==$_SESSION['skor3']){ echo "NGOCOK!!"; } ?></td>
				</tr>
				<tr>
					<td><?php echo $_SESSION['empat']; ?></td>
					<td>[ <?php echo @$_SESSION['skor4']; ?> ]</td>
					<td><input type="text" name="empat"></td>
					<td><?php if($min==$_SESSION['skor4']){ echo "NGOCOK!!"; } ?></td>
				</tr>
				<tr>
					<td colspan=4>
						<input type="submit" name="tambah" value="Tambah!">
						<input type="submit" name="ulang" value="Ulang!">
					</td>
				</tr>
			</table>
			<?php } ?>
		</form>
	</body>
</html>
<?php
	if(isset($_POST['main'])){
		@$_SESSION['satu']=$_POST['satu'];
		@$_SESSION['dua']=$_POST['dua'];
		@$_SESSION['tiga']=$_POST['tiga'];
		@$_SESSION['empat']=$_POST['empat'];
		header('location:index.php');
	}
	if(isset($_POST['tambah'])){
		@$_SESSION['skor1']=$_POST['satu'] + $_SESSION['skor1'];
		@$_SESSION['skor2']=$_POST['dua'] + $_SESSION['skor2'];
		@$_SESSION['skor3']=$_POST['tiga'] + $_SESSION['skor3'];
		@$_SESSION['skor4']=$_POST['empat'] + $_SESSION['skor4'];
		header('location:index.php');
	}
	if(isset($_POST['ulang'])){
		SESSION_DESTROY();
		header('location:index.php');
	}
?>
