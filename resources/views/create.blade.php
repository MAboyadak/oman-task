@if (session('errors'))
    @foreach (session('errors')->get('file') as $error)
        <h3 style="color:rgb(235, 35, 35)">{{ $error }}</h3>
    @endforeach
@endif

<form method="POST" action="{{ route('file.upload') }}" style="padding:5px" enctype="multipart/form-data">
    @csrf
    <div style="padding:10px">
        <input id="file" type="file" name="file"/>
    </div>
    <div style="padding: 10px">
        <button style="background: #4077be;color:white;padding:10px">
            {{ __('Upload') }}
        </button>
    </div>
    
</form>