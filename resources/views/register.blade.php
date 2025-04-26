<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-sky-200 ">
    <div class="flex items-center justify-center m-auto h-screen">

        <div class="bg-white rounded-xl max-w-2xl w-full flex items-center justify-center p-4">
            <form action="" method="post" class="max-w-xl w-full">
                <div class="grid grid-flow-row-dense grid-cols-3 ">
                    <h1 class="col-span-2 text-2xl flex items-center font-bold">Sign up as Administrator</h1>
                    <img src="{{ asset('assets/logo_tb.jpg') }}" alt="Logo" class=" h-auto max-w-full mx-auto">
                </div>

                <div class="mb-5">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Your username</label>
                    <input type="text" id="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="username" required />
                </div>

                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                    <input type="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="admin@sarpras.com" required />
                </div>

                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                    <input type="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>

                <div class="flex flex-col">
                    <button type="submit"
                        class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                    <a href="/api/login" class="text-center text-blue-600 hover:underline text-sm">
                        Already have an account? Login
                    </a>
                </div>
            </form>
        </div>


    </div>
    <script src="index.js"></script>
</body>

</html>
