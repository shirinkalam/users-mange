@extends('layouts.app')

<link rel="stylesheet" href="{{asset('css/style.css')}}">

@section('content')
@include('partials.alerts')
<div class="edit-form">
    <form action="{{route('users.update',$user->id)}}" method="POST">
        @csrf
        <div class="row-1">
            <h3>افزودن نقش به کاربر</h3>

            @forelse ($roles as $role)
            <input type="checkbox" name="roles[]" {{$user->roles->contains($role) ? 'checked' : ''}} value="{{$role->name}}" id="{{'role' . $role->id}}">
            <label for="{{'role' . $role->id}}">{{$role->persian_name}}</label>
            @empty
            <p>
                @lang('there are not any role')
            </p>
            @endforelse

        </div>


        <div class="row-2">
            <h3>افزودن دسترسی به کاربر</h3>
            @forelse ($permissions as $permission)
            <input type="checkbox" name="permissions[]"  {{$user->permissions->contains($permission) ? 'checked' : ''}}  value="{{$permission->name}}" id="{{'permission' . $permission->id}}">
            <label for="{{'permission' . $permission->id}}">{{$permission->persian_name}}</label>
            @empty
            <p>
                @lang('there are not any permission')
            </p>
            @endforelse
        </div>

        <button type="submit">@lang('users.edit')</button>

    </form>
</div>
@endsection
