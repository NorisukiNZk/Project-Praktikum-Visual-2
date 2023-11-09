<?php
session_start();
include 'head-user.php';
if (!empty ($_POST)){
    $username = $_POST['username']; $password = ($_POST['password']);
    $sql = "select * from pengguna where username='".$username."' and password='".$password."'";
    $query = mysqli_query($koneksi,$sql) or die ("error database" .mysqli_error($koneksi));
    //pengecekan query valid atau tidak
    if($query) {
        $row = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);
        //jika $row > 0 atau username dan password ditemukan
        if($row > 0){
            $_SESSION['isLoggedIn']=1;
            $_SESSION['username']=$username;
            $_SESSION['nama']=$data['nama'];
            header('Location: admin.php');
        }else{
            echo "username atau password salah";
        }
    }
}
?>
<h2>Login</h2>
<hr />
<div class="well">
    <div id="login-page" class="container">
        <form id="login-form" method="post" action="" >
            <div class="col-sm-3">
                <input type="text" name="username" class="form-control" placeholder="Nama" autofocus/><br />
                <input type="password" name="password" class="form-control" placeholder="Password" autofocus/><br />
                <button type="submit" name="btnLogin" class="btn btn-primary">Masuk</button>
                <button type="reset" class="btn">Reset</button>
            </div>
        </form>
    </div>
</div>