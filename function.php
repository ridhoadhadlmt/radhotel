
<?php

function getDetailKamar($table,$field,$kondisi=''){
    global $koneksi;

    if(is_array($field)){
        $readData = implode(",",$field);
    }
    else{
        $readData = $field;
    }
    $sql = "SELECT $readData FROM $table $kondisi";
    $exe = mysqli_query($koneksi,$sql);
    return $exe;
}

function getKamar($table,$field){
    global $koneksi;

    if(is_array($field)){
        $readData = implode(",",$field);
    }
    else{
        $readData = $field;
    }
    $sql = "SELECT $readData FROM $table";
    $exe = mysqli_query($koneksi,$sql);
    return $exe;
}
function getDestinasi($table,$field){
    global $koneksi;

    if(is_array($field)){
        $readData = implode(",",$field);
    }
    else{
        $readData = $field;
    }
    $sql = "SELECT $readData FROM $table";
    $exe = mysqli_query($koneksi,$sql);
    return $exe;
}
function getDestinasiDetail($table,$field, $params){
    global $koneksi;

    $sql = "SELECT $field FROM $table $params";
    $exe = mysqli_query($koneksi,$sql);
    return $exe;
}
function getTipeKamar($table,$field){
    global $koneksi;

    if(is_array($field)){
        $readData = implode(",",$field);
    }
    else{
        $readData = $field;
    }
    $sql = "SELECT $readData FROM $table";
    $exe = mysqli_query($koneksi,$sql);
    return $exe;
}
function createTipeKamar($table,$field,$value){
    global $koneksi;

    $fields = implode(",",$field);
    $values = implode(",",$value);

    $sql = "INSERT INTO ".$table. "(".$fields.") VALUES(".$values.")";
    $exe = mysqli_query($koneksi,$sql);
    if($exe){
        getTipeKamar($table, $field);
    }
    else{
        echo $sql;
    }
}
function ubahTipeKamar($table,$field,$id=''){
    global $koneksi;
    $fields = implode(",",$field);
    $sql = "UPDATE $table SET $fields WHERE id_tipe = $id";
    $exe = mysqli_query($koneksi,$sql);
    if($exe){
        getTipeKamar($table, $field);
    }
    else{
        echo $sql;
    }
}
function CariKamar($table,$field,$cari){
    global $koneksi;

    if(is_array($field)){
        $readData = implode(",",$field);
    }
    else{
        $readData = $field;
    }
    $sql = "SELECT $readData FROM $table JOIN tipe_kamar ON kamar.id = tipe_kamar.id_tipe WHERE tipe_kamar = $cari";
    $exe = mysqli_query($koneksi,$sql);
    return $exe;
}

function getDetailDestinasi($table,$field,$kondisi=''){
    global $koneksi;

    if(is_array($field)){
        $readData = implode(",",$field);
    }
    else{
        $readData = $field;
    }
    $sql = "SELECT $readData FROM $table $kondisi";
    $exe = mysqli_query($koneksi,$sql);
    return $exe;
}

function getMenu($table,$field){
    global $koneksi;

    if(is_array($field)){
        $readData = implode(",",$field);
    }
    else{
        $readData = $field;
    }
    $sql = "SELECT $readData FROM $table";
    // $sql2 = "SELECT $readData FROM $table JOIN kategori_menu ON $table.kategori = kategori_menu.id_kategori";
    $exe = mysqli_query($koneksi,$sql);
    return $exe;
}
function getKategoriMenu($table,$field,$kondisi=''){
    global $koneksi;

    if(is_array($field)){
        $readData = implode(",",$field);
    }
    else{
        $readData = $field;
    }
    $sql = "SELECT $readData FROM $table $kondisi";
    $exe = mysqli_query($koneksi,$sql);
    return $exe;
}
function createMenu($table,$field,$value){
    global $koneksi;

    $fields = implode(",",$field);
    $values = implode(",",$value);

    $sql = "INSERT INTO ".$table. "(".$fields.") VALUES(".$values.")";
    $exe = mysqli_query($koneksi,$sql);
    if($exe){
        echo "<meta http-equiv='refresh' content='0'> ";
        getMenu($table, $field);
    }
    else{
        echo $sql;
    }
}
function createDestinasi($table,$field,$value){
    global $koneksi;

    $fields = implode(",",$field);
    $values = implode(",",$value);

    $sql = "INSERT INTO ".$table. "(".$fields.") VALUES(".$values.")";
    $exe = mysqli_query($koneksi,$sql);
    if($exe){
        echo "<meta http-equiv='refresh' content='0'> ";
        getDestinasi($table, $field);
    }
    else{
        echo $sql;
    }
}

function deleteDestinasi($table, $field, $id=''){
    global $koneksi;

    $sql = "DELETE FROM $table WHERE id_destinasi = $id";
    $exe = mysqli_query($koneksi, $sql);
    if($exe){
        getDestinasi($table, $field);
    }
    else{
        echo $sql;
    }
}
?>