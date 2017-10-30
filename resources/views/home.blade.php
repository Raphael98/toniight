@extends("default")
    @section("content")
    <section id="banner">
        <div id="desc">
            <h1>Encontre e divulgue:</h1>Eventos, bares, restaurantes e muito mais...
        </div>
    </section>

    <script>
        $(document).ready(function(){
            setInterval("changeBanner()", 8000);
        });
    </script>

    <section class="ui grid" style="padding: 0 10%;">
        <div class="sixteen wide column my-title">
            <span id="sobre"></span>
            <h1>Encontre:</h1>
        </div>
        <div class="ten wide computer six wide tablet sixteen wide mobile column">
            <p>
                Quer encontrar um evento ou um lugar legal para passar o final de semana? Aqui você pode
                encontrar, praticamente, tudo! Como bares e restaurantes, praças, parques, quadras públicas e privadas,
                eventos musicais e esportivos, e outros, tudo isso recomendado por pessoas como você. Tá em dúvida se
                a recomendação é realmente boa? As pessoas podem avaliar dizendo o quão gostaram, assim, você não
                precisa dar um tiro no escuro.
            </p>
        </div>
        <div class="six wide computer four wide tablet sixteen wide mobile column">
            <img src="{{asset('/img/john-raptis-unsplash.jpg')}}" rel="guitar player">
        </div>
        <div class="sixteen wide column my-title">
            <h1>Divulge:</h1>
        </div>
        <div class="six wide computer eight wide tablet sixteen wide mobile column">
            <img src="{{asset('/img/seb-unsplash.jpg')}}" rel="shop facade">
        </div>
        <div class="ten wide computer eight wide tablet sixteen wide mobile column">
            <p>
                Encontrou um lugar legal e quer compartilhar? Você tem um comércio ou evento que gostária
                de divulgar? Aqui você pode fazer qualquer recomendação. Você pode colocar palavras chaves que
                vão classificar a sua recomendação, assim, as pessoas terão mais facilidade em achar por interesse.
            </p>
        </div>
    </section>
    @endsection
