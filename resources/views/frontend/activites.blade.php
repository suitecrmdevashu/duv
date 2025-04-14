@extends('frontend.layout.master', ['page_title' => 'Activites'])
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/principal-desk.css') }}"/>
@endpush

@section('content')
<div class="container about-section">
    <div class="container about-section">
        <div class="row principal-section" style="text-align:justify">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php
                $currentYear = date('Y');
                $nextYear = date('Y') + 1;
                ?>
                <h2 class="pt-4 font-weight-bold">Activity Schedule <?php echo $currentYear . '-' . $nextYear; ?></h2>

                <p></p>
                <div class="table-responsive">

                    <table border="" style="" class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>S.No</th>
                                <th>CELEBRATION</th>
                                <th>DATE</th>
                                <th>ACTIVITY</th>
                            </tr>
                            @php
                            $sequenceNumber = 1; 
                            @endphp
                            @foreach ($activities as $activitie)
                            <tr>
                                
                                <td><b>{{$sequenceNumber}}.</b></td>
                                <td>{{ $activitie->name}}</td>
                                <td>{{ \Carbon\Carbon::parse($activitie->date)->format('jS F Y') }}</td>
                                <td>{!! $activitie->activity !!}</td>
                            </tr>
                            @php
                            $sequenceNumber++; 
                        @endphp
                           @endforeach
                            {{-- <tr>
                                <td><b>2.</b></td>
                                <td>Ambedkar Jayanti</td>
                                <td>13th April</td>
                                <td>Small Skit in Hindi</td>
                            </tr>
                            <tr>
                                <td><b>3.</b></td>
                                <td>World heritage Day</td>
                                <td>18th April</td>
                                <td>Skit in English <br>
                                    Decoration of waste container [Class VI To XII] <br>
                                    Drawing competition on Indian Heritage [Class I to V]
                                    </td>
                            </tr>
                            <tr>
                                <td><b>4.</b></td>
                                <td>Earth Day</td>
                                <td>21st April</td>
                                <td>Plantation of Sapplings [Class I to III] <br>
                                    Creative paragraph writing Topic – How to save earth [Class IV to XII] "GO GREEN"
                                    </td>
                            </tr>
                            <tr>
                                <td><b>5.</b></td>
                                <td>Labour Day</td>
                                <td>1st May</td>
                                <td>Thankyou card / flower making [Class I to V – gifting them to helper, peon guard] <br>
                                    Collage making on daily hepers [Class VI To VIII]
                                    </td>
                            </tr>
                            <tr>
                                <td><b>6.</b></td>
                                <td>Mother's Day Celebration</td>
                                <td>12th May</td>
                                <td>Song In Assembly 
                                    Making Cards For Mothers [Class I To V] <br>
                                    Writing On "Memories Of Mom" [Class VI to XII]
                                    Topic :- <br>a)My favourite holiday memory with mom. <br>
                                                 b) Best advice my mother gave me
                                    </td>
                            </tr>
                            <tr>
                                <td><b>8.</b></td>
                                <td>Independence Day </td>
                                <td>15th August</td>
                                <td>Flag Hoisting / Speech /Cultural Programme .</td>
                            </tr>
                            <tr>
                                <td><b>9.</b></td>
                                <td>Raksha Bandhan</td>
                                <td>29th August</td>
                                <td>Rakhi Making Competition [Class I to V] <br>
                                    Thali Decoration [Class VI to  XII]
                                    </td>
                            </tr>
                            <tr>
                                <td><b>10.</b></td>
                                <td>Teacher Day Celebration </td>
                                <td>5th September</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>11.</b></td>
                                <td>Janmashtami </td>
                                <td>6th September</td>
                                <td>Story telling on krishna's life [Class I to V] <br>
                                    Tearing & pasting on Janmashtami theme [VI to VIII] <br>
                                    Pot decoration [Class IX To XII]
                                    </td>
                            </tr>
                            <tr>
                                <td><b>12.</b></td>
                                <td>Dussehra </td>
                                <td></td>
                                <td>Cartoon mask making [Class VI to XII] <br>
                                    Story telling on "Burai par achari ki jeet" By class / Hindi Teacher's [Class I to V]
                                    </td>
                            </tr>
                            <tr>
                                <td><b>13.</b></td>
                                <td>Gandhi Jayanti  </td>
                                <td>1st October</td>
                                <td>Skit on Gandhi</td>
                            </tr>
                            <tr>
                                <td><b>14.</b></td>
                                <td>Diwali Celebration </td>
                                <td>10th October</td>
                                <td>Diya/ Class Decoration [Class I to V]  <br>
                                    Fireless cooking /Class decoration [Class VI to XII] <br>
                                    Rangoli competition [Class IX to XII]
                                    </td>
                            </tr>
                            <tr>
                                <td><b>15.</b></td>
                                <td>Run For Unity</td>
                                <td>31st October</td>
                                <td>Pledge
                                    </td>
                            </tr>
                            <tr>
                                <td><b>16.</b></td>
                                <td>Children's Day </td>
                                <td>14th November</td>
                                <td>
                                    </td>
                            </tr>
                            <tr>
                                <td><b>17.</b></td>
                                <td>Christmas Celebration</td>
                                <td>24th December</td>
                                <td>Classboard decoration
                                    Small skit on Jesus
                                    Hymns and Songs</td>
                            </tr>
                            <tr>
                                <td><b>18.</b></td>
                                <td> Republic Day <br> Road Safety Activity
                                    </td>
                                <td>26th January</td>
                                <td>Flag hoisting /Speech/Cultural programme
                                    Pledge on road safety rules.
                                    </td>
                            </tr> --}}
                            
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>

</div>
</div>
@endsection