@extends('layouts.master')

@section('content')
    <div class="ui one column center aligned grid padded">
        <div class="sixteen wide mobile ten wide tablet six wide computer column">

            <h2 class="ui icon header">
                <i class="privacy icon" style="font-size: 2em"></i> Reset mật khẩu
            </h2>

            @if (session('status'))
                <div class="ui small positive message">
                    {{--{{ session('status') }}--}}
                    Vui lòng kiểm tra mail box để xác nhận reset mật khẩu
                </div>
            @endif
            <div class="ui raised segment">

                <form action="{{ route('password.email') }}" class="ui form" method="post">
                    {{ csrf_field() }}

                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <div class="ui left icon input">
                            <input type="email" name="email" id="email" placeholder="Email" required value="{{ old('email') }}">
                            <i class="mail icon"></i>
                        </div>
                        @if ($errors->has('email'))
                            <span class="ui red top pointing basic label">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>

                    <div class="field">
                        <button class="ui blue fluid button"><strong>Gửi yêu cầu</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

