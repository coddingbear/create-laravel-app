<h1>
	{{ $article->title }}
	<small>{{ $article->user->name }}</small>
</h1>
<hr />
<p>
	{{ $article->content }}
	<small>{{ $article->created_at }}</small>
	<br/>
	<div style="text-align: center;">
		<img src="{{ $message->embed(storage_path('elephant.png')) }}" alt="PHP 로고" />
	</div>
</p>
<hr />
<footer>
	이메일은 {{ config('app.url') }}에서 보냈습니다.
</footer>