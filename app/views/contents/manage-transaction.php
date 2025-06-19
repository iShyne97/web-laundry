<div class="w-full h-full rounded-box border border-base-content/10 overflow-y-auto p-5">
    <form action="<?= BASEURL ?> /transaction/add/<?= $data['customer']['id'] ?>" method="post">
        <div class="inline-block text-md tracking-widest font-semibold lg:text-lg 2xl:text-xl my-5 border-b border-base-content/15 p-2">ADD TRANSACTION</div>
        <div class="w-full h-full grid gap-2 xl:grid-cols-[1fr_auto]">
            <div class="xl:row-start-1 grid gap-2 lg:grid-cols-[auto_1fr] ">
                <div class="row-start-1 col-start-1 rounded-box flex justify-between flex-col p-2 bg-base-100 shadow-lg shadow-slate-50/15">
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
                    <button type="button" class="btn btn-success rounded-box font-bold" id="tr_detail">Add to cart</button>
                </div>
                <div class="row-start-2 col-start-1 lg:row-start-1 lg:col-start-2 rounded-box text-sm lg:text-md 2xl:text-lg p-2 border border-base-content/15 shadow-lg shadow-slate-50/15">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend lg:text-lg">Services</legend>
                        <select class="select w-full 2xl:h-12 2xl:text-lg" name="id_service" id="services" required>
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
                            <input id="weight" class="2xl:text-lg" type="number" placeholder="Weight" name="qty" />
                        </label>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend lg:text-lg">Notes</legend>
                        <textarea id="notes" class="textarea h-24 2xl:text-lg w-full" placeholder="Note" name="notes"></textarea>
                    </fieldset>
                </div>
            </div>
            <div class="row-start-2 grid grid-cols-[1fr_auto] gap-2">
                <div class="col-start-1 overflow-y-auto rounded-box border border-base-content/10 xl:p-0 bg-base-100">
                    <table class="table lg:text-lg 2xl:text-xl" id="cart">
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
                <div class="row-start-2 col-start-1 lg:row-start-1 lg:col-start-2 p-3 rounded-box">
                    <table class="table text-sm lg:text-md 2xl:text-lg" id="">
                        <tr>
                            <td>Total</td>
                            <td colspan=" 2">
                                <div class="text-2xl font-bold">
                                    Rp.
                                    <span id="total" class="text-success">0</span>
                                    <input type="hidden" name="total" id="total_input" value="0">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Order Code</td>
                            <td>:</td>
                            <td>
                                <?php $order_code = Helper::generateOrderCode($_SESSION['user']['id']); ?>
                                <span><?= $order_code ?></span>
                                <input type="hidden" name="order_code" value="<?= $order_code ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Order Start</td>
                            <td>:</td>
                            <td><input type="date" name="order_date" class="input" min="<?= date('Y-m-d') ?>" required /></td>
                        </tr>
                        <tr>
                            <td>Order End</td>
                            <td>:</td>
                            <td><input type="date" name="order_end_date" class="input" min="<?= date('Y-m-d') ?>" required /></td>
                        </tr>
                        <tr>
                            <td>Amount Paid</td>
                            <td>:</td>
                            <td><input type="number" name="order_pay" id="order_pay" class="input" required /></td>
                        </tr>
                        <tr>
                            <td>Change Due</td>
                            <td>:</td>
                            <td><input type="number" name="order_change" id="order_change" class="input" /></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-2">
                                <div class="flex w-full gap-2">
                                    <button type="submit" class="btn btn-primary rounded-box font-bold w-1/2">Save</button>
                                    <a href="<?= BASEURL ?>/transaction" class="btn btn-danger rounded-box w-1/2 text-center">Cancel</a>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    //fetch data from endpoint service->getServiceData
    let servicesData = [];

    fetch('<?= BASEURL ?>/service/getServiceData/')
        .then(response => response.json())
        .then(data => {
            servicesData = data.services;
            console.log(data.services);
        });


    //add element html to put on the table body
    const btnAdd = document.getElementById('tr_detail');
    const tbody = document.querySelector('#cart tbody');

    let counter = 1;

    btnAdd.addEventListener('click', () => {
        const service = document.getElementById('services');
        const weight = parseFloat(document.getElementById('weight').value.trim());
        const notes = document.getElementById('notes').value.trim();

        const serviceValue = service.value;
        const serviceText = service.options[service.selectedIndex].text;

        if (!serviceValue || !weight) {
            alert('Pilih service dan isi berat!');
            return;
        }

        const weightInKg = weight / 1000;
        const price = getPriceById(serviceValue);
        const subtotal = price * parseFloat(weightInKg);

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${counter++}</td>
            <td>
                ${serviceText}
                <input type="hidden" name="id_service[]" value="${serviceValue}">
            </td>
            <td>
                ${weightInKg} kg
                <input type="hidden" name="qty[]" value="${weightInKg}">
            </td>
            <td>
                ${subtotal}
                <input type="hidden" name="sub_total[]" value="${subtotal}">
            </td>
            <td>
                ${notes}
                <input type="hidden" name="notes[]" value="${notes}">
            </td>
            <td><button class="btn-hapus btn btn-error">Hapus</button></td>
        `;

        //add items to table
        tbody.appendChild(row);
        updateTotal();

        // reset form input 
        document.getElementById('weight').value = '';
        document.getElementById('notes').value = '';
        service.selectedIndex = 0;

        // handle delete data from table
        row.querySelector('.btn-hapus').addEventListener('click', function() {
            row.remove();
            renumberRows();
            updateTotal();
        });
    });

    //update number row
    function renumberRows() {
        const rows = tbody.querySelectorAll('tr');
        counter = 1;
        rows.forEach(row => {
            row.children[0].textContent = counter++;
        });
    }

    //get data price by id
    function getPriceById(serviceId) {
        const service = servicesData.find(item => item.id == serviceId);
        return service ? parseFloat(service.price) : 0;
    }

    //update total from sub total tabel
    function updateTotal() {
        const rows = tbody.querySelectorAll('tr');
        let total = 0;

        rows.forEach(row => {
            const subtotalInput = row.querySelector('input[name="sub_total[]"]');
            if (subtotalInput) {
                total += parseFloat(subtotalInput.value);
            }
        });

        document.getElementById('total').textContent = total.toLocaleString('id-ID');
        document.getElementById('total_input').value = total;
    }


    //logic result input order pay - total input = order change
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