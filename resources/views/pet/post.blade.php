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
<form method="post" action="{{ route('pet.postDataPet') }}">
    @csrf
    <label for="id">ID:</label>
    <input type="text" name="id" id="id" placeholder="id" required>

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" placeholder="Name">

    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value=""></option>
        <option value="available">available</option>
        <option value="pending">pending</option>
        <option value="sold">sold</option>
    </select>

    <button type="submit">Send</button>
</form>
