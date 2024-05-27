<?php
include 'db_config.php';
$sql = "SELECT id, name, email, prodi, fakultas FROM data_siswa";
$result = $koneksi->query($sql);
$users = array();
if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
 $users[] = $row;
 }
}
header('Content-Type: application/json');
echo json_encode($users);
$koneksi->close();