<aside id="sidebar"
  class="fixed md:relative inset-y-0 left-0 z-30 w-64 lg:w-82 xl:w-102 2xl:w-112 
         bg-white/10 backdrop-blur-md shadow-lg 
         p-4 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out 
         flex flex-col justify-between">

    <ul class="menu space-y-2 w-full tracking-wider text-lg lg:text-xl 2xl:text-2xl">

      <!-- Master Data -->
      <li class="my-2">
        <details class="group">
          <summary
            class="flex items-center gap-2 p-2 rounded-md transition-all duration-300
                  bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%]
                  hover:bg-[length:100%_100%] bg-left bg-no-repeat text-base-content hover:text-white cursor-pointer">
            <img src="https://cdn-icons-png.flaticon.com/512/595/595067.png" class="w-5 h-5" alt="Master Data Icon" />
            Master Data
          </summary>
          <ul
            class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out group-open:max-h-[500px] pl-4 space-y-1 text-base lg:text-lg 2xl:text-xl">
            <li>
              <a href="?page=user"
                class="sidebar-link my-2 flex items-center gap-2 rounded-md p-2 transition-all duration-300 
                      bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%] 
                      hover:bg-[length:100%_100%] bg-left bg-no-repeat text-base-content hover:text-white">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="w-4 h-4" alt="User Icon" />
                User
              </a>
            </li>
            <li>
              <a href="?page=service"
                class="my-2 flex items-center gap-2 rounded-md p-2 transition-all duration-300 
                      bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%] 
                      hover:bg-[length:100%_100%] bg-left bg-no-repeat text-base-content hover:text-white">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828643.png" class="w-4 h-4" alt="Services Icon" />
                Services
              </a>
            </li>
          </ul>
        </details>
      </li>

      <!-- Transaction -->
      <li class="my-2">
        <details class="group">
          <summary
            class="flex items-center gap-2 p-2 rounded-md transition-all duration-300
                  bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%]
                  hover:bg-[length:100%_100%] bg-left bg-no-repeat text-base-content hover:text-white cursor-pointer">
            <img src="https://cdn-icons-png.flaticon.com/512/1261/1261163.png" class="w-5 h-5" alt="Transaction Icon" />
            Transaction
          </summary>
          <ul
            class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out group-open:max-h-[500px] pl-4 space-y-1 text-base lg:text-lg 2xl:text-xl">
            <li>
              <a href="?page=order"
                class="sidebar-link my-2 flex items-center gap-2 rounded-md p-2 transition-all duration-300 
                      bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%] 
                      hover:bg-[length:100%_100%] bg-left bg-no-repeat text-base-content hover:text-white">
                <img src="https://cdn-icons-png.flaticon.com/512/3144/3144456.png" class="w-4 h-4" alt="Order Icon" />
                Order
              </a>
            </li>
            <li>
              <a href="?page=pick-up"
                class="sidebar-link my-2 flex items-center gap-2 rounded-md p-2 transition-all duration-300 
                      bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%] 
                      hover:bg-[length:100%_100%] bg-left bg-no-repeat text-base-content hover:text-white">
                <img src="https://cdn-icons-png.flaticon.com/512/891/891419.png" class="w-4 h-4" alt="Pickup Icon" />
                Pick Up
              </a>
            </li>
          </ul>
        </details>
      </li>

      <!-- Settings -->
      <li>
        <a href="?page=settings"
          class="sidebar-link my-2 flex items-center gap-2 rounded-md p-2 transition-all duration-300 
                bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 bg-[length:0%_100%] 
                hover:bg-[length:100%_100%] bg-left bg-no-repeat text-base-content hover:text-white">
          <img src="https://cdn-icons-png.flaticon.com/512/2099/2099058.png" class="w-5 h-5" alt="Settings Icon" />
          Settings
        </a>
      </li>
    </ul>
</aside>
