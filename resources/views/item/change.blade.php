<form action="/item/update" method="POST" enctype="multipart/form-data">
    @csrf
<input type="text" name="name" id="name" value="{{$item->name}}">
<br>
<input type="text" name="description" id="description" value="{{$item->description}}">
<br>
<input type="file" name="pic" id="pic" accept=".png, .jpg, .jpeg">
<br>
<input type="number" name="price" id="price" value="{{$item->price}}" step="0.01">
<br>
<input type="submit" value="{{__('Change the products parameters')}}">
<input type="hidden" name="id" value="{{$item->id}}">
</form>