@extends('layouts.app')
@section('title','Dashboard')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Dashboard') }}</h2>
                    <div class="flex items-center gap-2">
                        <a href="{{ url('/index') }}" class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Bill Calculator</a>
                        @can('manage-tenants')
                            <a href="{{ route('admin.users') }}" class="inline-flex items-center px-3 py-2 bg-gray-200 dark:bg-gray-700 rounded text-xs text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">Users</a>
                            <button x-data @click="$dispatch('open-create-tenant')" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Create Tenant</button>
                        @endcan
                    </div>
                </div>
                @if (session('status'))
                    <div class="rounded-md bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('status') }}</div>
                @endif
                <p>{{ __("You're logged in!") }}</p>
                @can('manage-tenants')
                    <livewire:tenants-table />
                    <livewire:tenant-bill-history />
                @else
                    <p class="text-sm text-gray-600 dark:text-gray-400">You do not have permission to manage tenants.</p>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
