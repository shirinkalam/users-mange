@extends('layouts.app')
@section('title',__('auth.users'))
@section('links')
<link rel="stylesheet" href="{{asset('css/users.css')}}">
<script src="{{asset('js/script.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
@section('content')
@auth
<div>
    <table cellspacing="0" cellpadding="0" class="table">
        <thead>
           <tr id="table-top">
            <th>
                <h3>@lang('users.name')</h3>
             </th>
             <th>
                <h3>@lang('users.email')</h3>
             </th>
             <th>
                <h3>@lang('users.role')</h3>
             </th>
             <th>
                <h3>@lang('users.edit')</h3>
             </th>
             <th>
                <h3>@lang('users.delete')</h3>
             </th>
           </tr>
        </thead>
        <tbody>
            @forelse ($users as $user )
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach ($user->roles as $role)
                    {{$role->persian_name}}
                    @endforeach
                </td>

                <td><a href="{{route('users.edit',$user->id)}}"><i class="fas fa-edit"></i></a></td>
                <td><a href=""><i class="fas fa-user-times"></i></a>

                </td>
             </tr>
            @empty
                <p>@lang('users.there are not any user')</p>
            @endforelse
        </tbody>
     </table>
</div>
@endauth
 @endsection
