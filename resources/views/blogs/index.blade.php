{{-- <button>{{auth()->user()->name}}</button> --}}
<x-layout>
<div class="container d-flex justify-content-center  border border-start-0 border-end-0">
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

<div class="container"> 
      @if($blogs->count())
      <div class="d-flex flex-wrap justify-content-center gap-2 my-3">
        @foreach ($blogs as $blog)
              <div class="card" style="width: 20rem;">
                <img src="{{$blog->photo}}" alt="">
                <div class="card-body">
                  <div class="d-flex gap-2 my-1">
                   <p><a href="/users/{{$blog->user->id}}/detail" class="rounded-pill btn bg-secondary badge">
                    <i class="fa-regular fa-user "></i>
                      {{$blog->user->username}}
                    </a></p> 
                    <p><a href="/?category={{$blog->category->slug}}" class="badge text-bg-secondary"> 
                      {{$blog->category->name}}  
                    </a></p>
                    <p><a href="/?brand={{$blog->brand->name}}" class="badge text-bg-secondary">  
                      {{$blog->brand->name}} 
                    </a></p>
          
                    {{-- Subscriprion --}}
                    {{-- <form action="/blogs/{{$blog->id}}/handle-subscriptions" method="POST">
                      @csrf
                      <div class="d-flex gap-2">
                        @if ($blog->isSubscribeBy(auth()->user()))
                          <button class="btn btn-primary btn-sm rounded-pill badge">Unsubscribe</button>
                        @else
                          <button class="btn btn-secondary btn-sm rounded-pill badge"><i class="fa-regular fa-bell"></i>Subscribe</button>
                        @endif
                      </div>
                    </form> --}}  
                  </div>

                  {{-- <div class="d-flex gap-2">
                    <p><a href="/?category={{$blog->category->slug}}" class="badge text-bg-secondary"> 
                      {{$blog->category->name}}  
                    </a></p>
                    <p><a href="/?brand={{$blog->brand->name}}" class="badge text-bg-secondary">  
                      {{$blog->brand->name}} 
                    </a></p>
                  </div> --}}
 
                  {{-- <p class="card-text">{{substr($blog->body,0,70)}}...</p> --}}
                  <p>{{$blog->created_at->diffForHumans()}}</p>
                  <p>{{$blog->comments->count()}} comments</p>

                  <a href="/blogs/{{$blog->id}}/detail" class="btn p-2 badge btn-primary">Detail</a>
                </div> 
              </div>
        @endforeach
      </div>
      @else
      <p>No blogs Found.</p>
      @endif
</div>

{{-- <p>Count:{{$blogs->count()}}</p> --}}
{{$blogs->links()}}
</x-layout>
