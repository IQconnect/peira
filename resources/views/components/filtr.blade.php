@php
$filtr = [
    [
        'title' => 'POWIERZCHNIA (m²)',
        'name'  => 'area',
        'from'  => 30,
        'to'  => 70,
    ],
    [
        'title' => 'ZAKRES CENOWY (zł)',
        'name'  => 'price',
        'from'  => 0,
        'to'  => 600000,
    ],
    [
        'title' => 'ILOŚĆ POKOI',
        'name'  => 'rooms',
        'from'  => 0,
        'to'  => 4,
    ],
    [
        'title' => 'PIĘTRO',
        'name'  => 'floor',
        'from'  => 0,
        'to'  => 5,
    ],
];
$name = mb_strtoupper (get_the_title());
$flats = get_flats_from_invest($name);
$free = get_free_flats($flats);
$sale = get_sale_flats($flats);
@endphp

@if ($filtr)
<div class="filtr">
    @foreach ($filtr as $item)
    <div class="filtr__cell">
        <label class="filtr__label minor-text">
            {{ $item['title'] }}
        </label>
        <div class="filtr__input-wrapper">
            <input class="filtr__input minor-text" type="number" name="{{ $item['name'] }}_from" value="{{ $item['from'] }}">
            <input class="filtr__input minor-text" type="number" name="{{ $item['name'] }}_to" value="{{ $item['to'] }}">
        </div>
    </div>
    @endforeach
    <div class="filtr__cell">
        <div class="filtr__input-wrapper">
            @if (count($free))
            <div class="filtr__checkbox-wrapper">
                <input type="checkbox" id="free" name="free" class="filtr__checkbox filtr__input">
                <div class="filtr__input filtr__input--checkbox"></div>
                    
                <label class="filtr__label minor-text" for="free">
                    {{ __('Wolne') }} 
                    <span class="filtr__label--special">
                        ({{ count($free) }})
                    </span>
                </label>
            </div>
            @endif

            @if (count($sale))
            <div class="filtr__checkbox-wrapper">
                <input type="checkbox" id="sale" name="sale" class="filtr__checkbox filtr__input">
                <div class="filtr__input filtr__input--checkbox"></div>
                <label class="filtr__label minor-text" for="sale">
                    {{ __('Promocja') }} 
                    <span class="filtr__label--special">
                        ({{ count($sale) }})
                    </span>
                </label>
            </div>
            @endif
        </div>
    </div>
</div>
@endif