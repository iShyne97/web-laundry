<div class="w-full mx-auto rounded-box border border-base-content/10 bg-base-100 shadow-lg shadow-slate-50/15 p-5">
    <div class="flex justify-between items-center my-5 p-3">
        <div class="tracking-widest font-semibold text-lg 2xl:text-2xl text-center border-b border-base-content/10 p-3">Data Customers</div>
        <a href="<?= BASEURL ?>/customer/add" class="btn btn-primary lg:text-lg 2xl:text-xl 2xl:p-6">Add Customer</a>
    </div>
    <div class="overflow-x-auto rounded-box border border-base-content/10 my-5 p-2">
        <table class="table lg:text-lg 2xl:text-xl" id="myTable">
            <!-- head -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $d) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $d['customer_name'] ?></td>
                        <td><?= $d['phone'] ?></td>
                        <td><?= $d['address'] ?></td>
                        <td>
                            <a href="<?= BASEURL ?>/customer/edit/<?= $d['id'] ?>" class="btn btn-soft btn-success md:text-xs lg:text-md 2xl:text-lg">Edit</a>
                            <a href="<?= BASEURL ?>/customer/delete/<?= $d['id'] ?>" onclick="return confirm('Are you sure ?');" class="btn btn-soft btn-error md:text-xs lg:text-md 2xl:text-lg">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>