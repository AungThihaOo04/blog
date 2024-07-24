<x-admin-layout>
    <h4>Subscriber</h4>
        @foreach ($users as $user)
            <ol class="list-group">
                <li class="list-group-item d-flex gap-3 my-1">
                    <p class="rounded-pill btn bg-secondary badge my-auto">
                       <a>{{$user?->name}}</a></p>
                    <p class="my-auto">{{$user?->email}}</p>
                </li>
            </ol>
        @endforeach
</x-admin-layout>