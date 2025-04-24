@extends('layouts.admin')

@section('header', 'Approved Technicians')


@section('content')
<h1 class="text-2xl font-bold mb-4">Approved Technicians</h1>

<table class="min-w-full bg-white shadow-md rounded">
    <thead class="bg-gray-100">
        <tr>
            <th class="py-2 px-4 text-left">Name</th>
            <th class="py-2 px-4 text-left">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($technicians as $technician)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $technician->name }}</td>
                <td class="py-2 px-4">{{ $technician->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
