{{--템플릿 상속 @extends()--}}	
@extends('layouts.master')

@section('style')
	<style>
		body { background: #efefef; color: #333;}
	</style>
@endsection

{{--섹션 상속 @section()--}}	
@section('content')
	<!-- HTML 주석안에서 {{ $name }}을(를) 출력합니다. -->
	{{-- 블래이드 주석안에서 {{ $name }}을(를) 출력합니다. --}}
	<h2>{{ $greeting or 'Hello' }} {{ $name or ' ' }}</h2>

	{{--조건문--}}
	@if($itemCount = count($items))
		<p>{{ $itemCount }} 종류의 과일이 있습니다.</p>
	@else
		<p>엥 ~ 아무것도 없는데요!</p>
	@endif
	{{--반복문--}}
	<ul>
		@foreach($items as $item)
			<li>{{ $item }}</li>
		@endforeach
	</ul>
	<?php $items = [] ?>
	<ul>
		@forelse($items as $item)
			<li>{{ $item }}</li>
		@empty
			<li>엥~ 과일이 없음.</li>
		@endforelse
		
	{{--조각 뷰 삽입 @include()--}}	
	@include('partials.footer')
@endsection