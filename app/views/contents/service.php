<div class="w-full mx-auto rounded-box border border-base-content/10 bg-base-100 shadow-lg shadow-slate-50/15 p-5">
    <div class="flex justify-between items-center my-5 p-3">
        <div class="tracking-widest font-semibold text-lg 2xl:text-2xl text-center border-b border-base-content/10 p-3">Data Services</div>
        <a href="<?= BASEURL ?>/service/add" class="btn btn-primary lg:text-lg 2xl:text-xl 2xl:p-6">Add Service</a>
    </div>
    <div class="overflow-x-auto rounded-box border border-base-content/10 my-5 p-2">
        <table class="table lg:text-lg 2xl:text-xl" id="myTable">
            <!-- head -->
            <thead class="lg:text-lg 2xl:text-xl">
                <tr>
                    <th>No</th>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Descripton</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $d) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $d['service_name'] ?></td>
                        <td><?= $d['price'] ?></td>
                        <td><?= $d['description'] ?></td>
                        <td>
                            <a href="<?= BASEURL ?>/service/edit/<?= $d['id'] ?>" class="btn btn-soft btn-success md:text-xs lg:text-md 2xl:text-lg">Edit</a>
                            <a href="<?= BASEURL ?>/service/delete/<?= $d['id'] ?>" onclick="return confirm('Are you sure ?');" class="btn btn-soft btn-error md:text-xs lg:text-md 2xl:text-lg">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>