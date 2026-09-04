<x-admin-layout title="Edit Testimonial">
    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.testimonials._form')
    </form>
</x-admin-layout>
