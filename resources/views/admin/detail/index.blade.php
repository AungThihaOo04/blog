<x-admin-layout>
  <h4>Detail List</h4>  
  <table class="table  table-bordered">
    <thead class="table-primary">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Bio</th>
        <th scope="col">Job</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$detail?->id}}</th>
        <td>{{$detail?->name}}</td>
        <td>{{$detail?->username}}</td>
        <td>{{$detail?->email}}</td>
        <td>{{$detail?->bio}}</td>
        <td>{{$detail?->job}}</td>
        <td>
          <div class="d-flex gap-2">
            @if(auth()->user()->can('editDetail',$detail))
              <a href="/admin/detail/{{$detail?->id}}/edit" class="btn btn-secondary btn-sm">Edit</a>
            @endif
            @if(auth()->user()->can('deleteDetail',$detail))
              <form action="/admin/detail/{{$detail?->id}}/destroy" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn-sm btn btn-danger">Delete</button>
              </form>
            @endif
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</x-admin-layout>


{{-- <x-admin-layout>
  <h4>Detail list</h4>  
  <form action="" method="POST">
    @csrf
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
    <div class="form-group">
        <label for="">User</label>
        <select class="form-select " name="user_id" id="">
            @foreach ($users as $user)
                <option  value="{{$user->id}}">{{$user->name}}
                </option>                    
            @endforeach
            <option  value="{{$user->id}}">{{$user->name}}
        </select>
    </div>
    
    <button  type="submit" class="btn btn-primary my-2">Submit</button>
  </form>
</x-admin-layout> --}}
