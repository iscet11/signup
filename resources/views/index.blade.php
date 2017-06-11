@extends('layouts.app')
@section('content')
    <h1>活動報名一覽</h1>
    <ul class="list-group">
      @foreach ($actions as $action)
        <li class="list-group-item">
          {{$action->user['name']}} 發布於
          {{$action->created_at->format("Y年m月d日")}} -
          <a href="{{route('action.show' , $action->id)}}">
          {{$action->title}}
          </a>
          （{{$action->counter}}）
        </li>
      @endforeach
    </ul>
    <div class="text-center">
      {!! $actions->render() !!}
    </div>
@endsection
