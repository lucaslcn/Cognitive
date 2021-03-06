<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Cognitive</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        
        .full-height {
            height: 100vh;
        }
        
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        
        .position-ref {
            position: relative;
        }
        
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        
        .content {
            text-align: center;
        }
        
        .title {
            font-size: 84px;
        }
        
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            {{-- <a href="{{ url('/home') }}">Home</a> --}}
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
        <a href="{{ route('login') }}">Login</a>
        
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Registrar</a>
        @endif
        @endauth
    </div>
    @endif
    
    <div class="content">
        <div class="title m-b-md">
            Cognitive
        </div>
        
        @role('professor')
        <p>Agenda</p>
        @endrole
        
        
        @role('aluno')
        <div class="row">
            <div class="links">
                <a href="">Buscar Professores</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="links">
                <a href="{{ route('turma.index') }}">Turmas</a>
            </div>
        </div>
        @endrole
        
        
        @role('admin')
        <div class="row">
            <div class="links">
                <a href="{{ route('area.index') }}">??reas</a>
                <a href="{{ route('disciplina.index') }}">Disciplinas</a>
                <a href="{{ route('turma.index') }}">Turmas</a>
                <a href="{{ route('estado.index') }}">Estados</a>
                <a href="{{ route('cidade.index') }}">Cidades</a>
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="links">
                <a href="{{ route('audits') }}">Auditoria</a>
                <a href="{{ route('logs') }}">Logs</a>
            </div>
        </div>
        @endrole
    </div>
</div>
</body>
</html>
