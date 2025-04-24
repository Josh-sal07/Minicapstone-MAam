@extends('layouts.admin')

@section('title', 'Edit Customer')
@section('header', 'Edit Customer')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow max-w-xl mx-auto">
        <h2 class="text-xl font-bold mb-4">Edit Customer Information</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.users') }}"
                   class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800">Cancel</a>
                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">Update</button>
            </div>
        </form>
    </div>
@endsection
