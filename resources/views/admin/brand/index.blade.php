<x-admin-layout>
    <h4>Brands</h4>
    <table class="table table-bordered">
        <thead class="table-primary" >
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($brands as $brand)
          <tr>
            <th scope="row">{{$brand->id}}</th>
            <td>{{$brand->name}}</td>
            <td>{{$brand->slug}}</td>
            <td>
              <div class="d-flex gap-2">
                  <a href="/admin/brands/{{$brand->id}}/edit" class="btn btn-sm btn-secondary">Edit</a>        
                  <form action="/admin/brands/{{$brand->slug}}/destroy" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </form>  
              </div>  
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {{-- {{$brands->links()}} --}}
</x-admin-layout>