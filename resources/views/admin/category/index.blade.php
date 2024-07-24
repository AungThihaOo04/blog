<x-admin-layout>
  <h4>Categories</h4>
    <table class="table table-bordered">
        <thead class="table-primary">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
               <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>
                  <div class="d-flex gap-2">
                    <a href="/admin/categories/{{$category->id}}/edit" class="btn btn-sm btn-secondary">Edit</a> 
                    <form action="/admin/categories/{{$category->id}}/delete" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn  btn-danger btn-sm">Delete</button>
                    </form>
                  </div> 
                </td>
              </tr>
            @endforeach
            
        </tbody>

      </table>
</x-admin-layout>