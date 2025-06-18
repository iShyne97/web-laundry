<div class="w-full h-full bg-amber-400 rounded-box border border-base-content/10 p-3 overflow-hidden">
    <form action="">
        <div class="inline-block text-md tracking-widest font-semibold lg:text-lg 2xl:text-xl my-5 border-b border-base-content/10 py-3">ADD TRANSACTION</div>
        <div class="w-full h-full grid gap-2 xl:grid-cols-[1fr_auto] bg-pink-900">
            <div class="xl:row-start-1 grid gap-2 grid-cols-[auto_1fr] ">
                <div class="col-start-1 rounded-box bg-pink-500 flex justify-between flex-col p-2">
                    <div class="font-bold tracking-wider p-5 border-b border-base-content/10"><span class="rounded-full py-2 px-5 text-sm lg:text-lg bg-violet-400 text-white">Customer</span></div>
                    <div class="">
                        <table class="table text-sm lg:text-md 2xl:text-lg" id="">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= isset($data['customer']) ? $data['customer']['customer_name'] : "" ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td><?= isset($data['customer']) ? $data['customer']['phone'] : "" ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?= isset($data['customer']) ? $data['customer']['address'] : "" ?></td>
                            </tr>
                        </table>
                    </div>
                    <button class="btn btn-success rounded-box font-bold" id="tr_detail">Add Transaction</button>
                </div>
                <div class="col-start-2 rounded-box bg-pink-500 text-sm lg:text-md 2xl:text-lg p-2">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend lg:text-lg">Services</legend>
                        <select class="select w-full 2xl:h-12 2xl:text-lg" name="id_service" required>
                            <option disabled selected>Select Service</option>
                            <?php foreach ($data['services'] as $service) : ?>
                                <option value="<?= $service['id'] ?>">
                                    <?= ucwords($service['service_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend lg:text-lg">Weight</legend>
                        <label class="input validator w-full 2xl:h-12">
                            <svg class="h-[1em] 2xl:h-[1.5em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g
                                    stroke-linejoin="round"
                                    stroke-linecap="round"
                                    stroke-width="2.5"
                                    fill="none"
                                    stroke="currentColor">
                                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                </g>
                            </svg>
                            <input class="2xl:text-lg" type="number" placeholder="Weight in kg" name="qty" required />
                        </label>
                        <div class="validator-hint hidden">Please enter a valid phone number</div>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend lg:text-lg">Notes</legend>
                        <textarea class="textarea h-24 2xl:text-lg w-full" placeholder="Note" name="notes"></textarea>
                    </fieldset>
                </div>
            </div>
            <div class="row-start-2 grid gap-2">
                <div class="col-start-1 overflow-y-auto rounded-box border border-base-content/10 my-5 p-2 xl:my-0 xl:p-0 bg-base-100">
                    <table class="table lg:text-lg 2xl:text-xl" id="">
                        <!-- head -->
                        <thead class="lg:text-sm 2xl:text-xl">
                            <tr>
                                <th>No</th>
                                <th>Service</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                                <th>Notes</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="col-start-2 flex justify-center items-center rounded-box bg-pink-500">
                    Users
                </div>
            </div>
        </div>
    </form>
</div>
</div>