
<x-front-layout>

<h3> edit post </h3>
<form action="{{route('posts.update',['post'=>$posts->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('posts._form')

</form>


</x-front-layout>


