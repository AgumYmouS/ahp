@php
$bobotKriteria = $GLOBALS['bobotKriteriaList'];
$bobotPemasok = $GLOBALS['bobotPemasokList'];

// dd($bobotKriteria);
$bobotFixSub = [];
    foreach ($pemasoks as $vpl){
      $hsl = 0;
      
    foreach ($bobotKriteria as $kkl => $vkl) {
        $hsl += $bobotPemasok[$kkl][$vpl->id] * $vkl;
    }
    $bobotFixSub[$vpl->id] = $hsl;
  }
  
@endphp
{!! Charts::styles() !!}
              @php
                $listRank = null;
              @endphp
          @foreach ($pemasoks as $kmo)
            @php
              $listRank[$kmo->nama_pemasok] = $bobotFixSub[$kmo->id];;
            @endphp
          @endforeach
          @php
            // dd($listRank);

          @endphp
          @if ($listRank != null)
            @php
            $namaP = [];
            $bobotP = [];
            foreach ($listRank as $y => $ue) {
              $namaP[] = $y;
              $bobotP[] = $ue;
            }
            // $colors = [];
            // foreach ($bobotP as $bk => $bv) {
            //   $colors[] = rgb(0,$bv, 1);
            // }
            // dd($colors);
            $chart->title('Rangking Pemasok')
                  ->labels($namaP)
                  ->values($bobotP)
                  ->elementLabel('Pemasok');
              arsort($listRank);
              $no = 1;
            @endphp
      <div class="clearfix"></div>
        <div class="box box-primary">
          <div class="box-body">
            <div class="chart">
              {!! $chart->html() !!}
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
          <div class="box box-primary">
              <div class="box-body">
            <table class="table table-responsive" id="hasil-table">

                <thead style="font-weight: bold">
                <tr>
                  <th>Peringkat</th>
                  <th>Nama Pemasok</th>
                  <th>Bobot</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($listRank as $kli => $vli)
                  <tr>
                    <td>{!! $no++ !!}</td>
                    <td>{!! $kli !!}</td>
                    <td>{!! round($vli,5) !!}</td>
                  </tr>
                @endforeach

            </tbody>
        </table>
      @endif
        <hr>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
