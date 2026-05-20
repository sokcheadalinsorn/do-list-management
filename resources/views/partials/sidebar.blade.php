<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sidebar</title>
    <style>
        .nav-item {
            color: #111827;
        }

        .nav-item:hover {
            background-color: #eff6ff;
            color: #0051ff;
        }

        .nav-item.active-nav {
            background-color: #dbeafe;
            color: #003ec5;
        }
    </style>
</head>

<body>

    <div class="w-[250px] h-screen fixed top-0 left-0 bg-white border-r border-gray-100 shadow-sm flex flex-col p-3">

        <!-- Logo -->
        <div class="flex items-center gap-3 mb-3">
            <div class="shrink-0">
                <!-- Hamburger icon -->
                <svg class="w-10 h-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                </svg>
            </div>
            <div>
                <h4 class="text-base font-bold text-gray-900 leading-tight">To-Do</h4>
                <p class="text-xs text-gray-400">To Do List Management</p>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-b border-gray-200 mb-2"></div>

        <!-- Nav -->
        <nav class="flex-1 flex flex-col gap-0.5 py-2">

            <!-- Dashboard -->
            <a href="/dashboard"
                class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium no-underline transition {{ request()->is('dashboard') ? 'active-nav' : '' }}">
                <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                </svg>
                Dashboard
            </a>

            <!-- My Task -->
            <a href="/tasks"
                class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium no-underline transition {{ request()->is('tasks*') ? 'active-nav' : '' }}">
                <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                </svg>
                My Task
            </a>

            <!-- Completed -->
            <a href="/completed"
                class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium no-underline transition {{ request()->is('completed*') ? 'active-nav' : '' }}">
                <svg class="w-5 h-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Completed
            </a>


        </nav>

        <!-- Divider -->
        <div class="border-b border-gray-200 mb-2"></div>

        <!-- Profile + Logout -->
    <div class="px-2 py-2">
        <div class="flex items-center gap-3 mb-2">
        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center shrink-0">
            <span class="text-sm font-semibold text-gray-600">
                {{ strtoupper(substr(auth()->user()->full_name ?? 'A', 0, 1)) }}{{ strtoupper(substr(explode(' ', auth()->user()->full_name ?? 'A U')[1] ?? '', 0, 1)) }}
            </span>
        </div>
        <div class="overflow-hidden">
            <p class="text-sm font-semibold text-gray-800 truncate">{{ auth()->user()->full_name ?? 'Admin User' }}</p>
            <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email ?? 'admin@example.com' }}</p>
        </div>
    </div>
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit"
        class="flex items-center gap-1 w-full px-2 py-2 mt-1 text-sm text-red-500 hover:bg-red-50 rounded-lg transition-colors duration-150">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
        </svg>
        Logout
    </button>
</form>
</div>
    </div>

</body>

</html>