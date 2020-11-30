<form action="/category/update" method="POST" enctype="multipart/form-data">
    @csrf
<input type="text" name="name" id="name" value="{{$category->name}}">
<br>
<input type="file" name="pic" id="pic" accept=".png, .jpg, .jpeg">
<br>
<input type="submit" value="{{__('Change the category parameters')}}">
<input type="hidden" name="id" value="{{$category->id}}">
</form>
<br>
@if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif