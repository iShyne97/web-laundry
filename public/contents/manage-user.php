<?php
$id_user = isset($_GET['edit']) ? $_GET['edit'] : null;
$data_user = !is_null($id_user) ? query("SELECT * FROM user WHERE id='$id_user'")[0] : 0;

$levels = query("SELECT * FROM level");

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $level = htmlspecialchars($_POST['id_level']);
    $password = isset($_POST['password']) ? htmlspecialchars(sha1($_POST['password'])) : $data_user['password'];

    if ($data_user > 0) {
        if (cud("UPDATE user SET id_level='$level', name='$name', email='$email', password='$password' WHERE id='$id_user'") > 0) {
            header('Location:?page=user&edit=succeeded');
        } else {
            header('Location:?page=user&edit=failed');
        }
    } else {
        if (cud("INSERT INTO user(id_level, name, email, password) VALUES ('$level','$name','$email','$password')") > 0) {
            header('Location:?page=user&add=succeeded');
        } else {
            header('Location:?page=user&add=failed');
        }
    }
}
?>
<div class="w-full mx-auto">
        <div class="text-md font-bold lg:text-lg 2xl:text-xl text-center my-5 rounded-lg border py-3">Form User</div>
        <div class="w-[80%] lg:w-2/3 2xl:w-1/3 mx-auto rounded-box border border-base-content/10 bg-base-100 shadow-xl shadow-slate-50/20 my-7 p-2">
            <form action="" method="post">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Fullname</legend>
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor"
                            >
                            <!-- <rect width="20" height="16" x="2" y="4" rx="2"></rect> -->
                            <path d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                            </g>
                        </svg>
                        <input type="text" placeholder="Enter your name" name="name" value="<?= isset($_GET['edit']) ? $data_user['name'] : "" ?>" required/>
                    </label>
                    <div class="validator-hint hidden">Enter valid name</div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Email</legend>
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor"
                            >
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </g>
                        </svg>
                        <input type="email" placeholder="mail@site.com" name="email" value="<?= isset($_GET['edit']) ? $data_user['email'] : "" ?>" required/>
                    </label>
                    <div class="validator-hint hidden">Enter valid email address</div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Password</legend>
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor"
                            >
                            <!-- <rect width="20" height="16" x="2" y="4" rx="2"></rect> -->
                            <path d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z"></path>
                            </g>
                        </svg>
                        <input type="password" placeholder="Enter your password" name="password" value="<?= isset($_GET['edit']) ? $data_user['password'] : "" ?>" required />
                    </label>
                    <div class="validator-hint hidden">Enter valid NRP number</div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Level</legend>
                    <select class="select w-full" name="id_level" required>
                        <option disabled <?= !isset($_GET['edit']) ? 'selected' : '' ?>>Select Level</option>
                        <?php foreach ($levels as $level) : ?>
                            <option value="<?= $level['id'] ?>"
                            <?= (isset($_GET['edit']) && $data_user['id_level'] == $level['id']) ? 'selected' : '' ?>>
                            <?= ucfirst($level['level_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </fieldset>
                <div class="flex justify-end my-5">
                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>