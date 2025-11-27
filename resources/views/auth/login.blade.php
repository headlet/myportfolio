@extends('layout.frontend.master')

@section('title')
<title>Login</title>
@endsection

@section('contents')

<div class="min-h-screen flex items-center justify-center bg-transparent">

    <!-- Card -->
    <div class="bg-white/20 backdrop-blur-2xl w-full max-w-md rounded-3xl shadow-xl border border-gray-200 p-10 relative overflow-hidden text-blue-600">
        <div class="">
            <a href="{{route('index')}}" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold
                       shadow-md transition transform hover:-translate-y-0.5 active:scale-95">Back</a>
        </div>
        <!-- Subtle background decoration -->
        <div class="absolute -top-6 -right-6 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl"></div>

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <div class="h-16 w-16 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                <span class="text-white font-bold text-3xl">A</span>
            </div>
        </div>



        <!-- Title -->
        <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-1">
            Welcome Back
        </h2>
        <p class="text-center text-gray-500 mb-8 text-sm">
            Login to access your dashboard
        </p>

        <!-- Form -->
        <form action="/login" method="POST" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-semibold mb-1 font-bold">Email</label>
                <input
                    type="text"
                    name="email"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    placeholder="you@example.com" />
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-semibold font-bold mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    placeholder="••••••••" />
            </div>

            <!-- Forgot password -->
            <div class="flex justify-end">
                <a href="#" class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
                    Forgot password?
                </a>
            </div>

            <!-- Login button -->
            <button
                type="submit"
                class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold
                       shadow-md transition transform hover:-translate-y-0.5 active:scale-95">
                Sign In
            </button>

        </form>
    </div>
</div>

@endsection