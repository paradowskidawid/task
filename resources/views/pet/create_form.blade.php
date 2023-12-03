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
<form method="post" action="{{ route('pet.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" placeholder="Name" required>

    <label for="category_name">Category name:</label>
    <input type="text" name="category" id="category" placeholder="Category name">

    <label for="photo_url">URL photo:</label>
    <input type="text" name="photo" id="photo" placeholder="URL photo" required>

    <label for="tag_name">Tag:</label>
    <input type="text" name="tag" id="tag" placeholder="Tag">

    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value=""></option>
        <option value="available">available</option>
        <option value="pending">pending</option>
        <option value="sold">sold</option>
    </select>

    <button type="submit">Send</button>
</form>
