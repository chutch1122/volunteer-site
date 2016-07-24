@if(session('errors'))
    <div class="alert alert-danger" role="alert">
        <strong>Uh oh!</strong> Change a few things up and try submitting again.
        <ul>
            @foreach (session('errors') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif