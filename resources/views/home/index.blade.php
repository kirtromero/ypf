@extends('layout')

@section('content')

<div class="content">
	<h1 class="text-left">Popular Categories</h1>
    @foreach($tags as $tag)
    <div class="thumbs">
        <a href="/search/{{ str_slug($tag->name) }}" title="{{ $tag->name }}" alt="{{ $tag->name }}" target="_blank">
        	@if($tag->thumbnail_id)
        		<img src="{{ $tag->PrimaryThumbnail }}" class="img-responsive center-block">
        	@else
        		<img src="{{ $tag->scene()->orderBy('created_at','desc')->first()->primary_thumbnail }}" class="img-responsive center-block">
        	@endif
        </a>
        <h5>{{ $tag->name }}</h5>
    </div>
    @endforeach
</div>
@stop
