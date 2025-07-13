<div class="w-full h-full">
    <?php if ($data['user'] == "NotFound") : ?>
        <div class="w-screen h-full flex justify-center items-center">
            <h1 class="text-3xl">Data Not Found!</h1>
        </div>
    <?php else: ?>
        <div class=" mx-auto rounded-box border border-base-content/10 bg-base-100 shadow-lg shadow-slate-50/15 p-6">
            <div class="inline-block text-md tracking-widest font-semibold lg:text-lg 2xl:text-xl my-5 border-b border-base-content/10 py-3">ADD USER</div>
            <form action="<?= BASEURL ?><?= isset($data['user']) ? '/user/edit/' . $data['user']['id'] : '/user/add' ?>" method="post">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend lg:text-lg">Fullname</legend>
                    <label class="input validator w-full 2xl:h-12">
                        <svg class="h-[1em] 2xl:h-[1.5em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                                stroke-linejoin="round"
                                stroke-linecap="round"
                                stroke-width="2.5"
                                fill="none"
                                stroke="currentColor">
                                <!-- <rect width="20" height="16" x="2" y="4" rx="2"></rect> -->
                                <path d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                            </g>
                        </svg>
                        <input class="2xl:text-lg" type="text" placeholder="Enter your name" name="name" value="<?= isset($data['user']) ? $data['user']['name'] : "" ?>" required />
                    </label>
                    <div class="validator-hint hidden">Enter valid name</div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend lg:text-lg">Email</legend>
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
                        <input class="2xl:text-lg" type="email" placeholder="mail@site.com" name="email" value="<?= isset($data['user']) ? $data['user']['email'] : "" ?>" required />
                    </label>
                    <div class="validator-hint hidden">Enter valid email address</div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend lg:text-lg">Password</legend>
                    <label class="input validator w-full 2xl:h-12">
                        <svg class="h-[1em] 2xl:h-[1.5em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                                stroke-linejoin="round"
                                stroke-linecap="round"
                                stroke-width="2.5"
                                fill="none"
                                stroke="currentColor">
                                <!-- <rect width="20" height="16" x="2" y="4" rx="2"></rect> -->
                                <path d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z"></path>
                            </g>
                        </svg>
                        <input class="2xl:text-lg" type="password" placeholder="Enter your password" name="password" <?= !isset($data['user']) ? 'required' : '' ?> />
                    </label>
                    <?php if (isset($data['user'])) : ?>
                        <small>
                            <span class="text-pink-700">)* </span> Fill the password field if you want to change your password
                        </small>
                    <?php endif; ?>
                    <div class="validator-hint hidden">Enter valid password number</div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend lg:text-lg">Level</legend>
                    <select class="select w-full 2xl:h-12 2xl:text-lg" name="id_level" required>
                        <option disabled <?= !isset($data['user']) ? 'selected' : '' ?>>Select Level</option>
                        <?php foreach ($data['levels'] as $level) : ?>
                            <option value="<?= $level['id'] ?>"
                                <?= (isset($data['user']) && $data['user']['id_level'] == $level['id']) ? 'selected' : '' ?>>
                                <?= ucwords($level['level_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </fieldset>
                <div class="flex justify-end gap-2 my-5">
                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                    <a href="<?= BASEURL ?>/user" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>