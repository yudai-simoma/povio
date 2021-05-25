<!-- ルーム作成ページ -->
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('ルーム作成') }}</div>
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

          <div class="card-body">
            <form action="{{ url('rooms') }}" method="POST">
              @csrf
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ルーム名') }}</label>

                  <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                      @error('name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                    <label for="supplement" class="col-md-4 col-form-label text-md-right">{{ __('ルームの説明') }}</label>

                    <div class="col-md-6">
                        <textarea rows="10" cols="10" id="name" class="form-control @error('supplement') is-invalid @enderror" name="supplement" required autocomplete="supplement" autofocus>{{ old('supplement') }}</textarea>

                        @error('supplement')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('ルームの金額') }}</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('動画の本数') }}</label>

                    <div class="col-md-6">
                        <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>

                        @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                <a href="/povio" class="float3"><span class="btn new-btn-primary">戻る</span></a>
                <button type="submit" class="btn btn-primary">
                  {{ __('作成') }}
                </button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection