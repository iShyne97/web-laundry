<!DOCTYPE html>
<html lang="en" data-theme="light" id="htmlRoot">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/style.css" />
</head>

<body>
    <div class="w-full h-screen grid grid-cols-[auto_1fr] grid-rows-[auto_1fr]">

        <?php Notification::notif(); ?>
        <header
            class="col-start-2 bg-base-100 text-base-content h-min shadow-sm shadow-white/10 light:shadow-slate-900/30 dark:shadow-slate-300/30 z-10">
            <div class="flex justify-between items-center p-2">
                <!-- <div
            class="radial absolute bg-violet-600 w-40 h-40 rounded-full mix-blend-multiply blur-xl animate-blob opacity-70 -translate-y-1/2 right-[45%] top-1/2 lg:w-72 lg:h-72"
          ></div>
          <div
            class="radial absolute bg-yellow-600 w-40 h-40 rounded-full mix-blend-multiply blur-xl animate-blob animation-delay-2000 opacity-70 -translate-y-1/2 left-[45%] top-1/2 lg:w-72 lg:h-72"
          ></div>
          <div
            class="radial absolute bg-pink-600 w-40 h-40 rounded-full mix-blend-multiply blur-xl animate-blob animation-delay-4000 delay-[4s] opacity-70 -translate-x-1/2 -translate-y-1/2 left-1/2 top-[55%] lg:w-72 lg:h-72"
          ></div> -->
                <label class="input">
                    <input type="search" required placeholder="Search" />
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </g>
                    </svg>
                </label>
                <div class="flex-none flex gap-3 items-center">
                    <div
                        class="hover:scale-110 hover:rotate-360 transition-all duration-500">
                        <label class="swap swap-rotate cursor-pointer items-center">
                            <!-- Checkbox -->
                            <input type="checkbox" id="themeToggle" class="hidden" />

                            <!-- Ikon -->
                            <!-- Light mode icon -->
                            <svg
                                class="swap-off w-8 h-8 text-yellow-500 bg-base-200 rounded-full p-1 shadow transition duration-300 scale-100 rotate-0 dark:scale-90 dark:rotate-12"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 3v1m0 16v1m8.485-8.485h-1M4.515 12H3.5m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                            </svg>

                            <!-- Dark mode icon -->
                            <svg
                                class="swap-on w-8 h-8 text-blue-300 bg-base-300 rounded-full p-1 shadow transition duration-300"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
                            </svg>
                        </label>
                    </div>
                    <div class="dropdown dropdown-end">
                        <div
                            tabindex="0"
                            role="button"
                            class="w-full h-full p-2 btn btn-ghost normal-case px-2 flex items-center gap-2 rounded-full transition-all duration-300 bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%] hover:bg-[length:100%_100%] bg-left bg-no-repeat text-base-content hover:text-white cursor-pointer group">
                            <!-- Foto Profil -->
                            <div class="avatar">
                                <div
                                    class="w-8 md:w-10 md:h-10 rounded-full ring ring-fuchsia-600 ring-offset-base-100 ring-offset-2 mr-2 group-hover:ring-white group-hover:ring-offset-indigo-300">
                                    <img src="https://i.pravatar.cc/300" alt="Profile" />
                                </div>
                            </div>

                            <!-- Username -->
                            <span
                                class="hidden md:inline md:text-md text-base-content/60 group-hover:text-white"><?= isset($_SESSION['user']['name']) ? ucwords($_SESSION['user']['name']) : 'Anonymous' ?></span>

                            <!-- Icon Panah Bawah -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 md:w-6 md:h-6 fill-current text-base"
                                viewBox="0 0 20 20">
                                <path
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.1 1.02l-4.25 4.5a.75.75 0 01-1.1 0L5.21 8.27a.75.75 0 01.02-1.06z" />
                            </svg>
                        </div>

                        <!-- Dropdown Menu -->
                        <ul
                            tabindex="0"
                            class="mt-3 z-50 p-2 shadow-lg menu menu-sm dropdown-content bg-base-100 rounded-box w-44 border border-base-300">
                            <li>
                                <a
                                    href="<?= BASEURL ?>/Auth/logout"
                                    class="flex items-center gap-2 text-red-600 hover:text-red-700 w-full px-3 py-2 rounded-md">
                                    <!-- Icon Logout -->
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                                    </svg>
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>