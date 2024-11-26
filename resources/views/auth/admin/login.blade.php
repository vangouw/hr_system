@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-center mb-6">Admin Login</h1>
        
        @if($errors->any())
            <div class="mb-4 text-red-600 text-center">
                {{ implode('', $errors->all(':message')) }}
            </div>
        @endif
        
        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="border border-gray-300 rounded w-full p-2 mt-1 focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="border border-gray-300 rounded w-full p-2 mt-1 focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition-colors duration-300">
                Login
            </button>
        </form>
        
        <!-- Registration link -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('admin.register') }}" class="text-blue-500 hover:underline">Register</a>
            </p>
        </div>
    </div>
</div>
@endsection
