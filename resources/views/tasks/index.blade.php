@vite(['resources/css/app.css', 'resources/js/app.js'])
<div>
    <div class="flex justify-between align-items-center ml-6 mr-6 mt-6">
        <h1 class="text-3xl font-bold text-gray-800">My Tasks</h1>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Task
        </button>
    </div>
    <div>
        <div class="ml-6 mr-6 mt-4">
            <form class="mb-4 flex items-center gap-2">

                <input
                    type="text"
                    name="search"
                    placeholder="Search task..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg 
               focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-200 shadow-lg transition duration-300 ease-in-out mr-10">

                <select name="status" id="status" class="w-[420px] px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-500 shadow-lg transition duration-300 ease-in-out">
                    <option value="">All Status</option>
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>


                </select>

            </form>
        </div>
    </div>
</div>