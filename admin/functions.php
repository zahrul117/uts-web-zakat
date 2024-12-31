<?php
// koneksi ke databasae
$konek = mysqli_connect("localhost","root","","dbzakat_uts");

function query($query){
    global $konek;
    $result = mysqli_query($konek, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

// bagian function tambah
// function untuh tambag data muzakki/pembayar
function tambahMuzakki($data){
    global $konek;
    $nama = htmlspecialchars($data['nama']);
    $jk = htmlspecialchars($data['jk']);
    $alamat = htmlspecialchars($data['alamat']);
    $nohp = htmlspecialchars($data['nohp']);
    $email = htmlspecialchars($data['email']);
    $kategori = htmlspecialchars($data['kategori']);

    $simpan = "INSERT INTO muzakki (id_muzakki,nama_lengkap,jenis_kelamin,alamat,nomor,email,kategori)
    VALUES
    ('','$nama','$jk','$alamat','$nohp','$email','$kategori')
    ";
    mysqli_query($konek,$simpan);
    return mysqli_affected_rows($konek);
}

// function untuk tambah data mustahik/penerima
function tambahMustahik($data){
    global $konek;
    $nama = htmlspecialchars($data['nama']);
    $jk = htmlspecialchars($data['jk']);
    $alamat = htmlspecialchars($data['alamat']);
    $nohp   = htmlspecialchars($data ['nohp']);
    $kategori = htmlspecialchars($data ['kategori']);


    $simpan = "INSERT INTO mustahik
     (id_mustahik,nama_lengkap,jenis_kelamin,alamat,nomor,kategori) VALUES
     ('','$nama','$jk','$alamat','$nohp','$kategori')
     ";

     mysqli_query($konek,$simpan);
     return mysqli_affected_rows($konek);
}

// functions untuk tambah data amilzakat
function tambahAmil($data){
    global $konek;
    $nama = htmlspecialchars($data['nama']);
    $nohp = htmlspecialchars($data['nohp']);
    $alamat = htmlspecialchars($data['alamat']);

    $simpan = "INSERT INTO amilzakat
    (id_amil,nama_amil,no_hp,alamat) VALUES
    ('','$nama','$nohp','$alamat')
    ";
    mysqli_query($konek,$simpan);
    return mysqli_affected_rows($konek);
}

// functions untuk tambah data penyaluran
function tambahPenyaluran($data){
    global $konek;
    $tgl_penerimaan = htmlspecialchars($data['tgl_penerimaan']);
    $nama_mustahik = htmlspecialchars($data['nama_lengkap']);
    $uang = htmlspecialchars($data['uang']);
    $nama_amil = htmlspecialchars($data['nama_amil']);

    $simpan = "INSERT INTO penyaluran 
    (id_penerimaan,tgl_penerimaan,nama_penerima,jumlah_penerimaan,amil) VALUES
    ('','$tgl_penerimaan','$nama_mustahik','$uang','$nama_amil')";
    mysqli_query($konek,$simpan);
    return mysqli_affected_rows($konek);
}

// function untuk menghapus data muzakki
function hapusMuzakki($id){
    global $konek;
    mysqli_query($konek, "DELETE FROM muzakki WHERE id_muzakki = $id");

    return mysqli_affected_rows($konek);
}


// functions untuk menghapus data mustahik
function hapusMustahik($id){
    global $konek;
    mysqli_query($konek, "DELETE FROM mustahik WHERE id_mustahik = $id");

    return mysqli_affected_rows($konek);

}

// functions untuk menghapus data amil zakat
function hapusAmil($id){
    global $konek;
    mysqli_query($konek, "DELETE FROM amilzakat WHERE id_amil = $id");

    return mysqli_affected_rows($konek);
}

// function untuk menghapus data penyaluran zakat
function hapusPenyaluran($id){
    global $konek;
    mysqli_query($konek, "DELETE FROM penyaluran where id_penerimaan = $id");
    
    return mysqli_affected_rows($konek);
}
// function untuk mengedit data muzakki
function editMuzakki($data){
    global $konek;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $jk = htmlspecialchars($data['jk']);
    $alamat = htmlspecialchars($data['alamat']);
    $nohp = htmlspecialchars($data['nohp']);
    $email = htmlspecialchars($data['email']);
    $kategori = htmlspecialchars($data['kategori']);

    $simpan = "UPDATE muzakki set 
        nama_lengkap = '$nama',
        jenis_kelamin = '$jk',
        alamat = '$alamat',
        nomor = '$nohp',
        email = '$email',
        kategori = '$kategori'
        WHERE id_muzakki = $id 
        ";
        mysqli_query($konek,$simpan);
        return mysqli_affected_rows($konek);
}

// function untuk mengedit data mustahik
function editMustahik($data){
    global $konek;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $jk = htmlspecialchars($data['jk']);
    $alamat = htmlspecialchars($data['alamat']);
    $nohp   = htmlspecialchars($data ['nohp']);
    $kategori = htmlspecialchars($data ['kategori']);

    $simpan = "UPDATE mustahik set 
    nama_lengkap = '$nama',
    jenis_kelamin = '$jk',
    alamat = '$alamat',
    nomor = '$nohp',
    kategori = '$kategori'

    WHERE id_mustahik = $id
    ";
    mysqli_query($konek,$simpan);
    return mysqli_affected_rows($konek);

}
// function untuk mengedit data amil
function editAmil($data){
    global $konek;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $nohp = htmlspecialchars($data['nohp']);
    $alamat = htmlspecialchars($data['alamat']);

    $simpan = "UPDATE amilzakat set
    nama_amil = '$nama',
    no_hp = '$nohp',
    alamat = '$alamat'

    Where id_amil = $id
        ";
    mysqli_query($konek,$simpan);

    return mysqli_affected_rows($konek);

}

// function untuk mengedit data penerimaan
function editPenyaluran($data){
    global $konek;
    $id = $data['id'];
    $tgl_penerimaan = htmlspecialchars($data['tgl_penerimaan']);
    $nama_penerima = htmlspecialchars($data['nama_lengkap']);
    $jumlah_penerimaan = htmlspecialchars($data['uang']);
    $nama_amil = htmlspecialchars($data['nama_amil']);

    $simpan = "UPDATE penyaluran set
    tgl_penerimaan = '$tgl_penerimaan',
    nama_penerima = '$nama_penerima',
    jumlah_penerimaan = '$jumlah_penerimaan',
    amil = '$nama_amil'
    
    where id_penerimaan = $id
    ";
    mysqli_query($konek,$simpan);
    return mysqli_affected_rows($konek);
}
// function untuk mencari data muzakki
function cariMuzakki($keyword){
    $query = "SELECT * FROM muzakki 
    WHERE
    nama_lengkap like '%$keyword%' or
    jenis_kelamin like '%$keyword%' or
    alamat like '%$keyword%' or
    nomor like '%$keyword%' or
    kategori like '%$keyword%'
    
    ";

    return query($query);
}

// fucntion untuk daftar admin
function registrasi($data){
    global $konek;
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($konek,$data['password']);
    $password2 = mysqli_real_escape_string($konek,$data['password2']);

    // cek username
    $cari = mysqli_query($konek,"SELECT username FROM admin WHERE username = '$username'");
    if(mysqli_fetch_assoc($cari)){
        echo"<script>alert('Username Udah Ada');</script>";
        return false;
    }
    
    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi Password tidak Sesuai')</script>";
        return false;
    }
    
    // registrasi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan admin baru ke database
    mysqli_query($konek,"INSERT INTO admin VALUES ('','$username','$password')");
    return mysqli_affected_rows($konek);
}
?>