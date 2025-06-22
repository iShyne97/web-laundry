<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Report Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-sm font-sans p-6">
    <div id="print-area">
        <h2 class="text-xl font-bold text-center mb-4 border-b pb-2">Laporan Transaksi</h2>

        <?php if (!empty($_GET['start']) && !empty($_GET['end'])) : ?>
            <p class="text-center text-sm mb-4">
                Periode: <strong><?= date('d M Y', strtotime($_GET['start'])) ?></strong>
                s.d. <strong><?= date('d M Y', strtotime($_GET['end'])) ?></strong>
            </p>
        <?php endif; ?>

        <table class="table-auto w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-1">No</th>
                    <th class="border px-2 py-1">Nama</th>
                    <th class="border px-2 py-1">No Transaksi</th>
                    <th class="border px-2 py-1">Tanggal Order</th>
                    <th class="border px-2 py-1">Tanggal Selesai</th>
                    <th class="border px-2 py-1">Jumlah Bayar</th>
                    <th class="border px-2 py-1">Kembalian</th>
                    <th class="border px-2 py-1">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['transactions'] as $key => $d) : ?>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="border px-2 py-1 text-center"><?= $key + 1 ?></td>
                        <td class="border px-2 py-1"><?= $d['cust_name'] ?></td>
                        <td class="border px-2 py-1"><?= $d['order_code'] ?></td>
                        <td class="border px-2 py-1"><?= Helper::LocalDate($d['order_date']) ?></td>
                        <td class="border px-2 py-1"><?= Helper::LocalDate($d['order_end_date']) ?></td>
                        <td class="border px-2 py-1"><?= Helper::rupiah($d['order_pay']) ?></td>
                        <td class="border px-2 py-1"><?= Helper::rupiah($d['order_change']) ?></td>
                        <td class="border px-2 py-1"><?= Helper::rupiah($d['total']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" class="border px-2 py-1 text-right font-semibold">Grand Total</td>
                    <td class="border px-2 py-1 font-bold"><?= Helper::rupiah($data['total']['total_tr']) ?></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <script>
        window.onload = () => {
            window.print();
        };

        window.onafterprint = () => {
            window.location.href = "<?= BASEURL ?>/transaction/reportTransaction";
        };
    </script>
</body>

</html>