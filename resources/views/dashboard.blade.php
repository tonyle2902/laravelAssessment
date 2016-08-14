@extends('app')

@section('content')
    
    <div class="container">
        <h1>List of Members</h1>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="profile/{{$user->id}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection

