<x-layout>
<div class="container d-flex gap-4 justify-content-center border border-start-0 border-end-0">
    <x-user/>
    <x-category/>
    <x-brand/>
      <div class="mt-3 ">
        <form action="/" class="">
          <input 
            value="{{request('category')}}"
            type="hidden"
            name ="category">
          <input 
            value="{{request('brand')}}"
            type="hidden"
            name ="brand">
          <input 
            value="{{request('user')}}"
            type="hidden"
            name ="user">
          <div class="d-flex gap-1">
              <input 
              name ="search"
              value="{{request('search')}}"
              type="text"
              class="form-control"
              placeholder="search here....">
              <button class="btn btn-outline-primary" type="submit">search</button>
          </div>      
        </form>
      </div>  
</div>

<div class="my-3 container">
      <div class="row">
        <div class="col m-auto">
          <img src="{{$blog->photo}}" alt="" width="500px" >
        </div>

        <div class="col">
          <div class=" gap-2 my-3">
            {{-- <p><a href="/?category={{$blog->category->slug}}"> 
            category- {{$blog->category->name}}
            </a></p> --}}
            {{-- <p><a href="/?user={{$blog->user->username}}" class="btn btn-primary btn-sm">
            {{$blog->user->name}}
            </a></p> --}}
            <p class="badge text-bg-success">Category-{{$blog->category->name}}</p>
            <p class="badge text-bg-success">Brand-{{$blog->brand->name}}</p>
            <h4>{{$blog->title}}</h4>
            <h5>Color - {{$blog->color}}</h5>
            <h4>{{$blog->price}}</h4>
            {{-- <div class="my-4">
              <a href="" class="btn btn-danger rounded-pill"> <i class="fa-solid fa-bag-shopping p-2 "></i>Buy</a>
              <a href="" class="btn btn-outline-danger rounded-pill "> <i class="fa-regular fa-heart p-2"></i>WishList</a>
              <a href="" class="btn btn-danger rounded-pill"> <i class="fa-solid fa-cart-shopping p-2"></i>Add to Cart</a>
            </div> --}}
          </div>
          
          <p>{{$blog->created_at->diffForHumans()}}</p>
        
          {{-- comment form --}}
          <form action="/blogs/{{$blog->id}}/comments" method="POST" class="my-3">
            @csrf
            <textarea class="form-control" placeholder="comment" name="body" rows="5" id=""></textarea>
            <button type="submit" class="mt-3 btn btn-primary">sent</button>
          </form>

          {{-- @dd($blog->comments) --}}
            @foreach ($blog->comments()->with('user')->orderby('id','desc')->get() as $comment)
                <ul class="list-group">
                  <li class="list-group-item ">
                    <h6>
                      {{$comment->user->name}} : {{$comment->created_at->diffForHumans()}} 
                      <p>Comment : {{$comment->body}}</p>
                    </h6>
                  </li>

                {{-- edit delete comment --}}
                  <div class="d-flex gap-2 my-2"  >
                    @if(auth()->user()->can('editComment',$comment))
                      <a href="/comments/{{$comment->id}}/edit" class="btn btn-warning mb-2"  type="submit">
                          Edit
                      </a>
                    @endif
                    @if(auth()->user()->can('deleteComment', $comment))
                      <form action="/comments/{{$comment->id}}/delete" method="POST"> 
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger mb-2" type="submit">Delete</button>
                      </form> 
                    @endif 
                  </div>                   
                </ul>
            @endforeach
        </div>
      </div>
</div>
</x-layout>
 


