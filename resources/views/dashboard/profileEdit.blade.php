@extends('layouts.layout')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <form action="{{ route('profile.update') }}" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md" method="POST">
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>
        <input type="text" class="border border-gray-300 rounded-lg p-2 w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" name="name" placeholder="Name" value="{{ auth()->user()->name }}">
        <input type="email" class="border border-gray-300 rounded-lg p-2 w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" name="email" placeholder="Email" value="{{ auth()->user()->email }}">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Update</button>
        <a href="{{ route('profile') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">Cancel</a>
    </form>
</div>
@endsection