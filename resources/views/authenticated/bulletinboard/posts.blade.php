<x-sidebar>
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <!-- <p class="w-75 m-auto">投稿一覧</p> -->
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        <div class="post_sub">
          @foreach($post->subCategories as $subcategory)
            <p><span>{{ $subcategory->sub_category }}</span></p>
          @endforeach
        </div>
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class="">            {{$post_comment->commentCounts($post->id)->count()}}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{$like->likeCounts($post->id)}}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{$like->likeCounts($post->id)}}</span></p>
            @endif
          </div>

        </div>
      </div>
  </div>
  @endforeach
  </div>
  <div class="other_area  w-25">
    <div class=" m-4">
      <div p class="w-100 post_btn"><a href="{{ route('post.input') }}"><p class="w-100 post_sub ">投稿</p></a></div>
      <div class="d-flex such-btn">
        <input class="such-btn-a" type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input class="such-btn-b" type="submit" value="検索" form="postSearchRequest">
      </div>
      <div class="d-flex such_post_btn_box">
        <input type="submit" name="like_posts" class="such_post_btn pink" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="such_post_btn yellow" value="自分の投稿" form="postSearchRequest">
      </div>
      <div class="such_categories">
        <p>カテゴリー検索</p>
        @foreach($categories as $category)
          <details class="accordion-003">
            <summary class="main_categories" category_id="{{ $category->id }}"><span>{{ $category->main_category }}<span></summary>
            @foreach($category->subCategories as $subcategory)
              <!-- クリックしたら対象のサブカテゴリーで検索 -->
              <p class=""><input type="submit" name="category_posts" value="{{$subcategory->sub_category}}" form="postSearchRequest"></p>
            @endforeach
          </details>
        @endforeach
      </div>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
</x-sidebar>
