@php

// Check if component is load in basket
$basket = $title == 'Koszyk' ? 1 : 0;
$searchLink = option('search_link');

$invests = [];
    $query = new WP_Query(array(
        'post_type' => 'inwestycje',
        'post_status' => 'publish'
    ));


    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $post  = get_post($post_id);

        $img = get_field('logo_dark', $post->ID)['ID'];
        if(!$img) {
          $img = get_field('logo', $post->ID)['ID'];
        }

        $invest = [
            'name' => $post->post_title,
            'slug' => $post->post_name,
            'img' => $img,
        ];

        array_push($invests, $invest);
    }

    wp_reset_query();

    function get_invest_img($name, $invests) {
      foreach ($invests as $invest) {
        $investName = explode(' ', $invest['name'])[0];
        $investName = mb_strtoupper($investName);

        if (strpos($name, $investName) !== false)
          return $invest['img'];
        elseif (strpos($investName, $name) !== false)
          return $invest['img'];

        $investName = mb_strtoupper($invest['name']);
        if (strpos($name, $investName) !== false)
          return $invest['img'];
        elseif (strpos($investName, $name) !== false)
          return $invest['img'];
      }
      return $name;
    }

    $names = mb_strtoupper(explode(' ',$invests[0]['name'])[1]);
    $namesI = 'OLIWKOWE';

@endphp

