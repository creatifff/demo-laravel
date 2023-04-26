@if($errors->any())
    <div class="errors">
        @foreach($errors->all() as $error)
            <div class="error">
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif
