<?php
if (empty($_SESSION['name']) and empty($_SESSION['id'])) {
    header("location:index.php?access=failed");
} else {
    // $name = $_SESSION['name'];
    // $id = $_SESSION['id'];
}
?>
<header class="navbar bg-white/10 backdrop-blur-md shadow-md z-10 p-5">
    <div class="flex-none md:hidden">
        <button id="toggleSidebar" class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        </button>
    </div>
    <div class="flex-1">
        <a href="?page=home" class="btn btn-ghost md:text-lg 2xl:text-xl hover:bg-transparent hover:text-inherit hover:shadow-none hover:border-none">
            <img
`              class="w-8 h-8 rounded-full shadow shadow-white"
               src="https://png.pngtree.com/png-vector/20220906/ourlarge/pngtree-logo-design-with-letter-a-and-pathway-theme-for-corporate-identity-vector-png-image_39086676.jpg"
               alt=""
            />
            <h1
              class="tracking-widest text-shadow-lg/20 text-shadow-slate-900"
                >
              Welcome to Laundryku
            </h1>
        </a>
    </div>

    <div class="flex-none flex gap-3 items-center">
        <div class="">
            <label class="swap swap-rotate cursor-pointer items-center">
                <!-- Checkbox -->
                <input type="checkbox" id="themeToggle" class="hidden" />

                <!-- Ikon -->
                <!-- Light mode icon -->
                <svg class="swap-off w-8 h-8 md:w-10 md:h-10 2xl:w-12 2xl:h-12 text-yellow-500 bg-base-200 rounded-full p-1 shadow transition duration-300"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 3v1m0 16v1m8.485-8.485h-1M4.515 12H3.5m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                </svg>

                <!-- Dark mode icon -->
                <svg class="swap-on w-8 h-8 md:w-10 md:h-10 2xl:w-12 2xl:h-12 text-blue-300 bg-base-300 rounded-full p-1 shadow transition duration-300"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
                </svg>
            </label>
        </div>
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="w-full h-full p-2 btn btn-ghost normal-case px-2 flex items-center gap-">
            <!-- Foto Profil -->
            <div class="avatar">
                <div class="w-8 md:w-10 md:h-10 2xl:w-12 2xl:h-12 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2 mr-2">
                <img src="https://i.pravatar.cc/300" alt="Profile" />
                </div>
            </div>

            <!-- Username -->
            <span class="hidden md:inline md:text-md 2xl:text-lg text-base-content font-medium"><?= ucfirst($_SESSION['name']) ?></span>

            <!-- Icon Panah Bawah -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 md:w-6 md:h-6 fill-current text-base-content" viewBox="0 0 20 20">
                <path d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.1 1.02l-4.25 4.5a.75.75 0 01-1.1 0L5.21 8.27a.75.75 0 01.02-1.06z" />
            </svg>
            </div>

            <!-- Dropdown Menu -->
            <ul tabindex="0"
                class="mt-3 z-50 p-2 shadow-lg menu menu-sm dropdown-content bg-base-100 text-base-content rounded-full w-48 border border-base-300 md:w-56">
            <li>
                <a href="signout.php" class="flex items-center gap-2 text-red-600 hover:text-red-700 w-full px-3 py-2 rounded-md md:text-lg">
                <!-- Icon Logout -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-8 md:h-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                </svg>
                Sign out
                </a>
            </li>
            </ul>
        </div>
    </div>
</header>