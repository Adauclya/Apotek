<!DOCTYPE html>
<html>
    <head>
        <title>Login</title> 
        <link rel="stylesheet" type="text/css" href="assets/css/mystyle.css">
        <script type="text/javascript">
            function cek() {
                var x = document.forms["msfform"]["username"].value;
                var y = document.forms["msfform"]["password"].value;

                if (x==null || x==""){
                    alert("Username tidak boleh kosong !");
                    return false;
                }
                else if (y==null || y==""){
                    alert("Password tidak boleh kosong !");
                    return false;
                }

            }
        </script>   
    </head>
    <body style="background-image: url('assets/img/1.jpg');">
        <div class="form">
            <p style="color: gray; font-size: 190%; text-align: center; margin: 0;"><img src="assets/img/logo.jpg" width="50px" height="50px">&nbsp;&nbsp;Pharma</p>
                <img src="assets/img/hr.png" height="30px" width="360px">
                <br>
                <br>
                <form id="msfform" action="controllers/cek_log.php" method="POST" onsubmit="return cek()">
                    <label>Username</label>
                        <input type="text" name="username" autofocus="autofocus" autocomplete="off" >
                        <br>
                    <label>Password</label>
                        <input type="password" name="password" >
                        <br>
                    <div class="form-item">
                        <input type="submit" value="LOGIN" class="login">
                            <a href="#" class="pull-left" class="form-item">Forgot Password?</a>
                    </div>
                </form>
            <center>
                <font color="#800000">
                    <?php if (isset($_GET ['pesan'])){
                        if ($_GET['pesan'] == "gagal"){
                            echo "<br><br><br><br>.Username dan Password salah !";
                         }
                    } ?>
                </font>
            </center>
        </div>
    </body>
</html>