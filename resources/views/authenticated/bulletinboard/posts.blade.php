<x-sidebar>
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class=""></span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}"></span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}"></span></p>
            @endif
          </div>
          {{$like->likeCounts($post->id)}}
        </div>
      </div>

      @if(Auth::id()==$post->user->id)
      <!-- 編集・削除・機能 -->
      <div>
        <a class="js-modal-open edit-modal-open"  post_title="{{ $post->post_title }}" post_body="{{ $post->post }}" post_id="{{ $post->id }}">編集</a>
        <!-- 投稿削除ボタン -->
        <a class="btn btn-danger" href="delete/{{$post->id}}" onclick='return confirm("本当に削除しますか？")'>削除</a>
      </div>
      @endif
      <div class="modal js-modal">
        <!-- モーダルウィンドウ -->
        <div class="modal_bg js-modal-close"></div>
        <div class="modal_window">
          <form action="edit" method="post">
          @csrf
            <div class="modal-inner-title">
              <input name="post_title" type="text" value="post_title">
            </div>
            <div class="modal-inner-body">
              <textarea name="post_body" id="" >{{$post->post}}</textarea>
            </div>
            <input type="hidden" class="edit-modal-hidden" name="post_id">
            <div class="edit-modal-btn">
              <a class="btn btn-danger js-modal-close">閉じる</a>
              <input type="submit" value="編集" alt="編集" class="btn btn-primary">
            </div>
          </form>
        </div>
     </div>

  </div>
  @endforeach
  </div>
  <div class="other_area border w-25">
    <div class="border m-4">
      <div class=""><a href="{{ route('post.input') }}">投稿</a></div>
      <div class="">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" value="検索" form="postSearchRequest">
      </div>
      <input type="submit" name="like_posts" class="category_btn" value="いいねした投稿" form="postSearchRequest">
      <input type="submit" name="my_posts" class="category_btn" value="自分の投稿" form="postSearchRequest">
      <ul>
        @foreach($categories as $category)
        <li class="main_categories" category_id="{{ $category->id }}"><span>{{ $category->main_category }}<span></li>
        @endforeach
      </ul>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
</x-sidebar>
