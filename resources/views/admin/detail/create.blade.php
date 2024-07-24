<x-admin-layout>
    <h4>Detail Create</h4>
    <form action="/admin/detail/store" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" 
                name="name"
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter name">
        </div>
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
          <label for="exampleInputEmail1">UserName</label>
          <input type="text" 
                name="username"
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter username">
        </div>
        @error('username')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" 
                name="email"
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter email">
        </div>
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
          <label for="exampleInputEmail1">Bio</label>
          <input type="text" 
                name="bio"
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter bio">
        </div>
        @error('bio')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
          <label for="exampleInputEmail1">Job</label>
          <input type="text" 
                name="job"
                class="form-control" 
                id="exampleInputEmail1" 
                aria-describedby="emailHelp" 
                placeholder="Enter job">
        </div>
        @error('job')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label for="">User</label>
            <select class="form-select " name="user_id" id="">
                {{-- @foreach ($users as $user)
                    <option  value="{{$user->id}}">{{$user->name}}
                    </option>                    
                @endforeach --}}
                <option  value="{{$user->id}}">{{$user->name}}
            </select>
        </div>
        
        <button  type="submit" class="btn btn-primary my-2">Create</button>
      </form>
</x-admin-layout>