<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Struk Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class=" text-xs font-sans text-black">
    <div id="print-area" class="w-[80mm] mx-auto p-2 border border-slate-900">
        <div class="text-center mb-2">
            <h1 class="text-sm font-bold">LONDo REpot</h1>
            <img src="https://www.svgrepo.com/show/475525/laundry.svg" alt="logo" class="w-32 mx-auto my-1 aspect-[3/2] object-cover">
        </div>

        <h2 class="text-sm font-semibold text-center mb-1">Struk Transaksi</h2>
        <p class="mb-1">Kode Order: <?= $data['transaction']['order_code'] ?></p>
        <p class="mb-1">Nama Pelanggan: <?= $data['transaction']['cust_name'] ?></p>
        <p class="mb-2">Tanggal: <?= Helper::LocalDate($data['transaction']['order_date']) ?></p>

        <hr class="border-t border-gray-400 my-1">

        <table class="w-full border border-gray-800 border-collapse mb-2">
            <thead>
                <tr>
                    <th class="border border-gray-800 px-1 py-1 text-left">Service</th>
                    <th class="border border-gray-800 px-1 py-1 text-left">Qty</th>
                    <th class="border border-gray-800 px-1 py-1 text-left">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['detail_transaction'] as $d): ?>
                    <tr>
                        <td class="border border-gray-800 px-1 py-1"><?= $d['service_name'] ?></td>
                        <td class="border border-gray-800 px-1 py-1"><?= $d['qty'] ?></td>
                        <td class="border border-gray-800 px-1 py-1">Rp <?= number_format($d['sub_total'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p class="font-bold">Total: Rp <?= number_format($data['transaction']['total'], 0, ',', '.') ?></p>
    </div>
    <script>
        window.onload = () => {
            window.print();
        };
        window.onafterprint = function() {
            window.location.href = "<?= BASEURL ?>/transaction";
        };
    </script>

</body>

</html>