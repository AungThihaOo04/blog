<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <div class="dropdown-center my-3">
        <button class="btn dropdown-toggle  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories
        </button>
        <ul class="dropdown-menu">
          @foreach ($categories as $category)
              <li><a class="dropdown-item"  
                href="/?category={{$category->slug}} 
                  {{request('search') ? '&search='.request('search') : ''}}
                  {{request('user') ? '&user='.request('user'): ''}}
                  ">
                  {{$category->name}}
                </a>
              </li>
          @endforeach
        </ul>
      </div>
</div>