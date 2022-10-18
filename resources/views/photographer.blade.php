@include('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2 phr-photo">
                <img src="{{ $photographer->image }}">
            </div>
            <div class="col-md-10 p-0">
                <div class="col-md-6 phr-info">
                    <div class="phr-name">{{ $photographer->name }}</div>
                    <div class="phr-username">{{ '@'.$photographer->username }}</div>
                    <div class="phr-location"><i class="fas fa-map-marker-alt"></i> {{ $photographer->location }}</div>
                    <div class="phr-unsplash"><i class="fas fa-link"></i> <a href="{{ $photographer->profile_url }}" target="_blank">Unsplash</a></div>
                </div>
                <div class="col-md-3 phr-photos-total"><span>{{ $photographer->total_photos }}</span><small>PHOTOS</small></div>
                <div class="col-md-3 phr-likes-total"><span>{{ $photographer->total_likes }}</span><small>LIKES</small></div>
                <div class="col-md-12 phr-bio">{{ $photographer->bio }}</div>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="phr-title">PHOTOS</div>
            @foreach ($photographer->photos as $photo)
                <div class="col-md-3">
                    <div class="item" style="background-image: url({{ $photo->urls->small }})">
                    <a href="{{ $photo->urls->regular }}" data-toggle="lightbox" class="zoom" data-type="image" data-gallery="phr-gallery" ></a>
                    <div class="likes">
                        <span>{{ $photo->likes }}</span>
                        <i class="far fa-heart"></i>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('footer')
