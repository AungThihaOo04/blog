@props(['blog' => null ,'categories' =>  null , 'brands' => null])

<form action={{$blog ? '/admin/blogs/'.$blog->id.'/update'  : '/admin/blogs/store' }}
      method="POST"
      enctype="multipart/form-data"
      >
    @csrf
    @if($blog)
    @method('PUT')
    @endif
    <div class="form-group my-2" >
      <label for="exampleInputEmail1">Blog Title</label>
      <input type="text" 
            value="{{$blog?->title}}"
             name="title"
             class="form-control" 
             id="exampleInputEmail1" 
             aria-describedby="emailHelp" 
             placeholder="">
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

        @if ($blog)
          <img src="{{$blog->photo}}" alt="" width="200px" height="200px">
        @endif
      <div class="form-group">
        <label for="exampleInputEmail1">Blog Photo</label>
        <input 
            type="file"
             name="photo"
             class="form-control" 
             id="exampleInputEmail1" 
             aria-describedby="emailHelp" >
        @error('photo')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
    
      <div class="form-group">
        <label for="exampleInputEmail1">Blog Slug</label>
        <input type="text" 
            value="{{$blog?->slug}}"
             name="slug"
             class="form-control" 
             id="exampleInputEmail1" 
             aria-describedby="emailHelp" 
             placeholder="">
        @error('slug')
             <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Blog Color</label>
        <input type="text" 
            value="{{$blog?->color}}"
             name="color"
             class="form-control" 
             id="exampleInputEmail1" 
             aria-describedby="emailHelp" 
             placeholder="">
        @error('color')
             <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Blog Price</label>
        <input type="text" 
            value="{{$blog?->price}}"
             name="price"
             class="form-control" 
             id="exampleInputEmail1" 
             aria-describedby="emailHelp" 
             placeholder="">
        @error('price')
             <p class="text-danger">{{$message}}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Blog Body</label>
        <input type="text" 
            value="{{$blog?->body}}"
             name="body"
             class="form-control" 
             id="exampleInputEmail1" 
             aria-describedby="emailHelp" 
             placeholder="">
        @error('body')
             <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Category</label>
        <select class="form-select " name="category_id" id="">
            @foreach ($categories as $category)
                <option {{ $category->id == $blog?->category->id? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}
                </option>                    
            @endforeach
        </select>
    </div>
      <div class="form-group">
        <label for="">Brand</label>
        <select class="form-select " name="brand_id" id="">
            @foreach ($brands as $brand)
                <option {{ $brand->id == $blog?->brand->id? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}
                </option>                    
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary my-2">
      {{$blog ? 'Update' : 'Create'}}
    </button>
  </form>