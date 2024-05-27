<?php
header("Content-Type: application/json");
include 'db_config.php';

// Get the posted data
$data = json_decode(file_get_contents("php://input"));

// Validate the data
if (!isset($data->name) || !isset($data->email) || !isset($data->prodi) || !isset($data->fakultas)) {
    die(json_encode(["error" => "Invalid input"]));
}

$name = $koneksi->real_escape_string($data->name);
$email = $koneksi->real_escape_string($data->email);
$prodi = $koneksi->real_escape_string($data->prodi);
$fakultas = $koneksi->real_escape_string($data->fakultas); // Perbaikan: mengatur variabel $fakultas dengan benar

$sql = "INSERT INTO users (name, email, prodi, fakultas) VALUES ('$name', '$email', '$prodi', '$fakultas')";

if ($koneksi->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}

$koneksi->close();
?>
