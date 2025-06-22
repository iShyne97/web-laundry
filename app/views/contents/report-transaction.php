<div class="w-full mx-auto rounded-box border border-base-content/10 bg-base-100 shadow-lg shadow-slate-50/15 p-5">
    <div class="tracking-widest font-semibold text-lg 2xl:text-2xl text-center border-b border-base-content/10 p-3">Report Transaction</div>
    <div class="flex justify-between items-center my-5 p-3">
        <form action="<?= BASEURL ?>/transaction/reportTransaction" method="post">
            <div class="flex items-center gap-2">
                <input type="date" name="start" value="<?= $_POST['start'] ?? '' ?>" class="input" onchange="this.form.submit()" /> -
                <input type="date" name="end" value="<?= $_POST['end'] ?? '' ?>" class="input" onchange="this.form.submit()" />
                <a href="<?= BASEURL ?>/transaction/reportTransaction/true?start=<?= $_POST['start'] ?? '' ?>&end=<?= $_POST['end'] ?? '' ?>" class="btn btn-soft btn-success md:text-xs lg:text-md 2xl:text-lg" target="_blank">
                    Print
                </a>
            </div>
        </form>
        <div class="tracking-widest font-semibold text-lg 2xl:text-2xl text-center border-b border-base-content/10 p-3">Grand Total <span class="rounded-full px-5 py-3 bg-fuchsia-600"><?= Helper::rupiah($data['total']['total_tr']) ?></span></div>
        <!-- <a href="<?= BASEURL ?>/user/add" class="btn btn-primary lg:text-lg 2xl:text-xl 2xl:p-6">Add User</a> -->
    </div>

    <div class=" overflow-x-auto rounded-box border border-base-content/10 my-5 p-2">
        <table class="table lg:text-lg 2xl:text-xl" id="myTable">
            <!-- head -->
            <thead class="lg:text-lg 2xl:text-xl">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Transaction</th>
                    <th>Order Date</th>
                    <th>Order Finish</th>
                    <th>Amount Paid</th>
                    <th>Change Due</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['transactions'] as $key => $d) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $d['cust_name'] ?></td>
                        <td><?= $d['order_code'] ?></td>
                        <td><?= Helper::LocalDate($d['order_date']) ?></td>
                        <td><?= Helper::LocalDate($d['order_end_date']) ?></td>
                        <td><?= Helper::rupiah($d['order_pay']) ?></td>
                        <td><?= Helper::rupiah($d['order_change']) ?></td>
                        <td><?= Helper::rupiah($d['total']) ?></td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>