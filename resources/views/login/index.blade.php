<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Login</title>
</head>

<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden border border-gray-200">

            <!-- Tab Headers -->
            <div class="flex p-2">
                <button id="loginTab" onclick="switchTab('login')"
                    class="flex-1 py-4 text-center text-xl font-bold rounded-xl transition-all duration-300 bg-blue-600 text-white shadow-lg">
                    Login
                </button>
                <button id="registerTab" onclick="switchTab('register')"
                    class="flex-1 py-4 text-center text-xl font-bold rounded-xl transition-all duration-300 text-gray-800">
                    Register
                </button>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                <form id="authForm" class="space-y-6" method="post" action="{{route('login.store')}}">

                    <!-- Full Name (Only for Register) -->
                    <div id="nameField" class="hidden">
                        <label class="block text-xl font-semibold mb-2 text-gray-900">Full Name</label>
                        <input type="text" placeholder="Enter Your full name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-300 text-lg">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-xl font-semibold mb-2 text-gray-900">Email</label>
                        <input type="email" placeholder="Enter Your Email..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-300 text-lg">
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-xl font-semibold mb-2 text-gray-900">Password</label>
                        <input type="password" placeholder="Enter Your Password..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-300 text-lg">
                    </div>

                    <a href="#">
                        <p class="text-1xl text-blue-400 hover:bg-black-400 underline underline-offset-1 font-sans font-normal">
                            forgot password
                        </p>
                    </a>

                    <!-- Action Button -->
                    <button id="submitBtn" type="submit"
                        class="w-full bg-black text-white py-4 rounded-md text-2xl font-bold hover:bg-gray-800 transition-colors mt-4">
                        Login
                    </button>
                    <p class="text-center text-xs text-gray-400 mt-8">© 2026 To Do List. All rights reserved.</p>
                </form>
            </div>
        </div>
    </div>

    <script>
        function switchTab(type) {
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');
            const nameField = document.getElementById('nameField');
            const submitBtn = document.getElementById('submitBtn');

            if (type === 'register') {
                // Active Register Style
                registerTab.classList.add('bg-blue-600', 'text-white', 'shadow-lg');
                registerTab.classList.remove('text-gray-800');

                // Inactive Login Style
                loginTab.classList.remove('bg-blue-600', 'text-white', 'shadow-lg');
                loginTab.classList.add('text-gray-800');

                // Form Changes
                nameField.classList.remove('hidden');
                submitBtn.innerText = 'Register';
            } else {
                // Active Login Style
                loginTab.classList.add('bg-blue-600', 'text-white', 'shadow-lg');
                loginTab.classList.remove('text-gray-800');
                // Inactive Register Style
                registerTab.classList.remove('bg-blue-600', 'text-white', 'shadow-lg');
                registerTab.classList.add('text-gray-800');

                // Form Changes
                nameField.classList.add('hidden');
                submitBtn.innerText = 'Login';
            }
        }
    </script>
</body>

</html>