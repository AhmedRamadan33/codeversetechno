<x-admin-layout title="Edit Milestone">
    <form method="POST" action="{{ route('admin.milestones.update', $milestone) }}">
        @csrf
        @method('PUT')
        @include('admin.milestones._form')
    </form>
</x-admin-layout>
