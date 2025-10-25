<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <title>Profile Page</title>

</head>
<body>
  @include('pop.pop')
  <section class="profil-section">
    <form  action="{{ '/profil/edit' }}" method="POST"  enctype="multipart/form-data">
        @csrf
        {{-- @method("PUT") --}}
    <div class="container-profil">
      
      <div class="image-profil">
        @if ($user->image)
          <img src="{{ asset('storage/'.$user->image->url) }}" alt="Profile Picture" />
        @else 
          <img src="{{ asset('m/INTP.jpeg') }}" alt="Profile Picture" />
        @endif
        
        {{-- <p class="edit-foto" ><i class="fas fa-edit"></i> </p> --}}
        {{-- <input type="file" name="photo" accept="image/*" required> --}}
        
      </div>
      
      <div class="blog-profil">
        
        <h2 id="teks-profil" >{{$user->name}}</h2>
        <p id="texs-profil" >{{$user->blog ? $user->blog->nameblog : "-----" }}</p>
        
        <input name="name" id="input-profil" type="text">
        <textarea name="nameblog" id="blog-profil-input" >kbkblk</textarea>
        <input type="file" id="input-profil-foto" name="url" accept="image/*">
      </div>
      

      <div class="btn-profil">
        <a id="btn-edit-profil" class="btn edit"><i class="fas fa-edit"></i> Edit</a>
        <button type="submit"  style="display: none;" id="btn-ok-profil" class="btn edit"><i class="fas fa-edit"></i> ok</button>
        </form>
        <a href="{{ url('/transaction') }}" class="btn back"><i class="fas fa-arrow-left"></i> Back</a>
      </div>

      
    
    </div>
  </section>
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('js/profil.js') }}"></script>
</body>
</html>
