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
                    <div class="row container">
                        <div class="col-6">
                            <div class="card" style="height: 330px">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>Mr. Amor Urbanozo</strong></h3>
                                    <p class="card-category" style="margin-top: -15px">Farm Owner</p>
                                </div>
                                <div class="card-body" style="margin-top: -20px">
                                    <h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                        </svg> 09751726326 <br>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card" style="height: 330px">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>Kyle Carbonell</strong></h3>
                                    <p class="card-category" style="margin-top: -15px">Developer</p>
                                </div>
                                <div class="card-body" style="margin-top: -20px">
                                    <h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                        </svg> 09298346631 <br>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                        </svg> s.carbonell.kyle@cmu.edu.ph
                                    </h3>
                                </div>
                            </div>
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
