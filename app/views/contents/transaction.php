<div class="w-full mx-auto rounded-box border border-base-content/10 bg-base-100 shadow-lg shadow-slate-50/15 p-5">
    <div class="flex justify-between items-center my-5 p-3">
        <div class="tracking-widest font-semibold text-lg 2xl:text-2xl text-center border-b border-base-content/10 p-3">Data Transaction</div>
        <!-- <a href="<?= BASEURL ?>/user/add" class="btn btn-primary lg:text-lg 2xl:text-xl 2xl:p-6">Add User</a> -->
    </div>
    <div class="overflow-x-auto rounded-box border border-base-content/10 my-5 p-2">
        <table class="table lg:text-lg 2xl:text-xl" id="myTable">
            <!-- head -->
            <thead class="lg:text-lg 2xl:text-xl">
                <tr>
                    <th>No</th>
                    <th>No Transaction</th>
                    <th>Nama</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Order Date</th>
                    <th>Order Finish</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $d) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td>
                            <a href="<?= BASEURL ?>/transaction/detail/<?= $d['id'] ?>" class="underline" data-id="<?= $d['id']; ?>">
                                <?= $d['order_code'] ?></a>
                        </td>
                        <td><?= $d['cust_name'] ?></td>
                        <td><?= $d['cust_phone'] ?></td>
                        <td><?= $d['cust_address'] ?></td>
                        <td><?= Helper::LocalDate($d['order_date']) ?></td>
                        <td><?= Helper::LocalDate($d['order_end_date']) ?></td>
                        <td>
                            <?php if ($d['order_status'] == 0): ?>
                                <form action="<?= BASEURL ?>/transaction/updateStatus" method="post">
                                    <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                    <input type="hidden" name="status" value="1">
                                    <!-- <select name="status" class="select select-ghost text-center rounded-full py-2 px-5 text-sm lg:text-lg bg-blue-400 text-white" onchange="this.form.submit()">
                                        <option selected disabled>In Machine</option>
                                        <option value="1">Retrieved</option>
                                    </select> -->
                                    <button type="submit" class="block cursor-pointer text-center rounded-full py-2 px-5 text-sm lg:text-lg bg-blue-400 text-white">In Machine</button>
                                </form>
                            <?php elseif ($d['order_status'] == 1 && empty($d['order_pay'])): ?>
                                <span class="text-center rounded-full py-2 px-5 text-sm lg:text-lg bg-yellow-500 text-white">Finished</span>
                            <?php else: ?>
                                <span class="text-center rounded-full py-2 px-5 text-sm lg:text-lg bg-green-400 text-white">Finished | Paid</span>
                            <?php endif; ?>
                        <td>

                            <a href="<?= BASEURL ?>/transaction/delete/<?= $d['id'] ?>" onclick="return confirm('Are you sure ?');" class="btn btn-soft btn-error md:text-xs lg:text-md 2xl:text-lg">Delete</a>
                            <a href="<?= BASEURL ?>/transaction/printReceipt/<?= $d['id'] ?>" class="btn btn-soft btn-success md:text-xs lg:text-md 2xl:text-lg">
                                <!-- <button class="btn btn-soft btn-success md:text-xs lg:text-md 2xl:text-lg" onclick="window.print()"> -->
                                Print
                                <!-- </button> -->
                            </a>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>