<div class="table-responsive">
    <div class="table-responsive__header">
      <div class="table-responsive__cell">
        <h3 class="section__title title">
          {{ $title or ' Wyniki wyszukiwania' }}
        </h3>
        @if ($basket)
        <a href="{{ $searchLink }}" class="button table-responsive__button">
          Powrót do listy mieszkań
        </a>
        @endif
      </div>
      <div class="table-responsive__cell table-responsive__cell--switcher">
        <span class="minor-text filtr__label filtr__label--switcher -is-active">LISTA</span>
        <button class="filtr__switcher" data-table-switcher></button>
        <span class="minor-text filtr__label filtr__label--switcher">RZUTY</span>
      </div>
    </div>
    <table class="flat-table -is-active" data-table=1>
        <thead>
            <tr>
                @if (!is_single())
                <th data-sorter="data-district"><?= __('Nazwa Inwestycji', 'peira'); ?></th>
                @endif
                <th><?= __('Numer', 'peira'); ?></th>
                <th><?= __('Pokoje', 'peira'); ?></th>
                <th><?= __('Piętro', 'peira'); ?></th>
                <th>
                  @if (is_single())
                  <?= __('Powierzchnia', 'peira'); ?> <span class="text-lowercase">[m²]</span>
                  @else
                  <?= __('Pow.', 'peira'); ?>
                  @endif
                </th>
                <th><?= __('Cena', 'peira'); ?> <span class="text-lowercase">[zł]</span></th>
                <th><?= __('Status', 'peira'); ?></th>
                <th data-sorter="false"><?= __('Karta', 'peira'); ?></th>
                <th data-sorter="false">
                  @if($basket)
                  <?= __('Usuń', 'peira'); ?>
                  @else
                  <?= __('Do koszyka', 'peira'); ?>
                  @endif
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flats as $flat) : if ($flat) : ?>
              @php
                $inCart = 0;
                if($_SESSION['cart']) {
                  foreach ($_SESSION['cart'] as $elem ) {
                    if($elem['invest'] == $flat['investment'] && $elem['id'] == $flat['id']) {
                      $inCart = 1;
                    }
                  }
                }

              @endphp
                    <tr data-flat-content data-minstaircase="<?= $flat['minstaircase'] ?>" data-staircase="<?= $flat['staircase']; ?>" data-id="<?= $flat['id']; ?>" data-floor="<?= $flat['floor']; ?>" data-price="<?= $flat['price']; ?>" data-price2="<?= $flat['price2']; ?>" data-rooms="<?= $flat['rooms']; ?>" data-area="<?= $flat['area']; ?>" data-state="<?= $flat['state']['value']; ?>" data-city="Łódź" data-district="<?= $flat['investment']; ?>">
                        @if(!is_single())
                        <td data-label="<?= __('Nazwa inwestycji', 'peira'); ?>">
                          <span hidden><?= $flat['investment']; ?></span>
                            {!! image(get_invest_img($flat['investment'], $invests),'full', 'table__logo') !!}
                         </td>
                        @endif
                        <td data-label="<?= __('Numer', 'peira'); ?>">
                           <?= $flat['id']; ?>
                        </td>
                        <td data-label="<?= __('Pomieszczenia', 'peira'); ?>"><?= $flat['rooms']; ?></td>
                        <td data-label="<?= __('Piętro', 'peira'); ?>"><?= $flat['floor']; ?></td>
                        <td data-label="<?= __('Powierzchnia', 'peira'); ?>"><?= str_replace('.', ',', $flat['area']); ?> m²</td>
                        <td data-label="<?= __('Cena', 'peira'); ?>">
                            <?php if ($flat['state']['value'] === 'sale') : ?>
                                <span class="price--old"><?= $flat['price2']; ?> zł</span>
                                <span class="price" data-name="price"><?= $flat['price']; ?> zł</span>
                            <?php else : ?>
                                <span class="price" data-name="price"><?= $flat['price']; ?> zł</span>
                            <?php endif; ?>
                        </td>
                        <td data-label="<?= __('Status', 'peira'); ?>">
                            <span class="button button--status button--<?= $flat['state']['value']; ?>"><?= $flat['state']['label']; ?></span>
                        </td>
                        <td data-label="<?= __('Karta', 'peira'); ?>">
                            <a target="_blank" href="{{ getPlanLink($flat) }}">
                                @include('svg.download')
                            </a>
                        </td>
                        <td data-label="<?= __('Dodaj do koszyka', 'peira'); ?>">
                          @if($basket)
                          <a href="{{ home_url('/koszyk') }}/?cart_remove={{ $flat['investment'].'-'.$flat['id'] }}" data-cart-remove="{{ $flat['investment'].'-'.$flat['id'] }}" class="star @if($inCart) -is-active @endif">
                            @include('svg.trash')
                          </a>
                          @else
                            <a href="{{ home_url('/koszyk') }}/?cart_add={{ $flat['investment'].'-'.$flat['id'] }}" data-cart-add="{{ $flat['investment'].'-'.$flat['id'] }}" class="star @if($inCart) -is-active @endif">
                                @include('svg.cart')
                            </a>
                          @endif
                        </td>
                    </tr>
            <?php endif;
            endforeach; ?>

            @if(!$flats)
            <tr><td style='text-align: left;padding-left: 30px;' colspan='8'>Twój koszyk jest pusty <a href="../znajdz_mieszkanie/" class="button table-responsive__button">
              Wróć do listy mieszkań
            </a><td></tr>
            @endif
        </tbody>
    </table>

    @if($flats)
    <ul class="drafts" data-plans="1">
      <?php foreach ($flats as $flat) : ?>

      @php
        $inCart = 0;
        if($_SESSION['cart']) {
          foreach ($_SESSION['cart'] as $elem ) {
            if($elem['invest'] == $flat['investment'] && $elem['id'] == $flat['id']) {
              $inCart = 1;
            }
          }
        }

      @endphp

      <li class="drafts__elem" data-flat-content data-minstaircase="<?= $flat['minstaircase'] ?>" data-staircase="<?= $flat['staircase']; ?>" data-id="<?= $flat['id']; ?>" data-floor="<?= $flat['floor']; ?>" data-price="<?= $flat['price']; ?>" data-price2="<?= $flat['price2']; ?>" data-rooms="<?= $flat['rooms']; ?>" data-area="<?= $flat['area']; ?>" data-state="<?= $flat['state']['value']; ?>" data-city="Łódź" data-district="<?= $flat['investment']; ?>">

        <img src="{{ getImgLink($flat) }}" alt="Rzut mieszkania {{ $flat['staircase'] .'-'.$flat['id'] }}"  class="drafts__title">

        <div class="drafts__summary">
          {{-- CENA --}}
          <div class="drafts__info-wraper">
            <div class="drafts__label">
              CENA:
            </div>
            <?php if ($flat['state']['value'] === 'sale') : ?>
                <span class="price--old"><?= $flat['price2']; ?> zł</span>
                <span class="price" data-name="price"><?= $flat['price']; ?> zł</span>
            <?php else : ?>
                <span class="price" data-name="price"><?= $flat['price']; ?> zł</span>
            <?php endif; ?>
          </div>
          {{-- STATUS --}}
          <div class="drafts__info-wraper">
            <span class="button button--status button--<?= $flat['state']['value']; ?>"><?= $flat['state']['label']; ?></span>
          </div>
          {{-- POWIERZCHNIA --}}
          <div class="drafts__info-wraper">
            <div class="drafts__label">
              POWIERZCHNIA:
            </div>
            <?= str_replace('.', ',', $flat['area']); ?> m²</td>
          </div>
          {{-- POKOJE --}}
          <div class="drafts__info-wraper">
            <div class="drafts__label">
              POKOJE:
            </div>
            <?= $flat['rooms']; ?>
          </div>
          {{-- Koszyk --}}
          <div class="drafts__info-wraper">
            @if($basket)
            <a href="{{ home_url('/koszyk') }}/?cart_remove={{ $flat['investment'].'-'.$flat['id'] }}" data-cart-remove="{{ $flat['investment'].'-'.$flat['id'] }}" class="star @if($inCart) -is-active @endif">
              @include('svg.trash')
            </a>
            @else
              <a href="{{ home_url('/koszyk') }}/?cart_add={{ $flat['investment'].'-'.$flat['id'] }}" data-cart-add="{{ $flat['investment'].'-'.$flat['id'] }}" class="star @if($inCart) -is-active @endif">
                  @include('svg.cart')
              </a>
            @endif
          </div>
        </div>
      </li>
      <?php endforeach ;?>
    </ul>
    @endif

    @if (count($flats) > 10 )
    @php
        $num = count($flats) / 10
    @endphp
    <nav class="table-nav">
        <ul class="table-nav__list">
            <li class="table-nav__elem">
               <button class="table-nav__button table-nav__button--prev" data-table-nav="prev">
                   @include('svg.arrow')
                </button>
            </li>
            @for ($i = 1; $i < $num + 1; $i++)
            <li class="table-nav__elem">
                <button data-table-nav="{{ $i }}" class="table-nav__button @if($i == 1) -is-active @endif">
                    {{ $i }}
                </button>
            </li>
            @endfor
            <li class="table-nav__elem">
                <button  class="table-nav__button table-nav__button--next" data-table-nav="next">
                    @include('svg.arrow')
                </button>
            </li>
        </ul>
    </nav>
    @endif
</ul>
