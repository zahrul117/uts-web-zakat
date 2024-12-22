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
    }else {
        include "home.php";
    }
//simpan :isifile    
    ?>
</body>
</html>