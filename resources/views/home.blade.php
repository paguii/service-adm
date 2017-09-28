@extends('layouts.app')

@section('title', 'Areas de Atendimento')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Areas de atendimento que você pertence</div>

                <div class="panel-body">
                        @forelse($areasAtendimento as $id => $areaAtendimento)
                            <a href="{{ route('filaAtendimento', ['id' => $id]) }}">
                                <div class="col-md-8 col-md-offset-2 areaAtendimento text-center">
                                    {{$areaAtendimento}}
                                </div>
                            </a>
                        @empty
                            <div class="col-md-12 text-center">
                                <p>Nenhuma</p>
                            </div>
                        @endforelse
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
