<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Isi File</title>
</head>

<body>
    <?php
    if(isset($_GET['page'])){
        $page=$_GET['page'];
        if($page=='home'){
            include "home.php";
        }
        //untuk produk
        elseif($page=='tampil_muzaki') {
            include "tampil_muzaki.php";
        }
        elseif($page=='input_produk') {
            include "inputproduk.php";
        }
         elseif($page=='simpan_produk') {
            include "simpan_produk.php";
        }
        elseif($page=='hapus_produk') {
            include "hapus_produk.php";
        }
        //untuk user
        elseif($page=='tampil_user') {
            include "tampil_user.php";
        }
        elseif($page=='input_user') {
            include "input_user.php";
        }
        elseif($page=='simpan_user') {
            include "simpan_user.php";
        }
    }else {
        include "home.php";
    }
//simpan :isifile    
    ?>
</body>
</html>