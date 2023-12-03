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

<form>
    @csrf

    <label for="petId">Pet ID:</label>
    <input type="number" name="petId" id="petId" required>

    <button type="submit">Get Pet</button>
</form>

<ul id="petDataList"></ul>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'GET',
                url: '/pet/' + $('#petId').val(),
                success: function (data) {
                    $('#petDataList').empty();
                    $.each(data, function (key, value) {
                        if (typeof value === 'object') {
                            $('#petDataList').append('<li><strong>' + key + ':</strong></li>');
                            $('#petDataList').append('<ul>');

                            $.each(value, function (subKey, subValue) {
                                $('#petDataList').append('<li>' + subKey + ': ' + subValue + '</li>');
                            });

                            $('#petDataList').append('</ul>');
                        } else {
                            $('#petDataList').append('<li><strong>' + key + ':</strong> ' + value + '</li>');
                        }
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#petDataList').empty();
                    $('#petDataList').append('<li>Error: Unable to fetch pet data</li>');
                }
            });
        });
    });
</script>
