@php
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

@dump($invests)

<div class="table-responsive">
    <h3 class="section__title title">
        Wyniki wyszukiwania
    </h3>
    <table class="flat-table" data-table=1>
        <thead>
            <tr>
                @if (!is_single())
                <th><?= __('Nazwa Inwestycji', 'peira'); ?></th>
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
                <th data-sorter="false"><?= __('Do koszyka', 'peira'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flats as $flat) : if ($flat) : ?>

                    <tr data-flat-content data-minstaircase="<?= $flat['minstaircase'] ?>" data-staircase="<?= $flat['staircase']; ?>" data-id="<?= $flat['id']; ?>" data-floor="<?= $flat['floor']; ?>" data-price="<?= $flat['price']; ?>" data-price2="<?= $flat['price2']; ?>" data-rooms="<?= $flat['rooms']; ?>" data-area="<?= $flat['area']; ?>" data-state="<?= $flat['state']['value']; ?>" data-city="Łódź" data-district="<?= $flat['investment']; ?>">
                        @if(!is_single())
                        <td data-label="<?= __('Nazwa inwestycji', 'peira'); ?>">
                            {!! image(get_invest_img($flat['investment'], $invests),'full', 'table__logo') !!}
                         </td>
                        @endif
                        <td data-label="<?= __('Numer', 'peira'); ?>">
                           <?= $flat['id']; ?>
                        </td>
                        <td data-label="<?= __('Pomieszczenia', 'peira'); ?>"><?= $flat['rooms']; ?></td>
                        <td data-label="<?= __('Piętro', 'peira'); ?>"><?= $flat['floor']; ?></td>
                        <td data-label="<?= __('Powierzchnia', 'peira'); ?>"><?= $flat['area']; ?> m²</td>
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
                            <a target="_blank" href="
                                <?php
                                        $inwestycja = $flat['investment'];
                                        if ($inwestycja === 'OLIWKOWE') {
                                            echo ('https://oliwkowe.com/mieszkanie/' . $flat['id'] . '/');
                                        } else if ($inwestycja === 'HELIŃSKIEGO PARK') {
                                            echo ('http://helinskiego.pl/wp-content/uploads/2018/12/nowe-KARTY-lok.' . substr($flat['id'], 2) . '_A4.pdf');
                                        } else if ($inwestycja === 'SREBRZYŃSKA PARK 1') {
                                            $lid = 'B1' . 'P' . $flat['floor'] . 'M' . $flat['staircase'] . '' . $flat['minstaircase'];
                                            echo ('https://www.srebrzynskapark.pl/znajdz-mieszkanie/wyszukiwarka-graficzna/#m-' . $lid);
                                        } else if ($inwestycja === 'SREBRZYŃSKA PARK 2') {
                                            $lid = 'B2' . 'P' . $flat['floor'] . 'M' . $flat['staircase'] . '' . $flat['minstaircase'];
                                            echo ('https://www.srebrzynskapark.pl/znajdz-mieszkanie/wyszukiwarka-graficzna/#m-' . $lid);
                                        } else if ($inwestycja === 'SREBRZYŃSKA PARK III') {
                                            $lid = 'B3M' . $flat['id'];
                                            echo ('https://www.srebrzynskapark.pl/znajdz-mieszkanie/wyszukiwarka-graficzna/#m-' . $lid);
                                        } else {
                                            echo ('#');
                                        }
                                        ?>
                            ">
                                @include('svg.download')
                            </a>
                        </td>
                        <td data-label="<?= __('Dodaj do koszyka', 'peira'); ?>">
                            <a href="{{ home_url('/koszyk') }}/?cart_add={{ $inwestycja.'-'.$flat['id'] }}" data-cart-add="{{ $inwestycja.'-'.$flat['id'] }}" class="star">
                                @include('svg.cart')
                            </a>
                        </td>
                    </tr>
            <?php endif;
            endforeach; ?>
        </tbody>
    </table>

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
</div>
