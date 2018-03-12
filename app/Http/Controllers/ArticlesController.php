<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return __METHOD__ . '은(는) Article 컬렉션을 조회합니다.';
		
		//페이지네이터
		$articles = \App\Article::latest()->paginate(10); 
		// latest() 날자를 역순으로 정렬, orderBy('created_at', 'desc;)와 같다.
		$articles->load('user');
		return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return __METHOD__ . '은(는) Article 컬렉션을 만들기 위한 폼을 담은 뷰를 반환합니다.';
		return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
	public function store(\App\Http\Requests\ArticlesRequest $request)
    {
        //return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 새로운 Article 컬렉션을 만듭니다.';
		$article = \App\User::find(1)->articles()
									->create($request->all());
		if(! $article) {
			return back()->with('flash_message', '글이 저장되지 않았습니다.')
						->withInput();
		}
//		14.1 이벤트 시스템 작동 기본 원리
		// dump('이벤트를 던집니다.');
		// event('article.created', [ $article ]); // event(이벤트 이름, 데이타)
		// dump('이벤트를 던졌습니다.');
		
//		14.7 이벤트 클래스 이용
		// dump('이벤트를 던집니다.');
		// event(new \App\Events\ArticleCreated($article));
		// dump('이벤트를 던졌습니다.');
		
//		14.9 실용적인 이벤트 시스템
		event(new \App\Events\ArticlesEvent($article));
		
		return redirect(route('articles.index'))
			->with('flash_message', '작성하신 글이 저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 조회합니다. :' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 수정하기 위한 폼을 담은 뷰를 반환합니다. :' . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 다음 기본 키를 가진 Article 모델을 수정합니다. :' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 삭제합니다. :' . $id;
    }
}
