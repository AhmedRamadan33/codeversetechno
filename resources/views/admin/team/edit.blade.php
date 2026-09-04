<x-admin-layout title="Edit Team Member">
    <form method="POST" action="{{ route('admin.team.update', $member) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.team._form')
    </form>
</x-admin-layout>
