@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>새 포럼 글 쓰기</h1>
		<hr>
		<form action="{{ route('articles.store') }}" method="POST">
			{!! csrf_field() !!}
			<div class="form-group">
				<label for="title">제목</label>
				<input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" value="{{ old('title') }}" placeholder="제목 입력" />
				{!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
			</div>
			<div class="form-group">
				<label for="content">본문</label>
				<textarea name="content" id="content" rows="10" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" placeholder="본문 내용 입력">{{ old('content') }}</textarea>
				{!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">저장하기</button>
			</div>
		</form>
	</div>
@stop