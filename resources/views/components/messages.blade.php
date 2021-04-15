<section id="messages">
    
    @if (session()->has('success')) 
            <div class="alert alert-success">
                <p class="text-center">{{ Session::get('success') }}</p>
            </div>
    @elseif (session()->has('error')) 
            <div class="alert alert-danger">
                <p class="text-center">{{ Session::get('error') }}</p>
            </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p class="text-center">{{ $error }}</p>
            @endforeach
        </div>
    @endif
</section>

