<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if($tab === 'create') active @endif"href="{{ route('pet.create', ['tab' => 'create', 'title' => 'pet-create']) }}">Create pet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($tab === 'upload') active @endif" href="{{ route('pet.create', ['tab' => 'upload', 'title' => 'pet-upload-img']) }}">Upload image</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($tab === 'update') active @endif" href="{{ route('pet.create', ['tab' => 'update', 'title' => 'pet-update']) }}">Update pet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($tab === 'status') active @endif" href="{{ route('pet.create', ['tab' => 'status', 'title' => 'pet-status']) }}">Status pet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($tab === 'show') active @endif" href="{{ route('pet.create', ['tab' => 'show', 'title' => 'pet-show']) }}">Show pet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($tab === 'post') active @endif" href="{{ route('pet.create', ['tab' => 'post', 'title' => 'pet-post']) }}">Post pet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($tab === 'delete') active @endif" href="{{ route('pet.create', ['tab' => 'delete', 'title' => 'pet-delete']) }}">Delete pet</a>
    </li>
</ul>
