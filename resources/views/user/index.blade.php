@extends('template.template')

@section('content')
    <section>
        <div class="container">
            <div class="section-container">
                <a href="{{route('users.create')}}" class="add">Добавить пользователя</a>
                <div class="list">
                    @foreach($all_users as $user)
                        <div class="item">
                            <div class="top__item">
                                <div class="left">
                                    <div class="img-box" style="background-image: url({{asset($user->image)}})">

                                    </div>
                                    <p>{{$user->name}}</p>
                                </div>
                                <div class="right">
                                    <p>{{$user->data_birthday}}</p>
                                </div>
                            </div>
                            <div class="top__content">
                                <p>{{$user->email}}</p>
                                <p>{{$user->number_phone}}</p>
                            </div>
                            <div class="service">
                                <a href="{{route('users.show', $user->id)}}">[Профиль]</a>
                                <a href="{{route('users.edit', $user->id)}}">[Редактировать]</a>
                                <form action="{{route('users.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="delete_btn">[Удалить]</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
