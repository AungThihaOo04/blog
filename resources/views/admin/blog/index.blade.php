<x-admin-layout>
    <h4>Blog</h4>
    <table class="table table-bordered">
        <thead class="table-primary" >
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Color</th>
            <th scope="col">Price</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Brand</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($blogs as $blog)
          <tr>
            <th scope="row">{{$blog->id}}</th>
            <td>{{$blog->title}}</td>
            <td>{{$blog->slug}}</td>
            <td>{{$blog->color}}</td>
            <td>{{$blog->price}}</td>
            <td>{{substr($blog->body,0,30)}}</td>
            <td>{{$blog->category->name}}</td>
            <td>{{$blog->brand->name}}</td>
            <td>
              <div class="d-flex gap-2">
                @if (auth()->user()->can('editBlog',$blog))
                  <a href="/admin/blogs/{{$blog->id}}/edit" class="btn btn-sm btn-secondary">Edit</a>
                @endif
                @if(auth()->user()->can('delete', $blog))           
                  <form action="/admin/blogs/{{$blog->slug}}/destroy" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </form>  
                @endif
              </div>  
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {{$blogs->links()}}
</x-admin-layout>

{{-- <button>{{auth()->user()->name}}</button> --}}

{{--my blog all --}}
{{-- <x-admin-layout>
    @if($blogs->count())
    <div class="container">
      <div class="d-flex flex-wrap  gap-2 my-3">
        @foreach ($blogs as $blog)
              <div class="card" style="width: 20rem;">
                <img src="{{$blog->photo}}" alt="">
                <div class="card-body">
                  <div class="d-flex gap-2">
                    <p><a href="/?user={{$blog->user->username}}" class="rounded-pill btn bg-secondary badge">
                      <i class="fa-regular fa-user "></i>
                      {{$blog->user->username}}
                    </a></p>
                    <p><a href="/?category={{$blog->category->slug}}" class="badge text-bg-secondary"> 
                      {{$blog->category->name}}  
                    </a></p>
                    <p><a href="/?brand={{$blog->brand->name}}" class="badge text-bg-secondary">  
                      {{$blog->brand->name}} 
                    </a></p>
  
                    Subscriprion
                    <form action="/blogs/{{$blog->slug}}/handle-subscriptions" method="POST">
                      @csrf
                      <div class="d-flex gap-2">
                        @if ($blog->isSubscribeBy(auth()->user()))
                          <button class="btn btn-primary btn-sm rounded-pill badge">Unsubscribe</button>
                        @else
                          <button class="btn btn-warning btn-sm rounded-pill badge"><i class="fa-regular fa-bell"></i>Subscribe</button>
                        @endif
                      </div>
                    </form>   
                  </div>
                  <p class="card-text">{{substr($blog->body,0,70)}}...</p>
                  <p>{{$blog->comments->count()}} comments</p>
                  <a href="/blogs/{{$blog->slug}}/detail" class="btn btn-outline-danger btn-sm rounded-pill"><i class="fa-regular fa-heart p-1"></i>Buy</a>
                </div> 
              </div>
        @endforeach
      </div>
    </div>
    
    @else
    <p>No blogs Found.</p>
    @endif

<p>Count:{{$blogs->count()}}</p>
{{$blogs->links()}}
</x-admin-layout> --}}
  
