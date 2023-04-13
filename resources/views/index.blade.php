@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Form') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="">
                        @csrf
                        <div class="row mb-3">
                            <label for="npwp" class="col-md-4 col-form-label text-md-end">{{ __('NPWP') }}</label>

                            <div class="col-md-6">
                                <input id="npwp" type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" value="{{ old('npwp') }}" required autocomplete="npwp" autofocus>

                                @error('npwp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('NAMA') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="transaction" class="col-md-4 col-form-label text-md-end">{{ __('TRANSAKSI') }}</label>

                            <div class="col-md-6">
                                <select name="transaction" id="transaction" class="form-control @error('transaction') is-invalid @enderror" required>
                                    <option value="expor" @selected(old('transaction') == 'expor')>EXPOR</option>
                                    <option value="impor" @selected(old('transaction') == 'impor')>IMPOR</option>
                                </select>
                                @error('transaction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('NEGARA TUJUAN') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" required>
                                <input type="hidden" id="country_id" name="country_id">
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="harbor" class="col-md-4 col-form-label text-md-end">{{ __('PELABUHAN TUJUAN') }}</label>

                            <div class="col-md-6">
                                <input id="harbor" type="text" class="form-control @error('harbor') is-invalid @enderror" name="harbor" required>
                                <input type="hidden" id="harbor_id" name="harbor_id">
                                @error('harbor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hs_code" class="col-md-4 col-form-label text-md-end">{{ __('HS CODE') }}</label>

                            <div class="col-md-3">
                                <select name="hs_code" id="hs_code" class="form-control @error('hs_code') is-invalid @enderror" onchange="getHsCode($(this).val())" required>
                                    <option value="">PILIH</option>
                                    <option value="01063300">01063300</option>
                                    <option value="22030091">22030091</option>
                                </select>
                                @error('hs_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ur_hs_code" class="col-md-4 col-form-label text-md-end">{{ __('URAIAN / SUB HEADER') }}</label>

                            <div class="col-md-3">
                                <input id="ur_hs_code" type="text" class="form-control @error('ur_hs_code') is-invalid @enderror" name="ur_hs_code" required>
                                @error('ur_hs_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <input id="hd_hs_code" type="text" class="form-control @error('hd_hs_code') is-invalid @enderror" name="hd_hs_code" required>
                                @error('hd_hs_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qty" class="col-md-4 col-form-label text-md-end">{{ __('JUMLAH BARANG') }}</label>

                            <div class="col-md-6">
                                <input id="qty" type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" required>
                                @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('HARGA BARANG') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tarif" class="col-md-4 col-form-label text-md-end">{{ __('TARIF') }}</label>

                            <div class="col-md-6">
                                <input id="tarif" type="number" class="form-control @error('tarif') is-invalid @enderror" name="tarif" readonly>
                                @error('tarif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ppn" class="col-md-4 col-form-label text-md-end">{{ __('TARIF PPN') }}</label>

                            <div class="col-md-6">
                                <input id="ppn" type="number" class="form-control @error('ppn') is-invalid @enderror" name="ppn" readonly>
                                @error('ppn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total" class="col-md-4 col-form-label text-md-end">{{ __('TOTAL HARGA') }}</label>

                            <div class="col-md-6">
                                <input id="total" type="number" class="form-control @error('total') is-invalid @enderror" name="total" readonly>
                                @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function ajaxBarang(code) {
    $.ajax( {
      url: "api/barang",
      data: {
        hs_code: code
      },
      success: function( data ) {
        $('#ur_hs_code').val(data.uraian_id);
        $('#hd_hs_code').val(data.sub_header);
      }
    } )
  }
  function ajaxTarif(code) {
    $.ajax( {
      url: "api/tarif",
      data: {
        hs_code: code
      },
      success: function( data ) {
        var transaction = $('#transaction').children("option:selected").val();
        if (transaction == 'impor') {
          $('#tarif').val(data.bm);
          $('#ppn').val(data.ppnbm);
        } else {
          $('#tarif').val(data.bk);
          $('#ppn').val(data.ppnbk);
        }
      }
    } )
  }
  function getHsCode(code) {
      if (code == "") {
        $('#ur_hs_code').val("");
        $('#hd_hs_code').val("");
        $('#tarif').val("");
        $('#ppn').val("");
        return;
      }
      ajaxBarang(code)
      ajaxTarif(code)
  }
  $( function() {
    $('#transaction').change(function(){
      var selected = $(this).children("option:selected").val();
      if (selected === 'impor') {
        $('label[for=country]').text('NEGARA ASAL');
        $('label[for=harbor]').text('PELABUHAN ASAL');
      } else {
        $('label[for=country]').text('NEGARA TUJUAN');
        $('label[for=harbor]').text('PELABUHAN TUJUAN');
      }
    });
    $( "#country" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "api/negara",
          data: {
            ur_negara: request.term.toUpperCase()
          },
          success: function( data ) {
            response( data );
          }
        } )
      },
      minLength: 2,
      select: function( event, ui ) {
        this.value = ui.item.label;
        $(this).next("input").val(ui.item.value);
        getHarbor(ui.item.value);
        event.preventDefault();
      }
    } );
    var dataHarbor = [], cache = {};
    function getHarbor(id) {
      $.ajax( {
        url: "api/pelabuhan",
        data: {
          kd_negara: id
        },
        success: function( data ) {
          dataHarbor = data
        }
      } )
    }
    $( "#harbor" ).autocomplete({
      source: function (request, response) {
        var term = request.term.toLowerCase();
        if ( !(term in cache) ) {
          var matcher = new RegExp("\\b" + $.ui.autocomplete.escapeRegex(term), "i");
          cache[term] = dataHarbor.filter(function(harbor) {
            return matcher.test(harbor.label);
          });
        }
        response( cache[term] );
      },
      minLength: 3,
      select: function( event, ui ) {
        this.value = ui.item.label;
        $(this).next("input").val(ui.item.value);
        event.preventDefault();
      }
    } );
  })

  $('#price').change(function(){
        var total = 0;
        var harga = $(this).val();
        var tarif = $('#tarif').val();
        var ppn = $('#ppn').val();
        if (harga.length) {
            total = parseInt(harga) + (parseInt(tarif) * harga) + (parseInt(ppn) * harga);
        }
        $('#total').val(total);
    });
</script>
@endsection
