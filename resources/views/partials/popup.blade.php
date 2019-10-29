<div class="popup -is-active" data-popup>
    <div class="popup__info" >
        <p class="popup__title title">
            Zapytaj o apartament
        </p>
        <p class="popup__subtitle subtitle">
            Apartamenty Juno
        </p>
        <img class="popup__image" src="@asset('images/bg-juno.jpg')" alt="">
    </div>
    <div class="popup__form form-box">
        {!! image($form_bg, 'full', 'form-box__bg') !!}
        <!-- form-box__content form -->
        <div class="form-box__content">
            @include('components.form')
        </div>
    </div>
    <button class="popup__close" data-toggle-popup></button>
</div>