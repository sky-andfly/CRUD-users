@extends('template.template')


@section('content')
    <section>
        <div class="container">
            <div class="section-container">
                <a href="{{route('users.index')}}" class="back">Назад</a>
                <form class="user" enctype="multipart/form-data" action="{{route('users.update', $user->id)}}" method="post" >
                    <h2>Редактировать пользователя — {{$user->name}}</h2>
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">ФИО</label>
                        <input name="name" type="text" value="{{$user->name}}" >
                        @error('name')
                        <span class="error">{{$message}}</span>
                        @enderror


                        <label for="">Электронная почта</label>
                        <input name="email" type="email" value="{{$user->email}}">

                        @error('email')
                        <span class="error">{{$message}}</span>
                        @enderror

                        <label for="">Аватар</label>
                        <input name="image" type="file">
                        <img src="{{asset($user->image)}}" alt="" class="select-avatar">

                        <label for="">Номер телефона</label>
                        <input name="number_phone" type="text" value="{{$user->number_phone}}">

                        @error('number_phone')
                        <span class="error">{{$message}}</span>
                        @enderror
                        <label for="">Дата рождения</label>
                        <input name="data_birthday" type="date" value="{{$user->data_birthday}}">

                        @error('data_birthday')
                        <span class="error">{{$message}}</span>
                        @enderror

                        <label for="">Пароль</label>
                        <input name="password" type="password" >

                        @error('password')
                        <span class="error">{{$message}}</span>
                        @enderror

                        <label for="">Подтверждение пароля</label>
                        <input name="password_confirmation" type="password">

                        @error('password_confirmation')
                        <span class="error">{{$message}}</span>
                        @enderror

                        <button name="send" type="submit">Сохранить изменения</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
