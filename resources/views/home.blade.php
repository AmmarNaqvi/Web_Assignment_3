@extends('layouts.app')

@section('content')
@if(isset($codes))
<div class="container spark-screen">
    <div class="row row-eq-height">
@foreach ((object)$codes as $code)
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">Code by: {{$code->user->name}} <br> 
                Last modified at: {{$code->updated_at}}
                </div>
                <div class="panel-body">
                    <textarea class="form-control" rows="10" name="code">{{ $code->code }}</textarea>
                </div>
            </div>
        </div>
@endforeach
    </div>
</div>
@else
<div class="container spark-screen">
    <div class="row row-eq-height">
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">Code: 
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/home') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-0">
                                <textarea class="form-control" rows="20" name="code">@if (isset($code)){{$code}}@endif</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-1 col-md-offset-9">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Execute
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">Result: 
                </div>

                <div class="panel-body">
                    @if (isset($code))
                        {!!$code!!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
