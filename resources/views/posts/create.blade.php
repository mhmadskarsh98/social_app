<x-front-layout>

<h3> Create post</h3>
<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
 @include('posts._form')
</form>

</x-front-layout>


