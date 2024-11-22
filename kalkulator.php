<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pendapatan = floatval($_POST['pendapatan']);
    $pajak = 0;

    if ($pendapatan < 0) {
        header("Location: index.html");
        exit();
    }

    // Hitung pajak berdasarkan logika
    if ($pendapatan <= 3000000) {
        $pajak = max(50000, $pendapatan * 0.05);
    } elseif ($pendapatan <= 5000000) {
        $pajak = $pendapatan * 0.05;
    } elseif ($pendapatan <= 10000000) {
        $pajak = $pendapatan * 0.10;
    } else {
        $pajak = $pendapatan * 0.15;
    }

    $pendapatanBersih = $pendapatan - $pajak;

    // Redirect kembali ke halaman utama dengan hasil
    $url = "index.html?" . http_build_query([
        'pendapatan' => $pendapatan,
        'pajak' => $pajak,
        'pendapatanBersih' => $pendapatanBersih
    ]);
    header("Location: $url");
    exit();
}
?>
