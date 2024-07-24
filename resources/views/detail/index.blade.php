<x-layout>
    <div class="container my-3">
        <form action="/details/{{$detail->id}}/handle-subscriptions" method="POST">
            @csrf
            <div class="d-flex gap-2">
            <button class="btn p-2 badge btn-primary"><i class="fa-solid fa-user"></i>
            {{$detail->name}}</button>
              @if ($detail->issSubscribeBy(auth()->user()))
              <button class="btn btn-primary btn-sm rounded-pill badge">Unsubscribe</button>
              @else
              <button class="btn btn-secondary btn-sm rounded-pill badge"><i class="fa-regular fa-bell me-2"></i>Subscribe</button>
              @endif
            </div>
        </form>
        
        <div class="row my-3">
            <div class="col-2">
                <div class="container border p-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" 
                              value="{{$detail?->name}}"
                              name="name"
                              class="form-control" 
                              id="exampleInputEmail1" 
                              aria-describedby="emailHelp" 
                              placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">UserName</label>
                        <input type="text" 
                              value="{{$detail?->username}}"
                              name="username"
                              class="form-control" 
                              id="exampleInputEmail1" 
                              aria-describedby="emailHelp" 
                              placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" 
                              value="{{$detail?->email}}"
                              name="email"
                              class="form-control" 
                              id="exampleInputEmail1" 
                              aria-describedby="emailHelp" 
                              placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bio</label>
                        <input type="text" 
                              value="{{$detail?->bio}}"
                              name="bio"
                              class="form-control" 
                              id="exampleInputEmail1" 
                              aria-describedby="emailHelp" 
                              placeholder="Enter bio">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Job</label>
                        <input type="text" 
                              value="{{$detail?->job}}"
                              name="job"
                              class="form-control" 
                              id="exampleInputEmail1" 
                              aria-describedby="emailHelp" 
                              placeholder="Enter job">
                    </div>
            </div>
                </div>
                
            <div class="col-10">   
                <div class="container">
                <div class="d-flex flex-wrap  gap-2">
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
            
                                {{-- Subscriprion --}}
                                {{-- <form action="/blogs/{{$blog->slug}}/handle-subscriptions" method="POST">
                                    @csrf
                                    <div class="d-flex gap-2">
                                    @if ($blog->isSubscribeBy(auth()->user()))
                                        <button class="btn btn-primary btn-sm rounded-pill badge">Unsubscribe</button>
                                    @else
                                        <button class="btn btn-warning btn-sm rounded-pill badge"><i class="fa-regular fa-bell"></i>Subscribe</button>
                                    @endif
                                    </div>
                                </form>    --}}
                            </div>
            
                            {{-- <p class="card-text">{{substr($blog->body,0,70)}}...</p> --}}
                            <p>{{$blog->comments->count()}} comments</p>
                            <a href="/blogs/{{$blog->id}}/detail" class="btn p-2 badge btn-primary">Detail</a>
                        </div> 
                        </div>
                @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
        
        
</x-layout>
