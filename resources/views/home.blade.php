@extends('layouts.app')

@section('content')



        <main class="flex-1 p-4 lg:p-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
                <input type="text" placeholder="Search" class="w-full  p-2 border border-gray-300 rounded-full" />
                <div class="w-8 h-8 bg-white-200 rounded-full"><img src="{{ asset('assets/img/notification.png') }}" alt=""></div>
                <div class="h-6 w-px bg-gray-300"></div>
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gray-200 rounded-full"><img src="{{ asset('assets/img/user.png') }}" alt=""></div>
                    <div class="text-right">
                        <div class="text-blue-800 font-bold ">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-500">{{ Auth::user()->role }}</div>
                    </div>
                </div>
            </div>
        </main>
@endsection
