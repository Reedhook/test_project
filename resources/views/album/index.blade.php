@extends('layouts.main')
@section('content')

    <div class="wrapper">
        <div class="header">
            <div class="logo"><a href="{{route('index')}}">Музыкальные <span class="black">альбомы</span><span class="gray">.net</span></a>
            </div>
            <ul class="nav">
                <li><a href="{{route('index')}}" class="active">Home</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="rightCol">
                <div class="block">
                    <h3>Описание</h3>
                    <p>{{$album->description}}</p>

                </div>
            </div>
            <div class="main">
                <h1>Про альбом</h1>

                <table class="bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Count of tracks</th>
                        <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$album->id}}</td>
                        <td>{{$album->name}}</td>
                        <td>{{$album->count_tracks}}</td>
                        <td>{{$album->minutes}}:{{$album->seconds}}:{{$album->milliseconds}}</td>
                    </tr>
                    </tbody>
                </table>

                <!--Изображения-->
                <h2>Обложка</h2>
                <p><img src={{asset('storage/images/'.$album->cover)}}  alt="{{$album->cover}}"></p>
                <!--Таблица-->  @foreach($album->tracks as $track)

                <table class="bordered">
                    <thead>
                    <ul>
                          <h1>Про трэк</h1>
                    </ul>
                    <tr>
                        <th>ID</th>
                        <th>Artist</th>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Bpm</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$track->id}}</td>
                            <td>{{$track->artist}}</td>
                            <td>{{$track->name}}</td>
                            <td>{{$track->minutes}}:{{$track->seconds}}:{{$track->milliseconds}}</td>
                            <td>{{$track->bpm}}</td>

                        </tr>
                        </tbody>
                </table>
                    <div class="block">
                        <h3>Список жанров</h3>



                    @foreach($track->genres as $genre)

                        <ul>
                            <li>
                                {{$genre->name}}
                            </li>
                        </ul>
                    @endforeach
                    </div>
                    <div class="block">
                        <h3>Список тэгов</h3>

                    @foreach($track->tags as $tag)
                        <ul>
                            <li>
                                {{$tag->name}}
                            </li>
                        </ul>
                    @endforeach
                    </div>
                    <div class="block">
                        <h3>Ссылка на файл</h3>
                    <a href="{{$track->link_to_the_file}}">{{$track->link_to_the_file}}</a>
                    </div>

                @endforeach
                <!--Формы-->


            </div>
        </div>

    </div>
@endsection

