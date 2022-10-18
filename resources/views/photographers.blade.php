@include('header')
<div class="container-fluid">
    <div class="row photographers">
        @foreach ($photographers as $phr)
        <div class="col-md-2">
            <a href="{{ route('photographer',$phr->id) }}">
                <div class="card">
                    <div class="image">
                        <img src="{{ $phr->image }}">
                    </div>
                    <div class="name">
                        {{ $phr->name }}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@include('footer')
