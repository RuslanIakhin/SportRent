@extends('layouts.skeleton')

@section('title', 'SportRent: Аренда спортивного инвентаря и средств индивидуальной мобильности')

@section('body')

<section id="hero">
    <div class="container text-start text-lg-start text-white" data-aos="zoom-in" data-aos-delay="50">
        <div class="row">
            <div class="col-lg-6">
                <h1>Ключ к здоровому образу жизни — это тренировки и правильное питание</h1>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <h1 class="title-page mt-4 pb-2 text-rob">Последние объявления</h1>
    <div class="item_cards">
        @include('partials.item_card')    
    </div>
    <h1 class="title-page mt-4 text-rob">Популярные категории</h1>
    
    <div class="category cards margin_30">
        @include('partials.cat_card')
    </div>
    
    <h1 class="title-page mt-4 text-rob">О сайте SportRent</h1>
    <p class="text-rob-20 mt-3">
        Спорт давно вышел за рамки простой физической активности и превратился в индустрию, которая охватывает огромные массы населения и занимает значительную часть мировой экономики. По статистике больше половины жителей России регулярно занимаются спортом и с каждым годом интерес россиян к активному отдыху с пользой для здоровья только растёт.
    </p>
    <p class="text-rob-20 mt-3">
        Спортивный инвентарь, предназначенный для активного отдыха, и СИМ (средства индивидуальной мобильности) имеют большой спрос. Но не все люди имеют возможность приобрести, обслуживать или хранить круглый год подобное снаряжение и технику. А владельцы средств передвижения или инвентаря, могут желать получить прибыль от собственности, которая простаивает, так как не используется каждый день.
    </p>
    <p class="margin_30 text-rob-20 mt-3 pb-4">
        Портал SportRent предназначен для решения решения данного вопроса. Благодаря SportRent вы сможете заключать надежные договора, которые будут выгодны всем: арендующий приобретает инвентарь или возможность использовать СИМ на определенное время, а арендодатель получает за это деньги.
    </p>    
</div>

@endsection