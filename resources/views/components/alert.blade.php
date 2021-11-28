    @if (session()->has('stauts'))
        <div class="alert alert-success">

            {{ session()->get('stauts') }}
        </div>
    @endif

   

