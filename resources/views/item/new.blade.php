<form action="/item/create" method="post" enctype="multipart/form-data">
@csrf
<input type="text" name="enname" id="enname" placeholder="{{__('Enter the english name')}}"> 
<br>
<input type="text" name="endescription" id="endescription" placeholder="{{__('Enter the english description')}}">
<br>
<input type="text" name="hrname" id="hrname" placeholder="{{__('Enter the croatian name')}}">
<br>
<input type="text" name="hrdescription" id="hrdescription" placeholder="{{__('Enter the croatian description')}}">
<br>
<input type="number" name="price" id="price" step="0.01" placeholder="{{'Enter the price'}}">
<br>
<input type="file" name="pic" id="pic" accept=".png, .jpg, .jpeg">
<br>
<input type="hidden" name="id" value="{{$item->id}}">
<input type="submit" value="{{__('Add a new product')}}">
</form>
@if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif