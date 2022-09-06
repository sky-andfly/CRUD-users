@extends('template.template')


@section('content')
    <section>
        <div class="container">
            <div class="section-container">
                <a href="{{route('users.index')}}" class="back">Назад</a>
                <form class="user" enctype="multipart/form-data" action="{{route('users.store')}}" method="post" >
                    <h2>Добавить нового пользователя</h2>
                    @csrf
                    <div class="form-group">
                        <label for="">ФИО</label>
                        <input name="name" type="text" value="{{old("name")}}" >
                        @error('name')
                            <span class="error">{{$message}}</span>
                        @enderror


                        <label for="">Электронная почта</label>
                        <input name="email" type="email" value="{{old("email")}}">

                        @error('email')
                        <span class="error">{{$message}}</span>
                        @enderror

                        <label for="">Аватар</label>
                        <input name="image" type="file">
                        <span class="image-text"> <b>*</b> Если аватар не будет выбран, будет использовано изображение по умолчанию</span>

                        <label for="">Номер телефона</label>
                        <input name="number_phone" type="text" value="{{old("number_phone")}}">

                        @error('number_phone')
                        <span class="error">{{$message}}</span>
                        @enderror
                        <label for="">Дата рождения</label>
                        <input name="data_birthday" type="date" value="{{old("data_birthday")}}">

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

                        <button name="send" type="submit">Добавить пользователя</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
