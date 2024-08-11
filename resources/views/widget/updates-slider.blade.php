<div class="client_wrap">
  <div class="big_text mid_text">
    <a href="{{url('updates')}}">UPDATES</a>
    <div class="title-crud fontSize" @if(session('LoggedUser')) data-create="{{route('blog.index')}}" data-delete="{{route('blog.index')}}" data-link="{{route('blog.index')}}" @endif></div>
  </div>
  <div class="update_blk">
    @foreach($blogsSlider as $blogsList)
    <a href="{{ url('blog') }}/{{$blogsList->slug}}" class="client_item slick-slide">
      <div class="update_img onscreen_media_testimonial_item" @if(session('LoggedUser'))
                        data-create-link="{{route('blog.create')}}"
                        data-link="{{route('blog.edit', $blogsList->id)}}"
                        data-delete-link="{{route('admin.index')}}/blog/delete/{{ $blogsList->id}}"
                      @endif><img src="{{url('web')}}/media/md/{{$blogsList->image}}" /></div>
      <p>
        {!! html_entity_decode($blogsList->short_description) !!}
        <span>Read More</span>
      </p>
    </a>
     @endforeach
  </div>
  <a href="{{url('updates')}}" class="read_all explore_all"><p>VIEW ALL UPDATES</p></a>
</div>