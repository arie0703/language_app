@extends('user')

@section('styles')
<link href="/css/user.css" rel="stylesheet">
@endsection


@section('right-side')
<div class="edit-container">
  <form method="post" action="{{ route('user.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <label for="profile_image">Edit Profile</label>
    <p>User Name</p>

    <input type="text" class="userForm, form-control" name="name" placeholder="User" value="{{ $user->name }}">
    <br><br>
    <p>Image</p>
    <label for="image" class="btn">
        <input id="image" type="file"  name="image" accept="image/png,image/jpeg,image/gif,image/jpg">
    </label>
    <br>
    <button type="submit" class="btn btn-primary">
      OK
    </button>
    </form>

    <script>
    function previewImage(obj)
    {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
        document.getElementById('img').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
    </script>

</div>
@endsection