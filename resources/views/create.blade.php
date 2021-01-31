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