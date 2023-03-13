@extends('admin.layout.authenticate')
@section('main_contentAuthenticate')
    <div class="container">
        <center>
            <div class="middle">
                <div id="login">

                    <form role="form" method="POST" action="{{ route('admin.authenticate.postlogin') }}">
                        @csrf

                        <fieldset class="clearfix">

                            <p><span class="fa fa-user"></span>
                                <input type="text" name="email" placeholder="Nhập địa chỉ mail . . .">
                                @error('email')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </p> <!-- JS because of IE support; better: placeholder="Username" -->
                            <p><span class="fa fa-lock"></span><input type="password" name="password"
                                    placeholder="Nhập mật khẩu . . .">
                                @error('password')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </p> <!-- JS because of IE support; better: placeholder="Password" -->

                            <div>
                                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit"
                                        value="Sign In"></span>
                            </div>

                        </fieldset>
                        <div class="clearfix"></div>
                    </form>

                    <div class="clearfix"></div>

                </div> <!-- end login -->
                <div class="logo">LOGO

                    <div class="clearfix"></div>
                </div>

            </div>
        </center>
    </div>
@endsection
