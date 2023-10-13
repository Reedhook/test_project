@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    <div>
                        {{$albums->links()}}
                    </div>
                    <div>
                        <h3>Количество альбомов на странице: {{$per_page}} </h3>
                    </div>
                    <div>
                        <h3>Общее количество альбомов: {{$total_count}} </h3>
                    </div>

                    @foreach($albums as $album)
                        <div class="col-md-6 blog-post" data-aos="fade-up">
                            <a href="{{route('album.index',$album->id)  }}" class="blog-post-permalink">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{asset('storage/images/' . $album->cover)}}" alt="{{$album->cover}}">
                                </div>
                                <h6 class="blog-post-title">{{$album->name}}</h6>
                            </a>
                        </div>
                    @endforeach
                    <div>
                        {{$albums->links()}}
                    </div>

                </div>
            </section>
        </div>
    </main>
@endsection
