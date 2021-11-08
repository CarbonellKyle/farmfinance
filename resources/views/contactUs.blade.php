@extends('layouts.info', [
    'class' => 'login-page'
])

@section('developer')
    <section class="info_section" id="contact_us">
        <div class="content col-md-12 ml-auto mr-auto">
            <div class="header py-5 pb-7 pt-lg-9">
                <div class="container col-md-10">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-12">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card container pb-5" style="margin-top:-50px;" id="contact_card">
                <div class="container">
                    <h3 style="margin-top: -30px; opacity:0.4"><strong>{{ __('Contact') }}</strong>Us</h3>
                    <div class="row">
                        <div class="col-lg-2">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush
