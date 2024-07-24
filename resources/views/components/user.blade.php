<div>
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    <div class="dropdown-center my-3">
    <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Users 
      </button>
      <ul class="dropdown-menu">
        @foreach ($users as $user)
            <li><a class="dropdown-item" 
              href="/?user={{$user->username}}
              {{request('search') ? '&search='.request('search'): ''}}
              {{request('category') ? '&category='.request('category   '): ''}}
              ">
              {{$user->name}}
              </a>
            </li>
        @endforeach
      </ul>
    </div>
</div>



