@extends('layout.main')

@section('title')
<title>Login</title>
@endsection

@section('body')

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-200 px-4">

    <!-- Card -->
    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl border border-gray-100 p-10">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <div class="h-14 w-14 bg-blue-600 rounded-xl flex items-center justify-center shadow-md">
                <span class="text-white font-bold text-2xl">A</span>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-center text-gray-900 mb-2">
            Welcome Back
        </h2>
        <p class="text-center text-gray-500 mb-8">
            Sign in to continue to your dashboard
        </p>

        <!-- Form -->
        <form action="/login" method="POST" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input 
                    type="text"
                    name="email"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="you@example.com"
                />
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input 
                    type="password"
                    name="password"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="••••••••"
                />
            </div>

            <!-- Forgot password -->
            <div class="flex justify-end">
                <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
            </div>

            <!-- Login button -->
            <button 
                type="submit"
                class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold shadow-lg transition transform hover:-translate-y-0.5">
                Sign In
            </button>
        </form>
    </div>
</div>

@endsection
