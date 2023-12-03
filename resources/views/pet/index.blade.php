@extends('base')
<body>
<header>

</header>

<main>
    <div class="container mb-5">
        @include('pet.tabs', ['active' => $tab])
        <div class="container-fluid">
            @if($tab === 'create')
                @include('pet.create_form')
            @elseif($tab === 'upload')
                @include('pet.upload_form')
            @elseif($tab === 'update')
                @include('pet.update_form')
            @elseif($tab === 'status')
                @include('pet.status')
            @elseif($tab === 'show')
                @include('pet.show')
            @elseif($tab === 'post')
                @include('pet.post')
            @elseif($tab === 'delete')
                @include('pet.delete')
            @endif()
        </div>
    </div>
</main>

<footer>
</footer>
</body>
