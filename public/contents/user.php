<?php
$users = query("SELECT user.*, level.level_name AS level
                        FROM user
                        JOIN level ON user.id_level = level.id
                        ORDER BY user.id DESC");


$id = isset($_GET['delete']) ? $_GET['delete'] : null;

if (!is_null($id)) {
    if (cud("DELETE FROM user WHERE id=$id")) {
        header('Location: ?page=user&status=deleted');
    } else {
        header('Location: ?page=user&status=failed');
    }
}
?>
<div class="w-full mx-auto">
        <div class="text-3xl text-center my-5 rounded-lg border py-3">Data Users</div>
        <div class="flex justify-end my-5">
            <a href="?page=manage-user" class="btn btn-primary lg:text-lg 2xl:text-xl">Add User</a>
        </div>
        <div class="overflow-x-auto rounded-box border border-base-content/10 bg-base-100 shadow-xl shadow-slate-50/20 my-5 p-2">
            <table class="table lg:text-lg 2xl:text-xl" id="table">
            <!-- head -->
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $user) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['level'] ?></td>
                    <td>
                        <a href="?page=manage-user&edit=<?= $user['id']?>" class="btn btn-soft btn-success md:text-xs lg:text-md 2xl:text-lg">Edit</a>
                        <a href="?page=user&delete=<?= $user['id']?>" onclick="return confirm('Are you sure ?');" class="btn btn-soft btn-error md:text-xs lg:text-md 2xl:text-lg">Delete</a>
                    </td>
                </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
        </div>
    </div>