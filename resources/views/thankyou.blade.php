<x-app-layout>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <p>We appreciate your interest. You will receive updates from us soon.</>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</x-app-layout>
