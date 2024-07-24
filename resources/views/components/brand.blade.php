<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <div class="dropdown-center my-3">
        <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Brand
        </button>
        <ul class="dropdown-menu">
          @foreach ($brands as $brand)
              <li><a class="dropdown-item"  
                href="/?brand={{$brand->name}} 
                  {{request('search') ? '&search='.request('search') : ''}}
                  {{request('user') ? '&user='.request('user'): ''}}
                  {{request('category') ? '&category='.request('category'): ''}}
                  ">
                  {{$brand->name}}
                </a>
              </li>
          @endforeach
        </ul>
      </div>
</div>