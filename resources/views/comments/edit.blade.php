<x-layout>
    <div class="container">
        <h3>Form Edit</h3>
        <form action="/comments/{{$comment->id}}/update" method="POST" class="my-3">
            @csrf
            @method('patch')
            <textarea 
                class="form-control" 
                placeholder="comment" 
                name="body" 
                rows="5" 
                id="">
            {{$comment->body}}
            </textarea>
            @error('body')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <button type="submit" class="mt-3 btn btn-primary">sent</button>
        </form>
    </div>
</x-layout>