<?php
  $clientArrs = json_decode(json_encode($clients));
?>
<div class="client_wrap">
  <div class="big_text mid_text" >
    <a href="{{url('/client')}}">CLIENTS</a>
    <div class="title-crud fontSize" @if(session('LoggedUser')) data-create-link="{{route('client.index')}}" data-delete="{{route('client.index')}}" data-link="{{route('client.index')}}" @endif></div>
  </div>
  <div class="client_blk">
    @foreach($clientArrs as $client)
    <a data-fancybox="gallery" href="{{url('/')}}/images/{{$client->image}}" class="client_item slick-slide">
      <img src="{{url('/')}}/images/{{$client->image}}" />
    </a>
    @endforeach
  </div>
  <a href="{{ url('client') }}" class="read_all explore_all"><p>exeplore ALL</p></a>
</div>