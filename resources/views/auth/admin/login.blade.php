@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Admin Login</h1>
    @if($errors->any())
        <div class="mb-4 text-red-600">
            {{ implode('', $errors->all(':message')) }}
        </div>
    @endif
    <form action="{{ route('admin.login.post') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" class="border rounded w-full p-2" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block">Password</label>
            <input type="password" name="password" id="password" class="border rounded w-full p-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
    </form>
</div>
@endsection
