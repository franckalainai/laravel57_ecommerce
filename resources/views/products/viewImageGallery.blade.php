

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <ol class="carousel-indicators">
            @foreach($imageGalleries as $key => $image )
            <li data-target="#lightbox" data-slide-to="{{$key}}" class="{{$key==0 ? 'active':null}}"></li>
            @endforeach
          </ol>
          <div class="carousel-inner">
            @foreach($imageGalleries as $key => $image )
            <div class="item {{$key==0 ? 'active':null}}">
              <img src="{{asset('image/galleries/'.$image->gallery_image)}}">
            </div>
            @endforeach

          </div><!-- /.carousel-inner -->
          <a class="left carousel-control" href="#lightbox" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#lightbox" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div><!-- /.modal-body -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

