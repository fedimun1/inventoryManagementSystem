@extends('admin.adminheader')

@section('content')
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style="margin-left: 200px ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Register Staff </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/registerStaff">
                     @csrf
              <div class="box-body">
                
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                      <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                      <div class="col-md-6">
                      <input name="phone" type="Number" class="form-control ">
                       </div>
                      </div>
                      <br>
                   <div class="form-group row">
                 <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Department ') }}</label>
                 <div class="col-md-6">
                  <select name="dep_id" class="form-control" required="required">
                    @foreach($Department as $dep)
                      <option value="{{$dep->id}}">{{$dep->dep_name}} </option>
                  @endforeach
                    </select>
                    </div>
                  </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
@endsection
