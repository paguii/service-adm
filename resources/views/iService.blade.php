@extends('layouts.app')

@section('title', 'Início')

@section('header')
<header class="banner">
  <div class="text-center">
    <img src="{{ asset('images/iservicebanner.png') }}" alt="iService">
  </div>
</header>
@endsection

@section('content')
<div class="content">
  <article class="artigo row">
      <div class="escrito col-md-5 col-md-offset-1">
        <div class="titulo">
          <h2>Um sistema que busca o máximo desempenho para sua empresa.</h2>
        </div>

        <div class="text-justify texto"> 
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consequat, urna a tincidunt elementum, metus nisi bibendum felis, quis vehicula ante purus a turpis. Sed vitae tempus sem, quis hendrerit nisi. Donec laoreet euismod diam id viverra. Cras vitae porta mauris. Duis quis felis diam. Nulla bibendum lectus mauris, et pellentesque tortor viverra eu. Duis sagittis eu erat sit amet laoreet. Pellentesque malesuada ultricies enim, eget cursus arcu rutrum in. Nullam tristique, eros elementum auctor lacinia, leo justo imperdiet mi, ac consequat nisi lectus sit amet urna. Nec porttitor sem. Aliquam a viverra metus. Quisque tristique tellus est, vel maximus mi mollis in. Quisque eget felis quis justo imperdiet rhoncus sed at metus. Donec tellus sem, vehicula convallis nibh sagittis, scelerisque mattis ligula.</p>
        </div>
      </div>

      <div class="col-md-5 image-container">
          <img class="imagem" src="{{ asset('images/laptopPlay.png') }}" alt="iService">
      </div>
  </article>

  <article class="artigo row">
      <div class="col-md-5 col-md-offset-1 image-container">
          <img class="imagem" src="{{ asset('images/screenStat.png') }}" alt="iService">
      </div>

      <div class="escrito col-md-5">
        <div class="titulo">
          <h2>Um sistema que busca o máximo desempenho para sua empresa.</h2>
        </div>

        <div class="text-justify texto"> 
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consequat, urna a tincidunt elementum, metus nisi bibendum felis, quis vehicula ante purus a turpis. Sed vitae tempus sem, quis hendrerit nisi. Donec laoreet euismod diam id viverra. Cras vitae porta mauris. Duis quis felis diam. Nulla bibendum lectus mauris, et pellentesque tortor viverra eu. Duis sagittis eu erat sit amet laoreet. Pellentesque malesuada ultricies enim, eget cursus arcu rutrum in. Nullam tristique, eros elementum auctor lacinia, leo justo imperdiet mi, ac consequat nisi lectus sit amet urna. Nec porttitor sem. Aliquam a viverra metus. Quisque tristique tellus est, vel maximus mi mollis in. Quisque eget felis quis justo imperdiet rhoncus sed at metus. Donec tellus sem, vehicula convallis nibh sagittis, scelerisque mattis ligula.</p>
        </div>
      </div>
  </article>




</div>
@endsection

@section('footer')
<footer class="rodape">
  <div>
    <p class="text-center">Trabalho de conclusão de curso - <a href="http://paguii.com.br">Guilherme Pagliarini</a></p>
    <p class="text-center">
      <i class="glyphicon glyphicon-console"></i>
      <a href="https://www.github.com/paguii/service-adm">iService Github</a>
    </p>
  </div>
</footer>
@endsection
