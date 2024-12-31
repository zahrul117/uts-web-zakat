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
        //untuk muzakki
        elseif($page=='tampil_muzaki') {
            include "tampil_muzaki.php";
        }
        elseif($page=='input_muzakki') {
            include "input_muzakki.php";
        }
        elseif($page=='hapus_muzakki') {
            include "hapus_muzakki.php";
        }
        elseif($page=='edit_muzakki'){
            include "edit_muzakki.php";
        }
        //untuk mustahik
        elseif($page=='tampil_mustahik') {
            include "tampil_mustahik.php";
        }
        elseif($page=='input_mustahik'){
            include "input_mustahik.php";
        }
        elseif($page=='hapus_mustahik') {
            include "hapus_mustahik.php";
        }
        elseif($page=='edit_mustahik'){
            include "edit_mustahik.php";
        }
        //untuk amil
        elseif($page=='tampil_amil'){
            include "tampil_amil.php";
        }
        elseif($page=='input_amil'){
            include "input_amil.php";
        }
        elseif($page=='hapus_amil'){
            include "hapus_amil.php";
        }
        elseif($page=='edit_amil'){
            include "edit_amil.php";
        }
        // untuk pembayaran
        elseif($page=='tampil_pembayaran'){
            include "tampil_pembayaran.php";
        }
        elseif($page=='hapus_pembayaran'){
            include "hapus_pembayaran.php";
        }
        elseif($page=='edit_pembayaran'){
            include "edit_pembayaran.php";
        }
        // untuk penerima
        elseif($page=='tampil_penyaluran'){
            include "tampil_penyaluran.php";
        }
        elseif($page=='input_penyaluran'){
            include "input_penyaluran.php";
        }
        elseif($page=='hapus_penyaluran'){
            include "hapus_penyaluran.php";
        }
        elseif($page=='edit_penyaluran'){
            include "edit_penyaluran.php";
        }
    }else {
        include "home.php";
    }
//simpan :isifile    
    ?>
</body>
</html>