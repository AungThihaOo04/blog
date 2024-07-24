<x-layout>
  <div class="container mx-auto" style="width:40%">
    <h4>Register form</h4>
    <form action="/register" method="POST">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input 
          value="{{old('name')}}"
          name="name"
          type="text" 
          class="form-control" 
          id="exampleInputEmail1" 
          aria-describedby="emailHelp" 
          placeholder="Enter name">
          @error('name')
              <p class="text-danger">{{$message}}</p>
          @enderror
    </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input 
            value="{{old('email')}}"
            name="email"
            type="email" 
            class="form-control" 
            id="exampleInputEmail1" 
            aria-describedby="emailHelp" 
            placeholder="Enter email">
            @error('email')
              <p class="text-danger">{{$message}}</p>
            @enderror
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">User Name</label>
        <input 
          value="{{old('username')}}"
          name="username"
          type="text" 
          class="form-control" 
          id="exampleInputEmail1" 
          aria-describedby="emailHelp" 
          placeholder="Enter username">
          @error('username')
              <p class="text-danger">{{$message}}</p>
          @enderror
    </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input 
          name="password"
          type="password" 
          class="form-control" 
          id="exampleInputPassword1" 
          placeholder="Password">
          @error('password')
              <p class="text-danger">{{$message}}</p>
          @enderror
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary my-2">Submit</button>
    </form>
  </div>
</x-layout>