<x-layout>
    <div class="container my-3 d-flex gap-4 border p-4">
            <div class="col-md-2">
                <ul class="list-group  my-2">
                    <li class="list-group-item bg-primary">
                        <a href="" class="text-light">You</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/detail">User</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin">Blogs</a>
                    </li>                     
                    <li class="list-group-item">
                        <a href="/admin/brands">Brands</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/categories">Categories</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/{{auth()->id()}}/subscribe">Subscriber</a>
                    </li>                   
                </ul>  

                <ul class="list-group  my-4">
                    <li class="list-group-item ">
                        <a href="/admin/detail/create">User Create</a>
                    </li>
                    <li class="list-group-item ">
                        <a href="/admin/blogs/create">Blogs Create</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/brands/create">Brands Create</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/categories/create">Categories Create</a>
                    </li>
                </ul>
            </div>

            <div class='col-md-10'>
                <div class="container my-3">
                    {{$slot}}
                </div>
            </div>
    </div>
</x-layout>