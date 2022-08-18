@extends('layouts.app')
@section('title',__('auth.users'))
@section('links')
<link rel="stylesheet" href="{{asset('css/users.css')}}">
<script src="{{asset('js/script.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
@section('content')
@auth
<div>
    @include('partials.alerts')
</div>
<div class="add-role table2">
    <h3>افزودن نقش</h3>
        <form action="{{route('roles.store')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="نام نقش">
            <input type="text" name="persian_name" placeholder="نام فارسی نقش">
            <button type="submit">@lang('roles.add')</button>
        </form>
</div>
<div>
    <table cellspacing="0" cellpadding="0" class="table">
        <thead>
           <tr id="table-top">
            <th>
                <h3>@lang('roles.name')</h3>
             </th>
             <th>
                <h3>@lang('roles.persian name')</h3>
             </th>
             <th>
                <h3>@lang('roles.operation')</h3>
             </th>
           </tr>
        </thead>
        <tbody>
            @forelse ($roles as $role )
            <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->persian_name}}</td>

                <td><a href=""><i class="fas fa-edit"></i></a></td>

                </td>
             </tr>
            @empty
                <p>@lang('users.there are not any role')</p>
            @endforelse
        </tbody>
     </table>
</div>
@endauth
 @endsection
