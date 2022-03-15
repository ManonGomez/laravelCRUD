@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('stars.create') }}"> Créer un nouveau profil</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($stars as $star)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $star->image }}" width="100px"></td>
            <td>{{ $star->firstName }}</td>
            <td>{{ $star->lastName }}</td>
            <td>{{ $star->description }}</td>

            <td>
                <form action="{{ route('stars.destroy',$star->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('stars.show',$star->id) }}">Voir</a>
      
                    <a class="btn btn-primary" href="{{ route('stars.edit',$star->id) }}">Modifier</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $stars->links() !!}
        
@endsection