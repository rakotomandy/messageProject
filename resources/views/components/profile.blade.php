<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Profile</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">{{ auth()->user()->name }}</h2>
        <p class="text-gray-600">{{ auth()->user()->email }}</p>
    </div>
     <div class="mt-6 flex space-x-4">
            <a href="{{ route('dashboard') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">BACK</a>
            <a href="{{ route('profile.edit') }}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition ml-4">UPDATE</a>
            <form id="logout">
                <button type="submit" class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition ml-4">Logout</button>
            </form>
        </div>
</div>