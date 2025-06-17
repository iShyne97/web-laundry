<aside class="z-20 h-full row-span-2 col-start-1 row-start-1">
    <div
        class="flex flex-col gap-2 h-full rounded-box backdrop-blur-xl bg-white/10 border border-white/20 shadow-lg shadow-white/10">
        <div class="logo px-2 py-5 border-b border-base-300">
            <div class="avatar">
                <div class="w-3xl rounded-xl">
                    <img src="https://img.daisyui.com/images/profile/demo/yellingwoman@192.webp" />
                </div>
            </div>
            <span>Laundryku</span>
        </div>
        <ul class="menu md:w-56">
            <label class="hidden md:flex text-md tracking-wider font-light my-3">Content</label>

            <li class="my-2">
                <a href="<?= BASEURL ?>/home"
                    class="transition-all duration-300 bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%] hover:bg-[length:100%_100%] bg-left bg-no-repeat rounded hover:text-white group">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-blue-500 group-hover:text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="hidden md:flex">Dashboard</span>
                </a>
            </li>

            <label class="hidden md:flex text-md tracking-wider font-light my-3">Data</label>

            <li class="my-2">
                <details class="group relative">
                    <summary
                        class="flex justify-between items-center cursor-pointer transition-all duration-300 bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%] hover:bg-[length:100%_100%] bg-left bg-no-repeat hover:text-white">
                        <div class="flex w-full h-full items-center gap-2 group/item">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-emerald-500 group-hover/item:text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 12a3 3 0 10-6 0 3 3 0 006 0z" />
                            </svg>
                            <span class="hidden md:flex">Master Data</span>
                        </div>
                    </summary>
                    <ul
                        class="bg-base-300 rounded-lg shadow-md p-2 hidden group-open:flex flex-col absolute left-full top-0 w-40 md:left-10 md:top-full md:static md:p-2 md:mt-2 md:block md:w-[calc(100%-1rem)]">
                        <li>
                            <a href="<?= BASEURL ?>/user" class="hover:bg-base-50 p-2 rounded-md">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-indigo-500 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 12a3 3 0 10-6 0 3 3 0 006 0z" />
                                </svg>
                                User
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASEURL ?>/service" class="hover:bg-base-50 p-2 rounded-md">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-yellow-500 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Service
                            </a>
                        </li>
                    </ul>
                </details>
            </li>

            <label class="hidden md:flex text-md tracking-wider font-light my-3">Transaction</label>

            <li class="my-2">
                <details class="group relative">
                    <summary
                        class="flex justify-between items-center cursor-pointer hover:bg-base-300 rounded transition-all duration-300 bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%] hover:bg-[length:100%_100%] bg-left bg-no-repeat hover:text-white">
                        <div class="flex h-full w-full items-center gap-2 group/item">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-pink-500 group-hover/item:text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8c-1.657 0-3 1.343-3 3v4h6v-4c0-1.657-1.343-3-3-3z" />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 12h14M12 22c1.104 0 2-.896 2-2H10c0 1.104.896 2 2 2z" />
                            </svg>
                            <span class="hidden md:flex">Sales</span>
                        </div>
                    </summary>
                    <ul
                        class="bg-base-300 rounded-lg shadow-md p-2 hidden group-open:flex flex-col absolute left-full top-0 w-40 md:left-10 md:top-full md:static md:p-2 md:mt-2 md:block md:w-[calc(100%-1rem)]">
                        <li>
                            <a href="<?= BASEURL ?>/orderstart" class="hover:bg-base-50 p-2 rounded-md">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-lime-500 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 16h8M8 12h8m-8-4h8M4 6h16M4 6v12h16V6H4z" />
                                </svg>
                                Order Start
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASEURL ?>/orderdone" class="hover:bg-base-50 p-2 rounded-md">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-red-500 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                </svg>
                                Order End
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
</aside>