@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Areas de atendimento que você pertence</div>

                <div class="panel-body">
                    <div class="row">
                        @forelse($areasAtendimento as $areaAtendimento)
                            <div class="row">
                                <div class="col-md-offset-1 col-md-10 areaAtendimento text-center">
                                    {{$areaAtendimento}}
                                </div>
                            </div>
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
</div>
@endsection
