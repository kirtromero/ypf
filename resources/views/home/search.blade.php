@extends('layout')

@section('content')
<div class="content">
    @if(isset($tag))
    <h1 class="text-left">Results for {{ $tag->name }}</h1>
    @else
    <h1 class="text-left">All Results</h1>
    @endif
    @foreach($scenes as $scene)
    <div class="thumbs">
        <a href="/out/{{ $scene->id }}/{{ str_slug($scene->title) }}" title="{{ $scene->title }}" target="_blank" alt="{{ $scene->title }}">
            <img src="{{ $scene->primary_thumbnail }}" class="img-responsive center-block">
            <h5 class="thumb-title">{{ $scene->title }}</h5>
        </a>
    </div>
    @endforeach
    <div class="clearfix"></div>
    {!! $scenes->render() !!}
</div>
@stop
