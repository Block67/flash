<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind CSS Landing Page</title>
    <meta name="description" content="Get started with a free landing page built with Tailwind CSS and the Flowbite Blocks system.">
    <link href="css/output.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 fixed top-0 w-full z-50">
        <div class="flex items-center justify-between mx-auto max-w-screen-xl">
            <div class="flex items-center">
                <a href="index.php" class="flex items-center">
                    <img src="img/Logo Flash.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flash</span>
                </a>
            </div>
            <div class="hidden lg:flex lg:items-center lg:w-auto" id="menu">
                <ul class="flex items-center font-medium space-x-8">
                    <li>
                        <a href="index.php" class="text-primary-700 dark:text-white" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 hover:text-primary-700 dark:text-gray-400 dark:hover:text-white">Testinomie</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 hover:text-primary-700 dark:text-gray-400 dark:hover:text-white">FAQs</a>
                    </li>
                </ul>
            </div>
            <div class="hidden lg:flex lg:items-center lg:w-auto">
                <a href="login.php" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                <a href="signup.php" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Get started</a>
            </div>
            <div class="lg:hidden">
                <button data-collapse-toggle="mobile-menu" type="button" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:text-gray-300" aria-controls="mobile-menu" aria-expanded="false">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden" id="mobile-menu">
            <ul class="flex flex-col mt-4 font-medium">
                <li>
                    <a href="index.php" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">Testinomie</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">FAQs</a>
                </li>
                <li>
                    <a href="login.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">Log in</a>
                </li>
                <li>
                    <a href="signup.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50">Get started</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
    </br></br></br>
    <div class="mx-auto max-w-screen-md py-8 px-4 sm:px-6 lg:px-8 flex flex-col items-center sm:flex-row justify-between">
        <div class="w-full sm:w-1/2 mx-auto px-2 sm:px-0">
            <h6 class="text-2xl font-semibold text-gray-900 dark:text-white text-center sm:text-left">WELCOME!</h6>
            <p class="text-gray-700 dark:text-gray-300 text-center sm:text-left mb-6">Register to the simplest way to
                send money anywhere through <span style="color: #ff7c2a;">₿itcoin</span></p>
            <div class="bg-white shadow-md rounded-lg px-8 py-6">
                <form method="post" action="./signup_endpoint.php">
                    <div class="mb-6">
                        <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                        <input type="text" name="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email"  name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required>
                    </div>
                    <div class="mb-6">
                        <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number</label>
                        <input type="number"  name="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your phone number" required>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input type="password"  name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <input class="w-full px-8 py-2 rounded-lg font-medium bg-orange-500 text-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-orange-400 hover:bg-orange-600 transition-all duration-300 ease-in-out" type="submit" value="S'inscrire" name="signup" />
                </form>

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>

</html>