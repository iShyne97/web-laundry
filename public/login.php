<?php
session_start();
include 'config/connection.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = sha1(trim($_POST['password']));
    
    $users = query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");

    if (count($users) > 0) {
        $data_user = $users[0];
        $_SESSION['id'] = $data_user['id'];
        $_SESSION['name'] = $data_user['name'];
        $_SESSION['level'] = $data_user['id_level'];
        header("Location: dashboard.php");
    } else {
        header("Location: index.php?login=error");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/3322/3322056.png">
    <title>LOGIN UI</title>
    <link rel="stylesheet" href="../src/assets/css/style.css" />
  </head>
  <body>
    <div class="bg-slate-800 w-full h-screen flex justify-center items-center">
      <div
        class="relative p-5 min-h-[80%] w-[70%] gap-2 border-2 border-white/50 backdrop-blur-xl rounded-2xl grid lg:grid-cols-2 shadow-2xl shadow-white/30 lg:bg-transparent"
      >
        <div
          class="radial absolute bg-violet-600 w-40 h-40 rounded-full mix-blend-multiply blur-xl animate-blob opacity-70 -translate-y-1/2 right-[45%] top-1/2 lg:w-72 lg:h-72"
        ></div>
        <div
          class="radial absolute bg-yellow-600 w-40 h-40 rounded-full mix-blend-multiply blur-xl animate-blob animation-delay-2000 opacity-70 -translate-y-1/2 left-[45%] top-1/2 lg:w-72 lg:h-72"
        ></div>
        <div
          class="radial absolute bg-pink-600 w-40 h-40 rounded-full mix-blend-multiply blur-xl animate-blob animation-delay-4000 delay-[4s] opacity-70 -translate-x-1/2 -translate-y-1/2 left-1/2 top-[55%] lg:w-72 lg:h-72"
        ></div>
        <div
          class="flex flex-col justify-between login-form z-1 w-full h-full bg-slate-900/50 rounded-2xl backdrop-blur-3xl p-5 lg:bg-slate-900/0 lg:backdrop-blur-none"
        >
          <div class="h-[20%] flex flex-col justify-between">
            <h1 class="text-2xl font-bold text-white lg:text-4xl">Sign in</h1>
            <p class="text-white lg:text-lg">
              Please enter your account details
            </p>
          </div>

          <div class="h-[80%] flex flex-col justify-between pt-8">
            <div>
              <form action="" method="post">
                <div>
                  <label for="email"
                    ><span
                      class="block text-sm lg:text-lg 2xl:text-xl text-white after:content-['*'] after:text-pink-600 after:ml-0.5"
                      >Email</span
                    >
                    <input
                      type="email"
                      name="email"
                      id="email"
                      class="text-slate-900 px-3 py-2 bg-white border border-slate-200 shadow rounded w-full block text-sm placeholder:text-sm focus:outline-none focus:ring-1 focus:ring-fuchsia-500 focus:border-fuchsia-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer"
                      placeholder="your@mail"
                    />
                    <p
                      class="text-sm lg:text-lg 2xl:text-xl py-2 text-pink-700 invisible peer-invalid:visible"
                    >
                      Email tidak valid
                    </p>
                  </label>
                </div>
                <div>
                  <label for="password"
                    ><span
                      class="block text-sm lg:text-lg 2xl:text-xl text-white after:content-['*'] after:text-pink-700 after:ml-0.5"
                      >Password</span
                    >
                    <input
                      type="password"
                      name="password"
                      id="password"
                      class="text-slate-900 px-3 py-2 bg-white border border-slate-200 shadow rounded w-full block text-sm placeholder:text-sm focus:outline-none focus:ring-1 focus:ring-fuchsia-500 focus:border-fuchsia-500 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer"
                      placeholder="your password"
                    />
                    <p
                      class="text-sm lg:text-lg 2xl:text-xl text-pink-700 invisible peer-invalid:visible"
                    >
                      password tidak valid
                    </p>
                  </label>
                </div>
                <div class="flex justify-end">
                  <a href="" class="text-sm lg:text-lg 2xl:text-xl font-light text-white underline"
                    >Forgot password</a
                  >
                </div>
                <div>
                  <button
                    type="submit"
                    name="submit"
                    class="bg-fuchsia-600 w-full py-2 lg:text-lg 2xl:text-xl rounded my-5 text-white font-semibold cursor-pointer"
                  >
                    Sign in
                  </button>
                </div>
              </form>
            </div>
            <div class="flex justify-end">
              <a href="" class="text-sm lg:text-lg 2xl:text-xl font-light text-white underline"
                >Create an account</a
              >
            </div>
          </div>
        </div>
        <div
          class="content z-1 w-full h-full bg-amber-50/10 rounded-2xl hidden p-2 lg:flex items-end lg:bg-transparent"
        >
          <div
            class="bg-fuchsia-600 w-full h-[90%] rounded-2xl relative flex items-center"
          >
            <div
              class="absolute w-[85%] h-25 bg-fuchsia-600 -top-15 rounded-2xl after:content-[''] after:absolute after:w-5 after:h-5 after:-right-5 after:bottom-10 after:rounded-full after:shadow-[-10px_10px_0_#c800de] after:bg-transparent"
              after:shadow-2xl
            ></div>
            <div
              class="z-1 w-[90%] h-[105%] absolute -top-11 -translate-x-1/2 left-1/2 flex flex-col justify-between"
            >
              <div class="flex items-center gap-3">
                <img
                  class="w-8 h-8 rounded-full shadow shadow-white"
                  src="https://png.pngtree.com/png-vector/20220906/ourlarge/pngtree-logo-design-with-letter-a-and-pathway-theme-for-corporate-identity-vector-png-image_39086676.jpg"
                  alt=""
                />
                <h1
                  class="text-white text-xs tracking-widest text-shadow-lg/20 text-shadow-slate-900"
                >
                  Welcome to my application
                </h1>
              </div>
              <div
                class="bg-slate-700/40 backdrop-blur-2xl flex justify-center mx-2 rounded-xl p-2 shadow-xl"
              >
                <figure class="max-w-screen-md mx-auto text-center">
                  <svg
                    class="w-10 h-10 mx-auto mb-3 text-gray-100"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 18 14"
                  >
                    <path
                      d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"
                    />
                  </svg>
                  <blockquote>
                    <p class="text-md text-slate-50 italic font-medium">
                      "Learning to write programs stretches your mind, and helps
                      you think better, creates a way of thinking about things
                      that i think helpful in all domains."
                    </p>
                  </blockquote>
                  <figcaption
                    class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse"
                  >
                    <img
                      class="w-6 h-6 rounded-full"
                      src="https://www.gatesfoundation.org/-/media/gfo/3about/3people/ga311881_bill_gates.jpg?h=1896&iar=0&w=2371&hash=D1BBADEEF7E7BF6DD137545C0D7DEF36"
                      alt="profile picture"
                    />
                    <div
                      class="flex items-center divide-x-2 rtl:divide-x-reverse"
                    >
                      <cite class="pe-3 font-medium">Bill Gates</cite>
                      <cite class="ps-3 text-sm">Microsoft CO-Founder</cite>
                    </div>
                  </figcaption>
                </figure>
              </div>
              <div class="flex justify-end">
                <h1>
                  Design by <a href="" class="underline text-white">Agra S</a>
                </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
