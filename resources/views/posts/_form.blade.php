{{-- @if($errors->any())
    <div class="alert-danger">
        @foreach ($errors->all() as $error)
            <p> {{$error}}</p>
        @endforeach

    </div>
@endif --}}


<div class="form-group">
     <label for="" class="form-label" >Post</label>
    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="10" >{{old('content',$posts->content)}}</textarea>
    @error('content')
    <p class="invalid-feedback">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="" class="form-label" >Image</label>
    <input type="file" class="form-control @error('media') is-invalid @enderror" name="media"  >
   @error('media')
   <p class="invalid-feedback">{{$message}}</p>
   @enderror
</div>
<button type="submit" class="btn btn-primary"> Save post </button>


