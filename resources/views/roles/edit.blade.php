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
        <form action="{{route('roles.update',$role->id)}}" method="POST">
            @csrf
            <input type="text" name="name" value="{{$role->name}}" placeholder="نام نقش">
            <input type="text" name="persian_name" value="{{$role->persian_name}}" placeholder="نام فارسی نقش">

            <div class="row-2">
            <h3>افزودن دسترسی به کاربر</h3>
            @forelse ($permissions as $permission)
            <input type="checkbox" name="permissions[]"  {{$role->permissions->contains($permission) ? 'checked' : ''}}  value="{{$permission->name}}" id="{{'permission' . $permission->id}}">
            <label for="{{'permission' . $permission->id}}">{{$permission->persian_name}}</label>
            @empty
            <p>
                @lang('there are not any permission')
            </p>
            @endforelse


        </div>

            <button type="submit">@lang('roles.edit')</button>
        </form>
</div>
@endauth
 @endsection
