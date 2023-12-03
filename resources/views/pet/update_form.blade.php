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

<form id="updateForm">
    @csrf

    <label for="id">ID:</label>
    <input type="text" name="id" id="id" placeholder="id" required>

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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {

        $('#updateForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '/pet/' + $('#id').val(),
                method: 'PUT',
                data: $('#updateForm').serialize(),
                success: function (data) {
                    console.log(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>
