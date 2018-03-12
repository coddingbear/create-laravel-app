<?php

namespace App\Http\Controllers;

class DocsController extends Controller
{
    protected $docs;
	
	public function __construct(\App\Documentation $docs)
	{
		$this->docs = $docs;
	}
	
	public function show($file = null)
	{
		// $index = markdown($this->docs->get());
		// $content = markdown($this->docs->get($file ?: 'installation.md'));
//		20.2 서버측 캐싱
		$index = \Cache::remember('docs.index', 120, function () {
			return markdown($this->docs->get());
		});
		$content = \Cache::remember("docs.{$file}", 120, function () use ($file) {
			return markdown($this->docs->get($file ?: 'intallation.md'));
		});
		
		return view('docs.show', compact('index', 'content'));
	}
	
	public function image($file)
	{
		// $image = $this->docs->image($file);
		// return response($image->encode('png'), 200, ['Content-Type' => 'image/png']);
		// 20.3 Etag 비교
		$reqEtag = \Request::getEtags();
		//dd($reqEtag);
		$genEtag = $this->docs->etag($file);
		
		if (isset($reqEtag[0])) {
			if ($reqEtag[0] === $genEtag) {
				return response('', 304);
			}
		}
		
		$image = $this->docs->image($file);
		
		return response($image->encode('png'), 200, [
			'Content-Type' => 'image/png',
			'Cache-Control'=> 'public, max-age=0',
			'Etag' => $genEtag,
		]);
	}
}
