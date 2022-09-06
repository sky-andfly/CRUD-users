@extends('template.template')

@section('content')
    <section>
        <div class="container">
            <div class="section-container">
                <div class="list">

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
                                <a href="{{route('users.edit', $user->id)}}">[Редактировать]</a>
                                <a href="{{route('users.destroy', $user->id)}}">[Удалить]</a>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>
@endsection
