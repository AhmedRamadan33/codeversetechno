<x-admin-layout title="Add Team Member">
    <form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.team._form')
    </form>
</x-admin-layout>
