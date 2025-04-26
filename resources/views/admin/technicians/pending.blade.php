@extends('layouts.admin') {{-- Or your main admin layout --}}

@section('header', 'Pending Technician Applications')

@section('content')

<table class="min-w-full bg-white shadow-md rounded">
    <thead class="bg-gray-100">
        <tr>
            <th class="py-2 px-4 text-left">Name</th>
            <th class="py-2 px-4 text-left">Email</th>
            <th class="py-2 px-4 text-left">Skills</th>
            <th class="py-2 px-4 text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $application)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $application->user->name }}</td>
                <td class="py-2 px-4">{{ $application->user->email }}</td>
                <td class="py-2 px-4">{{ $application->skills }}</td>
                <td class="py-2 px-4">
                    @if($application->status == 'pending')
                    <form action="{{ route('admin.technicians.approve', $application->id) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                    </form>

                    <form action="{{ route('admin.technicians.reject', $application->id) }}" method="POST" class="inline-block ml-2">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">Reject</button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
    