<html>
<head>
	<button type="submit" name="NewUser" onClick="newUser()">New User</button>
	<button type="submit" name="UpdateUser" onClick="updateUser()">Update User</button>
</head>
<script type="text/javascript">
function newUser(){
	window.open("http://localhost/sgitest/connect.php");
}
function updateUser(){
	window.open("http://localhost/sgitest/updateUser.php");
}
</script>
</html>