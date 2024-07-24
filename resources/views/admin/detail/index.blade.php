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