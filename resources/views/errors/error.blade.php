
@if (count($errors) > 0 ||Session::has('fl_message'))
    <!-- Form Error List -->
    <div class="alert alert-danger">
              
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
           @if( Session::has('fl_message'))
        <li>{!! Session::get('fl_message') !!}</li>
            @endif
        </ul>
    </div>
@endif