@extends('layouts.master')

@section('title', 'Liên hệ | Tan Phat Blog')

@section('content')
    <div class="ui one column center aligned padded grid">
        <div class="sixteen wide mobile ten wide tablet seven wide computer column">

            @include('layouts.component.message')

            <div class="ui green left aligned segment">
                <h3>Liên hệ qua mail</h3>
                <form action="/contact" class="ui form" method="post" id="form-contact">
                    {{ csrf_field() }}
                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label for="email">Email của bạn</label>
                        <input type="email" id="email" name="email">
                        @if ($errors->has('email'))
                            <span class="ui red top pointing basic label">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('subject') ? 'error' : '' }}">
                        <label for="subject">Tiêu đề mail</label>
                        <input type="text" id="subject" name="subject">
                        @if ($errors->has('subject'))
                            <span class="ui red top pointing basic label">
                                {{ $errors->first('subject') }}
                            </span>
                        @endif
                    </div>
                    <div class="field {{ $errors->has('message') ? 'message' : '' }}">
                        <label for="message">Nội dung nhắn</label>
                        <textarea name="message" id="message"  rows="3"></textarea>
                        @if ($errors->has('message'))
                            <span class="ui red top pointing basic label">
                                {{ $errors->first('message') }}
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <button class="ui fluid basic button green"><strong>Gửi</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#form-contact').form({
            fields: {
                email: {
                    identifier: 'email',
                    rules: [
                        {type: 'empty', prompt: 'Hãy nhập mail'},
                        {type: 'email', prompt: 'Hãy nhập địa chỉ mail hợp lệ'}
                    ]
                },
                subject: {
                    identifier: 'subject',
                    rules: [
                        {type: 'empty', prompt: 'Hãy nhập tiêu đề'}
                    ]
                },
                message: {
                    identifier: 'message',
                    rules: [
                        {type: 'empty', prompt: 'Hãy nhập tin nhắn'},
                        {type: 'minLength[5]', prompt: 'Tin nhắn ít nhất 5 ký tự'}
                    ]
                }
            },
            inline: true
        });
    </script>
@endpush