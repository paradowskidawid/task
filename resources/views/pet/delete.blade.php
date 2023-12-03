<meta name="csrf-token" content="{{ csrf_token() }}">
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
<form id="delete">
    @csrf

    <label for="id">ID:</label>
    <input type="text" name="id" id="id" placeholder="id" required>

    <button type="submit">Send</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {

        $('#delete').submit(function (e) {
            e.preventDefault();
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/pet/' + $('#id').val(),
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
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
