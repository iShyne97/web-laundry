<div class="w-full h-full">

    <div class=" mx-auto rounded-box border border-base-content/10 bg-base-100 shadow-lg shadow-slate-50/15 p-6">
        <div class="inline-block text-md tracking-widest font-semibold lg:text-lg 2xl:text-xl my-5 border-b border-base-content/10 py-3">ADD SERVICE</div>
        <form action="<?= BASEURL ?><?= isset($data['service']) ? '/service/edit/' . $data['service']['id'] : '/service/add' ?>" method="post">
            <fieldset class="fieldset">
                <legend class="fieldset-legend lg:text-lg">Service Name</legend>
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
                    <input class="2xl:text-lg" type="text" placeholder="Create service name" name="service_name" value="<?= isset($data['service']) ? $data['service']['service_name'] : "" ?>" required />
                </label>
                <div class="validator-hint hidden">Please enter a valid service name</div>
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend lg:text-lg">Price</legend>
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
                    <input class="2xl:text-lg" type="number" placeholder="Put the price" name="price" value="<?= isset($data['service']) ? $data['service']['price'] : "" ?>" required />
                </label>
                <div class="validator-hint hidden">Please enter a valid number</div>
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend lg:text-lg">Description</legend>
                <textarea class="textarea h-24 2xl:text-lg w-full" placeholder="Description" name="description"><?= isset($data['service']) ? $data['service']['description'] : '' ?></textarea>
            </fieldset>
            <div class=" flex justify-end gap-2 my-5">
                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                <a href="<?= BASEURL ?>/service" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>