@extends('frontend.layout.master', ['page_title' => 'Admission'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}"/>
@endpush

@section('content')
<div class="bg-light">
    <div class="container about-section">
        <div class="admission-session">
            <h2 class="pt-4 font-weight-bold">Admission Procedure</h2> <a href="{{asset('doc/Vishal_Prospectus.pdf')}}" target="_blank"><button class="button button1" style="margin-left: 10rem;">Download Prospectus <i class="fa fa-download" aria-hidden="true"></i></button></a> 
        </div>
       
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-success">
            <div class="accordion" id="accordionExample">
    @foreach($admissions as $admission)
        <div class="card mb-3">
            <div class="card-header" id="heading{{ $admission->id }}">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapse{{ $admission->id }}" aria-expanded="true"
                            aria-controls="collapse{{ $admission->id }}">
                        {{ $admission->title }}
                    </button>
                </h2>
            </div>

            <div id="collapse{{ $admission->id }}" class="collapse" aria-labelledby="heading{{ $admission->id }}"
                    data-parent="#accordionExample">
                <div class="card-body">
                   {!! htmlspecialchars_decode($admission->content) !!}
                </div>
            </div>
        </div>
    @endforeach
</div>

        </div>

        <h2 class="pt-4 font-weight-bold">Fee Structure</h2>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-primary">
            <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingfee">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapsefee" aria-expanded="true" aria-controls="collapsefee">
                        Fee Structure
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapsefee" class="collapse" aria-labelledby="headingfee" data-parent="#accordionExample">
                    <div class="card-body">
                        <!--Fees under Monthly Fee Column is Composite Monthly Fee. No Other Charges apart from it. Admission Fee is One Time Chargeable.-->
                    <div class="admission-session">
                    @foreach ($feestructures as $feestructure)
                     @if (Str::endsWith($feestructure->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img src="{{ asset($feestructure->file_path) }}" target="_blank" alt="Image" width="100">
                    @elseif (Str::endsWith($feestructure->file_path, '.pdf'))
                        <a href="{{ asset($feestructure->file_path) }}" target="_blank"><button class="button button1">{{ $feestructure->name}} <i class="fa fa-download" aria-hidden="true"></i></button></a>
                    @endif
                    @endforeach
                    </div>
                    </div>
                  </div>
                </div>
                
              </div>
        </div>


        <h2 class="pt-4 font-weight-bold">Bus Routes</h2>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 alert alert-primary">
            <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingfee">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapsebus" aria-expanded="true" aria-controls="collapsebus">
                        Bus Routes
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapsebus" class="collapse" aria-labelledby="headingfee" data-parent="#accordionExample">
                    <div class="card-body">
                        <!--Fees under Monthly Fee Column is Composite Monthly Fee. No Other Charges apart from it. Admission Fee is One Time Chargeable.-->
                    <div class="admission-session">
                    @foreach ($feestructures as $feestructure)
                     @if (Str::endsWith($feestructure->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img src="{{ asset($feestructure->file_path) }}" target="_blank" alt="Image" width="100">
                    @elseif (Str::endsWith($feestructure->file_path, '.pdf'))
                        <a href="{{ asset($feestructure->file_path) }}" target="_blank"><button class="button button1">{{ $feestructure->name}} <i class="fa fa-download" aria-hidden="true"></i></button></a>
                    @endif
                    @endforeach
                    </div>
                    </div>
                  </div>
                </div>
                
              </div>
        </div>

    </div>

</div>
@endsection

