<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perhitungan Pajak Gaji</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            font-size: 20px;
            margin-bottom: 20px;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .result {
            margin-top: 20px;
        }
        .result p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Perhitungan Pajak Gaji</h1>
        <form method="POST" action="">
            <input type="number" name="pendapatan" placeholder="Masukkan pendapatan (Rp)" required>
            <button type="submit">Hitung</button>
        </form>
        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $pendapatan = floatval($_POST['pendapatan']);
                $pajak = 0;

                // Validasi pendapatan
                if ($pendapatan < 0) {
                    echo "<p style='color: red;'>Pendapatan tidak valid!</p>";
                } else {
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

                    // Tampilkan hasil
                    echo "<p><strong>Pendapatan:</strong> Rp" . number_format($pendapatan, 0, ',', '.') . "</p>";
                    echo "<p><strong>Pajak:</strong> Rp" . number_format($pajak, 0, ',', '.') . "</p>";
                    echo "<p><strong>Pendapatan Bersih:</strong> Rp" . number_format($pendapatanBersih, 0, ',', '.') . "</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>