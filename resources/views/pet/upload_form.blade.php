@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif
<form method="post" action="{{ route('upload.image') }}" enctype="multipart/form-data">
    @csrf

    <label for="id">ID:</label>
    <input type="number" name="id" id="id" placeholder="id" required>

    <label for="additional">Additional:</label>
    <input type="text" name="additional" id="additional" placeholder="additional">

    <label for="photo">URL photo:</label>
    <input type="file" name="photo" id="photo" accept="image/*" required>

    <button type="submit">Send</button>
</form>
