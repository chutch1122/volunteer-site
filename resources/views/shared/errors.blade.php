@if(isset($errors))
    @if(is_array($errors))
        <div class="alert alert-danger" role="alert">
            <strong>Uh oh!</strong> Change a few things up and try submitting again.
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            <strong>Uh oh!</strong> Looks like there Change a few things up and try submitting again.
            <ul>
                <li>{{ $errors }}</li>
            </ul>
        </div>
    @endif
@endif