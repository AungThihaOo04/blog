<x-admin-layout>
    <form action="/admin/setting/{{auth()->user()->id}}/update" method="POST">
      @method('PUT')
      @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text"
                value="{{$user->name}}"
                name="name" 
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">User Name</label>
          <input type="text" 
                value="{{$user->username}}"
                name="username" 
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" 
                value="{{$user->email}}"
                name="email" 
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter Email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input type="text"
                value="{{$user->password}}"
                name="password"  
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter Password">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
</x-admin-layout>