@extends('layout')

@section('content')
<div class="content">
    <h1 class="text-left">Results for {{ $tag->name }}</h1>
    @foreach($scenes as $scene)
    <div class="thumbs">
        <a href="/out/{{ $scene->id }}/{{ str_slug($scene->title) }}" title="{{ $scene->title }}" alt="{{ $scene->title }}">
            <img src="{{ $scene->primary_thumbnail }}" class="img-responsive center-block">
        </a>
        <h5>{{ $scene->title }}</h5>
    </div>
    @endforeach
</div>
@stop
