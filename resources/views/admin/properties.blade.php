@extends('layouts.admin.app')

@section('content')

<section class="admin-dashboard dashboard pt20">
    <div class="container">

        <section class="heading bcred bdr9 white mb30 search-div">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-4 d-flex align-items-center">
                    <a href="#choose-property" class="fancybox-inline"><img src="{{asset('img/dropdown-icon.png')}}"></a>
                    <h1 class="fs32 mb0 ml20">Properties</h1>
                </div>
                <div class="col-sm-8 text-right">
                    <form class="search-form site-form mb0">
                        <fieldset class="d-flex align-items-center justify-content-end">
                            <input type="search" value="{{$search}}" placeholder="" name="" id="search-key" class="lightgray">
                            <button onclick="searchProperty()" type="button" class="btn">Search</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>

        <section class="users-list user-search-results bdgray bdr9 mb30">
            <div class="heading bdr9 bcgray white">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <b class="fs24">Properties</b>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="#add-admin-property" class="add-user fancybox-inline" onclick="showPropertyAddLayout()">
                            <img src="{{asset('img/add-icon-white.png')}}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (count($properties)>0)
                        <table class="width100p users-table fs24">
                            <tbody>
                                @foreach ($properties as $property)
                                    <tr id="property{{$property->id}}" data-id="{{$property->id}}">
                                        <td>{{$property->name}}</td>
                                        <td>{{$property->address}}</td>
                                        <td>
                                            <a href="#delete-property" class="add-user fancybox-inline" onclick="showDeletePropertyLayout('property{{$property->id}}')">
                                                <img src="{{asset('img/delete-icon.png')}}">
                                            </a>
                                            <a href="#add-admin-property" class="add-user fancybox-inline" onclick="showPropertyEditLayout({{$property->id}})">
                                                <img src="{{asset('img/edit-icon.png')}}">
                                            </a>
                                            <a href="{{route('admin.detail_property', ['property_id' => $property->id])}}" class="add-user">
                                                <img src="{{asset('img/info-icon.png')}}">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center fs24 pt-20">
                            @if ($search != '')
                                I searched {{$search}} and it gave me no results.    
                            @else
                                no results
                            @endif
                        </p>
                    @endif
                </div>
            </div>
        </section>

        <section class="mb30">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner">
                        {{ $properties->links('layouts.pagination_custom') }}
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>

<footer>

    @include('layouts/navbar_main')
    @include('layouts/navbar_sub')
    @include('layouts/profile_edit')
    @include('layouts/property_add_admin')
    @include('layouts/property_delete')
    @include('layouts/dispatcher_add')
    @include('layouts/customer_add')
</footer>
@endsection
