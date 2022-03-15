@extends('stars.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifier le profil</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('stars.index') }}"> Retour</a>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>ERREUR </strong>Il y a un problème avec vos champs<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('stars.update',$star->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prénom :</strong>
                    <input type="text" name="name" value="{{ $star->firstName }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom :</strong>
                    <input type="text" name="name" value="{{ $star->lastName }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description :</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $star->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image :</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $star->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
     
    </form>
@endsection