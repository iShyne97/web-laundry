<div class="w-full mx-auto rounded-box border border-base-content/10 bg-base-100 shadow-lg shadow-slate-50/15 p-5">
    <form action="<?= BASEURL ?>/pickup/add/<?= $data['transaction']['id'] ?>" method="post">
        <div class="flex justify-between items-center my-5 p-3">
            <div class="tracking-widest font-semibold text-lg 2xl:text-2xl text-center border-b border-base-content/10 p-3">
                Details Transaction : <?= isset($data['transaction']) ? $data['transaction']['order_code'] : "" ?>
                <input type="hidden" name="id_order" id="id_order" value="<?= $data['transaction']['order_code'] ?>">
            </div>
            <div class="flex justify-end items-end">
                <button type="submit" class="btn btn-primary lg:text-lg 2xl:text-xl 2xl:p-6 rounded-full my-2 ">Finish ?</button>
            </div>
        </div>
        <div>
            <div class="overflow-x-auto rounded-box border border-base-content/10 my-5 p-2">
                <table class="table text-sm lg:text-md 2xl:text-lg" id="">
                    <tr>
                        <td>Customer Name</td>
                        <td>:</td>
                        <td>
                            <?= isset($data['transaction']) ? $data['transaction']['cust_name'] : "" ?>
                            <input type="hidden" name="id_customer" id="id_customer" value="<?= $data['transaction']['id_customer'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?= isset($data['transaction']) ? $data['transaction']['cust_phone'] : "" ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td><?= isset($data['transaction']) ? $data['transaction']['cust_address'] : "" ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?= isset($data['transaction'])
                                ? ($data['transaction']['order_status'] == 0
                                    ? '<span class="rounded-full py-2 px-5 text-sm lg:text-lg bg-blue-400 text-white">Washing</span>'
                                    : '<span class="rounded-full py-2 px-5 text-sm lg:text-lg bg-green-400 text-white">Finished</span>')
                                : '' ?>

                        </td>
                    </tr>
                    <tr>
                        <td>Order Date</td>
                        <td>:</td>
                        <td><?= isset($data['transaction']) ? Helper::LocalDate($data['transaction']['order_date']) : "" ?></td>
                    </tr>
                    <tr>
                        <td>Finish</td>
                        <td>:</td>
                        <td><?= isset($data['transaction']) ? Helper::LocalDate($data['transaction']['order_end_date']) : "" ?></td>
                    </tr>
                    <tr>
                        <td>Grand Total</td>
                        <td>:</td>
                        <td>
                            <?= isset($data['transaction']) ? Helper::rupiah($data['transaction']['total']) : "" ?>
                            <input type="hidden" name="total_input" id="total_input" value="<?= $data['transaction']['total'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Amount Paid</td>
                        <td>:</td>
                        <td>
                            <?php
                            $valueOp = "";
                            if (isset($data['transaction'])) {
                                $orderPay = $data['transaction']['order_pay'];
                                if (is_null($orderPay)) {
                                    $valueOp = 'type="number" placeholder="Belum Bayar" required';
                                } else {
                                    $valueOp = 'type="text" value="' . Helper::rupiah($orderPay) . '" readonly';
                                }
                            }
                            ?>
                            <input
                                name="order_pay"
                                id="order_pay"
                                class="focus:outline-none focus:ring-0 focus:border-transparent"
                                <?= $valueOp ?>>

                        </td>
                    </tr>
                    <tr>
                        <td>Change Due</td>
                        <td>:</td>
                        <td>
                            <?php
                            $valueOc = "";
                            if (isset($data['transaction'])) {
                                $orderChange = $data['transaction']['order_change'];
                                if (is_null($orderChange)) {
                                    $valueOc = 'type="number" placeholder="Belum Bayar" readonly';
                                } else {
                                    $valueOc = 'type="text" value="' . Helper::rupiah($orderChange) . '" readonly';
                                }
                            }
                            ?>
                            <input
                                name="order_change"
                                id="order_change"
                                class="focus:outline-none focus:ring-0 focus:border-transparent"
                                <?= $valueOc ?>>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- <div class="flex w-full items-center gap-3"> -->
            <div class="overflow-x-auto rounded-box border border-base-content/10 my-5 p-2 flex-1/2">
                <table class="table lg:text-lg 2xl:text-xl">
                    <!-- head -->
                    <thead class="lg:text-lg 2xl:text-xl">
                        <tr>
                            <th>No</th>
                            <th>Service</th>
                            <th>Weight</th>
                            <th>Sub Total</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['details_transaction'] as $key => $d) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $d['service_name'] ?></td>
                                <td><?= $d['qty'] ?></td>
                                <td><?= Helper::rupiah($d['sub_total']) ?></td>
                                <td><?= $d['notes'] ?></td>
                            </tr>
                        <?php endforeach;  ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="flex-1/2"> -->
            <div>
                <textarea class="textarea h-24 2xl:text-lg w-full" placeholder="Put some notes if necessary" name="notes"></textarea>
            </div>
            <!-- </div> -->
            <!-- </div> -->
        </div>
    </form>
</div>

<script>
    const total = document.getElementById('total_input');
    const paid = document.getElementById('order_pay');
    const change = document.getElementById('order_change');

    paid.addEventListener('input', function() {
        const totalValue = parseFloat(total.value) || 0;
        const paidValue = parseFloat(paid.value) || 0;
        const result = paidValue - totalValue;

        change.value = result >= 0 ? result : 0;
    });
</script>