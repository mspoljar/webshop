<form action="/category/create" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="enname" id="enname" placeholder="{{__('Enter the english name')}}"> 
    <br>
    <input type="text" name="hrname" id="hrname" placeholder="{{__('Enter the croatian name')}}">
    <br>
    <input type="file" name="pic" id="pic" accept=".png, .jpg, .jpeg">
    <br>
    <input type="hidden" name="id" value="{{$category->id}}">
    <input type="submit" value="{{__('Add a new category')}}">
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