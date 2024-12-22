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
?>