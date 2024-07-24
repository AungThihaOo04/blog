<x-admin-layout>
    <h2>Category Edit</h2>
    <form action="/admin/categories/{{$category->id}}/update" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input  type="text" 
                value="{{$category->name}}"
                name ="name"
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter name">
        </div>
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
          <label for="exampleInputEmail1">Slug</label>
          <input  type="text" 
                value="{{$category->slug}}"
                name="slug"
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter slug">
        </div>
        @error('slug')
            <p class="text-danger">{{$message}}</p>
        @enderror
        
        <button type="submit" class="btn btn-primary my-2">Update</button>
      </form>
</x-admin-layout>