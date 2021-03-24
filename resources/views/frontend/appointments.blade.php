@extends('layouts.frontend.app') @section('title','Appointment Request') {{-- head start --}} @section('extra-css')

<style type="text/css">
    .dropdown-toggle::after {
        display: none;
    }
</style>
@endsection {{-- head end --}} {{-- content section start --}} 
@section('content')
    <section class="main_padding pt-2 pb-2 nav-bg-img robotoRegular">
        @include('includes.frontend.navbar')
    </section>
    @include('common.messages')
    @include('includes.frontend.navigations')
    <section class="main_padding pt-70">
        <form action="{{ route('store.appointment') }}" method="POST">
            @csrf
            <input type="hidden" name="rate" id="rate" value="{{ $service->rate }}" />
            <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}" />
            <input type="hidden" name="time" id="time" value="{{ $service->timing }}" />
            <input type="hidden" name="specialist_id" id="specialist_id" value="{{ $service->specialist_id }}" />
            <input type="hidden" name="date" id="date" value="" />
            <div class="row m-0 justify-content-between flex-nowrap">
                <div class="col-lg-3 col-md-3 light mw-33 p-0">
                    <div class="calendar robotoRegular calender_Shadow pl-2 pr-2 pt-3 pb-3">
                        <div class="calendar__month">
                            <div class="cal-month__previous"><</div>
                            <div class="cal-month__current"></div>
                            <div class="cal-month__next">></div>
                        </div>
                        <div class="calendar__head border-bottom">
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                        </div>
                        <div class="calendar__body pt-3">
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9 col-md-9 mw-67 pl-3 pb-4 pr-3 calender_Shadow borderRadius-12px">
                    <div class="row m-0 pt-4">
                        <div class="col-md-6 col-lg-6 p-0">
                            <div class="d-flex">
                                <div><img src="{{ asset('assets/frontend/images/Group198.png') }}" alt="" class="img-fluid w-75" /></div>
                                <div class="f-21 robotoRegular cl-000000 pl-3">
                                    Morning + Afternoon
                                    <div class="f-16 cl-878787">9:00 AM to 2:00 PM</div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6 col-lg-6 p-0 robotoRegular">
                            <button type="button" class="close cl-3ac754" aria-label="Close"><span class="ml-auto cl-3ac754">close</span> <span class="pt-2" aria-hidden="true">&times;</span></button>
                        </div> --}}
                    </div>
                    <div class="row m-0 pt-4">
                        <div class="col-md-12 p-0 justify-content-between d-flex">
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border pt-2 rounded w-100 pb-2" >
                                    <input type="radio" name="time" class="bg-success btnclass" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '9:00 AM')
                                            disabled
                                        @endif
                                    @endforeach value="9:00 AM" />
                                    <span class="checkmark pl-2">9:00 AM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark btnclass" value="9:20 AM"  @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '9:20 AM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">9:20 AM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark btnclass" value="9:40 AM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '9:40 AM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">9:40 AM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark btnclass" value="10:00 AM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '10:00 AM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">10:00 AM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark btnclass" value="10:20 AM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '10:20 AM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">10:20 AM</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 pt-4">
                        <div class="col-md-12 p-0 justify-content-between d-flex">
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success btnclass" value="10:50 AM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '10:50 AM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="checkmark pl-2">10:50 AM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark btnclass" value="11:30 AM"@foreach ($appointments as $appointment)
                                        @if ($appointment->time == '11:30 AM')
                                            disabled
                                        @endif
                                    @endforeach />
                                    <span class="Time pl-2">11:30 AM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark btnclass" value="11:45 AM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '11:45 AM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">11:45 AM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark btnclass" value="12:15 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '12:15 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">12:15 PM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark btnclass" value="1:00 PM"@foreach ($appointments as $appointment)
                                        @if ($appointment->time == '1:00 PM')
                                            disabled
                                        @endif
                                    @endforeach />
                                    <span class="Time pl-2">1:00 PM</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="border w-100 mt-5"></div>
                    <section class="pt-4">
                        <div class="d-flex">
                            <div><img src="{{ asset('assets/frontend/images/Group198.png') }}" alt="" class="img-fluid w-75" /></div>
                            <div class="f-21 robotoRegular cl-000000 pl-3">
                                Evening
                                <div class="f-16 cl-878787">5:00 AM to 9:00 PM</div>
                            </div>
                        </div>
                    </section>
                    <div class="row m-0 pt-4">
                        <div class="col-md-12 p-0 justify-content-between d-flex">
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success" value="5:00 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '5:00 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="checkmark pl-2">5:00 PM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark" value="5:20 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '5:20 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">5:20 PM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark" value="5:40 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '5:40 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">5:40 PM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark" value="6:00 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '6:00 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">6:00 PM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark" value="6:20 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '6:20 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">6:20 PM</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 pt-4">
                        <div class="col-md-12 p-0 justify-content-between d-flex">
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success" value="6:50 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '6:50 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="checkmark pl-2">6:50 PM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark" value="7:30 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '7:30 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">7:30 PM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark" value="7:40 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '7:40 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">7:40 PM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark" value="8:15 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '8:15 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">8:15 PM</span>
                                </label>
                            </div>
                            <div class="robotoRegular cl-878787 col-md-2 text-center p-0">
                                <label class="border container1 pt-2 rounded w-100 pb-2">
                                    <input type="radio" name="time" class="bg-success checkmark" value="8:20 PM" @foreach ($appointments as $appointment)
                                        @if ($appointment->time == '8:20 PM')
                                            disabled
                                        @endif
                                    @endforeach/>
                                    <span class="Time pl-2">8:20 PM</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row pt-4 m-0 robotoRegular">
                        <div class="cl-000000 f-18 col-md-6 pl-0 pr-0"><div>Standard buzz cut or 1 length even line up</div></div>
                        <div class="col-md-6 cl-000000 d-flex justify-content-end"><div class="f-21">${{ number_format($service->rate) }}</div></div>
                    </div> --}}
                    <div class="row m-0 pt-3">
                        <div class="col-md-6 p-0">
                            {{-- <div class="btn-group w-50 h-44">
                                <button type="button" class="btn btn-outline-success bg-3ac574 cl-ffffff dropdown-toggle-btn w-100 rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Any staff Member
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-md-6 pl-0 ml-auto text-end pr-0">
                            <button type="submit" class="btn btn-outline-success my-2 d-flex justify-content-end my-sm-0 cl-ffffff bg-3ac574 pl-5 pr-5 login_button appointment-btn ml-auto" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    @if($services->count() > 0)
        <section class="main_padding pt-5">
            <div class="row m-0 p-0">
            <div class="robotoMedium cl-000000 f-34 pt-2 d-flex align-items-end">Services:</div>
            <div class="col-md-3 ml-auto p-0">
                <div class="d-flex m-0">  
                <div class="pt-4 w-100"> 
                    <input type="text" placeholder="Search for services" class="service_inpt robotoRegular h-44 cl-6b6b6b bg-transparent footer_input pt-2 pb-2 pl-3 w-100 rounded">
                </div>
                <div class="pt-4 pl-2"> 
                    <button class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pt-2 pb-2 pl-2 pr-2 service_inpt_btn" type="button" onclick="inputSearchServices();"><img src="{{ asset('assets/frontend/images/Group 188.png ') }}" alt=""></button>
                </div>
                </div>
            </div>

            <div class="table-responsive tableFixHead table_scroll mt-5 border robotoRegular">
                <table id="boxes-list" class="table m-0 header-fixed">
                
                <thead class="sticky-top bg-white cl-3ac754 ">
                    <tr class="bg-white robotoRegular ">
                    <th scope="col">No</th>
                    <th scope="col">Service</th>
                    <th scope="col">Category</th>
                    <th scope="col">Subcategory</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table_scroll services-table-body">
                    @foreach($services as $key=>$service)
                    <tr class="border-bottom">
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ ucwords($service->title) }}</td>
                        <td>{{ ucwords($service->category->name) }}</td>
                        @php
                        $subcategories = App\SubCategory::whereIn('id',json_decode($service->sub_categories))->get()->pluck('name')->toArray();
                        @endphp 
                        <td>{{ implode(',',array_map('ucwords',$subcategories)) }}</td>
                        <td>{{ $service->timing }} Minutes</td>
                        <td> ${{ number_format($service->rate) }} (USD)</td>
                        <td>{{ $service->status }}</td>
                        <td><a href="{{ route('appointment_request',encrypt($service->id)) }}" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 login_button" target="_blank">Book</a></td>
                    </tr>

                    @endforeach
                    
                </tbody>
                </table>
            </div>
                    
            </div>
        </section>
        @endif

    <section class="main_padding pt-70 text-center">
        <p class="main_title robotoMedium f-34 cl-000000 m-0">Portfolio</p>
        <p class="f-21 m-0 pt-3 cl-616161 robotoRegular">The best and highly skilled Performance done previously</p>
        <img src="{{ asset('assets/frontend/images/greencurve.png') }}" class="img-fluid pt-3" alt="" />
    </section>
    <section class="main_padding pt-70">
        <div class="row m-0">
            <div class="col-lg-7 col-md-7 col-sm-12 pl-0 pr-0 bg_img_8 d-flex flex-column justify-content-end">
                <div class="f-34 robotoMedium cl-ffffff pl-4 porfolio_images_title">
                    / 01
                </div>
                <div class="f-34 robotoMedium cl-ffffff pl-4 porfolio_images_title">From Fashion To better look</div>
                <div class="f-26 robotoRegular cl-ffffff pl-4 pb-3 porfolio_images_subtitle">Fashion in Demand</div>
                <div class="w-100 bg-000000a6 borderRadius-10px">
                    <div class="d-flex pt-3 pb-3 justify-content-end pr-4">
                        <div><img src="{{ asset('assets/frontend/images/Path 103.png') }}" alt="" srcset="" /><span class="cl-8b8b8b pl-1 robotoRegular">1</span></div>
                        <div class="pl-3"><img src="{{ asset('assets/frontend/images/Path 104.png') }}" alt="" srcset="" /><span class="cl-8b8b8b pl-1 robotoRegular">10</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 pr-0">
                <div class="bg_imgcol-5 d-flex flex-column justify-content-end">
                    <div class="f-34 robotoMedium cl-ffffff pl-4 porfolio_images_title">
                        / 01
                    </div>
                    <div class="f-34 robotoMedium cl-ffffff pl-4 porfolio_images_title">From Fashion To better look</div>
                    <div class="f-26 robotoRegular cl-ffffff pl-4 pb-3 porfolio_images_subtitle">Fashion in Demand</div>
                    <div class="w-100 bg-000000a6 borderRadius-10px">
                        <div class="d-flex pt-3 pb-3 justify-content-end pr-4">
                            <div><img src="{{ asset('assets/frontend/images/Path 103.png') }}" alt="" srcset="" /><span class="cl-8b8b8b pl-1 robotoRegular">1</span></div>
                            <div class="pl-3"><img src="{{ asset('assets/frontend/images/Path 104.png') }}" alt="" srcset="" /><span class="cl-8b8b8b pl-1 robotoRegular">10</span></div>
                        </div>
                    </div>
                </div>
                <!-- 2nd -->
                <div class="bg_imgcol-5_two d-flex flex-column justify-content-end">
                    <div class="f-34 robotoMedium cl-ffffff pl-4 porfolio_images_title">
                        / 01
                    </div>
                    <div class="f-34 robotoMedium cl-ffffff pl-4 porfolio_images_title">From Fashion To better look</div>
                    <div class="f-26 robotoRegular cl-ffffff pl-4 pb-3 porfolio_images_subtitle">Fashion in Demand</div>
                    <div class="w-100 bg-000000a6 borderRadius-10px">
                        <div class="d-flex pt-3 pb-3 justify-content-end pr-4">
                            <div><img src="{{ asset('assets/frontend/images/Path 103.png') }}" alt="" srcset="" /><span class="cl-8b8b8b pl-1 robotoRegular">1</span></div>
                            <div class="pl-3"><img src="{{ asset('assets/frontend/images/Path 104.png') }}" alt="" srcset="" /><span class="cl-8b8b8b pl-1 robotoRegular">10</span></div>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
        </div>
    </section>
    <section class="main_padding pt-5 text-center">
        <button href="" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574 pl-5 pr-5" type="submit">See all</button>
    </section>
    <section class="main_padding pt-5">
        <div class="row m-0">
            <div class="col-md-8 col-lg-8 pl-0">
                <div class="d-flex">
                    <div class="f-34 cl-000000 robotoMedium">Reviews</div>
                    <div class="d-flex align-items-center pl-4">
                        <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 70.png') }}" alt="" srcset="" /></div>
                        <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 70.png') }}" alt="" srcset="" /></div>
                        <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 70.png') }}" alt="" srcset="" /></div>
                        <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 70.png') }}" alt="" srcset="" /></div>
                        <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 70.png') }}" alt="" srcset="" /></div>
                    </div>
                </div>
                <div class="w-75 f-21 RobotoRegular cl-616161 text-justify">Reviews are no joke! Booksy values authentic reviews and only verifies them if we know the reviewer has visited this business.</div>
                <!-- COMMENTS SECTION START -->
                <div class="d-flex pt-5">
                    <div class="img_commentSection"><img src="{{ asset('assets/frontend/images/commentsectioniimg.png') }}" alt="" srcset="" /></div>
                    <div class="content_commentSection pl-4">
                        <div>
                            <div class="d-flex">
                                <div class="d-flex align-items-center pr-3">
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                </div>
                                <div class="f-26 RobotoRegular cl-616161 borderLeft pl-3 pr-3 comment_SectionName">Gisella P.</div>
                                <div class="f-21 RobotoRegular cl-616161 borderLeft pl-3 comment_SectionDate">Dec 20, 2020</div>
                            </div>
                        </div>
                        <div class="w-75 f-26 RobotoRegular cl-616161 pt-3 text-justify Comment">This barber is the best in town!!!! My son enjoys his work of art as welll!!!! I would give him 10 stars...</div>
                        <div class="d-flex f-21 robotoMedium pt-3">
                            <div><a class="cl-a2a2a2 comment_SectionLRD" href="##">Like</a></div>
                            <div class="pl-4"><a class="cl-a2a2a2 comment_SectionLRD" href="##">Dislike</a></div>
                            <div class="pl-4"><a class="cl-a2a2a2 comment_SectionLRD" href="##">Reply</a></div>
                        </div>
                    </div>
                </div>
                <!-- 2 -->
                <div class="d-flex pt-5">
                    <div class="img_commentSection"><img src="{{ asset('assets/frontend/images/commentsectioniimg.png') }}" alt="" srcset="" /></div>
                    <div class="content_commentSection pl-4">
                        <div>
                            <div class="d-flex">
                                <div class="d-flex align-items-center pr-3">
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                </div>
                                <div class="f-26 RobotoRegular cl-616161 borderLeft pl-3 pr-3 comment_SectionName">Gisella P.</div>
                                <div class="f-21 RobotoRegular cl-616161 borderLeft pl-3 comment_SectionDate">Dec 20, 2020</div>
                            </div>
                        </div>
                        <div class="w-75 f-26 RobotoRegular cl-616161 pt-3 text-justify Comment">This barber is the best in town!!!! My son enjoys his work of art as welll!!!! I would give him 10 stars...</div>
                        <div class="d-flex f-21 robotoMedium pt-3">
                            <div><a class="cl-a2a2a2 comment_SectionLRD" href="##">Like</a></div>
                            <div class="pl-4"><a class="cl-a2a2a2 comment_SectionLRD" href="##">Dislike</a></div>
                            <div class="pl-4"><a class="cl-a2a2a2 comment_SectionLRD" href="##">Reply</a></div>
                        </div>
                    </div>
                </div>
                <!-- end -->
                <!-- 3 -->
                <div class="d-flex pt-5">
                    <div class="img_commentSection"><img src="{{ asset('assets/frontend/images/commentsectioniimg.png') }}" alt="" srcset="" /></div>
                    <div class="content_commentSection pl-4">
                        <div>
                            <div class="d-flex">
                                <div class="d-flex align-items-center pr-3">
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                    <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 71.png') }}" alt="" srcset="" /></div>
                                </div>
                                <div class="f-26 RobotoRegular cl-616161 borderLeft pl-3 pr-3 comment_SectionName">Gisella P.</div>
                                <div class="f-21 RobotoRegular cl-616161 borderLeft pl-3 comment_SectionDate">Dec 20, 2020</div>
                            </div>
                        </div>
                        <div class="w-75 f-26 RobotoRegular cl-616161 pt-3 text-justify Comment">This barber is the best in town!!!! My son enjoys his work of art as welll!!!! I would give him 10 stars...</div>
                        <div class="d-flex f-21 robotoMedium pt-3">
                            <div><a class="cl-a2a2a2 comment_SectionLRD" href="##">Like</a></div>
                            <div class="pl-4"><a class="cl-a2a2a2 comment_SectionLRD" href="##">Dislike</a></div>
                            <div class="pl-4"><a class="cl-a2a2a2 comment_SectionLRD" href="##">Reply</a></div>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
            <div class="col-md-4 p-0">
                <section>
                    <div class="row m-0 pt-2 card_boxShadow pt-4 pb-3">
                        <div class="col-md-5 text-center">
                            <div class="f-41 cl-616161 robotoRegular">5.0<span class="robotoRegular f-16 cl-979797">/5</span></div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div><img src="{{ asset('assets/frontend/images/Path 70.png') }}" alt="" srcset="" /></div>
                                <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 70.png') }}" alt="" srcset="" /></div>
                                <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 70.png') }}" alt="" srcset="" /></div>
                                <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 70.png') }}" alt="" srcset="" /></div>
                                <div class="pl-2"><img src="{{ asset('assets/frontend/images/Path 70.png') }}" alt="" srcset="" /></div>
                            </div>
                            <div class="f-19 robotoRegular cl-a2a2a2 pt-3">150 reviews</div>
                        </div>
                        <div class="progressBarmainDiv robotoRegular cl-a2a2a2 col-md-7 pl-0">
                            <div class="d-flex align-items-center">
                                <div class="f-16 pr-2">5</div>
                                <div class="progress w-261 h-6px">
                                    <div class="progress-bar bg-3ac574 borderRadius-12px" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="pl-2">85%</div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <div class="f-16 pr-2">4</div>
                                <div class="progress w-261 h-6px">
                                    <div class="progress-bar bg-3ac574 borderRadius-12px" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="pl-2">40%</div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <div class="f-16 pr-2">3</div>
                                <div class="progress w-261 h-6px">
                                    <div class="borderRadius-12px" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="pl-2">0</div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <div class="f-16 pr-2">2</div>
                                <div class="progress w-261 h-6px">
                                    <div class="borderRadius-12px" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="pl-2">0</div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <div class="f-16 pr-2">1</div>
                                <div class="progress w-261 h-6px">
                                    <div class="borderRadius-12px" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="pl-2">0</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection {{-- content section end --}} 
{{-- footer section start --}} 

@section('extra-script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
    <script>

        function inputSearchServices()
        {
            let val = $('.service_inpt').val();
            $.ajax({
                url:"{{ route('getQueryServices') }}",
                type:"get",
                data:{val:val,service_id:{{ $service->id }},id:{{ $service->specialist_id }}},
                success:function(data)
                {
                $('.services-table-body').html(data);
                }
            });
        }

        $(document).keydown(function(e)
        {
            if(e.which === 13){
            inputSearchServices();
            }
        });

        $(".appointment-btn").on("click", function () {
            
            if($("input[name='time']:checked").val() == null){
                swal({
                        icon: "error",
                        text: " Please select any time slot for appointment",
                        type: 'error'
                    });
                return false
            }
            var month_year = $(".cal-month__current").text();
            var day = $(".cal-day__day--selected").text();
            $("#date").val(day + " " + month_year);
        });
    </script>
@endsection 
