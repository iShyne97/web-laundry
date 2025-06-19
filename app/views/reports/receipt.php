<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Struk Transaksi</title>
</head>

<body>
    <div id="print-area">
        <h2>Struk Transaksi</h2>
        <p>Kode Order: <?= $data['transaction']['order_code'] ?></p>
        <p>Nama Pelanggan: <?= $data['transaction']['cust_name'] ?></p>
        <p>Tanggal: <?= Helper::LocalDate($data['transaction']['order_date']) ?></p>
        <hr>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['detail_transaction'] as $d): ?>
                    <tr>
                        <td><?= $d['service_name'] ?></td>
                        <td><?= $d['qty'] ?></td>
                        <td>Rp <?= number_format($d['sub_total'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p><strong>Total: Rp <?= number_format($data['transaction']['total'], 0, ',', '.') ?></strong></p>
    </div>
    <script>
        window.onload = () => {
            window.print();
        };
        window.onafterprint = function() {
            window.location.href = "<?= BASEURL ?>/transaction";
        };
    </script>

    <!-- <script>
        window.onafterprint = function() {
            window.location.href = "<?= BASEURL ?>/transaction";
        };
    </script> -->

</body>

</html>