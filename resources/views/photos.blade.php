@include('header')

<div class="container-fluid">
    <div class="row">
        @foreach ($photos as $photo)
        <div class="col-md-3">
            <div class="item" style="background-image: url({{ $photo->urls->small }})">
            <a href="{{ $photo->urls->regular }}" data-toggle="lightbox" class="zoom" data-type="image" data-gallery="gallery" data-footer="{{ $photo->description }}"></a>
            <div class="likes">
                <span>{{ $photo->likes }}</span>
                <i class="far fa-heart"></i>
            </div>
            <div class="info" data-url="{{ route('photographer.get') }}?id={{ $photo->photographer->id }}" action="photographer-modal">
                <div class="photographer">
                    <img src="{{ $photo->photographer->image }}" class="photographer-image">
                    <div class="detail">
                        <span>{{ $photo->photographer->name }}</span>
                        <small>{{ '@'.$photo->photographer->username }}</small>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

    
<script>
// photographer Modal
$(document).on('click', '[action="photographer-modal"]', function(event) {
  var button = $(this);
  $.ajax({
    url : button.data('url'),
    type : 'GET',
    success : function(req){
      $('body').append(req);
    },
    error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.responseText);
    }
  });

});

// photographer Modal Remove
$(document).on('hidden.bs.modal','[id^=photographerModal]', function (event) {
  $(event.target).remove();
})
</script>
@include('footer')
