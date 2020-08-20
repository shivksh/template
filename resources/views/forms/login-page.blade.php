<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<style>

     #input{
         width:100%;
     }
   
   .cds{
    margin: 0 auto; width:20%;

   }
    

</style>

</head>
<body>
    
<div class='container cds'  >

 
 <h1 class="mt-5" > Login </h1>



 @if (count($errors)>0)

   @foreach ($errors->all() as $error )
      <p class="alert alert-danger mt-3">{{ $error }}   </p>
   @endforeach
 @endif



 @if(session('success'))

<div class="alert alert-success mt-3">
   <p>{{ session('success') }}</p>
</div>

 @endif




    <form action="{{ route('login-data') }}" method="post">      
   {{ @csrf_field() }}


   <div class="mt-5">
               <label for=""> Email </label> <br>
               <input type="email" id="input" name="email" class="form-control" placeholder="Enter Email"><br>
         </div>

         <div >
               <label for=""> Password </label> <br>
               <input type="password" id="input" name="password" class="form-control" placeholder="Enter Password"><br>
         </div>

         

         <button type="submit" class="btn btn-primary btn-sm btn-block mt-3"> Submit  </button>
         <p class="mt-2">Not Registered Yet ? <a href="/register-page">Register Here</a> </p>




    </form>     


</div>


</body>
</html>