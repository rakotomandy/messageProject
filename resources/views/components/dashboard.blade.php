<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Welcome to your dashboard!</h2>
        <p class="text-gray-600">Here you can manage your account, view your activity, and access exclusive features.</p>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('profile') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">View Profile</a>
            <a href="#" class="inline-block bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition ml-4">Settings</a>
            <form id="logout">
                <button type="submit" class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition ml-4">Logout</button>
            </form>

        </div>
    </div>
</div>
