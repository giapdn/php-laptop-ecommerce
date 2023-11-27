
<?php

function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
    $sql = "insert into binhluan(noidung_binhLuan,userName,id_sanPham,ngay_binhLuan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan($idpro){
    $sql = "select * from binhluan where 1";
if($idpro>0) $sql.=" AND id_sanPham='".$idpro."'";
$sql.=" order by id_binhLuan desc";
    $listbl = pdo_query($sql);
return  $listbl;
}
