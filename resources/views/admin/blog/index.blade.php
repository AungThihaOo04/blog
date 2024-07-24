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
