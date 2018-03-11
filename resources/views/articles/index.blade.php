@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>포럼 글 목록</h1>
		<hr />
		<ul class="list-group">
			@forelse($articles as $article)
				<li class="list-group-item list-group-action">
					<a href="#" class="d-flex align-items-center">
						<h4 class="mb-1 mr-2">{{ $article->title }}</h4>	
						<small>by {{ $article->user->name }}</small>
					</a>
				</li>
			@empty
				<li>
					<p>글이 없습니다.</p>
				</li>
			@endforelse
		</ul>
		
		@if($articles->count())
			<div class="d-flex justify-content-center mt-4">
				{!! $articles->render() !!}
			</div>
		@endif
	</div>
@stop