<?php
// Sambungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Perbaikan path ke file TCPDF jika diperlukan
require_once('tcpdf/tcpdf.php');

// Query data peminjaman berdasarkan bulan
$sql = "SELECT peminjaman.*, buku.judul, user.nama_lengkap
        FROM peminjaman
        JOIN buku ON peminjaman.buku_id = buku.buku_id
        JOIN user ON peminjaman.user_id = user.user_id
        WHERE MONTH(tgl_pinjam) = 2"; // Ganti angka 2 dengan bulan yang diinginkan
$result = $conn->query($sql);

// Mengatur header laporan PDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Laporan Data Peminjaman');
$pdf->SetHeaderData('', 0, 'Laporan Data Peminjaman', '');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetFont('helvetica', '', 10);
$pdf->AddPage();

// Menulis header tabel
$html = '<table border="1">
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
            </tr>';

// Menulis data peminjaman ke dalam tabel
if ($result->num_rows > 0) {
    $count = 1;
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$count.'</td>
                    <td>'.$row['judul'].'</td>
                    <td>'.$row['nama_lengkap'].'</td>
                    <td>'.$row['tgl_pinjam'].'</td>
                    <td>'.$row['status_pinjam'].'</td>
                  </tr>';
        $count++;
    }
} else {
    $html .= '<tr><td colspan="5">Tidak ada data peminjaman</td></tr>';
}

$html .= '</table>';

// Menulis konten HTML ke dalam PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Menutup file PDF dan menyimpannya
$pdf->lastPage();
$pdf->Output('laporan_peminjaman.pdf', 'I'); // Menampilkan langsung atau 'F' untuk menyimpan di server

// Tutup koneksi database
$conn->close();
?>