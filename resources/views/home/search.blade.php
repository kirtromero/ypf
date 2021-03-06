@extends('layout')

@section('content')
<div class="content">
    @if(isset($tag))
    <h1 class="text-left">Results for {{ $tag->name }} <small>{{ $total }} total results found</small></h1>
    @else
    <h1 class="text-left">All Results <small>{{ $total }} total results found</small></h1>
    @endif
    {!! $scenes->appends(Input::except('page'))->render() !!}
    <div class="clearfix"></div>
    @foreach($scenes as $scene)
    <div class="thumbs">
        <div class="thumbs-img-cont">
            <a href="/out/{{ $scene->id }}/{{ str_slug($scene->title) }}" title="{{ $scene->title }}" target="_blank" alt="{{ $scene->title }}">
                <h5 class="thumb-title">{{ $scene->title }}</h5>
                <img data-original="{{ $scene->primary_thumbnail }}" title="{{ $scene->title }}" alt="{{ $scene->title }}" class="lazy img-responsive center-block"  width="180" height="135">
                <noscript>
                    <img src="{{ $scene->primary_thumbnail }}" title="{{ $scene->title }}" alt="{{ $scene->title }}" class="img-responsive center-block"  width="180" height="135">
                </noscript>
            </a>
        </div>
        <div class="scene-info text-left">
            <span>{{ date("F d, Y", strtotime($scene->created_at)) }}</span>
            <span class="pull-right">@if(is_numeric($scene->duration)){{ gmdate("i:s", $scene->duration) }}@else 00:00 @endif</span>
        </div>
    </div>
    @endforeach
    <div class="clearfix"></div>
    {!! $scenes->appends(Input::except('page'))->render() !!}
</div>
@stop
