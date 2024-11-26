<nav class="bg-gray-800 text-white shadow-lg">
    <div class="container mx-auto px-4 flex justify-between items-center py-3">
        <div>
            <a href="/" class="text-lg font-semibold text-white">Absen</a>
        </div>
        <div class="flex items-center space-x-4">
            @if(Auth::guard('admin')->check())
                <a href="{{ route('welcome') }}" class="text-white-400 hover:text-blue-500 transition">to absen</a>
                <a href="{{ route('absenteeism.index') }}" class="text-white-400 hover:text-blue-500 transition">Karyawan</a>
                <a href="{{ route('clock.records.index') }}" class="text-white-400 hover:text-blue-500 transition">Clock Records</a>
                <span class="text-sm">Welcome, {{ Auth::guard('admin')->user()->name }}</span>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="text-blue-400 hover:text-blue-500 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('admin.login') }}" class="text-blue-400 hover:text-blue-500 transition">Login</a>
                <span class="mx-2 text-white">|</span>
                <a href="{{ route('admin.register') }}" class="text-blue-400 hover:text-blue-500 transition">Register</a>
            @endif
        </div>
    </div>
</nav>
