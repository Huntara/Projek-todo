@extends('layout.layout')
@section('content')

    <header>
        <a class="logo woy">My Todo's</a>
        <ul class="mb-0 woy">
            <li><a href="">Complated</a></li>
            <li><a href="{{route('create')}}">Create</a></li>
            @if (Auth::check())
           <li class="items"><a href="/logout">Logout</a></li>
           @endif
        </ul>
    </header>

    <div class="wrapper  bg-white mt-5">
        @if(session('Done'))
        <script>
        swal("Sukses", "Todo telah selesai dikerjakan!", "success");
        </script>
        @endif
        @if(session('added'))
        <script>
        swal("Sukses", "Berhasil menambahkan Todo's!", "success");
        </script>
        @endif
        @if(session('successUpdate'))
        <script>
         swal("Sukses", "Berhasil memperbarui Todo's!", "success");
        </script>
        @endif
        @if(session('deleted'))
        <script>
        swal("Sukses", "Berhasil menghapuskan Todo's!", "success");
        </script>
        @endif
        @if(session('logsuccess'))
        <script>
        swal("Sukses", "Berhasil Login!", "success");
        </script>
        @endif
        @if(session('notAllowed'))
        <script>
        swal("Sukses", "Anda Sudah Login!", "success");
        </script>
        @endif
        <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex flex-column">
                <div class="h5">My Todo's</div>
                <p class="text-muted text-justify">
                    Here's a list of activities you have to do
                </p>
            </div>
        </div>
        <div class="work border-bottom pt-3">
            <div class="d-flex align-items-center py-2 mt-1">
                <div>
                    <span class="text-muted fas fa-comment btn"></span>
                </div>
                <div class="text-muted" style="width:100px;">{{$id -> count()}} todos</div>
                <button class="btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                    data-target="#comments" aria-expanded="false" aria-controls="comments" style= "margin-left:300px;"></button>
            </div>
        </div>
        @if ($id->count()==0)
        <div class="d-flex justify-content-center align-items-center pt-3 pb-2">
        <h6>Todo kosong harap membuat todo!</h6>
    </div>
        @else
        <div id="comments" class="mt-1">
            @foreach ($id as $todo)
            <div class="comment d-flex align-items-start ">
                <div class="mr-2">
                    @if($todo['status'] == 1)
                    <span class="fa-solid fa-bookmark text-secondary btn"></span>
                    @else
                     <form action="complated/{{$todo['id']}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="fas fa-circle-check text-primary btn"></button>
                     </form>
                    @endif
                </div>
                <div class="d-flex flex-column w-100">
                    <a href="/edit/{{$todo['id']}}" class="text-justify">
                        {{$todo['title']}} 
                    </a>
                    <p class="text-break ">{{$todo['description']}}</p>
                    <p class="text-muted"> {{ $todo['status'] == 1 ? 'Complated' : 'On-Process'}}
                        <span class="date">
                            @if ($todo['status'] == 1) selesai pada : {{ \Carbon\Carbon::parse($todo['done_time'])->format('j F, Y')}}
                            @else
                            target selesai : {{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y')}}
                            @endif
                        </span>
                    </p>
                </div>
                <div class="ml-md-4 ml-0">
                    <a href="/delete/{{$todo['id']}}"> 
                    <button type="submit" class="fas fa-trash text-danger btn"></button>
                    </a>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    @endif
    </div>
    <script>
        window.addEventListener("scroll", function(){
            let header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>
@endsection

