@foreach ($kriteriases as $kk => $v)
  @php
    $psk = $ps->where('kriteria_id','=',$v->id);
  @endphp


  <br>
    <hr>
    <div class="clearfix"></div>
  <h4><strong>{!! $v->nama_kriteria !!}</strong></h4>
  <table class="table table-responsive" id="pemasokSubs-table">
    @if (!empty(count($psk)))
      <thead>
          <tr>
          <th>#</th>
          <th>Pemasok1</th>
          <th>Nilai</th>
          <th>Pemasok2</th>
          <th></th>
              <th colspan="3">Action</th>
          </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
      @foreach($psk as $pemasokSub)
          <tr>
              <td>{!! $no++ !!}</td>
              <td>{!! $p[$pemasokSub->pemasok1_id] !!}</td>
              <td>{!! $pemasokSub->nilai !!}</td>
              <td>{!! $p[$pemasokSub->pemasok2_id] !!}</td>
              <td></td>
              <td>
                  {!! Form::open(['route' => ['pemasokSubs.destroy', $pemasokSub->id], 'method' => 'delete']) !!}
                  <div class='btn-group'>
                      <a href="{!! route('pemasokSubs.edit', [$pemasokSub->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                  </div>
              </td>
          </tr>
      @endforeach
      </tbody>
    @else
      Data Kosong
    @endif
  </table>
@endforeach

