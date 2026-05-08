<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>login</title>
</head>

<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden border border-gray-200">

            <!-- Tab Headers -->
            <div class="flex p-2 justify-items-center items-center">
                <a href="{{route('login')}}">
                    <button
                        class="flex-1 px-18 py-5 justify-items-center items-center text-center text-xl font-bold rounded-xl transition-all duration-300 bg-blue-600 text-white shadow-lg">
                        Login
                    </button>
                </a>

                <a href="{{route('register')}}">
                    <button
                        class="flex-1 px-18 py-5 justify-items-center items-center text-center text-xl font-bold rounded-xl transition-all duration-300 text-gray-800">
                        Register
                    </button>
                </a>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                <form id="authForm" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-xl font-semibold mb-2 text-gray-900">Email</label>
                        <input type="email" name="email" placeholder="Enter Your Email..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-300 text-lg">
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-xl font-semibold mb-2 text-gray-900">Password</label>
                        <input type="password" name="password" placeholder="Enter Your Password..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-300 text-lg">
                    </div>

                    <!-- Action Button -->
                    <button id="submitBtn" type="submit"
                        class="w-full bg-black text-white py-4 rounded-md text-2xl font-bold hover:bg-gray-800 transition-colors mt-4">
                        Login
                    </button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>