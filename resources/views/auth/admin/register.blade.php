@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-gray-50 shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-center mb-6">Admin Register</h1>
        
        <form action="{{ route('admin.register.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="border border-gray-300 rounded w-full p-2 mt-1 focus:ring-2 focus:ring-green-500" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="border border-gray-300 rounded w-full p-2 mt-1 focus:ring-2 focus:ring-green-500" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="border border-gray-300 rounded w-full p-2 mt-1 focus:ring-2 focus:ring-green-500" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 rounded w-full p-2 mt-1 focus:ring-2 focus:ring-green-500" required>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition-colors duration-300">
                Register
            </button>
        </form>

        <!-- Login link -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                Already have an account? 
                <a href="{{ route('admin.login') }}" class="text-green-500 hover:underline">Login</a>
            </p>
        </div>
    </div>
</div>
@endsection
