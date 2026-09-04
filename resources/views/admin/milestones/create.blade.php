<x-admin-layout title="Add Milestone">
    <form method="POST" action="{{ route('admin.milestones.store') }}">
        @csrf
        @include('admin.milestones._form')
    </form>
</x-admin-layout>
