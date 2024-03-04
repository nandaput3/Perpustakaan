<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses filter
if (isset($_GET['bulan'])) {
    $bulan = $_GET['bulan'];
    $filter_sql = "WHERE DATE_FORMAT(tgl_pinjam, '%Y-%m') = '$bulan'";
} else {
    $filter_sql = "";
}

// Query untuk mendapatkan data peminjaman
$sql = "SELECT peminjaman_id, buku.judul, user.username, tgl_pinjam, tgl_kembali, status_pinjam
        FROM peminjaman
        INNER JOIN buku ON peminjaman.buku_id = buku.buku_id
        INNER JOIN user ON peminjaman.user_id = user.user_id
        $filter_sql";
$result = mysqli_query($conn, $sql);

// Buat file Excel
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set judul kolom
$sheet->setCellValue('A1', 'ID Peminjaman');
$sheet->setCellValue('B1', 'Judul Buku');
$sheet->setCellValue('C1', 'Username');
$sheet->setCellValue('D1', 'Tanggal Pinjam');
$sheet->setCellValue('E1', 'Tanggal Kembali');
$sheet->setCellValue('F1', 'Status Peminjam');

// Isi data peminjaman ke file Excel
if (mysqli_num_rows($result) > 0) {
    $row = 2;
    while ($row_data = mysqli_fetch_assoc($result)) {
        $sheet->setCellValue('A' . $row, $row_data['peminjaman_id']);
        $sheet->setCellValue('B' . $row, $row_data['judul']);
        $sheet->setCellValue('C' . $row, $row_data['username']);
        $sheet->setCellValue('D' . $row, $row_data['tgl_pinjam']);
        $sheet->setCellValue('E' . $row, $row_data['tgl_kembali']);
        $sheet->setCellValue('F' . $row, $row_data['status_pinjam']);
        $row++;
    }
} else {
    echo "Tidak ada data peminjaman yang ditemukan.";
}

// Output sebagai file Excel
$filename = "laporan_peminjaman_$bulan.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($filename);

// Set header untuk file Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$filename\"");
header('Cache-Control: max-age=0');

// Output file Excel ke output buffer
$writer->save('php://output');

// Tutup koneksi database
mysqli_close($conn);
?>