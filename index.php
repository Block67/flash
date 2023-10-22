<!DOCTYPE html>
<html lang="fr" class="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash</title>
    <link href="css/output.css" rel="stylesheet">
</head>

<body>
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

    <section class="bg-white dark:bg-gray-900">
        <div class="grid py-8 px-4 mx-auto max-w-screen-xl lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="place-self-center mr-auto lg:col-span-7">
                <h1 class="mb-4 max-w-2xl text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl dark:text-white">The Easiest way to send <span style="color: #ff7c2a;">money</span></br> anywhere in the world</h1>
                <p class="mb-6 max-w-2xl font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Send money to your family and friend and anywhere in the world using <span style="color: #ff7c2a;">bitcoin</span> through the <span style="color: #ff7c2a;">Lightning Network</span> power.</p>
                <a href="signup.php" class="inline-flex justify-center items-center py-3 px-5 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900" style="background-color: #ff7c2a;">
                    Get started
                </a>


            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="img/Frame 36.svg" alt="mockup">
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="text-center">
                <img src="img/Frame 3.svg" alt="Description de l'image" class="w-200 h-150 object-cover mx-auto" />
            </div>
        </div>
        <div class="flex justify-center">
            <a href="login.php" class="inline-flex justify-center items-center py-3 px-5 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900" style="background-color: #ff7c2a;">
                SEND
            </a>

        </div>
    </section>


    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h2 class="mb-4 text-4xl font-extrabold leading-tight text-gray-900 dark:text-white">FAQs</h2>
                <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">Find the answers to ours users' most Frequently asked questions.</p>
                <div class="flex justify-center flex-wrap gap-6">
                    <div class="faq-card">
                        <div class="question" onclick="toggleAnswer(1)">
                            <h3 class="mb-2 text-xl font-semibold dark:text-white">What is FAQ?</h3>
                            <p class="text-gray-600 dark:text-gray-300 answer" id="answer1" style="display: none;">FAQ stands for "Frequently Asked Questions". It is a compilation of common queries and their respective answers to help users understand a product or service better.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <div class="question" onclick="toggleAnswer(2)">
                            <h3 class="mb-2 text-xl font-semibold dark:text-white">How can I get started?</h3>
                            <p class="text-gray-600 dark:text-gray-300 answer" id="answer2" style="display: none;">To get started, simply sign up on our website and follow the instructions provided in the welcome email. Our support team is also available 24/7 to assist you with any questions or concerns.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <div class="question" onclick="toggleAnswer(3)">
                            <h3 class="mb-2 text-xl font-semibold dark:text-white">What payment methods do you accept?</h3>
                            <p class="text-gray-600 dark:text-gray-300 answer" id="answer3" style="display: none;">We accept various payment methods, including credit/debit cards, PayPal, and bank transfers. For more details, please visit the Payments section on our website.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <div class="question" onclick="toggleAnswer(4)">
                            <h3 class="mb-2 text-xl font-semibold dark:text-white">How secure is the platform?</h3>
                            <p class="text-gray-600 dark:text-gray-300 answer" id="answer4" style="display: none;">Our platform employs state-of-the-art security measures to ensure the safety and privacy of your data. We use industry-standard encryption protocols and regularly update our security systems to protect against potential threats.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .flex {
            display: flex;
        }

        .justify-center {
            justify-content: center;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .gap-6 {
            gap: 1.5rem;
        }

        .faq-card {
            flex: 1 1 300px;
            max-width: 300px;
        }
    </style>

    <script>
        function toggleAnswer(num) {
            var answer = document.getElementById("answer" + num);
            if (answer.style.display === "none") {
                answer.style.display = "block";
            } else {
                answer.style.display = "none";
            }
        }
    </script>



    <footer class="p-4 bg-gray-50 sm:p-6 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="https://flowbite.com" class="flex items-center">
                        <img src="img/Logo Flash.png" class="mr-3 h-8" alt="FlowBite Logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flash</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Product</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Flash</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Tailwind CSS</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <a href="#" class="hover:underline ">Github</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Discord</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#" class="hover:underline">Flash</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>

</html>