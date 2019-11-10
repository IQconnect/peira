<div class="table-responsive">
    <h3 class="section__title title">
        Wyniki wyszukiwania
    </h3>
    <table class="flat-table" data-table=1>
        <thead>
            <tr>
                <th><?= __('Numer', 'peira'); ?></th>
                <th><?= __('Pokoje', 'peira'); ?></th>
                <th><?= __('Piętro', 'peira'); ?></th>
                <th><?= __('Powierzchnia', 'peira'); ?> <span class="text-lowercase">[m²]</span></th>
                <th><?= __('Cena', 'peira'); ?> <span class="text-lowercase">[zł]</span></th>
                <th><?= __('Status', 'peira'); ?></th>
                <th data-sorter="false"><?= __('Karta', 'peira'); ?></th>
                <th data-sorter="false"><?= __('Do koszyka', 'peira'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flats as $flat) : if ($flat) : ?>

                    <tr data-flat-content data-minstaircase="<?= $flat['minstaircase'] ?>" data-staircase="<?= $flat['staircase']; ?>" data-id="<?= $flat['id']; ?>" data-floor="<?= $flat['floor']; ?>" data-price="<?= $flat['price']; ?>" data-price2="<?= $flat['price2']; ?>" data-rooms="<?= $flat['rooms']; ?>" data-area="<?= $flat['area']; ?>" data-state="<?= $flat['state']['value']; ?>" data-city="Łódź" data-district="<?= $flat['investment']; ?>">
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
                            <button data-addtocart class="star">
                                @include('svg.cart')
                            </button>
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
