@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }} >
        <ul class="alert alert-danger" style="margin-left:25px">
            @foreach ($errors->all() as $error)
                <li > {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
