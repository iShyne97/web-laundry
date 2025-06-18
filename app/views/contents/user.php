<div class="w-full mx-auto rounded-box border border-base-content/10 bg-base-100 shadow-lg shadow-slate-50/15 p-5">
    <div class="flex justify-between items-center my-5 p-3">
        <div class="tracking-widest font-semibold text-lg 2xl:text-2xl text-center border-b border-base-content/10 p-3">Data Users</div>
        <a href="<?= BASEURL ?>/user/add" class="btn btn-primary lg:text-lg 2xl:text-xl 2xl:p-6">Add User</a>
    </div>
    <div class="overflow-x-auto rounded-box border border-base-content/10 my-5 p-2">
        <table class="table lg:text-lg 2xl:text-xl" id="myTable">
            <!-- head -->
            <thead class="lg:text-lg 2xl:text-xl">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $d) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $d['name'] ?></td>
                        <td><?= $d['email'] ?></td>
                        <td><?= $d['level'] ?></td>
                        <td>
                            <a href="<?= BASEURL ?>/user/edit/<?= $d['id'] ?>" class="btn btn-soft btn-success md:text-xs lg:text-md 2xl:text-lg">Edit</a>
                            <a href="<?= BASEURL ?>/user/delete/<?= $d['id'] ?>" onclick="return confirm('Are you sure ?');" class="btn btn-soft btn-error md:text-xs lg:text-md 2xl:text-lg">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>