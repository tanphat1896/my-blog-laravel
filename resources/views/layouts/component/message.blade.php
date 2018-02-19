@if (Session::has('success'))
    <div class="ui small positive message">
        <i class="close icon"></i>
        {{ session('success') }}
    </div>
@endif