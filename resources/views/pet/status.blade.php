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
<form method="post" action="{{ route('pet.findByStatus') }}">
    @csrf

    <label for="status">Status:</label>
    <select name="status[]" id="status" multiple>
        <option value="available">available</option>
        <option value="pending">pending</option>
        <option value="sold">sold</option>
    </select>

    <button type="submit">Send</button>
</form>

@if(isset($data) && is_array($data))
    <h2>Results:</h2>
    <ul>
        @foreach($data as $pet)
            <li>
                <strong>ID:</strong> {{ $pet['id'] }}<br>
                <strong>Name:</strong> {{ $pet['name'] }}<br>
                <strong>Category:</strong>
                @if(isset($pet['category']['name']))
                    {{ $pet['category']['name'] }}
                @else
                    N/A
                @endif
                <br>
                <strong>Photo URL:</strong>
                @if(isset($pet['photoUrls']) && is_array($pet['photoUrls']) && count($pet['photoUrls']) > 0)
                    {{ $pet['photoUrls'][0] }}
                @else
                    N/A
                @endif
                <br>
                <strong>Status:</strong> {{ $pet['status'] }}<br>
                <strong>Tags:</strong>
                @if(isset($pet['tags']) && is_array($pet['tags']))
                    <ul>
                        @foreach($pet['tags'] as $tag)
                            <li>{{ $tag['name'] }}</li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
    <button onclick="window.location.href='{{ route('pet.index') }}'">Exit</button>
@endif

